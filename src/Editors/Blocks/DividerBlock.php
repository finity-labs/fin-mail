<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Editors\Blocks;

/**
 * A one-pixel rule in the theme's border colour. It has no settings, so the
 * editor inserts it without a modal.
 */
class DividerBlock extends EmailBlock
{
    public static function getId(): string
    {
        return 'emailDivider';
    }

    public static function getLabel(): string
    {
        return __('fin-mail::fin-mail.template.blocks.divider');
    }

    public static function getPreviewLabel(array $config): string
    {
        return static::getLabel();
    }
}
