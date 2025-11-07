<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Acción',
                'slug' => 'accion',
                'description' => 'Juegos de acción y aventura',
                'is_active' => true
            ],
            [
                'name' => 'Aventura',
                'slug' => 'aventura',
                'description' => 'Juegos de exploración y narrativa',
                'is_active' => true
            ],
            [
                'name' => 'RPG',
                'slug' => 'rpg',
                'description' => 'Juegos de rol',
                'is_active' => true
            ],
            [
                'name' => 'Deportes',
                'slug' => 'deportes',
                'description' => 'Juegos deportivos',
                'is_active' => true
            ],
            [
                'name' => 'Estrategia',
                'slug' => 'estrategia',
                'description' => 'Juegos de estrategia y táctica',
                'is_active' => true
            ]
        ];

        foreach ($categories as $category) {
            \App\Models\Category::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
