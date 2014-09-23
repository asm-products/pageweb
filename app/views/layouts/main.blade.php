<!doctype html>
<head>
    @section('description', 'PageWeb helps you to create & update your website from your Facebook Page instantly')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>@yield('title') | PageWeb.co</title>
    <link rel="shortcut icon" href="{{ URL::asset('asset/img/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('asset/css/bootstrap-themes.css') }}">
    @yield('styles')
    <link rel="stylesheet" href="{{ URL::asset('asset/css/animation.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('asset/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('asset/css/font-awesome.min.css') }}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.js"></script>
    <![endif]-->
    @include ('partials.scripts')
</head>
<body>
    <div id="wrap">
        @include('partials.main-menu')

        @yield('content')

        @include('partials.main-footer')

    </div>
    <!-- Jquery Library -->
    <script type="text/javascript" src="{{ URL::asset('asset/js/jquery-1.10.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('asset/js/jquery.ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('asset/js/bootstrap.min.js') }}"></script>

    <!-- Modernizr Library For HTML5 And CSS3 -->
    <script type="text/javascript" src="{{ URL::asset('asset/js/modernizr/modernizr.js') }}"></script>

    <!-- Select Nav -->
    <script type="text/javascript" src="{{ URL::asset('asset/js/selectnav.min.js') }}"></script>
    @yield('scripts')
    <!-- Custom Script -->
    <script type="text/javascript" src="{{ URL::asset('asset/js/pageweb.custom.js') }}"></script>
</body>
</html>
