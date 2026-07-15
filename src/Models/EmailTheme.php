<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmailTheme extends Model
{
    protected $fillable = [
        'name',
        'colors',
        'is_default',
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
            'colors' => 'array',
            'is_default' => 'boolean',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function templates(): HasMany
    {
        return $this->hasMany(EmailTemplate::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Default color schema.
     *
     * @return array<string, string>
     */
    public static function defaultColors(): array
    {
        return [
            'background' => '#f4f4f7',
            'content_bg' => '#ffffff',
            'primary' => '#4F46E5',
            'text' => '#333333',
            'text_light' => '#666666',
            'heading' => '#1a1a1a',
            'link' => '#4F46E5',
            'footer_bg' => '#f4f4f7',
            'footer_text' => '#999999',
            'button_bg' => '#4F46E5',
            'button_text' => '#ffffff',
            'border' => '#e8e8e8',
        ];
    }

    public static function getDefault(): ?static
    {
        /** @var static|null */
        return static::where('is_default', true)->first();
    }

    /**
     * Resolve the colors of the configured default theme, falling back to the
     * hardcoded defaults when no default theme has been set.
     *
     * @return array<string, string>
     */
    public static function resolvedDefaultColors(): array
    {
        return static::getDefault()?->resolvedColors() ?? static::defaultColors();
    }

    /**
     * Get a merged color set (theme colors + defaults for any missing keys).
     *
     * @return array<string, string>
     */
    public function resolvedColors(): array
    {
        $colors = array_filter(
            $this->colors ?? [],
            fn ($color): bool => is_string($color) && $color !== '',
        );

        return array_merge(static::defaultColors(), $colors);
    }

    /*
    |--------------------------------------------------------------------------
    | Table
    |--------------------------------------------------------------------------
    */

    public function getTable(): string
    {
        return config('fin-mail.table_names.themes', 'email_themes');
    }
}
