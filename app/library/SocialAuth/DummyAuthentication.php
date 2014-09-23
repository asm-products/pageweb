<?php

namespace PageWeb\SocialAuth;

use PageWeb\Exceptions\AuthenticationException;
use PageWeb\Support\Facebook\DummyGraphClient;
use Redirect;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class DummyAuthentication implements AuthenticationInterface
{
    protected $dummyUserId = 1327325607;

    public function __construct(DummyGraphClient $graphClient)
    {
        $this->graphClient = $graphClient;
    }

    public function setUserId($id)
    {
        $this->dummyUserId = $id;
    }

    public function login()
    {
        return Redirect::route('login.callback', ['provider' => 'facebook']);
    }

    public function logout()
    {
        return true;
    }

    public function callback()
    {
        if (!$user = $this->graphClient->getUser($this->dummyUserId)) {
            throw new AuthenticationException(trans('user.login_fb_auth_error_no_user'));
        }

        $user['access_token'] = sha1(uniqid());

        return $user;
    }
}
