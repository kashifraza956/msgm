<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('orders.checkout', compact('cart'));
    }

    public function place(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
        ]);

        $cart = session()->get('cart', []);
        if(empty($cart)) {
            return redirect()->route('home');
        }

        $total = collect($cart)->sum(function($item) {
            return $item['product']->price * $item['quantity'];
        });

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'total_price' => $total,
            'status' => 'pending'
        ]);

        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product']->id,
                'quantity' => $item['quantity'],
                'price' => $item['product']->price,
                'size' => $item['size']
            ]);
        }

        session()->forget('cart');

        // Fake email via log
        Mail::raw('Order '.$order->id.' placed.', function($message) use ($order) {
            $message->to($order->customer_email);
        });

        return redirect()->route('orders.confirmation', $order);
    }

    public function confirmation(Order $order)
    {
        return view('orders.confirmation', compact('order'));
    }
}
