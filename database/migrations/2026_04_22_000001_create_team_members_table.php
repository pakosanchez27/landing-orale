<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('role', 120);
            $table->text('description');
            $table->string('image');
            $table->string('image_webp')->nullable();
            $table->string('display_mode', 20)->default('picture');
            $table->unsignedInteger('sort_order')->default(1);
            $table->unsignedTinyInteger('is_active')->default(1);
            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('update_at')->nullable()->useCurrentOnUpdate();
        });

        DB::table('team_members')->insert([
            [
                'name' => 'Maria Ramirez',
                'role' => 'Direccion de estrategia',
                'description' => 'Define objetivos, propuesta de valor y recorrido comercial para que cada web tenga un papel claro dentro del negocio.',
                'image' => 'img/team.jpg',
                'image_webp' => 'img/team.webp',
                'display_mode' => 'picture',
                'sort_order' => 1,
                'is_active' => 1,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
            [
                'name' => 'Carlos Mendez',
                'role' => 'Diseno UI/UX',
                'description' => 'Convierte necesidades comerciales en interfaces pulidas, contemporaneas y con una lectura visual clara.',
                'image' => 'img/nosotros.jpg',
                'image_webp' => 'img/nosotros.jpg.webp',
                'display_mode' => 'picture',
                'sort_order' => 2,
                'is_active' => 1,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
            [
                'name' => 'Andrea Torres',
                'role' => 'Desarrollo web',
                'description' => 'Se encarga de que todo lo disenado cobre vida con rendimiento, limpieza tecnica y buena experiencia en cualquier pantalla.',
                'image' => 'img/nosotros.png',
                'image_webp' => null,
                'display_mode' => 'art',
                'sort_order' => 3,
                'is_active' => 1,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
