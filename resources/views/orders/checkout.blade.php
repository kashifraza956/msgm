@extends('layouts.app')

@section('content')
<h1>Checkout</h1>
<form method="POST" action="{{ route('orders.place') }}">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="customer_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="customer_email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Address</label>
        <input type="text" name="address" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>City</label>
        <input type="text" name="city" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" required>
    </div>
    <button class="btn btn-primary">Place Order (COD)</button>
</form>
@endsection
