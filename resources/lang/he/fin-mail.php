<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'דוא"ל',
        'templates' => 'תבניות',
        'themes' => 'ערכות נושא',
        'sent-emails' => 'דוא"ל שנשלח',
        'settings' => 'הגדרות',
    ],

    'models' => [
        'email_template' => 'תבנית דוא"ל',
        'email_templates' => 'תבניות דוא"ל',
        'email_theme' => 'ערכת נושא דוא"ל',
        'email_themes' => 'ערכות נושא דוא"ל',
        'sent_email' => 'דוא"ל שנשלח',
        'sent_emails' => 'דוא"ל שנשלח',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'תוכן',
            'settings' => 'הגדרות',
            'tokens' => 'טוקנים',
        ],

        'fields' => [
            'name' => 'שם',
            'key' => 'מפתח',
            'key_helper' => 'מפתח ייחודי בקוד: לדוגמה "invoice-sent"',
            'category' => 'קטגוריה',
            'subject' => 'נושא',
            'subject_helper' => 'תומך בטוקנים: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'טקסט תצוגה מקדימה',
            'preheader_helper' => 'טקסט תצוגה מקדימה המוצג בלקוחות דוא"ל',
            'body' => 'גוף',
            'theme' => 'ערכת נושא',
            'theme_placeholder' => 'ערכת נושא ברירת מחדל',
            'is_active' => 'פעיל',
            'is_active_helper' => 'תבניות לא פעילות אינן זמינות לשליחה',
            'tags' => 'תגיות',
            'tags_placeholder' => 'הוסף תגיות לארגון',
            'from_address' => 'דוא"ל השולח',
            'from_name' => 'שם השולח',
            'locale' => 'שפה',
        ],

        'sections' => [
            'custom_sender' => 'שולח מותאם אישית',
            'custom_sender_description' => 'עקוף את כתובת השולח המוגדרת כברירת מחדל עבור תבנית זו',
        ],

        'tokens' => [
            'label' => 'טוקנים זמינים',
            'helper' => 'תעד את הטוקנים הזמינים עבור תבנית זו. זה עוזר לעורכים לדעת באילו משתנים הם יכולים להשתמש.',
            'token' => 'טוקן',
            'description' => 'תיאור',
            'example' => 'דוגמה',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'השם המלא של הנמען',
            'example_placeholder' => 'ישראל ישראלי',
            'new_item' => 'טוקן חדש',
        ],

        'blocks' => [
            'button' => 'כפתור',
            'button_heading' => 'הוסף כפתור',
            'button_label' => 'טקסט הכפתור',
            'button_url' => 'URL',
            'button_align' => 'יישור',
            'align_left' => 'שמאל',
            'align_center' => 'מרכז',
            'align_right' => 'ימין',
            'button_default_label' => 'לחצו כאן',
        ],

        'columns' => [
            'locales' => 'שפות',
            'active' => 'פעיל',
            'locked' => 'נעול',
            'sent' => 'נשלח',
            'updated_at' => 'עודכן',
        ],

        'actions' => [
            'preview' => 'תצוגה מקדימה',
            'send_test' => 'שלח בדיקה',
            'send_test_field' => 'שלח אל',
            'send_test_locale' => 'שפה',
            'compose' => 'חבר דוא"ל',
            'version_history' => 'היסטוריית גרסאות',
            'back_to_templates' => 'חזרה לתבניות',
        ],

        'notifications' => [
            'test_sent' => 'דוא"ל בדיקה נשלח!',
            'test_sent_body' => 'נשלח אל :email',
            'test_failed' => 'שליחת דוא"ל הבדיקה נכשלה',
            'saved' => 'התבנית נשמרה',
            'saved_body' => 'תמונת מצב של גרסה נשמרה אוטומטית.',
            'locked_skipped' => 'תבניות נעולות דולגו',
            'locked_skipped_body' => ':count תבנית/תבניות נעולות דולגו ולא נמחקו.',
        ],

        'tooltips' => [
            'locked' => 'תבנית זו נעולה — המפתח והקטגוריה הם לקריאה בלבד, מחיקה מנועה.',
        ],

        'versioning' => [
            'date' => 'תאריך',
            'by' => 'על ידי',
            'preview' => 'תצוגה מקדימה',
            'restore' => 'שחזור',
            'restore_confirm' => 'האם אתה בטוח שברצונך לשחזר גרסה :version? התוכן הנוכחי יישמר תחילה כגרסה חדשה.',
            'restored' => 'גרסה :version שוחזרה.',
            'empty' => 'אין היסטוריית גרסאות זמינה.',
        ],

        'notices' => [
            'locked' => 'תבנית זו נעולה. לא ניתן לשנות את שדות המפתח והקטגוריה.',
        ],

        'language_label' => 'שפה: :locale',

        'replicate_suffix' => '(העתק)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'חיבור דוא"ל',
        'title_with_name' => 'חיבור: :name',

        'sections' => [
            'recipients' => 'נמענים',
            'content' => 'תוכן הדוא"ל',
            'attachments' => 'קבצים מצורפים',
            'tokens' => 'טוקנים זמינים',
        ],

        'fields' => [
            'from' => 'מאת',
            'to' => 'אל',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'הזן כתובות דוא"ל',
            'cc_placeholder' => 'כתובות CC',
            'bcc_placeholder' => 'כתובות BCC',
            'locale' => 'שפה',
            'subject' => 'נושא',
            'preheader' => 'טקסט תצוגה מקדימה',
            'body' => 'גוף',
            'attach_files' => 'צרף קבצים',
            'preheader_helper' => 'טקסט תצוגה מקדימה המוצג בלקוחות דוא"ל לפני הפתיחה',
            'no_tokens' => 'אין טוקנים מתועדים עבור תבנית זו. טוקנים כמו {{ user.name }} יוחלפו בעת שליחה דרך ה-API/קוד.',
        ],

        'actions' => [
            'send' => 'שלח דוא"ל',
            'preview' => 'תצוגה מקדימה',
        ],

        'confirm' => [
            'heading' => 'אישור שליחה',
            'description' => 'האם אתה בטוח שברצונך לשלוח דוא"ל זה?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'נמענים',
            'content' => 'תוכן',
            'attachments' => 'קבצים מצורפים',
        ],

        'fields' => [
            'from' => 'מאת',
            'to' => 'אל',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'תבנית',
            'subject' => 'נושא',
            'to_placeholder' => 'הזן כתובות דוא"ל',
            'cc_placeholder' => 'הזן כתובות CC',
            'bcc_placeholder' => 'הזן כתובות BCC',
            'auto_attached' => 'קבצים מצורפים אוטומטית',
            'auto_attached_none' => 'אין',
            'additional_attachments' => 'קבצים מצורפים נוספים',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'שלח דוא"ל',
        'modal_heading' => 'חיבור דוא"ל',
        'submit' => 'שלח',

        'notifications' => [
            'sent' => 'הדוא"ל נשלח בהצלחה',
            'sent_body' => 'נשלח אל: :recipients',
            'failed' => 'שליחת הדוא"ל נכשלה',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'פרטי ערכת הנושא',
            'background' => 'רקע ופריסה',
            'background_description' => 'צבעי מבנה ראשיים לפריסת הדוא"ל.',
            'typography' => 'טיפוגרפיה',
            'typography_description' => 'צבעים לטקסט וכותרות.',
            'buttons' => 'כפתורים',
            'buttons_description' => 'עיצוב כפתורי הנעה לפעולה.',
            'footer' => 'כותרת תחתונה',
            'footer_description' => 'עיצוב אזור הכותרת התחתונה.',
            'preview' => 'תצוגה מקדימה',
        ],

        'fields' => [
            'name' => 'שם',
            'is_default' => 'ערכת נושא ברירת מחדל',
            'is_default_helper' => 'ערכת הנושא של ברירת המחדל מיושמת על תבניות שאינן מציינות אחת.',
            'page_background' => 'רקע עמוד',
            'content_background' => 'רקע תוכן',
            'border' => 'מסגרת',
            'headings' => 'כותרות',
            'body_text' => 'טקסט גוף',
            'secondary_text' => 'טקסט משני',
            'links' => 'קישורים',
            'button_background' => 'רקע כפתור',
            'button_text' => 'טקסט כפתור',
            'primary_accent' => 'ראשי/הדגשה',
            'footer_background' => 'רקע כותרת תחתונה',
            'footer_text' => 'טקסט כותרת תחתונה',
        ],

        'columns' => [
            'primary' => 'ראשי',
            'background' => 'רקע',
            'text' => 'טקסט',
            'button' => 'כפתור',
            'default' => 'ברירת מחדל',
            'templates' => 'תבניות',
            'updated_at' => 'עודכן',
        ],

        'replicate_suffix' => '(העתק)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'אל',
            'template' => 'תבנית',
            'template_placeholder' => 'מותאם אישית',
            'sent_by' => 'נשלח על ידי',
            'subject' => 'נושא',
            'status' => 'סטטוס',
            'sent_by_placeholder' => 'מערכת',
            'related_to' => 'קשור ל',
            'sent_at' => 'נשלח',
        ],

        'filters' => [
            'from' => 'מתאריך',
            'until' => 'עד תאריך',
        ],

        'actions' => [
            'view' => 'צפה',
            'resend' => 'שלח מחדש',
            'resend_description' => 'פעולה זו תשלח עותק חדש של הדוא"ל לנמענים המקוריים.',
        ],


        'preview' => [
            'from' => 'מאת:',
            'to' => 'אל:',
            'cc' => 'העתק:',
            'template' => 'תבנית:',
            'sent' => 'נשלח:',
            'sent_not_yet' => 'עדיין לא',
            'status' => 'סטטוס:',
            'no_body' => 'תוכן האימייל לא נשמר. הפעל את <code>logging.store_rendered_body</code> בהגדרות כדי לשמור את תוכן האימייל.',
            'error' => 'פרטי השגיאה'
        ],
        'notifications' => [
            'resent' => 'הדוא"ל נשלח מחדש בהצלחה',
            'resend_failed' => 'שליחה מחדש של הדוא"ל נכשלה',
        ],

        'errors' => [
            'no_rendered_body' => 'לא ניתן לשלוח מחדש: אין גוף מרונדר שמור. הפעל את logging.store_rendered_body בהגדרות.',
            'no_template' => 'התבנית המקורית אינה קיימת עוד.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'דוא"ל שנשלח',

        'columns' => [
            'to' => 'אל',
            'template' => 'תבנית',
            'subject' => 'נושא',
            'status' => 'סטטוס',
            'sent_by' => 'נשלח על ידי',
            'sent_by_placeholder' => 'מערכת',
            'sent_at' => 'נשלח',
        ],

        'actions' => [
            'view' => 'צפה',
            'resend' => 'שלח מחדש',
            'resend_confirm' => 'האם אתה בטוח שברצונך לשלוח מחדש דוא"ל זה?',
        ],

        'notifications' => [
            'resent' => 'הדוא"ל נשלח מחדש בהצלחה',
            'resend_failed' => 'השליחה מחדש נכשלה',
        ],

        'empty' => [
            'heading' => 'לא נשלחו הודעות דוא"ל',
            'description' => 'הודעות דוא"ל שנשלחו עבור רשומה זו יופיעו כאן.',
        ],

        'errors' => [
            'no_body' => 'לא ניתן לשלוח מחדש: אין גוף מרונדר או תבנית שמורים.',
            'no_template' => 'התבנית המקורית אינה קיימת עוד.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'הגדרות דוא"ל',

        'tabs' => [
            'general' => 'כללי',
            'branding' => 'מיתוג',
            'logging' => 'רישום',
            'attachments' => 'קבצים מצורפים',
            'auth_emails' => 'דוא"ל אימות',
        ],

        'titles' => [
            'general' => 'הגדרות תבניות דוא"ל - כללי',
            'branding' => 'הגדרות תבניות דוא"ל - מיתוג',
            'logging' => 'הגדרות תבניות דוא"ל - רישום',
            'attachments' => 'הגדרות תבניות דוא"ל - קבצים מצורפים',
            'auth_emails' => 'הגדרות תבניות דוא"ל - דוא"ל אימות',
        ],

        'sections' => [
            'default_sender' => 'שולח ברירת מחדל',
            'default_sender_description' => 'כתובת השולח המוגדרת כברירת מחדל לכל הדוא"ל שנשלח על ידי התוסף.',
            'additional_senders' => 'שולחים נוספים',
            'add_additional_senders' => 'הוסף שולחים נוספים',
            'additional_senders_description' => 'כתובות שולח נוספות שמשתמשים יכולים לבחור בעת חיבור דוא"ל.',
            'localization' => 'לוקליזציה',
            'categories' => 'קטגוריות תבניות',
            'logo' => 'לוגו',
            'colors' => 'צבעים',
            'footer_links' => 'קישורי כותרת תחתונה',
            'add_footer_links' => 'הוסף קישורי כותרת תחתונה',
            'customer_service' => 'שירות לקוחות',
            'logging' => 'רישום דוא"ל',
            'logging_description' => 'שלוט באופן שבו דוא"ל שנשלח מתועד במסד הנתונים.',
            'cleanup' => 'ניקוי מתוזמן',
            'cleanup_description' => 'מחק אוטומטית רשומות ישנות של דוא"ל שנשלח על פי לוח זמנים.',
            'attachment_rules' => 'כללי קבצים מצורפים',
            'attachment_rules_description' => 'הגדר מגבלות לקבצים מצורפים בהודעות דוא"ל שנכתבו.',
            'auth_emails' => 'עקיפת דוא"ל אימות',
            'auth_emails_description' => 'עקוף את הודעות הדוא"ל של האימות המוגדרות כברירת מחדל של האפליקציה עם התבניות המותאמות אישית שלך.',
        ],

        'fields' => [
            'from_email' => 'דוא"ל השולח',
            'from_name' => 'שם השולח',
            'sender_email' => 'דוא"ל',
            'sender_name' => 'שם תצוגה',
            'sender_new' => 'שולח חדש',
            'default_locale' => 'שפת ברירת מחדל',
            'default_locale_helper' => 'שפת ברירת המחדל עבור תבניות חדשות (למשל en, hu, de).',
            'languages' => 'שפות זמינות',
            'language_code' => 'קוד',
            'language_display' => 'שם תצוגה',
            'language_flag' => 'סמל דגל',
            'language_new' => 'שפה חדשה',
            'category_key' => 'מפתח',
            'category_label' => 'תווית',
            'category_new' => 'קטגוריה חדשה',
            'logo_url' => 'URL או נתיב הלוגו',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL מוחלט או נתיב ללוגו הדוא"ל שלך.',
            'logo_width' => 'רוחב (px)',
            'logo_height' => 'גובה (px)',
            'content_width' => 'רוחב תוכן (px)',
            'primary_color' => 'צבע ראשי',
            'footer_link_label' => 'תווית',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'קישור חדש',
            'support_email' => 'דוא"ל תמיכה',
            'support_phone' => 'טלפון תמיכה',
            'enable_logging' => 'הפעל רישום',
            'enable_logging_helper' => 'כאשר מושבת, לא ייווצרו רשומות של דוא"ל שנשלח.',
            'store_rendered_body' => 'שמור גוף מרונדר',
            'store_rendered_body_helper' => 'שמור את ה-HTML הסופי של כל דוא"ל שנשלח. נדרש עבור תכונות שליחה מחדש ותצוגה מקדימה.',
            'retention_days' => 'שמירה (ימים)',
            'retention_days_helper' => 'מחק אוטומטית רשומות דוא"ל שנשלח לאחר מספר ימים זה. השאר ריק לשמירה לצמיתות.',
            'cleanup_enabled' => 'הפעל ניקוי מתוזמן',
            'cleanup_enabled_helper' => 'הפעל אוטומטית את פקודת הניקוי על פי לוח זמנים.',
            'cleanup_frequency' => 'תדירות ניקוי',
            'max_file_size' => 'גודל קובץ מרבי (MB)',
            'allowed_extensions' => 'סיומות קובץ מותרות',
            'allowed_extensions_placeholder' => 'הוסף סיומת (למשל pdf)',
            'allowed_extensions_helper' => 'סיומות קובץ מותרות להעלאה.',
            'override_verification' => 'עקוף אימות דוא"ל',
            'override_verification_helper' => 'השתמש בתבנית "user-verify-email" במקום דוא"ל האימות המוגדר כברירת מחדל של האפליקציה.',
            'override_password_reset' => 'עקוף איפוס סיסמה',
            'override_password_reset_helper' => 'השתמש בתבנית "user-password-reset" במקום דוא"ל איפוס הסיסמה המוגדר כברירת מחדל של האפליקציה.',
            'override_welcome' => 'עקוף דוא"ל ברוכים הבאים',
            'override_welcome_helper' => 'שלח דוא"ל ברוכים הבאים באמצעות תבנית "user-welcome" כאשר משתמש חדש נרשם.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. כל הזכויות שמורות.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'טיוטה',
            2 => 'בתור',
            3 => 'נשלח',
            4 => 'נכשל',
        ],

        'cleanup_frequency' => [
            1 => 'יומי',
            2 => 'שבועי',
            3 => 'חודשי',
        ],
    ],

];
