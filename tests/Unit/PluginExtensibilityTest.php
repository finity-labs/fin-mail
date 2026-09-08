<?php

declare(strict_types=1);

use Filament\Panel;
use FinityLabs\FinMail\FinMailPlugin;
use FinityLabs\FinMail\FinMailServiceProvider;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Resources\EmailTemplateResource\EmailTemplateResource;
use FinityLabs\FinMail\Resources\EmailThemeResource\EmailThemeResource;
use FinityLabs\FinMail\Resources\SentEmailResource\SentEmailResource;
use Illuminate\Support\Facades\Gate;

class CustomEmailTemplateResource extends EmailTemplateResource {}

class CustomEmailTemplatePolicy
{
    public function viewAny($user): bool
    {
        return false;
    }
}

class PanelEmailTemplatePolicy
{
    public function viewAny($user): bool
    {
        return true;
    }
}

it('registers the built-in resource classes by default', function () {
    $plugin = FinMailPlugin::make();

    expect($plugin->getEmailTemplateResource())->toBe(EmailTemplateResource::class)
        ->and($plugin->getEmailThemeResource())->toBe(EmailThemeResource::class)
        ->and($plugin->getSentEmailResource())->toBe(SentEmailResource::class);
});

it('lets the app swap in its own resource classes', function () {
    $plugin = FinMailPlugin::make()
        ->emailTemplateResource(CustomEmailTemplateResource::class);

    expect($plugin->getEmailTemplateResource())->toBe(CustomEmailTemplateResource::class);
});

it('registers policies from the configured namespace without Shield installed', function () {
    // Shield is not a test dependency, so this exercises the Shield-less path.
    class_alias(CustomEmailTemplatePolicy::class, 'App\\Policies\\EmailTemplatePolicy');

    $provider = new FinMailServiceProvider(app());
    (new ReflectionMethod($provider, 'registerPolicies'))->invoke($provider);

    expect(Gate::getPolicyFor(EmailTemplate::class))
        ->toBeInstanceOf(CustomEmailTemplatePolicy::class);
});

it('registers the namespace of the panel that boots, not only the default panel\'s', function () {
    // A namespace no other test names: the alias outlives this test, the
    // plugin instance does not. The harness boots no Filament manager, so
    // the plugin's boot() is called the way Panel::boot() would call it.
    if (! class_exists('FinMailHostTest\\Policies\\EmailTemplatePolicy', false)) {
        class_alias(PanelEmailTemplatePolicy::class, 'FinMailHostTest\\Policies\\EmailTemplatePolicy');
    }

    // Provider boot ran with the default namespace and cannot have used this one.
    expect(Gate::getPolicyFor(EmailTemplate::class))->not->toBeInstanceOf(PanelEmailTemplatePolicy::class);

    FinMailPlugin::make()
        ->policyNamespace('FinMailHostTest\\Policies')
        ->boot(Panel::make()->id('host'));

    expect(Gate::getPolicyFor(EmailTemplate::class))->toBeInstanceOf(PanelEmailTemplatePolicy::class);
});
