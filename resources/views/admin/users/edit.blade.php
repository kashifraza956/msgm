@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">Edit Sub Admin</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="New Password">
                <small class="form-text text-muted">Leave blank to keep current password</small>
            </div>
            <button class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
</div>
@endsection
