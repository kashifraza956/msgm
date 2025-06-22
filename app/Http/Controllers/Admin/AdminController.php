<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $orders = Order::count();
        $products = Product::count();
        $feedback = Feedback::count();
        return view('admin.dashboard', compact('orders', 'products', 'feedback'));
    }
}
