<?php

declare(strict_types=1);

use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\EmailTheme;
use Illuminate\Database\Eloquent\Model;

beforeEach(function () {
    config()->set('fin-mail.tokens.allowed_config_keys', ['app.name']);
    config()->set('fin-mail.versioning.enabled', true);
    config()->set('fin-mail.versioning.max_versions', 5);
    config()->set('app.name', 'TestApp');
});

it('can create a template with translations', function () {
    $template = EmailTemplate::create([
        'key' => 'test-template',
        'name' => ['en' => 'Test Template'],
        'category' => 'transactional',
        'subject' => ['en' => 'Test Subject'],
        'body' => ['en' => '<p>Hello {{ user.name }}</p>'],
        'is_active' => true,
    ]);

    expect($template)->toBeInstanceOf(EmailTemplate::class)
        ->and($template->key)->toBe('test-template')
        ->and($template->is_active)->toBeTrue()
        ->and($template->getTranslation('name', 'en'))->toBe('Test Template');
});

it('finds template by key', function () {
    EmailTemplate::create([
        'key' => 'welcome',
        'name' => ['en' => 'Welcome'],
        'category' => 'transactional',
        'subject' => ['en' => 'Welcome!'],
        'body' => ['en' => 'Hello'],
        'is_active' => true,
    ]);

    $found = EmailTemplate::findByKey('welcome');

    expect($found)->not->toBeNull()
        ->and($found->key)->toBe('welcome');
});

it('sets locale when finding by key with locale parameter', function () {
    $template = EmailTemplate::create([
        'key' => 'welcome',
        'name' => ['en' => 'Welcome', 'hu' => 'Üdvözöljük'],
        'category' => 'transactional',
        'subject' => ['en' => 'Welcome!', 'hu' => 'Üdvözöljük!'],
        'body' => ['en' => 'Hello', 'hu' => 'Helló'],
        'is_active' => true,
    ]);

    $found = EmailTemplate::findByKey('welcome', 'hu');

    expect($found)->not->toBeNull()
        ->and($found->name)->toBe('Üdvözöljük')
        ->and($found->subject)->toBe('Üdvözöljük!');
});

it('does not find inactive templates', function () {
    EmailTemplate::create([
        'key' => 'disabled',
        'name' => ['en' => 'Disabled'],
        'category' => 'transactional',
        'subject' => ['en' => 'Test'],
        'body' => ['en' => 'Test'],
        'is_active' => false,
    ]);

    $found = EmailTemplate::findByKey('disabled');

    expect($found)->toBeNull();
});

it('renders tokens in subject and body', function () {
    $template = EmailTemplate::create([
        'key' => 'invoice',
        'name' => ['en' => 'Invoice'],
        'category' => 'transactional',
        'subject' => ['en' => 'Invoice from {{ config.app.name }}'],
        'body' => ['en' => '<p>Hello {{ customer.name }}</p>'],
        'is_active' => true,
    ]);

    $customer = new class extends Model
    {
        protected $attributes = ['name' => 'Acme Corp'];
    };

    $rendered = $template->render(['customer' => $customer]);

    expect($rendered['subject'])->toBe('Invoice from TestApp')
        ->and($rendered['body'])->toBe('<p>Hello Acme Corp</p>');
});

it('expands button custom blocks to final html when rendering blocks', function () {
    $config = htmlspecialchars((string) json_encode([
        'label' => 'Click Me',
        'url' => 'https://example.com',
        'align' => 'center',
    ]), ENT_QUOTES);

    $template = EmailTemplate::create([
        'key' => 'with-button',
        'name' => ['en' => 'With Button'],
        'category' => 'transactional',
        'subject' => ['en' => 'Test'],
        'body' => ['en' => '<p>Hi</p><div data-type="customBlock" data-id="emailButton" data-config="'.$config.'">preview</div>'],
        'is_active' => true,
    ]);

    $rendered = $template->render();

    expect($rendered['body'])
        ->toContain('<a href="https://example.com"')
        ->toContain('Click Me')
        ->not->toContain('data-type="customBlock"');
});

it('keeps button custom blocks as editor markup when rendering without blocks', function () {
    $config = htmlspecialchars((string) json_encode([
        'label' => 'Click Me',
        'url' => 'https://example.com',
        'align' => 'center',
    ]), ENT_QUOTES);

    $template = EmailTemplate::create([
        'key' => 'with-button-editable',
        'name' => ['en' => 'With Button Editable'],
        'category' => 'transactional',
        'subject' => ['en' => 'Test'],
        'body' => ['en' => '<p>Hi</p><div data-type="customBlock" data-id="emailButton" data-config="'.$config.'">preview</div>'],
        'is_active' => true,
    ]);

    $rendered = $template->render([], null, renderBlocks: false);

    expect($rendered['body'])
        ->toContain('data-type="customBlock"')
        ->toContain('data-id="emailButton"')
        ->not->toContain('<a href="https://example.com"');
});

it('renders with specific locale', function () {
    $template = EmailTemplate::create([
        'key' => 'greeting',
        'name' => ['en' => 'Greeting', 'hu' => 'Üdvözlet'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello {{ user.name }}', 'hu' => 'Szia {{ user.name }}'],
        'body' => ['en' => '<p>Welcome</p>', 'hu' => '<p>Üdvözöljük</p>'],
        'is_active' => true,
    ]);

    $user = new class extends Model
    {
        protected $attributes = ['name' => 'John'];
    };

    $rendered = $template->render(['user' => $user], 'hu');

    expect($rendered['subject'])->toBe('Szia John')
        ->and($rendered['body'])->toBe('<p>Üdvözöljük</p>');
});

it('stores multiple translations in one record', function () {
    $template = EmailTemplate::create([
        'key' => 'multi-lang',
        'name' => ['en' => 'English Name', 'hu' => 'Magyar Név', 'de' => 'Deutscher Name'],
        'category' => 'transactional',
        'subject' => ['en' => 'English Subject'],
        'body' => ['en' => 'English Body'],
        'is_active' => true,
    ]);

    expect($template->getTranslatedLocales('name'))->toContain('en', 'hu', 'de')
        ->and($template->getTranslation('name', 'hu'))->toBe('Magyar Név')
        ->and($template->getTranslation('name', 'de'))->toBe('Deutscher Name');
});

it('saves version snapshots with all translations', function () {
    $template = EmailTemplate::create([
        'key' => 'versioned',
        'name' => ['en' => 'Versioned'],
        'category' => 'transactional',
        'subject' => ['en' => 'Original Subject', 'hu' => 'Eredeti Tárgy'],
        'body' => ['en' => 'Original Body'],
        'is_active' => true,
    ]);

    $version = $template->saveVersion();

    expect($version->version)->toBe(1)
        ->and($version->subject)->toBe(['en' => 'Original Subject', 'hu' => 'Eredeti Tárgy'])
        ->and($version->body)->toBe(['en' => 'Original Body']);
});

it('increments version numbers', function () {
    $template = EmailTemplate::create([
        'key' => 'multi-version',
        'name' => ['en' => 'Multi Version'],
        'category' => 'transactional',
        'subject' => ['en' => 'V1'],
        'body' => ['en' => 'V1'],
        'is_active' => true,
    ]);

    $template->saveVersion();
    $template->setTranslation('subject', 'en', 'V2');
    $template->save();
    $template->saveVersion();

    expect($template->versions()->count())->toBe(2)
        ->and($template->versions()->max('version'))->toBe(2);
});

it('enforces max version limit', function () {
    $template = EmailTemplate::create([
        'key' => 'max-version',
        'name' => ['en' => 'Max'],
        'category' => 'transactional',
        'subject' => ['en' => 'Test'],
        'body' => ['en' => 'Test'],
        'is_active' => true,
    ]);

    // Create 7 versions (max is 5)
    for ($i = 0; $i < 7; $i++) {
        $template->saveVersion();
    }

    expect($template->versions()->count())->toBe(5);
});

it('restores a previous version with all translations', function () {
    $template = EmailTemplate::create([
        'key' => 'restorable',
        'name' => ['en' => 'Restorable'],
        'category' => 'transactional',
        'subject' => ['en' => 'Original', 'hu' => 'Eredeti'],
        'body' => ['en' => 'Original body'],
        'is_active' => true,
    ]);

    $template->saveVersion();

    $template->setTranslation('subject', 'en', 'Changed');
    $template->setTranslation('subject', 'hu', 'Megváltozott');
    $template->setTranslation('body', 'en', 'Changed body');
    $template->save();

    $result = $template->restoreVersion(1);

    $fresh = $template->fresh();

    expect($result)->toBeTrue()
        ->and($fresh->getTranslation('subject', 'en'))->toBe('Original')
        ->and($fresh->getTranslation('subject', 'hu'))->toBe('Eredeti')
        ->and($fresh->getTranslation('body', 'en'))->toBe('Original body');
});

it('belongs to a theme', function () {
    $theme = EmailTheme::create([
        'name' => 'Default',
        'colors' => EmailTheme::defaultColors(),
        'is_default' => true,
    ]);

    $template = EmailTemplate::create([
        'key' => 'themed',
        'name' => ['en' => 'Themed'],
        'category' => 'transactional',
        'subject' => ['en' => 'Test'],
        'body' => ['en' => 'Test'],
        'is_active' => true,
        'email_theme_id' => $theme->id,
    ]);

    expect($template->theme)->toBeInstanceOf(EmailTheme::class)
        ->and($template->theme->name)->toBe('Default');
});

it('resolves its own theme colors when a theme is assigned', function () {
    $theme = EmailTheme::create([
        'name' => 'Branded',
        'colors' => ['primary' => '#111111', 'button_bg' => '#222222'],
        'is_default' => false,
    ]);

    $template = EmailTemplate::create([
        'key' => 'own-theme',
        'name' => ['en' => 'Own Theme'],
        'category' => 'transactional',
        'subject' => ['en' => 'Test'],
        'body' => ['en' => 'Test'],
        'is_active' => true,
        'email_theme_id' => $theme->id,
    ]);

    expect($template->resolvedThemeColors())
        ->toMatchArray(['primary' => '#111111', 'button_bg' => '#222222']);
});

it('falls back to the default theme colors when no theme is assigned', function () {
    EmailTheme::create([
        'name' => 'Default',
        'colors' => ['primary' => '#FF0000', 'button_bg' => '#00FF00'],
        'is_default' => true,
    ]);

    $template = EmailTemplate::create([
        'key' => 'no-theme',
        'name' => ['en' => 'No Theme'],
        'category' => 'transactional',
        'subject' => ['en' => 'Test'],
        'body' => ['en' => 'Test'],
        'is_active' => true,
    ]);

    expect($template->email_theme_id)->toBeNull()
        ->and($template->resolvedThemeColors())
        ->toMatchArray(['primary' => '#FF0000', 'button_bg' => '#00FF00']);
});

it('falls back to hardcoded default colors when no theme and no default theme exist', function () {
    $template = EmailTemplate::create([
        'key' => 'bare',
        'name' => ['en' => 'Bare'],
        'category' => 'transactional',
        'subject' => ['en' => 'Test'],
        'body' => ['en' => 'Test'],
        'is_active' => true,
    ]);

    expect($template->resolvedThemeColors())->toBe(EmailTheme::defaultColors());
});

it('renders custom blocks in the body using the default theme when no theme is assigned', function () {
    EmailTheme::create([
        'name' => 'Default',
        'colors' => ['button_bg' => '#FF0000'],
        'is_default' => true,
    ]);

    $template = EmailTemplate::create([
        'key' => 'block-body',
        'name' => ['en' => 'Block Body'],
        'category' => 'transactional',
        'subject' => ['en' => 'Test'],
        'body' => ['en' => '<div data-type="customBlock" data-id="emailButton" data-config="{&quot;label&quot;:&quot;Click&quot;,&quot;url&quot;:&quot;https://example.com&quot;}"></div>'],
        'is_active' => true,
    ]);

    $rendered = $template->render();

    expect($rendered['body'])->toContain('#FF0000')
        ->and($rendered['body'])->not->toContain('#4F46E5');
});
