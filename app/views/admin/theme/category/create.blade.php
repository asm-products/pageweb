@extends('layouts.admin-dashboard')
@section('title', 'Create Theme Category')

@section('content')


<h3>Create Theme Category</h3>
@if(!empty($messages))
<div class="alert alert-danger">{{ $messages->first() }}</div>
@endif
<form action="{{ URL::current() }}" method="post">
    <label for="name">Category Name:</label>
    <input type="text" name="name" placeholder="Category Name"/><br/><br/>
    <input type="submit" value="Add Category">
</form>
@stop