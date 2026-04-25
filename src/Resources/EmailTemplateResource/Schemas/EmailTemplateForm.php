<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\EmailTemplateResource\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use FinityLabs\FinMail\Contracts\EditorContract;
use FinityLabs\FinMail\FinMailPlugin;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\EmailTheme;
use FinityLabs\FinMail\Settings\GeneralSettings;
use Livewire\Component as LivewireComponent;

class EmailTemplateForm
{
    public static function configure(Schema $schema): Schema
    {
        $editor = app(EditorContract::class);

        return $schema->schema([

            Tabs::make('Template')
                ->tabs([

                    Tab::make(__('fin-mail::fin-mail.template.tabs.content'))
                        ->icon(Heroicon::OutlinedDocumentText)
                        ->schema([
                            TextEntry::make('locked_notice')
                                ->label('')
                                ->icon(Heroicon::OutlinedLockClosed)
                                ->iconColor('warning')
                                ->state(__('fin-mail::fin-mail.template.notices.locked'))
                                ->visible(fn (?EmailTemplate $record): bool => (bool) $record?->is_locked)
                                ->columnSpanFull(),

                            Grid::make(2)->schema([
                                TextInput::make('key')
                                    ->label(__('fin-mail::fin-mail.template.fields.key'))
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->helperText(__('fin-mail::fin-mail.template.fields.key_helper'))
                                    ->maxLength(255)
                                    ->disabled(fn (?EmailTemplate $record): bool => (bool) $record?->is_locked)
                                    ->dehydrated(true),

                                Select::make('category')
                                    ->label(__('fin-mail::fin-mail.template.fields.category'))
                                    ->options(fn (): array => app(GeneralSettings::class)->getCategoryOptions())
                                    ->default('transactional')
                                    ->native(false)
                                    ->required()
                                    ->disabled(fn (?EmailTemplate $record): bool => (bool) $record?->is_locked)
                                    ->dehydrated(true),
                            ]),

                            Select::make('active_locale')
                                ->label(__('fin-mail::fin-mail.template.fields.locale'))
                                ->options(fn (): array => collect(app(GeneralSettings::class)->languages)->pluck('display', 'code')->all())
                                ->default(fn (): string => app(GeneralSettings::class)->default_locale)
                                ->native(false)
                                ->searchable()
                                ->live()
                                ->afterStateUpdated(fn (LivewireComponent $livewire, ?string $state) => $state ? $livewire->switchLocale($state) : null)
                                ->dehydrated(false)
                                ->columnSpanFull(),

                            TextInput::make('name')
                                ->label(__('fin-mail::fin-mail.template.fields.name'))
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),

                            TextInput::make('subject')
                                ->label(__('fin-mail::fin-mail.template.fields.subject'))
                                ->required()
                                ->maxLength(255)
                                ->helperText(__('fin-mail::fin-mail.template.fields.subject_helper'))
                                ->columnSpanFull(),

                            TextInput::make('preheader')
                                ->label(__('fin-mail::fin-mail.template.fields.preheader'))
                                ->maxLength(255)
                                ->helperText(__('fin-mail::fin-mail.template.fields.preheader_helper'))
                                ->columnSpanFull(),

                            self::applyMergeTags(
                                $editor->make('body')
                                    ->label(__('fin-mail::fin-mail.template.fields.body'))
                                    ->required(),
                                fn (callable $get): array => collect($get('token_schema') ?? [])
                                    ->pluck('token')
                                    ->filter()
                                    ->values()
                                    ->all(),
                            ),
                        ]),

                    Tab::make(__('fin-mail::fin-mail.template.tabs.settings'))
                        ->icon(Heroicon::OutlinedCog6Tooth)
                        ->schema([
                            Grid::make(2)->schema([
                                Select::make('email_theme_id')
                                    ->label(__('fin-mail::fin-mail.template.fields.theme'))
                                    ->relationship('theme', 'name')
                                    ->placeholder(__('fin-mail::fin-mail.template.fields.theme_placeholder'))
                                    ->native(false)
                                    ->preload()
                                    ->live()
                                    ->afterStateUpdated(function (?string $state) {
                                        $theme = $state ? EmailTheme::find($state)?->resolvedColors() : null;

                                        foreach (FinMailPlugin::getCustomBlockClasses() as $blockClass) {
                                            if (method_exists($blockClass, 'setPreviewTheme')) {
                                                $blockClass::setPreviewTheme($theme);
                                            }
                                        }
                                    }),

                                Toggle::make('is_active')
                                    ->label(__('fin-mail::fin-mail.template.fields.is_active'))
                                    ->default(true)
                                    ->helperText(__('fin-mail::fin-mail.template.fields.is_active_helper')),
                            ]),

                            TagsInput::make('tags')
                                ->label(__('fin-mail::fin-mail.template.fields.tags'))
                                ->placeholder(__('fin-mail::fin-mail.template.fields.tags_placeholder')),

                            Section::make(__('fin-mail::fin-mail.template.sections.custom_sender'))
                                ->description(__('fin-mail::fin-mail.template.sections.custom_sender_description'))
                                ->schema([
                                    Grid::make(2)->schema([
                                        TextInput::make('from.address')
                                            ->label(__('fin-mail::fin-mail.template.fields.from_address'))
                                            ->email()
                                            ->placeholder(fn (): string => app(GeneralSettings::class)->default_from_address),

                                        TextInput::make('from.name')
                                            ->label(__('fin-mail::fin-mail.template.fields.from_name'))
                                            ->placeholder(fn (): string => app(GeneralSettings::class)->default_from_name),
                                    ]),
                                ])
                                ->collapsed(),

                            Section::make(__('fin-mail::fin-mail.template.sections.custom_reply_to'))
                                ->description(__('fin-mail::fin-mail.template.sections.custom_reply_to_description'))
                                ->schema([
                                    Grid::make(2)->schema([
                                        TextInput::make('reply_to.address')
                                            ->label(__('fin-mail::fin-mail.template.fields.reply_to_address'))
                                            ->email()
                                            ->placeholder(fn (): string => app(GeneralSettings::class)->default_from_address),

                                        TextInput::make('reply_to.name')
                                            ->label(__('fin-mail::fin-mail.template.fields.reply_to_name'))
                                            ->placeholder(fn (): string => app(GeneralSettings::class)->default_from_name),
                                    ]),
                                ])
                                ->collapsed(),
                        ]),

                    Tab::make(__('fin-mail::fin-mail.template.tabs.tokens'))
                        ->icon(Heroicon::OutlinedCodeBracket)
                        ->schema([
                            Repeater::make('token_schema')
                                ->label(__('fin-mail::fin-mail.template.tokens.label'))
                                ->helperText(__('fin-mail::fin-mail.template.tokens.helper'))
                                ->schema([
                                    TextInput::make('token')
                                        ->label(__('fin-mail::fin-mail.template.tokens.token'))
                                        ->placeholder(__('fin-mail::fin-mail.template.tokens.token_placeholder'))
                                        ->required(),
                                    TextInput::make('description')
                                        ->label(__('fin-mail::fin-mail.template.tokens.description'))
                                        ->placeholder(__('fin-mail::fin-mail.template.tokens.description_placeholder'))
                                        ->required(),
                                    TextInput::make('example')
                                        ->label(__('fin-mail::fin-mail.template.tokens.example'))
                                        ->placeholder(__('fin-mail::fin-mail.template.tokens.example_placeholder')),
                                ])
                                ->columns(3)
                                ->defaultItems(0)
                                ->collapsible()
                                ->itemLabel(fn (array $state): string => $state['token'] ?? __('fin-mail::fin-mail.template.tokens.new_item')),
                        ]),
                ])
                ->columnSpanFull(),
        ]);
    }

    protected static function applyMergeTags(mixed $component, array|\Closure $tags): mixed
    {
        if ($component instanceof RichEditor) {
            $component->mergeTags($tags);
        }

        return $component;
    }
}
