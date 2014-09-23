<?php

/**
 * Admin Panel routes
 */
Route::group(['prefix' => '/admincp'], function () {
    /**
     * Admin index -> Login Form
     * #admin.index
     */
    Route::match(['POST', 'GET'], '', [
        'as' => 'admin.index',
        'uses' => 'AdminController@index'
    ]);

    /**
     * Admin dashboard
     * #admin.dashboard
     */
    Route::get('/dashboard', [
        'as' => 'admin.dashboard',
        'uses' => 'AdminController@dashboard'
    ]);

    /**
     * Theme routes
     */
    Route::match(['GET', 'POST'], 'theme', [
        'as' => 'admin.theme',
        'uses' => 'AdminController@themes'
    ]);

    /**
     * Create Theme category
     */
    Route::match(['GET', 'POST'], 'theme/category/create', [
        'as' => 'admin.theme.category.create',
        'uses' => 'AdminController@createThemeCategory'
    ]);

    /**
     * Add Theme
     */
    Route::match(['GET', 'POST'], 'theme/create', [
        'as' => 'admin.theme.create',
        'uses' => 'AdminController@createTheme'
    ]);

    /**
     * Add Theme
     */
    Route::match(['GET', 'POST'], 'theme/{id}/edit', [
        'as' => 'admin.theme.edit',
        'uses' => 'AdminController@editTheme'
    ])->where('id', '[0-9]+');

    /**
     * Theme categories
     */
    Route::match(['GET', 'POST'], 'theme/categories', [
        'as' => 'admin.theme.category',
        'uses' => 'AdminController@themeCategories'
    ]);

    /**
     * Subscription
     */
    Route::match(['GET'], 'subscriptions', [
        'as' => 'admin.subscriptions',
        'uses' => 'AdminController@subscriptionList'
    ]);

    /**
     * Subscription settings
     */
    Route::match(['GET', 'POST'], 'subscriptions/email/settings', [
        'as' => 'admin.subscriptions.email.settings',
        'uses' => 'AdminController@subscriptionEmailSettings'
    ]);

    /**
     * pages
     */
    Route::match(['GET'], 'sites', [
        'as' => 'admin.sites',
        'uses' => 'AdminController@sitesList'
    ]);

    /**
     * admin publish page
     */
    Route::get('site/{site_id}/publish', [
        'as' => 'admin.site.publish',
        'uses' => 'AdminController@publishSite'
    ])->where('site_id', '[0-9]+');

});
