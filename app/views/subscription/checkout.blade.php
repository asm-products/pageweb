@extends('layouts.dashboard')
@section('title', 'Checkout')
@section('content')

<div class="invoice">
    <div class="row">
        <div class="col-sm-6 invoice-left">
        </div>
        <div class="col-sm-6 invoice-right">
            <span><?php echo date('l jS \of F Y h:i:s A'); ?></span>
        </div>
    </div>

    <hr class="margin" />
    <div class="row">
        <div class="col-sm-6 invoice-left">
            {{ $user->first_name }} {{ $user->last_name }}
            <br />
            {{ $user->email }} 
        </div>

        <div class="col-md-6 invoice-right">
            <h4>Payment Details:</h4>
            <strong>Page Name:</strong> {{ $site->title }}
            <br />
            <strong>Page ID:</strong> {{ $site->id }}
        </div>
    </div>

    <div class="margin"></div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th width="60%">Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td>{{ $plan->title }} for {{ $site->title }} Website</td>
                <td>1</td>
                <td class="text-right">${{ $plan->amount }}</td>
            </tr>
        </tbody>
    </table>
    <div class="margin"></div>
    <div class="row">
        <div class="col-sm-6">
            <div class="invoice-left">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="invoice-right">
                <ul class="list-unstyled">
                    <li>
                        Sub - Total amount: 
                        <strong>${{ $plan->amount }}</strong>
                    </li>
                    <li>
                        Discount: 
                        -----
                    </li>
                    <li>
                        Grand Total:
                        <strong>${{ $plan->amount }}</strong>
                    </li>
                </ul>
                <br />
                <button id="customStripePaymentButton" class="btn btn-info btn-icon icon-left hidden-print">
                    Proceed with Payment
                    <i class="entypo-credit-card"></i>
                </button>
            </div>

        </div>

    </div>
</div>

<form id="checkout-payment-form" action="" method="POST">
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script type="text/javascript">
        // Disable the payment/submit button until everything has loaded
        // (if Stripe fails to load, we can't progress anyway)  
        $(document).ready(function() {
            $("#customStripePaymentButton").prop('disabled', false)
        })
  
        var handler = StripeCheckout.configure({
            key: '{{ Config::get('pageweb.stripe_publishable_key'); }}',
            image: '{{ URL::asset('asset/img/square-logo.png'); }}',
            token: function(token, args) {
                // Use the token to create the charge with a server-side script.
                // You can access the token ID with `token.id`
                var stripeToken = $('<input type="hidden" name="stripeToken" />').val(token.id);
                var pagewebPlan = $('<input type="hidden" name="plan" value="{{$plan->name;}}" />');
                $('a').bind("click", function() { return false; });
                $('button').addClass('disabled');
                $('form').append(stripeToken).append(pagewebPlan).submit();
            }
        });

        document.getElementById('customStripePaymentButton').addEventListener('click', function(e) {
            // Open Checkout with further options
            handler.open({
                name: '{{ $plan->title }}',
                description: '{{ $plan->title }} for {{ $site->title }} Website',
                amount: '{{ $plan->amount * 100 }}',
                email: '{{ $user->email }}'
            });
            e.preventDefault();
        });
    </script>
</form>
@stop
