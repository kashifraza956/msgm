@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">Edit Category</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.categories.update', $category) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <button class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
</div>
@endsection
