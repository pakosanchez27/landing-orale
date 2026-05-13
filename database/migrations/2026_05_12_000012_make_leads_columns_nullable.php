<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->uuid('uuid')->nullable()->change();
            $table->string('full_name')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('phone_country_code', 10)->nullable()->change();
            $table->string('phone_number', 20)->nullable()->change();
            $table->string('phone_e164', 25)->nullable()->change();
            $table->string('whatsapp_number', 30)->nullable()->change();
            $table->string('company_name')->nullable()->change();
            $table->foreignId('industry_id')->nullable()->change();
            $table->foreignId('source_id')->nullable()->change();
            $table->foreignId('status_id')->nullable()->change();
            $table->foreignId('assigned_to')->nullable()->change();
            $table->foreignId('created_by')->nullable()->change();
            $table->unsignedSmallInteger('score')->nullable()->change();
            $table->string('interest_package')->nullable()->change();
            $table->string('budget_range')->nullable()->change();
            $table->text('needs_summary')->nullable()->change();
            $table->boolean('bot')->nullable()->change();
            $table->timestamp('last_contact_at')->nullable()->change();
            $table->timestamp('next_follow_up_at')->nullable()->change();
            $table->timestamp('won_at')->nullable()->change();
            $table->timestamp('lost_at')->nullable()->change();
            $table->string('lost_reason')->nullable()->change();
            $table->json('origin_meta')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->uuid('uuid')->nullable(false)->change();
            $table->string('full_name')->nullable(false)->change();
            $table->string('email')->nullable()->change();
            $table->string('phone_country_code', 10)->nullable()->change();
            $table->string('phone_number', 20)->nullable()->change();
            $table->string('phone_e164', 25)->nullable()->change();
            $table->string('whatsapp_number', 30)->nullable()->change();
            $table->string('company_name')->nullable()->change();
            $table->foreignId('industry_id')->nullable()->change();
            $table->foreignId('source_id')->nullable(false)->change();
            $table->foreignId('status_id')->nullable(false)->change();
            $table->foreignId('assigned_to')->nullable()->change();
            $table->foreignId('created_by')->nullable()->change();
            $table->unsignedSmallInteger('score')->default(0)->nullable(false)->change();
            $table->string('interest_package')->nullable()->change();
            $table->string('budget_range')->nullable()->change();
            $table->text('needs_summary')->nullable()->change();
            $table->boolean('bot')->default(false)->nullable(false)->change();
            $table->timestamp('last_contact_at')->nullable()->change();
            $table->timestamp('next_follow_up_at')->nullable()->change();
            $table->timestamp('won_at')->nullable()->change();
            $table->timestamp('lost_at')->nullable()->change();
            $table->string('lost_reason')->nullable()->change();
            $table->json('origin_meta')->nullable()->change();
        });
    }
};
