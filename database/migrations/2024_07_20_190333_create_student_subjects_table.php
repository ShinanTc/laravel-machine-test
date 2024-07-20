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
        Schema::create('student_subjects', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key named 'id'
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('subject_id');
            $table->integer('marks')->nullable(); // Allow null values for marks

            // Define foreign keys
            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_subjects');
    }
};
