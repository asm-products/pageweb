<?php $site = Theme::get('site'); ?>
<!-- Intro -->
<section id="intro" class="main style1 dark fullscreen">
    <div class="content container small">
        <header>
            <h2>Hey.</h2>
        </header>
        <p>{{ $site->option('page_about_us', $site->site->about) }}</p>
        <footer>
            <a href="#one" class="button style2 down">More</a>
        </footer>
    </div>
</section>

<!-- One -->
<section id="one" class="main style2 right dark fullscreen">
    <div class="content box style2">
        <header>
            <h2>{{ $site->option('what_we_do_title', 'What I Do') }}</h2>
        </header>
        <p>{{ $site->option('what_we_do_content', 'Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum. 
            Fusce blandit ultrices sapien, in accumsan orci rhoncus eu. Sed sodales venenatis arcu, 
            id varius justo euismod in. Curabitur egestas consectetur magna urna.') }}</p>
    </div>
    <a href="#two" class="button style2 down anchored">Next</a>
</section>

<!-- Two -->
<section id="two" class="main style2 left dark fullscreen">
    <div class="content box style2">
        <header>
            <h2>Who I Am</h2>
        </header>
        <p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum. 
            Fusce blandit ultrices sapien, in accumsan orci rhoncus eu. Sed sodales venenatis arcu, 
            id varius justo euismod in. Curabitur egestas consectetur magna urna.</p>
    </div>
    <a href="#work" class="button style2 down anchored">Next</a>
</section>

<!-- Work -->
<section id="work" class="main style3 primary">
    <div class="content container">
        <header>
            <h2>My Work</h2>
            <p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum. 
                Fusce blandit ultrices sapien, in accumsan orci rhoncus eu. Sed sodales venenatis 
                arcu, id varius justo euismod in. Curabitur egestas consectetur magna vitae urna.</p>
        </header>
        <div class="container small gallery">
            <div class="row flush images">
                 @foreach ($site->site->photos as $photo)
                <div class="6u"><a href="{{ $photo->url }}" class="image full l"><img src="{{ $photo->url }}" title="{{ $photo->caption }}" alt="{{ $photo->caption }}" /></a></div>
                @endforeach
            </div>
        </div>

    </div>
</section>

<!-- Contact -->
<section id="contact" class="main style3 secondary">
    <div class="content container">
        <header>
            <h2>Say Hello.</h2>
            <p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.</p>
        </header>
        <div class="box container small">
            <form method="post" action="#">
                <div class="row half">
                    <div class="6u"><input type="text" name="name" placeholder="Name" /></div>
                    <div class="6u"><input type="text" name="email" placeholder="Email" /></div>
                </div>
                <div class="row half">
                    <div class="12u"><textarea name="message" placeholder="Message" rows="6"></textarea></div>
                </div>
                <div class="row">
                    <div class="12u">
                        <ul class="actions">
                            <li><input type="submit" class="button" value="Send Message" /></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

