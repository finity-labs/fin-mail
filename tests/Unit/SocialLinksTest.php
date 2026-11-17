<?php

declare(strict_types=1);

use FinityLabs\FinMail\Commands\UninstallCommand;
use FinityLabs\FinMail\FinMailServiceProvider;
use FinityLabs\FinMail\Helpers\SocialLinks;
use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\EmailTheme;
use Illuminate\Console\OutputStyle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

beforeEach(function () {
    $this->publicPath = sys_get_temp_dir().'/fin-mail-public-'.uniqid();
    File::ensureDirectoryExists($this->publicPath);
    app()->usePublicPath($this->publicPath);
});

afterEach(function () {
    File::deleteDirectory($this->publicPath);
});

function publishSocialIcons(string $publicPath): void
{
    File::copyDirectory(__DIR__.'/../../resources/dist/social', $publicPath.'/vendor/fin-mail/social');
}

function socialTemplate(string $key, ?EmailTheme $theme = null): void
{
    EmailTemplate::create([
        'key' => $key,
        'name' => ['en' => 'Social'],
        'category' => 'transactional',
        'subject' => ['en' => 'Hello'],
        'body' => ['en' => '<p>Body</p>'],
        'is_active' => true,
        'email_theme_id' => $theme?->id,
    ]);
}

it('ships a black and a white icon for each icon platform', function () {
    foreach (SocialLinks::ICON_PLATFORMS as $platform) {
        foreach (['black', 'white'] as $variant) {
            expect(__DIR__."/../../resources/dist/social/{$platform}-{$variant}.png")->toBeFile();
        }
    }
});

it('offers the icons under its own publish tag and Laravel\'s assets tag', function (string $tag) {
    $paths = ServiceProvider::pathsToPublish(FinMailServiceProvider::class, $tag);

    expect($paths)->toHaveCount(1)
        ->and(realpath((string) array_key_first($paths)))->toBe(realpath(__DIR__.'/../../resources/dist'))
        ->and(str_replace('\\', '/', (string) reset($paths)))->toEndWith('/public/vendor/fin-mail');
})->with(['fin-mail-assets', 'laravel-assets']);

it('picks black icons on a light background and white ones on a dark background', function (string $background, string $variant) {
    expect(SocialLinks::iconVariant($background))->toBe($variant);
})->with([
    'default footer' => ['#f4f4f7', 'black'],
    'white' => ['#fff', 'black'],
    'navy' => ['#0b2545', 'white'],
    'black' => ['#000000', 'white'],
    'mid grey' => ['#777777', 'black'],
    'not a hex color' => ['rgb(0, 0, 0)', 'black'],
]);

it('labels the links from the platform list and skips empty ones', function () {
    $links = SocialLinks::forLayout([
        ['platform' => 'facebook', 'url' => 'https://facebook.com/example'],
        ['platform' => 'linkedin', 'url' => 'https://linkedin.com/company/example'],
        ['platform' => 'mastodon', 'url' => 'https://mastodon.social/@example'],
        ['platform' => 'instagram', 'url' => '  '],
        'not a link',
    ], '#ffffff');

    expect($links)->toHaveCount(3)
        ->and(array_column($links, 'label'))->toBe(['Facebook', 'LinkedIn', 'Mastodon'])
        ->and(array_column($links, 'icon'))->toBe([null, null, null]);
});

it('prints text links in the default layout until the icons are published', function () {
    fakeFinMailSettings(['social_links' => [['platform' => 'facebook', 'url' => 'https://facebook.com/example']]]);
    socialTemplate('social-text');

    $html = TemplateMail::make('social-text')->render();

    expect($html)->toContain('href="https://facebook.com/example"')
        ->toContain('>Facebook</a>')
        ->not->toContain('<img src="'.asset('vendor/fin-mail/social'));
});

it('prints published icons in the color that suits the footer', function () {
    publishSocialIcons($this->publicPath);
    fakeFinMailSettings(['social_links' => [
        ['platform' => 'instagram', 'url' => 'https://instagram.com/example'],
        ['platform' => 'linkedin', 'url' => 'https://linkedin.com/company/example'],
    ]]);

    socialTemplate('social-light');
    socialTemplate('social-dark', EmailTheme::create(['name' => 'Dark', 'colors' => ['footer_bg' => '#0b2545']]));

    $light = TemplateMail::make('social-light')->render();
    $dark = TemplateMail::make('social-dark')->render();

    expect($light)->toContain('src="'.asset('vendor/fin-mail/social/instagram-black.png').'"')
        ->toContain('alt="Instagram"')
        ->toContain('>LinkedIn</a>')
        ->and($dark)->toContain('src="'.asset('vendor/fin-mail/social/instagram-white.png').'"');
});

it('prints no social row without links', function () {
    fakeFinMailSettings();
    socialTemplate('social-none');

    expect(TemplateMail::make('social-none')->render())->not->toContain('target="_blank" style="display: inline-block; margin: 0 4px; vertical-align: middle;');
});

it('deletes the published icons on uninstall', function () {
    publishSocialIcons($this->publicPath);

    $command = app(UninstallCommand::class);
    $command->setLaravel(app());
    $command->setOutput(new OutputStyle(new ArrayInput([]), new BufferedOutput));

    $cleanup = new ReflectionMethod($command, 'cleanupPublishedAssets');
    $cleanup->invoke($command);

    expect($this->publicPath.'/vendor/fin-mail')->not->toBeDirectory()
        // Whatever else the host keeps under public/vendor stays.
        ->and($this->publicPath.'/vendor')->toBeDirectory();

    // Nothing published: nothing to do, and no error.
    $cleanup->invoke($command);
});

it('adds the social links setting once, from the package', function () {
    Schema::create('settings', function ($table): void {
        $table->id();
        $table->string('group');
        $table->string('name');
        $table->boolean('locked')->default(false);
        $table->json('payload');
        $table->timestamps();
        $table->unique(['group', 'name']);
    });

    $migrationPath = FinMailServiceProvider::upgradeMigrationsPath().'/fin_mail_2026_11_15_000000_add_social_links_to_branding_settings.php';

    expect(app('migrator')->paths())->toContain(FinMailServiceProvider::upgradeMigrationsPath());

    (include $migrationPath)->up();
    // A second run, e.g. after the host folded the row into its own
    // settings migration, must not fail.
    (include $migrationPath)->up();

    $rows = DB::table('settings')->where('group', 'fin-mail-branding')->where('name', 'social_links')->get();

    expect($rows)->toHaveCount(1)
        ->and(json_decode($rows->first()->payload, true))->toBe([]);
});
