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
        'templates' => 'Szablony',
        'themes' => 'Motywy',
        'sent-emails' => 'Wysłane e-maile',
        'settings' => 'Ustawienia',
    ],

    'models' => [
        'email_template' => 'Szablon e-mail',
        'email_templates' => 'Szablony e-mail',
        'email_theme' => 'Motyw e-mail',
        'email_themes' => 'Motywy e-mail',
        'sent_email' => 'Wysłany e-mail',
        'sent_emails' => 'Wysłane e-maile',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Treść',
            'settings' => 'Ustawienia',
            'tokens' => 'Tokeny',
        ],

        'fields' => [
            'name' => 'Nazwa',
            'key' => 'Klucz',
            'key_helper' => 'Unikalny klucz używany w kodzie: np. "invoice-sent"',
            'category' => 'Kategoria',
            'subject' => 'Temat',
            'subject_helper' => 'Obsługuje tokeny: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Nagłówek wstępny',
            'preheader_helper' => 'Tekst podglądu wyświetlany w klientach pocztowych',
            'body' => 'Treść',
            'theme' => 'Motyw',
            'theme_placeholder' => 'Domyślny motyw',
            'is_active' => 'Aktywny',
            'is_active_helper' => 'Nieaktywne szablony nie mogą być używane do wysyłania',
            'tags' => 'Tagi',
            'tags_placeholder' => 'Dodaj tagi do organizacji',
            'from_address' => 'E-mail nadawcy',
            'from_name' => 'Nazwa nadawcy',
            'locale' => 'Język',
        ],

        'sections' => [
            'custom_sender' => 'Niestandardowy nadawca',
            'custom_sender_description' => 'Nadpisz domyślny adres nadawcy dla tego szablonu',
        ],

        'tokens' => [
            'label' => 'Dostępne tokeny',
            'helper' => 'Udokumentuj tokeny dostępne dla tego szablonu. Pomaga to redaktorom wiedzieć, jakich zmiennych mogą używać.',
            'token' => 'Token',
            'description' => 'Opis',
            'example' => 'Przykład',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Pełne imię i nazwisko odbiorcy',
            'example_placeholder' => 'Jan Kowalski',
            'new_item' => 'Nowy token',
        ],

        'blocks' => [
            'button' => 'Przycisk',
            'button_heading' => 'Wstaw przycisk',
            'button_label' => 'Tekst przycisku',
            'button_url' => 'URL',
            'button_align' => 'Wyrównanie',
            'align_left' => 'Do lewej',
            'align_center' => 'Do środka',
            'align_right' => 'Do prawej',
            'button_default_label' => 'Kliknij tutaj',
        ],

        'columns' => [
            'locales' => 'Języki',
            'active' => 'Aktywny',
            'locked' => 'Zablokowany',
            'sent' => 'Wysłano',
            'updated_at' => 'Zaktualizowano',
        ],

        'actions' => [
            'preview' => 'Podgląd',
            'send_test' => 'Wyślij test',
            'send_test_field' => 'Wyślij do',
            'send_test_locale' => 'Język',
            'compose' => 'Napisz e-mail',
            'version_history' => 'Historia wersji',
            'back_to_templates' => 'Powrót do szablonów',
        ],

        'notifications' => [
            'test_sent' => 'Testowy e-mail wysłany!',
            'test_sent_body' => 'Wysłano do :email',
            'test_failed' => 'Nie udało się wysłać testowego e-maila',
            'saved' => 'Szablon zapisany',
            'saved_body' => 'Migawka wersji została zapisana automatycznie.',
            'locked_skipped' => 'Zablokowane szablony pominięte',
            'locked_skipped_body' => ':count zablokowany(ch) szablon(ów) zostało pominiętych i nie usunięto.',
        ],

        'tooltips' => [
            'locked' => 'Ten szablon jest zablokowany — klucz i kategoria są tylko do odczytu, usuwanie jest zablokowane.',
        ],

        'versioning' => [
            'date' => 'Data',
            'by' => 'Autor',
            'preview' => 'Podgląd',
            'restore' => 'Przywróć',
            'restore_confirm' => 'Czy na pewno chcesz przywrócić wersję :version? Bieżąca treść zostanie najpierw zapisana jako nowa wersja.',
            'restored' => 'Wersja :version przywrócona.',
            'empty' => 'Brak dostępnej historii wersji.',
        ],

        'notices' => [
            'locked' => 'Ten szablon jest zablokowany. Pola klucza i kategorii nie mogą być zmieniane.',
        ],

        'language_label' => 'Język: :locale',

        'replicate_suffix' => '(Kopia)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Napisz e-mail',
        'title_with_name' => 'Napisz: :name',

        'sections' => [
            'recipients' => 'Odbiorcy',
            'content' => 'Treść e-maila',
            'attachments' => 'Załączniki',
            'tokens' => 'Dostępne tokeny',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Do',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Wprowadź adresy e-mail',
            'cc_placeholder' => 'Adresy CC',
            'bcc_placeholder' => 'Adresy BCC',
            'locale' => 'Język',
            'subject' => 'Temat',
            'preheader' => 'Nagłówek wstępny',
            'body' => 'Treść',
            'attach_files' => 'Dołącz pliki',
            'preheader_helper' => 'Tekst podglądu wyświetlany w klientach pocztowych przed otwarciem',
            'no_tokens' => 'Brak udokumentowanych tokenów dla tego szablonu. Tokeny takie jak {{ user.name }} zostaną zastąpione podczas wysyłania przez API/kod.',
        ],

        'actions' => [
            'send' => 'Wyślij e-mail',
            'preview' => 'Podgląd',
        ],

        'confirm' => [
            'heading' => 'Potwierdź wysłanie',
            'description' => 'Czy na pewno chcesz wysłać tego e-maila?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Odbiorcy',
            'content' => 'Treść',
            'attachments' => 'Załączniki',
        ],

        'fields' => [
            'from' => 'Od',
            'to' => 'Do',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Szablon',
            'subject' => 'Temat',
            'to_placeholder' => 'Wprowadź adresy e-mail',
            'cc_placeholder' => 'Wprowadź adresy CC',
            'bcc_placeholder' => 'Wprowadź adresy BCC',
            'auto_attached' => 'Automatycznie dołączone pliki',
            'auto_attached_none' => 'Brak',
            'additional_attachments' => 'Dodatkowe załączniki',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Wyślij e-mail',
        'modal_heading' => 'Napisz e-mail',
        'submit' => 'Wyślij',

        'notifications' => [
            'sent' => 'E-mail wysłany pomyślnie',
            'sent_body' => 'Wysłano do: :recipients',
            'failed' => 'Nie udało się wysłać e-maila',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Szczegóły motywu',
            'background' => 'Tło i układ',
            'background_description' => 'Główne kolory strukturalne układu e-maila.',
            'typography' => 'Typografia',
            'typography_description' => 'Kolory tekstu i nagłówków.',
            'buttons' => 'Przyciski',
            'buttons_description' => 'Stylizacja przycisków akcji.',
            'footer' => 'Stopka',
            'footer_description' => 'Stylizacja obszaru stopki.',
            'preview' => 'Podgląd',
        ],

        'fields' => [
            'name' => 'Nazwa',
            'is_default' => 'Domyślny motyw',
            'is_default_helper' => 'Domyślny motyw jest stosowany do szablonów, które nie określają motywu.',
            'page_background' => 'Tło strony',
            'content_background' => 'Tło treści',
            'border' => 'Obramowanie',
            'headings' => 'Nagłówki',
            'body_text' => 'Tekst treści',
            'secondary_text' => 'Tekst dodatkowy',
            'links' => 'Linki',
            'button_background' => 'Tło przycisku',
            'button_text' => 'Tekst przycisku',
            'primary_accent' => 'Kolor główny/akcentowy',
            'footer_background' => 'Tło stopki',
            'footer_text' => 'Tekst stopki',
        ],

        'columns' => [
            'primary' => 'Główny',
            'background' => 'Tło',
            'text' => 'Tekst',
            'button' => 'Przycisk',
            'default' => 'Domyślny',
            'templates' => 'Szablony',
            'updated_at' => 'Zaktualizowano',
        ],

        'replicate_suffix' => '(Kopia)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Do',
            'template' => 'Szablon',
            'template_placeholder' => 'Niestandardowy',
            'sent_by' => 'Wysłano przez',
            'subject' => 'Temat',
            'status' => 'Status',
            'sent_by_placeholder' => 'System',
            'related_to' => 'Powiązany z',
            'sent_at' => 'Wysłano',
        ],

        'filters' => [
            'from' => 'Od',
            'until' => 'Do',
        ],

        'actions' => [
            'view' => 'Zobacz',
            'resend' => 'Wyślij ponownie',
            'resend_description' => 'Spowoduje to wysłanie nowej kopii e-maila do oryginalnych odbiorców.',
        ],

        'preview' => [
            'from' => 'Od:',
            'to' => 'Do:',
            'cc' => 'DW:',
            'template' => 'Szablon:',
            'sent' => 'Wysłano:',
            'sent_not_yet' => 'Jeszcze nie',
            'status' => 'Status:',
            'no_body' => 'Treść wiadomości e-mail nie została zapisana. Włącz <code>logging.store_rendered_body</code> w ustawieniach, aby zapisywać treść wiadomości.',
            'error' => 'Szczegóły błędu',
        ],
        'notifications' => [
            'resent' => 'E-mail wysłany ponownie pomyślnie',
            'resend_failed' => 'Nie udało się ponownie wysłać e-maila',
        ],

        'errors' => [
            'no_rendered_body' => 'Nie można ponownie wysłać: brak zapisanej wyrenderowanej treści. Włącz logging.store_rendered_body w ustawieniach.',
            'no_template' => 'Oryginalny szablon już nie istnieje.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Wysłane e-maile',

        'columns' => [
            'to' => 'Do',
            'template' => 'Szablon',
            'subject' => 'Temat',
            'status' => 'Status',
            'sent_by' => 'Wysłano przez',
            'sent_by_placeholder' => 'System',
            'sent_at' => 'Wysłano',
        ],

        'actions' => [
            'view' => 'Zobacz',
            'resend' => 'Wyślij ponownie',
            'resend_confirm' => 'Czy na pewno chcesz ponownie wysłać tego e-maila?',
        ],

        'notifications' => [
            'resent' => 'E-mail wysłany ponownie pomyślnie',
            'resend_failed' => 'Nie udało się ponownie wysłać',
        ],

        'empty' => [
            'heading' => 'Brak wysłanych e-maili',
            'description' => 'E-maile wysłane dla tego rekordu pojawią się tutaj.',
        ],

        'errors' => [
            'no_body' => 'Nie można ponownie wysłać: brak zapisanej wyrenderowanej treści lub szablonu.',
            'no_template' => 'Oryginalny szablon już nie istnieje.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Ustawienia e-mail',

        'tabs' => [
            'general' => 'Ogólne',
            'branding' => 'Marka',
            'logging' => 'Logowanie',
            'attachments' => 'Załączniki',
            'auth_emails' => 'E-maile uwierzytelniania',
        ],

        'titles' => [
            'general' => 'Ustawienia szablonów e-mail - Ogólne',
            'branding' => 'Ustawienia szablonów e-mail - Marka',
            'logging' => 'Ustawienia szablonów e-mail - Logowanie',
            'attachments' => 'Ustawienia szablonów e-mail - Załączniki',
            'auth_emails' => 'Ustawienia szablonów e-mail - E-maile uwierzytelniania',
        ],

        'sections' => [
            'default_sender' => 'Domyślny nadawca',
            'default_sender_description' => 'Domyślny adres "Od" dla wszystkich e-maili wysyłanych przez wtyczkę.',
            'additional_senders' => 'Dodatkowi nadawcy',
            'add_additional_senders' => 'Dodaj dodatkowych nadawców',
            'additional_senders_description' => 'Dodatkowe adresy "Od", które użytkownicy mogą wybrać podczas pisania e-maili.',
            'localization' => 'Lokalizacja',
            'categories' => 'Kategorie szablonów',
            'logo' => 'Logo',
            'colors' => 'Kolory',
            'footer_links' => 'Linki stopki',
            'add_footer_links' => 'Dodaj linki w stopce',
            'customer_service' => 'Obsługa klienta',
            'logging' => 'Logowanie e-maili',
            'logging_description' => 'Kontroluj, jak wysłane e-maile są rejestrowane w bazie danych.',
            'cleanup' => 'Zaplanowane czyszczenie',
            'cleanup_description' => 'Automatycznie usuwaj stare rekordy wysłanych e-maili zgodnie z harmonogramem.',
            'attachment_rules' => 'Reguły załączników',
            'attachment_rules_description' => 'Skonfiguruj limity dla załączników plików w pisanych e-mailach.',
            'auth_emails' => 'Nadpisywanie e-maili uwierzytelniania',
            'auth_emails_description' => 'Nadpisz domyślne e-maile uwierzytelniania aplikacji swoimi niestandardowymi szablonami.',
        ],

        'fields' => [
            'from_email' => 'E-mail nadawcy',
            'from_name' => 'Nazwa nadawcy',
            'sender_email' => 'E-mail',
            'sender_name' => 'Nazwa wyświetlana',
            'sender_new' => 'Nowy nadawca',
            'default_locale' => 'Domyślny język',
            'default_locale_helper' => 'Domyślny język dla nowych szablonów (np. en, hu, de).',
            'languages' => 'Dostępne języki',
            'language_code' => 'Kod',
            'language_display' => 'Nazwa wyświetlana',
            'language_flag' => 'Ikona flagi',
            'language_new' => 'Nowy język',
            'category_key' => 'Klucz',
            'category_label' => 'Etykieta',
            'category_new' => 'Nowa kategoria',
            'logo_url' => 'URL lub ścieżka logo',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Bezwzględny URL lub ścieżka do logo e-maila.',
            'logo_width' => 'Szerokość (px)',
            'logo_height' => 'Wysokość (px)',
            'content_width' => 'Szerokość treści (px)',
            'primary_color' => 'Kolor główny',
            'footer_link_label' => 'Etykieta',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Nowy link',
            'support_email' => 'E-mail wsparcia',
            'support_phone' => 'Telefon wsparcia',
            'enable_logging' => 'Włącz logowanie',
            'enable_logging_helper' => 'Po wyłączeniu nie będą tworzone rekordy wysłanych e-maili.',
            'store_rendered_body' => 'Zapisuj wyrenderowaną treść',
            'store_rendered_body_helper' => 'Zapisz końcowy HTML każdego wysłanego e-maila. Wymagane dla funkcji ponownego wysyłania i podglądu.',
            'retention_days' => 'Okres przechowywania (dni)',
            'retention_days_helper' => 'Automatycznie usuwaj rekordy wysłanych e-maili po tylu dniach. Pozostaw puste, aby przechowywać na zawsze.',
            'cleanup_enabled' => 'Włącz zaplanowane czyszczenie',
            'cleanup_enabled_helper' => 'Automatycznie uruchamiaj polecenie czyszczenia zgodnie z harmonogramem.',
            'cleanup_frequency' => 'Częstotliwość czyszczenia',
            'max_file_size' => 'Maksymalny rozmiar pliku (MB)',
            'allowed_extensions' => 'Dozwolone rozszerzenia plików',
            'allowed_extensions_placeholder' => 'Dodaj rozszerzenie (np. pdf)',
            'allowed_extensions_helper' => 'Rozszerzenia plików dozwolone do przesyłania.',
            'override_verification' => 'Nadpisz weryfikację e-mail',
            'override_verification_helper' => 'Użyj szablonu "user-verify-email" zamiast domyślnego e-maila weryfikacyjnego aplikacji.',
            'override_password_reset' => 'Nadpisz resetowanie hasła',
            'override_password_reset_helper' => 'Użyj szablonu "user-password-reset" zamiast domyślnego e-maila resetowania hasła aplikacji.',
            'override_welcome' => 'Nadpisz e-mail powitalny',
            'override_welcome_helper' => 'Wyślij e-mail powitalny za pomocą szablonu "user-welcome", gdy nowy użytkownik się zarejestruje.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Wszelkie prawa zastrzeżone.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Wersja robocza',
            2 => 'W kolejce',
            3 => 'Wysłano',
            4 => 'Niepowodzenie',
        ],

        'cleanup_frequency' => [
            1 => 'Codziennie',
            2 => 'Co tydzień',
            3 => 'Co miesiąc',
        ],
    ],

];
