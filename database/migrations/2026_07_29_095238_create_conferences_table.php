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
        Schema::create('conferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('explore_vision_id')
                ->constrained('explore_visions')
                ->cascadeOnDelete();

            $table->foreignId('conference_category_id')
                ->constrained('conference_categories')
                ->cascadeOnDelete();

            $table->foreignId('conference_sub_category_id')
                ->nullable()
                ->constrained('conference_sub_categories')
                ->nullOnDelete();

            $table->string('title');

            $table->string('tag')->nullable();

            $table->longText('details')->nullable();

            $table->time('start_time')->nullable();

            $table->time('end_time')->nullable();

            $table->date('date')->nullable();

            $table->string('cover_image')->nullable();

            $table->string('videos_file')->nullable();

            $table->string('videos_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferences');
    }
};
