<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Resources\EmailThemeResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use FinityLabs\FinMail\Resources\EmailThemeResource\EmailThemeResource;

/**
 * @property \FinityLabs\FinMail\Models\EmailTheme $record
 */
class EditEmailTheme extends EditRecord
{
    protected static string $resource = EmailThemeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->visible(function (): bool {
                    /** @var \FinityLabs\FinMail\FinMailPlugin $plugin */
                    $plugin = filament('fin-mail');

                    return $plugin->hasDeleteActionOnEditPage();
                })
                ->before(function (): void {
                    $this->record->templates()->update(['email_theme_id' => null]);
                }),
        ];
    }
}
