<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\SentEmailResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
use FinityLabs\FinMail\Enums\EmailStatus;
use FinityLabs\FinMail\Models\SentEmail;

class SentEmailInfolist
{
    /**
     * @return array<int, Component>
     */
    public static function schema(): array
    {
        return [
            Grid::make(2)
                ->schema([
                    TextEntry::make('template.name')
                        ->label(__('fin-mail::fin-mail.sent.preview.template'))
                        ->visible(fn (SentEmail $record): bool => $record->template !== null)
                        ->columnSpanFull(),

                    TextEntry::make('sender')
                        ->label(__('fin-mail::fin-mail.sent.preview.from')),

                    TextEntry::make('to')
                        ->label(__('fin-mail::fin-mail.sent.preview.to'))
                        ->getStateUsing(fn (SentEmail $record): string => implode(', ', $record->to)),

                    TextEntry::make('cc')
                        ->label(__('fin-mail::fin-mail.sent.preview.cc'))
                        ->getStateUsing(fn (SentEmail $record): string => implode(', ', $record->cc ?? []))
                        ->visible(fn (SentEmail $record): bool => ! empty($record->cc)),

                    TextEntry::make('sent_at')
                        ->label(__('fin-mail::fin-mail.sent.preview.sent'))
                        ->dateTime(app('fin-mail')->dateTimeFormat())
                        ->placeholder(__('fin-mail::fin-mail.sent.preview.sent_not_yet')),

                    TextEntry::make('status')
                        ->label(__('fin-mail::fin-mail.sent.preview.status'))
                        ->badge(),

                    TextEntry::make('subject')
                        ->label(__('fin-mail::fin-mail.sent.columns.subject'))
                        ->columnSpanFull(),
                ]),

            ViewEntry::make('rendered_body')
                ->hiddenLabel()
                ->view('fin-mail::infolists.components.rendered-body-preview')
                ->visible(fn (SentEmail $record): bool => (bool) $record->rendered_body),

            TextEntry::make('no_body')
                ->hiddenLabel()
                ->state(fn (): string => __('fin-mail::fin-mail.sent.preview.no_body'))
                ->html()
                ->visible(fn (SentEmail $record): bool => ! $record->rendered_body),

            TextEntry::make('metadata.error')
                ->label(__('fin-mail::fin-mail.sent.preview.error'))
                ->visible(fn (SentEmail $record): bool => $record->status === EmailStatus::Failed && ! empty($record->metadata['error']))
                ->color('danger'),
        ];
    }
}
