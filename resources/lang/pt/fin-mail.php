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
        'templates' => 'Modelos',
        'themes' => 'Temas',
        'sent-emails' => 'Emails Enviados',
        'settings' => 'Definições',
    ],

    'models' => [
        'email_template' => 'Modelo de email',
        'email_templates' => 'Modelos de email',
        'email_theme' => 'Tema de email',
        'email_themes' => 'Temas de email',
        'sent_email' => 'Email enviado',
        'sent_emails' => 'Emails enviados',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Conteúdo',
            'settings' => 'Definições',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Nome',
            'key' => 'Chave',
            'key_helper' => 'Chave única utilizada no código: ex., "invoice-sent"',
            'category' => 'Categoria',
            'subject' => 'Assunto',
            'subject_helper' => 'Suporta tokens: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Pré-cabeçalho',
            'preheader_helper' => 'Texto de pré-visualização apresentado nos clientes de email',
            'body' => 'Corpo',
            'theme' => 'Tema',
            'theme_placeholder' => 'Tema predefinido',
            'is_active' => 'Ativo',
            'is_active_helper' => 'Modelos inativos não podem ser utilizados para envio',
            'tags' => 'Etiquetas',
            'tags_placeholder' => 'Adicionar etiquetas para organização',
            'from_address' => 'Email do Remetente',
            'from_name' => 'Nome do Remetente',
            'reply_to_address' => 'E-mail do destinatário',
            'reply_to_name' => 'Nome do destinatário',
            'locale' => 'Idioma',
        ],

        'sections' => [
            'custom_sender' => 'Remetente Personalizado',
            'custom_sender_description' => 'Substituir o endereço de remetente predefinido para este modelo',
            'custom_reply_to' => 'Responder para personalizado',
            'custom_reply_to_description' => 'Definir endereço de resposta para este modelo',
        ],

        'tokens' => [
            'label' => 'Tokens Disponíveis',
            'helper' => 'Documente os tokens disponíveis para este modelo. Isto ajuda os editores a saber que variáveis podem utilizar.',
            'token' => 'Token',
            'description' => 'Descrição',
            'example' => 'Exemplo',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'O nome completo do destinatário',
            'example_placeholder' => 'João Silva',
            'new_item' => 'Novo Token',
        ],

        'blocks' => [
            'button' => 'Botão',
            'button_heading' => 'Inserir botão',
            'button_label' => 'Texto do botão',
            'button_url' => 'URL',
            'button_align' => 'Alinhamento',
            'align_left' => 'Esquerda',
            'align_center' => 'Centro',
            'align_right' => 'Direita',
            'button_default_label' => 'Clique aqui',
        ],

        'columns' => [
            'locales' => 'Idiomas',
            'active' => 'Ativo',
            'locked' => 'Bloqueado',
            'sent' => 'Enviados',
            'updated_at' => 'Atualizado',
        ],

        'actions' => [
            'preview' => 'Pré-visualizar',
            'preview_heading' => 'Pré-visualizar: :record',
            'send_test' => 'Enviar Teste',
            'send_test_field' => 'Enviar para',
            'send_test_locale' => 'Idioma',
            'compose' => 'Compor Email',
            'version_history' => 'Histórico de Versões',
            'back_to_templates' => 'Voltar aos Modelos',
        ],

        'notifications' => [
            'test_sent' => 'Email de teste enviado!',
            'test_sent_body' => 'Enviado para :email',
            'test_failed' => 'Falha ao enviar email de teste',
            'saved' => 'Modelo guardado',
            'saved_body' => 'Uma versão foi guardada automaticamente.',
            'locked_skipped' => 'Modelos bloqueados ignorados',
            'locked_skipped_body' => ':count modelo(s) bloqueado(s) foram ignorados e não eliminados.',
        ],

        'tooltips' => [
            'locked' => 'Este modelo está bloqueado — a chave e a categoria são apenas de leitura, a eliminação está impedida.',
        ],

        'versioning' => [
            'date' => 'Data',
            'by' => 'Por',
            'preview' => 'Pré-visualizar',
            'restore' => 'Restaurar',
            'restore_confirm' => 'Tem a certeza de que pretende restaurar a versão :version? O conteúdo atual será guardado primeiro como uma nova versão.',
            'restored' => 'Versão :version restaurada.',
            'empty' => 'Sem histórico de versões disponível.',
        ],

        'notices' => [
            'locked' => 'Este modelo está bloqueado. Os campos chave e categoria não podem ser alterados.',
        ],

        'language_label' => 'Idioma: :locale',

        'replicate_suffix' => '(Cópia)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => 'Compor Email',
        'title_with_name' => 'Compor: :name',

        'sections' => [
            'recipients' => 'Destinatários',
            'content' => 'Conteúdo do Email',
            'attachments' => 'Anexos',
            'tokens' => 'Tokens Disponíveis',
        ],

        'fields' => [
            'from' => 'De',
            'to' => 'Para',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Introduzir endereços de email',
            'cc_placeholder' => 'Endereços CC',
            'bcc_placeholder' => 'Endereços BCC',
            'locale' => 'Idioma',
            'subject' => 'Assunto',
            'preheader' => 'Pré-cabeçalho',
            'body' => 'Corpo',
            'attach_files' => 'Anexar Ficheiros',
            'preheader_helper' => 'Texto de pré-visualização apresentado nos clientes de email antes de abrir',
            'no_tokens' => 'Não existem tokens documentados para este modelo. Tokens como {{ user.name }} serão substituídos quando enviados via API/código.',
        ],

        'actions' => [
            'send' => 'Enviar Email',
            'preview' => 'Pré-visualizar',
        ],

        'confirm' => [
            'heading' => 'Confirmar Envio',
            'description' => 'Tem a certeza de que pretende enviar este email?',
            'description_multiple' => 'Tem vários destinatários. Escolha como pretende enviar este email.',
            'send_mode_label' => 'Como deve ser enviado?',
            'send_mode_individual' => 'Enviar cada email individualmente',
            'send_mode_individual_help' => 'É enviado um email separado a cada destinatário do campo "Para", pelo que não veem os endereços uns dos outros. Os contactos em CC/BCC recebem uma cópia de cada email.',
            'send_mode_combined' => 'Enviar como um único email com vários destinatários',
            'send_mode_combined_help' => 'É enviado um único email a todos. Todos os endereços "Para" e CC ficam visíveis para todos os destinatários.',
        ],

        'notifications' => [
            'individual_sent' => 'Emails enviados',
            'individual_sent_body' => 'Foi enviado :count email individual.|Foram enviados :count emails individuais.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => 'Destinatários',
            'content' => 'Conteúdo',
            'attachments' => 'Anexos',
        ],

        'fields' => [
            'from' => 'De',
            'to' => 'Para',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Modelo',
            'subject' => 'Assunto',
            'to_placeholder' => 'Introduzir endereços de email',
            'cc_placeholder' => 'Introduzir endereços CC',
            'bcc_placeholder' => 'Introduzir endereços BCC',
            'auto_attached' => 'Ficheiros anexados automaticamente',
            'auto_attached_none' => 'Nenhum',
            'additional_attachments' => 'Anexos Adicionais',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => 'Enviar Email',
        'modal_heading' => 'Compor Email',
        'submit' => 'Enviar',

        'notifications' => [
            'sent' => 'Email enviado com sucesso',
            'sent_body' => 'Enviado para: :recipients',
            'failed' => 'Falha ao enviar email',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => 'Detalhes do Tema',
            'background' => 'Fundo e Disposição',
            'background_description' => 'Cores estruturais principais da disposição do email.',
            'typography' => 'Tipografia',
            'typography_description' => 'Cores para texto e títulos.',
            'buttons' => 'Botões',
            'buttons_description' => 'Estilo dos botões de ação.',
            'footer' => 'Rodapé',
            'footer_description' => 'Estilo da área do rodapé.',
            'preview' => 'Pré-visualização',
        ],

        'fields' => [
            'name' => 'Nome',
            'is_default' => 'Tema Predefinido',
            'is_default_helper' => 'O tema predefinido é aplicado a modelos que não especificam um.',
            'page_background' => 'Fundo da Página',
            'content_background' => 'Fundo do Conteúdo',
            'border' => 'Contorno',
            'headings' => 'Títulos',
            'body_text' => 'Texto do Corpo',
            'secondary_text' => 'Texto Secundário',
            'links' => 'Ligações',
            'button_background' => 'Fundo do Botão',
            'button_text' => 'Texto do Botão',
            'primary_accent' => 'Principal/Destaque',
            'footer_background' => 'Fundo do Rodapé',
            'footer_text' => 'Texto do Rodapé',
        ],

        'columns' => [
            'primary' => 'Principal',
            'background' => 'Fundo',
            'text' => 'Texto',
            'button' => 'Botão',
            'default' => 'Predefinido',
            'templates' => 'Modelos',
            'updated_at' => 'Atualizado',
        ],

        'replicate_suffix' => '(Cópia)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => 'Para',
            'template' => 'Modelo',
            'template_placeholder' => 'Personalizado',
            'sent_by' => 'Enviado Por',
            'subject' => 'Assunto',
            'status' => 'Estado',
            'sent_by_placeholder' => 'Sistema',
            'related_to' => 'Relacionado Com',
            'sent_at' => 'Enviado',
        ],

        'filters' => [
            'from' => 'De',
            'until' => 'Até',
        ],

        'actions' => [
            'view' => 'Ver',
            'resend' => 'Reenviar',
            'resend_description' => 'Isto enviará uma nova cópia do email para os destinatários originais.',
        ],

        'preview' => [
            'from' => 'De:',
            'to' => 'Para:',
            'cc' => 'CC:',
            'template' => 'Modelo:',
            'sent' => 'Enviado:',
            'sent_not_yet' => 'Ainda não',
            'status' => 'Estado:',
            'no_body' => 'O corpo do e-mail não foi armazenado. Ative <code>logging.store_rendered_body</code> nas definições para guardar o conteúdo do e-mail.',
            'error' => 'Detalhes do erro',
        ],
        'notifications' => [
            'resent' => 'Email reenviado com sucesso',
            'resend_failed' => 'Falha ao reenviar email',
        ],

        'errors' => [
            'no_rendered_body' => 'Impossível reenviar: corpo renderizado não armazenado. Ative logging.store_rendered_body nas definições.',
            'no_template' => 'O modelo original já não existe.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'Emails Enviados',

        'columns' => [
            'to' => 'Para',
            'template' => 'Modelo',
            'subject' => 'Assunto',
            'status' => 'Estado',
            'sent_by' => 'Enviado Por',
            'sent_by_placeholder' => 'Sistema',
            'sent_at' => 'Enviado',
        ],

        'actions' => [
            'view' => 'Ver',
            'resend' => 'Reenviar',
            'resend_confirm' => 'Tem a certeza de que pretende reenviar este email?',
        ],

        'notifications' => [
            'resent' => 'Email reenviado com sucesso',
            'resend_failed' => 'Falha ao reenviar',
        ],

        'empty' => [
            'heading' => 'Nenhum email enviado',
            'description' => 'Os emails enviados para este registo aparecerão aqui.',
        ],

        'errors' => [
            'no_body' => 'Impossível reenviar: corpo renderizado ou modelo não armazenado.',
            'no_template' => 'O modelo original já não existe.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Definições de Email',

        'tabs' => [
            'general' => 'Geral',
            'branding' => 'Marca',
            'logging' => 'Registo',
            'attachments' => 'Anexos',
            'auth_emails' => 'Emails de Autenticação',
        ],

        'titles' => [
            'general' => 'Definições de Modelos de Email - Geral',
            'branding' => 'Definições de Modelos de Email - Marca',
            'logging' => 'Definições de Modelos de Email - Registo',
            'attachments' => 'Definições de Modelos de Email - Anexos',
            'auth_emails' => 'Definições de Modelos de Email - Emails de Autenticação',
        ],

        'sections' => [
            'default_sender' => 'Remetente Predefinido',
            'default_sender_description' => 'O endereço "De" predefinido para todos os emails enviados pelo plugin.',
            'additional_senders' => 'Remetentes Adicionais',
            'add_additional_senders' => 'Adicionar remetentes adicionais',
            'additional_senders_description' => 'Endereços "De" adicionais que os utilizadores podem escolher ao compor emails.',
            'localization' => 'Localização',
            'categories' => 'Categorias de Modelos',
            'logo' => 'Logotipo',
            'colors' => 'Cores',
            'footer_links' => 'Ligações do Rodapé',
            'add_footer_links' => 'Adicionar links de rodapé',
            'customer_service' => 'Apoio ao Cliente',
            'logging' => 'Registo de Emails',
            'logging_description' => 'Controlar como os emails enviados são registados na base de dados.',
            'cleanup' => 'Limpeza Programada',
            'cleanup_description' => 'Eliminar automaticamente registos antigos de emails enviados num horário definido.',
            'attachment_rules' => 'Regras de Anexos',
            'attachment_rules_description' => 'Configurar limites para anexos de ficheiros nos emails compostos.',
            'auth_emails' => 'Substituições de Emails de Autenticação',
            'auth_emails_description' => 'Substituir os emails de autenticação predefinidos da aplicação pelos seus modelos personalizados.',
        ],

        'fields' => [
            'from_email' => 'Email do Remetente',
            'from_name' => 'Nome do Remetente',
            'sender_email' => 'Email',
            'sender_name' => 'Nome de Apresentação',
            'sender_new' => 'Novo Remetente',
            'default_locale' => 'Idioma Predefinido',
            'default_locale_helper' => 'O idioma predefinido para novos modelos (ex., en, hu, de).',
            'languages' => 'Idiomas Disponíveis',
            'language_code' => 'Código',
            'language_display' => 'Nome de Apresentação',
            'language_flag' => 'Ícone de Bandeira',
            'language_new' => 'Novo Idioma',
            'category_key' => 'Chave',
            'category_label' => 'Rótulo',
            'category_new' => 'Nova Categoria',
            'logo_url' => 'URL ou Caminho do Logotipo',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL absoluto ou caminho para o logotipo do email.',
            'logo_width' => 'Largura (px)',
            'logo_height' => 'Altura (px)',
            'content_width' => 'Largura do Conteúdo (px)',
            'primary_color' => 'Cor Principal',
            'footer_link_label' => 'Rótulo',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Nova Ligação',
            'support_email' => 'Email de Suporte',
            'support_phone' => 'Telefone de Suporte',
            'enable_logging' => 'Ativar Registo',
            'enable_logging_helper' => 'Quando desativado, nenhum registo de emails enviados será criado.',
            'store_rendered_body' => 'Armazenar Corpo Renderizado',
            'store_rendered_body_helper' => 'Guardar o HTML final de cada email enviado. Necessário para funções de reenvio e pré-visualização.',
            'retention_days' => 'Retenção (dias)',
            'retention_days_helper' => 'Eliminar automaticamente registos de emails enviados após este número de dias. Deixar vazio para manter indefinidamente.',
            'cleanup_enabled' => 'Ativar Limpeza Programada',
            'cleanup_enabled_helper' => 'Executar automaticamente o comando de limpeza num horário definido.',
            'cleanup_frequency' => 'Frequência de Limpeza',
            'max_file_size' => 'Tamanho Máximo do Ficheiro (MB)',
            'allowed_extensions' => 'Extensões de Ficheiro Permitidas',
            'allowed_extensions_placeholder' => 'Adicionar extensão (ex., pdf)',
            'allowed_extensions_helper' => 'Extensões de ficheiro permitidas para carregamento.',
            'override_verification' => 'Substituir Email de Verificação',
            'override_verification_helper' => 'Utilizar o modelo "user-verify-email" em vez do email de verificação predefinido da aplicação.',
            'override_password_reset' => 'Substituir Reposição de Palavra-passe',
            'override_password_reset_helper' => 'Utilizar o modelo "user-password-reset" em vez do email de reposição de palavra-passe predefinido da aplicação.',
            'override_welcome' => 'Substituir Email de Boas-vindas',
            'override_welcome_helper' => 'Enviar um email de boas-vindas utilizando o modelo "user-welcome" quando um novo utilizador se regista.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. Todos os direitos reservados.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => 'Rascunho',
            2 => 'Em Fila',
            3 => 'Enviado',
            4 => 'Falhado',
        ],

        'cleanup_frequency' => [
            1 => 'Diariamente',
            2 => 'Semanalmente',
            3 => 'Mensalmente',
        ],
    ],

];
