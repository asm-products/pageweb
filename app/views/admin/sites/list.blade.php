@extends('layouts.admin-dashboard')
@section('title', 'Admin Dashboard')

@section('content')
<h2>Created Pages</h2>
<div class="btn-group">
    <a class="btn btn-default" href="{{URL::route('admin.sites')}}?type=all">All</a>
    <a class="btn btn-default" href="{{URL::route('admin.sites')}}?type=published">Published</a>
    <a class="btn btn-default" href="{{URL::route('admin.sites')}}?type=unpublished">Unpublished</a>
</div>
<table class="table-bordered table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>About</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sites as $site)
            <tr>
                <td>{{$site->title}}</td>
                <td>{{$site->email}}</td>
                <td>{{$site->about}}</td>
                <td>
                    @if($site->is_published == 0)
                        <a href="{{URL::route('admin.site.publish', ['site_id' => $site->id])}}">Publish</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
