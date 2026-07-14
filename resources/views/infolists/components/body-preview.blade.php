<x-dynamic-component
    :component="$getEntryWrapperView()"
    :entry="$entry"
>
    @php
        $record = $getRecord();
        $locale = app()->getLocale();
        $body = $record->getTranslation('body', $locale);
        $theme = $record->resolvedThemeColors();
        $body = \FinityLabs\FinMail\Models\EmailTemplate::renderCustomBlocks($body, $theme);
    @endphp

    <iframe
        srcdoc="{{ $body }}"
        style="width: 100%; min-height: 400px; border: 1px solid #e5e7eb; border-radius: 8px; background: #fff;"
        sandbox="allow-same-origin"
    ></iframe>
</x-dynamic-component>
