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
                background: url('<?php echo $site->option('headerwrap_bg_image', $site->urlTo('assets/img/header-bg.jpg')) ?>'); no-repeat center top;
            }
        </style>
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="{{ $site->urlTo('assets/js/modernizr.custom.js') }}"></script>
        {{ $site->header() }}
    </head>
    <body data-spy="scroll" data-offset="0" data-target="#theMenu">
        {{ Theme::partial('menu') }}
        {{ Theme::content() }}
        {{ Theme::partial('footer') }}

    </body>
</html>