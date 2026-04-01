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
        'templates' => 'Sabloni',
        'themes' => 'Teme',
        'sent-emails' => 'Poslate poruke',
        'settings' => 'Podesavanja',
    ],

    'models' => [
        'email_template' => 'Sablon e-poste',
        'email_templates' => 'Sabloni e-poste',
        'email_theme' => 'Tema e-poste',
        'email_themes' => 'Teme e-poste',
        'sent_email' => 'Poslata poruka',
        'sent_emails' => 'Poslate poruke',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Sadrzaj',
            'settings' => 'Podesavanja',
            'tokens' => 'Tokeni',
        ],

        'fields' => [
            'name' => 'Naziv',
            'key' => 'Kljuc',
            'key_helper' => 'Jedinstveni kljuc koji se koristi u kodu: npr. "invoice-sent"',
            'category' => 'Kategorija',
            'subject' => 'Tema',
            'subject_helper' => 'Podrzava tokene: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Prethodnik naslova',
            'preheader_helper' => 'Tekst pregleda prikazan u klijentima e-poste',
            'body' => 'Telo',
            'theme' => 'Tema',
            'theme_placeholder' => 'Podrazumevana tema',
            'is_active' => 'Aktivan',
            'is_active_helper' => 'Neaktivni sabloni se ne mogu koristiti za slanje',
            'tags' => 'Oznake',
            'tags_placeholder' => 'Dodajte oznake za organizaciju',
            'from_address' => 'E-adresa posiljaoca',
            'from_name' => 'Ime posiljaoca',
            'locale' => 'Jezik',
        ],

        'sections' => [
            'custom_sender' => 'Prilagodjeni posiljalac',
            'custom_sender_description' => 'Zameni podrazumevanu adresu posiljaoca za ovaj sablon',
        ],

        'tokens' => [
            'label' => 'Dostupni tokeni',
            'helper' => 'Dokumentujte tokene dostupne za ovaj sablon. Ovo pomaze urednicima da znaju koje promenljive mogu koristiti.',
            'token' => 'Token',
            'description' => 'Opis',
            'example' => 'Primer',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Puno ime primaoca',
            'example_placeholder' => 'Petar Petrovic',
            'new_item' => 'Novi token',
        ],

        'blocks' => [
            'button' => 'Dugme',
            'button_heading' => 'Umetni dugme',
            'button_label' => 'Tekst dugmeta',
            'button_url' => 'URL',
            'button_align' => 'Poravnanje',
            'align_left' => 'Levo',
            'align_center' => 'Centar',
            'align_right' => 'Desno',
            'button_default_label' => 'Kliknite ovde',
        ],

        'columns' => [
            'locales' => 'Jezici',
            'active' => 'Aktivan',
            'locked' => 'Zakljucan',
            'sent' => 'Poslato',
            'updated_at' => 'Azurirano',
        ],

        'actions' => [
            'preview' => 'Pregled',
            'send_test' => 'Posalji test',
            'send_test_field' => 'Posalji na',
            'send_test_locale' => 'Jezik',
            'compose' => 'Napisi poruku',
            'version_history' => 'Istorija verzija',
            'back_to_templates' => 'Nazad na sablone',
        ],

        'notifications' => [
            'test_sent' => 'Test poruka poslata!',
            'test_sent_body' => 'Poslato na :email',
            'test_failed' => 'Slanje test poruke nije uspelo',
            'saved' => 'Sablon sacuvan',
            'saved_body' => 'Snimak verzije je automatski sacuvan.',
            'locked_skipped' => 'Zakljucani sabloni preskoceni',
            'locked_skipped_body' => ':count zakljucan(ih) sablon(a) je preskoceno i nije obrisano.',
        ],

        'tooltips' => [
            'locked' => 'Ovaj sablon je zakljucan — kljuc i kategorija su samo za citanje, brisanje je spreceno.',
        ],

        'versioning' => [
            'date' => 'Datum',
            'by' => 'Od',
            'preview' => 'Pregled',
            'restore' => 'Vrati',
            'restore_confirm' => 'Da li ste sigurni da želite da vratite verziju :version? Trenutni sadržaj će prvo biti sačuvan kao nova verzija.',
            'restored' => 'Verzija :version je vraćena.',
            'empty' => 'Nema dostupne istorije verzija.',
        ],

        'notices' => [
            'locked' => 'Ovaj sablon je zakljucan. Polja kljuca i kategorije se ne mogu menjati.',
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
        'title' => 'Napisi poruku',
        'title_with_name' => 'Napisi: :name',

        'sections' => [
            'recipients' => 'Primaoci',
            'content' => 'Sadrzaj poruke',
            'attachments' => 'Prilozi',
            'tokens' => 'Dostupni tokeni',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Za',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Unesite e-adrese',
            'cc_placeholder' => 'Adrese CC',
            'bcc_placeholder' => 'Adrese BCC',
            'locale' => 'Jezik',
            'subject' => 'Tema',
            'preheader' => 'Prethodnik naslova',
            'body' => 'Telo',
            'attach_files' => 'Prilozi datoteke',
            'preheader_helper' => 'Tekst pregleda prikazan u klijentima e-poste pre otvaranja',
            'no_tokens' => 'Nema dokumentovanih tokena za ovaj sablon. Tokeni poput {{ user.name }} bice zamenjeni prilikom slanja preko API/koda.',
        ],

        'actions' => [
            'send' => 'Posalji poruku',
            'preview' => 'Pregled',
        ],

        'confirm' => [
            'heading' => 'Potvrdi slanje',
            'description' => 'Da li ste sigurni da zelite da posaljete ovu poruku?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Primaoci',
            'content' => 'Sadrzaj',
            'attachments' => 'Prilozi',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Za',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Sablon',
            'subject' => 'Tema',
            'to_placeholder' => 'Unesite e-adrese',
            'cc_placeholder' => 'Unesite adrese CC',
            'bcc_placeholder' => 'Unesite adrese BCC',
            'auto_attached' => 'Automatski prilozene datoteke',
            'auto_attached_none' => 'Nema',
            'additional_attachments' => 'Dodatni prilozi',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Posalji poruku',
        'modal_heading' => 'Napisi poruku',
        'submit' => 'Posalji',

        'notifications' => [
            'sent' => 'Poruka uspesno poslata',
            'sent_body' => 'Poslato na: :recipients',
            'failed' => 'Slanje poruke nije uspelo',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Detalji teme',
            'background' => 'Pozadina i raspored',
            'background_description' => 'Glavne strukturne boje rasporeda e-poste.',
            'typography' => 'Tipografija',
            'typography_description' => 'Boje za tekst i naslove.',
            'buttons' => 'Dugmad',
            'buttons_description' => 'Stilizacija dugmadi za poziv na akciju.',
            'footer' => 'Podnozje',
            'footer_description' => 'Stilizacija oblasti podnozja.',
            'preview' => 'Pregled',
        ],

        'fields' => [
            'name' => 'Naziv',
            'is_default' => 'Podrazumevana tema',
            'is_default_helper' => 'Podrazumevana tema se primenjuje na sablone koji ne odrede svoju.',
            'page_background' => 'Pozadina stranice',
            'content_background' => 'Pozadina sadrzaja',
            'border' => 'Okvir',
            'headings' => 'Naslovi',
            'body_text' => 'Tekst tela',
            'secondary_text' => 'Sekundarni tekst',
            'links' => 'Linkovi',
            'button_background' => 'Pozadina dugmeta',
            'button_text' => 'Tekst dugmeta',
            'primary_accent' => 'Primarni/Akcenat',
            'footer_background' => 'Pozadina podnozja',
            'footer_text' => 'Tekst podnozja',
        ],

        'columns' => [
            'primary' => 'Primarni',
            'background' => 'Pozadina',
            'text' => 'Tekst',
            'button' => 'Dugme',
            'default' => 'Podrazumevano',
            'templates' => 'Sabloni',
            'updated_at' => 'Azurirano',
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
            'template' => 'Sablon',
            'template_placeholder' => 'Prilagodjeno',
            'sent_by' => 'Poslao',
            'subject' => 'Tema',
            'status' => 'Status',
            'sent_by_placeholder' => 'Sistem',
            'related_to' => 'Povezano sa',
            'sent_at' => 'Poslato',
        ],

        'filters' => [
            'from' => 'Od',
            'until' => 'Do',
        ],

        'actions' => [
            'view' => 'Pregled',
            'resend' => 'Ponovo posalji',
            'resend_description' => 'Ovo ce poslati novu kopiju poruke originalnim primaocima.',
        ],


        'preview' => [
            'from' => 'Od:',
            'to' => 'Za:',
            'cc' => 'Kopija:',
            'template' => 'Šablon:',
            'sent' => 'Poslato:',
            'sent_not_yet' => 'Još ne',
            'status' => 'Status:',
            'no_body' => 'Sadržaj e-pošte nije sačuvan. Omogućite <code>logging.store_rendered_body</code> u podešavanjima da biste sačuvali sadržaj e-pošte.',
            'error' => 'Detalji greške'
        ],
        'notifications' => [
            'resent' => 'Poruka uspesno ponovo poslata',
            'resend_failed' => 'Ponovno slanje poruke nije uspelo',
        ],

        'errors' => [
            'no_rendered_body' => 'Ne moze se ponovo poslati: renderovan sadrzaj nije sacuvan. Omogucite logging.store_rendered_body u podesavanjima.',
            'no_template' => 'Originalni sablon vise ne postoji.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Poslate poruke',

        'columns' => [
            'to' => 'Za',
            'template' => 'Sablon',
            'subject' => 'Tema',
            'status' => 'Status',
            'sent_by' => 'Poslao',
            'sent_by_placeholder' => 'Sistem',
            'sent_at' => 'Poslato',
        ],

        'actions' => [
            'view' => 'Pregled',
            'resend' => 'Ponovo posalji',
            'resend_confirm' => 'Da li ste sigurni da zelite da ponovo posaljete ovu poruku?',
        ],

        'notifications' => [
            'resent' => 'Poruka uspesno ponovo poslata',
            'resend_failed' => 'Ponovno slanje nije uspelo',
        ],

        'empty' => [
            'heading' => 'Nema poslatih poruka',
            'description' => 'Poruke poslate za ovaj zapis ce se prikazati ovde.',
        ],

        'errors' => [
            'no_body' => 'Ne moze se ponovo poslati: renderovan sadrzaj ili sablon nisu sacuvani.',
            'no_template' => 'Originalni sablon vise ne postoji.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Podesavanja e-poste',

        'tabs' => [
            'general' => 'Opste',
            'branding' => 'Brend',
            'logging' => 'Evidencija',
            'attachments' => 'Prilozi',
            'auth_emails' => 'Poruke autentikacije',
        ],

        'titles' => [
            'general' => 'Podesavanja sablona e-poste - Opste',
            'branding' => 'Podesavanja sablona e-poste - Brend',
            'logging' => 'Podesavanja sablona e-poste - Evidencija',
            'attachments' => 'Podesavanja sablona e-poste - Prilozi',
            'auth_emails' => 'Podesavanja sablona e-poste - Poruke autentikacije',
        ],

        'sections' => [
            'default_sender' => 'Podrazumevani posiljalac',
            'default_sender_description' => 'Podrazumevana adresa "Od" za sve poruke poslate dodatkom.',
            'additional_senders' => 'Dodatni posiljaoci',
            'add_additional_senders' => 'Dodaj dodatne pošiljaoce',
            'additional_senders_description' => 'Dodatne adrese "Od" koje korisnici mogu izabrati prilikom pisanja poruka.',
            'localization' => 'Lokalizacija',
            'categories' => 'Kategorije sablona',
            'logo' => 'Logotip',
            'colors' => 'Boje',
            'footer_links' => 'Linkovi u podnozju',
            'add_footer_links' => 'Dodaj linkove u podnožje',
            'customer_service' => 'Korisnicka podrska',
            'logging' => 'Evidencija poruka',
            'logging_description' => 'Kontrolisite kako se poslate poruke beleze u bazi podataka.',
            'cleanup' => 'Plansko ciscenje',
            'cleanup_description' => 'Automatski obrisite stare zapise o poslatim porukama po rasporedu.',
            'attachment_rules' => 'Pravila priloga',
            'attachment_rules_description' => 'Konfigurisite ogranicenja za priloge datoteka u sastavljenim porukama.',
            'auth_emails' => 'Zamena poruka autentikacije',
            'auth_emails_description' => 'Zamenite podrazumevane poruke autentikacije aplikacije vasim prilagodjenim sablonima.',
        ],

        'fields' => [
            'from_email' => 'E-adresa posiljaoca',
            'from_name' => 'Ime posiljaoca',
            'sender_email' => 'E-adresa',
            'sender_name' => 'Prikazno ime',
            'sender_new' => 'Novi posiljalac',
            'default_locale' => 'Podrazumevani jezik',
            'default_locale_helper' => 'Podrazumevani jezik za nove sablone (npr., en, hu, de).',
            'languages' => 'Dostupni jezici',
            'language_code' => 'Kod',
            'language_display' => 'Prikazno ime',
            'language_flag' => 'Ikona zastave',
            'language_new' => 'Novi jezik',
            'category_key' => 'Kljuc',
            'category_label' => 'Oznaka',
            'category_new' => 'Nova kategorija',
            'logo_url' => 'URL ili putanja logotipa',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Apsolutni URL ili putanja do logotipa e-poste.',
            'logo_width' => 'Sirina (px)',
            'logo_height' => 'Visina (px)',
            'content_width' => 'Sirina sadrzaja (px)',
            'primary_color' => 'Primarna boja',
            'footer_link_label' => 'Oznaka',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Novi link',
            'support_email' => 'E-adresa podrske',
            'support_phone' => 'Telefon podrske',
            'enable_logging' => 'Omoguci evidenciju',
            'enable_logging_helper' => 'Kada je onemoguceno, nece se kreirati zapisi o poslatim porukama.',
            'store_rendered_body' => 'Sacuvaj renderovan sadrzaj',
            'store_rendered_body_helper' => 'Sacuvaj konacni HTML svake poslate poruke. Potrebno za funkcije ponovnog slanja i pregleda.',
            'retention_days' => 'Zadrzavanje (dana)',
            'retention_days_helper' => 'Automatski obrisite zapise o poslatim porukama nakon ovoliko dana. Ostavite prazno za trajno cuvanje.',
            'cleanup_enabled' => 'Omoguci plansko ciscenje',
            'cleanup_enabled_helper' => 'Automatski pokrenite komandu za ciscenje po rasporedu.',
            'cleanup_frequency' => 'Ucestalost ciscenja',
            'max_file_size' => 'Maksimalna velicina datoteke (MB)',
            'allowed_extensions' => 'Dozvoljene ekstenzije datoteka',
            'allowed_extensions_placeholder' => 'Dodajte ekstenziju (npr., pdf)',
            'allowed_extensions_helper' => 'Ekstenzije datoteka dozvoljene za otpremanje.',
            'override_verification' => 'Zameni poruku verifikacije',
            'override_verification_helper' => 'Koristite sablon "user-verify-email" umesto podrazumevane poruke verifikacije aplikacije.',
            'override_password_reset' => 'Zameni resetovanje lozinke',
            'override_password_reset_helper' => 'Koristite sablon "user-password-reset" umesto podrazumevane poruke za resetovanje lozinke aplikacije.',
            'override_welcome' => 'Zameni poruku dobrodoslice',
            'override_welcome_helper' => 'Posaljite poruku dobrodoslice koristeci sablon "user-welcome" kada se novi korisnik registruje.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Sva prava zadrzana.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Nacrt',
            2 => 'U redu',
            3 => 'Poslato',
            4 => 'Neuspelo',
        ],

        'cleanup_frequency' => [
            1 => 'Dnevno',
            2 => 'Nedeljno',
            3 => 'Mesecno',
        ],
    ],

];
