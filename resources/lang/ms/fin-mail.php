<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'E-mel',
        'templates' => 'Templat',
        'themes' => 'Tema',
        'sent-emails' => 'E-mel Dihantar',
        'settings' => 'Tetapan',
    ],

    'models' => [
        'email_template' => 'Templat e-mel',
        'email_templates' => 'Templat e-mel',
        'email_theme' => 'Tema e-mel',
        'email_themes' => 'Tema e-mel',
        'sent_email' => 'E-mel dihantar',
        'sent_emails' => 'E-mel dihantar',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Kandungan',
            'settings' => 'Tetapan',
            'tokens' => 'Token',
        ],

        'fields' => [
            'name' => 'Nama',
            'key' => 'Kunci',
            'key_helper' => 'Kunci unik yang digunakan dalam kod: cth., "invoice-sent"',
            'category' => 'Kategori',
            'subject' => 'Subjek',
            'subject_helper' => 'Menyokong token: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Prapengantar',
            'preheader_helper' => 'Teks pratonton yang dipaparkan dalam klien e-mel',
            'body' => 'Isi',
            'theme' => 'Tema',
            'theme_placeholder' => 'Tema lalai',
            'is_active' => 'Aktif',
            'is_active_helper' => 'Templat tidak aktif tidak boleh digunakan untuk menghantar',
            'tags' => 'Tag',
            'tags_placeholder' => 'Tambah tag untuk penyusunan',
            'from_address' => 'E-mel Pengirim',
            'from_name' => 'Nama Pengirim',
            'locale' => 'Bahasa',
        ],

        'sections' => [
            'custom_sender' => 'Pengirim Tersuai',
            'custom_sender_description' => 'Gantikan alamat pengirim lalai untuk templat ini',
        ],

        'tokens' => [
            'label' => 'Token Tersedia',
            'helper' => 'Dokumentasikan token yang tersedia untuk templat ini. Ini membantu editor mengetahui pemboleh ubah yang boleh mereka gunakan.',
            'token' => 'Token',
            'description' => 'Penerangan',
            'example' => 'Contoh',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Nama penuh penerima',
            'example_placeholder' => 'Ahmad bin Ali',
            'new_item' => 'Token Baharu',
        ],

        'blocks' => [
            'button' => 'Butang',
            'button_heading' => 'Masukkan butang',
            'button_label' => 'Teks butang',
            'button_url' => 'URL',
            'button_align' => 'Penjajaran',
            'align_left' => 'Kiri',
            'align_center' => 'Tengah',
            'align_right' => 'Kanan',
            'button_default_label' => 'Klik di sini',
        ],

        'columns' => [
            'locales' => 'Bahasa',
            'active' => 'Aktif',
            'locked' => 'Dikunci',
            'sent' => 'Dihantar',
            'updated_at' => 'Dikemas kini',
        ],

        'actions' => [
            'preview' => 'Pratonton',
            'send_test' => 'Hantar Ujian',
            'send_test_field' => 'Hantar ke',
            'send_test_locale' => 'Bahasa',
            'compose' => 'Karang E-mel',
            'version_history' => 'Sejarah Versi',
            'back_to_templates' => 'Kembali ke Templat',
        ],

        'notifications' => [
            'test_sent' => 'E-mel ujian dihantar!',
            'test_sent_body' => 'Dihantar ke :email',
            'test_failed' => 'Gagal menghantar e-mel ujian',
            'saved' => 'Templat disimpan',
            'saved_body' => 'Salinan versi telah disimpan secara automatik.',
            'locked_skipped' => 'Templat dikunci dilangkau',
            'locked_skipped_body' => ':count templat dikunci telah dilangkau dan tidak dipadam.',
        ],

        'tooltips' => [
            'locked' => 'Templat ini dikunci — kunci dan kategori adalah baca sahaja, pemadaman dihalang.',
        ],

        'versioning' => [
            'date' => 'Tarikh',
            'by' => 'Oleh',
            'preview' => 'Pratonton',
            'restore' => 'Pulihkan',
            'restore_confirm' => 'Adakah anda pasti mahu memulihkan versi :version? Kandungan semasa akan disimpan sebagai versi baharu terlebih dahulu.',
            'restored' => 'Versi :version dipulihkan.',
            'empty' => 'Tiada sejarah versi tersedia.',
        ],

        'notices' => [
            'locked' => 'Templat ini dikunci. Medan kunci dan kategori tidak boleh diubah.',
        ],

        'language_label' => 'Bahasa: :locale',

        'replicate_suffix' => '(Salinan)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Karang E-mel',
        'title_with_name' => 'Karang: :name',

        'sections' => [
            'recipients' => 'Penerima',
            'content' => 'Kandungan E-mel',
            'attachments' => 'Lampiran',
            'tokens' => 'Token Tersedia',
        ],

        'fields' => [
            'from' => 'Dari',
            'to' => 'Kepada',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Masukkan alamat e-mel',
            'cc_placeholder' => 'Alamat CC',
            'bcc_placeholder' => 'Alamat BCC',
            'locale' => 'Bahasa',
            'subject' => 'Subjek',
            'preheader' => 'Prapengantar',
            'body' => 'Isi',
            'attach_files' => 'Lampirkan Fail',
            'preheader_helper' => 'Teks pratonton yang dipaparkan dalam klien e-mel sebelum dibuka',
            'no_tokens' => 'Tiada token didokumentasikan untuk templat ini. Token seperti {{ user.name }} akan digantikan apabila dihantar melalui API/kod.',
        ],

        'actions' => [
            'send' => 'Hantar E-mel',
            'preview' => 'Pratonton',
        ],

        'confirm' => [
            'heading' => 'Sahkan Penghantaran',
            'description' => 'Adakah anda pasti mahu menghantar e-mel ini?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Penerima',
            'content' => 'Kandungan',
            'attachments' => 'Lampiran',
        ],

        'fields' => [
            'from' => 'Dari',
            'to' => 'Kepada',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Templat',
            'subject' => 'Subjek',
            'to_placeholder' => 'Masukkan alamat e-mel',
            'cc_placeholder' => 'Masukkan alamat CC',
            'bcc_placeholder' => 'Masukkan alamat BCC',
            'auto_attached' => 'Fail dilampirkan secara automatik',
            'auto_attached_none' => 'Tiada',
            'additional_attachments' => 'Lampiran Tambahan',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Hantar E-mel',
        'modal_heading' => 'Karang E-mel',
        'submit' => 'Hantar',

        'notifications' => [
            'sent' => 'E-mel berjaya dihantar',
            'sent_body' => 'Dihantar ke: :recipients',
            'failed' => 'Gagal menghantar e-mel',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Butiran Tema',
            'background' => 'Latar Belakang & Susun Atur',
            'background_description' => 'Warna struktur utama untuk susun atur e-mel.',
            'typography' => 'Tipografi',
            'typography_description' => 'Warna untuk teks dan tajuk.',
            'buttons' => 'Butang',
            'buttons_description' => 'Penggayaan butang seruan tindakan.',
            'footer' => 'Pengaki',
            'footer_description' => 'Penggayaan kawasan pengaki.',
            'preview' => 'Pratonton',
        ],

        'fields' => [
            'name' => 'Nama',
            'is_default' => 'Tema Lalai',
            'is_default_helper' => 'Tema lalai digunakan untuk templat yang tidak menetapkan tema.',
            'page_background' => 'Latar Belakang Halaman',
            'content_background' => 'Latar Belakang Kandungan',
            'border' => 'Sempadan',
            'headings' => 'Tajuk',
            'body_text' => 'Teks Isi',
            'secondary_text' => 'Teks Sekunder',
            'links' => 'Pautan',
            'button_background' => 'Latar Belakang Butang',
            'button_text' => 'Teks Butang',
            'primary_accent' => 'Utama/Aksen',
            'footer_background' => 'Latar Belakang Pengaki',
            'footer_text' => 'Teks Pengaki',
        ],

        'columns' => [
            'primary' => 'Utama',
            'background' => 'Latar Belakang',
            'text' => 'Teks',
            'button' => 'Butang',
            'default' => 'Lalai',
            'templates' => 'Templat',
            'updated_at' => 'Dikemas kini',
        ],

        'replicate_suffix' => '(Salinan)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Kepada',
            'template' => 'Templat',
            'template_placeholder' => 'Tersuai',
            'sent_by' => 'Dihantar Oleh',
            'subject' => 'Subjek',
            'status' => 'Status',
            'sent_by_placeholder' => 'Sistem',
            'related_to' => 'Berkaitan Dengan',
            'sent_at' => 'Dihantar',
        ],

        'filters' => [
            'from' => 'Dari',
            'until' => 'Sehingga',
        ],

        'actions' => [
            'view' => 'Lihat',
            'resend' => 'Hantar Semula',
            'resend_description' => 'Ini akan menghantar salinan baharu e-mel kepada penerima asal.',
        ],


        'preview' => [
            'from' => 'Daripada:',
            'to' => 'Kepada:',
            'cc' => 'CC:',
            'template' => 'Templat:',
            'sent' => 'Dihantar:',
            'sent_not_yet' => 'Belum lagi',
            'status' => 'Status:',
            'no_body' => 'Kandungan emel tidak disimpan. Aktifkan <code>logging.store_rendered_body</code> dalam tetapan untuk menyimpan kandungan emel.',
            'error' => 'Butiran Ralat'
        ],
        'notifications' => [
            'resent' => 'E-mel berjaya dihantar semula',
            'resend_failed' => 'Gagal menghantar semula e-mel',
        ],

        'errors' => [
            'no_rendered_body' => 'Tidak dapat menghantar semula: tiada kandungan yang dirender disimpan. Aktifkan logging.store_rendered_body dalam tetapan.',
            'no_template' => 'Templat asal tidak lagi wujud.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'E-mel Dihantar',

        'columns' => [
            'to' => 'Kepada',
            'template' => 'Templat',
            'subject' => 'Subjek',
            'status' => 'Status',
            'sent_by' => 'Dihantar Oleh',
            'sent_by_placeholder' => 'Sistem',
            'sent_at' => 'Dihantar',
        ],

        'actions' => [
            'view' => 'Lihat',
            'resend' => 'Hantar Semula',
            'resend_confirm' => 'Adakah anda pasti mahu menghantar semula e-mel ini?',
        ],

        'notifications' => [
            'resent' => 'E-mel berjaya dihantar semula',
            'resend_failed' => 'Gagal menghantar semula',
        ],

        'empty' => [
            'heading' => 'Tiada e-mel dihantar',
            'description' => 'E-mel yang dihantar untuk rekod ini akan dipaparkan di sini.',
        ],

        'errors' => [
            'no_body' => 'Tidak dapat menghantar semula: tiada kandungan yang dirender atau templat disimpan.',
            'no_template' => 'Templat asal tidak lagi wujud.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Tetapan E-mel',

        'tabs' => [
            'general' => 'Umum',
            'branding' => 'Penjenamaan',
            'logging' => 'Pengelogan',
            'attachments' => 'Lampiran',
            'auth_emails' => 'E-mel Pengesahan',
        ],

        'titles' => [
            'general' => 'Tetapan Templat E-mel - Umum',
            'branding' => 'Tetapan Templat E-mel - Penjenamaan',
            'logging' => 'Tetapan Templat E-mel - Pengelogan',
            'attachments' => 'Tetapan Templat E-mel - Lampiran',
            'auth_emails' => 'Tetapan Templat E-mel - E-mel Pengesahan',
        ],

        'sections' => [
            'default_sender' => 'Pengirim Lalai',
            'default_sender_description' => 'Alamat "Dari" lalai untuk semua e-mel yang dihantar oleh pemalam.',
            'additional_senders' => 'Pengirim Tambahan',
            'add_additional_senders' => 'Tambah Penghantar Tambahan',
            'additional_senders_description' => 'Alamat "Dari" tambahan yang boleh dipilih pengguna semasa mengarang e-mel.',
            'localization' => 'Penyetempatan',
            'categories' => 'Kategori Templat',
            'logo' => 'Logo',
            'colors' => 'Warna',
            'footer_links' => 'Pautan Pengaki',
            'add_footer_links' => 'Tambah Pautan Pengaki',
            'customer_service' => 'Khidmat Pelanggan',
            'logging' => 'Pengelogan E-mel',
            'logging_description' => 'Kawal bagaimana e-mel yang dihantar direkodkan dalam pangkalan data.',
            'cleanup' => 'Pembersihan Berjadual',
            'cleanup_description' => 'Padam rekod e-mel yang dihantar secara automatik mengikut jadual.',
            'attachment_rules' => 'Peraturan Lampiran',
            'attachment_rules_description' => 'Konfigurasikan had untuk lampiran fail dalam e-mel yang dikarang.',
            'auth_emails' => 'Penggantian E-mel Pengesahan',
            'auth_emails_description' => 'Gantikan e-mel pengesahan lalai aplikasi dengan templat tersuai anda.',
        ],

        'fields' => [
            'from_email' => 'E-mel Pengirim',
            'from_name' => 'Nama Pengirim',
            'sender_email' => 'E-mel',
            'sender_name' => 'Nama Paparan',
            'sender_new' => 'Pengirim Baharu',
            'default_locale' => 'Bahasa Lalai',
            'default_locale_helper' => 'Bahasa lalai untuk templat baharu (cth., en, hu, de).',
            'languages' => 'Bahasa Tersedia',
            'language_code' => 'Kod',
            'language_display' => 'Nama Paparan',
            'language_flag' => 'Ikon Bendera',
            'language_new' => 'Bahasa Baharu',
            'category_key' => 'Kunci',
            'category_label' => 'Label',
            'category_new' => 'Kategori Baharu',
            'logo_url' => 'URL atau Laluan Logo',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL mutlak atau laluan ke logo e-mel anda.',
            'logo_width' => 'Lebar (px)',
            'logo_height' => 'Tinggi (px)',
            'content_width' => 'Lebar Kandungan (px)',
            'primary_color' => 'Warna Utama',
            'footer_link_label' => 'Label',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Pautan Baharu',
            'support_email' => 'E-mel Sokongan',
            'support_phone' => 'Telefon Sokongan',
            'enable_logging' => 'Aktifkan Pengelogan',
            'enable_logging_helper' => 'Apabila dinyahaktifkan, tiada rekod e-mel yang dihantar akan dibuat.',
            'store_rendered_body' => 'Simpan Kandungan Dirender',
            'store_rendered_body_helper' => 'Simpan HTML akhir setiap e-mel yang dihantar. Diperlukan untuk ciri hantar semula dan pratonton.',
            'retention_days' => 'Pengekalan (hari)',
            'retention_days_helper' => 'Padam rekod e-mel yang dihantar secara automatik selepas beberapa hari ini. Biarkan kosong untuk simpan selama-lamanya.',
            'cleanup_enabled' => 'Aktifkan Pembersihan Berjadual',
            'cleanup_enabled_helper' => 'Jalankan arahan pembersihan secara automatik mengikut jadual.',
            'cleanup_frequency' => 'Kekerapan Pembersihan',
            'max_file_size' => 'Saiz Fail Maksimum (MB)',
            'allowed_extensions' => 'Sambungan Fail Dibenarkan',
            'allowed_extensions_placeholder' => 'Tambah sambungan (cth., pdf)',
            'allowed_extensions_helper' => 'Sambungan fail yang dibenarkan untuk muat naik.',
            'override_verification' => 'Gantikan Pengesahan E-mel',
            'override_verification_helper' => 'Gunakan templat "user-verify-email" sebagai ganti e-mel pengesahan lalai aplikasi.',
            'override_password_reset' => 'Gantikan Tetapan Semula Kata Laluan',
            'override_password_reset_helper' => 'Gunakan templat "user-password-reset" sebagai ganti e-mel tetapan semula kata laluan lalai aplikasi.',
            'override_welcome' => 'Gantikan E-mel Selamat Datang',
            'override_welcome_helper' => 'Hantar e-mel selamat datang menggunakan templat "user-welcome" apabila pengguna baharu mendaftar.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Hak cipta terpelihara.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Draf',
            2 => 'Dalam Baris Gilir',
            3 => 'Dihantar',
            4 => 'Gagal',
        ],

        'cleanup_frequency' => [
            1 => 'Harian',
            2 => 'Mingguan',
            3 => 'Bulanan',
        ],
    ],

];
