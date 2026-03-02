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
        'settings' => 'Configuracoes',
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
            'content' => 'Conteudo',
            'settings' => 'Configuracoes',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Nome',
            'key' => 'Chave',
            'key_helper' => 'Chave unica usada no codigo: ex., "invoice-sent"',
            'category' => 'Categoria',
            'subject' => 'Assunto',
            'subject_helper' => 'Suporta tokens: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Pre-cabecalho',
            'preheader_helper' => 'Texto de pre-visualizacao exibido nos clientes de e-mail',
            'body' => 'Corpo',
            'theme' => 'Tema',
            'theme_placeholder' => 'Tema padrao',
            'is_active' => 'Ativo',
            'is_active_helper' => 'Modelos inativos nao podem ser usados para envio',
            'tags' => 'Tags',
            'tags_placeholder' => 'Adicionar tags para organizacao',
            'from_address' => 'E-mail do Remetente',
            'from_name' => 'Nome do Remetente',
            'locale' => 'Idioma',
        ],

        'sections' => [
            'custom_sender' => 'Remetente Personalizado',
            'custom_sender_description' => 'Substituir o endereco de remetente padrao para este modelo',
        ],

        'tokens' => [
            'label' => 'Tokens Disponiveis',
            'helper' => 'Documente os tokens disponiveis para este modelo. Isso ajuda os editores a saber quais variaveis podem usar.',
            'token' => 'Token',
            'description' => 'Descricao',
            'example' => 'Exemplo',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'O nome completo do destinatario',
            'example_placeholder' => 'Joao Silva',
            'new_item' => 'Novo Token',
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
            'version_history' => 'Historico de Versoes',
            'back_to_templates' => 'Voltar para Modelos',
        ],

        'notifications' => [
            'test_sent' => 'E-mail de teste enviado!',
            'test_sent_body' => 'Enviado para :email',
            'test_failed' => 'Falha ao enviar e-mail de teste',
            'saved' => 'Modelo salvo',
            'saved_body' => 'Uma versao foi salva automaticamente.',
            'locked_skipped' => 'Modelos bloqueados ignorados',
            'locked_skipped_body' => ':count modelo(s) bloqueado(s) foram ignorados e nao excluidos.',
        ],

        'tooltips' => [
            'locked' => 'Este modelo esta bloqueado — a chave e a categoria sao somente leitura, a exclusao esta impedida.',
        ],

        'notices' => [
            'locked' => 'Este modelo esta bloqueado. Os campos chave e categoria nao podem ser alterados.',
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
        'title' => 'Compor E-mail',
        'title_with_name' => 'Compor: :name',

        'sections' => [
            'recipients' => 'Destinatarios',
            'content' => 'Conteudo do E-mail',
            'attachments' => 'Anexos',
            'tokens' => 'Tokens Disponiveis',
        ],

        'fields' => [
            'from' => 'De',
            'to' => 'Para',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Digite os enderecos de e-mail',
            'cc_placeholder' => 'Enderecos CC',
            'bcc_placeholder' => 'Enderecos BCC',
            'locale' => 'Idioma',
            'subject' => 'Assunto',
            'preheader' => 'Pre-cabecalho',
            'body' => 'Corpo',
            'attach_files' => 'Anexar Arquivos',
            'preheader_helper' => 'Texto de pre-visualizacao exibido nos clientes de e-mail antes de abrir',
            'no_tokens' => 'Nenhum token documentado para este modelo. Tokens como {{ user.name }} serao substituidos quando enviados via API/codigo.',
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
            'recipients' => 'Destinatarios',
            'content' => 'Conteudo',
            'attachments' => 'Anexos',
        ],

        'fields' => [
            'from' => 'De',
            'to' => 'Para',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => 'Modelo',
            'subject' => 'Assunto',
            'to_placeholder' => 'Digite os enderecos de e-mail',
            'cc_placeholder' => 'Digite os enderecos CC',
            'bcc_placeholder' => 'Digite os enderecos BCC',
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
            'typography_description' => 'Cores para texto e titulos.',
            'buttons' => 'Botoes',
            'buttons_description' => 'Estilo dos botoes de acao.',
            'footer' => 'Rodape',
            'footer_description' => 'Estilo da area do rodape.',
            'preview' => 'Visualizacao',
        ],

        'fields' => [
            'name' => 'Nome',
            'is_default' => 'Tema Padrao',
            'is_default_helper' => 'O tema padrao e aplicado a modelos que nao especificam um.',
            'page_background' => 'Fundo da Pagina',
            'content_background' => 'Fundo do Conteudo',
            'border' => 'Borda',
            'headings' => 'Titulos',
            'body_text' => 'Texto do Corpo',
            'secondary_text' => 'Texto Secundario',
            'links' => 'Links',
            'button_background' => 'Fundo do Botao',
            'button_text' => 'Texto do Botao',
            'primary_accent' => 'Principal/Destaque',
            'footer_background' => 'Fundo do Rodape',
            'footer_text' => 'Texto do Rodape',
        ],

        'columns' => [
            'primary' => 'Principal',
            'background' => 'Fundo',
            'text' => 'Texto',
            'button' => 'Botao',
            'default' => 'Padrao',
            'templates' => 'Modelos',
            'updated_at' => 'Atualizado',
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
            'until' => 'Ate',
        ],

        'actions' => [
            'view' => 'Ver',
            'resend' => 'Reenviar',
            'resend_description' => 'Isso enviara uma nova copia do e-mail para os destinatarios originais.',
        ],

        'notifications' => [
            'resent' => 'E-mail reenviado com sucesso',
            'resend_failed' => 'Falha ao reenviar e-mail',
        ],

        'errors' => [
            'no_rendered_body' => 'Nao e possivel reenviar: corpo renderizado nao armazenado. Ative logging.store_rendered_body nas configuracoes.',
            'no_template' => 'O modelo original nao existe mais.',
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
            'description' => 'E-mails enviados para este registro aparecerao aqui.',
        ],

        'errors' => [
            'no_body' => 'Nao e possivel reenviar: corpo renderizado ou modelo nao armazenado.',
            'no_template' => 'O modelo original nao existe mais.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Configuracoes de E-mail',

        'tabs' => [
            'general' => 'Geral',
            'branding' => 'Marca',
            'logging' => 'Registro',
            'attachments' => 'Anexos',
            'auth_emails' => 'E-mails de Autenticacao',
        ],

        'titles' => [
            'general' => 'Configuracoes de Modelos de E-mail - Geral',
            'branding' => 'Configuracoes de Modelos de E-mail - Marca',
            'logging' => 'Configuracoes de Modelos de E-mail - Registro',
            'attachments' => 'Configuracoes de Modelos de E-mail - Anexos',
            'auth_emails' => 'Configuracoes de Modelos de E-mail - E-mails de Autenticacao',
        ],

        'sections' => [
            'default_sender' => 'Remetente Padrao',
            'default_sender_description' => 'O endereco "De" padrao para todos os e-mails enviados pelo plugin.',
            'additional_senders' => 'Remetentes Adicionais',
            'additional_senders_description' => 'Enderecos "De" adicionais que os usuarios podem escolher ao compor e-mails.',
            'localization' => 'Localizacao',
            'categories' => 'Categorias de Modelos',
            'logo' => 'Logotipo',
            'colors' => 'Cores',
            'footer_links' => 'Links do Rodape',
            'customer_service' => 'Atendimento ao Cliente',
            'logging' => 'Registro de E-mails',
            'logging_description' => 'Controlar como os e-mails enviados sao registrados no banco de dados.',
            'cleanup' => 'Limpeza Programada',
            'cleanup_description' => 'Excluir automaticamente registros antigos de e-mails enviados em um horario definido.',
            'attachment_rules' => 'Regras de Anexos',
            'attachment_rules_description' => 'Configurar limites para anexos de arquivos nos e-mails compostos.',
            'auth_emails' => 'Substituicoes de E-mails de Autenticacao',
            'auth_emails_description' => 'Substituir os e-mails de autenticacao padrao do aplicativo pelos seus modelos personalizados.',
        ],

        'fields' => [
            'from_email' => 'E-mail do Remetente',
            'from_name' => 'Nome do Remetente',
            'sender_email' => 'E-mail',
            'sender_name' => 'Nome de Exibicao',
            'sender_new' => 'Novo Remetente',
            'default_locale' => 'Idioma Padrao',
            'default_locale_helper' => 'O idioma padrao para novos modelos (ex., en, hu, de).',
            'languages' => 'Idiomas Disponiveis',
            'language_code' => 'Codigo',
            'language_display' => 'Nome de Exibicao',
            'language_flag' => 'Icone de Bandeira',
            'language_new' => 'Novo Idioma',
            'category_key' => 'Chave',
            'category_label' => 'Rotulo',
            'category_new' => 'Nova Categoria',
            'logo_url' => 'URL ou Caminho do Logotipo',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL absoluta ou caminho para o logotipo do e-mail.',
            'logo_width' => 'Largura (px)',
            'logo_height' => 'Altura (px)',
            'content_width' => 'Largura do Conteudo (px)',
            'primary_color' => 'Cor Principal',
            'footer_link_label' => 'Rotulo',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Novo Link',
            'support_email' => 'E-mail de Suporte',
            'support_phone' => 'Telefone de Suporte',
            'enable_logging' => 'Ativar Registro',
            'enable_logging_helper' => 'Quando desativado, nenhum registro de e-mails enviados sera criado.',
            'store_rendered_body' => 'Armazenar Corpo Renderizado',
            'store_rendered_body_helper' => 'Salvar o HTML final de cada e-mail enviado. Necessario para funcoes de reenvio e visualizacao.',
            'retention_days' => 'Retencao (dias)',
            'retention_days_helper' => 'Excluir automaticamente registros de e-mails enviados apos esse numero de dias. Deixe vazio para manter indefinidamente.',
            'cleanup_enabled' => 'Ativar Limpeza Programada',
            'cleanup_enabled_helper' => 'Executar automaticamente o comando de limpeza em um horario definido.',
            'cleanup_frequency' => 'Frequencia de Limpeza',
            'max_file_size' => 'Tamanho Maximo do Arquivo (MB)',
            'allowed_extensions' => 'Extensoes de Arquivo Permitidas',
            'allowed_extensions_placeholder' => 'Adicionar extensao (ex., pdf)',
            'allowed_extensions_helper' => 'Extensoes de arquivo permitidas para upload.',
            'override_verification' => 'Substituir E-mail de Verificacao',
            'override_verification_helper' => 'Usar o modelo "user-verify-email" em vez do e-mail de verificacao padrao do aplicativo.',
            'override_password_reset' => 'Substituir Redefinicao de Senha',
            'override_password_reset_helper' => 'Usar o modelo "user-password-reset" em vez do e-mail de redefinicao de senha padrao do aplicativo.',
            'override_welcome' => 'Substituir E-mail de Boas-vindas',
            'override_welcome_helper' => 'Enviar um e-mail de boas-vindas usando o modelo "user-welcome" quando um novo usuario se cadastrar.',
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
