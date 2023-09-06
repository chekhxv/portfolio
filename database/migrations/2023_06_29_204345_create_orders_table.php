<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        
     public function up()
     {
         Schema::create('orders', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('user_id');
             $table->unsignedBigInteger('car_id')->nullable();
             $table->decimal('total_cost', 8, 2);
             $table->string('status')->default('pending');
             $table->timestamps();
     
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
         });
     }
     
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
