<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'البريد الإلكتروني',
        'templates' => 'القوالب',
        'themes' => 'السمات',
        'sent-emails' => 'الرسائل المرسلة',
        'settings' => 'الإعدادات',
    ],

    'models' => [
        'email_template' => 'قالب بريد إلكتروني',
        'email_templates' => 'قوالب البريد الإلكتروني',
        'email_theme' => 'سمة بريد إلكتروني',
        'email_themes' => 'سمات البريد الإلكتروني',
        'sent_email' => 'بريد إلكتروني مرسل',
        'sent_emails' => 'الرسائل المرسلة',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'المحتوى',
            'settings' => 'الإعدادات',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'الاسم',
            'key' => 'المفتاح',
            'key_helper' => 'مفتاح فريد يُستخدم في الكود: مثل "invoice-sent"',
            'category' => 'الفئة',
            'subject' => 'الموضوع',
            'subject_helper' => 'يدعم Tokens: {{ user.name }}، {{ config.app.name }}',
            'preheader' => 'نص المعاينة',
            'preheader_helper' => 'نص المعاينة الذي يظهر في برامج البريد الإلكتروني',
            'body' => 'المحتوى',
            'theme' => 'السمة',
            'theme_placeholder' => 'السمة الافتراضية',
            'is_active' => 'نشط',
            'is_active_helper' => 'القوالب غير النشطة لا يمكن استخدامها للإرسال',
            'tags' => 'الوسوم',
            'tags_placeholder' => 'أضف وسومًا للتنظيم',
            'from_address' => 'البريد الإلكتروني للمرسل',
            'from_name' => 'اسم المرسل',
            'locale' => 'اللغة',
        ],

        'sections' => [
            'custom_sender' => 'مرسل مخصص',
            'custom_sender_description' => 'تجاوز عنوان المرسل الافتراضي لهذا القالب',
        ],

        'tokens' => [
            'label' => 'Tokens المتاحة',
            'helper' => 'وثّق الـ tokens المتاحة لهذا القالب. يساعد هذا المحررين على معرفة المتغيرات التي يمكنهم استخدامها.',
            'token' => 'Token',
            'description' => 'الوصف',
            'example' => 'مثال',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'الاسم الكامل للمستلم',
            'example_placeholder' => 'أحمد محمد',
            'new_item' => 'Token جديد',
        ],

        'blocks' => [
            'button' => 'زر',
            'button_heading' => 'إدراج زر',
            'button_label' => 'نص الزر',
            'button_url' => 'URL',
            'button_align' => 'المحاذاة',
            'align_left' => 'يسار',
            'align_center' => 'وسط',
            'align_right' => 'يمين',
            'button_default_label' => 'انقر هنا',
        ],

        'columns' => [
            'locales' => 'اللغات',
            'active' => 'نشط',
            'locked' => 'مقفل',
            'sent' => 'مرسل',
            'updated_at' => 'آخر تحديث',
        ],

        'actions' => [
            'preview' => 'معاينة',
            'send_test' => 'إرسال تجريبي',
            'send_test_field' => 'إرسال إلى',
            'send_test_locale' => 'اللغة',
            'compose' => 'كتابة بريد إلكتروني',
            'version_history' => 'سجل الإصدارات',
            'back_to_templates' => 'العودة إلى القوالب',
        ],

        'notifications' => [
            'test_sent' => 'تم إرسال البريد التجريبي!',
            'test_sent_body' => 'تم الإرسال إلى :email',
            'test_failed' => 'فشل إرسال البريد التجريبي',
            'saved' => 'تم حفظ القالب',
            'saved_body' => 'تم حفظ لقطة الإصدار تلقائيًا.',
            'locked_skipped' => 'تم تخطي القوالب المقفلة',
            'locked_skipped_body' => 'تم تخطي :count قالب(قوالب) مقفل(ة) ولم يتم حذفها.',
        ],

        'tooltips' => [
            'locked' => 'هذا القالب مقفل — المفتاح والفئة للقراءة فقط، والحذف ممنوع.',
        ],

        'versioning' => [
            'date' => 'التاريخ',
            'by' => 'بواسطة',
            'preview' => 'معاينة',
            'restore' => 'استعادة',
            'restore_confirm' => 'هل أنت متأكد أنك تريد استعادة الإصدار :version؟ سيتم حفظ المحتوى الحالي كإصدار جديد أولاً.',
            'restored' => 'تمت استعادة الإصدار :version.',
            'empty' => 'لا يوجد سجل إصدارات متاح.',
        ],

        'notices' => [
            'locked' => 'هذا القالب مقفل. لا يمكن تغيير حقلي المفتاح والفئة.',
        ],

        'language_label' => 'اللغة: :locale',

        'replicate_suffix' => '(نسخة)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'كتابة بريد إلكتروني',
        'title_with_name' => 'كتابة: :name',

        'sections' => [
            'recipients' => 'المستلمون',
            'content' => 'محتوى البريد الإلكتروني',
            'attachments' => 'المرفقات',
            'tokens' => 'Tokens المتاحة',
        ],

        'fields' => [
            'from' => 'من',
            'to' => 'إلى',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'أدخل عناوين البريد الإلكتروني',
            'cc_placeholder' => 'عناوين CC',
            'bcc_placeholder' => 'عناوين BCC',
            'locale' => 'اللغة',
            'subject' => 'الموضوع',
            'preheader' => 'نص المعاينة',
            'body' => 'المحتوى',
            'attach_files' => 'إرفاق ملفات',
            'preheader_helper' => 'نص المعاينة الذي يظهر في برامج البريد قبل الفتح',
            'no_tokens' => 'لا توجد tokens موثقة لهذا القالب. سيتم استبدال tokens مثل {{ user.name }} عند الإرسال عبر API/الكود.',
        ],

        'actions' => [
            'send' => 'إرسال البريد',
            'preview' => 'معاينة',
        ],

        'confirm' => [
            'heading' => 'تأكيد الإرسال',
            'description' => 'هل أنت متأكد أنك تريد إرسال هذا البريد الإلكتروني؟',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'المستلمون',
            'content' => 'المحتوى',
            'attachments' => 'المرفقات',
        ],

        'fields' => [
            'from' => 'من',
            'to' => 'إلى',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'القالب',
            'subject' => 'الموضوع',
            'to_placeholder' => 'أدخل عناوين البريد الإلكتروني',
            'cc_placeholder' => 'أدخل عناوين CC',
            'bcc_placeholder' => 'أدخل عناوين BCC',
            'auto_attached' => 'ملفات مرفقة تلقائيًا',
            'auto_attached_none' => 'لا شيء',
            'additional_attachments' => 'مرفقات إضافية',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'إرسال بريد إلكتروني',
        'modal_heading' => 'كتابة بريد إلكتروني',
        'submit' => 'إرسال',

        'notifications' => [
            'sent' => 'تم إرسال البريد الإلكتروني بنجاح',
            'sent_body' => 'تم الإرسال إلى: :recipients',
            'failed' => 'فشل إرسال البريد الإلكتروني',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'تفاصيل السمة',
            'background' => 'الخلفية والتخطيط',
            'background_description' => 'الألوان الهيكلية الرئيسية لتخطيط البريد الإلكتروني.',
            'typography' => 'الطباعة',
            'typography_description' => 'ألوان النصوص والعناوين.',
            'buttons' => 'الأزرار',
            'buttons_description' => 'تنسيق أزرار الدعوة إلى الإجراء.',
            'footer' => 'التذييل',
            'footer_description' => 'تنسيق منطقة التذييل.',
            'preview' => 'معاينة',
        ],

        'fields' => [
            'name' => 'الاسم',
            'is_default' => 'السمة الافتراضية',
            'is_default_helper' => 'تُطبّق السمة الافتراضية على القوالب التي لم تحدد سمة.',
            'page_background' => 'خلفية الصفحة',
            'content_background' => 'خلفية المحتوى',
            'border' => 'الحدود',
            'headings' => 'العناوين',
            'body_text' => 'نص المحتوى',
            'secondary_text' => 'النص الثانوي',
            'links' => 'الروابط',
            'button_background' => 'خلفية الزر',
            'button_text' => 'نص الزر',
            'primary_accent' => 'اللون الأساسي/المميز',
            'footer_background' => 'خلفية التذييل',
            'footer_text' => 'نص التذييل',
        ],

        'columns' => [
            'primary' => 'أساسي',
            'background' => 'الخلفية',
            'text' => 'النص',
            'button' => 'الزر',
            'default' => 'افتراضي',
            'templates' => 'القوالب',
            'updated_at' => 'آخر تحديث',
        ],

        'replicate_suffix' => '(نسخة)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'إلى',
            'template' => 'القالب',
            'template_placeholder' => 'مخصص',
            'sent_by' => 'المرسل',
            'subject' => 'الموضوع',
            'status' => 'الحالة',
            'sent_by_placeholder' => 'النظام',
            'related_to' => 'مرتبط بـ',
            'sent_at' => 'تاريخ الإرسال',
        ],

        'filters' => [
            'from' => 'من',
            'until' => 'حتى',
        ],

        'actions' => [
            'view' => 'عرض',
            'resend' => 'إعادة الإرسال',
            'resend_description' => 'سيتم إرسال نسخة جديدة من البريد الإلكتروني إلى المستلمين الأصليين.',
        ],


        'preview' => [
            'from' => 'من:',
            'to' => 'إلى:',
            'cc' => 'نسخة:',
            'template' => 'القالب:',
            'sent' => 'أُرسل:',
            'sent_not_yet' => 'لم يُرسل بعد',
            'status' => 'الحالة:',
            'no_body' => 'لم يتم تخزين محتوى البريد الإلكتروني. قم بتفعيل <code>logging.store_rendered_body</code> في الإعدادات لحفظ محتوى البريد.',
            'error' => 'تفاصيل الخطأ'
        ],
        'notifications' => [
            'resent' => 'تمت إعادة إرسال البريد الإلكتروني بنجاح',
            'resend_failed' => 'فشلت إعادة إرسال البريد الإلكتروني',
        ],

        'errors' => [
            'no_rendered_body' => 'لا يمكن إعادة الإرسال: لم يتم تخزين محتوى مُعالَج. قم بتفعيل logging.store_rendered_body في الإعدادات.',
            'no_template' => 'القالب الأصلي لم يعد موجودًا.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'الرسائل المرسلة',

        'columns' => [
            'to' => 'إلى',
            'template' => 'القالب',
            'subject' => 'الموضوع',
            'status' => 'الحالة',
            'sent_by' => 'المرسل',
            'sent_by_placeholder' => 'النظام',
            'sent_at' => 'تاريخ الإرسال',
        ],

        'actions' => [
            'view' => 'عرض',
            'resend' => 'إعادة الإرسال',
            'resend_confirm' => 'هل أنت متأكد أنك تريد إعادة إرسال هذا البريد الإلكتروني؟',
        ],

        'notifications' => [
            'resent' => 'تمت إعادة إرسال البريد الإلكتروني بنجاح',
            'resend_failed' => 'فشلت إعادة الإرسال',
        ],

        'empty' => [
            'heading' => 'لا توجد رسائل مرسلة',
            'description' => 'ستظهر الرسائل المرسلة لهذا السجل هنا.',
        ],

        'errors' => [
            'no_body' => 'لا يمكن إعادة الإرسال: لم يتم تخزين محتوى مُعالَج أو قالب.',
            'no_template' => 'القالب الأصلي لم يعد موجودًا.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'إعدادات البريد الإلكتروني',

        'tabs' => [
            'general' => 'عام',
            'branding' => 'العلامة التجارية',
            'logging' => 'السجلات',
            'attachments' => 'المرفقات',
            'auth_emails' => 'رسائل المصادقة',
        ],

        'titles' => [
            'general' => 'إعدادات قوالب البريد - عام',
            'branding' => 'إعدادات قوالب البريد - العلامة التجارية',
            'logging' => 'إعدادات قوالب البريد - السجلات',
            'attachments' => 'إعدادات قوالب البريد - المرفقات',
            'auth_emails' => 'إعدادات قوالب البريد - رسائل المصادقة',
        ],

        'sections' => [
            'default_sender' => 'المرسل الافتراضي',
            'default_sender_description' => 'عنوان "من" الافتراضي لجميع الرسائل المرسلة عبر الإضافة.',
            'additional_senders' => 'مرسلون إضافيون',
            'add_additional_senders' => 'إضافة مرسلين إضافيين',
            'additional_senders_description' => 'عناوين "من" إضافية يمكن للمستخدمين الاختيار منها عند كتابة الرسائل.',
            'localization' => 'التوطين',
            'categories' => 'فئات القوالب',
            'logo' => 'الشعار',
            'colors' => 'الألوان',
            'footer_links' => 'روابط التذييل',
            'add_footer_links' => 'إضافة روابط التذييل',
            'customer_service' => 'خدمة العملاء',
            'logging' => 'تسجيل البريد الإلكتروني',
            'logging_description' => 'التحكم في كيفية تسجيل الرسائل المرسلة في قاعدة البيانات.',
            'cleanup' => 'التنظيف المجدول',
            'cleanup_description' => 'حذف سجلات الرسائل المرسلة القديمة تلقائيًا وفق جدول زمني.',
            'attachment_rules' => 'قواعد المرفقات',
            'attachment_rules_description' => 'تكوين حدود مرفقات الملفات في الرسائل المكتوبة.',
            'auth_emails' => 'تجاوز رسائل المصادقة',
            'auth_emails_description' => 'استبدال رسائل المصادقة الافتراضية للتطبيق بقوالبك المخصصة.',
        ],

        'fields' => [
            'from_email' => 'البريد الإلكتروني للمرسل',
            'from_name' => 'اسم المرسل',
            'sender_email' => 'البريد الإلكتروني',
            'sender_name' => 'الاسم المعروض',
            'sender_new' => 'مرسل جديد',
            'default_locale' => 'اللغة الافتراضية',
            'default_locale_helper' => 'اللغة الافتراضية للقوالب الجديدة (مثل en، hu، de).',
            'languages' => 'اللغات المتاحة',
            'language_code' => 'الرمز',
            'language_display' => 'الاسم المعروض',
            'language_flag' => 'أيقونة العلم',
            'language_new' => 'لغة جديدة',
            'category_key' => 'المفتاح',
            'category_label' => 'التسمية',
            'category_new' => 'فئة جديدة',
            'logo_url' => 'URL أو مسار الشعار',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL مطلق أو مسار لشعار بريدك الإلكتروني.',
            'logo_width' => 'العرض (px)',
            'logo_height' => 'الارتفاع (px)',
            'content_width' => 'عرض المحتوى (px)',
            'primary_color' => 'اللون الأساسي',
            'footer_link_label' => 'التسمية',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'رابط جديد',
            'support_email' => 'بريد الدعم',
            'support_phone' => 'هاتف الدعم',
            'enable_logging' => 'تفعيل التسجيل',
            'enable_logging_helper' => 'عند التعطيل، لن يتم إنشاء أي سجلات للرسائل المرسلة.',
            'store_rendered_body' => 'تخزين المحتوى المُعالَج',
            'store_rendered_body_helper' => 'حفظ HTML النهائي لكل رسالة مرسلة. مطلوب لميزتي إعادة الإرسال والمعاينة.',
            'retention_days' => 'مدة الاحتفاظ (أيام)',
            'retention_days_helper' => 'حذف سجلات الرسائل المرسلة تلقائيًا بعد هذا العدد من الأيام. اتركه فارغًا للاحتفاظ للأبد.',
            'cleanup_enabled' => 'تفعيل التنظيف المجدول',
            'cleanup_enabled_helper' => 'تشغيل أمر التنظيف تلقائيًا وفق جدول زمني.',
            'cleanup_frequency' => 'تكرار التنظيف',
            'max_file_size' => 'الحد الأقصى لحجم الملف (MB)',
            'allowed_extensions' => 'امتدادات الملفات المسموحة',
            'allowed_extensions_placeholder' => 'أضف امتدادًا (مثل pdf)',
            'allowed_extensions_helper' => 'امتدادات الملفات المسموح برفعها.',
            'override_verification' => 'تجاوز التحقق من البريد الإلكتروني',
            'override_verification_helper' => 'استخدام قالب "user-verify-email" بدلاً من بريد التحقق الافتراضي للتطبيق.',
            'override_password_reset' => 'تجاوز إعادة تعيين كلمة المرور',
            'override_password_reset_helper' => 'استخدام قالب "user-password-reset" بدلاً من بريد إعادة تعيين كلمة المرور الافتراضي للتطبيق.',
            'override_welcome' => 'تجاوز بريد الترحيب',
            'override_welcome_helper' => 'إرسال بريد ترحيب باستخدام قالب "user-welcome" عند تسجيل مستخدم جديد.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. جميع الحقوق محفوظة.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'مسودة',
            2 => 'في قائمة الانتظار',
            3 => 'مرسل',
            4 => 'فشل',
        ],

        'cleanup_frequency' => [
            1 => 'يوميًا',
            2 => 'أسبوعيًا',
            3 => 'شهريًا',
        ],
    ],

];
