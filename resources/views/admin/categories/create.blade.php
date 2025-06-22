@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">New Category</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <button class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
</div>
@endsection
