@extends('admin.layout')

@section('content')
<h1>Categories</h1>
<a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary">New</a>
<table class="table mt-2">
    @foreach($categories as $category)
    <tr>
        <td>{{ $category->name }}</td>
        <td>
            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-secondary">Edit</a>
            <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
