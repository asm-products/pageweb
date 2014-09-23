<?php

namespace PageWeb\Provider;

use Illuminate\Support\ServiceProvider;
use PageWeb\Support\Facebook\DummyGraphClient;
use PageWeb\Support\Facebook\GraphClient;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SupportServiceProvider extends ServiceProvider
{
    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $this->app['pageweb.facebook-graph'] = $this->app->share(function ($app) {
            return new GraphClient(
                $app['facebook'],
                $app['sentry'],
                $app['config']
            );
        });

        $this->app['pageweb.facebook-graph-dummy'] = $this->app->share(function ($app) {
            return new DummyGraphClient(
                $app['sentry']
            );
        });

        // Prepare prologue alerts for dependency injection
        $this->app->singleton('Prologue\Alerts\AlertsMessageBag', function ($app) {
            return $app['alerts'];
        });

        // Prepare illuminate events for dependency injection
        $this->app['Illuminate\Events\Dispatcher'] = $this->app['events'];

        // Prepare TeePlus Theme for dependency injection
        $this->app->bind('Teepluss\Theme\Theme', function ($app) {
            return $app['theme'];
        });

        // Prepare FacebookGraphClient for dependency injection
        $this->app->bind('PageWeb\Support\Facebook\GraphClientInterface', function ($app) {
            switch ($app['config']['pageweb.graph_client']) {
                case 'dummy':
                    return $app['pageweb.facebook-graph-dummy'];
                case 'facebook':
                    return $app['pageweb.facebook-graph'];
            }
        });
    }

    public function provides()
    {
        return ['pageweb.facebook-graph-dummy', 'pageweb.facebook-graph'];
    }
}
