@php
    $variant = in_array($config['variant'] ?? 'info', ['info', 'warning', 'success', 'custom'], true) ? ($config['variant'] ?? 'info') : 'info';
    $content = \FinityLabs\FinMail\Helpers\BlockView::richText($config['content'] ?? '');

    if ($variant === 'custom') {
        $background = \FinityLabs\FinMail\Helpers\BlockView::isColor($config['background'] ?? null) ? $config['background'] : '#f4f4f7';
        $color = \FinityLabs\FinMail\Helpers\BlockView::isColor($config['text_color'] ?? null) ? $config['text_color'] : '#333333';
    } else {
        $defaults = \FinityLabs\FinMail\Models\EmailTheme::defaultColors();
        $background = $theme["{$variant}_bg"] ?? $defaults["{$variant}_bg"];
        $color = $theme["{$variant}_text"] ?? $defaults["{$variant}_text"];
    }
@endphp
@if($content !== '')
<table role="presentation" class="fm-callout fm-callout-{{ $variant }}" width="100%" cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin: 16px 0;">
    <tr>
        <td style="background-color: {{ $background }}; color: {{ $color }}; padding: 14px 18px; border-radius: 6px; font-size: 15px; line-height: 1.5;">{!! $content !!}</td>
    </tr>
</table>
@endif
