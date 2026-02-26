<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Clusters\FinMailSettings\Pages;

use BackedEnum;
use Filament\Forms\Components\Toggle;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use FinityLabs\FinMail\Clusters\FinMailSettings\FinMailSettings;
use FinityLabs\FinMail\Settings\AuthEmailSettings;

class ManageAuthEmailSettings extends SettingsPage
{
    protected static ?string $cluster = FinMailSettings::class;

    protected static string $settings = AuthEmailSettings::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShieldCheck;

    protected static ?int $navigationSort = 5;

    public static function getNavigationLabel(): string
    {
        return __('fin-mail::fin-mail.settings.tabs.auth_emails');
    }

    public function getTitle(): string
    {
        return __('fin-mail::fin-mail.settings.tabs.auth_emails');
    }

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make(__('fin-mail::fin-mail.settings.sections.auth_emails'))
                ->description(__('fin-mail::fin-mail.settings.sections.auth_emails_description'))
                ->schema([
                    Toggle::make('override_verification')
                        ->label(__('fin-mail::fin-mail.settings.fields.override_verification'))
                        ->helperText(__('fin-mail::fin-mail.settings.fields.override_verification_helper')),

                    Toggle::make('override_password_reset')
                        ->label(__('fin-mail::fin-mail.settings.fields.override_password_reset'))
                        ->helperText(__('fin-mail::fin-mail.settings.fields.override_password_reset_helper')),

                    Toggle::make('override_welcome')
                        ->label(__('fin-mail::fin-mail.settings.fields.override_welcome'))
                        ->helperText(__('fin-mail::fin-mail.settings.fields.override_welcome_helper')),
                ]),
        ]);
    }
}
