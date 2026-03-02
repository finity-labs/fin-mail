<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'Sähköposti',
        'templates' => 'Mallipohjat',
        'themes' => 'Teemat',
        'sent-emails' => 'Lähetetyt sähköpostit',
        'settings' => 'Asetukset',
    ],

    'models' => [
        'email_template' => 'Sähköpostimallipohja',
        'email_templates' => 'Sähköpostimallipohjat',
        'email_theme' => 'Sähköpostiteema',
        'email_themes' => 'Sähköpostiteemat',
        'sent_email' => 'Lähetetty sähköposti',
        'sent_emails' => 'Lähetetyt sähköpostit',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Sisältö',
            'settings' => 'Asetukset',
            'tokens' => 'Tokenit',
        ],

        'fields' => [
            'name' => 'Nimi',
            'key' => 'Avain',
            'key_helper' => 'Koodissa käytetty yksilöllinen avain: esim. "invoice-sent"',
            'category' => 'Kategoria',
            'subject' => 'Aihe',
            'subject_helper' => 'Tukee tokeneita: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Esikatseluteksti',
            'preheader_helper' => 'Sähköpostiohjelmissa näytettävä esikatseluteksti',
            'body' => 'Sisältö',
            'theme' => 'Teema',
            'theme_placeholder' => 'Oletusteema',
            'is_active' => 'Aktiivinen',
            'is_active_helper' => 'Ei-aktiivisia mallipohjia ei voi käyttää lähettämiseen',
            'tags' => 'Tunnisteet',
            'tags_placeholder' => 'Lisää tunnisteita organisointiin',
            'from_address' => 'Lähettäjän sähköposti',
            'from_name' => 'Lähettäjän nimi',
            'locale' => 'Kieli',
        ],

        'sections' => [
            'custom_sender' => 'Mukautettu lähettäjä',
            'custom_sender_description' => 'Ohita oletuslähettäjäosoite tälle mallipohjalle',
        ],

        'tokens' => [
            'label' => 'Käytettävissä olevat tokenit',
            'helper' => 'Dokumentoi tämän mallipohjan käytettävissä olevat tokenit. Tämä auttaa muokkaajia tietämään, mitä muuttujia he voivat käyttää.',
            'token' => 'Token',
            'description' => 'Kuvaus',
            'example' => 'Esimerkki',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Vastaanottajan koko nimi',
            'example_placeholder' => 'Matti Meikäläinen',
            'new_item' => 'Uusi token',
        ],

        'columns' => [
            'locales' => 'Kielet',
            'active' => 'Aktiivinen',
            'locked' => 'Lukittu',
            'sent' => 'Lähetetty',
            'updated_at' => 'Päivitetty',
        ],

        'actions' => [
            'preview' => 'Esikatselu',
            'send_test' => 'Lähetä testi',
            'send_test_field' => 'Lähetä osoitteeseen',
            'send_test_locale' => 'Kieli',
            'compose' => 'Kirjoita sähköposti',
            'version_history' => 'Versiohistoria',
            'back_to_templates' => 'Takaisin mallipohjiin',
        ],

        'notifications' => [
            'test_sent' => 'Testisähköposti lähetetty!',
            'test_sent_body' => 'Lähetetty osoitteeseen :email',
            'test_failed' => 'Testisähköpostin lähetys epäonnistui',
            'saved' => 'Mallipohja tallennettu',
            'saved_body' => 'Versiovedos tallennettiin automaattisesti.',
            'locked_skipped' => 'Lukitut mallipohjat ohitettiin',
            'locked_skipped_body' => ':count lukittu(a) mallipohjaa ohitettiin eikä poistettu.',
        ],

        'tooltips' => [
            'locked' => 'Tämä mallipohja on lukittu — avain ja kategoria ovat vain luku -tilassa, poistaminen on estetty.',
        ],

        'notices' => [
            'locked' => 'Tämä mallipohja on lukittu. Avain- ja kategoriakenttiä ei voi muuttaa.',
        ],

        'language_label' => 'Kieli: :locale',

        'replicate_suffix' => '(Kopio)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Kirjoita sähköposti',
        'title_with_name' => 'Kirjoita: :name',

        'sections' => [
            'recipients' => 'Vastaanottajat',
            'content' => 'Sähköpostin sisältö',
            'attachments' => 'Liitteet',
            'tokens' => 'Käytettävissä olevat tokenit',
        ],

        'fields' => [
            'from' => 'Lähettäjä',
            'to' => 'Vastaanottaja',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Syötä sähköpostiosoitteet',
            'cc_placeholder' => 'CC-osoitteet',
            'bcc_placeholder' => 'BCC-osoitteet',
            'locale' => 'Kieli',
            'subject' => 'Aihe',
            'preheader' => 'Esikatseluteksti',
            'body' => 'Sisältö',
            'attach_files' => 'Liitä tiedostoja',
            'preheader_helper' => 'Sähköpostiohjelmissa ennen avaamista näytettävä esikatseluteksti',
            'no_tokens' => 'Tälle mallipohjalle ei ole dokumentoitu tokeneita. Tokenit kuten {{ user.name }} korvataan lähetettäessä API:n/koodin kautta.',
        ],

        'actions' => [
            'send' => 'Lähetä sähköposti',
            'preview' => 'Esikatselu',
        ],

        'confirm' => [
            'heading' => 'Vahvista lähetys',
            'description' => 'Haluatko varmasti lähettää tämän sähköpostin?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Vastaanottajat',
            'content' => 'Sisältö',
            'attachments' => 'Liitteet',
        ],

        'fields' => [
            'from' => 'Lähettäjä',
            'to' => 'Vastaanottaja',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Mallipohja',
            'subject' => 'Aihe',
            'to_placeholder' => 'Syötä sähköpostiosoitteet',
            'cc_placeholder' => 'Syötä CC-osoitteet',
            'bcc_placeholder' => 'Syötä BCC-osoitteet',
            'auto_attached' => 'Automaattisesti liitetyt tiedostot',
            'auto_attached_none' => 'Ei mitään',
            'additional_attachments' => 'Lisäliitteet',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Lähetä sähköposti',
        'modal_heading' => 'Kirjoita sähköposti',
        'submit' => 'Lähetä',

        'notifications' => [
            'sent' => 'Sähköposti lähetetty onnistuneesti',
            'sent_body' => 'Lähetetty: :recipients',
            'failed' => 'Sähköpostin lähetys epäonnistui',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Teeman tiedot',
            'background' => 'Tausta ja asettelu',
            'background_description' => 'Sähköpostiasettelun päärakennevärit.',
            'typography' => 'Typografia',
            'typography_description' => 'Tekstin ja otsikoiden värit.',
            'buttons' => 'Painikkeet',
            'buttons_description' => 'Toimintopainikkeiden tyyli.',
            'footer' => 'Alatunniste',
            'footer_description' => 'Alatunnisteen alueen tyyli.',
            'preview' => 'Esikatselu',
        ],

        'fields' => [
            'name' => 'Nimi',
            'is_default' => 'Oletusteema',
            'is_default_helper' => 'Oletusteemaa käytetään mallipohjissa, joihin ei ole määritetty teemaa.',
            'page_background' => 'Sivun tausta',
            'content_background' => 'Sisällön tausta',
            'border' => 'Reunus',
            'headings' => 'Otsikot',
            'body_text' => 'Leipäteksti',
            'secondary_text' => 'Toissijainen teksti',
            'links' => 'Linkit',
            'button_background' => 'Painikkeen tausta',
            'button_text' => 'Painikkeen teksti',
            'primary_accent' => 'Ensisijainen/Korostus',
            'footer_background' => 'Alatunnisteen tausta',
            'footer_text' => 'Alatunnisteen teksti',
        ],

        'columns' => [
            'primary' => 'Ensisijainen',
            'background' => 'Tausta',
            'text' => 'Teksti',
            'button' => 'Painike',
            'default' => 'Oletus',
            'templates' => 'Mallipohjat',
            'updated_at' => 'Päivitetty',
        ],

        'replicate_suffix' => '(Kopio)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Vastaanottaja',
            'template' => 'Mallipohja',
            'template_placeholder' => 'Mukautettu',
            'sent_by' => 'Lähettäjä',
            'subject' => 'Aihe',
            'status' => 'Tila',
            'sent_by_placeholder' => 'Järjestelmä',
            'related_to' => 'Liittyy',
            'sent_at' => 'Lähetetty',
        ],

        'filters' => [
            'from' => 'Alkaen',
            'until' => 'Asti',
        ],

        'actions' => [
            'view' => 'Näytä',
            'resend' => 'Lähetä uudelleen',
            'resend_description' => 'Tämä lähettää uuden kopion sähköpostista alkuperäisille vastaanottajille.',
        ],

        'notifications' => [
            'resent' => 'Sähköposti lähetetty uudelleen onnistuneesti',
            'resend_failed' => 'Sähköpostin uudelleenlähetys epäonnistui',
        ],

        'errors' => [
            'no_rendered_body' => 'Uudelleenlähetys ei onnistu: renderöityä sisältöä ei ole tallennettu. Ota käyttöön logging.store_rendered_body asetuksissa.',
            'no_template' => 'Alkuperäistä mallipohjaa ei ole enää olemassa.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Lähetetyt sähköpostit',

        'columns' => [
            'to' => 'Vastaanottaja',
            'template' => 'Mallipohja',
            'subject' => 'Aihe',
            'status' => 'Tila',
            'sent_by' => 'Lähettäjä',
            'sent_by_placeholder' => 'Järjestelmä',
            'sent_at' => 'Lähetetty',
        ],

        'actions' => [
            'view' => 'Näytä',
            'resend' => 'Lähetä uudelleen',
            'resend_confirm' => 'Haluatko varmasti lähettää tämän sähköpostin uudelleen?',
        ],

        'notifications' => [
            'resent' => 'Sähköposti lähetetty uudelleen onnistuneesti',
            'resend_failed' => 'Uudelleenlähetys epäonnistui',
        ],

        'empty' => [
            'heading' => 'Ei lähetettyjä sähköposteja',
            'description' => 'Tälle tietueelle lähetetyt sähköpostit näkyvät tässä.',
        ],

        'errors' => [
            'no_body' => 'Uudelleenlähetys ei onnistu: renderöityä sisältöä tai mallipohjaa ei ole tallennettu.',
            'no_template' => 'Alkuperäistä mallipohjaa ei ole enää olemassa.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Sähköpostiasetukset',

        'tabs' => [
            'general' => 'Yleiset',
            'branding' => 'Brändi',
            'logging' => 'Lokitus',
            'attachments' => 'Liitteet',
            'auth_emails' => 'Todennussähköpostit',
        ],

        'titles' => [
            'general' => 'Sähköpostimallipohja-asetukset - Yleiset',
            'branding' => 'Sähköpostimallipohja-asetukset - Brändi',
            'logging' => 'Sähköpostimallipohja-asetukset - Lokitus',
            'attachments' => 'Sähköpostimallipohja-asetukset - Liitteet',
            'auth_emails' => 'Sähköpostimallipohja-asetukset - Todennussähköpostit',
        ],

        'sections' => [
            'default_sender' => 'Oletuslähettäjä',
            'default_sender_description' => 'Oletuslähettäjäosoite kaikille lisäosan lähettämille sähköposteille.',
            'additional_senders' => 'Lisälähettäjät',
            'additional_senders_description' => 'Lisälähettäjäosoitteet, jotka käyttäjät voivat valita sähköpostia kirjoittaessaan.',
            'localization' => 'Lokalisointi',
            'categories' => 'Mallipohjien kategoriat',
            'logo' => 'Logo',
            'colors' => 'Värit',
            'footer_links' => 'Alatunnisteen linkit',
            'customer_service' => 'Asiakaspalvelu',
            'logging' => 'Sähköpostilokitus',
            'logging_description' => 'Hallitse, miten lähetetyt sähköpostit tallennetaan tietokantaan.',
            'cleanup' => 'Ajastettu siivous',
            'cleanup_description' => 'Poista vanhat lähetettyjen sähköpostien tietueet automaattisesti aikataulun mukaan.',
            'attachment_rules' => 'Liitesäännöt',
            'attachment_rules_description' => 'Määritä tiedostoliitteiden rajoitukset kirjoitetuissa sähköposteissa.',
            'auth_emails' => 'Todennussähköpostien ohitukset',
            'auth_emails_description' => 'Korvaa sovelluksen oletustodennussähköpostit omilla mallipohjillasi.',
        ],

        'fields' => [
            'from_email' => 'Lähettäjän sähköposti',
            'from_name' => 'Lähettäjän nimi',
            'sender_email' => 'Sähköposti',
            'sender_name' => 'Näyttönimi',
            'sender_new' => 'Uusi lähettäjä',
            'default_locale' => 'Oletuskieli',
            'default_locale_helper' => 'Uusien mallipohjien oletuskieli (esim. en, hu, de).',
            'languages' => 'Käytettävissä olevat kielet',
            'language_code' => 'Koodi',
            'language_display' => 'Näyttönimi',
            'language_flag' => 'Lippukuvake',
            'language_new' => 'Uusi kieli',
            'category_key' => 'Avain',
            'category_label' => 'Nimike',
            'category_new' => 'Uusi kategoria',
            'logo_url' => 'Logon URL tai polku',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Absoluuttinen URL tai polku sähköpostilogoosi.',
            'logo_width' => 'Leveys (px)',
            'logo_height' => 'Korkeus (px)',
            'content_width' => 'Sisällön leveys (px)',
            'primary_color' => 'Ensisijainen väri',
            'footer_link_label' => 'Nimike',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Uusi linkki',
            'support_email' => 'Tukisähköposti',
            'support_phone' => 'Tukipuhelin',
            'enable_logging' => 'Ota lokitus käyttöön',
            'enable_logging_helper' => 'Kun pois käytöstä, lähetetyistä sähköposteista ei luoda tietueita.',
            'store_rendered_body' => 'Tallenna renderöity sisältö',
            'store_rendered_body_helper' => 'Tallenna jokaisen lähetetyn sähköpostin lopullinen HTML. Vaaditaan uudelleenlähetys- ja esikatselutoimintoihin.',
            'retention_days' => 'Säilytysaika (päivää)',
            'retention_days_helper' => 'Poista lähetettyjen sähköpostien tietueet automaattisesti tämän päivämäärän jälkeen. Jätä tyhjäksi säilyttääksesi ikuisesti.',
            'cleanup_enabled' => 'Ota ajastettu siivous käyttöön',
            'cleanup_enabled_helper' => 'Suorita siivouskomento automaattisesti aikataulun mukaan.',
            'cleanup_frequency' => 'Siivouksen tiheys',
            'max_file_size' => 'Suurin tiedostokoko (MB)',
            'allowed_extensions' => 'Sallitut tiedostopäätteet',
            'allowed_extensions_placeholder' => 'Lisää tiedostopääte (esim. pdf)',
            'allowed_extensions_helper' => 'Sallitut tiedostopäätteet lataamiseen.',
            'override_verification' => 'Ohita sähköpostivahvistus',
            'override_verification_helper' => 'Käytä "user-verify-email"-mallipohjaa sovelluksen oletusvahvistussähköpostin sijaan.',
            'override_password_reset' => 'Ohita salasanan palautus',
            'override_password_reset_helper' => 'Käytä "user-password-reset"-mallipohjaa sovelluksen oletussalasanan palautussähköpostin sijaan.',
            'override_welcome' => 'Ohita tervetulosähköposti',
            'override_welcome_helper' => 'Lähetä tervetulosähköposti "user-welcome"-mallipohjalla uuden käyttäjän rekisteröityessä.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Kaikki oikeudet pidätetään.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Luonnos',
            2 => 'Jonossa',
            3 => 'Lähetetty',
            4 => 'Epäonnistunut',
        ],

        'cleanup_frequency' => [
            1 => 'Päivittäin',
            2 => 'Viikoittain',
            3 => 'Kuukausittain',
        ],
    ],

];
