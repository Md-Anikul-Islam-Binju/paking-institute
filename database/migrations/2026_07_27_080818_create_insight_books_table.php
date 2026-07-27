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
        Schema::create('insight_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('insight_id')->constrained()->cascadeOnDelete();
            $table->integer('chapter_no')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insight_books');
    }
};
