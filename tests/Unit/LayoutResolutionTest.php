<?php

declare(strict_types=1);

use FinityLabs\FinMail\Mail\EmailLayout;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use Illuminate\Support\Facades\View;

beforeEach(function () {
    fakeFinMailSettings();
    View::addNamespace('fixtures', __DIR__.'/../Fixtures/views');
});

function layoutTemplate(string $key, ?string $viewPath = null, array $attributes = []): EmailTemplate
{
    return EmailTemplate::create(array_merge([
        'key' => $key,
        'name' => ['en' => 'Layout Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Body text</p>'],
        'is_active' => true,
        'view_path' => $viewPath,
    ], $attributes));
}

it('uses the package layout when nothing is configured', function () {
    layoutTemplate('layout-none');

    expect(TemplateMail::make('layout-none')->content()->view)->toBe('fin-mail::email.default');
});

it('uses the configured default layout for a template without a layout of its own', function () {
    config()->set('fin-mail.layout', 'fixtures::layouts.plain');
    layoutTemplate('layout-config');

    expect(TemplateMail::make('layout-config')->content()->view)->toBe('fixtures::layouts.plain');
});

it('uses the template layout when it is in the configured list', function () {
    config()->set('fin-mail.layout', 'fixtures::layouts.plain');
    config()->set('fin-mail.layouts', ['fixtures::layouts.other' => 'Other']);
    layoutTemplate('layout-template', 'fixtures::layouts.other');

    expect(TemplateMail::make('layout-template')->content()->view)->toBe('fixtures::layouts.other');
});

it('falls back to the default layout when the template layout was removed from the list', function () {
    config()->set('fin-mail.layout', 'fixtures::layouts.plain');
    config()->set('fin-mail.layouts', []);
    layoutTemplate('layout-stale', 'fixtures::layouts.other');

    expect(TemplateMail::make('layout-stale')->content()->view)->toBe('fixtures::layouts.plain');
});

it('lets overrideView() win over the template layout', function () {
    config()->set('fin-mail.layouts', ['fixtures::layouts.other' => 'Other']);
    layoutTemplate('layout-override', 'fixtures::layouts.other');

    $mail = TemplateMail::make('layout-override')->overrideView('fixtures::layouts.plain');

    expect($mail->content()->view)->toBe('fixtures::layouts.plain');
});

it('uses the template layout on the overrideBody() path that Send test and Compose take', function () {
    config()->set('fin-mail.layouts', ['fixtures::layouts.other' => 'Other']);
    layoutTemplate('layout-send-test', 'fixtures::layouts.other');

    $html = TemplateMail::make('layout-send-test')->overrideBody('<p>Composed</p>')->render();

    expect($html)->toContain('LAYOUT:other')->toContain('<p>Composed</p>');
});

it('renders previews in the template layout', function () {
    config()->set('fin-mail.layouts', ['fixtures::layouts.other' => 'Other']);
    $template = layoutTemplate('layout-preview', 'fixtures::layouts.other');

    $html = EmailLayout::renderPreview('<p>Preview body</p>', template: $template);

    expect($html)->toContain('LAYOUT:other')->toContain('<p>Preview body</p>');
});

it('renders an edit-page preview in the layout picked on the form, even when unsaved', function () {
    config()->set('fin-mail.layout', 'fixtures::layouts.plain');
    config()->set('fin-mail.layouts', ['fixtures::layouts.other' => 'Other']);
    $template = layoutTemplate('layout-form', 'fixtures::layouts.other');

    // The form's layout field was cleared: the default layout applies.
    $html = EmailLayout::renderPreview('<p>Body</p>', template: $template, viewPath: '');

    expect($html)->toContain('LAYOUT:plain');
});

it('renders the preview component through the same layout', function () {
    config()->set('fin-mail.layouts', ['fixtures::layouts.other' => 'Other']);
    $template = layoutTemplate('layout-component', 'fixtures::layouts.other');

    $html = view('fin-mail::components.email-preview', [
        'subject' => 'Hello',
        'html' => '<p>Component body</p>',
        'template' => $template,
        'locale' => 'en',
    ])->render();

    expect($html)->toContain('LAYOUT:other');
});

it('lists the configured layouts with translated labels', function () {
    config()->set('fin-mail.layouts', [
        'fixtures::layouts.plain' => 'fin-mail::fin-mail.template.fields.layout',
        'fixtures::layouts.other' => '',
    ]);

    expect(EmailLayout::options())->toBe([
        'fixtures::layouts.plain' => 'Layout',
        'fixtures::layouts.other' => 'fixtures::layouts.other',
    ])->and(EmailLayout::hasOptions())->toBeTrue();

    config()->set('fin-mail.layouts', []);

    expect(EmailLayout::hasOptions())->toBeFalse();
});
