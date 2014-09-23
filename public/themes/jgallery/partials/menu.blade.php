<?php $site = Theme::get('site'); ?>
<nav class="menu" id="theMenu">
    <div class="menu-wrap">
        <h1 class="logo"><a href="{{ URL::route('site.home', ['name' => $site->getName()]) }}#home">LINK</a></h1>
        <i class="fa fa-arrow-right menu-close"></i>
        <a href="{{ URL::route('site.home', ['name' => $site->getName()]) }}">Home</a>
        <a href="{{ $site->urlRoute('about') }}">About</a>
        <a href="{{ $site->urlRoute('contact') }}">Contact</a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-envelope"></i></a>
    </div>
    <!-- Menu button -->
    <div id="menuToggle"><i class="fa fa-bars"></i></div>
</nav>