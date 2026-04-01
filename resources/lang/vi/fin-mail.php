<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'Email',
        'templates' => 'Mau',
        'themes' => 'Giao dien',
        'sent-emails' => 'Email da gui',
        'settings' => 'Cai dat',
    ],

    'models' => [
        'email_template' => 'Mau email',
        'email_templates' => 'Cac mau email',
        'email_theme' => 'Giao dien email',
        'email_themes' => 'Cac giao dien email',
        'sent_email' => 'Email da gui',
        'sent_emails' => 'Cac email da gui',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Noi dung',
            'settings' => 'Cai dat',
            'tokens' => 'Token',
        ],

        'fields' => [
            'name' => 'Ten',
            'key' => 'Khoa',
            'key_helper' => 'Khoa duy nhat duoc su dung trong ma nguon, vi du: "invoice-sent"',
            'category' => 'Danh muc',
            'subject' => 'Chu de',
            'subject_helper' => 'Ho tro token: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Van ban xem truoc',
            'preheader_helper' => 'Van ban xem truoc hien thi trong ung dung email',
            'body' => 'Noi dung',
            'theme' => 'Giao dien',
            'theme_placeholder' => 'Giao dien mac dinh',
            'is_active' => 'Hoat dong',
            'is_active_helper' => 'Cac mau khong hoat dong khong the duoc su dung de gui',
            'tags' => 'The',
            'tags_placeholder' => 'Them the de to chuc',
            'from_address' => 'Email nguoi gui',
            'from_name' => 'Ten nguoi gui',
            'locale' => 'Ngon ngu',
        ],

        'sections' => [
            'custom_sender' => 'Nguoi gui tuy chinh',
            'custom_sender_description' => 'Ghi de dia chi nguoi gui mac dinh cho mau nay',
        ],

        'tokens' => [
            'label' => 'Cac token kha dung',
            'helper' => 'Ghi lai cac token kha dung cho mau nay. Dieu nay giup nguoi bien tap biet nhung bien nao ho co the su dung.',
            'token' => 'Token',
            'description' => 'Mo ta',
            'example' => 'Vi du',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Ho ten day du cua nguoi nhan',
            'example_placeholder' => 'John Doe',
            'new_item' => 'Token moi',
        ],

        'blocks' => [
            'button' => 'Nút',
            'button_heading' => 'Chèn nút',
            'button_label' => 'Văn bản nút',
            'button_url' => 'URL',
            'button_align' => 'Căn chỉnh',
            'align_left' => 'Trái',
            'align_center' => 'Giữa',
            'align_right' => 'Phải',
            'button_default_label' => 'Nhấp vào đây',
        ],

        'columns' => [
            'locales' => 'Ngon ngu',
            'active' => 'Hoat dong',
            'locked' => 'Khoa',
            'sent' => 'Da gui',
            'updated_at' => 'Cap nhat',
        ],

        'actions' => [
            'preview' => 'Xem truoc',
            'send_test' => 'Gui thu nghiem',
            'send_test_field' => 'Gui den',
            'send_test_locale' => 'Ngon ngu',
            'compose' => 'Soan email',
            'version_history' => 'Lich su phien ban',
            'back_to_templates' => 'Quay lai danh sach mau',
        ],

        'notifications' => [
            'test_sent' => 'Email thu nghiem da gui!',
            'test_sent_body' => 'Da gui den :email',
            'test_failed' => 'Khong the gui email thu nghiem',
            'saved' => 'Mau da duoc luu',
            'saved_body' => 'Ban sao phien ban da duoc luu tu dong.',
            'locked_skipped' => 'Cac mau bi khoa da bi bo qua',
            'locked_skipped_body' => ':count mau bi khoa da bi bo qua va khong bi xoa.',
        ],

        'tooltips' => [
            'locked' => 'Mau nay bi khoa -- khoa va danh muc chi doc, khong the xoa.',
        ],

        'versioning' => [
            'date' => 'Ngày',
            'by' => 'Bởi',
            'preview' => 'Xem trước',
            'restore' => 'Khôi phục',
            'restore_confirm' => 'Bạn có chắc chắn muốn khôi phục phiên bản :version? Nội dung hiện tại sẽ được lưu thành phiên bản mới trước.',
            'restored' => 'Phiên bản :version đã được khôi phục.',
            'empty' => 'Không có lịch sử phiên bản.',
        ],

        'notices' => [
            'locked' => 'Mau nay bi khoa. Khong the thay doi truong khoa va danh muc.',
        ],

        'language_label' => 'Ngon ngu: :locale',

        'replicate_suffix' => '(Ban sao)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Soan email',
        'title_with_name' => 'Soan: :name',

        'sections' => [
            'recipients' => 'Nguoi nhan',
            'content' => 'Noi dung email',
            'attachments' => 'Tep dinh kem',
            'tokens' => 'Cac token kha dung',
        ],

        'fields' => [
            'from' => 'Tu',
            'to' => 'Den',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Nhap dia chi email',
            'cc_placeholder' => 'Dia chi CC',
            'bcc_placeholder' => 'Dia chi BCC',
            'locale' => 'Ngon ngu',
            'subject' => 'Chu de',
            'preheader' => 'Van ban xem truoc',
            'body' => 'Noi dung',
            'attach_files' => 'Dinh kem tep',
            'preheader_helper' => 'Van ban xem truoc hien thi trong ung dung email truoc khi mo',
            'no_tokens' => 'Khong co token nao duoc ghi lai cho mau nay. Cac token nhu {{ user.name }} se duoc thay the khi gui qua API/ma nguon.',
        ],

        'actions' => [
            'send' => 'Gui email',
            'preview' => 'Xem truoc',
        ],

        'confirm' => [
            'heading' => 'Xac nhan gui',
            'description' => 'Ban co chac chan muon gui email nay khong?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Nguoi nhan',
            'content' => 'Noi dung',
            'attachments' => 'Tep dinh kem',
        ],

        'fields' => [
            'from' => 'Tu',
            'to' => 'Den',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Mau',
            'subject' => 'Chu de',
            'to_placeholder' => 'Nhap dia chi email',
            'cc_placeholder' => 'Nhap dia chi CC',
            'bcc_placeholder' => 'Nhap dia chi BCC',
            'auto_attached' => 'Tep dinh kem tu dong',
            'auto_attached_none' => 'Khong co',
            'additional_attachments' => 'Tep dinh kem bo sung',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Gui email',
        'modal_heading' => 'Soan email',
        'submit' => 'Gui',

        'notifications' => [
            'sent' => 'Email da duoc gui thanh cong',
            'sent_body' => 'Da gui den: :recipients',
            'failed' => 'Khong the gui email',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Chi tiet giao dien',
            'background' => 'Nen va bo cuc',
            'background_description' => 'Cac mau cau truc chinh cho bo cuc email.',
            'typography' => 'Kieu chu',
            'typography_description' => 'Mau sac cho van ban va tieu de.',
            'buttons' => 'Nut',
            'buttons_description' => 'Kieu dang nut keu goi hanh dong.',
            'footer' => 'Chan trang',
            'footer_description' => 'Kieu dang vung chan trang.',
            'preview' => 'Xem truoc',
        ],

        'fields' => [
            'name' => 'Ten',
            'is_default' => 'Giao dien mac dinh',
            'is_default_helper' => 'Giao dien mac dinh duoc ap dung cho cac mau khong chi dinh giao dien.',
            'page_background' => 'Nen trang',
            'content_background' => 'Nen noi dung',
            'border' => 'Duong vien',
            'headings' => 'Tieu de',
            'body_text' => 'Van ban noi dung',
            'secondary_text' => 'Van ban phu',
            'links' => 'Lien ket',
            'button_background' => 'Nen nut',
            'button_text' => 'Van ban nut',
            'primary_accent' => 'Chinh/Nhan',
            'footer_background' => 'Nen chan trang',
            'footer_text' => 'Van ban chan trang',
        ],

        'columns' => [
            'primary' => 'Chinh',
            'background' => 'Nen',
            'text' => 'Van ban',
            'button' => 'Nut',
            'default' => 'Mac dinh',
            'templates' => 'Mau',
            'updated_at' => 'Cap nhat',
        ],

        'replicate_suffix' => '(Ban sao)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Den',
            'template' => 'Mau',
            'template_placeholder' => 'Tuy chinh',
            'sent_by' => 'Nguoi gui',
            'subject' => 'Chu de',
            'status' => 'Trang thai',
            'sent_by_placeholder' => 'He thong',
            'related_to' => 'Lien quan den',
            'sent_at' => 'Da gui',
        ],

        'filters' => [
            'from' => 'Tu',
            'until' => 'Den',
        ],

        'actions' => [
            'view' => 'Xem',
            'resend' => 'Gui lai',
            'resend_description' => 'Thao tac nay se gui ban sao moi cua email den nguoi nhan ban dau.',
        ],


        'preview' => [
            'from' => 'Từ:',
            'to' => 'Đến:',
            'cc' => 'CC:',
            'template' => 'Mẫu:',
            'sent' => 'Đã gửi:',
            'sent_not_yet' => 'Chưa gửi',
            'status' => 'Trạng thái:',
            'no_body' => 'Nội dung email chưa được lưu trữ. Bật <code>logging.store_rendered_body</code> trong cài đặt để lưu nội dung email.',
            'error' => 'Chi tiết lỗi'
        ],
        'notifications' => [
            'resent' => 'Email da duoc gui lai thanh cong',
            'resend_failed' => 'Khong the gui lai email',
        ],

        'errors' => [
            'no_rendered_body' => 'Khong the gui lai: khong co noi dung da ket xuat duoc luu. Bat logging.store_rendered_body trong cai dat.',
            'no_template' => 'Mau goc khong con ton tai.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Cac email da gui',

        'columns' => [
            'to' => 'Den',
            'template' => 'Mau',
            'subject' => 'Chu de',
            'status' => 'Trang thai',
            'sent_by' => 'Nguoi gui',
            'sent_by_placeholder' => 'He thong',
            'sent_at' => 'Da gui',
        ],

        'actions' => [
            'view' => 'Xem',
            'resend' => 'Gui lai',
            'resend_confirm' => 'Ban co chac chan muon gui lai email nay khong?',
        ],

        'notifications' => [
            'resent' => 'Email da duoc gui lai thanh cong',
            'resend_failed' => 'Khong the gui lai',
        ],

        'empty' => [
            'heading' => 'Chua co email nao duoc gui',
            'description' => 'Cac email duoc gui cho ban ghi nay se hien thi o day.',
        ],

        'errors' => [
            'no_body' => 'Khong the gui lai: khong co noi dung da ket xuat hoac mau duoc luu.',
            'no_template' => 'Mau goc khong con ton tai.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Cai dat email',

        'tabs' => [
            'general' => 'Chung',
            'branding' => 'Thuong hieu',
            'logging' => 'Ghi nhat ky',
            'attachments' => 'Tep dinh kem',
            'auth_emails' => 'Email xac thuc',
        ],

        'titles' => [
            'general' => 'Cai dat mau email - Chung',
            'branding' => 'Cai dat mau email - Thuong hieu',
            'logging' => 'Cai dat mau email - Ghi nhat ky',
            'attachments' => 'Cai dat mau email - Tep dinh kem',
            'auth_emails' => 'Cai dat mau email - Email xac thuc',
        ],

        'sections' => [
            'default_sender' => 'Nguoi gui mac dinh',
            'default_sender_description' => 'Dia chi "Tu" mac dinh cho tat ca email duoc gui boi plugin.',
            'additional_senders' => 'Nguoi gui bo sung',
            'add_additional_senders' => 'Thêm người gửi bổ sung',
            'additional_senders_description' => 'Cac dia chi "Tu" bo sung ma nguoi dung co the chon khi soan email.',
            'localization' => 'Ban dia hoa',
            'categories' => 'Danh muc mau',
            'logo' => 'Logo',
            'colors' => 'Mau sac',
            'footer_links' => 'Lien ket chan trang',
            'add_footer_links' => 'Thêm liên kết chân trang',
            'customer_service' => 'Dich vu khach hang',
            'logging' => 'Ghi nhat ky email',
            'logging_description' => 'Kiem soat cach cac email da gui duoc ghi lai trong co so du lieu.',
            'cleanup' => 'Don dep theo lich',
            'cleanup_description' => 'Tu dong xoa cac ban ghi email da gui cu theo lich trinh.',
            'attachment_rules' => 'Quy tac dinh kem',
            'attachment_rules_description' => 'Cau hinh gioi han cho tep dinh kem trong email soan.',
            'auth_emails' => 'Ghi de email xac thuc',
            'auth_emails_description' => 'Ghi de cac email xac thuc mac dinh cua ung dung bang mau tuy chinh cua ban.',
        ],

        'fields' => [
            'from_email' => 'Email nguoi gui',
            'from_name' => 'Ten nguoi gui',
            'sender_email' => 'Email',
            'sender_name' => 'Ten hien thi',
            'sender_new' => 'Nguoi gui moi',
            'default_locale' => 'Ngon ngu mac dinh',
            'default_locale_helper' => 'Ngon ngu mac dinh cho cac mau moi (vi du: en, hu, de).',
            'languages' => 'Cac ngon ngu kha dung',
            'language_code' => 'Ma',
            'language_display' => 'Ten hien thi',
            'language_flag' => 'Bieu tuong co',
            'language_new' => 'Ngon ngu moi',
            'category_key' => 'Khoa',
            'category_label' => 'Nhan',
            'category_new' => 'Danh muc moi',
            'logo_url' => 'URL hoac duong dan logo',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL tuyet doi hoac duong dan den logo email cua ban.',
            'logo_width' => 'Chieu rong (px)',
            'logo_height' => 'Chieu cao (px)',
            'content_width' => 'Chieu rong noi dung (px)',
            'primary_color' => 'Mau chinh',
            'footer_link_label' => 'Nhan',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Lien ket moi',
            'support_email' => 'Email ho tro',
            'support_phone' => 'Dien thoai ho tro',
            'enable_logging' => 'Bat ghi nhat ky',
            'enable_logging_helper' => 'Khi tat, khong co ban ghi email da gui nao duoc tao.',
            'store_rendered_body' => 'Luu noi dung da ket xuat',
            'store_rendered_body_helper' => 'Luu HTML cuoi cung cua moi email da gui. Can thiet cho tinh nang gui lai va xem truoc.',
            'retention_days' => 'Thoi gian luu giu (ngay)',
            'retention_days_helper' => 'Tu dong xoa cac ban ghi email da gui sau so ngay nay. De trong de luu giu mai mai.',
            'cleanup_enabled' => 'Bat don dep theo lich',
            'cleanup_enabled_helper' => 'Tu dong chay lenh don dep theo lich trinh.',
            'cleanup_frequency' => 'Tan suat don dep',
            'max_file_size' => 'Kich thuoc tep toi da (MB)',
            'allowed_extensions' => 'Dinh dang tep cho phep',
            'allowed_extensions_placeholder' => 'Them dinh dang (vi du: pdf)',
            'allowed_extensions_helper' => 'Cac dinh dang tep duoc phep tai len.',
            'override_verification' => 'Ghi de email xac minh',
            'override_verification_helper' => 'Su dung mau "user-verify-email" thay cho email xac minh mac dinh cua ung dung.',
            'override_password_reset' => 'Ghi de dat lai mat khau',
            'override_password_reset_helper' => 'Su dung mau "user-password-reset" thay cho email dat lai mat khau mac dinh cua ung dung.',
            'override_welcome' => 'Ghi de email chao mung',
            'override_welcome_helper' => 'Gui email chao mung su dung mau "user-welcome" khi nguoi dung moi dang ky.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Moi quyen duoc bao luu.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Nhap',
            2 => 'Trong hang doi',
            3 => 'Da gui',
            4 => 'That bai',
        ],

        'cleanup_frequency' => [
            1 => 'Hang ngay',
            2 => 'Hang tuan',
            3 => 'Hang thang',
        ],
    ],

];
