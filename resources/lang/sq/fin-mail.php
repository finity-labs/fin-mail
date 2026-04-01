<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'Email',
        'templates' => 'Shabllonet',
        'themes' => 'Temat',
        'sent-emails' => 'Emailet e Derguara',
        'settings' => 'Cilesimet',
    ],

    'models' => [
        'email_template' => 'Shablloni i emailit',
        'email_templates' => 'Shabllonet e emailit',
        'email_theme' => 'Tema e emailit',
        'email_themes' => 'Temat e emailit',
        'sent_email' => 'Email i derguar',
        'sent_emails' => 'Emailet e derguara',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Permbajtja',
            'settings' => 'Cilesimet',
            'tokens' => 'Tokenat',
        ],

        'fields' => [
            'name' => 'Emri',
            'key' => 'Celesi',
            'key_helper' => 'Celes unik i perdorur ne kod: p.sh., "invoice-sent"',
            'category' => 'Kategoria',
            'subject' => 'Tema',
            'subject_helper' => 'Mbeshtet tokenat: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Paratitull',
            'preheader_helper' => 'Tekst parapamje i shfaqur ne klientet e emailit',
            'body' => 'Trupi',
            'theme' => 'Tema',
            'theme_placeholder' => 'Tema e parazgjedhur',
            'is_active' => 'Aktiv',
            'is_active_helper' => 'Shabllonet joaktive nuk mund te perdoren per dergim',
            'tags' => 'Etiketat',
            'tags_placeholder' => 'Shtoni etiketa per organizim',
            'from_address' => 'Emaili i derguesit',
            'from_name' => 'Emri i derguesit',
            'locale' => 'Gjuha',
        ],

        'sections' => [
            'custom_sender' => 'Dergues i Personalizuar',
            'custom_sender_description' => 'Mbivendos adresen e parazgjedhur te derguesit per kete shabllon',
        ],

        'tokens' => [
            'label' => 'Tokenat e Disponueshme',
            'helper' => 'Dokumentoni tokenat e disponueshme per kete shabllon. Kjo i ndihmon redaktoret te dine se cilat variabla mund te perdorin.',
            'token' => 'Token',
            'description' => 'Pershkrimi',
            'example' => 'Shembulli',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Emri i plote i marresit',
            'example_placeholder' => 'Arben Hoxha',
            'new_item' => 'Token i Ri',
        ],

        'blocks' => [
            'button' => 'Butoni',
            'button_heading' => 'Fut butonin',
            'button_label' => 'Teksti i butonit',
            'button_url' => 'URL',
            'button_align' => 'Rreshtimi',
            'align_left' => 'Majtas',
            'align_center' => 'Qendër',
            'align_right' => 'Djathtas',
            'button_default_label' => 'Kliko këtu',
        ],

        'columns' => [
            'locales' => 'Gjuhet',
            'active' => 'Aktiv',
            'locked' => 'I bllokuar',
            'sent' => 'Te derguara',
            'updated_at' => 'Perditesuar',
        ],

        'actions' => [
            'preview' => 'Parapamje',
            'send_test' => 'Dergo Test',
            'send_test_field' => 'Dergo tek',
            'send_test_locale' => 'Gjuha',
            'compose' => 'Shkruaj Email',
            'version_history' => 'Historiku i Versioneve',
            'back_to_templates' => 'Kthehu tek Shabllonet',
        ],

        'notifications' => [
            'test_sent' => 'Emaili testues u dergua!',
            'test_sent_body' => 'U dergua tek :email',
            'test_failed' => 'Dergimi i emailit testues deshtoi',
            'saved' => 'Shablloni u ruajt',
            'saved_body' => 'Nje kopje e versionit u ruajt automatikisht.',
            'locked_skipped' => 'Shabllonet e bllokuara u anashkaluan',
            'locked_skipped_body' => ':count shabllon(e) te bllokuara u anashkaluan dhe nuk u fshin.',
        ],

        'tooltips' => [
            'locked' => 'Ky shabllon eshte i bllokuar — celesi dhe kategoria jane vetem per lexim, fshirja eshte e parandaluar.',
        ],

        'versioning' => [
            'date' => 'Data',
            'by' => 'Nga',
            'preview' => 'Parapamje',
            'restore' => 'Rikthe',
            'restore_confirm' => 'A jeni i sigurt që dëshironi të riktheni versionin :version? Përmbajtja aktuale do të ruhet fillimisht si version i ri.',
            'restored' => 'Versioni :version u rikthye.',
            'empty' => 'Nuk ka histori versionesh të disponueshme.',
        ],

        'notices' => [
            'locked' => 'Ky shabllon eshte i bllokuar. Fushat e celesit dhe kategorise nuk mund te ndryshohen.',
        ],

        'language_label' => 'Gjuha: :locale',

        'replicate_suffix' => '(Kopje)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Shkruaj Email',
        'title_with_name' => 'Shkruaj: :name',

        'sections' => [
            'recipients' => 'Marresit',
            'content' => 'Permbajtja e Emailit',
            'attachments' => 'Bashkengjitjet',
            'tokens' => 'Tokenat e Disponueshme',
        ],

        'fields' => [
            'from' => 'Nga',
            'to' => 'Per',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Vendosni adresat e emailit',
            'cc_placeholder' => 'Adresat CC',
            'bcc_placeholder' => 'Adresat BCC',
            'locale' => 'Gjuha',
            'subject' => 'Tema',
            'preheader' => 'Paratitull',
            'body' => 'Trupi',
            'attach_files' => 'Bashkengjit Skedare',
            'preheader_helper' => 'Tekst parapamje i shfaqur ne klientet e emailit para hapjes',
            'no_tokens' => 'Nuk ka tokena te dokumentuara per kete shabllon. Tokenat si {{ user.name }} do te zevendesohen kur dergohen nepermjet API/kodit.',
        ],

        'actions' => [
            'send' => 'Dergo Emailin',
            'preview' => 'Parapamje',
        ],

        'confirm' => [
            'heading' => 'Konfirmo Dergimin',
            'description' => 'A jeni te sigurt qe doni ta dergoni kete email?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Marresit',
            'content' => 'Permbajtja',
            'attachments' => 'Bashkengjitjet',
        ],

        'fields' => [
            'from' => 'Nga',
            'to' => 'Per',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Shablloni',
            'subject' => 'Tema',
            'to_placeholder' => 'Vendosni adresat e emailit',
            'cc_placeholder' => 'Vendosni adresat CC',
            'bcc_placeholder' => 'Vendosni adresat BCC',
            'auto_attached' => 'Skedare te bashkengjituar automatikisht',
            'auto_attached_none' => 'Asnje',
            'additional_attachments' => 'Bashkengjitje Shtese',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Dergo Email',
        'modal_heading' => 'Shkruaj Email',
        'submit' => 'Dergo',

        'notifications' => [
            'sent' => 'Emaili u dergua me sukses',
            'sent_body' => 'U dergua tek: :recipients',
            'failed' => 'Dergimi i emailit deshtoi',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Detajet e Temes',
            'background' => 'Sfondi dhe Paraqitja',
            'background_description' => 'Ngjyrat kryesore strukturore per paraqitjen e emailit.',
            'typography' => 'Tipografia',
            'typography_description' => 'Ngjyrat per tekstin dhe titujt.',
            'buttons' => 'Butonat',
            'buttons_description' => 'Stilimi i butonave te veprimit.',
            'footer' => 'Fundi i faqes',
            'footer_description' => 'Stilimi i zones se fundit te faqes.',
            'preview' => 'Parapamje',
        ],

        'fields' => [
            'name' => 'Emri',
            'is_default' => 'Tema e Parazgjedhur',
            'is_default_helper' => 'Tema e parazgjedhur aplikohet per shabllonet qe nuk specifikojne nje teme.',
            'page_background' => 'Sfondi i Faqes',
            'content_background' => 'Sfondi i Permbajtjes',
            'border' => 'Korniza',
            'headings' => 'Titujt',
            'body_text' => 'Teksti i Trupit',
            'secondary_text' => 'Teksti Dytesor',
            'links' => 'Lidhjet',
            'button_background' => 'Sfondi i Butonit',
            'button_text' => 'Teksti i Butonit',
            'primary_accent' => 'Primar/Theksim',
            'footer_background' => 'Sfondi i Fundit',
            'footer_text' => 'Teksti i Fundit',
        ],

        'columns' => [
            'primary' => 'Primar',
            'background' => 'Sfond',
            'text' => 'Tekst',
            'button' => 'Buton',
            'default' => 'Parazgjedhur',
            'templates' => 'Shabllonet',
            'updated_at' => 'Perditesuar',
        ],

        'replicate_suffix' => '(Kopje)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Per',
            'template' => 'Shablloni',
            'template_placeholder' => 'I personalizuar',
            'sent_by' => 'Derguar Nga',
            'subject' => 'Tema',
            'status' => 'Statusi',
            'sent_by_placeholder' => 'Sistemi',
            'related_to' => 'Lidhur Me',
            'sent_at' => 'Derguar',
        ],

        'filters' => [
            'from' => 'Nga',
            'until' => 'Deri',
        ],

        'actions' => [
            'view' => 'Shiko',
            'resend' => 'Ridergo',
            'resend_description' => 'Kjo do te dergoje nje kopje te re te emailit tek marresit origjinale.',
        ],


        'preview' => [
            'from' => 'Nga:',
            'to' => 'Për:',
            'cc' => 'CC:',
            'template' => 'Shablloni:',
            'sent' => 'Dërguar:',
            'sent_not_yet' => 'Ende jo',
            'status' => 'Statusi:',
            'no_body' => 'Trupi i emailit nuk u ruajt. Aktivizo <code>logging.store_rendered_body</code> te cilësimet për të ruajtur përmbajtjen e emailit.',
            'error' => 'Detajet e gabimit'
        ],
        'notifications' => [
            'resent' => 'Emaili u ridergua me sukses',
            'resend_failed' => 'Ridergimi i emailit deshtoi',
        ],

        'errors' => [
            'no_rendered_body' => 'Nuk mund te ridergohet: trupi i renderuar nuk eshte i ruajtur. Aktivizoni logging.store_rendered_body ne cilesimet.',
            'no_template' => 'Shablloni origjinal nuk ekziston me.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Emailet e Derguara',

        'columns' => [
            'to' => 'Per',
            'template' => 'Shablloni',
            'subject' => 'Tema',
            'status' => 'Statusi',
            'sent_by' => 'Derguar Nga',
            'sent_by_placeholder' => 'Sistemi',
            'sent_at' => 'Derguar',
        ],

        'actions' => [
            'view' => 'Shiko',
            'resend' => 'Ridergo',
            'resend_confirm' => 'A jeni te sigurt qe doni ta ridergoni kete email?',
        ],

        'notifications' => [
            'resent' => 'Emaili u ridergua me sukses',
            'resend_failed' => 'Ridergimi deshtoi',
        ],

        'empty' => [
            'heading' => 'Nuk ka emaile te derguara',
            'description' => 'Emailet e derguara per kete rekord do te shfaqen ketu.',
        ],

        'errors' => [
            'no_body' => 'Nuk mund te ridergohet: trupi i renderuar ose shablloni nuk eshte i ruajtur.',
            'no_template' => 'Shablloni origjinal nuk ekziston me.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Cilesimet e Emailit',

        'tabs' => [
            'general' => 'Te Pergjithshme',
            'branding' => 'Marka',
            'logging' => 'Regjistrimi',
            'attachments' => 'Bashkengjitjet',
            'auth_emails' => 'Emailet e Autentikimit',
        ],

        'titles' => [
            'general' => 'Cilesimet e Shablloneve te Emailit - Te Pergjithshme',
            'branding' => 'Cilesimet e Shablloneve te Emailit - Marka',
            'logging' => 'Cilesimet e Shablloneve te Emailit - Regjistrimi',
            'attachments' => 'Cilesimet e Shablloneve te Emailit - Bashkengjitjet',
            'auth_emails' => 'Cilesimet e Shablloneve te Emailit - Emailet e Autentikimit',
        ],

        'sections' => [
            'default_sender' => 'Derguesi i Parazgjedhur',
            'default_sender_description' => 'Adresa e parazgjedhur "Nga" per te gjithe emailet e derguara nga shtojca.',
            'additional_senders' => 'Derguesit Shtese',
            'add_additional_senders' => 'Shto dërgues shtesë',
            'additional_senders_description' => 'Adresa shtese "Nga" qe perdoruesit mund te zgjedhin kur shkruajne emaile.',
            'localization' => 'Lokalizimi',
            'categories' => 'Kategorite e Shablloneve',
            'logo' => 'Logoja',
            'colors' => 'Ngjyrat',
            'footer_links' => 'Lidhjet e Fundit',
            'add_footer_links' => 'Shto lidhje në fund të faqes',
            'customer_service' => 'Sherbimi ndaj Klientit',
            'logging' => 'Regjistrimi i Emaileve',
            'logging_description' => 'Kontrolloni se si regjistrohen emailet e derguara ne databazen.',
            'cleanup' => 'Pastrimi i Planifikuar',
            'cleanup_description' => 'Fshini automatikisht regjistrat e vjetra te emaileve te derguara sipas nje orari.',
            'attachment_rules' => 'Rregullat e Bashkengjitjeve',
            'attachment_rules_description' => 'Konfiguroni kufizimet per bashkengjitjet e skedareve ne emailet e shkruara.',
            'auth_emails' => 'Mbivendosja e Emaileve te Autentikimit',
            'auth_emails_description' => 'Zevendesoni emailet e parazgjedhura te autentikimit te aplikacionit me shabllonet tuaja te personalizuara.',
        ],

        'fields' => [
            'from_email' => 'Emaili i Derguesit',
            'from_name' => 'Emri i Derguesit',
            'sender_email' => 'Email',
            'sender_name' => 'Emri i Shfaqur',
            'sender_new' => 'Dergues i Ri',
            'default_locale' => 'Gjuha e Parazgjedhur',
            'default_locale_helper' => 'Gjuha e parazgjedhur per shabllonet e reja (p.sh., en, hu, de).',
            'languages' => 'Gjuhet e Disponueshme',
            'language_code' => 'Kodi',
            'language_display' => 'Emri i Shfaqur',
            'language_flag' => 'Ikona e Flamurit',
            'language_new' => 'Gjuhe e Re',
            'category_key' => 'Celesi',
            'category_label' => 'Etiketa',
            'category_new' => 'Kategori e Re',
            'logo_url' => 'URL ose Shteg i Logos',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL absolute ose shteg per logon e emailit.',
            'logo_width' => 'Gjeresia (px)',
            'logo_height' => 'Lartesia (px)',
            'content_width' => 'Gjeresia e Permbajtjes (px)',
            'primary_color' => 'Ngjyra Primare',
            'footer_link_label' => 'Etiketa',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Lidhje e Re',
            'support_email' => 'Email Mbeshtetje',
            'support_phone' => 'Telefon Mbeshtetje',
            'enable_logging' => 'Aktivizo Regjistrimin',
            'enable_logging_helper' => 'Kur eshte i caktivizuar, nuk do te krijohen regjistra te emaileve te derguara.',
            'store_rendered_body' => 'Ruaj Trupin e Renderuar',
            'store_rendered_body_helper' => 'Ruaj HTML-ne perfundimtare te cdo emaili te derguar. E nevojshme per funksionet e ridergimit dhe parapamjes.',
            'retention_days' => 'Mbajtja (dite)',
            'retention_days_helper' => 'Fshi automatikisht regjistrat e emaileve te derguara pas ketij numri ditesh. Lini bosh per t\'i mbajtur pergjithmone.',
            'cleanup_enabled' => 'Aktivizo Pastrimin e Planifikuar',
            'cleanup_enabled_helper' => 'Ekzekutoni automatikisht komanden e pastrimit sipas nje orari.',
            'cleanup_frequency' => 'Frekuenca e Pastrimit',
            'max_file_size' => 'Madhesia Maksimale e Skedarit (MB)',
            'allowed_extensions' => 'Zgjerimet e Lejuara te Skedareve',
            'allowed_extensions_placeholder' => 'Shtoni zgjerim (p.sh., pdf)',
            'allowed_extensions_helper' => 'Zgjerimet e skedareve te lejuara per ngarkim.',
            'override_verification' => 'Mbivendos Emailin e Verifikimit',
            'override_verification_helper' => 'Perdorni shabllonin "user-verify-email" ne vend te emailit te parazgjedhur te verifikimit te aplikacionit.',
            'override_password_reset' => 'Mbivendos Rivendosjen e Fjalekalimit',
            'override_password_reset_helper' => 'Perdorni shabllonin "user-password-reset" ne vend te emailit te parazgjedhur te rivendosjes se fjalekalimit te aplikacionit.',
            'override_welcome' => 'Mbivendos Emailin e Mireseardhjes',
            'override_welcome_helper' => 'Dergoni nje email mireseardhje duke perdorur shabllonin "user-welcome" kur nje perdorues i ri regjistrohet.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Te gjitha te drejtat e rezervuara.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Draft',
            2 => 'Ne Radhe',
            3 => 'Derguar',
            4 => 'Deshtuar',
        ],

        'cleanup_frequency' => [
            1 => 'Cdo Dite',
            2 => 'Cdo Jave',
            3 => 'Cdo Muaj',
        ],
    ],

];
