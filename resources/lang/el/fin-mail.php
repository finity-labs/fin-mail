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
        'templates' => 'Πρότυπα',
        'themes' => 'Θέματα',
        'sent-emails' => 'Απεσταλμένα email',
        'settings' => 'Ρυθμίσεις',
    ],

    'models' => [
        'email_template' => 'Πρότυπο email',
        'email_templates' => 'Πρότυπα email',
        'email_theme' => 'Θέμα email',
        'email_themes' => 'Θέματα email',
        'sent_email' => 'Απεσταλμένο email',
        'sent_emails' => 'Απεσταλμένα email',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Περιεχόμενο',
            'settings' => 'Ρυθμίσεις',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Όνομα',
            'key' => 'Κλειδί',
            'key_helper' => 'Μοναδικό κλειδί στον κώδικα: π.χ. "invoice-sent"',
            'category' => 'Κατηγορία',
            'subject' => 'Θέμα',
            'subject_helper' => 'Υποστηρίζει tokens: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Κείμενο προεπισκόπησης',
            'preheader_helper' => 'Κείμενο προεπισκόπησης που εμφανίζεται στους email clients',
            'body' => 'Σώμα',
            'theme' => 'Θέμα',
            'theme_placeholder' => 'Προεπιλεγμένο θέμα',
            'is_active' => 'Ενεργό',
            'is_active_helper' => 'Τα ανενεργά πρότυπα δεν μπορούν να χρησιμοποιηθούν για αποστολή',
            'tags' => 'Ετικέτες',
            'tags_placeholder' => 'Προσθέστε ετικέτες για οργάνωση',
            'from_address' => 'Email αποστολέα',
            'from_name' => 'Όνομα αποστολέα',
            'locale' => 'Γλώσσα',
        ],

        'sections' => [
            'custom_sender' => 'Προσαρμοσμένος αποστολέας',
            'custom_sender_description' => 'Παράκαμψη της προεπιλεγμένης διεύθυνσης αποστολέα για αυτό το πρότυπο',
        ],

        'tokens' => [
            'label' => 'Διαθέσιμα tokens',
            'helper' => 'Τεκμηριώστε τα διαθέσιμα tokens για αυτό το πρότυπο. Αυτό βοηθά τους συντάκτες να γνωρίζουν ποιες μεταβλητές μπορούν να χρησιμοποιήσουν.',
            'token' => 'Token',
            'description' => 'Περιγραφή',
            'example' => 'Παράδειγμα',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'Το πλήρες όνομα του παραλήπτη',
            'example_placeholder' => 'Γιάννης Παπαδόπουλος',
            'new_item' => 'Νέο token',
        ],

        'blocks' => [
            'button' => 'Κουμπί',
            'button_heading' => 'Εισαγωγή κουμπιού',
            'button_label' => 'Κείμενο κουμπιού',
            'button_url' => 'URL',
            'button_align' => 'Στοίχιση',
            'align_left' => 'Αριστερά',
            'align_center' => 'Κέντρο',
            'align_right' => 'Δεξιά',
            'button_default_label' => 'Κάντε κλικ εδώ',
        ],

        'columns' => [
            'locales' => 'Γλώσσες',
            'active' => 'Ενεργό',
            'locked' => 'Κλειδωμένο',
            'sent' => 'Απεσταλμένα',
            'updated_at' => 'Ενημερώθηκε',
        ],

        'actions' => [
            'preview' => 'Προεπισκόπηση',
            'send_test' => 'Αποστολή δοκιμής',
            'send_test_field' => 'Αποστολή σε',
            'send_test_locale' => 'Γλώσσα',
            'compose' => 'Σύνταξη email',
            'version_history' => 'Ιστορικό εκδόσεων',
            'back_to_templates' => 'Πίσω στα πρότυπα',
        ],

        'notifications' => [
            'test_sent' => 'Δοκιμαστικό email στάλθηκε!',
            'test_sent_body' => 'Στάλθηκε στο :email',
            'test_failed' => 'Αποτυχία αποστολής δοκιμαστικού email',
            'saved' => 'Το πρότυπο αποθηκεύτηκε',
            'saved_body' => 'Ένα στιγμιότυπο έκδοσης αποθηκεύτηκε αυτόματα.',
            'locked_skipped' => 'Τα κλειδωμένα πρότυπα παραλείφθηκαν',
            'locked_skipped_body' => ':count κλειδωμένο(-α) πρότυπο(-α) παραλείφθηκαν και δεν διαγράφηκαν.',
        ],

        'tooltips' => [
            'locked' => 'Αυτό το πρότυπο είναι κλειδωμένο — το κλειδί και η κατηγορία είναι μόνο για ανάγνωση, η διαγραφή αποτρέπεται.',
        ],

        'versioning' => [
            'date' => 'Ημερομηνία',
            'by' => 'Από',
            'preview' => 'Προεπισκόπηση',
            'restore' => 'Επαναφορά',
            'restore_confirm' => 'Είστε σίγουροι ότι θέλετε να επαναφέρετε την έκδοση :version; Το τρέχον περιεχόμενο θα αποθηκευτεί πρώτα ως νέα έκδοση.',
            'restored' => 'Η έκδοση :version επαναφέρθηκε.',
            'empty' => 'Δεν υπάρχει διαθέσιμο ιστορικό εκδόσεων.',
        ],

        'notices' => [
            'locked' => 'Αυτό το πρότυπο είναι κλειδωμένο. Τα πεδία κλειδί και κατηγορία δεν μπορούν να αλλάξουν.',
        ],

        'language_label' => 'Γλώσσα: :locale',

        'replicate_suffix' => '(Αντίγραφο)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Σύνταξη email',
        'title_with_name' => 'Σύνταξη: :name',

        'sections' => [
            'recipients' => 'Παραλήπτες',
            'content' => 'Περιεχόμενο email',
            'attachments' => 'Συνημμένα',
            'tokens' => 'Διαθέσιμα tokens',
        ],

        'fields' => [
            'from' => 'Από',
            'to' => 'Προς',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Εισάγετε διευθύνσεις email',
            'cc_placeholder' => 'Διευθύνσεις CC',
            'bcc_placeholder' => 'Διευθύνσεις BCC',
            'locale' => 'Γλώσσα',
            'subject' => 'Θέμα',
            'preheader' => 'Κείμενο προεπισκόπησης',
            'body' => 'Σώμα',
            'attach_files' => 'Επισύναψη αρχείων',
            'preheader_helper' => 'Κείμενο προεπισκόπησης που εμφανίζεται στους email clients πριν το άνοιγμα',
            'no_tokens' => 'Δεν υπάρχουν τεκμηριωμένα tokens για αυτό το πρότυπο. Tokens όπως {{ user.name }} θα αντικατασταθούν κατά την αποστολή μέσω API/κώδικα.',
        ],

        'actions' => [
            'send' => 'Αποστολή email',
            'preview' => 'Προεπισκόπηση',
        ],

        'confirm' => [
            'heading' => 'Επιβεβαίωση αποστολής',
            'description' => 'Είστε βέβαιοι ότι θέλετε να στείλετε αυτό το email;',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Παραλήπτες',
            'content' => 'Περιεχόμενο',
            'attachments' => 'Συνημμένα',
        ],

        'fields' => [
            'from' => 'Από',
            'to' => 'Προς',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Πρότυπο',
            'subject' => 'Θέμα',
            'to_placeholder' => 'Εισάγετε διευθύνσεις email',
            'cc_placeholder' => 'Εισάγετε διευθύνσεις CC',
            'bcc_placeholder' => 'Εισάγετε διευθύνσεις BCC',
            'auto_attached' => 'Αυτόματα συνημμένα αρχεία',
            'auto_attached_none' => 'Κανένα',
            'additional_attachments' => 'Επιπλέον συνημμένα',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Αποστολή email',
        'modal_heading' => 'Σύνταξη email',
        'submit' => 'Αποστολή',

        'notifications' => [
            'sent' => 'Το email στάλθηκε επιτυχώς',
            'sent_body' => 'Στάλθηκε σε: :recipients',
            'failed' => 'Αποτυχία αποστολής email',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Λεπτομέρειες θέματος',
            'background' => 'Φόντο και διάταξη',
            'background_description' => 'Κύρια χρώματα δομής για τη διάταξη email.',
            'typography' => 'Τυπογραφία',
            'typography_description' => 'Χρώματα για κείμενο και επικεφαλίδες.',
            'buttons' => 'Κουμπιά',
            'buttons_description' => 'Στυλ κουμπιών δράσης.',
            'footer' => 'Υποσέλιδο',
            'footer_description' => 'Στυλ περιοχής υποσέλιδου.',
            'preview' => 'Προεπισκόπηση',
        ],

        'fields' => [
            'name' => 'Όνομα',
            'is_default' => 'Προεπιλεγμένο θέμα',
            'is_default_helper' => 'Το προεπιλεγμένο θέμα εφαρμόζεται σε πρότυπα που δεν καθορίζουν ένα.',
            'page_background' => 'Φόντο σελίδας',
            'content_background' => 'Φόντο περιεχομένου',
            'border' => 'Περίγραμμα',
            'headings' => 'Επικεφαλίδες',
            'body_text' => 'Κύριο κείμενο',
            'secondary_text' => 'Δευτερεύον κείμενο',
            'links' => 'Σύνδεσμοι',
            'button_background' => 'Φόντο κουμπιού',
            'button_text' => 'Κείμενο κουμπιού',
            'primary_accent' => 'Κύριο/Τονισμός',
            'footer_background' => 'Φόντο υποσέλιδου',
            'footer_text' => 'Κείμενο υποσέλιδου',
        ],

        'columns' => [
            'primary' => 'Κύριο',
            'background' => 'Φόντο',
            'text' => 'Κείμενο',
            'button' => 'Κουμπί',
            'default' => 'Προεπιλογή',
            'templates' => 'Πρότυπα',
            'updated_at' => 'Ενημερώθηκε',
        ],

        'replicate_suffix' => '(Αντίγραφο)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Προς',
            'template' => 'Πρότυπο',
            'template_placeholder' => 'Προσαρμοσμένο',
            'sent_by' => 'Από',
            'subject' => 'Θέμα',
            'status' => 'Κατάσταση',
            'sent_by_placeholder' => 'Σύστημα',
            'related_to' => 'Σχετίζεται με',
            'sent_at' => 'Στάλθηκε',
        ],

        'filters' => [
            'from' => 'Από',
            'until' => 'Έως',
        ],

        'actions' => [
            'view' => 'Προβολή',
            'resend' => 'Επαναποστολή',
            'resend_description' => 'Αυτό θα στείλει ένα νέο αντίγραφο του email στους αρχικούς παραλήπτες.',
        ],


        'preview' => [
            'from' => 'Από:',
            'to' => 'Προς:',
            'cc' => 'Κοινοποίηση:',
            'template' => 'Πρότυπο:',
            'sent' => 'Εστάλη:',
            'sent_not_yet' => 'Όχι ακόμα',
            'status' => 'Κατάσταση:',
            'no_body' => 'Το σώμα του email δεν αποθηκεύτηκε. Ενεργοποιήστε <code>logging.store_rendered_body</code> στις ρυθμίσεις για να αποθηκεύσετε το περιεχόμενο email.',
            'error' => 'Λεπτομέρειες σφάλματος'
        ],
        'notifications' => [
            'resent' => 'Το email επαναστάλθηκε επιτυχώς',
            'resend_failed' => 'Αποτυχία επαναποστολής email',
        ],

        'errors' => [
            'no_rendered_body' => 'Αδύνατη η επαναποστολή: δεν υπάρχει αποθηκευμένο σώμα. Ενεργοποιήστε το logging.store_rendered_body στις ρυθμίσεις.',
            'no_template' => 'Το αρχικό πρότυπο δεν υπάρχει πλέον.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Απεσταλμένα email',

        'columns' => [
            'to' => 'Προς',
            'template' => 'Πρότυπο',
            'subject' => 'Θέμα',
            'status' => 'Κατάσταση',
            'sent_by' => 'Από',
            'sent_by_placeholder' => 'Σύστημα',
            'sent_at' => 'Στάλθηκε',
        ],

        'actions' => [
            'view' => 'Προβολή',
            'resend' => 'Επαναποστολή',
            'resend_confirm' => 'Είστε βέβαιοι ότι θέλετε να επαναστείλετε αυτό το email;',
        ],

        'notifications' => [
            'resent' => 'Το email επαναστάλθηκε επιτυχώς',
            'resend_failed' => 'Αποτυχία επαναποστολής',
        ],

        'empty' => [
            'heading' => 'Δεν στάλθηκαν email',
            'description' => 'Τα email που θα σταλούν για αυτή την εγγραφή θα εμφανιστούν εδώ.',
        ],

        'errors' => [
            'no_body' => 'Αδύνατη η επαναποστολή: δεν υπάρχει αποθηκευμένο σώμα ή πρότυπο.',
            'no_template' => 'Το αρχικό πρότυπο δεν υπάρχει πλέον.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Ρυθμίσεις email',

        'tabs' => [
            'general' => 'Γενικά',
            'branding' => 'Εταιρική ταυτότητα',
            'logging' => 'Καταγραφή',
            'attachments' => 'Συνημμένα',
            'auth_emails' => 'Email ταυτοποίησης',
        ],

        'titles' => [
            'general' => 'Ρυθμίσεις προτύπων email - Γενικά',
            'branding' => 'Ρυθμίσεις προτύπων email - Εταιρική ταυτότητα',
            'logging' => 'Ρυθμίσεις προτύπων email - Καταγραφή',
            'attachments' => 'Ρυθμίσεις προτύπων email - Συνημμένα',
            'auth_emails' => 'Ρυθμίσεις προτύπων email - Email ταυτοποίησης',
        ],

        'sections' => [
            'default_sender' => 'Προεπιλεγμένος αποστολέας',
            'default_sender_description' => 'Η προεπιλεγμένη διεύθυνση αποστολέα για όλα τα email που στέλνονται από το plugin.',
            'additional_senders' => 'Επιπλέον αποστολείς',
            'add_additional_senders' => 'Προσθήκη επιπλέον αποστολέων',
            'additional_senders_description' => 'Επιπλέον διευθύνσεις αποστολέα που μπορούν να επιλέξουν οι χρήστες κατά τη σύνταξη email.',
            'localization' => 'Τοπικοποίηση',
            'categories' => 'Κατηγορίες προτύπων',
            'logo' => 'Λογότυπο',
            'colors' => 'Χρώματα',
            'footer_links' => 'Σύνδεσμοι υποσέλιδου',
            'add_footer_links' => 'Προσθήκη συνδέσμων υποσέλιδου',
            'customer_service' => 'Εξυπηρέτηση πελατών',
            'logging' => 'Καταγραφή email',
            'logging_description' => 'Ελέγξτε πώς καταγράφονται τα απεσταλμένα email στη βάση δεδομένων.',
            'cleanup' => 'Προγραμματισμένος καθαρισμός',
            'cleanup_description' => 'Αυτόματη διαγραφή παλαιών εγγραφών απεσταλμένων email σε τακτά χρονικά διαστήματα.',
            'attachment_rules' => 'Κανόνες συνημμένων',
            'attachment_rules_description' => 'Διαμορφώστε τα όρια για τα συνημμένα αρχεία στα συντεταγμένα email.',
            'auth_emails' => 'Παρακάμψεις email ταυτοποίησης',
            'auth_emails_description' => 'Αντικαταστήστε τα προεπιλεγμένα email ταυτοποίησης της εφαρμογής με τα δικά σας πρότυπα.',
        ],

        'fields' => [
            'from_email' => 'Email αποστολέα',
            'from_name' => 'Όνομα αποστολέα',
            'sender_email' => 'Email',
            'sender_name' => 'Εμφανιζόμενο όνομα',
            'sender_new' => 'Νέος αποστολέας',
            'default_locale' => 'Προεπιλεγμένη γλώσσα',
            'default_locale_helper' => 'Η προεπιλεγμένη γλώσσα για νέα πρότυπα (π.χ. en, hu, de).',
            'languages' => 'Διαθέσιμες γλώσσες',
            'language_code' => 'Κωδικός',
            'language_display' => 'Εμφανιζόμενο όνομα',
            'language_flag' => 'Εικονίδιο σημαίας',
            'language_new' => 'Νέα γλώσσα',
            'category_key' => 'Κλειδί',
            'category_label' => 'Ετικέτα',
            'category_new' => 'Νέα κατηγορία',
            'logo_url' => 'URL ή διαδρομή λογοτύπου',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'Απόλυτο URL ή διαδρομή προς το λογότυπο email.',
            'logo_width' => 'Πλάτος (px)',
            'logo_height' => 'Ύψος (px)',
            'content_width' => 'Πλάτος περιεχομένου (px)',
            'primary_color' => 'Κύριο χρώμα',
            'footer_link_label' => 'Ετικέτα',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Νέος σύνδεσμος',
            'support_email' => 'Email υποστήριξης',
            'support_phone' => 'Τηλέφωνο υποστήριξης',
            'enable_logging' => 'Ενεργοποίηση καταγραφής',
            'enable_logging_helper' => 'Όταν απενεργοποιηθεί, δεν θα δημιουργούνται εγγραφές απεσταλμένων email.',
            'store_rendered_body' => 'Αποθήκευση σώματος',
            'store_rendered_body_helper' => 'Αποθήκευση του τελικού HTML κάθε απεσταλμένου email. Απαιτείται για τις λειτουργίες επαναποστολής και προεπισκόπησης.',
            'retention_days' => 'Διατήρηση (ημέρες)',
            'retention_days_helper' => 'Αυτόματη διαγραφή εγγραφών απεσταλμένων email μετά από τόσες ημέρες. Αφήστε κενό για μόνιμη διατήρηση.',
            'cleanup_enabled' => 'Ενεργοποίηση προγραμματισμένου καθαρισμού',
            'cleanup_enabled_helper' => 'Αυτόματη εκτέλεση της εντολής καθαρισμού σε τακτά χρονικά διαστήματα.',
            'cleanup_frequency' => 'Συχνότητα καθαρισμού',
            'max_file_size' => 'Μέγιστο μέγεθος αρχείου (MB)',
            'allowed_extensions' => 'Επιτρεπόμενες επεκτάσεις αρχείων',
            'allowed_extensions_placeholder' => 'Προσθήκη επέκτασης (π.χ. pdf)',
            'allowed_extensions_helper' => 'Επιτρεπόμενες επεκτάσεις αρχείων για μεταφόρτωση.',
            'override_verification' => 'Παράκαμψη email επαλήθευσης',
            'override_verification_helper' => 'Χρήση του προτύπου "user-verify-email" αντί του προεπιλεγμένου email επαλήθευσης της εφαρμογής.',
            'override_password_reset' => 'Παράκαμψη επαναφοράς κωδικού',
            'override_password_reset_helper' => 'Χρήση του προτύπου "user-password-reset" αντί του προεπιλεγμένου email επαναφοράς κωδικού της εφαρμογής.',
            'override_welcome' => 'Παράκαμψη email καλωσορίσματος',
            'override_welcome_helper' => 'Αποστολή email καλωσορίσματος με το πρότυπο "user-welcome" όταν εγγράφεται νέος χρήστης.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Με επιφύλαξη παντός δικαιώματος.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Πρόχειρο',
            2 => 'Σε ουρά',
            3 => 'Απεσταλμένο',
            4 => 'Αποτυχημένο',
        ],

        'cleanup_frequency' => [
            1 => 'Καθημερινά',
            2 => 'Εβδομαδιαία',
            3 => 'Μηνιαία',
        ],
    ],

];
