<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')    // Qué producto se vendió
            ->constrained()
                ->onDelete('cascade');
            $table->foreignId('user_id')    // Quién realizó la venta
            ->constrained()
                ->onDelete('cascade');
            $table->integer('quantity');    // Cantidad vendida
            $table->decimal('price', 10, 2);    // Precio de venta
            $table->decimal('total', 10, 2);    // Total = quantity * price
            $table->string('customer_name');    // Nombre del cliente
            $table->string('customer_email')->nullable();    // Email del cliente
            $table->date('sale_date');    // Fecha de venta
            $table->enum('status', ['pending', 'completed', 'cancelled'])
                ->default('pending');    // Estado de la venta
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
