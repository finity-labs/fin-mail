<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'E-Mail',
        'templates' => 'Vorlagen',
        'themes' => 'Designs',
        'sent-emails' => 'Gesendete E-Mails',
        'settings' => 'Einstellungen',
    ],

    'models' => [
        'email_template' => 'E-Mail-Vorlage',
        'email_templates' => 'E-Mail-Vorlagen',
        'email_theme' => 'E-Mail-Design',
        'email_themes' => 'E-Mail-Designs',
        'sent_email' => 'Gesendete E-Mail',
        'sent_emails' => 'Gesendete E-Mails',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Inhalt',
            'settings' => 'Einstellungen',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Name',
            'key' => 'Schlüssel',
            'key_helper' => 'Eindeutiger Schlüssel für den Code: z.B. „invoice-sent"',
            'category' => 'Kategorie',
            'subject' => 'Betreff',
            'subject_helper' => 'Unterstützt Tokens: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Vorschautext',
            'preheader_helper' => 'Vorschautext, der in E-Mail-Clients angezeigt wird',
            'body' => 'Inhalt',
            'theme' => 'Design',
            'theme_placeholder' => 'Standarddesign',
            'is_active' => 'Aktiv',
            'is_active_helper' => 'Inaktive Vorlagen können nicht zum Versand verwendet werden',
            'tags' => 'Tags',
            'tags_placeholder' => 'Tags zur Organisation hinzufügen',
            'from_address' => 'Absender-E-Mail',
            'from_name' => 'Absendername',
            'locale' => 'Sprache',
        ],

        'sections' => [
            'custom_sender' => 'Benutzerdefinierter Absender',
            'custom_sender_description' => 'Standard-Absenderadresse für diese Vorlage überschreiben',
        ],

        'tokens' => [
            'label' => 'Verfügbare Tokens',
            'helper' => 'Dokumentieren Sie die verfügbaren Tokens für diese Vorlage. Dies hilft Redakteuren zu wissen, welche Variablen sie verwenden können.',
            'token' => 'Token',
            'description' => 'Beschreibung',
            'example' => 'Beispiel',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Der vollständige Name des Empfängers',
            'example_placeholder' => 'Max Mustermann',
            'new_item' => 'Neuer Token',
        ],

        'blocks' => [
            'button' => 'Schaltfläche',
            'button_heading' => 'Schaltfläche einfügen',
            'button_label' => 'Schaltflächentext',
            'button_url' => 'URL',
            'button_align' => 'Ausrichtung',
            'align_left' => 'Links',
            'align_center' => 'Zentriert',
            'align_right' => 'Rechts',
            'button_default_label' => 'Hier klicken',
        ],

        'columns' => [
            'locales' => 'Sprachen',
            'active' => 'Aktiv',
            'locked' => 'Gesperrt',
            'sent' => 'Gesendet',
            'updated_at' => 'Aktualisiert',
        ],

        'actions' => [
            'preview' => 'Vorschau',
            'send_test' => 'Test senden',
            'send_test_field' => 'Senden an',
            'send_test_locale' => 'Sprache',
            'compose' => 'E-Mail verfassen',
            'version_history' => 'Versionshistorie',
            'back_to_templates' => 'Zurück zu Vorlagen',
        ],

        'notifications' => [
            'test_sent' => 'Test-E-Mail gesendet!',
            'test_sent_body' => 'Gesendet an :email',
            'test_failed' => 'Test-E-Mail konnte nicht gesendet werden',
            'saved' => 'Vorlage gespeichert',
            'saved_body' => 'Ein Versions-Snapshot wurde automatisch gespeichert.',
            'locked_skipped' => 'Gesperrte Vorlagen übersprungen',
            'locked_skipped_body' => ':count gesperrte Vorlage(n) wurden übersprungen und nicht gelöscht.',
        ],

        'tooltips' => [
            'locked' => 'Diese Vorlage ist gesperrt — Schlüssel und Kategorie sind schreibgeschützt, Löschung ist verhindert.',
        ],

        'versioning' => [
            'date' => 'Datum',
            'by' => 'Von',
            'preview' => 'Vorschau',
            'restore' => 'Wiederherstellen',
            'restore_confirm' => 'Möchten Sie wirklich Version :version wiederherstellen? Der aktuelle Inhalt wird zuerst als neue Version gespeichert.',
            'restored' => 'Version :version wiederhergestellt.',
            'empty' => 'Keine Versionshistorie verfügbar.',
        ],

        'notices' => [
            'locked' => 'Diese Vorlage ist gesperrt. Die Felder Schlüssel und Kategorie können nicht geändert werden.',
        ],

        'language_label' => 'Sprache: :locale',

        'replicate_suffix' => '(Kopie)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'E-Mail verfassen',
        'title_with_name' => 'Verfassen: :name',

        'sections' => [
            'recipients' => 'Empfänger',
            'content' => 'E-Mail-Inhalt',
            'attachments' => 'Anhänge',
            'tokens' => 'Verfügbare Tokens',
        ],

        'fields' => [
            'from' => 'Von',
            'to' => 'An',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'E-Mail-Adressen eingeben',
            'cc_placeholder' => 'CC-Adressen',
            'bcc_placeholder' => 'BCC-Adressen',
            'locale' => 'Sprache',
            'subject' => 'Betreff',
            'preheader' => 'Vorschautext',
            'body' => 'Inhalt',
            'attach_files' => 'Dateien anhängen',
            'preheader_helper' => 'Vorschautext, der in E-Mail-Clients vor dem Öffnen angezeigt wird',
            'no_tokens' => 'Keine Tokens für diese Vorlage dokumentiert. Tokens wie {{ user.name }} werden beim Versand über die API/Code ersetzt.',
        ],

        'actions' => [
            'send' => 'E-Mail senden',
            'preview' => 'Vorschau',
        ],

        'confirm' => [
            'heading' => 'Senden bestätigen',
            'description' => 'Möchten Sie diese E-Mail wirklich senden?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Empfänger',
            'content' => 'Inhalt',
            'attachments' => 'Anhänge',
        ],

        'fields' => [
            'from' => 'Von',
            'to' => 'An',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Vorlage',
            'subject' => 'Betreff',
            'to_placeholder' => 'E-Mail-Adressen eingeben',
            'cc_placeholder' => 'CC-Adressen eingeben',
            'bcc_placeholder' => 'BCC-Adressen eingeben',
            'auto_attached' => 'Automatisch angehängte Dateien',
            'auto_attached_none' => 'Keine',
            'additional_attachments' => 'Weitere Anhänge',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'E-Mail senden',
        'modal_heading' => 'E-Mail verfassen',
        'submit' => 'Senden',

        'notifications' => [
            'sent' => 'E-Mail erfolgreich gesendet',
            'sent_body' => 'Gesendet an: :recipients',
            'failed' => 'E-Mail konnte nicht gesendet werden',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Design-Details',
            'background' => 'Hintergrund & Layout',
            'background_description' => 'Hauptstrukturfarben für das E-Mail-Layout.',
            'typography' => 'Typografie',
            'typography_description' => 'Farben für Text und Überschriften.',
            'buttons' => 'Schaltflächen',
            'buttons_description' => 'Gestaltung der Call-to-Action-Schaltflächen.',
            'footer' => 'Fußzeile',
            'footer_description' => 'Gestaltung der Fußzeile.',
            'preview' => 'Vorschau',
        ],

        'fields' => [
            'name' => 'Name',
            'is_default' => 'Standarddesign',
            'is_default_helper' => 'Das Standarddesign wird auf Vorlagen angewendet, die kein eigenes festlegen.',
            'page_background' => 'Seitenhintergrund',
            'content_background' => 'Inhaltshintergrund',
            'border' => 'Rahmen',
            'headings' => 'Überschriften',
            'body_text' => 'Fließtext',
            'secondary_text' => 'Sekundärtext',
            'links' => 'Links',
            'button_background' => 'Schaltflächenhintergrund',
            'button_text' => 'Schaltflächentext',
            'primary_accent' => 'Primär/Akzent',
            'footer_background' => 'Fußzeilenhintergrund',
            'footer_text' => 'Fußzeilentext',
        ],

        'columns' => [
            'primary' => 'Primär',
            'background' => 'Hintergrund',
            'text' => 'Text',
            'button' => 'Schaltfläche',
            'default' => 'Standard',
            'templates' => 'Vorlagen',
            'updated_at' => 'Aktualisiert',
        ],

        'replicate_suffix' => '(Kopie)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'An',
            'template' => 'Vorlage',
            'template_placeholder' => 'Benutzerdefiniert',
            'subject' => 'Betreff',
            'status' => 'Status',
            'sent_by' => 'Gesendet von',
            'sent_by_placeholder' => 'System',
            'related_to' => 'Bezogen auf',
            'sent_at' => 'Gesendet',
        ],

        'filters' => [
            'from' => 'Von',
            'until' => 'Bis',
        ],

        'actions' => [
            'view' => 'Anzeigen',
            'resend' => 'Erneut senden',
            'resend_description' => 'Es wird eine neue Kopie der E-Mail an die ursprünglichen Empfänger gesendet.',
        ],

        'preview' => [
            'from' => 'Von:',
            'to' => 'An:',
            'cc' => 'CC:',
            'template' => 'Vorlage:',
            'sent' => 'Gesendet:',
            'sent_not_yet' => 'Noch nicht',
            'status' => 'Status:',
            'no_body' => 'Der E-Mail-Inhalt wurde nicht gespeichert. Aktivieren Sie <code>logging.store_rendered_body</code> in den Einstellungen, um E-Mail-Inhalte zu speichern.',
            'error' => 'Fehlerdetails',
        ],
        'notifications' => [
            'resent' => 'E-Mail erneut gesendet',
            'resend_failed' => 'Erneutes Senden fehlgeschlagen',
        ],

        'errors' => [
            'no_rendered_body' => 'Erneutes Senden nicht möglich: Kein gerenderter Inhalt gespeichert. Aktivieren Sie logging.store_rendered_body in den Einstellungen.',
            'no_template' => 'Die ursprüngliche Vorlage existiert nicht mehr.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Gesendete E-Mails',

        'columns' => [
            'to' => 'An',
            'template' => 'Vorlage',
            'subject' => 'Betreff',
            'status' => 'Status',
            'sent_by' => 'Gesendet von',
            'sent_by_placeholder' => 'System',
            'sent_at' => 'Gesendet',
        ],

        'actions' => [
            'view' => 'Anzeigen',
            'resend' => 'Erneut senden',
            'resend_confirm' => 'Möchten Sie diese E-Mail wirklich erneut senden?',
        ],

        'notifications' => [
            'resent' => 'E-Mail erneut gesendet',
            'resend_failed' => 'Erneutes Senden fehlgeschlagen',
        ],

        'empty' => [
            'heading' => 'Keine E-Mails gesendet',
            'description' => 'E-Mails, die für diesen Datensatz gesendet werden, erscheinen hier.',
        ],

        'errors' => [
            'no_body' => 'Erneutes Senden nicht möglich: Kein gerenderter Inhalt oder Vorlage gespeichert.',
            'no_template' => 'Die ursprüngliche Vorlage existiert nicht mehr.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'E-Mail-Einstellungen',

        'tabs' => [
            'general' => 'Allgemein',
            'branding' => 'Branding',
            'logging' => 'Protokollierung',
            'attachments' => 'Anhänge',
            'auth_emails' => 'Auth-E-Mails',
        ],

        'titles' => [
            'general' => 'E-Mail-Vorlageneinstellungen - Allgemein',
            'branding' => 'E-Mail-Vorlageneinstellungen - Branding',
            'logging' => 'E-Mail-Vorlageneinstellungen - Protokollierung',
            'attachments' => 'E-Mail-Vorlageneinstellungen - Anhänge',
            'auth_emails' => 'E-Mail-Vorlageneinstellungen - Auth-E-Mails',
        ],

        'sections' => [
            'default_sender' => 'Standardabsender',
            'default_sender_description' => 'Die Standard-Absenderadresse für alle vom Plugin gesendeten E-Mails.',
            'additional_senders' => 'Weitere Absender',
            'add_additional_senders' => 'Weitere Absender hinzufügen',
            'additional_senders_description' => 'Zusätzliche Absenderadressen, die Benutzer beim Verfassen von E-Mails wählen können.',
            'localization' => 'Lokalisierung',
            'categories' => 'Vorlagenkategorien',
            'logo' => 'Logo',
            'colors' => 'Farben',
            'footer_links' => 'Fußzeilen-Links',
            'add_footer_links' => 'Fußzeilen-Links hinzufügen',
            'customer_service' => 'Kundenservice',
            'logging' => 'E-Mail-Protokollierung',
            'logging_description' => 'Steuern Sie, wie gesendete E-Mails in der Datenbank aufgezeichnet werden.',
            'cleanup' => 'Geplante Bereinigung',
            'cleanup_description' => 'Alte gesendete E-Mail-Einträge automatisch nach Zeitplan löschen.',
            'attachment_rules' => 'Anhang-Regeln',
            'attachment_rules_description' => 'Beschränkungen für Dateianhänge in verfassten E-Mails konfigurieren.',
            'auth_emails' => 'Auth-E-Mail-Überschreibungen',
            'auth_emails_description' => 'Die Standard-Authentifizierungs-E-Mails der Anwendung durch Ihre benutzerdefinierten Vorlagen ersetzen.',
        ],

        'fields' => [
            'from_email' => 'Absender-E-Mail',
            'from_name' => 'Absendername',
            'sender_email' => 'E-Mail',
            'sender_name' => 'Anzeigename',
            'sender_new' => 'Neuer Absender',
            'default_locale' => 'Standardsprache',
            'default_locale_helper' => 'Die Standardsprache für neue Vorlagen (z.B. en, hu, de).',
            'languages' => 'Verfügbare Sprachen',
            'language_code' => 'Code',
            'language_display' => 'Anzeigename',
            'language_flag' => 'Flaggensymbol',
            'language_new' => 'Neue Sprache',
            'category_key' => 'Schlüssel',
            'category_label' => 'Bezeichnung',
            'category_new' => 'Neue Kategorie',
            'logo_url' => 'Logo-URL oder Pfad',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Absolute URL oder Pfad zu Ihrem E-Mail-Logo.',
            'logo_width' => 'Breite (px)',
            'logo_height' => 'Höhe (px)',
            'content_width' => 'Inhaltsbreite (px)',
            'primary_color' => 'Primärfarbe',
            'footer_link_label' => 'Bezeichnung',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Neuer Link',
            'support_email' => 'Support-E-Mail',
            'support_phone' => 'Support-Telefon',
            'enable_logging' => 'Protokollierung aktivieren',
            'enable_logging_helper' => 'Wenn deaktiviert, werden keine gesendeten E-Mail-Einträge erstellt.',
            'store_rendered_body' => 'Gerenderten Inhalt speichern',
            'store_rendered_body_helper' => 'Das finale HTML jeder gesendeten E-Mail speichern. Erforderlich für erneutes Senden und Vorschau.',
            'retention_days' => 'Aufbewahrung (Tage)',
            'retention_days_helper' => 'Gesendete E-Mail-Einträge nach dieser Anzahl von Tagen automatisch löschen. Leer lassen, um sie für immer aufzubewahren.',
            'cleanup_enabled' => 'Geplante Bereinigung aktivieren',
            'cleanup_enabled_helper' => 'Den Bereinigungsbefehl automatisch nach Zeitplan ausführen.',
            'cleanup_frequency' => 'Bereinigungshäufigkeit',
            'max_file_size' => 'Max. Dateigröße (MB)',
            'allowed_extensions' => 'Erlaubte Dateierweiterungen',
            'allowed_extensions_placeholder' => 'Erweiterung hinzufügen (z.B. pdf)',
            'allowed_extensions_helper' => 'Erlaubte Dateierweiterungen für den Upload.',
            'override_verification' => 'E-Mail-Verifizierung überschreiben',
            'override_verification_helper' => 'Die Vorlage „user-verify-email" anstelle der Standard-Verifizierungs-E-Mail der Anwendung verwenden.',
            'override_password_reset' => 'Passwort-Zurücksetzung überschreiben',
            'override_password_reset_helper' => 'Die Vorlage „user-password-reset" anstelle der Standard-Passwort-Zurücksetzungs-E-Mail der Anwendung verwenden.',
            'override_welcome' => 'Willkommens-E-Mail überschreiben',
            'override_welcome_helper' => 'Eine Willkommens-E-Mail mit der Vorlage „user-welcome" senden, wenn sich ein neuer Benutzer registriert.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Entwurf',
            2 => 'In Warteschlange',
            3 => 'Gesendet',
            4 => 'Fehlgeschlagen',
        ],

        'cleanup_frequency' => [
            1 => 'Täglich',
            2 => 'Wöchentlich',
            3 => 'Monatlich',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Alle Rechte vorbehalten.',
    ],

];
