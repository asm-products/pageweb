<?php $site = Theme::get('site'); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ $site->site->title }}</title>
        <meta name="description" content="Welcome to the wedding website for Sarah and Brad's Big Day!">
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <!-- For iPhone 4 with high-resolution Retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ $site->urlTo('assets/img/apple-touch-icon-114x114-precomposed.png') }}">
        <!-- For first-generation iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ $site->urlTo('assets/img/apple-touch-icon-72x72-precomposed.png') }}">
        <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
        <link rel="apple-touch-icon-precomposed" href="{{ $site->urlTo('assets/img/apple-touch-icon-precomposed.png') }}">
        <link rel="shortcut icon" href="{{ $site->urlTo('assets/img/favicon.ico?v=1') }}">
        {{Theme::asset()->queue('css')->styles();}}
        {{Theme::asset()->styles();}}
        <style>
            #headerwrap {
                background: url('<?php echo $site->option('headerwrap_bg_image', $site->urlTo('assets/img/header-bg.jpg')) ?>'); no-repeat center top;
            }
        </style>
        <script type="text/javascript" src="{{ $site->urlTo('assets/js/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
        {{ $site->header() }}
    </head>
    <body>
        <div id="bg-image">
            <img src="{{ $site->urlTo('assets/img/bg-pic.jpg') }}" alt="bg" />
        </div>
        <div id="bg-container">
            {{ Theme::partial('menu') }}
            {{ Theme::content() }}
        </div>
        {{ Theme::partial('footer') }}
    </body>
</html>