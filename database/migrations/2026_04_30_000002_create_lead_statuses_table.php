<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lead_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('name');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->string('color', 20)->nullable();
            $table->boolean('is_closed')->default(false);
            $table->timestamps();
        });

        DB::table('lead_statuses')->insert([
            ['key' => 'new', 'name' => 'Nuevo lead', 'sort_order' => 10, 'color' => '#2e8fff', 'is_closed' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'pending_contact', 'name' => 'Contacto pendiente', 'sort_order' => 20, 'color' => '#f59e0b', 'is_closed' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contacted', 'name' => 'Contactado', 'sort_order' => 30, 'color' => '#8b5cf6', 'is_closed' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'qualified', 'name' => 'Calificado', 'sort_order' => 40, 'color' => '#10b981', 'is_closed' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'scheduled', 'name' => 'Llamada agendada', 'sort_order' => 50, 'color' => '#06b6d4', 'is_closed' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'proposal_sent', 'name' => 'Propuesta enviada', 'sort_order' => 60, 'color' => '#6366f1', 'is_closed' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'won', 'name' => 'Cerrado ganado', 'sort_order' => 70, 'color' => '#16a34a', 'is_closed' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'lost', 'name' => 'Cerrado perdido', 'sort_order' => 80, 'color' => '#ef4444', 'is_closed' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('lead_statuses');
    }
};
