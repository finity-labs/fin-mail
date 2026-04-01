<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'E-name',
        'templates' => 'Şablon',
        'themes' => 'Dirb',
        'sent-emails' => 'E-nameyên şandî',
        'settings' => 'Mîheng',
    ],

    'models' => [
        'email_template' => 'Şablona e-nameyê',
        'email_templates' => 'Şablonên e-nameyê',
        'email_theme' => 'Dirba e-nameyê',
        'email_themes' => 'Dirbên e-nameyê',
        'sent_email' => 'E-nameya şandî',
        'sent_emails' => 'E-nameyên şandî',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Naverok',
            'settings' => 'Mîheng',
            'tokens' => 'Token',
        ],

        'fields' => [
            'name' => 'Nav',
            'key' => 'Kilît',
            'key_helper' => 'Kilîta yekta ya di kodê de: mînak "invoice-sent"',
            'category' => 'Kategorî',
            'subject' => 'Mijar',
            'subject_helper' => 'Tokenan piştgirî dike: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Pêşdîtin',
            'preheader_helper' => 'Nivîsa pêşdîtinê ya di xerîdarên e-nameyê de tê nîşandan',
            'body' => 'Naverok',
            'theme' => 'Dirb',
            'theme_placeholder' => 'Dirba standard',
            'is_active' => 'Çalak',
            'is_active_helper' => 'Şablonên neçalak ji bo şandinê nayên bikaranîn',
            'tags' => 'Etîket',
            'tags_placeholder' => 'Ji bo organîzasyonê etîketan lê zêde bike',
            'from_address' => 'E-nameya şandyar',
            'from_name' => 'Navê şandyar',
            'locale' => 'Ziman',
        ],

        'sections' => [
            'custom_sender' => 'Şandyarê taybet',
            'custom_sender_description' => 'Ji bo vê şablonê navnîşana şandyarê standard biguherîne',
        ],

        'tokens' => [
            'label' => 'Tokenên berdest',
            'helper' => 'Tokenên berdest ên vê şablonê belge bikin. Ev ji edîtoran re dibe alîkar ku bizanibin ka kîjan guhêrbar dikarin bikar bînin.',
            'token' => 'Token',
            'description' => 'Danasîn',
            'example' => 'Mînak',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Navê tevahî yê wergir',
            'example_placeholder' => 'Azad Yilmaz',
            'new_item' => 'Tokena nû',
        ],

        'blocks' => [
            'button' => 'Bişkojk',
            'button_heading' => 'Bişkojkê têxe',
            'button_label' => 'Nivîsa bişkojkê',
            'button_url' => 'URL',
            'button_align' => 'Rêzkirin',
            'align_left' => 'Çep',
            'align_center' => 'Navend',
            'align_right' => 'Rast',
            'button_default_label' => 'Li vir bikirtînin',
        ],

        'columns' => [
            'locales' => 'Ziman',
            'active' => 'Çalak',
            'locked' => 'Girtî',
            'sent' => 'Şandî',
            'updated_at' => 'Hatiye nûkirin',
        ],

        'actions' => [
            'preview' => 'Pêşdîtin',
            'send_test' => 'Testa bişîne',
            'send_test_field' => 'Bişîne bo',
            'send_test_locale' => 'Ziman',
            'compose' => 'E-nameyê binivîse',
            'version_history' => 'Dîroka guhertoyan',
            'back_to_templates' => 'Vegere şablonan',
        ],

        'notifications' => [
            'test_sent' => 'E-nameya testê hat şandin!',
            'test_sent_body' => 'Hat şandin bo :email',
            'test_failed' => 'Şandina e-nameya testê bi ser neket',
            'saved' => 'Şablon hat tomarkirin',
            'saved_body' => 'Wêneya guhertoyê bixweber hat tomarkirin.',
            'locked_skipped' => 'Şablonên girtî hatin derbaskirin',
            'locked_skipped_body' => ':count şablonên girtî hatin derbaskirin û nehatin jêbirin.',
        ],

        'tooltips' => [
            'locked' => 'Ev şablon girtî ye — kilît û kategorî tenê dixwînin, jêbirin nehat destûr.',
        ],

        'versioning' => [
            'date' => 'Dîrok',
            'by' => 'Ji aliyê',
            'preview' => 'Pêşdîtin',
            'restore' => 'Vegerîne',
            'restore_confirm' => 'Tu bawer î ku dixwazî guhertoya :version vegerînî? Naveroka heyî pêşî wek guhertoyeke nû tê tomarkirin.',
            'restored' => 'Guhertoya :version hat vegerandin.',
            'empty' => 'Dîroka guhertoyan tune ye.',
        ],

        'notices' => [
            'locked' => 'Ev şablon girtî ye. Qadên kilît û kategorî nayên guhertin.',
        ],

        'language_label' => 'Ziman: :locale',

        'replicate_suffix' => '(Kopî)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'E-nameyê binivîse',
        'title_with_name' => 'Binivîse: :name',

        'sections' => [
            'recipients' => 'Wergir',
            'content' => 'Naveroka e-nameyê',
            'attachments' => 'Pêvek',
            'tokens' => 'Tokenên berdest',
        ],

        'fields' => [
            'from' => 'Ji',
            'to' => 'Bo',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Navnîşanên e-nameyê binivîse',
            'cc_placeholder' => 'Navnîşanên CC',
            'bcc_placeholder' => 'Navnîşanên BCC',
            'locale' => 'Ziman',
            'subject' => 'Mijar',
            'preheader' => 'Pêşdîtin',
            'body' => 'Naverok',
            'attach_files' => 'Pelan pêve bike',
            'preheader_helper' => 'Nivîsa pêşdîtinê ya berî vekirinê di xerîdarên e-nameyê de tê nîşandan',
            'no_tokens' => 'Ji bo vê şablonê token nehatine belge kirin. Tokenên wek {{ user.name }} dema bi API/kodê were şandin dê werin guhertin.',
        ],

        'actions' => [
            'send' => 'E-nameyê bişîne',
            'preview' => 'Pêşdîtin',
        ],

        'confirm' => [
            'heading' => 'Şandinê piştrast bike',
            'description' => 'Tu bawer î ku dixwazî vê e-nameyê bişînî?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Wergir',
            'content' => 'Naverok',
            'attachments' => 'Pêvek',
        ],

        'fields' => [
            'from' => 'Ji',
            'to' => 'Bo',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Şablon',
            'subject' => 'Mijar',
            'to_placeholder' => 'Navnîşanên e-nameyê binivîse',
            'cc_placeholder' => 'Navnîşanên CC binivîse',
            'bcc_placeholder' => 'Navnîşanên BCC binivîse',
            'auto_attached' => 'Pelên bixweber pêvekirî',
            'auto_attached_none' => 'Tune',
            'additional_attachments' => 'Pêvekên zêde',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'E-nameyê bişîne',
        'modal_heading' => 'E-nameyê binivîse',
        'submit' => 'Bişîne',

        'notifications' => [
            'sent' => 'E-name bi serkeftî hat şandin',
            'sent_body' => 'Hat şandin bo: :recipients',
            'failed' => 'Şandina e-nameyê bi ser neket',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Hûrguliyên dirbê',
            'background' => 'Paşxane û rêxistin',
            'background_description' => 'Rengên bingehîn ên strukturê ji bo rêxistina e-nameyê.',
            'typography' => 'Tîpografî',
            'typography_description' => 'Rengên ji bo nivîs û sernavan.',
            'buttons' => 'Bişkoj',
            'buttons_description' => 'Şêwaza bişkojên bangkirinê.',
            'footer' => 'Binê rûpelê',
            'footer_description' => 'Şêwaza qada binê rûpelê.',
            'preview' => 'Pêşdîtin',
        ],

        'fields' => [
            'name' => 'Nav',
            'is_default' => 'Dirba standard',
            'is_default_helper' => 'Dirba standard li ser şablonên ku dirbek destnîşan nakin tê sepandin.',
            'page_background' => 'Paşxaneya rûpelê',
            'content_background' => 'Paşxaneya naverokê',
            'border' => 'Sînor',
            'headings' => 'Sernav',
            'body_text' => 'Nivîsa naverokê',
            'secondary_text' => 'Nivîsa duyemîn',
            'links' => 'Girêdan',
            'button_background' => 'Paşxaneya bişkojê',
            'button_text' => 'Nivîsa bişkojê',
            'primary_accent' => 'Seretayî/Vurgu',
            'footer_background' => 'Paşxaneya binê rûpelê',
            'footer_text' => 'Nivîsa binê rûpelê',
        ],

        'columns' => [
            'primary' => 'Seretayî',
            'background' => 'Paşxane',
            'text' => 'Nivîs',
            'button' => 'Bişkoj',
            'default' => 'Standard',
            'templates' => 'Şablon',
            'updated_at' => 'Hatiye nûkirin',
        ],

        'replicate_suffix' => '(Kopî)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Bo',
            'template' => 'Şablon',
            'template_placeholder' => 'Taybet',
            'sent_by' => 'Şandyar',
            'subject' => 'Mijar',
            'status' => 'Rewş',
            'sent_by_placeholder' => 'Sîstem',
            'related_to' => 'Girêdayî bi',
            'sent_at' => 'Şandî',
        ],

        'filters' => [
            'from' => 'Ji',
            'until' => 'Heta',
        ],

        'actions' => [
            'view' => 'Bibîne',
            'resend' => 'Ji nû bişîne',
            'resend_description' => 'Kopîyeke nû ya e-nameyê dê ji wergirên eslî re were şandin.',
        ],


        'preview' => [
            'from' => 'Ji:',
            'to' => 'Ji bo:',
            'cc' => 'CC:',
            'template' => 'Şablon:',
            'sent' => 'Hat şandin:',
            'sent_not_yet' => 'Hîn na',
            'status' => 'Rewş:',
            'no_body' => 'Naveroka e-nameyê nehat tomarkirin. Ji bo tomarkirina naveroka e-nameyê <code>logging.store_rendered_body</code> di mîhengan de çalak bike.',
            'error' => 'Hûrguliyên çewtiyê'
        ],
        'notifications' => [
            'resent' => 'E-name bi serkeftî ji nû hat şandin',
            'resend_failed' => 'Ji nû şandin bi ser neket',
        ],

        'errors' => [
            'no_rendered_body' => 'Nayê şandin ji nû: naveroka hatî çêkirin nehatiye tomarkirin. Di mîhengan de logging.store_rendered_body çalak bike.',
            'no_template' => 'Şablona eslî êdî tune ye.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'E-nameyên şandî',

        'columns' => [
            'to' => 'Bo',
            'template' => 'Şablon',
            'subject' => 'Mijar',
            'status' => 'Rewş',
            'sent_by' => 'Şandyar',
            'sent_by_placeholder' => 'Sîstem',
            'sent_at' => 'Şandî',
        ],

        'actions' => [
            'view' => 'Bibîne',
            'resend' => 'Ji nû bişîne',
            'resend_confirm' => 'Tu bawer î ku dixwazî vê e-nameyê ji nû bişînî?',
        ],

        'notifications' => [
            'resent' => 'E-name bi serkeftî ji nû hat şandin',
            'resend_failed' => 'Ji nû şandin bi ser neket',
        ],

        'empty' => [
            'heading' => 'E-name nehatiye şandin',
            'description' => 'E-nameyên ku ji bo vê tomarê hatine şandin dê li vir werin nîşandan.',
        ],

        'errors' => [
            'no_body' => 'Nayê şandin ji nû: naveroka hatî çêkirin an şablon nehatiye tomarkirin.',
            'no_template' => 'Şablona eslî êdî tune ye.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Mîhengên e-nameyê',

        'tabs' => [
            'general' => 'Giştî',
            'branding' => 'Marka',
            'logging' => 'Tomarkirin',
            'attachments' => 'Pêvek',
            'auth_emails' => 'E-nameyên nasnameyê',
        ],

        'titles' => [
            'general' => 'Mîhengên şablona e-nameyê - Giştî',
            'branding' => 'Mîhengên şablona e-nameyê - Marka',
            'logging' => 'Mîhengên şablona e-nameyê - Tomarkirin',
            'attachments' => 'Mîhengên şablona e-nameyê - Pêvek',
            'auth_emails' => 'Mîhengên şablona e-nameyê - E-nameyên nasnameyê',
        ],

        'sections' => [
            'default_sender' => 'Şandyarê standard',
            'default_sender_description' => 'Navnîşana standard a "Ji" ji bo hemû e-nameyên ku ji hêla pêvekê ve têne şandin.',
            'additional_senders' => 'Şandyarên zêde',
            'add_additional_senders' => 'Şandkerên din lê zêde bike',
            'additional_senders_description' => 'Navnîşanên zêde yên "Ji" ku bikarhêner dikarin dema e-name dinivîsin hilbijêrin.',
            'localization' => 'Herêmîkirin',
            'categories' => 'Kategoriyên şablonê',
            'logo' => 'Logo',
            'colors' => 'Reng',
            'footer_links' => 'Girêdanên binê rûpelê',
            'add_footer_links' => 'Girêdanên jêrîn lê zêde bike',
            'customer_service' => 'Xizmeta xerîdar',
            'logging' => 'Tomarka e-nameyê',
            'logging_description' => 'Kontrol bike ka e-nameyên şandî çawa di databasê de têne tomar kirin.',
            'cleanup' => 'Paqijkirina plansazkirî',
            'cleanup_description' => 'Tomarên e-nameyên şandî yên kevin bixweber li gorî planê jê bibe.',
            'attachment_rules' => 'Qaîdeyên pêvekan',
            'attachment_rules_description' => 'Sînorên pêvekên pelan di e-nameyên nivîskirî de mîheng bike.',
            'auth_emails' => 'Guheztina e-nameyên nasnameyê',
            'auth_emails_description' => 'E-nameyên nasnameyê yên standard ên serîlêdanê bi şablonên xwe yên taybet biguheze.',
        ],

        'fields' => [
            'from_email' => 'E-nameya şandyar',
            'from_name' => 'Navê şandyar',
            'sender_email' => 'E-name',
            'sender_name' => 'Navê nîşankirî',
            'sender_new' => 'Şandyarê nû',
            'default_locale' => 'Zimanê standard',
            'default_locale_helper' => 'Zimanê standard ji bo şablonên nû (mînak en, hu, de).',
            'languages' => 'Zimanên berdest',
            'language_code' => 'Kod',
            'language_display' => 'Navê nîşankirî',
            'language_flag' => 'Îkona alayê',
            'language_new' => 'Zimanê nû',
            'category_key' => 'Kilît',
            'category_label' => 'Etîket',
            'category_new' => 'Kategoriya nû',
            'logo_url' => 'URL an rêya logoyê',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL an rêya mutleq a logoya e-nameyê.',
            'logo_width' => 'Firehî (px)',
            'logo_height' => 'Bilindahî (px)',
            'content_width' => 'Firehiya naverokê (px)',
            'primary_color' => 'Renga seretayî',
            'footer_link_label' => 'Etîket',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Girêdana nû',
            'support_email' => 'E-nameya piştgiriyê',
            'support_phone' => 'Telefona piştgiriyê',
            'enable_logging' => 'Tomarkirinê çalak bike',
            'enable_logging_helper' => 'Dema neçalak be, tomarên e-nameyên şandî nayên çêkirin.',
            'store_rendered_body' => 'Naveroka hatî çêkirin tomar bike',
            'store_rendered_body_helper' => 'HTML-ya dawîn a her e-nameya şandî tomar bike. Ji bo ji nû şandin û pêşdîtinê pêwîst e.',
            'retention_days' => 'Ragirtin (roj)',
            'retention_days_helper' => 'Piştî ev hejmar rojan tomarên e-nameyên şandî bixweber jê bibe. Vala bihêle ji bo herheyî ragirtin.',
            'cleanup_enabled' => 'Paqijkirina plansazkirî çalak bike',
            'cleanup_enabled_helper' => 'Fermana paqijkirinê bixweber li gorî planê bixebitîne.',
            'cleanup_frequency' => 'Freqansa paqijkirinê',
            'max_file_size' => 'Mezinahiya pelê ya herî zêde (MB)',
            'allowed_extensions' => 'Paşnavên pelan ên destûrdar',
            'allowed_extensions_placeholder' => 'Paşnavê lê zêde bike (mînak pdf)',
            'allowed_extensions_helper' => 'Paşnavên pelan ên ku ji bo barkirinê destûr lê tê dayîn.',
            'override_verification' => 'E-nameya verastkirinê biguheze',
            'override_verification_helper' => 'Li şûna e-nameya verastkirinê ya standard a serîlêdanê şablona "user-verify-email" bi kar bîne.',
            'override_password_reset' => 'Nûkirina şîfreyê biguheze',
            'override_password_reset_helper' => 'Li şûna e-nameya nûkirina şîfreyê ya standard a serîlêdanê şablona "user-password-reset" bi kar bîne.',
            'override_welcome' => 'E-nameya xêrhatinê biguheze',
            'override_welcome_helper' => 'Dema bikarhênerek nû tomar dibe, bi şablona "user-welcome" e-nameya xêrhatinê bişîne.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Hemû maf parastî ne.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Reşnivîs',
            2 => 'Di dorê de',
            3 => 'Şandî',
            4 => 'Bi ser neket',
        ],

        'cleanup_frequency' => [
            1 => 'Rojane',
            2 => 'Heftane',
            3 => 'Mehane',
        ],
    ],

];
