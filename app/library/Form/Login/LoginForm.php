<?php

namespace PageWeb\Form\Login;

use Cartalyst\Sentry\Sentry;
use Cartalyst\Sentry\Users\UserNotFoundException;
use Illuminate\Events\Dispatcher;
use PageWeb\Event\UserActions;
use Prologue\Alerts\AlertsMessageBag;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class LoginForm
{
    public function __construct(
        Sentry $sentry,
        Dispatcher $dispatcher,
        AlertsMessageBag $alerts,
        LoginValidator $validator
    ) {
        $this->validator = $validator;
        $this->sentry = $sentry;
        $this->alerts = $alerts;
        $this->dispatcher = $dispatcher;
        $this->users = $sentry->getUserProvider();
    }

    /**
     * Saving the login creates a new user session
     *
     * @param array $data Options
     * <pre>
     * id:
     * username:
     * email:
     * password:
     * first_name:
     * last_name:
     * </pre>
     * @throws \PageWeb\Support\Exception\ValidationException
     * @return \Cartalyst\Sentry\Users\UserInterface|null
     */
    public function create(array $data)
    {
        $user = null;
        if (!$this->validator->with($data)->passes()) {
            $this->alerts->merge($this->validator->errors()->toArray());

            return null;
        }

        try {
            // Get user if user exists.
            $user = $this->users->findByLogin(e($data['email']));

            // Update user access token
            $user->token = $data['token'];
            $user->save();
        } catch (UserNotFoundException $e) {
            // Create user otherwise
            $user = $this->sentry->register([
                'id' => e($data['user_id']),
                'username' => e($data['username']),
                'email' => e($data['email']),
                'password' => e($data['password']),
                'first_name' => e($data['first_name']),
                'last_name' => e($data['last_name']),
                'token' => $data['token'],
                'photo' => e($data['photo'])
            ], $activate = true);

            $this->dispatcher->fire(UserActions::LOGIN_FIRST, ['user' => $user]);
        }

        $this->dispatcher->fire(UserActions::LOGIN, ['user' => $user]);

        // Login the user
        $this->sentry->login($user);

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
 