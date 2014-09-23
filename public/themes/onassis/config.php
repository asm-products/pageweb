<?php

return array(
    'name' => 'onassis',
    'title' => 'Onassis Boostrap Theme',
    'description' => 'A twitter boostrap 3.0 single page theme for businesses, freelancer and personal use',
    'author' => array(
        'name' => 'Stanley Ojadovwa',
        'email' => 'stanley@netaviva.net',
        'website' => 'http://stanwarri.com'
    ),
    'events' => array(
        'before' => function($theme) {
            $theme->setTitle('Onassis Twitter Boostrap Theme');
        },
        'beforeRenderLayout' => array(
            'default' => function ($theme) {
                //add css files
                $theme->asset()->queue('css')->usepath()->add('bootstrap-css', 'css/bootstrap.css');
                $theme->asset()->queue('css')->usepath()->add('main-css', 'css/main.css');
                $theme->asset()->usepath()->add('font-awesome.min', 'css/font-awesome.min.css');

                //Add javascript files
                $theme->asset()->usepath()->add('jquery', 'js/jquery.min.js');
                $theme->asset()->usepath()->add('boostrap-js', 'js/bootstrap.min.js');
            }
        )
    ),
    'options' => array(
        'page_title' => ['type' => 'text'],
        'page_slogan' => ['type' => 'text'],
        'page_welcome_message' => ['type' => 'textarea'],
        'page_about_us_header' => ['type' => 'text'],
        'page_about_us' => ['type' => 'textarea'],
        'page_about_section' => ['type' => 'textarea'],
        'headerwrap_bg_image' => ['type' => 'url'],
        'service_title_1' => ['type' => 'text'],
        'service_title_2' => ['type' => 'text'],
        'service_title_3' => ['type' => 'text'],
        'service_title_4' => ['type' => 'text'],
        'service_text_1' => ['type' => 'textarea'],
        'service_text_2' => ['type' => 'textarea'],
        'service_text_3' => ['type' => 'textarea'],
        'service_text_4' => ['type' => 'textarea'],
        'footer_email_address' => ['type' => 'text'],
        'footer_phone_number' => ['type' => 'text']
    )
);
