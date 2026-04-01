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
        'settings' => 'Definicoes',
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
            'content' => 'Conteudo',
            'settings' => 'Definicoes',
            'tokens' => 'Tokens',
        ],

        'fields' => [
            'name' => 'Nome',
            'key' => 'Chave',
            'key_helper' => 'Chave unica utilizada no codigo: ex., "invoice-sent"',
            'category' => 'Categoria',
            'subject' => 'Assunto',
            'subject_helper' => 'Suporta tokens: {{ user.name }}, {{ config.app.name }}',
            'preheader' => 'Pre-cabecalho',
            'preheader_helper' => 'Texto de pre-visualizacao apresentado nos clientes de email',
            'body' => 'Corpo',
            'theme' => 'Tema',
            'theme_placeholder' => 'Tema predefinido',
            'is_active' => 'Ativo',
            'is_active_helper' => 'Modelos inativos nao podem ser utilizados para envio',
            'tags' => 'Etiquetas',
            'tags_placeholder' => 'Adicionar etiquetas para organizacao',
            'from_address' => 'Email do Remetente',
            'from_name' => 'Nome do Remetente',
            'locale' => 'Idioma',
        ],

        'sections' => [
            'custom_sender' => 'Remetente Personalizado',
            'custom_sender_description' => 'Substituir o endereco de remetente predefinido para este modelo',
        ],

        'tokens' => [
            'label' => 'Tokens Disponiveis',
            'helper' => 'Documente os tokens disponiveis para este modelo. Isto ajuda os editores a saber que variaveis podem utilizar.',
            'token' => 'Token',
            'description' => 'Descricao',
            'example' => 'Exemplo',
            'token_placeholder' => 'user.name',
            'description_placeholder' => 'O nome completo do destinatario',
            'example_placeholder' => 'Joao Silva',
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
            'preview' => 'Pre-visualizar',
            'send_test' => 'Enviar Teste',
            'send_test_field' => 'Enviar para',
            'send_test_locale' => 'Idioma',
            'compose' => 'Compor Email',
            'version_history' => 'Historico de Versoes',
            'back_to_templates' => 'Voltar aos Modelos',
        ],

        'notifications' => [
            'test_sent' => 'Email de teste enviado!',
            'test_sent_body' => 'Enviado para :email',
            'test_failed' => 'Falha ao enviar email de teste',
            'saved' => 'Modelo guardado',
            'saved_body' => 'Uma versao foi guardada automaticamente.',
            'locked_skipped' => 'Modelos bloqueados ignorados',
            'locked_skipped_body' => ':count modelo(s) bloqueado(s) foram ignorados e nao eliminados.',
        ],

        'tooltips' => [
            'locked' => 'Este modelo esta bloqueado — a chave e a categoria sao apenas de leitura, a eliminacao esta impedida.',
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
        'title' => 'Compor Email',
        'title_with_name' => 'Compor: :name',

        'sections' => [
            'recipients' => 'Destinatarios',
            'content' => 'Conteudo do Email',
            'attachments' => 'Anexos',
            'tokens' => 'Tokens Disponiveis',
        ],

        'fields' => [
            'from' => 'De',
            'to' => 'Para',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => 'Introduzir enderecos de email',
            'cc_placeholder' => 'Enderecos CC',
            'bcc_placeholder' => 'Enderecos BCC',
            'locale' => 'Idioma',
            'subject' => 'Assunto',
            'preheader' => 'Pre-cabecalho',
            'body' => 'Corpo',
            'attach_files' => 'Anexar Ficheiros',
            'preheader_helper' => 'Texto de pre-visualizacao apresentado nos clientes de email antes de abrir',
            'no_tokens' => 'Nao existem tokens documentados para este modelo. Tokens como {{ user.name }} serao substituidos quando enviados via API/codigo.',
        ],

        'actions' => [
            'send' => 'Enviar Email',
            'preview' => 'Pre-visualizar',
        ],

        'confirm' => [
            'heading' => 'Confirmar Envio',
            'description' => 'Tem a certeza de que pretende enviar este email?',
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
            'to_placeholder' => 'Introduzir enderecos de email',
            'cc_placeholder' => 'Introduzir enderecos CC',
            'bcc_placeholder' => 'Introduzir enderecos BCC',
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
            'background' => 'Fundo e Disposicao',
            'background_description' => 'Cores estruturais principais da disposicao do email.',
            'typography' => 'Tipografia',
            'typography_description' => 'Cores para texto e titulos.',
            'buttons' => 'Botoes',
            'buttons_description' => 'Estilo dos botoes de acao.',
            'footer' => 'Rodape',
            'footer_description' => 'Estilo da area do rodape.',
            'preview' => 'Pre-visualizacao',
        ],

        'fields' => [
            'name' => 'Nome',
            'is_default' => 'Tema Predefinido',
            'is_default_helper' => 'O tema predefinido e aplicado a modelos que nao especificam um.',
            'page_background' => 'Fundo da Pagina',
            'content_background' => 'Fundo do Conteudo',
            'border' => 'Contorno',
            'headings' => 'Titulos',
            'body_text' => 'Texto do Corpo',
            'secondary_text' => 'Texto Secundario',
            'links' => 'Ligacoes',
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
            'default' => 'Predefinido',
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
            'status' => 'Estado',
            'sent_by_placeholder' => 'Sistema',
            'related_to' => 'Relacionado Com',
            'sent_at' => 'Enviado',
        ],

        'filters' => [
            'from' => 'De',
            'until' => 'Ate',
        ],

        'actions' => [
            'view' => 'Ver',
            'resend' => 'Reenviar',
            'resend_description' => 'Isto enviara uma nova copia do email para os destinatarios originais.',
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
            'no_rendered_body' => 'Impossivel reenviar: corpo renderizado nao armazenado. Ative logging.store_rendered_body nas definicoes.',
            'no_template' => 'O modelo original ja nao existe.',
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
            'description' => 'Os emails enviados para este registo aparecerao aqui.',
        ],

        'errors' => [
            'no_body' => 'Impossivel reenviar: corpo renderizado ou modelo nao armazenado.',
            'no_template' => 'O modelo original ja nao existe.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => 'Definicoes de Email',

        'tabs' => [
            'general' => 'Geral',
            'branding' => 'Marca',
            'logging' => 'Registo',
            'attachments' => 'Anexos',
            'auth_emails' => 'Emails de Autenticacao',
        ],

        'titles' => [
            'general' => 'Definicoes de Modelos de Email - Geral',
            'branding' => 'Definicoes de Modelos de Email - Marca',
            'logging' => 'Definicoes de Modelos de Email - Registo',
            'attachments' => 'Definicoes de Modelos de Email - Anexos',
            'auth_emails' => 'Definicoes de Modelos de Email - Emails de Autenticacao',
        ],

        'sections' => [
            'default_sender' => 'Remetente Predefinido',
            'default_sender_description' => 'O endereco "De" predefinido para todos os emails enviados pelo plugin.',
            'additional_senders' => 'Remetentes Adicionais',
            'add_additional_senders' => 'Adicionar remetentes adicionais',
            'additional_senders_description' => 'Enderecos "De" adicionais que os utilizadores podem escolher ao compor emails.',
            'localization' => 'Localizacao',
            'categories' => 'Categorias de Modelos',
            'logo' => 'Logotipo',
            'colors' => 'Cores',
            'footer_links' => 'Ligacoes do Rodape',
            'add_footer_links' => 'Adicionar links de rodapé',
            'customer_service' => 'Apoio ao Cliente',
            'logging' => 'Registo de Emails',
            'logging_description' => 'Controlar como os emails enviados sao registados na base de dados.',
            'cleanup' => 'Limpeza Programada',
            'cleanup_description' => 'Eliminar automaticamente registos antigos de emails enviados num horario definido.',
            'attachment_rules' => 'Regras de Anexos',
            'attachment_rules_description' => 'Configurar limites para anexos de ficheiros nos emails compostos.',
            'auth_emails' => 'Substituicoes de Emails de Autenticacao',
            'auth_emails_description' => 'Substituir os emails de autenticacao predefinidos da aplicacao pelos seus modelos personalizados.',
        ],

        'fields' => [
            'from_email' => 'Email do Remetente',
            'from_name' => 'Nome do Remetente',
            'sender_email' => 'Email',
            'sender_name' => 'Nome de Apresentacao',
            'sender_new' => 'Novo Remetente',
            'default_locale' => 'Idioma Predefinido',
            'default_locale_helper' => 'O idioma predefinido para novos modelos (ex., en, hu, de).',
            'languages' => 'Idiomas Disponiveis',
            'language_code' => 'Codigo',
            'language_display' => 'Nome de Apresentacao',
            'language_flag' => 'Icone de Bandeira',
            'language_new' => 'Novo Idioma',
            'category_key' => 'Chave',
            'category_label' => 'Rotulo',
            'category_new' => 'Nova Categoria',
            'logo_url' => 'URL ou Caminho do Logotipo',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => 'URL absoluto ou caminho para o logotipo do email.',
            'logo_width' => 'Largura (px)',
            'logo_height' => 'Altura (px)',
            'content_width' => 'Largura do Conteudo (px)',
            'primary_color' => 'Cor Principal',
            'footer_link_label' => 'Rotulo',
            'footer_link_url' => 'URL',
            'footer_link_new' => 'Nova Ligacao',
            'support_email' => 'Email de Suporte',
            'support_phone' => 'Telefone de Suporte',
            'enable_logging' => 'Ativar Registo',
            'enable_logging_helper' => 'Quando desativado, nenhum registo de emails enviados sera criado.',
            'store_rendered_body' => 'Armazenar Corpo Renderizado',
            'store_rendered_body_helper' => 'Guardar o HTML final de cada email enviado. Necessario para funcoes de reenvio e pre-visualizacao.',
            'retention_days' => 'Retencao (dias)',
            'retention_days_helper' => 'Eliminar automaticamente registos de emails enviados apos este numero de dias. Deixar vazio para manter indefinidamente.',
            'cleanup_enabled' => 'Ativar Limpeza Programada',
            'cleanup_enabled_helper' => 'Executar automaticamente o comando de limpeza num horario definido.',
            'cleanup_frequency' => 'Frequencia de Limpeza',
            'max_file_size' => 'Tamanho Maximo do Ficheiro (MB)',
            'allowed_extensions' => 'Extensoes de Ficheiro Permitidas',
            'allowed_extensions_placeholder' => 'Adicionar extensao (ex., pdf)',
            'allowed_extensions_helper' => 'Extensoes de ficheiro permitidas para carregamento.',
            'override_verification' => 'Substituir Email de Verificacao',
            'override_verification_helper' => 'Utilizar o modelo "user-verify-email" em vez do email de verificacao predefinido da aplicacao.',
            'override_password_reset' => 'Substituir Reposicao de Palavra-passe',
            'override_password_reset_helper' => 'Utilizar o modelo "user-password-reset" em vez do email de reposicao de palavra-passe predefinido da aplicacao.',
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
