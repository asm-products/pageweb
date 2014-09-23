<?php $site = Theme::get('site'); ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>{{ $site->site->title }}</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <!--[if lte IE 8]><script src="{{ $site->urlTo('assets/css/ie/html5shiv.js') }}"></script><![endif]-->
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,900' rel='stylesheet' type='text/css'>
        {{Theme::asset()->queue('css')->styles();}}
        {{Theme::asset()->styles();}}
        <!--[if lte IE 8]><link rel="stylesheet" href="{{ $site->urlTo('assets/css/ie/v8.css') }}" /><![endif]-->
        {{ $site->header() }}
    </head>
    <body>
        {{ Theme::partial('menu') }}
        {{ Theme::content() }}
        {{ Theme::partial('footer') }}

    </body>
</html>