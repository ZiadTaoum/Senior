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
        Schema::create('lost_item_descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->date('date_lost');
            $table->string('color');
            $table->string('model');
            $table->unsignedBigInteger('lost_item_id');
            $table->timestamps();

            $table->foreign('lost_item_id')->references('id')->on('lost_items');        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lost_item_descriptions');
    }
};
