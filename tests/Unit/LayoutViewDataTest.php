<?php

declare(strict_types=1);

use FinityLabs\FinMail\Mail\EmailLayout;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\EmailTheme;
use Illuminate\Support\Facades\View;

beforeEach(function () {
    fakeFinMailSettings();
    View::addNamespace('fixtures', __DIR__.'/../Fixtures/views');

    EmailTemplate::create([
        'key' => 'view-data',
        'name' => ['en' => 'View Data', 'hu' => 'Nézet adat'],
        'category' => 'account',
        'subject' => ['en' => 'Hello', 'hu' => 'Szia', 'ar' => 'مرحبا'],
        'body' => ['en' => '<p>English body</p>', 'hu' => '<p>Magyar törzs</p>', 'ar' => '<p>نص</p>'],
        'is_active' => true,
    ]);
});

it('passes the locale, direction and template to the layout', function () {
    $with = TemplateMail::make('view-data', 'hu')->content()->with;

    expect($with['locale'])->toBe('hu')
        ->and($with['direction'])->toBe('ltr')
        ->and($with['template'])->toBe(['key' => 'view-data', 'category' => 'account']);
});

it('prints the email language in the default layout', function (string $locale, string $lang, string $text) {
    $html = TemplateMail::make('view-data', $locale)->render();

    expect($html)->toContain("<html lang=\"{$lang}\" dir=\"ltr\"")
        ->toContain($text);
})->with([
    'hungarian' => ['hu', 'hu', 'Magyar törzs'],
    'english' => ['en', 'en', 'English body'],
]);

it('marks a right-to-left language in the default layout', function () {
    $html = TemplateMail::make('view-data', 'ar')->render();

    expect($html)->toContain('<html lang="ar" dir="rtl"');
});

it('writes a regional locale the way the lang attribute expects', function () {
    expect(EmailLayout::direction('pt_BR'))->toBe('ltr')
        ->and(EmailLayout::direction('he'))->toBe('rtl')
        ->and(EmailLayout::direction('fa_IR'))->toBe('rtl');

    $html = EmailLayout::renderPreview('<p>Olá</p>', locale: 'pt_BR');

    expect($html)->toContain('<html lang="pt-BR"');
});

it('hands data passed with with() to a host layout, and previews leave it out', function () {
    config()->set('fin-mail.layout', 'fixtures::layouts.plain');

    $sent = TemplateMail::make('view-data')->with('hasAccount', 'yes')->render();
    $preview = EmailLayout::renderPreview('<p>Body</p>', template: EmailTemplate::where('key', 'view-data')->first());

    expect($sent)->toContain('LAYOUT:plain|view-data|account|yes|')
        ->and($preview)->toContain('LAYOUT:plain|view-data|account|no-host-data|');
});

it('renders one email in another theme without saving anything', function () {
    $own = EmailTheme::create(['name' => 'Own', 'colors' => ['button_bg' => '#111111']]);
    $other = EmailTheme::create(['name' => 'Other', 'colors' => ['button_bg' => '#222222']]);

    $template = EmailTemplate::where('key', 'view-data')->first();
    $template->update([
        'email_theme_id' => $own->id,
        'body' => ['en' => '<p>Hi</p><div data-type="customBlock" data-config="{&quot;label&quot;:&quot;Go&quot;,&quot;url&quot;:&quot;https://example.com&quot;}" data-id="emailButton"></div>'],
    ]);
    $updatedAt = $template->fresh()->updated_at;

    $mail = TemplateMail::make('view-data')->overrideTheme($other);
    $with = $mail->content()->with;

    expect($with['theme']['button_bg'])->toBe('#222222')
        ->and($with['body'])->toContain('background-color: #222222')
        ->and($template->fresh()->email_theme_id)->toBe($own->id)
        ->and($template->fresh()->updated_at->equalTo($updatedAt))->toBeTrue()
        ->and(TemplateMail::make('view-data')->content()->with['theme']['button_bg'])->toBe('#111111');
});

it('applies overrideTheme() on the overrideBody() path as well', function () {
    $other = EmailTheme::create(['name' => 'Other', 'colors' => ['footer_bg' => '#333333']]);

    $html = TemplateMail::make('view-data')
        ->overrideBody('<p>Composed</p>')
        ->overrideTheme($other)
        ->render();

    expect($html)->toContain('background-color: #333333');
});

it('renders the blocks of an unsaved preview in the email\'s language, as it does for a saved body', function () {
    config()->set('fin-mail.layout', 'fixtures::layouts.other');
    app()->setLocale('en');

    // No label set: the button falls back on the translated default label.
    $saved = '<div data-type="customBlock" data-config="{&quot;url&quot;:&quot;#&quot;}" data-id="emailButton"></div>';
    $unsaved = ['type' => 'doc', 'content' => [
        ['type' => 'customBlock', 'attrs' => ['id' => 'emailButton', 'config' => ['url' => '#']]],
    ]];

    expect(EmailLayout::renderPreview($saved, locale: 'hu'))->toContain('Kattintson ide')
        ->and(EmailLayout::renderPreview($unsaved, locale: 'hu'))->toContain('Kattintson ide')
        ->and(app()->getLocale())->toBe('en');
});

it('keeps lang on the language a mail without a locale was rendered in before it was queued', function () {
    app()->setLocale('hu');

    $mail = TemplateMail::make('view-data');
    // What queueing does when logging is on: the subject is rendered for the log entry.
    $mail->envelope();
    $payload = serialize($mail);

    // The worker runs in another language.
    app()->setLocale('en');

    /** @var TemplateMail $restored */
    $restored = unserialize($payload);
    $with = $restored->content()->with;

    expect($with['body'])->toContain('Magyar törzs')
        ->and($with['locale'])->toBe('hu');
});
