<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Actions;

use Closure;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use FinityLabs\FinMail\Contracts\EditorContract;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Settings\AttachmentSettings;
use FinityLabs\FinMail\Settings\GeneralSettings;
use Illuminate\Database\Eloquent\Model;

/**
 * Shared form builder for the compose email flow.
 * Used by SendEmailAction and the ComposeEmail page.
 */
class ComposeFormBuilder
{
    public function __construct(
        protected ?string $templateKey = null,
        protected ?Model $record = null,
        protected Closure|string|null $recipientResolver = null,
        protected Closure|array|null $ccResolver = null,
        protected Closure|array|null $bccResolver = null,
        protected Closure|array|null $modelsResolver = null,
        protected Closure|array|null $attachmentsResolver = null,
    ) {}

    public static function make(
        ?string $templateKey = null,
        ?Model $record = null,
        Closure|string|null $recipientResolver = null,
        Closure|array|null $ccResolver = null,
        Closure|array|null $bccResolver = null,
        Closure|array|null $modelsResolver = null,
        Closure|array|null $attachmentsResolver = null,
    ): static {
        return new static(
            $templateKey,
            $record,
            $recipientResolver,
            $ccResolver,
            $bccResolver,
            $modelsResolver,
            $attachmentsResolver,
        );
    }

    /**
     * @return array<int, Component>
     */
    public function build(): array
    {
        $template = $this->resolveTemplate();
        $models = $this->resolveModels();
        $rendered = $template?->render($models, renderBlocks: false) ?? ['subject' => '', 'body' => '', 'preheader' => ''];
        $recipient = $this->resolveRecipient();

        $mailSettings = app(GeneralSettings::class);

        $senders = collect($mailSettings->additional_senders)
            ->prepend(['address' => $mailSettings->default_from_address, 'name' => $mailSettings->default_from_name])
            ->filter()
            ->mapWithKeys(fn (array $s): array => [$s['address'] => "{$s['name']} <{$s['address']}>"])
            ->all();

        $editor = app(EditorContract::class);

        return [
            Section::make(__('fin-mail::fin-mail.compose_form.sections.recipients'))
                ->schema([
                    Select::make('from')
                        ->label(__('fin-mail::fin-mail.compose_form.fields.from'))
                        ->options($senders)
                        ->default($mailSettings->default_from_address)
                        ->native(false)
                        ->required(),

                    TagsInput::make('to')
                        ->label(__('fin-mail::fin-mail.compose_form.fields.to'))
                        ->default($recipient ? [$recipient] : [])
                        ->placeholder(__('fin-mail::fin-mail.compose_form.fields.to_placeholder'))
                        ->required()
                        ->nestedRecursiveRules(['email']),

                    TagsInput::make('cc')
                        ->label(__('fin-mail::fin-mail.compose_form.fields.cc'))
                        ->default($this->resolveCc() ?? [])
                        ->placeholder(__('fin-mail::fin-mail.compose_form.fields.cc_placeholder'))
                        ->nestedRecursiveRules(['email']),

                    TagsInput::make('bcc')
                        ->label(__('fin-mail::fin-mail.compose_form.fields.bcc'))
                        ->default($this->resolveBcc() ?? [])
                        ->placeholder(__('fin-mail::fin-mail.compose_form.fields.bcc_placeholder'))
                        ->nestedRecursiveRules(['email']),
                ])
                ->columns(2)
                ->collapsible(),

            Section::make(__('fin-mail::fin-mail.compose_form.sections.content'))
                ->schema([
                    Select::make('template_key')
                        ->label(__('fin-mail::fin-mail.compose_form.fields.template'))
                        ->options(
                            EmailTemplate::active()
                                ->pluck('name', 'key')
                        )
                        ->default($this->templateKey)
                        ->native(false)
                        ->searchable()
                        ->live()
                        ->afterStateUpdated(function (?string $state, Set $set): void {
                            if (! $state) {
                                return;
                            }

                            $tpl = EmailTemplate::findByKey($state);
                            if (! $tpl) {
                                return;
                            }

                            $models = $this->resolveModels();
                            $rendered = $tpl->render($models, renderBlocks: false);
                            $set('subject', $rendered['subject']);
                            $set('body', $rendered['body']);
                        }),

                    TextInput::make('subject')
                        ->label(__('fin-mail::fin-mail.compose_form.fields.subject'))
                        ->default($rendered['subject'])
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    $editor->make('body')
                        ->default($rendered['body'])
                        ->required(),
                ]),

            Section::make(__('fin-mail::fin-mail.compose_form.sections.attachments'))
                ->schema([
                    TextEntry::make('preset_attachments')
                        ->label(__('fin-mail::fin-mail.compose_form.fields.auto_attached'))
                        ->state(function (): string {
                            $attachments = $this->resolveAttachments();
                            if (empty($attachments)) {
                                return __('fin-mail::fin-mail.compose_form.fields.auto_attached_none');
                            }

                            return collect($attachments)->pluck('name')->implode(', ');
                        })
                        ->visible(fn (): bool => ! empty($this->resolveAttachments())),

                    FileUpload::make('additional_attachments')
                        ->label(__('fin-mail::fin-mail.compose_form.fields.additional_attachments'))
                        ->multiple()
                        ->disk(config('fin-mail.attachments_disk', 'local'))
                        ->directory('email-attachments')
                        ->maxSize(app(AttachmentSettings::class)->max_size_mb * 1024)
                        ->columnSpanFull(),
                ])
                ->collapsible()
                ->collapsed(),
        ];
    }

    protected function resolveTemplate(): ?EmailTemplate
    {
        return $this->templateKey
            ? EmailTemplate::findByKey($this->templateKey)
            : null;
    }

    protected function resolveRecipient(): ?string
    {
        if (! $this->recipientResolver) {
            return null;
        }

        return is_callable($this->recipientResolver)
            ? ($this->recipientResolver)($this->record)
            : $this->recipientResolver;
    }

    /**
     * @return array<int, string>|null
     */
    protected function resolveCc(): ?array
    {
        if (! $this->ccResolver) {
            return null;
        }

        $result = is_callable($this->ccResolver)
            ? ($this->ccResolver)($this->record)
            : $this->ccResolver;

        return is_array($result) ? $result : [$result];
    }

    /**
     * @return array<int, string>|null
     */
    protected function resolveBcc(): ?array
    {
        if (! $this->bccResolver) {
            return null;
        }

        $result = is_callable($this->bccResolver)
            ? ($this->bccResolver)($this->record)
            : $this->bccResolver;

        return is_array($result) ? $result : [$result];
    }

    /**
     * @return array<string, mixed>
     */
    protected function resolveModels(): array
    {
        if (! $this->modelsResolver) {
            return [];
        }

        return is_callable($this->modelsResolver)
            ? ($this->modelsResolver)($this->record)
            : $this->modelsResolver;
    }

    /**
     * @return array<int, array{path: string, name?: string, mime?: string}>
     */
    protected function resolveAttachments(): array
    {
        if (! $this->attachmentsResolver) {
            return [];
        }

        return is_callable($this->attachmentsResolver)
            ? ($this->attachmentsResolver)($this->record)
            : $this->attachmentsResolver;
    }
}
