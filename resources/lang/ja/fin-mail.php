<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'メール',
        'templates' => 'テンプレート',
        'themes' => 'テーマ',
        'sent-emails' => '送信済みメール',
        'settings' => '設定',
    ],

    'models' => [
        'email_template' => 'メールテンプレート',
        'email_templates' => 'メールテンプレート',
        'email_theme' => 'メールテーマ',
        'email_themes' => 'メールテーマ',
        'sent_email' => '送信済みメール',
        'sent_emails' => '送信済みメール',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'コンテンツ',
            'settings' => '設定',
            'tokens' => 'トークン',
        ],

        'fields' => [
            'name' => '名前',
            'key' => 'キー',
            'key_helper' => 'コード内で使用する一意のキー（例: "invoice-sent"）',
            'category' => 'カテゴリ',
            'subject' => '件名',
            'subject_helper' => 'トークン使用可: {{ user.name }}、{{ config.app.name }}',
            'preheader' => 'プリヘッダー',
            'preheader_helper' => 'メールクライアントで表示されるプレビューテキスト',
            'body' => '本文',
            'theme' => 'テーマ',
            'theme_placeholder' => 'デフォルトテーマ',
            'is_active' => '有効',
            'is_active_helper' => '無効なテンプレートは送信に使用できません',
            'tags' => 'タグ',
            'tags_placeholder' => '整理用のタグを追加',
            'from_address' => '差出人メールアドレス',
            'from_name' => '差出人名',
            'locale' => '言語',
        ],

        'sections' => [
            'custom_sender' => 'カスタム差出人',
            'custom_sender_description' => 'このテンプレートのデフォルト差出人アドレスを上書きします',
        ],

        'tokens' => [
            'label' => '利用可能なトークン',
            'helper' => 'このテンプレートで使用可能なトークンを記載してください。編集者がどの変数を使えるかを把握するのに役立ちます。',
            'token' => 'トークン',
            'description' => '説明',
            'example' => '例',
            'token_placeholder' => 'user.name',
            'description_placeholder' => '受信者のフルネーム',
            'example_placeholder' => '山田太郎',
            'new_item' => '新しいトークン',
        ],

        'columns' => [
            'locales' => 'ロケール',
            'active' => '有効',
            'locked' => 'ロック済み',
            'sent' => '送信数',
            'updated_at' => '更新日時',
        ],

        'actions' => [
            'preview' => 'プレビュー',
            'send_test' => 'テスト送信',
            'send_test_field' => '送信先',
            'send_test_locale' => '言語',
            'compose' => 'メール作成',
            'version_history' => 'バージョン履歴',
            'back_to_templates' => 'テンプレート一覧に戻る',
        ],

        'notifications' => [
            'test_sent' => 'テストメールを送信しました！',
            'test_sent_body' => ':email に送信しました',
            'test_failed' => 'テストメールの送信に失敗しました',
            'saved' => 'テンプレートを保存しました',
            'saved_body' => 'バージョンのスナップショットが自動的に保存されました。',
            'locked_skipped' => 'ロック済みテンプレートをスキップしました',
            'locked_skipped_body' => ':count 件のロック済みテンプレートはスキップされ、削除されませんでした。',
        ],

        'tooltips' => [
            'locked' => 'このテンプレートはロックされています — キーとカテゴリは読み取り専用で、削除はできません。',
        ],

        'notices' => [
            'locked' => 'このテンプレートはロックされています。キーとカテゴリのフィールドは変更できません。',
        ],

        'language_label' => '言語: :locale',

        'replicate_suffix' => '(コピー)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'メール作成',
        'title_with_name' => 'メール作成: :name',

        'sections' => [
            'recipients' => '宛先',
            'content' => 'メール内容',
            'attachments' => '添付ファイル',
            'tokens' => '利用可能なトークン',
        ],

        'fields' => [
            'from' => '差出人',
            'to' => '宛先',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'メールアドレスを入力',
            'cc_placeholder' => 'CC アドレス',
            'bcc_placeholder' => 'BCC アドレス',
            'locale' => '言語',
            'subject' => '件名',
            'preheader' => 'プリヘッダー',
            'body' => '本文',
            'attach_files' => 'ファイルを添付',
            'preheader_helper' => 'メールを開く前にクライアントで表示されるプレビューテキスト',
            'no_tokens' => 'このテンプレートにはトークンが記載されていません。{{ user.name }} のようなトークンは、API/コード経由で送信する際に置換されます。',
        ],

        'actions' => [
            'send' => 'メールを送信',
            'preview' => 'プレビュー',
        ],

        'confirm' => [
            'heading' => '送信の確認',
            'description' => 'このメールを送信してよろしいですか？',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => '宛先',
            'content' => 'コンテンツ',
            'attachments' => '添付ファイル',
        ],

        'fields' => [
            'from' => '差出人',
            'to' => '宛先',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'テンプレート',
            'subject' => '件名',
            'to_placeholder' => 'メールアドレスを入力',
            'cc_placeholder' => 'CC アドレスを入力',
            'bcc_placeholder' => 'BCC アドレスを入力',
            'auto_attached' => '自動添付ファイル',
            'auto_attached_none' => 'なし',
            'additional_attachments' => '追加の添付ファイル',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'メールを送信',
        'modal_heading' => 'メール作成',
        'submit' => '送信',

        'notifications' => [
            'sent' => 'メールを送信しました',
            'sent_body' => '送信先: :recipients',
            'failed' => 'メールの送信に失敗しました',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'テーマの詳細',
            'background' => '背景とレイアウト',
            'background_description' => 'メールレイアウトの主要な構造色。',
            'typography' => 'タイポグラフィ',
            'typography_description' => 'テキストと見出しの色。',
            'buttons' => 'ボタン',
            'buttons_description' => 'コールトゥアクションボタンのスタイル。',
            'footer' => 'フッター',
            'footer_description' => 'フッター領域のスタイル。',
            'preview' => 'プレビュー',
        ],

        'fields' => [
            'name' => '名前',
            'is_default' => 'デフォルトテーマ',
            'is_default_helper' => 'テーマが指定されていないテンプレートにはデフォルトテーマが適用されます。',
            'page_background' => 'ページ背景',
            'content_background' => 'コンテンツ背景',
            'border' => '枠線',
            'headings' => '見出し',
            'body_text' => '本文テキスト',
            'secondary_text' => '補助テキスト',
            'links' => 'リンク',
            'button_background' => 'ボタン背景',
            'button_text' => 'ボタンテキスト',
            'primary_accent' => 'プライマリ/アクセント',
            'footer_background' => 'フッター背景',
            'footer_text' => 'フッターテキスト',
        ],

        'columns' => [
            'primary' => 'プライマリ',
            'background' => '背景',
            'text' => 'テキスト',
            'button' => 'ボタン',
            'default' => 'デフォルト',
            'templates' => 'テンプレート',
            'updated_at' => '更新日時',
        ],

        'replicate_suffix' => '(コピー)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => '宛先',
            'template' => 'テンプレート',
            'template_placeholder' => 'カスタム',
            'sent_by' => '送信者',
            'subject' => '件名',
            'status' => 'ステータス',
            'sent_by_placeholder' => 'システム',
            'related_to' => '関連先',
            'sent_at' => '送信日時',
        ],

        'filters' => [
            'from' => '開始日',
            'until' => '終了日',
        ],

        'actions' => [
            'view' => '表示',
            'resend' => '再送信',
            'resend_description' => '元の宛先にメールの新しいコピーが送信されます。',
        ],

        'notifications' => [
            'resent' => 'メールを再送信しました',
            'resend_failed' => 'メールの再送信に失敗しました',
        ],

        'errors' => [
            'no_rendered_body' => '再送信できません: レンダリング済みの本文が保存されていません。設定でlogging.store_rendered_bodyを有効にしてください。',
            'no_template' => '元のテンプレートは既に存在しません。',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => '送信済みメール',

        'columns' => [
            'to' => '宛先',
            'template' => 'テンプレート',
            'subject' => '件名',
            'status' => 'ステータス',
            'sent_by' => '送信者',
            'sent_by_placeholder' => 'システム',
            'sent_at' => '送信日時',
        ],

        'actions' => [
            'view' => '表示',
            'resend' => '再送信',
            'resend_confirm' => 'このメールを再送信してよろしいですか？',
        ],

        'notifications' => [
            'resent' => 'メールを再送信しました',
            'resend_failed' => '再送信に失敗しました',
        ],

        'empty' => [
            'heading' => '送信済みメールはありません',
            'description' => 'このレコードに関連する送信済みメールがここに表示されます。',
        ],

        'errors' => [
            'no_body' => '再送信できません: レンダリング済みの本文またはテンプレートが保存されていません。',
            'no_template' => '元のテンプレートは既に存在しません。',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'メール設定',

        'tabs' => [
            'general' => '一般',
            'branding' => 'ブランディング',
            'logging' => 'ログ',
            'attachments' => '添付ファイル',
            'auth_emails' => '認証メール',
        ],

        'titles' => [
            'general' => 'メールテンプレート設定 - 一般',
            'branding' => 'メールテンプレート設定 - ブランディング',
            'logging' => 'メールテンプレート設定 - ログ',
            'attachments' => 'メールテンプレート設定 - 添付ファイル',
            'auth_emails' => 'メールテンプレート設定 - 認証メール',
        ],

        'sections' => [
            'default_sender' => 'デフォルト差出人',
            'default_sender_description' => 'プラグインから送信されるすべてのメールのデフォルトの「差出人」アドレス。',
            'additional_senders' => '追加の差出人',
            'additional_senders_description' => 'メール作成時にユーザーが選択できる追加の「差出人」アドレス。',
            'localization' => 'ローカライズ',
            'categories' => 'テンプレートカテゴリ',
            'logo' => 'ロゴ',
            'colors' => 'カラー',
            'footer_links' => 'フッターリンク',
            'customer_service' => 'カスタマーサービス',
            'logging' => 'メールログ',
            'logging_description' => '送信済みメールのデータベースへの記録方法を制御します。',
            'cleanup' => '定期クリーンアップ',
            'cleanup_description' => '古い送信済みメールのレコードをスケジュールに従って自動削除します。',
            'attachment_rules' => '添付ファイルのルール',
            'attachment_rules_description' => 'メール作成時のファイル添付の制限を設定します。',
            'auth_emails' => '認証メールの上書き',
            'auth_emails_description' => 'アプリケーションのデフォルトの認証メールをカスタムテンプレートで上書きします。',
        ],

        'fields' => [
            'from_email' => '差出人メールアドレス',
            'from_name' => '差出人名',
            'sender_email' => 'メールアドレス',
            'sender_name' => '表示名',
            'sender_new' => '新しい差出人',
            'default_locale' => 'デフォルトロケール',
            'default_locale_helper' => '新しいテンプレートのデフォルト言語（例: en、hu、de）。',
            'languages' => '利用可能な言語',
            'language_code' => 'コード',
            'language_display' => '表示名',
            'language_flag' => 'フラグアイコン',
            'language_new' => '新しい言語',
            'category_key' => 'キー',
            'category_label' => 'ラベル',
            'category_new' => '新しいカテゴリ',
            'logo_url' => 'ロゴの URL またはパス',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'メールロゴの絶対 URL またはパス。',
            'logo_width' => '幅 (px)',
            'logo_height' => '高さ (px)',
            'content_width' => 'コンテンツ幅 (px)',
            'primary_color' => 'プライマリカラー',
            'footer_link_label' => 'ラベル',
            'footer_link_url' => 'URL',
            'footer_link_new' => '新しいリンク',
            'support_email' => 'サポートメールアドレス',
            'support_phone' => 'サポート電話番号',
            'enable_logging' => 'ログを有効にする',
            'enable_logging_helper' => '無効にすると、送信済みメールのレコードは作成されません。',
            'store_rendered_body' => 'レンダリング済み本文を保存',
            'store_rendered_body_helper' => '送信済みメールの最終 HTML を保存します。再送信やプレビュー機能に必要です。',
            'retention_days' => '保持期間（日数）',
            'retention_days_helper' => '指定した日数が経過した送信済みメールのレコードを自動削除します。空のままにすると永久に保持します。',
            'cleanup_enabled' => '定期クリーンアップを有効にする',
            'cleanup_enabled_helper' => 'スケジュールに従ってクリーンアップコマンドを自動実行します。',
            'cleanup_frequency' => 'クリーンアップ頻度',
            'max_file_size' => '最大ファイルサイズ (MB)',
            'allowed_extensions' => '許可されるファイル拡張子',
            'allowed_extensions_placeholder' => '拡張子を追加（例: pdf）',
            'allowed_extensions_helper' => 'アップロードが許可されるファイル拡張子。',
            'override_verification' => 'メール認証を上書き',
            'override_verification_helper' => 'アプリケーションのデフォルトの認証メールの代わりに「user-verify-email」テンプレートを使用します。',
            'override_password_reset' => 'パスワードリセットを上書き',
            'override_password_reset_helper' => 'アプリケーションのデフォルトのパスワードリセットメールの代わりに「user-password-reset」テンプレートを使用します。',
            'override_welcome' => 'ウェルカムメールを上書き',
            'override_welcome_helper' => '新規ユーザー登録時に「user-welcome」テンプレートを使用してウェルカムメールを送信します。',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. All rights reserved.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => '下書き',
            2 => 'キュー待ち',
            3 => '送信済み',
            4 => '失敗',
        ],

        'cleanup_frequency' => [
            1 => '毎日',
            2 => '毎週',
            3 => '毎月',
        ],
    ],

];
