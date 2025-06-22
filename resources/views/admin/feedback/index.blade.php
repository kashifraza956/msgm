@extends('admin.layout')

@section('content')
<h1>Feedback</h1>
<table class="table">
<tr><th>Product</th><th>Name</th><th>Email</th><th>Rating</th><th>Text</th></tr>
@foreach($feedback as $fb)
<tr>
    <td>{{ $fb->product->name }}</td>
    <td>{{ $fb->customer_name }}</td>
    <td>{{ $fb->customer_email }}</td>
    <td>{{ $fb->rating }}</td>
    <td>{{ $fb->text }}</td>
</tr>
@endforeach
</table>
@endsection
