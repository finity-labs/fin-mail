<?php

declare(strict_types=1);

use FinityLabs\FinMail\Enums\EmailStatus;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\SentEmail;
use FinityLabs\FinMail\Settings\BrandingSettings;
use FinityLabs\FinMail\Settings\GeneralSettings;
use FinityLabs\FinMail\Settings\LoggingSettings;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;

beforeEach(function () {
    BrandingSettings::fake(BrandingSettings::defaults(), loadMissingValues: false);
    GeneralSettings::fake(GeneralSettings::defaults(), loadMissingValues: false);
    LoggingSettings::fake(LoggingSettings::defaults(), loadMissingValues: false);

    EmailTemplate::create([
        'key' => 'logging-test',
        'name' => ['en' => 'Logging Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello Log'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
    ]);
});

function createTestUser(): AuthUser
{
    $user = new class extends AuthUser
    {
        protected $table = 'users';

        protected $guarded = [];
    };

    $user->forceFill(['name' => 'Jane Sender', 'email' => 'jane@example.com'])->save();

    return $user;
}

it('automatically creates a log entry when logging is enabled', function () {
    Mail::to('john@example.com')->send(TemplateMail::make('logging-test'));

    expect(SentEmail::count())->toBe(1);

    $log = SentEmail::first();

    expect($log->to)->toBe(['john@example.com'])
        ->and($log->status)->toBe(EmailStatus::Sent)
        ->and($log->subject)->toBe('Hello Log')
        ->and($log->sent_by)->toBeNull()
        ->and($log->sent_at)->not->toBeNull()
        ->and($log->rendered_body)->not->toBeNull();
});

it('does not create a log entry when logging is disabled', function () {
    LoggingSettings::fake(['enabled' => false] + LoggingSettings::defaults(), loadMissingValues: false);

    Mail::to('john@example.com')->send(TemplateMail::make('logging-test'));

    expect(SentEmail::count())->toBe(0);
});

it('does not create a log entry when logging is opted out', function () {
    Mail::to('john@example.com')->send(
        TemplateMail::make('logging-test')->withoutLogging()
    );

    expect(SentEmail::count())->toBe(0);
});

it('forces a log entry with withLogging when logging is disabled in settings', function () {
    LoggingSettings::fake(['enabled' => false] + LoggingSettings::defaults(), loadMissingValues: false);

    Mail::to('john@example.com')->send(
        TemplateMail::make('logging-test')->withLogging()
    );

    expect(SentEmail::count())->toBe(1);
});

it('updates an injected log record instead of creating a new one', function () {
    $log = SentEmail::create([
        'sender' => 'hello@example.com',
        'to' => ['john@example.com'],
        'subject' => 'Injected',
        'status' => EmailStatus::Queued,
    ]);

    Mail::to('john@example.com')->send(
        TemplateMail::make('logging-test')->withLogging($log)
    );

    expect(SentEmail::count())->toBe(1)
        ->and($log->refresh()->status)->toBe(EmailStatus::Sent);
});

it('captures the authenticated user when the mailable is built', function () {
    $user = createTestUser();

    $this->actingAs($user);

    $mail = TemplateMail::make('logging-test');

    Auth::logout();

    Mail::to('john@example.com')->send($mail);

    expect(SentEmail::first()->sent_by)->toEqual($user->id);
});

it('logs queued mail at dispatch time with the dispatching user', function () {
    Queue::fake();

    $user = createTestUser();

    $this->actingAs($user);

    Mail::to('john@example.com')->queue(TemplateMail::make('logging-test'));

    expect(SentEmail::count())->toBe(1);

    $log = SentEmail::first();

    expect($log->status)->toBe(EmailStatus::Queued)
        ->and($log->sent_by)->toEqual($user->id)
        ->and($log->sent_at)->toBeNull();
});

it('records cc and bcc recipients on the log entry', function () {
    Mail::to('john@example.com')
        ->cc('carbon@example.com')
        ->bcc('blind@example.com')
        ->send(TemplateMail::make('logging-test'));

    $log = SentEmail::first();

    expect($log->cc)->toBe(['carbon@example.com'])
        ->and($log->bcc)->toBe(['blind@example.com']);
});

it('keeps the rendered body out of the log with withoutStoringRenderedBody', function () {
    Mail::to('john@example.com')->send(
        TemplateMail::make('logging-test')->withoutStoringRenderedBody()
    );

    $log = SentEmail::first();

    expect($log->status)->toBe(EmailStatus::Sent)
        ->and($log->rendered_body)->toBeNull();
});

it('marks the log entry as failed when sending throws', function () {
    $mail = TemplateMail::make('logging-test')->overrideView('nonexistent-view::missing');
    $mail->to('john@example.com');

    try {
        $mail->send(app('mailer'));
    } catch (Throwable) {
        // Expected — the view does not exist.
    }

    $log = SentEmail::first();

    expect($log)->not->toBeNull()
        ->and($log->status)->toBe(EmailStatus::Failed)
        ->and($log->metadata['error'] ?? null)->not->toBeNull();
});
