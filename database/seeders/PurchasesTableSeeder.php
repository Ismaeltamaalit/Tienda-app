<?php

namespace Database\Seeders;

use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{
    public function run(): void
    {
        $adminUser = User::where('email', 'admin@tienda.com')->first();
        $supplier = Supplier::first();
        $products = Product::all();

        // Crear compra 1
        $purchase1 = Purchase::create([
            'purchase_number' => 'PUR-' . date('Ymd') . '-001',
            'supplier_id' => $supplier->id,
            'user_id' => $adminUser->id,
            'total_amount' => 0, // Se calculará con los items
            'status' => 'received',
            'purchase_date' => now()->subDays(10),
            'notes' => 'Compra inicial de inventario'
        ]);

        // Items para compra 1
        $purchaseItems1 = [
            [
                'product_id' => $products[0]->id,
                'quantity' => 10,
                'unit_cost' => 35.00,
                'subtotal' => 350.00
            ],
            [
                'product_id' => $products[1]->id,
                'quantity' => 15,
                'unit_cost' => 40.00,
                'subtotal' => 600.00
            ]
        ];

        foreach ($purchaseItems1 as $item) {
            PurchaseItem::create(array_merge($item, ['purchase_id' => $purchase1->id]));
        }

        // Actualizar total de la compra
        $purchase1->update([
            'total_amount' => collect($purchaseItems1)->sum('subtotal')
        ]);

        // Crear compra 2
        $purchase2 = Purchase::create([
            'purchase_number' => 'PUR-' . date('Ymd') . '-002',
            'supplier_id' => $supplier->id,
            'user_id' => $adminUser->id,
            'total_amount' => 0,
            'status' => 'pending',
            'purchase_date' => now()->subDays(2),
            'notes' => 'Reposición de stock'
        ]);

        $purchaseItems2 = [
            [
                'product_id' => $products[2]->id,
                'quantity' => 8,
                'unit_cost' => 30.00,
                'subtotal' => 240.00
            ],
            [
                'product_id' => $products[3]->id,
                'quantity' => 12,
                'unit_cost' => 25.00,
                'subtotal' => 300.00
            ]
        ];

        foreach ($purchaseItems2 as $item) {
            PurchaseItem::create(array_merge($item, ['purchase_id' => $purchase2->id]));
        }

        $purchase2->update([
            'total_amount' => collect($purchaseItems2)->sum('subtotal')
        ]);
    }
}
