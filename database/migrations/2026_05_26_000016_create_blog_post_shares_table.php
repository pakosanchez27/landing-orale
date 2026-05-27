<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_post_shares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_post_id')->constrained('blog_posts')->cascadeOnDelete();
            $table->string('network', 50);
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('referrer_url')->nullable();
            $table->timestamp('shared_at')->useCurrent();
            $table->timestamp('create_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_post_shares');
    }
};
