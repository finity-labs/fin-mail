<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'E-mail',
        'templates' => 'Sablony',
        'themes' => 'Temy',
        'sent-emails' => 'Odoslane e-maily',
        'settings' => 'Nastavenia',
    ],

    'models' => [
        'email_template' => 'E-mailova sablona',
        'email_templates' => 'E-mailove sablony',
        'email_theme' => 'E-mailova tema',
        'email_themes' => 'E-mailove temy',
        'sent_email' => 'Odoslany e-mail',
        'sent_emails' => 'Odoslane e-maily',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Obsah',
            'settings' => 'Nastavenia',
            'tokens' => 'Tokeny',
        ],

        'fields' => [
            'name' => 'Nazov',
            'key' => 'Kluc',
            'key_helper' => 'Jedinecny kluc pouzivany v kode: napr. "invoice-sent"',
            'category' => 'Kategoria',
            'subject' => 'Predmet',
            'subject_helper' => 'Podporuje tokeny: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Prehlavicka',
            'preheader_helper' => 'Nahladovy text zobrazeny v e-mailovych klientoch',
            'body' => 'Telo',
            'theme' => 'Tema',
            'theme_placeholder' => 'Predvolena tema',
            'is_active' => 'Aktivny',
            'is_active_helper' => 'Neaktivne sablony nie je mozne pouzit na odosielanie',
            'tags' => 'Znacky',
            'tags_placeholder' => 'Pridat znacky na organizaciu',
            'from_address' => 'E-mail odosielatela',
            'from_name' => 'Meno odosielatela',
            'locale' => 'Jazyk',
        ],

        'sections' => [
            'custom_sender' => 'Vlastny odosielatel',
            'custom_sender_description' => 'Prepise predvolenu adresu odosielatela pre tuto sablonu',
        ],

        'tokens' => [
            'label' => 'Dostupne tokeny',
            'helper' => 'Zdokumentujte tokeny dostupne pre tuto sablonu. Toto pomaha editorom vediet, ake premenne mozu pouzit.',
            'token' => 'Token',
            'description' => 'Popis',
            'example' => 'Priklad',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Cele meno prijimatela',
            'example_placeholder' => 'Jan Novak',
            'new_item' => 'Novy token',
        ],

        'columns' => [
            'locales' => 'Jazyky',
            'active' => 'Aktivny',
            'locked' => 'Zamknuty',
            'sent' => 'Odoslane',
            'updated_at' => 'Aktualizovane',
        ],

        'actions' => [
            'preview' => 'Nahladit',
            'send_test' => 'Odoslat test',
            'send_test_field' => 'Odoslat na',
            'send_test_locale' => 'Jazyk',
            'compose' => 'Napisat e-mail',
            'version_history' => 'Historia verzii',
            'back_to_templates' => 'Spat na sablony',
        ],

        'notifications' => [
            'test_sent' => 'Testovaci e-mail odoslany!',
            'test_sent_body' => 'Odoslany na :email',
            'test_failed' => 'Odoslanie testovacieho e-mailu zlyhalo',
            'saved' => 'Sablona ulozena',
            'saved_body' => 'Snimka verzie bola automaticky ulozena.',
            'locked_skipped' => 'Zamknute sablony preskocene',
            'locked_skipped_body' => ':count zamknutych sablon(y) boli preskocene a neodstranene.',
        ],

        'tooltips' => [
            'locked' => 'Tato sablona je zamknuta — kluc a kategoria su len na citanie, odstranenie je zabranene.',
        ],

        'notices' => [
            'locked' => 'Tato sablona je zamknuta. Polia kluc a kategoria sa nedaju zmenit.',
        ],

        'language_label' => 'Jazyk: :locale',

        'replicate_suffix' => '(Kopia)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Napisat e-mail',
        'title_with_name' => 'Napisat: :name',

        'sections' => [
            'recipients' => 'Prijimatelia',
            'content' => 'Obsah e-mailu',
            'attachments' => 'Prilohy',
            'tokens' => 'Dostupne tokeny',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Komu',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Zadajte e-mailove adresy',
            'cc_placeholder' => 'Adresy CC',
            'bcc_placeholder' => 'Adresy BCC',
            'locale' => 'Jazyk',
            'subject' => 'Predmet',
            'preheader' => 'Prehlavicka',
            'body' => 'Telo',
            'attach_files' => 'Prilozit subory',
            'preheader_helper' => 'Nahladovy text zobrazeny v e-mailovych klientoch pred otvorenim',
            'no_tokens' => 'Pre tuto sablonu nie su zdokumentovane ziadne tokeny. Tokeny ako {{ user.name }} budu nahradene pri odoslani cez API/kod.',
        ],

        'actions' => [
            'send' => 'Odoslat e-mail',
            'preview' => 'Nahladit',
        ],

        'confirm' => [
            'heading' => 'Potvrdit odoslanie',
            'description' => 'Ste si isty, ze chcete odoslat tento e-mail?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Prijimatelia',
            'content' => 'Obsah',
            'attachments' => 'Prilohy',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Komu',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Sablona',
            'subject' => 'Predmet',
            'to_placeholder' => 'Zadajte e-mailove adresy',
            'cc_placeholder' => 'Zadajte adresy CC',
            'bcc_placeholder' => 'Zadajte adresy BCC',
            'auto_attached' => 'Automaticky prilozene subory',
            'auto_attached_none' => 'Ziadne',
            'additional_attachments' => 'Dalsie prilohy',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Odoslat e-mail',
        'modal_heading' => 'Napisat e-mail',
        'submit' => 'Odoslat',

        'notifications' => [
            'sent' => 'E-mail uspesne odoslany',
            'sent_body' => 'Odoslany na: :recipients',
            'failed' => 'Odoslanie e-mailu zlyhalo',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Podrobnosti temy',
            'background' => 'Pozadie a rozlozenie',
            'background_description' => 'Hlavne strukturalne farby rozlozenia e-mailu.',
            'typography' => 'Typografia',
            'typography_description' => 'Farby pre text a nadpisy.',
            'buttons' => 'Tlacidla',
            'buttons_description' => 'Styl tlacidiel s vyzvou na akciu.',
            'footer' => 'Pata',
            'footer_description' => 'Styl oblasti paty.',
            'preview' => 'Nahlad',
        ],

        'fields' => [
            'name' => 'Nazov',
            'is_default' => 'Predvolena tema',
            'is_default_helper' => 'Predvolena tema sa pouzije na sablony, ktore neurcuju vlastnu.',
            'page_background' => 'Pozadie stranky',
            'content_background' => 'Pozadie obsahu',
            'border' => 'Ohranicenie',
            'headings' => 'Nadpisy',
            'body_text' => 'Text tela',
            'secondary_text' => 'Sekundarny text',
            'links' => 'Odkazy',
            'button_background' => 'Pozadie tlacidla',
            'button_text' => 'Text tlacidla',
            'primary_accent' => 'Primarny/Akcent',
            'footer_background' => 'Pozadie paty',
            'footer_text' => 'Text paty',
        ],

        'columns' => [
            'primary' => 'Primarny',
            'background' => 'Pozadie',
            'text' => 'Text',
            'button' => 'Tlacidlo',
            'default' => 'Predvoleny',
            'templates' => 'Sablony',
            'updated_at' => 'Aktualizovane',
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
            'to' => 'Komu',
            'template' => 'Sablona',
            'template_placeholder' => 'Vlastny',
            'sent_by' => 'Odoslal',
            'subject' => 'Predmet',
            'status' => 'Stav',
            'sent_by_placeholder' => 'System',
            'related_to' => 'Suvisi s',
            'sent_at' => 'Odoslane',
        ],

        'filters' => [
            'from' => 'Od',
            'until' => 'Do',
        ],

        'actions' => [
            'view' => 'Zobrazit',
            'resend' => 'Znovu odoslat',
            'resend_description' => 'Toto odosle novu kopiu e-mailu povodnym prijimatelom.',
        ],

        'notifications' => [
            'resent' => 'E-mail uspesne znovu odoslany',
            'resend_failed' => 'Znovu odoslanie e-mailu zlyhalo',
        ],

        'errors' => [
            'no_rendered_body' => 'Nie je mozne znovu odoslat: vyrenderovane telo nie je ulozene. Aktivujte logging.store_rendered_body v nastaveniach.',
            'no_template' => 'Povodna sablona uz neexistuje.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Odoslane e-maily',

        'columns' => [
            'to' => 'Komu',
            'template' => 'Sablona',
            'subject' => 'Predmet',
            'status' => 'Stav',
            'sent_by' => 'Odoslal',
            'sent_by_placeholder' => 'System',
            'sent_at' => 'Odoslane',
        ],

        'actions' => [
            'view' => 'Zobrazit',
            'resend' => 'Znovu odoslat',
            'resend_confirm' => 'Ste si isty, ze chcete znovu odoslat tento e-mail?',
        ],

        'notifications' => [
            'resent' => 'E-mail uspesne znovu odoslany',
            'resend_failed' => 'Znovu odoslanie zlyhalo',
        ],

        'empty' => [
            'heading' => 'Ziadne odoslane e-maily',
            'description' => 'E-maily odoslane pre tento zaznam sa zobrazia tu.',
        ],

        'errors' => [
            'no_body' => 'Nie je mozne znovu odoslat: vyrenderovane telo alebo sablona nie su ulozene.',
            'no_template' => 'Povodna sablona uz neexistuje.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Nastavenia e-mailu',

        'tabs' => [
            'general' => 'Vseobecne',
            'branding' => 'Znacka',
            'logging' => 'Logovanie',
            'attachments' => 'Prilohy',
            'auth_emails' => 'Autentifikacne e-maily',
        ],

        'titles' => [
            'general' => 'Nastavenia e-mailovych sablon - Vseobecne',
            'branding' => 'Nastavenia e-mailovych sablon - Znacka',
            'logging' => 'Nastavenia e-mailovych sablon - Logovanie',
            'attachments' => 'Nastavenia e-mailovych sablon - Prilohy',
            'auth_emails' => 'Nastavenia e-mailovych sablon - Autentifikacne e-maily',
        ],

        'sections' => [
            'default_sender' => 'Predvoleny odosielatel',
            'default_sender_description' => 'Predvolena adresa "Od" pre vsetky e-maily odosielane pluginom.',
            'additional_senders' => 'Dalsi odosielatelia',
            'additional_senders_description' => 'Dalsie adresy "Od", ktore mozu pouzivatelia vyberat pri pisani e-mailov.',
            'localization' => 'Lokalizacia',
            'categories' => 'Kategorie sablon',
            'logo' => 'Logo',
            'colors' => 'Farby',
            'footer_links' => 'Odkazy v pate',
            'customer_service' => 'Zakaznicka podpora',
            'logging' => 'Logovanie e-mailov',
            'logging_description' => 'Ovladajte, ako su odoslane e-maily zaznamenavane v databaze.',
            'cleanup' => 'Planovane cistenie',
            'cleanup_description' => 'Automaticky odstrante stare zaznamy o odoslanych e-mailoch podla planu.',
            'attachment_rules' => 'Pravidla priloh',
            'attachment_rules_description' => 'Nakonfigurujte limity pre suborove prilohy v skladanych e-mailoch.',
            'auth_emails' => 'Prepis autentifikacnych e-mailov',
            'auth_emails_description' => 'Nahradte predvolene autentifikacne e-maily aplikacie vasimi vlastnymi sablonami.',
        ],

        'fields' => [
            'from_email' => 'E-mail odosielatela',
            'from_name' => 'Meno odosielatela',
            'sender_email' => 'E-mail',
            'sender_name' => 'Zobrazovane meno',
            'sender_new' => 'Novy odosielatel',
            'default_locale' => 'Predvoleny jazyk',
            'default_locale_helper' => 'Predvoleny jazyk pre nove sablony (napr., en, hu, de).',
            'languages' => 'Dostupne jazyky',
            'language_code' => 'Kod',
            'language_display' => 'Zobrazovane meno',
            'language_flag' => 'Ikona vlajky',
            'language_new' => 'Novy jazyk',
            'category_key' => 'Kluc',
            'category_label' => 'Nazov',
            'category_new' => 'Nova kategoria',
            'logo_url' => 'URL alebo cesta k logu',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Absolutna URL alebo cesta k logu e-mailu.',
            'logo_width' => 'Sirka (px)',
            'logo_height' => 'Vyska (px)',
            'content_width' => 'Sirka obsahu (px)',
            'primary_color' => 'Primarna farba',
            'footer_link_label' => 'Nazov',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Novy odkaz',
            'support_email' => 'E-mail podpory',
            'support_phone' => 'Telefon podpory',
            'enable_logging' => 'Povolit logovanie',
            'enable_logging_helper' => 'Ked je vypnute, nebudu sa vytvarat ziadne zaznamy o odoslanych e-mailoch.',
            'store_rendered_body' => 'Ulozit vyrenderovane telo',
            'store_rendered_body_helper' => 'Ulozit konecne HTML kazdeho odoslaneho e-mailu. Potrebne pre funkcie znovu odoslania a nahladu.',
            'retention_days' => 'Uchovavanie (dni)',
            'retention_days_helper' => 'Automaticky odstrante zaznamy o odoslanych e-mailoch po tomto pocte dni. Nechajte prazdne pre trvale uchovavanie.',
            'cleanup_enabled' => 'Povolit planovane cistenie',
            'cleanup_enabled_helper' => 'Automaticky spustit prikaz cistenia podla planu.',
            'cleanup_frequency' => 'Frekvencia cistenia',
            'max_file_size' => 'Maximalna velkost suboru (MB)',
            'allowed_extensions' => 'Povolene pripony suborov',
            'allowed_extensions_placeholder' => 'Pridat priponu (napr., pdf)',
            'allowed_extensions_helper' => 'Pripony suborov povolene na nahravanie.',
            'override_verification' => 'Prepis overovacieho e-mailu',
            'override_verification_helper' => 'Pouzite sablonu "user-verify-email" namiesto predvoleneho overovacieho e-mailu aplikacie.',
            'override_password_reset' => 'Prepis obnovenia hesla',
            'override_password_reset_helper' => 'Pouzite sablonu "user-password-reset" namiesto predvoleneho e-mailu na obnovenie hesla aplikacie.',
            'override_welcome' => 'Prepis uvitacieho e-mailu',
            'override_welcome_helper' => 'Odoslat uvitaci e-mail pomocou sablony "user-welcome", ked sa zaregistruje novy pouzivatel.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Vsetky prava vyhradene.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Koncept',
            2 => 'V rade',
            3 => 'Odoslany',
            4 => 'Neuspesny',
        ],

        'cleanup_frequency' => [
            1 => 'Denne',
            2 => 'Tyzdenne',
            3 => 'Mesacne',
        ],
    ],

];
