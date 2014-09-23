<?php

namespace PageWeb\Model;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\BillableInterface;
use Laravel\Cashier\BillableTrait;

/**
 * @author - Tiamiyu waliu
 */
class Subscription extends Model implements BillableInterface
{
    use BillableTrait;

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

    protected $table = 'subscriptions';

    /**
     * Method to find a transaction by its pageId
     *
     * @param int $siteId
     * @return \Illuminate\Database\Eloquent\Model;
     */
    public function findBySiteId($siteId)
    {
        return $this->where('site_id', '=', $siteId)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan()
    {
        return $this->belongsTo('PageWeb\Model\SubscriptionPlan', 'subscription_plan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function site()
    {
        return $this->belongsTo('PageWeb\Model\Site', 'site_id');
    }
}