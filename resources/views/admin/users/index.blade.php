@extends('admin.layout')

@section('content')
<h1 class="mb-3">User Management</h1>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Example User</td>
            <td>user@example.com</td>
            <td>main</td>
        </tr>
    </tbody>
</table>
@endsection
