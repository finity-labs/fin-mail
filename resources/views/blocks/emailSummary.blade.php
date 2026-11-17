@php
    $rows = array_values(array_filter(
        (array) ($config['rows'] ?? []),
        fn ($row): bool => is_array($row) && (filled($row['label'] ?? null) || filled($row['value'] ?? null)),
    ));
    $valueAlign = ($config['value_align'] ?? 'right') === 'left' ? 'left' : 'right';
    $stack = (bool) ($config['stack_on_phone'] ?? false);
    $border = $theme['border'] ?? '#e8e8e8';
    $text = $theme['text'] ?? '#333333';
    $textLight = $theme['text_light'] ?? '#666666';
@endphp
@if($rows !== [])
<table role="presentation" class="fm-summary{{ $stack ? ' fm-stack' : '' }}" width="100%" cellpadding="0" cellspacing="0" border="0" style="width: 100%; border: 1px solid {{ $border }}; border-radius: 6px; border-collapse: separate; margin: 16px 0;">
    @foreach($rows as $row)
        @php($divider = $loop->last ? '' : "border-bottom: 1px solid {$border};")
        <tr>
            <td class="fm-label" style="padding: 10px 16px; {{ $divider }} color: {{ $textLight }}; font-size: 14px; line-height: 1.4; vertical-align: top;">{!! \FinityLabs\FinMail\Helpers\BlockView::text($row['label'] ?? '') !!}</td>
            <td class="fm-value" style="padding: 10px 16px; {{ $divider }} color: {{ $text }}; font-size: 14px; line-height: 1.4; text-align: {{ $valueAlign }}; vertical-align: top;{{ ! empty($row['strong']) ? ' font-weight: 700;' : '' }}">{!! \FinityLabs\FinMail\Helpers\BlockView::text($row['value'] ?? '') !!}</td>
        </tr>
    @endforeach
</table>
@endif
