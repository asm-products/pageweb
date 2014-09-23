@extends('layouts.dashboard')
@section('title', 'Dashbaord')
@section('content')

<div class="row">
    <div class="col-sm-3">
        <div class="tile-stats tile-blue">
            <div class="icon"><i class="entypo-facebook"></i></div>
            <div class="num" data-start="0" data-end="{{ $totalFacebookPages }}" data-postfix="" data-duration="600" data-delay="1200">0</div>
            <h3>Facebook Pages</h3>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="tile-stats tile-aqua">
            <div class="icon"><i class="entypo-rss"></i></div>
            <div class="num" data-start="0" data-end="{{ $user->sites->count() }}" data-postfix="" data-duration="600" data-delay="1800">0</div>
            <h3>Website Created</h3>
        </div>
    </div>
</div>
<br />
<h3>Websites</h3>
<div class="gallery-env">
    <div class="row">
        @foreach ($sites as $site)
        <div class="col-sm-4">
            <article class="album">
                <header>
                    <a href="#">
                        <img src="{{ $site->photo }}" />
                    </a>
                </header>
                <section class="album-info">
                    <h3><a href="#">{{ $site->title }}</a></h3>
                </section>
                <footer>		
                    <div class="album-options">
                        <a class="btn btn-success" style="color:#ffffff;" href="{{ URL::route('sites.dashboard', ['site_id' => $site->getId()]) }}">
                            <i class="entypo-gauge">Website Dashboard</i>
                        </a>
                        <a class="btn btn-info" style="color:#ffffff;" href="{{ URL::route('sites.editor', ['site_id' => $site->getId()]) }}">
                            <i class="entypo-cog">Editor</i>
                        </a>
                    </div>
                </footer>
            </article>
        </div>
        @endforeach
    </div>
</div>
@stop
