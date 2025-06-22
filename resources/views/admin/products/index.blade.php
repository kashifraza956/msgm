@extends('admin.layout')

@section('content')
<h1>Products</h1>
<a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary">New</a>
<table class="table mt-2">
@foreach($products as $product)
<tr>
    <td>{{ $product->name }}</td>
    <td>{{ $product->category->name }}</td>
    <td>PKR {{ $product->price }}</td>
    <td>
        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-secondary">Edit</a>
        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection
