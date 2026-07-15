<?php

declare(strict_types=1);

use FinityLabs\FinMail\Models\EmailTheme;

it('resolves the configured default theme colors', function () {
    EmailTheme::create([
        'name' => 'Default',
        'colors' => ['primary' => '#FF0000'],
        'is_default' => true,
    ]);

    expect(EmailTheme::resolvedDefaultColors())->toMatchArray(['primary' => '#FF0000']);
});

it('resolves the hardcoded defaults when no default theme exists', function () {
    expect(EmailTheme::resolvedDefaultColors())->toBe(EmailTheme::defaultColors());
});

it('merges default theme colors over the hardcoded defaults', function () {
    EmailTheme::create([
        'name' => 'Default',
        'colors' => ['primary' => '#FF0000'],
        'is_default' => true,
    ]);

    // primary overridden, other keys retained from hardcoded defaults
    expect(EmailTheme::resolvedDefaultColors())
        ->toMatchArray([
            'primary' => '#FF0000',
            'button_text' => EmailTheme::defaultColors()['button_text'],
        ]);
});
