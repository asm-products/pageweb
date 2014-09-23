<?php

namespace PageWeb\SocialAuth;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
interface AuthenticationInterface
{
    public function login();

    public function logout();

    public function callback();
}
 