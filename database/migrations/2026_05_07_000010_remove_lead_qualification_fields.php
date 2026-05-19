<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('leads') && Schema::hasColumn('leads', 'qualified_at')) {
            Schema::table('leads', function (Blueprint $table) {
                $table->dropColumn('qualified_at');
            });
        }

        if (Schema::hasTable('lead_bot_sessions')) {
            Schema::table('lead_bot_sessions', function (Blueprint $table) {
                if (Schema::hasColumn('lead_bot_sessions', 'qualification_result')) {
                    $table->dropColumn('qualification_result');
                }

                if (Schema::hasColumn('lead_bot_sessions', 'qualification_score')) {
                    $table->dropColumn('qualification_score');
                }
            });
        }

        if (Schema::hasTable('lead_statuses')) {
            DB::table('lead_statuses')->where('key', 'qualified')->delete();

            $statusOrder = [
                'new' => 10,
                'pending_contact' => 20,
                'contacted' => 30,
                'scheduled' => 40,
                'proposal_sent' => 50,
                'won' => 60,
                'lost' => 70,
            ];

            foreach ($statusOrder as $key => $sortOrder) {
                DB::table('lead_statuses')
                    ->where('key', $key)
                    ->update(['sort_order' => $sortOrder]);
            }
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('leads') && ! Schema::hasColumn('leads', 'qualified_at')) {
            Schema::table('leads', function (Blueprint $table) {
                $table->timestamp('qualified_at')->nullable()->after('next_follow_up_at');
            });
        }

        if (Schema::hasTable('lead_bot_sessions')) {
            Schema::table('lead_bot_sessions', function (Blueprint $table) {
                if (! Schema::hasColumn('lead_bot_sessions', 'qualification_result')) {
                    $table->string('qualification_result')->nullable()->after('session_id');
                }

                if (! Schema::hasColumn('lead_bot_sessions', 'qualification_score')) {
                    $table->unsignedSmallInteger('qualification_score')->nullable()->after('qualification_result');
                }
            });
        }

        if (Schema::hasTable('lead_statuses')) {
            $exists = DB::table('lead_statuses')->where('key', 'qualified')->exists();

            if (! $exists) {
                DB::table('lead_statuses')->insert([
                    'key' => 'qualified',
                    'name' => 'Calificado',
                    'sort_order' => 40,
                    'color' => '#10b981',
                    'is_closed' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $statusOrder = [
                'scheduled' => 50,
                'proposal_sent' => 60,
                'won' => 70,
                'lost' => 80,
            ];

            foreach ($statusOrder as $key => $sortOrder) {
                DB::table('lead_statuses')
                    ->where('key', $key)
                    ->update(['sort_order' => $sortOrder]);
            }
        }
    }
};
