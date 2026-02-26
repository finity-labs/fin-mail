<?php

declare(strict_types=1);

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('fin-mail-attachments.max_size_mb', 10);
        $this->migrator->add('fin-mail-attachments.allowed_types', [
            'pdf', 'doc', 'docx', 'xls', 'xlsx', 'csv', 'png', 'jpg', 'jpeg', 'zip',
        ]);
    }
};
