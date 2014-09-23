<?php

namespace PageWeb\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @author - Tiamiyu waliu
 */
class SubscriptionPlan extends Model
{
    protected $table = 'subscription_plans';

    /**
     * Find plsn its name
     *
     * @param string $name
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findByName($name)
    {
        return $this->where('name', '=', $name)->first();
    }
}