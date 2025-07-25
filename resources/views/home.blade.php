@extends('layouts.frontend')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Welcome to MSGM</h1>
        <p class="col-md-8 fs-5">Discover the latest fashion trends.</p>
    </div>
</div>

<h2 class="mb-4">Featured Products</h2>
<div class="row">
@foreach($products as $product)
    <div class="col-md-3 col-sm-6">
        <div class="card mb-4 h-100">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}">
            @else
                <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="{{ $product->name }}">
            @endif
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="mb-1">PKR {{ number_format($product->price,2) }}</p>
                <a href="{{ route('products.show', $product) }}" class="btn btn-outline-primary mt-auto">View</a>
            </div>
        </div>
    </div>
@endforeach
</div>

<h2 class="mt-5 mb-4">Shop by Category</h2>
<div class="row">
@foreach($categories as $category)
    <div class="col-md-3 col-sm-6 mb-3">
        <a class="text-decoration-none" href="{{ route('categories.show', $category) }}">
            <div class="card h-100 text-center p-4">
                <span class="fw-semibold">{{ $category->name }}</span>
            </div>
        </a>
    </div>
@endforeach
</div>
@endsection
