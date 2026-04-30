<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lead_sources', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        DB::table('lead_sources')->insert([
            [
                'key' => 'landing',
                'name' => 'Landing Page',
                'description' => 'Lead capturado desde el formulario del sitio web.',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'bot',
                'name' => 'Bot n8n',
                'description' => 'Lead capturado o enriquecido desde el bot conectado con n8n.',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'manual',
                'name' => 'Manual',
                'description' => 'Lead creado manualmente por un miembro del equipo.',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('lead_sources');
    }
};
