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
        Schema::create('verses', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->foreignId('chapter_id')->constrained()->cascadeOnDelete()->restrictOnUpdate();
            $table->integer('number_in_chapter');
            $table->unsignedTinyInteger('juz_number');
            $table->foreign('juz_number')->references('number')->on('juzs')->cascadeOnDelete()->restrictOnUpdate();
            $table->integer('page');
            $table->integer('ruku');
            $table->integer('hizb_quarter');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verses');
    }
};
