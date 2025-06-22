@extends('layouts.app')

@section('content')
<h1>{{ $product->name }}</h1>
<p>PKR {{ number_format($product->price,2) }}</p>
<p>{{ $product->description }}</p>
<form method="POST" action="{{ route('cart.add', $product) }}">
    @csrf
    <div class="mb-3">
        <label>Size</label>
        <select name="size" class="form-select">
            @foreach($product->sizes ?? [] as $size)
                <option value="{{ $size }}">{{ $size }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Add to Cart</button>
</form>
@endsection
