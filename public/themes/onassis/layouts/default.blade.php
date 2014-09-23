<?php $site = Theme::get('site'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <title>{{ $site->site->title }}</title>
        {{Theme::asset()->queue('css')->styles();}}
        {{Theme::asset()->styles();}}
        <style>
            #headerwrap {
                background: url('<?php echo $site->option('headerwrap_bg_image', $site->urlTo('/assets/img/header-bg.jpg')) ?>'); no-repeat center top;
            }
        </style>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="assets/js/html5shiv.js"></script>
          <script src="assets/js/respond.min.js"></script>
        <![endif]-->
        {{ $site->header() }}
    </head>
    <body data-spy="scroll" data-offset="0" data-target="#theMenu">
        {{ Theme::partial('menu') }}
        {{ Theme::content() }}
        {{ Theme::partial('footer') }}

    </body>
</html>