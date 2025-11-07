<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Platform;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener IDs de categorías y plataformas
        $actionCategory = Category::where('slug', 'accion')->first();
        $rpgCategory = Category::where('slug', 'rpg')->first();
        $adventureCategory = Category::where('slug', 'aventura')->first();

        $ps5Platform = Platform::where('slug', 'playstation-5')->first();
        $xboxPlatform = Platform::where('slug', 'xbox-series-x')->first();
        $switchPlatform = Platform::where('slug', 'nintendo-switch')->first();
        $pcPlatform = Platform::where('slug', 'pc')->first();

        $products = [
            [
                'title' => 'The Last of Us Part II',
                'slug' => 'the-last-of-us-part-2',
                'description' => 'Una emocionante aventura de supervivencia en un mundo post-apocalíptico',
                'price' => 59.99,
                'discount_price' => 49.99,
                'developer' => 'Naughty Dog',
                'publisher' => 'Sony Interactive Entertainment',
                'release_date' => '2020-06-19',
                'cover_image' => 'last-of-us-2.jpg',
                'gallery_images' => json_encode(['image1.jpg', 'image2.jpg']),
                'stock' => 25,
                'age_rating' => 18,
                'is_digital' => false,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $actionCategory->id,
                'platform_id' => $ps5Platform->id,
            ],
            [
                'title' => 'Halo Infinite',
                'slug' => 'halo-infinite',
                'description' => 'La última entrega de la legendaria saga de shooters',
                'price' => 69.99,
                'discount_price' => null,
                'developer' => '343 Industries',
                'publisher' => 'Xbox Game Studios',
                'release_date' => '2021-12-08',
                'cover_image' => 'halo-infinite.jpg',
                'gallery_images' => json_encode(['halo1.jpg', 'halo2.jpg']),
                'stock' => 30,
                'age_rating' => 16,
                'is_digital' => true,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $actionCategory->id,
                'platform_id' => $xboxPlatform->id,
            ],
            [
                'title' => 'The Legend of Zelda: Breath of the Wild',
                'slug' => 'zelda-breath-of-the-wild',
                'description' => 'Una épica aventura en el vasto mundo de Hyrule',
                'price' => 59.99,
                'discount_price' => 54.99,
                'developer' => 'Nintendo',
                'publisher' => 'Nintendo',
                'release_date' => '2017-03-03',
                'cover_image' => 'zelda-botw.jpg',
                'gallery_images' => json_encode(['zelda1.jpg', 'zelda2.jpg']),
                'stock' => 15,
                'age_rating' => 12,
                'is_digital' => false,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => $adventureCategory->id,
                'platform_id' => $switchPlatform->id,
            ],
            [
                'title' => 'Cyberpunk 2077',
                'slug' => 'cyberpunk-2077',
                'description' => 'RPG de mundo abierto en un futuro distópico',
                'price' => 49.99,
                'discount_price' => 39.99,
                'developer' => 'CD Projekt Red',
                'publisher' => 'CD Projekt',
                'release_date' => '2020-12-10',
                'cover_image' => 'cyberpunk-2077.jpg',
                'gallery_images' => json_encode(['cyber1.jpg', 'cyber2.jpg']),
                'stock' => 20,
                'age_rating' => 18,
                'is_digital' => true,
                'is_featured' => false,
                'is_active' => true,
                'category_id' => $rpgCategory->id,
                'platform_id' => $pcPlatform->id,
            ],
            [
                'title' => 'FIFA 24',
                'slug' => 'fifa-24',
                'description' => 'El simulador de fútbol más realista',
                'price' => 69.99,
                'discount_price' => null,
                'developer' => 'EA Sports',
                'publisher' => 'Electronic Arts',
                'release_date' => '2023-09-29',
                'cover_image' => 'fifa-24.jpg',
                'gallery_images' => json_encode(['fifa1.jpg', 'fifa2.jpg']),
                'stock' => 40,
                'age_rating' => 3,
                'is_digital' => false,
                'is_featured' => true,
                'is_active' => true,
                'category_id' => Category::where('slug', 'deportes')->first()->id,
                'platform_id' => $ps5Platform->id,
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
