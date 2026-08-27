<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Traits;

use BezhanSalleh\FilamentShield\Facades\FilamentShield;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Facades\Filament;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Gate;

trait HasPageShieldSupport
{
    protected static ?string $pagePermissionKey = null;

    public static function shouldRegisterNavigation(): bool
    {
        return static::canAccess() && parent::shouldRegisterNavigation();
    }

    public static function canAccess(): bool
    {
        if (! static::isShieldAvailable()) {
            // Without Shield, apps can gate each settings page by defining a
            // Gate ability named after it (Shield's own naming convention),
            // e.g. Gate::define('page_ManageGeneralSettings', ...). Pages
            // stay open when no ability is defined, as before.
            $ability = 'page_'.class_basename(static::class);

            if (Gate::has($ability)) {
                return (bool) static::getAuthUser()?->can($ability);
            }

            return parent::canAccess();
        }

        $permission = static::getPagePermission();
        $user = Filament::auth()->user();

        return $permission && $user
            ? $user->can($permission)
            : parent::canAccess();
    }

    protected static function getAuthUser(): ?Authenticatable
    {
        try {
            return Filament::auth()->user();
        } catch (\Throwable) {
            return auth()->user();
        }
    }

    protected static function isShieldAvailable(): bool
    {
        return class_exists(FilamentShieldPlugin::class);
    }

    protected static function getPagePermission(): ?string
    {
        if (static::$pagePermissionKey === null) {
            $page = FilamentShield::getPages()[static::class] ?? null;
            static::$pagePermissionKey = $page ? array_key_first($page['permissions']) : null;
        }

        return static::$pagePermissionKey;
    }
}
