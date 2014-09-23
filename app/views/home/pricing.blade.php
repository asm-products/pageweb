@extends('layouts.main')
@section('title', 'Pricing')

@section('styles')
<link rel="stylesheet" href="{{ URL::asset('asset/css/tabble.css') }}">
@stop

@section('content')

<section id="header-space"></section>
<section id="headline">
    <div class="container  text-center">
        <h3>Pricing</h3>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="col-md-12 text-center">
            <h2>Get a 30-Day FREE Trial On All Plans</h2>
            <p>Select a plan & sign up in 60 seconds. Upgrade, downgrade, cancel at any time</p>
            <p>Choose either monthly or annual pricing in the next step</p>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
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
                                    <a href="{{ URL::route('login', ['provider' => 'facebook']) }}" class="btn btn-custom">Sign Up</a>
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
                                    <a href="{{ URL::route('login', ['provider' => 'facebook']) }}" class="btn btn-custom">Sign Up</a>
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
                                    <a href="{{ URL::route('login', ['provider' => 'facebook']) }}" class="btn btn-custom">Sign Up</a>
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
                                    <a href="{{ URL::route('login', ['provider' => 'facebook']) }}" class="btn btn-custom">Sign Up</a>
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
                                    <a href="{{ URL::route('login', ['provider' => 'facebook']) }}" class="btn btn-custom">Sign Up</a>
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
                                    <a href="{{ URL::route('login', ['provider' => 'facebook']) }}" class="btn btn-custom">Sign Up</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<section class="section">
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h3>FAQ on payment</h3>
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading"><strong>Q:</strong> How does the 30-day free trial work?</h4>
                    <p class="list-group-item-text"><strong>A:</strong> The first 30 days are absolutely free. You can cancel anytime during those 30 days and pay nothing. We ask for your billing information up-front to reduce fraud and to prevent service interruption.</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading"><strong>Q:</strong> What happens after my 30-day free trial ends?</h4>
                    <p class="list-group-item-text"><strong>A:</strong>  You will be billed after the end of your 30-day free trial for the plan you selected.</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading"><strong>Q:</strong> Can I change plans after I launch my website?</h4>
                    <p class="list-group-item-text"><strong>A:</strong> Absolutely! You can change plans at any time.</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading"><strong>Q:</strong> What payment methods do you support?</h4>
                    <p class="list-group-item-text"><strong>A:</strong> We support Visa, MasterCard, American Express, and PayPal.</p>
                </a>
            </div>
        </div>
    </div>
</section>

@stop
