<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feedback;
use App\Models\Product;
use Faker\Factory as Faker;

class FeedbackSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $products = Product::all();
        if ($products->isEmpty()) {
            return;
        }

        for ($i = 0; $i < 15; $i++) {
            $product = $products->random();
            Feedback::create([
                'product_id'    => $product->id,
                'customer_name' => $faker->name(),
                'customer_email'=> $faker->safeEmail(),
                'text'          => $faker->sentence(),
                'rating'        => $faker->numberBetween(1,5),
            ]);
        }
    }
}
