<?php
/**
 * @var $site \PageWeb\Site\SiteProvider
 */
$subscription = $site->site->subscription;

?>
<section class="editor-vertical-box editor-window editor-panel-small" id="editor-item-subscription-window">
    <div class="editor-window-header clearfix">
        <h3>Subscription</h3>
    </div>
    <div class="editor-window-content-wrapper">
        <div class="editor-window-content">
            <div class="editor-window-content-inner">
                <div class="container-fluid">
                    <div class="row">
                        @if (Sentry::check())
                            @if ($subscription)
                            <div class="col-lg-12">
                                <div class="panel first panel-default panel-editor">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Current Subscription</h3>
                                    </div>
                                    <div class="panel-body">
                                        @if ($subscription->onTrial())
                                        Trial
                                        @else
                                        {{ $subscription->plan->title }}
                                        @endif
                                    </div>
                                </div>

                                @if ($subscription->subscribed())
                                <a
                                    href="{{ URL::route('sites.subscription.plans', ['id' => $site->getId()]) }}"
                                    class="btn btn-block btn-success btn-lg">
                                    Upgrade Plan
                                </a>

                                <button class="btn btn-block btn-danger btn-lg">Cancel Plan</button>
                                @endif

                                <div class="panel panel-default panel-editor">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Suggested Plan</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p>Personally, I think you should try out</p>
                                        <h4># Personal Monthly</h4>
                                    </div>
                                </div>
                            </div>
                            @else
                            <p>
                                You need to choose a subscription plan before you can access
                                some features and publish your site.

                                <ul class="list-group">
                                    @foreach ($subscriptionPlans as $subscriptionPlan)
                                    <li class="list-group-item">
                                        <a href="{{ URL::route('sites.subscription.checkout', ['site_id' => $site->getId()]) }}?plan={{ $subscriptionPlan->name }}">
                                            <h4>{{ $subscriptionPlan->title }}</h4>
                                            <p>{{ $subscriptionPlan->description }}</p>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </p>
                            @endif
                        @else
                            <p>You are not logged in</p>

                            <a href="{{ URL::route('login', ['provider' => 'facebook']) }}">
                                Login Here
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>