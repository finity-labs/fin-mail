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
];
