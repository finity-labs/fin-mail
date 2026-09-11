<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Models;

use FinityLabs\FinMail\Enums\EmailStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int|null $email_template_id
 * @property string $sender
 * @property array<int, string> $to
 * @property array<int, string> $cc
 * @property array<int, string> $bcc
 * @property string $subject
 * @property string|null $rendered_body
 * @property array<int, array<string, string>>|null $attachments
 * @property EmailStatus $status
 * @property Carbon|null $sent_at
 * @property array<string, mixed>|null $metadata
 * @property int|string|null $sent_by
 * @property string|null $sendable_type
 * @property int|string|null $sendable_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read EmailTemplate|null $template
 * @property-read Model|null $sendable
 */
class SentEmail extends Model
{
    protected $fillable = [
        'email_template_id',
        'sender',
        'to',
        'cc',
        'bcc',
        'subject',
        'rendered_body',
        'attachments',
        'status',
        'sent_at',
        'metadata',
        'sent_by',
        'sendable_type',
        'sendable_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    */

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'to' => 'array',
            'cc' => 'array',
            'bcc' => 'array',
            'attachments' => 'array',
            'status' => EmailStatus::class,
            'sent_at' => 'datetime',
            'metadata' => 'array',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * The related model (Invoice, Order, etc.) — polymorphic.
     */
    public function sendable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * The user who sent this email.
     */
    public function sender(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model'), 'sent_by');
    }

    /**
     * The template used for this email (if any).
     */
    public function template(): BelongsTo
    {
        return $this->belongsTo(EmailTemplate::class, 'email_template_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeForModel(Builder $query, Model $model): Builder
    {
        return $query
            ->where('sendable_type', $model->getMorphClass())
            ->where('sendable_id', $model->getKey());
    }

    public function scopeRecent(Builder $query, int $days = 30): Builder
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    public function scopeStatus(Builder $query, EmailStatus $status): Builder
    {
        return $query->where('status', $status);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Get a comma-separated list of "To" recipients.
     */
    public function getRecipientsDisplayAttribute(): string
    {
        return implode(', ', $this->to ?? []);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Mark as sent.
     */
    public function markAsSent(): void
    {
        $this->update([
            'status' => EmailStatus::Sent,
            'sent_at' => now(),
        ]);
    }

    /**
     * Mark as failed.
     */
    public function markAsFailed(?string $error = null): void
    {
        $this->update([
            'status' => EmailStatus::Failed,
            'metadata' => array_merge($this->metadata ?? [], [
                'error' => $error,
                'failed_at' => now()->toIso8601String(),
            ]),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Table
    |--------------------------------------------------------------------------
    */

    public function getTable(): string
    {
        return config('fin-mail.table_names.sent', 'sent_emails');
    }
}
