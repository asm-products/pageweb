@extends('layouts.dashboard')
@section('title', 'Upgrade Plan')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tabs-vertical-env">
            <ul class="nav tabs-vertical right-aligned">
                <li class="active"><a href="#monthly" data-toggle="tab" style="text-align: center;">Monthly Price</a></li>
                <li><a href="#yearly" data-toggle="tab" style="text-align:center;"><strong>Save 20%</strong> by paying annually</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="monthly">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <ul class="plan">
                            <li class="plan-name">Personal</li>
                            <li class="plan-price"><strong>$6</strong> month</li>
                            <li><strong>Automatic</strong> Sync</li>
                            <li><strong>Unlimited</strong> Themes</li>
                            <li><strong>Unlimited</strong> Add-ons</li>
                            <li><strong>Design</strong> Options</li>
                            <li><strong>Quick</strong> Support</li>
                            <li><strong>A subdomain of</strong> pageweb.co</li>
                            <li class="plan-action">
                                <a {{($subscription->stripe_plan == 'pw_personal_monthly') ? 'disabled="disabled"' : null}} href="{{URL::route('subscription.checkout', ['site_id' => $siteId])}}?plan=pw_personal_monthly&upgrade=true" class="btn btn-custom">Select</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <ul class="plan">
                            <li class="plan-name">Business</li>
                            <li class="plan-price"><strong>$14</strong> month</li>
                            <li><strong>Automatic</strong> Sync</li>
                            <li><strong>Unlimited</strong> Themes</li>
                            <li><strong>Unlimited</strong> Add-ons</li>
                            <li><strong>Design</strong> Options</li>
                            <li><strong>Quick</strong> Support</li>
                            <li><strong>Custom</strong> Domain</li>
                            <li><strong>Custom</strong> Pages</li>
                            <li class="plan-action">
                                <a href="{{URL::route('sites.subscription.checkout', ['site_id' => $siteId])}}?plan=pw_business_monthly&upgrade=true" class="btn btn-custom">Select</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <ul class="plan">
                            <li class="plan-name">Professional</li>
                            <li class="plan-price"><strong>$20</strong> month</li>
                            <li><strong>Automatic</strong> Sync</li>
                            <li><strong>Unlimited</strong> Themes</li>
                            <li><strong>Unlimited</strong> Add-ons</li>
                            <li><strong>Design</strong> Options</li>
                            <li><strong>Quick</strong> Support</li>
                            <li><strong>Custom</strong> Domain</li>
                            <li><strong>Custom</strong> Pages</li>
                            <li class="plan-action">
                                <a href="{{URL::route('sites.subscription.checkout', ['site_id' => $siteId])}}?plan=pw_professional_monthly&upgrade=true" class="btn btn-custom">Select</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane" id="yearly">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <ul class="plan">
                            <li class="plan-name">Personal</li>
                            <li class="plan-price"><strong style="color: #0075B0">$4.80</strong> month</li>
                            <li><strong>Automatic</strong> Sync</li>
                            <li><strong>Unlimited</strong> Themes</li>
                            <li><strong>Unlimited</strong> Add-ons</li>
                            <li><strong>Design</strong> Options</li>
                            <li><strong>Quick</strong> Support</li>
                            <li><strong>Custom</strong> Domain</li>
                            <li class="plan-action">
                                <a href="{{URL::route('sites.subscription.checkout', ['site_id' => $siteId])}}?plan=pw_personal_yearly&upgrade=true" class="btn btn-custom">Select</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <ul class="plan">
                            <li class="plan-name">Business</li>
                            <li class="plan-price"><strong style="color: #0075B0">$11.20</strong> month</li>
                            <li><strong>Automatic</strong> Sync</li>
                            <li><strong>Unlimited</strong> Themes</li>
                            <li><strong>Unlimited</strong> Add-ons</li>
                            <li><strong>Design</strong> Options</li>
                            <li><strong>Quick</strong> Support</li>
                            <li><strong>Custom</strong> Domain</li>
                            <li><strong>Custom</strong> Pages</li>
                            <li class="plan-action">
                                <a href="{{URL::route('sites.subscription.checkout', ['site_id' => $siteId])}}?plan=pw_business_yearly&upgrade=true" class="btn btn-custom">Select</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Table 3 -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <ul class="plan">
                            <li class="plan-name">Professional</li>
                            <li class="plan-price"><strong style="color: #0075B0">$16</strong> month</li>
                            <li><strong>Automatic</strong> Sync</li>
                            <li><strong>Unlimited</strong> Themes</li>
                            <li><strong>Unlimited</strong> Add-ons</li>
                            <li><strong>Design</strong> Options</li>
                            <li><strong>Quick</strong> Support</li>
                            <li><strong>Custom</strong> Domain</li>
                            <li><strong>Custom</strong> Pages</li>
                            <li class="plan-action">
                                <a href="{{URL::route('sites.subscription.checkout', ['site_id' => $siteId])}}?plan=pw_professional_yearly&upgrade=true" class="btn btn-custom">Select</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
