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
        Schema::create('management_boards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('expert_category_id')->nullable();
            $table->string('slug')->unique();
            $table->string('designation');
            $table->longText('details')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('management_boards');
    }
};
