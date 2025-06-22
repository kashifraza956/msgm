<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $products = Product::all();
        if ($products->isEmpty()) {
            return;
        }

        for ($i = 0; $i < 25; $i++) {
            $order = Order::create([
                'customer_name'  => $faker->name(),
                'customer_email' => $faker->safeEmail(),
                'address'        => $faker->streetAddress(),
                'city'           => $faker->city(),
                'phone'          => $faker->phoneNumber(),
                'total_price'    => 0,
                'status'         => $faker->randomElement(['pending','shipped','completed'])
            ]);

            $itemsCount = rand(1,3);
            $total = 0;
            for ($j = 0; $j < $itemsCount; $j++) {
                $product = $products->random();
                $quantity = rand(1,3);
                $price = $product->price;
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'quantity'   => $quantity,
                    'price'      => $price,
                    'size'       => $product->sizes[array_rand($product->sizes)] ?? null,
                ]);
                $total += $price * $quantity;
            }
            $order->update(['total_price' => $total]);
        }
    }
}
