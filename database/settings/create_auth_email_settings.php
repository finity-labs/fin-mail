<?php

declare(strict_types=1);

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('fin-mail-auth-emails.override_verification', false);
        $this->migrator->add('fin-mail-auth-emails.override_password_reset', false);
        $this->migrator->add('fin-mail-auth-emails.override_welcome', false);
    }
};
