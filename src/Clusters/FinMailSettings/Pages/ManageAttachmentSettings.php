<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Clusters\FinMailSettings\Pages;

use BackedEnum;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use FinityLabs\FinMail\Clusters\FinMailSettings\FinMailSettings;
use FinityLabs\FinMail\Settings\AttachmentSettings;
use FinityLabs\FinSupport\Pages\Concerns\HasPageShieldSupport;

class ManageAttachmentSettings extends SettingsPage
{
    use HasPageShieldSupport;

    protected static ?string $cluster = FinMailSettings::class;

    protected static string $settings = AttachmentSettings::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPaperClip;

    protected static ?int $navigationSort = 4;

    public static function getNavigationLabel(): string
    {
        return __('fin-mail::fin-mail.settings.tabs.attachments');
    }

    public function getTitle(): string
    {
        return __('fin-mail::fin-mail.settings.titles.attachments');
    }

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make(__('fin-mail::fin-mail.settings.sections.attachment_rules'))
                ->description(__('fin-mail::fin-mail.settings.sections.attachment_rules_description'))
                ->schema([
                    Grid::make(['lg' => 3])
                        ->schema([
                            TextInput::make('max_size_mb')
                                ->label(__('fin-mail::fin-mail.settings.fields.max_file_size'))
                                ->numeric()
                                ->required()
                                ->minValue(1)
                                ->maxValue(100),
                        ]),

                    TagsInput::make('allowed_types')
                        ->label(__('fin-mail::fin-mail.settings.fields.allowed_extensions'))
                        ->placeholder(__('fin-mail::fin-mail.settings.fields.allowed_extensions_placeholder'))
                        ->helperText(__('fin-mail::fin-mail.settings.fields.allowed_extensions_helper')),
                ]),
        ]);
    }
}
