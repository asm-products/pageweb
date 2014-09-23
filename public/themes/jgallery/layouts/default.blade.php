<?php $site = Theme::get('site'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>{{ Theme::get('title') }}</title>
        <meta charset="utf-8">
        <meta name="keywords" content="{{ Theme::get('keywords') }}">
        <meta name="description" content="{{ Theme::get('description') }}">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        {{Theme::asset()->queue('css')->styles();}}
        {{Theme::asset()->styles();}}
    </head>
    <body>
        {{ Theme::partial('menu') }}
        {{ Theme::content() }}
        {{ Theme::partial('footer') }}

    </body>
</html>