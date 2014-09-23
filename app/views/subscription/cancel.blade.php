@extends('layouts.dashboard')
@section('title', 'Upgrade Plan')
@section('content')
<h2>Cancel Your Subscription</h2>
<p>Details</p>
<ul>
    <li>Current Plan: {{$plan->title}}</li>

</ul>

<h3>Are you sure you want to cancel your subscription</h3>
<a href="{{URL::route('sites.subscription.cancel', ['site_id' => $siteId])}}?confirmed=true">YES</a>
<a href="{{URL::route('sites.subscription.cancel', ['site_id' => $siteId])}}?confirmed=false">NO</a>
@stop