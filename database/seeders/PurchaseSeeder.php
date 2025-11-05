<?php

namespace Database\Seeders;

use App\Models\Purchase;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    public function run(): void
    {
        $product = Product::first();
        $user = User::first();

        Purchase::create([
            'product_id' => $product->id,
            'user_id' => $user->id,
            'quantity' => 5,
            'price' => 1200.00,
            'total' => 6000.00,
            'supplier' => 'Dell Inc.',
            'purchase_date' => now(),
        ]);
    }
}
