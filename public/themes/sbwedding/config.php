<?php

return array(
    'name' => 'sbwedding',
    'title' => 'SB Weddings',
    'description' => 'A responsive site wedding template designed the newest couples in town',
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
                $theme->asset()->usepath()->add('skel-css', 'css/normalize.min.css');
                $theme->asset()->usepath()->add('main-css', 'css/main.css');

                //Add javascript files
                $theme->asset()->usepath()->add('jquery', 'js/jquery-1.9.1.min.js');
            }
        )
    ),
    'options' => array(
        'bride_name' => ['type' => 'text'],
        'groom_name' => ['type' => 'text'],
        'wedding_date' => ['type' => 'text'],
        'bride_message' => ['type' => 'textarea'],
        'groom_message' => ['type' => 'textarea'],
        'how_we_met_title' => ['type' => 'text'],
        'how_we_met' => ['type' => 'textarea'],
        'the_engagement_title' => ['type' => 'text'],
    )
);
