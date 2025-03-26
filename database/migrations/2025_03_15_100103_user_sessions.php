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
        Schema::create('user_sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_session')->nullable();
            $table->foreignId('program_id')->constrained('programs')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('estimated_date')->nullable();
            $table->enum('status', ['pending', 'completed']);
            $table->enum('status_exercise_1', ['pending', 'completed']);
            $table->enum('status_exercise_2', ['pending', 'completed']);
            $table->enum('status_exercise_3', ['pending', 'completed']);
            $table->enum('status_exercise_4', ['pending', 'completed']);
            $table->enum('status_exercise_5', ['pending', 'completed']);
            $table->enum('status_exercise_6', ['pending', 'completed']);
            $table->string('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_sessions');
    }  
};
