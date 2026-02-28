<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\EmailTemplateResource;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Resources\EmailTemplateResource\Schemas\EmailTemplateForm;
use FinityLabs\FinMail\Resources\EmailTemplateResource\Schemas\EmailTemplateInfolist;
use FinityLabs\FinMail\Resources\EmailTemplateResource\Tables\EmailTemplatesTable;

class EmailTemplateResource extends Resource
{
    protected static ?string $model = EmailTemplate::class;

    protected static ?string $slug = 'email-templates';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    public static function getNavigationSort(): ?int
    {
        /** @var \FinityLabs\FinMail\FinMailPlugin $plugin */
        $plugin = filament('fin-mail');

        return $plugin->getEmailTemplateNavigationSort();
    }

    public static function getNavigationGroup(): string|\UnitEnum|null
    {
        /** @var \FinityLabs\FinMail\FinMailPlugin $plugin */
        $plugin = filament('fin-mail');

        return $plugin->getEmailTemplateNavigationGroup();
    }

    public static function getModelLabel(): string
    {
        return __('fin-mail::fin-mail.models.email_template');
    }

    public static function getPluralModelLabel(): string
    {
        return __('fin-mail::fin-mail.models.email_templates');
    }

    public static function getNavigationLabel(): string
    {
        return __('fin-mail::fin-mail.navigation.templates');
    }

    public static function form(Schema $schema): Schema
    {
        return EmailTemplateForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EmailTemplateInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmailTemplatesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmailTemplates::route('/'),
            'create' => Pages\CreateEmailTemplate::route('/create'),
            'view' => Pages\ViewEmailTemplate::route('/{record}'),
            'edit' => Pages\EditEmailTemplate::route('/{record}/edit'),
            'compose' => Pages\ComposeEmail::route('/{record}/compose'),
        ];
    }
}
