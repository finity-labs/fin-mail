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
- **Template Versioning** — Automatic version history with compare and restore
- **Email Logging** — Every sent email is logged with status tracking, rendered body storage, and polymorphic model association
- **Translatable** — Templates support multiple languages via `spatie/laravel-translatable`, all locales stored in a single record
- **Theme System** — Create color themes and apply them to templates
- **Swappable Editor** — Ships with Tiptap support, but swap in TinyMCE or any editor via the `EditorContract`
- **Categories & Tags** — Organize templates as they grow
- **Reusable Actions** — `SendEmailAction` and `SentEmailsRelationManager` drop into any Filament resource
- **Preview & Test Send** — Preview templates inline and send test emails from the admin
- **Admin Settings** — Manage sender defaults, branding, logging, and attachment rules from the UI
- **Full Navigation Control** — Configure navigation groups, sort order, and visibility per resource from the plugin
- **Shield Support** — Built-in policies and permission setup for Filament Shield

## Requirements

- PHP 8.2+
- Laravel 11 or 12
- Filament 4 or 5

## Installation

```bash
composer require finity-labs/fin-mail
```

```bash
php artisan fin-mail:install
```

The install command will:
- Publish config and migrations
- Configure supported locales (auto-detects from your `lang/` directory)
- Optionally run migrations and seed default templates
- Optionally register the plugin in your Filament panel
- Optionally configure [Filament Shield](#filament-shield-integration) permissions
- Optionally configure scheduled cleanup of old sent emails

#### Non-interactive install

Pass `--locales` to skip the interactive locale prompt (useful for CI or scripted setups):

```bash
php artisan fin-mail:install --locales=en,hu,de --seed
```

During interactive install, choose **"Other"** from the locale list to manually enter any of the 59 supported locale codes.

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
```

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

## Filament Shield Integration

FinMail ships with built-in support for [Filament Shield](https://github.com/bezhanSalleh/filament-shield). Policy files are bundled with the plugin — no generation needed.

### Automatic setup

If Shield is installed, the `fin-mail:install` command will:
1. Register FinMail resources in your `filament-shield.php` config
2. Generate the permission entries in the database via `shield:generate`

### Manual setup

If you prefer to set up Shield manually, or if the automatic setup didn't complete:

```bash
php artisan shield:generate --panel=admin --option=permissions
```

### Supported permissions

**Resources:**

| Resource | Permissions |
|----------|------------|
| Email Templates | `ViewAny`, `View`, `Create`, `Update`, `Delete` |
| Email Themes | `ViewAny`, `View`, `Create`, `Update`, `Delete` |
| Sent Emails | `ViewAny`, `View` |

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

## Configuration

Publish the config:

```bash
php artisan vendor:publish --tag=fin-mail-config
```

Other publish tags:

| Tag | Description |
|-----|-------------|
| `fin-mail-config` | Configuration file |
| `fin-mail-migrations` | Database migrations |
| `fin-mail-settings-migrations` | Spatie Settings migrations |
| `fin-mail-views` | Email template views |

## Uninstalling

Run the uninstall command **before** removing the package:

```bash
php artisan fin-mail:uninstall
composer remove finity-labs/fin-mail
```

The uninstall command will:
- Remove `FinMailPlugin::make()` from your panel provider(s)
- Remove FinMail entries from Shield config and clean up permissions from the database
- Optionally drop all FinMail database tables and settings entries
- Optionally delete published migrations, config, views, and translations
- Clear settings and application caches

## Testing

```bash
composer test
```

## License

MIT

## Screenshots

### Template Management
Easily manage, search, and create new email templates with multi-language support.
![Email Templates List View](https://github.com/user-attachments/assets/6e0a0b97-0572-4f6f-bdd2-a765ab26d399)

The powerful template editor includes a live preview and a dynamic token selector.
![Template Editor](https://github.com/user-attachments/assets/68e42727-ca4b-42dc-9a9a-ed3db36a2f01)
![Editor Tokens View](https://github.com/user-attachments/assets/a9d2360e-8470-49d3-8055-ca4aa6dae79c)

### Theming
Create a consistent brand look with the visual theme editor—no CSS knowledge required.
![Theme Editor](https://github.com/user-attachments/assets/b7a5e904-b879-4576-b08e-681d1023f249)

### Plugin Configuration
Comprehensive settings allow you to control senders, localization, branding, logging, attachments, and system overrides.

![General Settings](https://github.com/user-attachments/assets/3a5362ea-826a-4c1d-8537-e8569d93e3c7)
<br>
![Branding Settings](https://github.com/user-attachments/assets/c6fb26fe-b789-42f7-9bf7-7250bc8f7c81)
<br>
![Logging Settings](https://github.com/user-attachments/assets/402e3704-3bd3-44de-beb1-249a17705913)
<br>
![Attachment Settings](https://github.com/user-attachments/assets/8408f05b-7545-49df-a26b-52dd6247caee)
<br>
![Auth Override Settings](https://github.com/user-attachments/assets/974704f6-e66a-4a59-8f07-a22d4b333924)


