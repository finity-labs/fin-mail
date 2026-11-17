<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Helpers;

use FinityLabs\FinMail\Models\EmailTheme;

/**
 * Renders the built-in blocks through Blade views a host can replace per
 * block id (config fin-mail.block_views), or override the usual way under
 * resources/views/vendor/fin-mail/blocks.
 */
class BlockView
{
    public static function viewFor(string $blockId): string
    {
        $views = (array) config('fin-mail.block_views', []);
        $custom = $views[$blockId] ?? null;

        return is_string($custom) && $custom !== '' ? $custom : "fin-mail::blocks.{$blockId}";
    }

    /**
     * Render a block for an email. While something reads the marker, the
     * output is wrapped in it: the element styles then leave block markup
     * alone and the preheader fallback skips block text.
     *
     * @param  array<string, mixed>  $config  The block's settings
     * @param  array<string, mixed>  $data  theme, locale and id, as renderCustomBlocks() passes them
     */
    public static function render(string $blockId, array $config, array $data = []): string
    {
        $html = static::renderView($blockId, $config, $data);

        return $html === '' || ! static::marksBlocks() ? $html : InlineStyler::protect($html);
    }

    /**
     * Whether the built-in blocks wrap their HTML in the protect marker:
     * only when element styles or the preheader fallback are configured, so
     * an install that uses neither gets the plain block HTML.
     */
    public static function marksBlocks(): bool
    {
        return InlineStyler::isConfigured() || PreheaderFallback::isEnabled();
    }

    /**
     * Render a block's view without the marker, e.g. for the editor preview.
     *
     * @param  array<string, mixed>  $config
     * @param  array<string, mixed>  $data
     */
    public static function renderView(string $blockId, array $config, array $data = []): string
    {
        $theme = is_array($data['theme'] ?? null) && $data['theme'] !== []
            ? $data['theme']
            : EmailTheme::resolvedDefaultColors();

        $locale = is_string($data['locale'] ?? null) && $data['locale'] !== ''
            ? $data['locale']
            : app()->getLocale();

        return trim(view(static::viewFor($blockId), [
            'config' => $config,
            'theme' => $theme,
            'locale' => $locale,
            'id' => $blockId,
        ])->render());
    }

    /**
     * Escape a typed value for a text node. Quotes are left alone so a token
     * fallback such as {{ user.name | 'friend' }} still parses.
     */
    public static function text(mixed $value): string
    {
        return htmlspecialchars(is_scalar($value) ? (string) $value : '', ENT_NOQUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    /**
     * Rich text from a block's settings, ready for a block view: merge-tag
     * spans stripped and paragraph margins set inline, the last one zero.
     */
    public static function richText(mixed $html, string $paragraphMargin = '0 0 8px'): string
    {
        $html = trim(MergeTagStripper::strip(is_string($html) ? $html : ''));

        if (trim(strip_tags($html)) === '') {
            return '';
        }

        $pattern = '/<p(?=[\s\/>])('.InlineStyler::ATTRIBUTES_PATTERN.')>/i';
        $count = preg_match_all($pattern, $html);
        $index = 0;

        return preg_replace_callback(
            $pattern,
            function (array $matches) use (&$index, $count, $paragraphMargin): string {
                $index++;

                if (preg_match('/(?<![\w-])style\s*=/i', $matches[1])) {
                    return $matches[0];
                }

                $margin = $index === $count ? '0' : $paragraphMargin;

                return '<p'.$matches[1].' style="margin: '.$margin.';">';
            },
            $html,
        ) ?? $html;
    }

    /**
     * Whether a value is a usable CSS colour for an inline style.
     */
    public static function isColor(mixed $value): bool
    {
        return is_string($value)
            && preg_match('/^(#[0-9a-f]{3,8}|rgba?\([\d\s.,%]+\)|[a-z]+)$/i', trim($value)) === 1;
    }
}
