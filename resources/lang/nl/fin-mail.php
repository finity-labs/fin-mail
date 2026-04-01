<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'E-mail',
        'templates' => 'Sjablonen',
        'themes' => 'Thema\'s',
        'sent-emails' => 'Verzonden e-mails',
        'settings' => 'Instellingen',
    ],

    'models' => [
        'email_template' => 'E-mailsjabloon',
        'email_templates' => 'E-mailsjablonen',
        'email_theme' => 'E-mailthema',
        'email_themes' => 'E-mailthema\'s',
        'sent_email' => 'Verzonden e-mail',
        'sent_emails' => 'Verzonden e-mails',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Inhoud',
            'settings' => 'Instellingen',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Naam',
            'key' => 'Sleutel',
            'key_helper' => 'Unieke sleutel gebruikt in code: bijv. "invoice-sent"',
            'category' => 'Categorie',
            'subject' => 'Onderwerp',
            'subject_helper' => 'Ondersteunt tokens: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Preheader',
            'preheader_helper' => 'Voorbeeldtekst weergegeven in e-mailclients',
            'body' => 'Inhoud',
            'theme' => 'Thema',
            'theme_placeholder' => 'Standaardthema',
            'is_active' => 'Actief',
            'is_active_helper' => 'Inactieve sjablonen kunnen niet worden gebruikt voor verzending',
            'tags' => 'Tags',
            'tags_placeholder' => 'Voeg tags toe voor organisatie',
            'from_address' => 'Van e-mail',
            'from_name' => 'Van naam',
            'locale' => 'Taal',
        ],

        'sections' => [
            'custom_sender' => 'Aangepaste afzender',
            'custom_sender_description' => 'Overschrijf het standaard afzenderadres voor dit sjabloon',
        ],

        'tokens' => [
            'label' => 'Beschikbare tokens',
            'helper' => 'Documenteer de tokens die beschikbaar zijn voor dit sjabloon. Dit helpt redacteuren te weten welke variabelen ze kunnen gebruiken.',
            'token' => 'Token',
            'description' => 'Beschrijving',
            'example' => 'Voorbeeld',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'De volledige naam van de ontvanger',
            'example_placeholder' => 'Jan de Vries',
            'new_item' => 'Nieuw token',
        ],

        'blocks' => [
            'button' => 'Knop',
            'button_heading' => 'Knop invoegen',
            'button_label' => 'Knoptekst',
            'button_url' => 'URL',
            'button_align' => 'Uitlijning',
            'align_left' => 'Links',
            'align_center' => 'Gecentreerd',
            'align_right' => 'Rechts',
            'button_default_label' => 'Klik hier',
        ],

        'columns' => [
            'locales' => 'Talen',
            'active' => 'Actief',
            'locked' => 'Vergrendeld',
            'sent' => 'Verzonden',
            'updated_at' => 'Bijgewerkt',
        ],

        'actions' => [
            'preview' => 'Voorbeeld',
            'send_test' => 'Test versturen',
            'send_test_field' => 'Versturen naar',
            'send_test_locale' => 'Taal',
            'compose' => 'E-mail opstellen',
            'version_history' => 'Versiegeschiedenis',
            'back_to_templates' => 'Terug naar sjablonen',
        ],

        'notifications' => [
            'test_sent' => 'Test-e-mail verzonden!',
            'test_sent_body' => 'Verzonden naar :email',
            'test_failed' => 'Test-e-mail kon niet worden verzonden',
            'saved' => 'Sjabloon opgeslagen',
            'saved_body' => 'Een versiemomentopname is automatisch opgeslagen.',
            'locked_skipped' => 'Vergrendelde sjablonen overgeslagen',
            'locked_skipped_body' => ':count vergrendeld(e) sjablo(o)n(en) is/zijn overgeslagen en niet verwijderd.',
        ],

        'tooltips' => [
            'locked' => 'Dit sjabloon is vergrendeld — sleutel en categorie zijn alleen-lezen, verwijderen is geblokkeerd.',
        ],

        'versioning' => [
            'date' => 'Datum',
            'by' => 'Door',
            'preview' => 'Voorbeeld',
            'restore' => 'Herstellen',
            'restore_confirm' => 'Weet u zeker dat u versie :version wilt herstellen? De huidige inhoud wordt eerst opgeslagen als nieuwe versie.',
            'restored' => 'Versie :version hersteld.',
            'empty' => 'Geen versiegeschiedenis beschikbaar.',
        ],

        'notices' => [
            'locked' => 'Dit sjabloon is vergrendeld. De sleutel- en categorievelden kunnen niet worden gewijzigd.',
        ],

        'language_label' => 'Taal: :locale',

        'replicate_suffix' => '(Kopie)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'E-mail opstellen',
        'title_with_name' => 'Opstellen: :name',

        'sections' => [
            'recipients' => 'Ontvangers',
            'content' => 'E-mailinhoud',
            'attachments' => 'Bijlagen',
            'tokens' => 'Beschikbare tokens',
        ],

        'fields' => [
            'from' => 'Van',
            'to' => 'Aan',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Voer e-mailadressen in',
            'cc_placeholder' => 'CC-adressen',
            'bcc_placeholder' => 'BCC-adressen',
            'locale' => 'Taal',
            'subject' => 'Onderwerp',
            'preheader' => 'Preheader',
            'body' => 'Inhoud',
            'attach_files' => 'Bestanden bijvoegen',
            'preheader_helper' => 'Voorbeeldtekst weergegeven in e-mailclients voor het openen',
            'no_tokens' => 'Geen tokens gedocumenteerd voor dit sjabloon. Tokens zoals {{ user.name }} worden vervangen bij verzending via de API/code.',
        ],

        'actions' => [
            'send' => 'E-mail verzenden',
            'preview' => 'Voorbeeld',
        ],

        'confirm' => [
            'heading' => 'Verzending bevestigen',
            'description' => 'Weet u zeker dat u deze e-mail wilt verzenden?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Ontvangers',
            'content' => 'Inhoud',
            'attachments' => 'Bijlagen',
        ],

        'fields' => [
            'from' => 'Van',
            'to' => 'Aan',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Sjabloon',
            'subject' => 'Onderwerp',
            'to_placeholder' => 'Voer e-mailadressen in',
            'cc_placeholder' => 'Voer CC-adressen in',
            'bcc_placeholder' => 'Voer BCC-adressen in',
            'auto_attached' => 'Automatisch bijgevoegde bestanden',
            'auto_attached_none' => 'Geen',
            'additional_attachments' => 'Extra bijlagen',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'E-mail verzenden',
        'modal_heading' => 'E-mail opstellen',
        'submit' => 'Verzenden',

        'notifications' => [
            'sent' => 'E-mail succesvol verzonden',
            'sent_body' => 'Verzonden naar: :recipients',
            'failed' => 'E-mail kon niet worden verzonden',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Themadetails',
            'background' => 'Achtergrond en indeling',
            'background_description' => 'Belangrijkste structuurkleuren voor de e-mailindeling.',
            'typography' => 'Typografie',
            'typography_description' => 'Kleuren voor tekst en koppen.',
            'buttons' => 'Knoppen',
            'buttons_description' => 'Stijl voor actieknoppen.',
            'footer' => 'Voettekst',
            'footer_description' => 'Stijl voor het voettekstgebied.',
            'preview' => 'Voorbeeld',
        ],

        'fields' => [
            'name' => 'Naam',
            'is_default' => 'Standaardthema',
            'is_default_helper' => 'Het standaardthema wordt toegepast op sjablonen die geen thema specificeren.',
            'page_background' => 'Pagina-achtergrond',
            'content_background' => 'Inhoudsachtergrond',
            'border' => 'Rand',
            'headings' => 'Koppen',
            'body_text' => 'Platte tekst',
            'secondary_text' => 'Secundaire tekst',
            'links' => 'Links',
            'button_background' => 'Knopachtergrond',
            'button_text' => 'Knoptekst',
            'primary_accent' => 'Primair/Accentkleur',
            'footer_background' => 'Voettekstachtergrond',
            'footer_text' => 'Voetteksttekst',
        ],

        'columns' => [
            'primary' => 'Primair',
            'background' => 'Achtergrond',
            'text' => 'Tekst',
            'button' => 'Knop',
            'default' => 'Standaard',
            'templates' => 'Sjablonen',
            'updated_at' => 'Bijgewerkt',
        ],

        'replicate_suffix' => '(Kopie)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Aan',
            'template' => 'Sjabloon',
            'template_placeholder' => 'Aangepast',
            'sent_by' => 'Verzonden door',
            'subject' => 'Onderwerp',
            'status' => 'Status',
            'sent_by_placeholder' => 'Systeem',
            'related_to' => 'Gerelateerd aan',
            'sent_at' => 'Verzonden',
        ],

        'filters' => [
            'from' => 'Van',
            'until' => 'Tot',
        ],

        'actions' => [
            'view' => 'Bekijken',
            'resend' => 'Opnieuw verzenden',
            'resend_description' => 'Dit stuurt een nieuwe kopie van de e-mail naar de oorspronkelijke ontvangers.',
        ],


        'preview' => [
            'from' => 'Van:',
            'to' => 'Aan:',
            'cc' => 'CC:',
            'template' => 'Sjabloon:',
            'sent' => 'Verzonden:',
            'sent_not_yet' => 'Nog niet',
            'status' => 'Status:',
            'no_body' => 'De e-mailinhoud is niet opgeslagen. Schakel <code>logging.store_rendered_body</code> in bij de instellingen om e-mailinhoud op te slaan.',
            'error' => 'Foutdetails'
        ],
        'notifications' => [
            'resent' => 'E-mail succesvol opnieuw verzonden',
            'resend_failed' => 'E-mail kon niet opnieuw worden verzonden',
        ],

        'errors' => [
            'no_rendered_body' => 'Kan niet opnieuw verzenden: geen gerenderde inhoud opgeslagen. Schakel logging.store_rendered_body in bij de instellingen.',
            'no_template' => 'Het oorspronkelijke sjabloon bestaat niet meer.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Verzonden e-mails',

        'columns' => [
            'to' => 'Aan',
            'template' => 'Sjabloon',
            'subject' => 'Onderwerp',
            'status' => 'Status',
            'sent_by' => 'Verzonden door',
            'sent_by_placeholder' => 'Systeem',
            'sent_at' => 'Verzonden',
        ],

        'actions' => [
            'view' => 'Bekijken',
            'resend' => 'Opnieuw verzenden',
            'resend_confirm' => 'Weet u zeker dat u deze e-mail opnieuw wilt verzenden?',
        ],

        'notifications' => [
            'resent' => 'E-mail succesvol opnieuw verzonden',
            'resend_failed' => 'Opnieuw verzenden mislukt',
        ],

        'empty' => [
            'heading' => 'Geen e-mails verzonden',
            'description' => 'E-mails verzonden voor dit record verschijnen hier.',
        ],

        'errors' => [
            'no_body' => 'Kan niet opnieuw verzenden: geen gerenderde inhoud of sjabloon opgeslagen.',
            'no_template' => 'Het oorspronkelijke sjabloon bestaat niet meer.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'E-mailinstellingen',

        'tabs' => [
            'general' => 'Algemeen',
            'branding' => 'Huisstijl',
            'logging' => 'Logging',
            'attachments' => 'Bijlagen',
            'auth_emails' => 'Authenticatie-e-mails',
        ],

        'titles' => [
            'general' => 'E-mailsjablooninstellingen - Algemeen',
            'branding' => 'E-mailsjablooninstellingen - Huisstijl',
            'logging' => 'E-mailsjablooninstellingen - Logging',
            'attachments' => 'E-mailsjablooninstellingen - Bijlagen',
            'auth_emails' => 'E-mailsjablooninstellingen - Authenticatie-e-mails',
        ],

        'sections' => [
            'default_sender' => 'Standaard afzender',
            'default_sender_description' => 'Het standaard "Van"-adres voor alle e-mails die door de plug-in worden verzonden.',
            'additional_senders' => 'Extra afzenders',
            'add_additional_senders' => 'Extra afzenders toevoegen',
            'additional_senders_description' => 'Extra "Van"-adressen die gebruikers kunnen kiezen bij het opstellen van e-mails.',
            'localization' => 'Lokalisatie',
            'categories' => 'Sjablooncategorieen',
            'logo' => 'Logo',
            'colors' => 'Kleuren',
            'footer_links' => 'Voettekstlinks',
            'add_footer_links' => 'Voettekst-links toevoegen',
            'customer_service' => 'Klantenservice',
            'logging' => 'E-maillogging',
            'logging_description' => 'Beheer hoe verzonden e-mails worden vastgelegd in de database.',
            'cleanup' => 'Geplande opschoning',
            'cleanup_description' => 'Verwijder automatisch oude verzonden e-mailrecords volgens een schema.',
            'attachment_rules' => 'Bijlageregels',
            'attachment_rules_description' => 'Configureer beperkingen voor bestandsbijlagen in opgestelde e-mails.',
            'auth_emails' => 'Authenticatie-e-mail overschrijvingen',
            'auth_emails_description' => 'Overschrijf de standaard authenticatie-e-mails van de applicatie met uw aangepaste sjablonen.',
        ],

        'fields' => [
            'from_email' => 'Van e-mail',
            'from_name' => 'Van naam',
            'sender_email' => 'E-mail',
            'sender_name' => 'Weergavenaam',
            'sender_new' => 'Nieuwe afzender',
            'default_locale' => 'Standaardtaal',
            'default_locale_helper' => 'De standaardtaal voor nieuwe sjablonen (bijv. en, hu, de).',
            'languages' => 'Beschikbare talen',
            'language_code' => 'Code',
            'language_display' => 'Weergavenaam',
            'language_flag' => 'Vlagpictogram',
            'language_new' => 'Nieuwe taal',
            'category_key' => 'Sleutel',
            'category_label' => 'Label',
            'category_new' => 'Nieuwe categorie',
            'logo_url' => 'Logo-URL of -pad',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Absoluut URL of pad naar uw e-maillogo.',
            'logo_width' => 'Breedte (px)',
            'logo_height' => 'Hoogte (px)',
            'content_width' => 'Inhoudsbreedte (px)',
            'primary_color' => 'Primaire kleur',
            'footer_link_label' => 'Label',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Nieuwe link',
            'support_email' => 'Support-e-mail',
            'support_phone' => 'Supporttelefoon',
            'enable_logging' => 'Logging inschakelen',
            'enable_logging_helper' => 'Wanneer uitgeschakeld, worden er geen verzonden e-mailrecords aangemaakt.',
            'store_rendered_body' => 'Gerenderde inhoud opslaan',
            'store_rendered_body_helper' => 'Sla de uiteindelijke HTML van elke verzonden e-mail op. Vereist voor de functies opnieuw verzenden en voorbeeld.',
            'retention_days' => 'Bewaartermijn (dagen)',
            'retention_days_helper' => 'Verwijder verzonden e-mailrecords automatisch na dit aantal dagen. Laat leeg om voor altijd te bewaren.',
            'cleanup_enabled' => 'Geplande opschoning inschakelen',
            'cleanup_enabled_helper' => 'Voer het opschoningscommando automatisch uit volgens een schema.',
            'cleanup_frequency' => 'Opschoningsfrequentie',
            'max_file_size' => 'Maximale bestandsgrootte (MB)',
            'allowed_extensions' => 'Toegestane bestandsextensies',
            'allowed_extensions_placeholder' => 'Extensie toevoegen (bijv. pdf)',
            'allowed_extensions_helper' => 'Bestandsextensies die zijn toegestaan voor uploaden.',
            'override_verification' => 'E-mailverificatie overschrijven',
            'override_verification_helper' => 'Gebruik het "user-verify-email"-sjabloon in plaats van de standaard verificatie-e-mail van de applicatie.',
            'override_password_reset' => 'Wachtwoordherstel overschrijven',
            'override_password_reset_helper' => 'Gebruik het "user-password-reset"-sjabloon in plaats van de standaard wachtwoordherstel-e-mail van de applicatie.',
            'override_welcome' => 'Welkomst-e-mail overschrijven',
            'override_welcome_helper' => 'Stuur een welkomst-e-mail met het "user-welcome"-sjabloon wanneer een nieuwe gebruiker zich registreert.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Alle rechten voorbehouden.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Concept',
            2 => 'In wachtrij',
            3 => 'Verzonden',
            4 => 'Mislukt',
        ],

        'cleanup_frequency' => [
            1 => 'Dagelijks',
            2 => 'Wekelijks',
            3 => 'Maandelijks',
        ],
    ],

];
