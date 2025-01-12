@extends('frontend.main_master')
@section('content')

@section('title')
    @if (session()->get('language') == 'slovenian')
        Moji nakupi
    @else
        My Orders
    @endif
@endsection

<div class="bee-content-block">
    <div class="container">
        <div class="row flex-lg-row-reverse">
            @if (session()->get('language') == 'slovenian')
                <div class="col-12 col-lg-9">
                    <div class="my-account-page-title">
                        <h3>Moji nakupi</h3>
                    </div>

                    @forelse ($orders as $order)
                        <div class="order-section">
                            <div class="order-top justify-content-end">
                                <div class="order-id mr-auto"> Številka naročila: <b>{{ $order->invoice_no }}</b><br>
                                    Datum naročila: <small>{{ $order->order_date }}</small> </div>
                                <div class="order-ammount"> Znesek naročila: <strong>{{ $order->amount }} €</strong>
                                </div>
                                <div class="delete-order"> <a href=""><i class="fa fa-trash-o"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="order-details">
                                <div class="order-product">
                                    <div class="order-product-img"><img src="assets/images/product-1.jpg"
                                            alt="" />
                                    </div>
                                    <div class="order-product-title"> <a href="">
                                            <h5>Beekeeping Hive</h5>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                                Lorem
                                                Ipsum has been the industry's standard dummy text.</p>
                                        </a> </div>
                                </div>
                                <div class="order-status">

                                    <h6>
                                        @php
                                            switch ($order->status) {
                                                case 'pending':
                                                    echo 'Naročilo v čakanju';
                                                    break;
                                                case 'confirm':
                                                    echo 'Naročilo potrjeno';
                                                    break;
                                                case 'processing':
                                                    echo 'Naročilo v obdelavi';
                                                    break;
                                                case 'picked':
                                                    echo 'Naročilo prevzeto';
                                                    break;
                                                case 'shipped':
                                                    echo 'Naročilo odposlano';
                                                    break;
                                                case 'delivered':
                                                    echo 'Naročilo dostavljeno';
                                                    break;
                                                case 'cancel':
                                                    echo 'Naročilo ste preklicali dne ' . $order->cancel_date;
                                                    break;
                                            }
                                        @endphp


                                    </h6>

                                </div>
                                <div class="order-action">
                                    <a href="{{ url('user/order_details/' . $order->id) }}"
                                        class="btn-action btn-dispute">Ogled naročila</a>
                                    @if ($order->status != 'cancel')
                                        <a href="{{ url('user/order/tracking/' . $order->invoice_no) }}"
                                            class="btn-action btn-track">Sledi naročilu</a>

                                        <a href="{{ route('cancel.order', $order->id) }}"
                                            class="btn-action btn-cancel">Prekliči nakup</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @empty
                        <div>Ni naročil.</div>
                    @endforelse



                </div>
            @else
                <div class="col-12 col-lg-9">
                    <div class="my-account-page-title">
                        <h3>My Orders</h3>
                    </div>

                    @forelse ($orders as $order)
                        <div class="order-section">
                            <div class="order-top justify-content-end">
                                <div class="order-id mr-auto"> Order ID: <b>{{ $order->invoice_no }}</b><br>
                                    Order date: <small>{{ $order->order_date }}</small> </div>
                                <div class="order-ammount"> Order amount: <strong>{{ $order->amount }} €</strong> </div>
                                <div class="delete-order"> <a href=""><i class="fa fa-trash-o"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="order-details">
                                <div class="order-product">
                                    <div class="order-product-img"><img src="assets/images/product-1.jpg"
                                            alt="" />
                                    </div>
                                    <div class="order-product-title"> <a href="">
                                            <h5>Beekeeping Hive</h5>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                                Lorem
                                                Ipsum has been the industry's standard dummy text.</p>
                                        </a> </div>
                                </div>
                                <div class="order-status">

                                    <h6>
                                        @php
                                            switch ($order->status) {
                                                case 'pending':
                                                    echo 'Order Pending';
                                                    break;
                                                case 'confirm':
                                                    echo 'Order Confirmed';
                                                    break;
                                                case 'processing':
                                                    echo 'Order Processing';
                                                    break;
                                                case 'picked':
                                                    echo 'Order picked';
                                                    break;
                                                case 'shipped':
                                                    echo 'Order shipped';
                                                    break;
                                                case 'delivered':
                                                    echo 'Order delivered';
                                                    break;
                                                case 'cancel':
                                                    echo 'You cancelled this order on ' . $order->cancel_date;
                                                    break;
                                            }
                                        @endphp


                                    </h6>

                                </div>
                                <div class="order-action">
                                    <a href="{{ url('user/order_details/' . $order->id) }}"
                                        class="btn-action btn-dispute">View Order</a>
                                    @if ($order->status != 'cancel')
                                        <a href="{{ url('user/order/tracking/' . $order->invoice_no) }}"
                                            class="btn-action btn-track">Track
                                            Order</a>
                                        <a href="{{ route('cancel.order', $order->id) }}"
                                            class="btn-action btn-cancel">Cancel
                                            Order</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @empty
                        <div>You haven't place any orders yet.</div>
                    @endforelse



                </div>
            @endif
            @include('frontend.common.my_account_sidebar')
        </div>
    </div>
</div>
@endsection
