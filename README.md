## PageWeb

A service that converts your facebook page to website

### Coding Styles

[Psr-1](http://www.php-fig.org/psr/psr-1/) and [Psr-2](http://www.php-fig.org/psr/psr-2/) Coding standards MUST be followed. These standards were meant for the php framework developers

but they have been adopted by the majority of the php community and these are the standards we will and MUST follow.

Strong adherence to these standards in addition with the few listed below must be mastered.

* [http://www.php-fig.org/psr/psr-1/](http://www.php-fig.org/psr/psr-1/)
* [http://www.php-fig.org/psr/psr-2/](http://www.php-fig.org/psr/psr-2/)

###### Extra Standards

* Variable names must follow Psr standards. Snake case is not allowed.
* Single quotes MUST be used throughout application. No double quotes, not event one.

### Installation

Just clone the repository and run

    php composer install

That's it dude...

### Setup Virtual Host

I don't think I'm required to show steps on how this is done...

Just create a virtual host on your windows with the server name as

    pageweb.app

### Database & Other Configuration

To avoid changing database config and some other configuration in every pull made, this is the flow we'll use.

Run the command below to get your machine name

    $ artisan pageweb:machine

You will see something like "Your machine name: MORRELINKO-PCI5"

Copy the machine name and open the file `bootstrap/start.php`

Look for the block code like that below

    $env = $app->detectEnvironment(array(

        'local' => array('localhost', 'MORRELINKO-PCI5'),

    ));

Add the machine name you to the array.

For example, if you have machine name "KOLA-PC", that block will become

    $env = $app->detectEnvironment(array(

        'local' => array('localhost', 'MORRELINKO-PCI5', 'KOLA-PC'),

    ));

Now, all database configs and other configs should be changed in the file `app/config/local/database.php`

The main production configs (ie files in app/config) should only be modified if it is required by the application.

### Data Available to editor and site

    Page {{ $site->site->name }} (#{{ $site->site->id }})

    <h3>Albums</h3>

    @foreach ($site->albums() as $album)
    * {{ $album->title }} <br />
    @endforeach

    <h3>Photos</h3>

    @foreach ($site->photos() as $photo)
    * {{ $photo->id }} - {{ $photo->caption }} <br />
    @endforeach

    <h3>Posts</h3>

    @foreach ($site->posts() as $post)
        * {{ $post->id }} -
        @if ($post->isPhoto())
            {{ $post->photo_url }}
        @elseif ($post->isLink())
            <b>{{ $post->link_caption }}</b>
            {{ $post->link_title }}
        @else
            {{ $post->content }}
        @endif

        [type: {{ $post->type }}]
        <br />
    @endforeach

    <h3>Cover Photos</h3>

    @foreach ($site->coverPhotos() as $coverPhoto)
    * {{ $coverPhoto->photo_url }} <br />
    @endforeach

### Working with $site

@TODO Put some explanation here...

Get all site posts

    $posts = $site->posts()

Get all site posts with pagination

    $posts = $site->posts([
        'paginate' => 10
    ]);

Get site posts for a specific type

    $posts = $site->posts([
        'types' => 'link'
    ]);

Get all site posts for more than one type

    $posts = $site->posts([
        'types' => ['link', 'status']
    ]);

    $posts = $site->posts([
        'types' => 'link',
        'paginate' => 5
    ]);

Get all sites albums

    $albums = $site->albums();

Get all sites photos

    $photos = $site->photos();

Get all sites photos in an album

    $photos = $site->photos([
        'album_id' => 7458887656879
    ]);

Get all site events

    $events = $site->events();

Generate a url to a page in your theme

    $url = $site->urlRoute('gallery')
    $url = $site->urlRoute('albums');

Generate a url to any path in your theme

    $url = $site->urlTo('asset/js/my-files.js');

    <img src="{{ $site->urlTo('asset/img/logo.png') }}" />

## Theme Options

With theme options, you can make items or objects on your theme editable in the site editor.

#### Defining theme options

* Open /public/themes/<your-theme>/config.php

* Add option definitions in an 'options' array to your config like below

```php
...

'options' => [
    'option_one' => ['type' => 'text'],
    'option_two' => ['type' => 'text'],
    'about_us' => ['type' => 'textarea']
]
```

* In your themes, just call `$site->option()` example:

    <h3>{{ $site->option('option_one') }}</h3>
    <h5>{{ $site->option('option_two') }}</h5>

And thats all...

When site is in editor mode, users are given the ability to edit the values...

The `option()` method also accepts a default value as second argument. Which is used if the user has not modified

that option. Examples:::

    <h3>{{ $site->option('option_one', 'Default value') }} </h3>

    <h2>About Us</h2>

    <p> {{ $site->option('about_us', $site->site->about) }} </p>

#### Supported option types

* text
* textarea
* select
* date
* datetime
* dateui
* combodate
* html5types
* checklist
* wysihtml5
* typeahead
* typeaheadjs
* select2

#### Page Subscription
You can access a page subscription details using the **$site** variable

For example
<p>{{$site->page->()->subscription->stripe_id}}</p>
<p>{{$site->page->()->subscription->stripe_plan</p>

    <h3>Also possible to use method like below</h3>
    <p>{{$site->site->subscription->subscribed()}} e.t.c </p>

    <h3>To access the subscription plan details</h3>
    <p>{{$site->site->subscription->plan->name}}</p>
    <p>{{$site->site->subscription->plan->amount}}</p>