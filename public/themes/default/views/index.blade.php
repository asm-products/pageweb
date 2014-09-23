<?php $site = Theme::get('site'); ?>
<!-- ========== HEADER SECTION ========== -->
<section id="home" name="home"></section>
<div id="headerwrap">
    <div class="container">
        <div class="logo">
            <img src="{{ $site->urlTo('assets/img/logo.png') }}">
        </div>
        <br>
        <div class="row">
            <h1>{{ $site->option('page_title', $site->site->title) }}</h1>
            <br>
            <h3>{{ $site->option('page_slogan', 'Hello, We\'re Pageweb. We love design/simplicity') }}</h3>
            <br>
            <br>
            <div class="col-lg-6 col-lg-offset-3">
            </div>
        </div>
    </div><!-- /container -->
</div><!-- /headerwrap -->

<!-- ========== ABOUT SECTION ========== -->
<section id="about" name="about"></section>
<div id="f">
    <div class="container">
        <div class="row">
            <h3>{{ $site->option('page_about_us_header', 'ABOUT US') }}</h3>
            <p class="centered"><i class="icon icon-circle"></i><i class="icon icon-circle"></i><i class="icon icon-circle"></i></p>

            <!-- INTRO INFORMATIO-->
            <div class="col-lg-6 col-lg-offset-3">
                {{ $site->option('page_about_us', $site->site->about) }}
            </div>								
        </div>
    </div><!-- /container -->
</div><!-- /f -->


<!-- ========== CAROUSEL SECTION ========== -->	
<section id="portfolio" name="portfolio"></section>
<div id="f">
    <div class="container">
        <div class="row mt">
            <h3>{{ $site->option('page_portfolio_title', 'OUR WORKS') }}</h3>
            <p class="centered"><i class="icon icon-circle"></i><i class="icon icon-circle"></i><i class="icon icon-circle"></i></p>
                <ul class="grid effect-2" id="grid">
                    @foreach ($site->site->photos as $photo)
                    <li><a href="#"><img src="{{ $photo->url }}"></a></li>
                    @endforeach
                </ul>
        </div><!-- row -->
    </div><!-- container -->
</div>	<!-- f -->

<!-- ========== CONTACT SECTION ========== -->
<section id="contact" name="contact"></section>
<div id="f">
    <div class="container">
        <div class="row">
            <h3>CONTACT US</h3>
            <p class="centered"><i class="icon icon-circle"></i><i class="icon icon-circle"></i><i class="icon icon-circle"></i></p>

            <div class="col-lg-6 col-lg-offset-3">
                <p>{{ $site->option('footer_address', 'Some Avenue, 987<br/>Madrid, Spain<br/>') }}</p>
                <p>{{ $site->option('footer_phone_number', '+29484858474874') }}</p>
                <p>{{ $site->option('footer_email_address', 'iam@pageweb.co') }}</p>
                <p><button type="button" class="btn btn-warning">YEAH! CONTACT US NOW!</button></p>
            </div>
        </div>
    </div>
</div>