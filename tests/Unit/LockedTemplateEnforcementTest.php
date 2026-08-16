<?php

declare(strict_types=1);

use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Resources\EmailTemplateResource\Pages\EditEmailTemplate;

function mutateSaveData(EmailTemplate $record, array $data): array
{
    $page = (new ReflectionClass(EditEmailTemplate::class))->newInstanceWithoutConstructor();
    $page->record = $record;
    $page->activeLocale = 'en';

    $method = new ReflectionMethod($page, 'mutateFormDataBeforeSave');

    return $method->invoke($page, $data);
}

function createLockableTemplate(bool $locked): EmailTemplate
{
    return EmailTemplate::create([
        'key' => 'lock-test',
        'name' => ['en' => 'Lock Test'],
        'category' => 'system',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
        'is_locked' => $locked,
    ]);
}

it('strips key and category from submitted data for locked templates', function () {
    $data = mutateSaveData(createLockableTemplate(locked: true), [
        'key' => 'hijacked-key',
        'category' => 'marketing',
        'subject' => 'Edited subject',
    ]);

    expect($data)->not->toHaveKey('key')
        ->not->toHaveKey('category')
        ->toHaveKey('subject');
});

it('keeps key and category in submitted data for unlocked templates', function () {
    $data = mutateSaveData(createLockableTemplate(locked: false), [
        'key' => 'renamed-key',
        'category' => 'marketing',
    ]);

    expect($data['key'])->toBe('renamed-key')
        ->and($data['category'])->toBe('marketing');
});
