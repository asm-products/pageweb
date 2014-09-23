<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Facebook APP ID
    |--------------------------------------------------------------------------
    |
    */

    'app_id' => $_ENV['FACEBOOK_KEY'],

    /*
    |--------------------------------------------------------------------------
    | Facebook APP SECRET
    |--------------------------------------------------------------------------
    |
    */

    'app_secret' => $_ENV['FACEBOOK_SECRET'],

    /*
    |--------------------------------------------------------------------------
    | Facebook APP Access Token
    |--------------------------------------------------------------------------
    |
    | Access token generated using client credentials that can be used
    | for accessing graph on behalf of offline users
    |
    */
    'app_access_token' => $_ENV['FACEBOOK_ACCESS_TOKEN'],

);
