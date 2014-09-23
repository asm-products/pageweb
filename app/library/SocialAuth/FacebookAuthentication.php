<?php

namespace PageWeb\SocialAuth;

use Input;
use PageWeb\Exceptions\AuthenticationException;
use Redirect;
use URL;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class FacebookAuthentication implements AuthenticationInterface
{
    public function __construct(\Facebook $facebook)
    {
        $this->facebook = $facebook;
    }

    public function login()
    {
        $parameters = [
            'redirect_uri' => URL::route('login.callback', ['provider' => 'facebook']),
            'scope' => 'email, manage_pages, publish_stream'
        ];

        return Redirect::to($this->facebook->getLoginUrl($parameters));
    }

    public function logout()
    {
        return Redirect::to($this->facebook->getLogoutUrl());
    }

    public function callback()
    {
        if (strlen(Input::get('code')) == 0) {
            throw new AuthenticationException(trans('user.login_fb_auth_error_no_code_returned'));
        }

        $userId = $this->facebook->getUser();

        if (!$userId) {
            throw new AuthenticationException(trans('user.login_fb_auth_error_no_user'));
        }

        // Extend user token lifetime
        $this->facebook->setExtendedAccessToken();

        $user = $this->facebook->api(
            '/me?fields=id,name,first_name,last_name,location,bio,gender,email,'
            . 'website,picture.height(240),username,updated_time,verified'
        );

        $user['access_token'] = $this->facebook->getAccessToken();

        return $user;
    }
}
