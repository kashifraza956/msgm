@extends('layouts.app')

@section('content')
<h1>Your Cart</h1>
@if(empty($cart))
<p>No items.</p>
@else
<table class="table">
    <tr><th>Product</th><th>Qty</th><th>Price</th><th>Total</th><th></th></tr>
    @foreach($cart as $id => $item)
    <tr>
        <td>{{ $item['product']->name }}</td>
        <td>
            <form method="POST" action="{{ route('cart.update', $item['product']) }}" class="d-inline">
                @csrf
                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control d-inline" style="width:80px">
                <button class="btn btn-sm btn-primary">Update</button>
            </form>
        </td>
        <td>PKR {{ $item['product']->price }}</td>
        <td>PKR {{ $item['product']->price * $item['quantity'] }}</td>
        <td>
            <form method="POST" action="{{ route('cart.remove', $item['product']) }}">
                @csrf
                <button class="btn btn-sm btn-danger">Remove</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<a href="{{ route('orders.checkout') }}" class="btn btn-success">Checkout</a>
@endif
@endsection
