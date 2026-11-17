<?php

declare(strict_types=1);

use Filament\Actions\BulkAction;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\EmailTheme;
use FinityLabs\FinMail\Resources\EmailTemplateResource\Tables\EmailTemplatesTable;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

function templateBulkAction(string $method): BulkAction
{
    return (new ReflectionMethod(EmailTemplatesTable::class, $method))->invoke(null);
}

function bulkTemplate(string $key, array $attributes = []): EmailTemplate
{
    return EmailTemplate::create(array_merge([
        'key' => $key,
        'name' => ['en' => $key],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
    ], $attributes));
}

it('sets the chosen theme on exactly the selected templates', function () {
    $old = EmailTheme::create(['name' => 'Old', 'colors' => []]);
    $new = EmailTheme::create(['name' => 'New', 'colors' => []]);

    $first = bulkTemplate('bulk-theme-1', ['email_theme_id' => $old->id]);
    $second = bulkTemplate('bulk-theme-2');
    $untouched = bulkTemplate('bulk-theme-3', ['email_theme_id' => $old->id]);

    $action = templateBulkAction('setThemeBulkAction');
    $action->getActionFunction()(new EloquentCollection([$first, $second]), ['email_theme_id' => (string) $new->id]);

    expect($first->fresh()->email_theme_id)->toBe($new->id)
        ->and($second->fresh()->email_theme_id)->toBe($new->id)
        ->and($untouched->fresh()->email_theme_id)->toBe($old->id);
});

it('puts the selected templates back on the default theme', function () {
    $theme = EmailTheme::create(['name' => 'Branded', 'colors' => []]);
    $template = bulkTemplate('bulk-theme-clear', ['email_theme_id' => $theme->id]);

    templateBulkAction('setThemeBulkAction')->getActionFunction()(new EloquentCollection([$template]), ['email_theme_id' => null]);

    expect($template->fresh()->email_theme_id)->toBeNull();
});

it('sets the chosen layout on exactly the selected templates', function () {
    config()->set('fin-mail.layouts', ['mail.layouts.admin' => 'Admin copy']);

    $selected = bulkTemplate('bulk-layout-1');
    $cleared = bulkTemplate('bulk-layout-2', ['view_path' => 'mail.layouts.admin']);
    $untouched = bulkTemplate('bulk-layout-3');

    $action = templateBulkAction('setLayoutBulkAction');
    $action->getActionFunction()(new EloquentCollection([$selected]), ['view_path' => 'mail.layouts.admin']);
    $action->getActionFunction()(new EloquentCollection([$cleared]), ['view_path' => null]);

    expect($selected->fresh()->view_path)->toBe('mail.layouts.admin')
        ->and($cleared->fresh()->view_path)->toBeNull()
        ->and($untouched->fresh()->view_path)->toBeNull();
});

it('hides the layout action until layouts are configured', function () {
    config()->set('fin-mail.layouts', []);

    expect(templateBulkAction('setLayoutBulkAction')->isVisible())->toBeFalse();

    config()->set('fin-mail.layouts', ['mail.layouts.admin' => 'Admin copy']);

    expect(templateBulkAction('setLayoutBulkAction')->isVisible())->toBeTrue();
});
