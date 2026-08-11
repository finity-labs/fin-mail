<?php

declare(strict_types=1);

use FinityLabs\FinMail\FinMailServiceProvider;
use FinityLabs\FinMail\Settings\LoggingSettings;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Collection;

/**
 * Re-invokes the provider's protected registerScheduledCommands().
 */
function registerCleanupSchedule(): void
{
    (new ReflectionMethod(FinMailServiceProvider::class, 'registerScheduledCommands'))
        ->invoke(app()->getProvider(FinMailServiceProvider::class));
}

/**
 * @return Collection<int, string>
 */
function scheduledCleanupCommands(Schedule $schedule): Collection
{
    return collect($schedule->events())
        ->map(fn ($event): string => (string) $event->command)
        ->filter(fn (string $command): bool => str_contains($command, 'fin-mail:cleanup'));
}

it('schedules the cleanup command even when the schedule was resolved before registration', function () {
    // The regression in #26: the Schedule singleton can be resolved (by the
    // framework or another package) before this provider registers its
    // callback — a bare afterResolving() would then never fire.
    LoggingSettings::fake(['cleanup_enabled' => false] + LoggingSettings::defaults(), loadMissingValues: false);

    $schedule = app(Schedule::class);

    LoggingSettings::fake(['cleanup_enabled' => true] + LoggingSettings::defaults(), loadMissingValues: false);

    registerCleanupSchedule();

    expect(scheduledCleanupCommands($schedule))->not->toBeEmpty();
});

it('does not schedule the cleanup command when cleanup is disabled', function () {
    LoggingSettings::fake(['cleanup_enabled' => false] + LoggingSettings::defaults(), loadMissingValues: false);

    $schedule = app(Schedule::class);

    registerCleanupSchedule();

    expect(scheduledCleanupCommands($schedule))->toBeEmpty();
});
