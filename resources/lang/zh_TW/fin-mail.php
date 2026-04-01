<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => '電子郵件',
        'templates' => '範本',
        'themes' => '主題',
        'sent-emails' => '已寄送郵件',
        'settings' => '設定',
    ],

    'models' => [
        'email_template' => '郵件範本',
        'email_templates' => '郵件範本',
        'email_theme' => '郵件主題',
        'email_themes' => '郵件主題',
        'sent_email' => '已寄送郵件',
        'sent_emails' => '已寄送郵件',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => '內容',
            'settings' => '設定',
            'tokens' => '變數',
        ],

        'fields' => [
            'name' => '名稱',
            'key' => '鍵',
            'key_helper' => '程式碼中使用的唯一鍵，例如："invoice-sent"',
            'category' => '分類',
            'subject' => '主旨',
            'subject_helper' => '支援變數：{{ user.name }}、{{ config.app.name }}',
            'preheader' => '預覽文字',
            'preheader_helper' => '在郵件用戶端中顯示的預覽文字',
            'body' => '內文',
            'theme' => '主題樣式',
            'theme_placeholder' => '預設主題',
            'is_active' => '啟用',
            'is_active_helper' => '未啟用的範本無法用於寄送',
            'tags' => '標籤',
            'tags_placeholder' => '新增標籤進行分類',
            'from_address' => '寄件人信箱',
            'from_name' => '寄件人名稱',
            'locale' => '語言',
        ],

        'sections' => [
            'custom_sender' => '自訂寄件人',
            'custom_sender_description' => '覆寫此範本的預設寄件人地址',
        ],

        'tokens' => [
            'label' => '可用變數',
            'helper' => '記錄此範本可用的變數。這有助於編輯人員了解可以使用哪些變數。',
            'token' => '變數',
            'description' => '描述',
            'example' => '範例',
            'token_placeholder' => 'user.name',
            'description_placeholder' => '收件人的全名',
            'example_placeholder' => 'John Doe',
            'new_item' => '新變數',
        ],

        'blocks' => [
            'button' => '按鈕',
            'button_heading' => '插入按鈕',
            'button_label' => '按鈕文字',
            'button_url' => 'URL',
            'button_align' => '對齊方式',
            'align_left' => '靠左',
            'align_center' => '置中',
            'align_right' => '靠右',
            'button_default_label' => '點擊這裡',
        ],

        'columns' => [
            'locales' => '語言',
            'active' => '啟用',
            'locked' => '鎖定',
            'sent' => '已寄送',
            'updated_at' => '更新時間',
        ],

        'actions' => [
            'preview' => '預覽',
            'send_test' => '寄送測試',
            'send_test_field' => '寄送至',
            'send_test_locale' => '語言',
            'compose' => '撰寫郵件',
            'version_history' => '版本紀錄',
            'back_to_templates' => '返回範本列表',
        ],

        'notifications' => [
            'test_sent' => '測試郵件已寄送！',
            'test_sent_body' => '已寄送至 :email',
            'test_failed' => '測試郵件寄送失敗',
            'saved' => '範本已儲存',
            'saved_body' => '版本快照已自動儲存。',
            'locked_skipped' => '已跳過鎖定的範本',
            'locked_skipped_body' => '已跳過 :count 個鎖定的範本，未被刪除。',
        ],

        'tooltips' => [
            'locked' => '此範本已鎖定——鍵和分類為唯讀，無法刪除。',
        ],

        'versioning' => [
            'date' => '日期',
            'by' => '作者',
            'preview' => '預覽',
            'restore' => '還原',
            'restore_confirm' => '您確定要還原版本 :version 嗎？目前的內容將會先儲存為新版本。',
            'restored' => '版本 :version 已還原。',
            'empty' => '沒有版本歷史紀錄。',
        ],

        'notices' => [
            'locked' => '此範本已鎖定。鍵和分類欄位無法變更。',
        ],

        'language_label' => '語言：:locale',

        'replicate_suffix' => '（副本）',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => '撰寫郵件',
        'title_with_name' => '撰寫：:name',

        'sections' => [
            'recipients' => '收件人',
            'content' => '郵件內容',
            'attachments' => '附件',
            'tokens' => '可用變數',
        ],

        'fields' => [
            'from' => '寄件人',
            'to' => '收件人',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => '輸入電子郵件地址',
            'cc_placeholder' => 'CC 地址',
            'bcc_placeholder' => 'BCC 地址',
            'locale' => '語言',
            'subject' => '主旨',
            'preheader' => '預覽文字',
            'body' => '內文',
            'attach_files' => '新增附件',
            'preheader_helper' => '開啟郵件前在郵件用戶端中顯示的預覽文字',
            'no_tokens' => '此範本沒有記錄的變數。像 {{ user.name }} 這樣的變數將在透過 API/程式碼寄送時被替換。',
        ],

        'actions' => [
            'send' => '寄送郵件',
            'preview' => '預覽',
        ],

        'confirm' => [
            'heading' => '確認寄送',
            'description' => '您確定要寄送此郵件嗎？',
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
            'content' => '內容',
            'attachments' => '附件',
        ],

        'fields' => [
            'from' => '寄件人',
            'to' => '收件人',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => '範本',
            'subject' => '主旨',
            'to_placeholder' => '輸入電子郵件地址',
            'cc_placeholder' => '輸入 CC 地址',
            'bcc_placeholder' => '輸入 BCC 地址',
            'auto_attached' => '自動附加的檔案',
            'auto_attached_none' => '無',
            'additional_attachments' => '其他附件',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => '寄送郵件',
        'modal_heading' => '撰寫郵件',
        'submit' => '寄送',

        'notifications' => [
            'sent' => '郵件寄送成功',
            'sent_body' => '已寄送至：:recipients',
            'failed' => '郵件寄送失敗',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => '主題詳情',
            'background' => '背景與版面',
            'background_description' => '郵件版面的主要結構色彩。',
            'typography' => '排版',
            'typography_description' => '文字和標題的色彩。',
            'buttons' => '按鈕',
            'buttons_description' => '行動呼籲按鈕樣式。',
            'footer' => '頁尾',
            'footer_description' => '頁尾區域樣式。',
            'preview' => '預覽',
        ],

        'fields' => [
            'name' => '名稱',
            'is_default' => '預設主題',
            'is_default_helper' => '預設主題套用於未指定主題的範本。',
            'page_background' => '頁面背景',
            'content_background' => '內容背景',
            'border' => '邊框',
            'headings' => '標題',
            'body_text' => '內文文字',
            'secondary_text' => '次要文字',
            'links' => '連結',
            'button_background' => '按鈕背景',
            'button_text' => '按鈕文字',
            'primary_accent' => '主色/強調色',
            'footer_background' => '頁尾背景',
            'footer_text' => '頁尾文字',
        ],

        'columns' => [
            'primary' => '主要',
            'background' => '背景',
            'text' => '文字',
            'button' => '按鈕',
            'default' => '預設',
            'templates' => '範本',
            'updated_at' => '更新時間',
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
            'template' => '範本',
            'template_placeholder' => '自訂',
            'sent_by' => '寄送者',
            'subject' => '主旨',
            'status' => '狀態',
            'sent_by_placeholder' => '系統',
            'related_to' => '關聯',
            'sent_at' => '寄送時間',
        ],

        'filters' => [
            'from' => '從',
            'until' => '至',
        ],

        'actions' => [
            'view' => '檢視',
            'resend' => '重新寄送',
            'resend_description' => '這將向原始收件人寄送一封新的郵件副本。',
        ],


        'preview' => [
            'from' => '寄件人：',
            'to' => '收件人：',
            'cc' => '副本：',
            'template' => '範本：',
            'sent' => '寄送時間：',
            'sent_not_yet' => '尚未寄送',
            'status' => '狀態：',
            'no_body' => '郵件內文未儲存。請在設定中啟用 <code>logging.store_rendered_body</code> 以儲存郵件內容。',
            'error' => '錯誤詳情'
        ],
        'notifications' => [
            'resent' => '郵件已成功重新寄送',
            'resend_failed' => '郵件重新寄送失敗',
        ],

        'errors' => [
            'no_rendered_body' => '無法重新寄送：未儲存算繪後的內容。請在設定中啟用 logging.store_rendered_body。',
            'no_template' => '原始範本已不存在。',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => '已寄送郵件',

        'columns' => [
            'to' => '收件人',
            'template' => '範本',
            'subject' => '主旨',
            'status' => '狀態',
            'sent_by' => '寄送者',
            'sent_by_placeholder' => '系統',
            'sent_at' => '寄送時間',
        ],

        'actions' => [
            'view' => '檢視',
            'resend' => '重新寄送',
            'resend_confirm' => '您確定要重新寄送此郵件嗎？',
        ],

        'notifications' => [
            'resent' => '郵件已成功重新寄送',
            'resend_failed' => '重新寄送失敗',
        ],

        'empty' => [
            'heading' => '尚無已寄送郵件',
            'description' => '為此紀錄寄送的郵件將顯示在這裡。',
        ],

        'errors' => [
            'no_body' => '無法重新寄送：未儲存算繪後的內容或範本。',
            'no_template' => '原始範本已不存在。',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => '郵件設定',

        'tabs' => [
            'general' => '一般',
            'branding' => '品牌',
            'logging' => '日誌',
            'attachments' => '附件',
            'auth_emails' => '驗證郵件',
        ],

        'titles' => [
            'general' => '郵件範本設定 - 一般',
            'branding' => '郵件範本設定 - 品牌',
            'logging' => '郵件範本設定 - 日誌',
            'attachments' => '郵件範本設定 - 附件',
            'auth_emails' => '郵件範本設定 - 驗證郵件',
        ],

        'sections' => [
            'default_sender' => '預設寄件人',
            'default_sender_description' => '外掛寄送的所有郵件的預設「寄件人」地址。',
            'additional_senders' => '其他寄件人',
            'add_additional_senders' => '新增其他寄件人',
            'additional_senders_description' => '使用者撰寫郵件時可選擇的其他「寄件人」地址。',
            'localization' => '在地化',
            'categories' => '範本分類',
            'logo' => '標誌',
            'colors' => '色彩',
            'footer_links' => '頁尾連結',
            'add_footer_links' => '新增頁尾連結',
            'customer_service' => '客戶服務',
            'logging' => '郵件日誌',
            'logging_description' => '控制已寄送郵件在資料庫中的記錄方式。',
            'cleanup' => '排程清理',
            'cleanup_description' => '按排程自動刪除舊的已寄送郵件紀錄。',
            'attachment_rules' => '附件規則',
            'attachment_rules_description' => '設定撰寫郵件中檔案附件的限制。',
            'auth_emails' => '驗證郵件覆寫',
            'auth_emails_description' => '使用您的自訂範本覆寫應用程式預設的驗證郵件。',
        ],

        'fields' => [
            'from_email' => '寄件人信箱',
            'from_name' => '寄件人名稱',
            'sender_email' => '信箱',
            'sender_name' => '顯示名稱',
            'sender_new' => '新寄件人',
            'default_locale' => '預設語言',
            'default_locale_helper' => '新範本的預設語言（例如：en、hu、de）。',
            'languages' => '可用語言',
            'language_code' => '代碼',
            'language_display' => '顯示名稱',
            'language_flag' => '旗幟圖示',
            'language_new' => '新語言',
            'category_key' => '鍵',
            'category_label' => '標籤',
            'category_new' => '新分類',
            'logo_url' => '標誌 URL 或路徑',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => '郵件標誌的絕對 URL 或路徑。',
            'logo_width' => '寬度（px）',
            'logo_height' => '高度（px）',
            'content_width' => '內容寬度（px）',
            'primary_color' => '主色',
            'footer_link_label' => '標籤',
            'footer_link_url' => 'URL',
            'footer_link_new' => '新連結',
            'support_email' => '客服信箱',
            'support_phone' => '客服電話',
            'enable_logging' => '啟用日誌',
            'enable_logging_helper' => '停用時，不會建立已寄送郵件紀錄。',
            'store_rendered_body' => '儲存算繪後的內容',
            'store_rendered_body_helper' => '儲存每封已寄送郵件的最終 HTML。重新寄送和預覽功能需要此項。',
            'retention_days' => '保留天數',
            'retention_days_helper' => '在此天數後自動刪除已寄送郵件紀錄。留空則永久保留。',
            'cleanup_enabled' => '啟用排程清理',
            'cleanup_enabled_helper' => '按排程自動執行清理指令。',
            'cleanup_frequency' => '清理頻率',
            'max_file_size' => '最大檔案大小（MB）',
            'allowed_extensions' => '允許的副檔名',
            'allowed_extensions_placeholder' => '新增副檔名（例如：pdf）',
            'allowed_extensions_helper' => '允許上傳的副檔名。',
            'override_verification' => '覆寫信箱驗證',
            'override_verification_helper' => '使用「user-verify-email」範本替代應用程式預設的驗證郵件。',
            'override_password_reset' => '覆寫密碼重設',
            'override_password_reset_helper' => '使用「user-password-reset」範本替代應用程式預設的密碼重設郵件。',
            'override_welcome' => '覆寫歡迎郵件',
            'override_welcome_helper' => '新使用者註冊時使用「user-welcome」範本寄送歡迎郵件。',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app。保留所有權利。',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => '草稿',
            2 => '排隊中',
            3 => '已寄送',
            4 => '失敗',
        ],

        'cleanup_frequency' => [
            1 => '每天',
            2 => '每週',
            3 => '每月',
        ],
    ],

];
