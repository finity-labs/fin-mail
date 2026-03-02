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
        'templates' => 'Templat',
        'themes' => 'Tema',
        'sent-emails' => 'Email Terkirim',
        'settings' => 'Pengaturan',
    ],

    'models' => [
        'email_template' => 'Templat email',
        'email_templates' => 'Templat email',
        'email_theme' => 'Tema email',
        'email_themes' => 'Tema email',
        'sent_email' => 'Email terkirim',
        'sent_emails' => 'Email terkirim',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Konten',
            'settings' => 'Pengaturan',
            'tokens' => 'Token',
        ],

        'fields' => [
            'name' => 'Nama',
            'key' => 'Kunci',
            'key_helper' => 'Kunci unik yang digunakan dalam kode: misal "invoice-sent"',
            'category' => 'Kategori',
            'subject' => 'Subjek',
            'subject_helper' => 'Mendukung token: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Preheader',
            'preheader_helper' => 'Teks pratinjau yang ditampilkan di klien email',
            'body' => 'Isi',
            'theme' => 'Tema',
            'theme_placeholder' => 'Tema bawaan',
            'is_active' => 'Aktif',
            'is_active_helper' => 'Templat tidak aktif tidak dapat digunakan untuk pengiriman',
            'tags' => 'Tag',
            'tags_placeholder' => 'Tambahkan tag untuk pengorganisasian',
            'from_address' => 'Email Pengirim',
            'from_name' => 'Nama Pengirim',
            'locale' => 'Bahasa',
        ],

        'sections' => [
            'custom_sender' => 'Pengirim Kustom',
            'custom_sender_description' => 'Timpa alamat pengirim bawaan untuk templat ini',
        ],

        'tokens' => [
            'label' => 'Token Tersedia',
            'helper' => 'Dokumentasikan token yang tersedia untuk templat ini. Ini membantu editor mengetahui variabel apa saja yang dapat digunakan.',
            'token' => 'Token',
            'description' => 'Deskripsi',
            'example' => 'Contoh',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Nama lengkap penerima',
            'example_placeholder' => 'Budi Santoso',
            'new_item' => 'Token Baru',
        ],

        'columns' => [
            'locales' => 'Bahasa',
            'active' => 'Aktif',
            'locked' => 'Terkunci',
            'sent' => 'Terkirim',
            'updated_at' => 'Diperbarui',
        ],

        'actions' => [
            'preview' => 'Pratinjau',
            'send_test' => 'Kirim Tes',
            'send_test_field' => 'Kirim ke',
            'send_test_locale' => 'Bahasa',
            'compose' => 'Tulis Email',
            'version_history' => 'Riwayat Versi',
            'back_to_templates' => 'Kembali ke Templat',
        ],

        'notifications' => [
            'test_sent' => 'Email tes terkirim!',
            'test_sent_body' => 'Terkirim ke :email',
            'test_failed' => 'Gagal mengirim email tes',
            'saved' => 'Templat disimpan',
            'saved_body' => 'Snapshot versi disimpan secara otomatis.',
            'locked_skipped' => 'Templat terkunci dilewati',
            'locked_skipped_body' => ':count templat terkunci dilewati dan tidak dihapus.',
        ],

        'tooltips' => [
            'locked' => 'Templat ini terkunci — kunci dan kategori hanya-baca, penghapusan dicegah.',
        ],

        'notices' => [
            'locked' => 'Templat ini terkunci. Kolom kunci dan kategori tidak dapat diubah.',
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
        'title' => 'Tulis Email',
        'title_with_name' => 'Tulis: :name',

        'sections' => [
            'recipients' => 'Penerima',
            'content' => 'Konten Email',
            'attachments' => 'Lampiran',
            'tokens' => 'Token Tersedia',
        ],

        'fields' => [
            'from' => 'Dari',
            'to' => 'Kepada',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Masukkan alamat email',
            'cc_placeholder' => 'Alamat CC',
            'bcc_placeholder' => 'Alamat BCC',
            'locale' => 'Bahasa',
            'subject' => 'Subjek',
            'preheader' => 'Preheader',
            'body' => 'Isi',
            'attach_files' => 'Lampirkan File',
            'preheader_helper' => 'Teks pratinjau yang ditampilkan di klien email sebelum dibuka',
            'no_tokens' => 'Tidak ada token yang didokumentasikan untuk templat ini. Token seperti {{ user.name }} akan diganti saat dikirim melalui API/kode.',
        ],

        'actions' => [
            'send' => 'Kirim Email',
            'preview' => 'Pratinjau',
        ],

        'confirm' => [
            'heading' => 'Konfirmasi Pengiriman',
            'description' => 'Apakah Anda yakin ingin mengirim email ini?',
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
            'content' => 'Konten',
            'attachments' => 'Lampiran',
        ],

        'fields' => [
            'from' => 'Dari',
            'to' => 'Kepada',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Templat',
            'subject' => 'Subjek',
            'to_placeholder' => 'Masukkan alamat email',
            'cc_placeholder' => 'Masukkan alamat CC',
            'bcc_placeholder' => 'Masukkan alamat BCC',
            'auto_attached' => 'File terlampir otomatis',
            'auto_attached_none' => 'Tidak ada',
            'additional_attachments' => 'Lampiran Tambahan',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Kirim Email',
        'modal_heading' => 'Tulis Email',
        'submit' => 'Kirim',

        'notifications' => [
            'sent' => 'Email berhasil terkirim',
            'sent_body' => 'Terkirim ke: :recipients',
            'failed' => 'Gagal mengirim email',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Detail Tema',
            'background' => 'Latar Belakang & Tata Letak',
            'background_description' => 'Warna struktural utama untuk tata letak email.',
            'typography' => 'Tipografi',
            'typography_description' => 'Warna untuk teks dan judul.',
            'buttons' => 'Tombol',
            'buttons_description' => 'Gaya tombol ajakan bertindak.',
            'footer' => 'Footer',
            'footer_description' => 'Gaya area footer.',
            'preview' => 'Pratinjau',
        ],

        'fields' => [
            'name' => 'Nama',
            'is_default' => 'Tema Bawaan',
            'is_default_helper' => 'Tema bawaan diterapkan pada templat yang tidak menentukan tema.',
            'page_background' => 'Latar Belakang Halaman',
            'content_background' => 'Latar Belakang Konten',
            'border' => 'Batas',
            'headings' => 'Judul',
            'body_text' => 'Teks Isi',
            'secondary_text' => 'Teks Sekunder',
            'links' => 'Tautan',
            'button_background' => 'Latar Belakang Tombol',
            'button_text' => 'Teks Tombol',
            'primary_accent' => 'Primer/Aksen',
            'footer_background' => 'Latar Belakang Footer',
            'footer_text' => 'Teks Footer',
        ],

        'columns' => [
            'primary' => 'Primer',
            'background' => 'Latar Belakang',
            'text' => 'Teks',
            'button' => 'Tombol',
            'default' => 'Bawaan',
            'templates' => 'Templat',
            'updated_at' => 'Diperbarui',
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
            'template_placeholder' => 'Kustom',
            'sent_by' => 'Dikirim Oleh',
            'subject' => 'Subjek',
            'status' => 'Status',
            'sent_by_placeholder' => 'Sistem',
            'related_to' => 'Terkait Dengan',
            'sent_at' => 'Terkirim',
        ],

        'filters' => [
            'from' => 'Dari',
            'until' => 'Sampai',
        ],

        'actions' => [
            'view' => 'Lihat',
            'resend' => 'Kirim Ulang',
            'resend_description' => 'Ini akan mengirim salinan baru email ke penerima asal.',
        ],

        'notifications' => [
            'resent' => 'Email berhasil dikirim ulang',
            'resend_failed' => 'Gagal mengirim ulang email',
        ],

        'errors' => [
            'no_rendered_body' => 'Tidak dapat mengirim ulang: tidak ada isi yang dirender tersimpan. Aktifkan logging.store_rendered_body di pengaturan.',
            'no_template' => 'Templat asli sudah tidak ada.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Email Terkirim',

        'columns' => [
            'to' => 'Kepada',
            'template' => 'Templat',
            'subject' => 'Subjek',
            'status' => 'Status',
            'sent_by' => 'Dikirim Oleh',
            'sent_by_placeholder' => 'Sistem',
            'sent_at' => 'Terkirim',
        ],

        'actions' => [
            'view' => 'Lihat',
            'resend' => 'Kirim Ulang',
            'resend_confirm' => 'Apakah Anda yakin ingin mengirim ulang email ini?',
        ],

        'notifications' => [
            'resent' => 'Email berhasil dikirim ulang',
            'resend_failed' => 'Gagal mengirim ulang',
        ],

        'empty' => [
            'heading' => 'Belum ada email terkirim',
            'description' => 'Email yang dikirim untuk rekaman ini akan muncul di sini.',
        ],

        'errors' => [
            'no_body' => 'Tidak dapat mengirim ulang: tidak ada isi yang dirender atau templat tersimpan.',
            'no_template' => 'Templat asli sudah tidak ada.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Pengaturan Email',

        'tabs' => [
            'general' => 'Umum',
            'branding' => 'Branding',
            'logging' => 'Pencatatan',
            'attachments' => 'Lampiran',
            'auth_emails' => 'Email Autentikasi',
        ],

        'titles' => [
            'general' => 'Pengaturan Templat Email - Umum',
            'branding' => 'Pengaturan Templat Email - Branding',
            'logging' => 'Pengaturan Templat Email - Pencatatan',
            'attachments' => 'Pengaturan Templat Email - Lampiran',
            'auth_emails' => 'Pengaturan Templat Email - Email Autentikasi',
        ],

        'sections' => [
            'default_sender' => 'Pengirim Bawaan',
            'default_sender_description' => 'Alamat "Dari" bawaan untuk semua email yang dikirim oleh plugin.',
            'additional_senders' => 'Pengirim Tambahan',
            'additional_senders_description' => 'Alamat "Dari" tambahan yang dapat dipilih pengguna saat menulis email.',
            'localization' => 'Lokalisasi',
            'categories' => 'Kategori Templat',
            'logo' => 'Logo',
            'colors' => 'Warna',
            'footer_links' => 'Tautan Footer',
            'customer_service' => 'Layanan Pelanggan',
            'logging' => 'Pencatatan Email',
            'logging_description' => 'Kontrol bagaimana email terkirim dicatat dalam database.',
            'cleanup' => 'Pembersihan Terjadwal',
            'cleanup_description' => 'Hapus otomatis rekaman email terkirim yang lama secara terjadwal.',
            'attachment_rules' => 'Aturan Lampiran',
            'attachment_rules_description' => 'Konfigurasi batas untuk lampiran file dalam email yang ditulis.',
            'auth_emails' => 'Penggantian Email Autentikasi',
            'auth_emails_description' => 'Ganti email autentikasi bawaan aplikasi dengan templat kustom Anda.',
        ],

        'fields' => [
            'from_email' => 'Email Pengirim',
            'from_name' => 'Nama Pengirim',
            'sender_email' => 'Email',
            'sender_name' => 'Nama Tampilan',
            'sender_new' => 'Pengirim Baru',
            'default_locale' => 'Bahasa Bawaan',
            'default_locale_helper' => 'Bahasa bawaan untuk templat baru (misal en, hu, de).',
            'languages' => 'Bahasa Tersedia',
            'language_code' => 'Kode',
            'language_display' => 'Nama Tampilan',
            'language_flag' => 'Ikon Bendera',
            'language_new' => 'Bahasa Baru',
            'category_key' => 'Kunci',
            'category_label' => 'Label',
            'category_new' => 'Kategori Baru',
            'logo_url' => 'URL atau Path Logo',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL absolut atau path ke logo email Anda.',
            'logo_width' => 'Lebar (px)',
            'logo_height' => 'Tinggi (px)',
            'content_width' => 'Lebar Konten (px)',
            'primary_color' => 'Warna Primer',
            'footer_link_label' => 'Label',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Tautan Baru',
            'support_email' => 'Email Dukungan',
            'support_phone' => 'Telepon Dukungan',
            'enable_logging' => 'Aktifkan Pencatatan',
            'enable_logging_helper' => 'Jika dinonaktifkan, tidak ada rekaman email terkirim yang akan dibuat.',
            'store_rendered_body' => 'Simpan Isi yang Dirender',
            'store_rendered_body_helper' => 'Simpan HTML akhir dari setiap email terkirim. Diperlukan untuk fitur kirim ulang dan pratinjau.',
            'retention_days' => 'Retensi (hari)',
            'retention_days_helper' => 'Hapus otomatis rekaman email terkirim setelah jumlah hari ini. Kosongkan untuk menyimpan selamanya.',
            'cleanup_enabled' => 'Aktifkan Pembersihan Terjadwal',
            'cleanup_enabled_helper' => 'Jalankan perintah pembersihan secara otomatis sesuai jadwal.',
            'cleanup_frequency' => 'Frekuensi Pembersihan',
            'max_file_size' => 'Ukuran File Maks (MB)',
            'allowed_extensions' => 'Ekstensi File yang Diizinkan',
            'allowed_extensions_placeholder' => 'Tambahkan ekstensi (misal pdf)',
            'allowed_extensions_helper' => 'Ekstensi file yang diizinkan untuk diunggah.',
            'override_verification' => 'Ganti Email Verifikasi',
            'override_verification_helper' => 'Gunakan templat "user-verify-email" sebagai pengganti email verifikasi bawaan aplikasi.',
            'override_password_reset' => 'Ganti Reset Kata Sandi',
            'override_password_reset_helper' => 'Gunakan templat "user-password-reset" sebagai pengganti email reset kata sandi bawaan aplikasi.',
            'override_welcome' => 'Ganti Email Selamat Datang',
            'override_welcome_helper' => 'Kirim email selamat datang menggunakan templat "user-welcome" ketika pengguna baru mendaftar.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Hak cipta dilindungi.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Draf',
            2 => 'Dalam Antrean',
            3 => 'Terkirim',
            4 => 'Gagal',
        ],

        'cleanup_frequency' => [
            1 => 'Harian',
            2 => 'Mingguan',
            3 => 'Bulanan',
        ],
    ],

];
