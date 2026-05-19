<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('lead_id')->nullable()->change();
            $table->foreignId('created_by')->nullable()->change();
            $table->foreignId('scheduled_by_source_id')->nullable()->change();
            $table->timestamp('starts_at')->nullable()->change();
            $table->timestamp('ends_at')->nullable()->change();
            $table->string('channel', 30)->nullable()->change();
            $table->string('meeting_link')->nullable()->change();
            $table->string('status', 30)->nullable()->change();
            $table->text('notes')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('lead_id')->nullable(false)->change();
            $table->foreignId('created_by')->nullable()->change();
            $table->foreignId('scheduled_by_source_id')->nullable()->change();
            $table->timestamp('starts_at')->nullable(false)->change();
            $table->timestamp('ends_at')->nullable()->change();
            $table->string('channel', 30)->default('google_meet')->nullable(false)->change();
            $table->string('meeting_link')->nullable()->change();
            $table->string('status', 30)->default('scheduled')->nullable(false)->change();
            $table->text('notes')->nullable()->change();
        });
    }
};
