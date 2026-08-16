<div class="space-y-4">
    {{-- Metadata --}}
    <div class="grid grid-cols-2 gap-4 text-sm">
        <div class="col-span-2">
            <span class="font-medium text-gray-500 dark:text-gray-400">{{ __('fin-mail::fin-mail.sent.columns.subject') }}:</span>
            <span class="ml-2">{{ $email->subject }}</span>
        </div>
        <div>
            <span class="font-medium text-gray-500 dark:text-gray-400">{{ __('fin-mail::fin-mail.sent.preview.from') }}</span>
            <span class="ml-2">{{ $email->sender }}</span>
        </div>
        <div>
            <span class="font-medium text-gray-500 dark:text-gray-400">{{ __('fin-mail::fin-mail.sent.preview.sent') }}</span>
            @php
                $sentAtFormatted = null;
                if ($email->sent_at) {
                    $fmt = app('fin-mail')->dateTimeFormat();
                    $sentAtFormatted = $fmt ? $email->sent_at->format($fmt) : (string) $email->sent_at;
                }
            @endphp
            <span class="ml-2">{{ $sentAtFormatted ?? __('fin-mail::fin-mail.sent.preview.sent_not_yet') }}</span>
        </div>
        <div>
            <span class="font-medium text-gray-500 dark:text-gray-400">{{ __('fin-mail::fin-mail.sent.preview.to') }}</span>
            <span class="ml-2">{{ implode(', ', $email->to ?? []) }}</span>
        </div>
        @if($email->cc)
            <div>
                <span class="font-medium text-gray-500 dark:text-gray-400">{{ __('fin-mail::fin-mail.sent.preview.cc') }}</span>
                <span class="ml-2">{{ implode(', ', $email->cc) }}</span>
            </div>
        @endif
        <div>
            <span class="font-medium text-gray-500 dark:text-gray-400">{{ __('fin-mail::fin-mail.sent.preview.status') }}</span>
            <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                {{ match($email->status->value) {
                    1 => 'bg-gray-100 text-gray-800',
                    2 => 'bg-yellow-100 text-yellow-800',
                    3 => 'bg-green-100 text-green-800',
                    4 => 'bg-red-100 text-red-800',
                    default => 'bg-gray-100 text-gray-800',
                } }}">
                {{ $email->status->getLabel() }}
            </span>
        </div>
        @if($email->template)
            <div>
                <span class="font-medium text-gray-500 dark:text-gray-400">{{ __('fin-mail::fin-mail.sent.preview.template') }}</span>
                <span class="ml-2">{{ $email->template->name }}</span>
            </div>
        @endif
    </div>

    {{-- Rendered Body --}}
    @if($email->rendered_body)
        <div class="border-t pt-4 mt-4">
            <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                <iframe
                    src="data:text/html;base64,{{ base64_encode($email->rendered_body) }}"
                    class="w-full bg-white rounded-lg shadow-lg mx-auto"
                    style="max-width: 700px; min-height: 500px; border: none;"
                    sandbox="allow-same-origin"
                ></iframe>
            </div>
        </div>
    @else
        <div class="border-t pt-4 mt-4">
            <p class="text-gray-500 text-sm italic">{!! __('fin-mail::fin-mail.sent.preview.no_body') !!}</p>
        </div>
    @endif

    {{-- Error Info --}}
    @if($email->status === \FinityLabs\FinMail\Enums\EmailStatus::Failed && ($email->metadata['error'] ?? null))
        <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4 mt-4">
            <h4 class="text-sm font-medium text-red-800 dark:text-red-200">{{ __('fin-mail::fin-mail.sent.preview.error') }}</h4>
            <p class="text-sm text-red-700 dark:text-red-300 mt-1">{{ $email->metadata['error'] }}</p>
        </div>
    @endif
</div>
