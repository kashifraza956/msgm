@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">Edit Product</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="form-group mt-3">
                <select name="category_id" class="form-control" required>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($product->category_id==$category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
            </div>
            <div class="form-group mt-3">
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="form-group mt-3">
                <label>Sizes</label>
                <select name="sizes[]" class="form-control" multiple>
                    @foreach(['Small','Medium','Large','Extra Large'] as $size)
                    <option value="{{ $size }}" @if(in_array($size,$product->sizes??[])) selected @endif>{{ $size }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <input type="file" name="image" class="form-control">
            </div>
            <button class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
</div>
@endsection
