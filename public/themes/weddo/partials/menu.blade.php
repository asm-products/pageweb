<?php $site = Theme::get('site'); ?>
<!-- Navigation Starts -->
<div class="navbar navbar-default navbar-fixed-top bs-docs-nav" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{ $site->site->title }}</a>
        </div>

        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home" class="anchorLink">Home</a></li>
                <li><a href="#about" class="anchorLink">About</a></li>
                <li><a href="#photos" class="anchorLink">Photos</a></li>
                <li><a href="#wedding" class="anchorLink">Wedding</a></li>
                <li><a href="#rsvp" class="anchorLink">RSVP</a></li>
            </ul> 
        </nav>
    </div>
</div>
<a name="home" id="home"></a>
<!-- Navigation Ends -->
