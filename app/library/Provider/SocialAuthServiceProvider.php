<?php

namespace PageWeb\Provider;

use Facebook;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use PageWeb\Event\MailingSubscriber;
use PageWeb\SocialAuth\DummyAuthentication;
use PageWeb\SocialAuth\FacebookAuthentication;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SocialAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /** @noinspection PhpUndefinedFunctionInspection */
        $this->app['events']->subscribe(new MailingSubscriber());
    }

    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $this->app['facebook'] = $this->app->share(function (Application $app) {
            $config = [
                'appId' => $app['config']['facebook.app_id'],
                'secret' => $app['config']['facebook.app_secret']
            ];

            return new Facebook($config);
        });

        // Prepare Facebook SDK client for dependency injection
        $this->app->bind('Facebook', function ($app) {
            return $app['facebook'];
        });

        $this->app->bind('PageWeb\SocialAuth\AuthenticationInterface', function ($app) {
            switch ($app['config']['pageweb.authentication_client']) {
                case 'dummy':
                    return new DummyAuthentication($app['pageweb.facebook-graph-dummy']);
                case 'facebook':
                    return new FacebookAuthentication($app['facebook']);
            }
        });
    }

    public function provides()
    {
        return ['facebook'];
    }
}
