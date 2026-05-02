<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\EmailTemplateResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\RepeatableEntry\TableColumn;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use FinityLabs\FinMail\Editors\Blocks\ButtonBlock;
use FinityLabs\FinMail\FinMailPlugin;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\EmailTemplateVersion;
use FinityLabs\FinMail\Models\EmailTheme;
use FinityLabs\FinMail\Resources\EmailTemplateResource\EmailTemplateResource;
use FinityLabs\FinMail\Settings\GeneralSettings;

/**
 * @property EmailTemplate $record
 */
class EditEmailTemplate extends EditRecord
{
    protected static string $resource = EmailTemplateResource::class;

    public string $activeLocale = '';

    public ?int $previewVersionNumber = null;

    public function mount(int|string $record): void
    {
        $this->activeLocale = app(GeneralSettings::class)->default_locale;

        parent::mount($record);

        $this->syncButtonPreviewTheme();
    }

    protected function fillForm(): void
    {
        $this->record->setLocale($this->activeLocale);

        parent::fillForm();
    }

    /**
     * Convert translatable fields from full translations arrays to the active locale's value.
     *
     * attributesToArray() returns {'hu': '<p>...</p>'} for translatable fields,
     * but Filament form components (especially RichEditor/Tiptap) expect a string.
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['active_locale'] = $this->activeLocale;

        foreach ($this->record->translatable as $key) {
            if (isset($data[$key]) && is_array($data[$key])) {
                $data[$key] = $data[$key][$this->activeLocale]
                    ?? $data[$key][array_key_first($data[$key])]
                    ?? '';
            }
        }

        return $data;
    }

    public function switchLocale(string $locale): void
    {
        $this->activeLocale = $locale;
        $this->record->setLocale($locale);
        $this->fillForm();
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->record->setLocale($this->activeLocale);

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('preview')
                ->label(__('fin-mail::fin-mail.template.actions.preview'))
                ->icon(Heroicon::OutlinedEye)
                ->modal()
                ->modalHeading(fn (): string => __('fin-mail::fin-mail.template.actions.preview').": {$this->record->name}")
                ->modalContent(function () {
                    $themeId = $this->data['email_theme_id'] ?? null;
                    $theme = $themeId ? EmailTheme::find($themeId)?->resolvedColors() : null;

                    return view('fin-mail::components.email-preview', [
                        'subject' => $this->data['subject'] ?? '',
                        'preheader' => $this->data['preheader'] ?? '',
                        'html' => $this->data['body'] ?? '',
                        'theme' => $theme,
                    ]);
                })
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

            Action::make('compose')
                ->label(__('fin-mail::fin-mail.template.actions.compose'))
                ->icon(Heroicon::OutlinedPaperAirplane)
                ->url(fn (): string => static::getResource()::getUrl('compose', ['record' => $this->record]))
                ->visible(function (): bool {
                    /** @var FinMailPlugin $plugin */
                    $plugin = filament('fin-mail');

                    if (! $plugin->isShieldAvailable()) {
                        return true;
                    }

                    return auth()->user()->can('Compose:EmailTemplate');
                }),

            Action::make('version_history')
                ->label(__('fin-mail::fin-mail.template.actions.version_history'))
                ->icon(Heroicon::OutlinedClock)
                ->modal()
                ->modalHeading(__('fin-mail::fin-mail.template.actions.version_history'))
                ->schema([
                    RepeatableEntry::make('versions')
                        ->hiddenLabel()
                        ->table([
                            TableColumn::make('#')->width('120px'),
                            TableColumn::make(__('fin-mail::fin-mail.template.versioning.date')),
                            TableColumn::make(__('fin-mail::fin-mail.template.versioning.by')),
                        ])
                        ->schema([
                            TextEntry::make('version')
                                ->prefixAction(function (EmailTemplateVersion $record) {
                                    return
                                        Action::make('preview')
                                            ->label(__('fin-mail::fin-mail.template.versioning.preview'))
                                            ->icon(Heroicon::OutlinedEye)
                                            ->iconButton()
                                            ->modal()
                                            ->modalHeading(__('fin-mail::fin-mail.template.actions.preview').' — v'.$record->version)
                                            ->modalContent(function () use ($record) {
                                                $locale = $this->activeLocale;

                                                return view('fin-mail::components.email-preview', [
                                                    'subject' => $record->subject[$locale] ?? collect($record->subject)->first() ?? '',
                                                    'preheader' => $record->preheader[$locale] ?? collect($record->preheader)->first() ?? '',
                                                    'html' => $record->body[$locale] ?? collect($record->body)->first() ?? '',
                                                    'theme' => $this->record->theme?->resolvedColors(),
                                                ]);
                                            })
                                            ->modalWidth(Width::FourExtraLarge)
                                            ->modalSubmitAction(false)
                                            ->overlayParentActions();
                                })
                                ->prefixAction(function (EmailTemplateVersion $record) {
                                    return
                                        Action::make('restore')
                                            ->label(__('fin-mail::fin-mail.template.versioning.restore'))
                                            ->icon(Heroicon::OutlinedArrowUturnLeft)
                                            ->iconButton()
                                            ->requiresConfirmation()
                                            ->modalHeading(__('fin-mail::fin-mail.template.versioning.restore'))
                                            ->modalDescription(__('fin-mail::fin-mail.template.versioning.restore_confirm', ['version' => $record->version]))
                                            ->cancelParentActions()
                                            ->action(function () use ($record) {
                                                $this->record->restoreVersion($record->version);
                                                $this->fillForm();

                                                Notification::make()
                                                    ->title(__('fin-mail::fin-mail.template.versioning.restored', ['version' => $record->version]))
                                                    ->success()
                                                    ->send();
                                            });
                                }),
                            TextEntry::make('created_at')
                                ->dateTime(app('fin-mail')->dateTimeFormat()),
                            TextEntry::make('createdBy.name')
                                ->placeholder('-'),
                        ]),
                ])
                ->modalWidth(Width::ThreeExtraLarge)
                ->modalSubmitAction(false)
                ->visible(fn (): bool => (bool) config('fin-mail.versioning.enabled')),

            Action::make('preview_version')
                ->hidden()
                ->modal()
                ->modalHeading(fn (): string => __('fin-mail::fin-mail.template.actions.preview').' — v'.$this->previewVersionNumber)
                ->modalContent(function () {
                    /** @var EmailTemplateVersion|null $version */
                    $version = $this->record->versions()->where('version', $this->previewVersionNumber)->first();

                    if (! $version) {
                        return '';
                    }

                    $locale = $this->activeLocale;

                    return view('fin-mail::components.email-preview', [
                        'subject' => $version->subject[$locale] ?? collect($version->subject)->first() ?? '',
                        'preheader' => $version->preheader[$locale] ?? collect($version->preheader)->first() ?? '',
                        'html' => $version->body[$locale] ?? collect($version->body)->first() ?? '',
                        'theme' => $this->record->theme?->resolvedColors(),
                    ]);
                })
                ->modalWidth(Width::FourExtraLarge)
                ->modalSubmitAction(false),

            DeleteAction::make()
                ->visible(function (): bool {
                    /** @var FinMailPlugin $plugin */
                    $plugin = filament('fin-mail');

                    return $plugin->hasDeleteActionOnEditPage() && $this->record->isDeletable();
                }),
        ];
    }

    protected function syncButtonPreviewTheme(): void
    {
        $themeId = $this->data['email_theme_id'] ?? $this->record->email_theme_id ?? null;

        ButtonBlock::setPreviewTheme(
            $themeId ? EmailTheme::find($themeId)?->resolvedColors() : null
        );
    }

    protected function beforeSave(): void
    {
        if (config('fin-mail.versioning.enabled') && $this->record->exists) {
            $this->record->saveVersion(auth()->id());
        }
    }

    protected function getSavedNotification(): ?Notification
    {
        $notification = Notification::make()
            ->title(__('fin-mail::fin-mail.template.notifications.saved'));

        if (config('fin-mail.versioning.enabled')) {
            $notification->body(__('fin-mail::fin-mail.template.notifications.saved_body'));
        }

        return $notification->success();
    }

    public function previewVersion(int $versionNumber): void
    {
        $this->previewVersionNumber = $versionNumber;
        $this->mountAction('preview_version');
    }

    public function restoreVersion(int $versionNumber): void
    {
        $this->record->saveVersion(auth()->id());
        $this->record->restoreVersion($versionNumber);
        $this->fillForm();

        Notification::make()
            ->title(__('fin-mail::fin-mail.template.versioning.restored', ['version' => $versionNumber]))
            ->success()
            ->send();
    }
}
