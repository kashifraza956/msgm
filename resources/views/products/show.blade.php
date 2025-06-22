@extends('layouts.frontend')

@section('content')
<div class="row">
    <div class="col-md-6">
        @if($product->image)
            <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
        @else
            <img src="https://via.placeholder.com/600x600" class="img-fluid rounded" alt="{{ $product->name }}">
        @endif
    </div>
    <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p class="fs-4">PKR {{ number_format($product->price,2) }}</p>
        <p>{{ $product->description }}</p>
        <form method="POST" action="{{ route('cart.add', $product) }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Size</label>
                <select name="size" class="form-select">
                    @foreach($product->sizes ?? ['Small','Medium','Large','Extra Large'] as $size)
                        <option value="{{ $size }}">{{ $size }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary">Add to Cart</button>
        </form>
    </div>
</div>

<hr class="my-5">

<h3 class="mb-3">Leave a Review</h3>
<form method="POST" action="{{ route('feedback.store', $product) }}" class="row g-3">
    @csrf
    <div class="col-md-6">
        <input type="text" name="customer_name" class="form-control" placeholder="Your name" required>
    </div>
    <div class="col-md-6">
        <input type="email" name="customer_email" class="form-control" placeholder="Email" required>
    </div>
    <div class="col-12">
        <textarea name="text" class="form-control" rows="3" placeholder="Feedback" required></textarea>
    </div>
    <div class="col-md-4">
        <select name="rating" class="form-select" required>
            <option value="">Rating</option>
            @for($i=1; $i<=5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
    <div class="col-12">
        <button class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection
