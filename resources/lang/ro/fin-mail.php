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
        'templates' => 'Sabloane',
        'themes' => 'Teme',
        'sent-emails' => 'Emailuri Trimise',
        'settings' => 'Setari',
    ],

    'models' => [
        'email_template' => 'Sablon de email',
        'email_templates' => 'Sabloane de email',
        'email_theme' => 'Tema de email',
        'email_themes' => 'Teme de email',
        'sent_email' => 'Email trimis',
        'sent_emails' => 'Emailuri trimise',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Continut',
            'settings' => 'Setari',
            'tokens' => 'Tokenuri',
        ],

        'fields' => [
            'name' => 'Nume',
            'key' => 'Cheie',
            'key_helper' => 'Cheie unica folosita in cod: ex., "invoice-sent"',
            'category' => 'Categorie',
            'subject' => 'Subiect',
            'subject_helper' => 'Suporta tokenuri: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Preheader',
            'preheader_helper' => 'Text de previzualizare afisat in clientii de email',
            'body' => 'Continut',
            'theme' => 'Tema',
            'theme_placeholder' => 'Tema implicita',
            'is_active' => 'Activ',
            'is_active_helper' => 'Sabloanele inactive nu pot fi folosite pentru trimitere',
            'tags' => 'Etichete',
            'tags_placeholder' => 'Adaugati etichete pentru organizare',
            'from_address' => 'Email Expeditor',
            'from_name' => 'Nume Expeditor',
            'locale' => 'Limba',
        ],

        'sections' => [
            'custom_sender' => 'Expeditor Personalizat',
            'custom_sender_description' => 'Suprascrie adresa de expeditor implicita pentru acest sablon',
        ],

        'tokens' => [
            'label' => 'Tokenuri Disponibile',
            'helper' => 'Documentati tokenurile disponibile pentru acest sablon. Aceasta ii ajuta pe editori sa stie ce variabile pot folosi.',
            'token' => 'Token',
            'description' => 'Descriere',
            'example' => 'Exemplu',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Numele complet al destinatarului',
            'example_placeholder' => 'Ion Popescu',
            'new_item' => 'Token Nou',
        ],

        'blocks' => [
            'button' => 'Buton',
            'button_heading' => 'Inserare buton',
            'button_label' => 'Text buton',
            'button_url' => 'URL',
            'button_align' => 'Aliniere',
            'align_left' => 'Stânga',
            'align_center' => 'Centru',
            'align_right' => 'Dreapta',
            'button_default_label' => 'Clic aici',
        ],

        'columns' => [
            'locales' => 'Limbi',
            'active' => 'Activ',
            'locked' => 'Blocat',
            'sent' => 'Trimise',
            'updated_at' => 'Actualizat',
        ],

        'actions' => [
            'preview' => 'Previzualizare',
            'send_test' => 'Trimite Test',
            'send_test_field' => 'Trimite catre',
            'send_test_locale' => 'Limba',
            'compose' => 'Compune Email',
            'version_history' => 'Istoric Versiuni',
            'back_to_templates' => 'Inapoi la Sabloane',
        ],

        'notifications' => [
            'test_sent' => 'Email de test trimis!',
            'test_sent_body' => 'Trimis catre :email',
            'test_failed' => 'Trimiterea emailului de test a esuat',
            'saved' => 'Sablon salvat',
            'saved_body' => 'O versiune a fost salvata automat.',
            'locked_skipped' => 'Sabloane blocate omise',
            'locked_skipped_body' => ':count sablon(e) blocat(e) au fost omise si nu au fost sterse.',
        ],

        'tooltips' => [
            'locked' => 'Acest sablon este blocat — cheia si categoria sunt doar pentru citire, stergerea este impiedicata.',
        ],

        'versioning' => [
            'date' => 'Data',
            'by' => 'De',
            'preview' => 'Previzualizare',
            'restore' => 'Restaurare',
            'restore_confirm' => 'Sunteți sigur că doriți să restaurați versiunea :version? Conținutul actual va fi salvat mai întâi ca versiune nouă.',
            'restored' => 'Versiunea :version a fost restaurată.',
            'empty' => 'Nu există istoric de versiuni.',
        ],

        'notices' => [
            'locked' => 'Acest sablon este blocat. Campurile cheie si categorie nu pot fi modificate.',
        ],

        'language_label' => 'Limba: :locale',

        'replicate_suffix' => '(Copie)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Compune Email',
        'title_with_name' => 'Compune: :name',

        'sections' => [
            'recipients' => 'Destinatari',
            'content' => 'Continut Email',
            'attachments' => 'Atasamente',
            'tokens' => 'Tokenuri Disponibile',
        ],

        'fields' => [
            'from' => 'De la',
            'to' => 'Catre',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Introduceti adrese de email',
            'cc_placeholder' => 'Adrese CC',
            'bcc_placeholder' => 'Adrese BCC',
            'locale' => 'Limba',
            'subject' => 'Subiect',
            'preheader' => 'Preheader',
            'body' => 'Continut',
            'attach_files' => 'Ataseaza Fisiere',
            'preheader_helper' => 'Text de previzualizare afisat in clientii de email inainte de deschidere',
            'no_tokens' => 'Nu exista tokenuri documentate pentru acest sablon. Tokenurile precum {{ user.name }} vor fi inlocuite la trimiterea prin API/cod.',
        ],

        'actions' => [
            'send' => 'Trimite Email',
            'preview' => 'Previzualizare',
        ],

        'confirm' => [
            'heading' => 'Confirma Trimiterea',
            'description' => 'Sunteti sigur ca doriti sa trimiteti acest email?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Destinatari',
            'content' => 'Continut',
            'attachments' => 'Atasamente',
        ],

        'fields' => [
            'from' => 'De la',
            'to' => 'Catre',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Sablon',
            'subject' => 'Subiect',
            'to_placeholder' => 'Introduceti adrese de email',
            'cc_placeholder' => 'Introduceti adrese CC',
            'bcc_placeholder' => 'Introduceti adrese BCC',
            'auto_attached' => 'Fisiere atasate automat',
            'auto_attached_none' => 'Niciunul',
            'additional_attachments' => 'Atasamente Suplimentare',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Trimite Email',
        'modal_heading' => 'Compune Email',
        'submit' => 'Trimite',

        'notifications' => [
            'sent' => 'Email trimis cu succes',
            'sent_body' => 'Trimis catre: :recipients',
            'failed' => 'Trimiterea emailului a esuat',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Detalii Tema',
            'background' => 'Fundal si Aspect',
            'background_description' => 'Culorile structurale principale pentru aspectul emailului.',
            'typography' => 'Tipografie',
            'typography_description' => 'Culori pentru text si titluri.',
            'buttons' => 'Butoane',
            'buttons_description' => 'Stilizarea butoanelor de actiune.',
            'footer' => 'Subsol',
            'footer_description' => 'Stilizarea zonei de subsol.',
            'preview' => 'Previzualizare',
        ],

        'fields' => [
            'name' => 'Nume',
            'is_default' => 'Tema Implicita',
            'is_default_helper' => 'Tema implicita este aplicata sabloanelor care nu specifica una.',
            'page_background' => 'Fundal Pagina',
            'content_background' => 'Fundal Continut',
            'border' => 'Contur',
            'headings' => 'Titluri',
            'body_text' => 'Text Principal',
            'secondary_text' => 'Text Secundar',
            'links' => 'Linkuri',
            'button_background' => 'Fundal Buton',
            'button_text' => 'Text Buton',
            'primary_accent' => 'Principal/Accent',
            'footer_background' => 'Fundal Subsol',
            'footer_text' => 'Text Subsol',
        ],

        'columns' => [
            'primary' => 'Principal',
            'background' => 'Fundal',
            'text' => 'Text',
            'button' => 'Buton',
            'default' => 'Implicit',
            'templates' => 'Sabloane',
            'updated_at' => 'Actualizat',
        ],

        'replicate_suffix' => '(Copie)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Catre',
            'template' => 'Sablon',
            'template_placeholder' => 'Personalizat',
            'sent_by' => 'Trimis De',
            'subject' => 'Subiect',
            'status' => 'Stare',
            'sent_by_placeholder' => 'Sistem',
            'related_to' => 'Legat De',
            'sent_at' => 'Trimis',
        ],

        'filters' => [
            'from' => 'De la',
            'until' => 'Pana la',
        ],

        'actions' => [
            'view' => 'Vizualizare',
            'resend' => 'Retrimite',
            'resend_description' => 'Aceasta va trimite o noua copie a emailului catre destinatarii originali.',
        ],


        'preview' => [
            'from' => 'De la:',
            'to' => 'Către:',
            'cc' => 'CC:',
            'template' => 'Șablon:',
            'sent' => 'Trimis:',
            'sent_not_yet' => 'Încă nu',
            'status' => 'Status:',
            'no_body' => 'Conținutul e-mailului nu a fost stocat. Activați <code>logging.store_rendered_body</code> în setări pentru a salva conținutul e-mailului.',
            'error' => 'Detalii eroare'
        ],
        'notifications' => [
            'resent' => 'Email retrimis cu succes',
            'resend_failed' => 'Retrimiterea emailului a esuat',
        ],

        'errors' => [
            'no_rendered_body' => 'Nu se poate retrimite: continutul randuit nu este stocat. Activati logging.store_rendered_body in setari.',
            'no_template' => 'Sablonul original nu mai exista.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Emailuri Trimise',

        'columns' => [
            'to' => 'Catre',
            'template' => 'Sablon',
            'subject' => 'Subiect',
            'status' => 'Stare',
            'sent_by' => 'Trimis De',
            'sent_by_placeholder' => 'Sistem',
            'sent_at' => 'Trimis',
        ],

        'actions' => [
            'view' => 'Vizualizare',
            'resend' => 'Retrimite',
            'resend_confirm' => 'Sunteti sigur ca doriti sa retrimiteti acest email?',
        ],

        'notifications' => [
            'resent' => 'Email retrimis cu succes',
            'resend_failed' => 'Retrimiterea a esuat',
        ],

        'empty' => [
            'heading' => 'Niciun email trimis',
            'description' => 'Emailurile trimise pentru aceasta inregistrare vor aparea aici.',
        ],

        'errors' => [
            'no_body' => 'Nu se poate retrimite: continutul randuit sau sablonul nu este stocat.',
            'no_template' => 'Sablonul original nu mai exista.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Setari Email',

        'tabs' => [
            'general' => 'General',
            'branding' => 'Branding',
            'logging' => 'Jurnal',
            'attachments' => 'Atasamente',
            'auth_emails' => 'Emailuri de Autentificare',
        ],

        'titles' => [
            'general' => 'Setari Sabloane Email - General',
            'branding' => 'Setari Sabloane Email - Branding',
            'logging' => 'Setari Sabloane Email - Jurnal',
            'attachments' => 'Setari Sabloane Email - Atasamente',
            'auth_emails' => 'Setari Sabloane Email - Emailuri de Autentificare',
        ],

        'sections' => [
            'default_sender' => 'Expeditor Implicit',
            'default_sender_description' => 'Adresa "De la" implicita pentru toate emailurile trimise de plugin.',
            'additional_senders' => 'Expeditori Suplimentari',
            'add_additional_senders' => 'Adăugați expeditori suplimentari',
            'additional_senders_description' => 'Adrese "De la" suplimentare pe care utilizatorii le pot alege la compunerea emailurilor.',
            'localization' => 'Localizare',
            'categories' => 'Categorii Sabloane',
            'logo' => 'Logo',
            'colors' => 'Culori',
            'footer_links' => 'Linkuri Subsol',
            'add_footer_links' => 'Adăugați linkuri în subsol',
            'customer_service' => 'Serviciu Clienti',
            'logging' => 'Jurnal Emailuri',
            'logging_description' => 'Controlati modul in care emailurile trimise sunt inregistrate in baza de date.',
            'cleanup' => 'Curatare Programata',
            'cleanup_description' => 'Stergeti automat inregistrarile vechi de emailuri trimise conform unui program.',
            'attachment_rules' => 'Reguli Atasamente',
            'attachment_rules_description' => 'Configurati limitele pentru atasamentele de fisiere in emailurile compuse.',
            'auth_emails' => 'Suprascrierea Emailurilor de Autentificare',
            'auth_emails_description' => 'Suprascrieti emailurile implicite de autentificare ale aplicatiei cu sabloanele dvs. personalizate.',
        ],

        'fields' => [
            'from_email' => 'Email Expeditor',
            'from_name' => 'Nume Expeditor',
            'sender_email' => 'Email',
            'sender_name' => 'Nume Afisat',
            'sender_new' => 'Expeditor Nou',
            'default_locale' => 'Limba Implicita',
            'default_locale_helper' => 'Limba implicita pentru sabloanele noi (ex., en, hu, de).',
            'languages' => 'Limbi Disponibile',
            'language_code' => 'Cod',
            'language_display' => 'Nume Afisat',
            'language_flag' => 'Pictograma Steag',
            'language_new' => 'Limba Noua',
            'category_key' => 'Cheie',
            'category_label' => 'Eticheta',
            'category_new' => 'Categorie Noua',
            'logo_url' => 'URL sau Cale Logo',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL absolut sau cale catre logo-ul emailului.',
            'logo_width' => 'Latime (px)',
            'logo_height' => 'Inaltime (px)',
            'content_width' => 'Latimea Continutului (px)',
            'primary_color' => 'Culoare Principala',
            'footer_link_label' => 'Eticheta',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Link Nou',
            'support_email' => 'Email Suport',
            'support_phone' => 'Telefon Suport',
            'enable_logging' => 'Activeaza Jurnalizarea',
            'enable_logging_helper' => 'Cand este dezactivat, nu vor fi create inregistrari de emailuri trimise.',
            'store_rendered_body' => 'Stocheaza Continutul Randuit',
            'store_rendered_body_helper' => 'Salveaza HTML-ul final al fiecarui email trimis. Necesar pentru functiile de retrimitere si previzualizare.',
            'retention_days' => 'Retentie (zile)',
            'retention_days_helper' => 'Sterge automat inregistrarile de emailuri trimise dupa acest numar de zile. Lasati gol pentru a pastra permanent.',
            'cleanup_enabled' => 'Activeaza Curatarea Programata',
            'cleanup_enabled_helper' => 'Ruleaza automat comanda de curatare conform unui program.',
            'cleanup_frequency' => 'Frecventa Curatarii',
            'max_file_size' => 'Dimensiune Maxima Fisier (MB)',
            'allowed_extensions' => 'Extensii de Fisier Permise',
            'allowed_extensions_placeholder' => 'Adaugati extensie (ex., pdf)',
            'allowed_extensions_helper' => 'Extensii de fisier permise pentru incarcare.',
            'override_verification' => 'Suprascrie Emailul de Verificare',
            'override_verification_helper' => 'Folositi sablonul "user-verify-email" in locul emailului implicit de verificare al aplicatiei.',
            'override_password_reset' => 'Suprascrie Resetarea Parolei',
            'override_password_reset_helper' => 'Folositi sablonul "user-password-reset" in locul emailului implicit de resetare a parolei al aplicatiei.',
            'override_welcome' => 'Suprascrie Emailul de Bun Venit',
            'override_welcome_helper' => 'Trimiteti un email de bun venit folosind sablonul "user-welcome" cand un utilizator nou se inregistreaza.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Toate drepturile rezervate.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Ciorna',
            2 => 'In Coada',
            3 => 'Trimis',
            4 => 'Esuat',
        ],

        'cleanup_frequency' => [
            1 => 'Zilnic',
            2 => 'Saptamanal',
            3 => 'Lunar',
        ],
    ],

];
