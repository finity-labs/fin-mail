<?php

declare(strict_types=1);

use FinityLabs\FinMail\Actions\EmailSender;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Settings\BrandingSettings;
use FinityLabs\FinMail\Settings\GeneralSettings;
use FinityLabs\FinMail\Settings\LoggingSettings;
use Illuminate\Support\Facades\Mail;

beforeEach(function () {
    BrandingSettings::fake(BrandingSettings::defaults(), loadMissingValues: false);
    GeneralSettings::fake(GeneralSettings::defaults(), loadMissingValues: false);
    LoggingSettings::fake(['enabled' => false] + LoggingSettings::defaults(), loadMissingValues: false);

    EmailTemplate::create([
        'key' => 'tiptap-body-test',
        'name' => ['en' => 'TipTap Body Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Original</p>'],
        'is_active' => true,
    ]);

    Mail::fake();
});

it('sends when the editor produces a TipTap document array instead of an HTML string', function () {
    $sent = (new EmailSender(
        data: [
            'template_key' => 'tiptap-body-test',
            'locale' => 'en',
            'to' => ['a@example.com'],
            'cc' => [],
            'bcc' => [],
            'subject' => 'Hello',
            'body' => [
                'type' => 'doc',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'content' => [['type' => 'text', 'text' => 'Hello from TipTap']],
                    ],
                ],
            ],
        ],
        templateKey: 'tiptap-body-test',
    ))->send();

    expect($sent)->toBeTrue();

    Mail::assertQueued(
        TemplateMail::class,
        fn (TemplateMail $mail): bool => str_contains($mail->content()->with['body'], 'Hello from TipTap'),
    );
});

it('still sends plain HTML string bodies unchanged', function () {
    $sent = (new EmailSender(
        data: [
            'template_key' => 'tiptap-body-test',
            'locale' => 'en',
            'to' => ['a@example.com'],
            'cc' => [],
            'bcc' => [],
            'subject' => 'Hello',
            'body' => '<p>Plain body</p>',
        ],
        templateKey: 'tiptap-body-test',
    ))->send();

    expect($sent)->toBeTrue();

    Mail::assertQueued(
        TemplateMail::class,
        fn (TemplateMail $mail): bool => str_contains($mail->content()->with['body'], 'Plain body'),
    );
});
