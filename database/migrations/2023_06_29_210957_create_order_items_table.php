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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('item_type'); // Это будет содержать имя модели (например, 'App\Models\Product')
            $table->unsignedBigInteger('item_id'); // Это будет содержать ID продукта или услуги
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->timestamps();
    
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
