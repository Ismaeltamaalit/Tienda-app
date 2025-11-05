<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');                    // Nombre del producto
            $table->text('description')->nullable();   // Descripción (opcional)
            $table->decimal('price', 10, 2);          // Precio (10 dígitos, 2 decimales)
            $table->integer('stock')->default(0);     // Stock disponible
            $table->string('sku')->unique();          // Código único del producto
            $table->string('image')->nullable();      // Ruta de la imagen
            $table->boolean('active')->default(true); // Producto activo o no
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
