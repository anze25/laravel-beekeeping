@extends('frontend.main_master')
@section('content')

@section('title')
    My account Overview
@endsection

<div class="bee-content-block">
    <div class="container">
        <div class="row flex-lg-row-reverse">
            <div class="col-12 col-lg-9">
                <div class="my-account-page-title">
                    <h3>Your Shopping Cart (3 items)</h3>
                </div>
                <div id="cartPage"></div>

                <div class="cart-total-section">
                    <h3>Cart totals</h3>
                    <div class="cart-total-block">
                        <ul>
                            <li><span>Subtotal:</span><span id="cartSubTotal"> €</span></li>
                            <li><span>Shipping:</span><span></span></li>
                            <li><span>All Total:</span><span id="cartSubTotal"></span></li>
                        </ul>
                    </div>
                    <button type="submit" class="btn btn-submit">Proceed to checkout</button>
                </div>
            </div>
            @include('frontend.common.my_account_sidebar')
        </div>
    </div>
</div>
@endsection
