<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\EmailTemplateResource\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use FinityLabs\FinMail\Contracts\EditorContract;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Settings\AttachmentSettings;
use FinityLabs\FinMail\Settings\GeneralSettings;

class ComposeEmailForm
{
    public static function configure(Schema $schema, EmailTemplate $record): Schema
    {
        $editor = app(EditorContract::class);

        $mailSettings = app(GeneralSettings::class);

        $senders = collect($mailSettings->additional_senders)
            ->prepend(['address' => $mailSettings->default_from_address, 'name' => $mailSettings->default_from_name])
            ->filter()
            ->mapWithKeys(fn (array $s): array => [$s['address'] => "{$s['name']} <{$s['address']}>"])
            ->all();

        return $schema
            ->columns(3)
            ->components([
                Group::make()
                    ->columns(1)
                    ->columnSpan(['lg' => 2])
                    ->schema([
                        Section::make(__('fin-mail::fin-mail.compose.sections.recipients'))
                            ->icon(Heroicon::OutlinedUserGroup)
                            ->schema([
                                Select::make('from')
                                    ->label(__('fin-mail::fin-mail.compose.fields.from'))
                                    ->options($senders)
                                    ->native(false)
                                    ->required(),

                                TagsInput::make('to')
                                    ->label(__('fin-mail::fin-mail.compose.fields.to'))
                                    ->placeholder(__('fin-mail::fin-mail.compose.fields.to_placeholder'))
                                    ->required()
                                    ->nestedRecursiveRules(['email']),

                                TagsInput::make('cc')
                                    ->label(__('fin-mail::fin-mail.compose.fields.cc'))
                                    ->placeholder(__('fin-mail::fin-mail.compose.fields.cc_placeholder'))
                                    ->nestedRecursiveRules(['email']),

                                TagsInput::make('bcc')
                                    ->label(__('fin-mail::fin-mail.compose.fields.bcc'))
                                    ->placeholder(__('fin-mail::fin-mail.compose.fields.bcc_placeholder'))
                                    ->nestedRecursiveRules(['email']),
                            ])
                            ->columns(2)
                            ->collapsible(),
                        Section::make(__('fin-mail::fin-mail.compose.sections.content'))
                            ->icon(Heroicon::OutlinedDocumentText)
                            ->schema([
                                Select::make('locale')
                                    ->label(__('fin-mail::fin-mail.compose.fields.locale'))
                                    ->options(fn (): array => collect($mailSettings->languages)->pluck('display', 'code')->all())
                                    ->default(fn (): string => app()->getLocale())
                                    ->native(false)
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function (?string $state, Set $set) use ($record): void {
                                        if (! $state) {
                                            return;
                                        }

                                        $rendered = $record->render([], $state);
                                        $set('subject', $rendered['subject']);
                                        $set('preheader', $rendered['preheader']);
                                        $set('body', $rendered['body']);
                                    }),

                                TextInput::make('subject')
                                    ->label(__('fin-mail::fin-mail.compose.fields.subject'))
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),

                                TextInput::make('preheader')
                                    ->label(__('fin-mail::fin-mail.compose.fields.preheader'))
                                    ->maxLength(255)
                                    ->helperText(__('fin-mail::fin-mail.compose.fields.preheader_helper'))
                                    ->columnSpanFull(),

                                self::applyMergeTags(
                                    $editor->make('body')
                                        ->label(__('fin-mail::fin-mail.compose.fields.body'))
                                        ->required(),
                                    $record,
                                ),
                            ]),
                    ]),

                Group::make()
                    ->columnSpan(['lg' => 1])
                    ->schema([
                        Section::make(__('fin-mail::fin-mail.compose.sections.attachments'))
                            ->icon(Heroicon::OutlinedPaperClip)
                            ->schema([
                                FileUpload::make('attachments')
                                    ->label(__('fin-mail::fin-mail.compose.fields.attach_files'))
                                    ->multiple()
                                    ->disk(config('fin-mail.attachments_disk', 'local'))
                                    ->directory('email-attachments')
                                    ->maxSize(app(AttachmentSettings::class)->max_size_mb * 1024)
                                    ->columnSpanFull(),
                            ]),

                        Section::make(__('fin-mail::fin-mail.compose.sections.tokens'))
                            ->icon(Heroicon::OutlinedCodeBracket)
                            ->schema([
                                TextEntry::make('tokens_info')
                                    ->bulleted()
                                    ->state(function () use ($record): array {
                                        $tokens = $record->token_schema ?? [];
                                        if (empty($tokens)) {
                                            return [__('fin-mail::fin-mail.compose.fields.no_tokens')];
                                        }

                                        return collect($tokens)
                                            ->map(fn (array $t): string => "{{ {$t['token']} }} — {$t['description']}".($t['example'] ?? false ? " (e.g., {$t['example']})" : ''))
                                            ->all();
                                    }),
                            ]),
                    ]),
            ])->statePath('data');
    }

    protected static function applyMergeTags(mixed $component, EmailTemplate $record): mixed
    {
        if ($component instanceof RichEditor) {
            $component->mergeTags(
                collect($record->token_schema ?? [])
                    ->pluck('token')
                    ->filter()
                    ->values()
                    ->all(),
            );
        }

        return $component;
    }
}
