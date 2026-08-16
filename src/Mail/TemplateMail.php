<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Mail;

use FinityLabs\FinMail\Enums\EmailStatus;
use FinityLabs\FinMail\Helpers\TokenReplacer;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\SentEmail;
use FinityLabs\FinMail\Settings\BrandingSettings;
use FinityLabs\FinMail\Settings\GeneralSettings;
use FinityLabs\FinMail\Settings\LoggingSettings;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Factory;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\Factory as QueueFactory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\SentMessage;
use Illuminate\Queue\SerializesModels;

/**
 * Universal mailable that loads content from the database.
 *
 * Usage:
 *   Mail::to($user)->send(
 *       TemplateMail::make('invoice-sent')
 *           ->models(['user' => $user, 'invoice' => $invoice])
 *           ->attachFile($invoice->getPdfPath(), 'invoice.pdf')
 *   );
 */
class TemplateMail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    protected EmailTemplate $emailTemplate;

    /** @var array<string, mixed> */
    protected array $models = [];

    /** @var array<int, array{path: string, name: ?string, mime: ?string}> */
    protected array $fileAttachments = [];

    /** @var array{subject: string, preheader: string, body: string}|array{} */
    protected array $rendered = [];

    protected ?SentEmail $sentEmailLog = null;

    /**
     * Tri-state logging switch: null follows LoggingSettings,
     * true forces a log entry, false disables logging entirely.
     */
    protected ?bool $shouldLog = null;

    protected bool $storeRenderedBodyInLog = true;

    /**
     * The authenticated user at the time the mailable was built.
     * Serialized with the mailable so queued sends keep the dispatcher.
     */
    protected int|string|null $sentById = null;

    protected ?string $overrideSubject = null;

    protected ?string $overrideBody = null;

    protected ?string $overridePreheader = null;

    protected ?string $rawBody = null;

    protected ?string $overrideView = null;

    /** @var array{address: string, name: ?string}|null */
    protected ?array $overrideFrom = null;

    /** @var array{address: string, name: ?string}|null */
    protected ?array $overrideReplyTo = null;

    public function __construct(
        protected readonly string $templateKey,
        ?string $locale = null,
    ) {
        $this->locale = $locale;

        $template = EmailTemplate::findByKey($this->templateKey, $this->locale);

        if (! $template) {
            throw new \RuntimeException("Email template not found: {$this->templateKey}");
        }

        $this->emailTemplate = $template;

        $this->sentById = auth()->id();

        if (config('fin-mail.queue.enabled')) {
            $this->onQueue(config('fin-mail.queue.queue', 'emails'));
            if ($connection = config('fin-mail.queue.connection')) {
                $this->onConnection($connection);
            }
        }
    }

    public static function make(string $templateKey, ?string $locale = null): static
    {
        return new static($templateKey, $locale);
    }

    /**
     * Pass models for token replacement.
     *
     * @param  array<string, mixed>  $models  Keyed by token prefix
     */
    public function models(array $models): static
    {
        $this->models = $models;

        return $this;
    }

    public function attachFile(string $path, ?string $name = null, ?string $mime = null): static
    {
        $this->fileAttachments[] = compact('path', 'name', 'mime');

        return $this;
    }

    public function extraData(array $data): static
    {
        foreach ($data as $key => $value) {
            $this->with($key, $value);
        }

        return $this;
    }

    public function overrideSubject(string $subject): static
    {
        $this->overrideSubject = $subject;

        return $this;
    }

    public function overrideBody(string $body): static
    {
        $this->overrideBody = $body;

        return $this;
    }

    public function overridePreheader(string $preheader): static
    {
        $this->overridePreheader = $preheader;

        return $this;
    }

    /**
     * Send a pre-rendered HTML document verbatim, bypassing the template
     * layout, token replacement, and custom-block rendering. Used to resend
     * stored emails exactly as they originally went out.
     */
    public function rawBody(string $html): static
    {
        $this->rawBody = $html;

        return $this;
    }

    public function overrideFrom(string $address, ?string $name = null): static
    {
        $this->overrideFrom = ['address' => $address, 'name' => $name];

        return $this;
    }

    public function overrideReplyTo(string $address, ?string $name = null): static
    {
        $this->overrideReplyTo = ['address' => $address, 'name' => $name];

        return $this;
    }

    public function overrideView(string $view): static
    {
        $this->overrideView = $view;

        return $this;
    }

    /**
     * Force logging on, even when disabled in the settings.
     *
     * A log entry is created automatically when logging is enabled in the
     * settings, so calling this is only needed to override a disabled
     * setting or to hand over an externally created log record.
     */
    public function withLogging(?SentEmail $log = null): static
    {
        if ($log) {
            $this->sentEmailLog = $log;
        }

        $this->shouldLog = true;

        return $this;
    }

    /**
     * Opt out of logging for this email.
     */
    public function withoutLogging(): static
    {
        $this->sentEmailLog = null;
        $this->shouldLog = false;

        return $this;
    }

    /**
     * Log the email but never store its rendered body.
     *
     * Useful for emails containing sensitive links (password reset,
     * verification) that should not end up in the database.
     */
    public function withoutStoringRenderedBody(): static
    {
        $this->storeRenderedBodyInLog = false;

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Mailable Implementation
    |--------------------------------------------------------------------------
    */

    public function envelope(): Envelope
    {
        $rendered = $this->getRendered();

        $templateReplyTo = $this->emailTemplate->reply_to;

        $from = $this->resolveFrom();

        $replyTo = $this->overrideReplyTo
            ?? (! empty($templateReplyTo['address']) ? $templateReplyTo : null);

        return new Envelope(
            from: new Address($from['address'], $from['name'] ?? ''),
            replyTo: filled($replyTo) ? [new Address($replyTo['address'], $replyTo['name'] ?? '')] : [],
            subject: $this->overrideSubject ?? $rendered['subject'],
        );
    }

    public function content(): Content
    {
        if ($this->rawBody !== null) {
            return new Content(
                view: 'fin-mail::email.raw',
                with: array_merge(['body' => $this->rawBody], $this->viewData),
            );
        }

        $rendered = $this->getRendered();
        $themeColors = $this->emailTemplate->resolvedThemeColors();

        return new Content(
            view: $this->overrideView ?? 'fin-mail::email.default',
            with: array_merge(
                [
                    'body' => $this->overrideBody
                        ? app(TokenReplacer::class)->replace(
                            EmailTemplate::renderCustomBlocks(
                                $this->stripMergeTagSpans($this->overrideBody),
                                $themeColors,
                            ),
                            $this->models,
                        )
                        : $rendered['body'],
                    'preheader' => $this->overridePreheader !== null
                        ? app(TokenReplacer::class)->replace($this->overridePreheader, $this->models)
                        : $rendered['preheader'],
                    'theme' => $themeColors,
                    'branding' => $this->resolveBranding(),
                ],
                $this->viewData
            )
        );
    }

    /**
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return collect($this->fileAttachments)
            ->map(function (array $file): Attachment {
                $attachment = Attachment::fromPath($file['path']);

                if ($file['name'] ?? null) {
                    $attachment = $attachment->as($file['name']);
                }
                if ($file['mime'] ?? null) {
                    $attachment = $attachment->withMime($file['mime']);
                }

                return $attachment;
            })
            ->all();
    }

    /**
     * Override queue to create the log entry at dispatch time, while the
     * request context (recipients, authenticated user) is still available.
     *
     * @return mixed
     */
    public function queue(QueueFactory $queue)
    {
        $this->withLocale($this->locale, fn () => $this->ensureLogEntry());

        return parent::queue($queue);
    }

    /**
     * @param  \DateTimeInterface|\DateInterval|int  $delay
     *
     * @return mixed
     */
    public function later($delay, QueueFactory $queue)
    {
        $this->withLocale($this->locale, fn () => $this->ensureLogEntry());

        return parent::later($delay, $queue);
    }

    /**
     * Override send to update status after the email is actually delivered.
     *
     * This is called by the queue worker (or sync driver), so it runs
     * after the message has been handed to the mail transport.
     *
     * @param  Factory|Mailer  $mailer
     *
     * @return SentMessage|null
     */
    public function send($mailer)
    {
        // The log entry and stored body are rendered before parent::send()
        // gets to apply the mailable's locale, so wrap them ourselves. After
        // queue serialization the template model has lost its per-model
        // locale and would otherwise render in the worker's app locale.
        return $this->withLocale($this->locale, function () use ($mailer) {
            $this->ensureLogEntry();

            try {
                if ($this->sentEmailLog) {
                    $this->storeRenderedBody();
                }

                $result = parent::send($mailer);

                $this->sentEmailLog?->markAsSent();

                return $result;
            } catch (\Throwable $e) {
                $this->sentEmailLog?->markAsFailed($e->getMessage());

                throw $e;
            }
        });
    }

    /**
     * Create the SentEmail log entry unless one was injected, logging is
     * opted out, or logging is disabled in the settings.
     *
     * Failures are reported but never block the email from being sent.
     */
    protected function ensureLogEntry(): void
    {
        if ($this->sentEmailLog || $this->shouldLog === false) {
            return;
        }

        if ($this->shouldLog !== true && ! app(LoggingSettings::class)->enabled) {
            return;
        }

        try {
            $this->sentEmailLog = SentEmail::create([
                'email_template_id' => $this->emailTemplate->id,
                'sender' => $this->resolveFrom()['address'],
                'to' => collect($this->to)->pluck('address')->all(),
                'cc' => collect($this->cc)->pluck('address')->all(),
                'bcc' => collect($this->bcc)->pluck('address')->all(),
                'subject' => $this->overrideSubject ?? $this->getRendered()['subject'],
                'rendered_body' => null,
                'attachments' => collect($this->fileAttachments)
                    ->map(fn (array $file): array => [
                        'name' => $file['name'] ?? basename($file['path']),
                        'path' => $file['path'],
                        'source' => 'programmatic',
                    ])
                    ->all(),
                'status' => EmailStatus::Queued,
                'sent_by' => $this->sentById,
            ]);
        } catch (\Throwable $e) {
            report($e);
        }
    }

    protected function storeRenderedBody(): void
    {
        if (! $this->storeRenderedBodyInLog) {
            return;
        }

        if (! app(LoggingSettings::class)->store_rendered_body) {
            return;
        }

        try {
            $html = $this->render();
            $this->sentEmailLog->updateQuietly(['rendered_body' => $html]);
        } catch (\Throwable) {
            // Don't let rendering failures prevent the email from being sent.
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Internal
    |--------------------------------------------------------------------------
    */

    /**
     * @return array{address: string, name: ?string}
     */
    protected function resolveFrom(): array
    {
        $templateFrom = $this->emailTemplate->from;

        $mailSettings = app(GeneralSettings::class);

        return $this->overrideFrom
            ?? (! empty($templateFrom['address']) ? $templateFrom : null)
            ?? [
                'address' => $mailSettings->default_from_address,
                'name' => $mailSettings->default_from_name,
            ];
    }

    /**
     * @return array<string, mixed>
     */
    protected function resolveBranding(): array
    {
        $branding = app(BrandingSettings::class);

        return [
            'logo' => $branding->resolvedLogo(),
            'logo_width' => $branding->logo_width,
            'logo_height' => $branding->logo_height,
            'content_width' => $branding->content_width,
            'primary_color' => $branding->primary_color,
            'footer_links' => $branding->footer_links,
            'customer_service_email' => $branding->customer_service_email,
            'customer_service_phone' => $branding->customer_service_phone,
        ];
    }

    /**
     * @return array{subject: string, preheader: string, body: string}
     */
    protected function getRendered(): array
    {
        if (empty($this->rendered)) {
            $this->rendered = $this->emailTemplate->render($this->models);
        }

        return $this->rendered;
    }

    public function getTemplate(): EmailTemplate
    {
        return $this->emailTemplate;
    }

    protected function stripMergeTagSpans(string $html): string
    {
        return preg_replace_callback(
            '/<span\s[^>]*data-type="mergeTag"[^>]*>(.*?)<\/span>/s',
            function (array $matches): string {
                $inner = trim($matches[1]);

                if ($inner !== '') {
                    return $inner;
                }

                if (preg_match('/data-id="([^"]+)"/', $matches[0], $idMatch)) {
                    return '{{ '.$idMatch[1].' }}';
                }

                return '';
            },
            $html,
        ) ?? $html;
    }
}
