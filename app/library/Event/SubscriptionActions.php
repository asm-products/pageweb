<?php

namespace PageWeb\Event;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SubscriptionActions
{
    /**
     * This event is triggered when a page trial is about to end
     */
    const TRIAL_END_SOON = 'subscription.trail-end-soon';

    /**
     * Triggered when a subscription payment is successful
     */
    const PAYMENT_SUCCESS = 'subscription.payment.success';

    /**
     * Triggered when a subscription payment failed
     */
    const PAYMENT_FAILED = 'subscription.payment.failed';
}
