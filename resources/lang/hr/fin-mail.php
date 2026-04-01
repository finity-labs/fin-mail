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
        'templates' => 'Predlošci',
        'themes' => 'Teme',
        'sent-emails' => 'Poslane e-poruke',
        'settings' => 'Postavke',
    ],

    'models' => [
        'email_template' => 'Predložak e-pošte',
        'email_templates' => 'Predlošci e-pošte',
        'email_theme' => 'Tema e-pošte',
        'email_themes' => 'Teme e-pošte',
        'sent_email' => 'Poslana e-poruka',
        'sent_emails' => 'Poslane e-poruke',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Sadržaj',
            'settings' => 'Postavke',
            'tokens' => 'Tokeni',
        ],

        'fields' => [
            'name' => 'Naziv',
            'key' => 'Ključ',
            'key_helper' => 'Jedinstveni ključ u kodu: npr. "invoice-sent"',
            'category' => 'Kategorija',
            'subject' => 'Predmet',
            'subject_helper' => 'Podržava tokene: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Tekst pretpregleda',
            'preheader_helper' => 'Tekst pretpregleda prikazan u klijentima e-pošte',
            'body' => 'Tijelo',
            'theme' => 'Tema',
            'theme_placeholder' => 'Zadana tema',
            'is_active' => 'Aktivno',
            'is_active_helper' => 'Neaktivni predlošci ne mogu se koristiti za slanje',
            'tags' => 'Oznake',
            'tags_placeholder' => 'Dodajte oznake za organizaciju',
            'from_address' => 'E-pošta pošiljatelja',
            'from_name' => 'Ime pošiljatelja',
            'locale' => 'Jezik',
        ],

        'sections' => [
            'custom_sender' => 'Prilagođeni pošiljatelj',
            'custom_sender_description' => 'Zaobiđite zadanu adresu pošiljatelja za ovaj predložak',
        ],

        'tokens' => [
            'label' => 'Dostupni tokeni',
            'helper' => 'Dokumentirajte dostupne tokene za ovaj predložak. To pomaže urednicima da znaju koje varijable mogu koristiti.',
            'token' => 'Token',
            'description' => 'Opis',
            'example' => 'Primjer',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Puno ime primatelja',
            'example_placeholder' => 'Ivan Horvat',
            'new_item' => 'Novi token',
        ],

        'blocks' => [
            'button' => 'Gumb',
            'button_heading' => 'Umetni gumb',
            'button_label' => 'Tekst gumba',
            'button_url' => 'URL',
            'button_align' => 'Poravnanje',
            'align_left' => 'Lijevo',
            'align_center' => 'Sredina',
            'align_right' => 'Desno',
            'button_default_label' => 'Kliknite ovdje',
        ],

        'columns' => [
            'locales' => 'Jezici',
            'active' => 'Aktivno',
            'locked' => 'Zaključano',
            'sent' => 'Poslano',
            'updated_at' => 'Ažurirano',
        ],

        'actions' => [
            'preview' => 'Pretpregled',
            'send_test' => 'Pošalji test',
            'send_test_field' => 'Pošalji na',
            'send_test_locale' => 'Jezik',
            'compose' => 'Napiši e-poruku',
            'version_history' => 'Povijest verzija',
            'back_to_templates' => 'Natrag na predloške',
        ],

        'notifications' => [
            'test_sent' => 'Testna e-poruka poslana!',
            'test_sent_body' => 'Poslano na :email',
            'test_failed' => 'Slanje testne e-poruke nije uspjelo',
            'saved' => 'Predložak spremljen',
            'saved_body' => 'Snimka verzije automatski je spremljena.',
            'locked_skipped' => 'Zaključani predlošci preskočeni',
            'locked_skipped_body' => ':count zaključan(ih) predloža(ka) preskočeno i nije obrisano.',
        ],

        'tooltips' => [
            'locked' => 'Ovaj predložak je zaključan — ključ i kategorija su samo za čitanje, brisanje je onemogućeno.',
        ],

        'versioning' => [
            'date' => 'Datum',
            'by' => 'Od',
            'preview' => 'Pregled',
            'restore' => 'Vrati',
            'restore_confirm' => 'Jeste li sigurni da želite vratiti verziju :version? Trenutni sadržaj će se prvo spremiti kao nova verzija.',
            'restored' => 'Verzija :version vraćena.',
            'empty' => 'Nema dostupne povijesti verzija.',
        ],

        'notices' => [
            'locked' => 'Ovaj predložak je zaključan. Polja ključ i kategorija ne mogu se mijenjati.',
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
        'title' => 'Napiši e-poruku',
        'title_with_name' => 'Pisanje: :name',

        'sections' => [
            'recipients' => 'Primatelji',
            'content' => 'Sadržaj e-poruke',
            'attachments' => 'Privici',
            'tokens' => 'Dostupni tokeni',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Za',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Unesite adrese e-pošte',
            'cc_placeholder' => 'CC adrese',
            'bcc_placeholder' => 'BCC adrese',
            'locale' => 'Jezik',
            'subject' => 'Predmet',
            'preheader' => 'Tekst pretpregleda',
            'body' => 'Tijelo',
            'attach_files' => 'Priloži datoteke',
            'preheader_helper' => 'Tekst pretpregleda prikazan u klijentima e-pošte prije otvaranja',
            'no_tokens' => 'Za ovaj predložak nema dokumentiranih tokena. Tokeni poput {{ user.name }} bit će zamijenjeni prilikom slanja putem API-ja/koda.',
        ],

        'actions' => [
            'send' => 'Pošalji e-poruku',
            'preview' => 'Pretpregled',
        ],

        'confirm' => [
            'heading' => 'Potvrdi slanje',
            'description' => 'Jeste li sigurni da želite poslati ovu e-poruku?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Primatelji',
            'content' => 'Sadržaj',
            'attachments' => 'Privici',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Za',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Predložak',
            'subject' => 'Predmet',
            'to_placeholder' => 'Unesite adrese e-pošte',
            'cc_placeholder' => 'Unesite CC adrese',
            'bcc_placeholder' => 'Unesite BCC adrese',
            'auto_attached' => 'Automatski priložene datoteke',
            'auto_attached_none' => 'Nema',
            'additional_attachments' => 'Dodatni privici',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Pošalji e-poruku',
        'modal_heading' => 'Napiši e-poruku',
        'submit' => 'Pošalji',

        'notifications' => [
            'sent' => 'E-poruka uspješno poslana',
            'sent_body' => 'Poslano na: :recipients',
            'failed' => 'Slanje e-poruke nije uspjelo',
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
            'background' => 'Pozadina i izgled',
            'background_description' => 'Glavne strukturne boje za izgled e-pošte.',
            'typography' => 'Tipografija',
            'typography_description' => 'Boje za tekst i naslove.',
            'buttons' => 'Gumbi',
            'buttons_description' => 'Stil gumba za poziv na akciju.',
            'footer' => 'Podnožje',
            'footer_description' => 'Stil područja podnožja.',
            'preview' => 'Pretpregled',
        ],

        'fields' => [
            'name' => 'Naziv',
            'is_default' => 'Zadana tema',
            'is_default_helper' => 'Zadana tema primjenjuje se na predloške koji ne navode vlastitu.',
            'page_background' => 'Pozadina stranice',
            'content_background' => 'Pozadina sadržaja',
            'border' => 'Obrub',
            'headings' => 'Naslovi',
            'body_text' => 'Tekst tijela',
            'secondary_text' => 'Sekundarni tekst',
            'links' => 'Poveznice',
            'button_background' => 'Pozadina gumba',
            'button_text' => 'Tekst gumba',
            'primary_accent' => 'Primarno/Naglasak',
            'footer_background' => 'Pozadina podnožja',
            'footer_text' => 'Tekst podnožja',
        ],

        'columns' => [
            'primary' => 'Primarno',
            'background' => 'Pozadina',
            'text' => 'Tekst',
            'button' => 'Gumb',
            'default' => 'Zadano',
            'templates' => 'Predlošci',
            'updated_at' => 'Ažurirano',
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
            'template' => 'Predložak',
            'template_placeholder' => 'Prilagođeno',
            'sent_by' => 'Poslao',
            'subject' => 'Predmet',
            'status' => 'Status',
            'sent_by_placeholder' => 'Sustav',
            'related_to' => 'Povezano s',
            'sent_at' => 'Poslano',
        ],

        'filters' => [
            'from' => 'Od',
            'until' => 'Do',
        ],

        'actions' => [
            'view' => 'Pregledaj',
            'resend' => 'Ponovno pošalji',
            'resend_description' => 'Ovo će poslati novu kopiju e-poruke izvornim primateljima.',
        ],

        'preview' => [
            'from' => 'Od:',
            'to' => 'Za:',
            'cc' => 'CC:',
            'template' => 'Predložak:',
            'sent' => 'Poslano:',
            'sent_not_yet' => 'Još ne',
            'status' => 'Status:',
            'no_body' => 'Tijelo e-pošte nije pohranjeno. Omogućite <code>logging.store_rendered_body</code> u postavkama za spremanje sadržaja e-pošte.',
            'error' => 'Detalji pogreške',
        ],
        'notifications' => [
            'resent' => 'E-poruka uspješno ponovno poslana',
            'resend_failed' => 'Ponovno slanje e-poruke nije uspjelo',
        ],

        'errors' => [
            'no_rendered_body' => 'Nije moguće ponovno poslati: nema spremljenog renderiranog sadržaja. Omogućite logging.store_rendered_body u postavkama.',
            'no_template' => 'Izvorni predložak više ne postoji.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Poslane e-poruke',

        'columns' => [
            'to' => 'Za',
            'template' => 'Predložak',
            'subject' => 'Predmet',
            'status' => 'Status',
            'sent_by' => 'Poslao',
            'sent_by_placeholder' => 'Sustav',
            'sent_at' => 'Poslano',
        ],

        'actions' => [
            'view' => 'Pregledaj',
            'resend' => 'Ponovno pošalji',
            'resend_confirm' => 'Jeste li sigurni da želite ponovno poslati ovu e-poruku?',
        ],

        'notifications' => [
            'resent' => 'E-poruka uspješno ponovno poslana',
            'resend_failed' => 'Ponovno slanje nije uspjelo',
        ],

        'empty' => [
            'heading' => 'Nema poslanih e-poruka',
            'description' => 'E-poruke poslane za ovaj zapis pojavit će se ovdje.',
        ],

        'errors' => [
            'no_body' => 'Nije moguće ponovno poslati: nema spremljenog renderiranog sadržaja ili predloška.',
            'no_template' => 'Izvorni predložak više ne postoji.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Postavke e-pošte',

        'tabs' => [
            'general' => 'Općenito',
            'branding' => 'Brendiranje',
            'logging' => 'Zapisivanje',
            'attachments' => 'Privici',
            'auth_emails' => 'E-poruke autentifikacije',
        ],

        'titles' => [
            'general' => 'Postavke predložaka e-pošte - Općenito',
            'branding' => 'Postavke predložaka e-pošte - Brendiranje',
            'logging' => 'Postavke predložaka e-pošte - Zapisivanje',
            'attachments' => 'Postavke predložaka e-pošte - Privici',
            'auth_emails' => 'Postavke predložaka e-pošte - E-poruke autentifikacije',
        ],

        'sections' => [
            'default_sender' => 'Zadani pošiljatelj',
            'default_sender_description' => 'Zadana adresa pošiljatelja za sve e-poruke koje šalje dodatak.',
            'additional_senders' => 'Dodatni pošiljatelji',
            'add_additional_senders' => 'Dodaj dodatne pošiljatelje',
            'additional_senders_description' => 'Dodatne adrese pošiljatelja koje korisnici mogu odabrati prilikom pisanja e-poruka.',
            'localization' => 'Lokalizacija',
            'categories' => 'Kategorije predložaka',
            'logo' => 'Logo',
            'colors' => 'Boje',
            'footer_links' => 'Poveznice podnožja',
            'add_footer_links' => 'Dodaj linkove u podnožje',
            'customer_service' => 'Korisnička podrška',
            'logging' => 'Zapisivanje e-pošte',
            'logging_description' => 'Upravljajte načinom na koji se poslane e-poruke bilježe u bazu podataka.',
            'cleanup' => 'Zakazano čišćenje',
            'cleanup_description' => 'Automatski brišite stare zapise poslanih e-poruka prema rasporedu.',
            'attachment_rules' => 'Pravila privitaka',
            'attachment_rules_description' => 'Konfigurirajte ograničenja za privitke datoteka u napisanim e-porukama.',
            'auth_emails' => 'Zamjene e-poruka autentifikacije',
            'auth_emails_description' => 'Zamijenite zadane e-poruke autentifikacije aplikacije vlastitim prilagođenim predlošcima.',
        ],

        'fields' => [
            'from_email' => 'E-pošta pošiljatelja',
            'from_name' => 'Ime pošiljatelja',
            'sender_email' => 'E-pošta',
            'sender_name' => 'Ime za prikaz',
            'sender_new' => 'Novi pošiljatelj',
            'default_locale' => 'Zadani jezik',
            'default_locale_helper' => 'Zadani jezik za nove predloške (npr. en, hu, de).',
            'languages' => 'Dostupni jezici',
            'language_code' => 'Kod',
            'language_display' => 'Ime za prikaz',
            'language_flag' => 'Ikona zastave',
            'language_new' => 'Novi jezik',
            'category_key' => 'Ključ',
            'category_label' => 'Oznaka',
            'category_new' => 'Nova kategorija',
            'logo_url' => 'URL ili putanja loga',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Apsolutni URL ili putanja do vašeg loga za e-poštu.',
            'logo_width' => 'Širina (px)',
            'logo_height' => 'Visina (px)',
            'content_width' => 'Širina sadržaja (px)',
            'primary_color' => 'Primarna boja',
            'footer_link_label' => 'Oznaka',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Nova poveznica',
            'support_email' => 'E-pošta podrške',
            'support_phone' => 'Telefon podrške',
            'enable_logging' => 'Omogući zapisivanje',
            'enable_logging_helper' => 'Kada je onemogućeno, zapisi poslanih e-poruka neće se stvarati.',
            'store_rendered_body' => 'Spremi renderirani sadržaj',
            'store_rendered_body_helper' => 'Spremi konačni HTML svake poslane e-poruke. Potrebno za značajke ponovnog slanja i pretpregleda.',
            'retention_days' => 'Zadržavanje (dani)',
            'retention_days_helper' => 'Automatski obriši zapise poslanih e-poruka nakon ovog broja dana. Ostavite prazno za trajno čuvanje.',
            'cleanup_enabled' => 'Omogući zakazano čišćenje',
            'cleanup_enabled_helper' => 'Automatski pokreni naredbu čišćenja prema rasporedu.',
            'cleanup_frequency' => 'Učestalost čišćenja',
            'max_file_size' => 'Maks. veličina datoteke (MB)',
            'allowed_extensions' => 'Dozvoljene ekstenzije datoteka',
            'allowed_extensions_placeholder' => 'Dodaj ekstenziju (npr. pdf)',
            'allowed_extensions_helper' => 'Dozvoljene ekstenzije datoteka za prijenos.',
            'override_verification' => 'Zaobiđi verifikacijsku e-poruku',
            'override_verification_helper' => 'Koristi predložak "user-verify-email" umjesto zadane verifikacijske e-poruke aplikacije.',
            'override_password_reset' => 'Zaobiđi poništavanje lozinke',
            'override_password_reset_helper' => 'Koristi predložak "user-password-reset" umjesto zadane e-poruke za poništavanje lozinke aplikacije.',
            'override_welcome' => 'Zaobiđi e-poruku dobrodošlice',
            'override_welcome_helper' => 'Pošalji e-poruku dobrodošlice koristeći predložak "user-welcome" kada se novi korisnik registrira.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Sva prava pridržana.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Skica',
            2 => 'U redu',
            3 => 'Poslano',
            4 => 'Neuspjelo',
        ],

        'cleanup_frequency' => [
            1 => 'Dnevno',
            2 => 'Tjedno',
            3 => 'Mjesečno',
        ],
    ],

];
