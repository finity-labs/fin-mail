<?php

declare(strict_types=1);

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('fin-mail-branding.logo', null);
        $this->migrator->add('fin-mail-branding.logo_width', 200);
        $this->migrator->add('fin-mail-branding.logo_height', 50);
        $this->migrator->add('fin-mail-branding.content_width', 600);
        $this->migrator->add('fin-mail-branding.primary_color', '#4F46E5');
        $this->migrator->add('fin-mail-branding.footer_links', []);
        $this->migrator->add('fin-mail-branding.customer_service_email', null);
        $this->migrator->add('fin-mail-branding.customer_service_phone', null);
    }
};
