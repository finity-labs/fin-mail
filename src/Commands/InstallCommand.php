<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Commands;

use FinityLabs\FinMail\Commands\Concerns\ManagesThemeStyles;
use FinityLabs\FinMail\Database\Seeders\EmailTemplateSeeder;
use FinityLabs\FinMail\Enums\CleanupFrequency;
use FinityLabs\FinMail\FinMailPlugin;
use FinityLabs\FinMail\Resources\EmailTemplateResource\EmailTemplateResource;
use FinityLabs\FinMail\Resources\EmailThemeResource\EmailThemeResource;
use FinityLabs\FinMail\Resources\SentEmailResource\SentEmailResource;
use FinityLabs\FinMail\Settings\GeneralSettings;
use FinityLabs\FinMail\Settings\LoggingSettings;
use FinityLabs\FinSupport\Console\Concerns\DiscoversPanelProviders;
use FinityLabs\FinSupport\Console\Concerns\EditsPanelProviders;
use FinityLabs\FinSupport\Console\Concerns\EditsShieldConfig;
use FinityLabs\LinSupport\Console\Concerns\PromptsForLocales;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\select;

use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    use DiscoversPanelProviders;
    use EditsPanelProviders;
    use EditsShieldConfig;
    use ManagesThemeStyles;
    use PromptsForLocales;

    protected ?string $panelId = null;

    protected bool $shieldConfigured = false;

    /**
     * What Shield's config gets: the three resources and their abilities.
     *
     * @var array<class-string, list<string>>
     */
    private const SHIELD_RESOURCES = [
        EmailTemplateResource::class => ['viewAny', 'view', 'create', 'update', 'delete', 'preview', 'sendTest', 'compose'],
        EmailThemeResource::class => ['viewAny', 'view', 'create', 'update', 'delete'],
        SentEmailResource::class => ['viewAny', 'view', 'resend'],
    ];

    protected $signature = 'fin-mail:install
                            {--panel= : Panel ID to register the plugin in}
                            {--seed : Seed default email templates}
                            {--locales= : Comma-separated locale codes to activate (e.g. en,hu,de)}
                            {--force : Overwrite existing config file}';

    protected $description = 'Install the FinMail plugin.';

    public function handle(): int
    {
        $this->info('Installing FinMail plugin...');
        $this->newLine();

        if ($this->confirm('Publish configuration file?', false)) {
            $this->comment('Publishing configuration...');
            $this->callSilently('vendor:publish', [
                '--tag' => 'fin-mail-config',
                '--force' => $this->option('force'),
            ]);
            $this->info('  Config published to config/fin-mail.php');
        }

        $this->ensureSettingsTableExists();

        $this->comment('Publishing migrations...');
        $this->callSilently('vendor:publish', [
            '--tag' => 'fin-mail-migrations',
        ]);
        $this->info('  Migrations published');

        if ($this->confirm('Run migrations now?', true)) {
            $this->comment('Running migrations...');
            $this->call('migrate');
            $this->info('  Migrations complete');
        }

        $this->configureLocales();

        if ($this->option('seed') || $this->confirm('Seed default email templates?', true)) {
            $this->comment('Seeding default templates...');
            $this->call('db:seed', [
                '--class' => EmailTemplateSeeder::class,
            ]);
            $this->info('  Default templates seeded (5 templates + 1 theme)');
        }

        if ($this->confirm('Publish translation files for customization?', false)) {
            $this->callSilently('vendor:publish', [
                '--tag' => 'fin-mail-translations',
            ]);
            $this->info('  Translations published to lang/vendor/fin-mail/');
        }

        if ($this->confirm('Publish email template views for customization?', false)) {
            $this->callSilently('vendor:publish', [
                '--tag' => 'fin-mail-views',
            ]);
            $this->info('  Views published to resources/views/vendor/fin-mail/');
        }

        $this->registerInPanel();
        $this->registerThemeStylesForPanel();
        $this->configureShield();
        $this->configureSchedule();

        $this->newLine();
        $this->info('FinMail plugin installed successfully!');
        $this->newLine();

        $nextSteps = [
            ['Configure settings', 'Visit the FinMail settings page in Filament admin'],
            ['Auth overrides', 'Enable auth email overrides in Settings → Auth Emails'],
        ];

        if ($this->shieldConfigured) {
            $nextSteps[] = ['Assign permissions', 'Assign FinMail Shield permissions to roles'];
        }

        $this->table(['Next Steps', 'Details'], $nextSteps);

        return self::SUCCESS;
    }

    protected function ensureSettingsTableExists(): void
    {
        if (Schema::hasTable('settings')) {
            return;
        }

        $this->comment('Publishing spatie/laravel-settings migration...');
        $this->callSilently('vendor:publish', [
            '--provider' => 'Spatie\LaravelSettings\LaravelSettingsServiceProvider',
            '--tag' => 'migrations',
        ]);
        $this->info('  Settings migration published');

        $this->comment('Running settings migration...');
        $this->call('migrate');
        $this->info('  Settings table created');
    }

    protected function configureLocales(): void
    {
        $selected = $this->resolveLocales('Which locales should FinMail support for email templates?');
        $languages = $this->localeEntries($selected);

        try {
            $mailSettings = app(GeneralSettings::class);
            $mailSettings->default_locale = config('app.locale', 'en');
            $mailSettings->languages = $languages;
            $mailSettings->save();

            $codes = array_column($languages, 'code');
            $this->info('  Locales configured: '.implode(', ', $codes));
        } catch (\Throwable) {
            $this->components->warn('Could not save locale settings. Configure them manually in the admin panel.');
        }
    }

    protected function registerInPanel(): void
    {
        $panelProviders = $this->discoverPanelProviders();

        if (empty($panelProviders)) {
            $this->components->warn('No panel providers found in app/Providers/Filament/. Register FinMailPlugin::make() manually.');

            return;
        }

        $this->panelId = $this->option('panel');

        if ($this->panelId === null) {
            $this->panelId = select(
                label: 'Which panel should FinMail be registered in?',
                options: array_keys($panelProviders),
                required: true,
            );
        }

        if (! isset($panelProviders[$this->panelId])) {
            $this->components->error("Panel provider not found for: {$this->panelId}");

            return;
        }

        $this->comment("Registering FinMailPlugin in {$this->panelId} panel...");
        $this->registerPlugin($panelProviders[$this->panelId], FinMailPlugin::class);
    }

    protected function registerThemeStylesForPanel(): void
    {
        if ($this->panelId === null) {
            return;
        }

        $cssPath = $this->resolveThemeCssPath($this->panelId);

        if ($cssPath === null) {
            return;
        }

        if ($this->confirm('Register FinMail styles in your custom Filament theme?', true)) {
            $this->comment('Registering FinMail styles...');
            $this->registerThemeStyles($this->panelId);
        }
    }

    protected function configureShield(): void
    {
        if (! $this->hasShieldConfig()) {
            return;
        }

        if (! $this->confirm('Register FinMail resources in Filament Shield config?', true)) {
            return;
        }

        if (! $this->registerShieldResources(self::SHIELD_RESOURCES, 'FinityLabs\\FinMail')) {
            return;
        }

        $this->info('  FinMail resources registered in Shield config');

        $this->generateShieldPermissions();
    }

    protected function generateShieldPermissions(): void
    {
        $this->comment('Generating Shield permissions and policies for FinMail resources...');

        $args = [
            PHP_BINARY, 'artisan', 'shield:generate',
            '--resource=EmailTemplateResource,EmailThemeResource,SentEmailResource',
            '--page=ManageAttachmentSettings,ManageAuthEmailSettings,ManageBrandingSettings,ManageGeneralSettings,ManageLoggingSettings',
            '--option=policies_and_permissions',
            '--ignore-existing-policies',
            '--no-interaction',
        ];

        if ($this->panelId !== null) {
            $args[] = "--panel={$this->panelId}";
        }

        $process = new Process($args, base_path());
        $process->setTimeout(60);
        $process->run();

        if ($process->isSuccessful()) {
            $this->shieldConfigured = true;
            $this->info('  Shield permissions and policies generated');
        } else {
            $this->components->warn('Could not generate Shield permissions automatically. Run manually:');
            $panelFlag = $this->panelId !== null ? " --panel={$this->panelId}" : '';
            $this->line("  php artisan shield:generate{$panelFlag} --option=policies_and_permissions --ignore-existing-policies");
        }
    }

    protected function configureSchedule(): void
    {
        if (! $this->confirm('Enable automatic cleanup of old sent emails?', true)) {
            return;
        }

        $frequency = select(
            label: 'How often should old sent emails be cleaned up?',
            options: [
                '1' => 'Daily',
                '2' => 'Weekly',
                '3' => 'Monthly',
            ],
            default: '1',
        );

        try {
            $loggingSettings = app(LoggingSettings::class);
            $loggingSettings->cleanup_enabled = true;
            $loggingSettings->cleanup_frequency = CleanupFrequency::from((int) $frequency);
            $loggingSettings->save();

            $label = $loggingSettings->cleanup_frequency->getLabel();
            $this->info("  Cleanup scheduled ({$label}). Retention period is configurable in FinMail settings.");
        } catch (\Throwable) {
            $this->components->warn('Could not save cleanup settings. Configure them manually in the admin panel.');
        }
    }
}
