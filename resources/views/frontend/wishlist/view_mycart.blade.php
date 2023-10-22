@extends('frontend.main_master')
@section('content')

@section('title')
    @if (session()->get('language') == 'slovenian')
        Košarica
    @else
        My Cart Page
    @endif
@endsection

<div class="bee-content-block">
    <div class="container">
        <div class="row flex-lg-row-reverse">

            @if (session()->get('language') == 'slovenian')
                <div class="col-12 col-lg-9">
                    <div class="my-account-page-title">
                        <h3>Število artiklov v košarici je <span id="cartQty"></span></h3>

                    </div>
                    <div id="cartPage"></div>
                    @if ($cartQty > 0)
                        <div class="col-md-4 col-sm-12 estimate-ship-tax mt-3">
                            @if (Session::has('coupon'))
                            @else
                                <table class="table" id="couponField">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="estimate-title">Koda za popust</span>
                                                <p>Vnesite kodo kupona, če ga imate..</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control unicase-form-control text-input"
                                                        placeholder="Koda za popust ..." id="coupon_name">
                                                </div>
                                                <div class="clearfix pull-right">
                                                    <button type="submit" class="btn-upper btn btn-primary"
                                                        onclick="applyCoupon()">Potrdite kupon</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody><!-- /tbody -->
                                </table><!-- /table -->
                            @endif


                        </div><!-- /.estimate-ship-tax -->

                        <div id="cartTotals">

                        </div>
                    @endif
                </div>
            @else
                <div class="col-12 col-lg-9">
                    <div class="my-account-page-title">
                        <h3>You have <span id="cartQty"></span> item(s) in your shopping cart</h3>
                    </div>
                    <div id="cartPage"></div>
                    @if ($cartQty > 0)
                        <div class="col-md-4 col-sm-12 estimate-ship-tax">
                            @if (Session::has('coupon'))
                            @else
                                <table class="table" id="couponField">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="estimate-title">Discount Code</span>
                                                <p>Enter your coupon code if you have one..</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control unicase-form-control text-input"
                                                        placeholder="You Coupon.." id="coupon_name">
                                                </div>
                                                <div class="clearfix pull-right">
                                                    <button type="submit" class="btn-upper btn btn-primary"
                                                        onclick="applyCoupon()">APPLY COUPON</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody><!-- /tbody -->
                                </table><!-- /table -->
                            @endif


                        </div><!-- /.estimate-ship-tax -->

                        <div id="cartTotals">

                        </div>
                    @endif
                </div>
            @endif
            @include('frontend.common.my_account_sidebar')
        </div>
    </div>
</div>
@endsection
