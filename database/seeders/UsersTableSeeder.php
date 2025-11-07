<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@tienda.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Juan Pérez',
                'email' => 'juan@cliente.com',
                'password' => Hash::make('cliente123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'María García',
                'email' => 'maria@cliente.com',
                'password' => Hash::make('cliente123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Carlos López',
                'email' => 'carlos@cliente.com',
                'password' => Hash::make('cliente123'),
                'email_verified_at' => now(),
            ]
        ];

        foreach ($users as $user) {
            \App\Models\User::firstOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}
