<?php

use FinityLabs\FinMail\Settings\BrandingSettings;
use FinityLabs\FinMail\Settings\GeneralSettings;
use FinityLabs\FinMail\Settings\LoggingSettings;
use FinityLabs\FinMail\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

/**
 * Fake the settings a full render reads, logging off.
 *
 * @param  array<string, mixed>  $branding  Branding values over the defaults
 */
function fakeFinMailSettings(array $branding = []): void
{
    BrandingSettings::fake(array_merge(BrandingSettings::defaults(), $branding), loadMissingValues: false);
    GeneralSettings::fake(GeneralSettings::defaults(), loadMissingValues: false);
    LoggingSettings::fake(['enabled' => false] + LoggingSettings::defaults(), loadMissingValues: false);
}
