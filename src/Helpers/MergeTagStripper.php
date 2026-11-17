<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Helpers;

class MergeTagStripper
{
    /**
     * Strip the <span data-type="mergeTag"> wrappers the rich editor puts
     * around tokens, keeping only the token text, so the token replacer
     * sees plain {{ token }} text.
     */
    public static function strip(string $html): string
    {
        if (! str_contains($html, 'mergeTag')) {
            return $html;
        }

        return preg_replace_callback(
            '/<span\s[^>]*data-type="mergeTag"[^>]*>(.*?)<\/span>/s',
            function (array $matches): string {
                $inner = trim($matches[1]);

                if ($inner !== '') {
                    return $inner;
                }

                // An atom node has no content: rebuild {{ token }} from data-id.
                if (preg_match('/data-id="([^"]+)"/', $matches[0], $idMatch)) {
                    return '{{ '.$idMatch[1].' }}';
                }

                return '';
            },
            $html,
        ) ?? $html;
    }
}
