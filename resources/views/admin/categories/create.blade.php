@extends('admin.layout')

@section('content')
<h1>New Category</h1>
<form method="POST" action="{{ route('admin.categories.store') }}">
    @csrf
    <div class="mb-3">
        <input type="text" name="name" class="form-control" placeholder="Name" required>
    </div>
    <button class="btn btn-primary">Save</button>
</form>
@endsection
