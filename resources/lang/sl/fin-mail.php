<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'E-posta',
        'templates' => 'Predloge',
        'themes' => 'Teme',
        'sent-emails' => 'Poslana sporocila',
        'settings' => 'Nastavitve',
    ],

    'models' => [
        'email_template' => 'E-postna predloga',
        'email_templates' => 'E-postne predloge',
        'email_theme' => 'E-postna tema',
        'email_themes' => 'E-postne teme',
        'sent_email' => 'Poslano sporocilo',
        'sent_emails' => 'Poslana sporocila',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Vsebina',
            'settings' => 'Nastavitve',
            'tokens' => 'Zetoni',
        ],

        'fields' => [
            'name' => 'Ime',
            'key' => 'Kljuc',
            'key_helper' => 'Edinstveni kljuc, uporabljen v kodi: npr. "invoice-sent"',
            'category' => 'Kategorija',
            'subject' => 'Zadeva',
            'subject_helper' => 'Podpira zetone: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Prednaslov',
            'preheader_helper' => 'Predogled besedila, prikazanega v e-postnih odjemalcih',
            'body' => 'Telo',
            'theme' => 'Tema',
            'theme_placeholder' => 'Privzeta tema',
            'is_active' => 'Aktivno',
            'is_active_helper' => 'Neaktivnih predlog ni mogoce uporabiti za posiljanje',
            'tags' => 'Oznake',
            'tags_placeholder' => 'Dodajte oznake za organizacijo',
            'from_address' => 'E-naslov posiljatelja',
            'from_name' => 'Ime posiljatelja',
            'locale' => 'Jezik',
        ],

        'sections' => [
            'custom_sender' => 'Prilagojeni posiljatelj',
            'custom_sender_description' => 'Preglasi privzeti naslov posiljatelja za to predlogo',
        ],

        'tokens' => [
            'label' => 'Razpolozljivi zetoni',
            'helper' => 'Dokumentirajte zetone, ki so na voljo za to predlogo. To pomaga urednikom vedeti, katere spremenljivke lahko uporabijo.',
            'token' => 'Zeton',
            'description' => 'Opis',
            'example' => 'Primer',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Polno ime prejemnika',
            'example_placeholder' => 'Janez Novak',
            'new_item' => 'Nov zeton',
        ],

        'blocks' => [
            'button' => 'Gumb',
            'button_heading' => 'Vstavi gumb',
            'button_label' => 'Besedilo gumba',
            'button_url' => 'URL',
            'button_align' => 'Poravnava',
            'align_left' => 'Levo',
            'align_center' => 'Sredina',
            'align_right' => 'Desno',
            'button_default_label' => 'Kliknite tukaj',
        ],

        'columns' => [
            'locales' => 'Jeziki',
            'active' => 'Aktivno',
            'locked' => 'Zaklenjeno',
            'sent' => 'Poslano',
            'updated_at' => 'Posodobljeno',
        ],

        'actions' => [
            'preview' => 'Predogled',
            'send_test' => 'Poslji test',
            'send_test_field' => 'Poslji na',
            'send_test_locale' => 'Jezik',
            'compose' => 'Sestavi e-poscto',
            'version_history' => 'Zgodovina razlicic',
            'back_to_templates' => 'Nazaj na predloge',
        ],

        'notifications' => [
            'test_sent' => 'Testno sporocilo poslano!',
            'test_sent_body' => 'Poslano na :email',
            'test_failed' => 'Posiljanje testnega sporocila ni uspelo',
            'saved' => 'Predloga shranjena',
            'saved_body' => 'Posnetek razlicice je bil samodejno shranjen.',
            'locked_skipped' => 'Zaklenjene predloge preskocene',
            'locked_skipped_body' => ':count zaklenjena(-ih) predlog(a) je bilo preskocenih in ni bilo izbrisanih.',
        ],

        'tooltips' => [
            'locked' => 'Ta predloga je zaklenjena — kljuc in kategorija sta samo za branje, brisanje je prepreceno.',
        ],

        'versioning' => [
            'date' => 'Datum',
            'by' => 'Avtor',
            'preview' => 'Predogled',
            'restore' => 'Obnovi',
            'restore_confirm' => 'Ali ste prepričani, da želite obnoviti različico :version? Trenutna vsebina bo najprej shranjena kot nova različica.',
            'restored' => 'Različica :version obnovljena.',
            'empty' => 'Zgodovina različic ni na voljo.',
        ],

        'notices' => [
            'locked' => 'Ta predloga je zaklenjena. Polj kljuc in kategorija ni mogoce spreminjati.',
        ],

        'language_label' => 'Jezik: :locale',

        'replicate_suffix' => '(Kopija)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Sestavi e-posto',
        'title_with_name' => 'Sestavi: :name',

        'sections' => [
            'recipients' => 'Prejemniki',
            'content' => 'Vsebina e-poste',
            'attachments' => 'Priloge',
            'tokens' => 'Razpolozljivi zetoni',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Za',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Vnesite e-postne naslove',
            'cc_placeholder' => 'Naslovi CC',
            'bcc_placeholder' => 'Naslovi BCC',
            'locale' => 'Jezik',
            'subject' => 'Zadeva',
            'preheader' => 'Prednaslov',
            'body' => 'Telo',
            'attach_files' => 'Prilozi datoteke',
            'preheader_helper' => 'Predogled besedila, prikazanega v e-postnih odjemalcih pred odprtjem',
            'no_tokens' => 'Za to predlogo ni dokumentiranih zetonov. Zetoni, kot je {{ user.name }}, bodo zamenjani ob posiljanju prek API/kode.',
        ],

        'actions' => [
            'send' => 'Poslji e-posto',
            'preview' => 'Predogled',
        ],

        'confirm' => [
            'heading' => 'Potrdi posiljanje',
            'description' => 'Ali ste prepricani, da zelite poslati to e-posto?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Prejemniki',
            'content' => 'Vsebina',
            'attachments' => 'Priloge',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Za',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Predloga',
            'subject' => 'Zadeva',
            'to_placeholder' => 'Vnesite e-postne naslove',
            'cc_placeholder' => 'Vnesite naslove CC',
            'bcc_placeholder' => 'Vnesite naslove BCC',
            'auto_attached' => 'Samodejno prilozene datoteke',
            'auto_attached_none' => 'Brez',
            'additional_attachments' => 'Dodatne priloge',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Poslji e-posto',
        'modal_heading' => 'Sestavi e-posto',
        'submit' => 'Poslji',

        'notifications' => [
            'sent' => 'E-posta uspesno poslana',
            'sent_body' => 'Poslano na: :recipients',
            'failed' => 'Posiljanje e-poste ni uspelo',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Podrobnosti teme',
            'background' => 'Ozadje in postavitev',
            'background_description' => 'Glavne strukturne barve postavitve e-poste.',
            'typography' => 'Tipografija',
            'typography_description' => 'Barve za besedilo in naslove.',
            'buttons' => 'Gumbi',
            'buttons_description' => 'Slog gumbov za poziv k dejanju.',
            'footer' => 'Noga',
            'footer_description' => 'Slog podrocja noge.',
            'preview' => 'Predogled',
        ],

        'fields' => [
            'name' => 'Ime',
            'is_default' => 'Privzeta tema',
            'is_default_helper' => 'Privzeta tema se uporabi za predloge, ki je ne dolocijo.',
            'page_background' => 'Ozadje strani',
            'content_background' => 'Ozadje vsebine',
            'border' => 'Obroba',
            'headings' => 'Naslovi',
            'body_text' => 'Besedilo telesa',
            'secondary_text' => 'Sekundarno besedilo',
            'links' => 'Povezave',
            'button_background' => 'Ozadje gumba',
            'button_text' => 'Besedilo gumba',
            'primary_accent' => 'Primarni/Poudarek',
            'footer_background' => 'Ozadje noge',
            'footer_text' => 'Besedilo noge',
        ],

        'columns' => [
            'primary' => 'Primarni',
            'background' => 'Ozadje',
            'text' => 'Besedilo',
            'button' => 'Gumb',
            'default' => 'Privzeto',
            'templates' => 'Predloge',
            'updated_at' => 'Posodobljeno',
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
            'to' => 'Za',
            'template' => 'Predloga',
            'template_placeholder' => 'Po meri',
            'sent_by' => 'Poslal',
            'subject' => 'Zadeva',
            'status' => 'Stanje',
            'sent_by_placeholder' => 'Sistem',
            'related_to' => 'Povezano z',
            'sent_at' => 'Poslano',
        ],

        'filters' => [
            'from' => 'Od',
            'until' => 'Do',
        ],

        'actions' => [
            'view' => 'Ogled',
            'resend' => 'Ponovno poslji',
            'resend_description' => 'To bo poslalo novo kopijo e-poste izvirnim prejemnikom.',
        ],


        'preview' => [
            'from' => 'Od:',
            'to' => 'Za:',
            'cc' => 'Kopija:',
            'template' => 'Predloga:',
            'sent' => 'Poslano:',
            'sent_not_yet' => 'Še ne',
            'status' => 'Status:',
            'no_body' => 'Telo e-pošte ni bilo shranjeno. Omogočite <code>logging.store_rendered_body</code> v nastavitvah za shranjevanje vsebine e-pošte.',
            'error' => 'Podrobnosti napake'
        ],
        'notifications' => [
            'resent' => 'E-posta uspesno ponovno poslana',
            'resend_failed' => 'Ponovno posiljanje e-poste ni uspelo',
        ],

        'errors' => [
            'no_rendered_body' => 'Ni mogoce ponovno poslati: upodobljeno telo ni shranjeno. Omogocite logging.store_rendered_body v nastavitvah.',
            'no_template' => 'Izvirna predloga ne obstaja vec.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Poslana sporocila',

        'columns' => [
            'to' => 'Za',
            'template' => 'Predloga',
            'subject' => 'Zadeva',
            'status' => 'Stanje',
            'sent_by' => 'Poslal',
            'sent_by_placeholder' => 'Sistem',
            'sent_at' => 'Poslano',
        ],

        'actions' => [
            'view' => 'Ogled',
            'resend' => 'Ponovno poslji',
            'resend_confirm' => 'Ali ste prepricani, da zelite ponovno poslati to e-posto?',
        ],

        'notifications' => [
            'resent' => 'E-posta uspesno ponovno poslana',
            'resend_failed' => 'Ponovno posiljanje ni uspelo',
        ],

        'empty' => [
            'heading' => 'Ni poslanih sporocil',
            'description' => 'E-poste, poslane za ta zapis, se bodo prikazale tukaj.',
        ],

        'errors' => [
            'no_body' => 'Ni mogoce ponovno poslati: upodobljeno telo ali predloga nista shranjeni.',
            'no_template' => 'Izvirna predloga ne obstaja vec.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Nastavitve e-poste',

        'tabs' => [
            'general' => 'Splosno',
            'branding' => 'Blagovna znamka',
            'logging' => 'Beleženje',
            'attachments' => 'Priloge',
            'auth_emails' => 'E-poste za preverjanje',
        ],

        'titles' => [
            'general' => 'Nastavitve e-postnih predlog - Splosno',
            'branding' => 'Nastavitve e-postnih predlog - Blagovna znamka',
            'logging' => 'Nastavitve e-postnih predlog - Beleženje',
            'attachments' => 'Nastavitve e-postnih predlog - Priloge',
            'auth_emails' => 'Nastavitve e-postnih predlog - E-poste za preverjanje',
        ],

        'sections' => [
            'default_sender' => 'Privzeti posiljatelj',
            'default_sender_description' => 'Privzeti naslov "Od" za vse e-poste, poslane s vticnikom.',
            'additional_senders' => 'Dodatni posiljatelji',
            'add_additional_senders' => 'Dodaj dodatne pošiljatelje',
            'additional_senders_description' => 'Dodatni naslovi "Od", ki jih lahko uporabniki izberejo pri sestavljanju e-poste.',
            'localization' => 'Lokalizacija',
            'categories' => 'Kategorije predlog',
            'logo' => 'Logotip',
            'colors' => 'Barve',
            'footer_links' => 'Povezave v nogi',
            'add_footer_links' => 'Dodaj povezave v nogo',
            'customer_service' => 'Podpora strankam',
            'logging' => 'Beleženje e-poste',
            'logging_description' => 'Nadzirajte, kako se poslana e-posta belezi v podatkovni bazi.',
            'cleanup' => 'Nacrtovano ciscenje',
            'cleanup_description' => 'Samodejno izbrisi stare zapise o poslani e-posti po urniku.',
            'attachment_rules' => 'Pravila prilog',
            'attachment_rules_description' => 'Nastavite omejitve za datotecne priloge v sestavljenih e-postah.',
            'auth_emails' => 'Preglasitve e-poste za preverjanje',
            'auth_emails_description' => 'Zamenjajte privzete e-poste za preverjanje aplikacije s svojimi prilagojenimi predlogami.',
        ],

        'fields' => [
            'from_email' => 'E-naslov posiljatelja',
            'from_name' => 'Ime posiljatelja',
            'sender_email' => 'E-naslov',
            'sender_name' => 'Prikazno ime',
            'sender_new' => 'Nov posiljatelj',
            'default_locale' => 'Privzeti jezik',
            'default_locale_helper' => 'Privzeti jezik za nove predloge (npr., en, hu, de).',
            'languages' => 'Razpolozljivi jeziki',
            'language_code' => 'Koda',
            'language_display' => 'Prikazno ime',
            'language_flag' => 'Ikona zastave',
            'language_new' => 'Nov jezik',
            'category_key' => 'Kljuc',
            'category_label' => 'Oznaka',
            'category_new' => 'Nova kategorija',
            'logo_url' => 'URL ali pot logotipa',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Absolutni URL ali pot do logotipa e-poste.',
            'logo_width' => 'Sirina (px)',
            'logo_height' => 'Visina (px)',
            'content_width' => 'Sirina vsebine (px)',
            'primary_color' => 'Primarna barva',
            'footer_link_label' => 'Oznaka',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Nova povezava',
            'support_email' => 'E-naslov podpore',
            'support_phone' => 'Telefon podpore',
            'enable_logging' => 'Omogoci belezenje',
            'enable_logging_helper' => 'Ko je onemogoceno, se ne ustvarijo nobeni zapisi o poslani e-posti.',
            'store_rendered_body' => 'Shrani upodobljeno telo',
            'store_rendered_body_helper' => 'Shrani koncni HTML vsakega poslanega sporocila. Potrebno za funkcije ponovnega posiljanja in predogleda.',
            'retention_days' => 'Hramba (dni)',
            'retention_days_helper' => 'Samodejno izbrisi zapise o poslani e-posti po toliko dneh. Pustite prazno za trajno hrambo.',
            'cleanup_enabled' => 'Omogoci nacrtovano ciscenje',
            'cleanup_enabled_helper' => 'Samodejno zazeni ukaz za ciscenje po urniku.',
            'cleanup_frequency' => 'Pogostost ciscenja',
            'max_file_size' => 'Najvecja velikost datoteke (MB)',
            'allowed_extensions' => 'Dovoljene koncnice datotek',
            'allowed_extensions_placeholder' => 'Dodajte koncnico (npr., pdf)',
            'allowed_extensions_helper' => 'Koncnice datotek, dovoljene za nalaganje.',
            'override_verification' => 'Preglasi potrditveno e-posto',
            'override_verification_helper' => 'Uporabite predlogo "user-verify-email" namesto privzete potrditvene e-poste aplikacije.',
            'override_password_reset' => 'Preglasi ponastavitev gesla',
            'override_password_reset_helper' => 'Uporabite predlogo "user-password-reset" namesto privzete e-poste za ponastavitev gesla aplikacije.',
            'override_welcome' => 'Preglasi pozdravno e-posto',
            'override_welcome_helper' => 'Posljite pozdravno e-posto s predlogo "user-welcome", ko se registrira nov uporabnik.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Vse pravice pridrzane.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Osnutek',
            2 => 'V vrsti',
            3 => 'Poslano',
            4 => 'Neuspesno',
        ],

        'cleanup_frequency' => [
            1 => 'Dnevno',
            2 => 'Tedensko',
            3 => 'Mesecno',
        ],
    ],

];
