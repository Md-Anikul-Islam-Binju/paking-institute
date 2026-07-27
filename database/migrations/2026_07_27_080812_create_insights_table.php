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
        Schema::create('insights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('insight_types')->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->date('date')->nullable();
            $table->longText('remark')->nullable();
            $table->string('tag')->nullable();
            $table->json('multiple_management_board_id')->nullable();
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insights');
    }
};
