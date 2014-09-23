<?php

namespace PageWeb\Provider;

use Illuminate\Support\ServiceProvider;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class UserServiceProvider extends ServiceProvider
{
    /**
     * {@inheritDoc}
     */
    public function register()
    {
        // Prepare sentry for dependency injection
        $this->app->bind('Cartalyst\Sentry\Sentry', function ($app) {
            return $app['sentry'];
        });
    }
}
