@extends('frontend.main_master')
@section('content')

@section('title')
    @if (session()->get('language') == 'slovenian')
        {{ $order->order_number }}
    @else
        {{ $order->order_number }}
    @endif
@endsection

<div class="bee-content-block">
    <div class="container">
        <div class="row flex-lg-row-reverse">
            @if (session()->get('language') == 'slovenian')
                <div class="col-12 col-lg-9">
                    <div class="my-account-page-title">
                        <h3>Sledenje naročilu</h3>
                    </div>
                    <div class="track-result-step">
                        <ul class="track-progress for-process-icon step-number4">
                            @php
                                switch ($order->status) {
                                    case 'pending':
                                        echo '
                                        <li class="icon-pending-order progress-active">Na čakanju</li>
                                        <li class="icon-confirm-order">Potrjeno</li>
                                        <li class="icon-processing-order">V obdelavi</li>
                                        <li class="icon-dispatched-order">Prevzeto</li>
                                        <li class="icon-shipped-order">Odposlano</li>
                                        <li class="icon-product-deliver">Dostavljeno</li>';
                                        break;
                                    case 'confirm':
                                        echo '
                                        <li class="icon-pending-order progress-done">Na čakanju</li>
                                        <li class="icon-confirmed-order progress-active">Potrjeno</li>
                                        <li class="icon-processing-order">V obdelavi</li>
                                        <li class="icon-dispatched-order">Prevzeto</li>
                                        <li class="icon-shipped-order">Odposlano</li>
                                        <li class="icon-product-deliver">Dostavljeno</li>';
                                        break;
                                    case 'processing':
                                        echo '
                                        <li class="icon-pending-order progress-done">Na čakanju</li>
                                        <li class="icon-confirmed-order progress-done">Potrjeno</li>
                                        <li class="icon-processing-order progress-active">V obdelavi</li>
                                        <li class="icon-dispatched-order">Prevzeto</li>
                                        <li class="icon-shipped-order">Odposlano</li>
                                        <li class="icon-product-deliver">Dostavljeno</li>';
                                        break;
                                    case 'picked':
                                        echo '
                                        <li class="icon-pending-order progress-done">Na čakanju</li>
                                        <li class="icon-confirmed-order progress-done">Potrjeno</li>
                                        <li class="icon-processing-order progress-done">V obdelavi</li>
                                        <li class="icon-dispatched-order progress-active">Prevzeto</li>
                                        <li class="icon-shipped-order">Odposlano</li>
                                        <li class="icon-product-deliver">Dostavljeno</li>';
                                        break;
                                    case 'shipped':
                                        echo '
                                        <li class="icon-pending-order progress-done">Na čakanju</li>
                                        <li class="icon-confirmed-order progress-done">Potrjeno</li>
                                        <li class="icon-processing-order progress-done">V obdelavi</li>
                                        <li class="icon-dispatched-order progress-done">Prevzeto</li>
                                        <li class="icon-shipped-order progress-active">Odposlano</li>
                                        <li class="icon-product-deliver">Dostavljeno</li>';
                                        break;
                                    case 'delivered':
                                        echo '
                                        <li class="icon-pending-order progress-done">Na čakanjui</li>
                                        <li class="icon-confirmed-order progress-done"Potrjeno</li>
                                        <li class="icon-processing-order progress-done">V obdelavi</li>
                                        <li class="icon-dispatched-order progress-done">Prevzeto</li>
                                        <li class="icon-shipped-order progress-done">Odposlano</li>
                                        <li class="icon-product-deliver progress-done">Dostavljeno</li>';
                                        break;
                                }
                            @endphp


                        </ul>
                    </div>
                    <div class="tracking-information">
                        <h4>Podatki o naročilu</h4>
                        <ul>
                            <li><span>Številka naročila:</span> <span>{{ $order->order_number }}</span></li>
                            @if ($order->confirmed_date)
                                <li><span>Potrditev naročila:</span> <span>{{ $order->confirmed_date }}</span></li>
                            @endif
                            @if ($order->shipped_date)
                                <li><span>Paket odposlan:</span> <span>{{ $order->shipped_date }}</span></li>
                            @endif
                            @if ($order->delivered_date)
                                <li><span>Paket dostavljen:</span> <span>{{ $order->delivered_date }}</span></li>
                            @endif

                        </ul>

                    </div>
                </div>
            @else
                <div class="col-12 col-lg-9">
                    <div class="my-account-page-title">
                        <h3>Tracking Order</h3>
                    </div>
                    <div class="track-result-step">
                        <ul class="track-progress for-process-icon step-number4">
                            @php
                                switch ($order->status) {
                                    case 'pending':
                                        echo '
                                        <li class="icon-pending-order progress-active">Pending</li>
                                        <li class="icon-confirm-order">Confirmed</li>
                                        <li class="icon-processing-order">Processing</li>
                                        <li class="icon-dispatched-order">Picked</li>
                                        <li class="icon-shipped-order">Shipped</li>
                                        <li class="icon-product-deliver">Delivered</li>';
                                        break;
                                    case 'confirm':
                                        echo '
                                        <li class="icon-pending-order progress-done">Pending</li>
                                        <li class="icon-confirmed-order progress-active">Confirmed</li>
                                        <li class="icon-processing-order">Processing</li>
                                        <li class="icon-dispatched-order">Picked</li>
                                        <li class="icon-shipped-order">Shipped</li>
                                        <li class="icon-product-deliver">Delivered</li>';
                                        break;
                                    case 'processing':
                                        echo '
                                        <li class="icon-pending-order progress-done">Pending</li>
                                        <li class="icon-confirmed-order progress-done">Confirmed</li>
                                        <li class="icon-processing-order progress-active">Processing</li>
                                        <li class="icon-dispatched-order">Picked</li>
                                        <li class="icon-shipped-order">Shipped</li>
                                        <li class="icon-product-deliver">Delivered</li>';
                                        break;
                                    case 'picked':
                                        echo '
                                        <li class="icon-pending-order progress-done">Pending</li>
                                        <li class="icon-confirmed-order progress-done">Confirmed</li>
                                        <li class="icon-processing-order progress-done">Processing</li>
                                        <li class="icon-dispatched-order progress-active">Picked</li>
                                        <li class="icon-shipped-order">Shipped</li>
                                        <li class="icon-product-deliver">Delivered</li>';
                                        break;
                                    case 'shipped':
                                        echo '
                                        <li class="icon-pending-order progress-done">Pending</li>
                                        <li class="icon-confirmed-order progress-done">Confirmed</li>
                                        <li class="icon-processing-order progress-done">Processing</li>
                                        <li class="icon-dispatched-order progress-done">Picked</li>
                                        <li class="icon-shipped-order progress-active">Shipped</li>
                                        <li class="icon-product-deliver">Delivered</li>';
                                        break;
                                    case 'delivered':
                                        echo '
                                        <li class="icon-pending-order progress-done">Pending</li>
                                        <li class="icon-confirmed-order progress-done"Confirmed</li>
                                        <li class="icon-processing-order progress-done">Processing</li>
                                        <li class="icon-dispatched-order progress-done">Picked</li>
                                        <li class="icon-shipped-order progress-done">Shipped</li>
                                        <li class="icon-product-deliver progress-done">Delivered</li>';
                                        break;
                                }
                            @endphp


                        </ul>
                    </div>
                    <div class="tracking-information">
                        <h4>Order information</h4>
                        <ul>
                            <li><span>Order number:</span> <span>{{ $order->order_number }}</span></li>
                            @if ($order->confirmed_date)
                                <li><span>Order confired:</span> <span>{{ $order->confirmed_date }}</span></li>
                            @endif
                            @if ($order->shipped_date)
                                <li><span>Order shipped:</span> <span>{{ $order->shipped_date }}</span></li>
                            @endif
                            @if ($order->delivered_date)
                                <li><span>Order delivered:</span> <span>{{ $order->delivered_date }}</span></li>
                            @endif

                        </ul>

                    </div>
                </div>
            @endif
            @include('frontend.common.my_account_sidebar')
        </div>
    </div>
</div>
<style>
    ul.track-progress.step-number4 li {
        width: 16%;
    }

    ul.track-progress li.icon-pending-order:before {
        content: "\f017";
    }

    ul.track-progress li.icon-confirmed-order:before {
        content: "\f00c";
    }

    ul.track-progress li.icon-processing-order:before {
        content: "\f110";
    }


    ul.track-progress li.icon-shipped-order:before {
        content: "\f21a";
    }

    ul.track-progress li.icon-product-deliver:before {
        content: "\f046";
    }
</style>
@endsection
