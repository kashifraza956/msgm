<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $categories = Category::all();
        if ($categories->isEmpty()) {
            $categories = collect([Category::create(['name' => 'General'])]);
        }

        for ($i = 1; $i <= 60; $i++) {
            $imagePath = "products/product_{$i}.png";
            if (!Storage::disk('public')->exists($imagePath)) {
                $data = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/wcAAgMBAp6e6wAAAABJRU5ErkJggg==');
                Storage::disk('public')->put($imagePath, $data);
            }

            Product::create([
                'category_id' => $categories->random()->id,
                'name' => $faker->words(3, true),
                'description' => $faker->sentence(),
                'price' => $faker->randomFloat(2, 5, 100),
                'image' => $imagePath,
                'sizes' => ['Small', 'Medium', 'Large', 'Extra Large'],
            ]);
        }
    }
}
