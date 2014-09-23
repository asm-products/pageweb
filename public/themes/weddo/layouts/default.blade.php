<?php $site = Theme::get('site'); ?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Title here -->
        <title>{{ $site->site->title }}</title>
        <!-- Description, Keywords and Author -->
        <meta name="description" content="Your description">
        <meta name="keywords" content="Your,Keywords">
        <meta name="author" content="Pageweb">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lobster+Two:700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>
        <!-- Favicon -->
        <link rel="shortcut icon" href="#">
        {{ Theme::asset()->queue('css')->styles(); }}
        {{ Theme::asset()->styles(); }}
        <style>
            .main{
                background: url('<?php echo $site->option('headerwrap_bg_image', $site->urlTo('assets/img/mainback.jpg')) ?>'); repeat-y;
            }
        </style>
        {{ $site->header() }}
    </head>
    <body>
        {{ Theme::partial('menu') }}
        {{ Theme::content() }}
        {{ Theme::partial('footer') }}

    </body>
</html>