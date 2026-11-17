@php
    $rows = array_values(array_filter(
        (array) ($config['rows'] ?? []),
        fn ($row): bool => is_array($row) && filled($row['value'] ?? null),
    ));
    $border = $theme['border'] ?? '#e8e8e8';
    $text = $theme['text'] ?? '#333333';
    $textLight = $theme['text_light'] ?? '#666666';
    $chipBackground = $theme['background'] ?? '#f4f4f7';
    $monospace = "font-family: 'SFMono-Regular', Menlo, Consolas, 'Liberation Mono', 'Courier New', monospace;";
@endphp
@if($rows !== [])
<table role="presentation" class="fm-credentials" width="100%" cellpadding="0" cellspacing="0" border="0" style="width: 100%; border: 1px solid {{ $border }}; border-radius: 6px; border-collapse: separate; margin: 16px 0;">
    @foreach($rows as $row)
        @php($font = ($row['font'] ?? 'normal') === 'monospace' ? $monospace : '')
        <tr>
            <td style="padding: 12px 16px;{{ $loop->last ? '' : " border-bottom: 1px solid {$border};" }}">
                @if(filled($row['label'] ?? null))
                    <div style="color: {{ $textLight }}; font-size: 13px; line-height: 1.4; margin: 0 0 4px;">{!! \FinityLabs\FinMail\Helpers\BlockView::text($row['label']) !!}</div>
                @endif
                @if(! empty($row['copy']))
                    <span style="display: inline-block; padding: 6px 10px; background-color: {{ $chipBackground }}; border: 1px solid {{ $border }}; border-radius: 4px; color: {{ $text }}; font-size: 16px; line-height: 1.4; word-break: break-all; -webkit-user-select: all; user-select: all; {!! $font !!}">{!! \FinityLabs\FinMail\Helpers\BlockView::text($row['value']) !!}</span>
                @else
                    <div style="color: {{ $text }}; font-size: 16px; line-height: 1.4; word-break: break-all; {!! $font !!}">{!! \FinityLabs\FinMail\Helpers\BlockView::text($row['value']) !!}</div>
                @endif
            </td>
        </tr>
    @endforeach
</table>
@endif
