<?php

namespace PageWeb\Event;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class UserActions
{
    /**
     * Event fired after a user logs in
     */
    const LOGIN = 'user.login';

    /**
     * Event fired if the user logs in from facebook first time
     */
    const LOGIN_FIRST = 'user.login.first';

    /**
     * Event fire after a user logs out
     */
    const LOGOUT = 'user.logout';
}
