<?php

declare(strict_types=1);

use Spatie\LaravelSettings\Exceptions\SettingAlreadyExists;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

/**
 * Loaded straight from the package, so a plain `php artisan migrate` runs
 * it on fresh installs and upgrades alike. The name starts with a letter so
 * it sorts after every timestamped migration, and with them after the
 * settings table's own migration on a fresh install.
 */
return new class extends SettingsMigration
{
    public function up(): void
    {
        try {
            $this->migrator->add('fin-mail-branding.social_links', []);
        } catch (SettingAlreadyExists) {
            // Already there, e.g. folded into the host's own settings migration.
        }
    }

    public function down(): void
    {
        $this->migrator->deleteIfExists('fin-mail-branding.social_links');
    }
};
