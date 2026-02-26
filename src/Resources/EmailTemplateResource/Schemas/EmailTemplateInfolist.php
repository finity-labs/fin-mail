<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\EmailTemplateResource\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use FinityLabs\FinMail\Settings\GeneralSettings;

class EmailTemplateInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Tabs::make('Template')
                ->tabs([

                    Tab::make(__('fin-mail::fin-mail.template.tabs.content'))
                        ->icon(Heroicon::OutlinedDocumentText)
                        ->schema([
                            TextEntry::make('name')
                                ->columnSpanFull(),

                            TextEntry::make('key')
                                ->badge()
                                ->color('gray'),

                            TextEntry::make('category')
                                ->badge()
                                ->formatStateUsing(fn (string $state): string => app(GeneralSettings::class)->getCategoryOptions()[$state] ?? $state),

                            TextEntry::make('subject')
                                ->columnSpanFull(),

                            TextEntry::make('preheader')
                                ->columnSpanFull()
                                ->placeholder('-'),

                            TextEntry::make('body')
                                ->html()
                                ->columnSpanFull(),
                        ])
                        ->columns(2),

                    Tab::make(__('fin-mail::fin-mail.template.tabs.settings'))
                        ->icon(Heroicon::OutlinedCog6Tooth)
                        ->schema([
                            TextEntry::make('theme.name')
                                ->label(__('fin-mail::fin-mail.template.fields.theme'))
                                ->placeholder('-'),

                            IconEntry::make('is_active')
                                ->label(__('fin-mail::fin-mail.template.fields.is_active'))
                                ->boolean(),

                            TextEntry::make('tags')
                                ->badge()
                                ->placeholder('-')
                                ->columnSpanFull(),

                            Section::make(__('fin-mail::fin-mail.template.sections.custom_sender'))
                                ->schema([
                                    TextEntry::make('from.address')
                                        ->label(__('fin-mail::fin-mail.template.fields.from_address'))
                                        ->placeholder('-'),

                                    TextEntry::make('from.name')
                                        ->label(__('fin-mail::fin-mail.template.fields.from_name'))
                                        ->placeholder('-'),
                                ])
                                ->columns(2)
                                ->collapsed(),
                        ])
                        ->columns(2),

                    Tab::make(__('fin-mail::fin-mail.template.tabs.tokens'))
                        ->icon(Heroicon::OutlinedCodeBracket)
                        ->schema([
                            RepeatableEntry::make('token_schema')
                                ->label('')
                                ->schema([
                                    TextEntry::make('token')
                                        ->badge()
                                        ->color('gray'),
                                    TextEntry::make('description'),
                                    TextEntry::make('example')
                                        ->placeholder('-'),
                                ])
                                ->columns(3),
                        ]),
                ])
                ->columnSpanFull(),
        ]);
    }
}
