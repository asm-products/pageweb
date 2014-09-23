<?php

namespace PageWeb\Provider;

use Cartalyst\Sentry\Cookies\IlluminateCookie;
use Cartalyst\Sentry\Groups\Eloquent\Provider as GroupProvider;
use Cartalyst\Sentry\Hashing\BcryptHasher;
use Cartalyst\Sentry\Hashing\NativeHasher;
use Cartalyst\Sentry\Hashing\Sha256Hasher;
use Cartalyst\Sentry\Sessions\IlluminateSession;
use Cartalyst\Sentry\Throttling\Eloquent\Provider as ThrottleProvider;
use Cartalyst\Sentry\Users\Eloquent\Provider as UserProvider;
use Illuminate\Support\ServiceProvider;
use PageWeb\Extension\Sentry\SentryAdmin;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class AdminServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->registerHasher();
        $this->registerUserProvider();
        $this->registerGroupProvider();
        $this->registerThrottleProvider();
        $this->registerSession();
        $this->registerCookie();
        $this->registerSentry();

        // Prepare SentryAdmin for dependency injection
        $this->app->bind('PageWeb\Extension\Sentry\SentryAdmin', function ($app) {
            return $app['sentry.admin'];
        });
    }

    public function provides()
    {
        return ['sentry.admin', 'sentry.admin.hasher'];
    }

    /**
     * Register the hasher used by Sentry.
     *
     * @return void
     */
    protected function registerHasher()
    {
        $this->app['sentry.admin.hasher'] = $this->app->share(function ($app) {
            $hasher = \Config::get('cartalyst/sentry::admin.hasher');

            switch ($hasher) {
                case 'native':
                    return new NativeHasher;
                    break;

                case 'bcrypt':
                    return new BcryptHasher;
                    break;

                case 'sha256':
                    return new Sha256Hasher;
                    break;
            }

            throw new \InvalidArgumentException("Invalid hasher [$hasher] chosen for Sentry.");
        });
    }

    /**
     * Register the user provider used by Sentry.
     *
     * @return void
     */
    protected function registerUserProvider()
    {
        $this->app['sentry.admin.user'] = $this->app->share(function ($app) {
            $model = $app['config']['cartalyst/sentry::admin.users.model'];

            // We will never be accessing a user in Sentry without accessing
            // the user provider first. So, we can lazily setup our user
            // model's login attribute here. If you are manually using the
            // attribute outside of Sentry, you will need to ensure you are
            // overriding at runtime.
            if (method_exists($model, 'setLoginAttribute')) {
                $loginAttribute = $app['config']['cartalyst/sentry::admin.users.login_attribute'];
                forward_static_call_array(
                    array($model, 'setLoginAttribute'),
                    array($loginAttribute)
                );
            }

            return new UserProvider($app['sentry.admin.hasher'], $model);
        });
    }

    /**
     * Register the group provider used by Sentry.
     *
     * @return void
     */
    protected function registerGroupProvider()
    {
        $this->app['sentry.admin.group'] = $this->app->share(function ($app) {
            $model = $app['config']['cartalyst/sentry::admin.groups.model'];

            return new GroupProvider($model);
        });
    }

    /**
     * Register the throttle provider used by Sentry.
     *
     * @return void
     */
    protected function registerThrottleProvider()
    {
        $this->app['sentry.admin.throttle'] = $this->app->share(function ($app) {
            $model = $app['config']['cartalyst/sentry::admin.throttling.model'];

            $throttleProvider = new ThrottleProvider($app['sentry.admin.user'], $model);

            if ($app['config']['cartalyst/sentry::admin.throttling.enabled'] === false) {
                $throttleProvider->disable();
            }

            if (method_exists($model, 'setAttemptLimit')) {
                $attemptLimit = $app['config']['cartalyst/sentry::admin.throttling.attempt_limit'];

                forward_static_call_array(
                    array($model, 'setAttemptLimit'),
                    array($attemptLimit)
                );
            }
            if (method_exists($model, 'setSuspensionTime')) {
                $suspensionTime = $app['config']['cartalyst/sentry::admin.throttling.suspension_time'];

                forward_static_call_array(
                    array($model, 'setSuspensionTime'),
                    array($suspensionTime)
                );
            }

            return $throttleProvider;
        });
    }

    /**
     * Register the session driver used by Sentry.
     *
     * @return void
     */
    protected function registerSession()
    {
        $this->app['sentry.admin.session'] = $this->app->share(function ($app) {
            $key = $app['config']['cartalyst/sentry::admin.cookie.key'];

            return new IlluminateSession($app['session.store'], $key);
        });
    }

    /**
     * Register the cookie driver used by Sentry.
     *
     * @return void
     */
    protected function registerCookie()
    {
        $this->app['sentry.admin.cookie'] = $this->app->share(function ($app) {
            $key = $app['config']['cartalyst/sentry::admin.cookie.key'];

            return new IlluminateCookie($app['request'], $app['cookie'], $key);
        });
    }

    /**
     * Takes all the components of Sentry and glues them
     * together to create Sentry.
     *
     * @return void
     */
    protected function registerSentry()
    {
        $this->app['sentry.admin'] = $this->app->share(function ($app) {
            // Once the authentication service has actually been requested by the developer
            // we will set a variable in the application indicating such. This helps us
            // know that we need to set any queued cookies in the after event later.
            $app['sentry.admin.loaded'] = true;

            return new SentryAdmin(
                $app['sentry.admin.user'],
                $app['sentry.admin.group'],
                $app['sentry.admin.throttle'],
                $app['sentry.admin.session'],
                $app['sentry.admin.cookie'],
                $app['request']->getClientIp()
            );
        });
    }
}
