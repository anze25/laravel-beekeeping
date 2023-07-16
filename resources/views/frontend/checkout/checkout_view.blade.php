@extends('frontend.main_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
    @if (session()->get('language') == 'slovenian')
        Blagajna
    @else
        Checkout Page
    @endif
@endsection

<div class="bee-content-block checkbox-block">
    <div class="container">
        <div class="row">
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="col-12">
                    <div class="track-result-step pt0">
                        <ul class="track-progress step-number3">
                            <li class="progress-active">Review your Order</li>
                            <li class="">Payment</li>
                            <li class="">Done</li>
                        </ul>
                    </div>
                    <h4 class="mb20">1. Select your shipping information:</h4>
                    <div class="defalt-address">
                        <h6>Defalt Address <span><a href=""><i class="fa fa-edit"
                                        aria-hidden="true"></i></a></span>
                        </h6>
                        <div class="my-account-section">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul>
                                        <li><span>First Name:</span>
                                            <span>
                                                <input type="text" id="first_name" name="first_name"
                                                    value="{{ Auth::user()->first_name }}" required=""
                                                    class="form-control">
                                            </span>
                                        </li>
                                        <li>
                                            <span>Last Name:</span>
                                            <span>
                                                <input type="text" name="last_name"
                                                    value="{{ Auth::user()->last_name }}" required="" id="last_name"
                                                    class="form-control"></span>
                                        </li>

                                        <li>
                                            <span>Mobile:</span>
                                            <span>
                                                <input type="text" name="shipping_phone" required=""
                                                    class="form-control" value="{{ Auth::user()->phone }}"></span>
                                        </li>
                                        <li>
                                            <span>Notes:</span><span>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">
                                                    </label>
                                                    <textarea class="form-control" name="notes" id="" cols="30" rows="3"></textarea>
                                                </div>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li>
                                            <span>Address</span>
                                            <span>
                                                <input type="text" name="shipping_address" name="shipping_address"
                                                    required="" id="shipping_address"
                                                    value="{{ Auth::user()->shipping_address }}" class="form-control">
                                            </span>
                                        </li>
                                        <li>
                                            <span>Postal code</span>
                                            <span>
                                                <input type="text" name="shipping_postal_code"
                                                    name="shipping_postal_code" required="" id="shipping_postal_code"
                                                    value="{{ Auth::user()->shipping_postal_code }}"
                                                    class="form-control">
                                            </span>
                                        </li>
                                        <li>
                                            <span>City</span>
                                            <span>
                                                <input type="text" name="shipping_city" name="shipping_city"
                                                    required="" id="shipping_city"
                                                    value="{{ Auth::user()->shipping_city }}" class="form-control">
                                            </span>
                                            @error('shipping_city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </li>
                                        <li>
                                            <span>Country</span>
                                            <span>
                                                <input type="text" name="shipping_country" name="shipping_country"
                                                    required="" id="shipping_country"
                                                    value="{{ Auth::user()->shipping_country }}" class="form-control">
                                            </span>
                                            @error('shipping_country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </li>


                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>
                    <h4 class="mb20">2. Review and confirm your order (3 items):</h4>
                    @foreach (Cart::content() as $item)
                        <div class="order-section">
                            <div class="order-top justify-content-end">
                                <div class="order-id mr-auto"> Added to cart:
                                    <b>{{ $item->options->created_at }}</b> </b>
                                </div>
                                <div class="delete-order"> <a href=""><i class="fa fa-trash-o"
                                            aria-hidden="true"></i></a> </div>
                            </div>
                            <p></p>
                            <div class="order-details">
                                <div class="order-product">
                                    <div class="order-product-img"><img
                                            src="/frontend/images/products/thumbs/{{ $item->options->image }}"
                                            alt="Product 1" />
                                    </div>
                                    <div class="order-product-title"> <a href="">
                                            <h5>{{ $item->name }}</h5>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                                Lorem
                                                Ipsum has been the industry's standard dummy text.</p>
                                        </a> </div>
                                </div>
                                <div class="order-status"> Price: <b>{{ $item->price }} €</b>
                                    <div class="quantity"><span>Quantity:</span> <span>
                                            <b>{{ $item->qty }}</b>
                                        </span></div>
                                </div>
                                <div class="order-action"> Subtotal: <b>{{ $item->subtotal }} €</b> <a
                                        href="{{ route('mycart') }}" class="btn-action btn-buy">Back to Cart</a> </div>
                            </div>
                        </div>
                    @endforeach

                    <h4 class="mb20">4. Payment method</h4>
                    <div class="payment-method css-radio-option">
                        <ul>
                            <li>
                                <input type="radio" name="payment_method" value="cash" id="payment-option"
                                    class="css-radio" checked="checked" />
                                <label for="payment-option" class="css-label">Cash on delivery <span><i
                                            class="fa fa-money"></i></i></span></label>
                            </li>
                            <li>
                                <input type="radio" name="payment_method" value="stripe" id="payment-option2"
                                    class="css-radio" />
                                <label for="payment-option2" class="css-label">Credit Cards <span><i
                                            class="fa fa-cc-visa"></i><i class="fa fa-cc-mastercard"></i><i
                                            class="fa fa-cc-amex"></i><i class="fa fa-cc-discover"></i></span></label>
                            </li>
                        </ul>
                    </div>

                    <div class="cart-total-section mb-3">
                        <h3>Cart totals</h3>
                        <div class="cart-total-block">
                            <ul>
                                @if (Session::has('coupon'))
                                    <li><span>Subtotal:</span><span>{{ $cartTotal }}</span></li>
                                    <li><span>Coupon
                                            name:</span><span>{{ session()->get('coupon')['coupon_name'] }}
                                            ( {{ session()->get('coupon')['coupon_discount'] }} % )</span></li>
                                    <li><span>All Total:</span><span>
                                            {{ session()->get('coupon')['total_amount'] }} €</span></li>
                                @else
                                    <li><span>All Total:</span><span>{{ $cartTotal }}</span></li>
                            </ul>
                        </div>
                        @endif
                        <button type="submit" class="btn btn-submit">Confirm &amp; pay</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="state_id"]').empty();
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });



        $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "{{ url('/state-get/ajax') }}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="state_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="state_id"]').append('<option value="' +
                                value.id + '">' + value.state_name + '</option>'
                            );
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });


    });
</script>


@endsection
