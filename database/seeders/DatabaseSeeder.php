<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategoriesTableSeeder::class,
            PlatformsTableSeeder::class,
            SuppliersTableSeeder::class,
            UsersTableSeeder::class,
            ProductsTableSeeder::class,
            PurchasesTableSeeder::class,
            SalesTableSeeder::class,
            ReviewsTableSeeder::class,
        ]);
    }
}
