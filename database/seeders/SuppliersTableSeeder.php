<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'Electronic Arts',
                'contact_person' => 'Juan Pérez',
                'email' => 'ventas@ea.com',
                'phone' => '+1234567890',
                'address' => 'California, USA',
                'is_active' => true
            ],
            [
                'name' => 'Ubisoft',
                'contact_person' => 'María García',
                'email' => 'contact@ubisoft.com',
                'phone' => '+0987654321',
                'address' => 'Paris, Francia',
                'is_active' => true
            ],
            [
                'name' => 'Activision',
                'contact_person' => 'Carlos López',
                'email' => 'sales@activision.com',
                'phone' => '+1122334455',
                'address' => 'California, USA',
                'is_active' => true
            ]
        ];

        foreach ($suppliers as $supplier) {
            \App\Models\Supplier::firstOrCreate(
                ['email' => $supplier['email']],
                $supplier
            );
        }
    }
}
