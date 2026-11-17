<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Helpers;

/**
 * Builds a preheader from the email body for templates that have none in
 * the email's language. Off unless fin-mail.preheader_fallback.enabled is
 * set, because it changes the inbox preview of existing templates.
 */
class PreheaderFallback
{
    /**
     * A first paragraph this short that ends like a salutation ("Dear Anna,",
     * "Kedves Anna!") is taken as the greeting and skipped.
     */
    protected const GREETING_MAX_LENGTH = 60;

    public static function isEnabled(): bool
    {
        return (bool) config('fin-mail.preheader_fallback.enabled', false);
    }

    /**
     * The fallback preheader for a rendered body, or an empty string when
     * the fallback is off.
     */
    public static function fromBody(string $html): string
    {
        if (! static::isEnabled()) {
            return '';
        }

        return static::derive($html, (int) config('fin-mail.preheader_fallback.length', 110));
    }

    /**
     * The body's first paragraph after the greeting: tags stripped,
     * whitespace collapsed, cut at a word boundary within $length characters.
     */
    public static function derive(string $html, int $length = 110): string
    {
        $paragraphs = static::paragraphs(InlineStyler::withoutProtectedHtml($html));

        if ($paragraphs === []) {
            return '';
        }

        $text = (count($paragraphs) > 1 && static::isGreeting($paragraphs[0]))
            ? $paragraphs[1]
            : $paragraphs[0];

        return static::cut($text, max(1, $length));
    }

    /**
     * @return list<string>
     */
    protected static function paragraphs(string $html): array
    {
        // Outlook conditionals and other comments carry no visible text.
        $html = preg_replace('/<!--.*?-->/s', '', $html) ?? $html;

        if (! preg_match_all('/<p(?=[\s\/>])'.InlineStyler::ATTRIBUTES_PATTERN.'>(.*?)<\/p>/is', $html, $matches)) {
            return [];
        }

        $paragraphs = [];

        foreach ($matches[1] as $inner) {
            $text = html_entity_decode(strip_tags($inner), ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $text = trim(preg_replace('/\s+/u', ' ', $text) ?? $text);

            if ($text !== '') {
                $paragraphs[] = $text;
            }
        }

        return $paragraphs;
    }

    protected static function isGreeting(string $text): bool
    {
        return mb_strlen($text) <= static::GREETING_MAX_LENGTH
            && preg_match('/[,!:]$/u', $text) === 1;
    }

    protected static function cut(string $text, int $length): string
    {
        if (mb_strlen($text) <= $length) {
            return $text;
        }

        $slice = mb_substr($text, 0, $length);
        $lastSpace = mb_strrpos($slice, ' ');

        if ($lastSpace !== false && $lastSpace > 0) {
            $slice = mb_substr($slice, 0, $lastSpace);
        }

        return rtrim($slice, " \t,;:-–—").'…';
    }
}
