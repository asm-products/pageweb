<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Client
    |--------------------------------------------------------------------------
    |
    | Set the authentication client you want to use for authenticating
    | user. There are two types. 'dummy' & 'facebook'. Use dummy if you
    | want to work offline or 'facebook' for the real thing.
    |
    */

    'authentication_client' => 'facebook',

    /*
    |--------------------------------------------------------------------------
    | Graph Client
    |--------------------------------------------------------------------------
    |
    | Pageweb uses a custom client implementation for interacting with
    | the facebook graph api. Here, you can change the implementation you
    | want to use. There are two implementations i have created for this
    | 'dummy' & 'facebook'
    | The `dummy` does not hit facebook api, it just returns sample data
    | This can be used to work offline.
    | The `facebook` client is the real implementation
    |
    */

    'graph_client' => 'facebook',

    'build' => [
        'uglify_js_path' => 'C:\nodejs\node_modules\.bin\uglifyjs.cmd'
    ],

    /*
     * ---------------------------------------------------------------------
     * Stripe Key
     * ---------------------------------------------------------------------
     */
      'stripe_key' => 'sk_live_mLY4UXq1WOBFtoEr9XKthd6C',
      'stripe_publishable_key' => 'pk_live_3uqoi1FGPj85PtB67YhDPwZA'
];
