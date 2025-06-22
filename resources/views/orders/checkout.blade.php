@extends('layouts.frontend')

@section('content')
<h1 class="mb-4">Checkout</h1>
<form method="POST" action="{{ route('orders.place') }}" class="row g-3">
    @csrf
    <div class="col-md-6">
        <label class="form-label">Name</label>
        <input type="text" name="customer_name" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="customer_email" class="form-control" required>
    </div>
    <div class="col-12">
        <label class="form-label">Address</label>
        <input type="text" name="address" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">City</label>
        <input type="text" name="city" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="col-12 text-end">
        <button class="btn btn-primary">Place Order (COD)</button>
    </div>
</form>
@endsection
