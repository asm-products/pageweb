<?php

use Cartalyst\Sentry\Sentry;
use PageWeb\Exceptions\AuthenticationException;
use PageWeb\Form\Login\LoginForm;
use PageWeb\SocialAuth\AuthenticationInterface;
use Prologue\Alerts\AlertsMessageBag;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class AuthController extends BaseController
{
    public function __construct(
        LoginForm $login,
        AuthenticationInterface $authentication,
        AlertsMessageBag $alerts,
        Sentry $sentry
    ) {
        $this->alerts = $alerts;
        $this->loginForm = $login;
        $this->sentry = $sentry;
        $this->authentication = $authentication;
    }

    /**
     * @param null $facebook
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function login($facebook = null)
    {
        if ($facebook != null) {
            if ($result = $this->authentication->login()) {
                return $result;
            }
        }

        return View::make('user.login');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback()
    {
        try {
            $me = $this->authentication->callback();

            $this->loginForm->create([
                'user_id' => $me['id'],
                'username' => $me['username'],
                'email' => isset($me['email']) ? $me['email'] : null,
                'first_name' => $me['first_name'],
                'last_name' => $me['last_name'],
                'password' => sprintf('%s:%s', $me['id'], $me['email']),
                'token' => $me['access_token'],
                'photo' => isset($me['picture']['data']['url']) ? $me['picture']['data']['url'] : null
            ]);

            return Redirect::route('user.dashboard');
        } catch (AuthenticationException $e) {
            return Redirect::route('login')->withErrors($e->getMessage());
        }
    }
}
