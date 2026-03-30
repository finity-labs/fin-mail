@php
    $content = $html ?? '';

    if (is_array($content)) {
        // Tiptap JSON document (has 'type' key) — convert to HTML via Filament's renderer
        if (isset($content['type']) || (isset($content[0]['type']))) {
            $content = \FinityLabs\FinMail\Helpers\TipTapConverter::toHtml($content);
        } else {
            // Translatable array — pick current locale
            $content = $content[app()->getLocale()] ?? reset($content) ?: '';
        }
    }

    // Resolve branding from settings
    $brandingSettings = app(\FinityLabs\FinMail\Settings\BrandingSettings::class);
    $resolvedBranding = [
        'logo' => $brandingSettings->logo,
        'logo_width' => $brandingSettings->logo_width,
        'logo_height' => $brandingSettings->logo_height,
        'content_width' => $brandingSettings->content_width,
        'primary_color' => $brandingSettings->primary_color,
        'footer_links' => $brandingSettings->footer_links,
        'customer_service_email' => $brandingSettings->customer_service_email,
        'customer_service_phone' => $brandingSettings->customer_service_phone,
    ];

    // Use passed theme or fall back to defaults
    $resolvedTheme = $theme ?? \FinityLabs\FinMail\Models\EmailTheme::defaultColors();

    // Render through the full email layout
    $fullHtml = $content
        ? view('fin-mail::email.default', [
            'body' => $content,
            'preheader' => $preheader ?? '',
            'theme' => $resolvedTheme,
            'branding' => $resolvedBranding,
        ])->render()
        : '';
@endphp

<div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg space-y-3">
    @if(!empty($subject ?? ''))
        <div class="bg-white dark:bg-gray-900 rounded-lg px-4 py-3 shadow-sm">
            <div class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">{{ __('fin-mail::fin-mail.template.fields.subject') }}</div>
            <div class="text-sm text-gray-900 dark:text-gray-100 mt-0.5">{{ $subject }}</div>
        </div>
    @endif

    @if(!empty($preheader ?? ''))
        <div class="bg-white dark:bg-gray-900 rounded-lg px-4 py-3 shadow-sm">
            <div class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">{{ __('fin-mail::fin-mail.template.fields.preheader') }}</div>
            <div class="text-sm text-gray-600 dark:text-gray-300 mt-0.5">{{ $preheader }}</div>
        </div>
    @endif

    @if($fullHtml)
        <iframe
            srcdoc="{{ $fullHtml }}"
            style="width: 100%; min-height: 600px; border: none; border-radius: 8px; background: #fff;"
            sandbox="allow-same-origin"
        ></iframe>
    @else
        <p class="text-gray-500 text-center py-8">No content to preview.</p>
    @endif
</div>
