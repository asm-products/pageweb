<?php

return array(
    'name' => 'weddinglife',
    'title' => 'Wedding Boostrap Theme',
    'description' => 'A twitter boostrap 3.0 single page wedding theme',
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
                $theme->asset()->queue('css')->usepath()->add('bootstrap-css', 'css/bootstrap.min.css');
                $theme->asset()->usepath()->add('flexislider', 'css/flexslider.css');
                $theme->asset()->usepath()->add('font-awesome.min', 'css/font-awesome.min.css');
                $theme->asset()->queue('css')->usepath()->add('main-css', 'css/style.css');

                //Add javascript files
                $theme->asset()->usepath()->add('jquery', 'js/jquery.js');
                $theme->asset()->usepath()->add('boostrap-js', 'js/bootstrap.min.js');
            }
        )
    ),
    'options' => array(
        'headerwrap_bg_image' => ['type' => 'url'],
        'marriage_welcome_message' => ['type' => 'textarea'],
        'wedding_month' => ['type' => 'text'],
        'wedding_year' => ['type' => 'text'],
        'page_about_us_header' => ['type' => 'text'],
        'page_about_us' => ['type' => 'textarea'],
        'groom_name' => ['type' => 'text'],
        'about_groom' => ['type' => 'textarea'],
        'bride_name' => ['type' => 'text'],
        'about_bride' => ['type' => 'textarea'],
        'wedding_date' => ['type' => 'text'],
        'ring_bearer' => ['type' => 'text'],
        'bridesmaids' => ['type' => 'textarea'],
        'groomsmen' => ['type' => 'textarea'],
        'directions' => ['type' => 'textarea'],
        'church_name' => ['type' => 'tex'],
        'church_address' => ['type' => 'textarea'],
        'reception_venue' => ['type' => 'text'],
        'reception_address' => ['type' => 'textarea'],
    )
);
