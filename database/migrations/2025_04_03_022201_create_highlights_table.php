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
        Schema::create('highlights', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->foreignUuid('highlight_group_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('verse_id')->constrained()->cascadeOnDelete();
            $table->text('highlight');
            $table->text('bold');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('highlights');
    }
};
