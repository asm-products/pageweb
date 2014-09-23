<?php

return array(
    'name' => 'bigpicture',
    'description' => 'A responsive site template designed for freelancers and small businesses',
    'author' => array(
        'name' => 'Stanley Ojadovwa',
        'email' => 'stanley@netaviva.net',
        'website' => 'http://stanwarri.com'
    ),
    'events' => array(
        'before' => function($theme) {
            $theme->setTitle('');
        },
        'beforeRenderLayout' => array(
            'default' => function ($theme) {
                //add css files
                $theme->asset()->usepath()->add('skel-css', 'css/skel-noscript.css');
                $theme->asset()->usepath()->add('main-css', 'css/style.css');

                //Add javascript files
                $theme->asset()->usepath()->add('jquery', 'js/jquery.min.js');
            }
        )
    ),
    'options' => array(
        'page_about_us' => ['type' => 'textarea'],
        'what_we_do_title' => ['type' => 'text'],
        'what_we_do_content' => ['type' => 'textarea'],
    )
);
