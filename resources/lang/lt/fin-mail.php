<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'El. paštas',
        'templates' => 'Šablonai',
        'themes' => 'Temos',
        'sent-emails' => 'Išsiųsti laiškai',
        'settings' => 'Nustatymai',
    ],

    'models' => [
        'email_template' => 'El. pašto šablonas',
        'email_templates' => 'El. pašto šablonai',
        'email_theme' => 'El. pašto tema',
        'email_themes' => 'El. pašto temos',
        'sent_email' => 'Išsiųstas laiškas',
        'sent_emails' => 'Išsiųsti laiškai',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Turinys',
            'settings' => 'Nustatymai',
            'tokens' => 'Žetonai',
        ],

        'fields' => [
            'name' => 'Pavadinimas',
            'key' => 'Raktas',
            'key_helper' => 'Unikalus raktas naudojamas kode: pvz., "invoice-sent"',
            'category' => 'Kategorija',
            'subject' => 'Tema',
            'subject_helper' => 'Palaiko žetonus: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Antraštė',
            'preheader_helper' => 'Peržiūros tekstas rodomas el. pašto klientuose',
            'body' => 'Turinys',
            'theme' => 'Tema',
            'theme_placeholder' => 'Numatytoji tema',
            'is_active' => 'Aktyvus',
            'is_active_helper' => 'Neaktyvūs šablonai negali būti naudojami siuntimui',
            'tags' => 'Žymos',
            'tags_placeholder' => 'Pridėkite žymų organizavimui',
            'from_address' => 'Siuntėjo el. paštas',
            'from_name' => 'Siuntėjo vardas',
            'locale' => 'Kalba',
        ],

        'sections' => [
            'custom_sender' => 'Pasirinktinis siuntėjas',
            'custom_sender_description' => 'Perrašyti numatytąjį siuntėjo adresą šiam šablonui',
        ],

        'tokens' => [
            'label' => 'Galimi žetonai',
            'helper' => 'Dokumentuokite šiam šablonui galimus žetonus. Tai padeda redaktoriams žinoti, kokius kintamuosius jie gali naudoti.',
            'token' => 'Žetonas',
            'description' => 'Aprašymas',
            'example' => 'Pavyzdys',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Pilnas gavėjo vardas',
            'example_placeholder' => 'Jonas Jonaitis',
            'new_item' => 'Naujas žetonas',
        ],

        'columns' => [
            'locales' => 'Kalbos',
            'active' => 'Aktyvus',
            'locked' => 'Užrakintas',
            'sent' => 'Išsiųsta',
            'updated_at' => 'Atnaujinta',
        ],

        'actions' => [
            'preview' => 'Peržiūra',
            'send_test' => 'Siųsti testą',
            'send_test_field' => 'Siųsti kam',
            'send_test_locale' => 'Kalba',
            'compose' => 'Rašyti laišką',
            'version_history' => 'Versijų istorija',
            'back_to_templates' => 'Grįžti prie šablonų',
        ],

        'notifications' => [
            'test_sent' => 'Testinis laiškas išsiųstas!',
            'test_sent_body' => 'Išsiųsta adresu :email',
            'test_failed' => 'Nepavyko išsiųsti testinio laiško',
            'saved' => 'Šablonas išsaugotas',
            'saved_body' => 'Versijos momentinė kopija buvo išsaugota automatiškai.',
            'locked_skipped' => 'Užrakinti šablonai praleisti',
            'locked_skipped_body' => ':count užrakintų šablonų buvo praleista ir neištrinta.',
        ],

        'tooltips' => [
            'locked' => 'Šis šablonas užrakintas — raktas ir kategorija yra tik skaitymui, trynimas neleidžiamas.',
        ],

        'notices' => [
            'locked' => 'Šis šablonas užrakintas. Rakto ir kategorijos laukai negali būti keičiami.',
        ],

        'language_label' => 'Kalba: :locale',

        'replicate_suffix' => '(Kopija)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Rašyti laišką',
        'title_with_name' => 'Rašyti: :name',

        'sections' => [
            'recipients' => 'Gavėjai',
            'content' => 'Laiško turinys',
            'attachments' => 'Priedai',
            'tokens' => 'Galimi žetonai',
        ],

        'fields' => [
            'from' => 'Nuo',
            'to' => 'Kam',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Įveskite el. pašto adresus',
            'cc_placeholder' => 'CC adresai',
            'bcc_placeholder' => 'BCC adresai',
            'locale' => 'Kalba',
            'subject' => 'Tema',
            'preheader' => 'Antraštė',
            'body' => 'Turinys',
            'attach_files' => 'Prisegti failus',
            'preheader_helper' => 'Peržiūros tekstas rodomas el. pašto klientuose prieš atidarant',
            'no_tokens' => 'Šiam šablonui nėra dokumentuotų žetonų. Žetonai kaip {{ user.name }} bus pakeisti siunčiant per API/kodą.',
        ],

        'actions' => [
            'send' => 'Siųsti laišką',
            'preview' => 'Peržiūra',
        ],

        'confirm' => [
            'heading' => 'Patvirtinti siuntimą',
            'description' => 'Ar tikrai norite išsiųsti šį laišką?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Gavėjai',
            'content' => 'Turinys',
            'attachments' => 'Priedai',
        ],

        'fields' => [
            'from' => 'Nuo',
            'to' => 'Kam',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Šablonas',
            'subject' => 'Tema',
            'to_placeholder' => 'Įveskite el. pašto adresus',
            'cc_placeholder' => 'Įveskite CC adresus',
            'bcc_placeholder' => 'Įveskite BCC adresus',
            'auto_attached' => 'Automatiškai prisegti failai',
            'auto_attached_none' => 'Nėra',
            'additional_attachments' => 'Papildomi priedai',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Siųsti laišką',
        'modal_heading' => 'Rašyti laišką',
        'submit' => 'Siųsti',

        'notifications' => [
            'sent' => 'Laiškas sėkmingai išsiųstas',
            'sent_body' => 'Išsiųsta: :recipients',
            'failed' => 'Nepavyko išsiųsti laiško',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Temos informacija',
            'background' => 'Fonas ir išdėstymas',
            'background_description' => 'Pagrindinės struktūrinės spalvos el. laiško išdėstymui.',
            'typography' => 'Tipografija',
            'typography_description' => 'Teksto ir antraščių spalvos.',
            'buttons' => 'Mygtukai',
            'buttons_description' => 'Raginimo veikti mygtukų stilius.',
            'footer' => 'Poraštė',
            'footer_description' => 'Poraštės srities stilius.',
            'preview' => 'Peržiūra',
        ],

        'fields' => [
            'name' => 'Pavadinimas',
            'is_default' => 'Numatytoji tema',
            'is_default_helper' => 'Numatytoji tema taikoma šablonams, kuriems nenurodyta tema.',
            'page_background' => 'Puslapio fonas',
            'content_background' => 'Turinio fonas',
            'border' => 'Kraštinė',
            'headings' => 'Antraštės',
            'body_text' => 'Pagrindinis tekstas',
            'secondary_text' => 'Antrinis tekstas',
            'links' => 'Nuorodos',
            'button_background' => 'Mygtuko fonas',
            'button_text' => 'Mygtuko tekstas',
            'primary_accent' => 'Pagrindinis/Akcentas',
            'footer_background' => 'Poraštės fonas',
            'footer_text' => 'Poraštės tekstas',
        ],

        'columns' => [
            'primary' => 'Pagrindinis',
            'background' => 'Fonas',
            'text' => 'Tekstas',
            'button' => 'Mygtukas',
            'default' => 'Numatytasis',
            'templates' => 'Šablonai',
            'updated_at' => 'Atnaujinta',
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
            'to' => 'Kam',
            'template' => 'Šablonas',
            'template_placeholder' => 'Pasirinktinis',
            'sent_by' => 'Siuntėjas',
            'subject' => 'Tema',
            'status' => 'Būsena',
            'sent_by_placeholder' => 'Sistema',
            'related_to' => 'Susiję su',
            'sent_at' => 'Išsiųsta',
        ],

        'filters' => [
            'from' => 'Nuo',
            'until' => 'Iki',
        ],

        'actions' => [
            'view' => 'Peržiūrėti',
            'resend' => 'Siųsti iš naujo',
            'resend_description' => 'Bus išsiųsta nauja laiško kopija pradiniams gavėjams.',
        ],

        'notifications' => [
            'resent' => 'Laiškas sėkmingai išsiųstas iš naujo',
            'resend_failed' => 'Nepavyko išsiųsti laiško iš naujo',
        ],

        'errors' => [
            'no_rendered_body' => 'Negalima siųsti iš naujo: nėra išsaugoto sugeneruoto turinio. Įjunkite logging.store_rendered_body nustatymuose.',
            'no_template' => 'Pradinis šablonas nebeegzistuoja.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Išsiųsti laiškai',

        'columns' => [
            'to' => 'Kam',
            'template' => 'Šablonas',
            'subject' => 'Tema',
            'status' => 'Būsena',
            'sent_by' => 'Siuntėjas',
            'sent_by_placeholder' => 'Sistema',
            'sent_at' => 'Išsiųsta',
        ],

        'actions' => [
            'view' => 'Peržiūrėti',
            'resend' => 'Siųsti iš naujo',
            'resend_confirm' => 'Ar tikrai norite iš naujo išsiųsti šį laišką?',
        ],

        'notifications' => [
            'resent' => 'Laiškas sėkmingai išsiųstas iš naujo',
            'resend_failed' => 'Nepavyko išsiųsti iš naujo',
        ],

        'empty' => [
            'heading' => 'Nėra išsiųstų laiškų',
            'description' => 'Šiam įrašui išsiųsti laiškai bus rodomi čia.',
        ],

        'errors' => [
            'no_body' => 'Negalima siųsti iš naujo: nėra išsaugoto sugeneruoto turinio arba šablono.',
            'no_template' => 'Pradinis šablonas nebeegzistuoja.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'El. pašto nustatymai',

        'tabs' => [
            'general' => 'Bendri',
            'branding' => 'Prekės ženklas',
            'logging' => 'Registravimas',
            'attachments' => 'Priedai',
            'auth_emails' => 'Autentifikacijos laiškai',
        ],

        'titles' => [
            'general' => 'El. pašto šablonų nustatymai - Bendri',
            'branding' => 'El. pašto šablonų nustatymai - Prekės ženklas',
            'logging' => 'El. pašto šablonų nustatymai - Registravimas',
            'attachments' => 'El. pašto šablonų nustatymai - Priedai',
            'auth_emails' => 'El. pašto šablonų nustatymai - Autentifikacijos laiškai',
        ],

        'sections' => [
            'default_sender' => 'Numatytasis siuntėjas',
            'default_sender_description' => 'Numatytasis "Nuo" adresas visiems plugino siunčiamiems laiškams.',
            'additional_senders' => 'Papildomi siuntėjai',
            'additional_senders_description' => 'Papildomi "Nuo" adresai, kuriuos vartotojai gali pasirinkti rašydami laišką.',
            'localization' => 'Lokalizacija',
            'categories' => 'Šablonų kategorijos',
            'logo' => 'Logotipas',
            'colors' => 'Spalvos',
            'footer_links' => 'Poraštės nuorodos',
            'customer_service' => 'Klientų aptarnavimas',
            'logging' => 'El. laiškų registravimas',
            'logging_description' => 'Valdykite, kaip išsiųsti laiškai registruojami duomenų bazėje.',
            'cleanup' => 'Suplanuotas valymas',
            'cleanup_description' => 'Automatiškai ištrinti senus išsiųstų laiškų įrašus pagal grafiką.',
            'attachment_rules' => 'Priedų taisyklės',
            'attachment_rules_description' => 'Konfigūruoti failų priedų limitus rašomiems laiškams.',
            'auth_emails' => 'Autentifikacijos laiškų perrašymas',
            'auth_emails_description' => 'Pakeiskite numatytuosius programos autentifikacijos laiškus savo pasirinktiniais šablonais.',
        ],

        'fields' => [
            'from_email' => 'Siuntėjo el. paštas',
            'from_name' => 'Siuntėjo vardas',
            'sender_email' => 'El. paštas',
            'sender_name' => 'Rodomas vardas',
            'sender_new' => 'Naujas siuntėjas',
            'default_locale' => 'Numatytoji kalba',
            'default_locale_helper' => 'Numatytoji kalba naujiems šablonams (pvz., en, hu, de).',
            'languages' => 'Galimos kalbos',
            'language_code' => 'Kodas',
            'language_display' => 'Rodomas pavadinimas',
            'language_flag' => 'Vėliavos piktograma',
            'language_new' => 'Nauja kalba',
            'category_key' => 'Raktas',
            'category_label' => 'Etiketė',
            'category_new' => 'Nauja kategorija',
            'logo_url' => 'Logotipo URL arba kelias',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Absoliutus URL arba kelias iki jūsų el. pašto logotipo.',
            'logo_width' => 'Plotis (px)',
            'logo_height' => 'Aukštis (px)',
            'content_width' => 'Turinio plotis (px)',
            'primary_color' => 'Pagrindinė spalva',
            'footer_link_label' => 'Etiketė',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Nauja nuoroda',
            'support_email' => 'Palaikymo el. paštas',
            'support_phone' => 'Palaikymo telefonas',
            'enable_logging' => 'Įjungti registravimą',
            'enable_logging_helper' => 'Kai išjungta, išsiųstų laiškų įrašai nebus kuriami.',
            'store_rendered_body' => 'Saugoti sugeneruotą turinį',
            'store_rendered_body_helper' => 'Išsaugoti galutinį kiekvieno išsiųsto laiško HTML. Reikalinga pakartotinio siuntimo ir peržiūros funkcijoms.',
            'retention_days' => 'Saugojimas (dienomis)',
            'retention_days_helper' => 'Automatiškai ištrinti išsiųstų laiškų įrašus po nurodyto dienų skaičiaus. Palikite tuščią, kad saugotumėte amžinai.',
            'cleanup_enabled' => 'Įjungti suplanuotą valymą',
            'cleanup_enabled_helper' => 'Automatiškai vykdyti valymo komandą pagal grafiką.',
            'cleanup_frequency' => 'Valymo dažnumas',
            'max_file_size' => 'Maks. failo dydis (MB)',
            'allowed_extensions' => 'Leidžiami failų plėtiniai',
            'allowed_extensions_placeholder' => 'Pridėti plėtinį (pvz., pdf)',
            'allowed_extensions_helper' => 'Failų plėtiniai, leidžiami įkelti.',
            'override_verification' => 'Perrašyti patvirtinimo laišką',
            'override_verification_helper' => 'Naudoti "user-verify-email" šabloną vietoj numatytojo programos patvirtinimo laiško.',
            'override_password_reset' => 'Perrašyti slaptažodžio atkūrimą',
            'override_password_reset_helper' => 'Naudoti "user-password-reset" šabloną vietoj numatytojo programos slaptažodžio atkūrimo laiško.',
            'override_welcome' => 'Perrašyti pasisveikinimo laišką',
            'override_welcome_helper' => 'Siųsti pasisveikinimo laišką naudojant "user-welcome" šabloną, kai užsiregistruoja naujas vartotojas.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Visos teisės saugomos.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Juodraštis',
            2 => 'Eilėje',
            3 => 'Išsiųsta',
            4 => 'Nepavyko',
        ],

        'cleanup_frequency' => [
            1 => 'Kasdien',
            2 => 'Kas savaitę',
            3 => 'Kas mėnesį',
        ],
    ],

];
