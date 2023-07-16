@extends('frontend.main_master')
@section('content')
@section('title')
    Video Gallery
@endsection

<div class="bee-content-block">
    <div class="container">
        <div class="row">
            <ul class="simplefilter nav nav-pills d-block">
                <li class="active" data-filter="all"><i class="fa fa-reorder"></i> All</li>
                <li data-filter="1">Hive</li>
                <li data-filter="2">Smoker</li>
                <li data-filter="3">Brash</li>
            </ul>
        </div>
        <div class="row">
            <div class="filtr-container">
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4 filtr-item" data-category="1, 3">
                    <div class="pGallery-wrapper">
                        <div class="pGallery-img"> <a class="product-video"
                                href="https://www.youtube.com/watch?v=QcFTKM0NKL0" title="ThemeForest Project"><i
                                    class="fa fa-play-circle-o" aria-hidden="true"></i><img
                                    src="{{ asset('frontend/assets/images/video-poster1.jpg') }}" alt="" /></a>
                        </div>
                        <div class="freight-caption">
                            <div class="label-text">
                                <a class="text-title">How to Setup Hive</a>
                                <span class="text-category">Hive</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4 filtr-item" data-category="2, 1">
                    <div class="pGallery-wrapper">
                        <div class="pGallery-img"> <a class="product-video"
                                href="https://www.youtube.com/watch?v=l7lWQSnjnsA" title="ThemeForest Project"><i
                                    class="fa fa-play-circle-o" aria-hidden="true"></i><img
                                    src="{{ asset('frontend/assets/images/video-poster2.jpg') }}" alt="" /></a>
                        </div>
                        <div class="freight-caption">
                            <div class="label-text">
                                <a class="text-title">How to use Brash</a>
                                <span class="text-category">Brash</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4 filtr-item" data-category="3, 2">
                    <div class="pGallery-wrapper">
                        <div class="pGallery-img"> <a class="product-video"
                                href="https://www.youtube.com/watch?v=C0yWoHnpE2Q" title="ThemeForest Project"><i
                                    class="fa fa-play-circle-o" aria-hidden="true"></i><img
                                    src="{{ asset('frontend/assets/images/video-poster3.jpg') }}" alt="" /></a>
                        </div>
                        <div class="freight-caption">
                            <div class="label-text">
                                <a class="text-title">How to use Smoker</a>
                                <span class="text-category">Smoker</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4 filtr-item" data-category="1">
                    <div class="pGallery-wrapper">
                        <div class="pGallery-img"> <a class="product-video"
                                href="https://www.youtube.com/watch?v=wFrvEQRASiA" title="ThemeForest Project"><i
                                    class="fa fa-play-circle-o" aria-hidden="true"></i><img
                                    src="{{ asset('frontend/assets/images/video-poster4.jpg') }}" alt="" /></a>
                        </div>
                        <div class="freight-caption">
                            <div class="label-text">
                                <a class="text-title">How to Manage Hive</a>
                                <span class="text-category">Hive</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4 filtr-item" data-category="2">
                    <div class="pGallery-wrapper">
                        <div class="pGallery-img"> <a class="product-video"
                                href="https://www.youtube.com/watch?v=C0yWoHnpE2Q" title="ThemeForest Project"><i
                                    class="fa fa-play-circle-o" aria-hidden="true"></i><img
                                    src="{{ asset('frontend/assets/images/video-poster3.jpg') }}" alt="" /></a>
                        </div>
                        <div class="freight-caption">
                            <div class="label-text">
                                <a class="text-title">How to Manage Smoker</a>
                                <span class="text-category">Smoker</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4 filtr-item" data-category="3">
                    <div class="pGallery-wrapper">
                        <div class="pGallery-img"> <a class="product-video"
                                href="https://www.youtube.com/watch?v=l7lWQSnjnsA" title="ThemeForest Project"><i
                                    class="fa fa-play-circle-o" aria-hidden="true"></i><img
                                    src="{{ asset('frontend/assets/images/video-poster2.jpg') }}" alt="" /></a>
                        </div>
                        <div class="freight-caption">
                            <div class="label-text">
                                <a class="text-title">How to Manage Brash</a>
                                <span class="text-category">Brash</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4 filtr-item" data-category="1, 3">
                    <div class="pGallery-wrapper">
                        <div class="pGallery-img"> <a class="product-video"
                                href="https://www.youtube.com/watch?v=C0yWoHnpE2Q" title="ThemeForest Project"><i
                                    class="fa fa-play-circle-o" aria-hidden="true"></i><img
                                    src="{{ asset('frontend/assets/images/video-poster3.jpg') }}"
                                    alt="" /></a></div>
                        <div class="freight-caption">
                            <div class="label-text">
                                <a class="text-title">How to Manage Hive</a>
                                <span class="text-category">Hive</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4 filtr-item" data-category="2">
                    <div class="pGallery-wrapper">
                        <div class="pGallery-img"> <a class="product-video"
                                href="https://www.youtube.com/watch?v=wFrvEQRASiA" title="ThemeForest Project"><i
                                    class="fa fa-play-circle-o" aria-hidden="true"></i><img
                                    src="{{ asset('frontend/assets/images/video-poster4.jpg') }}"
                                    alt="" /></a></div>
                        <div class="freight-caption">
                            <div class="label-text">
                                <a class="text-title">How to use Smoker</a>
                                <span class="text-category">Smoker</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4 filtr-item" data-category="3">
                    <div class="pGallery-wrapper">
                        <div class="pGallery-img"> <a class="product-video"
                                href="https://www.youtube.com/watch?v=QcFTKM0NKL0" title="ThemeForest Project"><i
                                    class="fa fa-play-circle-o" aria-hidden="true"></i><img
                                    src="{{ asset('frontend/assets/images/video-poster1.jpg') }}"
                                    alt="" /></a></div>
                        <div class="freight-caption">
                            <div class="label-text">
                                <a class="text-title">How to use Brash</a>
                                <span class="text-category">Brash</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- testimonial start -->
@include('frontend.common.testimonials')
<!-- testimonial end -->
@endsection
