<!DOCTYPE html>
<html lang="en">
    <head>
        @section('description', 'PageWeb helps you to create & update your website from your Facebook Page instantly')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="PageWeb.co" />
        <meta name="author" content="" />

        <title>@yield('title') | PageWeb.com</title>
        <link rel="shortcut icon" href="{{ URL::asset('asset/img/favicon.ico') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ URL::asset('asset/backend/css/jquery-ui-1.10.3.custom.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('asset/backend/css/entypo.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('asset/backend/css/bootstrap.css') }}">
        @yield('styles')
        <link rel="stylesheet" href="{{ URL::asset('asset/backend/css/pageweb-core.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('asset/backend/css/pageweb-theme.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('asset/backend/css/pageweb-forms.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('asset/backend/css/custom.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('asset/backend/css/skins/white.css') }}">
        <script type="text/javascript" src="{{ URL::asset('asset/js/jquery-1.11.0.min.js') }}"></script>

        <!--[if lt IE 9]>
        <script src="assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        @include('partials.scripts')
    </head>
    <body class="page-body skin-white" data-ur="http://pageweb.co">
        <div class="page-container">
            <div class="sidebar-menu">
                @include('partials.dashboard-menu')
            </div>
            <div class="main-content">
                <div class="row">
                    <!-- Profile Info and Notifications -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <ul class="user-info pull-left pull-none-xsm">
                            <!-- Profile Info -->
                            <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ $user->photo }}" alt="{{ $user->first_name }}" class="img-circle" width="44" />
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- Reverse Caret -->
                                    <li class="caret"></li>
                                    <!-- Profile sub-links -->
                                    <li>
                                        <a href="#">
                                            <i class="entypo-user"></i>
                                            Edit Profile
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Raw Links -->
                    <div class="col-md-6 col-sm-4 clearfix hidden-xs">
                        <ul class="list-inline links-list pull-right">
                            <li>
                                <a href="{{ URL::route('sites.create') }}" class="btn btn-danger">
                                    Create A Website <i class="entypo-cog right"></i>
                                </a>
                            </li>
                            <li class="sep"></li>
                            <li>
                                <a href="#">
                                    Log Out <i class="entypo-logout right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr />

                @yield('content')

                @include('partials.dashboard-footer')

            </div>
            <!-- Bottom Scripts -->
            <script src="{{ URL::asset('asset/backend/js/gsap/main-gsap.js') }}"></script>
            <script src="{{ URL::asset('asset/backend/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
            <script src="{{ URL::asset('asset/backend/js/bootstrap.js') }}"></script>
            <script src="{{ URL::asset('asset/backend/js/joinable.js') }}"></script>
            <script src="{{ URL::asset('asset/backend/js/resizeable.js') }}"></script>
            <script src="{{ URL::asset('asset/backend/js/pageweb-api.js') }}"></script>
            <script src="{{ URL::asset('asset/backend/js/pageweb-custom.js') }}"></script>
            @yield('scripts')
    </body>
</html>
