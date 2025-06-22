@extends('layouts.app')

@section('content')
<h1>Featured Products</h1>
<div class="row">
@foreach($products as $product)
    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p>PKR {{ number_format($product->price,2) }}</p>
                <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-primary">View</a>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
