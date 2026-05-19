<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lead_activities', function (Blueprint $table) {
            $table->foreignId('lead_id')->nullable()->change();
            $table->foreignId('user_id')->nullable()->change();
            $table->foreignId('source_id')->nullable()->change();
            $table->string('type', 50)->nullable()->change();
            $table->string('title')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->json('meta')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('lead_activities', function (Blueprint $table) {
            $table->foreignId('lead_id')->nullable(false)->change();
            $table->foreignId('user_id')->nullable()->change();
            $table->foreignId('source_id')->nullable()->change();
            $table->string('type', 50)->nullable(false)->change();
            $table->string('title')->nullable(false)->change();
            $table->text('description')->nullable()->change();
            $table->json('meta')->nullable()->change();
        });
    }
};
