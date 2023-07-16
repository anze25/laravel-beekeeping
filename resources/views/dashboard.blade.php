@extends('frontend.main_master')
@section('content')

@section('title')
    @if (session()->get('language') == 'slovenian')
        Pregled računa
    @else
        My account Overview
    @endif
@endsection

<div class="bee-content-block">
    <div class="container">
        <div class="row flex-lg-row-reverse">
            @if (session()->get('language') == 'slovenian')
                <div class="col-12 col-lg-9">
                    <div class="my-account-page-title">
                        <h3>Pregled računa</h3>
                    </div>
                    <div class="my-account-section">
                        <h5>Osebni podatki <a href="{{ route('user.profile') }}"><span><i class="fa fa-edit"
                                        aria-hidden="true"></i></span></a></h5>
                        <ul>
                            <li><span>Ime:</span><span>{{ $user->first_name }}</span></li>
                            <li><span>Priimek:</span><span>{{ $user->last_name }}</span></li>

                            <li><span>Telefon:</span><span>{{ $user->phone }}</span></li>
                            <li><span>Email:</span><span>{{ $user->email }}</span></li>
                            <li><span>CoDržavauntry:</span><span>{{ $user->country }}</span></li>
                            <li><span>Naslov:</span><span>{{ $user->address }}<br>{{ $user->postal_code }}
                                    {{ $user->city }}<br>{{ $user->country }}</span></li>
                        </ul>
                    </div>
                    <div class="my-account-section">
                        <h5>Naslov za dostavo <span><i class="fa fa-edit" aria-hidden="true"></i></span></h5>
                        <ul>
                            <li><span>Naslov:</span><span>{{ $user->shipping_address }}<br>{{ $user->shipping_postal_code }}
                                    {{ $user->shipping_city }}<br>{{ $user->shipping_country }}</span></li>
                        </ul>
                    </div>
                </div>
            @else
                <div class="col-12 col-lg-9">
                    <div class="my-account-page-title">
                        <h3>My Account Overview</h3>
                    </div>
                    <div class="my-account-section">
                        <h5>Personal Information <a href="{{ route('user.profile') }}"><span><i class="fa fa-edit"
                                        aria-hidden="true"></i></span></a></h5>
                        <ul>
                            <li><span>First Name:</span><span>{{ $user->first_name }}</span></li>
                            <li><span>Last Name:</span><span>{{ $user->last_name }}</span></li>

                            <li><span>Mobile:</span><span>{{ $user->phone }}</span></li>
                            <li><span>Email:</span><span>{{ $user->email }}</span></li>
                            <li><span>Country:</span><span>{{ $user->country }}</span></li>
                            <li><span>Address:</span><span>{{ $user->address }}<br>{{ $user->postal_code }}
                                    {{ $user->city }}<br>{{ $user->country }}</span></li>
                        </ul>
                    </div>
                    <div class="my-account-section">
                        <h5>Shipping Address <span><i class="fa fa-edit" aria-hidden="true"></i></span></h5>
                        <ul>
                            <li><span>Address:</span><span>{{ $user->shipping_address }}<br>{{ $user->shipping_postal_code }}
                                    {{ $user->shipping_city }}<br>{{ $user->shipping_country }}</span></li>
                        </ul>
                    </div>
                </div>
            @endif
            @include('frontend.common.my_account_sidebar')
        </div>
    </div>
</div>
@endsection
