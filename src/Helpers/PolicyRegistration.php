<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Helpers;

use FinityLabs\FinMail\FinMailPlugin;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\EmailTheme;
use FinityLabs\FinMail\Models\SentEmail;
use Illuminate\Support\Facades\Gate;
use Throwable;

/**
 * Maps the policies of one namespace onto the package models. Works with
 * Shield-generated policies and hand-written ones alike; a policy is only
 * registered when its class actually exists, so a namespace without one
 * leaves whatever was registered before in place.
 *
 * It runs twice on purpose. FinMailServiceProvider::packageBooted() calls it
 * with the best namespace it can find while no panel is current (the default
 * panel's, or App\Policies), so console commands, queue workers and requests
 * outside any panel have their policies. FinMailPlugin::boot() calls it again
 * when a panel boots for a request, with that panel's own namespace. Filament
 * boots the current panel from the SetUpPanel middleware, after every
 * provider has booted, so the second call is what makes policyNamespace() a
 * per-panel option rather than one only the default panel can set.
 */
final class PolicyRegistration
{
    public const DEFAULT_NAMESPACE = 'App\\Policies';

    /**
     * @return array<class-string, class-string> model => the policy registered for it
     */
    public static function register(string $namespace): array
    {
        $namespace = rtrim($namespace, '\\');

        $policyMap = [
            EmailTemplate::class => $namespace.'\\EmailTemplatePolicy',
            EmailTheme::class => $namespace.'\\EmailThemePolicy',
            SentEmail::class => $namespace.'\\SentEmailPolicy',
        ];

        $gate = Gate::getFacadeRoot();
        $registered = [];

        foreach ($policyMap as $model => $policy) {
            if (class_exists($policy)) {
                $gate->policy($model, $policy);
                $registered[$model] = $policy;
            }
        }

        return $registered;
    }

    /**
     * The namespace to use while no panel is current: the default panel's
     * option when the plugin is on it, App\Policies otherwise.
     */
    public static function defaultNamespace(): string
    {
        try {
            return FinMailPlugin::get()->getPolicyNamespace();
        } catch (Throwable) {
            return self::DEFAULT_NAMESPACE;
        }
    }
}
