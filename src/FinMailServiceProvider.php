<?php

declare(strict_types=1);

namespace FinityLabs\FinMail;

use FinityLabs\FinMail\Contracts\EditorContract;
use FinityLabs\FinMail\Editors\DefaultEditor;
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
                '../settings/create_attachment_settings',
                '../settings/create_branding_settings',
                '../settings/create_logging_settings',
                '../settings/create_general_settings',
                '../settings/create_auth_email_settings',
            ])
            ->hasCommands([
                Commands\InstallCommand::class,
                Commands\UninstallCommand::class,
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
        $this->registerAuthEmailOverrides();
        $this->registerScheduledCommands();
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
                \Illuminate\Support\Facades\Event::listen(
                    \Illuminate\Auth\Events\Registered::class,
                    Listeners\SendWelcomeEmail::class,
                );
            }
        } catch (\Throwable) {
            // Settings table may not exist yet (pre-migration).
        }
    }

    protected function registerScheduledCommands(): void
    {
        $this->app->afterResolving(
            \Illuminate\Console\Scheduling\Schedule::class,
            function (\Illuminate\Console\Scheduling\Schedule $schedule): void {
                try {
                    $logging = app(Settings\LoggingSettings::class);
                } catch (\Throwable) {
                    return;
                }

                if (! $logging->cleanup_enabled) {
                    return;
                }

                $event = $schedule->command('fin-mail:cleanup')
                    ->description('Clean up old sent email records');

                $event->{$logging->cleanup_frequency->cronMethod()}();
            }
        );
    }

    protected function registerVerificationOverride(): void
    {
        \Illuminate\Auth\Notifications\VerifyEmail::toMailUsing(function (mixed $notifiable, string $url): Mail\TemplateMail {
            return Mail\TemplateMail::make('user-verify-email')
                ->models([
                    'user' => $notifiable,
                    'url' => new Helpers\TokenValue($url),
                ]);
        });
    }

    protected function registerPasswordResetOverride(): void
    {
        \Illuminate\Auth\Notifications\ResetPassword::toMailUsing(function (mixed $notifiable, string $token): Mail\TemplateMail {
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            return Mail\TemplateMail::make('user-password-reset')
                ->models([
                    'user' => $notifiable,
                    'url' => new Helpers\TokenValue($url),
                ]);
        });
    }
}
