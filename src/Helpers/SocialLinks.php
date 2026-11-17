<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Helpers;

use Illuminate\Support\Str;

/**
 * The branding page's social links, ready for a layout.
 *
 * Icons are the brands' marks from Simple Icons (CC0), unmodified, in black
 * and in white. They are served from public/vendor/fin-mail/social once the
 * package assets are published; until then, links print as text.
 */
class SocialLinks
{
    /**
     * Platforms that ship with an icon.
     *
     * @var list<string>
     */
    public const ICON_PLATFORMS = ['facebook', 'instagram', 'x', 'youtube', 'tiktok'];

    public const ICON_DIRECTORY = 'vendor/fin-mail/social';

    /**
     * The platforms offered on the branding page, as key => label.
     *
     * @return array<string, string>
     */
    public static function platforms(): array
    {
        $platforms = [];

        foreach ((array) config('fin-mail.social_platforms', []) as $key => $label) {
            if (is_string($key) && $key !== '') {
                $platforms[$key] = is_string($label) && $label !== '' ? (string) __($label) : Str::headline($key);
            }
        }

        return $platforms;
    }

    /**
     * The links with a label and, where one is published, the icon to show
     * on the given background color.
     *
     * @param  mixed  $links  The branding's social_links
     *
     * @return list<array{platform: string, label: string, url: string, icon: string|null}>
     */
    public static function forLayout(mixed $links, string $background): array
    {
        $platforms = static::platforms();
        $variant = static::iconVariant($background);
        $resolved = [];

        foreach (is_array($links) ? $links : [] as $link) {
            $platform = is_array($link) && is_string($link['platform'] ?? null) ? $link['platform'] : '';
            $url = is_array($link) && is_string($link['url'] ?? null) ? trim($link['url']) : '';

            if ($platform === '' || $url === '') {
                continue;
            }

            $resolved[] = [
                'platform' => $platform,
                'label' => $platforms[$platform] ?? Str::headline($platform),
                'url' => $url,
                'icon' => static::iconUrl($platform, $variant),
            ];
        }

        return $resolved;
    }

    /**
     * The absolute URL of a platform's icon, or null when there is no icon
     * for the platform or the assets are not published.
     *
     * @param  'black'|'white'  $variant
     */
    public static function iconUrl(string $platform, string $variant): ?string
    {
        if (! in_array($platform, static::ICON_PLATFORMS, true)) {
            return null;
        }

        $path = static::ICON_DIRECTORY."/{$platform}-{$variant}.png";

        return is_file(public_path($path)) ? asset($path) : null;
    }

    /**
     * Black icons on a light background, white ones on a dark background:
     * whichever contrasts more with the color. A color that isn't a hex
     * value gets black.
     *
     * @return 'black'|'white'
     */
    public static function iconVariant(string $background): string
    {
        $hex = ltrim(trim($background), '#');

        if (preg_match('/^([0-9a-f]{3}|[0-9a-f]{6})([0-9a-f]{2})?$/i', $hex, $match) !== 1) {
            return 'black';
        }

        $hex = $match[1];

        if (strlen($hex) === 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }

        $channels = array_map(function (string $pair): float {
            $value = hexdec($pair) / 255;

            return $value <= 0.03928 ? $value / 12.92 : (($value + 0.055) / 1.055) ** 2.4;
        }, str_split($hex, 2));

        $luminance = 0.2126 * $channels[0] + 0.7152 * $channels[1] + 0.0722 * $channels[2];

        // Contrast with black beats contrast with white above ~0.179.
        return $luminance > 0.179 ? 'black' : 'white';
    }
}
