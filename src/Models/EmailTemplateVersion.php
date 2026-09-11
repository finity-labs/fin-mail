<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $email_template_id
 * @property int $version
 * @property array<string, string> $subject
 * @property array<string, string>|null $preheader
 * @property array<string, string> $body
 * @property int|string|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class EmailTemplateVersion extends Model
{
    protected $fillable = [
        'email_template_id',
        'version',
        'subject',
        'preheader',
        'body',
        'created_by',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'subject' => 'array',
            'preheader' => 'array',
            'body' => 'array',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model'), 'created_by');
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(EmailTemplate::class, 'email_template_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Get a diff summary comparing this version to another.
     *
     * @return array{subject_changed: bool, preheader_changed: bool, body_changed: bool}
     */
    public function diffFrom(self $other): array
    {
        return [
            'subject_changed' => $this->subject !== $other->subject,
            'preheader_changed' => $this->preheader !== $other->preheader,
            'body_changed' => $this->body !== $other->body,
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Table
    |--------------------------------------------------------------------------
    */

    public function getTable(): string
    {
        return config('fin-mail.table_names.versions', 'email_template_versions');
    }
}
