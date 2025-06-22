<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            ['name' => 'Shirts'],
            ['name' => 'Pants'],
            ['name' => 'Accessories'],
            ['name' => 'Shoes'],
            ['name' => 'Hats'],
            ['name' => 'Outerwear'],
            ['name' => 'Underwear'],
            ['name' => 'Socks'],
            ['name' => 'Bags'],
            ['name' => 'Belts'],
            ['name' => 'Jewelry'],
        ]);
    }
}
