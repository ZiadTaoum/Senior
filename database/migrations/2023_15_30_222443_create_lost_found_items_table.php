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
        Schema::create('lost_found_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lost_item_id');
            $table->unsignedBigInteger('found_item_id');
            $table->boolean('email_sent')->default(0);
            $table->boolean('admin_checked')->default(0);
            $table->timestamps();


            $table->foreign('lost_item_id')->references('id')->on('lost_items');      
            $table->foreign('found_item_id')->references('id')->on('found_items');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lost_found_items');
    }
};
