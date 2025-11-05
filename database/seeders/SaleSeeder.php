<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        $product = Product::first();
        $user = User::first();

        Sale::create([
            'product_id' => $product->id,
            'user_id' => $user->id,
            'quantity' => 2,
            'price' => 1299.99,
            'total' => 2599.98,
            'customer_name' => 'Juan Pérez',
            'customer_email' => 'juan@example.com',
            'sale_date' => now(),
            'status' => 'completed',
        ]);
    }
}
