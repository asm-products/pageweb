@extends('layouts.admin-login')
@section('title', 'Login')

@include('partials/errors')

@section('content')
<div class="login-container">
    <div class="login-header login-caret">
        <div class="login-content">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ URL::asset('asset/img/logo.png') }}" width="120" alt="" />
            </a>
            <p class="description">Log in to access your dashboard!</p>
        </div>
    </div>

    <div class="login-form">
        <div class="login-content">
            <div class="form-login-error">
                {{ var_dump($errors->all()) }}
            </div>
            <form method="post" role="form" id="form_login">
                <div class="form-group">
                    <a href="{{ URL::route('login', ['provider' => 'facebook']) }}" class="btn btn-default btn-lg btn-block btn-icon icon-left facebook-button">
                        Login with Facebook
                        <i class="entypo-facebook"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

