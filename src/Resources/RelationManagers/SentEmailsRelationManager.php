<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\RelationManagers;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use FinityLabs\FinMail\Actions\SentEmailResender;
use FinityLabs\FinMail\Enums\EmailStatus;
use FinityLabs\FinMail\Resources\SentEmailResource\Schemas\SentEmailInfolist;

/**
 * Drop this into any Filament resource to show emails sent for that record.
 *
 * In your resource:
 *   public static function getRelations(): array
 *   {
 *       return [
 *           SentEmailsRelationManager::class,
 *       ];
 *   }
 *
 * Your model needs the HasEmailTemplates trait.
 */
class SentEmailsRelationManager extends RelationManager
{
    protected static string $relationship = 'sentEmails';

    protected static string|BackedEnum|null $icon = Heroicon::OutlinedEnvelope;

    public static function getTitle($ownerRecord, string $pageClass): string
    {
        return __('fin-mail::fin-mail.relation.title');
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subject')
                    ->label(__('fin-mail::fin-mail.relation.columns.subject'))
                    ->searchable()
                    ->limit(50),

                TextColumn::make('recipients_display')
                    ->label(__('fin-mail::fin-mail.relation.columns.to'))
                    ->limit(40),

                TextColumn::make('template.name')
                    ->label(__('fin-mail::fin-mail.relation.columns.template'))
                    ->badge()
                    ->color('gray')
                    ->placeholder('—'),

                TextColumn::make('status')
                    ->label(__('fin-mail::fin-mail.relation.columns.status'))
                    ->badge(),

                TextColumn::make('sender.name')
                    ->label(__('fin-mail::fin-mail.relation.columns.sent_by'))
                    ->placeholder(__('fin-mail::fin-mail.relation.columns.sent_by_placeholder')),

                TextColumn::make('sent_at')
                    ->label(__('fin-mail::fin-mail.relation.columns.sent_at'))
                    ->dateTime(app('fin-mail')->dateTimeFormat())
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordAction(null)
            ->filters([
                SelectFilter::make('status')
                    ->options(EmailStatus::class),
            ])
            ->recordActions([
                Action::make('view_body')
                    ->label(__('fin-mail::fin-mail.relation.actions.view'))
                    ->icon(Heroicon::OutlinedEye)
                    ->modal()
                    ->modalHeading(fn ($record): string => $record->subject)
                    ->schema(SentEmailInfolist::schema())
                    ->modalWidth(Width::FiveExtraLarge)
                    ->modalSubmitAction(false),

                Action::make('resend')
                    ->label(__('fin-mail::fin-mail.relation.actions.resend'))
                    ->icon(Heroicon::OutlinedArrowPath)
                    ->requiresConfirmation()
                    ->modalDescription(__('fin-mail::fin-mail.relation.actions.resend_confirm'))
                    ->action(function ($record): void {
                        try {
                            app(SentEmailResender::class)->resend($record);

                            Notification::make()
                                ->title(__('fin-mail::fin-mail.relation.notifications.resent'))
                                ->success()
                                ->send();
                        } catch (\Throwable $e) {
                            Notification::make()
                                ->title(__('fin-mail::fin-mail.relation.notifications.resend_failed'))
                                ->body($e->getMessage())
                                ->danger()
                                ->send();
                        }
                    }),
            ])
            ->emptyStateHeading(__('fin-mail::fin-mail.relation.empty.heading'))
            ->emptyStateDescription(__('fin-mail::fin-mail.relation.empty.description'))
            ->emptyStateIcon(Heroicon::OutlinedEnvelope);
    }
}
