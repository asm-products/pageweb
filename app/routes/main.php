<?php

/**
 * #user.dashboard
 */
Route::match(['GET'], '/dashboard', [
    'before' => ['auth'],
    'as' => 'user.dashboard',
    'uses' => 'UserController@dashboard'
]);

/**
 * #sites.create.preview
 */
Route::match(['POST'], '/create/preview/', [
    'as' => 'sites.create.preview',
    'uses' => 'HomeController@preview'
]);

/**
 * #About us
 */
Route::match(['GET'], '/about', [
    'as' => 'about',
    'uses' => 'HomeController@about'
]);

/**
 * #FAQ
 */
Route::match(['GET'], '/faq', [
    'as' => 'faq',
    'uses' => 'HomeController@faq'
]);

/**
 * #Pricing
 */
Route::match(['GET'], '/pricing', [
    'as' => 'pricing',
    'uses' => 'HomeController@pricing'
]);

/**
 * #login
 */
Route::match(['GET'], '/login/{provider?}', [
    'as' => 'login',
    'uses' => 'AuthController@login'
])->where('provider', 'facebook');

/**
 * #login.callback
 */
Route::match(['GET'], '/login/{provider?}/callback', [
    'as' => 'login.callback',
    'uses' => 'AuthController@callback'
])->where('provider', 'facebook');

/**
 * #logout
 */
Route::match(['GET'], '/logout', [
    'as' => 'logout',
    'uses' => 'UserController@logout'
]);

Route::match(['GET'], '/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::match(['GET'], '{url}', [
    function () {
        App::abort(404);
    }
])->where('url', '.*');
