<?php

declare(strict_types=1);

use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\EmailTheme;
use Illuminate\Support\Facades\View;

beforeEach(function () {
    fakeFinMailSettings();
    View::addNamespace('fixtures', __DIR__.'/../Fixtures/views');
});

it('keeps the twelve built-in colors and adds the callout colors', function () {
    expect(EmailTheme::defaultColors())
        ->toMatchArray(EmailTheme::builtInColors())
        ->toMatchArray(EmailTheme::calloutColors())
        ->and(EmailTheme::builtInColors())->toHaveCount(12)
        ->and(array_keys(EmailTheme::calloutColors()))->toBe([
            'info_bg', 'info_text', 'warning_bg', 'warning_text', 'success_bg', 'success_text',
        ]);
});

it('gives a theme saved without a host color key that key\'s default', function () {
    $theme = EmailTheme::create(['name' => 'Saved earlier', 'colors' => ['primary' => '#123456']]);

    config()->set('fin-mail.theme_colors', [
        'header_bg' => ['label' => 'Header background', 'default' => '#0b2545'],
        'accent' => '#f5b700',
    ]);

    expect($theme->resolvedColors())
        ->toMatchArray(['primary' => '#123456', 'header_bg' => '#0b2545', 'accent' => '#f5b700', 'info_bg' => '#eff6ff']);
});

it('lets a theme\'s own value win over a host color default', function () {
    config()->set('fin-mail.theme_colors', ['header_bg' => ['default' => '#0b2545']]);

    $theme = EmailTheme::create(['name' => 'Branded', 'colors' => ['header_bg' => '#ff0000']]);

    expect($theme->resolvedColors()['header_bg'])->toBe('#ff0000');
});

it('reads the extra color definitions from config and skips built-in keys', function () {
    config()->set('fin-mail.theme_colors', [
        'header_bg' => ['label' => 'mail.colors.header', 'default' => '#0b2545'],
        'divider' => '#dddddd',
        'link' => ['default' => '#000000'],
        'not valid' => '#ffffff',
    ]);

    expect(EmailTheme::extraColorDefinitions())->toBe([
        'header_bg' => ['label' => 'mail.colors.header', 'default' => '#0b2545'],
        'divider' => ['label' => 'divider', 'default' => '#dddddd'],
    ])->and(EmailTheme::defaultColors()['link'])->toBe('#4F46E5');
});

it('hands a host color key to the layout', function () {
    config()->set('fin-mail.theme_colors', ['header_bg' => ['default' => '#0b2545']]);
    config()->set('fin-mail.layout', 'fixtures::layouts.plain');

    EmailTemplate::create([
        'key' => 'host-color',
        'name' => ['en' => 'Host Color'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
    ]);

    expect(TemplateMail::make('host-color')->render())->toContain('|#0b2545|');
});

it('shows the host colors and callouts in the theme preview', function () {
    config()->set('fin-mail.theme_colors', ['header_bg' => ['label' => 'Header background', 'default' => '#0b2545']]);

    $html = view('fin-mail::components.theme-preview', ['theme' => EmailTheme::defaultColors()])->render();

    expect($html)->toContain('Header background')
        ->toContain('background-color: #0b2545')
        ->toContain('background-color: #eff6ff');
});

it('paints the footer background in the default layout', function () {
    $theme = EmailTheme::create(['name' => 'Dark footer', 'colors' => ['footer_bg' => '#101010']]);

    EmailTemplate::create([
        'key' => 'footer-bg',
        'name' => ['en' => 'Footer'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
        'email_theme_id' => $theme->id,
    ]);

    expect(TemplateMail::make('footer-bg')->render())
        ->toMatch('/<td class="email-footer" style="[^"]*background-color: #101010;/');
});
