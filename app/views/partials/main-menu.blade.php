<header id="header">
    <nav id="nav-middle">
        <nav class="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <ul class="navbar-xs pull-right  visible-xs">
                        <li><button class="btn btn-header-search" ><i class="fa fa-search"></i></button></li>
                        <li><a href="#" data-toggle="collapse" data-target="#navbar-collapse"><i class="fa fa-bars"></i></a></li>
                    </ul>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ URL::asset('asset/img/logo.png') }}">
                    </a> 
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right hidden-xs" id="navigation">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ URL::route('login', ['provider' => 'facebook']) }}"><button class="btn btn-primary btn-facebook"><i class="fa fa-facebook"></i>|Login with Facebook</button></a></li>
                         <li><button class="btn btn-circle btn-header-search" ><i class="fa fa-cog"></i></button></li>
                    </ul>
                </div>
            </div>
            <!-- /.container -->
        </nav>
    </nav>
</header>

<div class="widget-top-search">
    <span class="icon"><a href="#" class="close-header-search"><i class="fa fa-times"></i></a></span>
    <form id="top-search" action="{{ URL::route('sites.create.preview') }}" method="post">
        <h2><strong>Get Started Now</strong></h2>
        <div class="input-group">
            <input type="text" name="url" placeholder="Enter Your Facebook Page URL" class="form-control" />
            <span class="input-group-btn">
                <button class="btn" type="submit" title="See Your New Website"><i class="fa fa-cog"></i>Preview</button>
            </span>
        </div>
    </form>
</div>
<!-- //widget-top-search-->
<section id="header-space"></section>