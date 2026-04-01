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
        'templates' => 'Maler',
        'themes' => 'Temaer',
        'sent-emails' => 'Sendte e-poster',
        'settings' => 'Innstillinger',
    ],

    'models' => [
        'email_template' => 'E-postmal',
        'email_templates' => 'E-postmaler',
        'email_theme' => 'E-posttema',
        'email_themes' => 'E-posttemaer',
        'sent_email' => 'Sendt e-post',
        'sent_emails' => 'Sendte e-poster',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Innhold',
            'settings' => 'Innstillinger',
            'tokens' => 'Variabler',
        ],

        'fields' => [
            'name' => 'Navn',
            'key' => 'Nokkel',
            'key_helper' => 'Unik nokkel brukt i kode: f.eks. "invoice-sent"',
            'category' => 'Kategori',
            'subject' => 'Emne',
            'subject_helper' => 'Stotter variabler: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Forhåndsvisning',
            'preheader_helper' => 'Forhåndsvisningstekst som vises i e-postklienter',
            'body' => 'Innhold',
            'theme' => 'Tema',
            'theme_placeholder' => 'Standardtema',
            'is_active' => 'Aktiv',
            'is_active_helper' => 'Inaktive maler kan ikke brukes til sending',
            'tags' => 'Etiketter',
            'tags_placeholder' => 'Legg til etiketter for organisering',
            'from_address' => 'Fra e-post',
            'from_name' => 'Fra navn',
            'locale' => 'Språk',
        ],

        'sections' => [
            'custom_sender' => 'Egendefinert avsender',
            'custom_sender_description' => 'Overstyr standard avsenderadresse for denne malen',
        ],

        'tokens' => [
            'label' => 'Tilgjengelige variabler',
            'helper' => 'Dokumenter variablene som er tilgjengelige for denne malen. Dette hjelper redaktorer med å vite hvilke variabler de kan bruke.',
            'token' => 'Variabel',
            'description' => 'Beskrivelse',
            'example' => 'Eksempel',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Mottakerens fulle navn',
            'example_placeholder' => 'Ola Nordmann',
            'new_item' => 'Ny variabel',
        ],

        'blocks' => [
            'button' => 'Knapp',
            'button_heading' => 'Sett inn knapp',
            'button_label' => 'Knapptekst',
            'button_url' => 'URL',
            'button_align' => 'Justering',
            'align_left' => 'Venstre',
            'align_center' => 'Midtstilt',
            'align_right' => 'Høyre',
            'button_default_label' => 'Klikk her',
        ],

        'columns' => [
            'locales' => 'Språk',
            'active' => 'Aktiv',
            'locked' => 'Låst',
            'sent' => 'Sendt',
            'updated_at' => 'Oppdatert',
        ],

        'actions' => [
            'preview' => 'Forhåndsvisning',
            'send_test' => 'Send test',
            'send_test_field' => 'Send til',
            'send_test_locale' => 'Språk',
            'compose' => 'Skriv e-post',
            'version_history' => 'Versjonshistorikk',
            'back_to_templates' => 'Tilbake til maler',
        ],

        'notifications' => [
            'test_sent' => 'Test-e-post sendt!',
            'test_sent_body' => 'Sendt til :email',
            'test_failed' => 'Kunne ikke sende test-e-post',
            'saved' => 'Mal lagret',
            'saved_body' => 'Et versjonsbilde ble lagret automatisk.',
            'locked_skipped' => 'Låste maler hoppet over',
            'locked_skipped_body' => ':count låst(e) mal(er) ble hoppet over og ikke slettet.',
        ],

        'tooltips' => [
            'locked' => 'Denne malen er låst — nokkel og kategori er skrivebeskyttet, sletting er forhindret.',
        ],

        'versioning' => [
            'date' => 'Dato',
            'by' => 'Av',
            'preview' => 'Forhåndsvisning',
            'restore' => 'Gjenopprett',
            'restore_confirm' => 'Er du sikker på at du vil gjenopprette versjon :version? Gjeldende innhold lagres som en ny versjon først.',
            'restored' => 'Versjon :version gjenopprettet.',
            'empty' => 'Ingen versjonshistorikk tilgjengelig.',
        ],

        'notices' => [
            'locked' => 'Denne malen er låst. Nokkel- og kategorifeltene kan ikke endres.',
        ],

        'language_label' => 'Språk: :locale',

        'replicate_suffix' => '(Kopi)',
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
            'recipients' => 'Mottakere',
            'content' => 'E-postinnhold',
            'attachments' => 'Vedlegg',
            'tokens' => 'Tilgjengelige variabler',
        ],

        'fields' => [
            'from' => 'Fra',
            'to' => 'Til',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Skriv inn e-postadresser',
            'cc_placeholder' => 'CC-adresser',
            'bcc_placeholder' => 'BCC-adresser',
            'locale' => 'Språk',
            'subject' => 'Emne',
            'preheader' => 'Forhåndsvisning',
            'body' => 'Innhold',
            'attach_files' => 'Legg ved filer',
            'preheader_helper' => 'Forhåndsvisningstekst som vises i e-postklienter for åpning',
            'no_tokens' => 'Ingen variabler er dokumentert for denne malen. Variabler som {{ user.name }} vil bli erstattet ved sending via API/kode.',
        ],

        'actions' => [
            'send' => 'Send e-post',
            'preview' => 'Forhåndsvisning',
        ],

        'confirm' => [
            'heading' => 'Bekreft sending',
            'description' => 'Er du sikker på at du vil sende denne e-posten?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Mottakere',
            'content' => 'Innhold',
            'attachments' => 'Vedlegg',
        ],

        'fields' => [
            'from' => 'Fra',
            'to' => 'Til',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Mal',
            'subject' => 'Emne',
            'to_placeholder' => 'Skriv inn e-postadresser',
            'cc_placeholder' => 'Skriv inn CC-adresser',
            'bcc_placeholder' => 'Skriv inn BCC-adresser',
            'auto_attached' => 'Automatisk vedlagte filer',
            'auto_attached_none' => 'Ingen',
            'additional_attachments' => 'Ytterligere vedlegg',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Send e-post',
        'modal_heading' => 'Skriv e-post',
        'submit' => 'Send',

        'notifications' => [
            'sent' => 'E-post sendt',
            'sent_body' => 'Sendt til: :recipients',
            'failed' => 'Kunne ikke sende e-post',
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
            'background' => 'Bakgrunn og oppsett',
            'background_description' => 'Hovedstrukturfarger for e-postoppsettet.',
            'typography' => 'Typografi',
            'typography_description' => 'Farger for tekst og overskrifter.',
            'buttons' => 'Knapper',
            'buttons_description' => 'Stil for handlingsknapper.',
            'footer' => 'Bunntekst',
            'footer_description' => 'Stil for bunntekstområdet.',
            'preview' => 'Forhåndsvisning',
        ],

        'fields' => [
            'name' => 'Navn',
            'is_default' => 'Standardtema',
            'is_default_helper' => 'Standardtemaet brukes på maler som ikke angir et tema.',
            'page_background' => 'Sidebakgrunn',
            'content_background' => 'Innholdsbakgrunn',
            'border' => 'Kantlinje',
            'headings' => 'Overskrifter',
            'body_text' => 'Brodtekst',
            'secondary_text' => 'Sekundartekst',
            'links' => 'Lenker',
            'button_background' => 'Knappebakgrunn',
            'button_text' => 'Knappetekst',
            'primary_accent' => 'Primar/Aksentfarge',
            'footer_background' => 'Bunntekstbakgrunn',
            'footer_text' => 'Bunnteksttekst',
        ],

        'columns' => [
            'primary' => 'Primar',
            'background' => 'Bakgrunn',
            'text' => 'Tekst',
            'button' => 'Knapp',
            'default' => 'Standard',
            'templates' => 'Maler',
            'updated_at' => 'Oppdatert',
        ],

        'replicate_suffix' => '(Kopi)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Til',
            'template' => 'Mal',
            'template_placeholder' => 'Egendefinert',
            'sent_by' => 'Sendt av',
            'subject' => 'Emne',
            'status' => 'Status',
            'sent_by_placeholder' => 'System',
            'related_to' => 'Relatert til',
            'sent_at' => 'Sendt',
        ],

        'filters' => [
            'from' => 'Fra',
            'until' => 'Til',
        ],

        'actions' => [
            'view' => 'Vis',
            'resend' => 'Send på nytt',
            'resend_description' => 'Dette vil sende en ny kopi av e-posten til de opprinnelige mottakerne.',
        ],

        'preview' => [
            'from' => 'Fra:',
            'to' => 'Til:',
            'cc' => 'Kopi:',
            'template' => 'Mal:',
            'sent' => 'Sendt:',
            'sent_not_yet' => 'Ikke ennå',
            'status' => 'Status:',
            'no_body' => 'E-postinnholdet ble ikke lagret. Aktiver <code>logging.store_rendered_body</code> i innstillingene for å lagre e-postinnhold.',
            'error' => 'Feildetaljer',
        ],
        'notifications' => [
            'resent' => 'E-post sendt på nytt',
            'resend_failed' => 'Kunne ikke sende e-post på nytt',
        ],

        'errors' => [
            'no_rendered_body' => 'Kan ikke sende på nytt: ingen gjengitt innhold lagret. Aktiver logging.store_rendered_body i innstillingene.',
            'no_template' => 'Den opprinnelige malen eksisterer ikke lenger.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Sendte e-poster',

        'columns' => [
            'to' => 'Til',
            'template' => 'Mal',
            'subject' => 'Emne',
            'status' => 'Status',
            'sent_by' => 'Sendt av',
            'sent_by_placeholder' => 'System',
            'sent_at' => 'Sendt',
        ],

        'actions' => [
            'view' => 'Vis',
            'resend' => 'Send på nytt',
            'resend_confirm' => 'Er du sikker på at du vil sende denne e-posten på nytt?',
        ],

        'notifications' => [
            'resent' => 'E-post sendt på nytt',
            'resend_failed' => 'Kunne ikke sende på nytt',
        ],

        'empty' => [
            'heading' => 'Ingen e-poster sendt',
            'description' => 'E-poster sendt for denne posten vil vises her.',
        ],

        'errors' => [
            'no_body' => 'Kan ikke sende på nytt: ingen gjengitt innhold eller mal lagret.',
            'no_template' => 'Den opprinnelige malen eksisterer ikke lenger.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'E-postinnstillinger',

        'tabs' => [
            'general' => 'Generelt',
            'branding' => 'Merkevare',
            'logging' => 'Logging',
            'attachments' => 'Vedlegg',
            'auth_emails' => 'Autentiserings-e-poster',
        ],

        'titles' => [
            'general' => 'E-postmalinnstillinger - Generelt',
            'branding' => 'E-postmalinnstillinger - Merkevare',
            'logging' => 'E-postmalinnstillinger - Logging',
            'attachments' => 'E-postmalinnstillinger - Vedlegg',
            'auth_emails' => 'E-postmalinnstillinger - Autentiserings-e-poster',
        ],

        'sections' => [
            'default_sender' => 'Standard avsender',
            'default_sender_description' => 'Standard "Fra"-adresse for alle e-poster sendt av tillegget.',
            'additional_senders' => 'Ytterligere avsendere',
            'add_additional_senders' => 'Legg til flere avsendere',
            'additional_senders_description' => 'Ekstra "Fra"-adresser brukere kan velge når de skriver e-poster.',
            'localization' => 'Lokalisering',
            'categories' => 'Malkategorier',
            'logo' => 'Logo',
            'colors' => 'Farger',
            'footer_links' => 'Bunntekstlenker',
            'add_footer_links' => 'Legg til bunntekstlenker',
            'customer_service' => 'Kundeservice',
            'logging' => 'E-postlogging',
            'logging_description' => 'Kontroller hvordan sendte e-poster registreres i databasen.',
            'cleanup' => 'Planlagt opprydding',
            'cleanup_description' => 'Slett gamle sendte e-postoppforinger automatisk etter en tidsplan.',
            'attachment_rules' => 'Vedleggsregler',
            'attachment_rules_description' => 'Konfigurer begrensninger for filvedlegg i skrevne e-poster.',
            'auth_emails' => 'Overstyr autentiserings-e-poster',
            'auth_emails_description' => 'Overstyr applikasjonens standard autentiserings-e-poster med dine egendefinerte maler.',
        ],

        'fields' => [
            'from_email' => 'Fra e-post',
            'from_name' => 'Fra navn',
            'sender_email' => 'E-post',
            'sender_name' => 'Visningsnavn',
            'sender_new' => 'Ny avsender',
            'default_locale' => 'Standardspråk',
            'default_locale_helper' => 'Standardspråk for nye maler (f.eks. en, hu, de).',
            'languages' => 'Tilgjengelige språk',
            'language_code' => 'Kode',
            'language_display' => 'Visningsnavn',
            'language_flag' => 'Flaggikon',
            'language_new' => 'Nytt språk',
            'category_key' => 'Nokkel',
            'category_label' => 'Etikett',
            'category_new' => 'Ny kategori',
            'logo_url' => 'Logo-URL eller -sti',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Absolutt URL eller sti til e-postlogoen din.',
            'logo_width' => 'Bredde (px)',
            'logo_height' => 'Hoyde (px)',
            'content_width' => 'Innholdsbredde (px)',
            'primary_color' => 'Primarfarge',
            'footer_link_label' => 'Etikett',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Ny lenke',
            'support_email' => 'Stotte-e-post',
            'support_phone' => 'Stottetelefon',
            'enable_logging' => 'Aktiver logging',
            'enable_logging_helper' => 'Når deaktivert, vil ingen sendte e-postoppforinger bli opprettet.',
            'store_rendered_body' => 'Lagre gjengitt innhold',
            'store_rendered_body_helper' => 'Lagre den endelige HTML-en for hver sendte e-post. Påkrevd for funksjoner som send på nytt og forhåndsvisning.',
            'retention_days' => 'Oppbevaring (dager)',
            'retention_days_helper' => 'Slett sendte e-postoppforinger automatisk etter dette antall dager. La stå tom for å beholde for alltid.',
            'cleanup_enabled' => 'Aktiver planlagt opprydding',
            'cleanup_enabled_helper' => 'Kjor oppryddingskommandoen automatisk etter en tidsplan.',
            'cleanup_frequency' => 'Oppryddingsfrekvens',
            'max_file_size' => 'Maks filstorrelse (MB)',
            'allowed_extensions' => 'Tillatte filendelser',
            'allowed_extensions_placeholder' => 'Legg til endelse (f.eks. pdf)',
            'allowed_extensions_helper' => 'Filendelser tillatt for opplasting.',
            'override_verification' => 'Overstyr e-postverifisering',
            'override_verification_helper' => 'Bruk "user-verify-email"-malen i stedet for applikasjonens standard verifiserings-e-post.',
            'override_password_reset' => 'Overstyr passordtilbakestilling',
            'override_password_reset_helper' => 'Bruk "user-password-reset"-malen i stedet for applikasjonens standard passordtilbakestillings-e-post.',
            'override_welcome' => 'Overstyr velkomst-e-post',
            'override_welcome_helper' => 'Send en velkomst-e-post med "user-welcome"-malen når en ny bruker registrerer seg.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Alle rettigheter forbeholdt.',
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
            3 => 'Sendt',
            4 => 'Mislyktes',
        ],

        'cleanup_frequency' => [
            1 => 'Daglig',
            2 => 'Ukentlig',
            3 => 'Månedlig',
        ],
    ],

];
