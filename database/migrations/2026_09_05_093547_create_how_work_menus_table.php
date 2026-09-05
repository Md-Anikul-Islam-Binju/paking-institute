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
        Schema::create('how_work_menus', function (Blueprint $table) {
            $table->id();
            $table->string('how_we_work_title');
            $table->text('how_we_work_details')->nullable();

            $table->string('insight_title');
            $table->string('insight_logo')->nullable();

            $table->string('partnership_title');
            $table->string('partnership_logo')->nullable();

            $table->string('approach_title');
            $table->string('approach_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('how_work_menus');
    }
};
