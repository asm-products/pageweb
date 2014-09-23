<?php

/**
 * Webhook for subscription
 */
Route::get('stripe/webhook', [
    'as' => 'stripe-webhook',
    'uses' => 'WebhookController@handleWebhook'
]);
