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
        'templates' => 'Modèles',
        'themes' => 'Thèmes',
        'sent-emails' => 'Emails envoyés',
        'settings' => 'Paramètres',
    ],

    'models' => [
        'email_template' => 'Modèle d\'email',
        'email_templates' => 'Modèles d\'email',
        'email_theme' => 'Thème d\'email',
        'email_themes' => 'Thèmes d\'email',
        'sent_email' => 'Email envoyé',
        'sent_emails' => 'Emails envoyés',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Contenu',
            'settings' => 'Paramètres',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Nom',
            'key' => 'Clé',
            'key_helper' => 'Clé unique utilisée dans le code : ex. "invoice-sent"',
            'category' => 'Catégorie',
            'subject' => 'Objet',
            'subject_helper' => 'Prend en charge les tokens : {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Texte d\'aperçu',
            'preheader_helper' => 'Texte d\'aperçu affiché dans les clients de messagerie',
            'body' => 'Corps',
            'theme' => 'Thème',
            'theme_placeholder' => 'Thème par défaut',
            'is_active' => 'Actif',
            'is_active_helper' => 'Les modèles inactifs ne peuvent pas être utilisés pour l\'envoi',
            'tags' => 'Tags',
            'tags_placeholder' => 'Ajouter des tags pour l\'organisation',
            'from_address' => 'Email de l\'expéditeur',
            'from_name' => 'Nom de l\'expéditeur',
            'reply_to_address' => 'Email du destinataire',
            'reply_to_name' => 'Nom du destinataire',
            'locale' => 'Langue',
        ],

        'sections' => [
            'custom_sender' => 'Expéditeur personnalisé',
            'custom_sender_description' => 'Remplacer l\'adresse d\'expéditeur par défaut pour ce modèle',
            'custom_reply_to' => 'Répondre à personnalisé',
            'custom_reply_to_description' => 'Définir une adresse de "Réponse A" pour ce modèle',
        ],

        'tokens' => [
            'label' => 'Tokens disponibles',
            'helper' => 'Documentez les tokens disponibles pour ce modèle. Cela aide les éditeurs à savoir quelles variables ils peuvent utiliser.',
            'token' => 'Token',
            'description' => 'Description',
            'example' => 'Exemple',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Le nom complet du destinataire',
            'example_placeholder' => 'Jean Dupont',
            'new_item' => 'Nouveau token',
        ],

        'blocks' => [
            'button' => 'Bouton',
            'button_heading' => 'Insérer un bouton',
            'button_label' => 'Texte du bouton',
            'button_url' => 'URL',
            'button_align' => 'Alignement',
            'align_left' => 'Gauche',
            'align_center' => 'Centre',
            'align_right' => 'Droite',
            'button_default_label' => 'Cliquez ici',
        ],

        'columns' => [
            'locales' => 'Langues',
            'active' => 'Actif',
            'locked' => 'Verrouillé',
            'sent' => 'Envoyé',
            'updated_at' => 'Mis à jour',
        ],

        'actions' => [
            'preview' => 'Aperçu',
            'preview_heading' => 'Aperçu : :record',
            'send_test' => 'Envoyer un test',
            'send_test_field' => 'Envoyer à',
            'send_test_locale' => 'Langue',
            'compose' => 'Rédiger un email',
            'version_history' => 'Historique des versions',
            'back_to_templates' => 'Retour aux modèles',
        ],

        'notifications' => [
            'test_sent' => 'Email de test envoyé !',
            'test_sent_body' => 'Envoyé à :email',
            'test_failed' => 'Échec de l\'envoi de l\'email de test',
            'saved' => 'Modèle enregistré',
            'saved_body' => 'Un instantané de version a été enregistré automatiquement.',
            'locked_skipped' => 'Modèles verrouillés ignorés',
            'locked_skipped_body' => ':count modèle(s) verrouillé(s) ont été ignoré(s) et non supprimé(s).',
        ],

        'tooltips' => [
            'locked' => 'Ce modèle est verrouillé — la clé et la catégorie sont en lecture seule, la suppression est empêchée.',
        ],

        'versioning' => [
            'date' => 'Date',
            'by' => 'Par',
            'preview' => 'Prévisualiser',
            'restore' => 'Restaurer',
            'restore_confirm' => 'Êtes-vous sûr de vouloir restaurer la version :version ? Le contenu actuel sera d\'abord enregistré comme nouvelle version.',
            'restored' => 'Version :version restaurée.',
            'empty' => 'Aucun historique de versions disponible.',
        ],

        'notices' => [
            'locked' => 'Ce modèle est verrouillé. Les champs clé et catégorie ne peuvent pas être modifiés.',
        ],

        'language_label' => 'Langue : :locale',

        'replicate_suffix' => '(Copie)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Rédiger un email',
        'title_with_name' => 'Rédiger : :name',

        'sections' => [
            'recipients' => 'Destinataires',
            'content' => 'Contenu de l\'email',
            'attachments' => 'Pièces jointes',
            'tokens' => 'Tokens disponibles',
        ],

        'fields' => [
            'from' => 'De',
            'to' => 'À',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Saisir les adresses email',
            'cc_placeholder' => 'Adresses CC',
            'bcc_placeholder' => 'Adresses BCC',
            'locale' => 'Langue',
            'subject' => 'Objet',
            'preheader' => 'Texte d\'aperçu',
            'body' => 'Corps',
            'attach_files' => 'Joindre des fichiers',
            'preheader_helper' => 'Texte d\'aperçu affiché dans les clients de messagerie avant l\'ouverture',
            'no_tokens' => 'Aucun token documenté pour ce modèle. Les tokens comme {{ user.name }} seront remplacés lors de l\'envoi via l\'API/code.',
        ],

        'actions' => [
            'send' => 'Envoyer l\'email',
            'preview' => 'Aperçu',
        ],

        'confirm' => [
            'heading' => 'Confirmer l\'envoi',
            'description' => 'Êtes-vous sûr de vouloir envoyer cet email ?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Destinataires',
            'content' => 'Contenu',
            'attachments' => 'Pièces jointes',
        ],

        'fields' => [
            'from' => 'De',
            'to' => 'À',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Modèle',
            'subject' => 'Objet',
            'to_placeholder' => 'Saisir les adresses email',
            'cc_placeholder' => 'Saisir les adresses CC',
            'bcc_placeholder' => 'Saisir les adresses BCC',
            'auto_attached' => 'Fichiers joints automatiquement',
            'auto_attached_none' => 'Aucun',
            'additional_attachments' => 'Pièces jointes supplémentaires',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Envoyer un email',
        'modal_heading' => 'Rédiger un email',
        'submit' => 'Envoyer',

        'notifications' => [
            'sent' => 'Email envoyé avec succès',
            'sent_body' => 'Envoyé à : :recipients',
            'failed' => 'Échec de l\'envoi de l\'email',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Détails du thème',
            'background' => 'Arrière-plan et mise en page',
            'background_description' => 'Couleurs structurelles principales de la mise en page de l\'email.',
            'typography' => 'Typographie',
            'typography_description' => 'Couleurs pour le texte et les titres.',
            'buttons' => 'Boutons',
            'buttons_description' => 'Style des boutons d\'action.',
            'footer' => 'Pied de page',
            'footer_description' => 'Style de la zone de pied de page.',
            'preview' => 'Aperçu',
        ],

        'fields' => [
            'name' => 'Nom',
            'is_default' => 'Thème par défaut',
            'is_default_helper' => 'Le thème par défaut est appliqué aux modèles qui n\'en spécifient pas.',
            'page_background' => 'Arrière-plan de page',
            'content_background' => 'Arrière-plan du contenu',
            'border' => 'Bordure',
            'headings' => 'Titres',
            'body_text' => 'Texte du corps',
            'secondary_text' => 'Texte secondaire',
            'links' => 'Liens',
            'button_background' => 'Arrière-plan du bouton',
            'button_text' => 'Texte du bouton',
            'primary_accent' => 'Primaire/Accent',
            'footer_background' => 'Arrière-plan du pied de page',
            'footer_text' => 'Texte du pied de page',
        ],

        'columns' => [
            'primary' => 'Primaire',
            'background' => 'Arrière-plan',
            'text' => 'Texte',
            'button' => 'Bouton',
            'default' => 'Par défaut',
            'templates' => 'Modèles',
            'updated_at' => 'Mis à jour',
        ],

        'replicate_suffix' => '(Copie)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'À',
            'template' => 'Modèle',
            'template_placeholder' => 'Personnalisé',
            'sent_by' => 'Envoyé par',
            'subject' => 'Objet',
            'status' => 'Statut',
            'sent_by_placeholder' => 'Système',
            'related_to' => 'Lié à',
            'sent_at' => 'Envoyé',
        ],

        'filters' => [
            'from' => 'Du',
            'until' => 'Au',
        ],

        'actions' => [
            'view' => 'Voir',
            'resend' => 'Renvoyer',
            'resend_description' => 'Cela enverra une nouvelle copie de l\'email aux destinataires originaux.',
        ],

        'preview' => [
            'from' => 'De :',
            'to' => 'A :',
            'cc' => 'Copie :',
            'template' => 'Modèle :',
            'sent' => 'Envoyé :',
            'sent_not_yet' => 'Pas encore',
            'status' => 'Statut :',
            'no_body' => 'Le corps de l\'e-mail n\'a pas été enregistré. Activez l\'option <code>logging.store_rendered_body</code> dans les paramètres pour enregistrer le contenu de l\'e-mail.',
            'error' => 'Détails de l\'erreur',
        ],

        'notifications' => [
            'resent' => 'Email renvoyé avec succès',
            'resend_failed' => 'Échec du renvoi de l\'email',
        ],

        'errors' => [
            'no_rendered_body' => 'Impossible de renvoyer : aucun contenu rendu stocké. Activez logging.store_rendered_body dans les paramètres.',
            'no_template' => 'Le modèle original n\'existe plus.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Emails envoyés',

        'columns' => [
            'to' => 'À',
            'template' => 'Modèle',
            'subject' => 'Objet',
            'status' => 'Statut',
            'sent_by' => 'Envoyé par',
            'sent_by_placeholder' => 'Système',
            'sent_at' => 'Envoyé',
        ],

        'actions' => [
            'view' => 'Voir',
            'resend' => 'Renvoyer',
            'resend_confirm' => 'Êtes-vous sûr de vouloir renvoyer cet email ?',
        ],

        'notifications' => [
            'resent' => 'Email renvoyé avec succès',
            'resend_failed' => 'Échec du renvoi',
        ],

        'empty' => [
            'heading' => 'Aucun email envoyé',
            'description' => 'Les emails envoyés pour cet enregistrement apparaîtront ici.',
        ],

        'errors' => [
            'no_body' => 'Impossible de renvoyer : aucun contenu rendu ou modèle stocké.',
            'no_template' => 'Le modèle original n\'existe plus.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Paramètres email',

        'tabs' => [
            'general' => 'Général',
            'branding' => 'Image de marque',
            'logging' => 'Journalisation',
            'attachments' => 'Pièces jointes',
            'auth_emails' => 'Emails d\'authentification',
        ],

        'titles' => [
            'general' => 'Paramètres des modèles d\'email - Général',
            'branding' => 'Paramètres des modèles d\'email - Image de marque',
            'logging' => 'Paramètres des modèles d\'email - Journalisation',
            'attachments' => 'Paramètres des modèles d\'email - Pièces jointes',
            'auth_emails' => 'Paramètres des modèles d\'email - Emails d\'authentification',
        ],

        'sections' => [
            'default_sender' => 'Expéditeur par défaut',
            'default_sender_description' => 'L\'adresse d\'expéditeur par défaut pour tous les emails envoyés par le plugin.',
            'additional_senders' => 'Expéditeurs supplémentaires',
            'add_additional_senders' => 'Ajouter un expéditeur supplémentaire',
            'additional_senders_description' => 'Adresses d\'expéditeur supplémentaires que les utilisateurs peuvent choisir lors de la rédaction d\'emails.',
            'localization' => 'Localisation',
            'categories' => 'Catégories de modèles',
            'logo' => 'Logo',
            'colors' => 'Couleurs',
            'footer_links' => 'Liens du pied de page',
            'add_footer_links' => 'Ajouter un lien au pied de page',
            'customer_service' => 'Service client',
            'logging' => 'Journalisation des emails',
            'logging_description' => 'Contrôlez comment les emails envoyés sont enregistrés dans la base de données.',
            'cleanup' => 'Nettoyage programmé',
            'cleanup_description' => 'Supprimer automatiquement les anciens enregistrements d\'emails envoyés selon un calendrier.',
            'attachment_rules' => 'Règles des pièces jointes',
            'attachment_rules_description' => 'Configurez les limites pour les pièces jointes dans les emails rédigés.',
            'auth_emails' => 'Remplacement des emails d\'authentification',
            'auth_emails_description' => 'Remplacez les emails d\'authentification par défaut de l\'application par vos modèles personnalisés.',
        ],

        'fields' => [
            'from_email' => 'Email de l\'expéditeur',
            'from_name' => 'Nom de l\'expéditeur',
            'sender_email' => 'Email',
            'sender_name' => 'Nom d\'affichage',
            'sender_new' => 'Nouvel expéditeur',
            'default_locale' => 'Langue par défaut',
            'default_locale_helper' => 'La langue par défaut pour les nouveaux modèles (ex. en, hu, de).',
            'languages' => 'Langues disponibles',
            'language_code' => 'Code',
            'language_display' => 'Nom d\'affichage',
            'language_flag' => 'Icône de drapeau',
            'language_new' => 'Nouvelle langue',
            'category_key' => 'Clé',
            'category_label' => 'Libellé',
            'category_new' => 'Nouvelle catégorie',
            'logo_url' => 'URL ou chemin du logo',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL absolue ou chemin vers votre logo d\'email.',
            'logo_width' => 'Largeur (px)',
            'logo_height' => 'Hauteur (px)',
            'content_width' => 'Largeur du contenu (px)',
            'primary_color' => 'Couleur primaire',
            'footer_link_label' => 'Libellé',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Nouveau lien',
            'support_email' => 'Email de support',
            'support_phone' => 'Téléphone de support',
            'enable_logging' => 'Activer la journalisation',
            'enable_logging_helper' => 'Lorsque désactivé, aucun enregistrement d\'email envoyé ne sera créé.',
            'store_rendered_body' => 'Stocker le contenu rendu',
            'store_rendered_body_helper' => 'Enregistrer le HTML final de chaque email envoyé. Nécessaire pour les fonctions de renvoi et d\'aperçu.',
            'retention_days' => 'Rétention (jours)',
            'retention_days_helper' => 'Supprimer automatiquement les enregistrements d\'emails envoyés après ce nombre de jours. Laissez vide pour conserver indéfiniment.',
            'cleanup_enabled' => 'Activer le nettoyage programmé',
            'cleanup_enabled_helper' => 'Exécuter automatiquement la commande de nettoyage selon un calendrier.',
            'cleanup_frequency' => 'Fréquence de nettoyage',
            'max_file_size' => 'Taille max. du fichier (Mo)',
            'allowed_extensions' => 'Extensions de fichier autorisées',
            'allowed_extensions_placeholder' => 'Ajouter une extension (ex. pdf)',
            'allowed_extensions_helper' => 'Extensions de fichier autorisées pour le téléversement.',
            'override_verification' => 'Remplacer la vérification par email',
            'override_verification_helper' => 'Utiliser le modèle "user-verify-email" à la place de l\'email de vérification par défaut de l\'application.',
            'override_password_reset' => 'Remplacer la réinitialisation du mot de passe',
            'override_password_reset_helper' => 'Utiliser le modèle "user-password-reset" à la place de l\'email de réinitialisation du mot de passe par défaut de l\'application.',
            'override_welcome' => 'Remplacer l\'email de bienvenue',
            'override_welcome_helper' => 'Envoyer un email de bienvenue avec le modèle "user-welcome" lorsqu\'un nouvel utilisateur s\'inscrit.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Tous droits réservés.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Brouillon',
            2 => 'En file d\'attente',
            3 => 'Envoyé',
            4 => 'Échoué',
        ],

        'cleanup_frequency' => [
            1 => 'Quotidien',
            2 => 'Hebdomadaire',
            3 => 'Mensuel',
        ],
    ],

];
