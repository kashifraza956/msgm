@extends('layouts.frontend')

@section('content')
<div class="text-center py-5">
    <h1 class="mb-3">Order Confirmation</h1>
    <p>Thank you for your order #{{ $order->id }}!</p>
    <p class="fw-semibold">Total: PKR {{ $order->total_price }}</p>
</div>
@endsection
