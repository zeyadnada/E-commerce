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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id');
            $table->foreign('cart_id')->references('id')->on('carts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnUpdate()->nullOnDelete();
            $table->integer('item_quantity');
            $table->float('total_item_price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
