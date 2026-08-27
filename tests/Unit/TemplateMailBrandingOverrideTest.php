<?php

declare(strict_types=1);

use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Settings\BrandingSettings;

beforeEach(function () {
    BrandingSettings::fake([
        'logo' => 'https://example.com/default-logo.png',
        'primary_color' => '#4F46E5',
    ] + BrandingSettings::defaults(), loadMissingValues: false);

    EmailTemplate::create([
        'key' => 'branding-test',
        'name' => ['en' => 'Branding Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
    ]);
});

it('uses the saved branding settings by default', function () {
    $branding = TemplateMail::make('branding-test')->content()->with['branding'];

    expect($branding['logo'])->toContain('default-logo.png')
        ->and($branding['primary_color'])->toBe('#4F46E5');
});

it('drops the logo with withoutLogo', function () {
    $branding = TemplateMail::make('branding-test')
        ->withoutLogo()
        ->content()->with['branding'];

    expect($branding['logo'])->toBeNull()
        ->and($branding['primary_color'])->toBe('#4F46E5');
});

it('overrides individual branding keys and keeps the rest', function () {
    $branding = TemplateMail::make('branding-test')
        ->overrideBranding([
            'logo' => 'https://example.com/partner-logo.png',
            'primary_color' => '#0EA5E9',
        ])
        ->content()->with['branding'];

    expect($branding['logo'])->toBe('https://example.com/partner-logo.png')
        ->and($branding['primary_color'])->toBe('#0EA5E9')
        ->and($branding['content_width'])->toBe(BrandingSettings::defaults()['content_width']);
});

it('keeps branding overrides across queue serialization', function () {
    $mail = TemplateMail::make('branding-test')->withoutLogo();

    /** @var TemplateMail $restored */
    $restored = unserialize(serialize($mail));

    expect($restored->content()->with['branding']['logo'])->toBeNull();
});
