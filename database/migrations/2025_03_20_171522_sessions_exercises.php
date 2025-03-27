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
        Schema::create('session_exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_session_id')->constrained('user_sessions')->onDelete('cascade');
            $table->foreignId('exercise_id')->constrained('exercises')->onDelete('cascade');
            $table->unique(['user_session_id', 'exercise_id']);
            $table->integer('lifted_weight')->nullable();
            $table->enum('status', ['pending', 'completed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions_exercises');
    }
};
