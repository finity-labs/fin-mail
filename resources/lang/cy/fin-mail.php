<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'E-bost',
        'templates' => 'Templedi',
        'themes' => 'Themâu',
        'sent-emails' => 'E-byst a anfonwyd',
        'settings' => 'Gosodiadau',
    ],

    'models' => [
        'email_template' => 'Templed e-bost',
        'email_templates' => 'Templedi e-bost',
        'email_theme' => 'Thema e-bost',
        'email_themes' => 'Themâu e-bost',
        'sent_email' => 'E-bost a anfonwyd',
        'sent_emails' => 'E-byst a anfonwyd',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Cynnwys',
            'settings' => 'Gosodiadau',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Enw',
            'key' => 'Allwedd',
            'key_helper' => 'Allwedd unigryw a ddefnyddir yn y cod: e.e. "invoice-sent"',
            'category' => 'Categori',
            'subject' => 'Pwnc',
            'subject_helper' => 'Yn cefnogi tokens: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Rhagbennawd',
            'preheader_helper' => 'Testun rhagolwg a ddangosir mewn cleientiaid e-bost',
            'body' => 'Corff',
            'theme' => 'Thema',
            'theme_placeholder' => 'Thema ragosodedig',
            'is_active' => 'Gweithredol',
            'is_active_helper' => 'Ni ellir defnyddio templedi anweithredol ar gyfer anfon',
            'tags' => 'Tagiau',
            'tags_placeholder' => 'Ychwanegwch dagiau ar gyfer trefnu',
            'from_address' => 'E-bost yr anfonwr',
            'from_name' => 'Enw\'r anfonwr',
            'locale' => 'Iaith',
        ],

        'sections' => [
            'custom_sender' => 'Anfonwr arferol',
            'custom_sender_description' => 'Disodli\'r cyfeiriad anfonwr ragosodedig ar gyfer y templed hwn',
        ],

        'tokens' => [
            'label' => 'Tokens sydd ar gael',
            'helper' => 'Dogfennwch y tokens sydd ar gael ar gyfer y templed hwn. Mae hyn yn helpu golygyddion i wybod pa newidynnau y gallant eu defnyddio.',
            'token' => 'Token',
            'description' => 'Disgrifiad',
            'example' => 'Enghraifft',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Enw llawn y derbynnydd',
            'example_placeholder' => 'Dafydd Jones',
            'new_item' => 'Token newydd',
        ],

        'blocks' => [
            'button' => 'Botwm',
            'button_heading' => 'Mewnosod botwm',
            'button_label' => 'Testun y botwm',
            'button_url' => 'URL',
            'button_align' => 'Aliniad',
            'align_left' => 'Chwith',
            'align_center' => 'Canol',
            'align_right' => 'De',
            'button_default_label' => 'Cliciwch yma',
        ],

        'columns' => [
            'locales' => 'Ieithoedd',
            'active' => 'Gweithredol',
            'locked' => 'Wedi cloi',
            'sent' => 'Anfonwyd',
            'updated_at' => 'Diweddarwyd',
        ],

        'actions' => [
            'preview' => 'Rhagolwg',
            'send_test' => 'Anfon prawf',
            'send_test_field' => 'Anfon at',
            'send_test_locale' => 'Iaith',
            'compose' => 'Cyfansoddi e-bost',
            'version_history' => 'Hanes fersiynau',
            'back_to_templates' => 'Yn ôl i\'r templedi',
        ],

        'notifications' => [
            'test_sent' => 'E-bost prawf wedi\'i anfon!',
            'test_sent_body' => 'Anfonwyd at :email',
            'test_failed' => 'Methodd anfon yr e-bost prawf',
            'saved' => 'Templed wedi\'i gadw',
            'saved_body' => 'Cadwyd ciplun fersiwn yn awtomatig.',
            'locked_skipped' => 'Hepgorwyd templedi wedi\'u cloi',
            'locked_skipped_body' => 'Hepgorwyd :count templed wedi\'u cloi ac ni chawsant eu dileu.',
        ],

        'tooltips' => [
            'locked' => 'Mae\'r templed hwn wedi\'i gloi — mae\'r allwedd a\'r categori yn ddarllen yn unig, ac mae dileu wedi\'i atal.',
        ],

        'versioning' => [
            'date' => 'Dyddiad',
            'by' => 'Gan',
            'preview' => 'Rhagolwg',
            'restore' => 'Adfer',
            'restore_confirm' => 'Ydych chi\'n siŵr eich bod am adfer fersiwn :version? Bydd y cynnwys presennol yn cael ei gadw fel fersiwn newydd yn gyntaf.',
            'restored' => 'Fersiwn :version wedi\'i adfer.',
            'empty' => 'Dim hanes fersiynau ar gael.',
        ],

        'notices' => [
            'locked' => 'Mae\'r templed hwn wedi\'i gloi. Ni ellir newid y meysydd allwedd a chategori.',
        ],

        'language_label' => 'Iaith: :locale',

        'replicate_suffix' => '(Copi)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Cyfansoddi e-bost',
        'title_with_name' => 'Cyfansoddi: :name',

        'sections' => [
            'recipients' => 'Derbynwyr',
            'content' => 'Cynnwys yr e-bost',
            'attachments' => 'Atodiadau',
            'tokens' => 'Tokens sydd ar gael',
        ],

        'fields' => [
            'from' => 'Oddi wrth',
            'to' => 'At',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Rhowch gyfeiriadau e-bost',
            'cc_placeholder' => 'Cyfeiriadau CC',
            'bcc_placeholder' => 'Cyfeiriadau BCC',
            'locale' => 'Iaith',
            'subject' => 'Pwnc',
            'preheader' => 'Rhagbennawd',
            'body' => 'Corff',
            'attach_files' => 'Atodi ffeiliau',
            'preheader_helper' => 'Testun rhagolwg a ddangosir mewn cleientiaid e-bost cyn agor',
            'no_tokens' => 'Dim tokens wedi\'u dogfennu ar gyfer y templed hwn. Bydd tokens fel {{ user.name }} yn cael eu disodli wrth anfon trwy\'r API/cod.',
        ],

        'actions' => [
            'send' => 'Anfon e-bost',
            'preview' => 'Rhagolwg',
        ],

        'confirm' => [
            'heading' => 'Cadarnhau anfon',
            'description' => 'Ydych chi\'n siŵr eich bod am anfon yr e-bost hwn?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Derbynwyr',
            'content' => 'Cynnwys',
            'attachments' => 'Atodiadau',
        ],

        'fields' => [
            'from' => 'Oddi wrth',
            'to' => 'At',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Templed',
            'subject' => 'Pwnc',
            'to_placeholder' => 'Rhowch gyfeiriadau e-bost',
            'cc_placeholder' => 'Rhowch gyfeiriadau CC',
            'bcc_placeholder' => 'Rhowch gyfeiriadau BCC',
            'auto_attached' => 'Ffeiliau wedi\'u hatodi\'n awtomatig',
            'auto_attached_none' => 'Dim',
            'additional_attachments' => 'Atodiadau ychwanegol',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Anfon e-bost',
        'modal_heading' => 'Cyfansoddi e-bost',
        'submit' => 'Anfon',

        'notifications' => [
            'sent' => 'E-bost wedi\'i anfon yn llwyddiannus',
            'sent_body' => 'Anfonwyd at: :recipients',
            'failed' => 'Methodd anfon yr e-bost',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Manylion y thema',
            'background' => 'Cefndir a chynllun',
            'background_description' => 'Lliwiau strwythurol prif ar gyfer cynllun yr e-bost.',
            'typography' => 'Teipograffeg',
            'typography_description' => 'Lliwiau ar gyfer testun a phenawdau.',
            'buttons' => 'Botymau',
            'buttons_description' => 'Arddull botymau galw i weithredu.',
            'footer' => 'Troedyn',
            'footer_description' => 'Arddull ardal y troedyn.',
            'preview' => 'Rhagolwg',
        ],

        'fields' => [
            'name' => 'Enw',
            'is_default' => 'Thema ragosodedig',
            'is_default_helper' => 'Mae\'r thema ragosodedig yn cael ei chymhwyso i dempledi nad ydynt yn pennu un.',
            'page_background' => 'Cefndir y dudalen',
            'content_background' => 'Cefndir y cynnwys',
            'border' => 'Ymyl',
            'headings' => 'Penawdau',
            'body_text' => 'Testun y corff',
            'secondary_text' => 'Testun eilaidd',
            'links' => 'Dolenni',
            'button_background' => 'Cefndir y botwm',
            'button_text' => 'Testun y botwm',
            'primary_accent' => 'Prif/Acen',
            'footer_background' => 'Cefndir y troedyn',
            'footer_text' => 'Testun y troedyn',
        ],

        'columns' => [
            'primary' => 'Prif',
            'background' => 'Cefndir',
            'text' => 'Testun',
            'button' => 'Botwm',
            'default' => 'Rhagosodedig',
            'templates' => 'Templedi',
            'updated_at' => 'Diweddarwyd',
        ],

        'replicate_suffix' => '(Copi)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'At',
            'template' => 'Templed',
            'template_placeholder' => 'Arferol',
            'sent_by' => 'Anfonwyd gan',
            'subject' => 'Pwnc',
            'status' => 'Statws',
            'sent_by_placeholder' => 'System',
            'related_to' => 'Yn gysylltiedig â',
            'sent_at' => 'Anfonwyd',
        ],

        'filters' => [
            'from' => 'O',
            'until' => 'Hyd at',
        ],

        'actions' => [
            'view' => 'Gweld',
            'resend' => 'Ailanfon',
            'resend_description' => 'Bydd hyn yn anfon copi newydd o\'r e-bost at y derbynwyr gwreiddiol.',
        ],

        'preview' => [
            'from' => 'Oddi wrth:',
            'to' => 'At:',
            'cc' => 'CC:',
            'template' => 'Templed:',
            'sent' => 'Anfonwyd:',
            'sent_not_yet' => 'Ddim eto',
            'status' => 'Statws:',
            'no_body' => 'Ni chafodd corff yr e-bost ei storio. Galluogwch <code>logging.store_rendered_body</code> yn y gosodiadau i gadw cynnwys e-bost.',
            'error' => 'Manylion y Gwall',
        ],
        'notifications' => [
            'resent' => 'E-bost wedi\'i ailanfon yn llwyddiannus',
            'resend_failed' => 'Methodd ailanfon yr e-bost',
        ],

        'errors' => [
            'no_rendered_body' => 'Ni ellir ailanfon: dim corff wedi\'i rendro wedi\'i storio. Galluogwch logging.store_rendered_body yn y gosodiadau.',
            'no_template' => 'Nid yw\'r templed gwreiddiol yn bodoli mwyach.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'E-byst a anfonwyd',

        'columns' => [
            'to' => 'At',
            'template' => 'Templed',
            'subject' => 'Pwnc',
            'status' => 'Statws',
            'sent_by' => 'Anfonwyd gan',
            'sent_by_placeholder' => 'System',
            'sent_at' => 'Anfonwyd',
        ],

        'actions' => [
            'view' => 'Gweld',
            'resend' => 'Ailanfon',
            'resend_confirm' => 'Ydych chi\'n siŵr eich bod am ailanfon yr e-bost hwn?',
        ],

        'notifications' => [
            'resent' => 'E-bost wedi\'i ailanfon yn llwyddiannus',
            'resend_failed' => 'Methodd yr ailanfoniad',
        ],

        'empty' => [
            'heading' => 'Dim e-byst wedi\'u hanfon',
            'description' => 'Bydd e-byst a anfonwyd ar gyfer y cofnod hwn yn ymddangos yma.',
        ],

        'errors' => [
            'no_body' => 'Ni ellir ailanfon: dim corff wedi\'i rendro na thempled wedi\'i storio.',
            'no_template' => 'Nid yw\'r templed gwreiddiol yn bodoli mwyach.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Gosodiadau e-bost',

        'tabs' => [
            'general' => 'Cyffredinol',
            'branding' => 'Brandio',
            'logging' => 'Cofnodi',
            'attachments' => 'Atodiadau',
            'auth_emails' => 'E-byst dilysu',
        ],

        'titles' => [
            'general' => 'Gosodiadau templedi e-bost - Cyffredinol',
            'branding' => 'Gosodiadau templedi e-bost - Brandio',
            'logging' => 'Gosodiadau templedi e-bost - Cofnodi',
            'attachments' => 'Gosodiadau templedi e-bost - Atodiadau',
            'auth_emails' => 'Gosodiadau templedi e-bost - E-byst dilysu',
        ],

        'sections' => [
            'default_sender' => 'Anfonwr rhagosodedig',
            'default_sender_description' => 'Y cyfeiriad "Oddi wrth" rhagosodedig ar gyfer pob e-bost a anfonir gan yr ategyn.',
            'additional_senders' => 'Anfonwyr ychwanegol',
            'add_additional_senders' => 'Ychwanegu Anfonwyr Ychwanegol',
            'additional_senders_description' => 'Cyfeiriadau "Oddi wrth" ychwanegol y gall defnyddwyr eu dewis wrth gyfansoddi e-byst.',
            'localization' => 'Lleoleiddio',
            'categories' => 'Categorïau templedi',
            'logo' => 'Logo',
            'colors' => 'Lliwiau',
            'footer_links' => 'Dolenni troedyn',
            'add_footer_links' => 'Ychwanegu Dolenni Troedyn',
            'customer_service' => 'Gwasanaeth cwsmeriaid',
            'logging' => 'Cofnodi e-bost',
            'logging_description' => 'Rheolwch sut mae e-byst a anfonir yn cael eu cofnodi yn y gronfa ddata.',
            'cleanup' => 'Glanhau wedi\'i drefnu',
            'cleanup_description' => 'Dileu hen gofnodion e-byst a anfonwyd yn awtomatig yn ôl amserlen.',
            'attachment_rules' => 'Rheolau atodiadau',
            'attachment_rules_description' => 'Ffurfweddwch derfynau ar gyfer atodiadau ffeiliau mewn e-byst a gyfansoddwyd.',
            'auth_emails' => 'Disodli e-byst dilysu',
            'auth_emails_description' => 'Disodlwch e-byst dilysu rhagosodedig y cymhwysiad gyda\'ch templedi arferol.',
        ],

        'fields' => [
            'from_email' => 'E-bost yr anfonwr',
            'from_name' => 'Enw\'r anfonwr',
            'sender_email' => 'E-bost',
            'sender_name' => 'Enw arddangos',
            'sender_new' => 'Anfonwr newydd',
            'default_locale' => 'Iaith ragosodedig',
            'default_locale_helper' => 'Yr iaith ragosodedig ar gyfer templedi newydd (e.e. en, hu, de).',
            'languages' => 'Ieithoedd sydd ar gael',
            'language_code' => 'Cod',
            'language_display' => 'Enw arddangos',
            'language_flag' => 'Eicon baner',
            'language_new' => 'Iaith newydd',
            'category_key' => 'Allwedd',
            'category_label' => 'Label',
            'category_new' => 'Categori newydd',
            'logo_url' => 'URL neu lwybr y logo',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL absoliwt neu lwybr i\'ch logo e-bost.',
            'logo_width' => 'Lled (px)',
            'logo_height' => 'Uchder (px)',
            'content_width' => 'Lled y cynnwys (px)',
            'primary_color' => 'Lliw prif',
            'footer_link_label' => 'Label',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Dolen newydd',
            'support_email' => 'E-bost cymorth',
            'support_phone' => 'Ffôn cymorth',
            'enable_logging' => 'Galluogi cofnodi',
            'enable_logging_helper' => 'Pan fydd wedi\'i analluogi, ni fydd unrhyw gofnodion e-byst a anfonwyd yn cael eu creu.',
            'store_rendered_body' => 'Storio\'r corff wedi\'i rendro',
            'store_rendered_body_helper' => 'Cadwch HTML terfynol pob e-bost a anfonir. Yn ofynnol ar gyfer nodweddion ailanfon a rhagolwg.',
            'retention_days' => 'Cadw (dyddiau)',
            'retention_days_helper' => 'Dileu cofnodion e-byst a anfonwyd yn awtomatig ar ôl y nifer hwn o ddyddiau. Gadewch yn wag i gadw am byth.',
            'cleanup_enabled' => 'Galluogi glanhau wedi\'i drefnu',
            'cleanup_enabled_helper' => 'Rhedeg y gorchymyn glanhau yn awtomatig yn ôl amserlen.',
            'cleanup_frequency' => 'Amlder glanhau',
            'max_file_size' => 'Maint ffeil uchaf (MB)',
            'allowed_extensions' => 'Estyniadau ffeiliau a ganiateir',
            'allowed_extensions_placeholder' => 'Ychwanegwch estyniad (e.e. pdf)',
            'allowed_extensions_helper' => 'Estyniadau ffeiliau a ganiateir ar gyfer llwytho i fyny.',
            'override_verification' => 'Disodli dilysu e-bost',
            'override_verification_helper' => 'Defnyddiwch y templed "user-verify-email" yn lle e-bost dilysu rhagosodedig y cymhwysiad.',
            'override_password_reset' => 'Disodli ailosod cyfrinair',
            'override_password_reset_helper' => 'Defnyddiwch y templed "user-password-reset" yn lle e-bost ailosod cyfrinair rhagosodedig y cymhwysiad.',
            'override_welcome' => 'Disodli e-bost croeso',
            'override_welcome_helper' => 'Anfonwch e-bost croeso gan ddefnyddio\'r templed "user-welcome" pan fydd defnyddiwr newydd yn cofrestru.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Cedwir pob hawl.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Drafft',
            2 => 'Mewn ciw',
            3 => 'Anfonwyd',
            4 => 'Methiant',
        ],

        'cleanup_frequency' => [
            1 => 'Yn ddyddiol',
            2 => 'Yn wythnosol',
            3 => 'Yn fisol',
        ],
    ],

];
