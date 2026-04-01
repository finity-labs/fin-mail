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
use Filament\Actions\ReplicateAction;
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
use FinityLabs\FinMail\Actions\EmailSender;
use FinityLabs\FinMail\Resources\EmailTemplateResource\EmailTemplateResource;
use FinityLabs\FinMail\Settings\GeneralSettings;
use Illuminate\Database\Eloquent\Collection;

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
                    ->copyable()
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
                    ->icon(fn (bool $state): ?BackedEnum => $state ? Heroicon::OutlinedLockClosed : null)
                    ->color(fn (bool $state): ?string => $state ? 'warning' : null)
                    ->tooltip(fn (bool $state): ?string => $state ? __('fin-mail::fin-mail.template.tooltips.locked') : null),

                TextColumn::make('sent_emails_count')
                    ->counts('sentEmails')
                    ->label(__('fin-mail::fin-mail.template.columns.sent'))
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label(__('fin-mail::fin-mail.template.columns.updated_at'))
                    ->dateTime(app('fin-mail')->dateTimeFormat())
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
                ViewAction::make(),
                EditAction::make(),
                ReplicateAction::make()
                    ->excludeAttributes(['is_locked', 'sent_emails_count'])
                    ->mutateRecordDataUsing(function (array $data, $record): array {
                        $suffix = ' '.__('fin-mail::fin-mail.template.replicate_suffix');
                        $locale = app()->getLocale();

                        $data['name'] = $record->getTranslation('name', $locale).$suffix;
                        $data['key'] = $record->key.'-copy-'.time();

                        return $data;
                    })
                    ->schema([
                        TextInput::make('name')
                            ->label(__('fin-mail::fin-mail.template.fields.name'))
                            ->required()
                            ->maxLength(255),

                        TextInput::make('key')
                            ->label(__('fin-mail::fin-mail.template.fields.key'))
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                    ])
                    ->beforeReplicaSaved(function ($replica, array $data): void {
                        // Set the name only for the current locale, keeping other translations from the original
                        $replica->setTranslation('name', app()->getLocale(), $data['name']);
                        $replica->key = $data['key'];
                        $replica->is_locked = false;
                    })
                    ->after(function ($replica) {
                        return redirect(EmailTemplateResource::getUrl('edit', ['record' => $replica]));
                    }),
                DeleteAction::make()
                    ->visible(fn ($record): bool => $record->isDeletable()),

                ActionGroup::make([
                    Action::make('preview')
                        ->label(__('fin-mail::fin-mail.template.actions.preview'))
                        ->icon(Heroicon::OutlinedEye)
                        ->modal()
                        ->modalHeading(fn ($record): string => "Preview: {$record->name}")
                        ->modalContent(fn ($record) => view('fin-mail::components.email-preview', [
                            'subject' => $record->subject,
                            'preheader' => $record->preheader,
                            'html' => $record->body,
                            'theme' => $record->theme?->resolvedColors(),
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
                                $rendered = $record->render(['user' => auth()->user()], $data['locale']);

                                $sender = new EmailSender(
                                    data: [
                                        'template_key' => $record->key,
                                        'to' => [$data['test_email']],
                                        'cc' => [],
                                        'bcc' => [],
                                        'locale' => $data['locale'],
                                        'subject' => $rendered['subject'],
                                        'body' => $rendered['body'],
                                    ],
                                    templateKey: $record->key,
                                    modelsResolver: ['user' => auth()->user()],
                                );

                                $sender->send();
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
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->before(function (DeleteBulkAction $action, Collection $records): void {
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
                            fn (Collection $records) => $records
                                ->reject(fn ($record): bool => (bool) $record->getAttribute('is_locked'))
                                ->each(fn ($record) => $record->delete())
                        ),
                ]),
            ])
            ->defaultSort('updated_at', 'desc');
    }
}
