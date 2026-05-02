<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\EmailTemplateResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use FinityLabs\FinMail\FinMailPlugin;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Resources\EmailTemplateResource\EmailTemplateResource;
use FinityLabs\FinMail\Settings\GeneralSettings;

/**
 * @property EmailTemplate $record
 */
class ViewEmailTemplate extends ViewRecord
{
    protected static string $resource = EmailTemplateResource::class;

    public string $activeLocale = '';

    public function mount(int|string $record): void
    {
        $this->activeLocale = app(GeneralSettings::class)->default_locale;

        parent::mount($record);
    }

    protected function fillForm(): void
    {
        $this->record->setLocale($this->activeLocale);

        parent::fillForm();
    }

    /**
     * Convert translatable fields from full translations arrays to the active locale's value.
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
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

    protected function getHeaderActions(): array
    {
        $languages = app(GeneralSettings::class)->languages;

        return [
            ActionGroup::make(
                collect($languages)
                    ->map(
                        fn (array $lang) => Action::make("locale_{$lang['code']}")
                            ->label($lang['display'])
                            ->color($this->activeLocale === $lang['code'] ? 'primary' : 'gray')
                            ->action(fn () => $this->switchLocale($lang['code']))
                    )->values()->all()
            )
                ->label(fn (): string => __('fin-mail::fin-mail.template.language_label', ['locale' => strtoupper($this->activeLocale)]))
                ->icon(Heroicon::OutlinedLanguage)
                ->button(),

            Action::make('preview')
                ->label(__('fin-mail::fin-mail.template.actions.preview'))
                ->icon(Heroicon::OutlinedEye)
                ->modal()
                ->modalHeading(fn (): string => __('fin-mail::fin-mail.template.actions.preview').": {$this->record->name}")
                ->modalContent(fn () => view('fin-mail::components.email-preview', [
                    'subject' => $this->record->getTranslation('subject', $this->activeLocale),
                    'preheader' => $this->record->getTranslation('preheader', $this->activeLocale),
                    'html' => $this->record->getTranslation('body', $this->activeLocale),
                    'theme' => $this->record->theme?->resolvedColors(),
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

            EditAction::make(),
        ];
    }
}
