<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);
        $cart[$product->id] = [
            'product' => $product,
            'quantity' => ($cart[$product->id]['quantity'] ?? 0) + 1,
            'size' => $request->input('size')
        ];
        session(['cart' => $cart]);
        return redirect()->route('cart.index');
    }

    public function update(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $request->input('quantity', 1);
            session(['cart' => $cart]);
        }
        return redirect()->route('cart.index');
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);
        unset($cart[$product->id]);
        session(['cart' => $cart]);
        return redirect()->route('cart.index');
    }
}
