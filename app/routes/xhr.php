<?php

/**
 * Ajax calls
 * $.ajax({
 *      'url' : 'xhr/sites/[id]/sync
 * });
 */
Route::group(['prefix' => '/xhr'], function () {
    /**
     * List all themes
     */
    Route::match(['GET'], '/themes', [
        'uses' => 'App\Controller\Ajax\ThemeController@all'
    ]);

    /**
     * List all theme categories
     */
    Route::match(['GET'], '/themes/categories', [
        'uses' => 'App\Controller\Ajax\ThemeController@categories'
    ]);

    /**
     * Gets all Page
     */
    Route::match(['GET'], '/sites', [
        'before' => ['auth.admin'],
        'uses' => 'App\Controller\Ajax\SiteController@all'
    ]);

    /**
     * Updates a Page
     */
    Route::match(['POST'], '/sites/{site_id}', [
        'before' => ['site.manager'],
        'uses' => 'App\Controller\Ajax\SiteController@update'
    ]);

    Route::match(['POST'], '/sites/{site_id}/subdomain', [
        'before' => ['site.manager'],
        'uses' => 'App\Controller\Ajax\SiteController@updateSubdomain'
    ]);

    Route::match(['POST'], '/sites/{site_id}/domain', [
        'before' => ['site.manager'],
        'uses' => 'App\Controller\Ajax\SiteController@updateDomain'
    ]);

    /**
     * Gets all page posts
     */
    Route::match(['GET'], '/sites/{site_id}/posts', [
        'before' => ['site.manager'],
        'uses' => 'App\Controller\Ajax\SiteController@posts'
    ]);

    /**
     * Gets all page feeds
     */
    Route::match(['GET'], '/sites/{site_id}/feeds', [
        'before' => ['site.manager'],
        'uses' => 'App\Controller\Ajax\SiteController@feeds'
    ]);

    /**
     * Gets all page albums
     */
    Route::match(['GET'], '/sites/{site_id}/albums', [
        'before' => ['site.manager'],
        'uses' => 'App\Controller\Ajax\SiteController@albums'
    ]);

    /**
     * Gets all page photos
     */
    Route::match(['GET'], '/sites/{site_id}/photos', [
        'before' => ['site.manager'],
        'uses' => 'App\Controller\Ajax\SiteController@photos'
    ]);

    /**
     * Gets all page events
     */
    Route::match(['GET'], '/sites/{site_id}/events', [
        'before' => ['site.manager'],
        'uses' => 'App\Controller\Ajax\SiteController@events'
    ]);

    /**
     * Updates page theme option / options
     */
    Route::match(['POST'], '/sites/{site_id}/options', [
        'as' => 'xhr.sites.theme.options:post',
        'uses' => 'App\Controller\Ajax\SiteController@setOption'
    ])->where('site_id', '[0-9]+');

    Route::match(['GET'], '/users/{user_id}/sites', [
        'uses' => 'App\Controller\Ajax\UserController@sites'
    ])->where('user_id', '[a-zA-Z0-9]+');

    /**
     * #xhr.sites.sync
     */
    Route::match(['POST'], '/sites/{site_id}/sync', [
        'uses' => 'AjaxController@syncPage'
    ]);

    /**
     * Change site theme
     */
    Route::match(['POST'], '/sites/{site_id}/editor/theme', [
        'uses' => 'AjaxController@editorTheme'
    ])->where('site_id', '[0-9]+');
});
