@extends('layouts.main')
@section('title', 'Website does not exist')
@section('content')

<div class="inner-page padd">
    <!-- Error Start -->
    <div class="error">
        <div class="container">
            <!-- Error page content -->
            <div class="error-content">
                <!-- Heading -->
                <h3>huh<span class="red">!!!</span></h3>
                <!-- Message paragraph -->
                <p class="text-muted" >We are sorry, this website does not exist. It is either it wasn't published or hasn't been created</p>
                <!-- search button and input box -->
                <form role="form">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a href="{{ URL::route('login', ['provider' => 'facebook']) }}"><button class="btn btn-primary btn-facebook"><i class="fa fa-facebook"></i>|Create A Website</button></a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Error End -->


@stop