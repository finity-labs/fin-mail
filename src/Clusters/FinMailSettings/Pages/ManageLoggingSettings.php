<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Clusters\FinMailSettings\Pages;

use BackedEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use FinityLabs\FinMail\Clusters\FinMailSettings\FinMailSettings;
use FinityLabs\FinMail\Enums\CleanupFrequency;
use FinityLabs\FinMail\Settings\LoggingSettings;
use FinityLabs\FinMail\Traits\HasPageShieldSupport;

class ManageLoggingSettings extends SettingsPage
{
    use HasPageShieldSupport;

    protected static ?string $cluster = FinMailSettings::class;

    protected static string $settings = LoggingSettings::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentMagnifyingGlass;

    protected static ?int $navigationSort = 3;

    public static function getNavigationLabel(): string
    {
        return __('fin-mail::fin-mail.settings.tabs.logging');
    }

    public function getTitle(): string
    {
        return __('fin-mail::fin-mail.settings.titles.logging');
    }

    /**
     * @param  array<string, mixed>  $data
     *
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['cleanup_frequency'] = $data['cleanup_frequency'] instanceof CleanupFrequency
            ? $data['cleanup_frequency']->value
            : $data['cleanup_frequency'];

        return $data;
    }

    /**
     * @param  array<string, mixed>  $data
     *
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['cleanup_frequency'])) {
            $data['cleanup_frequency'] = CleanupFrequency::from((int) $data['cleanup_frequency']);
        }

        return $data;
    }

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make(__('fin-mail::fin-mail.settings.sections.logging'))
                ->description(__('fin-mail::fin-mail.settings.sections.logging_description'))
                ->schema([
                    Toggle::make('enabled')
                        ->label(__('fin-mail::fin-mail.settings.fields.enable_logging'))
                        ->helperText(__('fin-mail::fin-mail.settings.fields.enable_logging_helper')),

                    Toggle::make('store_rendered_body')
                        ->label(__('fin-mail::fin-mail.settings.fields.store_rendered_body'))
                        ->helperText(__('fin-mail::fin-mail.settings.fields.store_rendered_body_helper')),

                    Grid::make(['lg' => 3])
                        ->schema([
                            TextInput::make('retention_days')
                                ->label(__('fin-mail::fin-mail.settings.fields.retention_days'))
                                ->numeric()
                                ->nullable()
                                ->minValue(1)
                                ->maxValue(3650)
                                ->columnSpanFull(),
                            Text::make(__('fin-mail::fin-mail.settings.fields.retention_days_helper'))
                                ->columnSpanFull(),
                        ]),
                ]),

            Section::make(__('fin-mail::fin-mail.settings.sections.cleanup'))
                ->description(__('fin-mail::fin-mail.settings.sections.cleanup_description'))
                ->schema([
                    Toggle::make('cleanup_enabled')
                        ->label(__('fin-mail::fin-mail.settings.fields.cleanup_enabled'))
                        ->helperText(__('fin-mail::fin-mail.settings.fields.cleanup_enabled_helper'))
                        ->live(),

                    Grid::make(['lg' => 3])
                        ->schema([
                            Select::make('cleanup_frequency')
                                ->label(__('fin-mail::fin-mail.settings.fields.cleanup_frequency'))
                                ->options(CleanupFrequency::class)
                                ->native(false)
                                ->required()
                                ->visible(fn (callable $get): bool => (bool) $get('cleanup_enabled'))
                                ->columnSpanFull(),
                        ]),
                ]),
        ]);
    }
}
