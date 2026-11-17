<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Editors\Blocks;

use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

/**
 * Login details or a one-time code: each label above its value, a value
 * optionally in a chip that selects on one tap.
 */
class CredentialsBlock extends EmailBlock
{
    public static function getId(): string
    {
        return 'emailCredentials';
    }

    public static function getLabel(): string
    {
        return __('fin-mail::fin-mail.template.blocks.credentials');
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalHeading(__('fin-mail::fin-mail.template.blocks.credentials_heading'))
            ->modalWidth('2xl')
            ->schema([
                Repeater::make('rows')
                    ->label(__('fin-mail::fin-mail.template.blocks.rows'))
                    ->schema([
                        TextInput::make('label')
                            ->label(__('fin-mail::fin-mail.template.blocks.row_label'))
                            ->maxLength(255),

                        TextInput::make('value')
                            ->label(__('fin-mail::fin-mail.template.blocks.row_value'))
                            ->required()
                            ->maxLength(1000),

                        Select::make('font')
                            ->label(__('fin-mail::fin-mail.template.blocks.row_font'))
                            ->options([
                                'normal' => __('fin-mail::fin-mail.template.blocks.font_normal'),
                                'monospace' => __('fin-mail::fin-mail.template.blocks.font_monospace'),
                            ])
                            ->default('normal')
                            ->selectablePlaceholder(false)
                            ->native(false),

                        Toggle::make('copy')
                            ->label(__('fin-mail::fin-mail.template.blocks.row_copy'))
                            ->helperText(__('fin-mail::fin-mail.template.blocks.row_copy_helper')),
                    ])
                    ->columns(2)
                    ->minItems(1)
                    ->defaultItems(1)
                    ->reorderable()
                    ->addActionLabel(__('fin-mail::fin-mail.template.blocks.row_add')),
            ]);
    }

    public static function getPreviewLabel(array $config): string
    {
        return static::getLabel();
    }
}
