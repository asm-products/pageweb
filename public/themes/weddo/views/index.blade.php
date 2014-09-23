<?php $site = Theme::get('site'); ?>
<!-- Main Starts -->
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <div class="main-invite">
                    <h1>We're<br> 
                        getting married</h1>
                    <p>{{ $site->option('marriage_welcome_message', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.') }}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-5">
                <div class="main-date">
                    <i class="icon-heart"></i>
                    <div class="date"><span class="month"><strong>{{ $site->option('wedding_month', '25, Nov') }}</strong></span><br><span class="year"><strong>{{ $site->option('wedding_year', '2014') }}</strong></span></div>	
                </div>
            </div>
        </div>
        <a name="about" id="about"></a>
    </div>
</div>
<!-- Main Ends -->

<!-- About Starts -->
<div class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h3>{{ $site->option('page_about_us_header', 'About Us') }}</h3>
                </div>
                <div class="bor"></div>

                <p class="about-para text-center">{{ $site->option('page_about_us', $site->site->about) }}</p>
                <div class="bor"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="groom">
                    <h3>{{ $site->option('groom_name', 'Stanley') }}</h3>
                    <hr>
                    <p class="text-center">{{ $site->option('about_groom', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.') }}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="love">
                    <i class="icon-heart"></i>
                    <h3>{{ $site->option('wedding_date', '25, November 2014') }}</h3>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="bride">
                    <h3>{{ $site->option('bride_name', 'Emily') }}</h3>
                    <hr>
                    <p class="text-center">{{ $site->option('about_bride', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.') }}</p>
                </div>
            </div>
        </div>
        <a name="photos" id="photos"></a>
        <hr>
    </div>
</div>

<!-- About Ends -->
<!-- Photos Starts -->
<div class="photos">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h3>Photos</h3>
                </div>
                <div class="bor"></div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($site->site->photos as $photo)
                        <li>
                            <img src="{{ $photo->url }}" alt="" class="img-responsive" />
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>

        </div>
        <a name="wedding" id="wedding"></a>
        <hr>

    </div>
</div>

<!--Photo Ends-->

<!-- Wedding Starts -->
<div class="wedding">
    <div class="container">
        <div class="title">
            <h3>Wedding</h3>
        </div>
        <div class="bor"></div>

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="well">
                    <h3><i class="icon-heart"></i> Wedding Venue</h3>
                    <a href="#">{{ $site->option('church_name', 'Royal Church') }}</a>
                    <p>{{ $site->option('church_address', '12, New Charka Road<br>New York City,<br> NY 43423<br>123) 456-7890') }}</p>
                    <hr>
                    <h3><i class="icon-star"></i> Reception</h3>
                    <a href="#">{{ $site->option('reception_venue', 'Royal Church') }}</a>
                    <p>{{ $site->option('reception_address', '12, New Charka Road<br>New York City,<br> NY 43423<br>123) 456-7890') }}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="well">
                    <h3><i class="icon-glass"></i> Wedding Party</h3>
                    <h5>Ring Bearer</h5>
                    <p>{{ $site->option('ring_bearer', 'James Manager') }}</p>
                    <h5>Bridesmaids:</h5>
                    <p>{{ $site->option('bridesmaids', 'Rosemary maker, loveth pem, Esther Moke') }}</p>
                    <h5>Groomsmen:</h5>
                    <p>{{ $site->option('groomsmen', 'Rosemary maker, loveth pem, Esther Moke') }}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="well">
                    <h3><i class="icon-truck"></i> Reception</h3>
                    <p>{{ $site->option('directions', 'Take a bus from Yaba, arrive at Sabo, we are just upstairs') }}</p>
                </div>
            </div>
        </div>
        <a name="rsvp" id="rsvp"></a>
        <hr>

    </div>
</div>

<!-- Wedding Ends -->

<!-- RSVP Starts -->
<div class="rsvp">
    <div class="container">
        <div class="title">
            <h3>RSVP</h3>
        </div>
        <div class="bor"></div>

        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="heart">
                    <i class="icon-heart"></i>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="well">
                    <p>Join us in making our wedding a memorable one</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="heart">
                    <i class="icon-heart"></i>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<!-- RSVP Ends -->