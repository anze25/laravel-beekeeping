@extends('frontend.main_master')
@section('content')

@section('title')
    @if (session()->get('language') == 'slovenian')
        Seznam želja
    @else
        Wish List Page
    @endif
@endsection

<!-- My Wishlist start -->
<div class="bee-content-block">
    <div class="container">
        <div class="row flex-lg-row-reverse">
            <div class="col-12 col-lg-9">
                <div class="my-account-page-title">
                    <h3>

                        @if (session()->get('language') == 'slovenian')
                            Seznam želja
                        @else
                            My Wishlist
                        @endif

                    </h3>
                </div>

                <div id="wishlist">

                </div>

            </div>

            @include('frontend.common.my_account_sidebar')
        </div>
    </div>
</div>

@endsection
