<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    public function run(): void
    {
        $cliente1 = User::where('email', 'juan@cliente.com')->first();
        $cliente2 = User::where('email', 'maria@cliente.com')->first();
        $cliente3 = User::where('email', 'carlos@cliente.com')->first();
        $products = Product::all();

        $reviews = [
            // Reseñas para The Last of Us Part II
            [
                'user_id' => $cliente1->id,
                'product_id' => $products[0]->id,
                'rating' => 5,
                'comment' => 'Increíble historia y gráficos espectaculares. Una obra maestra.',
                'is_approved' => true
            ],
            [
                'user_id' => $cliente2->id,
                'product_id' => $products[0]->id,
                'rating' => 4,
                'comment' => 'Muy bueno, pero un poco largo para mi gusto.',
                'is_approved' => true
            ],

            // Reseñas para Halo Infinite
            [
                'user_id' => $cliente3->id,
                'product_id' => $products[1]->id,
                'rating' => 5,
                'comment' => 'El mejor Halo en años. Multijugador adictivo.',
                'is_approved' => true
            ],

            // Reseñas para Zelda
            [
                'user_id' => $cliente1->id,
                'product_id' => $products[2]->id,
                'rating' => 5,
                'comment' => 'Simplemente perfecto. Horas y horas de diversión.',
                'is_approved' => true
            ],
            [
                'user_id' => $cliente2->id,
                'product_id' => $products[2]->id,
                'rating' => 5,
                'comment' => 'Un mundo abierto increíble. Nintendo en su mejor momento.',
                'is_approved' => true
            ],

            // Reseñas para Cyberpunk 2077
            [
                'user_id' => $cliente3->id,
                'product_id' => $products[3]->id,
                'rating' => 3,
                'comment' => 'Mejoró mucho con los parches, pero aún tiene bugs.',
                'is_approved' => true
            ],

            // Reseñas para FIFA 24
            [
                'user_id' => $cliente1->id,
                'product_id' => $products[4]->id,
                'rating' => 4,
                'comment' => 'Buenas mejoras respecto a la versión anterior.',
                'is_approved' => false // Pendiente de aprobación
            ]
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
