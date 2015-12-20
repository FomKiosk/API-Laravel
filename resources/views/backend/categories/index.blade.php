@extends('layout')
@section('title')
    Title
@endsection
@section('content')
    <h1>Categories</h1>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection