@extends('admin.layout')

@section('content')
<h1>Edit Product</h1>
<form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
    </div>
    <div class="mb-3">
        <select name="category_id" class="form-select" required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @if($product->category_id==$category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
    </div>
    <div class="mb-3">
        <textarea name="description" class="form-control">{{ $product->description }}</textarea>
    </div>
    <div class="mb-3">
        <label>Sizes</label>
        <select name="sizes[]" class="form-select" multiple>
            @foreach(['Small','Medium','Large','Extra Large'] as $size)
            <option value="{{ $size }}" @if(in_array($size,$product->sizes??[])) selected @endif>{{ $size }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <input type="file" name="image" class="form-control">
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
