# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.2.0] - 2026-03-31

### Added

- **Version History UI** — Version history now displays in a proper Filament table with per-row preview and restore actions
- **Version Preview** — Preview any version's email content directly from the version history modal
- **Version Restore** — Restore any previous version with one click; current content is automatically saved as a new version first
- **Upgrade Command** — New `php artisan fin-mail:upgrade` command to migrate existing data after package updates (supports `--dry-run`)

### Fixed

- **Versioning not working** — Version cleanup query was deleting all versions instead of keeping the most recent ones
- **Version history crash** — Subject column was passed as an array to `Str::limit()`, causing a TypeError
- **Seeded template buttons stripped by editor** — Inline-styled `<a>` tags in seeded templates (Password Reset, Verify Email) were stripped by TipTap due to `font-weight: 600` conflicting with the link mark; buttons now use the native `customBlock` format
- **Custom blocks not rendered in previews** — Button blocks stored as `<div data-type="customBlock">` were not converted to visible HTML in the View page preview and Compose page preview
- **Button preview ignores theme colors** — Button block preview in the RichEditor now reflects the selected template theme instead of hardcoded colors; updates live when changing the theme dropdown

### Changed

- **Translations** — Added `blocks` and `versioning` translation keys for all 59 supported languages
- Button block default label and preview label now use translation keys instead of hardcoded English
- `renderCustomBlocks()` is now public for use by preview components
- Versions relationship eager-loads `createdBy` to prevent lazy loading violations

### Upgrading from 1.1.0

If you have existing seeded templates with buttons (Password Reset, Verify Email), run the upgrade command to convert them to the new format:

```bash
php artisan fin-mail:upgrade
```

You can preview what would change first with `--dry-run`:

```bash
php artisan fin-mail:upgrade --dry-run
```

## [1.1.0] - 2026-03-30

### Added

- **Merge Tags in RichEditor** — Tokens defined in the Tokens tab now appear as merge tags in the editor toolbar, allowing easy insertion without switching tabs
- **CTA Button Block** — New custom block for inserting styled call-to-action buttons with configurable label, URL, and alignment, themed automatically
- **Inline Link Styling** — Links in email body now receive inline theme colors for email clients that strip `<style>` blocks
- **Live Theme Preview** — Color changes in the theme editor update the preview immediately without saving
- **Custom Theme Auto-Registration** — Install command detects custom Filament theme CSS and registers FinMail styles; uninstall cleans up

### Fixed

- Link colors not applied in email clients (Gmail, Outlook, etc.)
- Email preview now shows current form content and selected theme instead of last saved state
- TipTap merge tag nodes properly converted to `{{ token }}` text in preview and sent emails
- Token replacement now works on compose page emails (override body)
- Replicate action for templates and themes — modal shows editable name/key fields, excludes computed columns, redirects to edit page
- Uninstall command handles fluent plugin configuration
- Portuguese translations

### Changed

- Compose page defaults "To" field to logged-in user's email
- Email preview uses Filament's RichContentRenderer for proper HTML conversion (includes Link extension)

## [1.0.0] - 2026-03-02

### Added

- **Email Composer** — Send emails from any resource using templates as starting points, with full editing of subject, body, recipients, and attachments
- **Dynamic Templates** — Universal `TemplateMail` mailable that loads content from the database, no need for per-template Mailable classes
- **Token Replacement** — Model attributes (`{{ user.name }}`), config values (`{{ config.app.name }}`), conditionals (`{% if user.is_premium %}`), and fallbacks (`{{ user.name | 'Customer' }}`)
- **Template Versioning** — Automatic version history with compare and restore
- **Template Duplication** — Duplicate templates from the table with one click
- **Email Logging** — Every sent email is logged with status tracking, rendered body storage, and polymorphic model association
- **Translatable Templates** — Multiple languages via `spatie/laravel-translatable`, all locales stored in a single record
- **Theme System** — Create color themes and apply them to templates
- **Swappable Editor** — Ships with Filament RichEditor by default, Tiptap and TinyMCE supported via `EditorContract`
- **Categories & Tags** — Organize templates with categories and freeform tags
- **Reusable Actions** — `SendEmailAction` and `SentEmailsRelationManager` drop into any Filament resource
- **Preview & Test Send** — Preview templates inline and send test emails from the admin panel
- **Admin Settings** — Manage sender defaults, branding, logging, and attachment rules from the UI via Spatie Settings
- **Full Navigation Control** — Configure navigation groups, sort order, and visibility per resource from the plugin
- **Filament Shield Integration** — Built-in policies and automatic permission setup
- **Auth Email Overrides** — Replace verification, password reset, and welcome emails with custom templates
- **Queued Sending** — All emails are queued by default with configurable queue connection and name
- **Sent Email Cleanup** — Scheduled command to clean up old sent email records
- **Install & Uninstall Commands** — Interactive setup and teardown with panel registration, Shield config, and locale detection
- **Events** — `EmailSending`, `EmailSent`, `EmailFailed`, and `TemplateUpdated` events for application-level hooks
- **Multi-version Support** — Filament 4 and 5, Laravel 11 and 12, PHP 8.2+
- **Translations** — English, German, and Hungarian included out of the box
