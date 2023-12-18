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
        Schema::create('found_item_descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->date('dateFound');
            $table->string('color');
            $table->string('model');
            $table->unsignedBigInteger('found_item_id');
            $table->timestamps();

            $table->foreign('found_item_id')->references('id')->on('found_items');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('found_item_descriptions');
    }
};
