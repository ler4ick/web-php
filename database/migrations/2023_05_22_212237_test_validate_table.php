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
        Schema::create('test_answer', function (Blueprint $table) {
            $table->id();
            $table->string('FIO');
            $table->string('group');
            $table->string('answer1');
            $table->string('answer2');
            $table->string('answer3');
            $table->integer('isCorrect');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
