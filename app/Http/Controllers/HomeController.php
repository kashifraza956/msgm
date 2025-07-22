<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Will be used to return all the listings
    public function index()
    {
        $categories = Category::all();
        $products = Product::take(8)->get();
        return view('home', compact('categories', 'products'));
    }
}
