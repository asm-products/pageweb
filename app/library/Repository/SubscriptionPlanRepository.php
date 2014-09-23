<?php

namespace PageWeb\Repository;

use Illuminate\Support\Collection;
use PageWeb\Model\SubscriptionPlan;

/**
 * @author - Tiamiyu waliu
 */
class SubscriptionPlanRepository
{
    public function __construct(SubscriptionPlan $subscriptionPlan)
    {
        $this->model = $subscriptionPlan;
    }

    /**
     * @param array $columns
     * @return Collection
     */
    public function all(array $columns = array('*'))
    {
        return $this->model->all($columns);
    }

    /**
     * Get Subscription plan by its name
     *
     * @param string $name
     * @return \PageWeb\Model\SubscriptionPlan
     */
    public function get($name)
    {
        return $this->model->findByName($name);
    }
}
