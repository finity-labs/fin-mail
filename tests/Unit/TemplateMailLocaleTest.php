<?php

declare(strict_types=1);

use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\SentEmail;
use FinityLabs\FinMail\Settings\BrandingSettings;
use FinityLabs\FinMail\Settings\GeneralSettings;
use FinityLabs\FinMail\Settings\LoggingSettings;
use Illuminate\Support\Facades\Mail;

beforeEach(function () {
    BrandingSettings::fake(BrandingSettings::defaults(), loadMissingValues: false);
    GeneralSettings::fake(GeneralSettings::defaults(), loadMissingValues: false);
    LoggingSettings::fake(LoggingSettings::defaults(), loadMissingValues: false);

    EmailTemplate::create([
        'key' => 'locale-test',
        'name' => ['en' => 'Locale Test', 'hu' => 'Nyelv Teszt'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello', 'hu' => 'Szia'],
        'body' => ['en' => '<p>English body</p>', 'hu' => '<p>Magyar torzs</p>'],
        'is_active' => true,
    ]);

    app()->setLocale('en');
});

it('delivers the requested locale when logging is enabled', function () {
    Mail::to('hu@example.com')->send(TemplateMail::make('locale-test', 'hu'));

    $log = SentEmail::first();

    expect($log->subject)->toBe('Szia')
        ->and($log->rendered_body)->toContain('Magyar torzs')
        ->and($log->rendered_body)->not->toContain('English body');
});

it('delivers the requested locale when logging is disabled', function () {
    LoggingSettings::fake(['enabled' => false] + LoggingSettings::defaults(), loadMissingValues: false);

    $mail = TemplateMail::make('locale-test', 'hu');
    Mail::to('hu@example.com')->send($mail);

    expect($mail->content()->with['body'])->toContain('Magyar torzs');
});

it('delivers the requested locale on a queue round-trip with an overridden subject', function () {
    // EmailSender always overrides the subject, which skips the dispatch-time
    // render memoization in ensureLogEntry() - the body must still come out
    // in the requested locale after serialization.
    $mail = TemplateMail::make('locale-test', 'hu')->overrideSubject('Fixed subject');

    /** @var TemplateMail $restored */
    $restored = unserialize(serialize($mail));

    Mail::to('hu@example.com')->send($restored);

    $log = SentEmail::first();

    expect($log->subject)->toBe('Fixed subject')
        ->and($log->rendered_body)->toContain('Magyar torzs')
        ->and($log->rendered_body)->not->toContain('English body');
});

it('falls back to the app locale when no locale is requested', function () {
    app()->setLocale('hu');

    Mail::to('hu@example.com')->send(TemplateMail::make('locale-test'));

    $log = SentEmail::first();

    expect($log->subject)->toBe('Szia')
        ->and($log->rendered_body)->toContain('Magyar torzs');
});

it('logs the requested locale when the log entry is first created on the worker', function () {
    // If dispatch-time log creation failed, ensureLogEntry() runs again on
    // the worker - after serialization dropped the template model's
    // per-model locale. The render it memoizes must still honor the
    // requested locale.
    $mail = TemplateMail::make('locale-test', 'hu');

    /** @var TemplateMail $restored */
    $restored = unserialize(serialize($mail));

    Mail::to('hu@example.com')->send($restored);

    $log = SentEmail::first();

    expect($log->subject)->toBe('Szia')
        ->and($log->rendered_body)->toContain('Magyar torzs');
});
