@extends('admin.layout')

@section('content')
<h1>Dashboard</h1>
<ul>
    <li>Total Orders: {{ $orders }}</li>
    <li>Total Products: {{ $products }}</li>
    <li>Total Feedback: {{ $feedback }}</li>
</ul>
@endsection
