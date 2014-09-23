<header class="navbar navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->
    <div class="navbar-inner">
        <!-- logo -->
        <div class="navbar-brand">
            <a href="{{ URL::route('admin.dashboard') }}">
                <img src="{{ URL::asset('asset/img/logo.png') }}" width="88" alt="" />
            </a>
        </div>
        <!-- main menu -->
        <ul class="navbar-nav">
            <li>
                <a href="{{ URL::route('admin.dashboard') }}">
                    <i class="entypo-gauge"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-right pull-right">
            <li class="sep"></li>
            <li>
                <a href="#">
                    Log Out <i class="entypo-logout right"></i>
                </a>
            </li>
            <!-- mobile only -->
            <li class="visible-xs">	
                <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                <div class="horizontal-mobile-menu visible-xs">
                    <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</header>

<div class="sidebar-menu">
    <ul id="main-menu" class="">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
        <li>
            <a href="{{ URL::route('admin.theme') }}">
                <i class="entypo-picasa"></i>
                <span>Manage Themes</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::route('admin.subscriptions') }}">
                <i class="entypo-credit-card"></i>
                <span>Manage Subscriptions</span>
            </a>
        </li>
    </ul>

</div>	
