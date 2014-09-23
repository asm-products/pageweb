<?php

return array(
    'name' => 'jgallery',
    'title' => 'Photography Gallery',
    'description' => 'jQuery photo gallery with albums and preloader',
    'author' => array(
        'name' => 'Stanley Ojadovwa',
        'email' => 'stanley@netaviva.net',
        'website' => 'http://stanwarri.com'
    ),
    'events' => array(
        'before' => function($theme) {
            $theme->setTitle('JGallery');
        },
        'beforeRenderLayout' => array(
            'default' => function ($theme) {
                //add css files
                $theme->asset()->queue('css')->usepath()->add('bootstrap-css', 'css/bootstrap.css');
                $theme->asset()->queue('css')->usepath()->add('main-css', 'css/main.css');
                $theme->asset()->queue('css')->usepath()->add('jgallery-css', 'css/jgallery.css');
                $theme->asset()->usepath()->add('font-awesome.min', 'css/font-awesome.min.css');

                //Add javascript files
                $theme->asset()->usepath()->add('modernizr', 'js/modernizr.custom.js');
                $theme->asset()->usepath()->add('jquery-2.0.3', 'js/jquery-2.0.3.min.js');
                $theme->asset()->usepath()->add('boostrap-js', 'js/bootstrap.min.js');
                $theme->asset()->usepath()->add('main-js', 'js/main.js');
                $theme->asset()->usepath()->add('jgallery', 'js/jgallery.min.js');
                $theme->asset()->usepath()->add('tinycolor', 'js/tinycolor-0.9.16.min.js');
            }
        )
    )
);
