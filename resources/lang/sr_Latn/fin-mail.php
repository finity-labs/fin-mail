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
        'templates' => 'Šabloni',
        'themes' => 'Teme',
        'sent-emails' => 'Poslate poruke',
        'settings' => 'Podešavanja',
    ],

    'models' => [
        'email_template' => 'Šablon e-pošte',
        'email_templates' => 'Šabloni e-pošte',
        'email_theme' => 'Tema e-pošte',
        'email_themes' => 'Teme e-pošte',
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
            'content' => 'Sadržaj',
            'settings' => 'Podešavanja',
            'tokens' => 'Tokeni',
        ],

        'fields' => [
            'name' => 'Naziv',
            'key' => 'Ključ',
            'key_helper' => 'Jedinstveni ključ koji se koristi u kodu: npr. "invoice-sent"',
            'category' => 'Kategorija',
            'subject' => 'Tema',
            'subject_helper' => 'Podržava tokene: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Prethodnik naslova',
            'preheader_helper' => 'Tekst pregleda prikazan u klijentima e-pošte',
            'body' => 'Telo',
            'theme' => 'Tema',
            'theme_placeholder' => 'Podrazumevana tema',
            'is_active' => 'Aktivan',
            'is_active_helper' => 'Neaktivni šabloni se ne mogu koristiti za slanje',
            'tags' => 'Oznake',
            'tags_placeholder' => 'Dodajte oznake za organizaciju',
            'from_address' => 'E-adresa pošiljaoca',
            'from_name' => 'Ime pošiljaoca',
            'reply_to_address' => 'E-pošta primaoca',
            'reply_to_name' => 'Ime primaoca',
            'locale' => 'Jezik',
        ],

        'sections' => [
            'custom_sender' => 'Prilagođeni pošiljalac',
            'custom_sender_description' => 'Zameni podrazumevanu adresu pošiljaoca za ovaj šablon',
            'custom_reply_to' => 'Prilagođena adresa za odgovor',
            'custom_reply_to_description' => 'Postavite adresu za odgovor za ovaj predložak',
        ],

        'tokens' => [
            'label' => 'Dostupni tokeni',
            'helper' => 'Dokumentujte tokene dostupne za ovaj šablon. Ovo pomaže urednicima da znaju koje promenljive mogu koristiti.',
            'token' => 'Token',
            'description' => 'Opis',
            'example' => 'Primer',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Puno ime primaoca',
            'example_placeholder' => 'Petar Petrović',
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
            'locked' => 'Zaključan',
            'sent' => 'Poslato',
            'updated_at' => 'Ažurirano',
        ],

        'actions' => [
            'preview' => 'Pregled',
            'preview_heading' => 'Pregled: :record',
            'send_test' => 'Pošalji test',
            'send_test_field' => 'Pošalji na',
            'send_test_locale' => 'Jezik',
            'compose' => 'Napiši poruku',
            'version_history' => 'Istorija verzija',
            'back_to_templates' => 'Nazad na šablone',
        ],

        'notifications' => [
            'test_sent' => 'Test poruka poslata!',
            'test_sent_body' => 'Poslato na :email',
            'test_failed' => 'Slanje test poruke nije uspelo',
            'saved' => 'Šablon sačuvan',
            'saved_body' => 'Snimak verzije je automatski sačuvan.',
            'locked_skipped' => 'Zaključani šabloni preskočeni',
            'locked_skipped_body' => ':count zaključan(ih) šablon(a) je preskočeno i nije obrisano.',
        ],

        'tooltips' => [
            'locked' => 'Ovaj šablon je zaključan — ključ i kategorija su samo za čitanje, brisanje je sprečeno.',
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
            'locked' => 'Ovaj šablon je zaključan. Polja ključa i kategorije se ne mogu menjati.',
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
        'title' => 'Napiši poruku',
        'title_with_name' => 'Napiši: :name',

        'sections' => [
            'recipients' => 'Primaoci',
            'content' => 'Sadržaj poruke',
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
            'attach_files' => 'Priloži datoteke',
            'preheader_helper' => 'Tekst pregleda prikazan u klijentima e-pošte pre otvaranja',
            'no_tokens' => 'Nema dokumentovanih tokena za ovaj šablon. Tokeni poput {{ user.name }} biće zamenjeni prilikom slanja preko API/koda.',
        ],

        'actions' => [
            'send' => 'Pošalji poruku',
            'preview' => 'Pregled',
        ],

        'confirm' => [
            'heading' => 'Potvrdi slanje',
            'description' => 'Da li ste sigurni da želite da pošaljete ovu poruku?',
            'description_multiple' => 'Imate više primalaca. Izaberite kako želite da pošaljete ovu poruku.',
            'send_mode_label' => 'Kako treba da se pošalje?',
            'send_mode_individual' => 'Pošalji svaku poruku pojedinačno',
            'send_mode_individual_help' => 'Svakom primaocu u polju "Za" šalje se zasebna poruka, tako da primaoci ne vide adrese jedni drugih. Svi CC/BCC kontakti dobijaju kopiju svake poruke.',
            'send_mode_combined' => 'Pošalji kao jednu poruku sa više primalaca',
            'send_mode_combined_help' => 'Svima se šalje jedna poruka. Sve adrese u poljima "Za" i CC vidljive su svakom primaocu.',
        ],

        'notifications' => [
            'individual_sent' => 'Poruke su poslate',
            'individual_sent_body' => 'Broj poslatih pojedinačnih poruka: :count.',
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
            'content' => 'Sadržaj',
            'attachments' => 'Prilozi',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Za',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Šablon',
            'subject' => 'Tema',
            'to_placeholder' => 'Unesite e-adrese',
            'cc_placeholder' => 'Unesite adrese CC',
            'bcc_placeholder' => 'Unesite adrese BCC',
            'auto_attached' => 'Automatski priložene datoteke',
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
        'label' => 'Pošalji poruku',
        'modal_heading' => 'Napiši poruku',
        'submit' => 'Pošalji',

        'notifications' => [
            'sent' => 'Poruka uspešno poslata',
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
            'background_description' => 'Glavne strukturne boje rasporeda e-pošte.',
            'typography' => 'Tipografija',
            'typography_description' => 'Boje za tekst i naslove.',
            'buttons' => 'Dugmad',
            'buttons_description' => 'Stilizacija dugmadi za poziv na akciju.',
            'footer' => 'Podnožje',
            'footer_description' => 'Stilizacija oblasti podnožja.',
            'preview' => 'Pregled',
        ],

        'fields' => [
            'name' => 'Naziv',
            'is_default' => 'Podrazumevana tema',
            'is_default_helper' => 'Podrazumevana tema se primenjuje na šablone koji ne odrede svoju.',
            'page_background' => 'Pozadina stranice',
            'content_background' => 'Pozadina sadržaja',
            'border' => 'Okvir',
            'headings' => 'Naslovi',
            'body_text' => 'Tekst tela',
            'secondary_text' => 'Sekundarni tekst',
            'links' => 'Linkovi',
            'button_background' => 'Pozadina dugmeta',
            'button_text' => 'Tekst dugmeta',
            'primary_accent' => 'Primarni/Akcenat',
            'footer_background' => 'Pozadina podnožja',
            'footer_text' => 'Tekst podnožja',
        ],

        'columns' => [
            'primary' => 'Primarni',
            'background' => 'Pozadina',
            'text' => 'Tekst',
            'button' => 'Dugme',
            'default' => 'Podrazumevano',
            'templates' => 'Šabloni',
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
            'template' => 'Šablon',
            'template_placeholder' => 'Prilagođeno',
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
            'resend' => 'Ponovo pošalji',
            'resend_description' => 'Ovo će poslati novu kopiju poruke originalnim primaocima.',
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
            'error' => 'Detalji greške',
        ],
        'notifications' => [
            'resent' => 'Poruka uspešno ponovo poslata',
            'resend_failed' => 'Ponovno slanje poruke nije uspelo',
        ],

        'errors' => [
            'no_rendered_body' => 'Ne može se ponovo poslati: renderovan sadržaj nije sačuvan. Omogućite logging.store_rendered_body u podešavanjima.',
            'no_template' => 'Originalni šablon više ne postoji.',
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
            'template' => 'Šablon',
            'subject' => 'Tema',
            'status' => 'Status',
            'sent_by' => 'Poslao',
            'sent_by_placeholder' => 'Sistem',
            'sent_at' => 'Poslato',
        ],

        'actions' => [
            'view' => 'Pregled',
            'resend' => 'Ponovo pošalji',
            'resend_confirm' => 'Da li ste sigurni da želite da ponovo pošaljete ovu poruku?',
        ],

        'notifications' => [
            'resent' => 'Poruka uspešno ponovo poslata',
            'resend_failed' => 'Ponovno slanje nije uspelo',
        ],

        'empty' => [
            'heading' => 'Nema poslatih poruka',
            'description' => 'Poruke poslate za ovaj zapis će se prikazati ovde.',
        ],

        'errors' => [
            'no_body' => 'Ne može se ponovo poslati: renderovan sadržaj ili šablon nisu sačuvani.',
            'no_template' => 'Originalni šablon više ne postoji.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Podešavanja e-pošte',

        'tabs' => [
            'general' => 'Opšte',
            'branding' => 'Brend',
            'logging' => 'Evidencija',
            'attachments' => 'Prilozi',
            'auth_emails' => 'Poruke autentikacije',
        ],

        'titles' => [
            'general' => 'Podešavanja šablona e-pošte - Opšte',
            'branding' => 'Podešavanja šablona e-pošte - Brend',
            'logging' => 'Podešavanja šablona e-pošte - Evidencija',
            'attachments' => 'Podešavanja šablona e-pošte - Prilozi',
            'auth_emails' => 'Podešavanja šablona e-pošte - Poruke autentikacije',
        ],

        'sections' => [
            'default_sender' => 'Podrazumevani pošiljalac',
            'default_sender_description' => 'Podrazumevana adresa "Od" za sve poruke poslate dodatkom.',
            'additional_senders' => 'Dodatni pošiljaoci',
            'add_additional_senders' => 'Dodaj dodatne pošiljaoce',
            'additional_senders_description' => 'Dodatne adrese "Od" koje korisnici mogu izabrati prilikom pisanja poruka.',
            'localization' => 'Lokalizacija',
            'categories' => 'Kategorije šablona',
            'logo' => 'Logotip',
            'colors' => 'Boje',
            'footer_links' => 'Linkovi u podnožju',
            'add_footer_links' => 'Dodaj linkove u podnožje',
            'customer_service' => 'Korisnička podrška',
            'logging' => 'Evidencija poruka',
            'logging_description' => 'Kontrolišite kako se poslate poruke beleže u bazi podataka.',
            'cleanup' => 'Plansko čišćenje',
            'cleanup_description' => 'Automatski obrišite stare zapise o poslatim porukama po rasporedu.',
            'attachment_rules' => 'Pravila priloga',
            'attachment_rules_description' => 'Konfigurišite ograničenja za priloge datoteka u sastavljenim porukama.',
            'auth_emails' => 'Zamena poruka autentikacije',
            'auth_emails_description' => 'Zamenite podrazumevane poruke autentikacije aplikacije vašim prilagođenim šablonima.',
        ],

        'fields' => [
            'from_email' => 'E-adresa pošiljaoca',
            'from_name' => 'Ime pošiljaoca',
            'sender_email' => 'E-adresa',
            'sender_name' => 'Prikazno ime',
            'sender_new' => 'Novi pošiljalac',
            'default_locale' => 'Podrazumevani jezik',
            'default_locale_helper' => 'Podrazumevani jezik za nove šablone (npr., en, hu, de).',
            'languages' => 'Dostupni jezici',
            'language_code' => 'Kod',
            'language_display' => 'Prikazno ime',
            'language_flag' => 'Ikona zastave',
            'language_new' => 'Novi jezik',
            'category_key' => 'Ključ',
            'category_label' => 'Oznaka',
            'category_new' => 'Nova kategorija',
            'logo_url' => 'URL ili putanja logotipa',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Apsolutni URL ili putanja do logotipa e-pošte.',
            'logo_width' => 'Širina (px)',
            'logo_height' => 'Visina (px)',
            'content_width' => 'Širina sadržaja (px)',
            'primary_color' => 'Primarna boja',
            'footer_link_label' => 'Oznaka',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Novi link',
            'support_email' => 'E-adresa podrške',
            'support_phone' => 'Telefon podrške',
            'enable_logging' => 'Omogući evidenciju',
            'enable_logging_helper' => 'Kada je onemogućeno, neće se kreirati zapisi o poslatim porukama.',
            'store_rendered_body' => 'Sačuvaj renderovan sadržaj',
            'store_rendered_body_helper' => 'Sačuvaj konačni HTML svake poslate poruke. Potrebno za funkcije ponovnog slanja i pregleda.',
            'retention_days' => 'Zadržavanje (dana)',
            'retention_days_helper' => 'Automatski obrišite zapise o poslatim porukama nakon ovoliko dana. Ostavite prazno za trajno čuvanje.',
            'cleanup_enabled' => 'Omogući plansko čišćenje',
            'cleanup_enabled_helper' => 'Automatski pokrenite komandu za čišćenje po rasporedu.',
            'cleanup_frequency' => 'Učestalost čišćenja',
            'max_file_size' => 'Maksimalna veličina datoteke (MB)',
            'allowed_extensions' => 'Dozvoljene ekstenzije datoteka',
            'allowed_extensions_placeholder' => 'Dodajte ekstenziju (npr., pdf)',
            'allowed_extensions_helper' => 'Ekstenzije datoteka dozvoljene za otpremanje.',
            'override_verification' => 'Zameni poruku verifikacije',
            'override_verification_helper' => 'Koristite šablon "user-verify-email" umesto podrazumevane poruke verifikacije aplikacije.',
            'override_password_reset' => 'Zameni resetovanje lozinke',
            'override_password_reset_helper' => 'Koristite šablon "user-password-reset" umesto podrazumevane poruke za resetovanje lozinke aplikacije.',
            'override_welcome' => 'Zameni poruku dobrodošlice',
            'override_welcome_helper' => 'Pošaljite poruku dobrodošlice koristeći šablon "user-welcome" kada se novi korisnik registruje.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Sva prava zadržana.',
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
            3 => 'Mesečno',
        ],
    ],

];
