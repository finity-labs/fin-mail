<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Editors\Blocks;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class ButtonBlock extends EmailBlock
{
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

                Select::make('style')
                    ->label(__('fin-mail::fin-mail.template.blocks.button_style'))
                    ->options([
                        'primary' => __('fin-mail::fin-mail.template.blocks.style_primary'),
                        'secondary' => __('fin-mail::fin-mail.template.blocks.style_secondary'),
                    ])
                    ->default('primary')
                    ->selectablePlaceholder(false)
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
        $align = static::align($config);

        $theme = static::previewThemeColors();
        [$background, $color, $border] = static::colors($config, $theme);
        $borderStyle = $border !== null ? "border: 2px solid {$border}; padding: 10px 22px;" : 'padding: 12px 24px;';

        return <<<HTML
        <div style="text-align: {$align}; padding: 8px 0;">
            <span style="display: inline-block; background-color: {$background}; color: {$color}; {$borderStyle} border-radius: 6px; font-size: 14px; font-weight: 600; text-decoration: none;">
                {$label}
            </span>
        </div>
        HTML;
    }

    /**
     * @param  array<string, mixed>  $config
     */
    public static function align(array $config): string
    {
        $align = $config['align'] ?? 'center';

        return in_array($align, ['left', 'center', 'right'], true) ? $align : 'center';
    }

    /**
     * Background, text and border colour. The primary button is filled with
     * the theme's button colours; the secondary one is an outline in the
     * theme's primary colour on the content background.
     *
     * @param  array<string, mixed>  $config
     * @param  array<string, string>  $theme
     *
     * @return array{0: string, 1: string, 2: string|null}
     */
    public static function colors(array $config, array $theme): array
    {
        if (($config['style'] ?? 'primary') === 'secondary') {
            $primary = $theme['primary'] ?? '#4F46E5';

            return [$theme['content_bg'] ?? '#ffffff', $primary, $primary];
        }

        return [$theme['button_bg'] ?? '#4F46E5', $theme['button_text'] ?? '#ffffff', null];
    }
}
