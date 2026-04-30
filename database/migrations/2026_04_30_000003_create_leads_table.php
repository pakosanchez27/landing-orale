<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('full_name');
            $table->string('email')->nullable()->index();
            $table->string('phone_country_code', 10)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('phone_e164', 25)->nullable()->unique();
            $table->string('whatsapp_number', 30)->nullable();
            $table->string('company_name')->nullable();
            $table->foreignId('industry_id')->nullable()->constrained('industrias')->nullOnDelete();
            $table->foreignId('source_id')->constrained('lead_sources')->restrictOnDelete();
            $table->foreignId('status_id')->constrained('lead_statuses')->restrictOnDelete();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->unsignedSmallInteger('score')->default(0);
            $table->string('interest_package')->nullable();
            $table->string('budget_range')->nullable();
            $table->text('needs_summary')->nullable();
            $table->timestamp('last_contact_at')->nullable();
            $table->timestamp('next_follow_up_at')->nullable()->index();
            $table->timestamp('qualified_at')->nullable();
            $table->timestamp('won_at')->nullable();
            $table->timestamp('lost_at')->nullable();
            $table->string('lost_reason')->nullable();
            $table->json('origin_meta')->nullable();
            $table->timestamps();

            $table->index(['source_id', 'status_id']);
            $table->index(['assigned_to', 'status_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
