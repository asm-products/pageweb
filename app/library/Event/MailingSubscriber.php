<?php

namespace PageWeb\Event;

use Illuminate\Events\Dispatcher;
use Illuminate\Mail\Message;
use Mail;
use PageWeb\Model\Site;
use User;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class MailingSubscriber
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(UserActions::LOGIN_FIRST, array($this, 'welcomeUser'));
        $events->listen(SubscriptionActions::TRIAL_END_SOON, array($this, 'notifyTrialEndsSoon'));
        $events->listen(SubscriptionActions::PAYMENT_SUCCESS, array($this, 'notifyPaymentSuccessful'));
    }

    /**
     * Sends an email welcoming users who logs in for the first time.
     *
     * @param User $user
     */
    public function welcomeUser(User $user)
    {
        $data = ['user' => $user, 'code' => $user->getActivationCode()];
        Mail::queue('emails.user.welcome', $data, function (Message $message) use ($user) {
            $message->to($user->email);
        });
    }

    /**
     * Sends an email notifying the owner that its trial is about to end
     *
     * @param Site $site
     */
    public function notifyTrialEndsSoon(Site $site)
    {
        Mail::queue('emails.subscription.trial-about-end', [], function ($message) use ($site) {
            $message->to($site->email);
        });
    }

    /**
     * @param Site $site
     */
    public function notifyPaymentSuccessful(Site $site)
    {
        Mail::queue('emails.subscription.payment-success', [], function ($message) use ($site) {
            $message->to($site->email);
        });
    }
}
