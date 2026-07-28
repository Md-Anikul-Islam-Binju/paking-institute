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
        Schema::create('how_works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('details')->nullable();

            $table->longText('strategy_details')->nullable();
            $table->string('strategy_logo')->nullable();

            $table->longText('policy_details')->nullable();
            $table->string('policy_logo')->nullable();

            $table->longText('delivery_details')->nullable();
            $table->string('delivery_logo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('how_works');
    }
};
