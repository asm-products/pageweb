@extends('layouts.dashboard')
@section('title', 'Dashbaord')
@section('content')

@include ('partials/errors')

<h3>Pages you manage:</h3>
<div class="gallery-env">
    <div class="row">
@foreach ($pages as $page)
    @if ($user->canManageSite($page['id']))
        *** {{ $page['name'] }} ***
    @else
    <div class="col-sm-4">
            <article class="album">
                <header>
                    <a href="#">
                        <img src="" />
                    </a>
                </header>
                <section class="album-info">
                    <h3><a href="#">{{ $page['name'] }}</a></h3>
                </section>
                <footer>		
                    <div class="album-options">
                        <a class="btn btn-info" style="color:#ffffff;" href="{{ URL::route('sites.create', ['page' => $page['id']]) }}">
                            <i class="entypo-cog">Create From This Page</i>
                        </a>
                    </div>
                </footer>
            </article>
        </div>
    @endif
@endforeach
    </div>
</div>
@stop