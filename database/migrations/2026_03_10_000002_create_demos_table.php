<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('demos', function (Blueprint $table) {
            $table->id();
            $table->string('imagen');
            $table->string('titulo');
            $table->unsignedBigInteger('id_industria');
            $table->text('descripcion');
            $table->string('link');
            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('update_at')->nullable()->useCurrentOnUpdate();

            $table->foreign('id_industria')->references('id')->on('industrias')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('demos');
    }
};
