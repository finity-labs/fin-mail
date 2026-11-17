<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Table Names
    |--------------------------------------------------------------------------
    |
    | Customize the database table names used by the plugin.
    |
    */
    'table_names' => [
        'templates' => 'email_templates',
        'versions' => 'email_template_versions',
        'themes' => 'email_themes',
        'sent' => 'sent_emails',
    ],

    /*
    |--------------------------------------------------------------------------
    | Editor
    |--------------------------------------------------------------------------
    |
    | The WYSIWYG editor used for template body editing.
    |
    | 'default' uses Filament's built-in RichEditor (zero dependencies).
    | You can swap to any editor by providing a class implementing EditorContract:
    |   \FinityLabs\FinMail\Editors\TiptapEditor::class
    |   \FinityLabs\FinMail\Editors\TinyMceEditor::class
    |   \App\Editors\MyCustomEditor::class
    |
    */
    'editor' => 'default',

    /*
    |--------------------------------------------------------------------------
    | Queue Settings
    |--------------------------------------------------------------------------
    */
    'queue' => [
        'enabled' => true,
        'connection' => null,
        'queue' => 'emails',
    ],

    /*
    |--------------------------------------------------------------------------
    | Template Versioning
    |--------------------------------------------------------------------------
    */
    'versioning' => [
        'enabled' => true,
        'max_versions' => 50,
    ],

    /*
    |--------------------------------------------------------------------------
    | Attachments Disk
    |--------------------------------------------------------------------------
    */
    'attachments_disk' => 'local',

    /*
    |--------------------------------------------------------------------------
    | Auth Email Overrides
    |--------------------------------------------------------------------------
    |
    | When true, the password reset and email verification overrides store
    | their rendered body in the Sent Emails log like any other email, so you
    | can audit exactly what was sent. Off by default: these bodies contain
    | signed URLs, and anyone who can read the log could replay a still-valid
    | reset link. The log entry itself is always created.
    |
    */

    'auth_emails' => [
        'store_rendered_body' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Date & DateTime Formatting
    |--------------------------------------------------------------------------
    |
    | Controls how dates and datetimes are displayed throughout the plugin.
    | Set a string for a global format, or an array keyed by locale:
    |
    |   'date_format' => 'd/m/Y',
    |   'datetime_format' => ['en' => 'M d, Y H:i', 'de' => 'd.m.Y H:i'],
    |
    | When null, Filament's default formatting is used.
    |
    */
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

    /*
    |--------------------------------------------------------------------------
    | Token Replacement
    |--------------------------------------------------------------------------
    |
    | Token format: {{ model.attribute }}
    | Config tokens: {{ config.app.name }}
    | Conditional:   {% if user.is_premium %} ... {% endif %}
    | Fallback:      {{ user.name | 'Valued Customer' }}
    |
    */
    'tokens' => [
        'allowed_config_keys' => [
            'app.name',
            'app.url',
        ],

        'open' => '{{',
        'close' => '}}',
    ],

    /*
    |--------------------------------------------------------------------------
    | Layouts
    |--------------------------------------------------------------------------
    |
    | The layout is the Blade view that frames every email: head, header,
    | content box and footer. The template body is printed inside it as $body.
    |
    | 'layout' is used for every template that has no layout of its own.
    | 'layouts' lists the views editors can pick per template, as
    | view => label (a translation key works). The Layout field on the
    | template form only shows when this list has entries.
    |
    | A layout receives $body, $preheader, $theme, $branding, $locale,
    | $direction ('ltr' or 'rtl') and $template (key and category), plus
    | anything passed with ->with(). Previews pass no ->with() data, so a
    | layout should fall back when its own variables are missing.
    |
    */
    'layout' => 'fin-mail::email.default',

    'layouts' => [
        // 'mail.layouts.site' => 'Customer mail',
        // 'mail.layouts.admin' => 'Admin copy',
    ],

    /*
    |--------------------------------------------------------------------------
    | Extra Theme Colors
    |--------------------------------------------------------------------------
    |
    | Colors your own layouts or block views read from the theme, on top of
    | the built-in ones. Each key gets a picker in the "Other" section of the
    | theme form; the values are saved on the theme. A theme without a value
    | for a key uses its default.
    |
    */
    'theme_colors' => [
        // 'header_bg' => ['label' => 'Header background', 'default' => '#0b2545'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Social Platforms
    |--------------------------------------------------------------------------
    |
    | The platforms offered for the social links on the branding page, as
    | key => label. The default layout prints an icon for facebook, instagram,
    | x, youtube and tiktok once the icons are published, and a text link for
    | any other platform.
    |
    */
    'social_platforms' => [
        'facebook' => 'Facebook',
        'instagram' => 'Instagram',
        'x' => 'X',
        'youtube' => 'YouTube',
        'tiktok' => 'TikTok',
        'linkedin' => 'LinkedIn',
    ],

    /*
    |--------------------------------------------------------------------------
    | Block Views
    |--------------------------------------------------------------------------
    |
    | The built-in blocks render through fin-mail::blocks.{block id}. Point a
    | block id at your own view to change its markup, e.g.
    |   'emailButton' => 'mail.blocks.button',
    | The view receives $config, $theme, $locale and $id.
    |
    | 'hidden_blocks' removes blocks from the editor's block menu by id,
    | built-in or your own. Hide a block only while no template uses it: the
    | editor cannot edit a block it does not know.
    |
    */
    'block_views' => [],

    'hidden_blocks' => [
        // 'emailCredentials',
    ],

    /*
    |--------------------------------------------------------------------------
    | Element Styles
    |--------------------------------------------------------------------------
    |
    | Inline styles added to the elements of the template body, which carry
    | no styles of their own. Keys are element names (p, h2, h3, a, strong,
    | b, em, i, ul, ol, li, table, th, td), values are style strings that may
    | use theme colors as {key}, e.g. 'margin: 0 0 16px; color: {text};'.
    | Only properties an element does not already have are added, and the
    | blocks' own markup is left alone.
    |
    */
    'element_styles' => [],

    'element_style_rules' => [
        // The body's last element gets margin-bottom: 0.
        'last_element_margin' => false,
        // A link whose text is a bare URL gets word-break: break-all.
        'bare_url_break' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Preheader Fallback
    |--------------------------------------------------------------------------
    |
    | When enabled, a template whose preheader is empty in the email's
    | language uses the body's first paragraph after the greeting instead,
    | cut at a word boundary. Off by default because it changes the inbox
    | preview of every template without a preheader.
    |
    */
    'preheader_fallback' => [
        'enabled' => false,
        'length' => 110,
    ],
];
