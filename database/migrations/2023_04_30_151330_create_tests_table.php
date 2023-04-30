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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            
            // Информация о ученике
            $table->string('fio');
            $table->string('group');

            // Результаты тестирования
            $table->string('question1');
            $table->boolean('is1Correctly');

            $table->string('question2');
            $table->boolean('is2Correctly');
            
            $table->string('question3');
            $table->boolean('is3Correctly');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
