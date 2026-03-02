<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'Correu electrònic',
        'templates' => 'Plantilles',
        'themes' => 'Temes',
        'sent-emails' => 'Correus enviats',
        'settings' => 'Configuració',
    ],

    'models' => [
        'email_template' => 'Plantilla de correu',
        'email_templates' => 'Plantilles de correu',
        'email_theme' => 'Tema de correu',
        'email_themes' => 'Temes de correu',
        'sent_email' => 'Correu enviat',
        'sent_emails' => 'Correus enviats',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Contingut',
            'settings' => 'Configuració',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Nom',
            'key' => 'Clau',
            'key_helper' => 'Clau única utilitzada al codi: p. ex. "invoice-sent"',
            'category' => 'Categoria',
            'subject' => 'Assumpte',
            'subject_helper' => 'Admet tokens: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Preencapçalament',
            'preheader_helper' => 'Text de previsualització mostrat als clients de correu',
            'body' => 'Cos',
            'theme' => 'Tema',
            'theme_placeholder' => 'Tema per defecte',
            'is_active' => 'Actiu',
            'is_active_helper' => 'Les plantilles inactives no es poden utilitzar per enviar',
            'tags' => 'Etiquetes',
            'tags_placeholder' => 'Afegiu etiquetes per organitzar',
            'from_address' => 'Correu del remitent',
            'from_name' => 'Nom del remitent',
            'locale' => 'Idioma',
        ],

        'sections' => [
            'custom_sender' => 'Remitent personalitzat',
            'custom_sender_description' => 'Substituïu l\'adreça del remitent per defecte per a aquesta plantilla',
        ],

        'tokens' => [
            'label' => 'Tokens disponibles',
            'helper' => 'Documenteu els tokens disponibles per a aquesta plantilla. Això ajuda els editors a saber quines variables poden utilitzar.',
            'token' => 'Token',
            'description' => 'Descripció',
            'example' => 'Exemple',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'El nom complet del destinatari',
            'example_placeholder' => 'Joan Garcia',
            'new_item' => 'Nou Token',
        ],

        'columns' => [
            'locales' => 'Idiomes',
            'active' => 'Actiu',
            'locked' => 'Bloquejat',
            'sent' => 'Enviat',
            'updated_at' => 'Actualitzat',
        ],

        'actions' => [
            'preview' => 'Previsualització',
            'send_test' => 'Enviar prova',
            'send_test_field' => 'Enviar a',
            'send_test_locale' => 'Idioma',
            'compose' => 'Redactar correu',
            'version_history' => 'Historial de versions',
            'back_to_templates' => 'Tornar a les plantilles',
        ],

        'notifications' => [
            'test_sent' => 'Correu de prova enviat!',
            'test_sent_body' => 'Enviat a :email',
            'test_failed' => 'No s\'ha pogut enviar el correu de prova',
            'saved' => 'Plantilla desada',
            'saved_body' => 'S\'ha desat automàticament una instantània de la versió.',
            'locked_skipped' => 'S\'han omès les plantilles bloquejades',
            'locked_skipped_body' => 'S\'han omès :count plantilla(es) bloquejada(es) i no s\'han eliminat.',
        ],

        'tooltips' => [
            'locked' => 'Aquesta plantilla està bloquejada — la clau i la categoria són de només lectura, l\'eliminació està impedida.',
        ],

        'notices' => [
            'locked' => 'Aquesta plantilla està bloquejada. Els camps de clau i categoria no es poden modificar.',
        ],

        'language_label' => 'Idioma: :locale',

        'replicate_suffix' => '(Còpia)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Redactar correu',
        'title_with_name' => 'Redactar: :name',

        'sections' => [
            'recipients' => 'Destinataris',
            'content' => 'Contingut del correu',
            'attachments' => 'Adjunts',
            'tokens' => 'Tokens disponibles',
        ],

        'fields' => [
            'from' => 'De',
            'to' => 'A',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Introduïu adreces de correu',
            'cc_placeholder' => 'Adreces CC',
            'bcc_placeholder' => 'Adreces BCC',
            'locale' => 'Idioma',
            'subject' => 'Assumpte',
            'preheader' => 'Preencapçalament',
            'body' => 'Cos',
            'attach_files' => 'Adjuntar fitxers',
            'preheader_helper' => 'Text de previsualització mostrat als clients de correu abans d\'obrir',
            'no_tokens' => 'No hi ha tokens documentats per a aquesta plantilla. Els tokens com {{ user.name }} se substituiran quan s\'enviïn via API/codi.',
        ],

        'actions' => [
            'send' => 'Enviar correu',
            'preview' => 'Previsualització',
        ],

        'confirm' => [
            'heading' => 'Confirmar enviament',
            'description' => 'Esteu segur que voleu enviar aquest correu?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Destinataris',
            'content' => 'Contingut',
            'attachments' => 'Adjunts',
        ],

        'fields' => [
            'from' => 'De',
            'to' => 'A',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Plantilla',
            'subject' => 'Assumpte',
            'to_placeholder' => 'Introduïu adreces de correu',
            'cc_placeholder' => 'Introduïu adreces CC',
            'bcc_placeholder' => 'Introduïu adreces BCC',
            'auto_attached' => 'Fitxers adjuntats automàticament',
            'auto_attached_none' => 'Cap',
            'additional_attachments' => 'Adjunts addicionals',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Enviar correu',
        'modal_heading' => 'Redactar correu',
        'submit' => 'Enviar',

        'notifications' => [
            'sent' => 'Correu enviat correctament',
            'sent_body' => 'Enviat a: :recipients',
            'failed' => 'No s\'ha pogut enviar el correu',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Detalls del tema',
            'background' => 'Fons i disseny',
            'background_description' => 'Colors estructurals principals per al disseny del correu.',
            'typography' => 'Tipografia',
            'typography_description' => 'Colors per al text i els encapçalaments.',
            'buttons' => 'Botons',
            'buttons_description' => 'Estil dels botons de crida a l\'acció.',
            'footer' => 'Peu de pàgina',
            'footer_description' => 'Estil de l\'àrea del peu de pàgina.',
            'preview' => 'Previsualització',
        ],

        'fields' => [
            'name' => 'Nom',
            'is_default' => 'Tema per defecte',
            'is_default_helper' => 'El tema per defecte s\'aplica a les plantilles que no n\'especifiquen cap.',
            'page_background' => 'Fons de la pàgina',
            'content_background' => 'Fons del contingut',
            'border' => 'Vora',
            'headings' => 'Encapçalaments',
            'body_text' => 'Text del cos',
            'secondary_text' => 'Text secundari',
            'links' => 'Enllaços',
            'button_background' => 'Fons del botó',
            'button_text' => 'Text del botó',
            'primary_accent' => 'Primari/Accent',
            'footer_background' => 'Fons del peu de pàgina',
            'footer_text' => 'Text del peu de pàgina',
        ],

        'columns' => [
            'primary' => 'Primari',
            'background' => 'Fons',
            'text' => 'Text',
            'button' => 'Botó',
            'default' => 'Per defecte',
            'templates' => 'Plantilles',
            'updated_at' => 'Actualitzat',
        ],

        'replicate_suffix' => '(Còpia)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'A',
            'template' => 'Plantilla',
            'template_placeholder' => 'Personalitzat',
            'sent_by' => 'Enviat per',
            'subject' => 'Assumpte',
            'status' => 'Estat',
            'sent_by_placeholder' => 'Sistema',
            'related_to' => 'Relacionat amb',
            'sent_at' => 'Enviat',
        ],

        'filters' => [
            'from' => 'Des de',
            'until' => 'Fins a',
        ],

        'actions' => [
            'view' => 'Veure',
            'resend' => 'Reenviar',
            'resend_description' => 'Això enviarà una nova còpia del correu als destinataris originals.',
        ],

        'notifications' => [
            'resent' => 'Correu reenviat correctament',
            'resend_failed' => 'No s\'ha pogut reenviar el correu',
        ],

        'errors' => [
            'no_rendered_body' => 'No es pot reenviar: no s\'ha emmagatzemat cap cos renderitzat. Activeu logging.store_rendered_body a la configuració.',
            'no_template' => 'La plantilla original ja no existeix.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Correus enviats',

        'columns' => [
            'to' => 'A',
            'template' => 'Plantilla',
            'subject' => 'Assumpte',
            'status' => 'Estat',
            'sent_by' => 'Enviat per',
            'sent_by_placeholder' => 'Sistema',
            'sent_at' => 'Enviat',
        ],

        'actions' => [
            'view' => 'Veure',
            'resend' => 'Reenviar',
            'resend_confirm' => 'Esteu segur que voleu reenviar aquest correu?',
        ],

        'notifications' => [
            'resent' => 'Correu reenviat correctament',
            'resend_failed' => 'No s\'ha pogut reenviar',
        ],

        'empty' => [
            'heading' => 'No s\'han enviat correus',
            'description' => 'Els correus enviats per a aquest registre apareixeran aquí.',
        ],

        'errors' => [
            'no_body' => 'No es pot reenviar: no s\'ha emmagatzemat cap cos renderitzat ni plantilla.',
            'no_template' => 'La plantilla original ja no existeix.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Configuració del correu',

        'tabs' => [
            'general' => 'General',
            'branding' => 'Marca',
            'logging' => 'Registre',
            'attachments' => 'Adjunts',
            'auth_emails' => 'Correus d\'autenticació',
        ],

        'titles' => [
            'general' => 'Configuració de plantilles de correu - General',
            'branding' => 'Configuració de plantilles de correu - Marca',
            'logging' => 'Configuració de plantilles de correu - Registre',
            'attachments' => 'Configuració de plantilles de correu - Adjunts',
            'auth_emails' => 'Configuració de plantilles de correu - Correus d\'autenticació',
        ],

        'sections' => [
            'default_sender' => 'Remitent per defecte',
            'default_sender_description' => 'L\'adreça "De" per defecte per a tots els correus enviats pel connector.',
            'additional_senders' => 'Remitents addicionals',
            'additional_senders_description' => 'Adreces "De" addicionals que els usuaris poden escollir en redactar correus.',
            'localization' => 'Localització',
            'categories' => 'Categories de plantilles',
            'logo' => 'Logotip',
            'colors' => 'Colors',
            'footer_links' => 'Enllaços del peu de pàgina',
            'customer_service' => 'Atenció al client',
            'logging' => 'Registre de correus',
            'logging_description' => 'Controleu com es registren els correus enviats a la base de dades.',
            'cleanup' => 'Neteja programada',
            'cleanup_description' => 'Elimineu automàticament els registres antics de correus enviats segons un calendari.',
            'attachment_rules' => 'Regles d\'adjunts',
            'attachment_rules_description' => 'Configureu els límits per als adjunts de fitxers en els correus redactats.',
            'auth_emails' => 'Substitucions de correus d\'autenticació',
            'auth_emails_description' => 'Substituïu els correus d\'autenticació per defecte de l\'aplicació amb les vostres plantilles personalitzades.',
        ],

        'fields' => [
            'from_email' => 'Correu del remitent',
            'from_name' => 'Nom del remitent',
            'sender_email' => 'Correu electrònic',
            'sender_name' => 'Nom visible',
            'sender_new' => 'Nou remitent',
            'default_locale' => 'Idioma per defecte',
            'default_locale_helper' => 'L\'idioma per defecte per a les noves plantilles (p. ex. en, hu, de).',
            'languages' => 'Idiomes disponibles',
            'language_code' => 'Codi',
            'language_display' => 'Nom visible',
            'language_flag' => 'Icona de bandera',
            'language_new' => 'Nou idioma',
            'category_key' => 'Clau',
            'category_label' => 'Etiqueta',
            'category_new' => 'Nova categoria',
            'logo_url' => 'URL o ruta del logotip',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL absolut o ruta al vostre logotip de correu.',
            'logo_width' => 'Amplada (px)',
            'logo_height' => 'Alçada (px)',
            'content_width' => 'Amplada del contingut (px)',
            'primary_color' => 'Color primari',
            'footer_link_label' => 'Etiqueta',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Nou enllaç',
            'support_email' => 'Correu de suport',
            'support_phone' => 'Telèfon de suport',
            'enable_logging' => 'Activar registre',
            'enable_logging_helper' => 'Quan està desactivat, no es crearan registres de correus enviats.',
            'store_rendered_body' => 'Emmagatzemar cos renderitzat',
            'store_rendered_body_helper' => 'Deseu l\'HTML final de cada correu enviat. Necessari per a les funcions de reenviament i previsualització.',
            'retention_days' => 'Retenció (dies)',
            'retention_days_helper' => 'Elimineu automàticament els registres de correus enviats després d\'aquest nombre de dies. Deixeu buit per conservar-los per sempre.',
            'cleanup_enabled' => 'Activar neteja programada',
            'cleanup_enabled_helper' => 'Executeu automàticament l\'ordre de neteja segons un calendari.',
            'cleanup_frequency' => 'Freqüència de neteja',
            'max_file_size' => 'Mida màxima de fitxer (MB)',
            'allowed_extensions' => 'Extensions de fitxer permeses',
            'allowed_extensions_placeholder' => 'Afegiu una extensió (p. ex. pdf)',
            'allowed_extensions_helper' => 'Extensions de fitxer permeses per a la càrrega.',
            'override_verification' => 'Substituir la verificació per correu',
            'override_verification_helper' => 'Utilitzeu la plantilla "user-verify-email" en lloc del correu de verificació per defecte de l\'aplicació.',
            'override_password_reset' => 'Substituir el restabliment de contrasenya',
            'override_password_reset_helper' => 'Utilitzeu la plantilla "user-password-reset" en lloc del correu de restabliment de contrasenya per defecte de l\'aplicació.',
            'override_welcome' => 'Substituir el correu de benvinguda',
            'override_welcome_helper' => 'Envieu un correu de benvinguda amb la plantilla "user-welcome" quan un nou usuari es registri.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Tots els drets reservats.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Esborrany',
            2 => 'En cua',
            3 => 'Enviat',
            4 => 'Fallat',
        ],

        'cleanup_frequency' => [
            1 => 'Diàriament',
            2 => 'Setmanalment',
            3 => 'Mensualment',
        ],
    ],

];
