@extends('layouts.frontend')

@section('content')
<h1 class="mb-4">Products</h1>
<form method="GET" action="{{ route('products.index') }}" class="mb-4">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search products" value="{{ request('q') }}">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
</form>
<div id="product-list" class="row">
    @include('products._cards', ['products' => $products])
</div>

<div id="pagination-links" class="d-none">
    {{ $products->links() }}
</div>

@if($products->hasMorePages())
    <div class="text-center">
        <button id="load-more" class="btn btn-primary mt-3" data-next-page="{{ $products->currentPage() + 1 }}" data-last-page="{{ $products->lastPage() }}">Load More</button>
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const loadMore = document.getElementById('load-more');
    if (!loadMore) return;

    loadMore.addEventListener('click', function () {
        const nextPage = this.dataset.nextPage;
        const params = new URLSearchParams(window.location.search);
        params.set('page', nextPage);

        axios.get(`${window.location.pathname}?${params.toString()}`, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(res => {
                document.getElementById('product-list').insertAdjacentHTML('beforeend', res.data.html);
                let page = parseInt(loadMore.dataset.nextPage);
                page += 1;
                loadMore.dataset.nextPage = page;
                if (page > parseInt(loadMore.dataset.lastPage)) {
                    loadMore.remove();
                }
            });
    });
});
</script>
@endsection
