<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Models;

use FinityLabs\FinMail\FinMailPlugin;
use FinityLabs\FinMail\Helpers\TokenReplacer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $key
 * @property string $name
 * @property string $category
 * @property array<int, string>|null $tags
 * @property string $subject
 * @property string|null $preheader
 * @property string $body
 * @property string|null $view_path
 * @property array{address?: string, name?: string}|null $from
 * @property array{address?: string, name?: string}|null $reply_to
 * @property int|null $email_theme_id
 * @property array<string, mixed>|null $token_schema
 * @property bool $is_active
 * @property bool $is_locked
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read EmailTheme|null $theme
 * @property-read Collection<int, EmailTemplateVersion> $versions
 * @property-read Collection<int, SentEmail> $sentEmails
 */
class EmailTemplate extends Model
{
    use HasTranslations;
    use SoftDeletes;

    /** @var array<int, string> */
    public array $translatable = ['name', 'subject', 'preheader', 'body'];

    protected $fillable = [
        'key',
        'name',
        'category',
        'tags',
        'subject',
        'preheader',
        'body',
        'view_path',
        'from',
        'reply_to',
        'email_theme_id',
        'token_schema',
        'is_active',
        'is_locked',
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
            'from' => 'array',
            'reply_to' => 'array',
            'tags' => 'array',
            'is_active' => 'boolean',
            'is_locked' => 'boolean',
            'token_schema' => 'array',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Boot
    |--------------------------------------------------------------------------
    */

    protected static function booted(): void
    {
        static::deleting(function (EmailTemplate $template): bool {
            return ! $template->is_locked;
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function sentEmails(): HasMany
    {
        return $this->hasMany(SentEmail::class);
    }

    public function theme(): BelongsTo
    {
        return $this->belongsTo(EmailTheme::class, 'email_theme_id');
    }

    public function versions(): HasMany
    {
        return $this->hasMany(EmailTemplateVersion::class)->with('createdBy:id,name')->orderByDesc('version');
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }

    public function scopeByKey(Builder $query, string $key): Builder
    {
        return $query->where('key', $key);
    }

    public function scopeLocked(Builder $query): Builder
    {
        return $query->where('is_locked', true);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function isDeletable(): bool
    {
        return ! $this->is_locked;
    }

    /**
     * Find a template by its key, optionally setting the locale for translation resolution.
     */
    public static function findByKey(string $key, ?string $locale = null): ?static
    {
        /** @var static|null $template */
        $template = static::active()->byKey($key)->first();

        if ($template && $locale) {
            $template->setLocale($locale);
        }

        return $template;
    }

    /**
     * Render the template body with token replacement.
     *
     * @param  array<string, mixed>  $models  Keyed by token prefix: ['user' => $user, 'invoice' => $invoice]
     *
     * @return array{subject: string, preheader: string, body: string}
     */
    public function render(array $models = [], ?string $locale = null): array
    {
        if ($locale) {
            $this->setLocale($locale);
        }

        $replacer = app(TokenReplacer::class);

        $theme = $this->theme?->resolvedColors() ?? EmailTheme::defaultColors();
        $body = self::stripMergeTagSpans($this->body);
        $body = self::renderCustomBlocks($body, $theme);

        return [
            'subject' => $replacer->replace($this->subject, $models),
            'preheader' => $replacer->replace($this->preheader ?? '', $models),
            'body' => $replacer->replace($body, $models),
        ];
    }

    /**
     * Strip merge tag span wrappers left by the TipTap editor,
     * keeping only the inner token text.
     */
    protected static function stripMergeTagSpans(string $html): string
    {
        return preg_replace_callback(
            '/<span\s[^>]*data-type="mergeTag"[^>]*>(.*?)<\/span>/s',
            function (array $matches): string {
                $inner = trim($matches[1]);

                if ($inner !== '') {
                    return $inner;
                }

                // Atom node with no content — reconstruct {{ token }} from data-id
                if (preg_match('/data-id="([^"]+)"/', $matches[0], $idMatch)) {
                    return '{{ '.$idMatch[1].' }}';
                }

                return '';
            },
            $html,
        ) ?? $html;
    }

    /**
     * Replace custom block divs in stored HTML with their rendered output.
     *
     * @param  array<string, string>  $theme
     */
    public static function renderCustomBlocks(string $html, array $theme): string
    {
        $blocks = FinMailPlugin::getCustomBlocks();

        return preg_replace_callback(
            '/<div\s[^>]*data-type="customBlock"[^>]*>.*?<\/div>/s',
            function (array $matches) use ($blocks, $theme): string {
                $tag = $matches[0];

                if (! preg_match('/data-id="([^"]+)"/', $tag, $idMatch)) {
                    return '';
                }

                $blockId = $idMatch[1];
                $blockClass = $blocks[$blockId] ?? null;

                if (! $blockClass) {
                    return '';
                }

                $config = [];
                if (preg_match('/data-config="([^"]*)"/', $tag, $configMatch)) {
                    $config = json_decode(html_entity_decode($configMatch[1]), true) ?? [];
                }

                return $blockClass::toHtml($config, ['theme' => $theme]) ?? '';
            },
            $html,
        ) ?? $html;
    }

    /**
     * Save a version snapshot of the current state (all translations).
     */
    public function saveVersion(?int $userId = null): EmailTemplateVersion
    {
        if (! config('fin-mail.versioning.enabled')) {
            return new EmailTemplateVersion;
        }

        $latestVersion = $this->versions()->max('version') ?? 0;

        /** @var EmailTemplateVersion $version */
        $version = $this->versions()->create([
            'version' => $latestVersion + 1,
            'subject' => $this->getTranslations('subject'),
            'preheader' => $this->getTranslations('preheader'),
            'body' => $this->getTranslations('body'),
            'created_by' => $userId ?? auth()->id(),
        ]);

        // Cleanup old versions beyond max
        $max = config('fin-mail.versioning.max_versions', 50);
        $keepIds = $this->versions()
            ->orderByDesc('version')
            ->limit($max)
            ->pluck('id');

        $this->versions()
            ->whereNotIn('id', $keepIds)
            ->delete();

        return $version;
    }

    /**
     * Restore a specific version (all translations).
     */
    public function restoreVersion(int $versionNumber): bool
    {
        $version = $this->versions()->where('version', $versionNumber)->first();

        if (! $version) {
            return false;
        }

        $this->saveVersion(); // save current state before restoring

        $this->replaceTranslations('subject', $version->subject ?? []);
        $this->replaceTranslations('preheader', $version->preheader ?? []);
        $this->replaceTranslations('body', $version->body ?? []);
        $this->save();

        return true;
    }

    /*
    |--------------------------------------------------------------------------
    | Table
    |--------------------------------------------------------------------------
    */

    public function getTable(): string
    {
        return config('fin-mail.table_names.templates', 'email_templates');
    }
}
