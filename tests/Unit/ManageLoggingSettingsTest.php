<?php

declare(strict_types=1);

use FinityLabs\FinMail\Clusters\FinMailSettings\Pages\ManageLoggingSettings;
use FinityLabs\FinMail\Enums\CleanupFrequency;

/**
 * Invokes the page's protected mutateFormDataBeforeSave() without booting the
 * Livewire component (it only manipulates the form-state array).
 *
 * @param  array<string, mixed>  $data
 *
 * @return array<string, mixed>
 */
function mutateLoggingSaveData(array $data): array
{
    $page = (new ReflectionClass(ManageLoggingSettings::class))->newInstanceWithoutConstructor();

    $method = new ReflectionMethod($page, 'mutateFormDataBeforeSave');
    $method->setAccessible(true);

    return $method->invoke($page, $data);
}

it('casts cleanup_frequency to the enum when present', function () {
    $data = mutateLoggingSaveData([
        'cleanup_enabled' => true,
        'cleanup_frequency' => 2,
    ]);

    expect($data['cleanup_frequency'])->toBe(CleanupFrequency::Weekly);
});

it('does not error when cleanup_frequency is absent (scheduled cleanup disabled)', function () {
    // When the toggle is off the Select is not visible, so Filament omits the
    // key from the submitted data. Saving must not raise "Undefined array key". (#16)
    $data = mutateLoggingSaveData([
        'cleanup_enabled' => false,
    ]);

    expect($data)->not->toHaveKey('cleanup_frequency')
        ->and($data['cleanup_enabled'])->toBeFalse();
});
