@php
    $content = \FinityLabs\FinMail\Helpers\BlockView::richText($config['content'] ?? '', '0 0 6px');
@endphp
@if($content !== '')
<div class="fm-small-print" style="color: {{ $theme['text_light'] ?? '#666666' }}; font-size: 13px; line-height: 1.5; margin: 16px 0;">{!! $content !!}</div>
@endif
