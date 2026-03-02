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
        'settings' => 'Installningar',
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
            'content' => 'Innehall',
            'settings' => 'Installningar',
            'tokens' => 'Variabler',
        ],

        'fields' => [
            'name' => 'Namn',
            'key' => 'Nyckel',
            'key_helper' => 'Unik nyckel som anvands i koden, t.ex. "invoice-sent"',
            'category' => 'Kategori',
            'subject' => 'Amne',
            'subject_helper' => 'Stoder variabler: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Forhandstext',
            'preheader_helper' => 'Forhandsvisningstext som visas i e-postklienter',
            'body' => 'Brodtext',
            'theme' => 'Tema',
            'theme_placeholder' => 'Standardtema',
            'is_active' => 'Aktiv',
            'is_active_helper' => 'Inaktiva mallar kan inte anvandas for att skicka',
            'tags' => 'Taggar',
            'tags_placeholder' => 'Lagg till taggar for organisering',
            'from_address' => 'Avsandarens e-post',
            'from_name' => 'Avsandarens namn',
            'locale' => 'Sprak',
        ],

        'sections' => [
            'custom_sender' => 'Anpassad avsandare',
            'custom_sender_description' => 'Overskrid standardavsandaradressen for denna mall',
        ],

        'tokens' => [
            'label' => 'Tillgangliga variabler',
            'helper' => 'Dokumentera variablerna som ar tillgangliga for denna mall. Detta hjalper redaktorer att veta vilka variabler de kan anvanda.',
            'token' => 'Variabel',
            'description' => 'Beskrivning',
            'example' => 'Exempel',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Mottagarens fullstandiga namn',
            'example_placeholder' => 'John Doe',
            'new_item' => 'Ny variabel',
        ],

        'columns' => [
            'locales' => 'Sprak',
            'active' => 'Aktiv',
            'locked' => 'Last',
            'sent' => 'Skickade',
            'updated_at' => 'Uppdaterad',
        ],

        'actions' => [
            'preview' => 'Forhandsgranska',
            'send_test' => 'Skicka test',
            'send_test_field' => 'Skicka till',
            'send_test_locale' => 'Sprak',
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
            'locked_skipped' => 'Lasta mallar hoppades over',
            'locked_skipped_body' => ':count last(a) mall(ar) hoppades over och raderades inte.',
        ],

        'tooltips' => [
            'locked' => 'Denna mall ar last -- nyckel och kategori ar skrivskyddade, och radering ar forhindrad.',
        ],

        'notices' => [
            'locked' => 'Denna mall ar last. Nyckel- och kategorifalten kan inte andras.',
        ],

        'language_label' => 'Sprak: :locale',

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
            'content' => 'E-postinnehall',
            'attachments' => 'Bilagor',
            'tokens' => 'Tillgangliga variabler',
        ],

        'fields' => [
            'from' => 'Fran',
            'to' => 'Till',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Ange e-postadresser',
            'cc_placeholder' => 'CC-adresser',
            'bcc_placeholder' => 'BCC-adresser',
            'locale' => 'Sprak',
            'subject' => 'Amne',
            'preheader' => 'Forhandstext',
            'body' => 'Brodtext',
            'attach_files' => 'Bifoga filer',
            'preheader_helper' => 'Forhandsvisningstext som visas i e-postklienter innan oppning',
            'no_tokens' => 'Inga variabler dokumenterade for denna mall. Variabler som {{ user.name }} ersatts nar de skickas via API/kod.',
        ],

        'actions' => [
            'send' => 'Skicka e-post',
            'preview' => 'Forhandsgranska',
        ],

        'confirm' => [
            'heading' => 'Bekrafta utskick',
            'description' => 'Ar du saker pa att du vill skicka detta e-postmeddelande?',
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
            'content' => 'Innehall',
            'attachments' => 'Bilagor',
        ],

        'fields' => [
            'from' => 'Fran',
            'to' => 'Till',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Mall',
            'subject' => 'Amne',
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
            'background_description' => 'Huvudsakliga strukturfarger for e-postlayouten.',
            'typography' => 'Typografi',
            'typography_description' => 'Farger for text och rubriker.',
            'buttons' => 'Knappar',
            'buttons_description' => 'Utformning av handlingsuppmaningsknappar.',
            'footer' => 'Sidfot',
            'footer_description' => 'Utformning av sidfotssektionen.',
            'preview' => 'Forhandsgranska',
        ],

        'fields' => [
            'name' => 'Namn',
            'is_default' => 'Standardtema',
            'is_default_helper' => 'Standardtemat tillampas pa mallar som inte anger ett.',
            'page_background' => 'Sidbakgrund',
            'content_background' => 'Innehallsbakgrund',
            'border' => 'Ram',
            'headings' => 'Rubriker',
            'body_text' => 'Brodtext',
            'secondary_text' => 'Sekundar text',
            'links' => 'Lankar',
            'button_background' => 'Knappbakgrund',
            'button_text' => 'Knapptext',
            'primary_accent' => 'Primar/Accent',
            'footer_background' => 'Sidfotsbakgrund',
            'footer_text' => 'Sidfotstext',
        ],

        'columns' => [
            'primary' => 'Primar',
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
            'subject' => 'Amne',
            'status' => 'Status',
            'sent_by_placeholder' => 'System',
            'related_to' => 'Relaterad till',
            'sent_at' => 'Skickad',
        ],

        'filters' => [
            'from' => 'Fran',
            'until' => 'Till',
        ],

        'actions' => [
            'view' => 'Visa',
            'resend' => 'Skicka igen',
            'resend_description' => 'Detta skickar en ny kopia av e-postmeddelandet till de ursprungliga mottagarna.',
        ],

        'notifications' => [
            'resent' => 'E-postmeddelandet skickades igen',
            'resend_failed' => 'Kunde inte skicka e-postmeddelandet igen',
        ],

        'errors' => [
            'no_rendered_body' => 'Kan inte skicka igen: ingen renderad text sparad. Aktivera logging.store_rendered_body i installningarna.',
            'no_template' => 'Originalmallen finns inte langre.',
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
            'subject' => 'Amne',
            'status' => 'Status',
            'sent_by' => 'Skickad av',
            'sent_by_placeholder' => 'System',
            'sent_at' => 'Skickad',
        ],

        'actions' => [
            'view' => 'Visa',
            'resend' => 'Skicka igen',
            'resend_confirm' => 'Ar du saker pa att du vill skicka detta e-postmeddelande igen?',
        ],

        'notifications' => [
            'resent' => 'E-postmeddelandet skickades igen',
            'resend_failed' => 'Kunde inte skicka igen',
        ],

        'empty' => [
            'heading' => 'Inga e-postmeddelanden skickade',
            'description' => 'E-postmeddelanden som skickats for denna post visas har.',
        ],

        'errors' => [
            'no_body' => 'Kan inte skicka igen: ingen renderad text eller mall sparad.',
            'no_template' => 'Originalmallen finns inte langre.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'E-postinstallningar',

        'tabs' => [
            'general' => 'Allmant',
            'branding' => 'Varumarke',
            'logging' => 'Loggning',
            'attachments' => 'Bilagor',
            'auth_emails' => 'Autentiserings-e-post',
        ],

        'titles' => [
            'general' => 'E-postmallinstallningar - Allmant',
            'branding' => 'E-postmallinstallningar - Varumarke',
            'logging' => 'E-postmallinstallningar - Loggning',
            'attachments' => 'E-postmallinstallningar - Bilagor',
            'auth_emails' => 'E-postmallinstallningar - Autentiserings-e-post',
        ],

        'sections' => [
            'default_sender' => 'Standardavsandare',
            'default_sender_description' => 'Standard "Fran"-adressen for alla e-postmeddelanden som skickas av tillaget.',
            'additional_senders' => 'Ytterligare avsandare',
            'additional_senders_description' => 'Extra "Fran"-adresser som anvandare kan valja nar de skriver e-post.',
            'localization' => 'Sprakinstallningar',
            'categories' => 'Mallkategorier',
            'logo' => 'Logotyp',
            'colors' => 'Farger',
            'footer_links' => 'Sidfotlankar',
            'customer_service' => 'Kundtjanst',
            'logging' => 'E-postloggning',
            'logging_description' => 'Styr hur skickade e-postmeddelanden registreras i databasen.',
            'cleanup' => 'Schemalagd rensning',
            'cleanup_description' => 'Radera automatiskt gamla skickade e-postposter enligt ett schema.',
            'attachment_rules' => 'Bilageregler',
            'attachment_rules_description' => 'Konfigurera granser for filbilagor i komponerade e-postmeddelanden.',
            'auth_emails' => 'Overskridning av autentiserings-e-post',
            'auth_emails_description' => 'Overskrid applikationens standardautentiserings-e-postmeddelanden med dina anpassade mallar.',
        ],

        'fields' => [
            'from_email' => 'Avsandarens e-post',
            'from_name' => 'Avsandarens namn',
            'sender_email' => 'E-post',
            'sender_name' => 'Visningsnamn',
            'sender_new' => 'Ny avsandare',
            'default_locale' => 'Standardsprak',
            'default_locale_helper' => 'Standardspraket for nya mallar (t.ex. en, hu, de).',
            'languages' => 'Tillgangliga sprak',
            'language_code' => 'Kod',
            'language_display' => 'Visningsnamn',
            'language_flag' => 'Flaggikon',
            'language_new' => 'Nytt sprak',
            'category_key' => 'Nyckel',
            'category_label' => 'Etikett',
            'category_new' => 'Ny kategori',
            'logo_url' => 'Logotyp-URL eller sokvaag',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Absolut URL eller sokvaag till din e-postlogotyp.',
            'logo_width' => 'Bredd (px)',
            'logo_height' => 'Hojd (px)',
            'content_width' => 'Innehallsbredd (px)',
            'primary_color' => 'Primarfarg',
            'footer_link_label' => 'Etikett',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Ny lank',
            'support_email' => 'Support-e-post',
            'support_phone' => 'Supporttelefon',
            'enable_logging' => 'Aktivera loggning',
            'enable_logging_helper' => 'Nar det ar inaktiverat skapas inga poster for skickade e-postmeddelanden.',
            'store_rendered_body' => 'Spara renderad text',
            'store_rendered_body_helper' => 'Spara den slutgiltiga HTML-koden for varje skickat e-postmeddelande. Kravs for funktionerna "skicka igen" och "forhandsgranska".',
            'retention_days' => 'Bevaringstid (dagar)',
            'retention_days_helper' => 'Radera automatiskt poster for skickade e-postmeddelanden efter detta antal dagar. Lamna tomt for att behalla for alltid.',
            'cleanup_enabled' => 'Aktivera schemalagd rensning',
            'cleanup_enabled_helper' => 'Kor automatiskt rensningskommandot enligt ett schema.',
            'cleanup_frequency' => 'Rensningsfrekvens',
            'max_file_size' => 'Max filstorlek (MB)',
            'allowed_extensions' => 'Tillatna filtillagg',
            'allowed_extensions_placeholder' => 'Lagg till tillagg (t.ex. pdf)',
            'allowed_extensions_helper' => 'Filtillagg som ar tillatna for uppladdning.',
            'override_verification' => 'Overskrid e-postverifiering',
            'override_verification_helper' => 'Anvand mallen "user-verify-email" istallet for applikationens standardverifieringsmeddelande.',
            'override_password_reset' => 'Overskrid losenordsaterstaallning',
            'override_password_reset_helper' => 'Anvand mallen "user-password-reset" istallet for applikationens standardmeddelande for losenordsaterstaallning.',
            'override_welcome' => 'Overskrid valkomstmeddelande',
            'override_welcome_helper' => 'Skicka ett valkomstmeddelande med mallen "user-welcome" nar en ny anvandare registrerar sig.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Alla rattigheter forbehallna.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Utkast',
            2 => 'I ko',
            3 => 'Skickat',
            4 => 'Misslyckat',
        ],

        'cleanup_frequency' => [
            1 => 'Dagligen',
            2 => 'Veckovis',
            3 => 'Manadsvis',
        ],
    ],

];
