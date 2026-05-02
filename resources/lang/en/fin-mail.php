<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'Email',
        'templates' => 'Templates',
        'themes' => 'Themes',
        'sent-emails' => 'Sent Emails',
        'settings' => 'Settings',
    ],

    'models' => [
        'email_template' => 'Email template',
        'email_templates' => 'Email templates',
        'email_theme' => 'Email theme',
        'email_themes' => 'Email themes',
        'sent_email' => 'Sent email',
        'sent_emails' => 'Sent emails',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Content',
            'settings' => 'Settings',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Name',
            'key' => 'Key',
            'key_helper' => 'Unique key used in code: e.g., "invoice-sent"',
            'category' => 'Category',
            'subject' => 'Subject',
            'subject_helper' => 'Supports tokens: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Preheader',
            'preheader_helper' => 'Preview text shown in email clients',
            'body' => 'Body',
            'theme' => 'Theme',
            'theme_placeholder' => 'Default theme',
            'is_active' => 'Active',
            'is_active_helper' => 'Inactive templates cannot be used for sending',
            'tags' => 'Tags',
            'tags_placeholder' => 'Add tags for organization',
            'from_address' => 'From Email',
            'from_name' => 'From Name',
            'reply_to_address' => 'Recipient Email',
            'reply_to_name' => 'Recipient Name',
            'locale' => 'Language',
        ],

        'sections' => [
            'custom_sender' => 'Custom Sender',
            'custom_sender_description' => 'Override the default from address for this template',
            'custom_reply_to' => 'Custom Reply To',
            'custom_reply_to_description' => 'Set reply to address for this template',
        ],

        'tokens' => [
            'label' => 'Available Tokens',
            'helper' => 'Document the tokens available for this template. This helps editors know what variables they can use.',
            'token' => 'Token',
            'description' => 'Description',
            'example' => 'Example',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'The full name of the recipient',
            'example_placeholder' => 'John Doe',
            'new_item' => 'New Token',
        ],

        'blocks' => [
            'button' => 'Button',
            'button_heading' => 'Insert Button',
            'button_label' => 'Button Text',
            'button_url' => 'URL',
            'button_align' => 'Alignment',
            'align_left' => 'Left',
            'align_center' => 'Center',
            'align_right' => 'Right',
            'button_default_label' => 'Click here',
        ],

        'columns' => [
            'locales' => 'Locales',
            'active' => 'Active',
            'locked' => 'Locked',
            'sent' => 'Sent',
            'updated_at' => 'Updated',
        ],

        'actions' => [
            'preview' => 'Preview',
            'preview_heading' => 'Preview: :record',
            'send_test' => 'Send Test',
            'send_test_field' => 'Send to',
            'send_test_locale' => 'Language',
            'compose' => 'Compose Email',
            'version_history' => 'Version History',
            'back_to_templates' => 'Back to Templates',
        ],

        'notifications' => [
            'test_sent' => 'Test email sent!',
            'test_sent_body' => 'Sent to :email',
            'test_failed' => 'Failed to send test email',
            'saved' => 'Template saved',
            'saved_body' => 'A version snapshot was saved automatically.',
            'locked_skipped' => 'Locked templates skipped',
            'locked_skipped_body' => ':count locked template(s) were skipped and not deleted.',
        ],

        'tooltips' => [
            'locked' => 'This template is locked — key and category are read-only, deletion is prevented.',
        ],

        'versioning' => [
            'date' => 'Date',
            'by' => 'By',
            'preview' => 'Preview',
            'restore' => 'Restore',
            'restore_confirm' => 'Are you sure you want to restore version :version? The current content will be saved as a new version first.',
            'restored' => 'Version :version restored.',
            'empty' => 'No version history available.',
        ],

        'notices' => [
            'locked' => 'This template is locked. The key and category fields cannot be changed.',
        ],

        'language_label' => 'Language: :locale',

        'replicate_suffix' => '(Copy)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Compose Email',
        'title_with_name' => 'Compose: :name',

        'sections' => [
            'recipients' => 'Recipients',
            'content' => 'Email Content',
            'attachments' => 'Attachments',
            'tokens' => 'Available Tokens',
        ],

        'fields' => [
            'from' => 'From',
            'to' => 'To',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Enter email addresses',
            'cc_placeholder' => 'CC addresses',
            'bcc_placeholder' => 'BCC addresses',
            'locale' => 'Language',
            'subject' => 'Subject',
            'preheader' => 'Preheader',
            'body' => 'Body',
            'attach_files' => 'Attach Files',
            'preheader_helper' => 'Preview text shown in email clients before opening',
            'no_tokens' => 'No tokens documented for this template. Tokens like {{ user.name }} will be replaced when sent via the API/code.',
        ],

        'actions' => [
            'send' => 'Send Email',
            'preview' => 'Preview',
        ],

        'confirm' => [
            'heading' => 'Confirm Send',
            'description' => 'Are you sure you want to send this email?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Recipients',
            'content' => 'Content',
            'attachments' => 'Attachments',
        ],

        'fields' => [
            'from' => 'From',
            'to' => 'To',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Template',
            'subject' => 'Subject',
            'to_placeholder' => 'Enter email addresses',
            'cc_placeholder' => 'Enter CC addresses',
            'bcc_placeholder' => 'Enter BCC addresses',
            'auto_attached' => 'Auto-attached files',
            'auto_attached_none' => 'None',
            'additional_attachments' => 'Additional Attachments',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Send Email',
        'modal_heading' => 'Compose Email',
        'submit' => 'Send',

        'notifications' => [
            'sent' => 'Email sent successfully',
            'sent_body' => 'Sent to: :recipients',
            'failed' => 'Failed to send email',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Theme Details',
            'background' => 'Background & Layout',
            'background_description' => 'Main structural colors for the email layout.',
            'typography' => 'Typography',
            'typography_description' => 'Colors for text and headings.',
            'buttons' => 'Buttons',
            'buttons_description' => 'Call-to-action button styling.',
            'footer' => 'Footer',
            'footer_description' => 'Footer area styling.',
            'preview' => 'Preview',
        ],

        'fields' => [
            'name' => 'Name',
            'is_default' => 'Default Theme',
            'is_default_helper' => 'The default theme is applied to templates that don\'t specify one.',
            'page_background' => 'Page Background',
            'content_background' => 'Content Background',
            'border' => 'Border',
            'headings' => 'Headings',
            'body_text' => 'Body Text',
            'secondary_text' => 'Secondary Text',
            'links' => 'Links',
            'button_background' => 'Button Background',
            'button_text' => 'Button Text',
            'primary_accent' => 'Primary/Accent',
            'footer_background' => 'Footer Background',
            'footer_text' => 'Footer Text',
        ],

        'columns' => [
            'primary' => 'Primary',
            'background' => 'Background',
            'text' => 'Text',
            'button' => 'Button',
            'default' => 'Default',
            'templates' => 'Templates',
            'updated_at' => 'Updated',
        ],

        'replicate_suffix' => '(Copy)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'To',
            'template' => 'Template',
            'template_placeholder' => 'Custom',
            'sent_by' => 'Sent By',
            'subject' => 'Subject',
            'status' => 'Status',
            'sent_by_placeholder' => 'System',
            'related_to' => 'Related To',
            'sent_at' => 'Sent',
        ],

        'filters' => [
            'from' => 'From',
            'until' => 'Until',
        ],

        'actions' => [
            'view' => 'View',
            'resend' => 'Resend',
            'resend_description' => 'This will send a new copy of the email to the original recipients.',
        ],

        'preview' => [
            'from' => 'From:',
            'to' => 'To:',
            'cc' => 'CC:',
            'template' => 'Template:',
            'sent' => 'Sent:',
            'sent_not_yet' => 'Not yet',
            'status' => 'Status:',
            'no_body' => 'Email body was not stored. Enable <code>logging.store_rendered_body</code> in settings to save email content.',
            'error' => 'Error Details',
        ],

        'notifications' => [
            'resent' => 'Email resent successfully',
            'resend_failed' => 'Failed to resend email',
        ],

        'errors' => [
            'no_rendered_body' => 'Cannot resend: no rendered body stored. Enable logging.store_rendered_body in settings.',
            'no_template' => 'Original template no longer exists.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Sent Emails',

        'columns' => [
            'to' => 'To',
            'template' => 'Template',
            'subject' => 'Subject',
            'status' => 'Status',
            'sent_by' => 'Sent By',
            'sent_by_placeholder' => 'System',
            'sent_at' => 'Sent',
        ],

        'actions' => [
            'view' => 'View',
            'resend' => 'Resend',
            'resend_confirm' => 'Are you sure you want to resend this email?',
        ],

        'notifications' => [
            'resent' => 'Email resent successfully',
            'resend_failed' => 'Failed to resend',
        ],

        'empty' => [
            'heading' => 'No emails sent',
            'description' => 'Emails sent for this record will appear here.',
        ],

        'errors' => [
            'no_body' => 'Cannot resend: no rendered body or template stored.',
            'no_template' => 'Original template no longer exists.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Email Settings',

        'tabs' => [
            'general' => 'General',
            'branding' => 'Branding',
            'logging' => 'Logging',
            'attachments' => 'Attachments',
            'auth_emails' => 'Auth Emails',
        ],

        'titles' => [
            'general' => 'Email Template Settings - General',
            'branding' => 'Email Template Settings - Branding',
            'logging' => 'Email Template Settings - Logging',
            'attachments' => 'Email Template Settings - Attachments',
            'auth_emails' => 'Email Template Settings - Auth Emails',
        ],

        'sections' => [
            'default_sender' => 'Default Sender',
            'default_sender_description' => 'The default "From" address for all emails sent by the plugin.',
            'additional_senders' => 'Additional Senders',
            'add_additional_senders' => 'Add Additional Senders',
            'additional_senders_description' => 'Extra "From" addresses users can choose when composing emails.',
            'localization' => 'Localization',
            'categories' => 'Template Categories',
            'logo' => 'Logo',
            'colors' => 'Colors',
            'footer_links' => 'Footer Links',
            'add_footer_links' => 'Add Footer Links',
            'customer_service' => 'Customer Service',
            'logging' => 'Email Logging',
            'logging_description' => 'Control how sent emails are recorded in the database.',
            'cleanup' => 'Scheduled Cleanup',
            'cleanup_description' => 'Automatically delete old sent email records on a schedule.',
            'attachment_rules' => 'Attachment Rules',
            'attachment_rules_description' => 'Configure limits for file attachments in composed emails.',
            'auth_emails' => 'Auth Email Overrides',
            'auth_emails_description' => 'Override the application\'s default authentication emails with your custom templates.',
        ],

        'fields' => [
            'from_email' => 'From Email',
            'from_name' => 'From Name',
            'sender_email' => 'Email',
            'sender_name' => 'Display Name',
            'sender_new' => 'New Sender',
            'default_locale' => 'Default Locale',
            'default_locale_helper' => 'The default language for new templates (e.g., en, hu, de).',
            'languages' => 'Available Languages',
            'language_code' => 'Code',
            'language_display' => 'Display Name',
            'language_flag' => 'Flag Icon',
            'language_new' => 'New Language',
            'category_key' => 'Key',
            'category_label' => 'Label',
            'category_new' => 'New Category',
            'logo_url' => 'Logo URL or Path',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Absolute URL or path to your email logo.',
            'logo_width' => 'Width (px)',
            'logo_height' => 'Height (px)',
            'content_width' => 'Content Width (px)',
            'primary_color' => 'Primary Color',
            'footer_link_label' => 'Label',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'New Link',
            'support_email' => 'Support Email',
            'support_phone' => 'Support Phone',
            'enable_logging' => 'Enable Logging',
            'enable_logging_helper' => 'When disabled, no sent email records will be created.',
            'store_rendered_body' => 'Store Rendered Body',
            'store_rendered_body_helper' => 'Save the final HTML of each sent email. Required for resend and preview features.',
            'retention_days' => 'Retention (days)',
            'retention_days_helper' => 'Auto-delete sent email records after this many days. Leave empty to keep forever.',
            'cleanup_enabled' => 'Enable Scheduled Cleanup',
            'cleanup_enabled_helper' => 'Automatically run the cleanup command on a schedule.',
            'cleanup_frequency' => 'Cleanup Frequency',
            'max_file_size' => 'Max File Size (MB)',
            'allowed_extensions' => 'Allowed File Extensions',
            'allowed_extensions_placeholder' => 'Add extension (e.g., pdf)',
            'allowed_extensions_helper' => 'File extensions allowed for upload.',
            'override_verification' => 'Override Email Verification',
            'override_verification_helper' => 'Use the "user-verify-email" template instead of the application\'s default verification email.',
            'override_password_reset' => 'Override Password Reset',
            'override_password_reset_helper' => 'Use the "user-password-reset" template instead of the application\'s default password reset email.',
            'override_welcome' => 'Override Welcome Email',
            'override_welcome_helper' => 'Send a welcome email using the "user-welcome" template when a new user registers.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. All rights reserved.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Draft',
            2 => 'Queued',
            3 => 'Sent',
            4 => 'Failed',
        ],

        'cleanup_frequency' => [
            1 => 'Daily',
            2 => 'Weekly',
            3 => 'Monthly',
        ],
    ],

];
