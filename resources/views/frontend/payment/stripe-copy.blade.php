@extends('frontend.main_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
    Stripe Payment Page
@endsection


<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>

<div class="bee-content-block checkbox-block">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="track-result-step pt0">
                    <ul class="track-progress step-number3">
                        <li class="progress-active">Review your Order</li>
                        <li class="progress-active">Payment</li>
                        <li class="">Done</li>
                    </ul>
                </div>
                <div class='container'>
                    <div class='window'>
                        <div class='order-info'>
                            <div class='order-info-content'>
                                <h2>Order Summary</h2>
                                <div class='line'></div>


                                <div class='total'>
                                    <span style='float:left;'>
                                        <div class='thin dense'>SubTotal</div>
                                        <div class='thin dense'>Coupon Name</div>
                                        <div class='thin dense'>Coupon Discount</div>
                                        <hr>
                                        TOTAL
                                    </span>
                                    <span style='float:right; text-align:right;'>
                                        <div class='thin dense'>{{ $cartTotal }}</div>
                                        <div class='thin dense'>{{ session()->get('coupon')['coupon_name'] }}
                                            ( {{ session()->get('coupon')['coupon_discount'] }} % )</div>
                                        <div class='thin dense'>{{ session()->get('coupon')['discount_amount'] }}</div>
                                        <hr>
                                        ${{ session()->get('coupon')['total_amount'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class='credit-info'>
                            <div class='credit-info-content'>
                                <form action="{{ route('stripe.order') }}" method="post" id="payment-form">
                                    @csrf
                                    <img src='https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png'
                                        height='80' class='credit-card-image' id='credit-card-image'>
                                    <input type="hidden" name="first_name" value="{{ $data['first_name'] }}">
                                    <input type="hidden" name="last_name" value="{{ $data['last_name'] }}">
                                    <input type="hidden" name="shipping_address"
                                        value="{{ $data['shipping_address'] }}">
                                    <input type="hidden" name="shipping_postal_code"
                                        value="{{ $data['shipping_postal_code'] }}">
                                    <input type="hidden" name="shipping_city" value="{{ $data['shipping_city'] }}">
                                    <input type="hidden" name="shipping_country"
                                        value="{{ $data['shipping_country'] }}">
                                    {{-- <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                    <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                    <input type="hidden" name="state_id" value="{{ $data['state_id'] }}"> --}}
                                    <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>
                                    <button class='pay-btn'>Pay</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:400,300,700);


    .dropdown-select.visible {
        display: block;
    }

    .dropdown {
        position: relative;
    }

    ul {
        margin: 0;
        padding: 0;
    }

    ul li {
        list-style: none;
        padding-left: 10px;
        cursor: pointer;
    }

    ul li:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    .dropdown-select {
        position: absolute;
        background: #77aaee;
        text-align: left;
        box-shadow: 0px 3px 5px 0px rgba(0, 0, 0, 0.1);
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        width: 90%;
        left: 2px;
        line-height: 2em;
        margin-top: 2px;
        box-sizing: border-box;
    }

    .thin {
        font-weight: 400;
    }

    .small {
        font-size: 12px;
        font-size: .8rem;
    }

    .half-input-table {
        border-collapse: collapse;
        width: 100%;
    }

    .half-input-table td:first-of-type {
        border-right: 10px solid #4488dd;
        width: 50%;
    }

    .window {
        height: 540px;
        width: 800px;
        background: #fff;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        box-shadow: 0px 15px 50px 10px rgba(0, 0, 0, 0.2);
        border-radius: 30px;
        z-index: 10;
    }

    .order-info {
        height: 100%;
        width: 50%;
        padding-left: 25px;
        padding-right: 25px;
        box-sizing: border-box;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        position: relative;
    }

    .price {
        bottom: 0px;
        position: absolute;
        right: 0px;
        color: #4488dd;
    }

    .order-table td:first-of-type {
        width: 25%;
    }

    .order-table {
        position: relative;
    }

    .line {
        height: 1px;
        width: 100%;
        margin-top: 10px;
        margin-bottom: 10px;
        background: #ddd;
    }

    .order-table td:last-of-type {
        vertical-align: top;
        padding-left: 25px;
    }

    .order-info-content {
        table-layout: fixed;

    }

    .full-width {
        width: 100%;
    }

    .pay-btn {
        border: none;
        background: #22b877;
        line-height: 2em;
        border-radius: 10px;
        font-size: 19px;
        font-size: 1.2rem;
        color: #fff;
        cursor: pointer;
        position: absolute;
        bottom: 25px;
        width: calc(100% - 50px);
        -webkit-transition: all .2s ease;
        transition: all .2s ease;
    }

    .pay-btn:hover {
        background: #22a877;
        color: #eee;
        -webkit-transition: all .2s ease;
        transition: all .2s ease;
    }

    .total {
        margin-top: 25px;
        font-size: 20px;
        font-size: 1.3rem;
        position: absolute;
        bottom: 30px;
        right: 27px;
        left: 35px;
    }

    .dense {
        line-height: 1.2em;
        font-size: 16px;
        font-size: 1rem;
    }

    .input-field {
        background: rgba(255, 255, 255, 0.1);
        margin-bottom: 10px;
        margin-top: 3px;
        line-height: 1.5em;
        font-size: 20px;
        font-size: 1.3rem;
        border: none;
        padding: 5px 10px 5px 10px;
        color: #fff;
        box-sizing: border-box;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .credit-info {
        background: #4488dd;
        height: 100%;
        width: 50%;
        color: #eee;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        font-size: 14px;
        font-size: .9rem;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        box-sizing: border-box;
        padding-left: 25px;
        padding-right: 25px;
        border-top-right-radius: 30px;
        border-bottom-right-radius: 30px;
        position: relative;
    }

    .dropdown-btn {
        background: rgba(255, 255, 255, 0.1);
        width: 100%;
        border-radius: 5px;
        text-align: center;
        line-height: 1.5em;
        cursor: pointer;
        position: relative;
        -webkit-transition: background .2s ease;
        transition: background .2s ease;
    }

    .dropdown-btn:after {
        content: '\25BE';
        right: 8px;
        position: absolute;
    }

    .dropdown-btn:hover {
        background: rgba(255, 255, 255, 0.2);
        -webkit-transition: background .2s ease;
        transition: background .2s ease;
    }

    .dropdown-select {
        display: none;
    }

    .credit-card-image {
        display: block;
        max-height: 80px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 35px;
        margin-bottom: 15px;
    }

    .credit-info-content {
        margin-top: 25px;
        -webkit-flex-flow: column;
        -ms-flex-flow: column;
        flex-flow: column;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        width: 100%;
    }

    @media (max-width: 600px) {
        .window {
            width: 100%;
            height: 100%;
            display: block;
            border-radius: 0px;
        }

        .order-info {
            width: 100%;
            height: auto;
            padding-bottom: 100px;
            border-radius: 0px;
        }

        .credit-info {
            width: 100%;
            height: auto;
            padding-bottom: 100px;
            border-radius: 0px;
        }

        .pay-btn {
            border-radius: 0px;
        }
    }
</style>

<script type="text/javascript">
    // Create a Stripe client.
    var stripe = Stripe(
        'pk_test_ceJYhhUcX0MgkuhnDSUAmDA8'
    );
    // Create an instance of Elements.
    var elements = stripe.elements();
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });
    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
    }
</script>

@endsection
