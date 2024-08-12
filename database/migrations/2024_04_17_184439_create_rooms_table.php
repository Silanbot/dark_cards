<?php

use App\Models\User;
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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->unsignedInteger('bank');
            $table->tinyInteger('game_type');
            $table->unsignedTinyInteger('max_gamers')->default(2);
            $table->jsonb('deck')->nullable();
            $table->jsonb('ready_state')->nullable();
            $table->jsonb('mode')->nullable();
            $table->jsonb('winners')->nullable();
            $table->string('password', length: 6)->nullable();
            $table->jsonb('beats')->default('[]');
            $table->tinyInteger('opponent_player_index')->nullable();
            $table->tinyInteger('attacker_player_index')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
