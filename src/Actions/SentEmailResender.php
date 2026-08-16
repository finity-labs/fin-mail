<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Actions;

use FinityLabs\FinMail\Enums\EmailStatus;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\SentEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

/**
 * Shared resend logic for the Sent Emails table and relation manager.
 *
 * Resends the stored HTML verbatim (raw passthrough, no re-rendering) and
 * re-attaches the original files that still exist on disk, creating a fresh
 * log entry linked to the original via metadata.resent_from.
 */
class SentEmailResender
{
    /**
     * @throws \RuntimeException when the record cannot be resent
     */
    public function resend(SentEmail $record): SentEmail
    {
        if (! $record->rendered_body || ! $record->email_template_id) {
            throw new \RuntimeException(__('fin-mail::fin-mail.sent.errors.no_rendered_body'));
        }

        $template = $record->template;

        if (! $template) {
            throw new \RuntimeException(__('fin-mail::fin-mail.sent.errors.no_template'));
        }

        $mail = TemplateMail::make($template->key)
            ->overrideSubject($record->subject)
            ->rawBody($record->rendered_body);

        foreach ($record->attachments ?? [] as $attachment) {
            $path = $this->resolveAttachmentPath($attachment['path'] ?? null);

            if ($path) {
                $mail->attachFile($path, $attachment['name'] ?? null);
            }
        }

        $newLog = SentEmail::create([
            'email_template_id' => $record->email_template_id,
            'sender' => $record->sender,
            'to' => $record->to,
            'cc' => $record->cc,
            'bcc' => $record->bcc,
            'subject' => $record->subject,
            'rendered_body' => $record->rendered_body,
            'attachments' => $record->attachments,
            'status' => EmailStatus::Queued,
            'sent_by' => auth()->id(),
            'sendable_type' => $record->sendable_type,
            'sendable_id' => $record->sendable_id,
            'metadata' => ['resent_from' => $record->id],
        ]);

        $mail->withLogging($newLog);

        $message = Mail::to($record->to);

        if (! empty($record->cc)) {
            $message->cc($record->cc);
        }
        if (! empty($record->bcc)) {
            $message->bcc($record->bcc);
        }

        $message->send($mail);

        return $newLog;
    }

    /**
     * Resolve a logged attachment path back to a readable file, or null if
     * the file no longer exists. Preset attachments are logged with absolute
     * paths; uploaded ones with paths relative to the attachments disk.
     */
    protected function resolveAttachmentPath(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        if (is_file($path)) {
            return $path;
        }

        $diskPath = Storage::disk(config('fin-mail.attachments_disk', 'local'))->path($path);

        return is_file($diskPath) ? $diskPath : null;
    }
}
