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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('last')->nullable();
            $table->string('email')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('payment_methods')->nullable();
            $table->string('name_cuenta')->nullable();
            $table->string('numero_cuenta')->nullable();
            $table->date('fecha_cuenta')->nullable();
            $table->string('cvc_cuenta')->nullable();
            $table->decimal('discount', 8, 2)->default(0.00);
            $table->decimal('total_amount', 8, 2)->default(0.00);
            $table->timestamps();
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