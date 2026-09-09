<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Clusters\FinMailSettings\Pages;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use FinityLabs\FinMail\Clusters\FinMailSettings\FinMailSettings;
use FinityLabs\FinMail\Settings\GeneralSettings;
use FinityLabs\FinSupport\Pages\Concerns\HasPageShieldSupport;

class ManageGeneralSettings extends SettingsPage
{
    use HasPageShieldSupport;

    protected static ?string $cluster = FinMailSettings::class;

    protected static string $settings = GeneralSettings::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return __('fin-mail::fin-mail.settings.tabs.general');
    }

    public function getTitle(): string
    {
        return __('fin-mail::fin-mail.settings.titles.general');
    }

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make(__('fin-mail::fin-mail.settings.sections.default_sender'))
                ->description(__('fin-mail::fin-mail.settings.sections.default_sender_description'))
                ->schema([
                    TextInput::make('default_from_address')
                        ->label(__('fin-mail::fin-mail.settings.fields.from_email'))
                        ->email()
                        ->required()
                        ->maxLength(255),

                    TextInput::make('default_from_name')
                        ->label(__('fin-mail::fin-mail.settings.fields.from_name'))
                        ->required()
                        ->maxLength(255),
                ])
                ->columns(2),

            Section::make(__('fin-mail::fin-mail.settings.sections.additional_senders'))
                ->description(__('fin-mail::fin-mail.settings.sections.additional_senders_description'))
                ->schema([
                    Repeater::make('additional_senders')
                        ->hiddenLabel()
                        ->schema([
                            TextInput::make('address')
                                ->label(__('fin-mail::fin-mail.settings.fields.sender_email'))
                                ->email()
                                ->required()
                                ->maxLength(255),
                            TextInput::make('name')
                                ->label(__('fin-mail::fin-mail.settings.fields.sender_name'))
                                ->required()
                                ->maxLength(255),
                        ])
                        ->columns(2)
                        ->defaultItems(0)
                        ->collapsible()
                        ->addActionLabel(__('fin-mail::fin-mail.settings.sections.add_additional_senders'))
                        ->itemLabel(fn (array $state): string => $state['name'] ?? $state['address'] ?? (string) __('fin-mail::fin-mail.settings.fields.sender_new')),
                ]),

            Section::make(__('fin-mail::fin-mail.settings.sections.localization'))
                ->schema([
                    TextInput::make('default_locale')
                        ->label(__('fin-mail::fin-mail.settings.fields.default_locale'))
                        ->required()
                        ->maxLength(10)
                        ->helperText(__('fin-mail::fin-mail.settings.fields.default_locale_helper')),

                    Repeater::make('languages')
                        ->label(__('fin-mail::fin-mail.settings.fields.languages'))
                        ->schema([
                            TextInput::make('code')
                                ->label(__('fin-mail::fin-mail.settings.fields.language_code'))
                                ->required()
                                ->maxLength(10)
                                ->placeholder('en'),
                            TextInput::make('display')
                                ->label(__('fin-mail::fin-mail.settings.fields.language_display'))
                                ->required()
                                ->maxLength(50)
                                ->placeholder('English'),
                            TextInput::make('flag-icon')
                                ->label(__('fin-mail::fin-mail.settings.fields.language_flag'))
                                ->maxLength(10)
                                ->placeholder('gb'),
                        ])
                        ->columns(3)
                        ->defaultItems(1)
                        ->collapsible()
                        ->itemLabel(fn (array $state): string => $state['display'] ?? $state['code'] ?? (string) __('fin-mail::fin-mail.settings.fields.language_new')),
                ]),

            Section::make(__('fin-mail::fin-mail.settings.sections.categories'))
                ->schema([
                    Repeater::make('categories')
                        ->label('')
                        ->schema([
                            TextInput::make('key')
                                ->label(__('fin-mail::fin-mail.settings.fields.category_key'))
                                ->required()
                                ->maxLength(50)
                                ->placeholder('transactional')
                                ->disabled(fn (?string $state): bool => $state === 'system')
                                ->dehydrated(true),
                            TextInput::make('label')
                                ->label(__('fin-mail::fin-mail.settings.fields.category_label'))
                                ->required()
                                ->maxLength(100)
                                ->placeholder('Transactional'),
                        ])
                        ->columns(2)
                        ->defaultItems(0)
                        ->collapsible()
                        ->itemLabel(fn (array $state): string => $state['label'] ?? $state['key'] ?? (string) __('fin-mail::fin-mail.settings.fields.category_new'))
                        ->deleteAction(
                            fn (Action $action) => $action
                                ->hidden(function (array $arguments, Repeater $component): bool {
                                    $items = $component->getState();
                                    $itemUuid = $arguments['item'] ?? null;

                                    return $itemUuid && ($items[$itemUuid]['key'] ?? '') === 'system';
                                })
                        ),
                ]),
        ]);
    }
}
