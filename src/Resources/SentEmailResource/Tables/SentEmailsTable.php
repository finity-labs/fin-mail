<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\SentEmailResource\Tables;

use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Notifications\Notification;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use FinityLabs\FinMail\Actions\SentEmailResender;
use FinityLabs\FinMail\Enums\EmailStatus;
use FinityLabs\FinMail\FinMailPlugin;
use FinityLabs\FinMail\Resources\SentEmailResource\Schemas\SentEmailInfolist;

class SentEmailsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subject')
                    ->label(__('fin-mail::fin-mail.sent.columns.subject'))
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('recipients_display')
                    ->label(__('fin-mail::fin-mail.sent.columns.to'))
                    ->limit(40)
                    ->searchable(
                        query: fn ($query, string $search) => $query->whereJsonContains('to', $search)
                    ),

                TextColumn::make('template.name')
                    ->label(__('fin-mail::fin-mail.sent.columns.template'))
                    ->badge()
                    ->color('gray')
                    ->placeholder(__('fin-mail::fin-mail.sent.columns.template_placeholder')),

                TextColumn::make('status')
                    ->label(__('fin-mail::fin-mail.sent.columns.status'))
                    ->badge(),

                TextColumn::make('sender.name')
                    ->label(__('fin-mail::fin-mail.sent.columns.sent_by'))
                    ->placeholder(__('fin-mail::fin-mail.sent.columns.sent_by_placeholder')),

                TextColumn::make('sendable_type')
                    ->label(__('fin-mail::fin-mail.sent.columns.related_to'))
                    ->formatStateUsing(fn (?string $state): string => $state ? class_basename($state) : '—')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('sent_at')
                    ->label(__('fin-mail::fin-mail.sent.columns.sent_at'))
                    ->dateTime(app('fin-mail')->dateTimeFormat())
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->deferFilters()
            ->recordAction(null)
            ->filters([
                SelectFilter::make('status')
                    ->options(EmailStatus::class),

                Filter::make('sent_at')
                    ->schema([
                        DatePicker::make('from')->label(__('fin-mail::fin-mail.sent.filters.from')),
                        DatePicker::make('until')->label(__('fin-mail::fin-mail.sent.filters.until')),
                    ])
                    ->query(
                        fn ($query, array $data) => $query
                            ->when($data['from'], fn ($q, $date) => $q->whereDate('sent_at', '>=', $date))
                            ->when($data['until'], fn ($q, $date) => $q->whereDate('sent_at', '<=', $date))
                    ),
            ])
            ->recordActions([
                Action::make('view')
                    ->label(__('fin-mail::fin-mail.sent.actions.view'))
                    ->icon(Heroicon::OutlinedEye)
                    ->modal()
                    ->modalHeading(fn ($record): string => $record->subject)
                    ->schema(SentEmailInfolist::schema())
                    ->modalWidth(Width::FiveExtraLarge)
                    ->modalSubmitAction(false),

                Action::make('resend')
                    ->label(__('fin-mail::fin-mail.sent.actions.resend'))
                    ->icon(Heroicon::OutlinedArrowPath)
                    ->requiresConfirmation()
                    ->modalDescription(__('fin-mail::fin-mail.sent.actions.resend_description'))
                    ->action(function ($record): void {
                        try {
                            app(SentEmailResender::class)->resend($record);

                            Notification::make()
                                ->title(__('fin-mail::fin-mail.sent.notifications.resent'))
                                ->success()
                                ->send();
                        } catch (\Throwable $e) {
                            Notification::make()
                                ->title(__('fin-mail::fin-mail.sent.notifications.resend_failed'))
                                ->body($e->getMessage())
                                ->danger()
                                ->send();
                        }
                    })
                    ->visible(function (): bool {
                        /** @var FinMailPlugin $plugin */
                        $plugin = filament('fin-mail');

                        if (! $plugin->isShieldAvailable()) {
                            return true;
                        }

                        return auth()->user()->can('Resend:SentEmail');
                    }),
            ])
            ->poll('30s');
    }
}
