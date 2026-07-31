<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'E-post',
        'templates' => 'Mallar',
        'themes' => 'Teman',
        'sent-emails' => 'Skickade e-postmeddelanden',
        'settings' => 'Inställningar',
    ],

    'models' => [
        'email_template' => 'E-postmall',
        'email_templates' => 'E-postmallar',
        'email_theme' => 'E-posttema',
        'email_themes' => 'E-postteman',
        'sent_email' => 'Skickat e-postmeddelande',
        'sent_emails' => 'Skickade e-postmeddelanden',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Innehåll',
            'settings' => 'Inställningar',
            'tokens' => 'Variabler',
        ],

        'fields' => [
            'name' => 'Namn',
            'key' => 'Nyckel',
            'key_helper' => 'Unik nyckel som används i koden, t.ex. "invoice-sent"',
            'category' => 'Kategori',
            'subject' => 'Ämne',
            'subject_helper' => 'Stöder variabler: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Förhandstext',
            'preheader_helper' => 'Förhandsvisningstext som visas i e-postklienter',
            'body' => 'Brödtext',
            'theme' => 'Tema',
            'theme_placeholder' => 'Standardtema',
            'is_active' => 'Aktiv',
            'is_active_helper' => 'Inaktiva mallar kan inte användas för att skicka',
            'tags' => 'Taggar',
            'tags_placeholder' => 'Lägg till taggar för organisering',
            'from_address' => 'Avsändarens e-post',
            'from_name' => 'Avsändarens namn',
            'reply_to_address' => 'Mottagar-e-post',
            'reply_to_name' => 'Mottagarnamn',
            'locale' => 'Språk',
        ],

        'sections' => [
            'custom_sender' => 'Anpassad avsändare',
            'custom_sender_description' => 'Överskrid standardavsändaradressen för denna mall',
            'custom_reply_to' => 'Anpassad svarsadress',
            'custom_reply_to_description' => 'Ange svarsadress för denna mall',
        ],

        'tokens' => [
            'label' => 'Tillgängliga variabler',
            'helper' => 'Dokumentera variablerna som är tillgängliga för denna mall. Detta hjälper redaktörer att veta vilka variabler de kan använda.',
            'token' => 'Variabel',
            'description' => 'Beskrivning',
            'example' => 'Exempel',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Mottagarens fullständiga namn',
            'example_placeholder' => 'John Doe',
            'new_item' => 'Ny variabel',
        ],

        'blocks' => [
            'button' => 'Knapp',
            'button_heading' => 'Infoga knapp',
            'button_label' => 'Knapptext',
            'button_url' => 'URL',
            'button_align' => 'Justering',
            'align_left' => 'Vänster',
            'align_center' => 'Centrerad',
            'align_right' => 'Höger',
            'button_default_label' => 'Klicka här',
        ],

        'columns' => [
            'locales' => 'Språk',
            'active' => 'Aktiv',
            'locked' => 'Låst',
            'sent' => 'Skickade',
            'updated_at' => 'Uppdaterad',
        ],

        'actions' => [
            'preview' => 'Förhandsgranska',
            'preview_heading' => 'Förhandsgranska: :record',
            'send_test' => 'Skicka test',
            'send_test_field' => 'Skicka till',
            'send_test_locale' => 'Språk',
            'compose' => 'Skriv e-post',
            'version_history' => 'Versionshistorik',
            'back_to_templates' => 'Tillbaka till mallar',
        ],

        'notifications' => [
            'test_sent' => 'Test-e-post skickat!',
            'test_sent_body' => 'Skickat till :email',
            'test_failed' => 'Kunde inte skicka test-e-post',
            'saved' => 'Mallen sparad',
            'saved_body' => 'En version sparades automatiskt.',
            'locked_skipped' => 'Låsta mallar hoppades över',
            'locked_skipped_body' => ':count låst(a) mall(ar) hoppades över och raderades inte.',
        ],

        'tooltips' => [
            'locked' => 'Denna mall är låst — nyckel och kategori är skrivskyddade, och radering är förhindrad.',
        ],

        'versioning' => [
            'date' => 'Datum',
            'by' => 'Av',
            'preview' => 'Förhandsgranska',
            'restore' => 'Återställ',
            'restore_confirm' => 'Är du säker på att du vill återställa version :version? Det aktuella innehållet sparas som en ny version först.',
            'restored' => 'Version :version återställd.',
            'empty' => 'Ingen versionshistorik tillgänglig.',
        ],

        'notices' => [
            'locked' => 'Denna mall är låst. Nyckel- och kategorifälten kan inte ändras.',
        ],

        'language_label' => 'Språk: :locale',

        'replicate_suffix' => '(Kopia)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Skriv e-post',
        'title_with_name' => 'Skriv: :name',

        'sections' => [
            'recipients' => 'Mottagare',
            'content' => 'E-postinnehåll',
            'attachments' => 'Bilagor',
            'tokens' => 'Tillgängliga variabler',
        ],

        'fields' => [
            'from' => 'Från',
            'to' => 'Till',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Ange e-postadresser',
            'cc_placeholder' => 'CC-adresser',
            'bcc_placeholder' => 'BCC-adresser',
            'locale' => 'Språk',
            'subject' => 'Ämne',
            'preheader' => 'Förhandstext',
            'body' => 'Brödtext',
            'attach_files' => 'Bifoga filer',
            'preheader_helper' => 'Förhandsvisningstext som visas i e-postklienter innan öppning',
            'no_tokens' => 'Inga variabler dokumenterade för denna mall. Variabler som {{ user.name }} ersätts när de skickas via API/kod.',
        ],

        'actions' => [
            'send' => 'Skicka e-post',
            'preview' => 'Förhandsgranska',
        ],

        'confirm' => [
            'heading' => 'Bekräfta utskick',
            'description' => 'Är du säker på att du vill skicka detta e-postmeddelande?',
            'description_multiple' => 'Du har flera mottagare. Välj hur du vill skicka detta e-postmeddelande.',
            'send_mode_label' => 'Hur ska det skickas?',
            'send_mode_individual' => 'Skicka varje e-postmeddelande separat',
            'send_mode_individual_help' => 'Ett separat e-postmeddelande skickas till varje mottagare i "Till"-fältet, så att de inte ser varandras adresser. Alla CC/BCC-kontakter får en kopia av varje meddelande.',
            'send_mode_combined' => 'Skicka som ett enda e-postmeddelande med flera mottagare',
            'send_mode_combined_help' => 'Ett enda e-postmeddelande skickas till alla. Alla "Till"- och CC-adresser är synliga för varje mottagare.',
        ],

        'notifications' => [
            'individual_sent' => 'E-postmeddelanden skickade',
            'individual_sent_body' => ':count separat e-postmeddelande har skickats.|:count separata e-postmeddelanden har skickats.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Mottagare',
            'content' => 'Innehåll',
            'attachments' => 'Bilagor',
        ],

        'fields' => [
            'from' => 'Från',
            'to' => 'Till',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Mall',
            'subject' => 'Ämne',
            'to_placeholder' => 'Ange e-postadresser',
            'cc_placeholder' => 'Ange CC-adresser',
            'bcc_placeholder' => 'Ange BCC-adresser',
            'auto_attached' => 'Automatiskt bifogade filer',
            'auto_attached_none' => 'Inga',
            'additional_attachments' => 'Ytterligare bilagor',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Skicka e-post',
        'modal_heading' => 'Skriv e-post',
        'submit' => 'Skicka',

        'notifications' => [
            'sent' => 'E-postmeddelandet skickades',
            'sent_body' => 'Skickat till: :recipients',
            'failed' => 'Kunde inte skicka e-postmeddelandet',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Temadetaljer',
            'background' => 'Bakgrund och layout',
            'background_description' => 'Huvudsakliga strukturfärger för e-postlayouten.',
            'typography' => 'Typografi',
            'typography_description' => 'Färger för text och rubriker.',
            'buttons' => 'Knappar',
            'buttons_description' => 'Utformning av handlingsuppmaningsknappar.',
            'footer' => 'Sidfot',
            'footer_description' => 'Utformning av sidfotssektionen.',
            'preview' => 'Förhandsgranska',
        ],

        'fields' => [
            'name' => 'Namn',
            'is_default' => 'Standardtema',
            'is_default_helper' => 'Standardtemat tillämpas på mallar som inte anger ett.',
            'page_background' => 'Sidbakgrund',
            'content_background' => 'Innehållsbakgrund',
            'border' => 'Ram',
            'headings' => 'Rubriker',
            'body_text' => 'Brödtext',
            'secondary_text' => 'Sekundär text',
            'links' => 'Länkar',
            'button_background' => 'Knappbakgrund',
            'button_text' => 'Knapptext',
            'primary_accent' => 'Primär/Accent',
            'footer_background' => 'Sidfotsbakgrund',
            'footer_text' => 'Sidfotstext',
        ],

        'columns' => [
            'primary' => 'Primär',
            'background' => 'Bakgrund',
            'text' => 'Text',
            'button' => 'Knapp',
            'default' => 'Standard',
            'templates' => 'Mallar',
            'updated_at' => 'Uppdaterad',
        ],

        'replicate_suffix' => '(Kopia)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Till',
            'template' => 'Mall',
            'template_placeholder' => 'Anpassad',
            'sent_by' => 'Skickad av',
            'subject' => 'Ämne',
            'status' => 'Status',
            'sent_by_placeholder' => 'System',
            'related_to' => 'Relaterad till',
            'sent_at' => 'Skickad',
        ],

        'filters' => [
            'from' => 'Från',
            'until' => 'Till',
        ],

        'actions' => [
            'view' => 'Visa',
            'resend' => 'Skicka igen',
            'resend_description' => 'Detta skickar en ny kopia av e-postmeddelandet till de ursprungliga mottagarna.',
        ],

        'preview' => [
            'from' => 'Från:',
            'to' => 'Till:',
            'cc' => 'CC:',
            'template' => 'Mall:',
            'sent' => 'Skickat:',
            'sent_not_yet' => 'Inte ännu',
            'status' => 'Status:',
            'no_body' => 'E-postens innehåll sparades inte. Aktivera <code>logging.store_rendered_body</code> i inställningarna för att spara e-postinnehåll.',
            'error' => 'Feldetaljer',
        ],
        'notifications' => [
            'resent' => 'E-postmeddelandet skickades igen',
            'resend_failed' => 'Kunde inte skicka e-postmeddelandet igen',
        ],

        'errors' => [
            'no_rendered_body' => 'Kan inte skicka igen: ingen renderad text sparad. Aktivera logging.store_rendered_body i inställningarna.',
            'no_template' => 'Originalmallen finns inte längre.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Skickade e-postmeddelanden',

        'columns' => [
            'to' => 'Till',
            'template' => 'Mall',
            'subject' => 'Ämne',
            'status' => 'Status',
            'sent_by' => 'Skickad av',
            'sent_by_placeholder' => 'System',
            'sent_at' => 'Skickad',
        ],

        'actions' => [
            'view' => 'Visa',
            'resend' => 'Skicka igen',
            'resend_confirm' => 'Är du säker på att du vill skicka detta e-postmeddelande igen?',
        ],

        'notifications' => [
            'resent' => 'E-postmeddelandet skickades igen',
            'resend_failed' => 'Kunde inte skicka igen',
        ],

        'empty' => [
            'heading' => 'Inga e-postmeddelanden skickade',
            'description' => 'E-postmeddelanden som skickats för denna post visas här.',
        ],

        'errors' => [
            'no_body' => 'Kan inte skicka igen: ingen renderad text eller mall sparad.',
            'no_template' => 'Originalmallen finns inte längre.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'E-postinställningar',

        'tabs' => [
            'general' => 'Allmänt',
            'branding' => 'Varumärke',
            'logging' => 'Loggning',
            'attachments' => 'Bilagor',
            'auth_emails' => 'Autentiserings-e-post',
        ],

        'titles' => [
            'general' => 'E-postmallinställningar - Allmänt',
            'branding' => 'E-postmallinställningar - Varumärke',
            'logging' => 'E-postmallinställningar - Loggning',
            'attachments' => 'E-postmallinställningar - Bilagor',
            'auth_emails' => 'E-postmallinställningar - Autentiserings-e-post',
        ],

        'sections' => [
            'default_sender' => 'Standardavsändare',
            'default_sender_description' => 'Standard "Från"-adressen för alla e-postmeddelanden som skickas av tillägget.',
            'additional_senders' => 'Ytterligare avsändare',
            'add_additional_senders' => 'Lägg till ytterligare avsändare',
            'additional_senders_description' => 'Extra "Från"-adresser som användare kan välja när de skriver e-post.',
            'localization' => 'Språkinställningar',
            'categories' => 'Mallkategorier',
            'logo' => 'Logotyp',
            'colors' => 'Färger',
            'footer_links' => 'Sidfotlänkar',
            'add_footer_links' => 'Lägg till sidfotslänkar',
            'customer_service' => 'Kundtjänst',
            'logging' => 'E-postloggning',
            'logging_description' => 'Styr hur skickade e-postmeddelanden registreras i databasen.',
            'cleanup' => 'Schemalagd rensning',
            'cleanup_description' => 'Radera automatiskt gamla skickade e-postposter enligt ett schema.',
            'attachment_rules' => 'Bilageregler',
            'attachment_rules_description' => 'Konfigurera gränser för filbilagor i komponerade e-postmeddelanden.',
            'auth_emails' => 'Överskridning av autentiserings-e-post',
            'auth_emails_description' => 'Överskrid applikationens standardautentiserings-e-postmeddelanden med dina anpassade mallar.',
        ],

        'fields' => [
            'from_email' => 'Avsändarens e-post',
            'from_name' => 'Avsändarens namn',
            'sender_email' => 'E-post',
            'sender_name' => 'Visningsnamn',
            'sender_new' => 'Ny avsändare',
            'default_locale' => 'Standardspråk',
            'default_locale_helper' => 'Standardspråket för nya mallar (t.ex. en, hu, de).',
            'languages' => 'Tillgängliga språk',
            'language_code' => 'Kod',
            'language_display' => 'Visningsnamn',
            'language_flag' => 'Flaggikon',
            'language_new' => 'Nytt språk',
            'category_key' => 'Nyckel',
            'category_label' => 'Etikett',
            'category_new' => 'Ny kategori',
            'logo_url' => 'Logotyp-URL eller sökväg',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Absolut URL eller sökväg till din e-postlogotyp.',
            'logo_width' => 'Bredd (px)',
            'logo_height' => 'Höjd (px)',
            'content_width' => 'Innehållsbredd (px)',
            'primary_color' => 'Primärfärg',
            'footer_link_label' => 'Etikett',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Ny länk',
            'support_email' => 'Support-e-post',
            'support_phone' => 'Supporttelefon',
            'enable_logging' => 'Aktivera loggning',
            'enable_logging_helper' => 'När det är inaktiverat skapas inga poster för skickade e-postmeddelanden.',
            'store_rendered_body' => 'Spara renderad text',
            'store_rendered_body_helper' => 'Spara den slutgiltiga HTML-koden för varje skickat e-postmeddelande. Krävs för funktionerna "skicka igen" och "förhandsgranska".',
            'retention_days' => 'Bevaringstid (dagar)',
            'retention_days_helper' => 'Radera automatiskt poster för skickade e-postmeddelanden efter detta antal dagar. Lämna tomt för att behålla för alltid.',
            'cleanup_enabled' => 'Aktivera schemalagd rensning',
            'cleanup_enabled_helper' => 'Kör automatiskt rensningskommandot enligt ett schema.',
            'cleanup_frequency' => 'Rensningsfrekvens',
            'max_file_size' => 'Max filstorlek (MB)',
            'allowed_extensions' => 'Tillåtna filtillägg',
            'allowed_extensions_placeholder' => 'Lägg till tillägg (t.ex. pdf)',
            'allowed_extensions_helper' => 'Filtillägg som är tillåtna för uppladdning.',
            'override_verification' => 'Överskrid e-postverifiering',
            'override_verification_helper' => 'Använd mallen "user-verify-email" istället för applikationens standardverifieringsmeddelande.',
            'override_password_reset' => 'Överskrid lösenordsåterställning',
            'override_password_reset_helper' => 'Använd mallen "user-password-reset" istället för applikationens standardmeddelande för lösenordsåterställning.',
            'override_welcome' => 'Överskrid välkomstmeddelande',
            'override_welcome_helper' => 'Skicka ett välkomstmeddelande med mallen "user-welcome" när en ny användare registrerar sig.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Alla rättigheter förbehållna.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Utkast',
            2 => 'I kö',
            3 => 'Skickat',
            4 => 'Misslyckat',
        ],

        'cleanup_frequency' => [
            1 => 'Dagligen',
            2 => 'Veckovis',
            3 => 'Månadsvis',
        ],
    ],

];
