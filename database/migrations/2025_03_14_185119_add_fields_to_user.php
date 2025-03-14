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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->nullable();
            $table->enum('objective', ['gym', 'running', 'both'])->nullable();
            $table->enum('experience', ['begginer', 'intermediate', 'advanced'])->nullable();
            $table->enum('training_frequency', ['2 days per week', '3 days per week', '4 days per week', '5 days per week'])->nullable();
            $table->enum('cycle_duration', ['3 months', '6 months']);
            $table->date('start_date')->nullable();
            $table->date('estimated_end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['surname', 'objective', 'experience', 'training_frequency', 'cycle_duration', 'start_date', 'estimated_end_date']);
        });
 
    }
};
