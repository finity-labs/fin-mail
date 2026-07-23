<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Actions;

use Closure;
use Filament\Notifications\Notification;
use FinityLabs\FinMail\Enums\EmailStatus;
use FinityLabs\FinMail\Events\EmailFailed;
use FinityLabs\FinMail\Events\EmailSending;
use FinityLabs\FinMail\Events\EmailSent;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\SentEmail;
use FinityLabs\FinMail\Settings\GeneralSettings;
use FinityLabs\FinMail\Settings\LoggingSettings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

/**
 * Shared service that handles the actual email sending logic.
 * Used by SendEmailAction and the ComposeEmail page.
 */
class EmailSender
{
    protected ?SentEmail $sentEmailLog = null;

    public function __construct(
        protected readonly array $data,
        protected readonly ?Model $record = null,
        protected readonly ?string $templateKey = null,
        protected readonly Closure|array|null $modelsResolver = null,
        protected readonly Closure|array|null $attachmentsResolver = null,
        protected readonly ?Closure $onSentCallback = null,
        protected readonly bool $notify = true,
    ) {}

    public function send(): bool
    {
        $this->createLogEntry();

        if ($this->sentEmailLog) {
            EmailSending::dispatch($this->sentEmailLog, $this->resolveTemplateModel());
        }

        try {
            $templateKey = $this->data['template_key'] ?? $this->templateKey;

            if (! $templateKey) {
                throw new \RuntimeException('No template key provided.');
            }

            $mail = TemplateMail::make($templateKey, $this->data['locale'] ?? null)
                ->models($this->resolveModels())
                ->overrideSubject($this->data['subject'])
                ->overrideBody($this->data['body'])
                ->withLogging($this->sentEmailLog);

            $this->applyFromOverride($mail);

            foreach ($this->resolveAttachments() as $attachment) {
                $mail->attachFile(
                    $attachment['path'],
                    $attachment['name'] ?? null,
                    $attachment['mime'] ?? null,
                );
            }

            foreach ($this->data['additional_attachments'] ?? [] as $path) {
                $disk = config('fin-mail.attachments_disk', 'local');
                $fullPath = Storage::disk($disk)->path($path);
                $mail->attachFile($fullPath, basename($path));
            }

            $message = Mail::to($this->data['to']);

            if (! empty($this->data['cc'])) {
                $message->cc($this->data['cc']);
            }
            if (! empty($this->data['bcc'])) {
                $message->bcc($this->data['bcc']);
            }

            $message->send($mail);

            if ($this->sentEmailLog) {
                EmailSent::dispatch($this->sentEmailLog, $this->resolveTemplateModel());
            }

            if ($this->onSentCallback && $this->record) {
                ($this->onSentCallback)($this->record);
            }

            if ($this->notify) {
                Notification::make()
                    ->title(__('fin-mail::fin-mail.send_action.notifications.sent'))
                    ->body(__('fin-mail::fin-mail.send_action.notifications.sent_body', ['recipients' => implode(', ', $this->data['to'])]))
                    ->success()
                    ->send();
            }

            return true;
        } catch (\Throwable $e) {
            $this->sentEmailLog?->markAsFailed($e->getMessage());

            if ($this->sentEmailLog) {
                EmailFailed::dispatch($this->sentEmailLog, $e->getMessage(), $this->resolveTemplateModel());
            }

            Notification::make()
                ->title(__('fin-mail::fin-mail.send_action.notifications.failed'))
                ->body($e->getMessage())
                ->danger()
                ->send();

            return false;
        }
    }

    protected function createLogEntry(): void
    {
        $loggingSettings = app(LoggingSettings::class);

        if (! $loggingSettings->enabled) {
            return;
        }

        $mailSettings = app(GeneralSettings::class);
        $templateKey = $this->data['template_key'] ?? $this->templateKey;

        $this->sentEmailLog = SentEmail::create([
            'email_template_id' => $templateKey
                ? EmailTemplate::where('key', $templateKey)->value('id')
                : null,
            'sender' => $this->data['from'] ?? $mailSettings->default_from_address,
            'to' => $this->data['to'],
            'cc' => $this->data['cc'] ?? [],
            'bcc' => $this->data['bcc'] ?? [],
            'subject' => $this->data['subject'],
            'rendered_body' => null,
            'attachments' => $this->buildAttachmentMetadata(),
            'status' => EmailStatus::Queued,
            'sent_by' => auth()->id(),
            'sendable_type' => $this->record?->getMorphClass(),
            'sendable_id' => $this->record?->getKey(),
        ]);
    }

    protected function applyFromOverride(TemplateMail $mail): void
    {
        $from = $this->data['from'] ?? null;
        $mailSettings = app(GeneralSettings::class);

        if ($from && $from !== $mailSettings->default_from_address) {
            $senders = collect($mailSettings->additional_senders)
                ->prepend(['address' => $mailSettings->default_from_address, 'name' => $mailSettings->default_from_name]);

            $sender = $senders->firstWhere('address', $from);

            if ($sender) {
                $mail->overrideFrom($sender['address'], $sender['name'] ?? null);
            }
        }
    }

    /**
     * @return array<int, array{name: string, path: string, source: string}>
     */
    protected function buildAttachmentMetadata(): array
    {
        $metadata = [];

        foreach ($this->resolveAttachments() as $attachment) {
            $metadata[] = [
                'name' => $attachment['name'] ?? basename($attachment['path']),
                'path' => $attachment['path'],
                'source' => 'preset',
            ];
        }

        foreach ($this->data['additional_attachments'] ?? [] as $path) {
            $metadata[] = [
                'name' => basename($path),
                'path' => $path,
                'source' => 'uploaded',
            ];
        }

        return $metadata;
    }

    /**
     * @return array<string, mixed>
     */
    protected function resolveModels(): array
    {
        if (! $this->modelsResolver) {
            return [];
        }

        return is_callable($this->modelsResolver)
            ? ($this->modelsResolver)($this->record)
            : $this->modelsResolver;
    }

    /**
     * @return array<int, array{path: string, name?: string, mime?: string}>
     */
    protected function resolveAttachments(): array
    {
        if (! $this->attachmentsResolver) {
            return [];
        }

        return is_callable($this->attachmentsResolver)
            ? ($this->attachmentsResolver)($this->record)
            : $this->attachmentsResolver;
    }

    protected function resolveTemplateModel(): ?EmailTemplate
    {
        $key = $this->data['template_key'] ?? $this->templateKey;

        return $key ? EmailTemplate::findByKey($key) : null;
    }

    public function getSentEmailLog(): ?SentEmail
    {
        return $this->sentEmailLog;
    }
}
