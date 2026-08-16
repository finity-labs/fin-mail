<?php

declare(strict_types=1);

use FinityLabs\FinMail\Actions\SentEmailResender;
use FinityLabs\FinMail\Enums\EmailStatus;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\SentEmail;
use FinityLabs\FinMail\Settings\BrandingSettings;
use FinityLabs\FinMail\Settings\GeneralSettings;
use FinityLabs\FinMail\Settings\LoggingSettings;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    BrandingSettings::fake(BrandingSettings::defaults(), loadMissingValues: false);
    GeneralSettings::fake(GeneralSettings::defaults(), loadMissingValues: false);
    LoggingSettings::fake(LoggingSettings::defaults(), loadMissingValues: false);

    $this->template = EmailTemplate::create([
        'key' => 'resend-test',
        'name' => ['en' => 'Resend Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Live template body</p>'],
        'is_active' => true,
    ]);

    Storage::fake('local');
    Mail::fake();
});

function createSentEmailLog(array $overrides = []): SentEmail
{
    return SentEmail::create(array_merge([
        'email_template_id' => test()->template->id,
        'sender' => 'noreply@example.com',
        'to' => ['a@example.com'],
        'cc' => [],
        'bcc' => [],
        'subject' => 'Original subject',
        'rendered_body' => '<html><body>Stored body, not the live template</body></html>',
        'attachments' => [],
        'status' => EmailStatus::Sent,
    ], $overrides));
}

it('resends the stored HTML verbatim and links the new log entry', function () {
    $original = createSentEmailLog();

    $newLog = app(SentEmailResender::class)->resend($original);

    expect($newLog->metadata)->toBe(['resent_from' => $original->id])
        ->and($newLog->subject)->toBe('Original subject')
        ->and($newLog->rendered_body)->toBe($original->rendered_body);

    Mail::assertQueued(TemplateMail::class, function (TemplateMail $mail): bool {
        $content = $mail->content();

        // Raw passthrough: stored HTML, not a re-render of the live template
        return $content->view === 'fin-mail::email.raw'
            && str_contains($content->with['body'], 'Stored body');
    });
});

it('re-attaches original files that still exist on disk', function () {
    Storage::disk('local')->put('email-attachments/report.pdf', 'pdf');

    $original = createSentEmailLog([
        'attachments' => [
            ['name' => 'report.pdf', 'path' => 'email-attachments/report.pdf', 'source' => 'uploaded'],
            ['name' => 'gone.pdf', 'path' => 'email-attachments/gone.pdf', 'source' => 'uploaded'],
        ],
    ]);

    app(SentEmailResender::class)->resend($original);

    Mail::assertQueued(
        TemplateMail::class,
        fn (TemplateMail $mail): bool => count($mail->attachments()) === 1,
    );
});

it('refuses to resend without a stored body', function () {
    $original = createSentEmailLog(['rendered_body' => null]);

    app(SentEmailResender::class)->resend($original);
})->throws(RuntimeException::class);
