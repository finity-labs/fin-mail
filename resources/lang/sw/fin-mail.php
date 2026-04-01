<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'Barua pepe',
        'templates' => 'Violezo',
        'themes' => 'Mandhari',
        'sent-emails' => 'Barua pepe zilizotumwa',
        'settings' => 'Mipangilio',
    ],

    'models' => [
        'email_template' => 'Kiolezo cha barua pepe',
        'email_templates' => 'Violezo vya barua pepe',
        'email_theme' => 'Mandhari ya barua pepe',
        'email_themes' => 'Mandhari za barua pepe',
        'sent_email' => 'Barua pepe iliyotumwa',
        'sent_emails' => 'Barua pepe zilizotumwa',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Maudhui',
            'settings' => 'Mipangilio',
            'tokens' => 'Tokeni',
        ],

        'fields' => [
            'name' => 'Jina',
            'key' => 'Ufunguo',
            'key_helper' => 'Ufunguo wa kipekee unaotumika kwenye msimbo, mfano: "invoice-sent"',
            'category' => 'Kategoria',
            'subject' => 'Mada',
            'subject_helper' => 'Inasaidia tokeni: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Maandishi ya awali',
            'preheader_helper' => 'Maandishi ya hakikisho yanayoonyeshwa kwenye programu za barua pepe',
            'body' => 'Mwili',
            'theme' => 'Mandhari',
            'theme_placeholder' => 'Mandhari chaguo-msingi',
            'is_active' => 'Hai',
            'is_active_helper' => 'Violezo visivyohai haviwezi kutumika kutuma',
            'tags' => 'Lebo',
            'tags_placeholder' => 'Ongeza lebo kwa mpangilio',
            'from_address' => 'Barua pepe ya mtumaji',
            'from_name' => 'Jina la mtumaji',
            'locale' => 'Lugha',
        ],

        'sections' => [
            'custom_sender' => 'Mtumaji maalum',
            'custom_sender_description' => 'Badilisha anwani chaguo-msingi ya mtumaji kwa kiolezo hiki',
        ],

        'tokens' => [
            'label' => 'Tokeni zinazopatikana',
            'helper' => 'Andika tokeni zinazopatikana kwa kiolezo hiki. Hii inasaidia wahariri kujua ni vigezo gani wanaweza kutumia.',
            'token' => 'Tokeni',
            'description' => 'Maelezo',
            'example' => 'Mfano',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Jina kamili la mpokeaji',
            'example_placeholder' => 'John Doe',
            'new_item' => 'Tokeni mpya',
        ],

        'blocks' => [
            'button' => 'Kitufe',
            'button_heading' => 'Ingiza kitufe',
            'button_label' => 'Maandishi ya kitufe',
            'button_url' => 'URL',
            'button_align' => 'Mpangilio',
            'align_left' => 'Kushoto',
            'align_center' => 'Katikati',
            'align_right' => 'Kulia',
            'button_default_label' => 'Bofya hapa',
        ],

        'columns' => [
            'locales' => 'Lugha',
            'active' => 'Hai',
            'locked' => 'Imefungwa',
            'sent' => 'Zimetumwa',
            'updated_at' => 'Imesasishwa',
        ],

        'actions' => [
            'preview' => 'Hakikisho',
            'send_test' => 'Tuma jaribio',
            'send_test_field' => 'Tuma kwa',
            'send_test_locale' => 'Lugha',
            'compose' => 'Tunga barua pepe',
            'version_history' => 'Historia ya matoleo',
            'back_to_templates' => 'Rudi kwa violezo',
        ],

        'notifications' => [
            'test_sent' => 'Barua pepe ya jaribio imetumwa!',
            'test_sent_body' => 'Imetumwa kwa :email',
            'test_failed' => 'Imeshindwa kutuma barua pepe ya jaribio',
            'saved' => 'Kiolezo kimehifadhiwa',
            'saved_body' => 'Toleo la hifadhi limehifadhiwa kiotomatiki.',
            'locked_skipped' => 'Violezo vilivyofungwa vimerukwa',
            'locked_skipped_body' => 'Violezo :count vilivyofungwa vimerukwa na havikufutwa.',
        ],

        'tooltips' => [
            'locked' => 'Kiolezo hiki kimefungwa -- ufunguo na kategoria ni za kusoma tu, kufuta kumezuiwa.',
        ],

        'versioning' => [
            'date' => 'Tarehe',
            'by' => 'Na',
            'preview' => 'Hakiki',
            'restore' => 'Rejesha',
            'restore_confirm' => 'Una uhakika unataka kurejesha toleo :version? Maudhui ya sasa yatahifadhiwa kwanza kama toleo jipya.',
            'restored' => 'Toleo :version limerejeswa.',
            'empty' => 'Hakuna historia ya matoleo inayopatikana.',
        ],

        'notices' => [
            'locked' => 'Kiolezo hiki kimefungwa. Sehemu za ufunguo na kategoria haziwezi kubadilishwa.',
        ],

        'language_label' => 'Lugha: :locale',

        'replicate_suffix' => '(Nakala)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Tunga barua pepe',
        'title_with_name' => 'Tunga: :name',

        'sections' => [
            'recipients' => 'Wapokeaji',
            'content' => 'Maudhui ya barua pepe',
            'attachments' => 'Viambatanisho',
            'tokens' => 'Tokeni zinazopatikana',
        ],

        'fields' => [
            'from' => 'Kutoka',
            'to' => 'Kwa',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Ingiza anwani za barua pepe',
            'cc_placeholder' => 'Anwani za CC',
            'bcc_placeholder' => 'Anwani za BCC',
            'locale' => 'Lugha',
            'subject' => 'Mada',
            'preheader' => 'Maandishi ya awali',
            'body' => 'Mwili',
            'attach_files' => 'Ambatanisha faili',
            'preheader_helper' => 'Maandishi ya hakikisho yanayoonyeshwa kwenye programu za barua pepe kabla ya kufungua',
            'no_tokens' => 'Hakuna tokeni zilizorekodiwa kwa kiolezo hiki. Tokeni kama {{ user.name }} zitabadilishwa zinapotumwa kupitia API/msimbo.',
        ],

        'actions' => [
            'send' => 'Tuma barua pepe',
            'preview' => 'Hakikisho',
        ],

        'confirm' => [
            'heading' => 'Thibitisha kutuma',
            'description' => 'Una uhakika unataka kutuma barua pepe hii?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Wapokeaji',
            'content' => 'Maudhui',
            'attachments' => 'Viambatanisho',
        ],

        'fields' => [
            'from' => 'Kutoka',
            'to' => 'Kwa',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Kiolezo',
            'subject' => 'Mada',
            'to_placeholder' => 'Ingiza anwani za barua pepe',
            'cc_placeholder' => 'Ingiza anwani za CC',
            'bcc_placeholder' => 'Ingiza anwani za BCC',
            'auto_attached' => 'Faili zilizoambatanishwa kiotomatiki',
            'auto_attached_none' => 'Hakuna',
            'additional_attachments' => 'Viambatanisho vya ziada',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Tuma barua pepe',
        'modal_heading' => 'Tunga barua pepe',
        'submit' => 'Tuma',

        'notifications' => [
            'sent' => 'Barua pepe imetumwa kikamilifu',
            'sent_body' => 'Imetumwa kwa: :recipients',
            'failed' => 'Imeshindwa kutuma barua pepe',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Maelezo ya mandhari',
            'background' => 'Usuli na mpangilio',
            'background_description' => 'Rangi kuu za muundo wa mpangilio wa barua pepe.',
            'typography' => 'Taipografia',
            'typography_description' => 'Rangi za maandishi na vichwa.',
            'buttons' => 'Vitufe',
            'buttons_description' => 'Muundo wa vitufe vya wito wa hatua.',
            'footer' => 'Kijachini',
            'footer_description' => 'Muundo wa sehemu ya kijachini.',
            'preview' => 'Hakikisho',
        ],

        'fields' => [
            'name' => 'Jina',
            'is_default' => 'Mandhari chaguo-msingi',
            'is_default_helper' => 'Mandhari chaguo-msingi inatumika kwa violezo ambavyo havijabainisha moja.',
            'page_background' => 'Usuli wa ukurasa',
            'content_background' => 'Usuli wa maudhui',
            'border' => 'Mpaka',
            'headings' => 'Vichwa',
            'body_text' => 'Maandishi ya mwili',
            'secondary_text' => 'Maandishi ya pili',
            'links' => 'Viungo',
            'button_background' => 'Usuli wa kitufe',
            'button_text' => 'Maandishi ya kitufe',
            'primary_accent' => 'Msingi/Lafudhi',
            'footer_background' => 'Usuli wa kijachini',
            'footer_text' => 'Maandishi ya kijachini',
        ],

        'columns' => [
            'primary' => 'Msingi',
            'background' => 'Usuli',
            'text' => 'Maandishi',
            'button' => 'Kitufe',
            'default' => 'Chaguo-msingi',
            'templates' => 'Violezo',
            'updated_at' => 'Imesasishwa',
        ],

        'replicate_suffix' => '(Nakala)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Kwa',
            'template' => 'Kiolezo',
            'template_placeholder' => 'Maalum',
            'sent_by' => 'Imetumwa na',
            'subject' => 'Mada',
            'status' => 'Hali',
            'sent_by_placeholder' => 'Mfumo',
            'related_to' => 'Inahusiana na',
            'sent_at' => 'Imetumwa',
        ],

        'filters' => [
            'from' => 'Kutoka',
            'until' => 'Hadi',
        ],

        'actions' => [
            'view' => 'Tazama',
            'resend' => 'Tuma tena',
            'resend_description' => 'Hii itatuma nakala mpya ya barua pepe kwa wapokeaji wa awali.',
        ],


        'preview' => [
            'from' => 'Kutoka:',
            'to' => 'Kwa:',
            'cc' => 'CC:',
            'template' => 'Kiolezo:',
            'sent' => 'Imetumwa:',
            'sent_not_yet' => 'Bado',
            'status' => 'Hali:',
            'no_body' => 'Maudhui ya barua pepe hayakuhifadhiwa. Washa <code>logging.store_rendered_body</code> kwenye mipangilio ili kuhifadhi maudhui ya barua pepe.',
            'error' => 'Maelezo ya Hitilafu'
        ],
        'notifications' => [
            'resent' => 'Barua pepe imetumwa tena kikamilifu',
            'resend_failed' => 'Imeshindwa kutuma barua pepe tena',
        ],

        'errors' => [
            'no_rendered_body' => 'Haiwezi kutuma tena: hakuna mwili uliotengenezwa uliohifadhiwa. Washa logging.store_rendered_body katika mipangilio.',
            'no_template' => 'Kiolezo cha awali hakipo tena.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Barua pepe zilizotumwa',

        'columns' => [
            'to' => 'Kwa',
            'template' => 'Kiolezo',
            'subject' => 'Mada',
            'status' => 'Hali',
            'sent_by' => 'Imetumwa na',
            'sent_by_placeholder' => 'Mfumo',
            'sent_at' => 'Imetumwa',
        ],

        'actions' => [
            'view' => 'Tazama',
            'resend' => 'Tuma tena',
            'resend_confirm' => 'Una uhakika unataka kutuma barua pepe hii tena?',
        ],

        'notifications' => [
            'resent' => 'Barua pepe imetumwa tena kikamilifu',
            'resend_failed' => 'Imeshindwa kutuma tena',
        ],

        'empty' => [
            'heading' => 'Hakuna barua pepe zilizotumwa',
            'description' => 'Barua pepe zilizotumwa kwa rekodi hii zitaonekana hapa.',
        ],

        'errors' => [
            'no_body' => 'Haiwezi kutuma tena: hakuna mwili uliotengenezwa au kiolezo kilichohifadhiwa.',
            'no_template' => 'Kiolezo cha awali hakipo tena.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Mipangilio ya barua pepe',

        'tabs' => [
            'general' => 'Jumla',
            'branding' => 'Chapa',
            'logging' => 'Kumbukumbu',
            'attachments' => 'Viambatanisho',
            'auth_emails' => 'Barua pepe za uthibitishaji',
        ],

        'titles' => [
            'general' => 'Mipangilio ya violezo vya barua pepe - Jumla',
            'branding' => 'Mipangilio ya violezo vya barua pepe - Chapa',
            'logging' => 'Mipangilio ya violezo vya barua pepe - Kumbukumbu',
            'attachments' => 'Mipangilio ya violezo vya barua pepe - Viambatanisho',
            'auth_emails' => 'Mipangilio ya violezo vya barua pepe - Barua pepe za uthibitishaji',
        ],

        'sections' => [
            'default_sender' => 'Mtumaji chaguo-msingi',
            'default_sender_description' => 'Anwani chaguo-msingi ya "Kutoka" kwa barua pepe zote zinazotumwa na programu-jalizi.',
            'additional_senders' => 'Watumaji wa ziada',
            'add_additional_senders' => 'Ongeza Watumaji Zaidi',
            'additional_senders_description' => 'Anwani za ziada za "Kutoka" ambazo watumiaji wanaweza kuchagua wakati wa kutunga barua pepe.',
            'localization' => 'Lugha',
            'categories' => 'Kategoria za violezo',
            'logo' => 'Nembo',
            'colors' => 'Rangi',
            'footer_links' => 'Viungo vya kijachini',
            'add_footer_links' => 'Ongeza Viungo vya Chini ya Ukurasa',
            'customer_service' => 'Huduma kwa wateja',
            'logging' => 'Kumbukumbu za barua pepe',
            'logging_description' => 'Dhibiti jinsi barua pepe zilizotumwa zinavyorekodiwa kwenye hifadhidata.',
            'cleanup' => 'Usafishaji uliopangwa',
            'cleanup_description' => 'Futa kiotomatiki rekodi za zamani za barua pepe zilizotumwa kwa ratiba.',
            'attachment_rules' => 'Sheria za viambatanisho',
            'attachment_rules_description' => 'Sanidi vikomo vya viambatanisho vya faili katika barua pepe zilizoandikwa.',
            'auth_emails' => 'Kubadilisha barua pepe za uthibitishaji',
            'auth_emails_description' => 'Badilisha barua pepe chaguo-msingi za uthibitishaji wa programu na violezo vyako maalum.',
        ],

        'fields' => [
            'from_email' => 'Barua pepe ya mtumaji',
            'from_name' => 'Jina la mtumaji',
            'sender_email' => 'Barua pepe',
            'sender_name' => 'Jina la kuonyesha',
            'sender_new' => 'Mtumaji mpya',
            'default_locale' => 'Lugha chaguo-msingi',
            'default_locale_helper' => 'Lugha chaguo-msingi kwa violezo vipya (mfano: en, hu, de).',
            'languages' => 'Lugha zinazopatikana',
            'language_code' => 'Msimbo',
            'language_display' => 'Jina la kuonyesha',
            'language_flag' => 'Ikoni ya bendera',
            'language_new' => 'Lugha mpya',
            'category_key' => 'Ufunguo',
            'category_label' => 'Lebo',
            'category_new' => 'Kategoria mpya',
            'logo_url' => 'URL au njia ya nembo',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL kamili au njia ya nembo yako ya barua pepe.',
            'logo_width' => 'Upana (px)',
            'logo_height' => 'Urefu (px)',
            'content_width' => 'Upana wa maudhui (px)',
            'primary_color' => 'Rangi kuu',
            'footer_link_label' => 'Lebo',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Kiungo kipya',
            'support_email' => 'Barua pepe ya msaada',
            'support_phone' => 'Simu ya msaada',
            'enable_logging' => 'Washa kumbukumbu',
            'enable_logging_helper' => 'Inapozimwa, hakuna rekodi za barua pepe zilizotumwa zitakazoundwa.',
            'store_rendered_body' => 'Hifadhi mwili uliotengenezwa',
            'store_rendered_body_helper' => 'Hifadhi HTML ya mwisho ya kila barua pepe iliyotumwa. Inahitajika kwa vipengele vya kutuma tena na hakikisho.',
            'retention_days' => 'Uhifadhi (siku)',
            'retention_days_helper' => 'Futa kiotomatiki rekodi za barua pepe zilizotumwa baada ya siku hizi. Acha tupu ili kuhifadhi milele.',
            'cleanup_enabled' => 'Washa usafishaji uliopangwa',
            'cleanup_enabled_helper' => 'Endesha kiotomatiki amri ya usafishaji kwa ratiba.',
            'cleanup_frequency' => 'Mzunguko wa usafishaji',
            'max_file_size' => 'Ukubwa wa juu wa faili (MB)',
            'allowed_extensions' => 'Viendelezi vya faili vinavyoruhusiwa',
            'allowed_extensions_placeholder' => 'Ongeza kiendelezi (mfano: pdf)',
            'allowed_extensions_helper' => 'Viendelezi vya faili vinavyoruhusiwa kupakiwa.',
            'override_verification' => 'Badilisha uthibitishaji wa barua pepe',
            'override_verification_helper' => 'Tumia kiolezo cha "user-verify-email" badala ya barua pepe chaguo-msingi ya uthibitishaji wa programu.',
            'override_password_reset' => 'Badilisha uwekaji upya wa nenosiri',
            'override_password_reset_helper' => 'Tumia kiolezo cha "user-password-reset" badala ya barua pepe chaguo-msingi ya uwekaji upya wa nenosiri.',
            'override_welcome' => 'Badilisha barua pepe ya karibu',
            'override_welcome_helper' => 'Tuma barua pepe ya karibu kwa kutumia kiolezo cha "user-welcome" mtumiaji mpya anapojisajili.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Haki zote zimehifadhiwa.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Rasimu',
            2 => 'Kwenye foleni',
            3 => 'Imetumwa',
            4 => 'Imeshindwa',
        ],

        'cleanup_frequency' => [
            1 => 'Kila siku',
            2 => 'Kila wiki',
            3 => 'Kila mwezi',
        ],
    ],

];
