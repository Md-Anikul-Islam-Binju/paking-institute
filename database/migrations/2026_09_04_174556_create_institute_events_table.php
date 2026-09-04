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
        Schema::create('institute_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();

            $table->text('remark')->nullable();
            $table->longText('details')->nullable();
            $table->string('image')->nullable();

            $table->string('sub_title')->nullable();
            $table->longText('sub_details')->nullable();
            $table->string('sub_image')->nullable();
            $table->text('sub_remark')->nullable();
            $table->longText('sub_remark_details')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute_events');
    }
};
