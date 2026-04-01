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
        'templates' => 'Skabeloner',
        'themes' => 'Temaer',
        'sent-emails' => 'Sendte e-mails',
        'settings' => 'Indstillinger',
    ],

    'models' => [
        'email_template' => 'E-mailskabelon',
        'email_templates' => 'E-mailskabeloner',
        'email_theme' => 'E-mailtema',
        'email_themes' => 'E-mailtemaer',
        'sent_email' => 'Sendt e-mail',
        'sent_emails' => 'Sendte e-mails',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Indhold',
            'settings' => 'Indstillinger',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Navn',
            'key' => 'Nøgle',
            'key_helper' => 'Unik nøgle brugt i kode: f.eks. "invoice-sent"',
            'category' => 'Kategori',
            'subject' => 'Emne',
            'subject_helper' => 'Understøtter tokens: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Forhåndsvisningstekst',
            'preheader_helper' => 'Forhåndsvisningstekst vist i e-mailklienter',
            'body' => 'Indhold',
            'theme' => 'Tema',
            'theme_placeholder' => 'Standardtema',
            'is_active' => 'Aktiv',
            'is_active_helper' => 'Inaktive skabeloner kan ikke bruges til afsendelse',
            'tags' => 'Tags',
            'tags_placeholder' => 'Tilføj tags til organisering',
            'from_address' => 'Afsender-e-mail',
            'from_name' => 'Afsendernavn',
            'locale' => 'Sprog',
        ],

        'sections' => [
            'custom_sender' => 'Brugerdefineret afsender',
            'custom_sender_description' => 'Tilsidesæt standardafsenderadressen for denne skabelon',
        ],

        'tokens' => [
            'label' => 'Tilgængelige tokens',
            'helper' => 'Dokumentér de tilgængelige tokens for denne skabelon. Dette hjælper redaktører med at vide, hvilke variabler de kan bruge.',
            'token' => 'Token',
            'description' => 'Beskrivelse',
            'example' => 'Eksempel',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Modtagerens fulde navn',
            'example_placeholder' => 'Jens Jensen',
            'new_item' => 'Ny token',
        ],

        'blocks' => [
            'button' => 'Knap',
            'button_heading' => 'Indsæt knap',
            'button_label' => 'Knaptekst',
            'button_url' => 'URL',
            'button_align' => 'Justering',
            'align_left' => 'Venstre',
            'align_center' => 'Center',
            'align_right' => 'Højre',
            'button_default_label' => 'Klik her',
        ],

        'columns' => [
            'locales' => 'Sprog',
            'active' => 'Aktiv',
            'locked' => 'Låst',
            'sent' => 'Sendt',
            'updated_at' => 'Opdateret',
        ],

        'actions' => [
            'preview' => 'Forhåndsvisning',
            'send_test' => 'Send test',
            'send_test_field' => 'Send til',
            'send_test_locale' => 'Sprog',
            'compose' => 'Skriv e-mail',
            'version_history' => 'Versionshistorik',
            'back_to_templates' => 'Tilbage til skabeloner',
        ],

        'notifications' => [
            'test_sent' => 'Test-e-mail sendt!',
            'test_sent_body' => 'Sendt til :email',
            'test_failed' => 'Kunne ikke sende test-e-mail',
            'saved' => 'Skabelon gemt',
            'saved_body' => 'Et versionssnapshot blev gemt automatisk.',
            'locked_skipped' => 'Låste skabeloner sprunget over',
            'locked_skipped_body' => ':count låst(e) skabelon(er) blev sprunget over og ikke slettet.',
        ],

        'tooltips' => [
            'locked' => 'Denne skabelon er låst — nøgle og kategori er skrivebeskyttede, sletning er forhindret.',
        ],

        'versioning' => [
            'date' => 'Dato',
            'by' => 'Af',
            'preview' => 'Forhåndsvisning',
            'restore' => 'Gendan',
            'restore_confirm' => 'Er du sikker på, at du vil gendanne version :version? Det nuværende indhold gemmes som en ny version først.',
            'restored' => 'Version :version gendannet.',
            'empty' => 'Ingen versionshistorik tilgængelig.',
        ],

        'notices' => [
            'locked' => 'Denne skabelon er låst. Felterne nøgle og kategori kan ikke ændres.',
        ],

        'language_label' => 'Sprog: :locale',

        'replicate_suffix' => '(Kopi)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Skriv e-mail',
        'title_with_name' => 'Skriv: :name',

        'sections' => [
            'recipients' => 'Modtagere',
            'content' => 'E-mailindhold',
            'attachments' => 'Vedhæftede filer',
            'tokens' => 'Tilgængelige tokens',
        ],

        'fields' => [
            'from' => 'Fra',
            'to' => 'Til',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Indtast e-mailadresser',
            'cc_placeholder' => 'CC-adresser',
            'bcc_placeholder' => 'BCC-adresser',
            'locale' => 'Sprog',
            'subject' => 'Emne',
            'preheader' => 'Forhåndsvisningstekst',
            'body' => 'Indhold',
            'attach_files' => 'Vedhæft filer',
            'preheader_helper' => 'Forhåndsvisningstekst vist i e-mailklienter før åbning',
            'no_tokens' => 'Ingen tokens dokumenteret for denne skabelon. Tokens som {{ user.name }} erstattes ved afsendelse via API/kode.',
        ],

        'actions' => [
            'send' => 'Send e-mail',
            'preview' => 'Forhåndsvisning',
        ],

        'confirm' => [
            'heading' => 'Bekræft afsendelse',
            'description' => 'Er du sikker på, at du vil sende denne e-mail?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Modtagere',
            'content' => 'Indhold',
            'attachments' => 'Vedhæftede filer',
        ],

        'fields' => [
            'from' => 'Fra',
            'to' => 'Til',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Skabelon',
            'subject' => 'Emne',
            'to_placeholder' => 'Indtast e-mailadresser',
            'cc_placeholder' => 'Indtast CC-adresser',
            'bcc_placeholder' => 'Indtast BCC-adresser',
            'auto_attached' => 'Automatisk vedhæftede filer',
            'auto_attached_none' => 'Ingen',
            'additional_attachments' => 'Yderligere vedhæftede filer',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Send e-mail',
        'modal_heading' => 'Skriv e-mail',
        'submit' => 'Send',

        'notifications' => [
            'sent' => 'E-mail sendt',
            'sent_body' => 'Sendt til: :recipients',
            'failed' => 'Kunne ikke sende e-mail',
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
            'background' => 'Baggrund og layout',
            'background_description' => 'Hovedstrukturfarver for e-maillayoutet.',
            'typography' => 'Typografi',
            'typography_description' => 'Farver til tekst og overskrifter.',
            'buttons' => 'Knapper',
            'buttons_description' => 'Stil for handlingsknapper.',
            'footer' => 'Sidefod',
            'footer_description' => 'Stil for sidefodområdet.',
            'preview' => 'Forhåndsvisning',
        ],

        'fields' => [
            'name' => 'Navn',
            'is_default' => 'Standardtema',
            'is_default_helper' => 'Standardtemaet anvendes på skabeloner, der ikke angiver et.',
            'page_background' => 'Sidebaggrund',
            'content_background' => 'Indholdsbaggrund',
            'border' => 'Kant',
            'headings' => 'Overskrifter',
            'body_text' => 'Brødtekst',
            'secondary_text' => 'Sekundær tekst',
            'links' => 'Links',
            'button_background' => 'Knapbaggrund',
            'button_text' => 'Knaptekst',
            'primary_accent' => 'Primær/Accent',
            'footer_background' => 'Sidefodsbaggrund',
            'footer_text' => 'Sidefodstekst',
        ],

        'columns' => [
            'primary' => 'Primær',
            'background' => 'Baggrund',
            'text' => 'Tekst',
            'button' => 'Knap',
            'default' => 'Standard',
            'templates' => 'Skabeloner',
            'updated_at' => 'Opdateret',
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
            'template' => 'Skabelon',
            'template_placeholder' => 'Brugerdefineret',
            'sent_by' => 'Sendt af',
            'subject' => 'Emne',
            'status' => 'Status',
            'sent_by_placeholder' => 'System',
            'related_to' => 'Relateret til',
            'sent_at' => 'Sendt',
        ],

        'filters' => [
            'from' => 'Fra',
            'until' => 'Til',
        ],

        'actions' => [
            'view' => 'Vis',
            'resend' => 'Gensend',
            'resend_description' => 'Dette sender en ny kopi af e-mailen til de oprindelige modtagere.',
        ],

        'preview' => [
            'from' => 'Fra:',
            'to' => 'Til:',
            'cc' => 'CC:',
            'template' => 'Skabelon:',
            'sent' => 'Sendt:',
            'sent_not_yet' => 'Endnu ikke',
            'status' => 'Status:',
            'no_body' => 'E-mailens indhold blev ikke gemt. Aktiver <code>logging.store_rendered_body</code> i indstillingerne for at gemme e-mailindhold.',
            'error' => 'Fejldetaljer',
        ],
        'notifications' => [
            'resent' => 'E-mail gensendt',
            'resend_failed' => 'Kunne ikke gensende e-mail',
        ],

        'errors' => [
            'no_rendered_body' => 'Kan ikke gensende: ingen gemt renderet indhold. Aktivér logging.store_rendered_body i indstillingerne.',
            'no_template' => 'Den oprindelige skabelon findes ikke længere.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Sendte e-mails',

        'columns' => [
            'to' => 'Til',
            'template' => 'Skabelon',
            'subject' => 'Emne',
            'status' => 'Status',
            'sent_by' => 'Sendt af',
            'sent_by_placeholder' => 'System',
            'sent_at' => 'Sendt',
        ],

        'actions' => [
            'view' => 'Vis',
            'resend' => 'Gensend',
            'resend_confirm' => 'Er du sikker på, at du vil gensende denne e-mail?',
        ],

        'notifications' => [
            'resent' => 'E-mail gensendt',
            'resend_failed' => 'Kunne ikke gensende',
        ],

        'empty' => [
            'heading' => 'Ingen e-mails sendt',
            'description' => 'E-mails sendt for denne post vil blive vist her.',
        ],

        'errors' => [
            'no_body' => 'Kan ikke gensende: ingen gemt renderet indhold eller skabelon.',
            'no_template' => 'Den oprindelige skabelon findes ikke længere.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'E-mailindstillinger',

        'tabs' => [
            'general' => 'Generelt',
            'branding' => 'Branding',
            'logging' => 'Logning',
            'attachments' => 'Vedhæftede filer',
            'auth_emails' => 'Auth-e-mails',
        ],

        'titles' => [
            'general' => 'E-mailskabelonindstillinger - Generelt',
            'branding' => 'E-mailskabelonindstillinger - Branding',
            'logging' => 'E-mailskabelonindstillinger - Logning',
            'attachments' => 'E-mailskabelonindstillinger - Vedhæftede filer',
            'auth_emails' => 'E-mailskabelonindstillinger - Auth-e-mails',
        ],

        'sections' => [
            'default_sender' => 'Standardafsender',
            'default_sender_description' => 'Standardafsenderadressen for alle e-mails sendt af pluginet.',
            'additional_senders' => 'Yderligere afsendere',
            'add_additional_senders' => 'Tilføj yderligere afsendere',
            'additional_senders_description' => 'Ekstra afsenderadresser, som brugere kan vælge ved e-mailskrivning.',
            'localization' => 'Lokalisering',
            'categories' => 'Skabelonkategorier',
            'logo' => 'Logo',
            'colors' => 'Farver',
            'footer_links' => 'Sidefod-links',
            'add_footer_links' => 'Tilføj sidefodlinks',
            'customer_service' => 'Kundeservice',
            'logging' => 'E-maillogning',
            'logging_description' => 'Styr, hvordan sendte e-mails registreres i databasen.',
            'cleanup' => 'Planlagt oprydning',
            'cleanup_description' => 'Slet automatisk gamle sendte e-mailposter efter en tidsplan.',
            'attachment_rules' => 'Regler for vedhæftede filer',
            'attachment_rules_description' => 'Konfigurér begrænsninger for vedhæftede filer i skrevne e-mails.',
            'auth_emails' => 'Auth-e-mail-tilsidesættelser',
            'auth_emails_description' => 'Tilsidesæt applikationens standard-autentificeringsmails med dine egne skabeloner.',
        ],

        'fields' => [
            'from_email' => 'Afsender-e-mail',
            'from_name' => 'Afsendernavn',
            'sender_email' => 'E-mail',
            'sender_name' => 'Visningsnavn',
            'sender_new' => 'Ny afsender',
            'default_locale' => 'Standardsprog',
            'default_locale_helper' => 'Standardsproget for nye skabeloner (f.eks. en, hu, de).',
            'languages' => 'Tilgængelige sprog',
            'language_code' => 'Kode',
            'language_display' => 'Visningsnavn',
            'language_flag' => 'Flagikon',
            'language_new' => 'Nyt sprog',
            'category_key' => 'Nøgle',
            'category_label' => 'Etiket',
            'category_new' => 'Ny kategori',
            'logo_url' => 'Logo-URL eller sti',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Absolut URL eller sti til dit e-maillogo.',
            'logo_width' => 'Bredde (px)',
            'logo_height' => 'Højde (px)',
            'content_width' => 'Indholdsbredde (px)',
            'primary_color' => 'Primærfarve',
            'footer_link_label' => 'Etiket',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Nyt link',
            'support_email' => 'Support-e-mail',
            'support_phone' => 'Supporttelefon',
            'enable_logging' => 'Aktivér logning',
            'enable_logging_helper' => 'Når deaktiveret oprettes ingen sendte e-mailposter.',
            'store_rendered_body' => 'Gem renderet indhold',
            'store_rendered_body_helper' => 'Gem den endelige HTML for hver sendt e-mail. Påkrævet til gensendelse og forhåndsvisning.',
            'retention_days' => 'Opbevaring (dage)',
            'retention_days_helper' => 'Slet automatisk sendte e-mailposter efter dette antal dage. Lad feltet stå tomt for at beholde dem for altid.',
            'cleanup_enabled' => 'Aktivér planlagt oprydning',
            'cleanup_enabled_helper' => 'Kør automatisk oprydningskommandoen efter en tidsplan.',
            'cleanup_frequency' => 'Oprydningsfrekvens',
            'max_file_size' => 'Maks. filstørrelse (MB)',
            'allowed_extensions' => 'Tilladte filendelser',
            'allowed_extensions_placeholder' => 'Tilføj filendelse (f.eks. pdf)',
            'allowed_extensions_helper' => 'Tilladte filendelser til upload.',
            'override_verification' => 'Tilsidesæt e-mailbekræftelse',
            'override_verification_helper' => 'Brug skabelonen "user-verify-email" i stedet for applikationens standard-bekræftelsesmail.',
            'override_password_reset' => 'Tilsidesæt nulstilling af adgangskode',
            'override_password_reset_helper' => 'Brug skabelonen "user-password-reset" i stedet for applikationens standard-nulstillingsmail.',
            'override_welcome' => 'Tilsidesæt velkomstmail',
            'override_welcome_helper' => 'Send en velkomstmail med skabelonen "user-welcome", når en ny bruger registrerer sig.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Alle rettigheder forbeholdes.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Kladde',
            2 => 'I kø',
            3 => 'Sendt',
            4 => 'Fejlet',
        ],

        'cleanup_frequency' => [
            1 => 'Dagligt',
            2 => 'Ugentligt',
            3 => 'Månedligt',
        ],
    ],

];
