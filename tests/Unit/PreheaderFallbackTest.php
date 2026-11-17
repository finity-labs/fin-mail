<?php

declare(strict_types=1);

use FinityLabs\FinMail\Helpers\InlineStyler;
use FinityLabs\FinMail\Helpers\PreheaderFallback;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\EmailTemplateVersion;
use FinityLabs\FinMail\Resources\EmailTemplateResource\Pages\EditEmailTemplate;

beforeEach(function () {
    fakeFinMailSettings();

    EmailTemplate::create([
        'key' => 'preheader-fallback',
        'name' => ['en' => 'Fallback', 'hu' => 'Tartalék'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello', 'hu' => 'Szia'],
        'preheader' => ['en' => 'The English preheader'],
        'body' => [
            'en' => '<p>Dear {{ user.name }},</p><p>Your order has shipped.</p>',
            'hu' => '<p>Kedves {{ user.name }}!</p><p>A rendelését feladtuk.</p>',
        ],
        'is_active' => true,
    ]);
});

it('is off by default and leaves an empty preheader empty', function () {
    $template = EmailTemplate::where('key', 'preheader-fallback')->first();
    $template->setTranslation('preheader', 'en', '')->save();

    expect(PreheaderFallback::isEnabled())->toBeFalse()
        ->and(TemplateMail::make('preheader-fallback', 'en')->content()->with['preheader'])->toBe('');
});

it('keeps spatie\'s fallback language when the option is off', function () {
    // Today's behavior: a Hungarian email without a hu preheader gets the English one.
    expect(TemplateMail::make('preheader-fallback', 'hu')->content()->with['preheader'])->toBe('The English preheader');
});

it('uses the first paragraph after the greeting when the option is on', function () {
    config()->set('fin-mail.preheader_fallback.enabled', true);

    $with = TemplateMail::make('preheader-fallback', 'hu')
        ->models(['user' => (object) ['name' => 'Anna']])
        ->content()->with;

    // The email's own language only: not the English preheader.
    expect($with['preheader'])->toBe('A rendelését feladtuk.');
});

it('uses a filled preheader as it is', function () {
    config()->set('fin-mail.preheader_fallback.enabled', true);

    expect(TemplateMail::make('preheader-fallback', 'en')->content()->with['preheader'])->toBe('The English preheader');
});

it('falls back on the body that is sent on the overrideBody() path Compose takes', function () {
    config()->set('fin-mail.preheader_fallback.enabled', true);

    // Compose with the preheader field left empty: the form hands over null,
    // so no preheader override is set at all.
    $composed = TemplateMail::make('preheader-fallback', 'hu')
        ->overrideBody('<p>Composed paragraph for the inbox.</p>')
        ->content()->with;

    $emptied = TemplateMail::make('preheader-fallback', 'hu')
        ->overrideBody('<p>Composed paragraph for the inbox.</p>')
        ->overridePreheader('')
        ->content()->with;

    // Not "A rendelését feladtuk.", the stored body's paragraph.
    expect($composed['preheader'])->toBe('Composed paragraph for the inbox.')
        ->and($emptied['preheader'])->toBe('Composed paragraph for the inbox.');
});

it('keeps the template\'s own preheader on the overrideBody() path', function () {
    config()->set('fin-mail.preheader_fallback.enabled', true);

    $with = TemplateMail::make('preheader-fallback', 'en')
        ->overrideBody('<p>Composed paragraph for the inbox.</p>')
        ->content()->with;

    expect($with['preheader'])->toBe('The English preheader');
});

it('reads a preview\'s preheader the way the email does', function () {
    $template = EmailTemplate::where('key', 'preheader-fallback')->first();

    // Fallback off: spatie hands the Hungarian preview the English preheader, as the email gets it.
    expect($template->preheaderIn('hu'))->toBe('The English preheader')
        ->and($template->preheaderIn('en'))->toBe('The English preheader');

    config()->set('fin-mail.preheader_fallback.enabled', true);

    // Fallback on: its own language only, so the preview falls back on the body like the email.
    expect($template->preheaderIn('hu'))->toBe('')
        ->and($template->preheaderIn('en'))->toBe('The English preheader');
});

it('picks a version preview\'s preheader the same way', function () {
    $page = (new ReflectionClass(EditEmailTemplate::class))->newInstanceWithoutConstructor();
    $method = new ReflectionMethod($page, 'versionPreheader');
    $version = new EmailTemplateVersion(['preheader' => ['en' => 'The English preheader']]);

    expect($method->invoke($page, $version, 'hu'))->toBe('The English preheader')
        ->and($method->invoke($page, $version, 'en'))->toBe('The English preheader');

    config()->set('fin-mail.preheader_fallback.enabled', true);

    expect($method->invoke($page, $version, 'hu'))->toBe('')
        ->and($method->invoke($page, $version, 'en'))->toBe('The English preheader');
});

it('skips the greeting, strips tags and collapses whitespace', function () {
    $html = "<p>Kedves Anna!</p>\n<p>Your <strong>new</strong>   listing\n is live &amp; visible.</p><p>Third</p>";

    expect(PreheaderFallback::derive($html))->toBe('Your new listing is live & visible.');
});

it('keeps a short first paragraph that is not a greeting', function () {
    expect(PreheaderFallback::derive('<p>Your order has shipped.</p><p>Details below.</p>'))->toBe('Your order has shipped.');
});

it('cuts at a word boundary', function () {
    $text = 'The import finished with three warnings that need a look before the listings go live tomorrow morning.';

    expect(PreheaderFallback::derive("<p>{$text}</p>", 40))->toBe('The import finished with three warnings…');
});

it('ignores the text of blocks', function () {
    $html = InlineStyler::protect('<table><tr><td><p>Block text</p></td></tr></table>').'<p>Body text</p>';

    expect(PreheaderFallback::derive($html))->toBe('Body text');
});
