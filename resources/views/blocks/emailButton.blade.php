@php
    $label = $config['label'] ?? __('fin-mail::fin-mail.template.blocks.button_default_label');
    $url = $config['url'] ?? '#';
    $align = \FinityLabs\FinMail\Editors\Blocks\ButtonBlock::align($config);
    [$background, $color, $border] = \FinityLabs\FinMail\Editors\Blocks\ButtonBlock::colors($config, $theme);
    $box = $border !== null ? "border: 2px solid {$border}; padding: 10px 22px;" : 'padding: 12px 24px;';
@endphp
<div style="text-align: {{ $align }}; padding: 16px 0;">
    <a href="{{ $url }}" style="display: inline-block; background-color: {{ $background }}; color: {{ $color }}; {{ $box }} border-radius: 6px; font-size: 16px; font-weight: 600; text-decoration: none; mso-padding-alt: 0;" target="_blank">
        <!--[if mso]><i style="mso-font-width: -100%; mso-text-raise: 18pt;">&nbsp;</i><![endif]-->
        <span style="mso-text-raise: 9pt;">{{ $label }}</span>
        <!--[if mso]><i style="mso-font-width: -100%;">&nbsp;</i><![endif]-->
    </a>
</div>
