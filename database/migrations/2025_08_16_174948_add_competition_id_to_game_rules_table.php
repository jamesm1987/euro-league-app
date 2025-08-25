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
            $table->unsignedBigInteger('competition_id')->nullable()->after('margin');
            $table->foreign('competition_id')
                ->references('id')
                ->on('competitions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('game_rules', function (Blueprint $table) {
            $table->dropForeign(['competition_id']);
            $table->dropColumn('competition_id');
        });
    }
};
