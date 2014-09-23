<header ng-controller="HeaderCtrl" id="editor-header" class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('/') }}">
                <span class="h3" id="logo">PageWeb</span>
            </a>
        </div>
        <div class="btn-group navbar-btn navbar-left">
            <button type="button" class="btn btn-dark btn-icon" title="Create Site">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
            <div class="btn-group hidden-nav-xs">
                <button type="button" class="btn btn-default dropdown-toggle site-switcher clearfix" data-toggle="dropdown">
                    Switch Site <span class="pull-right caret" style="margin-top: 6px;"></span>
                </button>
                <ul class="dropdown-menu text-left">
                    <li ng-repeat="site in sites">
                        <a href="#">@{{ site.title }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
            @if (!$user)
                <a
                    class="btn btn-lg btn-block btn-secondary"
                    href="{{ URL::route('login') }}">
                    Publish Site
                </a>
            @else
                @if ($site->isSubscribed())
                <button
                    ng-show="editor.site.is_published == 0"
                    class="btn btn-info navbar-btn">
                    Publish Site
                </button>
                @else
                <a
                    style="padding: 5px 10px;"
                    ng-show="editor.site.is_published == 0"
                    class="btn btn-info navbar-btn"
                    href="{{ URL::route('sites.subscription.plans', ['site_id' => $site->getId()]) }}">
                    Publish Site
                </a>
                @endif
                <button
                    ng-show="editor.site.is_published == 1"
                    class="btn btn-info navbar-btn">
                    Site is Live
                </button>
            @endif
            </li>
            <li>
                <a href="#">&nbsp;</a>
            </li>
        </ul>
    </div>
</header>