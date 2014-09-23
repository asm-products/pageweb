<?php

use Cartalyst\Sentry\Sentry;
use PageWeb\Repository\SiteRepository;
use PageWeb\Repository\SubscriptionPlanRepository;
use PageWeb\Repository\SubscriptionRepository;

/**
 * @author - Tiamiyu waliu
 */
class SubscriptionController extends BaseController
{
    public function __construct(
        Sentry $sentry,
        SubscriptionRepository $SubscriptionRepository,
        SubscriptionPlanRepository $subscriptionPlanRepository,
        SiteRepository $siteRepo
    ) {
        $this->sentry = $sentry;
        $this->subscription = $SubscriptionRepository;
        $this->subscriptionPlan = $subscriptionPlanRepository;
        $this->siteRepo = $siteRepo;
    }

    /**
     * Choose Plan
     */
    public function choosePlan($id)
    {
        if (($subscription = $this->subscription->get($id)) && ($subscription->subscription_plan_id != '')) {
            return Redirect::route('sites.subscription.upgrade', ['site_id' => $id]);
        }

        return View::make('subscription.choose-plan', array(
            'user' => $this->currentUser
        ))->with('siteId', $id);
    }

    /*
     * Checkout Page
     */

    public function checkout($id)
    {
        $plan = $this->subscriptionPlan->get(Input::query('plan'));
        $site = $this->siteRepo->findById($id);

        if (!$plan or !$site) {
            return Redirect::route('sites.subscription.plans', ['site_id' => $id]);
        }

        if ($token = Input::get('stripeToken')) {
            $val = array(
                'token' => $token,
                'plan' => $plan
            );
            if ($this->subscription->add($id, $val)) {
                //direct the user to the editor page
                return Redirect::route('sites.editor', [
                    'site_id' => $id
                ]);
            } else {
                return Redirect::route('sites.editor', [
                    'site_id' => $id
                ])->withErrors('An error occured in processing your payment, Please try again');
            }
        }

        return View::make('subscription.checkout', [
            'plan' => $plan,
            'user' => $this->currentUser,
            'site' => $site
        ])->with('siteId', $id);
    }

    /**
     * Upgrade a subscription
     */
    public function upgrade($id)
    {
        $subscription = $this->subscription->get($id);

        if (!$subscription) {
            return Redirect::route('sites.editor', [
                'site_id' => $id
            ])->withErrors('There is no subscription package for this page');
        }

        return View::make('subscription.upgrade', [
            'subscription' => $subscription,
            'user' => $this->currentUser
        ])->with('siteId', $id);
    }

    /**
     * Cancel Subscription
     */
    public function cancel($id)
    {
        $subscription = $this->subscription->get($id);

        if (!$subscription) {
            return Redirect::route('sites.editor', [
                'site_id' => $id
            ])->withErrors('There is no subscription package for this page');
        }

        if ($confirmed = Input::query('confirmed')) {

            if ($confirmed) {
                $this->subscription->cancel($id);
            }

            return Redirect::route('sites.editor', [
                'site_id' => $id
            ]);
        }
        $plan = $this->subscriptionPlan->get($subscription->stripe_plan);

        return View::make('subscription.cancel', [
            'subscription' => $subscription,
            'plan' => $plan,
            'user' => $this->currentUser
        ])->with('siteId', $id);
    }

}
