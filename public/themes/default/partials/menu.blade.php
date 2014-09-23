<?php $site = Theme::get('site'); ?>
<!-- Menu -->
<nav class="menu" id="theMenu">
    <div class="menu-wrap">
        <h1 class="logo"><a href="#home">{{ $site->site->title }}</a></h1>
        <i class="icon-remove menu-close"></i>
        <a href="#home" class="smoothScroll">Home</a>
        <a href="#about" class="smoothScroll">About</a>
        <a href="#portfolio" class="smoothScroll">Portfolio</a>
        <a href="#contact" class="smoothScroll">Contact</a>
        <a href="#"><i class="icon-facebook"></i></a>
        <a href="#"><i class="icon-twitter"></i></a>
        <a href="#"><i class="icon-envelope"></i></a>
    </div>
    <!-- Menu button -->
    <div id="menuToggle"><i class="icon-reorder"></i></div>
</nav>