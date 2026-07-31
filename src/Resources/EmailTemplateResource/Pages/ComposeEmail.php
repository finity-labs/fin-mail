<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\EmailTemplateResource\Pages;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Radio;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use FinityLabs\FinMail\Actions\EmailSender;
use FinityLabs\FinMail\Editors\Blocks\ButtonBlock;
use FinityLabs\FinMail\Helpers\TipTapConverter;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Resources\EmailTemplateResource\EmailTemplateResource;
use FinityLabs\FinMail\Resources\EmailTemplateResource\Schemas\ComposeEmailForm;
use FinityLabs\FinMail\Settings\GeneralSettings;

/**
 * Full-page compose screen.
 *
 * Loaded from: /admin/email-templates/{record}/compose
 *
 * @property Schema $form
 */
class ComposeEmail extends Page
{
    use InteractsWithForms;

    protected static string $resource = EmailTemplateResource::class;

    protected string $view = 'fin-mail::pages.compose-email';

    protected static ?string $title = null;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPaperAirplane;

    /** @var array<string, mixed>|null */
    public ?array $data = [];

    public EmailTemplate $record;

    public function mount(EmailTemplate $record): void
    {
        $this->record = $record;

        $locale = app()->getLocale();
        $rendered = $record->render([], $locale, renderBlocks: false);

        ButtonBlock::setPreviewTheme($record->theme?->resolvedColors());

        $this->form->fill([
            'template_key' => $record->key,
            'from' => $record->from['address'] ?? app(GeneralSettings::class)->default_from_address,
            'to' => array_filter([auth()->user()?->email]),
            'cc' => [],
            'bcc' => [],
            'locale' => $locale,
            'subject' => $rendered['subject'],
            'preheader' => $rendered['preheader'],
            'body' => $rendered['body'],
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return ComposeEmailForm::configure($schema, $this->record);
    }

    /**
     * @param  'individual'|'combined'|null  $sendMode  How to deliver when there are multiple "To" recipients.
     */
    public function send(?string $sendMode = null): void
    {
        $data = $this->form->getState();

        $recipients = array_values(array_filter($data['to'] ?? []));
        $groups = $this->resolveRecipientGroups($recipients, $sendMode);

        $sentCount = 0;

        foreach ($groups as $group) {
            $sender = new EmailSender(
                data: array_merge($data, ['to' => $group]),
                record: null,
                templateKey: $this->record->key,
                notify: count($groups) === 1,
            );

            if ($sender->send()) {
                $sentCount++;
            }
        }

        if (count($groups) > 1 && $sentCount > 0) {
            Notification::make()
                ->title(__('fin-mail::fin-mail.compose.notifications.individual_sent'))
                ->body(trans_choice('fin-mail::fin-mail.compose.notifications.individual_sent_body', $sentCount, ['count' => $sentCount]))
                ->success()
                ->send();
        }

        if ($sentCount === count($groups)) {
            $this->redirect(static::getResource()::getUrl('index'));
        }
    }

    /**
     * Split recipients into the "To" groups that each become one email.
     *
     * Individual mode with more than one recipient yields one group per
     * recipient; every other case delivers a single email addressed to all.
     *
     * @param  list<string>  $recipients
     * @param  'individual'|'combined'|null  $sendMode
     *
     * @return list<list<string>>
     */
    protected function resolveRecipientGroups(array $recipients, ?string $sendMode): array
    {
        if ($sendMode === 'individual' && count($recipients) > 1) {
            return array_map(static fn (string $recipient): array => [$recipient], $recipients);
        }

        return [$recipients];
    }

    public function getTitle(): string
    {
        return __('fin-mail::fin-mail.compose.title_with_name', ['name' => $this->record->name]);
    }

    private function getPreviewHtml(): string
    {
        $body = $this->data['body'] ?? '';

        if (is_array($body)) {
            return TipTapConverter::toHtml($body);
        }

        return $body;
    }

    private function hasMultipleRecipients(): bool
    {
        return count(array_filter($this->data['to'] ?? [])) > 1;
    }

    /**
     * The delivery-mode chooser shown in the send modal, only when there is
     * more than one "To" recipient. A single recipient needs no choice.
     *
     * @return list<Radio>
     */
    private function getSendModeSchema(): array
    {
        if (! $this->hasMultipleRecipients()) {
            return [];
        }

        return [
            Radio::make('send_mode')
                ->label(__('fin-mail::fin-mail.compose.confirm.send_mode_label'))
                ->options([
                    'individual' => __('fin-mail::fin-mail.compose.confirm.send_mode_individual'),
                    'combined' => __('fin-mail::fin-mail.compose.confirm.send_mode_combined'),
                ])
                ->descriptions([
                    'individual' => __('fin-mail::fin-mail.compose.confirm.send_mode_individual_help'),
                    'combined' => __('fin-mail::fin-mail.compose.confirm.send_mode_combined_help'),
                ])
                ->default('individual')
                ->required(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('send')
                ->label(__('fin-mail::fin-mail.compose.actions.send'))
                ->icon(Heroicon::OutlinedPaperAirplane)
                ->requiresConfirmation()
                ->modalHeading(__('fin-mail::fin-mail.compose.confirm.heading'))
                ->modalDescription(fn (): string => $this->hasMultipleRecipients()
                    ? __('fin-mail::fin-mail.compose.confirm.description_multiple')
                    : __('fin-mail::fin-mail.compose.confirm.description'))
                ->modalSubmitActionLabel(__('fin-mail::fin-mail.compose.actions.send'))
                ->schema(fn (): array => $this->getSendModeSchema())
                ->action(function (array $data): void {
                    $this->send($data['send_mode'] ?? null);
                }),

            Action::make('preview')
                ->label(__('fin-mail::fin-mail.compose.actions.preview'))
                ->icon(Heroicon::OutlinedEye)
                ->modal()
                ->modalHeading(__('fin-mail::fin-mail.template.actions.preview'))
                ->modalContent(fn () => view('fin-mail::components.email-preview', [
                    'subject' => $this->data['subject'] ?? '',
                    'preheader' => $this->data['preheader'] ?? '',
                    'html' => $this->getPreviewHtml(),
                    'theme' => $this->record->theme?->resolvedColors(),
                ]))
                ->modalWidth(Width::FourExtraLarge)
                ->modalSubmitAction(false)
                ->color('gray'),

            Action::make('back')
                ->label(__('fin-mail::fin-mail.template.actions.back_to_templates'))
                ->icon(Heroicon::OutlinedArrowLeft)
                ->url(static::getResource()::getUrl('index'))
                ->color('gray'),
        ];
    }
}
