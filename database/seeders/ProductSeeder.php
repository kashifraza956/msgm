<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::first();
        if(!$category) {
            $category = Category::create(['name' => 'General']);
        }

        Product::create([
            'category_id' => $category->id,
            'name' => 'Sample Product',
            'description' => 'A sample product',
            'price' => 1000,
            'sizes' => json_encode(['Small','Medium','Large','Extra Large'])
        ]);
    }
}
