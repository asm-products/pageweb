<?php

namespace PageWeb\Form\AdminLogin;

use Cartalyst\Sentry\Throttling\UserBannedException;
use Cartalyst\Sentry\Throttling\UserSuspendedException;
use Cartalyst\Sentry\Users\PasswordRequiredException;
use Cartalyst\Sentry\Users\UserNotActivatedException;
use Cartalyst\Sentry\Users\UserNotFoundException;
use PageWeb\Extension\Sentry\SentryAdmin;
use PageWeb\Support\Exception\ValidationException;
use Prologue\Alerts\AlertsMessageBag;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class AdminLoginForm
{
    public function __construct(
        SentryAdmin $sentry,
        AlertsMessageBag $alerts,
        AdminLoginFormValidator $validator
    ) {
        $this->validator = $validator;
        $this->sentry = $sentry;
        $this->alerts = $alerts;
        $this->users = $sentry->getUserProvider();
        $this->trottle = $sentry->getThrottleProvider();
        $this->trottle->enable();
    }

    /**
     * Saving the login form creates a new user session
     *
     * @param array $data Options
     *                    <pre>
     *                    login:
     *                    password:
     *                    </pre>
     * @throws \PageWeb\Support\Exception\ValidationException
     * @return \Cartalyst\Sentry\Users\UserInterface|null
     */
    public function save(array $data)
    {
        $user = null;
        try {
            if (!$this->validator->with($data)->passes()) {
                throw new ValidationException($this->validator->errors());
            }

            $remember = true;
            if (!array_key_exists('remember_me', $data)) {
                $remember = false;
            }

            $this->users->findByLogin($data['email']);

            $credentials = [
                'email' => e($data['email']),
                'password' => e($data['password'])
            ];

            $user = $this->sentry->authenticate($credentials, $remember);

        } catch (UserNotFoundException $e) {
            $this->alerts->error(trans('admin.login_user_not_found'));
        } catch (UserNotActivatedException $e) {
            $this->alerts->error(trans('admin.login_user_not_activated'));
        } catch (UserSuspendedException $e) {
            $this->alerts->error(trans('admin.login_user_suspended'));
        } catch (UserBannedException $e) {
            $this->alerts->error(trans('admin.login_user_banned'));
        } catch (PasswordRequiredException $e) {
            $this->alerts->error('Password is required.');
        } catch (ValidationException $e) {
            // Pass all validation errors to alerts message bag
            $this->alerts->merge($e->errors());
        }

        return $user;
    }

    /**
     * @return array
     */
    public function errors()
    {
        return $this->alerts->get('error');
    }
}
 