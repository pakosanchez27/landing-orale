<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriasSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('industrias')->insert([
            [
                'nombre' => 'Hospitalidad y Alimentos',
                'estado' => 1,
                'color' => '#7C3AED',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Médica',
                'estado' => 1,
                'color' => '#0EA5E9',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Educativa',
                'estado' => 1,
                'color' => '#4F46E5',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Inmobiliaria',
                'estado' => 1,
                'color' => '#F59E0B',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Turística',
                'estado' => 1,
                'color' => '#22C55E',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Profesional y Freelancer',
                'estado' => 1,
                'color' => '#C026D3',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
