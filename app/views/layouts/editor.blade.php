<!DOCTYPE html>
<html id="editor" ng-app="EditorApp">
    <head>
        @yield('head:start')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="PageWeb.co" />
        <meta name="author" content="" />
        <title>Editor</title>
        <link rel="shortcut icon" href="{{ URL::asset('asset/img/favicon.ico') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ URL::asset('asset/backend/css/jquery-ui-1.10.3.custom.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('asset/backend/css/entypo.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('asset/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::to('/') }}/asset/css/editor.css" />

        <!--[if lt IE 9]>
        <script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        @include ('scripts/global')
        @yield ('head:end')
    </head>
    <body ng-controller="MainCtrl">
        @yield ('body:start')
        <div id="editor-wrapper" class="editor-vertical-box">
            @include ('editor/partials/header')
            <!-- EDITOR BODY -->
            <div id="editor-body">
                @yield('content')
            </div>
        </div>

        @yield('body:end')
        @include ('scripts/editor')
    </body>
</html>