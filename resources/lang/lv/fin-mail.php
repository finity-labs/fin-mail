<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'E-pasts',
        'templates' => 'Veidnes',
        'themes' => 'Temas',
        'sent-emails' => 'Nosutitie e-pasti',
        'settings' => 'Iestatijumi',
    ],

    'models' => [
        'email_template' => 'E-pasta veidne',
        'email_templates' => 'E-pasta veidnes',
        'email_theme' => 'E-pasta tema',
        'email_themes' => 'E-pasta temas',
        'sent_email' => 'Nosutitais e-pasts',
        'sent_emails' => 'Nosutitie e-pasti',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Saturs',
            'settings' => 'Iestatijumi',
            'tokens' => 'Mainigo',
        ],

        'fields' => [
            'name' => 'Nosaukums',
            'key' => 'Atslega',
            'key_helper' => 'Unikala atslega, ko izmanto koda: piem., "invoice-sent"',
            'category' => 'Kategorija',
            'subject' => 'Temats',
            'subject_helper' => 'Atbalsta mainigos: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Prieksskatijuma teksts',
            'preheader_helper' => 'Prieksskatijuma teksts, kas tiek radits e-pasta klientos',
            'body' => 'Pamatteksts',
            'theme' => 'Tema',
            'theme_placeholder' => 'Noklusejuma tema',
            'is_active' => 'Aktivs',
            'is_active_helper' => 'Neaktivas veidnes nevar izmantot sutisanai',
            'tags' => 'Birkas',
            'tags_placeholder' => 'Pievienojiet birkas organizesanai',
            'from_address' => 'No e-pasta',
            'from_name' => 'No varda',
            'locale' => 'Valoda',
        ],

        'sections' => [
            'custom_sender' => 'Pielagots sutitajs',
            'custom_sender_description' => 'Parrakstit noklusejuma sutitaja adresi sai veidnei',
        ],

        'tokens' => [
            'label' => 'Pieejamie maingie',
            'helper' => 'Dokumentejiet mainigos, kas pieejami sai veidnei. Tas palidzs redaktoriem zinat, kadus mainigos vini var izmantot.',
            'token' => 'Mainigais',
            'description' => 'Apraksts',
            'example' => 'Piemers',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Pilnais sanemeja vards',
            'example_placeholder' => 'Janis Berzins',
            'new_item' => 'Jauns mainigais',
        ],

        'columns' => [
            'locales' => 'Valodas',
            'active' => 'Aktivs',
            'locked' => 'Blokets',
            'sent' => 'Nosutits',
            'updated_at' => 'Atjaunots',
        ],

        'actions' => [
            'preview' => 'Prieksskatijums',
            'send_test' => 'Sutit testu',
            'send_test_field' => 'Sutit uz',
            'send_test_locale' => 'Valoda',
            'compose' => 'Rakstit e-pastu',
            'version_history' => 'Versiju vesture',
            'back_to_templates' => 'Atpakal uz veidnem',
        ],

        'notifications' => [
            'test_sent' => 'Testa e-pasts nosutits!',
            'test_sent_body' => 'Nosutits uz :email',
            'test_failed' => 'Neizdevas nosutit testa e-pastu',
            'saved' => 'Veidne saglabata',
            'saved_body' => 'Versijas momentuznemums tika saglabats automatiski.',
            'locked_skipped' => 'Bloketais veidnes izlaistas',
            'locked_skipped_body' => ':count bloketa(s) veidne(s) tika izlaista(s) un netika dzesta(s).',
        ],

        'tooltips' => [
            'locked' => 'Si veidne ir bloketa — atslega un kategorija ir tikai lasamas, dzesana nav atlauta.',
        ],

        'notices' => [
            'locked' => 'Si veidne ir bloketa. Atslegas un kategorijas laukus nevar mainit.',
        ],

        'language_label' => 'Valoda: :locale',

        'replicate_suffix' => '(Kopija)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Rakstit e-pastu',
        'title_with_name' => 'Rakstit: :name',

        'sections' => [
            'recipients' => 'Sanemaji',
            'content' => 'E-pasta saturs',
            'attachments' => 'Pielikumi',
            'tokens' => 'Pieejamie maingie',
        ],

        'fields' => [
            'from' => 'No',
            'to' => 'Kam',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Ievadiet e-pasta adreses',
            'cc_placeholder' => 'CC adreses',
            'bcc_placeholder' => 'BCC adreses',
            'locale' => 'Valoda',
            'subject' => 'Temats',
            'preheader' => 'Prieksskatijuma teksts',
            'body' => 'Pamatteksts',
            'attach_files' => 'Pievienot failus',
            'preheader_helper' => 'Prieksskatijuma teksts, kas tiek radits e-pasta klientos pirms atversanas',
            'no_tokens' => 'Sai veidnei nav dokumentetu mainigo. Maingie, piemeram, {{ user.name }} tiks aizstati, sutot caur API/kodu.',
        ],

        'actions' => [
            'send' => 'Sutit e-pastu',
            'preview' => 'Prieksskatijums',
        ],

        'confirm' => [
            'heading' => 'Apstiprinat sutisanu',
            'description' => 'Vai tiesat velaties nosutit so e-pastu?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Sanemaji',
            'content' => 'Saturs',
            'attachments' => 'Pielikumi',
        ],

        'fields' => [
            'from' => 'No',
            'to' => 'Kam',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Veidne',
            'subject' => 'Temats',
            'to_placeholder' => 'Ievadiet e-pasta adreses',
            'cc_placeholder' => 'Ievadiet CC adreses',
            'bcc_placeholder' => 'Ievadiet BCC adreses',
            'auto_attached' => 'Automatiski pievienotie faili',
            'auto_attached_none' => 'Nav',
            'additional_attachments' => 'Papildu pielikumi',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Sutit e-pastu',
        'modal_heading' => 'Rakstit e-pastu',
        'submit' => 'Sutit',

        'notifications' => [
            'sent' => 'E-pasts veiksmigi nosutits',
            'sent_body' => 'Nosutits uz: :recipients',
            'failed' => 'Neizdevas nosutit e-pastu',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Temas detajas',
            'background' => 'Fons un izkartojums',
            'background_description' => 'Galvenas strukturalas krasas e-pasta izkartojumam.',
            'typography' => 'Tipografija',
            'typography_description' => 'Krasas tekstam un virsrakstiem.',
            'buttons' => 'Pogas',
            'buttons_description' => 'Darbibas pogu stils.',
            'footer' => 'Kajene',
            'footer_description' => 'Kajenes apgabala stils.',
            'preview' => 'Prieksskatijums',
        ],

        'fields' => [
            'name' => 'Nosaukums',
            'is_default' => 'Noklusejuma tema',
            'is_default_helper' => 'Noklusejuma tema tiek lietota veidnem, kuram nav noradita konkreta tema.',
            'page_background' => 'Lapas fons',
            'content_background' => 'Satura fons',
            'border' => 'Apmale',
            'headings' => 'Virsraksti',
            'body_text' => 'Pamatteksts',
            'secondary_text' => 'Sekundarais teksts',
            'links' => 'Saites',
            'button_background' => 'Pogas fons',
            'button_text' => 'Pogas teksts',
            'primary_accent' => 'Primare/Akcenta krasa',
            'footer_background' => 'Kajenes fons',
            'footer_text' => 'Kajenes teksts',
        ],

        'columns' => [
            'primary' => 'Primara',
            'background' => 'Fons',
            'text' => 'Teksts',
            'button' => 'Poga',
            'default' => 'Noklusejuma',
            'templates' => 'Veidnes',
            'updated_at' => 'Atjaunots',
        ],

        'replicate_suffix' => '(Kopija)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Kam',
            'template' => 'Veidne',
            'template_placeholder' => 'Pielagots',
            'sent_by' => 'Nosutitajs',
            'subject' => 'Temats',
            'status' => 'Statuss',
            'sent_by_placeholder' => 'Sistema',
            'related_to' => 'Saistits ar',
            'sent_at' => 'Nosutits',
        ],

        'filters' => [
            'from' => 'No',
            'until' => 'Lidz',
        ],

        'actions' => [
            'view' => 'Apskatit',
            'resend' => 'Sutit atkartoti',
            'resend_description' => 'Tas nosutis jaunu e-pasta kopiju sakotnajiem sanemajiem.',
        ],

        'notifications' => [
            'resent' => 'E-pasts veiksmigi nosutits atkartoti',
            'resend_failed' => 'Neizdevas atkartoti nosutit e-pastu',
        ],

        'errors' => [
            'no_rendered_body' => 'Nevar nosutit atkartoti: nav saglabata rendereta satura. Iespejojiet logging.store_rendered_body iestatijumos.',
            'no_template' => 'Sakotna veidne vairs nepastav.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Nosutitie e-pasti',

        'columns' => [
            'to' => 'Kam',
            'template' => 'Veidne',
            'subject' => 'Temats',
            'status' => 'Statuss',
            'sent_by' => 'Nosutitajs',
            'sent_by_placeholder' => 'Sistema',
            'sent_at' => 'Nosutits',
        ],

        'actions' => [
            'view' => 'Apskatit',
            'resend' => 'Sutit atkartoti',
            'resend_confirm' => 'Vai tiesat velaties atkartoti nosutit so e-pastu?',
        ],

        'notifications' => [
            'resent' => 'E-pasts veiksmigi nosutits atkartoti',
            'resend_failed' => 'Neizdevas atkartoti nosutit',
        ],

        'empty' => [
            'heading' => 'Nav nosutitu e-pastu',
            'description' => 'Seit tiks paraditi e-pasti, kas nosutiti par so ierakstu.',
        ],

        'errors' => [
            'no_body' => 'Nevar nosutit atkartoti: nav saglabata rendereta satura vai veidnes.',
            'no_template' => 'Sakotna veidne vairs nepastav.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'E-pasta iestatijumi',

        'tabs' => [
            'general' => 'Visparigi',
            'branding' => 'Zimolvediba',
            'logging' => 'Zurnalosana',
            'attachments' => 'Pielikumi',
            'auth_emails' => 'Autentifikacijas e-pasti',
        ],

        'titles' => [
            'general' => 'E-pasta veidnu iestatijumi - Visparigi',
            'branding' => 'E-pasta veidnu iestatijumi - Zimolvediba',
            'logging' => 'E-pasta veidnu iestatijumi - Zurnalosana',
            'attachments' => 'E-pasta veidnu iestatijumi - Pielikumi',
            'auth_emails' => 'E-pasta veidnu iestatijumi - Autentifikacijas e-pasti',
        ],

        'sections' => [
            'default_sender' => 'Noklusejuma sutitajs',
            'default_sender_description' => 'Noklusejuma "No" adrese visiem spraudna nosutitajiem e-pastiem.',
            'additional_senders' => 'Papildu sutitaji',
            'additional_senders_description' => 'Papildu "No" adreses, ko lietotaji var izvelieties, rakstot e-pastus.',
            'localization' => 'Lokalizacija',
            'categories' => 'Veidnu kategorijas',
            'logo' => 'Logo',
            'colors' => 'Krasas',
            'footer_links' => 'Kajenes saites',
            'customer_service' => 'Klientu apkalposana',
            'logging' => 'E-pastu zurnalosana',
            'logging_description' => 'Kontrolejiet, ka nosutitie e-pasti tiek ierakstiti datubaze.',
            'cleanup' => 'Ieplánota tírisana',
            'cleanup_description' => 'Automatiski dzest vecus nosutito e-pastu ierakstus pec grafika.',
            'attachment_rules' => 'Pielikumu noteikumi',
            'attachment_rules_description' => 'Konfigurejiet ierobezojumus failu pielikumiem rakstitajos e-pastos.',
            'auth_emails' => 'Autentifikacijas e-pastu parmaksana',
            'auth_emails_description' => 'Parmaksajiet lietojumprogrammas noklusejuma autentifikacijas e-pastus ar jüsu pielagotajam veidnem.',
        ],

        'fields' => [
            'from_email' => 'No e-pasta',
            'from_name' => 'No varda',
            'sender_email' => 'E-pasts',
            'sender_name' => 'Attélojamais vards',
            'sender_new' => 'Jauns sutitajs',
            'default_locale' => 'Noklusejuma valoda',
            'default_locale_helper' => 'Noklusejuma valoda jaunam veidnem (piem., en, hu, de).',
            'languages' => 'Pieejamas valodas',
            'language_code' => 'Kods',
            'language_display' => 'Attélojamais nosaukums',
            'language_flag' => 'Karoga ikona',
            'language_new' => 'Jauna valoda',
            'category_key' => 'Atslega',
            'category_label' => 'Nosaukums',
            'category_new' => 'Jauna kategorija',
            'logo_url' => 'Logo URL vai cels',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Absolütais URL vai cels uz jusu e-pasta logo.',
            'logo_width' => 'Platums (px)',
            'logo_height' => 'Augstums (px)',
            'content_width' => 'Satura platums (px)',
            'primary_color' => 'Primara krasa',
            'footer_link_label' => 'Nosaukums',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Jauna saite',
            'support_email' => 'Atbalsta e-pasts',
            'support_phone' => 'Atbalsta talrunis',
            'enable_logging' => 'Iespejot zurnalosanu',
            'enable_logging_helper' => 'Ja atspejots, nosutito e-pastu ieraksti netiks veidoti.',
            'store_rendered_body' => 'Saglabat rendereto saturu',
            'store_rendered_body_helper' => 'Saglabat katra nosutita e-pasta galigo HTML. Nepieciesams atkártotas sutisanas un prieksskatijuma funkcijam.',
            'retention_days' => 'Saglabásanas periods (dienas)',
            'retention_days_helper' => 'Automatiski dzest nosutito e-pastu ierakstus pec noteikta dienu skaita. Atstajiet tuksu, lai saglabatu müzigi.',
            'cleanup_enabled' => 'Iespejot ieplánoto tirisanu',
            'cleanup_enabled_helper' => 'Automatiski palaist tirisanas komandu pec grafika.',
            'cleanup_frequency' => 'Tirisanas biezums',
            'max_file_size' => 'Maksimalais faila izmers (MB)',
            'allowed_extensions' => 'Atlautas failu paplasínajumi',
            'allowed_extensions_placeholder' => 'Pievienojiet paplasínajumu (piem., pdf)',
            'allowed_extensions_helper' => 'Augsupladesanai atlautie failu paplasínajumi.',
            'override_verification' => 'Parmaksat e-pasta verificesanu',
            'override_verification_helper' => 'Izmantot "user-verify-email" veidni lietojumprogrammas noklusejuma verificesanas e-pasta vieta.',
            'override_password_reset' => 'Parmaksat paroles atiestatisanu',
            'override_password_reset_helper' => 'Izmantot "user-password-reset" veidni lietojumprogrammas noklusejuma paroles atiestatisanas e-pasta vieta.',
            'override_welcome' => 'Parmaksat sveiciena e-pastu',
            'override_welcome_helper' => 'Nosutit sveiciena e-pastu, izmantojot "user-welcome" veidni, kad registrejas jauns lietotajs.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Visas tiesibas aizsargatas.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Melnraksts',
            2 => 'Rinda',
            3 => 'Nosutits',
            4 => 'Neizdevas',
        ],

        'cleanup_frequency' => [
            1 => 'Katru dienu',
            2 => 'Katru nedelu',
            3 => 'Katru menesi',
        ],
    ],

];
