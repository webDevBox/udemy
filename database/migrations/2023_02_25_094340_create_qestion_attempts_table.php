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
        Schema::create('qestion_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_attempt_id')->constrained('quiz_attempts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('question_id')->constrained('questions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('question_option_id')->constrained('question_options')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qestion_attempts');
    }
};
