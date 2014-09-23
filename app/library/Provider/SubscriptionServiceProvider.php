<?php

namespace PageWeb\Provider;

use Illuminate\Support\ServiceProvider;
use PageWeb\Model\Subscription;

/**
 * @author - Tiamiyu waliu
 */
class SubscriptionServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        Subscription::setStripeKey(\Config::get('pageweb.stripe_key'));
    }
}