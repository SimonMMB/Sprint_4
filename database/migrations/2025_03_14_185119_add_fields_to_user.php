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
            $table->integer('training_frequency')->nullable();
            $table->integer('training_duration')->nullable();
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
            $table->dropColumn(['surname', 'training_frequency', 'training_duration', 'start_date', 'estimated_end_date']);
        });
 
    }
};
