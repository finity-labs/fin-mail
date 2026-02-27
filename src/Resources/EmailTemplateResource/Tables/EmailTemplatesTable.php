<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\EmailTemplateResource\Tables;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Resources\EmailTemplateResource\EmailTemplateResource;
use FinityLabs\FinMail\Settings\GeneralSettings;
use Illuminate\Support\Facades\Mail;

class EmailTemplatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('fin-mail::fin-mail.template.fields.name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('key')
                    ->label(__('fin-mail::fin-mail.template.fields.key'))
                    ->badge()
                    ->color('gray')
                    ->searchable(),

                TextColumn::make('translations')
                    ->label(__('fin-mail::fin-mail.template.columns.locales'))
                    ->badge()
                    ->getStateUsing(fn ($record): array => $record->getTranslatedLocales('name')),

                TextColumn::make('category')
                    ->label(__('fin-mail::fin-mail.template.fields.category'))
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => app(GeneralSettings::class)->getCategoryOptions()[$state] ?? $state),

                TextColumn::make('subject')
                    ->label(__('fin-mail::fin-mail.template.fields.subject'))
                    ->limit(40)
                    ->toggleable(),

                IconColumn::make('is_active')
                    ->boolean()
                    ->label(__('fin-mail::fin-mail.template.columns.active')),

                IconColumn::make('is_locked')
                    ->label(__('fin-mail::fin-mail.template.columns.locked'))
                    ->icon(fn (bool $state): string|BackedEnum|null => $state ? Heroicon::LockClosed : null)
                    ->color(fn (bool $state): ?string => $state ? 'warning' : null)
                    ->tooltip(fn (bool $state): ?string => $state ? __('fin-mail::fin-mail.template.tooltips.locked') : null),

                TextColumn::make('sent_emails_count')
                    ->counts('sentEmails')
                    ->label(__('fin-mail::fin-mail.template.columns.sent'))
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label(__('fin-mail::fin-mail.template.columns.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label(__('fin-mail::fin-mail.template.fields.category'))
                    ->options(fn (): array => app(GeneralSettings::class)->getCategoryOptions()),

                TernaryFilter::make('is_active')
                    ->label(__('fin-mail::fin-mail.template.columns.active')),

                TernaryFilter::make('is_locked')
                    ->label(__('fin-mail::fin-mail.template.columns.locked')),
            ])
            ->deferFilters()
            ->recordAction(null)
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),

                    Action::make('preview')
                        ->label(__('fin-mail::fin-mail.template.actions.preview'))
                        ->icon(Heroicon::OutlinedEye)
                        ->modal()
                        ->modalHeading(fn ($record): string => "Preview: {$record->name}")
                        ->modalContent(fn ($record) => view('fin-mail::components.email-preview', [
                            'html' => $record->body,
                        ]))
                        ->modalWidth(Width::FourExtraLarge)
                        ->modalSubmitAction(false),

                    Action::make('send_test')
                        ->label(__('fin-mail::fin-mail.template.actions.send_test'))
                        ->icon(Heroicon::OutlinedPaperAirplane)
                        ->modal()
                        ->schema([
                            TextInput::make('test_email')
                                ->label(__('fin-mail::fin-mail.template.actions.send_test_field'))
                                ->email()
                                ->required()
                                ->default(fn (): ?string => auth()->user()?->email),

                            Select::make('locale')
                                ->label(__('fin-mail::fin-mail.template.actions.send_test_locale'))
                                ->options(fn (): array => collect(app(GeneralSettings::class)->languages)->pluck('display', 'code')->all())
                                ->default(fn (): string => app()->getLocale())
                                ->native(false)
                                ->required(),
                        ])
                        ->action(function ($record, array $data): void {
                            try {
                                $mail = TemplateMail::make($record->key, $data['locale'])
                                    ->models([
                                        'user' => auth()->user(),
                                    ]);

                                Mail::to($data['test_email'])->send($mail);

                                Notification::make()
                                    ->title(__('fin-mail::fin-mail.template.notifications.test_sent'))
                                    ->body(__('fin-mail::fin-mail.template.notifications.test_sent_body', ['email' => $data['test_email']]))
                                    ->success()
                                    ->send();
                            } catch (\Throwable $e) {
                                Notification::make()
                                    ->title(__('fin-mail::fin-mail.template.notifications.test_failed'))
                                    ->body($e->getMessage())
                                    ->danger()
                                    ->send();
                            }
                        }),

                    Action::make('compose')
                        ->label(__('fin-mail::fin-mail.template.actions.compose'))
                        ->icon(Heroicon::OutlinedPencilSquare)
                        ->url(fn ($record): string => EmailTemplateResource::getUrl('compose', ['record' => $record])),

                    DeleteAction::make()
                        ->visible(fn ($record): bool => $record->isDeletable()),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->before(function (DeleteBulkAction $action, \Illuminate\Database\Eloquent\Collection $records): void {
                            $lockedCount = $records->where('is_locked', true)->count();
                            if ($lockedCount > 0) {
                                Notification::make()
                                    ->title(__('fin-mail::fin-mail.template.notifications.locked_skipped'))
                                    ->body(__('fin-mail::fin-mail.template.notifications.locked_skipped_body', ['count' => $lockedCount]))
                                    ->warning()
                                    ->send();
                            }
                        })
                        ->using(
                            fn (\Illuminate\Database\Eloquent\Collection $records) => $records
                                ->reject(fn ($record): bool => $record->is_locked)
                                ->each(fn ($record) => $record->delete())
                        ),
                ]),
            ])
            ->defaultSort('updated_at', 'desc');
    }
}
