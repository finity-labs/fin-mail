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
        'sent-emails' => 'Poslani e-mailovi',
        'settings' => 'Postavke',
    ],

    'models' => [
        'email_template' => 'Predložak e-pošte',
        'email_templates' => 'Predlošci e-pošte',
        'email_theme' => 'Tema e-pošte',
        'email_themes' => 'Teme e-pošte',
        'sent_email' => 'Poslani e-mail',
        'sent_emails' => 'Poslani e-mailovi',
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
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Naziv',
            'key' => 'Ključ',
            'key_helper' => 'Jedinstveni ključ korišten u kodu: npr. "invoice-sent"',
            'category' => 'Kategorija',
            'subject' => 'Predmet',
            'subject_helper' => 'Podržava tokens: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Preheader',
            'preheader_helper' => 'Tekst pregleda koji se prikazuje u klijentima e-pošte',
            'body' => 'Tijelo',
            'theme' => 'Tema',
            'theme_placeholder' => 'Podrazumijevana tema',
            'is_active' => 'Aktivno',
            'is_active_helper' => 'Neaktivni predlošci se ne mogu koristiti za slanje',
            'tags' => 'Oznake',
            'tags_placeholder' => 'Dodajte oznake za organizaciju',
            'from_address' => 'E-mail pošiljaoca',
            'from_name' => 'Ime pošiljaoca',
            'locale' => 'Jezik',
        ],

        'sections' => [
            'custom_sender' => 'Prilagođeni pošiljalac',
            'custom_sender_description' => 'Zamijenite podrazumijevanu adresu pošiljaoca za ovaj predložak',
        ],

        'tokens' => [
            'label' => 'Dostupni Tokens',
            'helper' => 'Dokumentirajte tokens dostupne za ovaj predložak. Ovo pomaže urednicima da znaju koje varijable mogu koristiti.',
            'token' => 'Token',
            'description' => 'Opis',
            'example' => 'Primjer',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Puno ime primaoca',
            'example_placeholder' => 'Amer Hodžić',
            'new_item' => 'Novi Token',
        ],

        'columns' => [
            'locales' => 'Jezici',
            'active' => 'Aktivno',
            'locked' => 'Zaključano',
            'sent' => 'Poslano',
            'updated_at' => 'Ažurirano',
        ],

        'actions' => [
            'preview' => 'Pregled',
            'send_test' => 'Pošalji test',
            'send_test_field' => 'Pošalji na',
            'send_test_locale' => 'Jezik',
            'compose' => 'Sastavi e-mail',
            'version_history' => 'Historija verzija',
            'back_to_templates' => 'Nazad na predloške',
        ],

        'notifications' => [
            'test_sent' => 'Test e-mail je poslan!',
            'test_sent_body' => 'Poslano na :email',
            'test_failed' => 'Slanje test e-maila nije uspjelo',
            'saved' => 'Predložak je sačuvan',
            'saved_body' => 'Snimak verzije je automatski sačuvan.',
            'locked_skipped' => 'Zaključani predlošci su preskočeni',
            'locked_skipped_body' => ':count zaključan(ih) predložak(a) je preskočeno i nije obrisano.',
        ],

        'tooltips' => [
            'locked' => 'Ovaj predložak je zaključan — ključ i kategorija su samo za čitanje, brisanje je spriječeno.',
        ],

        'notices' => [
            'locked' => 'Ovaj predložak je zaključan. Polja za ključ i kategoriju se ne mogu mijenjati.',
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
        'title' => 'Sastavi e-mail',
        'title_with_name' => 'Sastavi: :name',

        'sections' => [
            'recipients' => 'Primaoci',
            'content' => 'Sadržaj e-maila',
            'attachments' => 'Prilozi',
            'tokens' => 'Dostupni Tokens',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Za',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Unesite e-mail adrese',
            'cc_placeholder' => 'CC adrese',
            'bcc_placeholder' => 'BCC adrese',
            'locale' => 'Jezik',
            'subject' => 'Predmet',
            'preheader' => 'Preheader',
            'body' => 'Tijelo',
            'attach_files' => 'Priloži datoteke',
            'preheader_helper' => 'Tekst pregleda koji se prikazuje u klijentima e-pošte prije otvaranja',
            'no_tokens' => 'Nema dokumentiranih tokens za ovaj predložak. Tokens poput {{ user.name }} bit će zamijenjeni prilikom slanja putem API-ja/koda.',
        ],

        'actions' => [
            'send' => 'Pošalji e-mail',
            'preview' => 'Pregled',
        ],

        'confirm' => [
            'heading' => 'Potvrdite slanje',
            'description' => 'Jeste li sigurni da želite poslati ovaj e-mail?',
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
            'template' => 'Predložak',
            'subject' => 'Predmet',
            'to_placeholder' => 'Unesite e-mail adrese',
            'cc_placeholder' => 'Unesite CC adrese',
            'bcc_placeholder' => 'Unesite BCC adrese',
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
        'label' => 'Pošalji e-mail',
        'modal_heading' => 'Sastavi e-mail',
        'submit' => 'Pošalji',

        'notifications' => [
            'sent' => 'E-mail je uspješno poslan',
            'sent_body' => 'Poslano na: :recipients',
            'failed' => 'Slanje e-maila nije uspjelo',
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
            'background_description' => 'Glavne strukturne boje za raspored e-maila.',
            'typography' => 'Tipografija',
            'typography_description' => 'Boje za tekst i naslove.',
            'buttons' => 'Dugmad',
            'buttons_description' => 'Stiliziranje dugmadi za poziv na akciju.',
            'footer' => 'Podnožje',
            'footer_description' => 'Stiliziranje područja podnožja.',
            'preview' => 'Pregled',
        ],

        'fields' => [
            'name' => 'Naziv',
            'is_default' => 'Podrazumijevana tema',
            'is_default_helper' => 'Podrazumijevana tema se primjenjuje na predloške koji nemaju specificiranu temu.',
            'page_background' => 'Pozadina stranice',
            'content_background' => 'Pozadina sadržaja',
            'border' => 'Okvir',
            'headings' => 'Naslovi',
            'body_text' => 'Tekst tijela',
            'secondary_text' => 'Sekundarni tekst',
            'links' => 'Linkovi',
            'button_background' => 'Pozadina dugmeta',
            'button_text' => 'Tekst dugmeta',
            'primary_accent' => 'Primarni/Naglašeni',
            'footer_background' => 'Pozadina podnožja',
            'footer_text' => 'Tekst podnožja',
        ],

        'columns' => [
            'primary' => 'Primarni',
            'background' => 'Pozadina',
            'text' => 'Tekst',
            'button' => 'Dugme',
            'default' => 'Podrazumijevano',
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
            'sent_by_placeholder' => 'Sistem',
            'related_to' => 'Povezano sa',
            'sent_at' => 'Poslano',
        ],

        'filters' => [
            'from' => 'Od',
            'until' => 'Do',
        ],

        'actions' => [
            'view' => 'Pregledaj',
            'resend' => 'Ponovo pošalji',
            'resend_description' => 'Ovo će poslati novu kopiju e-maila originalnim primaocima.',
        ],

        'notifications' => [
            'resent' => 'E-mail je uspješno ponovo poslan',
            'resend_failed' => 'Ponovno slanje e-maila nije uspjelo',
        ],

        'errors' => [
            'no_rendered_body' => 'Nije moguće ponovo poslati: nema sačuvanog renderiranog sadržaja. Aktivirajte logging.store_rendered_body u postavkama.',
            'no_template' => 'Originalni predložak više ne postoji.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Poslani e-mailovi',

        'columns' => [
            'to' => 'Za',
            'template' => 'Predložak',
            'subject' => 'Predmet',
            'status' => 'Status',
            'sent_by' => 'Poslao',
            'sent_by_placeholder' => 'Sistem',
            'sent_at' => 'Poslano',
        ],

        'actions' => [
            'view' => 'Pregledaj',
            'resend' => 'Ponovo pošalji',
            'resend_confirm' => 'Jeste li sigurni da želite ponovo poslati ovaj e-mail?',
        ],

        'notifications' => [
            'resent' => 'E-mail je uspješno ponovo poslan',
            'resend_failed' => 'Ponovno slanje nije uspjelo',
        ],

        'empty' => [
            'heading' => 'Nema poslanih e-mailova',
            'description' => 'E-mailovi poslani za ovaj zapis će se pojaviti ovdje.',
        ],

        'errors' => [
            'no_body' => 'Nije moguće ponovo poslati: nema sačuvanog renderiranog sadržaja ili predloška.',
            'no_template' => 'Originalni predložak više ne postoji.',
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
            'general' => 'Opće',
            'branding' => 'Brendiranje',
            'logging' => 'Evidencija',
            'attachments' => 'Prilozi',
            'auth_emails' => 'E-mailovi za autentifikaciju',
        ],

        'titles' => [
            'general' => 'Postavke predložaka e-pošte - Opće',
            'branding' => 'Postavke predložaka e-pošte - Brendiranje',
            'logging' => 'Postavke predložaka e-pošte - Evidencija',
            'attachments' => 'Postavke predložaka e-pošte - Prilozi',
            'auth_emails' => 'Postavke predložaka e-pošte - E-mailovi za autentifikaciju',
        ],

        'sections' => [
            'default_sender' => 'Podrazumijevani pošiljalac',
            'default_sender_description' => 'Podrazumijevana adresa "Od" za sve e-mailove poslane putem dodatka.',
            'additional_senders' => 'Dodatni pošiljaoci',
            'additional_senders_description' => 'Dodatne adrese "Od" koje korisnici mogu odabrati prilikom sastavljanja e-mailova.',
            'localization' => 'Lokalizacija',
            'categories' => 'Kategorije predložaka',
            'logo' => 'Logo',
            'colors' => 'Boje',
            'footer_links' => 'Linkovi u podnožju',
            'customer_service' => 'Korisnička podrška',
            'logging' => 'Evidencija e-pošte',
            'logging_description' => 'Kontrolirajte kako se poslani e-mailovi evidentiraju u bazi podataka.',
            'cleanup' => 'Zakazano čišćenje',
            'cleanup_description' => 'Automatski obrišite stare zapise o poslanim e-mailovima prema rasporedu.',
            'attachment_rules' => 'Pravila za priloge',
            'attachment_rules_description' => 'Konfigurirajte ograničenja za priloge datoteka u sastavljenim e-mailovima.',
            'auth_emails' => 'Zamjena e-mailova za autentifikaciju',
            'auth_emails_description' => 'Zamijenite podrazumijevane e-mailove za autentifikaciju aplikacije vašim prilagođenim predlošcima.',
        ],

        'fields' => [
            'from_email' => 'E-mail pošiljaoca',
            'from_name' => 'Ime pošiljaoca',
            'sender_email' => 'E-mail',
            'sender_name' => 'Prikazano ime',
            'sender_new' => 'Novi pošiljalac',
            'default_locale' => 'Podrazumijevani jezik',
            'default_locale_helper' => 'Podrazumijevani jezik za nove predloške (npr. en, hu, de).',
            'languages' => 'Dostupni jezici',
            'language_code' => 'Kod',
            'language_display' => 'Prikazano ime',
            'language_flag' => 'Ikona zastave',
            'language_new' => 'Novi jezik',
            'category_key' => 'Ključ',
            'category_label' => 'Oznaka',
            'category_new' => 'Nova kategorija',
            'logo_url' => 'URL ili putanja do logoa',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Apsolutni URL ili putanja do vašeg e-mail logoa.',
            'logo_width' => 'Širina (px)',
            'logo_height' => 'Visina (px)',
            'content_width' => 'Širina sadržaja (px)',
            'primary_color' => 'Primarna boja',
            'footer_link_label' => 'Oznaka',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Novi link',
            'support_email' => 'E-mail podrške',
            'support_phone' => 'Telefon podrške',
            'enable_logging' => 'Omogući evidenciju',
            'enable_logging_helper' => 'Kada je onemogućeno, neće se kreirati zapisi o poslanim e-mailovima.',
            'store_rendered_body' => 'Sačuvaj renderirani sadržaj',
            'store_rendered_body_helper' => 'Sačuvajte konačni HTML svakog poslanog e-maila. Potrebno za funkcije ponovnog slanja i pregleda.',
            'retention_days' => 'Zadržavanje (dani)',
            'retention_days_helper' => 'Automatski obrišite zapise o poslanim e-mailovima nakon ovoliko dana. Ostavite prazno za trajno čuvanje.',
            'cleanup_enabled' => 'Omogući zakazano čišćenje',
            'cleanup_enabled_helper' => 'Automatski pokrenite naredbu za čišćenje prema rasporedu.',
            'cleanup_frequency' => 'Učestalost čišćenja',
            'max_file_size' => 'Maksimalna veličina datoteke (MB)',
            'allowed_extensions' => 'Dozvoljene ekstenzije datoteka',
            'allowed_extensions_placeholder' => 'Dodajte ekstenziju (npr. pdf)',
            'allowed_extensions_helper' => 'Ekstenzije datoteka dozvoljene za prijenos.',
            'override_verification' => 'Zamijeni verifikaciju e-maila',
            'override_verification_helper' => 'Koristite predložak "user-verify-email" umjesto podrazumijevanog verifikacijskog e-maila aplikacije.',
            'override_password_reset' => 'Zamijeni resetiranje lozinke',
            'override_password_reset_helper' => 'Koristite predložak "user-password-reset" umjesto podrazumijevanog e-maila za resetiranje lozinke aplikacije.',
            'override_welcome' => 'Zamijeni e-mail dobrodošlice',
            'override_welcome_helper' => 'Pošaljite e-mail dobrodošlice koristeći predložak "user-welcome" kada se novi korisnik registrira.',
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
            2 => 'U redu čekanja',
            3 => 'Poslano',
            4 => 'Neuspjelo',
        ],

        'cleanup_frequency' => [
            1 => 'Dnevno',
            2 => 'Sedmično',
            3 => 'Mjesečno',
        ],
    ],

];
