@extends('layouts.app')

@section('content')
<h1>Order Confirmation</h1>
<p>Thank you for your order #{{ $order->id }}!</p>
<p>Total: PKR {{ $order->total_price }}</p>
@endsection
