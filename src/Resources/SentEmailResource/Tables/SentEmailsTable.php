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
use FinityLabs\FinMail\Enums\EmailStatus;
use FinityLabs\FinMail\FinMailPlugin;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\SentEmail;
use FinityLabs\FinMail\Resources\SentEmailResource\Schemas\SentEmailInfolist;
use Illuminate\Support\Facades\Mail;

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
                            if (! $record->rendered_body || ! $record->email_template_id) {
                                throw new \RuntimeException(__('fin-mail::fin-mail.sent.errors.no_rendered_body'));
                            }

                            $template = $record->template;

                            if (! $template) {
                                throw new \RuntimeException(__('fin-mail::fin-mail.sent.errors.no_template'));
                            }

                            $mail = TemplateMail::make($template->key)
                                ->overrideSubject($record->subject)
                                ->overrideBody($record->rendered_body);

                            $newLog = SentEmail::create([
                                'email_template_id' => $record->email_template_id,
                                'sender' => $record->sender,
                                'to' => $record->to,
                                'cc' => $record->cc,
                                'bcc' => $record->bcc,
                                'subject' => $record->subject,
                                'rendered_body' => $record->rendered_body,
                                'attachments' => $record->attachments,
                                'status' => EmailStatus::Queued,
                                'sent_by' => auth()->id(),
                                'sendable_type' => $record->sendable_type,
                                'sendable_id' => $record->sendable_id,
                                'metadata' => ['resent_from' => $record->id],
                            ]);

                            $mail->withLogging($newLog);

                            $message = Mail::to($record->to);
                            if (! empty($record->cc)) {
                                $message->cc($record->cc);
                            }
                            if (! empty($record->bcc)) {
                                $message->bcc($record->bcc);
                            }

                            $message->send($mail);

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
