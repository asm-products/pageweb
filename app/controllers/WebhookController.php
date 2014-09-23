<?php

use Illuminate\Events\Dispatcher;
use Laravel\Cashier\WebhookController as CashierWebHookController;
use PageWeb\Event\SubscriptionActions;

/**
 * @author Tiamiyu waliu
 */
class WebhookController extends CashierWebHookController
{

    /**
     * @var \PageWeb\Model\Subscription
     */
    protected $billable;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function handleWebhook()
    {
        $payload = $this->getJsonPayload();
        
        print_r($payload);
        exit();

        $this->billable = $this->getBillable($payload['data']['object']['customer']);

        switch ($payload['type']) {
            case 'customer.created':
                //
                break;
            case 'customer.card.created':
                //
                break;
            case 'customer.subscription.created':
                //
                break;
            case 'invoice.created':
                //
                break;
            case 'invoice.payment_succeeded':
                //
                break;
            case 'customer.subscription.trial_will_end':
                $this->dispatcher->fire(SubscriptionActions::TRIAL_END_SOON, [$this->billable->site]);
                break;
            case 'invoice.created':
                //
                break;
            case 'invoice.payment_succeeded':
                $this->dispatcher->fire(SubscriptionActions::PAYMENT_SUCCESS, [$this->billable->site]);
                break;
            case 'charge.succeeded':
                $this->dispatcher->fire(SubscriptionActions::PAYMENT_SUCCESS, [$this->billable->site]);
                break;
            case 'customer.subscription.updated':
                //this event occur when customer switch from trial to active
                break;
        }

        // Fallback to failed payment check...
        return parent::handleWebhook();
    }

}