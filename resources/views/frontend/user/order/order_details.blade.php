@extends('frontend.main_master')
@section('content')
    <div class="bee-content-block checkbox-block">
        <div class="container">
            <div class="row flex-lg-row-reverse">
                <div class="col-12 col-lg-9">
                    <div class="defalt-address">
                        <h6>Order Details</h6>
                        </h6>
                        <div class="my-account-section ml-3">
                            <ul>
                                <li><span>Name:</span><span>{{ $order->name }}</span></li>
                                <li><span>Shipping Address:</span>
                                    <span>{{ $order->shipping_address }}<br>
                                        {{ $order->shipping_postal_code }} {{ $order->shipping_city }}<br>
                                        {{ $order->shipping_country }}</span>
                                </li>
                                <li><span>Mobile:</span><span>{{ $order->phone }}</span></li>
                            </ul>
                        </div>
                        <div class="my-account-section ml-3">
                            <ul>
                                <li><span>Payment type:</span><span>{{ $order->payment_type }}</span></li>
                                <li><span>Payment method:</span><span>{{ $order->payment_method }}</span></li>
                                <li><span>Transaction id:</span><span>{{ $order->transaction_id }}</span></li>
                                <li><span>Order number:</span><span>{{ $order->order_number }}</span></li>
                                <li><span>Order date:</span><span>{{ $order->order_date }}</span></li>
                                <li><span>Invoice number:</span><span>{{ $order->invoice_no }}</span></li>


                            </ul>
                        </div>
                    </div>
                    <h4 class="mb20">Items in your order</h4>
                    @foreach ($orderItem as $item)
                        <div class="order-section">
                            <div class="order-top justify-content-end">
                                <div class="order-id mr-auto"> <b>{{ $item->product->product_name_en }} </b> </div>

                            </div>
                            <div class="order-details">
                                <div class="order-product">
                                    <div class="order-product-img"><img
                                            src="/frontend/images/products/thumbs/{{ $item->product->product_thumbnail }}"
                                            alt="Product 1" />
                                    </div>
                                    <div class="order-product-title">
                                        <span>Size:</span> <span>{{ $item->size }} <br>
                                            <span>Color:</span> <span>{{ $item->color }}
                                    </div>
                                </div>
                                <div class="order-status"> Price: <b>{{ $item->price }} €</b>
                                    <div class="quantity"><span>Quantity:</span> <span>{{ $item->qty }}

                                        </span></div>
                                </div>
                                <div class="order-action"> Subtotal: <b>{{ $item->price * $item->qty }} €</b> </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="order-section">
                        <div class="order-top justify-content-end">
                            <div> <span>Total:
                                    <b>{{ $order->amount }}
                                        €</b></span>
                            </div>

                        </div>

                    </div>
                </div>
                @include('frontend.common.my_account_sidebar')
            </div>
        </div>
    </div>
@endsection
