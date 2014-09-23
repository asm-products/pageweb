<?php

namespace PageWeb\Provider;

use Illuminate\Support\ServiceProvider;
use PageWeb\Site\ApiDataSource;
use PageWeb\Site\DatabaseDataSource;
use PageWeb\Site\SiteProvider;
use PageWeb\Site\SourceManager;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['pageweb.api-data-source'] = $this->app->share(function () {
            return new ApiDataSource($this->app->make('PageWeb\Support\Facebook\GraphClientInterface'));
        });

        $this->app['pageweb.database-data-source'] = $this->app->share(function () {
            return new DatabaseDataSource($this->app->make('PageWeb\Repository\SiteRepository'));
        });

        $this->app['pageweb.site-provider'] = $this->app->share(function () {
            $siteProvider = new SiteProvider(new SourceManager(
                $this->app['request'],
                $this->app['sentry']
            ));

            return $siteProvider;
        });

        $this->app->bind('PageWeb\Site\SiteProvider', function () {
            return $this->app['pageweb.site-provider'];
        });
    }

    public function provides()
    {
        return [
            'pageweb.api-data-source',
            'pageweb.database-data-source',
            'pageweb.site-provider'
        ];
    }
}
