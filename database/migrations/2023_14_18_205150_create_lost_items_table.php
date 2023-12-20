<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lost_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('status');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('image_id'); 
            $table->unsignedBigInteger('address_id'); 
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('review_id')->nullable();;
            $table->unsignedBigInteger('reward_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('image_id')->references('id')->on('images');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('review_id')->references('id')->on('reviews');
            $table->foreign('reward_id')->references('id')->on('rewards');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lost_items');
    }
};
