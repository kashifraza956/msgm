<?php

use App\Mail\OrderPlaced;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

it('sends order confirmation email', function () {
    Mail::fake();

    $category = Category::create(['name' => 'Test Category']);
    $product = Product::create([
        'category_id' => $category->id,
        'name' => 'Test Product',
        'price' => 10,
        'description' => 'desc',
        'sizes' => []
    ]);

    $this->withSession(['cart' => [
        $product->id => [
            'product' => $product,
            'quantity' => 1,
            'size' => null
        ]
    ]]);

    $this->post('/checkout', [
        'customer_name' => 'John Doe',
        'customer_email' => 'john@example.com',
        'address' => '123 Street',
        'city' => 'Town',
        'phone' => '123456'
    ])->assertRedirect();

    Mail::assertSent(OrderPlaced::class);
});
