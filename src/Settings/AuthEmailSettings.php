<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Settings;

use Spatie\LaravelSettings\Settings;

class AuthEmailSettings extends Settings
{
    public bool $override_verification;

    public bool $override_password_reset;

    public bool $override_welcome;

    public static function group(): string
    {
        return 'fin-mail-auth-emails';
    }

    /**
     * @return array<string, mixed>
     */
    public static function defaults(): array
    {
        return [
            'override_verification' => false,
            'override_password_reset' => false,
            'override_welcome' => false,
        ];
    }
}
