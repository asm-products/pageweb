@extends('layouts.admin-dashboard')
@section('title', 'Theme Categories')

@section('content')


<h3>Theme Categories</h3>

<ul>
    @foreach($categories as $category)

    <li>{{ $category->name }}</li>
    @endforeach
</ul>

{{$categories->links()}}

<a href="{{URL::route('admin.theme')}}">Go Back To Themes</a> | <a href="{{ URL::route('admin.theme.category.create') }}">Add Category</a>

@stop