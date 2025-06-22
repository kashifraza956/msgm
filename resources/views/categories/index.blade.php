@extends('layouts.frontend')

@section('content')
<h1 class="mb-4">Categories</h1>
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
