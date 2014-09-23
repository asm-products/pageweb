<?php

return [
    'authentication_client' => 'facebook',
    'graph_client' => 'facebook',
    
     /*
     * ---------------------------------------------------------------------
     * Stripe Key
     * ---------------------------------------------------------------------
     */
    'stripe_key' => $_ENV['TEST_STRIPE_KEY'],
    'stripe_publishable_key' => $_ENV['TEST_STRIPE_PUBLISHABLE_KEY']
];
