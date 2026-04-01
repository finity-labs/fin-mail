<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'Correo',
        'templates' => 'Plantillas',
        'themes' => 'Temas',
        'sent-emails' => 'Correos enviados',
        'settings' => 'Configuración',
    ],

    'models' => [
        'email_template' => 'Plantilla de correo',
        'email_templates' => 'Plantillas de correo',
        'email_theme' => 'Tema de correo',
        'email_themes' => 'Temas de correo',
        'sent_email' => 'Correo enviado',
        'sent_emails' => 'Correos enviados',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Contenido',
            'settings' => 'Configuración',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Nombre',
            'key' => 'Clave',
            'key_helper' => 'Clave única usada en el código: ej. "invoice-sent"',
            'category' => 'Categoría',
            'subject' => 'Asunto',
            'subject_helper' => 'Soporta tokens: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Texto de vista previa',
            'preheader_helper' => 'Texto de vista previa mostrado en clientes de correo',
            'body' => 'Cuerpo',
            'theme' => 'Tema',
            'theme_placeholder' => 'Tema predeterminado',
            'is_active' => 'Activo',
            'is_active_helper' => 'Las plantillas inactivas no pueden usarse para enviar',
            'tags' => 'Etiquetas',
            'tags_placeholder' => 'Agregar etiquetas para organizar',
            'from_address' => 'Correo del remitente',
            'from_name' => 'Nombre del remitente',
            'locale' => 'Idioma',
        ],

        'sections' => [
            'custom_sender' => 'Remitente personalizado',
            'custom_sender_description' => 'Anular la dirección de remitente predeterminada para esta plantilla',
        ],

        'tokens' => [
            'label' => 'Tokens disponibles',
            'helper' => 'Documente los tokens disponibles para esta plantilla. Esto ayuda a los editores a saber qué variables pueden usar.',
            'token' => 'Token',
            'description' => 'Descripción',
            'example' => 'Ejemplo',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'El nombre completo del destinatario',
            'example_placeholder' => 'Juan Pérez',
            'new_item' => 'Nuevo token',
        ],

        'blocks' => [
            'button' => 'Botón',
            'button_heading' => 'Insertar botón',
            'button_label' => 'Texto del botón',
            'button_url' => 'URL',
            'button_align' => 'Alineación',
            'align_left' => 'Izquierda',
            'align_center' => 'Centro',
            'align_right' => 'Derecha',
            'button_default_label' => 'Haga clic aquí',
        ],

        'columns' => [
            'locales' => 'Idiomas',
            'active' => 'Activo',
            'locked' => 'Bloqueado',
            'sent' => 'Enviados',
            'updated_at' => 'Actualizado',
        ],

        'actions' => [
            'preview' => 'Vista previa',
            'send_test' => 'Enviar prueba',
            'send_test_field' => 'Enviar a',
            'send_test_locale' => 'Idioma',
            'compose' => 'Redactar correo',
            'version_history' => 'Historial de versiones',
            'back_to_templates' => 'Volver a plantillas',
        ],

        'notifications' => [
            'test_sent' => '¡Correo de prueba enviado!',
            'test_sent_body' => 'Enviado a :email',
            'test_failed' => 'Error al enviar el correo de prueba',
            'saved' => 'Plantilla guardada',
            'saved_body' => 'Se guardó automáticamente una instantánea de la versión.',
            'locked_skipped' => 'Plantillas bloqueadas omitidas',
            'locked_skipped_body' => ':count plantilla(s) bloqueada(s) fueron omitidas y no eliminadas.',
        ],

        'tooltips' => [
            'locked' => 'Esta plantilla está bloqueada — la clave y la categoría son de solo lectura, la eliminación está impedida.',
        ],

        'versioning' => [
            'date' => 'Fecha',
            'by' => 'Por',
            'preview' => 'Vista previa',
            'restore' => 'Restaurar',
            'restore_confirm' => '¿Está seguro de que desea restaurar la versión :version? El contenido actual se guardará primero como una nueva versión.',
            'restored' => 'Versión :version restaurada.',
            'empty' => 'No hay historial de versiones disponible.',
        ],

        'notices' => [
            'locked' => 'Esta plantilla está bloqueada. Los campos clave y categoría no se pueden modificar.',
        ],

        'language_label' => 'Idioma: :locale',

        'replicate_suffix' => '(Copia)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Redactar correo',
        'title_with_name' => 'Redactar: :name',

        'sections' => [
            'recipients' => 'Destinatarios',
            'content' => 'Contenido del correo',
            'attachments' => 'Adjuntos',
            'tokens' => 'Tokens disponibles',
        ],

        'fields' => [
            'from' => 'De',
            'to' => 'Para',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Ingrese direcciones de correo',
            'cc_placeholder' => 'Direcciones CC',
            'bcc_placeholder' => 'Direcciones BCC',
            'locale' => 'Idioma',
            'subject' => 'Asunto',
            'preheader' => 'Texto de vista previa',
            'body' => 'Cuerpo',
            'attach_files' => 'Adjuntar archivos',
            'preheader_helper' => 'Texto de vista previa mostrado en clientes de correo antes de abrir',
            'no_tokens' => 'No hay tokens documentados para esta plantilla. Los tokens como {{ user.name }} serán reemplazados al enviar a través de la API/código.',
        ],

        'actions' => [
            'send' => 'Enviar correo',
            'preview' => 'Vista previa',
        ],

        'confirm' => [
            'heading' => 'Confirmar envío',
            'description' => '¿Está seguro de que desea enviar este correo?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Destinatarios',
            'content' => 'Contenido',
            'attachments' => 'Adjuntos',
        ],

        'fields' => [
            'from' => 'De',
            'to' => 'Para',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Plantilla',
            'subject' => 'Asunto',
            'to_placeholder' => 'Ingrese direcciones de correo',
            'cc_placeholder' => 'Ingrese direcciones CC',
            'bcc_placeholder' => 'Ingrese direcciones BCC',
            'auto_attached' => 'Archivos adjuntos automáticos',
            'auto_attached_none' => 'Ninguno',
            'additional_attachments' => 'Adjuntos adicionales',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Enviar correo',
        'modal_heading' => 'Redactar correo',
        'submit' => 'Enviar',

        'notifications' => [
            'sent' => 'Correo enviado correctamente',
            'sent_body' => 'Enviado a: :recipients',
            'failed' => 'Error al enviar el correo',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Detalles del tema',
            'background' => 'Fondo y diseño',
            'background_description' => 'Colores estructurales principales del diseño de correo.',
            'typography' => 'Tipografía',
            'typography_description' => 'Colores para texto y encabezados.',
            'buttons' => 'Botones',
            'buttons_description' => 'Estilo de botones de acción.',
            'footer' => 'Pie de página',
            'footer_description' => 'Estilo del área de pie de página.',
            'preview' => 'Vista previa',
        ],

        'fields' => [
            'name' => 'Nombre',
            'is_default' => 'Tema predeterminado',
            'is_default_helper' => 'El tema predeterminado se aplica a las plantillas que no especifican uno.',
            'page_background' => 'Fondo de página',
            'content_background' => 'Fondo de contenido',
            'border' => 'Borde',
            'headings' => 'Encabezados',
            'body_text' => 'Texto del cuerpo',
            'secondary_text' => 'Texto secundario',
            'links' => 'Enlaces',
            'button_background' => 'Fondo del botón',
            'button_text' => 'Texto del botón',
            'primary_accent' => 'Primario/Acento',
            'footer_background' => 'Fondo del pie de página',
            'footer_text' => 'Texto del pie de página',
        ],

        'columns' => [
            'primary' => 'Primario',
            'background' => 'Fondo',
            'text' => 'Texto',
            'button' => 'Botón',
            'default' => 'Predeterminado',
            'templates' => 'Plantillas',
            'updated_at' => 'Actualizado',
        ],

        'replicate_suffix' => '(Copia)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Para',
            'template' => 'Plantilla',
            'template_placeholder' => 'Personalizado',
            'sent_by' => 'Enviado por',
            'subject' => 'Asunto',
            'status' => 'Estado',
            'sent_by_placeholder' => 'Sistema',
            'related_to' => 'Relacionado con',
            'sent_at' => 'Enviado',
        ],

        'filters' => [
            'from' => 'Desde',
            'until' => 'Hasta',
        ],

        'actions' => [
            'view' => 'Ver',
            'resend' => 'Reenviar',
            'resend_description' => 'Esto enviará una nueva copia del correo a los destinatarios originales.',
        ],


        'preview' => [
            'from' => 'De:',
            'to' => 'Para:',
            'cc' => 'CC:',
            'template' => 'Plantilla:',
            'sent' => 'Enviado:',
            'sent_not_yet' => 'Aún no',
            'status' => 'Estado:',
            'no_body' => 'El cuerpo del correo no fue almacenado. Habilite <code>logging.store_rendered_body</code> en la configuración para guardar el contenido del correo.',
            'error' => 'Detalles del error'
        ],
        'notifications' => [
            'resent' => 'Correo reenviado correctamente',
            'resend_failed' => 'Error al reenviar el correo',
        ],

        'errors' => [
            'no_rendered_body' => 'No se puede reenviar: no hay contenido renderizado almacenado. Active logging.store_rendered_body en la configuración.',
            'no_template' => 'La plantilla original ya no existe.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Correos enviados',

        'columns' => [
            'to' => 'Para',
            'template' => 'Plantilla',
            'subject' => 'Asunto',
            'status' => 'Estado',
            'sent_by' => 'Enviado por',
            'sent_by_placeholder' => 'Sistema',
            'sent_at' => 'Enviado',
        ],

        'actions' => [
            'view' => 'Ver',
            'resend' => 'Reenviar',
            'resend_confirm' => '¿Está seguro de que desea reenviar este correo?',
        ],

        'notifications' => [
            'resent' => 'Correo reenviado correctamente',
            'resend_failed' => 'Error al reenviar',
        ],

        'empty' => [
            'heading' => 'No se han enviado correos',
            'description' => 'Los correos enviados para este registro aparecerán aquí.',
        ],

        'errors' => [
            'no_body' => 'No se puede reenviar: no hay contenido renderizado ni plantilla almacenada.',
            'no_template' => 'La plantilla original ya no existe.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Configuración de correo',

        'tabs' => [
            'general' => 'General',
            'branding' => 'Marca',
            'logging' => 'Registro',
            'attachments' => 'Adjuntos',
            'auth_emails' => 'Correos de autenticación',
        ],

        'titles' => [
            'general' => 'Configuración de plantillas de correo - General',
            'branding' => 'Configuración de plantillas de correo - Marca',
            'logging' => 'Configuración de plantillas de correo - Registro',
            'attachments' => 'Configuración de plantillas de correo - Adjuntos',
            'auth_emails' => 'Configuración de plantillas de correo - Correos de autenticación',
        ],

        'sections' => [
            'default_sender' => 'Remitente predeterminado',
            'default_sender_description' => 'La dirección de remitente predeterminada para todos los correos enviados por el plugin.',
            'additional_senders' => 'Remitentes adicionales',
            'add_additional_senders' => 'Agregar remitentes adicionales',
            'additional_senders_description' => 'Direcciones de remitente adicionales que los usuarios pueden elegir al redactar correos.',
            'localization' => 'Localización',
            'categories' => 'Categorías de plantillas',
            'logo' => 'Logo',
            'colors' => 'Colores',
            'footer_links' => 'Enlaces del pie de página',
            'add_footer_links' => 'Agregar enlaces de pie de página',
            'customer_service' => 'Atención al cliente',
            'logging' => 'Registro de correos',
            'logging_description' => 'Controle cómo se registran los correos enviados en la base de datos.',
            'cleanup' => 'Limpieza programada',
            'cleanup_description' => 'Eliminar automáticamente registros antiguos de correos enviados según un horario.',
            'attachment_rules' => 'Reglas de adjuntos',
            'attachment_rules_description' => 'Configure los límites para archivos adjuntos en correos redactados.',
            'auth_emails' => 'Anulaciones de correos de autenticación',
            'auth_emails_description' => 'Anule los correos de autenticación predeterminados de la aplicación con sus plantillas personalizadas.',
        ],

        'fields' => [
            'from_email' => 'Correo del remitente',
            'from_name' => 'Nombre del remitente',
            'sender_email' => 'Correo',
            'sender_name' => 'Nombre para mostrar',
            'sender_new' => 'Nuevo remitente',
            'default_locale' => 'Idioma predeterminado',
            'default_locale_helper' => 'El idioma predeterminado para nuevas plantillas (ej. en, hu, de).',
            'languages' => 'Idiomas disponibles',
            'language_code' => 'Código',
            'language_display' => 'Nombre para mostrar',
            'language_flag' => 'Icono de bandera',
            'language_new' => 'Nuevo idioma',
            'category_key' => 'Clave',
            'category_label' => 'Etiqueta',
            'category_new' => 'Nueva categoría',
            'logo_url' => 'URL o ruta del logo',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL absoluta o ruta a su logo de correo.',
            'logo_width' => 'Ancho (px)',
            'logo_height' => 'Alto (px)',
            'content_width' => 'Ancho del contenido (px)',
            'primary_color' => 'Color primario',
            'footer_link_label' => 'Etiqueta',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Nuevo enlace',
            'support_email' => 'Correo de soporte',
            'support_phone' => 'Teléfono de soporte',
            'enable_logging' => 'Activar registro',
            'enable_logging_helper' => 'Cuando está desactivado, no se crearán registros de correos enviados.',
            'store_rendered_body' => 'Almacenar contenido renderizado',
            'store_rendered_body_helper' => 'Guardar el HTML final de cada correo enviado. Necesario para las funciones de reenvío y vista previa.',
            'retention_days' => 'Retención (días)',
            'retention_days_helper' => 'Eliminar automáticamente los registros de correos enviados después de estos días. Deje vacío para conservarlos indefinidamente.',
            'cleanup_enabled' => 'Activar limpieza programada',
            'cleanup_enabled_helper' => 'Ejecutar automáticamente el comando de limpieza según un horario.',
            'cleanup_frequency' => 'Frecuencia de limpieza',
            'max_file_size' => 'Tamaño máximo de archivo (MB)',
            'allowed_extensions' => 'Extensiones de archivo permitidas',
            'allowed_extensions_placeholder' => 'Agregar extensión (ej. pdf)',
            'allowed_extensions_helper' => 'Extensiones de archivo permitidas para subir.',
            'override_verification' => 'Anular verificación de correo',
            'override_verification_helper' => 'Usar la plantilla "user-verify-email" en lugar del correo de verificación predeterminado de la aplicación.',
            'override_password_reset' => 'Anular restablecimiento de contraseña',
            'override_password_reset_helper' => 'Usar la plantilla "user-password-reset" en lugar del correo de restablecimiento de contraseña predeterminado de la aplicación.',
            'override_welcome' => 'Anular correo de bienvenida',
            'override_welcome_helper' => 'Enviar un correo de bienvenida usando la plantilla "user-welcome" cuando un nuevo usuario se registra.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Todos los derechos reservados.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Borrador',
            2 => 'En cola',
            3 => 'Enviado',
            4 => 'Fallido',
        ],

        'cleanup_frequency' => [
            1 => 'Diario',
            2 => 'Semanal',
            3 => 'Mensual',
        ],
    ],

];
