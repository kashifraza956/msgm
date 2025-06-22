@extends('admin.layout')

@section('content')
<h1>Orders</h1>
<table class="table">
<tr><th>ID</th><th>Customer</th><th>Status</th><th>Total</th><th>Update</th></tr>
@foreach($orders as $order)
<tr>
    <td>{{ $order->id }}</td>
    <td>{{ $order->customer_name }}</td>
    <td>{{ $order->status }}</td>
    <td>{{ $order->total_price }}</td>
    <td>
        <form method="POST" action="{{ route('admin.orders.update', $order) }}" class="d-inline">
            @csrf
            @method('PUT')
            <select name="status" class="form-select d-inline w-auto">
                <option {{ $order->status=='pending'?'selected':'' }} value="pending">pending</option>
                <option {{ $order->status=='shipped'?'selected':'' }} value="shipped">shipped</option>
                <option {{ $order->status=='completed'?'selected':'' }} value="completed">completed</option>
            </select>
            <button class="btn btn-sm btn-primary">Update</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection
