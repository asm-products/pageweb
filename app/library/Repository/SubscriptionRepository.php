<?php

namespace PageWeb\Repository;

use Carbon\Carbon;
use PageWeb\Model\Subscription;

/**
 * @author - Tiamiyu waliu
 */
class SubscriptionRepository
{
    public function __construct(Subscription $subscription)
    {
        $this->model = $subscription;
    }

    /**
     * Method to get a transaction by its siteId
     *
     * @param int $siteId
     * @return \PageWeb\Model\Subscription
     */
    public function get($siteId)
    {
        return $this->model->findBySiteId($siteId);
    }

    /**
     * Method to bill a user for a site
     *
     * @param int $siteId
     * @param array $val
     * @return boolean
     */
    public function add($siteId, $val)
    {
        /**
         * @var $plan
         * @var $token
         */
        extract($val);
        $subscription = $this->model->findBySiteId($siteId);

        if (!$subscription) {
            $subscription = $this->create($siteId, $plan);

            //we are good to subscribe this site
            $subscription->subscription($plan->name)->create($token);
        } else {
            if ($subscription->stripe_plan != $plan->name) {
                $subscription->subscription($plan->name)->swap();
            }
        }

        if ($subscription->subscribed()) {
            return true;
        }

        return false;
    }

    /**
     * Cancel a site subscription
     *
     * @param int $siteId
     * @return boolean
     */
    public function cancel($siteId)
    {
        $site = $this->get($siteId);
        $site->subscription()->cancel();

        return true;
    }

    /**
     * Method to create site transaction row
     *
     * @param int $siteId
     * @param string $plan
     * @return \PageWeb\Model\Subscription
     */
    public function create($siteId, $plan)
    {
        $subscription = $this->model->newInstance();
        $subscription->site_id = $siteId;
        $subscription->subscription_plan_id = $plan->id;
        $subscription->stripe_plan = $plan->name;
        $subscription->trial_ends_at = Carbon::now()->addDays(30);
        $subscription->save();

        return $subscription;
    }

    /**
     * Get subscription list
     *
     * @param int $limit
     */
    public function getList($limit = 10)
    {
        return $this->model->paginate($limit);
    }
}
