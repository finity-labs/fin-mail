<?php

declare(strict_types=1);

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('fin-mail.default_from_address', config('mail.from.address', 'hello@example.com'));
        $this->migrator->add('fin-mail.default_from_name', config('mail.from.name', 'Example'));
        $this->migrator->add('fin-mail.additional_senders', []);
        $this->migrator->add('fin-mail.default_locale', config('app.locale', 'en'));
        $this->migrator->add('fin-mail.languages', [
            'en' => ['display' => 'English', 'flag-icon' => 'gb'],
        ]);
        $this->migrator->add('fin-mail.categories', [
            'transactional' => 'Transactional',
            'marketing' => 'Marketing',
            'system' => 'System',
            'notification' => 'Notification',
        ]);
    }
};
