<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Editors\Blocks;

use Filament\Actions\Action;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;

/**
 * A tinted box around a notice. Info, warning and success take their
 * colours from the theme; custom has its own two colours.
 */
class CalloutBlock extends EmailBlock
{
    public static function getId(): string
    {
        return 'emailCallout';
    }

    public static function getLabel(): string
    {
        return __('fin-mail::fin-mail.template.blocks.callout');
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalHeading(__('fin-mail::fin-mail.template.blocks.callout_heading'))
            ->modalWidth('2xl')
            ->schema([
                Select::make('variant')
                    ->label(__('fin-mail::fin-mail.template.blocks.variant'))
                    ->options([
                        'info' => __('fin-mail::fin-mail.template.blocks.variant_info'),
                        'warning' => __('fin-mail::fin-mail.template.blocks.variant_warning'),
                        'success' => __('fin-mail::fin-mail.template.blocks.variant_success'),
                        'custom' => __('fin-mail::fin-mail.template.blocks.variant_custom'),
                    ])
                    ->default('info')
                    ->selectablePlaceholder(false)
                    ->native(false)
                    ->live(),

                Grid::make(2)
                    ->schema([
                        ColorPicker::make('background')
                            ->label(__('fin-mail::fin-mail.template.blocks.background_color'))
                            ->default('#f4f4f7')
                            ->required(),

                        ColorPicker::make('text_color')
                            ->label(__('fin-mail::fin-mail.template.blocks.text_color'))
                            ->default('#333333')
                            ->required(),
                    ])
                    ->visible(fn (Get $get): bool => $get('variant') === 'custom'),

                static::contentEditor(),
            ]);
    }

    public static function getPreviewLabel(array $config): string
    {
        return static::getLabel();
    }

    /**
     * Limited rich text for a block's content: bold, italic and links.
     * Tokens are typed as {{ token }} text.
     */
    public static function contentEditor(): RichEditor
    {
        return RichEditor::make('content')
            ->label(__('fin-mail::fin-mail.template.blocks.content'))
            ->helperText(__('fin-mail::fin-mail.template.blocks.content_helper'))
            ->toolbarButtons(['bold', 'italic', 'link', 'undo', 'redo'])
            ->required();
    }
}
