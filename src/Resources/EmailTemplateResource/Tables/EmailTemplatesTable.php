<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\EmailTemplateResource\Tables;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use FinityLabs\FinMail\Actions\EmailSender;
use FinityLabs\FinMail\FinMailPlugin;
use FinityLabs\FinMail\Helpers\TokenValue;
use FinityLabs\FinMail\Mail\EmailLayout;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\EmailTheme;
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
                        $data['key'] = $record->nextCopyKey();

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
                        ->modalHeading(fn ($record): string => __('fin-mail::fin-mail.template.actions.preview_heading', ['record' => $record->name]))
                        ->modalContent(fn ($record) => view('fin-mail::components.email-preview', [
                            'subject' => $record->subject,
                            'preheader' => $record->preheaderIn(app()->getLocale()),
                            'html' => $record->body,
                            'theme' => $record->theme?->resolvedColors(),
                            'template' => $record,
                            'locale' => app()->getLocale(),
                        ]))
                        ->modalWidth(Width::FourExtraLarge)
                        ->modalSubmitAction(false)
                        ->visible(function (): bool {
                            /** @var FinMailPlugin $plugin */
                            $plugin = filament('fin-mail');

                            if (! $plugin->isShieldAvailable()) {
                                return true;
                            }

                            return auth()->user()->can('Preview:EmailTemplate');
                        }),

                    Action::make('send_test')
                        ->label(__('fin-mail::fin-mail.template.actions.send_test'))
                        ->icon(Heroicon::OutlinedPaperAirplane)
                        ->modal()
                        ->schema(function ($record): array {
                            $fields = [
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
                            ];

                            $tokenFields = static::buildTokenFields($record->token_schema ?? []);

                            if (! empty($tokenFields)) {
                                $fields[] = Section::make(__('fin-mail::fin-mail.template.tokens.label'))
                                    ->schema($tokenFields)
                                    ->collapsed(false);
                            }

                            return $fields;
                        })
                        ->action(function ($record, array $data): void {
                            try {
                                $models = ['user' => auth()->user()];

                                foreach (static::getTestableTokens($record->token_schema ?? []) as $token) {
                                    $key = $token['token'];
                                    $fieldKey = 'token_'.str_replace('.', '_', $key);
                                    $value = $data[$fieldKey] ?? '';

                                    if ($value === '') {
                                        continue;
                                    }

                                    if (str_contains($key, '.')) {
                                        [$prefix, $attr] = explode('.', $key, 2);
                                        if (! isset($models[$prefix])) {
                                            $models[$prefix] = new \stdClass;
                                        }
                                        $models[$prefix]->{$attr} = $value;
                                    } else {
                                        $models[$key] = new TokenValue($value);
                                    }
                                }

                                $rendered = $record->render($models, $data['locale']);

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
                                    modelsResolver: $models,
                                );

                                $sender->send();
                            } catch (\Throwable $e) {
                                Notification::make()
                                    ->title(__('fin-mail::fin-mail.template.notifications.test_failed'))
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

                            return auth()->user()->can('SendTest:EmailTemplate');
                        }),

                    Action::make('compose')
                        ->label(__('fin-mail::fin-mail.template.actions.compose'))
                        ->icon(Heroicon::OutlinedPencilSquare)
                        ->url(fn ($record): string => EmailTemplateResource::getUrl('compose', ['record' => $record]))
                        ->visible(function (): bool {
                            /** @var FinMailPlugin $plugin */
                            $plugin = filament('fin-mail');

                            if (! $plugin->isShieldAvailable()) {
                                return true;
                            }

                            return auth()->user()->can('Compose:EmailTemplate');
                        }),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    static::setThemeBulkAction(),
                    static::setLayoutBulkAction(),

                    DeleteBulkAction::make()
                        // The closure is asked once per record and its answer
                        // is the verdict: it has to check the record itself.
                        ->authorizeIndividualRecords(fn (EmailTemplate $record): bool => static::canDeleteRecord($record))
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

    /**
     * Put the selected templates on one theme, or back on the default theme.
     */
    protected static function setThemeBulkAction(): BulkAction
    {
        return BulkAction::make('set_theme')
            ->label(__('fin-mail::fin-mail.template.actions.set_theme'))
            ->icon(Heroicon::OutlinedSwatch)
            ->modalHeading(__('fin-mail::fin-mail.template.actions.set_theme'))
            ->modalSubmitActionLabel(__('fin-mail::fin-mail.template.actions.apply'))
            ->schema([
                Select::make('email_theme_id')
                    ->label(__('fin-mail::fin-mail.template.fields.theme'))
                    ->options(fn (): array => EmailTheme::query()->orderBy('name')->pluck('name', 'id')->all())
                    ->placeholder(__('fin-mail::fin-mail.template.fields.theme_placeholder'))
                    ->native(false),
            ])
            ->authorizeIndividualRecords(fn (EmailTemplate $record): bool => static::canEditRecord($record))
            ->action(function (Collection $records, array $data): void {
                $themeId = filled($data['email_theme_id'] ?? null) ? (int) $data['email_theme_id'] : null;

                foreach ($records as $record) {
                    $record->update(['email_theme_id' => $themeId]);
                }

                Notification::make()
                    ->title(trans_choice('fin-mail::fin-mail.template.notifications.theme_set', $records->count(), ['count' => $records->count()]))
                    ->success()
                    ->send();
            })
            ->deselectRecordsAfterCompletion();
    }

    /**
     * Put the selected templates on one of the configured layouts, or back
     * on the default layout. Shown only when config fin-mail.layouts lists
     * layouts.
     */
    protected static function setLayoutBulkAction(): BulkAction
    {
        return BulkAction::make('set_layout')
            ->label(__('fin-mail::fin-mail.template.actions.set_layout'))
            ->icon(Heroicon::OutlinedRectangleGroup)
            ->modalHeading(__('fin-mail::fin-mail.template.actions.set_layout'))
            ->modalSubmitActionLabel(__('fin-mail::fin-mail.template.actions.apply'))
            ->schema([
                Select::make('view_path')
                    ->label(__('fin-mail::fin-mail.template.fields.layout'))
                    ->options(fn (): array => EmailLayout::options())
                    ->placeholder(__('fin-mail::fin-mail.template.fields.layout_placeholder'))
                    ->native(false),
            ])
            ->authorizeIndividualRecords(fn (EmailTemplate $record): bool => static::canEditRecord($record))
            ->action(function (Collection $records, array $data): void {
                $viewPath = filled($data['view_path'] ?? null) ? (string) $data['view_path'] : null;

                foreach ($records as $record) {
                    $record->update(['view_path' => $viewPath]);
                }

                Notification::make()
                    ->title(trans_choice('fin-mail::fin-mail.template.notifications.layout_set', $records->count(), ['count' => $records->count()]))
                    ->success()
                    ->send();
            })
            ->deselectRecordsAfterCompletion()
            ->visible(fn (): bool => EmailLayout::hasOptions());
    }

    protected static function canEditRecord(EmailTemplate $record): bool
    {
        /** @var FinMailPlugin $plugin */
        $plugin = filament('fin-mail');

        return $plugin->getEmailTemplateResource()::canEdit($record);
    }

    /**
     * The resource's own delete check: the delete policy when there is one
     * (Shield's or the host's), allowed otherwise.
     */
    protected static function canDeleteRecord(EmailTemplate $record): bool
    {
        /** @var FinMailPlugin $plugin */
        $plugin = filament('fin-mail');

        return $plugin->getEmailTemplateResource()::canDelete($record);
    }

    /**
     * Build form fields for tokens that can be filled manually in test sends.
     * Skips config.* tokens and user.* tokens (auto-provided).
     *
     * @param  array<int, array{token: string, description?: string, example?: string}>  $tokenSchema
     *
     * @return array<int, TextInput>
     */
    protected static function buildTokenFields(array $tokenSchema): array
    {
        return collect(static::getTestableTokens($tokenSchema))
            ->map(
                fn (array $token): TextInput => TextInput::make('token_'.str_replace('.', '_', $token['token']))
                    ->label('{{ '.$token['token'].' }}')
                    ->helperText($token['description'] ?? null)
                    ->default($token['example'] ?? null)
            )
            ->all();
    }

    /**
     * Filter token schema to only tokens that need manual input.
     *
     * @param  array<int, array{token: string, description?: string, example?: string}>  $tokenSchema
     *
     * @return array<int, array{token: string, description?: string, example?: string}>
     */
    protected static function getTestableTokens(array $tokenSchema): array
    {
        return collect($tokenSchema)
            ->filter(function (array $token): bool {
                $key = $token['token'];

                if (str_starts_with($key, 'config.')) {
                    return false;
                }

                if (str_starts_with($key, 'user.')) {
                    return false;
                }

                return $key !== '';
            })
            ->values()
            ->all();
    }
}
