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
        'sent-emails' => 'E-mails Enviados',
        'settings' => 'Configurações',
    ],

    'models' => [
        'email_template' => 'Modelo de e-mail',
        'email_templates' => 'Modelos de e-mail',
        'email_theme' => 'Tema de e-mail',
        'email_themes' => 'Temas de e-mail',
        'sent_email' => 'E-mail enviado',
        'sent_emails' => 'E-mails enviados',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => 'Conteúdo',
            'settings' => 'Configurações',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Nome',
            'key' => 'Chave',
            'key_helper' => 'Chave única usada no código: ex., "invoice-sent"',
            'category' => 'Categoria',
            'subject' => 'Assunto',
            'subject_helper' => 'Suporta tokens: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Pré-cabecalho',
            'preheader_helper' => 'Texto de pre-visualização exibido nos clientes de e-mail',
            'body' => 'Corpo',
            'theme' => 'Tema',
            'theme_placeholder' => 'Tema padrão',
            'is_active' => 'Ativo',
            'is_active_helper' => 'Modelos inativos não podem ser usados para envio',
            'tags' => 'Tags',
            'tags_placeholder' => 'Adicionar tags para organização',
            'from_address' => 'E-mail do Remetente',
            'from_name' => 'Nome do Remetente',
            'locale' => 'Idioma',
        ],

        'sections' => [
            'custom_sender' => 'Remetente Personalizado',
            'custom_sender_description' => 'Substituir o endereço de remetente padrão para este modelo',
        ],

        'tokens' => [
            'label' => 'Tokens Disponíveis',
            'helper' => 'Documente os tokens disponíveis para este modelo. Isso ajuda os editores a saber quais variáveis podem usar.',
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
            'preview' => 'Visualizar',
            'send_test' => 'Enviar Teste',
            'send_test_field' => 'Enviar para',
            'send_test_locale' => 'Idioma',
            'compose' => 'Compor E-mail',
            'version_history' => 'Histórico de Versões',
            'back_to_templates' => 'Voltar para Modelos',
        ],

        'notifications' => [
            'test_sent' => 'E-mail de teste enviado!',
            'test_sent_body' => 'Enviado para :email',
            'test_failed' => 'Falha ao enviar e-mail de teste',
            'saved' => 'Modelo salvo',
            'saved_body' => 'Uma versão foi salva automaticamente.',
            'locked_skipped' => 'Modelos bloqueados ignorados',
            'locked_skipped_body' => ':count modelo(s) bloqueado(s) foram ignorados e não excluídos.',
        ],

        'tooltips' => [
            'locked' => 'Este modelo está bloqueado — a chave e a categoria são somente leitura, a exclusão está impedida.',
        ],

        'versioning' => [
            'date' => 'Data',
            'by' => 'Por',
            'preview' => 'Pré-visualizar',
            'restore' => 'Restaurar',
            'restore_confirm' => 'Tem certeza de que deseja restaurar a versão :version? O conteúdo atual será salvo primeiro como uma nova versão.',
            'restored' => 'Versão :version restaurada.',
            'empty' => 'Nenhum histórico de versões disponível.',
        ],

        'notices' => [
            'locked' => 'Este modelo esta bloqueado. Os campos chave e categoria não podem ser alterados.',
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
        'title' => 'Compor E-mail',
        'title_with_name' => 'Compor: :name',

        'sections' => [
            'recipients' => 'Destinatários',
            'content' => 'Conteúdo do E-mail',
            'attachments' => 'Anexos',
            'tokens' => 'Tokens Disponíveis',
        ],

        'fields' => [
            'from' => 'De',
            'to' => 'Para',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Digite os endereços de e-mail',
            'cc_placeholder' => 'Endereços CC',
            'bcc_placeholder' => 'Endereços BCC',
            'locale' => 'Idioma',
            'subject' => 'Assunto',
            'preheader' => 'Pre-cabecalho',
            'body' => 'Corpo',
            'attach_files' => 'Anexar Arquivos',
            'preheader_helper' => 'Texto de pre-visualização exibido nos clientes de e-mail antes de abrir',
            'no_tokens' => 'Nenhum token documentado para este modelo. Tokens como {{ user.name }} serão substituidos quando enviados via API/código.',
        ],

        'actions' => [
            'send' => 'Enviar E-mail',
            'preview' => 'Visualizar',
        ],

        'confirm' => [
            'heading' => 'Confirmar Envio',
            'description' => 'Tem certeza de que deseja enviar este e-mail?',
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
            'to_placeholder' => 'Digite os endereços de e-mail',
            'cc_placeholder' => 'Digite os endereços CC',
            'bcc_placeholder' => 'Digite os endereços BCC',
            'auto_attached' => 'Arquivos anexados automaticamente',
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
        'label' => 'Enviar E-mail',
        'modal_heading' => 'Compor E-mail',
        'submit' => 'Enviar',

        'notifications' => [
            'sent' => 'E-mail enviado com sucesso',
            'sent_body' => 'Enviado para: :recipients',
            'failed' => 'Falha ao enviar e-mail',
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
            'background' => 'Fundo e Layout',
            'background_description' => 'Cores estruturais principais do layout do e-mail.',
            'typography' => 'Tipografia',
            'typography_description' => 'Cores para texto e títulos.',
            'buttons' => 'Botões',
            'buttons_description' => 'Estilo dos botões de ação.',
            'footer' => 'Rodapé',
            'footer_description' => 'Estilo da area do rodapé.',
            'preview' => 'Visualização',
        ],

        'fields' => [
            'name' => 'Nome',
            'is_default' => 'Tema Padrão',
            'is_default_helper' => 'O tema padrão é aplicado a modelos que não especificam um.',
            'page_background' => 'Fundo da Página',
            'content_background' => 'Fundo do Conteúdo',
            'border' => 'Borda',
            'headings' => 'Títulos',
            'body_text' => 'Texto do Corpo',
            'secondary_text' => 'Texto Secundário',
            'links' => 'Links',
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
            'default' => 'Padrão',
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
            'status' => 'Status',
            'sent_by_placeholder' => 'Sistema',
            'related_to' => 'Relacionado a',
            'sent_at' => 'Enviado',
        ],

        'filters' => [
            'from' => 'De',
            'until' => 'Até',
        ],

        'actions' => [
            'view' => 'Ver',
            'resend' => 'Reenviar',
            'resend_description' => 'Isso enviará uma nova cópia do e-mail para os destinatários originais.',
        ],

        'preview' => [
            'from' => 'De:',
            'to' => 'Para:',
            'cc' => 'CC:',
            'template' => 'Modelo:',
            'sent' => 'Enviado:',
            'sent_not_yet' => 'Ainda não',
            'status' => 'Status:',
            'no_body' => 'O corpo do e-mail não foi armazenado. Habilite <code>logging.store_rendered_body</code> nas configurações para salvar o conteúdo do e-mail.',
            'error' => 'Detalhes do erro',
        ],
        'notifications' => [
            'resent' => 'E-mail reenviado com sucesso',
            'resend_failed' => 'Falha ao reenviar e-mail',
        ],

        'errors' => [
            'no_rendered_body' => 'Não é possível reenviar: corpo renderizado não armazenado. Ative logging.store_rendered_body nas configurações.',
            'no_template' => 'O modelo original não existe mais.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => 'E-mails Enviados',

        'columns' => [
            'to' => 'Para',
            'template' => 'Modelo',
            'subject' => 'Assunto',
            'status' => 'Status',
            'sent_by' => 'Enviado Por',
            'sent_by_placeholder' => 'Sistema',
            'sent_at' => 'Enviado',
        ],

        'actions' => [
            'view' => 'Ver',
            'resend' => 'Reenviar',
            'resend_confirm' => 'Tem certeza de que deseja reenviar este e-mail?',
        ],

        'notifications' => [
            'resent' => 'E-mail reenviado com sucesso',
            'resend_failed' => 'Falha ao reenviar',
        ],

        'empty' => [
            'heading' => 'Nenhum e-mail enviado',
            'description' => 'E-mails enviados para este registro aparecerão aqui.',
        ],

        'errors' => [
            'no_body' => 'Não é possível reenviar: corpo renderizado ou modelo não armazenado.',
            'no_template' => 'O modelo original não existe mais.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Configurações de E-mail',

        'tabs' => [
            'general' => 'Geral',
            'branding' => 'Marca',
            'logging' => 'Registro',
            'attachments' => 'Anexos',
            'auth_emails' => 'E-mails de Autenticação',
        ],

        'titles' => [
            'general' => 'Configurações de Modelos de E-mail - Geral',
            'branding' => 'Configurações de Modelos de E-mail - Marca',
            'logging' => 'Configurações de Modelos de E-mail - Registro',
            'attachments' => 'Configurações de Modelos de E-mail - Anexos',
            'auth_emails' => 'Configurações de Modelos de E-mail - E-mails de Autenticação',
        ],

        'sections' => [
            'default_sender' => 'Remetente Padrão',
            'default_sender_description' => 'O endereço "De" padrão para todos os e-mails enviados pelo plugin.',
            'additional_senders' => 'Remetentes Adicionais',
            'add_additional_senders' => 'Adicionar remetentes adicionais',
            'additional_senders_description' => 'Endereços "De" adicionais que os usuários podem escolher ao compor e-mails.',
            'localization' => 'Localização',
            'categories' => 'Categorias de Modelos',
            'logo' => 'Logotipo',
            'colors' => 'Cores',
            'footer_links' => 'Links do Rodapé',
            'add_footer_links' => 'Adicionar links de rodapé',
            'customer_service' => 'Atendimento ao Cliente',
            'logging' => 'Registro de E-mails',
            'logging_description' => 'Controlar como os e-mails enviados são registrados no banco de dados.',
            'cleanup' => 'Limpeza Programada',
            'cleanup_description' => 'Excluir automaticamente registros antigos de e-mails enviados em um horário definido.',
            'attachment_rules' => 'Regras de Anexos',
            'attachment_rules_description' => 'Configurar limites para anexos de arquivos nos e-mails compostos.',
            'auth_emails' => 'Substituições de E-mails de Autenticação',
            'auth_emails_description' => 'Substituir os e-mails de autenticação padrão do aplicativo pelos seus modelos personalizados.',
        ],

        'fields' => [
            'from_email' => 'E-mail do Remetente',
            'from_name' => 'Nome do Remetente',
            'sender_email' => 'E-mail',
            'sender_name' => 'Nome de Exibição',
            'sender_new' => 'Novo Remetente',
            'default_locale' => 'Idioma Padrão',
            'default_locale_helper' => 'O idioma padrão para novos modelos (ex., en, hu, de).',
            'languages' => 'Idiomas Disponíveis',
            'language_code' => 'Codigo',
            'language_display' => 'Nome de Exibição',
            'language_flag' => 'Icone de Bandeira',
            'language_new' => 'Novo Idioma',
            'category_key' => 'Chave',
            'category_label' => 'Rótulo',
            'category_new' => 'Nova Categoria',
            'logo_url' => 'URL ou Caminho do Logotipo',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL absoluta ou caminho para o logotipo do e-mail.',
            'logo_width' => 'Largura (px)',
            'logo_height' => 'Altura (px)',
            'content_width' => 'Largura do Conteúdo (px)',
            'primary_color' => 'Cor Principal',
            'footer_link_label' => 'Rótulo',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Novo Link',
            'support_email' => 'E-mail de Suporte',
            'support_phone' => 'Telefone de Suporte',
            'enable_logging' => 'Ativar Registro',
            'enable_logging_helper' => 'Quando desativado, nenhum registro de e-mails enviados será criado.',
            'store_rendered_body' => 'Armazenar Corpo Renderizado',
            'store_rendered_body_helper' => 'Salvar o HTML final de cada e-mail enviado. Necessário para funções de reenvio e visualização.',
            'retention_days' => 'Retenção (dias)',
            'retention_days_helper' => 'Excluir automaticamente registros de e-mails enviados apos esse numero de dias. Deixe vazio para manter indefinidamente.',
            'cleanup_enabled' => 'Ativar Limpeza Programada',
            'cleanup_enabled_helper' => 'Executar automaticamente o comando de limpeza em um horário definido.',
            'cleanup_frequency' => 'Frequência de Limpeza',
            'max_file_size' => 'Tamanho Máximo do Arquivo (MB)',
            'allowed_extensions' => 'Extensões de Arquivo Permitidas',
            'allowed_extensions_placeholder' => 'Adicionar extensão (ex., pdf)',
            'allowed_extensions_helper' => 'Extensões de arquivo permitidas para upload.',
            'override_verification' => 'Substituir E-mail de Verificação',
            'override_verification_helper' => 'Usar o modelo "user-verify-email" em vez do e-mail de verificação padrão do aplicativo.',
            'override_password_reset' => 'Substituir Redefinição de Senha',
            'override_password_reset_helper' => 'Usar o modelo "user-password-reset" em vez do e-mail de redefinição de senha padrão do aplicativo.',
            'override_welcome' => 'Substituir E-mail de Boas-vindas',
            'override_welcome_helper' => 'Enviar um e-mail de boas-vindas usando o modelo "user-welcome" quando um novo usuário se cadastrar.',
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
            2 => 'Na Fila',
            3 => 'Enviado',
            4 => 'Falhou',
        ],

        'cleanup_frequency' => [
            1 => 'Diariamente',
            2 => 'Semanalmente',
            3 => 'Mensalmente',
        ],
    ],

];
