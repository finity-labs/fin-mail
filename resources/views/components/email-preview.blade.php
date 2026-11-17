@php
    // Rendered through the same layout, theme and language as the email
    // itself (FinityLabs\FinMail\Mail\EmailLayout). Tokens stay as they
    // are written: a preview has no models.
    $fullHtml = \FinityLabs\FinMail\Mail\EmailLayout::renderPreview(
        content: $html ?? '',
        preheader: $preheader ?? '',
        theme: $theme ?? null,
        template: $template ?? null,
        locale: $locale ?? null,
        viewPath: $viewPath ?? null,
    );
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
