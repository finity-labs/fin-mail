<?php

declare(strict_types=1);

use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Settings\BrandingSettings;
use FinityLabs\FinMail\Settings\GeneralSettings;

beforeEach(function () {
    BrandingSettings::fake(BrandingSettings::defaults(), loadMissingValues: false);
    GeneralSettings::fake(GeneralSettings::defaults(), loadMissingValues: false);

    EmailTemplate::create([
        'key' => 'raw-body-test',
        'name' => ['en' => 'Raw Body Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Original Subject'],
        'body' => ['en' => '<p>Template body</p>'],
        'is_active' => true,
    ]);
});

it('sends a raw body verbatim without wrapping it in the layout', function () {
    // Resending a stored email must not nest the full stored document inside
    // the layout again — that produced two doctypes and a broken logo/footer. (#25)
    $stored = "<!DOCTYPE html>\n<html><body><p>Original content</p></body></html>";

    $html = TemplateMail::make('raw-body-test')
        ->overrideSubject('Resent')
        ->rawBody($stored)
        ->render();

    expect(substr_count($html, '<!DOCTYPE'))->toBe(1)
        ->and($html)->toContain('<p>Original content</p>')
        ->and($html)->not->toContain('Template body');
});

it('does not re-run token replacement or custom blocks on a raw body', function () {
    $stored = '<html><body><p>Hello {{ user.name }}</p><div data-type="customBlock" data-id="emailButton">x</div></body></html>';

    $html = TemplateMail::make('raw-body-test')
        ->rawBody($stored)
        ->render();

    expect($html)->toContain('{{ user.name }}')
        ->and($html)->toContain('data-type="customBlock"');
});
