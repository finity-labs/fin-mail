<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Helpers;

use Filament\Forms\Components\RichEditor\RichContentRenderer;
use FinityLabs\FinMail\FinMailPlugin;

class TipTapConverter
{
    /**
     * Convert a TipTap document array to HTML, preserving merge tags
     * as {{ token }} text so the token replacer can process them later.
     *
     * @param  array<string, mixed>  $content
     * @param  array<string, string>|null  $theme  Theme colors for custom blocks
     * @param  string|null  $locale  The email's locale, passed to the custom blocks
     */
    public static function toHtml(array $content, ?array $theme = null, ?string $locale = null): string
    {
        $document = isset($content['type']) ? $content : ['type' => 'doc', 'content' => $content];

        // Collect all merge tag IDs from the document and map them
        // to their {{ id }} text representation so the renderer
        // replaces the mergeTag nodes with plain token text.
        $mergeTags = static::extractMergeTagIds($document);

        $blocks = [];

        foreach (FinMailPlugin::getCustomBlocks() as $blockId => $blockClass) {
            $blocks[$blockClass] = [
                'theme' => $theme,
                'locale' => $locale ?? app()->getLocale(),
                'id' => $blockId,
            ];
        }

        $renderer = RichContentRenderer::make()
            ->content($document)
            ->customBlocks($blocks);

        if (! empty($mergeTags)) {
            $renderer->mergeTags($mergeTags);
        }

        $html = $renderer->toUnsafeHtml();

        // The MergeTagExtension always wraps output in <span data-type="mergeTag">.
        // Strip these wrappers so only the inner text ({{ token }}) remains.
        return static::stripMergeTagSpans($html);
    }

    /**
     * Walk the document tree and collect all merge tag IDs,
     * mapping each to its {{ id }} token representation.
     *
     * @param  array<string, mixed>  $document
     *
     * @return array<string, string>
     */
    protected static function extractMergeTagIds(array $document): array
    {
        $tags = [];

        // Walk nodes to find mergeTag types
        static::walkNodes($document, function (array $node) use (&$tags): void {
            if (($node['type'] ?? null) === 'mergeTag' && ! empty($node['attrs']['id'])) {
                $id = $node['attrs']['id'];
                $tags[$id] = "{{ {$id} }}";
            }
        });

        return $tags;
    }

    /**
     * Strip <span data-type="mergeTag" ...>content</span> wrappers,
     * keeping only the inner content.
     */
    protected static function stripMergeTagSpans(string $html): string
    {
        return MergeTagStripper::strip($html);
    }

    /**
     * Recursively walk TipTap document nodes.
     *
     * @param  array<string, mixed>  $node
     */
    protected static function walkNodes(array $node, callable $callback): void
    {
        $callback($node);

        foreach ($node['content'] ?? [] as $child) {
            if (is_array($child)) {
                static::walkNodes($child, $callback);
            }
        }
    }
}
