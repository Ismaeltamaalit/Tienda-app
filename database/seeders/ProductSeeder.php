<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Laptop Dell XPS 15',
            'description' => 'Laptop de alta gama con procesador Intel i7',
            'price' => 1299.99,
            'stock' => 10,
            'sku' => 'DELL-XPS15-001',
            'active' => true
        ]);

        Product::create([
            'name' => 'Mouse Logitech MX Master 3',
            'description' => 'Mouse ergonómico inalámbrico',
            'price' => 99.99,
            'stock' => 50,
            'sku' => 'LOG-MXM3-001',
            'active' => true
        ]);

        Product::firstOrCreate(
            ['sku' => 'DELL-XPS15-001'],
            [
                'name' => 'Laptop Dell XPS 15',
                'description' => 'Laptop de alta gama con procesador Intel i7',
                'price' => 1299.99,
                'stock' => 10,
                'active' => true
            ]
        );
    }
}
