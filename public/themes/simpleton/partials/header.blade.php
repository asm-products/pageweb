<?php $site = Theme::get('site'); ?>

{{ var_dump($site->menus(['only' => ['home']])) }}

<div id="header" class="navbar navbar-default navbar-fixed-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ URL::route('site.home', ['name' => $site->getName()]) }}" class="navbar-brand">
                {{ $site->getTitle() }}
            </a>
        </div>

        <nav class="collapse navbar-collapse" role="navigation">

            <ul class="nav navbar-nav">
                @foreach ($site->menus() as $menu)
                    <li>
                        <a href="{{ $menu->url }}">
                            {{ $menu->title }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <ul class="nav navbar-right navbar-nav">
                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-search"></i>
                    </a>

                    <ul class="dropdown-menu" style="padding:12px;">
                        <form class="form-inline">
                            <button type="submit" class="btn btn-default pull-right"><i class="glyphicon glyphicon-search"></i></button><input type="text" class="form-control pull-left" placeholder="Search">
                        </form>
                    </ul>

                </li>
            </ul>

        </nav>
    </div>
</div>