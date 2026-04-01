<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'E-posta',
        'templates' => 'Sablonlar',
        'themes' => 'Temalar',
        'sent-emails' => 'Gonderilen e-postalar',
        'settings' => 'Ayarlar',
    ],

    'models' => [
        'email_template' => 'E-posta sablonu',
        'email_templates' => 'E-posta sablonlari',
        'email_theme' => 'E-posta temasi',
        'email_themes' => 'E-posta temalari',
        'sent_email' => 'Gonderilen e-posta',
        'sent_emails' => 'Gonderilen e-postalar',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Icerik',
            'settings' => 'Ayarlar',
            'tokens' => 'Degiskenler',
        ],

        'fields' => [
            'name' => 'Ad',
            'key' => 'Anahtar',
            'key_helper' => 'Kodda kullanilan benzersiz anahtar, ornegin: "invoice-sent"',
            'category' => 'Kategori',
            'subject' => 'Konu',
            'subject_helper' => 'Degiskenleri destekler: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'On izleme metni',
            'preheader_helper' => 'E-posta istemcilerinde gosterilen on izleme metni',
            'body' => 'Govde',
            'theme' => 'Tema',
            'theme_placeholder' => 'Varsayilan tema',
            'is_active' => 'Aktif',
            'is_active_helper' => 'Aktif olmayan sablonlar gonderim icin kullanilamaz',
            'tags' => 'Etiketler',
            'tags_placeholder' => 'Duzenleme icin etiket ekleyin',
            'from_address' => 'Gonderen e-posta',
            'from_name' => 'Gonderen adi',
            'locale' => 'Dil',
        ],

        'sections' => [
            'custom_sender' => 'Ozel gonderen',
            'custom_sender_description' => 'Bu sablon icin varsayilan gonderen adresini gecersiz kil',
        ],

        'tokens' => [
            'label' => 'Kullanilabilir degiskenler',
            'helper' => 'Bu sablon icin kullanilabilir degiskenleri belgeleyin. Bu, editorlerin hangi degiskenleri kullanabileceklerini bilmelerine yardimci olur.',
            'token' => 'Degisken',
            'description' => 'Aciklama',
            'example' => 'Ornek',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Alicinin tam adi',
            'example_placeholder' => 'John Doe',
            'new_item' => 'Yeni degisken',
        ],

        'blocks' => [
            'button' => 'Düğme',
            'button_heading' => 'Düğme ekle',
            'button_label' => 'Düğme metni',
            'button_url' => 'URL',
            'button_align' => 'Hizalama',
            'align_left' => 'Sol',
            'align_center' => 'Orta',
            'align_right' => 'Sağ',
            'button_default_label' => 'Buraya tıklayın',
        ],

        'columns' => [
            'locales' => 'Diller',
            'active' => 'Aktif',
            'locked' => 'Kilitli',
            'sent' => 'Gonderilen',
            'updated_at' => 'Guncellendi',
        ],

        'actions' => [
            'preview' => 'On izleme',
            'send_test' => 'Test gonder',
            'send_test_field' => 'Gonder',
            'send_test_locale' => 'Dil',
            'compose' => 'E-posta yaz',
            'version_history' => 'Surum gecmisi',
            'back_to_templates' => 'Sablonlara don',
        ],

        'notifications' => [
            'test_sent' => 'Test e-postasi gonderildi!',
            'test_sent_body' => ':email adresine gonderildi',
            'test_failed' => 'Test e-postasi gonderilemedi',
            'saved' => 'Sablon kaydedildi',
            'saved_body' => 'Surum anligi otomatik olarak kaydedildi.',
            'locked_skipped' => 'Kilitli sablonlar atlandi',
            'locked_skipped_body' => ':count kilitli sablon atlandi ve silinmedi.',
        ],

        'tooltips' => [
            'locked' => 'Bu sablon kilitli -- anahtar ve kategori salt okunurdur, silme engellenmistir.',
        ],

        'versioning' => [
            'date' => 'Tarih',
            'by' => 'Tarafından',
            'preview' => 'Önizleme',
            'restore' => 'Geri yükle',
            'restore_confirm' => ':version sürümünü geri yüklemek istediğinizden emin misiniz? Mevcut içerik önce yeni bir sürüm olarak kaydedilecektir.',
            'restored' => ':version sürümü geri yüklendi.',
            'empty' => 'Sürüm geçmişi bulunmuyor.',
        ],

        'notices' => [
            'locked' => 'Bu sablon kilitli. Anahtar ve kategori alanlari degistirilemez.',
        ],

        'language_label' => 'Dil: :locale',

        'replicate_suffix' => '(Kopya)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'E-posta yaz',
        'title_with_name' => 'Yaz: :name',

        'sections' => [
            'recipients' => 'Alicilar',
            'content' => 'E-posta icerigi',
            'attachments' => 'Ekler',
            'tokens' => 'Kullanilabilir degiskenler',
        ],

        'fields' => [
            'from' => 'Kimden',
            'to' => 'Kime',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'E-posta adreslerini girin',
            'cc_placeholder' => 'CC adresleri',
            'bcc_placeholder' => 'BCC adresleri',
            'locale' => 'Dil',
            'subject' => 'Konu',
            'preheader' => 'On izleme metni',
            'body' => 'Govde',
            'attach_files' => 'Dosya ekle',
            'preheader_helper' => 'E-posta istemcilerinde acmadan once gosterilen on izleme metni',
            'no_tokens' => 'Bu sablon icin belgelenmis degisken yok. {{ user.name }} gibi degiskenler API/kod ile gonderildiginde degistirilecektir.',
        ],

        'actions' => [
            'send' => 'E-posta gonder',
            'preview' => 'On izleme',
        ],

        'confirm' => [
            'heading' => 'Gonderimi onayla',
            'description' => 'Bu e-postayi gondermek istediginizden emin misiniz?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Alicilar',
            'content' => 'Icerik',
            'attachments' => 'Ekler',
        ],

        'fields' => [
            'from' => 'Kimden',
            'to' => 'Kime',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Sablon',
            'subject' => 'Konu',
            'to_placeholder' => 'E-posta adreslerini girin',
            'cc_placeholder' => 'CC adreslerini girin',
            'bcc_placeholder' => 'BCC adreslerini girin',
            'auto_attached' => 'Otomatik eklenen dosyalar',
            'auto_attached_none' => 'Yok',
            'additional_attachments' => 'Ek dosyalar',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'E-posta gonder',
        'modal_heading' => 'E-posta yaz',
        'submit' => 'Gonder',

        'notifications' => [
            'sent' => 'E-posta basariyla gonderildi',
            'sent_body' => 'Gonderildi: :recipients',
            'failed' => 'E-posta gonderilemedi',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Tema detaylari',
            'background' => 'Arka plan ve duzenleme',
            'background_description' => 'E-posta duzeni icin ana yapisal renkler.',
            'typography' => 'Tipografi',
            'typography_description' => 'Metin ve basliklar icin renkler.',
            'buttons' => 'Butonlar',
            'buttons_description' => 'Eylem cagrisi butonu bicimi.',
            'footer' => 'Alt bilgi',
            'footer_description' => 'Alt bilgi alani bicimi.',
            'preview' => 'On izleme',
        ],

        'fields' => [
            'name' => 'Ad',
            'is_default' => 'Varsayilan tema',
            'is_default_helper' => 'Varsayilan tema, tema belirtmeyen sablonlara uygulanir.',
            'page_background' => 'Sayfa arka plani',
            'content_background' => 'Icerik arka plani',
            'border' => 'Kenarluk',
            'headings' => 'Basliklar',
            'body_text' => 'Govde metni',
            'secondary_text' => 'Ikincil metin',
            'links' => 'Baglantilar',
            'button_background' => 'Buton arka plani',
            'button_text' => 'Buton metni',
            'primary_accent' => 'Birincil/Vurgu',
            'footer_background' => 'Alt bilgi arka plani',
            'footer_text' => 'Alt bilgi metni',
        ],

        'columns' => [
            'primary' => 'Birincil',
            'background' => 'Arka plan',
            'text' => 'Metin',
            'button' => 'Buton',
            'default' => 'Varsayilan',
            'templates' => 'Sablonlar',
            'updated_at' => 'Guncellendi',
        ],

        'replicate_suffix' => '(Kopya)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Kime',
            'template' => 'Sablon',
            'template_placeholder' => 'Ozel',
            'sent_by' => 'Gonderen',
            'subject' => 'Konu',
            'status' => 'Durum',
            'sent_by_placeholder' => 'Sistem',
            'related_to' => 'Iliskili',
            'sent_at' => 'Gonderildi',
        ],

        'filters' => [
            'from' => 'Baslangic',
            'until' => 'Bitis',
        ],

        'actions' => [
            'view' => 'Goruntule',
            'resend' => 'Tekrar gonder',
            'resend_description' => 'Bu islem, e-postanin yeni bir kopyasini orijinal alicilara gonderecektir.',
        ],


        'preview' => [
            'from' => 'Kimden:',
            'to' => 'Kime:',
            'cc' => 'CC:',
            'template' => 'Şablon:',
            'sent' => 'Gönderildi:',
            'sent_not_yet' => 'Henüz değil',
            'status' => 'Durum:',
            'no_body' => 'E-posta içeriği kaydedilmedi. E-posta içeriğini kaydetmek için ayarlarda <code>logging.store_rendered_body</code> seçeneğini etkinleştirin.',
            'error' => 'Hata Detayları'
        ],
        'notifications' => [
            'resent' => 'E-posta basariyla tekrar gonderildi',
            'resend_failed' => 'E-posta tekrar gonderilemedi',
        ],

        'errors' => [
            'no_rendered_body' => 'Tekrar gonderilemez: islenmis govde saklanmamis. Ayarlarda logging.store_rendered_body secenegini etkinlestirin.',
            'no_template' => 'Orijinal sablon artik mevcut degil.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Gonderilen e-postalar',

        'columns' => [
            'to' => 'Kime',
            'template' => 'Sablon',
            'subject' => 'Konu',
            'status' => 'Durum',
            'sent_by' => 'Gonderen',
            'sent_by_placeholder' => 'Sistem',
            'sent_at' => 'Gonderildi',
        ],

        'actions' => [
            'view' => 'Goruntule',
            'resend' => 'Tekrar gonder',
            'resend_confirm' => 'Bu e-postayi tekrar gondermek istediginizden emin misiniz?',
        ],

        'notifications' => [
            'resent' => 'E-posta basariyla tekrar gonderildi',
            'resend_failed' => 'Tekrar gonderilemedi',
        ],

        'empty' => [
            'heading' => 'Gonderilen e-posta yok',
            'description' => 'Bu kayit icin gonderilen e-postalar burada gorunecektir.',
        ],

        'errors' => [
            'no_body' => 'Tekrar gonderilemez: islenmis govde veya sablon saklanmamis.',
            'no_template' => 'Orijinal sablon artik mevcut degil.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'E-posta ayarlari',

        'tabs' => [
            'general' => 'Genel',
            'branding' => 'Marka',
            'logging' => 'Gunluk kaydi',
            'attachments' => 'Ekler',
            'auth_emails' => 'Kimlik dogrulama e-postalari',
        ],

        'titles' => [
            'general' => 'E-posta sablon ayarlari - Genel',
            'branding' => 'E-posta sablon ayarlari - Marka',
            'logging' => 'E-posta sablon ayarlari - Gunluk kaydi',
            'attachments' => 'E-posta sablon ayarlari - Ekler',
            'auth_emails' => 'E-posta sablon ayarlari - Kimlik dogrulama e-postalari',
        ],

        'sections' => [
            'default_sender' => 'Varsayilan gonderen',
            'default_sender_description' => 'Eklenti tarafindan gonderilen tum e-postalar icin varsayilan "Kimden" adresi.',
            'additional_senders' => 'Ek gonderenler',
            'add_additional_senders' => 'Ek Gönderenler Ekle',
            'additional_senders_description' => 'Kullanicilarin e-posta yazarken secebilecegi ek "Kimden" adresleri.',
            'localization' => 'Yerellestime',
            'categories' => 'Sablon kategorileri',
            'logo' => 'Logo',
            'colors' => 'Renkler',
            'footer_links' => 'Alt bilgi baglantilari',
            'add_footer_links' => 'Alt Bilgi Bağlantıları Ekle',
            'customer_service' => 'Musteri hizmetleri',
            'logging' => 'E-posta gunlugu',
            'logging_description' => 'Gonderilen e-postalarin veritabanina nasil kaydedilecegini kontrol edin.',
            'cleanup' => 'Zamanlanmis temizlik',
            'cleanup_description' => 'Eski gonderilen e-posta kayitlarini bir programa gore otomatik olarak silin.',
            'attachment_rules' => 'Ek kurallari',
            'attachment_rules_description' => 'Yazilan e-postalardaki dosya ekleri icin sinirlari yapilandirin.',
            'auth_emails' => 'Kimlik dogrulama e-posta gecersiz kilmalari',
            'auth_emails_description' => 'Uygulamanin varsayilan kimlik dogrulama e-postalarini ozel sablonlarinizla gecersiz kilin.',
        ],

        'fields' => [
            'from_email' => 'Gonderen e-posta',
            'from_name' => 'Gonderen adi',
            'sender_email' => 'E-posta',
            'sender_name' => 'Gorunen ad',
            'sender_new' => 'Yeni gonderen',
            'default_locale' => 'Varsayilan dil',
            'default_locale_helper' => 'Yeni sablonlar icin varsayilan dil (ornegin: en, hu, de).',
            'languages' => 'Kullanilabilir diller',
            'language_code' => 'Kod',
            'language_display' => 'Gorunen ad',
            'language_flag' => 'Bayrak ikonu',
            'language_new' => 'Yeni dil',
            'category_key' => 'Anahtar',
            'category_label' => 'Etiket',
            'category_new' => 'Yeni kategori',
            'logo_url' => 'Logo URL veya yolu',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'E-posta logonuzun mutlak URL veya yolu.',
            'logo_width' => 'Genislik (px)',
            'logo_height' => 'Yukseklik (px)',
            'content_width' => 'Icerik genisligi (px)',
            'primary_color' => 'Ana renk',
            'footer_link_label' => 'Etiket',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Yeni baglanti',
            'support_email' => 'Destek e-postasi',
            'support_phone' => 'Destek telefonu',
            'enable_logging' => 'Gunluk kaydini etkinlestir',
            'enable_logging_helper' => 'Devre disi birakildiginda, gonderilen e-posta kayitlari olusturulmaz.',
            'store_rendered_body' => 'Islenmis govdeyi sakla',
            'store_rendered_body_helper' => 'Gonderilen her e-postanin son HTML\'sini kaydedin. Tekrar gonderme ve on izleme ozellikleri icin gereklidir.',
            'retention_days' => 'Saklama suresi (gun)',
            'retention_days_helper' => 'Bu kadar gun sonra gonderilen e-posta kayitlarini otomatik olarak silin. Suresiz saklamak icin bos birakin.',
            'cleanup_enabled' => 'Zamanlanmis temizligi etkinlestir',
            'cleanup_enabled_helper' => 'Temizleme komutunu bir programa gore otomatik olarak calistirin.',
            'cleanup_frequency' => 'Temizlik sikligi',
            'max_file_size' => 'Maksimum dosya boyutu (MB)',
            'allowed_extensions' => 'Izin verilen dosya uzantilari',
            'allowed_extensions_placeholder' => 'Uzanti ekleyin (ornegin: pdf)',
            'allowed_extensions_helper' => 'Yukleme icin izin verilen dosya uzantilari.',
            'override_verification' => 'E-posta dogrulamasini gecersiz kil',
            'override_verification_helper' => 'Uygulamanin varsayilan dogrulama e-postasi yerine "user-verify-email" sablonunu kullanin.',
            'override_password_reset' => 'Sifre sifirlamayi gecersiz kil',
            'override_password_reset_helper' => 'Uygulamanin varsayilan sifre sifirlama e-postasi yerine "user-password-reset" sablonunu kullanin.',
            'override_welcome' => 'Karsilama e-postasini gecersiz kil',
            'override_welcome_helper' => 'Yeni bir kullanici kayit oldugunда "user-welcome" sablonunu kullanarak bir karsilama e-postasi gonderin.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Tum haklari saklidir.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Taslak',
            2 => 'Kuyrukta',
            3 => 'Gonderildi',
            4 => 'Basarisiz',
        ],

        'cleanup_frequency' => [
            1 => 'Gunluk',
            2 => 'Haftalik',
            3 => 'Aylik',
        ],
    ],

];
