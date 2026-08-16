# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.12.0] - 2026-08-16

### Added

- New `auth_emails.store_rendered_body` config option (default `false`). When enabled, the password reset and verification overrides store their rendered body in the Sent Emails log like any other email, for teams that want a full audit trail of exactly what was sent. Left off, the signed reset/verification URLs stay out of the database

### Fixed

- Files uploaded in the Compose Email page's Attachments section are now actually attached to the sent email and recorded in the log. The upload field dehydrated under a key the sender never read, so uploads were silently discarded while the UI reported success
- Editing the preheader on the Compose Email page now affects the delivered email. The form collected the value and the preview showed it, but the sender had no way to pass it through — `TemplateMail` gained `overridePreheader()` and the compose path uses it. Tokens in the overridden preheader are replaced like in the body
- Sending from the composer no longer throws a `TypeError` when the configured editor stores the body as a TipTap document array (e.g. the Tiptap editor). The preview already converted the document to HTML; the send path now does the same, using the template's theme colors for custom blocks
- The requested template locale now survives every queue path: log creation and stored-body rendering are wrapped in the mailable's locale, so a `TemplateMail` whose log entry is first created after queue serialization (e.g. dispatch-time log insert failed, or the mailable was re-dispatched from a stored job) no longer renders in the worker's app locale
- Auth email overrides no longer break authentication when their template is unavailable: if `user-verify-email` or `user-password-reset` is missing, deactivated, or errors during lookup, the notification falls back to Laravel's default mail instead of throwing — deactivating a template can no longer take down password reset app-wide
- Verification and password reset emails sent through the auth overrides no longer store their rendered body in the Sent Emails log. The bodies contain signed URLs; the log entry itself is still created, as the documentation always described
- Locked templates now enforce their `key` and `category` protection server-side. The fields were only `disabled()` in the form but still dehydrated, so a crafted request could rewrite a locked system template's key — which the auth email overrides depend on
- Switching languages while editing a template no longer discards unsaved work. The edit page now stashes in-progress translations per locale (like the create page always did), restores them when switching back, keeps unsaved non-translatable edits (theme, tags, sender) intact across the switch, and persists every stashed locale on save
- Only one theme can be the default now, enforced on the model for every write path. Previously the uniqueness lived in a form callback that only ran when editing an existing theme — creating a new theme with "default" toggled on produced two defaults, and which one actually applied was undefined. The premature form callback (which rewrote other themes before the form was even saved) is gone
- Deleting themes in bulk now detaches their templates like single deletes always did. The detach logic moved from two duplicated action callbacks into a model `deleting` hook, so every delete path behaves the same — including on SQLite databases without foreign key enforcement (enforcing databases were already covered by the FK's `nullOnDelete`)
- The stored-email viewers now render the email HTML in a sandboxed iframe (`sandbox="allow-same-origin"`), matching the template preview. Stored bodies can contain recipient-influenced content, and the unsandboxed frames allowed scripts to run inside the admin panel
- Replicating a template now suggests a readable, collision-free key (`invoice-copy`, `invoice-copy-2`, …) instead of a `-copy-<timestamp>` suffix that could collide when two replications happened in the same second
- Resending from the Sent Emails relation manager now behaves exactly like resending from the Sent Emails page: stored HTML sent verbatim (no re-wrapping in the layout, no re-running token replacement) and original attachments re-attached when they still exist. The two actions had drifted apart — the relation manager was still re-wrapping the full stored document (the bug fixed for the resource in 1.11.3) and silently dropped attachments. Both now share one `SentEmailResender` service

## [1.11.4] - 2026-08-13

### Fixed

- The language switcher dropdown on the email template view page now highlights the newly selected language immediately. The active-state color was evaluated while the header actions were being cached — before the locale switch ran — so the highlight lagged one click behind the button label and the page content (#27, thanks @Brett-Mulder)

## [1.11.3] - 2026-08-05

### Fixed

- The scheduled `fin-mail:cleanup` command now registers reliably: registration uses `callAfterResolving()`, so it also works when the schedule was already resolved before the package booted — previously the command could silently never appear in `schedule:list` (#26, thanks @agencetwogether)
- Resending an email from the Sent Emails log now sends the stored HTML verbatim through a new raw passthrough mode on `TemplateMail`, instead of re-wrapping the full stored document in the email layout — which produced a nested document with two doctypes and broken logo/footer sections (#25, thanks @agencetwogether)
- Resent emails re-attach the original files when they still exist on disk; previously the new log entry listed the attachments but the resent email carried none

## [1.11.2] - 2026-08-02

### Fixed

- Saving the logging settings no longer throws (or, where warnings are silenced, silently resets the cleanup schedule to Daily) when Filament hands the cleanup frequency back as an enum instance instead of a scalar (#24, thanks @agencetwogether)

## [1.11.1] - 2026-07-31

### Fixed

- The "individual emails sent" notification now pluralizes correctly: `ComposeEmail` picks the right form via `trans_choice()`, and 37 locales gained singular|plural variants for the notification body. Locales without grammatical plural after numerals keep their single form

## [1.11.0] - 2026-07-31

### Added

- **Automatic logging for programmatic sends** — `TemplateMail` now creates a Sent Emails log entry on its own whenever logging is enabled in the settings, so emails sent from code show up in the log just like ones sent from the admin panel. Queued mail is logged at dispatch time with a `Queued` status and updated to `Sent` or `Failed` once the worker processes it. Log creation failures are reported but never block the email from going out (#23, thanks @gazohu)
- Log entries now record who sent the email: the authenticated user at the time the mailable is built is carried across queueing, so queued mail is attributed to the person who triggered it instead of nobody. System-triggered mail (jobs, listeners, guest-initiated resets) is logged without a user
- `TemplateMail::withoutLogging()` opts a single email out of logging
- `TemplateMail::withLogging()` called without an argument now forces a log entry even when logging is disabled in the settings. Passing a `SentEmail` still hands over an externally created record, as before — previously a bare `withLogging()` call silently did nothing
- `TemplateMail::withoutStoringRenderedBody()` logs the email but keeps the rendered HTML out of the database

### Changed

- The built-in welcome, password reset, and email verification notifications now appear in the Sent Emails log when logging is enabled. Reset and verification emails never store their rendered body, since it contains signed URLs

## [1.10.0] - 2026-07-23

### Added

- **Delivery-mode chooser for multi-recipient composes** — when the Compose Email "To" field holds more than one address, the send confirmation now asks whether to deliver a separate email to each recipient (recipients don't see each other) or one combined email addressed to everyone, with a note that the full recipient list is visible in that case (#20, thanks @mrsafalpiya)
- `EmailSender` gained a `notify` constructor flag so callers batching multiple sends can suppress the per-send notification and show an aggregate one instead

### Changed

- The send-mode help texts spell out how CC/BCC behave in each mode: in individual mode CC/BCC contacts receive a copy of every email, and in combined mode the "To" and CC lists are visible to every recipient (BCC stays hidden)
- All 59 non-English locales received translations for the new send-mode strings

## [1.9.0] - 2026-07-15

### Added

- **App-relative logo resolution** — branding logos configured as relative paths (e.g. `/images/logo.png`) are now resolved to absolute URLs at render time via `BrandingSettings::resolvedLogo()`, so they display in email clients. Absolute URLs, protocol-relative URLs, and data URIs pass through unchanged (#19, thanks @mrsafalpiya)

### Fixed

- Button and other custom blocks were replaced with plain text when a template was loaded into the Compose Email editor, and were missing from the sent email. `EmailTemplate::render()` gained a `renderBlocks` flag so blocks round-trip in the editor, and `TemplateMail` now expands blocks in overridden bodies (#17, thanks @mrsafalpiya)
- Templates without an assigned theme now fall back to the user-configured default theme instead of the package's hardcoded colors — in the preview, the body infolist, and the sent email. New helpers: `EmailTheme::resolvedDefaultColors()` and `EmailTemplate::resolvedThemeColors()` (#18, thanks @mrsafalpiya)
- Theme colors stored as `null` or an empty string (cleared ColorPickers) no longer override the hardcoded defaults when resolving colors

## [1.8.1] - 2026-06-30

### Fixed

- `Undefined array key "cleanup_frequency"` when saving the Logging settings with *Enable Schedule Cleanup* turned off. The frequency field is hidden in that state, so it isn't submitted — the save mutation now casts it only when it's present and leaves the stored value untouched otherwise (#16, thanks @Wijnands)

## [1.8.0] - 2026-06-11

### Added

- **Per-email view override** — New `overrideView()` method on `TemplateMail` renders an email with your own Blade layout instead of the package's `fin-mail::email.default`, while keeping database-driven templates, token replacement, theming, logging, and attachments. The custom view receives the same variables as the default one (`$body`, `$preheader`, `$theme`, `$branding`) plus anything passed via `with()` or `extraData()`. Existing emails are unaffected if you don't call it (#14, thanks @agencetwogether)

## [1.7.1] - 2026-05-09

### Fixed

- `MissingSettings` exception during artisan boot when scheduled cleanup is registered before the `fin-mail-logging` settings have been migrated. The catch around `app(LoggingSettings::class)` didn't cover the lazy property access that actually triggers the load, so the exception escaped and broke `package:discover` and `fin-mail:install` in some setups (#13, thanks @devrizzz)

### Notes

- `spatie/laravel-settings` is now mentioned explicitly in the README as an auto-installed dependency

## [1.7.0] - 2026-05-05

### Added

- **Permission gating for custom actions** — `Preview`, `SendTest`, `Compose` (Email Templates) and `Resend` (Sent Emails) are now hidden from the UI when Filament Shield is installed and the authenticated user lacks the corresponding permission. Falls back to the previous always-visible behavior when Shield is absent, so existing installs are unaffected (#12, thanks @agencetwogether)
- `FinMailPlugin::isShieldAvailable()` helper for checking Shield presence
- `preview_heading` translation key for the preview modal header, populated across all 58 supported locales

### Changed

- `InstallCommand` now seeds `preview`, `sendTest`, `compose`, and `resend` into the Filament Shield config so `shield:generate` produces the matching policy methods and permissions
- Bulk delete on the Email Templates table now uses `authorizeIndividualRecords('delete')` when Shield is active

### Notes

- After upgrading on a Shield-enabled install, run `php artisan shield:generate --panel=admin --option=policies_and_permissions` to register the new permissions

## [1.6.0] - 2026-04-26

### Added

- **Pass extra view data to email templates** — New `extraData()` method (and native `with()` support) on `TemplateMail` for passing variables directly to the Blade view, separate from the token replacement system. Useful for view-only data that doesn't need to flow through the token engine (#10, thanks @agencetwogether)

### Fixed

- Reply-To section was missing from the email template infolist (view page). It's now displayed alongside the Custom Sender section (#11, thanks @agencetwogether)

## [1.5.0] - 2026-04-25

### Added

- **Reply-To support for templates** — Each template can now have its own reply-to address and name, configurable from the template settings tab. Falls back to `null` if not set, so existing templates are unaffected. The `TemplateMail` mailable also gains an `overrideReplyTo()` setter for runtime overrides (#9, thanks @agencetwogether)
- Reply-to translations added to all 58 supported locales

### Notes

- A new migration is included (`add_reply_to_on_email_templates_table`). Run `php artisan migrate` after upgrading.

## [1.4.1] - 2026-04-20

### Fixed

- Migrations now use configured table names from `fin-mail.php` config instead of hardcoded defaults, fixing issues with foreign key references when table names are customized (#7, thanks @agencetwogether)

## [1.4.0] - 2026-04-11

### Added

- **Custom block registration** — Register your own editor blocks via `FinMailPlugin::make()->customBlocks([...])`. Custom blocks now render correctly in the editor, preview mode, and sent emails. ButtonBlock is always included by default. Closes #6

### Changed

- Block rendering in `EmailTemplate`, `TipTapConverter`, and `DefaultEditor` now reads from a dynamic plugin-level registry instead of a hardcoded list

## [1.3.0] - 2026-04-01

### Added

- **Configurable date formatting** — New `date_format` and `datetime_format` config options, supporting a single string or a per-locale array. When null, Filament's defaults apply. Includes `FinMail::dateFormat()` and `FinMail::dateTimeFormat()` facade helpers
- **Token fields in test email modal** — Send test email modal now shows input fields for documented tokens (excluding `config.*` and `user.*`), pre-filled with example values from the token schema
- **Full rendered body storage** — Sent emails now store the complete HTML as actually delivered (layout, theme, branding, footer), not just the inner body content
- **Sent email infolist** — Sent email preview replaced with a proper Filament infolist using `TextEntry`, `ViewEntry`, and badge components
- **Laravel 13 support**
- **`@property` annotations on SentEmail model** for PHPStan

### Fixed

- Test emails sent from the template list now go through `EmailSender`, so they appear in the sent emails log
- Sent email preview now renders with full styling via base64 iframe, matching what was actually delivered
- Missing translations for `versioning.preview`, `sent.preview.*`, `settings.sections.add_additional_senders`, and `settings.sections.add_footer_links` across all 58 non-en/fr languages

### Changed

- All date/datetime displays across the plugin now use the configured format from `config/fin-mail.php`
- Sent email relation manager preview uses the shared `SentEmailInfolist` schema instead of a blade view
- Screenshots section in README uses collapsible `<details>` tags

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
