@extends('layouts.admin-dashboard')
@section('title', 'Admin Dashboard')

@section('content')

<div class="row">
    <div class="col-sm-3">
        <a href="{{URL::route('admin.sites')}}?type=all">
            <div class="tile-stats tile-blue">
            <div class="icon"><i class="entypo-rss"></i></div>
            <div class="num" data-start="0" data-end="{{ $totalSites }}" data-postfix="" data-duration="1500" data-delay="0">0</div>

            <h3> Total Websites</h3>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="{{URL::route('admin.sites')}}?type=published">
                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-rss"></i></div>
                    <div class="num" data-start="0" data-end="{{ $totalPublishedSites }}" data-postfix="" data-duration="1500" data-delay="600">0</div>

                    <h3>Published</h3>
                </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="{{URL::route('admin.sites')}}?type=unpublished">
            <div class="tile-stats tile-red">
                <div class="icon"><i class="entypo-rss"></i></div>
                <div class="num" data-start="0" data-end="{{ $totalUnPublishedSites }}" data-postfix="" data-duration="1500" data-delay="1800">0</div>

                <h3>Unpublished</h3>
            </div>
        </a>
    </div>
</div>
<br />
@stop