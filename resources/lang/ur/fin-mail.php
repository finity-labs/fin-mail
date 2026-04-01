<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'ای میل',
        'templates' => 'ٹیمپلیٹس',
        'themes' => 'تھیمز',
        'sent-emails' => 'بھیجی گئی ای میلز',
        'settings' => 'ترتیبات',
    ],

    'models' => [
        'email_template' => 'ای میل ٹیمپلیٹ',
        'email_templates' => 'ای میل ٹیمپلیٹس',
        'email_theme' => 'ای میل تھیم',
        'email_themes' => 'ای میل تھیمز',
        'sent_email' => 'بھیجی گئی ای میل',
        'sent_emails' => 'بھیجی گئی ای میلز',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'مواد',
            'settings' => 'ترتیبات',
            'tokens' => 'ٹوکنز',
        ],

        'fields' => [
            'name' => 'نام',
            'key' => 'کلید',
            'key_helper' => 'کوڈ میں استعمال ہونے والی منفرد کلید، مثلاً: "invoice-sent"',
            'category' => 'زمرہ',
            'subject' => 'موضوع',
            'subject_helper' => 'ٹوکنز کی حمایت کرتا ہے: {{ user.name }}، {{ config.app.name }}',
            'preheader' => 'پیش نظارہ متن',
            'preheader_helper' => 'ای میل کلائنٹس میں دکھایا جانے والا پیش نظارہ متن',
            'body' => 'مضمون',
            'theme' => 'تھیم',
            'theme_placeholder' => 'پہلے سے طے شدہ تھیم',
            'is_active' => 'فعال',
            'is_active_helper' => 'غیر فعال ٹیمپلیٹس بھیجنے کے لیے استعمال نہیں کیے جا سکتے',
            'tags' => 'ٹیگز',
            'tags_placeholder' => 'ترتیب کے لیے ٹیگز شامل کریں',
            'from_address' => 'بھیجنے والے کا ای میل',
            'from_name' => 'بھیجنے والے کا نام',
            'locale' => 'زبان',
        ],

        'sections' => [
            'custom_sender' => 'حسب ضرورت بھیجنے والا',
            'custom_sender_description' => 'اس ٹیمپلیٹ کے لیے پہلے سے طے شدہ بھیجنے والے کا پتہ تبدیل کریں',
        ],

        'tokens' => [
            'label' => 'دستیاب ٹوکنز',
            'helper' => 'اس ٹیمپلیٹ کے لیے دستیاب ٹوکنز کی دستاویزات بنائیں۔ یہ ایڈیٹرز کو یہ جاننے میں مدد کرتا ہے کہ وہ کون سے متغیرات استعمال کر سکتے ہیں۔',
            'token' => 'ٹوکن',
            'description' => 'تفصیل',
            'example' => 'مثال',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'وصول کنندہ کا پورا نام',
            'example_placeholder' => 'John Doe',
            'new_item' => 'نیا ٹوکن',
        ],

        'blocks' => [
            'button' => 'بٹن',
            'button_heading' => 'بٹن داخل کریں',
            'button_label' => 'بٹن کا متن',
            'button_url' => 'URL',
            'button_align' => 'سیدھ',
            'align_left' => 'بائیں',
            'align_center' => 'درمیان',
            'align_right' => 'دائیں',
            'button_default_label' => 'یہاں کلک کریں',
        ],

        'columns' => [
            'locales' => 'زبانیں',
            'active' => 'فعال',
            'locked' => 'مقفل',
            'sent' => 'بھیجے گئے',
            'updated_at' => 'تازہ کاری',
        ],

        'actions' => [
            'preview' => 'پیش نظارہ',
            'send_test' => 'ٹیسٹ بھیجیں',
            'send_test_field' => 'بھیجیں بنام',
            'send_test_locale' => 'زبان',
            'compose' => 'ای میل لکھیں',
            'version_history' => 'ورژن کی تاریخ',
            'back_to_templates' => 'ٹیمپلیٹس پر واپس جائیں',
        ],

        'notifications' => [
            'test_sent' => 'ٹیسٹ ای میل بھیج دی گئی!',
            'test_sent_body' => ':email کو بھیجی گئی',
            'test_failed' => 'ٹیسٹ ای میل بھیجنے میں ناکامی',
            'saved' => 'ٹیمپلیٹ محفوظ ہو گیا',
            'saved_body' => 'ورژن کا سنیپ شاٹ خودکار طور پر محفوظ ہو گیا۔',
            'locked_skipped' => 'مقفل ٹیمپلیٹس چھوڑ دیے گئے',
            'locked_skipped_body' => ':count مقفل ٹیمپلیٹ(س) چھوڑ دیے گئے اور حذف نہیں کیے گئے۔',
        ],

        'tooltips' => [
            'locked' => 'یہ ٹیمپلیٹ مقفل ہے -- کلید اور زمرہ صرف پڑھنے کے لیے ہیں، حذف کرنا ممنوع ہے۔',
        ],

        'versioning' => [
            'date' => 'تاریخ',
            'by' => 'از',
            'preview' => 'پیش نظارہ',
            'restore' => 'بحال کریں',
            'restore_confirm' => 'کیا آپ واقعی ورژن :version بحال کرنا چاہتے ہیں؟ موجودہ مواد پہلے نئے ورژن کے طور پر محفوظ کیا جائے گا۔',
            'restored' => 'ورژن :version بحال ہو گیا۔',
            'empty' => 'کوئی ورژن ہسٹری دستیاب نہیں ہے۔',
        ],

        'notices' => [
            'locked' => 'یہ ٹیمپلیٹ مقفل ہے۔ کلید اور زمرے کے فیلڈز تبدیل نہیں کیے جا سکتے۔',
        ],

        'language_label' => 'زبان: :locale',

        'replicate_suffix' => '(نقل)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'ای میل لکھیں',
        'title_with_name' => 'لکھیں: :name',

        'sections' => [
            'recipients' => 'وصول کنندگان',
            'content' => 'ای میل کا مواد',
            'attachments' => 'منسلکات',
            'tokens' => 'دستیاب ٹوکنز',
        ],

        'fields' => [
            'from' => 'کی طرف سے',
            'to' => 'بنام',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'ای میل پتے درج کریں',
            'cc_placeholder' => 'CC پتے',
            'bcc_placeholder' => 'BCC پتے',
            'locale' => 'زبان',
            'subject' => 'موضوع',
            'preheader' => 'پیش نظارہ متن',
            'body' => 'مضمون',
            'attach_files' => 'فائلیں منسلک کریں',
            'preheader_helper' => 'کھولنے سے پہلے ای میل کلائنٹس میں دکھایا جانے والا پیش نظارہ متن',
            'no_tokens' => 'اس ٹیمپلیٹ کے لیے کوئی ٹوکنز دستاویز شدہ نہیں ہیں۔ {{ user.name }} جیسے ٹوکنز API/کوڈ کے ذریعے بھیجنے پر تبدیل ہو جائیں گے۔',
        ],

        'actions' => [
            'send' => 'ای میل بھیجیں',
            'preview' => 'پیش نظارہ',
        ],

        'confirm' => [
            'heading' => 'بھیجنے کی تصدیق کریں',
            'description' => 'کیا آپ واقعی یہ ای میل بھیجنا چاہتے ہیں؟',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'وصول کنندگان',
            'content' => 'مواد',
            'attachments' => 'منسلکات',
        ],

        'fields' => [
            'from' => 'کی طرف سے',
            'to' => 'بنام',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'ٹیمپلیٹ',
            'subject' => 'موضوع',
            'to_placeholder' => 'ای میل پتے درج کریں',
            'cc_placeholder' => 'CC پتے درج کریں',
            'bcc_placeholder' => 'BCC پتے درج کریں',
            'auto_attached' => 'خودکار منسلک فائلیں',
            'auto_attached_none' => 'کوئی نہیں',
            'additional_attachments' => 'اضافی منسلکات',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'ای میل بھیجیں',
        'modal_heading' => 'ای میل لکھیں',
        'submit' => 'بھیجیں',

        'notifications' => [
            'sent' => 'ای میل کامیابی سے بھیج دی گئی',
            'sent_body' => 'بھیجی گئی بنام: :recipients',
            'failed' => 'ای میل بھیجنے میں ناکامی',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'تھیم کی تفصیلات',
            'background' => 'پس منظر اور ترتیب',
            'background_description' => 'ای میل ترتیب کے لیے بنیادی ساختی رنگ۔',
            'typography' => 'ٹائپوگرافی',
            'typography_description' => 'متن اور عنوانات کے لیے رنگ۔',
            'buttons' => 'بٹن',
            'buttons_description' => 'عمل کی دعوت کے بٹن کی طرز۔',
            'footer' => 'فوٹر',
            'footer_description' => 'فوٹر ایریا کی طرز۔',
            'preview' => 'پیش نظارہ',
        ],

        'fields' => [
            'name' => 'نام',
            'is_default' => 'پہلے سے طے شدہ تھیم',
            'is_default_helper' => 'پہلے سے طے شدہ تھیم ان ٹیمپلیٹس پر لاگو ہوتا ہے جو کوئی تھیم متعین نہیں کرتے۔',
            'page_background' => 'صفحے کا پس منظر',
            'content_background' => 'مواد کا پس منظر',
            'border' => 'بارڈر',
            'headings' => 'عنوانات',
            'body_text' => 'مضمون کا متن',
            'secondary_text' => 'ثانوی متن',
            'links' => 'لنکس',
            'button_background' => 'بٹن کا پس منظر',
            'button_text' => 'بٹن کا متن',
            'primary_accent' => 'بنیادی/ایکسنٹ',
            'footer_background' => 'فوٹر کا پس منظر',
            'footer_text' => 'فوٹر کا متن',
        ],

        'columns' => [
            'primary' => 'بنیادی',
            'background' => 'پس منظر',
            'text' => 'متن',
            'button' => 'بٹن',
            'default' => 'پہلے سے طے شدہ',
            'templates' => 'ٹیمپلیٹس',
            'updated_at' => 'تازہ کاری',
        ],

        'replicate_suffix' => '(نقل)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'بنام',
            'template' => 'ٹیمپلیٹ',
            'template_placeholder' => 'حسب ضرورت',
            'sent_by' => 'بھیجنے والا',
            'subject' => 'موضوع',
            'status' => 'حیثیت',
            'sent_by_placeholder' => 'سسٹم',
            'related_to' => 'متعلقہ',
            'sent_at' => 'بھیجی گئی',
        ],

        'filters' => [
            'from' => 'سے',
            'until' => 'تک',
        ],

        'actions' => [
            'view' => 'دیکھیں',
            'resend' => 'دوبارہ بھیجیں',
            'resend_description' => 'یہ اصل وصول کنندگان کو ای میل کی نئی نقل بھیجے گا۔',
        ],


        'preview' => [
            'from' => 'ارسال کنندہ:',
            'to' => 'وصول کنندہ:',
            'cc' => 'سی سی:',
            'template' => 'ٹیمپلیٹ:',
            'sent' => 'بھیجا گیا:',
            'sent_not_yet' => 'ابھی نہیں',
            'status' => 'حالت:',
            'no_body' => 'ای میل کا مواد محفوظ نہیں کیا گیا۔ ای میل مواد محفوظ کرنے کے لیے ترتیبات میں <code>logging.store_rendered_body</code> کو فعال کریں۔',
            'error' => 'غلطی کی تفصیلات'
        ],
        'notifications' => [
            'resent' => 'ای میل کامیابی سے دوبارہ بھیج دی گئی',
            'resend_failed' => 'ای میل دوبارہ بھیجنے میں ناکامی',
        ],

        'errors' => [
            'no_rendered_body' => 'دوبارہ نہیں بھیجا جا سکتا: کوئی رینڈر شدہ مضمون محفوظ نہیں ہے۔ ترتیبات میں logging.store_rendered_body فعال کریں۔',
            'no_template' => 'اصل ٹیمپلیٹ اب موجود نہیں ہے۔',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'بھیجی گئی ای میلز',

        'columns' => [
            'to' => 'بنام',
            'template' => 'ٹیمپلیٹ',
            'subject' => 'موضوع',
            'status' => 'حیثیت',
            'sent_by' => 'بھیجنے والا',
            'sent_by_placeholder' => 'سسٹم',
            'sent_at' => 'بھیجی گئی',
        ],

        'actions' => [
            'view' => 'دیکھیں',
            'resend' => 'دوبارہ بھیجیں',
            'resend_confirm' => 'کیا آپ واقعی یہ ای میل دوبارہ بھیجنا چاہتے ہیں؟',
        ],

        'notifications' => [
            'resent' => 'ای میل کامیابی سے دوبارہ بھیج دی گئی',
            'resend_failed' => 'دوبارہ بھیجنے میں ناکامی',
        ],

        'empty' => [
            'heading' => 'کوئی ای میل نہیں بھیجی گئی',
            'description' => 'اس ریکارڈ کے لیے بھیجی گئی ای میلز یہاں ظاہر ہوں گی۔',
        ],

        'errors' => [
            'no_body' => 'دوبارہ نہیں بھیجا جا سکتا: کوئی رینڈر شدہ مضمون یا ٹیمپلیٹ محفوظ نہیں ہے۔',
            'no_template' => 'اصل ٹیمپلیٹ اب موجود نہیں ہے۔',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'ای میل ترتیبات',

        'tabs' => [
            'general' => 'عمومی',
            'branding' => 'برانڈنگ',
            'logging' => 'لاگنگ',
            'attachments' => 'منسلکات',
            'auth_emails' => 'تصدیقی ای میلز',
        ],

        'titles' => [
            'general' => 'ای میل ٹیمپلیٹ ترتیبات - عمومی',
            'branding' => 'ای میل ٹیمپلیٹ ترتیبات - برانڈنگ',
            'logging' => 'ای میل ٹیمپلیٹ ترتیبات - لاگنگ',
            'attachments' => 'ای میل ٹیمپلیٹ ترتیبات - منسلکات',
            'auth_emails' => 'ای میل ٹیمپلیٹ ترتیبات - تصدیقی ای میلز',
        ],

        'sections' => [
            'default_sender' => 'پہلے سے طے شدہ بھیجنے والا',
            'default_sender_description' => 'پلگ ان کی طرف سے بھیجی جانے والی تمام ای میلز کے لیے پہلے سے طے شدہ "کی طرف سے" پتہ۔',
            'additional_senders' => 'اضافی بھیجنے والے',
            'add_additional_senders' => 'اضافی بھیجنے والے شامل کریں',
            'additional_senders_description' => 'اضافی "کی طرف سے" پتے جو صارفین ای میل لکھتے وقت منتخب کر سکتے ہیں۔',
            'localization' => 'مقامیت',
            'categories' => 'ٹیمپلیٹ زمرے',
            'logo' => 'لوگو',
            'colors' => 'رنگ',
            'footer_links' => 'فوٹر لنکس',
            'add_footer_links' => 'فوٹر لنکس شامل کریں',
            'customer_service' => 'کسٹمر سروس',
            'logging' => 'ای میل لاگنگ',
            'logging_description' => 'ڈیٹا بیس میں بھیجی گئی ای میلز کی ریکارڈنگ کو کنٹرول کریں۔',
            'cleanup' => 'طے شدہ صفائی',
            'cleanup_description' => 'پرانے بھیجے گئے ای میل ریکارڈز کو شیڈول کے مطابق خودکار طور پر حذف کریں۔',
            'attachment_rules' => 'منسلکات کے قواعد',
            'attachment_rules_description' => 'لکھی گئی ای میلز میں فائل منسلکات کے لیے حدود مقرر کریں۔',
            'auth_emails' => 'تصدیقی ای میلز کی اوور رائیڈ',
            'auth_emails_description' => 'ایپلیکیشن کی پہلے سے طے شدہ تصدیقی ای میلز کو اپنے حسب ضرورت ٹیمپلیٹس سے تبدیل کریں۔',
        ],

        'fields' => [
            'from_email' => 'بھیجنے والے کا ای میل',
            'from_name' => 'بھیجنے والے کا نام',
            'sender_email' => 'ای میل',
            'sender_name' => 'ظاہری نام',
            'sender_new' => 'نیا بھیجنے والا',
            'default_locale' => 'پہلے سے طے شدہ زبان',
            'default_locale_helper' => 'نئے ٹیمپلیٹس کے لیے پہلے سے طے شدہ زبان (مثلاً: en، hu، de)۔',
            'languages' => 'دستیاب زبانیں',
            'language_code' => 'کوڈ',
            'language_display' => 'ظاہری نام',
            'language_flag' => 'پرچم آئیکن',
            'language_new' => 'نئی زبان',
            'category_key' => 'کلید',
            'category_label' => 'لیبل',
            'category_new' => 'نیا زمرہ',
            'logo_url' => 'لوگو URL یا راستہ',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'آپ کے ای میل لوگو کا مطلق URL یا راستہ۔',
            'logo_width' => 'چوڑائی (px)',
            'logo_height' => 'اونچائی (px)',
            'content_width' => 'مواد کی چوڑائی (px)',
            'primary_color' => 'بنیادی رنگ',
            'footer_link_label' => 'لیبل',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'نیا لنک',
            'support_email' => 'سپورٹ ای میل',
            'support_phone' => 'سپورٹ فون',
            'enable_logging' => 'لاگنگ فعال کریں',
            'enable_logging_helper' => 'غیر فعال ہونے پر، بھیجی گئی ای میل کے ریکارڈز نہیں بنائے جائیں گے۔',
            'store_rendered_body' => 'رینڈر شدہ مضمون محفوظ کریں',
            'store_rendered_body_helper' => 'ہر بھیجی گئی ای میل کا حتمی HTML محفوظ کریں۔ دوبارہ بھیجنے اور پیش نظارہ کی خصوصیات کے لیے ضروری ہے۔',
            'retention_days' => 'رکھنے کی مدت (دن)',
            'retention_days_helper' => 'اتنے دنوں کے بعد بھیجے گئے ای میل ریکارڈز خودکار طور پر حذف کریں۔ ہمیشہ رکھنے کے لیے خالی چھوڑ دیں۔',
            'cleanup_enabled' => 'طے شدہ صفائی فعال کریں',
            'cleanup_enabled_helper' => 'صفائی کمانڈ کو شیڈول کے مطابق خودکار طور پر چلائیں۔',
            'cleanup_frequency' => 'صفائی کی تعدد',
            'max_file_size' => 'زیادہ سے زیادہ فائل سائز (MB)',
            'allowed_extensions' => 'اجازت یافتہ فائل ایکسٹینشنز',
            'allowed_extensions_placeholder' => 'ایکسٹینشن شامل کریں (مثلاً: pdf)',
            'allowed_extensions_helper' => 'اپلوڈ کے لیے اجازت یافتہ فائل ایکسٹینشنز۔',
            'override_verification' => 'ای میل تصدیق کی اوور رائیڈ',
            'override_verification_helper' => 'ایپلیکیشن کی پہلے سے طے شدہ تصدیقی ای میل کی بجائے "user-verify-email" ٹیمپلیٹ استعمال کریں۔',
            'override_password_reset' => 'پاس ورڈ ری سیٹ کی اوور رائیڈ',
            'override_password_reset_helper' => 'ایپلیکیشن کی پہلے سے طے شدہ پاس ورڈ ری سیٹ ای میل کی بجائے "user-password-reset" ٹیمپلیٹ استعمال کریں۔',
            'override_welcome' => 'خوش آمدید ای میل کی اوور رائیڈ',
            'override_welcome_helper' => 'نئے صارف کی رجسٹریشن پر "user-welcome" ٹیمپلیٹ استعمال کرتے ہوئے خوش آمدید ای میل بھیجیں۔',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app۔ جملہ حقوق محفوظ ہیں۔',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'مسودہ',
            2 => 'قطار میں',
            3 => 'بھیجی گئی',
            4 => 'ناکام',
        ],

        'cleanup_frequency' => [
            1 => 'روزانہ',
            2 => 'ہفتہ وار',
            3 => 'ماہانہ',
        ],
    ],

];
