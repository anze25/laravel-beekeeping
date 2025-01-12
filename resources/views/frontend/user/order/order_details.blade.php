@extends('frontend.main_master')
@section('content')
@section('title')
    @if (session()->get('language') == 'slovenian')
        Pregled naročila
    @else
        Order reviewe
    @endif
@endsection
<div class="bee-content-block checkbox-block">
    <div class="container">
        <div class="row flex-lg-row-reverse">
            @if (session()->get('language') == 'slovenian')
                <div class="col-12 col-lg-9">
                    <div class="defalt-address">
                        <h6>Podatki o naročilu</h6>
                        </h6>
                        <div class="my-account-section ml-3">
                            <ul>
                                <li><span>Ime in priimek:</span><span>{{ $order->first_name }}
                                        {{ $order->last_name }}</span></li>
                                <li><span>Naslov za dostavo:</span>
                                    <span>{{ $order->shipping_address }}<br>
                                        {{ $order->shipping_postal_code }} {{ $order->shipping_city }}<br>
                                        {{ $order->shipping_country }}</span>
                                </li>
                                <li><span>GSM:</span><span>{{ $order->phone }}</span></li>
                            </ul>
                        </div>
                        <div class="my-account-section ml-3">
                            <ul>
                                <li><span>Vrsta plačila:</span><span>{{ $order->payment_type }}</span></li>
                                <li><span>Način plačila:</span><span>{{ $order->payment_method }}</span></li>
                                <li><span>ID transakcije:</span><span>{{ $order->transaction_id }}</span></li>
                                <li><span>Številka naročila:</span><span>{{ $order->order_number }}</span></li>
                                <li><span>Datum naročila:</span><span>{{ $order->order_date }}</span></li>
                                <li><span>Številka računa:</span><span>{{ $order->invoice_no }}</span></li>


                            </ul>
                        </div>
                    </div>
                    <h4 class="mb20">Artikli v naročilu:</h4>
                    @foreach ($orderItem as $item)
                        <div class="order-section">
                            <div class="order-top justify-content-end">
                                <div class="order-id mr-auto"> <b>{{ $item->product->product_name_slo }} </b> </div>

                            </div>
                            <div class="order-details">
                                <div class="order-product">
                                    <div class="order-product-img"><img
                                            src="/frontend/images/products/thumbs/{{ $item->product->product_thumbnail }}"
                                            alt="Product 1" />
                                    </div>
                                    <div class="order-product-title">
                                        <span>Velikost:</span> <span>{{ explode(', ', $item->size)[1] }} <br>
                                            <span>Barva:</span> <span>{{ explode(', ', $item->color)[1] }}
                                    </div>
                                </div>
                                <div class="order-status"> Cena: <b>{{ $item->price }} €</b>
                                    <div class="quantity"><span>Količina:</span> <span>{{ $item->qty }}

                                        </span></div>
                                </div>
                                <div class="order-action"> Skupaj: <b>{{ $item->price * $item->qty }} €</b> </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="order-section">
                        <div class="order-top justify-content-end">
                            <div> <span>Končni znesek:
                                    <b>{{ $order->amount }}
                                        €</b></span>
                            </div>

                        </div>

                    </div>
                </div>
            @else
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
                                        <span>Size:</span> <span>{{ explode(', ', $item->size)[0] }} <br>
                                            <span>Color:</span> <span>{{ explode(', ', $item->color)[0] }}
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
            @endif
            @include('frontend.common.my_account_sidebar')
        </div>
    </div>
</div>
@endsection
