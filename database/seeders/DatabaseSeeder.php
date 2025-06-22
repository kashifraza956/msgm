<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);

        User::create([
            'name' => 'Main Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'main'
        ]);
    }
}
