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
        Schema::create('key_benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('involved_id')
                ->constrained('involveds')
                ->cascadeOnDelete();

            $table->string('title');

            $table->string('image')->nullable();

            $table->string('videos')->nullable();

            $table->longText('details')->nullable();
            $table->json('multiple_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('key_benefits');
    }
};
