<?php

declare(strict_types=1);

namespace FinityLabs\FinMail;

use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Auth\Events\Registered;
use Filament\Facades\Filament;
use FinityLabs\FinMail\Contracts\EditorContract;
use FinityLabs\FinMail\Editors\DefaultEditor;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FinMailServiceProvider extends PackageServiceProvider
{
    public static string $name = 'fin-mail';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasTranslations()
            ->hasViews('fin-mail')
            ->hasMigrations([
                'create_email_themes_table',
                'create_email_templates_table',
                'create_email_template_versions_table',
                'create_sent_emails_table',
                'add_reply_to_on_email_templates_table',
                '../settings/create_attachment_settings',
                '../settings/create_branding_settings',
                '../settings/create_logging_settings',
                '../settings/create_general_settings',
                '../settings/create_auth_email_settings',
            ])
            ->hasCommands([
                Commands\InstallCommand::class,
                Commands\UninstallCommand::class,
                Commands\UpgradeCommand::class,
                Commands\CleanupSentEmails::class,
            ]);
    }

    public function packageRegistered(): void
    {
        $this->app->bind(EditorContract::class, function (): EditorContract {
            $editor = config('fin-mail.editor', 'default');

            return match ($editor) {
                'default' => new DefaultEditor,
                default => new $editor,
            };
        });

        $this->app->singleton('fin-mail', function (): FinMailManager {
            return new FinMailManager;
        });
    }

    public function packageBooted(): void
    {
        $this->registerShieldPolicies();
        $this->registerAuthEmailOverrides();
        $this->registerScheduledCommands();
    }

    protected function registerShieldPolicies(): void
    {
        if (! class_exists(FilamentShieldPlugin::class)) {
            return;
        }

        try {
            $namespace = FinMailPlugin::get()->getPolicyNamespace();
        } catch (\Throwable) {
            $namespace = 'App\\Policies';
        }

        $policyMap = [
            Models\EmailTemplate::class => $namespace.'\\EmailTemplatePolicy',
            Models\EmailTheme::class => $namespace.'\\EmailThemePolicy',
            Models\SentEmail::class => $namespace.'\\SentEmailPolicy',
        ];

        $gate = Gate::getFacadeRoot();

        foreach ($policyMap as $model => $policy) {
            if (class_exists($policy)) {
                $gate->policy($model, $policy);
            }
        }
    }

    protected function registerAuthEmailOverrides(): void
    {
        try {
            $authEmails = app(Settings\AuthEmailSettings::class);

            if ($authEmails->override_verification) {
                $this->registerVerificationOverride();
            }

            if ($authEmails->override_password_reset) {
                $this->registerPasswordResetOverride();
            }

            if ($authEmails->override_welcome) {
                Event::listen(
                    Registered::class,
                    Listeners\SendWelcomeEmail::class,
                );
            }
        } catch (\Throwable) {
            // Settings table may not exist yet (pre-migration).
        }
    }

    protected function registerScheduledCommands(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->callAfterResolving(
            Schedule::class,
            function (Schedule $schedule): void {
                try {
                    $logging = app(Settings\LoggingSettings::class);

                    if (! $logging->cleanup_enabled) {
                        return;
                    }

                    $schedule->command('fin-mail:cleanup')
                        ->description('Clean up old sent email records')
                        ->{$logging->cleanup_frequency->cronMethod()}();
                } catch (\Throwable) {
                    // Deliberately swallowed: the settings table or rows may not
                    // exist yet (pre-migration), and reporting here would spam
                    // the log on every boot of a fresh install.
                }
            }
        );
    }

    protected function registerVerificationOverride(): void
    {
        VerifyEmail::toMailUsing(function (mixed $notifiable, string $url): Mail\TemplateMail|MailMessage {
            try {
                if (Models\EmailTemplate::findByKey('user-verify-email')) {
                    $mail = Mail\TemplateMail::make('user-verify-email', app()->getLocale())
                        ->to($notifiable->getEmailForVerification())
                        ->models([
                            'user' => $notifiable,
                            'url' => new Helpers\TokenValue($url),
                        ]);

                    return $this->applyAuthBodyStoragePolicy($mail);
                }
            } catch (\Throwable $e) {
                report($e);
            }

            // Template missing, inactive, or errored: never break account
            // verification - fall back to Laravel's default notification mail.
            return $this->defaultAuthMailMessage(new VerifyEmail, $url);
        });
    }

    protected function registerPasswordResetOverride(): void
    {
        ResetPassword::toMailUsing(function (mixed $notifiable, string $token): Mail\TemplateMail|MailMessage {
            $url = $this->buildPasswordResetUrl($notifiable, $token);

            try {
                if (Models\EmailTemplate::findByKey('user-password-reset')) {
                    $mail = Mail\TemplateMail::make('user-password-reset', app()->getLocale())
                        ->to($notifiable->getEmailForPasswordReset())
                        ->models([
                            'user' => $notifiable,
                            'url' => new Helpers\TokenValue($url),
                        ]);

                    return $this->applyAuthBodyStoragePolicy($mail);
                }
            } catch (\Throwable $e) {
                report($e);
            }

            // Template missing, inactive, or errored: never break password
            // reset - fall back to Laravel's default notification mail.
            return $this->defaultAuthMailMessage(new ResetPassword($token), $url);
        });
    }

    /**
     * Auth email bodies contain signed URLs, so they are kept out of the
     * Sent Emails log unless the developer opts in via config.
     */
    protected function applyAuthBodyStoragePolicy(Mail\TemplateMail $mail): Mail\TemplateMail
    {
        if (! config('fin-mail.auth_emails.store_rendered_body', false)) {
            $mail->withoutStoringRenderedBody();
        }

        return $mail;
    }

    protected function defaultAuthMailMessage(VerifyEmail|ResetPassword $notification, string $url): MailMessage
    {
        $buildMailMessage = new \ReflectionMethod($notification, 'buildMailMessage');

        return $buildMailMessage->invoke($notification, $url);
    }

    protected function buildPasswordResetUrl(mixed $notifiable, string $token): string
    {
        $email = $notifiable->getEmailForPasswordReset();

        // Filament panel reset route
        if (class_exists(Filament::class)) {
            try {
                return Filament::getResetPasswordUrl($token, $notifiable);
            } catch (\Throwable) {
                // Panel may not be available in this context.
            }
        }

        // Standard Laravel reset route (Breeze/Fortify)
        return url(route('password.reset', [
            'token' => $token,
            'email' => $email,
        ]));
    }
}
