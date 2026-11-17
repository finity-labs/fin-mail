<?php

declare(strict_types=1);

use FinityLabs\FinMail\Editors\Blocks\ButtonBlock;
use FinityLabs\FinMail\Helpers\InlineStyler;
use FinityLabs\FinMail\Models\EmailTheme;

beforeEach(function () {
    $this->theme = EmailTheme::defaultColors();
});

it('changes nothing for a host that configures no element styles', function () {
    $html = '<h2>Title</h2><p>Text with <a href="https://example.com">a link</a>.</p><ul><li>One</li></ul>';

    expect(InlineStyler::apply($html, $this->theme))->toBe(
        '<h2>Title</h2><p>Text with <a href="https://example.com" style="color: #4F46E5; text-decoration: underline;">a link</a>.</p><ul><li>One</li></ul>'
    );
});

it('gives each configured element its style with theme colors filled in', function () {
    config()->set('fin-mail.element_styles', [
        'p' => 'margin: 0 0 16px; color: {text};',
        'h2' => 'color: {heading}; font-size: 22px;',
        'td' => 'padding: 6px; border-bottom: 1px solid {border};',
        'strong' => 'font-weight: 700;',
    ]);

    $html = InlineStyler::apply('<h2>Title</h2><p><strong>Bold</strong></p><table><tr><td>Cell</td></tr></table>', $this->theme);

    expect($html)->toContain('<h2 style="color: #1a1a1a; font-size: 22px;">')
        ->toContain('<p style="margin: 0 0 16px; color: #333333;">')
        ->toContain('<strong style="font-weight: 700;">')
        ->toContain('<td style="padding: 6px; border-bottom: 1px solid #e8e8e8;">');
});

it('keeps a property an element already carries', function () {
    config()->set('fin-mail.element_styles', ['p' => 'margin: 0 0 16px; color: {text};']);

    $html = InlineStyler::apply('<p style="color: red">Red</p><p style="background-color: #fff;">Plain</p>', $this->theme);

    // What's missing goes in front, so the element's own declarations come last.
    expect($html)->toContain('<p style="margin: 0 0 16px; color: red">')
        // background-color is not color: the text color is still added.
        ->toContain('<p style="margin: 0 0 16px; color: #333333; background-color: #fff;">');
});

it('lets a style typed into the body win over a configured shorthand', function () {
    config()->set('fin-mail.element_styles', [
        'p' => 'margin: 0 0 16px; padding: 0;',
        'td' => 'background: #fff;',
    ]);

    $html = InlineStyler::apply('<p style="margin-top: 0; padding-left: 4px">Text</p><table><tr><td style="background-color: yellow">Cell</td></tr></table>', $this->theme);

    // The longhand comes after the shorthand it refines, so it applies.
    expect($html)->toContain('<p style="margin: 0 0 16px; padding: 0; margin-top: 0; padding-left: 4px">')
        ->toContain('<td style="background: #fff; background-color: yellow">');
});

it('keeps a tag whole when an attribute value holds a closing angle bracket', function () {
    config()->set('fin-mail.element_styles', ['p' => 'margin: 0;']);

    $html = InlineStyler::apply('<p title="a > b">Text <a href="https://example.com/?q=a>b" title="1 > 0">link</a></p>', $this->theme);

    expect($html)->toBe('<p title="a > b" style="margin: 0;">Text <a href="https://example.com/?q=a>b" title="1 > 0" style="color: #4F46E5; text-decoration: underline;">link</a></p>');
});

it('does not take data-style, or the word inside another attribute, for the style attribute', function () {
    config()->set('fin-mail.element_styles', ['p' => 'margin: 0;']);

    $html = InlineStyler::apply('<p data-style="x" style="color: red">One</p><p title="style=\'y\'">Two</p><p style=color:blue>Three</p>', $this->theme);

    expect($html)->toContain('<p data-style="x" style="margin: 0; color: red">One</p>')
        ->toContain('<p title="style=\'y\'" style="margin: 0;">Two</p>')
        ->toContain('<p style="margin: 0; color:blue">Three</p>');
});

it('leaves markup inside comments alone', function () {
    config()->set('fin-mail.element_styles', ['p' => 'margin: 0;', 'td' => 'padding: 6px;']);

    $html = '<!--[if mso]><table><tr><td><![endif]--><p>Text</p><!--[if mso]></td></tr></table><![endif]-->';

    expect(InlineStyler::apply($html, $this->theme))
        ->toBe('<!--[if mso]><table><tr><td><![endif]--><p style="margin: 0;">Text</p><!--[if mso]></td></tr></table><![endif]-->');
});

it('gives the paragraph the editor puts in a list item the paragraph style without its margins', function () {
    config()->set('fin-mail.element_styles', [
        'p' => 'margin: 0 0 16px; color: {text};',
        'li' => 'margin: 0 0 6px;',
    ]);

    $html = InlineStyler::apply('<p>Intro</p><ul><li><p>One</p></li><li><p>Two</p><ul><li><p>Nested</p></li></ul></li></ul><p>Outro</p>', $this->theme);

    expect($html)->toContain('<p style="margin: 0 0 16px; color: #333333;">Intro</p>')
        ->toContain('<li style="margin: 0 0 6px;"><p style="margin: 0; color: #333333;">One</p></li>')
        ->toContain('<p style="margin: 0; color: #333333;">Nested</p>')
        // Back outside the list, paragraphs keep their margin.
        ->toContain('<p style="margin: 0 0 16px; color: #333333;">Outro</p>');
});

it('leaves block markup alone, and host HTML marked with protect()', function () {
    config()->set('fin-mail.element_styles', ['td' => 'padding: 6px; border-bottom: 1px solid {border};', 'p' => 'color: {text};']);

    $divider = '<!--fm-block--><table><tr><td height="1" style="height: 1px;">&nbsp;</td></tr></table><!--/fm-block-->';
    $card = InlineStyler::protect('<p class="card">Listing</p>');

    $html = InlineStyler::apply('<p>Before</p>'.$divider.$card.'<p>After</p>', $this->theme);

    expect($html)->toContain('<td height="1" style="height: 1px;">')
        ->toContain('<p class="card">Listing</p>')
        ->toContain('<p style="color: #333333;">Before</p>')
        ->toContain('<p style="color: #333333;">After</p>')
        ->not->toContain('fm-block');
});

it('leaves the button block alone', function () {
    config()->set('fin-mail.element_styles', ['a' => 'color: {link}; font-weight: 600;', 'span' => 'color: red;']);

    $button = ButtonBlock::toHtml(['label' => 'Go', 'url' => 'https://example.com'], ['theme' => $this->theme]);

    expect(InlineStyler::apply($button, $this->theme))->toBe(InlineStyler::removeMarkers($button));
});

it('drops a declaration whose theme color is missing', function () {
    config()->set('fin-mail.element_styles', ['p' => 'color: {missing_key}; margin: 0;']);

    expect(InlineStyler::apply('<p>Text</p>', $this->theme))->toBe('<p style="margin: 0;">Text</p>');
});

it('zeroes the bottom margin of the body\'s last element when asked', function () {
    config()->set('fin-mail.element_styles', ['p' => 'margin: 0 0 16px;']);
    config()->set('fin-mail.element_style_rules.last_element_margin', true);

    $html = InlineStyler::apply("<p>First</p>\n<ul><li>One<ul><li>Nested</li></ul></li></ul>\n<p>Last</p>\n", $this->theme);

    expect($html)->toContain('<p style="margin: 0 0 16px;">First</p>')
        ->toContain('<p style="margin: 0 0 16px; margin-bottom: 0;">Last</p>');

    $list = InlineStyler::apply('<p>Intro</p><ul><li>First</li><li>One<ul><li>Nested</li></ul></li></ul>', $this->theme);

    // The list ends the body, and so does everything that ends the list:
    // its last item, the nested list and that list's last item.
    expect($list)->toBe('<p style="margin: 0 0 16px;">Intro</p><ul style="margin-bottom: 0;"><li>First</li><li style="margin-bottom: 0;">One<ul style="margin-bottom: 0;"><li style="margin-bottom: 0;">Nested</li></ul></li></ul>');
});

it('zeroes the last margin whichever way the element style writes it', function () {
    config()->set('fin-mail.element_styles', ['p' => 'margin-bottom: 16px;', 'li' => 'margin: 0 0 6px;']);
    config()->set('fin-mail.element_style_rules.last_element_margin', true);

    expect(InlineStyler::apply('<p>First</p><p>Last</p>', $this->theme))
        ->toBe('<p style="margin-bottom: 16px;">First</p><p style="margin-bottom: 0;">Last</p>');

    // A list the editor wrote: the last item and its paragraph end the body too.
    expect(InlineStyler::apply('<ul><li><p>One</p></li><li><p>Two</p></li></ul>', $this->theme))
        ->toBe('<ul style="margin-bottom: 0;"><li style="margin: 0 0 6px;"><p style="margin: 0;">One</p></li><li style="margin: 0 0 6px; margin-bottom: 0;"><p style="margin: 0; margin-bottom: 0;">Two</p></li></ul>');
});

it('keeps a bottom margin typed on the last element', function () {
    config()->set('fin-mail.element_styles', ['p' => 'margin: 0 0 16px;']);
    config()->set('fin-mail.element_style_rules.last_element_margin', true);

    expect(InlineStyler::apply('<p>First</p><p style="margin-bottom: 24px">Last</p>', $this->theme))
        ->toContain('<p style="margin: 0 0 16px; margin-bottom: 24px">Last</p>');
});

it('looks past empty paragraphs and comments for the last element', function () {
    config()->set('fin-mail.element_styles', ['p' => 'margin: 0 0 16px;']);
    config()->set('fin-mail.element_style_rules.last_element_margin', true);

    $html = InlineStyler::apply("<p>First</p><p>Last</p><p></p><p><br></p>\n<!-- end -->\n", $this->theme);

    // The empty paragraphs would otherwise carry the gap the rule removes.
    expect($html)->toBe("<p style=\"margin: 0 0 16px;\">First</p><p style=\"margin: 0 0 16px; margin-bottom: 0;\">Last</p><p style=\"margin: 0 0 16px; margin-bottom: 0;\"></p><p style=\"margin: 0 0 16px; margin-bottom: 0;\"><br></p>\n<!-- end -->\n");
});

it('leaves the last element alone when the body ends with a block', function () {
    config()->set('fin-mail.element_style_rules.last_element_margin', true);

    $html = '<p>Text</p>'.InlineStyler::protect('<div><p>Block</p></div>');

    expect(InlineStyler::apply($html, $this->theme))->toBe('<p>Text</p><div><p>Block</p></div>');
});

it('lets a link showing a bare URL break anywhere when asked', function () {
    config()->set('fin-mail.element_style_rules.bare_url_break', true);

    $html = InlineStyler::apply('<p><a href="https://example.com/very/long">https://example.com/very/long</a> and <a href="https://example.com">a named link</a></p>', $this->theme);

    expect($html)->toContain('<a href="https://example.com/very/long" style="color: #4F46E5; text-decoration: underline; word-break: break-all;">')
        ->toContain('<a href="https://example.com" style="color: #4F46E5; text-decoration: underline;">a named link');
});
