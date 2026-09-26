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
        Schema::create('media_centers', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->date('date')->nullable();

            $table->longText('remark')->nullable();

            $table->string('tag')->nullable();

            $table->foreignId('management_board_id')
                ->nullable()
                ->constrained('management_boards')
                ->nullOnDelete();

            $table->string('cover_image')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_centers');
    }
};
