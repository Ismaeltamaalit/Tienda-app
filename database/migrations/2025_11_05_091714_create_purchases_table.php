<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id') // Qué producto se compró
            ->constrained()
                ->onDelete('cascade');
            $table->foreignId('user_id') // Quién lo compró
            ->constrained()
                ->onDelete('cascade');
            $table->integer('quantity'); // Cantidad comprada
            $table->decimal('price', 10, 2); // Precio al momento de la compra
            $table->decimal('total', 10, 2); // Total = quantity * price
            $table->string('supplier')->nullable(); // Proveedor
            $table->date('purchase_date'); // Fecha de compra
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
