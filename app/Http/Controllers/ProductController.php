<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($search = $request->get('q')) {
            $query->where('name', 'like', "%{$search}%");
        }

        $products = $query->with('category')->paginate(12)->withQueryString();

        return view('products.index', compact('products'));
    }

    public function season(Request $request)
    {
        $categories = Category::all();
        $selected = $request->get('category');

        $productsQuery = Product::query();
        if ($selected) {
            $productsQuery->where('category_id', $selected);
        }

        $products = $productsQuery->with('category')->paginate(12)->withQueryString();

        return view('products.season', [
            'categories' => $categories,
            'products' => $products,
            'selected' => $selected,
        ]);
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
