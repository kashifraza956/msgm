@extends('admin.layout')

@section('content')
<h1>New Product</h1>
<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <input type="text" name="name" class="form-control" placeholder="Name" required>
    </div>
    <div class="mb-3">
        <select name="category_id" class="form-select" required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <input type="number" name="price" class="form-control" placeholder="Price" required>
    </div>
    <div class="mb-3">
        <textarea name="description" class="form-control" placeholder="Description"></textarea>
    </div>
    <div class="mb-3">
        <label>Sizes</label>
        <select name="sizes[]" class="form-select" multiple>
            <option value="Small">Small</option>
            <option value="Medium">Medium</option>
            <option value="Large">Large</option>
            <option value="Extra Large">Extra Large</option>
        </select>
    </div>
    <div class="mb-3">
        <input type="file" name="image" class="form-control">
    </div>
    <button class="btn btn-primary">Save</button>
</form>
@endsection
