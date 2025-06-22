@extends('layouts.frontend')

@section('content')
<h1 class="mb-4">Season Products</h1>
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="list-group">
            <a href="{{ route('season.index') }}" class="list-group-item list-group-item-action {{ empty($selected) ? 'active' : '' }}">All</a>
            @foreach($categories as $category)
                <a href="{{ route('season.index', ['category' => $category->id]) }}" class="list-group-item list-group-item-action {{ $selected == $category->id ? 'active' : '' }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
    <div class="col-md-9">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card h-100">
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
        {{ $products->links() }}
    </div>
</div>
@endsection
