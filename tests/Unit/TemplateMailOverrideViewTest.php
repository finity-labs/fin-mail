<?php

declare(strict_types=1);

use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Settings\BrandingSettings;

beforeEach(function () {
    BrandingSettings::fake(BrandingSettings::defaults(), loadMissingValues: false);

    EmailTemplate::create([
        'key' => 'override-view-test',
        'name' => ['en' => 'Override View Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
    ]);
});

it('renders with the default package view when no override is set', function () {
    $mail = TemplateMail::make('override-view-test');

    expect($mail->content()->view)->toBe('fin-mail::email.default');
});

it('renders with a custom view when overrideView() is called', function () {
    $mail = TemplateMail::make('override-view-test')
        ->overrideView('emails.custom-layout');

    expect($mail->content()->view)->toBe('emails.custom-layout');
});

it('returns the mailable instance for chaining', function () {
    $mail = TemplateMail::make('override-view-test');

    expect($mail->overrideView('emails.custom-layout'))->toBe($mail);
});

it('passes the default view variables to a custom view', function () {
    $mail = TemplateMail::make('override-view-test')
        ->overrideView('emails.custom-layout')
        ->with('customVar', 'hello world');

    $with = $mail->content()->with;

    expect($with)->toHaveKeys(['body', 'preheader', 'theme', 'branding', 'customVar'])
        ->and($with['customVar'])->toBe('hello world');
});
