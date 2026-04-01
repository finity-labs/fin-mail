<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'Elektron pochta',
        'templates' => 'Shablonlar',
        'themes' => 'Mavzular',
        'sent-emails' => 'Yuborilgan xatlar',
        'settings' => 'Sozlamalar',
    ],

    'models' => [
        'email_template' => 'Elektron pochta shabloni',
        'email_templates' => 'Elektron pochta shablonlari',
        'email_theme' => 'Elektron pochta mavzusi',
        'email_themes' => 'Elektron pochta mavzulari',
        'sent_email' => 'Yuborilgan xat',
        'sent_emails' => 'Yuborilgan xatlar',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Tarkib',
            'settings' => 'Sozlamalar',
            'tokens' => 'Tokenlar',
        ],

        'fields' => [
            'name' => 'Nomi',
            'key' => 'Kalit',
            'key_helper' => 'Kodda ishlatiladigan noyob kalit, masalan: "invoice-sent"',
            'category' => 'Kategoriya',
            'subject' => 'Mavzu',
            'subject_helper' => 'Tokenlarni qo\'llab-quvvatlaydi: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Oldindan ko\'rish matni',
            'preheader_helper' => 'Elektron pochta dasturlarida ko\'rsatiladigan oldindan ko\'rish matni',
            'body' => 'Asosiy qism',
            'theme' => 'Mavzu',
            'theme_placeholder' => 'Standart mavzu',
            'is_active' => 'Faol',
            'is_active_helper' => 'Nofaol shablonlar yuborish uchun ishlatib bo\'lmaydi',
            'tags' => 'Teglar',
            'tags_placeholder' => 'Tartibga solish uchun teglar qo\'shing',
            'from_address' => 'Yuboruvchi elektron pochta',
            'from_name' => 'Yuboruvchi nomi',
            'locale' => 'Til',
        ],

        'sections' => [
            'custom_sender' => 'Maxsus yuboruvchi',
            'custom_sender_description' => 'Ushbu shablon uchun standart yuboruvchi manzilini o\'zgartirish',
        ],

        'tokens' => [
            'label' => 'Mavjud tokenlar',
            'helper' => 'Ushbu shablon uchun mavjud tokenlarni hujjatlashtiring. Bu muharrirlarga qaysi o\'zgaruvchilardan foydalanish mumkinligini bilishga yordam beradi.',
            'token' => 'Token',
            'description' => 'Tavsif',
            'example' => 'Misol',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Qabul qiluvchining to\'liq ismi',
            'example_placeholder' => 'John Doe',
            'new_item' => 'Yangi token',
        ],

        'blocks' => [
            'button' => 'Tugma',
            'button_heading' => 'Tugma qo\'shish',
            'button_label' => 'Tugma matni',
            'button_url' => 'URL',
            'button_align' => 'Tekislash',
            'align_left' => 'Chapga',
            'align_center' => 'Markazga',
            'align_right' => 'O\'ngga',
            'button_default_label' => 'Bu yerni bosing',
        ],

        'columns' => [
            'locales' => 'Tillar',
            'active' => 'Faol',
            'locked' => 'Qulflangan',
            'sent' => 'Yuborilgan',
            'updated_at' => 'Yangilangan',
        ],

        'actions' => [
            'preview' => 'Oldindan ko\'rish',
            'send_test' => 'Test yuborish',
            'send_test_field' => 'Yuborish manzili',
            'send_test_locale' => 'Til',
            'compose' => 'Xat yozish',
            'version_history' => 'Versiyalar tarixi',
            'back_to_templates' => 'Shablonlarga qaytish',
        ],

        'notifications' => [
            'test_sent' => 'Test xati yuborildi!',
            'test_sent_body' => ':email manziliga yuborildi',
            'test_failed' => 'Test xatini yuborib bo\'lmadi',
            'saved' => 'Shablon saqlandi',
            'saved_body' => 'Versiya surati avtomatik saqlandi.',
            'locked_skipped' => 'Qulflangan shablonlar o\'tkazib yuborildi',
            'locked_skipped_body' => ':count ta qulflangan shablon(lar) o\'tkazib yuborildi va o\'chirilmadi.',
        ],

        'tooltips' => [
            'locked' => 'Bu shablon qulflangan -- kalit va kategoriya faqat o\'qish uchun, o\'chirish taqiqlangan.',
        ],

        'versioning' => [
            'date' => 'Sana',
            'by' => 'Muallif',
            'preview' => 'Oldindan ko\'rish',
            'restore' => 'Qayta tiklash',
            'restore_confirm' => ':version versiyasini qayta tiklashni xohlaysizmi? Joriy kontent avval yangi versiya sifatida saqlanadi.',
            'restored' => ':version versiyasi qayta tiklandi.',
            'empty' => 'Versiya tarixi mavjud emas.',
        ],

        'notices' => [
            'locked' => 'Bu shablon qulflangan. Kalit va kategoriya maydonlarini o\'zgartirish mumkin emas.',
        ],

        'language_label' => 'Til: :locale',

        'replicate_suffix' => '(Nusxa)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Xat yozish',
        'title_with_name' => 'Yozish: :name',

        'sections' => [
            'recipients' => 'Qabul qiluvchilar',
            'content' => 'Xat tarkibi',
            'attachments' => 'Ilovalar',
            'tokens' => 'Mavjud tokenlar',
        ],

        'fields' => [
            'from' => 'Kimdan',
            'to' => 'Kimga',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Elektron pochta manzillarini kiriting',
            'cc_placeholder' => 'CC manzillari',
            'bcc_placeholder' => 'BCC manzillari',
            'locale' => 'Til',
            'subject' => 'Mavzu',
            'preheader' => 'Oldindan ko\'rish matni',
            'body' => 'Asosiy qism',
            'attach_files' => 'Fayllarni biriktirish',
            'preheader_helper' => 'Ochishdan oldin elektron pochta dasturlarida ko\'rsatiladigan oldindan ko\'rish matni',
            'no_tokens' => 'Ushbu shablon uchun hech qanday token hujjatlashtirilmagan. {{ user.name }} kabi tokenlar API/kod orqali yuborilganda almashtiriladi.',
        ],

        'actions' => [
            'send' => 'Xat yuborish',
            'preview' => 'Oldindan ko\'rish',
        ],

        'confirm' => [
            'heading' => 'Yuborishni tasdiqlash',
            'description' => 'Ushbu xatni yubormoqchimisiz?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Qabul qiluvchilar',
            'content' => 'Tarkib',
            'attachments' => 'Ilovalar',
        ],

        'fields' => [
            'from' => 'Kimdan',
            'to' => 'Kimga',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Shablon',
            'subject' => 'Mavzu',
            'to_placeholder' => 'Elektron pochta manzillarini kiriting',
            'cc_placeholder' => 'CC manzillarini kiriting',
            'bcc_placeholder' => 'BCC manzillarini kiriting',
            'auto_attached' => 'Avtomatik biriktirilgan fayllar',
            'auto_attached_none' => 'Yo\'q',
            'additional_attachments' => 'Qo\'shimcha ilovalar',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Xat yuborish',
        'modal_heading' => 'Xat yozish',
        'submit' => 'Yuborish',

        'notifications' => [
            'sent' => 'Xat muvaffaqiyatli yuborildi',
            'sent_body' => 'Yuborildi: :recipients',
            'failed' => 'Xatni yuborib bo\'lmadi',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Mavzu tafsilotlari',
            'background' => 'Fon va tartib',
            'background_description' => 'Elektron pochta tartibining asosiy tuzilmaviy ranglari.',
            'typography' => 'Tipografiya',
            'typography_description' => 'Matn va sarlavhalar uchun ranglar.',
            'buttons' => 'Tugmalar',
            'buttons_description' => 'Harakatga chaqirish tugmalari uslubi.',
            'footer' => 'Pastki qism',
            'footer_description' => 'Pastki qism maydoni uslubi.',
            'preview' => 'Oldindan ko\'rish',
        ],

        'fields' => [
            'name' => 'Nomi',
            'is_default' => 'Standart mavzu',
            'is_default_helper' => 'Standart mavzu boshqa mavzu ko\'rsatilmagan shablonlarga qo\'llaniladi.',
            'page_background' => 'Sahifa foni',
            'content_background' => 'Tarkib foni',
            'border' => 'Chegara',
            'headings' => 'Sarlavhalar',
            'body_text' => 'Asosiy matn',
            'secondary_text' => 'Ikkinchi darajali matn',
            'links' => 'Havolalar',
            'button_background' => 'Tugma foni',
            'button_text' => 'Tugma matni',
            'primary_accent' => 'Asosiy/Urg\'u',
            'footer_background' => 'Pastki qism foni',
            'footer_text' => 'Pastki qism matni',
        ],

        'columns' => [
            'primary' => 'Asosiy',
            'background' => 'Fon',
            'text' => 'Matn',
            'button' => 'Tugma',
            'default' => 'Standart',
            'templates' => 'Shablonlar',
            'updated_at' => 'Yangilangan',
        ],

        'replicate_suffix' => '(Nusxa)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Kimga',
            'template' => 'Shablon',
            'template_placeholder' => 'Maxsus',
            'sent_by' => 'Yuboruvchi',
            'subject' => 'Mavzu',
            'status' => 'Holat',
            'sent_by_placeholder' => 'Tizim',
            'related_to' => 'Bog\'liq',
            'sent_at' => 'Yuborilgan',
        ],

        'filters' => [
            'from' => 'Boshlanish',
            'until' => 'Gacha',
        ],

        'actions' => [
            'view' => 'Ko\'rish',
            'resend' => 'Qayta yuborish',
            'resend_description' => 'Bu xatning yangi nusxasini asl qabul qiluvchilarga yuboradi.',
        ],

        'preview' => [
            'from' => 'Kimdan:',
            'to' => 'Kimga:',
            'cc' => 'Nusxa:',
            'template' => 'Shablon:',
            'sent' => 'Yuborilgan:',
            'sent_not_yet' => 'Hali yo\'q',
            'status' => 'Holat:',
            'no_body' => 'Elektron pochta matni saqlanmagan. Elektron pochta mazmunini saqlash uchun sozlamalarda <code>logging.store_rendered_body</code> ni yoqing.',
            'error' => 'Xato tafsilotlari',
        ],
        'notifications' => [
            'resent' => 'Xat muvaffaqiyatli qayta yuborildi',
            'resend_failed' => 'Xatni qayta yuborib bo\'lmadi',
        ],

        'errors' => [
            'no_rendered_body' => 'Qayta yuborib bo\'lmaydi: saqlangan tayyorlangan tarkib yo\'q. Sozlamalarda logging.store_rendered_body ni yoqing.',
            'no_template' => 'Asl shablon endi mavjud emas.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Yuborilgan xatlar',

        'columns' => [
            'to' => 'Kimga',
            'template' => 'Shablon',
            'subject' => 'Mavzu',
            'status' => 'Holat',
            'sent_by' => 'Yuboruvchi',
            'sent_by_placeholder' => 'Tizim',
            'sent_at' => 'Yuborilgan',
        ],

        'actions' => [
            'view' => 'Ko\'rish',
            'resend' => 'Qayta yuborish',
            'resend_confirm' => 'Ushbu xatni qayta yubormoqchimisiz?',
        ],

        'notifications' => [
            'resent' => 'Xat muvaffaqiyatli qayta yuborildi',
            'resend_failed' => 'Qayta yuborib bo\'lmadi',
        ],

        'empty' => [
            'heading' => 'Yuborilgan xatlar yo\'q',
            'description' => 'Ushbu yozuv uchun yuborilgan xatlar bu yerda ko\'rsatiladi.',
        ],

        'errors' => [
            'no_body' => 'Qayta yuborib bo\'lmaydi: saqlangan tayyorlangan tarkib yoki shablon yo\'q.',
            'no_template' => 'Asl shablon endi mavjud emas.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Elektron pochta sozlamalari',

        'tabs' => [
            'general' => 'Umumiy',
            'branding' => 'Brending',
            'logging' => 'Jurnalga yozish',
            'attachments' => 'Ilovalar',
            'auth_emails' => 'Autentifikatsiya xatlari',
        ],

        'titles' => [
            'general' => 'Elektron pochta shablon sozlamalari - Umumiy',
            'branding' => 'Elektron pochta shablon sozlamalari - Brending',
            'logging' => 'Elektron pochta shablon sozlamalari - Jurnalga yozish',
            'attachments' => 'Elektron pochta shablon sozlamalari - Ilovalar',
            'auth_emails' => 'Elektron pochta shablon sozlamalari - Autentifikatsiya xatlari',
        ],

        'sections' => [
            'default_sender' => 'Standart yuboruvchi',
            'default_sender_description' => 'Plagin tomonidan yuboriladigan barcha xatlar uchun standart "Kimdan" manzili.',
            'additional_senders' => 'Qo\'shimcha yuboruvchilar',
            'add_additional_senders' => 'Qo\'shimcha jo\'natuvchilar qo\'shish',
            'additional_senders_description' => 'Foydalanuvchilar xat yozayotganda tanlashi mumkin bo\'lgan qo\'shimcha "Kimdan" manzillari.',
            'localization' => 'Mahalliylashtirish',
            'categories' => 'Shablon kategoriyalari',
            'logo' => 'Logotip',
            'colors' => 'Ranglar',
            'footer_links' => 'Pastki qism havolalari',
            'add_footer_links' => 'Pastki havolalarni qo\'shish',
            'customer_service' => 'Mijozlarga xizmat',
            'logging' => 'Elektron pochta jurnali',
            'logging_description' => 'Yuborilgan xatlar ma\'lumotlar bazasida qanday qayd etilishini boshqaring.',
            'cleanup' => 'Rejalashtirilgan tozalash',
            'cleanup_description' => 'Eski yuborilgan xat yozuvlarini jadval bo\'yicha avtomatik o\'chirish.',
            'attachment_rules' => 'Ilova qoidalari',
            'attachment_rules_description' => 'Yozilgan xatlardagi fayl ilovalari uchun chegaralarni sozlang.',
            'auth_emails' => 'Autentifikatsiya xatlari almashtiruvi',
            'auth_emails_description' => 'Ilovaning standart autentifikatsiya xatlarini maxsus shablonlaringiz bilan almashtiring.',
        ],

        'fields' => [
            'from_email' => 'Yuboruvchi elektron pochta',
            'from_name' => 'Yuboruvchi nomi',
            'sender_email' => 'Elektron pochta',
            'sender_name' => 'Ko\'rsatiladigan nom',
            'sender_new' => 'Yangi yuboruvchi',
            'default_locale' => 'Standart til',
            'default_locale_helper' => 'Yangi shablonlar uchun standart til (masalan: en, hu, de).',
            'languages' => 'Mavjud tillar',
            'language_code' => 'Kod',
            'language_display' => 'Ko\'rsatiladigan nom',
            'language_flag' => 'Bayroq belgisi',
            'language_new' => 'Yangi til',
            'category_key' => 'Kalit',
            'category_label' => 'Yorliq',
            'category_new' => 'Yangi kategoriya',
            'logo_url' => 'Logotip URL yoki yo\'li',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Elektron pochta logotipingizning mutlaq URL yoki yo\'li.',
            'logo_width' => 'Kenglik (px)',
            'logo_height' => 'Balandlik (px)',
            'content_width' => 'Tarkib kengligi (px)',
            'primary_color' => 'Asosiy rang',
            'footer_link_label' => 'Yorliq',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Yangi havola',
            'support_email' => 'Qo\'llab-quvvatlash elektron pochtasi',
            'support_phone' => 'Qo\'llab-quvvatlash telefoni',
            'enable_logging' => 'Jurnalga yozishni yoqish',
            'enable_logging_helper' => 'O\'chirilganda, yuborilgan xat yozuvlari yaratilmaydi.',
            'store_rendered_body' => 'Tayyorlangan tarkibni saqlash',
            'store_rendered_body_helper' => 'Har bir yuborilgan xatning yakuniy HTML-ini saqlash. Qayta yuborish va oldindan ko\'rish funksiyalari uchun zarur.',
            'retention_days' => 'Saqlash muddati (kun)',
            'retention_days_helper' => 'Shuncha kundan keyin yuborilgan xat yozuvlarini avtomatik o\'chirish. Abadiy saqlash uchun bo\'sh qoldiring.',
            'cleanup_enabled' => 'Rejalashtirilgan tozalashni yoqish',
            'cleanup_enabled_helper' => 'Tozalash buyrug\'ini jadval bo\'yicha avtomatik ishga tushirish.',
            'cleanup_frequency' => 'Tozalash chastotasi',
            'max_file_size' => 'Maksimal fayl hajmi (MB)',
            'allowed_extensions' => 'Ruxsat etilgan fayl kengaytmalari',
            'allowed_extensions_placeholder' => 'Kengaytma qo\'shing (masalan: pdf)',
            'allowed_extensions_helper' => 'Yuklash uchun ruxsat etilgan fayl kengaytmalari.',
            'override_verification' => 'Elektron pochta tasdiqlashini almashtirish',
            'override_verification_helper' => 'Ilovaning standart tasdiqlash xati o\'rniga "user-verify-email" shablonidan foydalanish.',
            'override_password_reset' => 'Parolni tiklashni almashtirish',
            'override_password_reset_helper' => 'Ilovaning standart parolni tiklash xati o\'rniga "user-password-reset" shablonidan foydalanish.',
            'override_welcome' => 'Xush kelibsiz xatini almashtirish',
            'override_welcome_helper' => 'Yangi foydalanuvchi ro\'yxatdan o\'tganda "user-welcome" shabloni yordamida xush kelibsiz xatini yuborish.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Barcha huquqlar himoyalangan.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Qoralama',
            2 => 'Navbatda',
            3 => 'Yuborilgan',
            4 => 'Muvaffaqiyatsiz',
        ],

        'cleanup_frequency' => [
            1 => 'Kunlik',
            2 => 'Haftalik',
            3 => 'Oylik',
        ],
    ],

];
