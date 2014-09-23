<?php

/**
 * #site.home
 */
Route::match(['GET'], '', [
    'as' => 'site.home',
    'uses' => 'App\Controller\SiteFrontend\LiveController@index'
]);

/**
 * #site.about
 */
Route::match(['GET'], '/about', [
    'as' => 'site.about',
    'uses' => 'App\Controller\SiteFrontend\LiveController@about'
]);

/**
 * #site.contact
 */
Route::match(['GET'], '/contact', [
    'as' => 'site.contact',
    'uses' => 'App\Controller\SiteFrontend\LiveController@contact'
]);

/**
 * #site.posts
 */
Route::match(['GET'], '/posts', [
    'as' => 'site.posts',
    'uses' => 'App\Controller\SiteFrontend\LiveController@posts'
]);

/**
 * #site.post
 */
Route::match(['GET'], '/posts/{post_id}', [
    'as' => 'site.post',
    'uses' => 'App\Controller\SiteFrontend\LiveController@post'
])->where('post_id', '[0-9]+');

/**
 * #site.gallery
 */
Route::match(['GET'], '/gallery', [
    'as' => 'site.gallery',
    'uses' => 'App\Controller\SiteFrontend\LiveController@gallery'
]);

/**
 * #site.photos
 */
Route::match(['GET'], '/gallery/{id}', [
    'as' => 'site.photos',
    'uses' => 'App\Controller\SiteFrontend\LiveController@photos'
])->where('id', '[0-9]+');

/**
 * #site.events
 */
Route::match(['GET'], '/events', [
    'as' => 'site.events',
    'uses' => 'App\Controller\SiteFrontend\LiveController@events'
]);

/**
 * #site.events.view
 */
Route::match(['GET'], '/events/{id}', [
    'as' => 'site.events.view',
    'uses' => 'App\Controller\SiteFrontend\LiveController@events'
])->where('id', '[0-9]+');

/**
 * Send all other urls to the site error page
 * #site.error
 */
Route::any('{url}', [
    'as' => 'site.error',
    'uses' => 'App\Controller\SiteFrontend\LiveController@error'
])->where('url', '.*');
