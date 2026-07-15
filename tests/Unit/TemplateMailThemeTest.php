<?php

declare(strict_types=1);

use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\EmailTheme;
use FinityLabs\FinMail\Settings\BrandingSettings;

beforeEach(function () {
    BrandingSettings::fake(BrandingSettings::defaults(), loadMissingValues: false);
});

it('uses the configured default theme when the template has no theme', function () {
    EmailTheme::create([
        'name' => 'Default',
        'colors' => ['primary' => '#FF0000', 'button_bg' => '#00FF00'],
        'is_default' => true,
    ]);

    EmailTemplate::create([
        'key' => 'no-theme-send',
        'name' => ['en' => 'No Theme Send'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
    ]);

    $with = TemplateMail::make('no-theme-send')->content()->with;

    expect($with['theme'])
        ->toMatchArray(['primary' => '#FF0000', 'button_bg' => '#00FF00']);
});

it('uses the template theme over the default theme when one is assigned', function () {
    EmailTheme::create([
        'name' => 'Default',
        'colors' => ['primary' => '#FF0000'],
        'is_default' => true,
    ]);

    $themed = EmailTheme::create([
        'name' => 'Branded',
        'colors' => ['primary' => '#0000FF'],
        'is_default' => false,
    ]);

    EmailTemplate::create([
        'key' => 'themed-send',
        'name' => ['en' => 'Themed Send'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
        'email_theme_id' => $themed->id,
    ]);

    $with = TemplateMail::make('themed-send')->content()->with;

    expect($with['theme'])->toMatchArray(['primary' => '#0000FF']);
});

it('falls back to hardcoded default colors when no theme and no default theme exist', function () {
    EmailTemplate::create([
        'key' => 'bare-send',
        'name' => ['en' => 'Bare Send'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
    ]);

    $with = TemplateMail::make('bare-send')->content()->with;

    expect($with['theme'])->toBe(EmailTheme::defaultColors());
});
