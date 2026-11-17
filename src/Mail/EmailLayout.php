<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Mail;

use FinityLabs\FinMail\Helpers\InlineStyler;
use FinityLabs\FinMail\Helpers\MergeTagStripper;
use FinityLabs\FinMail\Helpers\PreheaderFallback;
use FinityLabs\FinMail\Helpers\TipTapConverter;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\EmailTheme;
use FinityLabs\FinMail\Settings\BrandingSettings;

/**
 * Everything a layout needs, shared by TemplateMail and the previews so a
 * preview shows the layout, theme and language the email goes out with.
 */
class EmailLayout
{
    public const DEFAULT_VIEW = 'fin-mail::email.default';

    /**
     * Languages written right to left, by primary language subtag.
     *
     * @var list<string>
     */
    protected const RTL_LANGUAGES = ['ar', 'arc', 'ckb', 'dv', 'fa', 'he', 'ks', 'ku', 'ps', 'sd', 'ug', 'ur', 'yi'];

    /**
     * The view used for templates without a layout of their own.
     */
    public static function defaultView(): string
    {
        $view = config('fin-mail.layout');

        return is_string($view) && $view !== '' ? $view : static::DEFAULT_VIEW;
    }

    /**
     * The layouts editors can pick per template, as view => label.
     *
     * @return array<string, string>
     */
    public static function options(): array
    {
        $options = [];

        foreach ((array) config('fin-mail.layouts', []) as $view => $label) {
            if (! is_string($view) || $view === '') {
                continue;
            }

            $options[$view] = is_string($label) && $label !== '' ? (string) __($label) : $view;
        }

        return $options;
    }

    public static function hasOptions(): bool
    {
        return static::options() !== [];
    }

    /**
     * The view an email renders in: the override, then the template's own
     * layout while it is still in the configured list, then the default.
     */
    public static function resolveView(?string $viewPath = null, ?string $overrideView = null): string
    {
        if (is_string($overrideView) && $overrideView !== '') {
            return $overrideView;
        }

        if (is_string($viewPath) && $viewPath !== '' && array_key_exists($viewPath, static::options())) {
            return $viewPath;
        }

        return static::defaultView();
    }

    /**
     * The text direction of a locale, 'ltr' or 'rtl'.
     */
    public static function direction(string $locale): string
    {
        $language = strtolower((string) preg_split('/[-_]/', $locale)[0]);

        if (in_array($language, static::RTL_LANGUAGES, true)) {
            return 'rtl';
        }

        return __('filament-panels::layout.direction', [], $locale) === 'rtl' ? 'rtl' : 'ltr';
    }

    /**
     * The template details a layout gets, so it can vary by template.
     *
     * @return array{key: string|null, category: string|null}
     */
    public static function templateData(?EmailTemplate $template): array
    {
        return [
            'key' => $template?->key,
            'category' => $template?->category,
        ];
    }

    /**
     * The saved branding, with per-email overrides merged on top.
     *
     * @param  array<string, mixed>  $overrides
     *
     * @return array<string, mixed>
     */
    public static function branding(array $overrides = []): array
    {
        $branding = app(BrandingSettings::class);

        return array_merge([
            'logo' => $branding->resolvedLogo(),
            'logo_width' => $branding->logo_width,
            'logo_height' => $branding->logo_height,
            'content_width' => $branding->content_width,
            'primary_color' => $branding->primary_color,
            'footer_links' => $branding->footer_links,
            'customer_service_email' => $branding->customer_service_email,
            'customer_service_phone' => $branding->customer_service_phone,
            'social_links' => $branding->social_links,
        ], $overrides);
    }

    /**
     * The data every layout receives. The body keeps its protect markers
     * only while element styles are configured: InlineStyler::apply() in the
     * layout reads and removes them, and without element styles nothing
     * would.
     *
     * @param  array<string, string>  $theme
     * @param  array<string, mixed>  $branding
     *
     * @return array<string, mixed>
     */
    public static function viewData(
        string $body,
        string $preheader,
        array $theme,
        array $branding,
        string $locale,
        ?EmailTemplate $template,
    ): array {
        return [
            'body' => InlineStyler::isConfigured() ? $body : InlineStyler::removeMarkers($body),
            'preheader' => $preheader,
            'theme' => $theme,
            'branding' => $branding,
            'locale' => $locale,
            'direction' => static::direction($locale),
            'template' => static::templateData($template),
        ];
    }

    /**
     * Render a body in its layout for an admin preview. Blocks are rendered
     * and tokens are left as {{ token }}, since a preview has no models.
     *
     * @param  string|array<mixed>|null  $content  HTML, a TipTap document, or translations keyed by locale
     * @param  array<string, string>|null  $theme  Theme colors; the default theme's when null
     * @param  string|null  $viewPath  The layout picked for the template (the form's value while editing)
     */
    public static function renderPreview(
        string|array|null $content,
        ?string $preheader = null,
        ?array $theme = null,
        ?EmailTemplate $template = null,
        ?string $locale = null,
        ?string $viewPath = null,
    ): string {
        $locale = filled($locale) ? $locale : app()->getLocale();
        $theme ??= EmailTheme::resolvedDefaultColors();

        // Blocks render inside the switch as well, whether the body arrives
        // as stored HTML or as the editor's unsaved document.
        return static::withLocale($locale, function () use ($content, $preheader, $theme, $template, $locale, $viewPath): string {
            if (is_array($content)) {
                $content = (isset($content['type']) || isset($content[0]['type']))
                    ? TipTapConverter::toHtml($content, $theme, $locale)
                    : (string) ($content[$locale] ?? reset($content) ?: '');
            }

            $content = (string) $content;

            if (trim($content) === '') {
                return '';
            }

            $body = EmailTemplate::renderCustomBlocks(MergeTagStripper::strip($content), $theme, $locale);

            $preheader = (string) $preheader;

            if (trim($preheader) === '') {
                $preheader = PreheaderFallback::fromBody($body);
            }

            return view(
                static::resolveView($viewPath ?? $template?->view_path),
                static::viewData($body, $preheader, $theme, static::branding(), $locale, $template),
            )->render();
        });
    }

    /**
     * @template TReturn
     *
     * @param  callable(): TReturn  $callback
     *
     * @return TReturn
     */
    protected static function withLocale(string $locale, callable $callback): mixed
    {
        $original = app()->getLocale();

        if ($original === $locale) {
            return $callback();
        }

        app()->setLocale($locale);

        try {
            return $callback();
        } finally {
            app()->setLocale($original);
        }
    }
}
