<?php

declare(strict_types=1);

use FinityLabs\FinMail\FinMailServiceProvider;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\SentEmail;
use FinityLabs\FinMail\Settings\BrandingSettings;
use FinityLabs\FinMail\Settings\GeneralSettings;
use FinityLabs\FinMail\Settings\LoggingSettings;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

beforeEach(function () {
    BrandingSettings::fake(BrandingSettings::defaults(), loadMissingValues: false);
    GeneralSettings::fake(GeneralSettings::defaults(), loadMissingValues: false);
    LoggingSettings::fake(LoggingSettings::defaults(), loadMissingValues: false);

    Route::get('password-reset/{token}', fn () => '')->name('password.reset');
    Route::get('email/verify/{id}/{hash}', fn () => '')->name('verification.verify');

    $provider = new FinMailServiceProvider(app());

    (new ReflectionMethod($provider, 'registerVerificationOverride'))->invoke($provider);
    (new ReflectionMethod($provider, 'registerPasswordResetOverride'))->invoke($provider);
});

afterEach(function () {
    VerifyEmail::toMailUsing(null);
    ResetPassword::toMailUsing(null);
});

function createAuthTemplate(string $key, bool $active = true): EmailTemplate
{
    return EmailTemplate::create([
        'key' => $key,
        'name' => ['en' => $key],
        'category' => 'system',
        'subject' => ['en' => 'Auth: '.$key],
        'body' => ['en' => '<p>Hello {{ user.name }}, visit {{ url }}</p>'],
        'is_active' => $active,
    ]);
}

class OverrideTestUser extends AuthUser
{
    protected $table = 'users';

    protected $guarded = [];
}

function createOverrideTestUser(): AuthUser
{
    $user = new OverrideTestUser;

    $user->forceFill(['name' => 'Jane', 'email' => 'jane@example.com'])->save();

    return $user;
}

it('uses the template for verification emails when it exists', function () {
    createAuthTemplate('user-verify-email');

    $mail = (new VerifyEmail)->toMail(createOverrideTestUser());

    expect($mail)->toBeInstanceOf(TemplateMail::class);
});

it('logs verification emails without storing the rendered body', function () {
    createAuthTemplate('user-verify-email');

    $mail = (new VerifyEmail)->toMail(createOverrideTestUser());

    Mail::send($mail);

    $log = SentEmail::first();

    expect($log)->not->toBeNull()
        ->and($log->subject)->toBe('Auth: user-verify-email')
        ->and($log->rendered_body)->toBeNull();
});

it('falls back to the default verification mail when the template is missing', function () {
    $mail = (new VerifyEmail)->toMail(createOverrideTestUser());

    expect($mail)->toBeInstanceOf(MailMessage::class);
});

it('falls back to the default verification mail when the template is inactive', function () {
    createAuthTemplate('user-verify-email', active: false);

    $mail = (new VerifyEmail)->toMail(createOverrideTestUser());

    expect($mail)->toBeInstanceOf(MailMessage::class);
});

it('uses the template for password reset emails when it exists', function () {
    createAuthTemplate('user-password-reset');

    $mail = (new ResetPassword('test-token'))->toMail(createOverrideTestUser());

    expect($mail)->toBeInstanceOf(TemplateMail::class);
});

it('logs password reset emails without storing the rendered body', function () {
    createAuthTemplate('user-password-reset');

    Mail::send((new ResetPassword('test-token'))->toMail(createOverrideTestUser()));

    $log = SentEmail::first();

    expect($log)->not->toBeNull()
        ->and($log->rendered_body)->toBeNull();
});

it('falls back to the default password reset mail when the template is missing', function () {
    $mail = (new ResetPassword('test-token'))->toMail(createOverrideTestUser());

    expect($mail)->toBeInstanceOf(MailMessage::class)
        ->and($mail->actionUrl)->toContain('test-token');
});

it('stores the rendered auth email body when the config opts in', function () {
    config()->set('fin-mail.auth_emails.store_rendered_body', true);

    createAuthTemplate('user-password-reset');

    Mail::send((new ResetPassword('test-token'))->toMail(createOverrideTestUser()));

    $log = SentEmail::first();

    expect($log)->not->toBeNull()
        ->and($log->rendered_body)->not->toBeNull()
        ->and($log->rendered_body)->toContain('test-token');
});
