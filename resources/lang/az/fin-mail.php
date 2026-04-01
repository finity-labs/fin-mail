<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'E-poçt',
        'templates' => 'Şablonlar',
        'themes' => 'Mövzular',
        'sent-emails' => 'Göndərilmiş e-poçtlar',
        'settings' => 'Parametrlər',
    ],

    'models' => [
        'email_template' => 'E-poçt şablonu',
        'email_templates' => 'E-poçt şablonları',
        'email_theme' => 'E-poçt mövzusu',
        'email_themes' => 'E-poçt mövzuları',
        'sent_email' => 'Göndərilmiş e-poçt',
        'sent_emails' => 'Göndərilmiş e-poçtlar',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Məzmun',
            'settings' => 'Parametrlər',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Ad',
            'key' => 'Açar',
            'key_helper' => 'Kodda istifadə olunan unikal açar: məs. "invoice-sent"',
            'category' => 'Kateqoriya',
            'subject' => 'Mövzu',
            'subject_helper' => 'Tokens dəstəklənir: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Ön başlıq',
            'preheader_helper' => 'E-poçt proqramlarında göstərilən önizləmə mətni',
            'body' => 'Mətn',
            'theme' => 'Mövzu',
            'theme_placeholder' => 'Standart mövzu',
            'is_active' => 'Aktiv',
            'is_active_helper' => 'Aktiv olmayan şablonlar göndərmək üçün istifadə edilə bilməz',
            'tags' => 'Etiketlər',
            'tags_placeholder' => 'Təşkilatlandırma üçün etiketlər əlavə edin',
            'from_address' => 'Göndərən e-poçt',
            'from_name' => 'Göndərən adı',
            'locale' => 'Dil',
        ],

        'sections' => [
            'custom_sender' => 'Xüsusi göndərən',
            'custom_sender_description' => 'Bu şablon üçün standart göndərən ünvanını dəyişdirin',
        ],

        'tokens' => [
            'label' => 'Mövcud Tokens',
            'helper' => 'Bu şablon üçün mövcud tokens sənədləşdirin. Bu, redaktorlara hansı dəyişənləri istifadə edə biləcəklərini bilməyə kömək edir.',
            'token' => 'Token',
            'description' => 'Təsvir',
            'example' => 'Nümunə',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Alıcının tam adı',
            'example_placeholder' => 'Əli Həsənov',
            'new_item' => 'Yeni Token',
        ],

        'blocks' => [
            'button' => 'Düymə',
            'button_heading' => 'Düymə daxil et',
            'button_label' => 'Düymə mətni',
            'button_url' => 'URL',
            'button_align' => 'Düzləndirmə',
            'align_left' => 'Sol',
            'align_center' => 'Mərkəz',
            'align_right' => 'Sağ',
            'button_default_label' => 'Buraya klikləyin',
        ],

        'columns' => [
            'locales' => 'Dillər',
            'active' => 'Aktiv',
            'locked' => 'Kilidli',
            'sent' => 'Göndərildi',
            'updated_at' => 'Yeniləndi',
        ],

        'actions' => [
            'preview' => 'Önizləmə',
            'send_test' => 'Test göndər',
            'send_test_field' => 'Göndər',
            'send_test_locale' => 'Dil',
            'compose' => 'E-poçt yaz',
            'version_history' => 'Versiya tarixçəsi',
            'back_to_templates' => 'Şablonlara qayıt',
        ],

        'notifications' => [
            'test_sent' => 'Test e-poçtu göndərildi!',
            'test_sent_body' => ':email ünvanına göndərildi',
            'test_failed' => 'Test e-poçtunun göndərilməsi uğursuz oldu',
            'saved' => 'Şablon yadda saxlanıldı',
            'saved_body' => 'Versiya surəti avtomatik olaraq yadda saxlanıldı.',
            'locked_skipped' => 'Kilidli şablonlar keçildi',
            'locked_skipped_body' => ':count kilidli şablon keçildi və silinmədi.',
        ],

        'tooltips' => [
            'locked' => 'Bu şablon kilidlidir — açar və kateqoriya yalnız oxunur, silinmə qarşısı alınıb.',
        ],

        'versioning' => [
            'date' => 'Tarix',
            'by' => 'Tərəfindən',
            'preview' => 'Önizləmə',
            'restore' => 'Bərpa et',
            'restore_confirm' => ':version versiyasını bərpa etmək istədiyinizə əminsiniz? Cari məzmun əvvəlcə yeni versiya olaraq saxlanacaq.',
            'restored' => ':version versiyası bərpa edildi.',
            'empty' => 'Versiya tarixçəsi mövcud deyil.',
        ],

        'notices' => [
            'locked' => 'Bu şablon kilidlidir. Açar və kateqoriya sahələri dəyişdirilə bilməz.',
        ],

        'language_label' => 'Dil: :locale',

        'replicate_suffix' => '(Surət)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'E-poçt yaz',
        'title_with_name' => 'Yaz: :name',

        'sections' => [
            'recipients' => 'Alıcılar',
            'content' => 'E-poçt məzmunu',
            'attachments' => 'Əlavələr',
            'tokens' => 'Mövcud Tokens',
        ],

        'fields' => [
            'from' => 'Kimdən',
            'to' => 'Kimə',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'E-poçt ünvanlarını daxil edin',
            'cc_placeholder' => 'CC ünvanları',
            'bcc_placeholder' => 'BCC ünvanları',
            'locale' => 'Dil',
            'subject' => 'Mövzu',
            'preheader' => 'Ön başlıq',
            'body' => 'Mətn',
            'attach_files' => 'Fayl əlavə et',
            'preheader_helper' => 'Açılmadan əvvəl e-poçt proqramlarında göstərilən önizləmə mətni',
            'no_tokens' => 'Bu şablon üçün heç bir token sənədləşdirilməyib. {{ user.name }} kimi tokens API/kod vasitəsilə göndərildikdə əvəz olunacaq.',
        ],

        'actions' => [
            'send' => 'E-poçt göndər',
            'preview' => 'Önizləmə',
        ],

        'confirm' => [
            'heading' => 'Göndərməni təsdiqləyin',
            'description' => 'Bu e-poçtu göndərmək istədiyinizə əminsiniz?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Alıcılar',
            'content' => 'Məzmun',
            'attachments' => 'Əlavələr',
        ],

        'fields' => [
            'from' => 'Kimdən',
            'to' => 'Kimə',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Şablon',
            'subject' => 'Mövzu',
            'to_placeholder' => 'E-poçt ünvanlarını daxil edin',
            'cc_placeholder' => 'CC ünvanlarını daxil edin',
            'bcc_placeholder' => 'BCC ünvanlarını daxil edin',
            'auto_attached' => 'Avtomatik əlavə edilmiş fayllar',
            'auto_attached_none' => 'Heç biri',
            'additional_attachments' => 'Əlavə fayllar',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'E-poçt göndər',
        'modal_heading' => 'E-poçt yaz',
        'submit' => 'Göndər',

        'notifications' => [
            'sent' => 'E-poçt uğurla göndərildi',
            'sent_body' => 'Göndərildi: :recipients',
            'failed' => 'E-poçtun göndərilməsi uğursuz oldu',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Mövzu detalları',
            'background' => 'Arxa fon və yerləşmə',
            'background_description' => 'E-poçt yerləşməsi üçün əsas struktur rəngləri.',
            'typography' => 'Tipoqrafiya',
            'typography_description' => 'Mətn və başlıqlar üçün rənglər.',
            'buttons' => 'Düymələr',
            'buttons_description' => 'Hərəkətə çağırış düyməsi üslubu.',
            'footer' => 'Alt hissə',
            'footer_description' => 'Alt hissə sahəsinin üslubu.',
            'preview' => 'Önizləmə',
        ],

        'fields' => [
            'name' => 'Ad',
            'is_default' => 'Standart mövzu',
            'is_default_helper' => 'Standart mövzu, mövzu təyin olunmamış şablonlara tətbiq edilir.',
            'page_background' => 'Səhifə arxa fonu',
            'content_background' => 'Məzmun arxa fonu',
            'border' => 'Haşiyə',
            'headings' => 'Başlıqlar',
            'body_text' => 'Əsas mətn',
            'secondary_text' => 'İkinci dərəcəli mətn',
            'links' => 'Keçidlər',
            'button_background' => 'Düymə arxa fonu',
            'button_text' => 'Düymə mətni',
            'primary_accent' => 'Əsas/Vurğu',
            'footer_background' => 'Alt hissə arxa fonu',
            'footer_text' => 'Alt hissə mətni',
        ],

        'columns' => [
            'primary' => 'Əsas',
            'background' => 'Arxa fon',
            'text' => 'Mətn',
            'button' => 'Düymə',
            'default' => 'Standart',
            'templates' => 'Şablonlar',
            'updated_at' => 'Yeniləndi',
        ],

        'replicate_suffix' => '(Surət)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Kimə',
            'template' => 'Şablon',
            'template_placeholder' => 'Xüsusi',
            'sent_by' => 'Göndərən',
            'subject' => 'Mövzu',
            'status' => 'Vəziyyət',
            'sent_by_placeholder' => 'Sistem',
            'related_to' => 'Əlaqəli',
            'sent_at' => 'Göndərildi',
        ],

        'filters' => [
            'from' => 'Tarixdən',
            'until' => 'Tarixə qədər',
        ],

        'actions' => [
            'view' => 'Bax',
            'resend' => 'Yenidən göndər',
            'resend_description' => 'Bu, orijinal alıcılara e-poçtun yeni surətini göndərəcək.',
        ],


        'preview' => [
            'from' => 'Kimdən:',
            'to' => 'Kimə:',
            'cc' => 'Surət:',
            'template' => 'Şablon:',
            'sent' => 'Göndərildi:',
            'sent_not_yet' => 'Hələ yox',
            'status' => 'Status:',
            'no_body' => 'E-poçt məzmunu saxlanmayıb. E-poçt məzmununu saxlamaq üçün parametrlərdə <code>logging.store_rendered_body</code> seçimini aktivləşdirin.',
            'error' => 'Xəta Təfərrüatları'
        ],
        'notifications' => [
            'resent' => 'E-poçt uğurla yenidən göndərildi',
            'resend_failed' => 'E-poçtun yenidən göndərilməsi uğursuz oldu',
        ],

        'errors' => [
            'no_rendered_body' => 'Yenidən göndərmək mümkün deyil: heç bir işlənmiş məzmun saxlanılmayıb. Parametrlərdə logging.store_rendered_body aktivləşdirin.',
            'no_template' => 'Orijinal şablon artıq mövcud deyil.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Göndərilmiş e-poçtlar',

        'columns' => [
            'to' => 'Kimə',
            'template' => 'Şablon',
            'subject' => 'Mövzu',
            'status' => 'Vəziyyət',
            'sent_by' => 'Göndərən',
            'sent_by_placeholder' => 'Sistem',
            'sent_at' => 'Göndərildi',
        ],

        'actions' => [
            'view' => 'Bax',
            'resend' => 'Yenidən göndər',
            'resend_confirm' => 'Bu e-poçtu yenidən göndərmək istədiyinizə əminsiniz?',
        ],

        'notifications' => [
            'resent' => 'E-poçt uğurla yenidən göndərildi',
            'resend_failed' => 'Yenidən göndərmə uğursuz oldu',
        ],

        'empty' => [
            'heading' => 'Heç bir e-poçt göndərilməyib',
            'description' => 'Bu qeyd üçün göndərilmiş e-poçtlar burada görünəcək.',
        ],

        'errors' => [
            'no_body' => 'Yenidən göndərmək mümkün deyil: heç bir işlənmiş məzmun və ya şablon saxlanılmayıb.',
            'no_template' => 'Orijinal şablon artıq mövcud deyil.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'E-poçt parametrləri',

        'tabs' => [
            'general' => 'Ümumi',
            'branding' => 'Brendinq',
            'logging' => 'Qeydiyyat',
            'attachments' => 'Əlavələr',
            'auth_emails' => 'Autentifikasiya e-poçtları',
        ],

        'titles' => [
            'general' => 'E-poçt şablon parametrləri - Ümumi',
            'branding' => 'E-poçt şablon parametrləri - Brendinq',
            'logging' => 'E-poçt şablon parametrləri - Qeydiyyat',
            'attachments' => 'E-poçt şablon parametrləri - Əlavələr',
            'auth_emails' => 'E-poçt şablon parametrləri - Autentifikasiya e-poçtları',
        ],

        'sections' => [
            'default_sender' => 'Standart göndərən',
            'default_sender_description' => 'Plagin tərəfindən göndərilən bütün e-poçtlar üçün standart "Kimdən" ünvanı.',
            'additional_senders' => 'Əlavə göndərənlər',
            'add_additional_senders' => 'Əlavə Göndərənlər Əlavə Et',
            'additional_senders_description' => 'E-poçt yazarkən istifadəçilərin seçə biləcəyi əlavə "Kimdən" ünvanları.',
            'localization' => 'Lokallaşdırma',
            'categories' => 'Şablon kateqoriyaları',
            'logo' => 'Logo',
            'colors' => 'Rənglər',
            'footer_links' => 'Alt hissə keçidləri',
            'add_footer_links' => 'Altbilgi Keçidləri Əlavə Et',
            'customer_service' => 'Müştəri xidməti',
            'logging' => 'E-poçt qeydiyyatı',
            'logging_description' => 'Göndərilmiş e-poçtların verilənlər bazasında necə qeyd olunacağını idarə edin.',
            'cleanup' => 'Planlaşdırılmış təmizlik',
            'cleanup_description' => 'Köhnə göndərilmiş e-poçt qeydlərini planla avtomatik silin.',
            'attachment_rules' => 'Əlavə qaydaları',
            'attachment_rules_description' => 'Yazılmış e-poçtlarda fayl əlavələri üçün limitləri konfiqurasiya edin.',
            'auth_emails' => 'Autentifikasiya e-poçt dəyişiklikləri',
            'auth_emails_description' => 'Tətbiqin standart autentifikasiya e-poçtlarını xüsusi şablonlarınızla əvəz edin.',
        ],

        'fields' => [
            'from_email' => 'Göndərən e-poçt',
            'from_name' => 'Göndərən adı',
            'sender_email' => 'E-poçt',
            'sender_name' => 'Görünən ad',
            'sender_new' => 'Yeni göndərən',
            'default_locale' => 'Standart dil',
            'default_locale_helper' => 'Yeni şablonlar üçün standart dil (məs. en, hu, de).',
            'languages' => 'Mövcud dillər',
            'language_code' => 'Kod',
            'language_display' => 'Görünən ad',
            'language_flag' => 'Bayraq işarəsi',
            'language_new' => 'Yeni dil',
            'category_key' => 'Açar',
            'category_label' => 'Etiket',
            'category_new' => 'Yeni kateqoriya',
            'logo_url' => 'Logo URL və ya yolu',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'E-poçt logonuza mütləq URL və ya yol.',
            'logo_width' => 'En (px)',
            'logo_height' => 'Hündürlük (px)',
            'content_width' => 'Məzmun eni (px)',
            'primary_color' => 'Əsas rəng',
            'footer_link_label' => 'Etiket',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Yeni keçid',
            'support_email' => 'Dəstək e-poçtu',
            'support_phone' => 'Dəstək telefonu',
            'enable_logging' => 'Qeydiyyatı aktivləşdir',
            'enable_logging_helper' => 'Söndürüldükdə, heç bir göndərilmiş e-poçt qeydi yaradılmayacaq.',
            'store_rendered_body' => 'İşlənmiş məzmunu saxla',
            'store_rendered_body_helper' => 'Hər göndərilmiş e-poçtun son HTML-ni saxlayın. Yenidən göndərmə və önizləmə funksiyaları üçün tələb olunur.',
            'retention_days' => 'Saxlama (gün)',
            'retention_days_helper' => 'Bu qədər gündən sonra göndərilmiş e-poçt qeydlərini avtomatik silin. Həmişəlik saxlamaq üçün boş buraxın.',
            'cleanup_enabled' => 'Planlaşdırılmış təmizliyi aktivləşdir',
            'cleanup_enabled_helper' => 'Təmizlik əmrini plana uyğun avtomatik işlədin.',
            'cleanup_frequency' => 'Təmizlik tezliyi',
            'max_file_size' => 'Maksimum fayl ölçüsü (MB)',
            'allowed_extensions' => 'İcazə verilmiş fayl uzantıları',
            'allowed_extensions_placeholder' => 'Uzantı əlavə edin (məs. pdf)',
            'allowed_extensions_helper' => 'Yükləmə üçün icazə verilmiş fayl uzantıları.',
            'override_verification' => 'E-poçt təsdiqini dəyişdir',
            'override_verification_helper' => 'Tətbiqin standart təsdiq e-poçtu əvəzinə "user-verify-email" şablonunu istifadə edin.',
            'override_password_reset' => 'Şifrə sıfırlamanı dəyişdir',
            'override_password_reset_helper' => 'Tətbiqin standart şifrə sıfırlama e-poçtu əvəzinə "user-password-reset" şablonunu istifadə edin.',
            'override_welcome' => 'Qarşılama e-poçtunu dəyişdir',
            'override_welcome_helper' => 'Yeni istifadəçi qeydiyyatdan keçdikdə "user-welcome" şablonunu istifadə edərək qarşılama e-poçtu göndərin.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Bütün hüquqlar qorunur.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Qaralama',
            2 => 'Növbədə',
            3 => 'Göndərildi',
            4 => 'Uğursuz',
        ],

        'cleanup_frequency' => [
            1 => 'Gündəlik',
            2 => 'Həftəlik',
            3 => 'Aylıq',
        ],
    ],

];
