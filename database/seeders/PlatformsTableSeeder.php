<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;

class PlatformsTableSeeder extends Seeder
{
    public function run(): void
    {
        $platforms = [
            [
                'name' => 'PlayStation 5',
                'slug' => 'playstation-5',
                'icon' => 'ps5.png'
            ],
            [
                'name' => 'Xbox Series X',
                'slug' => 'xbox-series-x',
                'icon' => 'xbox.png'
            ],
            [
                'name' => 'Nintendo Switch',
                'slug' => 'nintendo-switch',
                'icon' => 'switch.png'
            ],
            [
                'name' => 'PC',
                'slug' => 'pc',
                'icon' => 'pc.png'
            ],
            [
                'name' => 'Mobile',
                'slug' => 'mobile',
                'icon' => 'mobile.png'
            ]
        ];

        foreach ($platforms as $platform) {
            \App\Models\Platform::firstOrCreate(
                ['slug' => $platform['slug']],
                $platform
            );
        }
    }
}
