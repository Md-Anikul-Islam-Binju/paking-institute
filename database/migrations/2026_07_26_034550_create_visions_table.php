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
        Schema::create('visions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('details')->nullable();

            $table->string('cover_image')->nullable();
            $table->string('support_image')->nullable();

            $table->unsignedInteger('staff_creating_change_no')->default(0);
            $table->unsignedInteger('making_an_impact_no')->default(0);
            $table->unsignedInteger('bold_partners_no')->default(0);

            $table->string('video_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visions');
    }
};
