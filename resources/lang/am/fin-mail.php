<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'ኢሜይል',
        'templates' => 'ቅጦች',
        'themes' => 'ገጽታዎች',
        'sent-emails' => 'የተላኩ ኢሜይሎች',
        'settings' => 'ቅንብሮች',
    ],

    'models' => [
        'email_template' => 'የኢሜይል ቅጽ',
        'email_templates' => 'የኢሜይል ቅጦች',
        'email_theme' => 'የኢሜይል ገጽታ',
        'email_themes' => 'የኢሜይል ገጽታዎች',
        'sent_email' => 'የተላከ ኢሜይል',
        'sent_emails' => 'የተላኩ ኢሜይሎች',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'ይዘት',
            'settings' => 'ቅንብሮች',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'ስም',
            'key' => 'ቁልፍ',
            'key_helper' => 'በኮድ ውስጥ የሚጠቅም ልዩ ቁልፍ: ለምሳሌ "invoice-sent"',
            'category' => 'ምድብ',
            'subject' => 'ርዕሰ ጉዳይ',
            'subject_helper' => 'Tokens ይደገፋል: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'ቅድመ ርዕስ',
            'preheader_helper' => 'በኢሜይል ደንበኞች ውስጥ የሚታይ ቅድመ ዕይታ ጽሑፍ',
            'body' => 'አካል',
            'theme' => 'ገጽታ',
            'theme_placeholder' => 'ነባሪ ገጽታ',
            'is_active' => 'ንቁ',
            'is_active_helper' => 'ንቁ ያልሆኑ ቅጦች ለመላክ ሊጠቅሙ አይችሉም',
            'tags' => 'መለያዎች',
            'tags_placeholder' => 'ለማደራጀት መለያዎችን ያክሉ',
            'from_address' => 'ከኢሜይል',
            'from_name' => 'ከስም',
            'locale' => 'ቋንቋ',
        ],

        'sections' => [
            'custom_sender' => 'ብጁ ላኪ',
            'custom_sender_description' => 'ለዚህ ቅጽ ነባሪውን የላኪ አድራሻ ይቀይሩ',
        ],

        'tokens' => [
            'label' => 'ያሉ Tokens',
            'helper' => 'ለዚህ ቅጽ ያሉትን tokens ይመዝግቡ። ይህ አርታኢዎች ምን ተለዋዋጮችን መጠቀም እንደሚችሉ ይረዳቸዋል።',
            'token' => 'Token',
            'description' => 'መግለጫ',
            'example' => 'ምሳሌ',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'የተቀባዩ ሙሉ ስም',
            'example_placeholder' => 'አበበ በቀለ',
            'new_item' => 'አዲስ Token',
        ],

        'columns' => [
            'locales' => 'ቋንቋዎች',
            'active' => 'ንቁ',
            'locked' => 'ተቆልፏል',
            'sent' => 'ተልኳል',
            'updated_at' => 'ተዘምኗል',
        ],

        'actions' => [
            'preview' => 'ቅድመ ዕይታ',
            'send_test' => 'ሙከራ ላክ',
            'send_test_field' => 'ላክ ወደ',
            'send_test_locale' => 'ቋንቋ',
            'compose' => 'ኢሜይል ጻፍ',
            'version_history' => 'የስሪት ታሪክ',
            'back_to_templates' => 'ወደ ቅጦች ተመለስ',
        ],

        'notifications' => [
            'test_sent' => 'የሙከራ ኢሜይል ተልኳል!',
            'test_sent_body' => 'ወደ :email ተልኳል',
            'test_failed' => 'የሙከራ ኢሜይል መላክ አልተሳካም',
            'saved' => 'ቅጽ ተቀምጧል',
            'saved_body' => 'የስሪት ቅጽበት በራስ-ሰር ተቀምጧል።',
            'locked_skipped' => 'የተቆለፉ ቅጦች ተዘልለዋል',
            'locked_skipped_body' => ':count የተቆለፉ ቅጽ(ጦች) ተዘልለዋል እና አልተሰረዙም።',
        ],

        'tooltips' => [
            'locked' => 'ይህ ቅጽ ተቆልፏል — ቁልፍ እና ምድብ ለንባብ ብቻ ናቸው፣ ስረዛ ተከልክሏል።',
        ],

        'notices' => [
            'locked' => 'ይህ ቅጽ ተቆልፏል። ቁልፍ እና ምድብ መስኮች ሊቀየሩ አይችሉም።',
        ],

        'language_label' => 'ቋንቋ: :locale',

        'replicate_suffix' => '(ቅጂ)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'ኢሜይል ጻፍ',
        'title_with_name' => 'ጻፍ: :name',

        'sections' => [
            'recipients' => 'ተቀባዮች',
            'content' => 'የኢሜይል ይዘት',
            'attachments' => 'አባሪዎች',
            'tokens' => 'ያሉ Tokens',
        ],

        'fields' => [
            'from' => 'ከ',
            'to' => 'ወደ',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'የኢሜይል አድራሻዎችን ያስገቡ',
            'cc_placeholder' => 'CC አድራሻዎች',
            'bcc_placeholder' => 'BCC አድራሻዎች',
            'locale' => 'ቋንቋ',
            'subject' => 'ርዕሰ ጉዳይ',
            'preheader' => 'ቅድመ ርዕስ',
            'body' => 'አካል',
            'attach_files' => 'ፋይሎችን አያይዝ',
            'preheader_helper' => 'ከመክፈትዎ በፊት በኢሜይል ደንበኞች ውስጥ የሚታይ ቅድመ ዕይታ ጽሑፍ',
            'no_tokens' => 'ለዚህ ቅጽ ምንም tokens አልተመዘገቡም። እንደ {{ user.name }} ያሉ tokens በ API/ኮድ በኩል ሲላክ ይተካሉ።',
        ],

        'actions' => [
            'send' => 'ኢሜይል ላክ',
            'preview' => 'ቅድመ ዕይታ',
        ],

        'confirm' => [
            'heading' => 'መላክን አረጋግጥ',
            'description' => 'ይህን ኢሜይል መላክ እንደሚፈልጉ እርግጠኛ ነዎት?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'ተቀባዮች',
            'content' => 'ይዘት',
            'attachments' => 'አባሪዎች',
        ],

        'fields' => [
            'from' => 'ከ',
            'to' => 'ወደ',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'ቅጽ',
            'subject' => 'ርዕሰ ጉዳይ',
            'to_placeholder' => 'የኢሜይል አድራሻዎችን ያስገቡ',
            'cc_placeholder' => 'CC አድራሻዎችን ያስገቡ',
            'bcc_placeholder' => 'BCC አድራሻዎችን ያስገቡ',
            'auto_attached' => 'በራስ-ሰር የተያያዙ ፋይሎች',
            'auto_attached_none' => 'ምንም',
            'additional_attachments' => 'ተጨማሪ አባሪዎች',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'ኢሜይል ላክ',
        'modal_heading' => 'ኢሜይል ጻፍ',
        'submit' => 'ላክ',

        'notifications' => [
            'sent' => 'ኢሜይል በተሳካ ሁኔታ ተልኳል',
            'sent_body' => 'ወደ: :recipients ተልኳል',
            'failed' => 'ኢሜይል መላክ አልተሳካም',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'የገጽታ ዝርዝሮች',
            'background' => 'ዳራ እና አቀማመጥ',
            'background_description' => 'ለኢሜይል አቀማመጥ ዋና መዋቅራዊ ቀለሞች።',
            'typography' => 'ፊደል አጻጻፍ',
            'typography_description' => 'ለጽሑፍ እና ርዕሶች ቀለሞች።',
            'buttons' => 'አዝራሮች',
            'buttons_description' => 'የጥሪ-ለ-ድርጊት አዝራር ቅጥ።',
            'footer' => 'ግርጌ',
            'footer_description' => 'የግርጌ ክፍል ቅጥ።',
            'preview' => 'ቅድመ ዕይታ',
        ],

        'fields' => [
            'name' => 'ስም',
            'is_default' => 'ነባሪ ገጽታ',
            'is_default_helper' => 'ነባሪ ገጽታ ገጽታ ያልተመደበላቸው ቅጦች ላይ ይተገበራል።',
            'page_background' => 'የገጽ ዳራ',
            'content_background' => 'የይዘት ዳራ',
            'border' => 'ድንበር',
            'headings' => 'ርዕሶች',
            'body_text' => 'የአካል ጽሑፍ',
            'secondary_text' => 'ሁለተኛ ጽሑፍ',
            'links' => 'አገናኞች',
            'button_background' => 'የአዝራር ዳራ',
            'button_text' => 'የአዝራር ጽሑፍ',
            'primary_accent' => 'ዋና/አነቃቂ',
            'footer_background' => 'የግርጌ ዳራ',
            'footer_text' => 'የግርጌ ጽሑፍ',
        ],

        'columns' => [
            'primary' => 'ዋና',
            'background' => 'ዳራ',
            'text' => 'ጽሑፍ',
            'button' => 'አዝራር',
            'default' => 'ነባሪ',
            'templates' => 'ቅጦች',
            'updated_at' => 'ተዘምኗል',
        ],

        'replicate_suffix' => '(ቅጂ)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'ወደ',
            'template' => 'ቅጽ',
            'template_placeholder' => 'ብጁ',
            'sent_by' => 'ላኪ',
            'subject' => 'ርዕሰ ጉዳይ',
            'status' => 'ሁኔታ',
            'sent_by_placeholder' => 'ስርዓት',
            'related_to' => 'ተያያዥ',
            'sent_at' => 'ተልኳል',
        ],

        'filters' => [
            'from' => 'ከ',
            'until' => 'እስከ',
        ],

        'actions' => [
            'view' => 'ይመልከቱ',
            'resend' => 'እንደገና ላክ',
            'resend_description' => 'ይህ ለመጀመሪያዎቹ ተቀባዮች አዲስ የኢሜይል ቅጂ ይልካል።',
        ],

        'notifications' => [
            'resent' => 'ኢሜይል እንደገና በተሳካ ሁኔታ ተልኳል',
            'resend_failed' => 'ኢሜይል እንደገና መላክ አልተሳካም',
        ],

        'errors' => [
            'no_rendered_body' => 'እንደገና መላክ አይቻልም: ምንም የተሰራ አካል አልተቀመጠም። በቅንብሮች ውስጥ logging.store_rendered_body ያንቁ።',
            'no_template' => 'ዋናው ቅጽ ከእንግዲህ የለም።',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'የተላኩ ኢሜይሎች',

        'columns' => [
            'to' => 'ወደ',
            'template' => 'ቅጽ',
            'subject' => 'ርዕሰ ጉዳይ',
            'status' => 'ሁኔታ',
            'sent_by' => 'ላኪ',
            'sent_by_placeholder' => 'ስርዓት',
            'sent_at' => 'ተልኳል',
        ],

        'actions' => [
            'view' => 'ይመልከቱ',
            'resend' => 'እንደገና ላክ',
            'resend_confirm' => 'ይህን ኢሜይል እንደገና መላክ እንደሚፈልጉ እርግጠኛ ነዎት?',
        ],

        'notifications' => [
            'resent' => 'ኢሜይል እንደገና በተሳካ ሁኔታ ተልኳል',
            'resend_failed' => 'እንደገና መላክ አልተሳካም',
        ],

        'empty' => [
            'heading' => 'ምንም ኢሜይል አልተላከም',
            'description' => 'ለዚህ መዝገብ የተላኩ ኢሜይሎች እዚህ ይታያሉ።',
        ],

        'errors' => [
            'no_body' => 'እንደገና መላክ አይቻልም: ምንም የተሰራ አካል ወይም ቅጽ አልተቀመጠም።',
            'no_template' => 'ዋናው ቅጽ ከእንግዲህ የለም።',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'የኢሜይል ቅንብሮች',

        'tabs' => [
            'general' => 'ጠቅላላ',
            'branding' => 'ብራንዲንግ',
            'logging' => 'ምዝግብ ማስታወሻ',
            'attachments' => 'አባሪዎች',
            'auth_emails' => 'የማረጋገጫ ኢሜይሎች',
        ],

        'titles' => [
            'general' => 'የኢሜይል ቅጽ ቅንብሮች - ጠቅላላ',
            'branding' => 'የኢሜይል ቅጽ ቅንብሮች - ብራንዲንግ',
            'logging' => 'የኢሜይል ቅጽ ቅንብሮች - ምዝግብ ማስታወሻ',
            'attachments' => 'የኢሜይል ቅጽ ቅንብሮች - አባሪዎች',
            'auth_emails' => 'የኢሜይል ቅጽ ቅንብሮች - የማረጋገጫ ኢሜይሎች',
        ],

        'sections' => [
            'default_sender' => 'ነባሪ ላኪ',
            'default_sender_description' => 'በፕላጊኑ የሚላኩ ሁሉም ኢሜይሎች ነባሪ "ከ" አድራሻ።',
            'additional_senders' => 'ተጨማሪ ላኪዎች',
            'additional_senders_description' => 'ኢሜይል ሲጽፉ ተጠቃሚዎች የሚመርጧቸው ተጨማሪ "ከ" አድራሻዎች።',
            'localization' => 'ሀገራዊነት',
            'categories' => 'የቅጽ ምድቦች',
            'logo' => 'አርማ',
            'colors' => 'ቀለሞች',
            'footer_links' => 'የግርጌ አገናኞች',
            'customer_service' => 'የደንበኛ አገልግሎት',
            'logging' => 'የኢሜይል ምዝግብ',
            'logging_description' => 'የተላኩ ኢሜይሎች በመረጃ ቋት ውስጥ እንዴት እንደሚመዘገቡ ይቆጣጠሩ።',
            'cleanup' => 'መርሐግብር ያለው ጽዳት',
            'cleanup_description' => 'የቆዩ የተላኩ ኢሜይል መዝገቦችን በመርሐግብር በራስ-ሰር ይሰርዙ።',
            'attachment_rules' => 'የአባሪ ሕጎች',
            'attachment_rules_description' => 'በተጻፉ ኢሜይሎች ውስጥ ለፋይል አባሪዎች ገደቦችን ያዋቅሩ።',
            'auth_emails' => 'የማረጋገጫ ኢሜይል ተሻሽሎች',
            'auth_emails_description' => 'የመተግበሪያውን ነባሪ የማረጋገጫ ኢሜይሎች በብጁ ቅጦችዎ ይተኩ።',
        ],

        'fields' => [
            'from_email' => 'ከኢሜይል',
            'from_name' => 'ከስም',
            'sender_email' => 'ኢሜይል',
            'sender_name' => 'ማሳያ ስም',
            'sender_new' => 'አዲስ ላኪ',
            'default_locale' => 'ነባሪ ቋንቋ',
            'default_locale_helper' => 'ለአዳዲስ ቅጦች ነባሪ ቋንቋ (ለምሳሌ en, hu, de)።',
            'languages' => 'ያሉ ቋንቋዎች',
            'language_code' => 'ኮድ',
            'language_display' => 'ማሳያ ስም',
            'language_flag' => 'የባንዲራ አዶ',
            'language_new' => 'አዲስ ቋንቋ',
            'category_key' => 'ቁልፍ',
            'category_label' => 'መለያ',
            'category_new' => 'አዲስ ምድብ',
            'logo_url' => 'የአርማ URL ወይም መንገድ',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'ወደ ኢሜይል አርማዎ ፍጹም URL ወይም መንገድ።',
            'logo_width' => 'ስፋት (px)',
            'logo_height' => 'ቁመት (px)',
            'content_width' => 'የይዘት ስፋት (px)',
            'primary_color' => 'ዋና ቀለም',
            'footer_link_label' => 'መለያ',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'አዲስ አገናኝ',
            'support_email' => 'የድጋፍ ኢሜይል',
            'support_phone' => 'የድጋፍ ስልክ',
            'enable_logging' => 'ምዝግብ ማስታወሻ አንቃ',
            'enable_logging_helper' => 'ሲጠፋ ምንም የተላኩ ኢሜይል መዝገቦች አይፈጠሩም።',
            'store_rendered_body' => 'የተሰራ አካልን አቀምጥ',
            'store_rendered_body_helper' => 'የእያንዳንዱ የተላከ ኢሜይል የመጨረሻ HTML ያስቀምጡ። ለእንደገና መላክ እና ቅድመ ዕይታ ባህሪዎች ያስፈልጋል።',
            'retention_days' => 'ማቆየት (ቀናት)',
            'retention_days_helper' => 'ከዚህ ቀናት በኋላ የተላኩ ኢሜይል መዝገቦችን በራስ-ሰር ሰርዝ። ለዘላለም ለማቆየት ባዶ ይተው።',
            'cleanup_enabled' => 'መርሐግብር ያለው ጽዳት አንቃ',
            'cleanup_enabled_helper' => 'የጽዳት ትዕዛዙን በመርሐግብር በራስ-ሰር አስኪድ።',
            'cleanup_frequency' => 'የጽዳት ድግግሞሽ',
            'max_file_size' => 'ከፍተኛ የፋይል መጠን (MB)',
            'allowed_extensions' => 'የተፈቀዱ የፋይል ቅጥያዎች',
            'allowed_extensions_placeholder' => 'ቅጥያ ያክሉ (ለምሳሌ pdf)',
            'allowed_extensions_helper' => 'ለመስቀል የተፈቀዱ የፋይል ቅጥያዎች።',
            'override_verification' => 'የኢሜይል ማረጋገጫ ተካ',
            'override_verification_helper' => 'ከመተግበሪያው ነባሪ የማረጋገጫ ኢሜይል ይልቅ "user-verify-email" ቅጽን ይጠቀሙ።',
            'override_password_reset' => 'የይለፍ ቃል ዳግም ማስጀመር ተካ',
            'override_password_reset_helper' => 'ከመተግበሪያው ነባሪ የይለፍ ቃል ዳግም ማስጀመር ኢሜይል ይልቅ "user-password-reset" ቅጽን ይጠቀሙ።',
            'override_welcome' => 'የእንኳን ደህና መጡ ኢሜይል ተካ',
            'override_welcome_helper' => 'አዲስ ተጠቃሚ ሲመዘገብ "user-welcome" ቅጽን ተጠቅሞ የእንኳን ደህና መጡ ኢሜይል ይላኩ።',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. መብቶች ሁሉ የተጠበቁ ናቸው።',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'ረቂቅ',
            2 => 'ወረፋ',
            3 => 'ተልኳል',
            4 => 'ያልተሳካ',
        ],

        'cleanup_frequency' => [
            1 => 'ዕለታዊ',
            2 => 'ሳምንታዊ',
            3 => 'ወርሃዊ',
        ],
    ],

];
