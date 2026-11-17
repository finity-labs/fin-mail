<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Editors\Blocks;

use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use FinityLabs\FinMail\Helpers\BlockView;
use FinityLabs\FinMail\Models\EmailTheme;

/**
 * Base for the built-in blocks: markup comes from the block's view
 * (fin-mail::blocks.{id}, replaceable through config fin-mail.block_views),
 * and the editor preview follows the theme picked on the template form.
 */
abstract class EmailBlock extends RichContentCustomBlock
{
    /**
     * Shared by every built-in block.
     *
     * @var array<string, string>|null
     */
    protected static ?array $previewTheme = null;

    /**
     * @param  array<string, string>|null  $theme
     */
    public static function setPreviewTheme(?array $theme): void
    {
        self::$previewTheme = $theme;
    }

    /**
     * @return array<string, string>
     */
    protected static function previewThemeColors(): array
    {
        return self::$previewTheme ?? EmailTheme::resolvedDefaultColors();
    }

    public static function toHtml(array $config, array $data): ?string
    {
        return BlockView::render(static::getId(), $config, $data);
    }

    public static function toPreviewHtml(array $config): ?string
    {
        return BlockView::renderView(static::getId(), $config, ['theme' => static::previewThemeColors()]);
    }
}
