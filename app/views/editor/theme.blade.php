@extends('layouts.main')
@section('title', 'Manage Site')
@section('styles')
<link rel="stylesheet" href="{{ URL::asset('asset/css/flexslider.css') }}">
<link rel="stylesheet" href="{{ URL::asset('asset/css/prettyPhoto.css') }}">
@stop
@section('content')

<section id="header-space"></section>
<section id="headline">
    <div class="container  text-center">
        <h3>Select a Design</h3>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="col-md-3">
            <h3>Categories</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ URL::current() }}?source=api&preview=true ">All</a></li>
                @foreach( $themeCategories as $category)
                <li class="list-group-item"><a href="{{ URL::current() }}?source=api&preview=true&category={{$category->id}}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-9">
            <div class="theme-results">
                <div id="results-group">
                    @foreach($themes as $theme)
                    <div class="result">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="theme-img-wrapper">
                                    <div class="browser-bar">
                                        <span class="browser-btn fst" />
                                        <span class="browser-btn snd" />
                                        <span class="browser-btn trd" />
                                    </div>
                                    <div class="caption-wrapper">
                                        <div class="caption-text">
                                            <a href="{{ $theme->preview->large }}" class="zoom" data-pretty="prettyPhoto">zoom</a>
                                        </div>
                                        <div class="caption-bg"></div>
                                    </div>								
                                    <img src="{{ $theme->preview->thumb }}" class="img-responsive" alt="" />														
                                </div>
                            </div>
                            <div class="main-info-s col-md-9">
                                <h2 class="featured"> {{ $theme->name }}</h2>
                                <div class="info r">
                                    {{ $theme->description }}
                                </div>
                                <div class="info-icons">
                                    <div class="feature-icons">
                                        <ul class="icons-list">
                                            <a href="{{ URL::route('sites.editor', ['id' => $site->getId() ]) . '?source=api&preview=true&theme='.$theme->name }}" class="btn btn-primary">Use This</a>
                                        </ul>
                                    </div>
                                    <div class="state bold"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="row">
                {{$themes->links()}}
            </div>
        </div>
    </div>
</section>
@stop
@section('scripts')
<!-- JavaScript flexslider -->
<script type="text/javascript" src="{{ URL::asset('asset/js/jquery.flexslider.js') }}"></script>
<!-- JavaScript prettyPhoto -->
<script type="text/javascript" src="{{ URL::asset('asset/js/jquery.prettyPhoto.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('asset/js/theme.blade.js') }}"></script>
@stop