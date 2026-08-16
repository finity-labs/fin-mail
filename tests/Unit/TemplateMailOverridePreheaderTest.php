<?php

declare(strict_types=1);

use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Settings\BrandingSettings;

beforeEach(function () {
    BrandingSettings::fake(BrandingSettings::defaults(), loadMissingValues: false);

    EmailTemplate::create([
        'key' => 'override-preheader-test',
        'name' => ['en' => 'Override Preheader Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'preheader' => ['en' => 'Template preheader'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
    ]);
});

it('uses the template preheader when no override is set', function () {
    $mail = TemplateMail::make('override-preheader-test');

    expect($mail->content()->with['preheader'])->toBe('Template preheader');
});

it('delivers an overridden preheader', function () {
    $mail = TemplateMail::make('override-preheader-test')
        ->overridePreheader('Edited preheader');

    expect($mail->content()->with['preheader'])->toBe('Edited preheader');
});

it('replaces tokens in an overridden preheader', function () {
    config()->set('app.name', 'FinApp');

    $mail = TemplateMail::make('override-preheader-test')
        ->overridePreheader('Welcome to {{ config.app.name }}');

    expect($mail->content()->with['preheader'])->toBe('Welcome to FinApp');
});

it('suppresses the template preheader when overridden with an empty string', function () {
    $mail = TemplateMail::make('override-preheader-test')
        ->overridePreheader('');

    expect($mail->content()->with['preheader'])->toBe('');
});
