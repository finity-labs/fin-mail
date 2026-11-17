# FinMail for Filament

![finity-labs-fin-mail](https://github.com/user-attachments/assets/f1dc64c3-92ff-4628-81b7-5ff7e85f9479)

[![FILAMENT 4.x](https://img.shields.io/badge/FILAMENT-4.x-EBB304?style=flat-square)](https://filamentphp.com/docs/4.x/panels/installation)
[![FILAMENT 5.x](https://img.shields.io/badge/FILAMENT-5.x-EBB304?style=flat-square)](https://filamentphp.com/docs/5.x/panels/installation)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/finity-labs/fin-mail.svg?style=flat-square)](https://packagist.org/packages/finity-labs/fin-mail)
[![Tests](https://github.com/finity-labs/fin-mail/actions/workflows/tests.yml/badge.svg)](https://github.com/finity-labs/fin-mail/actions/workflows/tests.yml)
[![Code Style](https://github.com/finity-labs/fin-mail/actions/workflows/style.yml/badge.svg)](https://github.com/finity-labs/fin-mail/actions/workflows/style.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/finity-labs/fin-mail.svg?style=flat-square)](https://packagist.org/packages/finity-labs/fin-mail)
[![License](https://img.shields.io/packagist/l/finity-labs/fin-mail.svg?style=flat-square)](https://packagist.org/packages/finity-labs/fin-mail)

A powerful email template manager and composer for Filament. Build, manage, and send emails directly from your admin panel — with dynamic token replacement, multilingual templates, customizable themes, template versioning, email logging with status tracking, auth email overrides, and a reusable Send Email action that drops into any resource.

## Features

- **Email Composer** — Send emails from any resource using templates as starting points, with full editing of subject, body, recipients, and attachments
- **Dynamic Templates** — No need for separate Mailable classes per template. One universal `TemplateMail` handles everything
- **Token Replacement** — `{{ user.name }}`, `{{ config.app.name }}`, conditionals `{% if user.is_premium %}`, and fallbacks `{{ user.name | 'Customer' }}`
- **Merge Tags** — Tokens are available as merge tags directly in the RichEditor toolbar for easy insertion
- **Blocks** — Button (primary or outline), summary, credentials, callout, divider and small print, each drawn from a Blade view you can replace
- **Layouts** — Pick the frame (header, footer, styles) per template from a list in the config, in the email's language and text direction
- **Template Versioning** — Automatic version history with preview and one-click restore
- **Email Logging** — Every sent email is logged with status tracking, rendered body storage, and polymorphic model association
- **Translatable** — Templates support multiple languages via `spatie/laravel-translatable`, all locales stored in a single record
- **Theme System** — Create color themes and apply them to templates, with live preview that updates as you change colors
- **Swappable Editor** — Ships with Filament's RichEditor by default, with Tiptap and TinyMCE supported via the `EditorContract`
- **Categories & Tags** — Organize templates as they grow
- **Reusable Actions** — `SendEmailAction` and `SentEmailsRelationManager` drop into any Filament resource
- **Preview & Test Send** — Preview templates inline and send test emails from the admin
- **Admin Settings** — Manage sender defaults, branding, logging, and attachment rules from the UI
- **Full Navigation Control** — Configure navigation groups, sort order, and visibility per resource from the plugin
- **Shield Support** — Built-in policies and permission setup for Filament Shield

## Requirements

- PHP 8.2+
- Laravel 11, 12, or 13
- Filament 4 or 5

FinMail uses [`spatie/laravel-settings`](https://github.com/spatie/laravel-settings) to store plugin settings. It's pulled in automatically as a Composer dependency — `fin-mail:install` publishes and runs its migration if you don't already have a `settings` table.

## Installation

```bash
composer require finity-labs/fin-mail
```

> **Dependency conflict?** If you see an error about `phpdocumentor/type-resolver`, it means your project has `phpdocumentor/reflection-docblock` 6.x which conflicts with `spatie/laravel-settings`. Fix it by allowing Composer to resolve all dependencies:
> ```bash
> composer require finity-labs/fin-mail phpdocumentor/reflection-docblock:^5.6 -W
> ```

```bash
php artisan fin-mail:install
```

The install command will:
- Publish config and migrations, and the social icons to `public/vendor/fin-mail`
- Configure supported locales (auto-detects from your `lang/` directory)
- Optionally run migrations and seed default templates
- Optionally register the plugin in your Filament panel
- Optionally register FinMail styles in your custom Filament theme
- Optionally configure [Filament Shield](#filament-shield-integration) permissions
- Optionally configure scheduled cleanup of old sent emails

#### Non-interactive install

Pass `--locales` to skip the interactive locale prompt (useful for CI or scripted setups):

```bash
php artisan fin-mail:install --locales=en,hu,de --seed
```

During interactive install, choose **"Other"** from the locale list to manually enter any of the 59 supported locale codes.

### Custom Filament theme

If you are using a [custom Filament theme](https://filamentphp.com/docs/5.x/panels/themes#creating-a-custom-theme), add the FinMail view path to your theme CSS so Tailwind can scan the plugin's styles:

```css
/* resources/css/filament/{panel}/theme.css */
@source '../../../../vendor/finity-labs/fin-mail/resources/views/**/*';
```

> The install command will do this automatically if it detects a custom theme CSS file for the selected panel.

### Register the plugin

```php
use FinityLabs\FinMail\FinMailPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            FinMailPlugin::make(),
        ]);
}
```

### Plugin options

```php
FinMailPlugin::make()
    ->enableSentEmails()    // Show the Sent Emails resource (default: true)
    ->enableThemes()        // Show the Themes resource (default: true)
    ->deleteActionOnEditPage() // Show delete button on edit pages (default: false)
    ->policyNamespace('App\\Policies') // Where model policies live (default: App\Policies)
```

### Extending the resources

To adjust one of the built-in resources, extend it and register your class on the plugin — it replaces the built-in one:

```php
use FinityLabs\FinMail\Resources\EmailTemplateResource\EmailTemplateResource;

class MyEmailTemplateResource extends EmailTemplateResource
{
    // override what you need
}

FinMailPlugin::make()
    ->emailTemplateResource(MyEmailTemplateResource::class)
    ->emailThemeResource(...)   // same pattern
    ->sentEmailResource(...)    // same pattern
```

Keep the built-in slug (or override `getPages()` too) so the plugin's internal links keep resolving.

### Navigation customization

All navigation group settings accept strings, enums, closures, or `null`:

```php
FinMailPlugin::make()
    // Set a shared navigation group for all resources and settings
    ->navigationGroup('Communications')

    // Or configure each resource independently
    ->emailTemplateNavigationGroup('Email')
    ->emailThemeNavigationGroup('Email')
    ->sentEmailNavigationGroup('Logs')
    ->settingsNavigationGroup('Administration')

    // Set sort order for all resources at once (auto-increments: base, +1, +2, +3)
    ->navigationSort(10)

    // Or configure each resource independently
    ->emailTemplateNavigationSort(10)
    ->emailThemeNavigationSort(20)
    ->sentEmailNavigationSort(30)
    ->settingsNavigationSort(40)
```

## Usage

### Sending emails programmatically

```php
use FinityLabs\FinMail\Mail\TemplateMail;

// Simple
Mail::to($user->email)->send(
    TemplateMail::make('welcome-email')
        ->models(['user' => $user])
);

// With locale, attachments, and overrides
Mail::to($customer->email)->send(
    TemplateMail::make('invoice-sent', locale: 'hu')
        ->models(['customer' => $customer, 'invoice' => $invoice])
        ->attachFile($invoice->getPdfPath(), "Invoice-{$invoice->number}.pdf")
);
```

`TemplateMail` is automatically queued. Configure the queue connection and name in `config/fin-mail.php`.

#### Logging

When logging is enabled in the FinMail settings, every `TemplateMail` creates a Sent Emails log entry on its own — no extra setup needed. Queued mail is logged at dispatch time with a `Queued` status and updated to `Sent` or `Failed` once the worker processes it. Each entry records who sent the email: the authenticated user at the time the mailable was built, or nobody for system-triggered mail like scheduled jobs.

```php
// Logged automatically when logging is enabled in the settings
Mail::to($user->email)->send(
    TemplateMail::make('welcome-email')->models(['user' => $user])
);

// Opt out for a single email
TemplateMail::make('internal-report')->withoutLogging();

// Force a log entry even when logging is disabled in the settings
TemplateMail::make('invoice-sent')->withLogging();

// Log the email but keep the rendered body out of the database —
// the built-in password reset and verification emails do this by
// default, since their bodies contain signed URLs
TemplateMail::make('user-password-reset')->withoutStoringRenderedBody();
```

#### Passing extra view data

`models()` is for token replacement (`{{ user.name }}`). For variables you want available directly in the Blade template — without going through the token system — use `with()` or its `extraData()` alias:

```php
TemplateMail::make('order-confirmation')
    ->models(['user' => $user])
    ->with('trackingUrl', $tracking->url)
    // or pass an array:
    ->extraData([
        'orderItems' => $order->items,
        'currency' => 'EUR',
    ]);
```

After publishing the package views (`php artisan vendor:publish --tag=fin-mail-views`), the variables are available directly in the Blade template:

```blade
<a href="{{ $trackingUrl }}">Track your order</a>

@foreach ($orderItems as $item)
    {{ $item->name }} — {{ $item->price }} {{ $currency }}
@endforeach
```

The default keys (`body`, `preheader`, `theme`, `branding`, `locale`, `direction`, `template`) remain available — extra data is merged on top.

#### Overriding branding per email

Branding settings (logo, colors, footer) normally apply to every email. For one-off deviations — a partner co-branded email, a plain internal notice — override them per email:

```php
// No logo on this one
TemplateMail::make('internal-report')
    ->withoutLogo();

// Different logo and color for a partner mailing
TemplateMail::make('partner-newsletter')
    ->overrideBranding([
        'logo' => 'https://example.com/partner-logo.png',
        'primary_color' => '#0EA5E9',
    ]);
```

Any key from the branding settings works (`logo`, `logo_width`, `logo_height`, `content_width`, `primary_color`, `footer_links`, `customer_service_email`, `customer_service_phone`, `social_links`); keys you don't pass fall through to the saved settings.

#### Rendering in another theme

`overrideTheme()` renders one email with another theme's colors instead of the template's own. Nothing is saved, so it suits a page that previews every template in each theme:

```php
$html = TemplateMail::make('order-shipped')
    ->overrideTheme(EmailTheme::where('name', 'Admin copy')->firstOrFail())
    ->render();
```

#### Using a custom email view

`overrideView()` renders one email in a view of your choice, ahead of the template's layout (see [Layouts](#layouts)):

```php
TemplateMail::make('welcome-email')
    ->models(['user' => $user])
    ->overrideView('emails.custom-layout');
```

The view receives the same variables as any layout, plus whatever you pass with `with()` or `extraData()`.

### Layouts

The layout is the Blade view around the template body: the head, the header, the content box and the footer. The body staff edit in the template form is printed inside it as `$body`. FinMail ships `fin-mail::email.default`; your app can draw its own and let editors pick one per template.

```php
// config/fin-mail.php
'layout' => 'mail.layouts.site',   // templates without a layout of their own

'layouts' => [
    'mail.layouts.site' => 'Customer mail',   // view => label, a translation key works
    'mail.layouts.admin' => 'Admin copy',
],
```

Once `layouts` has entries, the template form shows a Layout field (stored in the template's `view_path` column) and the template list gets a "Set layout" bulk action next to "Set theme". An email renders in the `overrideView()` view if one was given, then in the template's layout while that layout is still in the list, then in `layout`. Every preview, Send test and Compose use the same order. Resend sends the stored HTML as it went out.

A layout receives:

| Variable | Contents |
|----------|----------|
| `$body` | The rendered body: blocks drawn, tokens filled |
| `$preheader` | The preheader text |
| `$theme` | The theme's colors, keyed by name (`background`, `link`, `button_bg`, …) |
| `$branding` | The branding settings, with `overrideBranding()` merged on top |
| `$locale` | The email's locale, e.g. `hu` |
| `$direction` | `ltr` or `rtl` for that locale |
| `$template` | `['key' => …, 'category' => …]` of the template |

Data you pass with `with()` arrives too, but previews in the admin have no such data and no models, so give your own variables a fallback (`$hasAccount ?? true`).

A few things the default layout does that your own should copy:

- `{!! \FinityLabs\FinMail\Helpers\InlineStyler::apply($body, $theme) !!}` prints the body with the [element styles](#element-styles) and the theme's link color inlined. Many mail clients drop `<style>` blocks.
- The summary block's "Stack on phones" option needs the `.fm-stack` media query from the default layout's `<style>` block.
- `<html lang="{{ str_replace('_', '-', $locale) }}" dir="{{ $direction }}">`.

Outlook for Windows ignores `padding-left` on lists. If your layout styles `ul` and `ol`, add this to its `<head>`:

```html
<!--[if mso]><style>ul,ol{margin-left:24px!important}</style><![endif]-->
```

### Adding "Send Email" to any resource

```php
use FinityLabs\FinMail\Actions\SendEmailAction;

// In your table actions, header actions, or anywhere Filament actions are used
SendEmailAction::make()
    ->template('invoice-sent')
    ->recipient(fn (Invoice $record) => $record->customer->email)
    ->models(fn (Invoice $record) => [
        'invoice'  => $record,
        'customer' => $record->customer,
    ])
    ->attachments(fn (Invoice $record) => [
        ['path' => $record->getPdfPath(), 'name' => "Invoice-{$record->number}.pdf"],
    ])
    ->onSent(fn (Invoice $record) => $record->update(['emailed_at' => now()]))
```

A `SendEmailAction` (page header action) is also available with the same API.

### Showing sent emails on any resource

Add the `HasEmailTemplates` trait to your model:

```php
use FinityLabs\FinMail\Traits\HasEmailTemplates;

class Invoice extends Model
{
    use HasEmailTemplates;
}
```

Then add the relation manager to your resource:

```php
use FinityLabs\FinMail\Resources\RelationManagers\SentEmailsRelationManager;

public static function getRelations(): array
{
    return [
        SentEmailsRelationManager::class,
    ];
}
```

The trait provides helpers on your model:

```php
$invoice->sentEmails;                         // All sent emails
$invoice->latestSentEmail();                  // Most recent
$invoice->hasBeenEmailed('invoice-sent');     // Check if a specific template was sent
$invoice->sentEmailsCount();                  // Count
```

### Token syntax

| Syntax | Example | Description |
|--------|---------|-------------|
| `{{ model.attr }}` | `{{ user.name }}` | Model attribute |
| `{{ model.rel.attr }}` | `{{ order.customer.name }}` | Nested relation |
| `{{ config.key }}` | `{{ config.app.name }}` | Config value |
| `{{ token \| 'fallback' }}` | `{{ user.name \| 'Customer' }}` | With fallback |
| `{% if token %}...{% endif %}` | `{% if user.is_premium %}...{% endif %}` | Conditional |
| `{% if token %}...{% else %}...{% endif %}` | | If/else |

### Merge tags

When editing a template, any tokens defined in the Tokens tab are available as merge tags in the RichEditor toolbar. Click the merge tags button to browse and insert them directly into the email body.

### Blocks

The editor's custom blocks button (squares-plus icon) inserts these blocks:

| Block | Id | What it draws |
|-------|----|---------------|
| Button | `emailButton` | A link button. Primary uses `button_bg`/`button_text`; secondary is an outline in `primary` on `content_bg` |
| Summary | `emailSummary` | Label and value rows in a bordered box, with a bold flag per row, value alignment and an option to stack on phones |
| Credentials | `emailCredentials` | Login details or a one-time code: each label above its value, a Normal or Monospace font per row, and an optional copy chip that selects on one tap |
| Callout | `emailCallout` | A tinted box around a notice. Info, warning and success take their colors from the theme; custom has its own two colors |
| Divider | `emailDivider` | A one-pixel rule in the theme's `border` color |
| Small print | `emailSmallPrint` | Smaller text in `text_light`, with links |

Tokens work inside block settings the same way as in the body.

Credential values (passwords, one-time codes) end up in the Sent Emails log with the rest of the body. Send such emails with `withoutStoringRenderedBody()`.

Each block renders through `fin-mail::blocks.{id}`. To change a block's markup, point its id at your own view; it receives `$config`, `$theme`, `$locale` and `$id`:

```php
// config/fin-mail.php
'block_views' => [
    'emailButton' => 'mail.blocks.button',
],
```

To keep a block out of the editor's menu, list its id in `hidden_blocks`. Emails that already use it still render it, but the editor can't edit a block it doesn't know, so hide a block only while no template uses it.

### Custom blocks

You can register your own custom blocks that work in the editor, preview, and sent emails. Each block must extend Filament's `RichContentCustomBlock`.

```php
FinMailPlugin::make()
    ->customBlocks([
        \App\Mail\Blocks\DividerBlock::class,
        \App\Mail\Blocks\FooterBlock::class,
    ]),
```

Registered blocks automatically appear in the editor's custom blocks toolbar, render in preview mode, and convert to HTML when emails are sent. The built-in blocks are always included. A block you register under the id of a built-in one (`emailDivider`, say) replaces it, in the editor and in sent emails.

Each custom block needs to implement:

- `getId()` — Unique identifier stored in the HTML
- `getLabel()` — Display name in the editor toolbar
- `configureEditorAction()` — Modal form for block settings
- `toPreviewHtml()` — HTML for the editor preview
- `toHtml()` — HTML for the actual sent email

If your block uses theme colors, add a static `setPreviewTheme(?array $theme)` method and it will receive theme updates automatically when the user changes the template theme.

`toHtml()` receives the theme colors, the email's locale and the block's id in `$data` (`theme`, `locale`, `id`). If you configure [element styles](#element-styles), wrap your block's HTML in `InlineStyler::protect()` so they leave its markup alone. The same goes for HTML you pass in as a token value, such as a listing card:

```php
use FinityLabs\FinMail\Helpers\InlineStyler;
use FinityLabs\FinMail\Helpers\TokenValue;

TemplateMail::make('new-listings')->models([
    'cards' => new TokenValue(InlineStyler::protect(view('mail.listing-cards', $data)->render())),
]);
```

The built-in blocks mark themselves the same way while element styles or the [preheader fallback](#preheader-fallback) are on. The marker is an HTML comment (`<!--fm-block-->…<!--/fm-block-->`): the element styles skip what's inside it, and the fallback doesn't take block text for the first paragraph. `InlineStyler::apply()` removes the markers in the layout. If you use the output of `EmailTemplate::render()` or of a block's `toHtml()` somewhere else, strip them with `InlineStyler::removeMarkers()`. With neither feature on, block HTML carries no marker.

## Events

FinMail dispatches events at key points in the email lifecycle so your application can react — e.g., log analytics, trigger webhooks, or update related models.

| Event | When | Payload |
|-------|------|---------|
| `EmailSending` | Before the email is sent | `SentEmail $sentEmail`, `?EmailTemplate $template` |
| `EmailSent` | After the email was sent successfully | `SentEmail $sentEmail`, `?EmailTemplate $template` |
| `EmailFailed` | When sending fails | `SentEmail $sentEmail`, `string $error`, `?EmailTemplate $template` |
| `TemplateUpdated` | When a template is saved (new version) | `EmailTemplate $template`, `int $newVersion` |

### Listening to events

```php
use FinityLabs\FinMail\Events\EmailSent;
use FinityLabs\FinMail\Events\EmailFailed;

// In a service provider or listener
Event::listen(EmailSent::class, function (EmailSent $event) {
    // $event->sentEmail — the SentEmail model
    // $event->template — the EmailTemplate used (nullable)
    logger()->info("Email sent to {$event->sentEmail->recipients_display}");
});

Event::listen(EmailFailed::class, function (EmailFailed $event) {
    // $event->error — the error message
    logger()->error("Email failed: {$event->error}");
});
```

All event properties are `readonly`. Events use `SerializesModels` so they are safe to dispatch from queued jobs.

## Authorization

### Without Shield

FinMail works with plain Laravel policies — no extra package needed. Create policy classes named `EmailTemplatePolicy`, `EmailThemePolicy`, and `SentEmailPolicy` in `App\Policies` (or wherever `policyNamespace()` points) and FinMail registers them automatically; Filament then applies them to the resources. Policies that don't exist are simply skipped, so you can gate only what you need.

The namespace is a per-panel option, registered when that panel boots for a request, so two panels can point at two sets of policies. Outside any panel — console commands, queue workers, routes of your own — the default panel's namespace applies, or `App\Policies` when the plugin is not on the default panel.

Settings pages are gated through Gate abilities named after the page class:

```php
use Illuminate\Support\Facades\Gate;

Gate::define('page_ManageGeneralSettings', fn ($user) => $user->isAdmin());
Gate::define('page_ManageBrandingSettings', fn ($user) => $user->isAdmin());
// also: page_ManageLoggingSettings, page_ManageAttachmentSettings, page_ManageAuthEmailSettings
```

Pages without a defined ability stay accessible to any authenticated user, so nothing changes until you opt in.

## Filament Shield Integration

FinMail ships with built-in support for [Filament Shield](https://github.com/bezhanSalleh/filament-shield). Shield is entirely optional — without it, authorization works as described above.

### Automatic setup

If Shield is installed, the `fin-mail:install` command will:
1. Register FinMail resources in your `filament-shield.php` config
2. Generate policies and permission entries via `shield:generate`

FinMail automatically maps Shield-generated policies (in `App\Policies` by default) to its models. If your policies live elsewhere, configure the namespace on the plugin:

```php
FinMailPlugin::make()
    ->policyNamespace('App\\Policies\\Admin')
```

### Manual setup

If you prefer to set up Shield manually, or if the automatic setup didn't complete:

```bash
php artisan shield:generate --panel=admin --option=policies_and_permissions
```

### Supported permissions

**Resources:**

| Resource | Permissions                                                                       |
|----------|-----------------------------------------------------------------------------------|
| Email Templates | `ViewAny`, `View`, `Create`, `Update`, `Delete`, `Preview`, `SendTest`, `Compose` |
| Email Themes | `ViewAny`, `View`, `Create`, `Update`, `Delete`                                   |
| Sent Emails | `ViewAny`, `View`, `Resend`                                                       |

**Settings pages:**

Each settings page (General, Branding, Logging, Attachments, Auth Emails) has its own page-level permission managed by Shield.

### Cleanup on uninstall

The `fin-mail:uninstall` command automatically removes Shield config entries and permission records from the database.

## Auth Email Overrides

FinMail can replace the application's default authentication emails (verification, password reset) with your custom templates, and optionally send a welcome email on registration.

### Enable overrides

Navigate to **Settings → Auth Emails** in the admin panel and toggle the overrides you want.

### Required templates

Create templates with these keys (the seeder includes them by default):

| Template Key | Purpose | Available Tokens |
|---|---|---|
| `user-verify-email` | Email verification link | `{{ user.name }}`, `{{ user.email }}`, `{{ url }}` |
| `user-password-reset` | Password reset link | `{{ user.name }}`, `{{ user.email }}`, `{{ url }}` |
| `user-welcome` | Welcome email after registration | `{{ user.name }}`, `{{ user.email }}` |

### Locale support

Auth email overrides automatically use the active application locale (`app()->getLocale()`). If you use a language switcher plugin, the emails will be sent in the user's selected language — provided the template has a translation for that locale.

### Logging auth email bodies

Auth emails are logged like any other email, but their rendered body is kept out of the database by default because it contains signed URLs — anyone able to read the log could replay a still-valid reset link. If you need a full audit trail of exactly what was sent, opt in via the config:

```php
// config/fin-mail.php
'auth_emails' => [
    'store_rendered_body' => true,
],
```

### Fallback behavior

If a required template is missing or deactivated, the override falls back to Laravel's default notification email instead of failing — password reset and verification keep working no matter what happens to the templates.

## Configuration

Publish the config:

```bash
php artisan vendor:publish --tag=fin-mail-config
```

### Date formatting

By default, dates and datetimes throughout the plugin use Filament's built-in formatting. You can override this globally or per locale in `config/fin-mail.php`:

```php
// A single format for all locales
'date_format' => 'd/m/Y',
'datetime_format' => 'd/m/Y H:i',

// Or an array keyed by locale
'date_format' => [
    'en' => 'M d, Y',
    'de' => 'd.m.Y',
    'hu' => 'Y. m. d.',
],
'datetime_format' => [
    'en' => 'M d, Y H:i',
    'de' => 'd.m.Y H:i',
    'hu' => 'Y. m. d. H:i',
],
```

When set to `null` (or when the current locale isn't in the array), Filament's default formatting kicks in. These formats are standard PHP [date format characters](https://www.php.net/manual/en/datetime.format.php).

You can also access the resolved format programmatically:

```php
use FinityLabs\FinMail\Facades\FinMail;

FinMail::dateFormat();     // string|null for current locale
FinMail::dateTimeFormat(); // string|null for current locale
```

### Theme colors

A theme stores twelve colors, plus the callout block's info, warning and success pairs. If your layout or block views need more, such as a header band, list them in `theme_colors`. Each gets a picker in the "Other" section of the theme form, its value is saved on the theme, and a theme without a value uses the default:

```php
'theme_colors' => [
    'header_bg' => ['label' => 'Header background', 'default' => '#0b2545'],
    'accent' => ['label' => 'mail.colors.accent', 'default' => '#f5b700'],
],
```

Your layout reads them as `$theme['header_bg']`.

### Element styles

The body staff type carries no styles. `element_styles` adds inline styles to its elements, with theme colors as `{key}`:

```php
'element_styles' => [
    'p' => 'margin: 0 0 16px; color: {text};',
    'h2' => 'margin: 24px 0 8px; font-size: 22px; color: {heading};',
    'a' => 'color: {link};',
    'td' => 'padding: 8px; border-bottom: 1px solid {border};',
],

'element_style_rules' => [
    'last_element_margin' => true,  // the body's last element gets margin-bottom: 0
    'bare_url_break' => true,       // a link showing a bare URL gets word-break: break-all
],
```

Only properties an element doesn't already have are added, and they go in front of the ones it has, so a style typed into the body wins. Block markup is left alone. Nothing changes until you configure something.

The editor writes a list item as `<li><p>…</p></li>`. That inner paragraph gets the `p` style without its margins, so the `li` margin is what spaces the items.

The last-element rule follows a list down to its last item, and gives empty paragraphs at the end of the body the same zero margin as the element before them. It leaves a margin typed into the body alone, and does nothing when the body ends with a block.

### Preheader fallback

With `preheader_fallback.enabled`, a template whose preheader is empty in the email's language uses the body's first paragraph after the greeting instead (a first paragraph of up to 60 characters that ends in a comma, exclamation mark or colon counts as the greeting), cut at a word boundary to `preheader_fallback.length` characters (110 by default). It reads only the email's own language: a Hungarian email with no Hungarian preheader gets its own first paragraph, not the English preheader. It's off by default because it changes the inbox preview of every template without a preheader.

### Social links

The branding page has a list of social profiles. The default layout prints them in the footer: Facebook, Instagram, X, YouTube and TikTok as icons, any other platform (LinkedIn included) as a text link. `social_platforms` in the config sets the platforms offered.

The icons are 48 px PNGs, in black and in white; the layout picks whichever stands out on the footer background. Mail clients need an absolute URL, so the icons are published to `public/vendor/fin-mail`. `fin-mail:install` publishes them, and Laravel's default `post-update-cmd` copies them again on every `composer update` through the `laravel-assets` tag. Without that hook, run:

```bash
php artisan vendor:publish --tag=fin-mail-assets
```

Until they're published, the footer prints text links. The icons are the brand marks from [Simple Icons](https://simpleicons.org) (CC0), unmodified. The logos remain their owners' trademarks, so show them according to each brand's guidelines.

Other publish tags:

| Tag | Description |
|-----|-------------|
| `fin-mail-config` | Configuration file |
| `fin-mail-migrations` | Database migrations |
| `fin-mail-settings-migrations` | Spatie Settings migrations |
| `fin-mail-views` | Email template views |
| `fin-mail-assets` | Social icons, to `public/vendor/fin-mail` |

## Upgrading

When upgrading from a previous version, run the upgrade command to apply any data migrations:

```bash
php artisan fin-mail:upgrade
```

This checks locked templates in the database against the latest seeder definitions and updates any that are outdated. The command is idempotent and safe to run multiple times.

Preview changes without applying them:

```bash
php artisan fin-mail:upgrade --dry-run
```

### Upgrading to 1.15

Run the migrations right after `composer update`:

```bash
php artisan migrate
```

FinMail loads the new settings migration (the branding page's social links) from the package, so there's nothing to publish. Until it has run, saving the branding page fails, and on `spatie/laravel-settings` older than 3.4.2 **every email fails** to render, because the branding settings miss the new value. There's no schema migration in this release.

What else changes for an existing install:

- The default layout now paints the footer in the theme's `footer_bg`. Default themes see no difference, since `footer_bg` equals `background`; a theme with its own `footer_bg` now shows it.
- The template's `view_path` column is read now. It only matters if you list layouts in `layouts`; a value that isn't in the list falls back to the default layout.
- The new blocks show in every editor's block menu. Hide the ones you don't want with `hidden_blocks`. If you already register a block of your own under one of the new ids (`emailSummary`, `emailCredentials`, `emailCallout`, `emailDivider`, `emailSmallPrint`), yours keeps winning.
- The social icons are copied by `composer update` if your app has Laravel's default `post-update-cmd`; otherwise run `php artisan vendor:publish --tag=fin-mail-assets`.
- A published copy of `default.blade.php` keeps working but misses the new footer, `lang` and `dir`. Compare it with the package's view, or move your changes into a layout of your own (see [Layouts](#layouts)).
- A published copy of `components/email-preview.blade.php` keeps the old preview: the default layout, in the admin's language. Delete it from `resources/views/vendor/fin-mail` unless you changed it on purpose.
- If you migrate with `--path` (some multi-tenant setups do), Laravel skips migrations a package loads. Run the new one by its path: `php artisan migrate --path=vendor/finity-labs/fin-mail/database/settings/upgrades`.

### UUID or ULID user models

Since 1.14.1 the migrations size the `email_template_versions.created_by` and `sent_emails.sent_by` columns from your auth user model, so a fresh install on a `HasUuids` or `HasUlids` user works out of the box. An install that ran the earlier migrations on such a model has integer columns that cannot hold the key. Migrate them once:

```php
Schema::table('email_template_versions', function (Blueprint $table) {
    $table->dropConstrainedForeignId('created_by');
    $table->foreignIdFor(User::class, 'created_by')->nullable()->constrained()->nullOnDelete();
});

Schema::table('sent_emails', function (Blueprint $table) {
    $table->dropConstrainedForeignId('sent_by');
    $table->foreignIdFor(User::class, 'sent_by')->nullable()->constrained()->nullOnDelete();
});
```

Installs on the default integer user model need nothing.

## Uninstalling

Run the uninstall command **before** removing the package:

```bash
php artisan fin-mail:uninstall
composer remove finity-labs/fin-mail
```

The uninstall command will:
- Remove `FinMailPlugin::make()` from your panel provider(s)
- Remove FinMail `@source` directive from custom Filament theme CSS files
- Remove FinMail entries from Shield config and clean up permissions from the database
- Optionally drop all FinMail database tables and settings entries
- Optionally delete published migrations, config, views, and translations
- Delete the published social icons (`public/vendor/fin-mail`)
- Clear settings and application caches

## Testing

```bash
composer test
```

## License

MIT

## Screenshots

<details>
<summary><b>📝 Template Management</b></summary>
<br>

**Template List**
Manage, search, and create email templates with multi-language support.
![Email Templates List View](https://github.com/user-attachments/assets/6e0a0b97-0572-4f6f-bdd2-a765ab26d399)

**Template Editor**
The editor includes a live preview and a dynamic token selector.
![Template Editor](https://github.com/user-attachments/assets/68e42727-ca4b-42dc-9a9a-ed3db36a2f01)
![Editor Tokens View](https://github.com/user-attachments/assets/a9d2360e-8470-49d3-8055-ca4aa6dae79c)

</details>

<details>
<summary><b>🎨 Theming</b></summary>
<br>

**Theme Editor**
Create a consistent brand look with the visual theme editor — no CSS knowledge required.
![Theme Editor](https://github.com/user-attachments/assets/b7a5e904-b879-4576-b08e-681d1023f249)

</details>

<details>
<summary><b>⚙️ Plugin Configuration</b></summary>
<br>

**General Settings**
Configure senders, localization, and template categories.
![General Settings](https://github.com/user-attachments/assets/3a5362ea-826a-4c1d-8537-e8569d93e3c7)

**Branding Settings**
Customize logo, colors, and footer links for your email layout.
![Branding Settings](https://github.com/user-attachments/assets/c6fb26fe-b789-42f7-9bf7-7250bc8f7c81)

**Logging Settings**
Control how sent emails are recorded and cleaned up.
![Logging Settings](https://github.com/user-attachments/assets/402e3704-3bd3-44de-beb1-249a17705913)

**Attachment Settings**
Set file size limits and allowed extensions.
![Attachment Settings](https://github.com/user-attachments/assets/8408f05b-7545-49df-a26b-52dd6247caee)

**Auth Email Overrides**
Replace default Laravel auth emails with your custom templates.
![Auth Override Settings](https://github.com/user-attachments/assets/974704f6-e66a-4a59-8f07-a22d4b333924)

</details>


