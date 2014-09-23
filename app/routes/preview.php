<?php

Route::group(['prefix' => 'site/preview'], function () {
    /**
     * #editor.preview.home
     */
    Route::match(['GET'], '{site_id}', [
        'as' => 'editor.preview.home',
        'uses' => 'App\Controller\SiteFrontend\PreviewController@index'
    ])->where('site_id', '[0-9]+');

    /**
     * #editor.preview.about
     */
    Route::match(['GET'], '{site_id}/about', [
        'as' => 'editor.preview.about',
        'uses' => 'App\Controller\SiteFrontend\PreviewController@about'
    ])->where('site_id', '[0-9]+');

    /**
     * #editor.preview.contact
     */
    Route::match(['GET'], '{site_id}/contact', [
        'as' => 'editor.preview.contact',
        'uses' => 'App\Controller\SiteFrontend\PreviewController@contact'
    ])->where('site_id', '[0-9]+');

    /**
     * #editor.preview.posts
     */
    Route::match(['GET'], '{site_id}/posts', [
        'as' => 'site.posts',
        'uses' => 'App\Controller\SiteFrontend\PreviewController@posts'
    ])->where('site_id', '[0-9]+');

    /**
     * #editor.preview.post
     */
    Route::match(['GET'], '{site_id}/posts/{post_id}', [
        'as' => 'site.post',
        'uses' => 'App\Controller\SiteFrontend\PreviewController@post'
    ])->where('site_id', '[0-9]+')->where('post_id', '[0-9]+');

    /**
     * #site.gallery
     */
    Route::match(['GET'], '{site_id}/gallery', [
        'as' => 'editor.preview.gallery',
        'uses' => 'App\Controller\SiteFrontend\PreviewController@gallery'
    ])->where('site_id', '[0-9]+');

    /**
     * #site.photos
     */
    Route::match(['GET'], '{site_id}/gallery/{gallery_id}', [
        'as' => 'editor.preview.photos',
        'uses' => 'App\Controller\SiteFrontend\PreviewController@photos'
    ])->where('site_id', '[0-9]+')->where('gallery_id', '[0-9]+');

    /**
     * #site.events
     */
    Route::match(['GET'], '{site_id}/events', [
        'as' => 'site.events',
        'uses' => 'App\Controller\SiteFrontend\PreviewController@events'
    ])->where('site_id', '[0-9]+');

    /**
     * #site.events.view
     */
    Route::match(['GET'], '{site_id}/events/{event_id}', [
        'as' => 'site.events.view',
        'uses' => 'App\Controller\SiteFrontend\PreviewController@events'
    ])->where('site_id', '[0-9]+')->where('event_id', '[0-9]+');

    /**
     * Send all other urls to the site error page
     * #site.error
     */
    Route::any('{site_id}/{url}', [
        'as' => 'site.error',
        'uses' => 'App\Controller\SiteFrontend\PreviewController@error'
    ])->where('site_id', '[0-9]+')->where('url', '.*');
});
