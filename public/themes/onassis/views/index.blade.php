<?php $site = Theme::get('site'); ?>

<!-- ========== HEADER SECTION ========== -->
<section id="home" name="home"></section>
<div id="headerwrap">
    <div class="container">
        <br>
        <h1>{{ $site->option('page_title', $site->site->title) }}</h1>
        <h2>{{ $site->option('page_slogan', 'Make each day exceptionally great!') }}</h2>
        <div class="row">
            <br>
            <br>
            <br>
            <div class="col-lg-6 col-lg-offset-3">
            </div>
        </div>
    </div><!-- /container -->
</div><!-- /headerwrap -->

<!-- ========== WHITE SECTION ========== -->
<div id="w">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h3>{{ $site->option('page_about_section', 'WE WORK HARD TO DELIVER A <bold>HIGH QUALITY SERVICE</bold>. OUR AIM IS YOUR COMPLETE <bold>SATISFACTION</bold>.') }}
                </h3>
            </div>
        </div>
    </div><!-- /container -->
</div><!-- /w -->

<!-- ========== ABOUT - GREY SECTION ========== -->
<section id="about" name="about"></section>
<div id="g">
    <div class="container">
        <div class="row">
            <h3>{{ $site->option('page_about_us_header', 'ABOUT US') }}</h3>
            <br>
            <br>
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <p>{{ $site->option('page_about_us', $site->site->about) }}</p>
                <br>
                <br>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div><!-- /container -->
</div><!-- /g -->

<!-- ========== WHITE SECTION ========== -->
<div id="w" style="background-color: #2838vf;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h3>{{ $site->option('page_welcome_message', 'WELCOME TO <bold>ONASSIS</bold>. <bold>A FREE BOOTSTRAP 3</bold> THEME. CRAFTED WITH LOVE BY <bold>PAGEWEB.CO</bold>. <br />
                    <bold>IDEAL FOR</bold> AGENCIES & FREELANCERS.') }}
                </h3>
            </div>
        </div>
    </div><!-- /container -->
</div><!-- /w -->

<!-- ========== SERVICES - GREY SECTION ========== -->
<section id="services" name="services"></section>
<div id="g">
    <div class="container">
        <div class="row">
            <h3>OUR SERVICES</h3>
            <br>
            <br>
            <div class="col-lg-3">
                <h4>{{ $site->option('service_title_1', 'Design') }}</h4>
                <p>{{ $site->option('service_text_1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever.') }}</p>
            </div>
            <div class="col-lg-3">
               <h4>{{ $site->option('service_title_2', 'Product Development') }}</h4>
                <p>{{ $site->option('service_text_2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever.') }}</p>
            </div>
            <div class="col-lg-3">
                <h4>{{ $site->option('service_title_3', 'Coding') }}</h4>
                <p>{{ $site->option('service_text_3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever.') }}</p>
            </div>
            <div class="col-lg-3">
                <h4>{{ $site->option('service_title_4', 'Marketing') }}</h4>
                <p>{{ $site->option('service_text_4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever.') }}</p>
            </div>
        </div>
    </div><!-- /container -->
</div><!-- /g -->
