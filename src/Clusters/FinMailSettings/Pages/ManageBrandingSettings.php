<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Clusters\FinMailSettings\Pages;

use BackedEnum;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use FinityLabs\FinMail\Clusters\FinMailSettings\FinMailSettings;
use FinityLabs\FinMail\Settings\BrandingSettings;
use FinityLabs\FinSupport\Pages\Concerns\HasPageShieldSupport;

class ManageBrandingSettings extends SettingsPage
{
    use HasPageShieldSupport;

    protected static ?string $cluster = FinMailSettings::class;

    protected static string $settings = BrandingSettings::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPaintBrush;

    protected static ?int $navigationSort = 2;

    public static function getNavigationLabel(): string
    {
        return __('fin-mail::fin-mail.settings.tabs.branding');
    }

    public function getTitle(): string
    {
        return __('fin-mail::fin-mail.settings.titles.branding');
    }

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make(__('fin-mail::fin-mail.settings.sections.logo'))
                ->schema([
                    TextInput::make('logo')
                        ->label(__('fin-mail::fin-mail.settings.fields.logo_url'))
                        ->maxLength(500)
                        ->placeholder(__('fin-mail::fin-mail.settings.fields.logo_url_placeholder'))
                        ->helperText(__('fin-mail::fin-mail.settings.fields.logo_url_helper')),

                    Grid::make(3)->schema([
                        TextInput::make('logo_width')
                            ->label(__('fin-mail::fin-mail.settings.fields.logo_width'))
                            ->numeric()
                            ->required()
                            ->minValue(10)
                            ->maxValue(800),

                        TextInput::make('logo_height')
                            ->label(__('fin-mail::fin-mail.settings.fields.logo_height'))
                            ->numeric()
                            ->required()
                            ->minValue(10)
                            ->maxValue(400),

                        TextInput::make('content_width')
                            ->label(__('fin-mail::fin-mail.settings.fields.content_width'))
                            ->numeric()
                            ->required()
                            ->minValue(300)
                            ->maxValue(900),
                    ]),
                ]),

            Section::make(__('fin-mail::fin-mail.settings.sections.colors'))
                ->schema([
                    ColorPicker::make('primary_color')
                        ->label(__('fin-mail::fin-mail.settings.fields.primary_color')),
                ]),

            Section::make(__('fin-mail::fin-mail.settings.sections.footer_links'))
                ->schema([
                    Repeater::make('footer_links')
                        ->hiddenLabel()
                        ->schema([
                            TextInput::make('name')
                                ->label(__('fin-mail::fin-mail.settings.fields.footer_link_label'))
                                ->required()
                                ->maxLength(100),
                            TextInput::make('url')
                                ->label(__('fin-mail::fin-mail.settings.fields.footer_link_url'))
                                ->url()
                                ->required()
                                ->maxLength(500),
                        ])
                        ->columns(2)
                        ->defaultItems(0)
                        ->collapsible()
                        ->addActionLabel(__('fin-mail::fin-mail.settings.sections.add_footer_links'))
                        ->itemLabel(fn (array $state): string => $state['name'] ?? (string) __('fin-mail::fin-mail.settings.fields.footer_link_new')),
                ]),

            Section::make(__('fin-mail::fin-mail.settings.sections.customer_service'))
                ->schema([
                    TextInput::make('customer_service_email')
                        ->label(__('fin-mail::fin-mail.settings.fields.support_email'))
                        ->email()
                        ->maxLength(255),

                    TextInput::make('customer_service_phone')
                        ->label(__('fin-mail::fin-mail.settings.fields.support_phone'))
                        ->tel()
                        ->maxLength(50),
                ])
                ->columns(2),
        ]);
    }
}
