<?php

declare(strict_types=1);

use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Settings\BrandingSettings;
use Illuminate\Support\Facades\URL;

function fakeBrandingWithLogo(?string $logo): BrandingSettings
{
    return BrandingSettings::fake(
        [...BrandingSettings::defaults(), 'logo' => $logo],
        loadMissingValues: false,
    );
}

beforeEach(function () {
    URL::forceScheme('https');
    URL::forceRootUrl('https://mail.example.com');
});

it('returns null when no logo is configured', function () {
    expect(fakeBrandingWithLogo(null)->resolvedLogo())->toBeNull();
});

it('returns null for an empty logo string', function () {
    expect(fakeBrandingWithLogo('')->resolvedLogo())->toBeNull();
});

it('leaves an absolute https url unchanged', function () {
    $logo = 'https://cdn.example.com/logo.png';

    expect(fakeBrandingWithLogo($logo)->resolvedLogo())->toBe($logo);
});

it('leaves an absolute http url unchanged', function () {
    $logo = 'http://cdn.example.com/logo.png';

    expect(fakeBrandingWithLogo($logo)->resolvedLogo())->toBe($logo);
});

it('leaves a protocol-relative url unchanged', function () {
    $logo = '//cdn.example.com/logo.png';

    expect(fakeBrandingWithLogo($logo)->resolvedLogo())->toBe($logo);
});

it('leaves a data uri unchanged', function () {
    $logo = 'data:image/png;base64,iVBORw0KGgo=';

    expect(fakeBrandingWithLogo($logo)->resolvedLogo())->toBe($logo);
});

it('leaves an uppercase data uri unchanged', function () {
    $logo = 'DATA:image/png;base64,iVBORw0KGgo=';

    expect(fakeBrandingWithLogo($logo)->resolvedLogo())->toBe($logo);
});

it('resolves an app-relative path against the app url', function () {
    expect(fakeBrandingWithLogo('/images/logo.png')->resolvedLogo())
        ->toBe('https://mail.example.com/images/logo.png');
});

it('resolves a relative path without a leading slash', function () {
    expect(fakeBrandingWithLogo('images/logo.png')->resolvedLogo())
        ->toBe('https://mail.example.com/images/logo.png');
});

it('passes the resolved logo through to the mailable branding', function () {
    fakeBrandingWithLogo('/images/logo.png');

    EmailTemplate::create([
        'key' => 'logo-resolution-test',
        'name' => ['en' => 'Logo Resolution Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
    ]);

    $branding = TemplateMail::make('logo-resolution-test')
        ->content()
        ->with['branding'];

    expect($branding['logo'])->toBe('https://mail.example.com/images/logo.png');
});
