<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'Emaila',
        'templates' => 'Txantiloiak',
        'themes' => 'Gaiak',
        'sent-emails' => 'Bidalitako emailak',
        'settings' => 'Ezarpenak',
    ],

    'models' => [
        'email_template' => 'Email txantiloia',
        'email_templates' => 'Email txantiloiak',
        'email_theme' => 'Email gaia',
        'email_themes' => 'Email gaiak',
        'sent_email' => 'Bidalitako emaila',
        'sent_emails' => 'Bidalitako emailak',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Edukia',
            'settings' => 'Ezarpenak',
            'tokens' => 'Tokenak',
        ],

        'fields' => [
            'name' => 'Izena',
            'key' => 'Gakoa',
            'key_helper' => 'Kodean erabiltzen den gako bakarra: adib. "invoice-sent"',
            'category' => 'Kategoria',
            'subject' => 'Gaia',
            'subject_helper' => 'Tokenak onartzen ditu: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Aurrebista testua',
            'preheader_helper' => 'Email bezeroetan erakusten den aurrebista testua',
            'body' => 'Gorputza',
            'theme' => 'Gaia',
            'theme_placeholder' => 'Gai lehenetsia',
            'is_active' => 'Aktibo',
            'is_active_helper' => 'Txantiloi inaktiboak ezin dira bidaltzeko erabili',
            'tags' => 'Etiketak',
            'tags_placeholder' => 'Gehitu etiketak antolatzeko',
            'from_address' => 'Bidaltzailearen emaila',
            'from_name' => 'Bidaltzailearen izena',
            'locale' => 'Hizkuntza',
        ],

        'sections' => [
            'custom_sender' => 'Bidaltzaile pertsonalizatua',
            'custom_sender_description' => 'Txantiloi honetarako bidaltzaile-helbide lehenetsia gainidatzi',
        ],

        'tokens' => [
            'label' => 'Token erabilgarriak',
            'helper' => 'Dokumentatu txantiloi honetarako token erabilgarriak. Honek editoreei aldagai erabilgarriak jakiten laguntzen die.',
            'token' => 'Token',
            'description' => 'Deskribapena',
            'example' => 'Adibidea',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Hartzailearen izen osoa',
            'example_placeholder' => 'Mikel Etxeberria',
            'new_item' => 'Token berria',
        ],

        'columns' => [
            'locales' => 'Hizkuntzak',
            'active' => 'Aktibo',
            'locked' => 'Blokeatua',
            'sent' => 'Bidalita',
            'updated_at' => 'Eguneratua',
        ],

        'actions' => [
            'preview' => 'Aurrebista',
            'send_test' => 'Proba bidali',
            'send_test_field' => 'Bidali hona',
            'send_test_locale' => 'Hizkuntza',
            'compose' => 'Emaila idatzi',
            'version_history' => 'Bertsio historia',
            'back_to_templates' => 'Itzuli txantiloietara',
        ],

        'notifications' => [
            'test_sent' => 'Proba emaila bidali da!',
            'test_sent_body' => 'Hona bidali da: :email',
            'test_failed' => 'Ezin izan da proba emaila bidali',
            'saved' => 'Txantiloia gordeta',
            'saved_body' => 'Bertsio argazki bat automatikoki gorde da.',
            'locked_skipped' => 'Blokeatutako txantiloiak saltatu dira',
            'locked_skipped_body' => ':count blokeatutako txantiloi saltatu eta ez d(ir)a ezabatu.',
        ],

        'tooltips' => [
            'locked' => 'Txantiloi hau blokeatua dago — gakoa eta kategoria irakurtzeko soilik dira, ezabatzea galarazita dago.',
        ],

        'notices' => [
            'locked' => 'Txantiloi hau blokeatua dago. Gakoa eta kategoria eremuak ezin dira aldatu.',
        ],

        'language_label' => 'Hizkuntza: :locale',

        'replicate_suffix' => '(Kopia)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Emaila idatzi',
        'title_with_name' => 'Idatzi: :name',

        'sections' => [
            'recipients' => 'Hartzaileak',
            'content' => 'Email edukia',
            'attachments' => 'Eranskinak',
            'tokens' => 'Token erabilgarriak',
        ],

        'fields' => [
            'from' => 'Nork',
            'to' => 'Nori',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Sartu email helbideak',
            'cc_placeholder' => 'CC helbideak',
            'bcc_placeholder' => 'BCC helbideak',
            'locale' => 'Hizkuntza',
            'subject' => 'Gaia',
            'preheader' => 'Aurrebista testua',
            'body' => 'Gorputza',
            'attach_files' => 'Fitxategiak erantsi',
            'preheader_helper' => 'Email bezeroetan ireki aurretik erakusten den aurrebista testua',
            'no_tokens' => 'Ez dago token dokumentaturik txantiloi honetarako. {{ user.name }} bezalako tokenak API/kode bidez bidaltzean ordezkatuko dira.',
        ],

        'actions' => [
            'send' => 'Emaila bidali',
            'preview' => 'Aurrebista',
        ],

        'confirm' => [
            'heading' => 'Bidalketa berretsi',
            'description' => 'Ziur zaude email hau bidali nahi duzula?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Hartzaileak',
            'content' => 'Edukia',
            'attachments' => 'Eranskinak',
        ],

        'fields' => [
            'from' => 'Nork',
            'to' => 'Nori',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Txantiloia',
            'subject' => 'Gaia',
            'to_placeholder' => 'Sartu email helbideak',
            'cc_placeholder' => 'Sartu CC helbideak',
            'bcc_placeholder' => 'Sartu BCC helbideak',
            'auto_attached' => 'Automatikoki erantsitako fitxategiak',
            'auto_attached_none' => 'Bat ere ez',
            'additional_attachments' => 'Eranskin gehigarriak',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Emaila bidali',
        'modal_heading' => 'Emaila idatzi',
        'submit' => 'Bidali',

        'notifications' => [
            'sent' => 'Emaila ondo bidali da',
            'sent_body' => 'Hona bidali da: :recipients',
            'failed' => 'Ezin izan da emaila bidali',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Gaiaren xehetasunak',
            'background' => 'Atzeko planoa eta diseinua',
            'background_description' => 'Email diseinuaren egitura-kolore nagusiak.',
            'typography' => 'Tipografia',
            'typography_description' => 'Testuaren eta izenburuen koloreak.',
            'buttons' => 'Botoiak',
            'buttons_description' => 'Ekintza-botoien estiloa.',
            'footer' => 'Oina',
            'footer_description' => 'Oin-eremuaren estiloa.',
            'preview' => 'Aurrebista',
        ],

        'fields' => [
            'name' => 'Izena',
            'is_default' => 'Gai lehenetsia',
            'is_default_helper' => 'Gai lehenetsia gairik zehazten ez duten txantiloietan aplikatzen da.',
            'page_background' => 'Orriaren atzeko planoa',
            'content_background' => 'Edukiaren atzeko planoa',
            'border' => 'Ertza',
            'headings' => 'Izenburuak',
            'body_text' => 'Gorputz testua',
            'secondary_text' => 'Bigarren mailako testua',
            'links' => 'Estekak',
            'button_background' => 'Botoiaren atzeko planoa',
            'button_text' => 'Botoiaren testua',
            'primary_accent' => 'Nagusia/Azentua',
            'footer_background' => 'Oinaren atzeko planoa',
            'footer_text' => 'Oinaren testua',
        ],

        'columns' => [
            'primary' => 'Nagusia',
            'background' => 'Atzeko planoa',
            'text' => 'Testua',
            'button' => 'Botoia',
            'default' => 'Lehenetsia',
            'templates' => 'Txantiloiak',
            'updated_at' => 'Eguneratua',
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
            'to' => 'Nori',
            'template' => 'Txantiloia',
            'template_placeholder' => 'Pertsonalizatua',
            'sent_by' => 'Nork bidalia',
            'subject' => 'Gaia',
            'status' => 'Egoera',
            'sent_by_placeholder' => 'Sistema',
            'related_to' => 'Honekin lotua',
            'sent_at' => 'Bidalita',
        ],

        'filters' => [
            'from' => 'Noiztik',
            'until' => 'Noiz arte',
        ],

        'actions' => [
            'view' => 'Ikusi',
            'resend' => 'Birbidali',
            'resend_description' => 'Emailaren kopia berri bat bidaliko zaie jatorrizko hartzaileei.',
        ],

        'notifications' => [
            'resent' => 'Emaila ondo birbidali da',
            'resend_failed' => 'Ezin izan da emaila birbidali',
        ],

        'errors' => [
            'no_rendered_body' => 'Ezin da birbidali: ez dago gorputz errendaturik gordeta. Gaitu logging.store_rendered_body ezarpenetan.',
            'no_template' => 'Jatorrizko txantiloia ez da existitzen.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Bidalitako emailak',

        'columns' => [
            'to' => 'Nori',
            'template' => 'Txantiloia',
            'subject' => 'Gaia',
            'status' => 'Egoera',
            'sent_by' => 'Nork bidalia',
            'sent_by_placeholder' => 'Sistema',
            'sent_at' => 'Bidalita',
        ],

        'actions' => [
            'view' => 'Ikusi',
            'resend' => 'Birbidali',
            'resend_confirm' => 'Ziur zaude email hau birbidali nahi duzula?',
        ],

        'notifications' => [
            'resent' => 'Emaila ondo birbidali da',
            'resend_failed' => 'Birbidalketa huts egin du',
        ],

        'empty' => [
            'heading' => 'Ez da emailik bidali',
            'description' => 'Erregistro honetarako bidalitako emailak hemen agertuko dira.',
        ],

        'errors' => [
            'no_body' => 'Ezin da birbidali: ez dago gorputz errendaturik edo txantiloirik gordeta.',
            'no_template' => 'Jatorrizko txantiloia ez da existitzen.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Email ezarpenak',

        'tabs' => [
            'general' => 'Orokorra',
            'branding' => 'Marka',
            'logging' => 'Erregistroa',
            'attachments' => 'Eranskinak',
            'auth_emails' => 'Autentifikazio emailak',
        ],

        'titles' => [
            'general' => 'Email txantiloi ezarpenak - Orokorra',
            'branding' => 'Email txantiloi ezarpenak - Marka',
            'logging' => 'Email txantiloi ezarpenak - Erregistroa',
            'attachments' => 'Email txantiloi ezarpenak - Eranskinak',
            'auth_emails' => 'Email txantiloi ezarpenak - Autentifikazio emailak',
        ],

        'sections' => [
            'default_sender' => 'Bidaltzaile lehenetsia',
            'default_sender_description' => 'Pluginak bidalitako email guztien bidaltzaile-helbide lehenetsia.',
            'additional_senders' => 'Bidaltzaile gehigarriak',
            'additional_senders_description' => 'Erabiltzaileek emailak idazterakoan aukeratu ditzaketen bidaltzaile-helbide gehigarriak.',
            'localization' => 'Lokalizazioa',
            'categories' => 'Txantiloi kategoriak',
            'logo' => 'Logoa',
            'colors' => 'Koloreak',
            'footer_links' => 'Oin-estekak',
            'customer_service' => 'Bezero-arreta',
            'logging' => 'Email erregistroa',
            'logging_description' => 'Kontrolatu bidalitako emailak datu-basean nola erregistratzen diren.',
            'cleanup' => 'Programatutako garbiketa',
            'cleanup_description' => 'Automatikoki ezabatu bidalitako email erregistro zaharrak programazio baten arabera.',
            'attachment_rules' => 'Eranskin arauak',
            'attachment_rules_description' => 'Konfiguratu idatzitako emailetako eranskinen mugak.',
            'auth_emails' => 'Autentifikazio email gainidazketa',
            'auth_emails_description' => 'Aplikazioaren autentifikazio email lehenetsiak zure txantiloi pertsonalizatuekin ordeztu.',
        ],

        'fields' => [
            'from_email' => 'Bidaltzailearen emaila',
            'from_name' => 'Bidaltzailearen izena',
            'sender_email' => 'Emaila',
            'sender_name' => 'Erakusteko izena',
            'sender_new' => 'Bidaltzaile berria',
            'default_locale' => 'Hizkuntza lehenetsia',
            'default_locale_helper' => 'Txantiloi berrietarako hizkuntza lehenetsia (adib. en, hu, de).',
            'languages' => 'Hizkuntza erabilgarriak',
            'language_code' => 'Kodea',
            'language_display' => 'Erakusteko izena',
            'language_flag' => 'Bandera ikonoa',
            'language_new' => 'Hizkuntza berria',
            'category_key' => 'Gakoa',
            'category_label' => 'Etiketa',
            'category_new' => 'Kategoria berria',
            'logo_url' => 'Logo URL edo bidea',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL absolutua edo bidea zure email logora.',
            'logo_width' => 'Zabalera (px)',
            'logo_height' => 'Altuera (px)',
            'content_width' => 'Eduki zabalera (px)',
            'primary_color' => 'Kolore nagusia',
            'footer_link_label' => 'Etiketa',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Esteka berria',
            'support_email' => 'Laguntza emaila',
            'support_phone' => 'Laguntza telefonoa',
            'enable_logging' => 'Erregistroa gaitu',
            'enable_logging_helper' => 'Desgaituta dagoenean, ez da bidalitako email erregistrorik sortuko.',
            'store_rendered_body' => 'Errendatutako gorputza gorde',
            'store_rendered_body_helper' => 'Bidalitako email bakoitzaren azken HTML gordetzea. Beharrezkoa birbidalketa eta aurrebista funtzioetarako.',
            'retention_days' => 'Atxikipena (egunak)',
            'retention_days_helper' => 'Automatikoki ezabatu bidalitako email erregistroak egun kopuru honen ondoren. Utzi hutsik betiko gordetzeko.',
            'cleanup_enabled' => 'Programatutako garbiketa gaitu',
            'cleanup_enabled_helper' => 'Automatikoki exekutatu garbiketa komandoa programazio baten arabera.',
            'cleanup_frequency' => 'Garbiketa maiztasuna',
            'max_file_size' => 'Fitxategi tamaina maximoa (MB)',
            'allowed_extensions' => 'Baimendutako fitxategi luzapenak',
            'allowed_extensions_placeholder' => 'Gehitu luzapena (adib. pdf)',
            'allowed_extensions_helper' => 'Kargatzeko baimendutako fitxategi luzapenak.',
            'override_verification' => 'Email egiaztapena gainidatzi',
            'override_verification_helper' => 'Erabili "user-verify-email" txantiloia aplikazioaren egiaztapen email lehenetsiaren ordez.',
            'override_password_reset' => 'Pasahitz berrezarpena gainidatzi',
            'override_password_reset_helper' => 'Erabili "user-password-reset" txantiloia aplikazioaren pasahitz berrezarpen email lehenetsiaren ordez.',
            'override_welcome' => 'Ongietorri emaila gainidatzi',
            'override_welcome_helper' => 'Bidali ongietorri emaila "user-welcome" txantiloiarekin erabiltzaile berri bat erregistratzen denean.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Eskubide guztiak erreserbatuta.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Zirriborroa',
            2 => 'Ilaran',
            3 => 'Bidalita',
            4 => 'Huts eginda',
        ],

        'cleanup_frequency' => [
            1 => 'Egunero',
            2 => 'Astero',
            3 => 'Hilero',
        ],
    ],

];
