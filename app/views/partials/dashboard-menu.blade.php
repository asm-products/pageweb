<header class="logo-env">
    <!-- logo -->
    <div class="logo">
        <a href="{{ URL::route('user.dashboard') }}">
            <img src="{{ URL::asset('asset/img/logo.png') }}" width="120" alt="" />
        </a>
    </div>
    <!-- logo collapse icon -->
    <div class="sidebar-collapse">
        <a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
            <i class="entypo-menu"></i>
        </a>
    </div>
    <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
    <div class="sidebar-mobile-menu visible-xs">
        <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
            <i class="entypo-menu"></i>
        </a>
    </div>
</header>
<ul id="main-menu" class="">
    <li class="active opened active">
        <a href="{{ URL::route('user.dashboard') }}">
            <i class="entypo-gauge"></i>
            <span>Dashboard</span>
        </a>
    </li>
</ul>