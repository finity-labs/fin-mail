<?php

declare(strict_types=1);

use FinityLabs\FinMail\Actions\EmailSender;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Resources\EmailTemplateResource\Pages\ComposeEmail;
use FinityLabs\FinMail\Settings\BrandingSettings;
use FinityLabs\FinMail\Settings\GeneralSettings;
use FinityLabs\FinMail\Settings\LoggingSettings;
use Illuminate\Support\Facades\Mail;

/**
 * Invokes the page's protected recipient grouping without booting Livewire;
 * the method is pure and only reshapes the recipient list.
 *
 * @param  list<string>  $recipients
 *
 * @return list<list<string>>
 */
function resolveRecipientGroups(array $recipients, ?string $sendMode): array
{
    $page = (new ReflectionClass(ComposeEmail::class))->newInstanceWithoutConstructor();

    $method = new ReflectionMethod($page, 'resolveRecipientGroups');
    $method->setAccessible(true);

    return $method->invoke($page, $recipients, $sendMode);
}

it('sends one email per recipient in individual mode', function () {
    expect(resolveRecipientGroups(['a@example.com', 'b@example.com'], 'individual'))
        ->toBe([['a@example.com'], ['b@example.com']]);
});

it('sends a single combined email in combined mode', function () {
    expect(resolveRecipientGroups(['a@example.com', 'b@example.com'], 'combined'))
        ->toBe([['a@example.com', 'b@example.com']]);
});

it('sends a single email when no mode is chosen', function () {
    expect(resolveRecipientGroups(['a@example.com', 'b@example.com'], null))
        ->toBe([['a@example.com', 'b@example.com']]);
});

it('never splits a single recipient even in individual mode', function () {
    expect(resolveRecipientGroups(['a@example.com'], 'individual'))
        ->toBe([['a@example.com']]);
});

describe('actual delivery', function () {
    beforeEach(function () {
        BrandingSettings::fake(BrandingSettings::defaults(), loadMissingValues: false);
        GeneralSettings::fake(GeneralSettings::defaults(), loadMissingValues: false);
        LoggingSettings::fake(['enabled' => false] + LoggingSettings::defaults(), loadMissingValues: false);

        EmailTemplate::create([
            'key' => 'send-mode-test',
            'name' => ['en' => 'Send Mode Test'],
            'category' => 'transactional',
            'subject' => ['en' => 'Hello'],
            'body' => ['en' => '<p>Body</p>'],
            'is_active' => true,
        ]);

        Mail::fake();
    });

    function sendComposeData(array $to): EmailSender
    {
        return new EmailSender(
            data: [
                'template_key' => 'send-mode-test',
                'locale' => 'en',
                'from' => app(GeneralSettings::class)->default_from_address,
                'to' => $to,
                'cc' => [],
                'bcc' => [],
                'subject' => 'Hello',
                'body' => '<p>Body</p>',
            ],
            record: null,
            templateKey: 'send-mode-test',
        );
    }

    it('addresses every recipient in a single message when sent combined', function () {
        sendComposeData(['a@example.com', 'b@example.com'])->send();

        Mail::assertQueued(TemplateMail::class, 1);
        Mail::assertQueued(TemplateMail::class, fn (TemplateMail $mail): bool => $mail->hasTo('a@example.com') && $mail->hasTo('b@example.com'));
    });

    it('sends a separate message per recipient when sent individually', function () {
        foreach (['a@example.com', 'b@example.com'] as $recipient) {
            sendComposeData([$recipient])->send();
        }

        Mail::assertQueued(TemplateMail::class, 2);
        Mail::assertQueued(TemplateMail::class, fn (TemplateMail $mail): bool => $mail->hasTo('a@example.com') && ! $mail->hasTo('b@example.com'));
        Mail::assertQueued(TemplateMail::class, fn (TemplateMail $mail): bool => $mail->hasTo('b@example.com') && ! $mail->hasTo('a@example.com'));
    });
});

it('pluralizes the individual-send notification body', function () {
    app()->setLocale('en');

    expect(trans_choice('fin-mail::fin-mail.compose.notifications.individual_sent_body', 1, ['count' => 1]))
        ->toBe('Sent 1 individual email.')
        ->and(trans_choice('fin-mail::fin-mail.compose.notifications.individual_sent_body', 3, ['count' => 3]))
        ->toBe('Sent 3 individual emails.');
});
