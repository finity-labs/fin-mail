<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\SentEmailResource;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use FinityLabs\FinMail\Models\SentEmail;
use FinityLabs\FinMail\Resources\SentEmailResource\Tables\SentEmailsTable;
use UnitEnum;

class SentEmailResource extends Resource
{
    protected static ?string $model = SentEmail::class;

    protected static ?string $slug = 'sent-emails';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInboxStack;

    public static function getNavigationSort(): ?int
    {
        /** @var \FinityLabs\FinMail\FinMailPlugin $plugin */
        $plugin = filament('fin-mail');

        return $plugin->getSentEmailNavigationSort();
    }

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        /** @var \FinityLabs\FinMail\FinMailPlugin $plugin */
        $plugin = filament('fin-mail');

        return $plugin->getSentEmailNavigationGroup();
    }

    public static function getModelLabel(): string
    {
        return __('fin-mail::fin-mail.models.sent_email');
    }

    public static function getPluralModelLabel(): string
    {
        return __('fin-mail::fin-mail.models.sent_emails');
    }

    public static function getNavigationLabel(): string
    {
        return __('fin-mail::fin-mail.navigation.sent-emails');
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return SentEmailsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSentEmails::route('/'),
        ];
    }
}
