<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Editors\Blocks;

use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

/**
 * Label and value rows in a bordered box: an order, an invoice, a payment.
 */
class SummaryBlock extends EmailBlock
{
    public static function getId(): string
    {
        return 'emailSummary';
    }

    public static function getLabel(): string
    {
        return __('fin-mail::fin-mail.template.blocks.summary');
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalHeading(__('fin-mail::fin-mail.template.blocks.summary_heading'))
            ->modalWidth('2xl')
            ->schema([
                Repeater::make('rows')
                    ->label(__('fin-mail::fin-mail.template.blocks.rows'))
                    ->schema([
                        TextInput::make('label')
                            ->label(__('fin-mail::fin-mail.template.blocks.row_label'))
                            ->required()
                            ->maxLength(255),

                        TextInput::make('value')
                            ->label(__('fin-mail::fin-mail.template.blocks.row_value'))
                            ->maxLength(1000),

                        Toggle::make('strong')
                            ->label(__('fin-mail::fin-mail.template.blocks.row_strong'))
                            ->inline(false),
                    ])
                    ->columns(3)
                    ->minItems(1)
                    ->defaultItems(1)
                    ->reorderable()
                    ->addActionLabel(__('fin-mail::fin-mail.template.blocks.row_add')),

                Select::make('value_align')
                    ->label(__('fin-mail::fin-mail.template.blocks.value_align'))
                    ->options([
                        'right' => __('fin-mail::fin-mail.template.blocks.align_right'),
                        'left' => __('fin-mail::fin-mail.template.blocks.align_left'),
                    ])
                    ->default('right')
                    ->selectablePlaceholder(false)
                    ->native(false),

                Toggle::make('stack_on_phone')
                    ->label(__('fin-mail::fin-mail.template.blocks.stack_on_phone'))
                    ->helperText(__('fin-mail::fin-mail.template.blocks.stack_on_phone_helper')),
            ]);
    }

    public static function getPreviewLabel(array $config): string
    {
        return static::getLabel();
    }
}
