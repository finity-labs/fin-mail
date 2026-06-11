<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Tests;

use FinityLabs\FinMail\FinMailServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\LaravelSettings\LaravelSettingsServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'FinityLabs\\FinMail\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            FinMailServiceProvider::class,
            LaravelSettingsServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
        config()->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
        config()->set('mail.default', 'array');

        // Run package migrations
        $migration = include __DIR__.'/../database/migrations/create_email_themes_table.php';
        $migration->up();

        $migration = include __DIR__.'/../database/migrations/create_email_templates_table.php';
        $migration->up();

        $migration = include __DIR__.'/../database/migrations/create_email_template_versions_table.php';
        $migration->up();

        $migration = include __DIR__.'/../database/migrations/create_sent_emails_table.php';
        $migration->up();

        // Create a users table for foreign keys
        $app['db']->connection()->getSchemaBuilder()->create('users', function ($table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->timestamps();
        });
    }
}
