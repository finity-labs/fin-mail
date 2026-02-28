<?php

declare(strict_types=1);

namespace FinityLabs\FinMail;

use Closure;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use FinityLabs\FinMail\Enums\NavigationGroup;
use FinityLabs\FinMail\Resources\EmailTemplateResource\EmailTemplateResource;
use FinityLabs\FinMail\Resources\EmailThemeResource\EmailThemeResource;
use FinityLabs\FinMail\Resources\SentEmailResource\SentEmailResource;
use UnitEnum;

class FinMailPlugin implements Plugin
{
    use EvaluatesClosures;

    protected bool|Closure $deleteActionOnEditPage = false;

    protected bool|Closure $sentEmailsEnabled = true;

    protected bool|Closure $themesEnabled = true;

    protected ?int $emailTemplateNavigationSort = 10;

    protected ?int $emailThemeNavigationSort = 20;

    protected ?int $sentEmailNavigationSort = 30;

    protected ?int $settingsNavigationSort = 40;

    protected string|UnitEnum|Closure|null $emailTemplateNavigationGroup = NavigationGroup::Email;

    protected string|UnitEnum|Closure|null $emailThemeNavigationGroup = NavigationGroup::Email;

    protected string|UnitEnum|Closure|null $sentEmailNavigationGroup = NavigationGroup::Email;

    protected string|UnitEnum|Closure|null $settingsNavigationGroup = NavigationGroup::Email;

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static */
        return filament(app(static::class)->getId());
    }

    public function getId(): string
    {
        return 'fin-mail';
    }

    public function register(Panel $panel): void
    {
        $resources = [
            EmailTemplateResource::class,
        ];

        if ($this->evaluate($this->themesEnabled)) {
            $resources[] = EmailThemeResource::class;
        }

        if ($this->evaluate($this->sentEmailsEnabled)) {
            $resources[] = SentEmailResource::class;
        }

        $panel
            ->discoverClusters(in: __DIR__.'/Clusters', for: 'FinityLabs\\FinMail\\Clusters')
            ->resources($resources);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public function deleteActionOnEditPage(bool|Closure $enabled = true): static
    {
        $this->deleteActionOnEditPage = $enabled;

        return $this;
    }

    public function hasDeleteActionOnEditPage(): bool
    {
        return $this->evaluate($this->deleteActionOnEditPage);
    }

    public function enableSentEmails(bool|Closure $enabled = true): static
    {
        $this->sentEmailsEnabled = $enabled;

        return $this;
    }

    public function enableThemes(bool|Closure $enabled = true): static
    {
        $this->themesEnabled = $enabled;

        return $this;
    }

    public function navigationGroup(string|UnitEnum|Closure|null $group): static
    {
        $this->emailTemplateNavigationGroup = $group;
        $this->emailThemeNavigationGroup = $group;
        $this->sentEmailNavigationGroup = $group;
        $this->settingsNavigationGroup = $group;

        return $this;
    }

    public function emailTemplateNavigationGroup(string|UnitEnum|Closure|null $group): static
    {
        $this->emailTemplateNavigationGroup = $group;

        return $this;
    }

    public function emailThemeNavigationGroup(string|UnitEnum|Closure|null $group): static
    {
        $this->emailThemeNavigationGroup = $group;

        return $this;
    }

    public function sentEmailNavigationGroup(string|UnitEnum|Closure|null $group): static
    {
        $this->sentEmailNavigationGroup = $group;

        return $this;
    }

    public function settingsNavigationGroup(string|UnitEnum|Closure|null $group): static
    {
        $this->settingsNavigationGroup = $group;

        return $this;
    }

    public function navigationSort(?int $sort): static
    {
        if ($sort === null) {
            $this->emailTemplateNavigationSort = null;
            $this->emailThemeNavigationSort = null;
            $this->sentEmailNavigationSort = null;
            $this->settingsNavigationSort = null;
        } else {
            $this->emailTemplateNavigationSort = $sort;
            $this->emailThemeNavigationSort = $sort + 1;
            $this->sentEmailNavigationSort = $sort + 2;
            $this->settingsNavigationSort = $sort + 3;
        }

        return $this;
    }

    public function emailTemplateNavigationSort(int|Closure|null $sort): static
    {
        $this->emailTemplateNavigationSort = $sort;

        return $this;
    }

    public function emailThemeNavigationSort(int|Closure|null $sort): static
    {
        $this->emailThemeNavigationSort = $sort;

        return $this;
    }

    public function sentEmailNavigationSort(int|Closure|null $sort): static
    {
        $this->sentEmailNavigationSort = $sort;

        return $this;
    }

    public function settingsNavigationSort(int|Closure|null $sort): static
    {
        $this->settingsNavigationSort = $sort;

        return $this;
    }

    public function getEmailTemplateNavigationSort(): ?int
    {
        return $this->evaluate($this->emailTemplateNavigationSort);
    }

    public function getEmailThemeNavigationSort(): ?int
    {
        return $this->evaluate($this->emailThemeNavigationSort);
    }

    public function getSentEmailNavigationSort(): ?int
    {
        return $this->evaluate($this->sentEmailNavigationSort);
    }

    public function getSettingsNavigationSort(): ?int
    {
        return $this->evaluate($this->settingsNavigationSort);
    }

    public function getEmailTemplateNavigationGroup(): string|UnitEnum|null
    {
        return $this->evaluate($this->emailTemplateNavigationGroup);
    }

    public function getEmailThemeNavigationGroup(): string|UnitEnum|null
    {
        return $this->evaluate($this->emailThemeNavigationGroup);
    }

    public function getSentEmailNavigationGroup(): string|UnitEnum|null
    {
        return $this->evaluate($this->sentEmailNavigationGroup);
    }

    public function getSettingsNavigationGroup(): string|UnitEnum|null
    {
        return $this->evaluate($this->settingsNavigationGroup);
    }
}
