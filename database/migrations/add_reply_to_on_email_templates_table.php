<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(config('fin-mail.table_names.templates') ?? 'email_templates', function (Blueprint $table) {
            $table->json('reply_to')->nullable()->after('from');
        });
    }

    public function down(): void
    {
        Schema::table(config('fin-mail.table_names.templates') ?? 'email_templates', function (Blueprint $table) {
            $table->dropColumn('reply_to');
        });
    }
};
