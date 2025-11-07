<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    public function run(): void
    {
        $clienteUser = User::where('email', 'juan@cliente.com')->first();
        $products = Product::all();

        // Crear venta 1
        $sale1 = Sale::create([
            'order_number' => 'ORD-' . date('Ymd') . '-001',
            'user_id' => $clienteUser->id,
            'total_amount' => 0, // Se calculará con los items
            'status' => 'completed',
            'payment_method' => 'credit_card',
            'payment_status' => 'paid',
            'shipping_address' => 'Calle Principal 123, Madrid, España',
            'notes' => 'Cliente habitual'
        ]);

        // Items para venta 1
        $saleItems1 = [
            [
                'product_id' => $products[0]->id,
                'quantity' => 1,
                'unit_price' => $products[0]->price,
                'subtotal' => $products[0]->price
            ],
            [
                'product_id' => $products[1]->id,
                'quantity' => 1,
                'unit_price' => $products[1]->price,
                'subtotal' => $products[1]->price
            ]
        ];

        foreach ($saleItems1 as $item) {
            SaleItem::create(array_merge($item, ['sale_id' => $sale1->id]));
        }

        // Actualizar total de la venta
        $sale1->update([
            'total_amount' => collect($saleItems1)->sum('subtotal')
        ]);

        // Crear venta 2
        $sale2 = Sale::create([
            'order_number' => 'ORD-' . date('Ymd') . '-002',
            'user_id' => $clienteUser->id,
            'total_amount' => 0,
            'status' => 'processing',
            'payment_method' => 'paypal',
            'payment_status' => 'pending',
            'shipping_address' => 'Avenida Central 456, Barcelona, España',
            'notes' => 'Regalo de cumpleaños'
        ]);

        $saleItems2 = [
            [
                'product_id' => $products[2]->id,
                'quantity' => 2,
                'unit_price' => $products[2]->price,
                'subtotal' => $products[2]->price * 2
            ]
        ];

        foreach ($saleItems2 as $item) {
            SaleItem::create(array_merge($item, ['sale_id' => $sale2->id]));
        }

        $sale2->update([
            'total_amount' => collect($saleItems2)->sum('subtotal')
        ]);

        // Crear venta 3 (de otro cliente)
        $sale3 = Sale::create([
            'order_number' => 'ORD-' . date('Ymd') . '-003',
            'user_id' => User::where('email', 'maria@cliente.com')->first()->id,
            'total_amount' => 0,
            'status' => 'completed',
            'payment_method' => 'debit_card',
            'payment_status' => 'paid',
            'shipping_address' => 'Plaza Mayor 789, Valencia, España',
            'notes' => 'Entrega rápida por favor'
        ]);

        $saleItems3 = [
            [
                'product_id' => $products[4]->id,
                'quantity' => 1,
                'unit_price' => $products[4]->price,
                'subtotal' => $products[4]->price
            ],
            [
                'product_id' => $products[3]->id,
                'quantity' => 1,
                'unit_price' => $products[3]->price,
                'subtotal' => $products[3]->price
            ]
        ];

        foreach ($saleItems3 as $item) {
            SaleItem::create(array_merge($item, ['sale_id' => $sale3->id]));
        }

        $sale3->update([
            'total_amount' => collect($saleItems3)->sum('subtotal')
        ]);
    }
}
