@extends('layouts.admin-dashboard')
@section('title', 'Edit Theme - '.$theme->title)

@section('content')

@include ('partials/errors')

<h2>Edit Theme </h2>

<form action="{{URL::current()}}" method="post">
    <input type="text" name="val[name]" value="{{$theme->name}}" placeholder="Theme name"> <span>No special character even space except Alphanumeric</span><br/>
    <input type="text" name="val[title]" value="{{$theme->title}}" placeholder="Theme Title"/><br/><br/>
    <textarea name="val[description]"  placeholder="Theme description">{{$theme->description}}</textarea><br/>
    <label>Select Category</label>
    <select name="val[category_id]">
        @foreach( $categories as $category )

            <option {{($theme->category_id == $category->id) ? 'selected="selected"': null}} value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select><br/><br/>

    <input type="submit" value="Update Theme">
</form>

@stop