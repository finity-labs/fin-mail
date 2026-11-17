<?php

declare(strict_types=1);

use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use FinityLabs\FinMail\Editors\Blocks\ButtonBlock;
use FinityLabs\FinMail\Editors\Blocks\CredentialsBlock;
use FinityLabs\FinMail\FinMailPlugin;
use FinityLabs\FinMail\Helpers\InlineStyler;
use FinityLabs\FinMail\Helpers\TokenValue;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\EmailTheme;
use Illuminate\Support\Facades\View;

class HostDataBlock extends RichContentCustomBlock
{
    /** @var array<string, mixed>|null */
    public static ?array $receivedData = null;

    public static function getId(): string
    {
        return 'hostData';
    }

    public static function toHtml(array $config, array $data): ?string
    {
        static::$receivedData = $data;

        return '<p>host block</p>';
    }
}

class HostDividerBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'emailDivider';
    }

    public static function toHtml(array $config, array $data): ?string
    {
        return '<hr class="host-divider">';
    }
}

beforeEach(function () {
    fakeFinMailSettings();
    View::addNamespace('fixtures', __DIR__.'/../Fixtures/views');
});

afterEach(function () {
    (new ReflectionProperty(FinMailPlugin::class, 'customBlocks'))->setValue(null, []);
    HostDataBlock::$receivedData = null;
});

/**
 * The stored markup of a block, as the rich editor saves it.
 *
 * @param  array<string, mixed>  $config
 */
function blockDiv(string $id, array $config = []): string
{
    $json = htmlspecialchars(json_encode($config, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), ENT_QUOTES);

    return '<div data-type="customBlock" data-config="'.$json.'" data-id="'.$id.'"></div>';
}

/**
 * The rendered body of a template holding the given body HTML.
 *
 * @param  array<string, mixed>  $models
 */
function renderBlockBody(string $body, array $models = [], ?EmailTheme $theme = null, ?string $locale = null): string
{
    $key = 'blocks-'.uniqid();

    EmailTemplate::create([
        'key' => $key,
        'name' => ['en' => 'Blocks', 'hu' => 'Blokkok'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello', 'hu' => 'Szia'],
        'body' => ['en' => $body, 'hu' => $body],
        'is_active' => true,
        'email_theme_id' => $theme?->id,
    ]);

    return TemplateMail::make($key, $locale)->models($models)->content()->with['body'];
}

function squash(string $html): string
{
    return trim(preg_replace(['/>\s+</', '/\s+/'], ['><', ' '], $html));
}

it('keeps the primary button markup of 1.14 apart from whitespace', function () {
    $theme = EmailTheme::defaultColors();
    $old = <<<'HTML'
    <div style="text-align: center; padding: 16px 0;">
        <a href="https://example.com/go?a=1&amp;b=2" style="display: inline-block; background-color: #4F46E5; color: #ffffff; padding: 12px 24px; border-radius: 6px; font-size: 16px; font-weight: 600; text-decoration: none; mso-padding-alt: 0;" target="_blank">
            <!--[if mso]><i style="mso-font-width: -100%; mso-text-raise: 18pt;">&nbsp;</i><![endif]-->
            <span style="mso-text-raise: 9pt;">Pay &amp; go</span>
            <!--[if mso]><i style="mso-font-width: -100%;">&nbsp;</i><![endif]-->
        </a>
    </div>
    HTML;

    $html = ButtonBlock::toHtml(['label' => 'Pay & go', 'url' => 'https://example.com/go?a=1&b=2', 'align' => 'center'], ['theme' => $theme]);

    expect(squash($html))->toBe(squash($old));
});

it('marks its blocks only while element styles or the preheader fallback read the marker', function () {
    $button = fn (): string => ButtonBlock::toHtml(['label' => 'Go', 'url' => '#'], ['theme' => EmailTheme::defaultColors()]);

    // Nothing configured: the block HTML of 1.14, no marker in it.
    expect($button())->not->toContain('fm-block');

    config()->set('fin-mail.element_styles', ['p' => 'margin: 0;']);
    expect($button())->toStartWith(InlineStyler::PROTECT_START)->toEndWith(InlineStyler::PROTECT_END);

    config()->set('fin-mail.element_styles', []);
    config()->set('fin-mail.element_style_rules.bare_url_break', true);
    expect($button())->toStartWith(InlineStyler::PROTECT_START);

    config()->set('fin-mail.element_style_rules.bare_url_break', false);
    config()->set('fin-mail.preheader_fallback.enabled', true);
    expect($button())->toStartWith(InlineStyler::PROTECT_START);
});

it('hands a layout that never calls the inline styler a body without markers', function () {
    config()->set('fin-mail.layout', 'fixtures::layouts.other');
    // The fallback needs the markers to skip block text; the layout doesn't.
    config()->set('fin-mail.preheader_fallback.enabled', true);

    EmailTemplate::create([
        'key' => 'marker-free',
        'name' => ['en' => 'Markers'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => blockDiv('emailCallout', ['content' => '<p>Block text</p>']).'<p>Body text</p>'],
        'is_active' => true,
    ]);

    $mail = TemplateMail::make('marker-free');

    expect($mail->render())->toContain('LAYOUT:other|')->toContain('Block text')->not->toContain('fm-block')
        ->and($mail->content()->with['preheader'])->toBe('Body text');
});

it('draws the secondary button as an outline in the primary color', function () {
    $html = ButtonBlock::toHtml(['label' => 'Later', 'url' => '#', 'style' => 'secondary'], [
        'theme' => ['primary' => '#123456', 'content_bg' => '#fafafa', 'button_bg' => '#000000', 'button_text' => '#ffffff'],
    ]);

    expect($html)->toContain('background-color: #fafafa; color: #123456; border: 2px solid #123456;')
        ->not->toContain('#000000');
});

it('renders a block through the host view a config key points at', function () {
    config()->set('fin-mail.block_views', ['emailButton' => 'fixtures::blocks.button']);

    $body = renderBlockBody(blockDiv('emailButton', ['label' => 'Go', 'url' => 'https://example.com']), locale: 'hu');

    expect($body)->toContain('class="host-button" data-locale="hu" data-id="emailButton"');
});

it('gives host blocks the locale and their id', function () {
    FinMailPlugin::make()->customBlocks([HostDataBlock::class]);

    renderBlockBody('<p>Hi</p>'.blockDiv('hostData'), locale: 'hu');

    expect(HostDataBlock::$receivedData)->toMatchArray(['locale' => 'hu', 'id' => 'hostData'])
        ->and(HostDataBlock::$receivedData['theme'])->toBeArray();
});

it('replaces tokens inside block settings raw, as in the body', function (string $id, array $config) {
    $body = renderBlockBody(blockDiv($id, $config), [
        'user' => (object) ['name' => 'Anna'],
        'card' => new TokenValue('<b>raw html</b>'),
    ]);

    expect($body)->toContain('Anna')
        ->toContain('<b>raw html</b>')
        ->not->toContain('{{');
})->with([
    'button' => ['emailButton', ['label' => 'Hi {{ user.name }} {{ card }}', 'url' => 'https://example.com/{{ user.name }}']],
    'summary' => ['emailSummary', ['rows' => [['label' => 'Name', 'value' => '{{ user.name }}'], ['label' => 'Card', 'value' => '{{ card }}']]]],
    'credentials' => ['emailCredentials', ['rows' => [['label' => 'User', 'value' => '{{ user.name }}'], ['label' => 'Card', 'value' => '{{ card }}']]]],
    'callout' => ['emailCallout', ['variant' => 'info', 'content' => '<p>Dear {{ user.name }}</p><p>{{ card }}</p>']],
    'small print' => ['emailSmallPrint', ['content' => '<p>{{ user.name }} {{ card }}</p>']],
]);

it('keeps a quoted token fallback working inside a summary value', function () {
    $body = renderBlockBody(blockDiv('emailSummary', ['rows' => [['label' => 'Name', 'value' => "{{ user.name | 'friend' }}"]]]));

    expect($body)->toContain('friend')->not->toContain('{{');
});

it('strips merge-tag spans from a block\'s rich text', function () {
    $content = '<p>Hi <span data-type="mergeTag" data-id="user.name">{{ user.name }}</span></p>';

    $body = renderBlockBody(blockDiv('emailCallout', ['content' => $content]), ['user' => (object) ['name' => 'Anna']]);

    expect($body)->toContain('Hi Anna')->not->toContain('mergeTag');
});

it('renders the summary options', function () {
    $html = InlineStyler::removeMarkers(renderBlockBody(blockDiv('emailSummary', [
        'rows' => [['label' => 'Net', 'value' => '100'], ['label' => 'Gross', 'value' => '127', 'strong' => true]],
        'value_align' => 'left',
        'stack_on_phone' => true,
    ])));

    expect($html)->toContain('class="fm-summary fm-stack"')
        ->toContain('text-align: left;')
        ->toMatch('/text-align: left; vertical-align: top; font-weight: 700;">127</')
        ->not->toMatch('/vertical-align: top; font-weight: 700;">100</');

    $right = renderBlockBody(blockDiv('emailSummary', ['rows' => [['label' => 'Net', 'value' => '100']]]));

    expect($right)->toContain('text-align: right;')->not->toContain('fm-stack');
});

it('renders the credentials font choice and copy chip', function () {
    $html = renderBlockBody(blockDiv('emailCredentials', ['rows' => [
        ['label' => 'Password', 'value' => 'Il1O0', 'font' => 'monospace', 'copy' => true],
        ['label' => 'Username', 'value' => 'anna', 'font' => 'normal'],
    ]]));

    expect($html)->toContain('user-select: all;')
        ->toMatch("/user-select: all; font-family: 'SFMono-Regular'[^\"]*\">Il1O0</")
        ->toMatch('/word-break: break-all; ">anna</');
});

it('colors the callout variants from the theme, and the custom one from its own settings', function () {
    $theme = EmailTheme::create(['name' => 'Callouts', 'colors' => ['warning_bg' => '#ffeeaa', 'warning_text' => '#553300']]);

    $warning = renderBlockBody(blockDiv('emailCallout', ['variant' => 'warning', 'content' => '<p>Careful</p>']), theme: $theme);
    $custom = renderBlockBody(blockDiv('emailCallout', ['variant' => 'custom', 'background' => '#000000', 'text_color' => '#ffffff', 'content' => '<p>Dark</p>']));
    $success = renderBlockBody(blockDiv('emailCallout', ['variant' => 'success', 'content' => '<p>Done</p>']));

    expect($warning)->toContain('background-color: #ffeeaa; color: #553300;')
        ->and($custom)->toContain('background-color: #000000; color: #ffffff;')
        ->and($success)->toContain('background-color: #f0fdf4; color: #14532d;');
});

it('gives a theme saved without the callout colors the defaults', function () {
    $theme = EmailTheme::create(['name' => 'Saved earlier', 'colors' => ['primary' => '#123456']]);

    $html = renderBlockBody(blockDiv('emailCallout', ['variant' => 'info', 'content' => '<p>Note</p>']), theme: $theme);

    expect($html)->toContain('background-color: #eff6ff; color: #1e3a8a;');
});

it('draws the divider in the theme border color and small print in the light text color', function () {
    $theme = EmailTheme::create(['name' => 'Lines', 'colors' => ['border' => '#abcdef', 'text_light' => '#777777']]);

    $html = renderBlockBody(blockDiv('emailDivider').blockDiv('emailSmallPrint', ['content' => '<p>Stop these emails</p>']), theme: $theme);

    expect($html)->toContain('height: 1px; line-height: 1px; font-size: 1px; background-color: #abcdef;')
        ->toContain('class="fm-small-print" style="color: #777777;')
        ->toContain('<p style="margin: 0;">Stop these emails</p>');
});

it('hides a block from the editor menu but still renders it', function () {
    config()->set('fin-mail.hidden_blocks', ['emailCredentials']);

    expect(FinMailPlugin::getEditorBlockClasses())->not->toContain(CredentialsBlock::class)
        ->toContain(ButtonBlock::class)
        ->and(FinMailPlugin::getCustomBlocks())->toHaveKey('emailCredentials');

    $html = renderBlockBody(blockDiv('emailCredentials', ['rows' => [['label' => 'Code', 'value' => '123456']]]));

    expect($html)->toContain('123456');
});

it('lets a host block registered under a built-in id replace the built-in block', function () {
    FinMailPlugin::make()->customBlocks([HostDividerBlock::class]);

    $html = renderBlockBody(blockDiv('emailDivider'));

    expect($html)->toContain('<hr class="host-divider">')
        ->and(FinMailPlugin::getCustomBlocks()['emailDivider'])->toBe(HostDividerBlock::class)
        ->and(array_count_values(array_map(fn (string $class): string => $class::getId(), FinMailPlugin::getEditorBlockClasses()))['emailDivider'])->toBe(1);
});

it('offers every built-in block in the editor by default', function () {
    expect(array_map(fn (string $class): string => $class::getId(), FinMailPlugin::getEditorBlockClasses()))
        ->toBe(['emailButton', 'emailSummary', 'emailCredentials', 'emailCallout', 'emailDivider', 'emailSmallPrint']);
});

it('renders block previews for the editor in the form\'s theme', function () {
    ButtonBlock::setPreviewTheme(['button_bg' => '#abcabc', 'button_text' => '#ffffff', 'border' => '#cccccc']);

    try {
        expect(ButtonBlock::toPreviewHtml(['label' => 'Go']))->toContain('#abcabc')
            ->and(CredentialsBlock::toPreviewHtml(['rows' => [['label' => 'Code', 'value' => '42']]]))
            ->toContain('border: 1px solid #cccccc')
            ->not->toContain(InlineStyler::PROTECT_START);
    } finally {
        ButtonBlock::setPreviewTheme(null);
    }
});
