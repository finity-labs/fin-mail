<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'ایمیل',
        'templates' => 'قالب‌ها',
        'themes' => 'پوسته‌ها',
        'sent-emails' => 'ایمیل‌های ارسال‌شده',
        'settings' => 'تنظیمات',
    ],

    'models' => [
        'email_template' => 'قالب ایمیل',
        'email_templates' => 'قالب‌های ایمیل',
        'email_theme' => 'پوسته ایمیل',
        'email_themes' => 'پوسته‌های ایمیل',
        'sent_email' => 'ایمیل ارسال‌شده',
        'sent_emails' => 'ایمیل‌های ارسال‌شده',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'محتوا',
            'settings' => 'تنظیمات',
            'tokens' => 'توکن‌ها',
        ],

        'fields' => [
            'name' => 'نام',
            'key' => 'کلید',
            'key_helper' => 'کلید یکتا در کد: مثلا "invoice-sent"',
            'category' => 'دسته‌بندی',
            'subject' => 'موضوع',
            'subject_helper' => 'از توکن‌ها پشتیبانی می‌کند: {{ user.name }}، {{ config.app.name }}',
            'preheader' => 'متن پیش‌نمایش',
            'preheader_helper' => 'متن پیش‌نمایشی که در نرم‌افزارهای ایمیل نمایش داده می‌شود',
            'body' => 'متن',
            'theme' => 'پوسته',
            'theme_placeholder' => 'پوسته پیش‌فرض',
            'is_active' => 'فعال',
            'is_active_helper' => 'قالب‌های غیرفعال قابل استفاده برای ارسال نیستند',
            'tags' => 'برچسب‌ها',
            'tags_placeholder' => 'برچسب‌هایی برای سازماندهی اضافه کنید',
            'from_address' => 'ایمیل فرستنده',
            'from_name' => 'نام فرستنده',
            'locale' => 'زبان',
        ],

        'sections' => [
            'custom_sender' => 'فرستنده سفارشی',
            'custom_sender_description' => 'بازنویسی آدرس فرستنده پیش‌فرض برای این قالب',
        ],

        'tokens' => [
            'label' => 'توکن‌های موجود',
            'helper' => 'توکن‌های موجود برای این قالب را مستند کنید. این به ویرایشگران کمک می‌کند بدانند از چه متغیرهایی می‌توانند استفاده کنند.',
            'token' => 'توکن',
            'description' => 'توضیحات',
            'example' => 'مثال',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'نام کامل گیرنده',
            'example_placeholder' => 'علی احمدی',
            'new_item' => 'توکن جدید',
        ],

        'blocks' => [
            'button' => 'دکمه',
            'button_heading' => 'درج دکمه',
            'button_label' => 'متن دکمه',
            'button_url' => 'URL',
            'button_align' => 'تراز',
            'align_left' => 'چپ',
            'align_center' => 'وسط',
            'align_right' => 'راست',
            'button_default_label' => 'اینجا کلیک کنید',
        ],

        'columns' => [
            'locales' => 'زبان‌ها',
            'active' => 'فعال',
            'locked' => 'قفل‌شده',
            'sent' => 'ارسال‌شده',
            'updated_at' => 'به‌روزرسانی',
        ],

        'actions' => [
            'preview' => 'پیش‌نمایش',
            'send_test' => 'ارسال آزمایشی',
            'send_test_field' => 'ارسال به',
            'send_test_locale' => 'زبان',
            'compose' => 'نوشتن ایمیل',
            'version_history' => 'تاریخچه نسخه‌ها',
            'back_to_templates' => 'بازگشت به قالب‌ها',
        ],

        'notifications' => [
            'test_sent' => 'ایمیل آزمایشی ارسال شد!',
            'test_sent_body' => 'ارسال شد به :email',
            'test_failed' => 'ارسال ایمیل آزمایشی ناموفق بود',
            'saved' => 'قالب ذخیره شد',
            'saved_body' => 'یک نسخه پشتیبان به‌صورت خودکار ذخیره شد.',
            'locked_skipped' => 'قالب‌های قفل‌شده نادیده گرفته شدند',
            'locked_skipped_body' => ':count قالب قفل‌شده نادیده گرفته و حذف نشد(ند).',
        ],

        'tooltips' => [
            'locked' => 'این قالب قفل شده است — کلید و دسته‌بندی فقط‌خواندنی هستند و حذف امکان‌پذیر نیست.',
        ],

        'versioning' => [
            'date' => 'تاریخ',
            'by' => 'توسط',
            'preview' => 'پیش‌نمایش',
            'restore' => 'بازگردانی',
            'restore_confirm' => 'آیا مطمئن هستید که می‌خواهید نسخه :version را بازگردانی کنید؟ محتوای فعلی ابتدا به عنوان نسخه جدید ذخیره می‌شود.',
            'restored' => 'نسخه :version بازگردانی شد.',
            'empty' => 'تاریخچه نسخه‌ای موجود نیست.',
        ],

        'notices' => [
            'locked' => 'این قالب قفل شده است. فیلدهای کلید و دسته‌بندی قابل تغییر نیستند.',
        ],

        'language_label' => 'زبان: :locale',

        'replicate_suffix' => '(کپی)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'نوشتن ایمیل',
        'title_with_name' => 'نوشتن: :name',

        'sections' => [
            'recipients' => 'گیرندگان',
            'content' => 'محتوای ایمیل',
            'attachments' => 'پیوست‌ها',
            'tokens' => 'توکن‌های موجود',
        ],

        'fields' => [
            'from' => 'از',
            'to' => 'به',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'آدرس‌های ایمیل را وارد کنید',
            'cc_placeholder' => 'آدرس‌های CC',
            'bcc_placeholder' => 'آدرس‌های BCC',
            'locale' => 'زبان',
            'subject' => 'موضوع',
            'preheader' => 'متن پیش‌نمایش',
            'body' => 'متن',
            'attach_files' => 'پیوست فایل‌ها',
            'preheader_helper' => 'متن پیش‌نمایشی که در نرم‌افزارهای ایمیل قبل از باز کردن نمایش داده می‌شود',
            'no_tokens' => 'هیچ توکنی برای این قالب مستند نشده است. توکن‌هایی مانند {{ user.name }} هنگام ارسال از طریق API/کد جایگزین خواهند شد.',
        ],

        'actions' => [
            'send' => 'ارسال ایمیل',
            'preview' => 'پیش‌نمایش',
        ],

        'confirm' => [
            'heading' => 'تایید ارسال',
            'description' => 'آیا مطمئن هستید که می‌خواهید این ایمیل را ارسال کنید؟',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'گیرندگان',
            'content' => 'محتوا',
            'attachments' => 'پیوست‌ها',
        ],

        'fields' => [
            'from' => 'از',
            'to' => 'به',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'قالب',
            'subject' => 'موضوع',
            'to_placeholder' => 'آدرس‌های ایمیل را وارد کنید',
            'cc_placeholder' => 'آدرس‌های CC را وارد کنید',
            'bcc_placeholder' => 'آدرس‌های BCC را وارد کنید',
            'auto_attached' => 'فایل‌های پیوست خودکار',
            'auto_attached_none' => 'هیچ‌کدام',
            'additional_attachments' => 'پیوست‌های اضافی',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'ارسال ایمیل',
        'modal_heading' => 'نوشتن ایمیل',
        'submit' => 'ارسال',

        'notifications' => [
            'sent' => 'ایمیل با موفقیت ارسال شد',
            'sent_body' => 'ارسال شد به: :recipients',
            'failed' => 'ارسال ایمیل ناموفق بود',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'جزئیات پوسته',
            'background' => 'پس‌زمینه و طرح‌بندی',
            'background_description' => 'رنگ‌های ساختاری اصلی طرح‌بندی ایمیل.',
            'typography' => 'تایپوگرافی',
            'typography_description' => 'رنگ‌ها برای متن و عنوان‌ها.',
            'buttons' => 'دکمه‌ها',
            'buttons_description' => 'استایل دکمه‌های فراخوان عمل.',
            'footer' => 'پاورقی',
            'footer_description' => 'استایل ناحیه پاورقی.',
            'preview' => 'پیش‌نمایش',
        ],

        'fields' => [
            'name' => 'نام',
            'is_default' => 'پوسته پیش‌فرض',
            'is_default_helper' => 'پوسته پیش‌فرض روی قالب‌هایی اعمال می‌شود که پوسته‌ای مشخص نکرده‌اند.',
            'page_background' => 'پس‌زمینه صفحه',
            'content_background' => 'پس‌زمینه محتوا',
            'border' => 'حاشیه',
            'headings' => 'عنوان‌ها',
            'body_text' => 'متن اصلی',
            'secondary_text' => 'متن ثانویه',
            'links' => 'لینک‌ها',
            'button_background' => 'پس‌زمینه دکمه',
            'button_text' => 'متن دکمه',
            'primary_accent' => 'اصلی/تاکید',
            'footer_background' => 'پس‌زمینه پاورقی',
            'footer_text' => 'متن پاورقی',
        ],

        'columns' => [
            'primary' => 'اصلی',
            'background' => 'پس‌زمینه',
            'text' => 'متن',
            'button' => 'دکمه',
            'default' => 'پیش‌فرض',
            'templates' => 'قالب‌ها',
            'updated_at' => 'به‌روزرسانی',
        ],

        'replicate_suffix' => '(کپی)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'به',
            'template' => 'قالب',
            'template_placeholder' => 'سفارشی',
            'sent_by' => 'ارسال‌کننده',
            'subject' => 'موضوع',
            'status' => 'وضعیت',
            'sent_by_placeholder' => 'سیستم',
            'related_to' => 'مرتبط با',
            'sent_at' => 'ارسال‌شده',
        ],

        'filters' => [
            'from' => 'از تاریخ',
            'until' => 'تا تاریخ',
        ],

        'actions' => [
            'view' => 'مشاهده',
            'resend' => 'ارسال مجدد',
            'resend_description' => 'یک نسخه جدید از ایمیل به گیرندگان اصلی ارسال خواهد شد.',
        ],


        'preview' => [
            'from' => 'از:',
            'to' => 'به:',
            'cc' => 'رونوشت:',
            'template' => 'قالب:',
            'sent' => 'ارسال شده:',
            'sent_not_yet' => 'هنوز نه',
            'status' => 'وضعیت:',
            'no_body' => 'محتوای ایمیل ذخیره نشده است. برای ذخیره محتوای ایمیل <code>logging.store_rendered_body</code> را در تنظیمات فعال کنید.',
            'error' => 'جزئیات خطا'
        ],
        'notifications' => [
            'resent' => 'ایمیل با موفقیت ارسال مجدد شد',
            'resend_failed' => 'ارسال مجدد ایمیل ناموفق بود',
        ],

        'errors' => [
            'no_rendered_body' => 'امکان ارسال مجدد نیست: محتوای رندر شده ذخیره نشده است. logging.store_rendered_body را در تنظیمات فعال کنید.',
            'no_template' => 'قالب اصلی دیگر وجود ندارد.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'ایمیل‌های ارسال‌شده',

        'columns' => [
            'to' => 'به',
            'template' => 'قالب',
            'subject' => 'موضوع',
            'status' => 'وضعیت',
            'sent_by' => 'ارسال‌کننده',
            'sent_by_placeholder' => 'سیستم',
            'sent_at' => 'ارسال‌شده',
        ],

        'actions' => [
            'view' => 'مشاهده',
            'resend' => 'ارسال مجدد',
            'resend_confirm' => 'آیا مطمئن هستید که می‌خواهید این ایمیل را مجددا ارسال کنید؟',
        ],

        'notifications' => [
            'resent' => 'ایمیل با موفقیت ارسال مجدد شد',
            'resend_failed' => 'ارسال مجدد ناموفق بود',
        ],

        'empty' => [
            'heading' => 'ایمیلی ارسال نشده است',
            'description' => 'ایمیل‌های ارسال‌شده برای این رکورد در اینجا نمایش داده خواهند شد.',
        ],

        'errors' => [
            'no_body' => 'امکان ارسال مجدد نیست: محتوای رندر شده یا قالب ذخیره نشده است.',
            'no_template' => 'قالب اصلی دیگر وجود ندارد.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'تنظیمات ایمیل',

        'tabs' => [
            'general' => 'عمومی',
            'branding' => 'برندینگ',
            'logging' => 'ثبت رویداد',
            'attachments' => 'پیوست‌ها',
            'auth_emails' => 'ایمیل‌های احراز هویت',
        ],

        'titles' => [
            'general' => 'تنظیمات قالب ایمیل - عمومی',
            'branding' => 'تنظیمات قالب ایمیل - برندینگ',
            'logging' => 'تنظیمات قالب ایمیل - ثبت رویداد',
            'attachments' => 'تنظیمات قالب ایمیل - پیوست‌ها',
            'auth_emails' => 'تنظیمات قالب ایمیل - ایمیل‌های احراز هویت',
        ],

        'sections' => [
            'default_sender' => 'فرستنده پیش‌فرض',
            'default_sender_description' => 'آدرس فرستنده پیش‌فرض برای همه ایمیل‌های ارسال‌شده توسط افزونه.',
            'additional_senders' => 'فرستندگان اضافی',
            'add_additional_senders' => 'افزودن فرستندگان اضافی',
            'additional_senders_description' => 'آدرس‌های فرستنده اضافی که کاربران هنگام نوشتن ایمیل می‌توانند انتخاب کنند.',
            'localization' => 'بومی‌سازی',
            'categories' => 'دسته‌بندی‌های قالب',
            'logo' => 'لوگو',
            'colors' => 'رنگ‌ها',
            'footer_links' => 'لینک‌های پاورقی',
            'add_footer_links' => 'افزودن پیوندهای پاورقی',
            'customer_service' => 'خدمات مشتریان',
            'logging' => 'ثبت رویداد ایمیل',
            'logging_description' => 'نحوه ثبت ایمیل‌های ارسال‌شده در پایگاه داده را کنترل کنید.',
            'cleanup' => 'پاکسازی زمان‌بندی‌شده',
            'cleanup_description' => 'حذف خودکار رکوردهای قدیمی ایمیل‌های ارسال‌شده بر اساس زمان‌بندی.',
            'attachment_rules' => 'قوانین پیوست',
            'attachment_rules_description' => 'محدودیت‌های فایل‌های پیوست در ایمیل‌های نوشته‌شده را پیکربندی کنید.',
            'auth_emails' => 'بازنویسی ایمیل‌های احراز هویت',
            'auth_emails_description' => 'ایمیل‌های پیش‌فرض احراز هویت برنامه را با قالب‌های سفارشی خود جایگزین کنید.',
        ],

        'fields' => [
            'from_email' => 'ایمیل فرستنده',
            'from_name' => 'نام فرستنده',
            'sender_email' => 'ایمیل',
            'sender_name' => 'نام نمایشی',
            'sender_new' => 'فرستنده جدید',
            'default_locale' => 'زبان پیش‌فرض',
            'default_locale_helper' => 'زبان پیش‌فرض برای قالب‌های جدید (مثلا en، hu، de).',
            'languages' => 'زبان‌های موجود',
            'language_code' => 'کد',
            'language_display' => 'نام نمایشی',
            'language_flag' => 'آیکون پرچم',
            'language_new' => 'زبان جدید',
            'category_key' => 'کلید',
            'category_label' => 'برچسب',
            'category_new' => 'دسته‌بندی جدید',
            'logo_url' => 'URL یا مسیر لوگو',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL مطلق یا مسیر به لوگوی ایمیل شما.',
            'logo_width' => 'عرض (px)',
            'logo_height' => 'ارتفاع (px)',
            'content_width' => 'عرض محتوا (px)',
            'primary_color' => 'رنگ اصلی',
            'footer_link_label' => 'برچسب',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'لینک جدید',
            'support_email' => 'ایمیل پشتیبانی',
            'support_phone' => 'تلفن پشتیبانی',
            'enable_logging' => 'فعال‌سازی ثبت رویداد',
            'enable_logging_helper' => 'در صورت غیرفعال بودن، رکورد ایمیل ارسال‌شده ایجاد نخواهد شد.',
            'store_rendered_body' => 'ذخیره محتوای رندر شده',
            'store_rendered_body_helper' => 'ذخیره HTML نهایی هر ایمیل ارسال‌شده. برای قابلیت‌های ارسال مجدد و پیش‌نمایش ضروری است.',
            'retention_days' => 'نگهداری (روز)',
            'retention_days_helper' => 'حذف خودکار رکوردهای ایمیل ارسال‌شده پس از این تعداد روز. برای نگهداری دائمی خالی بگذارید.',
            'cleanup_enabled' => 'فعال‌سازی پاکسازی زمان‌بندی‌شده',
            'cleanup_enabled_helper' => 'اجرای خودکار فرمان پاکسازی بر اساس زمان‌بندی.',
            'cleanup_frequency' => 'دوره پاکسازی',
            'max_file_size' => 'حداکثر حجم فایل (MB)',
            'allowed_extensions' => 'پسوندهای مجاز فایل',
            'allowed_extensions_placeholder' => 'اضافه کردن پسوند (مثلا pdf)',
            'allowed_extensions_helper' => 'پسوندهای فایل مجاز برای بارگذاری.',
            'override_verification' => 'بازنویسی ایمیل تایید',
            'override_verification_helper' => 'استفاده از قالب "user-verify-email" به جای ایمیل تایید پیش‌فرض برنامه.',
            'override_password_reset' => 'بازنویسی بازیابی رمز عبور',
            'override_password_reset_helper' => 'استفاده از قالب "user-password-reset" به جای ایمیل بازیابی رمز عبور پیش‌فرض برنامه.',
            'override_welcome' => 'بازنویسی ایمیل خوش‌آمدگویی',
            'override_welcome_helper' => 'ارسال ایمیل خوش‌آمدگویی با قالب "user-welcome" هنگام ثبت‌نام کاربر جدید.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. تمامی حقوق محفوظ است.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'پیش‌نویس',
            2 => 'در صف',
            3 => 'ارسال‌شده',
            4 => 'ناموفق',
        ],

        'cleanup_frequency' => [
            1 => 'روزانه',
            2 => 'هفتگی',
            3 => 'ماهانه',
        ],
    ],

];
