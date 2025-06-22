@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">New Product</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="form-group mt-3">
                <select name="category_id" class="form-control" required>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <input type="number" name="price" class="form-control" placeholder="Price" required>
            </div>
            <div class="form-group mt-3">
                <textarea name="description" class="form-control" placeholder="Description"></textarea>
            </div>
            <div class="form-group mt-3">
                <label>Sizes</label>
                <select name="sizes[]" class="form-control" multiple>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                    <option value="Extra Large">Extra Large</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <input type="file" name="image" class="form-control">
            </div>
            <button class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
</div>
@endsection
