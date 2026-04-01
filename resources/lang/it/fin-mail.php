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
        'templates' => 'Modelli',
        'themes' => 'Temi',
        'sent-emails' => 'Email inviate',
        'settings' => 'Impostazioni',
    ],

    'models' => [
        'email_template' => 'Modello email',
        'email_templates' => 'Modelli email',
        'email_theme' => 'Tema email',
        'email_themes' => 'Temi email',
        'sent_email' => 'Email inviata',
        'sent_emails' => 'Email inviate',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Contenuto',
            'settings' => 'Impostazioni',
            'tokens' => 'Token',
        ],

        'fields' => [
            'name' => 'Nome',
            'key' => 'Chiave',
            'key_helper' => 'Chiave univoca usata nel codice: es. "invoice-sent"',
            'category' => 'Categoria',
            'subject' => 'Oggetto',
            'subject_helper' => 'Supporta token: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Preheader',
            'preheader_helper' => 'Testo di anteprima mostrato nei client email',
            'body' => 'Corpo',
            'theme' => 'Tema',
            'theme_placeholder' => 'Tema predefinito',
            'is_active' => 'Attivo',
            'is_active_helper' => 'I modelli inattivi non possono essere usati per l\'invio',
            'tags' => 'Tag',
            'tags_placeholder' => 'Aggiungi tag per l\'organizzazione',
            'from_address' => 'Email mittente',
            'from_name' => 'Nome mittente',
            'locale' => 'Lingua',
        ],

        'sections' => [
            'custom_sender' => 'Mittente personalizzato',
            'custom_sender_description' => 'Sovrascrivi l\'indirizzo mittente predefinito per questo modello',
        ],

        'tokens' => [
            'label' => 'Token disponibili',
            'helper' => 'Documenta i token disponibili per questo modello. Questo aiuta gli editor a sapere quali variabili possono usare.',
            'token' => 'Token',
            'description' => 'Descrizione',
            'example' => 'Esempio',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Il nome completo del destinatario',
            'example_placeholder' => 'Mario Rossi',
            'new_item' => 'Nuovo token',
        ],

        'blocks' => [
            'button' => 'Pulsante',
            'button_heading' => 'Inserisci pulsante',
            'button_label' => 'Testo del pulsante',
            'button_url' => 'URL',
            'button_align' => 'Allineamento',
            'align_left' => 'Sinistra',
            'align_center' => 'Centro',
            'align_right' => 'Destra',
            'button_default_label' => 'Clicca qui',
        ],

        'columns' => [
            'locales' => 'Lingue',
            'active' => 'Attivo',
            'locked' => 'Bloccato',
            'sent' => 'Inviato',
            'updated_at' => 'Aggiornato',
        ],

        'actions' => [
            'preview' => 'Anteprima',
            'send_test' => 'Invia test',
            'send_test_field' => 'Invia a',
            'send_test_locale' => 'Lingua',
            'compose' => 'Componi email',
            'version_history' => 'Cronologia versioni',
            'back_to_templates' => 'Torna ai modelli',
        ],

        'notifications' => [
            'test_sent' => 'Email di test inviata!',
            'test_sent_body' => 'Inviata a :email',
            'test_failed' => 'Invio email di test fallito',
            'saved' => 'Modello salvato',
            'saved_body' => 'Uno snapshot della versione è stato salvato automaticamente.',
            'locked_skipped' => 'Modelli bloccati saltati',
            'locked_skipped_body' => ':count modello/i bloccato/i sono stati saltati e non eliminati.',
        ],

        'tooltips' => [
            'locked' => 'Questo modello è bloccato — chiave e categoria sono in sola lettura, l\'eliminazione è impedita.',
        ],

        'versioning' => [
            'date' => 'Data',
            'by' => 'Da',
            'preview' => 'Anteprima',
            'restore' => 'Ripristina',
            'restore_confirm' => 'Sei sicuro di voler ripristinare la versione :version? Il contenuto attuale verrà prima salvato come nuova versione.',
            'restored' => 'Versione :version ripristinata.',
            'empty' => 'Nessuna cronologia versioni disponibile.',
        ],

        'notices' => [
            'locked' => 'Questo modello è bloccato. I campi chiave e categoria non possono essere modificati.',
        ],

        'language_label' => 'Lingua: :locale',

        'replicate_suffix' => '(Copia)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Componi email',
        'title_with_name' => 'Componi: :name',

        'sections' => [
            'recipients' => 'Destinatari',
            'content' => 'Contenuto email',
            'attachments' => 'Allegati',
            'tokens' => 'Token disponibili',
        ],

        'fields' => [
            'from' => 'Da',
            'to' => 'A',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Inserisci indirizzi email',
            'cc_placeholder' => 'Indirizzi CC',
            'bcc_placeholder' => 'Indirizzi BCC',
            'locale' => 'Lingua',
            'subject' => 'Oggetto',
            'preheader' => 'Preheader',
            'body' => 'Corpo',
            'attach_files' => 'Allega file',
            'preheader_helper' => 'Testo di anteprima mostrato nei client email prima dell\'apertura',
            'no_tokens' => 'Nessun token documentato per questo modello. I token come {{ user.name }} verranno sostituiti quando inviati tramite API/codice.',
        ],

        'actions' => [
            'send' => 'Invia email',
            'preview' => 'Anteprima',
        ],

        'confirm' => [
            'heading' => 'Conferma invio',
            'description' => 'Sei sicuro di voler inviare questa email?',
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
            'content' => 'Contenuto',
            'attachments' => 'Allegati',
        ],

        'fields' => [
            'from' => 'Da',
            'to' => 'A',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Modello',
            'subject' => 'Oggetto',
            'to_placeholder' => 'Inserisci indirizzi email',
            'cc_placeholder' => 'Inserisci indirizzi CC',
            'bcc_placeholder' => 'Inserisci indirizzi BCC',
            'auto_attached' => 'File allegati automaticamente',
            'auto_attached_none' => 'Nessuno',
            'additional_attachments' => 'Allegati aggiuntivi',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Invia email',
        'modal_heading' => 'Componi email',
        'submit' => 'Invia',

        'notifications' => [
            'sent' => 'Email inviata con successo',
            'sent_body' => 'Inviata a: :recipients',
            'failed' => 'Invio email fallito',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Dettagli tema',
            'background' => 'Sfondo e layout',
            'background_description' => 'Colori strutturali principali per il layout email.',
            'typography' => 'Tipografia',
            'typography_description' => 'Colori per testo e intestazioni.',
            'buttons' => 'Pulsanti',
            'buttons_description' => 'Stile dei pulsanti call-to-action.',
            'footer' => 'Piè di pagina',
            'footer_description' => 'Stile dell\'area piè di pagina.',
            'preview' => 'Anteprima',
        ],

        'fields' => [
            'name' => 'Nome',
            'is_default' => 'Tema predefinito',
            'is_default_helper' => 'Il tema predefinito viene applicato ai modelli che non ne specificano uno.',
            'page_background' => 'Sfondo pagina',
            'content_background' => 'Sfondo contenuto',
            'border' => 'Bordo',
            'headings' => 'Intestazioni',
            'body_text' => 'Testo corpo',
            'secondary_text' => 'Testo secondario',
            'links' => 'Link',
            'button_background' => 'Sfondo pulsante',
            'button_text' => 'Testo pulsante',
            'primary_accent' => 'Primario/Accento',
            'footer_background' => 'Sfondo piè di pagina',
            'footer_text' => 'Testo piè di pagina',
        ],

        'columns' => [
            'primary' => 'Primario',
            'background' => 'Sfondo',
            'text' => 'Testo',
            'button' => 'Pulsante',
            'default' => 'Predefinito',
            'templates' => 'Modelli',
            'updated_at' => 'Aggiornato',
        ],

        'replicate_suffix' => '(Copia)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'A',
            'template' => 'Modello',
            'template_placeholder' => 'Personalizzato',
            'sent_by' => 'Inviato da',
            'subject' => 'Oggetto',
            'status' => 'Stato',
            'sent_by_placeholder' => 'Sistema',
            'related_to' => 'Correlato a',
            'sent_at' => 'Inviato',
        ],

        'filters' => [
            'from' => 'Da',
            'until' => 'Fino a',
        ],

        'actions' => [
            'view' => 'Visualizza',
            'resend' => 'Reinvia',
            'resend_description' => 'Verrà inviata una nuova copia dell\'email ai destinatari originali.',
        ],


        'preview' => [
            'from' => 'Da:',
            'to' => 'A:',
            'cc' => 'CC:',
            'template' => 'Modello:',
            'sent' => 'Inviato:',
            'sent_not_yet' => 'Non ancora',
            'status' => 'Stato:',
            'no_body' => 'Il corpo dell\'email non è stato salvato. Abilita <code>logging.store_rendered_body</code> nelle impostazioni per salvare il contenuto dell\'email.',
            'error' => 'Dettagli errore'
        ],
        'notifications' => [
            'resent' => 'Email reinviata con successo',
            'resend_failed' => 'Reinvio email fallito',
        ],

        'errors' => [
            'no_rendered_body' => 'Impossibile reinviare: nessun corpo renderizzato salvato. Abilitare logging.store_rendered_body nelle impostazioni.',
            'no_template' => 'Il modello originale non esiste più.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Email inviate',

        'columns' => [
            'to' => 'A',
            'template' => 'Modello',
            'subject' => 'Oggetto',
            'status' => 'Stato',
            'sent_by' => 'Inviato da',
            'sent_by_placeholder' => 'Sistema',
            'sent_at' => 'Inviato',
        ],

        'actions' => [
            'view' => 'Visualizza',
            'resend' => 'Reinvia',
            'resend_confirm' => 'Sei sicuro di voler reinviare questa email?',
        ],

        'notifications' => [
            'resent' => 'Email reinviata con successo',
            'resend_failed' => 'Reinvio fallito',
        ],

        'empty' => [
            'heading' => 'Nessuna email inviata',
            'description' => 'Le email inviate per questo record appariranno qui.',
        ],

        'errors' => [
            'no_body' => 'Impossibile reinviare: nessun corpo renderizzato o modello salvato.',
            'no_template' => 'Il modello originale non esiste più.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Impostazioni email',

        'tabs' => [
            'general' => 'Generale',
            'branding' => 'Branding',
            'logging' => 'Registrazione',
            'attachments' => 'Allegati',
            'auth_emails' => 'Email di autenticazione',
        ],

        'titles' => [
            'general' => 'Impostazioni modelli email - Generale',
            'branding' => 'Impostazioni modelli email - Branding',
            'logging' => 'Impostazioni modelli email - Registrazione',
            'attachments' => 'Impostazioni modelli email - Allegati',
            'auth_emails' => 'Impostazioni modelli email - Email di autenticazione',
        ],

        'sections' => [
            'default_sender' => 'Mittente predefinito',
            'default_sender_description' => 'L\'indirizzo "Da" predefinito per tutte le email inviate dal plugin.',
            'additional_senders' => 'Mittenti aggiuntivi',
            'add_additional_senders' => 'Aggiungi mittenti aggiuntivi',
            'additional_senders_description' => 'Indirizzi "Da" aggiuntivi che gli utenti possono scegliere quando compongono email.',
            'localization' => 'Localizzazione',
            'categories' => 'Categorie modelli',
            'logo' => 'Logo',
            'colors' => 'Colori',
            'footer_links' => 'Link piè di pagina',
            'add_footer_links' => 'Aggiungi link al piè di pagina',
            'customer_service' => 'Servizio clienti',
            'logging' => 'Registrazione email',
            'logging_description' => 'Controlla come le email inviate vengono registrate nel database.',
            'cleanup' => 'Pulizia programmata',
            'cleanup_description' => 'Elimina automaticamente i vecchi record delle email inviate secondo una programmazione.',
            'attachment_rules' => 'Regole allegati',
            'attachment_rules_description' => 'Configura i limiti per gli allegati nelle email composte.',
            'auth_emails' => 'Sostituzione email di autenticazione',
            'auth_emails_description' => 'Sostituisci le email di autenticazione predefinite dell\'applicazione con i tuoi modelli personalizzati.',
        ],

        'fields' => [
            'from_email' => 'Email mittente',
            'from_name' => 'Nome mittente',
            'sender_email' => 'Email',
            'sender_name' => 'Nome visualizzato',
            'sender_new' => 'Nuovo mittente',
            'default_locale' => 'Lingua predefinita',
            'default_locale_helper' => 'La lingua predefinita per i nuovi modelli (es. en, hu, de).',
            'languages' => 'Lingue disponibili',
            'language_code' => 'Codice',
            'language_display' => 'Nome visualizzato',
            'language_flag' => 'Icona bandiera',
            'language_new' => 'Nuova lingua',
            'category_key' => 'Chiave',
            'category_label' => 'Etichetta',
            'category_new' => 'Nuova categoria',
            'logo_url' => 'URL o percorso logo',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL assoluto o percorso del logo email.',
            'logo_width' => 'Larghezza (px)',
            'logo_height' => 'Altezza (px)',
            'content_width' => 'Larghezza contenuto (px)',
            'primary_color' => 'Colore primario',
            'footer_link_label' => 'Etichetta',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Nuovo link',
            'support_email' => 'Email supporto',
            'support_phone' => 'Telefono supporto',
            'enable_logging' => 'Abilita registrazione',
            'enable_logging_helper' => 'Se disabilitato, non verranno creati record delle email inviate.',
            'store_rendered_body' => 'Salva corpo renderizzato',
            'store_rendered_body_helper' => 'Salva l\'HTML finale di ogni email inviata. Necessario per le funzioni di reinvio e anteprima.',
            'retention_days' => 'Conservazione (giorni)',
            'retention_days_helper' => 'Elimina automaticamente i record delle email inviate dopo questo numero di giorni. Lascia vuoto per conservarli per sempre.',
            'cleanup_enabled' => 'Abilita pulizia programmata',
            'cleanup_enabled_helper' => 'Esegui automaticamente il comando di pulizia secondo una programmazione.',
            'cleanup_frequency' => 'Frequenza pulizia',
            'max_file_size' => 'Dimensione max file (MB)',
            'allowed_extensions' => 'Estensioni file consentite',
            'allowed_extensions_placeholder' => 'Aggiungi estensione (es. pdf)',
            'allowed_extensions_helper' => 'Estensioni file consentite per il caricamento.',
            'override_verification' => 'Sostituisci email di verifica',
            'override_verification_helper' => 'Usa il modello "user-verify-email" al posto dell\'email di verifica predefinita dell\'applicazione.',
            'override_password_reset' => 'Sostituisci reset password',
            'override_password_reset_helper' => 'Usa il modello "user-password-reset" al posto dell\'email di reset password predefinita dell\'applicazione.',
            'override_welcome' => 'Sostituisci email di benvenuto',
            'override_welcome_helper' => 'Invia un\'email di benvenuto usando il modello "user-welcome" quando un nuovo utente si registra.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Tutti i diritti riservati.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Bozza',
            2 => 'In coda',
            3 => 'Inviato',
            4 => 'Fallito',
        ],

        'cleanup_frequency' => [
            1 => 'Giornaliero',
            2 => 'Settimanale',
            3 => 'Mensile',
        ],
    ],

];
