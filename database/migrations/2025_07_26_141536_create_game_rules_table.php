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
        Schema::create('game_rules', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->enum('context', ['result_points', 'score_points', 'goalscorer_points', 'trophy_points']);
            $table->string('description')->nullable();
            $table->integer('margin')->nullable();
            $table->integer('points');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_rules');
    }
};
