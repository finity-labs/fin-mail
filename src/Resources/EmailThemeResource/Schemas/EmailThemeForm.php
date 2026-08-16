<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\EmailThemeResource\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use FinityLabs\FinMail\Models\EmailTheme;

class EmailThemeForm
{
    public static function configure(Schema $schema): Schema
    {
        $defaultColors = EmailTheme::defaultColors();

        return $schema
            ->schema([
                Section::make(__('fin-mail::fin-mail.theme.sections.details'))
                    ->schema([
                        TextInput::make('name')
                            ->label(__('fin-mail::fin-mail.theme.fields.name'))
                            ->required()
                            ->maxLength(255),

                        Toggle::make('is_default')
                            ->label(__('fin-mail::fin-mail.theme.fields.is_default'))
                            ->helperText(__('fin-mail::fin-mail.theme.fields.is_default_helper'))
                            ->columnSpan(2),
                    ])
                    ->columns(3),

                Section::make(__('fin-mail::fin-mail.theme.sections.background'))
                    ->description(__('fin-mail::fin-mail.theme.sections.background_description'))
                    ->schema([
                        ColorPicker::make('colors.background')
                            ->label(__('fin-mail::fin-mail.theme.fields.page_background'))
                            ->default($defaultColors['background'])
                            ->live(),

                        ColorPicker::make('colors.content_bg')
                            ->label(__('fin-mail::fin-mail.theme.fields.content_background'))
                            ->default($defaultColors['content_bg'])
                            ->live(),

                        ColorPicker::make('colors.border')
                            ->label(__('fin-mail::fin-mail.theme.fields.border'))
                            ->default($defaultColors['border'])
                            ->live(),
                    ])
                    ->columns(3),

                Section::make(__('fin-mail::fin-mail.theme.sections.typography'))
                    ->description(__('fin-mail::fin-mail.theme.sections.typography_description'))
                    ->schema([
                        ColorPicker::make('colors.heading')
                            ->label(__('fin-mail::fin-mail.theme.fields.headings'))
                            ->default($defaultColors['heading'])
                            ->live(),

                        ColorPicker::make('colors.text')
                            ->label(__('fin-mail::fin-mail.theme.fields.body_text'))
                            ->default($defaultColors['text'])
                            ->live(),

                        ColorPicker::make('colors.text_light')
                            ->label(__('fin-mail::fin-mail.theme.fields.secondary_text'))
                            ->default($defaultColors['text_light'])
                            ->live(),

                        ColorPicker::make('colors.link')
                            ->label(__('fin-mail::fin-mail.theme.fields.links'))
                            ->default($defaultColors['link'])
                            ->live(),
                    ])
                    ->columns(4),

                Section::make(__('fin-mail::fin-mail.theme.sections.buttons'))
                    ->description(__('fin-mail::fin-mail.theme.sections.buttons_description'))
                    ->schema([
                        ColorPicker::make('colors.button_bg')
                            ->label(__('fin-mail::fin-mail.theme.fields.button_background'))
                            ->default($defaultColors['button_bg'])
                            ->live(),

                        ColorPicker::make('colors.button_text')
                            ->label(__('fin-mail::fin-mail.theme.fields.button_text'))
                            ->default($defaultColors['button_text'])
                            ->live(),

                        ColorPicker::make('colors.primary')
                            ->label(__('fin-mail::fin-mail.theme.fields.primary_accent'))
                            ->default($defaultColors['primary'])
                            ->live(),
                    ])
                    ->columns(3),

                Section::make(__('fin-mail::fin-mail.theme.sections.footer'))
                    ->description(__('fin-mail::fin-mail.theme.sections.footer_description'))
                    ->schema([
                        ColorPicker::make('colors.footer_bg')
                            ->label(__('fin-mail::fin-mail.theme.fields.footer_background'))
                            ->default($defaultColors['footer_bg'])
                            ->live(),

                        ColorPicker::make('colors.footer_text')
                            ->label(__('fin-mail::fin-mail.theme.fields.footer_text'))
                            ->default($defaultColors['footer_text'])
                            ->live(),
                    ])
                    ->columns(2),

                Section::make(__('fin-mail::fin-mail.theme.sections.preview'))
                    ->schema([
                        TextEntry::make('preview')
                            ->hiddenLabel()
                            ->state(fn (callable $get) => view('fin-mail::components.theme-preview', [
                                'theme' => array_merge($defaultColors, array_filter($get('colors') ?? [])),
                            ]))
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),
            ]);
    }
}
