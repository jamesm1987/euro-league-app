<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('game_rules', function (Blueprint $table) {
            $table->string('evaluator')->after('context');
            $table->json('conditions')->nullable()->after('margin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('game_rules', function (Blueprint $table) {
            $table->dropColumn(['evaluator', 'conditions']);
        });
    }
};
