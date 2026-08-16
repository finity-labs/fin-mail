<?php

declare(strict_types=1);

use FinityLabs\FinMail\Models\EmailTemplate;
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

it('ignores null and empty stored colors when resolving', function () {
    $theme = EmailTheme::create([
        'name' => 'Sparse',
        'colors' => ['primary' => '#FF0000', 'button_bg' => null, 'border' => ''],
        'is_default' => false,
    ]);

    expect($theme->resolvedColors())
        ->toMatchArray([
            'primary' => '#FF0000',
            'button_bg' => EmailTheme::defaultColors()['button_bg'],
            'border' => EmailTheme::defaultColors()['border'],
        ]);
});

it('keeps only one default theme when a new default is created', function () {
    $first = EmailTheme::create(['name' => 'First', 'colors' => [], 'is_default' => true]);
    $second = EmailTheme::create(['name' => 'Second', 'colors' => [], 'is_default' => true]);

    expect($first->fresh()->is_default)->toBeFalse()
        ->and($second->fresh()->is_default)->toBeTrue()
        ->and(EmailTheme::where('is_default', true)->count())->toBe(1);
});

it('keeps only one default theme when an existing theme is promoted', function () {
    $first = EmailTheme::create(['name' => 'First', 'colors' => [], 'is_default' => true]);
    $second = EmailTheme::create(['name' => 'Second', 'colors' => [], 'is_default' => false]);

    $second->update(['is_default' => true]);

    expect($first->fresh()->is_default)->toBeFalse()
        ->and(EmailTheme::where('is_default', true)->count())->toBe(1);
});

it('does not disturb the default theme when saving a non-default one', function () {
    $default = EmailTheme::create(['name' => 'Default', 'colors' => [], 'is_default' => true]);
    $other = EmailTheme::create(['name' => 'Other', 'colors' => [], 'is_default' => false]);

    $other->update(['name' => 'Renamed']);

    expect($default->fresh()->is_default)->toBeTrue();
});

it('detaches templates when a theme is deleted, on any delete path', function () {
    $theme = EmailTheme::create(['name' => 'Doomed', 'colors' => [], 'is_default' => false]);

    $template = EmailTemplate::create([
        'key' => 'theme-detach-test',
        'name' => ['en' => 'Theme Detach Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
        'email_theme_id' => $theme->id,
    ]);

    // Same iteration shape Filament's DeleteBulkAction uses
    EmailTheme::whereKey($theme->id)->get()->each->delete();

    expect($template->fresh()->email_theme_id)->toBeNull();
});
