<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'E-pošta',
        'templates' => 'Predloge',
        'themes' => 'Teme',
        'sent-emails' => 'Poslana sporočila',
        'settings' => 'Nastavitve',
    ],

    'models' => [
        'email_template' => 'E-poštna predloga',
        'email_templates' => 'E-poštne predloge',
        'email_theme' => 'E-poštna tema',
        'email_themes' => 'E-poštne teme',
        'sent_email' => 'Poslano sporočilo',
        'sent_emails' => 'Poslana sporočila',
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
            'tokens' => 'Žetoni',
        ],

        'fields' => [
            'name' => 'Ime',
            'key' => 'Ključ',
            'key_helper' => 'Edinstveni ključ, uporabljen v kodi: npr. "invoice-sent"',
            'category' => 'Kategorija',
            'subject' => 'Zadeva',
            'subject_helper' => 'Podpira žetone: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Prednaslov',
            'preheader_helper' => 'Predogled besedila, prikazanega v e-poštnih odjemalcih',
            'body' => 'Telo',
            'theme' => 'Tema',
            'theme_placeholder' => 'Privzeta tema',
            'is_active' => 'Aktivno',
            'is_active_helper' => 'Neaktivnih predlog ni mogoče uporabiti za pošiljanje',
            'tags' => 'Oznake',
            'tags_placeholder' => 'Dodajte oznake za organizacijo',
            'from_address' => 'E-naslov pošiljatelja',
            'from_name' => 'Ime pošiljatelja',
            'reply_to_address' => 'E-pošta prejemnika',
            'reply_to_name' => 'Ime prejemnika',
            'locale' => 'Jezik',
        ],

        'sections' => [
            'custom_sender' => 'Prilagojeni pošiljatelj',
            'custom_sender_description' => 'Preglasi privzeti naslov pošiljatelja za to predlogo',
            'custom_reply_to' => 'Prilagojen naslov za odgovor',
            'custom_reply_to_description' => 'Nastavite naslov za odgovor za to predlogo',
        ],

        'tokens' => [
            'label' => 'Razpoložljivi žetoni',
            'helper' => 'Dokumentirajte žetone, ki so na voljo za to predlogo. To pomaga urednikom vedeti, katere spremenljivke lahko uporabijo.',
            'token' => 'Žeton',
            'description' => 'Opis',
            'example' => 'Primer',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Polno ime prejemnika',
            'example_placeholder' => 'Janez Novak',
            'new_item' => 'Nov žeton',
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
            'preview_heading' => 'Predogled: :record',
            'send_test' => 'Pošlji test',
            'send_test_field' => 'Pošlji na',
            'send_test_locale' => 'Jezik',
            'compose' => 'Sestavi e-pošto',
            'version_history' => 'Zgodovina različic',
            'back_to_templates' => 'Nazaj na predloge',
        ],

        'notifications' => [
            'test_sent' => 'Testno sporočilo poslano!',
            'test_sent_body' => 'Poslano na :email',
            'test_failed' => 'Pošiljanje testnega sporočila ni uspelo',
            'saved' => 'Predloga shranjena',
            'saved_body' => 'Posnetek različice je bil samodejno shranjen.',
            'locked_skipped' => 'Zaklenjene predloge preskočene',
            'locked_skipped_body' => ':count zaklenjena(-ih) predlog(a) je bilo preskočenih in ni bilo izbrisanih.',
        ],

        'tooltips' => [
            'locked' => 'Ta predloga je zaklenjena — ključ in kategorija sta samo za branje, brisanje je preprečeno.',
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
            'locked' => 'Ta predloga je zaklenjena. Polj ključ in kategorija ni mogoče spreminjati.',
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
        'title' => 'Sestavi e-pošto',
        'title_with_name' => 'Sestavi: :name',

        'sections' => [
            'recipients' => 'Prejemniki',
            'content' => 'Vsebina e-pošte',
            'attachments' => 'Priloge',
            'tokens' => 'Razpoložljivi žetoni',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Za',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Vnesite e-poštne naslove',
            'cc_placeholder' => 'Naslovi CC',
            'bcc_placeholder' => 'Naslovi BCC',
            'locale' => 'Jezik',
            'subject' => 'Zadeva',
            'preheader' => 'Prednaslov',
            'body' => 'Telo',
            'attach_files' => 'Priloži datoteke',
            'preheader_helper' => 'Predogled besedila, prikazanega v e-poštnih odjemalcih pred odprtjem',
            'no_tokens' => 'Za to predlogo ni dokumentiranih žetonov. Žetoni, kot je {{ user.name }}, bodo zamenjani ob pošiljanju prek API/kode.',
        ],

        'actions' => [
            'send' => 'Pošlji e-pošto',
            'preview' => 'Predogled',
        ],

        'confirm' => [
            'heading' => 'Potrdi pošiljanje',
            'description' => 'Ali ste prepričani, da želite poslati to e-pošto?',
            'description_multiple' => 'Imate več prejemnikov. Izberite, kako želite poslati to e-pošto.',
            'send_mode_label' => 'Kako naj bo poslano?',
            'send_mode_individual' => 'Pošlji vsako e-pošto posebej',
            'send_mode_individual_help' => 'Vsakemu prejemniku v polju "Za" je poslana ločena e-pošta, tako da prejemniki ne vidijo naslovov drug drugega. Vsi kontakti CC/BCC prejmejo kopijo vsake e-pošte.',
            'send_mode_combined' => 'Pošlji kot eno e-pošto z več prejemniki',
            'send_mode_combined_help' => 'Vsem je poslana ena sama e-pošta. Vsi naslovi v poljih "Za" in CC so vidni vsem prejemnikom.',
        ],

        'notifications' => [
            'individual_sent' => 'E-pošte poslane',
            'individual_sent_body' => 'Poslana :count posamezna e-pošta.|Poslani :count posamezni e-pošti.|Poslane :count posamezne e-pošte.|Poslanih :count posameznih e-pošt.',
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
            'to_placeholder' => 'Vnesite e-poštne naslove',
            'cc_placeholder' => 'Vnesite naslove CC',
            'bcc_placeholder' => 'Vnesite naslove BCC',
            'auto_attached' => 'Samodejno priložene datoteke',
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
        'label' => 'Pošlji e-pošto',
        'modal_heading' => 'Sestavi e-pošto',
        'submit' => 'Pošlji',

        'notifications' => [
            'sent' => 'E-pošta uspešno poslana',
            'sent_body' => 'Poslano na: :recipients',
            'failed' => 'Pošiljanje e-pošte ni uspelo',
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
            'background_description' => 'Glavne strukturne barve postavitve e-pošte.',
            'typography' => 'Tipografija',
            'typography_description' => 'Barve za besedilo in naslove.',
            'buttons' => 'Gumbi',
            'buttons_description' => 'Slog gumbov za poziv k dejanju.',
            'footer' => 'Noga',
            'footer_description' => 'Slog področja noge.',
            'preview' => 'Predogled',
        ],

        'fields' => [
            'name' => 'Ime',
            'is_default' => 'Privzeta tema',
            'is_default_helper' => 'Privzeta tema se uporabi za predloge, ki je ne določijo.',
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
            'resend' => 'Ponovno pošlji',
            'resend_description' => 'To bo poslalo novo kopijo e-pošte izvirnim prejemnikom.',
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
            'error' => 'Podrobnosti napake',
        ],
        'notifications' => [
            'resent' => 'E-pošta uspešno ponovno poslana',
            'resend_failed' => 'Ponovno pošiljanje e-pošte ni uspelo',
        ],

        'errors' => [
            'no_rendered_body' => 'Ni mogoče ponovno poslati: upodobljeno telo ni shranjeno. Omogočite logging.store_rendered_body v nastavitvah.',
            'no_template' => 'Izvirna predloga ne obstaja več.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Poslana sporočila',

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
            'resend' => 'Ponovno pošlji',
            'resend_confirm' => 'Ali ste prepričani, da želite ponovno poslati to e-pošto?',
        ],

        'notifications' => [
            'resent' => 'E-pošta uspešno ponovno poslana',
            'resend_failed' => 'Ponovno pošiljanje ni uspelo',
        ],

        'empty' => [
            'heading' => 'Ni poslanih sporočil',
            'description' => 'E-pošte, poslane za ta zapis, se bodo prikazale tukaj.',
        ],

        'errors' => [
            'no_body' => 'Ni mogoče ponovno poslati: upodobljeno telo ali predloga nista shranjeni.',
            'no_template' => 'Izvirna predloga ne obstaja več.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Nastavitve e-pošte',

        'tabs' => [
            'general' => 'Splošno',
            'branding' => 'Blagovna znamka',
            'logging' => 'Beleženje',
            'attachments' => 'Priloge',
            'auth_emails' => 'E-pošte za preverjanje',
        ],

        'titles' => [
            'general' => 'Nastavitve e-poštnih predlog - Splošno',
            'branding' => 'Nastavitve e-poštnih predlog - Blagovna znamka',
            'logging' => 'Nastavitve e-poštnih predlog - Beleženje',
            'attachments' => 'Nastavitve e-poštnih predlog - Priloge',
            'auth_emails' => 'Nastavitve e-poštnih predlog - E-pošte za preverjanje',
        ],

        'sections' => [
            'default_sender' => 'Privzeti pošiljatelj',
            'default_sender_description' => 'Privzeti naslov "Od" za vse e-pošte, poslane s vtičnikom.',
            'additional_senders' => 'Dodatni pošiljatelji',
            'add_additional_senders' => 'Dodaj dodatne pošiljatelje',
            'additional_senders_description' => 'Dodatni naslovi "Od", ki jih lahko uporabniki izberejo pri sestavljanju e-pošte.',
            'localization' => 'Lokalizacija',
            'categories' => 'Kategorije predlog',
            'logo' => 'Logotip',
            'colors' => 'Barve',
            'footer_links' => 'Povezave v nogi',
            'add_footer_links' => 'Dodaj povezave v nogo',
            'customer_service' => 'Podpora strankam',
            'logging' => 'Beleženje e-pošte',
            'logging_description' => 'Nadzirajte, kako se poslana e-pošta beleži v podatkovni bazi.',
            'cleanup' => 'Načrtovano čiščenje',
            'cleanup_description' => 'Samodejno izbriši stare zapise o poslani e-pošti po urniku.',
            'attachment_rules' => 'Pravila prilog',
            'attachment_rules_description' => 'Nastavite omejitve za datotečne priloge v sestavljenih e-poštah.',
            'auth_emails' => 'Preglasitve e-pošte za preverjanje',
            'auth_emails_description' => 'Zamenjajte privzete e-pošte za preverjanje aplikacije s svojimi prilagojenimi predlogami.',
        ],

        'fields' => [
            'from_email' => 'E-naslov pošiljatelja',
            'from_name' => 'Ime pošiljatelja',
            'sender_email' => 'E-naslov',
            'sender_name' => 'Prikazno ime',
            'sender_new' => 'Nov pošiljatelj',
            'default_locale' => 'Privzeti jezik',
            'default_locale_helper' => 'Privzeti jezik za nove predloge (npr., en, hu, de).',
            'languages' => 'Razpoložljivi jeziki',
            'language_code' => 'Koda',
            'language_display' => 'Prikazno ime',
            'language_flag' => 'Ikona zastave',
            'language_new' => 'Nov jezik',
            'category_key' => 'Ključ',
            'category_label' => 'Oznaka',
            'category_new' => 'Nova kategorija',
            'logo_url' => 'URL ali pot logotipa',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Absolutni URL ali pot do logotipa e-pošte.',
            'logo_width' => 'Širina (px)',
            'logo_height' => 'Višina (px)',
            'content_width' => 'Širina vsebine (px)',
            'primary_color' => 'Primarna barva',
            'footer_link_label' => 'Oznaka',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Nova povezava',
            'support_email' => 'E-naslov podpore',
            'support_phone' => 'Telefon podpore',
            'enable_logging' => 'Omogoči beleženje',
            'enable_logging_helper' => 'Ko je onemogočeno, se ne ustvarijo nobeni zapisi o poslani e-pošti.',
            'store_rendered_body' => 'Shrani upodobljeno telo',
            'store_rendered_body_helper' => 'Shrani končni HTML vsakega poslanega sporočila. Potrebno za funkcije ponovnega pošiljanja in predogleda.',
            'retention_days' => 'Hramba (dni)',
            'retention_days_helper' => 'Samodejno izbriši zapise o poslani e-pošti po toliko dneh. Pustite prazno za trajno hrambo.',
            'cleanup_enabled' => 'Omogoči načrtovano čiščenje',
            'cleanup_enabled_helper' => 'Samodejno zaženi ukaz za čiščenje po urniku.',
            'cleanup_frequency' => 'Pogostost čiščenja',
            'max_file_size' => 'Največja velikost datoteke (MB)',
            'allowed_extensions' => 'Dovoljene končnice datotek',
            'allowed_extensions_placeholder' => 'Dodajte končnico (npr., pdf)',
            'allowed_extensions_helper' => 'Končnice datotek, dovoljene za nalaganje.',
            'override_verification' => 'Preglasi potrditveno e-pošto',
            'override_verification_helper' => 'Uporabite predlogo "user-verify-email" namesto privzete potrditvene e-pošte aplikacije.',
            'override_password_reset' => 'Preglasi ponastavitev gesla',
            'override_password_reset_helper' => 'Uporabite predlogo "user-password-reset" namesto privzete e-pošte za ponastavitev gesla aplikacije.',
            'override_welcome' => 'Preglasi pozdravno e-pošto',
            'override_welcome_helper' => 'Pošljite pozdravno e-pošto s predlogo "user-welcome", ko se registrira nov uporabnik.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Vse pravice pridržane.',
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
            4 => 'Neuspešno',
        ],

        'cleanup_frequency' => [
            1 => 'Dnevno',
            2 => 'Tedensko',
            3 => 'Mesečno',
        ],
    ],

];
