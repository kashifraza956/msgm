<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Product;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'text' => 'required',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        Feedback::create([
            'product_id' => $product->id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'text' => $request->text,
            'rating' => $request->rating
        ]);

        return back();
    }
}
