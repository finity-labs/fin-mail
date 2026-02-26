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
        'templates' => 'Sablonok',
        'themes' => 'Témák',
        'sent-emails' => 'Elküldött e-mailek',
        'settings' => 'Beállítások',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Tartalom',
            'settings' => 'Beállítások',
            'tokens' => 'Tokenek',
        ],

        'fields' => [
            'name' => 'Név',
            'key' => 'Kulcs',
            'key_helper' => 'Egyedi kulcs a kódban: pl. „invoice-sent"',
            'category' => 'Kategória',
            'subject' => 'Tárgy',
            'subject_helper' => 'Támogatja a tokeneket: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Előnézeti szöveg',
            'preheader_helper' => 'Az e-mail kliensekben megjelenő előnézeti szöveg',
            'body' => 'Tartalom',
            'theme' => 'Téma',
            'theme_placeholder' => 'Alapértelmezett téma',
            'is_active' => 'Aktív',
            'is_active_helper' => 'Inaktív sablonok nem használhatók küldésre',
            'tags' => 'Címkék',
            'tags_placeholder' => 'Címkék hozzáadása a rendszerezéshez',
            'from_address' => 'Feladó e-mail',
            'from_name' => 'Feladó neve',
        ],

        'sections' => [
            'custom_sender' => 'Egyéni feladó',
            'custom_sender_description' => 'Az alapértelmezett feladó cím felülírása ehhez a sablonhoz',
        ],

        'tokens' => [
            'label' => 'Elérhető tokenek',
            'helper' => 'Dokumentálja a sablonhoz elérhető tokeneket. Ez segíti a szerkesztőket, hogy tudják, milyen változókat használhatnak.',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'A címzett teljes neve',
            'example_placeholder' => 'Kovács János',
            'new_item' => 'Új token',
        ],

        'columns' => [
            'locales' => 'Nyelvek',
            'active' => 'Aktív',
            'sent' => 'Elküldve',
        ],

        'actions' => [
            'preview' => 'Előnézet',
            'send_test' => 'Teszt küldése',
            'send_test_field' => 'Küldés ide',
            'compose' => 'E-mail írása',
            'version_history' => 'Verziótörténet',
            'back_to_templates' => 'Vissza a sablonokhoz',
        ],

        'notifications' => [
            'test_sent' => 'Teszt e-mail elküldve!',
            'test_sent_body' => 'Elküldve ide: :email',
            'test_failed' => 'Nem sikerült elküldeni a teszt e-mailt',
            'saved' => 'Sablon mentve',
            'saved_body' => 'A verzió pillanatkép automatikusan mentésre került.',
        ],

        'language_label' => 'Nyelv: :locale',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'E-mail írása',
        'title_with_name' => 'Írás: :name',

        'sections' => [
            'recipients' => 'Címzettek',
            'content' => 'E-mail tartalma',
            'attachments' => 'Mellékletek',
            'tokens' => 'Elérhető tokenek',
        ],

        'fields' => [
            'from' => 'Feladó',
            'to' => 'Címzett',
            'cc' => 'Másolat',
            'bcc' => 'Titkos másolat',
            'to_placeholder' => 'E-mail címek megadása',
            'cc_placeholder' => 'Másolat címek',
            'bcc_placeholder' => 'Titkos másolat címek',
            'attach_files' => 'Fájlok csatolása',
            'preheader_helper' => 'Előnézeti szöveg, amely az e-mail kliensekben megnyitás előtt jelenik meg',
            'no_tokens' => 'Nincsenek dokumentált tokenek ehhez a sablonhoz. A {{ user.name }} típusú tokenek az API/kód általi küldéskor kerülnek behelyettesítésre.',
        ],

        'actions' => [
            'send' => 'E-mail küldése',
            'preview' => 'Előnézet',
        ],

        'confirm' => [
            'heading' => 'Küldés megerősítése',
            'description' => 'Biztosan el szeretné küldeni ezt az e-mailt?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Címzettek',
            'content' => 'Tartalom',
            'attachments' => 'Mellékletek',
        ],

        'fields' => [
            'from' => 'Feladó',
            'to' => 'Címzett',
            'cc' => 'Másolat',
            'bcc' => 'Titkos másolat',
            'template' => 'Sablon',
            'subject' => 'Tárgy',
            'to_placeholder' => 'E-mail címek megadása',
            'cc_placeholder' => 'Másolat címek megadása',
            'bcc_placeholder' => 'Titkos másolat címek megadása',
            'auto_attached' => 'Automatikusan csatolt fájlok',
            'auto_attached_none' => 'Nincs',
            'additional_attachments' => 'További mellékletek',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'E-mail küldése',
        'modal_heading' => 'E-mail írása',
        'submit' => 'Küldés',

        'notifications' => [
            'sent' => 'E-mail sikeresen elküldve',
            'sent_body' => 'Elküldve: :recipients',
            'failed' => 'Nem sikerült elküldeni az e-mailt',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Téma részletei',
            'background' => 'Háttér és elrendezés',
            'background_description' => 'Az e-mail elrendezés fő szerkezeti színei.',
            'typography' => 'Tipográfia',
            'typography_description' => 'Színek a szöveghez és címsorokhoz.',
            'buttons' => 'Gombok',
            'buttons_description' => 'Cselekvésre ösztönző gombok stílusa.',
            'footer' => 'Lábléc',
            'footer_description' => 'Lábléc terület stílusa.',
            'preview' => 'Előnézet',
        ],

        'fields' => [
            'name' => 'Név',
            'is_default' => 'Alapértelmezett téma',
            'is_default_helper' => 'Az alapértelmezett téma azokon a sablonokon lesz alkalmazva, amelyeknél nincs megadva téma.',
            'page_background' => 'Oldal háttér',
            'content_background' => 'Tartalom háttér',
            'border' => 'Szegély',
            'headings' => 'Címsorok',
            'body_text' => 'Szövegtörzs',
            'secondary_text' => 'Másodlagos szöveg',
            'links' => 'Hivatkozások',
            'button_background' => 'Gomb háttér',
            'button_text' => 'Gomb szöveg',
            'primary_accent' => 'Elsődleges/Kiemelés',
            'footer_background' => 'Lábléc háttér',
            'footer_text' => 'Lábléc szöveg',
        ],

        'columns' => [
            'primary' => 'Elsődleges',
            'background' => 'Háttér',
            'text' => 'Szöveg',
            'button' => 'Gomb',
            'default' => 'Alapértelmezett',
            'templates' => 'Sablonok',
        ],

        'replicate_suffix' => '(Másolat)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Címzett',
            'template' => 'Sablon',
            'template_placeholder' => 'Egyéni',
            'sent_by' => 'Küldte',
            'sent_by_placeholder' => 'Rendszer',
            'related_to' => 'Kapcsolódik',
            'sent_at' => 'Elküldve',
        ],

        'filters' => [
            'from' => 'Ettől',
            'until' => 'Eddig',
        ],

        'actions' => [
            'view' => 'Megtekintés',
            'resend' => 'Újraküldés',
            'resend_description' => 'Az e-mail egy új példánya kerül elküldésre az eredeti címzetteknek.',
        ],

        'notifications' => [
            'resent' => 'E-mail újraküldve',
            'resend_failed' => 'Újraküldés sikertelen',
        ],

        'errors' => [
            'no_rendered_body' => 'Nem lehet újraküldeni: nincs tárolt renderelt tartalom. Engedélyezze a logging.store_rendered_body opciót a beállításokban.',
            'no_template' => 'Az eredeti sablon már nem létezik.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Elküldött e-mailek',

        'columns' => [
            'to' => 'Címzett',
            'template' => 'Sablon',
            'sent_by' => 'Küldte',
            'sent_by_placeholder' => 'Rendszer',
            'sent_at' => 'Elküldve',
        ],

        'actions' => [
            'view' => 'Megtekintés',
            'resend' => 'Újraküldés',
            'resend_confirm' => 'Biztosan újra szeretné küldeni ezt az e-mailt?',
        ],

        'notifications' => [
            'resent' => 'E-mail újraküldve',
            'resend_failed' => 'Újraküldés sikertelen',
        ],

        'empty' => [
            'heading' => 'Nincsenek elküldött e-mailek',
            'description' => 'Az ehhez a rekordhoz küldött e-mailek itt jelennek meg.',
        ],

        'errors' => [
            'no_body' => 'Nem lehet újraküldeni: nincs tárolt renderelt tartalom vagy sablon.',
            'no_template' => 'Az eredeti sablon már nem létezik.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'E-mail beállítások',

        'tabs' => [
            'general' => 'Általános',
            'branding' => 'Márkajelzés',
            'logging' => 'Naplózás',
            'attachments' => 'Mellékletek',
            'auth_emails' => 'Auth e-mailek',
        ],

        'sections' => [
            'default_sender' => 'Alapértelmezett feladó',
            'default_sender_description' => 'Az alapértelmezett feladó cím a bővítmény által küldött összes e-mailhez.',
            'additional_senders' => 'További feladók',
            'additional_senders_description' => 'További feladó címek, amelyeket a felhasználók választhatnak e-mail írásakor.',
            'localization' => 'Nyelvesítés',
            'categories' => 'Sablon kategóriák',
            'logo' => 'Logó',
            'colors' => 'Színek',
            'footer_links' => 'Lábléc hivatkozások',
            'customer_service' => 'Ügyfélszolgálat',
            'logging' => 'E-mail naplózás',
            'logging_description' => 'Az elküldött e-mailek adatbázisban történő rögzítésének vezérlése.',
            'cleanup' => 'Ütemezett tisztítás',
            'cleanup_description' => 'Régi elküldött e-mail bejegyzések automatikus törlése ütemezetten.',
            'attachment_rules' => 'Melléklet szabályok',
            'attachment_rules_description' => 'Fájlmellékletek korlátainak beállítása a szerkesztett e-mailekhez.',
            'auth_emails' => 'Auth e-mail felülírások',
            'auth_emails_description' => 'A Laravel alapértelmezett hitelesítési e-mailjeinek felülírása egyéni sablonokkal.',
        ],

        'fields' => [
            'from_email' => 'Feladó e-mail',
            'from_name' => 'Feladó neve',
            'sender_email' => 'E-mail',
            'sender_name' => 'Megjelenítési név',
            'sender_new' => 'Új feladó',
            'default_locale' => 'Alapértelmezett nyelv',
            'default_locale_helper' => 'Az új sablonok alapértelmezett nyelve (pl. en, hu, de).',
            'languages' => 'Elérhető nyelvek',
            'language_code' => 'Kód',
            'language_display' => 'Megjelenítési név',
            'language_flag' => 'Zászló ikon',
            'language_new' => 'Új nyelv',
            'category_key' => 'Kulcs',
            'category_label' => 'Címke',
            'category_new' => 'Új kategória',
            'logo_url' => 'Logó URL vagy útvonal',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Abszolút URL vagy útvonal az e-mail logóhoz.',
            'logo_width' => 'Szélesség (px)',
            'logo_height' => 'Magasság (px)',
            'content_width' => 'Tartalom szélesség (px)',
            'primary_color' => 'Elsődleges szín',
            'footer_link_label' => 'Címke',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Új hivatkozás',
            'support_email' => 'Támogatási e-mail',
            'support_phone' => 'Támogatási telefon',
            'enable_logging' => 'Naplózás engedélyezése',
            'enable_logging_helper' => 'Kikapcsolás esetén nem jönnek létre elküldött e-mail bejegyzések.',
            'store_rendered_body' => 'Renderelt tartalom tárolása',
            'store_rendered_body_helper' => 'Minden elküldött e-mail végleges HTML-jének mentése. Szükséges az újraküldés és előnézet funkciókhoz.',
            'retention_days' => 'Megőrzés (napok)',
            'retention_days_helper' => 'Elküldött e-mail bejegyzések automatikus törlése ennyi nap után. Hagyja üresen a végleges megőrzéshez.',
            'cleanup_enabled' => 'Ütemezett tisztítás engedélyezése',
            'cleanup_enabled_helper' => 'A tisztítás parancs automatikus futtatása ütemezetten.',
            'cleanup_frequency' => 'Tisztítás gyakorisága',
            'max_file_size' => 'Max. fájlméret (MB)',
            'allowed_extensions' => 'Engedélyezett kiterjesztések',
            'allowed_extensions_placeholder' => 'Kiterjesztés hozzáadása (pl. pdf)',
            'allowed_extensions_helper' => 'Feltöltéshez engedélyezett fájlkiterjesztések.',
            'override_verification' => 'E-mail-megerősítés felülírása',
            'override_verification_helper' => 'A „user-verify-email" sablon használata a Laravel alapértelmezett megerősítő e-mailje helyett.',
            'override_password_reset' => 'Jelszó-visszaállítás felülírása',
            'override_password_reset_helper' => 'A „user-password-reset" sablon használata a Laravel alapértelmezett jelszó-visszaállító e-mailje helyett.',
            'override_welcome' => 'Üdvözlő e-mail felülírása',
            'override_welcome_helper' => 'Üdvözlő e-mail küldése a „user-welcome" sablonnal új felhasználó regisztrálásakor.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Piszkozat',
            2 => 'Várakozik',
            3 => 'Elküldve',
            4 => 'Sikertelen',
        ],

        'cleanup_frequency' => [
            1 => 'Naponta',
            2 => 'Hetente',
            3 => 'Havonta',
        ],
    ],

];
