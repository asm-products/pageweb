@extends('layouts.main')
@section('title', 'About Us')
@section('content')

<section id="header-space"></section>
<section id="headline">
    <div class="container  text-center">
        <h3>About Us</h3>
    </div>
</section>

<section class="section">
    <div class="container" >
        <div class="row">
            <div class="col-md-6  text-center col-md-offset-3">
                <p> Pageweb is a service that allows you to turn your Facebook pages and social network data into a beautiful and amazing website instantly.</p> 
            </div>
        </div>
    </div>
</section>

<section class="section bg-inverse">
    <div class="container">
        <div class="row">
            <div class="col-md-6 animated" data-effect="pulse">
                <h3> <strong> GET STARTED TODAY!</strong><br>
                   Perfect for Photographers, Non-profits, Freelancers, Weddings, and Small Businesses </h3>
            </div>
            <div class="col-md-6 text-center"> <a class="btn btn-lg btn-theme-inverse animated" data-effect="fadeInRight" title="" href="{{ URL::route('login', ['provider' => 'facebook']) }}" target="blank"> START NOW FOR FREE  </a> </div>
        </div>
    </div>
</section>


@stop