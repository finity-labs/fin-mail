<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Tests;

use FinityLabs\FinMail\Tests\Fixtures\UuidUser;

/**
 * Boots the package against a users table keyed by a UUID string.
 */
abstract class UuidUserTestCase extends TestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        config()->set('auth.providers.users.model', UuidUser::class);

        parent::getEnvironmentSetUp($app);
    }

    protected function createUsersTable($app): void
    {
        $app['db']->connection()->getSchemaBuilder()->create('users', function ($table) {
            $table->uuid('id')->primary();
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->timestamps();
        });
    }
}
