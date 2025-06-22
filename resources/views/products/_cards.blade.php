@foreach($products as $product)
    <div class="col-md-3 col-sm-6 mb-4">
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
