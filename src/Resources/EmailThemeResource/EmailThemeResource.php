<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\EmailThemeResource;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use FinityLabs\FinMail\Models\EmailTheme;
use FinityLabs\FinMail\Resources\EmailThemeResource\Schemas\EmailThemeForm;
use FinityLabs\FinMail\Resources\EmailThemeResource\Schemas\EmailThemeInfolist;
use FinityLabs\FinMail\Resources\EmailThemeResource\Tables\EmailThemesTable;

class EmailThemeResource extends Resource
{
    protected static ?string $model = EmailTheme::class;

    protected static ?string $slug = 'email-themes';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPaintBrush;

    public static function getNavigationSort(): ?int
    {
        /** @var \FinityLabs\FinMail\FinMailPlugin $plugin */
        $plugin = filament('fin-mail');

        return $plugin->getEmailThemeNavigationSort();
    }

    public static function getNavigationGroup(): string|\UnitEnum|null
    {
        /** @var \FinityLabs\FinMail\FinMailPlugin $plugin */
        $plugin = filament('fin-mail');

        return $plugin->getEmailThemeNavigationGroup();
    }

    public static function getModelLabel(): string
    {
        return __('fin-mail::fin-mail.models.email_theme');
    }

    public static function getPluralModelLabel(): string
    {
        return __('fin-mail::fin-mail.models.email_themes');
    }

    public static function getNavigationLabel(): string
    {
        return __('fin-mail::fin-mail.navigation.themes');
    }

    public static function form(Schema $schema): Schema
    {
        return EmailThemeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EmailThemeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmailThemesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmailThemes::route('/'),
            'create' => Pages\CreateEmailTheme::route('/create'),
            'view' => Pages\ViewEmailTheme::route('/{record}'),
            'edit' => Pages\EditEmailTheme::route('/{record}/edit'),
        ];
    }
}
