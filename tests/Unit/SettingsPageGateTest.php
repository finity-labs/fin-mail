<?php

declare(strict_types=1);

use FinityLabs\FinMail\Clusters\FinMailSettings\Pages\ManageGeneralSettings;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Gate;

class GateTestUser extends AuthUser
{
    protected $table = 'users';

    protected $guarded = [];
}

function actingUser(): GateTestUser
{
    $user = new GateTestUser;
    $user->forceFill(['name' => 'Gate', 'email' => 'gate@example.com'])->save();

    auth()->login($user);

    return $user;
}

it('keeps settings pages accessible when no gate ability is defined', function () {
    actingUser();

    expect(ManageGeneralSettings::canAccess())->toBeTrue();
});

it('denies settings page access through a defined gate ability', function () {
    actingUser();

    Gate::define('page_ManageGeneralSettings', fn ($user): bool => false);

    expect(ManageGeneralSettings::canAccess())->toBeFalse();
});

it('grants settings page access through a defined gate ability', function () {
    actingUser();

    Gate::define('page_ManageGeneralSettings', fn ($user): bool => true);

    expect(ManageGeneralSettings::canAccess())->toBeTrue();
});
