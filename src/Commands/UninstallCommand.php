<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Commands;

use FinityLabs\FinMail\Commands\Concerns\CanDeregisterPlugin;
use FinityLabs\FinMail\Commands\Concerns\DiscoversPanelProviders;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class UninstallCommand extends Command
{
    use CanDeregisterPlugin;
    use DiscoversPanelProviders;

    private const DATABASE_TABLES = [
        'sent_emails',
        'email_template_versions',
        'email_templates',
        'email_themes',
    ];

    private const MIGRATION_FILES = [
        'create_email_themes_table.php',
        'create_email_templates_table.php',
        'create_email_template_versions_table.php',
        'create_sent_emails_table.php',
    ];

    private const SETTINGS_MIGRATION_FILES = [
        'create_attachment_settings.php',
        'create_branding_settings.php',
        'create_logging_settings.php',
        'create_mail_settings.php',
    ];

    protected $signature = 'fin-mail:uninstall';

    protected $description = 'Uninstall the FinMail plugin (run before composer remove).';

    public function handle(): int
    {
        $this->info('Uninstalling FinMail plugin...');
        $this->newLine();

        $this->deregisterFromPanels();
        $this->cleanupDatabaseTables();
        $this->cleanupPublishedMigrations();
        $this->cleanupPublishedConfig();
        $this->cleanupPublishedViews();
        $this->cleanupPublishedTranslations();
        $this->clearCaches();

        $this->newLine();
        $this->info('FinMail plugin uninstalled. You can now run: composer remove finity-labs/fin-mail');

        return self::SUCCESS;
    }

    protected function deregisterFromPanels(): void
    {
        $panelProviders = $this->discoverPanelProviders();

        if (empty($panelProviders)) {
            $this->components->warn('No panel providers found. If you registered FinMailPlugin manually, remove it before running composer remove.');

            return;
        }

        foreach ($panelProviders as $panelId => $path) {
            $content = file_get_contents($path);

            if ($content !== false && str_contains($content, 'FinMailPlugin')) {
                $this->comment("Removing FinMailPlugin from {$panelId} panel...");
                $this->deregisterPlugin($path);
            }
        }
    }

    protected function cleanupDatabaseTables(): void
    {
        if (! $this->confirm('Drop FinMail database tables? (email_templates, email_themes, sent_emails, etc.)', false)) {
            return;
        }

        $this->comment('Dropping FinMail tables...');

        // Drop in correct order to respect foreign key constraints
        foreach (self::DATABASE_TABLES as $table) {
            if (Schema::hasTable($table)) {
                Schema::dropIfExists($table);
                $this->info("  Dropped table: {$table}");
            }
        }

        // Clean up settings entries
        if (Schema::hasTable('settings')) {
            $deleted = \Illuminate\Support\Facades\DB::table('settings')
                ->where('group', 'like', 'fin-mail%')
                ->delete();

            if ($deleted > 0) {
                $this->info("  Removed {$deleted} settings entries");
            }
        }

        // Clean up migrations table entries
        if (Schema::hasTable('migrations')) {
            $allMigrations = [...self::MIGRATION_FILES, ...self::SETTINGS_MIGRATION_FILES];
            $migrationNames = array_map(
                fn (string $file) => pathinfo($file, PATHINFO_FILENAME),
                $allMigrations,
            );

            $deleted = \Illuminate\Support\Facades\DB::table('migrations')
                ->where(function ($query) use ($migrationNames): void {
                    foreach ($migrationNames as $name) {
                        $query->orWhere('migration', 'like', "%{$name}");
                    }
                })
                ->delete();

            if ($deleted > 0) {
                $this->info("  Removed {$deleted} migration records");
            }
        }
    }

    protected function cleanupPublishedMigrations(): void
    {
        $migrationsPath = database_path('migrations');
        $settingsPath = database_path('settings');

        $found = $this->findPublishedMigrations($migrationsPath, $settingsPath);

        if (empty($found)) {
            return;
        }

        if (! $this->confirm('Delete published FinMail migration files? ('.count($found).' files found)', false)) {
            return;
        }

        $this->comment('Removing published migrations...');

        foreach ($found as $file) {
            unlink($file);
            $this->info('  Deleted: '.basename($file));
        }
    }

    /**
     * @return array<int, string>
     */
    protected function findPublishedMigrations(string $migrationsPath, string $settingsPath): array
    {
        $found = [];

        // Check database/migrations/ for table migrations (may have date prefix)
        if (is_dir($migrationsPath)) {
            foreach (self::MIGRATION_FILES as $filename) {
                $pattern = $migrationsPath.'/*'.$filename;
                $matches = glob($pattern);
                if ($matches !== false) {
                    $found = [...$found, ...$matches];
                }
            }
        }

        // Check database/settings/ for settings migrations
        if (is_dir($settingsPath)) {
            foreach (self::SETTINGS_MIGRATION_FILES as $filename) {
                $pattern = $settingsPath.'/*'.$filename;
                $matches = glob($pattern);
                if ($matches !== false) {
                    $found = [...$found, ...$matches];
                }
            }
        }

        return $found;
    }

    protected function cleanupPublishedConfig(): void
    {
        $configPath = config_path('fin-mail.php');

        if (! file_exists($configPath)) {
            return;
        }

        if (! $this->confirm('Delete published config file? (config/fin-mail.php)', false)) {
            return;
        }

        unlink($configPath);
        $this->info('  Deleted: config/fin-mail.php');
    }

    protected function cleanupPublishedViews(): void
    {
        $viewsPath = resource_path('views/vendor/fin-mail');

        if (! is_dir($viewsPath)) {
            return;
        }

        if (! $this->confirm('Delete published view files? (resources/views/vendor/fin-mail/)', false)) {
            return;
        }

        $this->deleteDirectory($viewsPath);
        $this->info('  Deleted: resources/views/vendor/fin-mail/');
    }

    protected function cleanupPublishedTranslations(): void
    {
        $translationsPath = lang_path('vendor/fin-mail');

        if (! is_dir($translationsPath)) {
            return;
        }

        if (! $this->confirm('Delete published translation files? (lang/vendor/fin-mail/)', false)) {
            return;
        }

        $this->deleteDirectory($translationsPath);
        $this->info('  Deleted: lang/vendor/fin-mail/');
    }

    protected function clearCaches(): void
    {
        $this->comment('Clearing caches...');

        $this->callSilently('settings:clear-cache');
        $this->info('  Settings cache cleared');

        $this->callSilently('cache:clear');
        $this->info('  Application cache cleared');
    }

    protected function deleteDirectory(string $directory): void
    {
        $items = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST,
        );

        foreach ($items as $item) {
            if ($item->isDir()) {
                rmdir($item->getRealPath());
            } else {
                unlink($item->getRealPath());
            }
        }

        rmdir($directory);
    }
}
