@extends('layouts.admin-login')
@section('title', 'Admin Login')

@section('content')
<div class="login-container">
    <div class="login-header login-caret">
        <div class="login-content">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ URL::asset('asset/img/logo.png') }}" width="120" alt="" />
            </a>
            <p class="description">Log in to access the admin area!</p>
        </div>
    </div>

    <div class="login-form">
        <div class="login-content">
            <div class="form-login-error">
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
            </div>
            <form method="post" role="form" id="form_login">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>
                        <input type="text" class="form-control" name="email" id="username" placeholder="Email Address" autocomplete="off" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-login">
                        Login In
                        <i class="entypo-login"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('scripts')

@stop
