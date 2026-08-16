<?php

declare(strict_types=1);

use FinityLabs\FinMail\Actions\EmailSender;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Settings\BrandingSettings;
use FinityLabs\FinMail\Settings\GeneralSettings;
use FinityLabs\FinMail\Settings\LoggingSettings;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    BrandingSettings::fake(BrandingSettings::defaults(), loadMissingValues: false);
    GeneralSettings::fake(GeneralSettings::defaults(), loadMissingValues: false);
    LoggingSettings::fake(['enabled' => false] + LoggingSettings::defaults(), loadMissingValues: false);

    EmailTemplate::create([
        'key' => 'attachment-test',
        'name' => ['en' => 'Attachment Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
    ]);

    Storage::fake('local');
    Mail::fake();
});

it('attaches uploaded files provided under the additional_attachments key', function () {
    Storage::disk('local')->put('email-attachments/invoice.pdf', 'pdf-content');

    (new EmailSender(
        data: [
            'template_key' => 'attachment-test',
            'locale' => 'en',
            'to' => ['a@example.com'],
            'cc' => [],
            'bcc' => [],
            'subject' => 'Hello',
            'body' => '<p>Body</p>',
            'additional_attachments' => ['email-attachments/invoice.pdf'],
        ],
        templateKey: 'attachment-test',
    ))->send();

    Mail::assertQueued(TemplateMail::class, function (TemplateMail $mail): bool {
        $attachments = $mail->attachments();

        return count($attachments) === 1;
    });
});

it('uses the additional_attachments field key on the compose page upload', function () {
    // Regression guard for the field-name mismatch that silently dropped
    // compose-page uploads: the form field must dehydrate to the same key
    // EmailSender reads. Asserted at source level because building the full
    // Filament schema requires a Livewire container.
    $form = file_get_contents(__DIR__.'/../../src/Resources/EmailTemplateResource/Schemas/ComposeEmailForm.php');

    expect($form)->toContain("FileUpload::make('additional_attachments')")
        ->not->toContain("FileUpload::make('attachments')");
});
