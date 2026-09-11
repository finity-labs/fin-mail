<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Tests\Unit;

use FinityLabs\FinMail\Mail\TemplateMail;
use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\SentEmail;
use FinityLabs\FinMail\Settings\BrandingSettings;
use FinityLabs\FinMail\Settings\GeneralSettings;
use FinityLabs\FinMail\Settings\LoggingSettings;
use FinityLabs\FinMail\Tests\Fixtures\UuidUser;
use FinityLabs\FinMail\Tests\UuidUserTestCase;
use Illuminate\Support\Facades\Mail;

class UuidUserKeyTest extends UuidUserTestCase
{
    protected EmailTemplate $template;

    protected UuidUser $user;

    protected function setUp(): void
    {
        parent::setUp();

        BrandingSettings::fake(BrandingSettings::defaults(), loadMissingValues: false);
        GeneralSettings::fake(GeneralSettings::defaults(), loadMissingValues: false);
        LoggingSettings::fake(LoggingSettings::defaults(), loadMissingValues: false);

        config()->set('fin-mail.versioning.enabled', true);

        $this->template = EmailTemplate::create([
            'key' => 'uuid-user-test',
            'name' => ['en' => 'UUID User Test'],
            'category' => 'transactional',
            'subject' => ['en' => 'Hello'],
            'body' => ['en' => '<p>Body</p>'],
            'is_active' => true,
        ]);

        $this->user = UuidUser::create(['name' => 'Jane Uuid', 'email' => 'jane@example.com']);
    }

    public function test_the_migrations_create_string_user_columns_for_a_uuid_user_model(): void
    {
        $schema = $this->app['db']->connection()->getSchemaBuilder();

        $this->assertSame('varchar', $schema->getColumnType('email_template_versions', 'created_by'));
        $this->assertSame('varchar', $schema->getColumnType('sent_emails', 'sent_by'));
    }

    public function test_save_version_accepts_and_stores_a_uuid_user_id(): void
    {
        $version = $this->template->saveVersion($this->user->getKey());

        $this->assertSame($this->user->getKey(), $version->fresh()->created_by);
        $this->assertTrue($version->createdBy->is($this->user));
    }

    public function test_save_version_falls_back_to_the_authenticated_uuid_user(): void
    {
        $this->actingAs($this->user);

        $version = $this->template->saveVersion();

        $this->assertSame($this->user->getKey(), $version->fresh()->created_by);
    }

    public function test_the_sent_email_log_stores_the_uuid_sender(): void
    {
        $this->actingAs($this->user);

        Mail::to('john@example.com')->send(TemplateMail::make('uuid-user-test'));

        $log = SentEmail::firstOrFail();

        $this->assertSame($this->user->getKey(), $log->sent_by);
        $this->assertTrue($log->sender()->first()->is($this->user));
    }
}
