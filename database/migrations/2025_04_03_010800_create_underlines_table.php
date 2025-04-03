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
        Schema::create('underlines', function (Blueprint $table) {
            $table->id();
            $table->uuid('group_id');
            $table->foreignId('verse_id')->constrained()->cascadeOnDelete();
            $table->text('underline');
            $table->text('bold');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('underlines');
    }
};
