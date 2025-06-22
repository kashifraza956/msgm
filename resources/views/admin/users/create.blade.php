@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">New Sub Admin</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
</div>
@endsection
