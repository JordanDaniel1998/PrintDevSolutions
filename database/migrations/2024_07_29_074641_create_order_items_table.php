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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(0);
            $table->decimal('price_actual', 8, 2)->default(0.00);
            $table->decimal('percentage_discount', 8, 2)->default(0.00);
            $table->decimal('price_discount', 8, 2)->default(0.00);
            $table->decimal('price_sale', 8, 2)->default(0.00);
            $table->string('color')->nullable();
            $table->decimal('igv', 8, 2)->default(0.18);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items_tables');
    }
};
