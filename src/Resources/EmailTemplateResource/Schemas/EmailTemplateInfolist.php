<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\EmailTemplateResource\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
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
                                ->label(__('fin-mail::fin-mail.template.fields.name'))
                                ->columnSpanFull(),

                            TextEntry::make('key')
                                ->label(__('fin-mail::fin-mail.template.fields.key'))
                                ->badge()
                                ->color('gray'),

                            TextEntry::make('category')
                                ->label(__('fin-mail::fin-mail.template.fields.category'))
                                ->badge()
                                ->formatStateUsing(fn (string $state): string => app(GeneralSettings::class)->getCategoryOptions()[$state] ?? $state),

                            TextEntry::make('subject')
                                ->label(__('fin-mail::fin-mail.template.fields.subject'))
                                ->columnSpanFull(),

                            TextEntry::make('preheader')
                                ->label(__('fin-mail::fin-mail.template.fields.preheader'))
                                ->columnSpanFull()
                                ->placeholder('-'),

                            // ViewEntry::make('body')
                            //     ->label(__('fin-mail::fin-mail.template.fields.body'))
                            //     ->view('fin-mail::infolists.components.body-preview')
                            //     ->columnSpanFull(),
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

                            IconEntry::make('is_locked')
                                ->label(__('fin-mail::fin-mail.template.columns.locked'))
                                ->boolean()
                                ->trueIcon(Heroicon::OutlinedLockClosed)
                                ->falseIcon(Heroicon::OutlinedLockOpen)
                                ->trueColor('warning')
                                ->falseColor('gray'),

                            TextEntry::make('tags')
                                ->label(__('fin-mail::fin-mail.template.fields.tags'))
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

                            Section::make(__('fin-mail::fin-mail.template.sections.custom_reply_to'))
                                ->schema([
                                    TextEntry::make('reply_to.address')
                                        ->label(__('fin-mail::fin-mail.template.fields.reply_to_address'))
                                        ->placeholder('-'),

                                    TextEntry::make('reply_to.name')
                                        ->label(__('fin-mail::fin-mail.template.fields.reply_to_name'))
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
                                        ->label(__('fin-mail::fin-mail.template.tokens.token'))
                                        ->badge()
                                        ->color('gray'),
                                    TextEntry::make('description')
                                        ->label(__('fin-mail::fin-mail.template.tokens.description')),
                                    TextEntry::make('example')
                                        ->label(__('fin-mail::fin-mail.template.tokens.example'))
                                        ->placeholder('-'),
                                ])
                                ->columns(3),
                        ]),
                ])
                ->columnSpanFull(),
        ]);
    }
}
