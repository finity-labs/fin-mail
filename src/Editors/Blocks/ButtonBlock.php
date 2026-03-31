<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Editors\Blocks;

use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use FinityLabs\FinMail\Models\EmailTheme;

class ButtonBlock extends RichContentCustomBlock
{
    protected static ?array $previewTheme = null;

    public static function setPreviewTheme(?array $theme): void
    {
        static::$previewTheme = $theme;
    }

    public static function getId(): string
    {
        return 'emailButton';
    }

    public static function getLabel(): string
    {
        return __('fin-mail::fin-mail.template.blocks.button');
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalHeading(__('fin-mail::fin-mail.template.blocks.button_heading'))
            ->schema([
                TextInput::make('label')
                    ->label(__('fin-mail::fin-mail.template.blocks.button_label'))
                    ->required()
                    ->maxLength(255)
                    ->default(__('fin-mail::fin-mail.template.blocks.button_default_label')),

                TextInput::make('url')
                    ->label(__('fin-mail::fin-mail.template.blocks.button_url'))
                    ->required()
                    ->maxLength(2048)
                    ->placeholder('https://'),

                Select::make('align')
                    ->label(__('fin-mail::fin-mail.template.blocks.button_align'))
                    ->options([
                        'left' => __('fin-mail::fin-mail.template.blocks.align_left'),
                        'center' => __('fin-mail::fin-mail.template.blocks.align_center'),
                        'right' => __('fin-mail::fin-mail.template.blocks.align_right'),
                    ])
                    ->default('center')
                    ->native(false),
            ]);
    }

    public static function getPreviewLabel(array $config): string
    {
        return $config['label'] ?? __('fin-mail::fin-mail.template.blocks.button');
    }

    public static function toPreviewHtml(array $config): ?string
    {
        $label = e($config['label'] ?? __('fin-mail::fin-mail.template.blocks.button_default_label'));
        $align = $config['align'] ?? 'center';

        $theme = static::$previewTheme ?? EmailTheme::getDefault()?->resolvedColors() ?? EmailTheme::defaultColors();
        $buttonBg = $theme['button_bg'] ?? '#4F46E5';
        $buttonText = $theme['button_text'] ?? '#ffffff';

        return <<<HTML
        <div style="text-align: {$align}; padding: 8px 0;">
            <span style="display: inline-block; background-color: {$buttonBg}; color: {$buttonText}; padding: 12px 24px; border-radius: 6px; font-size: 14px; font-weight: 600; text-decoration: none;">
                {$label}
            </span>
        </div>
        HTML;
    }

    public static function toHtml(array $config, array $data): ?string
    {
        $label = e($config['label'] ?? __('fin-mail::fin-mail.template.blocks.button_default_label'));
        $url = e($config['url'] ?? '#');
        $align = $config['align'] ?? 'center';

        $theme = $data['theme'] ?? EmailTheme::getDefault()?->resolvedColors() ?? EmailTheme::defaultColors();

        $buttonBg = $theme['button_bg'] ?? '#4F46E5';
        $buttonText = $theme['button_text'] ?? '#ffffff';

        return <<<HTML
        <div style="text-align: {$align}; padding: 16px 0;">
            <a href="{$url}" style="display: inline-block; background-color: {$buttonBg}; color: {$buttonText}; padding: 12px 24px; border-radius: 6px; font-size: 16px; font-weight: 600; text-decoration: none; mso-padding-alt: 0;" target="_blank">
                <!--[if mso]><i style="mso-font-width: -100%; mso-text-raise: 18pt;">&nbsp;</i><![endif]-->
                <span style="mso-text-raise: 9pt;">{$label}</span>
                <!--[if mso]><i style="mso-font-width: -100%;">&nbsp;</i><![endif]-->
            </a>
        </div>
        HTML;
    }
}
