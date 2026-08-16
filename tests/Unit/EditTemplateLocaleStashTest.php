<?php

declare(strict_types=1);

use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Resources\EmailTemplateResource\Pages\EditEmailTemplate;

function mutateSaveDataWithStash(EmailTemplate $record, string $activeLocale, array $localeData, array $data): array
{
    $page = (new ReflectionClass(EditEmailTemplate::class))->newInstanceWithoutConstructor();
    $page->record = $record;
    $page->activeLocale = $activeLocale;
    $page->localeData = $localeData;

    $method = new ReflectionMethod($page, 'mutateFormDataBeforeSave');

    return $method->invoke($page, $data);
}

it('persists translations stashed while switching locales on the edit page', function () {
    $template = EmailTemplate::create([
        'key' => 'stash-test',
        'name' => ['en' => 'Stash Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>English</p>'],
        'is_active' => true,
    ]);

    // Simulate: the user edited the Hungarian translation, switched back to
    // English (stashing the hu fields), then hit Save while on English.
    mutateSaveDataWithStash(
        $template,
        activeLocale: 'en',
        localeData: [
            'hu' => ['subject' => 'Szia', 'body' => '<p>Magyar</p>'],
        ],
        data: ['subject' => 'Hello', 'body' => '<p>English</p>'],
    );

    $template->save();

    expect($template->getTranslation('subject', 'hu'))->toBe('Szia')
        ->and($template->getTranslation('body', 'hu'))->toBe('<p>Magyar</p>')
        ->and($template->getTranslation('subject', 'en'))->toBe('Hello');
});

it('does not let a stale stash of the active locale override submitted data', function () {
    $template = EmailTemplate::create([
        'key' => 'stash-active-test',
        'name' => ['en' => 'Stash Active Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>English</p>'],
        'is_active' => true,
    ]);

    // The active locale's stash is outdated (the form holds newer edits);
    // it must be ignored in favor of the submitted data.
    mutateSaveDataWithStash(
        $template,
        activeLocale: 'en',
        localeData: [
            'en' => ['subject' => 'Old stashed subject'],
        ],
        data: ['subject' => 'Fresh subject'],
    );

    expect($template->getTranslation('subject', 'en'))->toBe('Hello');
});

it('skips empty stashed translations instead of writing blank strings', function () {
    $template = EmailTemplate::create([
        'key' => 'stash-empty-test',
        'name' => ['en' => 'Stash Empty Test'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>English</p>'],
        'is_active' => true,
    ]);

    mutateSaveDataWithStash(
        $template,
        activeLocale: 'en',
        localeData: [
            'hu' => ['subject' => '', 'body' => ''],
        ],
        data: ['subject' => 'Hello'],
    );

    $template->save();

    expect($template->getTranslations('subject'))->not->toHaveKey('hu');
});
