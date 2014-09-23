@extends('layouts.admin-dashboard')
@section('title', 'List of Added Themes')

@section('content')

<div class="btn-group">
    <a class="btn btn-default" href="{{ URL::route('admin.theme.category.create') }}">Add category</a>
<a class="btn btn-default" href="{{ URL::route('admin.theme.create') }}">Add Theme</a>

</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach( $themes as $theme )

            <tr>
                <td>{{ $theme->title }}</td>
                <td>{{ $theme->name }}</td>
                <td>{{ $theme->description }}</td>
                <td>{{ $theme->getCategoryName() }}</td>
                <td>
                    <a href="{{ URL::route('admin.theme.edit', ['id' => $theme->getId()]) }}">Edit</a>
                </td>
            </tr>

        @endforeach
    </tbody>
</table>

{{$themes->links()}}

@stop