<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Editors\Blocks;

use Filament\Actions\Action;

/**
 * Smaller, lighter text with links, for lines such as how to stop an alert.
 */
class SmallPrintBlock extends EmailBlock
{
    public static function getId(): string
    {
        return 'emailSmallPrint';
    }

    public static function getLabel(): string
    {
        return __('fin-mail::fin-mail.template.blocks.small_print');
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalHeading(__('fin-mail::fin-mail.template.blocks.small_print_heading'))
            ->modalWidth('2xl')
            ->schema([
                CalloutBlock::contentEditor(),
            ]);
    }

    public static function getPreviewLabel(array $config): string
    {
        return static::getLabel();
    }
}
