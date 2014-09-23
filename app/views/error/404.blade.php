@extends('layouts.main')
@section('title', 'Error 404')
@section('content')

<div class="inner-page padd">
    <!-- Error Start -->
    <div class="error">
        <div class="container">
            <!-- Error page content -->
            <div class="error-content">
                <!-- Heading -->
                <h3>404<span class="red">!!!</span></h3>
                <!-- Message paragraph -->
                <p class="text-muted" >We are sorry, the page you requested cannot be found.</p>
                <!-- search button and input box -->
                <form role="form">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <input class="btn btn-danger" type="button" value="Click to Go Back" onclick="history.back(-1)" />
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Error End -->


@stop