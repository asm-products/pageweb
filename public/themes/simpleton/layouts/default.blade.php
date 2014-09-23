<?php $site = Theme::get('site'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>{{ Theme::get('title') }}</title>
        <meta charset="utf-8">
        <meta name="keywords" content="{{ Theme::get('keywords') }}">
        <meta name="description" content="{{ Theme::get('description') }}">
        <link rel="stylesheet" href="{{ $site->urlTo('asset/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ $site->urlTo('asset/css/style.css') }}" />
        {{ $site->header() }}

        <style type="text/css">
            body {background-color: <?php echo $site->option('background_color', '#FFFFFF', false); ?>}
        </style>
    </head>
    <body>
        {{ Theme::partial('header') }}
        {{ Theme::partial('mast-head', ['site' => $site]) }}
        {{ Theme::content() }}
        {{ Theme::partial('footer') }}
    </body>
</html>