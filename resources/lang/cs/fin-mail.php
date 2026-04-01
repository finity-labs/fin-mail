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
        'templates' => 'Šablony',
        'themes' => 'Motivy',
        'sent-emails' => 'Odeslané e-maily',
        'settings' => 'Nastavení',
    ],

    'models' => [
        'email_template' => 'E-mailová šablona',
        'email_templates' => 'E-mailové šablony',
        'email_theme' => 'E-mailový motiv',
        'email_themes' => 'E-mailové motivy',
        'sent_email' => 'Odeslaný e-mail',
        'sent_emails' => 'Odeslané e-maily',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Obsah',
            'settings' => 'Nastavení',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Název',
            'key' => 'Klíč',
            'key_helper' => 'Jedinečný klíč používaný v kódu: např. "invoice-sent"',
            'category' => 'Kategorie',
            'subject' => 'Předmět',
            'subject_helper' => 'Podporuje tokens: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Náhled',
            'preheader_helper' => 'Text náhledu zobrazený v e-mailových klientech',
            'body' => 'Tělo',
            'theme' => 'Motiv',
            'theme_placeholder' => 'Výchozí motiv',
            'is_active' => 'Aktivní',
            'is_active_helper' => 'Neaktivní šablony nelze použít k odesílání',
            'tags' => 'Štítky',
            'tags_placeholder' => 'Přidejte štítky pro organizaci',
            'from_address' => 'E-mail odesílatele',
            'from_name' => 'Jméno odesílatele',
            'locale' => 'Jazyk',
        ],

        'sections' => [
            'custom_sender' => 'Vlastní odesílatel',
            'custom_sender_description' => 'Přepsat výchozí adresu odesílatele pro tuto šablonu',
        ],

        'tokens' => [
            'label' => 'Dostupné Tokens',
            'helper' => 'Zdokumentujte tokens dostupné pro tuto šablonu. To pomůže editorům vědět, jaké proměnné mohou použít.',
            'token' => 'Token',
            'description' => 'Popis',
            'example' => 'Příklad',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Celé jméno příjemce',
            'example_placeholder' => 'Jan Novák',
            'new_item' => 'Nový Token',
        ],

        'blocks' => [
            'button' => 'Tlačítko',
            'button_heading' => 'Vložit tlačítko',
            'button_label' => 'Text tlačítka',
            'button_url' => 'URL',
            'button_align' => 'Zarovnání',
            'align_left' => 'Vlevo',
            'align_center' => 'Na střed',
            'align_right' => 'Vpravo',
            'button_default_label' => 'Klikněte zde',
        ],

        'columns' => [
            'locales' => 'Jazyky',
            'active' => 'Aktivní',
            'locked' => 'Uzamčeno',
            'sent' => 'Odesláno',
            'updated_at' => 'Aktualizováno',
        ],

        'actions' => [
            'preview' => 'Náhled',
            'send_test' => 'Odeslat test',
            'send_test_field' => 'Odeslat na',
            'send_test_locale' => 'Jazyk',
            'compose' => 'Napsat e-mail',
            'version_history' => 'Historie verzí',
            'back_to_templates' => 'Zpět na šablony',
        ],

        'notifications' => [
            'test_sent' => 'Testovací e-mail odeslán!',
            'test_sent_body' => 'Odesláno na :email',
            'test_failed' => 'Odeslání testovacího e-mailu se nezdařilo',
            'saved' => 'Šablona uložena',
            'saved_body' => 'Snímek verze byl automaticky uložen.',
            'locked_skipped' => 'Uzamčené šablony byly přeskočeny',
            'locked_skipped_body' => ':count uzamčená(ých) šablona(šablon) byla přeskočena a nebyla smazána.',
        ],

        'tooltips' => [
            'locked' => 'Tato šablona je uzamčena — klíč a kategorie jsou pouze pro čtení, smazání je zablokováno.',
        ],

        'versioning' => [
            'date' => 'Datum',
            'by' => 'Od',
            'preview' => 'Náhled',
            'restore' => 'Obnovit',
            'restore_confirm' => 'Opravdu chcete obnovit verzi :version? Aktuální obsah bude nejprve uložen jako nová verze.',
            'restored' => 'Verze :version byla obnovena.',
            'empty' => 'Historie verzí není k dispozici.',
        ],

        'notices' => [
            'locked' => 'Tato šablona je uzamčena. Pole klíč a kategorie nelze změnit.',
        ],

        'language_label' => 'Jazyk: :locale',

        'replicate_suffix' => '(Kopie)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Napsat e-mail',
        'title_with_name' => 'Napsat: :name',

        'sections' => [
            'recipients' => 'Příjemci',
            'content' => 'Obsah e-mailu',
            'attachments' => 'Přílohy',
            'tokens' => 'Dostupné Tokens',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Komu',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Zadejte e-mailové adresy',
            'cc_placeholder' => 'CC adresy',
            'bcc_placeholder' => 'BCC adresy',
            'locale' => 'Jazyk',
            'subject' => 'Předmět',
            'preheader' => 'Náhled',
            'body' => 'Tělo',
            'attach_files' => 'Připojit soubory',
            'preheader_helper' => 'Text náhledu zobrazený v e-mailových klientech před otevřením',
            'no_tokens' => 'Pro tuto šablonu nejsou zdokumentovány žádné tokens. Tokens jako {{ user.name }} budou nahrazeny při odesílání prostřednictvím API/kódu.',
        ],

        'actions' => [
            'send' => 'Odeslat e-mail',
            'preview' => 'Náhled',
        ],

        'confirm' => [
            'heading' => 'Potvrdit odeslání',
            'description' => 'Jste si jisti, že chcete odeslat tento e-mail?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Příjemci',
            'content' => 'Obsah',
            'attachments' => 'Přílohy',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Komu',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Šablona',
            'subject' => 'Předmět',
            'to_placeholder' => 'Zadejte e-mailové adresy',
            'cc_placeholder' => 'Zadejte CC adresy',
            'bcc_placeholder' => 'Zadejte BCC adresy',
            'auto_attached' => 'Automaticky připojené soubory',
            'auto_attached_none' => 'Žádné',
            'additional_attachments' => 'Další přílohy',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Odeslat e-mail',
        'modal_heading' => 'Napsat e-mail',
        'submit' => 'Odeslat',

        'notifications' => [
            'sent' => 'E-mail byl úspěšně odeslán',
            'sent_body' => 'Odesláno na: :recipients',
            'failed' => 'Odeslání e-mailu se nezdařilo',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Detaily motivu',
            'background' => 'Pozadí a rozložení',
            'background_description' => 'Hlavní strukturální barvy pro rozložení e-mailu.',
            'typography' => 'Typografie',
            'typography_description' => 'Barvy pro text a nadpisy.',
            'buttons' => 'Tlačítka',
            'buttons_description' => 'Stylování tlačítek výzvy k akci.',
            'footer' => 'Zápatí',
            'footer_description' => 'Stylování oblasti zápatí.',
            'preview' => 'Náhled',
        ],

        'fields' => [
            'name' => 'Název',
            'is_default' => 'Výchozí motiv',
            'is_default_helper' => 'Výchozí motiv se použije u šablon, které nemají zadaný motiv.',
            'page_background' => 'Pozadí stránky',
            'content_background' => 'Pozadí obsahu',
            'border' => 'Ohraničení',
            'headings' => 'Nadpisy',
            'body_text' => 'Text těla',
            'secondary_text' => 'Sekundární text',
            'links' => 'Odkazy',
            'button_background' => 'Pozadí tlačítka',
            'button_text' => 'Text tlačítka',
            'primary_accent' => 'Primární/Zvýraznění',
            'footer_background' => 'Pozadí zápatí',
            'footer_text' => 'Text zápatí',
        ],

        'columns' => [
            'primary' => 'Primární',
            'background' => 'Pozadí',
            'text' => 'Text',
            'button' => 'Tlačítko',
            'default' => 'Výchozí',
            'templates' => 'Šablony',
            'updated_at' => 'Aktualizováno',
        ],

        'replicate_suffix' => '(Kopie)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Komu',
            'template' => 'Šablona',
            'template_placeholder' => 'Vlastní',
            'sent_by' => 'Odesláno',
            'subject' => 'Předmět',
            'status' => 'Stav',
            'sent_by_placeholder' => 'Systém',
            'related_to' => 'Souvisí s',
            'sent_at' => 'Odesláno',
        ],

        'filters' => [
            'from' => 'Od',
            'until' => 'Do',
        ],

        'actions' => [
            'view' => 'Zobrazit',
            'resend' => 'Přeposlat',
            'resend_description' => 'Tímto odešlete novou kopii e-mailu původním příjemcům.',
        ],

        'preview' => [
            'from' => 'Od:',
            'to' => 'Komu:',
            'cc' => 'Kopie:',
            'template' => 'Šablona:',
            'sent' => 'Odesláno:',
            'sent_not_yet' => 'Zatím ne',
            'status' => 'Stav:',
            'no_body' => 'Tělo e-mailu nebylo uloženo. Povolte <code>logging.store_rendered_body</code> v nastavení pro uložení obsahu e-mailu.',
            'error' => 'Podrobnosti chyby',
        ],
        'notifications' => [
            'resent' => 'E-mail byl úspěšně přeposlán',
            'resend_failed' => 'Přeposlání e-mailu se nezdařilo',
        ],

        'errors' => [
            'no_rendered_body' => 'Nelze přeposlat: není uložen vyrenderovaný obsah. Povolte logging.store_rendered_body v nastavení.',
            'no_template' => 'Původní šablona již neexistuje.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Odeslané e-maily',

        'columns' => [
            'to' => 'Komu',
            'template' => 'Šablona',
            'subject' => 'Předmět',
            'status' => 'Stav',
            'sent_by' => 'Odesláno',
            'sent_by_placeholder' => 'Systém',
            'sent_at' => 'Odesláno',
        ],

        'actions' => [
            'view' => 'Zobrazit',
            'resend' => 'Přeposlat',
            'resend_confirm' => 'Jste si jisti, že chcete tento e-mail přeposlat?',
        ],

        'notifications' => [
            'resent' => 'E-mail byl úspěšně přeposlán',
            'resend_failed' => 'Přeposlání se nezdařilo',
        ],

        'empty' => [
            'heading' => 'Žádné odeslané e-maily',
            'description' => 'E-maily odeslané pro tento záznam se zobrazí zde.',
        ],

        'errors' => [
            'no_body' => 'Nelze přeposlat: není uložen vyrenderovaný obsah ani šablona.',
            'no_template' => 'Původní šablona již neexistuje.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Nastavení e-mailu',

        'tabs' => [
            'general' => 'Obecné',
            'branding' => 'Značka',
            'logging' => 'Protokolování',
            'attachments' => 'Přílohy',
            'auth_emails' => 'Ověřovací e-maily',
        ],

        'titles' => [
            'general' => 'Nastavení e-mailových šablon - Obecné',
            'branding' => 'Nastavení e-mailových šablon - Značka',
            'logging' => 'Nastavení e-mailových šablon - Protokolování',
            'attachments' => 'Nastavení e-mailových šablon - Přílohy',
            'auth_emails' => 'Nastavení e-mailových šablon - Ověřovací e-maily',
        ],

        'sections' => [
            'default_sender' => 'Výchozí odesílatel',
            'default_sender_description' => 'Výchozí adresa "Od" pro všechny e-maily odeslané pluginem.',
            'additional_senders' => 'Další odesílatelé',
            'add_additional_senders' => 'Přidat další odesílatele',
            'additional_senders_description' => 'Další adresy "Od", ze kterých mohou uživatelé vybírat při psaní e-mailů.',
            'localization' => 'Lokalizace',
            'categories' => 'Kategorie šablon',
            'logo' => 'Logo',
            'colors' => 'Barvy',
            'footer_links' => 'Odkazy v zápatí',
            'add_footer_links' => 'Přidat odkazy v zápatí',
            'customer_service' => 'Zákaznický servis',
            'logging' => 'Protokolování e-mailů',
            'logging_description' => 'Nastavte, jak se odeslané e-maily zaznamenávají v databázi.',
            'cleanup' => 'Plánované čištění',
            'cleanup_description' => 'Automaticky mazat staré záznamy o odeslaných e-mailech podle plánu.',
            'attachment_rules' => 'Pravidla příloh',
            'attachment_rules_description' => 'Nastavte limity pro přílohy souborů v psaných e-mailech.',
            'auth_emails' => 'Přepsání ověřovacích e-mailů',
            'auth_emails_description' => 'Nahraďte výchozí ověřovací e-maily aplikace vlastními šablonami.',
        ],

        'fields' => [
            'from_email' => 'E-mail odesílatele',
            'from_name' => 'Jméno odesílatele',
            'sender_email' => 'E-mail',
            'sender_name' => 'Zobrazované jméno',
            'sender_new' => 'Nový odesílatel',
            'default_locale' => 'Výchozí jazyk',
            'default_locale_helper' => 'Výchozí jazyk pro nové šablony (např. en, hu, de).',
            'languages' => 'Dostupné jazyky',
            'language_code' => 'Kód',
            'language_display' => 'Zobrazované jméno',
            'language_flag' => 'Ikona vlajky',
            'language_new' => 'Nový jazyk',
            'category_key' => 'Klíč',
            'category_label' => 'Popisek',
            'category_new' => 'Nová kategorie',
            'logo_url' => 'URL nebo cesta k logu',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Absolutní URL nebo cesta k vašemu e-mailovému logu.',
            'logo_width' => 'Šířka (px)',
            'logo_height' => 'Výška (px)',
            'content_width' => 'Šířka obsahu (px)',
            'primary_color' => 'Primární barva',
            'footer_link_label' => 'Popisek',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Nový odkaz',
            'support_email' => 'E-mail podpory',
            'support_phone' => 'Telefon podpory',
            'enable_logging' => 'Povolit protokolování',
            'enable_logging_helper' => 'Při vypnutí nebudou vytvářeny žádné záznamy o odeslaných e-mailech.',
            'store_rendered_body' => 'Uložit vyrenderovaný obsah',
            'store_rendered_body_helper' => 'Uložte konečné HTML každého odeslaného e-mailu. Vyžadováno pro funkce přeposlání a náhledu.',
            'retention_days' => 'Uchovávání (dny)',
            'retention_days_helper' => 'Automaticky smazat záznamy o odeslaných e-mailech po tomto počtu dnů. Ponechte prázdné pro trvalé uchování.',
            'cleanup_enabled' => 'Povolit plánované čištění',
            'cleanup_enabled_helper' => 'Automaticky spouštět příkaz čištění podle plánu.',
            'cleanup_frequency' => 'Frekvence čištění',
            'max_file_size' => 'Maximální velikost souboru (MB)',
            'allowed_extensions' => 'Povolené přípony souborů',
            'allowed_extensions_placeholder' => 'Přidejte příponu (např. pdf)',
            'allowed_extensions_helper' => 'Přípony souborů povolené pro nahrávání.',
            'override_verification' => 'Přepsat ověření e-mailu',
            'override_verification_helper' => 'Použijte šablonu "user-verify-email" místo výchozího ověřovacího e-mailu aplikace.',
            'override_password_reset' => 'Přepsat obnovení hesla',
            'override_password_reset_helper' => 'Použijte šablonu "user-password-reset" místo výchozího e-mailu pro obnovení hesla aplikace.',
            'override_welcome' => 'Přepsat uvítací e-mail',
            'override_welcome_helper' => 'Odeslat uvítací e-mail pomocí šablony "user-welcome" při registraci nového uživatele.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Všechna práva vyhrazena.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Koncept',
            2 => 'Ve frontě',
            3 => 'Odesláno',
            4 => 'Neúspěšné',
        ],

        'cleanup_frequency' => [
            1 => 'Denně',
            2 => 'Týdně',
            3 => 'Měsíčně',
        ],
    ],

];
