<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => '邮件',
        'templates' => '模板',
        'themes' => '主题',
        'sent-emails' => '已发送邮件',
        'settings' => '设置',
    ],

    'models' => [
        'email_template' => '邮件模板',
        'email_templates' => '邮件模板',
        'email_theme' => '邮件主题',
        'email_themes' => '邮件主题',
        'sent_email' => '已发送邮件',
        'sent_emails' => '已发送邮件',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => '内容',
            'settings' => '设置',
            'tokens' => '变量',
        ],

        'fields' => [
            'name' => '名称',
            'key' => '键',
            'key_helper' => '代码中使用的唯一键，例如："invoice-sent"',
            'category' => '分类',
            'subject' => '主题',
            'subject_helper' => '支持变量：{{ user.name }}、{{ config.app.name }}',
            'preheader' => '预览文本',
            'preheader_helper' => '在邮件客户端中显示的预览文本',
            'body' => '正文',
            'theme' => '主题样式',
            'theme_placeholder' => '默认主题',
            'is_active' => '启用',
            'is_active_helper' => '未启用的模板无法用于发送',
            'tags' => '标签',
            'tags_placeholder' => '添加标签进行分类',
            'from_address' => '发件人邮箱',
            'from_name' => '发件人名称',
            'locale' => '语言',
        ],

        'sections' => [
            'custom_sender' => '自定义发件人',
            'custom_sender_description' => '覆盖此模板的默认发件人地址',
        ],

        'tokens' => [
            'label' => '可用变量',
            'helper' => '记录此模板可用的变量。这有助于编辑人员了解可以使用哪些变量。',
            'token' => '变量',
            'description' => '描述',
            'example' => '示例',
            'token_placeholder' => 'user.name',
            'description_placeholder' => '收件人的全名',
            'example_placeholder' => 'John Doe',
            'new_item' => '新变量',
        ],

        'blocks' => [
            'button' => '按钮',
            'button_heading' => '插入按钮',
            'button_label' => '按钮文本',
            'button_url' => 'URL',
            'button_align' => '对齐方式',
            'align_left' => '左对齐',
            'align_center' => '居中',
            'align_right' => '右对齐',
            'button_default_label' => '点击这里',
        ],

        'columns' => [
            'locales' => '语言',
            'active' => '启用',
            'locked' => '锁定',
            'sent' => '已发送',
            'updated_at' => '更新时间',
        ],

        'actions' => [
            'preview' => '预览',
            'send_test' => '发送测试',
            'send_test_field' => '发送至',
            'send_test_locale' => '语言',
            'compose' => '撰写邮件',
            'version_history' => '版本历史',
            'back_to_templates' => '返回模板列表',
        ],

        'notifications' => [
            'test_sent' => '测试邮件已发送！',
            'test_sent_body' => '已发送至 :email',
            'test_failed' => '测试邮件发送失败',
            'saved' => '模板已保存',
            'saved_body' => '版本快照已自动保存。',
            'locked_skipped' => '已跳过锁定的模板',
            'locked_skipped_body' => '已跳过 :count 个锁定的模板，未被删除。',
        ],

        'tooltips' => [
            'locked' => '此模板已锁定——键和分类为只读，无法删除。',
        ],

        'versioning' => [
            'date' => '日期',
            'by' => '作者',
            'preview' => '预览',
            'restore' => '恢复',
            'restore_confirm' => '您确定要恢复版本 :version 吗？当前内容将先保存为新版本。',
            'restored' => '版本 :version 已恢复。',
            'empty' => '暂无版本历史记录。',
        ],

        'notices' => [
            'locked' => '此模板已锁定。键和分类字段无法更改。',
        ],

        'language_label' => '语言：:locale',

        'replicate_suffix' => '（副本）',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => '撰写邮件',
        'title_with_name' => '撰写：:name',

        'sections' => [
            'recipients' => '收件人',
            'content' => '邮件内容',
            'attachments' => '附件',
            'tokens' => '可用变量',
        ],

        'fields' => [
            'from' => '发件人',
            'to' => '收件人',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => '输入邮箱地址',
            'cc_placeholder' => 'CC 地址',
            'bcc_placeholder' => 'BCC 地址',
            'locale' => '语言',
            'subject' => '主题',
            'preheader' => '预览文本',
            'body' => '正文',
            'attach_files' => '添加附件',
            'preheader_helper' => '打开邮件前在邮件客户端中显示的预览文本',
            'no_tokens' => '此模板没有记录的变量。像 {{ user.name }} 这样的变量将在通过 API/代码发送时被替换。',
        ],

        'actions' => [
            'send' => '发送邮件',
            'preview' => '预览',
        ],

        'confirm' => [
            'heading' => '确认发送',
            'description' => '您确定要发送此邮件吗？',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => '收件人',
            'content' => '内容',
            'attachments' => '附件',
        ],

        'fields' => [
            'from' => '发件人',
            'to' => '收件人',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => '模板',
            'subject' => '主题',
            'to_placeholder' => '输入邮箱地址',
            'cc_placeholder' => '输入 CC 地址',
            'bcc_placeholder' => '输入 BCC 地址',
            'auto_attached' => '自动附加的文件',
            'auto_attached_none' => '无',
            'additional_attachments' => '其他附件',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => '发送邮件',
        'modal_heading' => '撰写邮件',
        'submit' => '发送',

        'notifications' => [
            'sent' => '邮件发送成功',
            'sent_body' => '已发送至：:recipients',
            'failed' => '邮件发送失败',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => '主题详情',
            'background' => '背景与布局',
            'background_description' => '邮件布局的主要结构颜色。',
            'typography' => '排版',
            'typography_description' => '文本和标题的颜色。',
            'buttons' => '按钮',
            'buttons_description' => '行动号召按钮样式。',
            'footer' => '页脚',
            'footer_description' => '页脚区域样式。',
            'preview' => '预览',
        ],

        'fields' => [
            'name' => '名称',
            'is_default' => '默认主题',
            'is_default_helper' => '默认主题应用于未指定主题的模板。',
            'page_background' => '页面背景',
            'content_background' => '内容背景',
            'border' => '边框',
            'headings' => '标题',
            'body_text' => '正文文本',
            'secondary_text' => '次要文本',
            'links' => '链接',
            'button_background' => '按钮背景',
            'button_text' => '按钮文本',
            'primary_accent' => '主色/强调色',
            'footer_background' => '页脚背景',
            'footer_text' => '页脚文本',
        ],

        'columns' => [
            'primary' => '主要',
            'background' => '背景',
            'text' => '文本',
            'button' => '按钮',
            'default' => '默认',
            'templates' => '模板',
            'updated_at' => '更新时间',
        ],

        'replicate_suffix' => '（副本）',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => '收件人',
            'template' => '模板',
            'template_placeholder' => '自定义',
            'sent_by' => '发送者',
            'subject' => '主题',
            'status' => '状态',
            'sent_by_placeholder' => '系统',
            'related_to' => '关联',
            'sent_at' => '发送时间',
        ],

        'filters' => [
            'from' => '从',
            'until' => '至',
        ],

        'actions' => [
            'view' => '查看',
            'resend' => '重新发送',
            'resend_description' => '这将向原始收件人发送一封新的邮件副本。',
        ],

        'preview' => [
            'from' => '发件人：',
            'to' => '收件人：',
            'cc' => '抄送：',
            'template' => '模板：',
            'sent' => '发送时间：',
            'sent_not_yet' => '尚未发送',
            'status' => '状态：',
            'no_body' => '邮件正文未保存。请在设置中启用 <code>logging.store_rendered_body</code> 以保存邮件内容。',
            'error' => '错误详情',
        ],
        'notifications' => [
            'resent' => '邮件已成功重新发送',
            'resend_failed' => '邮件重新发送失败',
        ],

        'errors' => [
            'no_rendered_body' => '无法重新发送：未存储渲染后的内容。请在设置中启用 logging.store_rendered_body。',
            'no_template' => '原始模板已不存在。',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => '已发送邮件',

        'columns' => [
            'to' => '收件人',
            'template' => '模板',
            'subject' => '主题',
            'status' => '状态',
            'sent_by' => '发送者',
            'sent_by_placeholder' => '系统',
            'sent_at' => '发送时间',
        ],

        'actions' => [
            'view' => '查看',
            'resend' => '重新发送',
            'resend_confirm' => '您确定要重新发送此邮件吗？',
        ],

        'notifications' => [
            'resent' => '邮件已成功重新发送',
            'resend_failed' => '重新发送失败',
        ],

        'empty' => [
            'heading' => '暂无已发送邮件',
            'description' => '为此记录发送的邮件将显示在这里。',
        ],

        'errors' => [
            'no_body' => '无法重新发送：未存储渲染后的内容或模板。',
            'no_template' => '原始模板已不存在。',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => '邮件设置',

        'tabs' => [
            'general' => '常规',
            'branding' => '品牌',
            'logging' => '日志',
            'attachments' => '附件',
            'auth_emails' => '认证邮件',
        ],

        'titles' => [
            'general' => '邮件模板设置 - 常规',
            'branding' => '邮件模板设置 - 品牌',
            'logging' => '邮件模板设置 - 日志',
            'attachments' => '邮件模板设置 - 附件',
            'auth_emails' => '邮件模板设置 - 认证邮件',
        ],

        'sections' => [
            'default_sender' => '默认发件人',
            'default_sender_description' => '插件发送的所有邮件的默认"发件人"地址。',
            'additional_senders' => '其他发件人',
            'add_additional_senders' => '添加其他发件人',
            'additional_senders_description' => '用户撰写邮件时可选择的其他"发件人"地址。',
            'localization' => '本地化',
            'categories' => '模板分类',
            'logo' => '标志',
            'colors' => '颜色',
            'footer_links' => '页脚链接',
            'add_footer_links' => '添加页脚链接',
            'customer_service' => '客户服务',
            'logging' => '邮件日志',
            'logging_description' => '控制已发送邮件在数据库中的记录方式。',
            'cleanup' => '定时清理',
            'cleanup_description' => '按计划自动删除旧的已发送邮件记录。',
            'attachment_rules' => '附件规则',
            'attachment_rules_description' => '配置撰写邮件中文件附件的限制。',
            'auth_emails' => '认证邮件覆盖',
            'auth_emails_description' => '使用您的自定义模板覆盖应用程序默认的认证邮件。',
        ],

        'fields' => [
            'from_email' => '发件人邮箱',
            'from_name' => '发件人名称',
            'sender_email' => '邮箱',
            'sender_name' => '显示名称',
            'sender_new' => '新发件人',
            'default_locale' => '默认语言',
            'default_locale_helper' => '新模板的默认语言（例如：en、hu、de）。',
            'languages' => '可用语言',
            'language_code' => '代码',
            'language_display' => '显示名称',
            'language_flag' => '旗帜图标',
            'language_new' => '新语言',
            'category_key' => '键',
            'category_label' => '标签',
            'category_new' => '新分类',
            'logo_url' => '标志 URL 或路径',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => '邮件标志的绝对 URL 或路径。',
            'logo_width' => '宽度（px）',
            'logo_height' => '高度（px）',
            'content_width' => '内容宽度（px）',
            'primary_color' => '主色',
            'footer_link_label' => '标签',
            'footer_link_url' => 'URL',
            'footer_link_new' => '新链接',
            'support_email' => '客服邮箱',
            'support_phone' => '客服电话',
            'enable_logging' => '启用日志',
            'enable_logging_helper' => '禁用时，不会创建已发送邮件记录。',
            'store_rendered_body' => '存储渲染后的内容',
            'store_rendered_body_helper' => '保存每封已发送邮件的最终 HTML。重新发送和预览功能需要此项。',
            'retention_days' => '保留天数',
            'retention_days_helper' => '在此天数后自动删除已发送邮件记录。留空则永久保留。',
            'cleanup_enabled' => '启用定时清理',
            'cleanup_enabled_helper' => '按计划自动运行清理命令。',
            'cleanup_frequency' => '清理频率',
            'max_file_size' => '最大文件大小（MB）',
            'allowed_extensions' => '允许的文件扩展名',
            'allowed_extensions_placeholder' => '添加扩展名（例如：pdf）',
            'allowed_extensions_helper' => '允许上传的文件扩展名。',
            'override_verification' => '覆盖邮箱验证',
            'override_verification_helper' => '使用"user-verify-email"模板替代应用程序默认的验证邮件。',
            'override_password_reset' => '覆盖密码重置',
            'override_password_reset_helper' => '使用"user-password-reset"模板替代应用程序默认的密码重置邮件。',
            'override_welcome' => '覆盖欢迎邮件',
            'override_welcome_helper' => '新用户注册时使用"user-welcome"模板发送欢迎邮件。',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app。保留所有权利。',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => '草稿',
            2 => '排队中',
            3 => '已发送',
            4 => '失败',
        ],

        'cleanup_frequency' => [
            1 => '每天',
            2 => '每周',
            3 => '每月',
        ],
    ],

];
