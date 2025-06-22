@extends('admin.layout')

@section('content')
<h1 class="mb-3">Orders</h1>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Total</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
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
                    <select name="status" class="form-control d-inline w-auto">
                        <option {{ $order->status=='pending'?'selected':'' }} value="pending">pending</option>
                        <option {{ $order->status=='shipped'?'selected':'' }} value="shipped">shipped</option>
                        <option {{ $order->status=='completed'?'selected':'' }} value="completed">completed</option>
                    </select>
                    <button class="btn btn-sm btn-primary ml-1">Update</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $orders->links() }}
@endsection
