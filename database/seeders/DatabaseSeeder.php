<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@nirmala.com'],
            [
                'name' => 'Admin Nirmala',
                'role' => 'admin',
                'password' => 'admin123',
            ]
        );

        User::updateOrCreate(
            ['email' => 'pelanggan@example.com'],
            [
                'name' => 'Budi Santoso',
                'role' => 'customer',
                'password' => 'password123',
            ]
        );
    }
}
