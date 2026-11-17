<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Helpers;

class InlineStyler
{
    /**
     * Wraps HTML whose markup the element-style pass must leave alone. The
     * built-in blocks wrap themselves; a host wraps its own block or token
     * HTML with protect().
     */
    public const PROTECT_START = '<!--fm-block-->';

    public const PROTECT_END = '<!--/fm-block-->';

    /**
     * The attributes of a tag. A quoted value may hold a ">".
     */
    public const ATTRIBUTES_PATTERN = '(?:[^>"\']++|"[^"]*+"|\'[^\']*+\')*+';

    /**
     * Elements that never have a closing tag.
     *
     * @var list<string>
     */
    protected const VOID_ELEMENTS = ['area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'param', 'source', 'track', 'wbr'];

    /**
     * Elements whose last child ends the body together with them.
     *
     * @var list<string>
     */
    protected const CONTAINER_ELEMENTS = ['ul', 'ol', 'li', 'div', 'blockquote'];

    /**
     * Inline theme styles on HTML elements in the email body.
     *
     * Many email clients strip <style> blocks, so CSS classes alone
     * won't work. This method adds inline style attributes to elements
     * that need theme colors applied.
     *
     * @param  array<string, string>  $theme
     */
    public static function apply(string $html, array $theme): string
    {
        if (trim($html) === '') {
            return $html;
        }

        $html = static::applyElementStyles($html, $theme);
        $html = static::inlineLinkStyles($html, $theme);
        $html = static::inlineButtonStyles($html, $theme);

        return static::removeMarkers($html);
    }

    /**
     * Whether element styles or one of the rules are configured. Until then
     * the pass does nothing and the built-in blocks don't mark themselves.
     */
    public static function isConfigured(): bool
    {
        $rules = (array) config('fin-mail.element_style_rules', []);

        return array_filter((array) config('fin-mail.element_styles', [])) !== []
            || ! empty($rules['last_element_margin'])
            || ! empty($rules['bare_url_break']);
    }

    /**
     * Mark HTML so the element-style pass leaves its markup alone, e.g. the
     * HTML of a listing card passed in as a token value.
     */
    public static function protect(string $html): string
    {
        return static::PROTECT_START.$html.static::PROTECT_END;
    }

    /**
     * The HTML with every protected part removed.
     */
    public static function withoutProtectedHtml(string $html): string
    {
        if (! str_contains($html, static::PROTECT_START)) {
            return $html;
        }

        return collect(static::segments($html))
            ->reject(fn (array $segment): bool => $segment['protected'])
            ->pluck('html')
            ->implode('');
    }

    public static function removeMarkers(string $html): string
    {
        return str_replace([static::PROTECT_START, static::PROTECT_END], '', $html);
    }

    /**
     * Add the configured element styles (config fin-mail.element_styles) to
     * every element outside the protected parts, plus the optional
     * last-element and bare-URL rules. Only properties an element doesn't
     * already carry are added, in front of the ones it has, so a style typed
     * into the body wins.
     *
     * @param  array<string, string>  $theme
     */
    public static function applyElementStyles(string $html, array $theme): string
    {
        $styles = static::elementStyles($theme);
        $rules = (array) config('fin-mail.element_style_rules', []);
        $breakBareUrls = (bool) ($rules['bare_url_break'] ?? false);
        $trimLastMargin = (bool) ($rules['last_element_margin'] ?? false);

        if ($styles === [] && ! $breakBareUrls && ! $trimLastMargin) {
            return $html;
        }

        // The last-element rule goes first, while the only margins in the
        // body are the ones typed into it: those it keeps, and the
        // configured margin added afterwards lands in front of its zero.
        if ($trimLastMargin) {
            $html = static::trimLastElementMargin($html);
        }

        if ($styles !== []) {
            $html = static::styleElements($html, $styles);
        }

        if (! $breakBareUrls) {
            return $html;
        }

        return collect(static::segments($html))
            ->map(fn (array $segment): string => $segment['protected'] ? $segment['html'] : static::breakBareUrls($segment['html']))
            ->implode('');
    }

    /**
     * The configured element styles with theme placeholders filled in.
     * A declaration whose placeholder has no theme value is dropped.
     *
     * @param  array<string, string>  $theme
     *
     * @return array<string, array<string, string>> element => [property => value]
     */
    protected static function elementStyles(array $theme): array
    {
        $styles = [];

        foreach ((array) config('fin-mail.element_styles', []) as $element => $style) {
            $element = strtolower(trim((string) $element));

            if (! is_string($style) || preg_match('/^[a-z][a-z0-9]*$/', $element) !== 1) {
                continue;
            }

            $declarations = [];

            foreach (static::parseStyle($style) as $property => $value) {
                $filled = preg_replace_callback(
                    '/\{([a-z0-9_]+)\}/i',
                    fn (array $match): string => $theme[$match[1]] ?? "\0",
                    $value,
                ) ?? $value;

                if (! str_contains($filled, "\0")) {
                    $declarations[$property] = $filled;
                }
            }

            if ($declarations !== []) {
                $styles[$element] = $declarations;
            }
        }

        return $styles;
    }

    /**
     * Walk the tags in order, skipping comments and everything between
     * protect markers, and style the configured elements. The open elements
     * are tracked so a paragraph knows when it sits in a list item.
     *
     * @param  array<string, array<string, string>>  $styles
     */
    protected static function styleElements(string $html, array $styles): string
    {
        $protected = 0;
        $open = [];

        $pattern = '/'.preg_quote(static::PROTECT_START, '/').'|'.preg_quote(static::PROTECT_END, '/')
            .'|<!--.*?-->|<(\/?)([a-z][a-z0-9]*)(?=[\s\/>])('.static::ATTRIBUTES_PATTERN.')>/is';

        return preg_replace_callback(
            $pattern,
            function (array $matches) use (&$protected, &$open, $styles): string {
                if ($matches[0] === static::PROTECT_START) {
                    $protected++;

                    return $matches[0];
                }

                if ($matches[0] === static::PROTECT_END) {
                    $protected = max(0, $protected - 1);

                    return $matches[0];
                }

                // A comment, or markup the pass must leave alone.
                if ($protected > 0 || ! isset($matches[2])) {
                    return $matches[0];
                }

                $element = strtolower($matches[2]);
                $attributes = $matches[3];

                if ($matches[1] === '/') {
                    $index = array_search($element, array_reverse($open, true), true);

                    if ($index !== false) {
                        array_splice($open, (int) $index);
                    }

                    return $matches[0];
                }

                $parent = $open === [] ? null : $open[array_key_last($open)];

                if (! in_array($element, static::VOID_ELEMENTS, true) && ! static::isSelfClosing($attributes)) {
                    $open[] = $element;
                }

                if (! isset($styles[$element])) {
                    return $matches[0];
                }

                // Buttons are styled by the button pass.
                if ($element === 'a' && preg_match('/class\s*=\s*["\'][^"\']*\bemail-button\b/i', $attributes)) {
                    return $matches[0];
                }

                $declarations = $element === 'p' && $parent === 'li'
                    ? static::withoutMargins($styles[$element])
                    : $styles[$element];

                return '<'.$matches[2].static::mergeStyle($attributes, $declarations).'>';
            },
            $html,
        ) ?? $html;
    }

    /**
     * The editor wraps a list item's text in a paragraph. That paragraph
     * takes the paragraph style without its margins, so the list item's own
     * margin is what spaces the items.
     *
     * @param  array<string, string>  $declarations
     *
     * @return array<string, string>
     */
    protected static function withoutMargins(array $declarations): array
    {
        $margins = array_filter(
            $declarations,
            fn (string $property): bool => $property === 'margin' || str_starts_with($property, 'margin-'),
            ARRAY_FILTER_USE_KEY,
        );

        if ($margins === []) {
            return $declarations;
        }

        return ['margin' => '0'] + array_diff_key($declarations, $margins);
    }

    protected static function breakBareUrls(string $html): string
    {
        return preg_replace_callback(
            '/<a(?=[\s\/>])('.static::ATTRIBUTES_PATTERN.')>(.*?)<\/a>/is',
            function (array $matches): string {
                $text = trim(html_entity_decode(strip_tags($matches[2]), ENT_QUOTES | ENT_HTML5, 'UTF-8'));

                if (preg_match('/^(https?:\/\/|www\.)\S+$/i', $text) !== 1) {
                    return $matches[0];
                }

                return '<a'.static::mergeStyle($matches[1], ['word-break' => 'break-all']).'>'.$matches[2].'</a>';
            },
            $html,
        ) ?? $html;
    }

    /**
     * Give the body's last element margin-bottom: 0, and inside a list,
     * list item, div or blockquote its last child too, so nothing below
     * the last line of text adds space. Empty paragraphs at the end get it
     * along with the element before them. A tag that already sets a margin
     * keeps it, and nothing happens when the body ends inside a protected
     * part.
     */
    protected static function trimLastElementMargin(string $html): string
    {
        // The element looked for closes at the end of the first $limit
        // bytes and opens at or after $floor.
        $limit = strlen($html);
        $floor = 0;

        for ($step = 0; $step < 50; $step++) {
            $element = static::lastElement($html, $floor, $limit);

            if ($element === null) {
                break;
            }

            [$offset, $tag, $name, $attributes, $closingOffset] = $element;

            $styled = '<'.substr($tag, 1, strlen($name)).static::zeroBottomMargin($attributes).'>';
            $html = substr($html, 0, $offset).$styled.substr($html, $offset + strlen($tag));

            $innerStart = $offset + strlen($styled);
            $closingOffset += strlen($styled) - strlen($tag);

            if (static::isBlank(substr($html, $innerStart, $closingOffset - $innerStart))) {
                // An empty element at the end: the one before it is the
                // last one with anything in it.
                $limit = $offset;

                continue;
            }

            if (! in_array($name, static::CONTAINER_ELEMENTS, true)) {
                break;
            }

            $floor = $innerStart;
            $limit = $closingOffset;
        }

        return $html;
    }

    /**
     * The element that closes at the end of the first $limit bytes, not
     * counting whitespace and comments after it. A protect marker there
     * means the HTML ends inside a block: no element then.
     *
     * @return array{0: int, 1: string, 2: string, 3: string, 4: int}|null the opening tag's offset and
     *                                                                     text, the element's name and attributes, and the closing tag's offset
     */
    protected static function lastElement(string $html, int $floor, int $limit): ?array
    {
        $head = rtrim(substr($html, 0, $limit));

        while (str_ends_with($head, '-->')) {
            $start = strrpos($head, '<!--');
            $comment = $start === false ? '' : substr($head, $start);

            if ($start === false || $start < $floor || $comment === static::PROTECT_START || $comment === static::PROTECT_END) {
                return null;
            }

            $head = rtrim(substr($head, 0, $start));
        }

        if (! preg_match('/<\/([a-z][a-z0-9]*)\s*>$/i', $head, $closing, PREG_OFFSET_CAPTURE)) {
            return null;
        }

        $name = strtolower($closing[1][0]);
        $closingOffset = $closing[0][1];

        if ($closingOffset < $floor) {
            return null;
        }

        preg_match_all(
            '/<!--.*?-->(*SKIP)(*F)|<(\/?)'.$name.'(?=[\s\/>])('.static::ATTRIBUTES_PATTERN.')>/is',
            $head,
            $tags,
            PREG_SET_ORDER | PREG_OFFSET_CAPTURE,
            $floor,
        );

        $depth = 0;

        for ($index = count($tags) - 1; $index >= 0; $index--) {
            $isClosing = $tags[$index][1][0] === '/';
            $attributes = $tags[$index][2][0];

            if (! $isClosing && static::isSelfClosing($attributes)) {
                continue;
            }

            $depth += $isClosing ? 1 : -1;

            if ($depth === 0) {
                return [$tags[$index][0][1], $tags[$index][0][0], $name, $attributes, $closingOffset];
            }

            if ($depth < 0) {
                return null;
            }
        }

        return null;
    }

    /**
     * Whether an element holds nothing a reader sees: only whitespace, line
     * breaks and comments.
     */
    protected static function isBlank(string $inner): bool
    {
        $inner = preg_replace('/<br\s*\/?>|&nbsp;|\x{00A0}|<!--.*?-->/isu', '', $inner) ?? $inner;

        return trim($inner) === '';
    }

    /**
     * Add margin-bottom: 0 to a tag unless its own style already sets a
     * margin.
     */
    protected static function zeroBottomMargin(string $attributes): string
    {
        $style = static::styleAttribute($attributes);
        $present = $style === null ? [] : static::parseStyle($style[2]);

        if (isset($present['margin']) || isset($present['margin-bottom'])) {
            return $attributes;
        }

        return static::mergeStyle($attributes, ['margin-bottom' => '0'], append: true);
    }

    /**
     * Add the declarations whose property the tag's style attribute doesn't
     * already set, and return the updated attribute string. They go in
     * front of the existing declarations, so the tag's own style has the
     * last word; with $append they go behind.
     *
     * @param  array<string, string>  $declarations
     */
    protected static function mergeStyle(string $attributes, array $declarations, bool $append = false): string
    {
        $selfClosing = '';

        if (static::isSelfClosing($attributes)) {
            $attributes = substr(rtrim($attributes), 0, -1);
            $selfClosing = ' /';
        }

        $style = static::styleAttribute($attributes);

        if ($style === null) {
            return rtrim($attributes).' style="'.str_replace('"', "'", static::formatStyle($declarations)).'"'.$selfClosing;
        }

        [$offset, $length, $existing] = $style;

        $missing = array_diff_key($declarations, static::parseStyle($existing));

        if ($missing === []) {
            return $attributes.$selfClosing;
        }

        $existing = trim($existing);
        $added = static::formatStyle($missing);

        $merged = match (true) {
            $existing === '' => $added,
            $append => rtrim($existing, "; \t\n\r").'; '.$added,
            default => $added.' '.$existing,
        };

        return substr($attributes, 0, $offset)
            .'style="'.str_replace('"', "'", $merged).'"'
            .substr($attributes, $offset + $length)
            .$selfClosing;
    }

    /**
     * Find the style attribute among a tag's attributes. Reading them one
     * by one keeps data-style, and the word inside another attribute's
     * value, from being taken for it.
     *
     * @return array{0: int, 1: int, 2: string}|null offset and length of the attribute, and its value
     */
    protected static function styleAttribute(string $attributes): ?array
    {
        if (stripos($attributes, 'style') === false) {
            return null;
        }

        preg_match_all(
            '/([^\s"\'=<>\/]+)(?:\s*=\s*("[^"]*"|\'[^\']*\'|[^\s"\'>]+))?/',
            $attributes,
            $matches,
            PREG_SET_ORDER | PREG_OFFSET_CAPTURE,
        );

        foreach ($matches as $match) {
            if (strtolower($match[1][0]) !== 'style') {
                continue;
            }

            $value = isset($match[2]) && $match[2][1] !== -1 ? $match[2][0] : '';

            if ($value !== '' && ($value[0] === '"' || $value[0] === "'")) {
                $value = substr($value, 1, -1);
            }

            return [$match[0][1], strlen($match[0][0]), $value];
        }

        return null;
    }

    /**
     * Whether a tag's attributes end in the slash of a self-closing tag,
     * rather than in an unquoted value such as href=https://example.com/.
     */
    protected static function isSelfClosing(string $attributes): bool
    {
        return preg_match('/(?:^|[\s"\'])\/\s*$/', $attributes) === 1;
    }

    /**
     * @return array<string, string> property => value, properties lowercased
     */
    protected static function parseStyle(string $style): array
    {
        $declarations = [];

        foreach (explode(';', $style) as $declaration) {
            if (! str_contains($declaration, ':')) {
                continue;
            }

            [$property, $value] = explode(':', $declaration, 2);
            $property = strtolower(trim($property));
            $value = trim($value);

            if ($property !== '' && $value !== '') {
                $declarations[$property] = $value;
            }
        }

        return $declarations;
    }

    /**
     * @param  array<string, string>  $declarations
     */
    protected static function formatStyle(array $declarations): string
    {
        return implode(' ', array_map(
            fn (string $property, string $value): string => "{$property}: {$value};",
            array_keys($declarations),
            $declarations,
        ));
    }

    /**
     * Split HTML into protected and unprotected parts. Markers may nest; a
     * part is protected while any marker is open.
     *
     * @return list<array{html: string, protected: bool}>
     */
    protected static function segments(string $html): array
    {
        if (! str_contains($html, static::PROTECT_START)) {
            return [['html' => $html, 'protected' => false]];
        }

        $pieces = preg_split(
            '/('.preg_quote(static::PROTECT_START, '/').'|'.preg_quote(static::PROTECT_END, '/').')/',
            $html,
            -1,
            PREG_SPLIT_DELIM_CAPTURE,
        ) ?: [$html];

        $segments = [];
        $depth = 0;

        foreach ($pieces as $piece) {
            if ($piece === static::PROTECT_START) {
                $segments[] = ['html' => $piece, 'protected' => true];
                $depth++;

                continue;
            }

            if ($piece === static::PROTECT_END) {
                $segments[] = ['html' => $piece, 'protected' => true];
                $depth = max(0, $depth - 1);

                continue;
            }

            if ($piece !== '') {
                $segments[] = ['html' => $piece, 'protected' => $depth > 0];
            }
        }

        return $segments;
    }

    /**
     * Add inline color to all <a> tags that don't already have inline color set.
     *
     * @param  array<string, string>  $theme
     */
    protected static function inlineLinkStyles(string $html, array $theme): string
    {
        $linkColor = $theme['link'] ?? '#4F46E5';

        return preg_replace_callback(
            '/<a(?=[\s\/>])('.static::ATTRIBUTES_PATTERN.')>/i',
            function (array $matches) use ($linkColor): string {
                $attributes = $matches[1];

                // Skip links that have the email-button class (styled separately)
                if (preg_match('/class\s*=\s*["\'][^"\']*\bemail-button\b/i', $attributes)) {
                    return $matches[0];
                }

                $linkStyle = "color: {$linkColor}; text-decoration: underline;";

                // If the tag already has an inline style attribute, inject link styles if missing
                if (preg_match('/(?<![\w-])style\s*=\s*["\']([^"\']*)/i', $attributes, $styleMatch)) {
                    $existing = $styleMatch[1];
                    $additions = '';

                    if (stripos($existing, 'color') === false) {
                        $additions .= "color: {$linkColor}; ";
                    }
                    if (stripos($existing, 'text-decoration') === false) {
                        $additions .= 'text-decoration: underline; ';
                    }

                    if ($additions !== '') {
                        $attributes = preg_replace(
                            '/((?<![\w-])style\s*=\s*["\'])/i',
                            '$1'.$additions,
                            $attributes,
                            1,
                        );
                    }
                } else {
                    $attributes .= ' style="'.$linkStyle.'"';
                }

                return '<a'.$attributes.'>';
            },
            $html,
        ) ?? $html;
    }

    /**
     * Add inline styles to elements with the email-button class.
     *
     * @param  array<string, string>  $theme
     */
    protected static function inlineButtonStyles(string $html, array $theme): string
    {
        $buttonBg = $theme['button_bg'] ?? '#4F46E5';
        $buttonText = $theme['button_text'] ?? '#ffffff';
        $buttonStyle = "background-color: {$buttonBg}; color: {$buttonText}; display: inline-block; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-weight: 600;";

        return preg_replace_callback(
            '/<a(?=[\s\/>])('.static::ATTRIBUTES_PATTERN.')>/i',
            function (array $matches) use ($buttonStyle): string {
                $attributes = $matches[1];

                if (! preg_match('/class\s*=\s*["\'][^"\']*\bemail-button\b/i', $attributes)) {
                    return $matches[0];
                }

                if (preg_match('/(?<![\w-])style\s*=\s*["\']([^"\']*)/i', $attributes)) {
                    // Replace existing style
                    $attributes = preg_replace(
                        '/(?<![\w-])style\s*=\s*["\'][^"\']*["\']/i',
                        'style="'.$buttonStyle.'"',
                        $attributes,
                    );
                } else {
                    $attributes .= ' style="'.$buttonStyle.'"';
                }

                return '<a'.$attributes.'>';
            },
            $html,
        ) ?? $html;
    }
}
