<?php

declare(strict_types=1);

use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Settings\BrandingSettings;

beforeEach(function () {
    BrandingSettings::fake(BrandingSettings::defaults(), loadMissingValues: false);

    EmailTemplate::create([
        'key' => 'override-body-test',
        'name' => ['en' => 'Override Body Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Original</p>'],
        'is_active' => true,
    ]);
});

it('expands button custom blocks in an overridden body', function () {
    $config = htmlspecialchars((string) json_encode([
        'label' => 'Click Me',
        'url' => 'https://example.com',
        'align' => 'center',
    ]), ENT_QUOTES);

    $body = '<p>Hi</p><div data-type="customBlock" data-id="emailButton" data-config="'.$config.'">preview</div>';

    $mail = TemplateMail::make('override-body-test')
        ->overrideBody($body);

    $rendered = $mail->content()->with['body'];

    expect($rendered)
        ->toContain('<a href="https://example.com"')
        ->toContain('Click Me')
        ->not->toContain('data-type="customBlock"');
});
