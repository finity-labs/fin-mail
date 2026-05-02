<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Commands;

use FinityLabs\FinMail\Commands\Concerns\CanRegisterPlugin;
use FinityLabs\FinMail\Commands\Concerns\DiscoversPanelProviders;
use FinityLabs\FinMail\Commands\Concerns\ManagesThemeStyles;
use FinityLabs\FinMail\Database\Seeders\EmailTemplateSeeder;
use FinityLabs\FinMail\Enums\CleanupFrequency;
use FinityLabs\FinMail\Settings\GeneralSettings;
use FinityLabs\FinMail\Settings\LoggingSettings;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    use CanRegisterPlugin;
    use DiscoversPanelProviders;
    use ManagesThemeStyles;

    protected ?string $panelId = null;

    protected bool $shieldConfigured = false;

    /** @var array<string, array{display: string, flag-icon: string}> */
    private const LOCALE_MAP = [
        'am' => ['display' => 'Amharic', 'flag-icon' => 'et'],
        'ar' => ['display' => 'العربية', 'flag-icon' => 'sa'],
        'az' => ['display' => 'Azərbaycanca', 'flag-icon' => 'az'],
        'bg' => ['display' => 'Български', 'flag-icon' => 'bg'],
        'bn' => ['display' => 'বাংলা', 'flag-icon' => 'bd'],
        'bs' => ['display' => 'Bosanski', 'flag-icon' => 'ba'],
        'ca' => ['display' => 'Català', 'flag-icon' => 'es'],
        'ckb' => ['display' => 'کوردی', 'flag-icon' => 'iq'],
        'cs' => ['display' => 'Čeština', 'flag-icon' => 'cz'],
        'cy' => ['display' => 'Cymraeg', 'flag-icon' => 'gb'],
        'da' => ['display' => 'Dansk', 'flag-icon' => 'dk'],
        'de' => ['display' => 'Deutsch', 'flag-icon' => 'de'],
        'el' => ['display' => 'Ελληνικά', 'flag-icon' => 'gr'],
        'en' => ['display' => 'English', 'flag-icon' => 'gb'],
        'es' => ['display' => 'Español', 'flag-icon' => 'es'],
        'eu' => ['display' => 'Euskara', 'flag-icon' => 'es'],
        'fa' => ['display' => 'فارسی', 'flag-icon' => 'ir'],
        'fi' => ['display' => 'Suomi', 'flag-icon' => 'fi'],
        'fr' => ['display' => 'Français', 'flag-icon' => 'fr'],
        'he' => ['display' => 'עברית', 'flag-icon' => 'il'],
        'hi' => ['display' => 'हिन्दी', 'flag-icon' => 'in'],
        'hr' => ['display' => 'Hrvatski', 'flag-icon' => 'hr'],
        'hu' => ['display' => 'Magyar', 'flag-icon' => 'hu'],
        'hy' => ['display' => 'Հայերեն', 'flag-icon' => 'am'],
        'id' => ['display' => 'Bahasa Indonesia', 'flag-icon' => 'id'],
        'it' => ['display' => 'Italiano', 'flag-icon' => 'it'],
        'ja' => ['display' => '日本語', 'flag-icon' => 'jp'],
        'ka' => ['display' => 'ქართული', 'flag-icon' => 'ge'],
        'km' => ['display' => 'ខ្មែរ', 'flag-icon' => 'kh'],
        'ko' => ['display' => '한국어', 'flag-icon' => 'kr'],
        'ku' => ['display' => 'Kurdî', 'flag-icon' => 'iq'],
        'lt' => ['display' => 'Lietuvių', 'flag-icon' => 'lt'],
        'lv' => ['display' => 'Latviešu', 'flag-icon' => 'lv'],
        'mk' => ['display' => 'Македонски', 'flag-icon' => 'mk'],
        'mn' => ['display' => 'Монгол', 'flag-icon' => 'mn'],
        'ms' => ['display' => 'Bahasa Melayu', 'flag-icon' => 'my'],
        'my' => ['display' => 'မြန်မာ', 'flag-icon' => 'mm'],
        'nb' => ['display' => 'Norsk bokmål', 'flag-icon' => 'no'],
        'ne' => ['display' => 'नेपाली', 'flag-icon' => 'np'],
        'nl' => ['display' => 'Nederlands', 'flag-icon' => 'nl'],
        'pl' => ['display' => 'Polski', 'flag-icon' => 'pl'],
        'pt' => ['display' => 'Português', 'flag-icon' => 'pt'],
        'pt_BR' => ['display' => 'Português (Brasil)', 'flag-icon' => 'br'],
        'ro' => ['display' => 'Română', 'flag-icon' => 'ro'],
        'ru' => ['display' => 'Русский', 'flag-icon' => 'ru'],
        'sk' => ['display' => 'Slovenčina', 'flag-icon' => 'sk'],
        'sl' => ['display' => 'Slovenščina', 'flag-icon' => 'si'],
        'sq' => ['display' => 'Shqip', 'flag-icon' => 'al'],
        'sr_Cyrl' => ['display' => 'Српски', 'flag-icon' => 'rs'],
        'sr_Latn' => ['display' => 'Srpski', 'flag-icon' => 'rs'],
        'sv' => ['display' => 'Svenska', 'flag-icon' => 'se'],
        'sw' => ['display' => 'Kiswahili', 'flag-icon' => 'tz'],
        'th' => ['display' => 'ไทย', 'flag-icon' => 'th'],
        'tr' => ['display' => 'Türkçe', 'flag-icon' => 'tr'],
        'uk' => ['display' => 'Українська', 'flag-icon' => 'ua'],
        'ur' => ['display' => 'اردو', 'flag-icon' => 'pk'],
        'uz' => ['display' => 'Oʻzbek', 'flag-icon' => 'uz'],
        'vi' => ['display' => 'Tiếng Việt', 'flag-icon' => 'vn'],
        'zh_CN' => ['display' => '简体中文', 'flag-icon' => 'cn'],
        'zh_TW' => ['display' => '繁體中文', 'flag-icon' => 'tw'],
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
        $localesOption = $this->option('locales');

        if (is_string($localesOption) && $localesOption !== '') {
            $selected = $this->parseLocalesOption($localesOption);
        } else {
            $selected = $this->promptLocales();
        }

        $languages = [];
        foreach ($selected as $code) {
            $meta = self::LOCALE_MAP[$code] ?? ['display' => strtoupper($code), 'flag-icon' => $code];
            $languages[] = ['code' => $code, ...$meta];
        }

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

    /**
     * @return array<int, string>
     */
    protected function parseLocalesOption(string $value): array
    {
        $codes = array_map('trim', explode(',', $value));
        $codes = array_filter($codes, fn (string $code): bool => $code !== '');

        $invalid = array_diff($codes, array_keys(self::LOCALE_MAP));

        if (! empty($invalid)) {
            $this->components->warn('Unknown locale codes ignored: '.implode(', ', $invalid));
            $codes = array_intersect($codes, array_keys(self::LOCALE_MAP));
        }

        if (empty($codes)) {
            $this->components->warn('No valid locales provided. Falling back to interactive selection.');

            return $this->promptLocales();
        }

        $this->comment('Locales from --locales option: '.implode(', ', $codes));

        return $codes;
    }

    /**
     * @return array<int, string>
     */
    protected function promptLocales(): array
    {
        $detected = $this->detectLocales();

        $options = [];
        foreach ($detected as $code) {
            $meta = self::LOCALE_MAP[$code] ?? ['display' => strtoupper($code), 'flag-icon' => $code];
            $options[$code] = "{$meta['display']} ({$code})";
        }

        $options['other'] = 'Other (enter locale codes manually)';

        $this->comment('Detected locales: '.implode(', ', $detected));

        $selected = multiselect(
            label: 'Which locales should FinMail support for email templates?',
            options: $options,
            default: $detected,
            required: true,
        );

        /** @var array<int, string> $selected */
        $selected = array_values($selected);

        if (! in_array('other', $selected, true)) {
            return $selected;
        }

        $selected = array_filter($selected, fn (string $code): bool => $code !== 'other');

        $availableCodes = implode(', ', array_keys(self::LOCALE_MAP));
        $extra = text(
            label: 'Enter additional locale codes (comma-separated)',
            placeholder: 'e.g. ja,ko,zh_CN',
            hint: "Available: {$availableCodes}",
            required: true,
        );

        $extraCodes = $this->parseLocalesOption($extra);

        return array_values(array_unique([...$selected, ...$extraCodes]));
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
        $this->registerPlugin($panelProviders[$this->panelId]);
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
        $configPath = config_path('filament-shield.php');

        if (! file_exists($configPath)) {
            return;
        }

        if (! $this->confirm('Register FinMail resources in Filament Shield config?', true)) {
            return;
        }

        $content = file_get_contents($configPath);

        if ($content === false) {
            $this->components->warn('Could not read Shield config file.');

            return;
        }

        if (str_contains($content, 'FinityLabs\\FinMail')) {
            $this->components->warn('FinMail resources are already registered in Shield config.');

            return;
        }

        $entries = ''
            ."            \\FinityLabs\\FinMail\\Resources\\EmailTemplateResource\\EmailTemplateResource::class => [\n"
            ."                'viewAny',\n"
            ."                'view',\n"
            ."                'create',\n"
            ."                'update',\n"
            ."                'delete',\n"
            ."                'preview',\n"
            ."                'sendTest',\n"
            ."                'compose',\n"
            ."            ],\n"
            ."            \\FinityLabs\\FinMail\\Resources\\EmailThemeResource\\EmailThemeResource::class => [\n"
            ."                'viewAny',\n"
            ."                'view',\n"
            ."                'create',\n"
            ."                'update',\n"
            ."                'delete',\n"
            ."            ],\n"
            ."            \\FinityLabs\\FinMail\\Resources\\SentEmailResource\\SentEmailResource::class => [\n"
            ."                'viewAny',\n"
            ."                'view',\n"
            ."                'resend',\n"
            ."            ],\n";

        $managePos = strpos($content, "'manage' => [");

        if ($managePos === false) {
            $this->components->warn('Could not find the manage array in Shield config. Add FinMail resources manually.');

            return;
        }

        $openBracket = strpos($content, '[', $managePos + strlen("'manage' => "));

        if ($openBracket === false) {
            $this->components->warn('Could not parse Shield config. Add FinMail resources manually.');

            return;
        }

        // Count brackets to find the matching ]
        $depth = 1;
        $pos = $openBracket + 1;
        $len = strlen($content);

        while ($pos < $len && $depth > 0) {
            if ($content[$pos] === '[') {
                $depth++;
            } elseif ($content[$pos] === ']') {
                $depth--;
            }

            if ($depth > 0) {
                $pos++;
            }
        }

        // Insert entries before the closing ] of the manage array
        $insertPos = strrpos(substr($content, 0, $pos), "\n");

        if ($insertPos === false) {
            $this->components->warn('Could not parse Shield config. Add FinMail resources manually.');

            return;
        }

        $insertPos++;

        $content = substr($content, 0, $insertPos).$entries.substr($content, $insertPos);

        file_put_contents($configPath, $content);
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
