@extends('layouts.admin-dashboard')
@section('title', 'Create a New Theme')

@section('content')

@include ('partials/errors')

<h2>Add Theme </h2>
<strong>Make sure the folder exists in the themes directory</strong>

<form action="{{URL::current()}}" method="post">
    <input type="text" name="val[name]" placeholder="Theme name"> <span>No special character even space except Alphanumeric</span><br/>
    <input type="text" name="val[title]" placeholder="Theme Title"/><br/><br/>
    <textarea name="val[description]" placeholder="Theme description"></textarea><br/>
    <label>Select Category</label>
    <select name="val[category_id]">
        @foreach( $categories as $category )

            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select><br/><br/>

    <input type="submit" value="Add">
</form>

@stop