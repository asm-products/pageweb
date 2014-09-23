<?php

// Manage sites routes

Route::group(['prefix' => '/site'], function () {
    /**
     * Site Dashboard
     */
    Route::match(['GET'], '/{site_id}', [
        'before' => ['site.manager'],
        'as' => 'sites.dashboard',
        'uses' => 'SiteController@dashboard'
    ]);

    /**
     * #sites.editor
     */
    Route::match(['GET', 'POST'], '/{site_id}/editor', [
        'before' => ['site.manager'],
        'as' => 'sites.editor',
        'uses' => 'SiteController@editor'
    ])->where('site_id', '[0-9]+');

    /**
     * Choose subscription plan
     */
    Route::match(['GET', 'POST'], '/{site_id}/subscription/plans', [
        'before' => ['auth', 'site.manager'],
        'as' => 'sites.subscription.plans',
        'uses' => 'SubscriptionController@choosePlan',
    ])->where('site_id', '[0-9]+');

    /**
     * Checkout after choosing plan
     */
    Route::match(['GET', 'POST'], '/{site_id}/subscription/checkout', [
        'before' => ['auth', 'site.manager'],
        'as' => 'sites.subscription.checkout',
        'uses' => 'SubscriptionController@checkout'
    ])->where('id', '[0-9]+');

    /**
     * Upgrade subscription
     */
    Route::match(['GET', 'POST'], '/{site_id}/subscription/upgrade', [
        'before' => ['auth', 'site.manager'],
        'as' => 'sites.subscription.upgrade',
        'uses' => 'SubscriptionController@upgrade'
    ])->where('site_id', '[0-9]+');

    /**
     * Cancel subscription
     */
    Route::match(['GET', 'POST'], '/{site_id}/subscription/cancel', [
        'before' => ['auth', 'site.manager'],
        'as' => 'sites.subscription.cancel',
        'uses' => 'SubscriptionController@cancel'
    ])->where('site_id', '[0-9]+');
});

/**
 * #sites.create
 */
Route::match(['GET', 'POST'], '/create/{page?}', [
    'before' => 'auth',
    'as' => 'sites.create',
    'uses' => 'SiteController@create'
])->where('page', '[0-9]+');