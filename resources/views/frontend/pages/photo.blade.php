@extends('frontend.main_master')
@section('content')
@section('title')
    Photo Gallery
@endsection

<div class="bee-content-block">
    <div class="container">
        <div class="row image-gallery-lightbox">
            <div class="col-12 col-md-6 col-lg-3 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-1.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-1.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-2.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-2.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-3.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-3.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-4.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-4.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-1.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-1.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-2.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-2.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-3.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-3.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-4.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-4.jpg') }}" alt="" /></a>
            </div>
        </div>
        <div class="row image-gallery-lightbox">
            <div class="col-12 col-md-6 col-lg-4 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-1.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-1.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-2.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-2.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-3.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-3.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-4.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-4.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-1.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-1.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-2.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-2.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-3.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-3.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-4.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-4.jpg') }}" alt="" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 l-gallery-holder">
                <a class="latest-gallery" href="{{ asset('frontend/assets/images/product-1.jpg') }}"
                    title="ThemeForest Project"><i class="fa fa-search-plus"></i><img
                        src="{{ asset('frontend/assets/images/product-1.jpg') }}" alt="" /></a>
            </div>
        </div>
    </div>
</div>

<!-- testimonial start -->
@include('frontend.common.testimonials')
<!-- testimonial end -->
@endsection
