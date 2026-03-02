<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => '이메일',
        'templates' => '템플릿',
        'themes' => '테마',
        'sent-emails' => '보낸 이메일',
        'settings' => '설정',
    ],

    'models' => [
        'email_template' => '이메일 템플릿',
        'email_templates' => '이메일 템플릿',
        'email_theme' => '이메일 테마',
        'email_themes' => '이메일 테마',
        'sent_email' => '보낸 이메일',
        'sent_emails' => '보낸 이메일',
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Template Resource
    |--------------------------------------------------------------------------
    */

    'template' => [
        'tabs' => [
            'content' => '내용',
            'settings' => '설정',
            'tokens' => '토큰',
        ],

        'fields' => [
            'name' => '이름',
            'key' => '키',
            'key_helper' => '코드에서 사용되는 고유 키: 예, "invoice-sent"',
            'category' => '카테고리',
            'subject' => '제목',
            'subject_helper' => '토큰 지원: {{ user.name }}, {{ config.app.name }}',
            'preheader' => '프리헤더',
            'preheader_helper' => '이메일 클라이언트에서 표시되는 미리보기 텍스트',
            'body' => '본문',
            'theme' => '테마',
            'theme_placeholder' => '기본 테마',
            'is_active' => '활성',
            'is_active_helper' => '비활성 템플릿은 발송에 사용할 수 없습니다',
            'tags' => '태그',
            'tags_placeholder' => '정리를 위한 태그 추가',
            'from_address' => '보내는 이메일 주소',
            'from_name' => '보내는 사람 이름',
            'locale' => '언어',
        ],

        'sections' => [
            'custom_sender' => '사용자 지정 발신자',
            'custom_sender_description' => '이 템플릿의 기본 발신 주소를 재정의합니다',
        ],

        'tokens' => [
            'label' => '사용 가능한 토큰',
            'helper' => '이 템플릿에서 사용할 수 있는 토큰을 문서화하세요. 편집자가 어떤 변수를 사용할 수 있는지 파악하는 데 도움이 됩니다.',
            'token' => '토큰',
            'description' => '설명',
            'example' => '예시',
            'token_placeholder' => 'user.name',
            'description_placeholder' => '수신자의 전체 이름',
            'example_placeholder' => '홍길동',
            'new_item' => '새 토큰',
        ],

        'columns' => [
            'locales' => '로케일',
            'active' => '활성',
            'locked' => '잠김',
            'sent' => '발송 수',
            'updated_at' => '수정일',
        ],

        'actions' => [
            'preview' => '미리보기',
            'send_test' => '테스트 발송',
            'send_test_field' => '받는 사람',
            'send_test_locale' => '언어',
            'compose' => '이메일 작성',
            'version_history' => '버전 기록',
            'back_to_templates' => '템플릿 목록으로 돌아가기',
        ],

        'notifications' => [
            'test_sent' => '테스트 이메일이 발송되었습니다!',
            'test_sent_body' => ':email 으로 발송됨',
            'test_failed' => '테스트 이메일 발송에 실패했습니다',
            'saved' => '템플릿이 저장되었습니다',
            'saved_body' => '버전 스냅샷이 자동으로 저장되었습니다.',
            'locked_skipped' => '잠긴 템플릿을 건너뛰었습니다',
            'locked_skipped_body' => ':count 개의 잠긴 템플릿이 건너뛰어져 삭제되지 않았습니다.',
        ],

        'tooltips' => [
            'locked' => '이 템플릿은 잠겨 있습니다 -- 키와 카테고리는 읽기 전용이며 삭제할 수 없습니다.',
        ],

        'notices' => [
            'locked' => '이 템플릿은 잠겨 있습니다. 키와 카테고리 필드를 변경할 수 없습니다.',
        ],

        'language_label' => '언어: :locale',

        'replicate_suffix' => '(사본)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Email Page
    |--------------------------------------------------------------------------
    */

    'compose' => [
        'title' => '이메일 작성',
        'title_with_name' => '작성: :name',

        'sections' => [
            'recipients' => '수신자',
            'content' => '이메일 내용',
            'attachments' => '첨부 파일',
            'tokens' => '사용 가능한 토큰',
        ],

        'fields' => [
            'from' => '보내는 사람',
            'to' => '받는 사람',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'to_placeholder' => '이메일 주소 입력',
            'cc_placeholder' => 'CC 주소',
            'bcc_placeholder' => 'BCC 주소',
            'locale' => '언어',
            'subject' => '제목',
            'preheader' => '프리헤더',
            'body' => '본문',
            'attach_files' => '파일 첨부',
            'preheader_helper' => '이메일을 열기 전에 클라이언트에서 표시되는 미리보기 텍스트',
            'no_tokens' => '이 템플릿에 대해 문서화된 토큰이 없습니다. {{ user.name }}과 같은 토큰은 API/코드를 통해 발송할 때 대체됩니다.',
        ],

        'actions' => [
            'send' => '이메일 발송',
            'preview' => '미리보기',
        ],

        'confirm' => [
            'heading' => '발송 확인',
            'description' => '이 이메일을 발송하시겠습니까?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Compose Form Builder (shared action form)
    |--------------------------------------------------------------------------
    */

    'compose_form' => [
        'sections' => [
            'recipients' => '수신자',
            'content' => '내용',
            'attachments' => '첨부 파일',
        ],

        'fields' => [
            'from' => '보내는 사람',
            'to' => '받는 사람',
            'cc' => 'CC',
            'bcc' => 'BCC',
            'template' => '템플릿',
            'subject' => '제목',
            'to_placeholder' => '이메일 주소 입력',
            'cc_placeholder' => 'CC 주소 입력',
            'bcc_placeholder' => 'BCC 주소 입력',
            'auto_attached' => '자동 첨부 파일',
            'auto_attached_none' => '없음',
            'additional_attachments' => '추가 첨부 파일',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Send Email Actions
    |--------------------------------------------------------------------------
    */

    'send_action' => [
        'label' => '이메일 발송',
        'modal_heading' => '이메일 작성',
        'submit' => '발송',

        'notifications' => [
            'sent' => '이메일이 성공적으로 발송되었습니다',
            'sent_body' => '발송 대상: :recipients',
            'failed' => '이메일 발송에 실패했습니다',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Theme Resource
    |--------------------------------------------------------------------------
    */

    'theme' => [
        'sections' => [
            'details' => '테마 상세',
            'background' => '배경 및 레이아웃',
            'background_description' => '이메일 레이아웃의 주요 구조 색상입니다.',
            'typography' => '타이포그래피',
            'typography_description' => '텍스트 및 제목의 색상입니다.',
            'buttons' => '버튼',
            'buttons_description' => '콜투액션 버튼 스타일입니다.',
            'footer' => '푸터',
            'footer_description' => '푸터 영역 스타일입니다.',
            'preview' => '미리보기',
        ],

        'fields' => [
            'name' => '이름',
            'is_default' => '기본 테마',
            'is_default_helper' => '기본 테마는 별도 테마가 지정되지 않은 템플릿에 적용됩니다.',
            'page_background' => '페이지 배경',
            'content_background' => '콘텐츠 배경',
            'border' => '테두리',
            'headings' => '제목',
            'body_text' => '본문 텍스트',
            'secondary_text' => '보조 텍스트',
            'links' => '링크',
            'button_background' => '버튼 배경',
            'button_text' => '버튼 텍스트',
            'primary_accent' => '기본/강조',
            'footer_background' => '푸터 배경',
            'footer_text' => '푸터 텍스트',
        ],

        'columns' => [
            'primary' => '기본',
            'background' => '배경',
            'text' => '텍스트',
            'button' => '버튼',
            'default' => '기본값',
            'templates' => '템플릿',
            'updated_at' => '수정일',
        ],

        'replicate_suffix' => '(사본)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Email Resource
    |--------------------------------------------------------------------------
    */

    'sent' => [
        'columns' => [
            'to' => '받는 사람',
            'template' => '템플릿',
            'template_placeholder' => '사용자 지정',
            'sent_by' => '발송자',
            'subject' => '제목',
            'status' => '상태',
            'sent_by_placeholder' => '시스템',
            'related_to' => '관련 대상',
            'sent_at' => '발송일시',
        ],

        'filters' => [
            'from' => '시작일',
            'until' => '종료일',
        ],

        'actions' => [
            'view' => '보기',
            'resend' => '재발송',
            'resend_description' => '원래 수신자에게 이메일의 새 사본이 발송됩니다.',
        ],

        'notifications' => [
            'resent' => '이메일이 성공적으로 재발송되었습니다',
            'resend_failed' => '이메일 재발송에 실패했습니다',
        ],

        'errors' => [
            'no_rendered_body' => '재발송할 수 없습니다: 렌더링된 본문이 저장되어 있지 않습니다. 설정에서 logging.store_rendered_body를 활성화하세요.',
            'no_template' => '원본 템플릿이 더 이상 존재하지 않습니다.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sent Emails Relation Manager
    |--------------------------------------------------------------------------
    */

    'relation' => [
        'title' => '보낸 이메일',

        'columns' => [
            'to' => '받는 사람',
            'template' => '템플릿',
            'subject' => '제목',
            'status' => '상태',
            'sent_by' => '발송자',
            'sent_by_placeholder' => '시스템',
            'sent_at' => '발송일시',
        ],

        'actions' => [
            'view' => '보기',
            'resend' => '재발송',
            'resend_confirm' => '이 이메일을 재발송하시겠습니까?',
        ],

        'notifications' => [
            'resent' => '이메일이 성공적으로 재발송되었습니다',
            'resend_failed' => '재발송에 실패했습니다',
        ],

        'empty' => [
            'heading' => '보낸 이메일이 없습니다',
            'description' => '이 레코드에 대해 발송된 이메일이 여기에 표시됩니다.',
        ],

        'errors' => [
            'no_body' => '재발송할 수 없습니다: 렌더링된 본문 또는 템플릿이 저장되어 있지 않습니다.',
            'no_template' => '원본 템플릿이 더 이상 존재하지 않습니다.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    'settings' => [
        'title' => '이메일 설정',

        'tabs' => [
            'general' => '일반',
            'branding' => '브랜딩',
            'logging' => '로깅',
            'attachments' => '첨부 파일',
            'auth_emails' => '인증 이메일',
        ],

        'titles' => [
            'general' => '이메일 템플릿 설정 - 일반',
            'branding' => '이메일 템플릿 설정 - 브랜딩',
            'logging' => '이메일 템플릿 설정 - 로깅',
            'attachments' => '이메일 템플릿 설정 - 첨부 파일',
            'auth_emails' => '이메일 템플릿 설정 - 인증 이메일',
        ],

        'sections' => [
            'default_sender' => '기본 발신자',
            'default_sender_description' => '플러그인에서 발송하는 모든 이메일의 기본 "보내는 사람" 주소입니다.',
            'additional_senders' => '추가 발신자',
            'additional_senders_description' => '이메일 작성 시 사용자가 선택할 수 있는 추가 "보내는 사람" 주소입니다.',
            'localization' => '현지화',
            'categories' => '템플릿 카테고리',
            'logo' => '로고',
            'colors' => '색상',
            'footer_links' => '푸터 링크',
            'customer_service' => '고객 서비스',
            'logging' => '이메일 로깅',
            'logging_description' => '발송된 이메일이 데이터베이스에 기록되는 방식을 제어합니다.',
            'cleanup' => '예약 정리',
            'cleanup_description' => '오래된 발송 이메일 기록을 일정에 따라 자동 삭제합니다.',
            'attachment_rules' => '첨부 파일 규칙',
            'attachment_rules_description' => '작성된 이메일의 파일 첨부에 대한 제한을 설정합니다.',
            'auth_emails' => '인증 이메일 재정의',
            'auth_emails_description' => '애플리케이션의 기본 인증 이메일을 사용자 지정 템플릿으로 재정의합니다.',
        ],

        'fields' => [
            'from_email' => '보내는 이메일 주소',
            'from_name' => '보내는 사람 이름',
            'sender_email' => '이메일',
            'sender_name' => '표시 이름',
            'sender_new' => '새 발신자',
            'default_locale' => '기본 로케일',
            'default_locale_helper' => '새 템플릿의 기본 언어 (예: en, hu, de).',
            'languages' => '사용 가능한 언어',
            'language_code' => '코드',
            'language_display' => '표시 이름',
            'language_flag' => '국기 아이콘',
            'language_new' => '새 언어',
            'category_key' => '키',
            'category_label' => '라벨',
            'category_new' => '새 카테고리',
            'logo_url' => '로고 URL 또는 경로',
            'logo_url_placeholder' => 'https://example.com/logo.png',
            'logo_url_helper' => '이메일 로고의 절대 URL 또는 경로.',
            'logo_width' => '너비 (px)',
            'logo_height' => '높이 (px)',
            'content_width' => '콘텐츠 너비 (px)',
            'primary_color' => '기본 색상',
            'footer_link_label' => '라벨',
            'footer_link_url' => 'URL',
            'footer_link_new' => '새 링크',
            'support_email' => '고객 지원 이메일',
            'support_phone' => '고객 지원 전화번호',
            'enable_logging' => '로깅 활성화',
            'enable_logging_helper' => '비활성화하면 발송 이메일 기록이 생성되지 않습니다.',
            'store_rendered_body' => '렌더링된 본문 저장',
            'store_rendered_body_helper' => '발송된 각 이메일의 최종 HTML을 저장합니다. 재발송 및 미리보기 기능에 필요합니다.',
            'retention_days' => '보존 기간 (일)',
            'retention_days_helper' => '지정된 일수가 지나면 발송 이메일 기록을 자동 삭제합니다. 영구 보존하려면 비워두세요.',
            'cleanup_enabled' => '예약 정리 활성화',
            'cleanup_enabled_helper' => '일정에 따라 정리 명령을 자동 실행합니다.',
            'cleanup_frequency' => '정리 주기',
            'max_file_size' => '최대 파일 크기 (MB)',
            'allowed_extensions' => '허용 파일 확장자',
            'allowed_extensions_placeholder' => '확장자 추가 (예: pdf)',
            'allowed_extensions_helper' => '업로드가 허용되는 파일 확장자.',
            'override_verification' => '이메일 인증 재정의',
            'override_verification_helper' => '애플리케이션의 기본 인증 이메일 대신 "user-verify-email" 템플릿을 사용합니다.',
            'override_password_reset' => '비밀번호 재설정 재정의',
            'override_password_reset_helper' => '애플리케이션의 기본 비밀번호 재설정 이메일 대신 "user-password-reset" 템플릿을 사용합니다.',
            'override_welcome' => '환영 이메일 재정의',
            'override_welcome_helper' => '새 사용자 가입 시 "user-welcome" 템플릿을 사용하여 환영 이메일을 발송합니다.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Layout
    |--------------------------------------------------------------------------
    */

    'email' => [
        'copyright' => '&copy; :year :app. All rights reserved.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    */

    'enums' => [
        'email_status' => [
            1 => '초안',
            2 => '대기 중',
            3 => '발송됨',
            4 => '실패',
        ],

        'cleanup_frequency' => [
            1 => '매일',
            2 => '매주',
            3 => '매월',
        ],
    ],

];
