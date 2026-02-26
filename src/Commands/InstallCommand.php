<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Commands;

use FinityLabs\FinMail\Commands\Concerns\CanRegisterPlugin;
use FinityLabs\FinMail\Commands\Concerns\DiscoversPanelProviders;
use FinityLabs\FinMail\Enums\CleanupFrequency;
use FinityLabs\FinMail\Settings\LoggingSettings;
use FinityLabs\FinMail\Settings\MailSettings;
use Illuminate\Console\Command;

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\select;

class InstallCommand extends Command
{
    use CanRegisterPlugin;
    use DiscoversPanelProviders;

    /** @var array<string, array{display: string, flag-icon: string}> */
    private const LOCALE_MAP = [
        'en' => ['display' => 'English', 'flag-icon' => 'gb'],
        'de' => ['display' => 'Deutsch', 'flag-icon' => 'de'],
        'hu' => ['display' => 'Magyar', 'flag-icon' => 'hu'],
        'ro' => ['display' => 'Română', 'flag-icon' => 'ro'],
        'fr' => ['display' => 'Français', 'flag-icon' => 'fr'],
        'es' => ['display' => 'Español', 'flag-icon' => 'es'],
        'it' => ['display' => 'Italiano', 'flag-icon' => 'it'],
        'nl' => ['display' => 'Nederlands', 'flag-icon' => 'nl'],
        'pl' => ['display' => 'Polski', 'flag-icon' => 'pl'],
        'pt' => ['display' => 'Português', 'flag-icon' => 'pt'],
        'cs' => ['display' => 'Čeština', 'flag-icon' => 'cz'],
        'sk' => ['display' => 'Slovenčina', 'flag-icon' => 'sk'],
    ];

    protected $signature = 'fin-mail:install
                            {--panel= : Panel ID to register the plugin in}
                            {--seed : Seed default email templates}
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
                '--class' => \FinityLabs\FinMail\Database\Seeders\EmailTemplateSeeder::class,
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
        $this->configureSchedule();

        $this->newLine();
        $this->info('FinMail plugin installed successfully!');
        $this->newLine();

        $this->table(['Next Steps', 'Details'], [
            ['Configure settings', 'Visit the FinMail settings page in Filament admin'],
            ['Auth overrides', 'Set auth_emails options to true in config/fin-mail.php'],
        ]);

        return self::SUCCESS;
    }

    protected function configureLocales(): void
    {
        $detected = $this->detectLocales();

        $options = [];
        foreach ($detected as $code) {
            $meta = self::LOCALE_MAP[$code] ?? ['display' => strtoupper($code), 'flag-icon' => $code];
            $options[$code] = "{$meta['display']} ({$code})";
        }

        $this->comment('Detected locales: '.implode(', ', $detected));

        $selected = multiselect(
            label: 'Which locales should FinMail support for email templates?',
            options: $options,
            default: $detected,
            required: true,
        );

        $languages = [];
        foreach ($selected as $code) {
            $languages[$code] = self::LOCALE_MAP[$code]
                ?? ['display' => strtoupper($code), 'flag-icon' => $code];
        }

        try {
            $mailSettings = app(MailSettings::class);
            $mailSettings->default_locale = config('app.locale', 'en');
            $mailSettings->languages = $languages;
            $mailSettings->save();

            $this->info('  Locales configured: '.implode(', ', array_keys($languages)));
        } catch (\Throwable) {
            $this->components->warn('Could not save locale settings. Configure them manually in the admin panel.');
        }
    }

    /**
     * @return array<int, string>
     */
    protected function detectLocales(): array
    {
        $langPath = lang_path();

        if (! is_dir($langPath)) {
            return [config('app.locale', 'en')];
        }

        $directories = glob($langPath.'/*', GLOB_ONLYDIR);

        if ($directories === false || empty($directories)) {
            return [config('app.locale', 'en')];
        }

        $locales = [];

        foreach ($directories as $dir) {
            $locale = basename($dir);
            if ($locale !== 'vendor') {
                $locales[] = $locale;
            }
        }

        sort($locales);

        return empty($locales) ? [config('app.locale', 'en')] : $locales;
    }

    protected function registerInPanel(): void
    {
        $panelProviders = $this->discoverPanelProviders();

        if (empty($panelProviders)) {
            $this->components->warn('No panel providers found in app/Providers/Filament/. Register FinMailPlugin::make() manually.');

            return;
        }

        $panelId = $this->option('panel');

        if ($panelId === null) {
            $panelId = select(
                label: 'Which panel should FinMail be registered in?',
                options: array_keys($panelProviders),
                required: true,
            );
        }

        if (! isset($panelProviders[$panelId])) {
            $this->components->error("Panel provider not found for: {$panelId}");

            return;
        }

        $this->comment("Registering FinMailPlugin in {$panelId} panel...");
        $this->registerPlugin($panelProviders[$panelId]);
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
