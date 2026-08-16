<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\EmailThemeResource\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use FinityLabs\FinMail\Resources\EmailThemeResource\EmailThemeResource;

class EmailThemesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('fin-mail::fin-mail.theme.fields.name'))
                    ->searchable()
                    ->sortable(),

                ColorColumn::make('colors.primary')
                    ->label(__('fin-mail::fin-mail.theme.columns.primary')),

                ColorColumn::make('colors.background')
                    ->label(__('fin-mail::fin-mail.theme.columns.background')),

                ColorColumn::make('colors.text')
                    ->label(__('fin-mail::fin-mail.theme.columns.text')),

                ColorColumn::make('colors.button_bg')
                    ->label(__('fin-mail::fin-mail.theme.columns.button')),

                IconColumn::make('is_default')
                    ->boolean()
                    ->label(__('fin-mail::fin-mail.theme.columns.default')),

                TextColumn::make('templates_count')
                    ->counts('templates')
                    ->label(__('fin-mail::fin-mail.theme.columns.templates'))
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label(__('fin-mail::fin-mail.theme.columns.updated_at'))
                    ->dateTime(app('fin-mail')->dateTimeFormat())
                    ->sortable()
                    ->toggleable(),
            ])
            ->deferFilters()
            ->recordAction(null)
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                ReplicateAction::make()
                    ->excludeAttributes(['is_default', 'templates_count'])
                    ->mutateRecordDataUsing(function (array $data): array {
                        $data['name'] = $data['name'].' '.__('fin-mail::fin-mail.theme.replicate_suffix');

                        return $data;
                    })
                    ->schema([
                        TextInput::make('name')
                            ->label(__('fin-mail::fin-mail.theme.fields.name'))
                            ->required()
                            ->maxLength(255),
                    ])
                    ->beforeReplicaSaved(function ($replica, array $data): void {
                        $replica->name = $data['name'];
                        $replica->is_default = false;
                    })
                    ->after(function ($replica) {
                        return redirect(EmailThemeResource::getUrl('edit', ['record' => $replica]));
                    }),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
