<!DOCTYPE html>
<html lang="en-US">
@php
    $seo = App\Models\Seo::find(1);
    $setting = App\Models\SiteSetting::find(1);

@endphp

<head>
    <meta charset="utf-8">
    <meta name="description" content="{{ $seo->meta_description }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="{{ $seo->meta_keyword }}">
    <meta name="author" content="{{ $seo->meta_author }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- /// Google Analytics Code // -->
    <script>
        {{ $seo->google_analytics }}
    </script>
    <!-- /// Google Analytics Code // -->

    <!-- Title -->
    <title>@yield('title') </title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/assets/images/fevicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">

    <!-- OwlCarousel CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">

    <!-- Magnific popup CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">

    <!-- chat CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/chat.css') }}">

    <!-- Slicknav CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slicknav.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">

    <!-- jQuery -->
    <script src="{{ asset('frontend/assets/js/jquery-2.1.3.min.js') }}"></script>
</head>

<body>
    <!-- Main Wrapper Start -->
    <div class="main-wrapper">

        <!-- skiptocontent start ( This section for blind and Google SEO, Also for page speed )-->
        <a id="skiptocontent" href="#maincontent">skip navigation</a>
        <!-- skiptocontent End -->

        <!-- Preloader start -->
        <div class="bee-site-preloader-wrapper">
            <div class="preloder-logo"><img src="{{ asset('frontend/assets/images/logo.png') }}" alt="w-Beekeeping" />
            </div>
            <div class="spinner">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
            </div>
        </div>
        <!-- Preloader End -->

        <header class="for-sticky">
            <!-- Header top area start -->
            <div class="header-top-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-7 col-lg-6">
                            <div class="top-contact"> <a href="#"><i class="fa fa-envelope"></i>
                                    {{ $setting->email }}</a>
                                <a href="#"><i class="fa fa-phone"></i> {{ $setting->phone_one }}</a>
                            </div>
                        </div>
                        @include('frontend.body.topbar-menu')
                    </div>
                </div>
            </div>
            <!-- Header top area End -->

            <!-- Header area start -->
            <div class="header-area">
                <div class="container">
                    <!-- Site logo Start -->
                    <div class="site-logo"> <a href="index.html" title="w-Beekeeping"><img
                                src="{{ asset('frontend/assets/images/logo.png') }}" alt="w-Beekeeping" /></a>
                    </div>
                    <!-- Site logo end -->
                    <div class="mobile-menu-wrapper"></div>
                    <!-- Search Start -->
                    <div class="dropdown header-search-drop">
                        <form action="index.html">
                            <a class="dropdown-toggle" id="dropSearch" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i class="fa fa-search" aria-hidden="true"></i></a>
                            <input type="search" placeholder="kyewords.." class="dropdown-menu search-box"
                                aria-labelledby="dropSearch">
                        </form>
                    </div>
                    <!-- Search End -->

                    <!-- Main menu start -->
                    <nav class="mainmenu">
                        <ul id="navigation">
                            <li class="{{ request()->is('/') ? 'nav-active' : '' }}"><a href="/">
                                    @if (session()->get('language') == 'slovenian')
                                        Domov
                                    @else
                                        Home
                                    @endif
                                </a>

                            </li>
                            <li class="{{ Request::is('about') ? 'nav-active' : '' }}"><a href="/about">
                                    @if (session()->get('language') == 'slovenian')
                                        O nas
                                    @else
                                        About us
                                    @endif
                                </a></li>
                            <li class="{{ Request::is('shop') || Request::is('shop/*') ? 'nav-active' : '' }}"><a
                                    href="/shop">
                                    @if (session()->get('language') == 'slovenian')
                                        Trgovina
                                    @else
                                        Shop
                                    @endif
                                </a>

                            </li>
                            <li class="{{ Request::is('news') || Request::is('news/*') ? 'nav-active' : '' }}"><a
                                    href="/news">
                                    @if (session()->get('language') == 'slovenian')
                                        Novice
                                    @else
                                        News &amp; Media
                                    @endif
                                </a>
                            </li>
                            <li
                                class="{{ Request::is('blog') || Request::is('blog/*') || Request::is('post/*') ? 'nav-active' : '' }}">
                                <a href="/blog">Blog</a>

                            </li>
                            <li
                                class="{{ Request::is('photo') || Request::is('photo/*') || Request::is('video') || Request::is('video/*') ? 'nav-active' : '' }}">
                                @if (session()->get('language') == 'slovenian')
                                    <a href="#">Galerija</a>
                                    <ul>
                                        <li><a href="/photo">Slike</a>
                                        </li>
                                        <li><a href="/video">Filmi</a>
                                        </li>
                                    </ul>
                                @else
                                    <a href="#">Gallery</a>
                                    <ul>
                                        <li><a href="/photo">Photo Gallery</a>
                                        </li>
                                        <li><a href="/video">Video Gallery</a>
                                        </li>
                                    </ul>
                                @endif

                            </li>
                            <li class="{{ Request::is('contact') ? 'nav-active' : '' }}"><a href="/contact">
                                    @if (session()->get('language') == 'slovenian')
                                        Kontaktirajte nas
                                    @else
                                        Contact Us
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Main menu end -->
                </div>
            </div>
            <!-- Header area End -->
        </header>

        <!-- Slider Start -->
        <div class="homepage-slides-wrapper">
            <div class="homepage-slides">
                @foreach ($sliders as $slider)
                    <!-- Slider item start-->
                    <div class="single-slide-item">
                        <div class="slide-bg-holder"
                            style="background-image: url('/frontend/images/sliders/{{ $slider->slider_img }}')"></div>
                        <div class="slider-caption caption-bg">
                            <h2>
                                @if (session()->get('language') == 'slovenian')
                                    {{ $slider->title_sl }}
                                @else
                                    {{ $slider->title_en }}
                                @endif

                            </h2>
                            <p>
                                @if (session()->get('language') == 'slovenian')
                                    {{ $slider->description_sl }}
                                @else
                                    {{ $slider->description_en }}
                                @endif
                            </p>
                            <a href="/shop">
                                @if (session()->get('language') == 'slovenian')
                                    V trgovino
                                @else
                                    Shop now
                                @endif

                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Slider item end-->
                @endforeach


            </div>
        </div>
        <!-- Slider End -->

        <!-- About Bee start -->
        <div class="bee-content-block bg-light-gray">
            @if (session()->get('language') == 'slovenian')
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title wow fadeInUp">
                                <h2 class="title-bg">O čebelah</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="about-bee wow fadeInLeft">
                                <div class="bee-icon"><img src="{{ asset('frontend/assets/images/queen-bee.png') }}"
                                        alt="Čebelja matica" /></div>
                                <h4>Čebelja matica</h4>
                                <p>Matica je vodilna in osrednja figura v čebeljem panju. Je edina samica, ki lahko
                                    odlaga jajčeca, in njeno življenjsko obdobje lahko presega več let.</p>
                                <a href="#" title="" class="readmore">Več o tem <i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="about-bee wow fadeInUp">
                                <div class="bee-icon"><img src="{{ asset('frontend/assets/images/drone-bee.png') }}"
                                        alt="Čebelji trot" /></div>
                                <h4>Čebelji trot</h4>
                                <p>Samci čebel, imenovani troti, so moške čebele v čebeljem panju. Nimajo žela in
                                    njihova glavna naloga je parjenje z matico iz drugih panjev, s čimer prispevajo k
                                    genetski raznolikosti čebelje populacije.</p>
                                <a href="#" title="" class="readmore">Več o tem <i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="about-bee wow fadeInRight">
                                <div class="bee-icon"><img src="{{ asset('frontend/assets/images/worker-bee.png') }}"
                                        alt="Čebela delavka" /></div>
                                <h4>Čebela delavka</h4>
                                <p>
                                    Delavke so ženske čebele v čebeljem panju in predstavljajo večino populacije panja.
                                    Opravljajo različna opravila, kot so nabiranje hrane, gradnja in vzdrževanje panja,
                                    skrb za matico in njene potomce ter obramba panja.</p>
                                <a href="#" title="" class="readmore">Več o tem <i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title wow fadeInUp">
                                <h2 class="title-bg">About Bees</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="about-bee wow fadeInLeft">
                                <div class="bee-icon"><img src="{{ asset('frontend/assets/images/queen-bee.png') }}"
                                        alt="Queen Bee" /></div>
                                <h4>Queen Bee</h4>
                                <p>The queen bee is the leader and central figure of a honey bee colony. She is the only
                                    female bee capable of laying eggs, with a lifespan that can exceed several years.
                                </p>
                                <a href="#" title="" class="readmore">Read More <i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="about-bee wow fadeInUp">
                                <div class="bee-icon"><img src="{{ asset('frontend/assets/images/drone-bee.png') }}"
                                        alt="Drone Bee" /></div>
                                <h4>Drone Bee</h4>
                                <p>Drone bees are male bees in a honey bee colony. They do not have a stinger and their
                                    primary role is to mate with the queen bee from other colonies, contributing to
                                    genetic diversity within the bee population.</p>
                                <a href="#" title="" class="readmore">Read More <i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="about-bee wow fadeInRight">
                                <div class="bee-icon"><img src="{{ asset('frontend/assets/images/worker-bee.png') }}"
                                        alt="Worker Bee" /></div>
                                <h4>Worker Bee</h4>
                                <p>Worker bees are female bees in a honey bee colony and comprise the majority of the
                                    colony's population. They perform various tasks such as foraging for food, building
                                    and maintaining the hive, taking care of the queen and her offspring, and defending
                                    the colony.</p>
                                <a href="#" title="" class="readmore">Read More <i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- About Bee End -->

        <!-- Feature Products start -->
        <div class="bee-content-block home-product-sec">
            <div class="home-product-title">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2 class="title-bg">Izdelki iz medu</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-product-block arrow-bg">
                <div class="container">
                    <div class="row">
                        <div class="feature-product-4">
                            @foreach ($featured as $item)
                                <div class="feature-product-item">
                                    <div class="single-product"> <img
                                            src="/frontend/images/products/thumbs/{{ $item->product_thumbnail }}"
                                            alt="Beekeeping Hive" />
                                        <div class="p-top-price">{{ $item->discount_price }} €</div>
                                        <div class="product-hover">
                                            <h4>
                                                @if (session()->get('language') == 'slovenian')
                                                    {{ $item->product_name_slo }}
                                                @else
                                                    {{ $item->product_name_en }}
                                                @endif
                                            </h4>
                                            <div class="prod-hover-price"><b>Price:</b>{{ $item->discount_price }} €
                                            </div>
                                            <p>
                                                @if (session()->get('language') == 'slovenian')
                                                    {{ $item->short_desc_slo }}
                                                @else
                                                    {{ $item->short_desc_en }}
                                                @endif
                                            </p>
                                            <div class="product-action"> <a
                                                    href="{{ url('product/details/' . $item->id . '/' . $item->product_slug_en) }}"
                                                    title="" class="icon-view"><i class="fa fa-eye"></i></a><a
                                                    href="" title="" class="icon-view"><i
                                                        class="fa fa-heart-o" id="{{ $item->id }}"
                                                        title="Wishlist"
                                                        onclick="addToWishList(this.id, event)"></i></a>
                                                <a href="" title="" class="icon-view"
                                                    data-toggle="modal" data-target="#exampleModal"
                                                    id="{{ $item->id }}" onclick="productView(this.id)"><i
                                                        class="fa fa-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Products end -->

        <!-- Beekeeping Training start -->
        <div class="bee-content-block feature-product-dark-bg">
            @if (session()->get('language') == 'slovenian')
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title wow fadeInUp">
                                <h2 class="title-bg">
                                    Čebelarsko usposabljanje za začetnike</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="training-box"> <a href="" title="">
                                    <div class="training-icon"><img
                                            src="{{ asset('frontend/assets/images/bee-training-1.png') }}"
                                            alt="" /></div>
                                    <h4>
                                        Ravnanje s panji</h4>
                                    <p> Lorem Ipsum je slepo besedilo, ki se uporablja pri razvoju tipografij in
                                        pripravi različnih materialov v tisku in digitalnem okolju.</p>
                                </a> </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="training-box"> <a href="" title="">
                                    <div class="training-icon"><img
                                            src="{{ asset('frontend/assets/images/bee-training-2.png') }}"
                                            alt="" /></div>
                                    <h4>Prehrana v panju</h4>
                                    <p> Lorem Ipsum je slepo besedilo, ki se uporablja pri razvoju tipografij in
                                        pripravi različnih materialov v tisku in digitalnem okolju.</p>
                                </a> </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="training-box"> <a href="" title="">
                                    <div class="training-icon"><img
                                            src="{{ asset('frontend/assets/images/bee-training-3.png') }}"
                                            alt="" /></div>
                                    <h4>Gibanje čebel</h4>
                                    < <p> Lorem Ipsum je slepo besedilo, ki se uporablja pri razvoju tipografij in
                                        pripravi
                                        različnih materialov v tisku in digitalnem okolju.</p>
                                </a> </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="training-box"> <a href="" title="">
                                    <div class="training-icon"><img
                                            src="{{ asset('frontend/assets/images/bee-training-4.png') }}"
                                            alt="" /></div>
                                    <h4>Pridobivanje medu</h4>
                                    <p> Lorem Ipsum je slepo besedilo, ki se uporablja pri razvoju tipografij in
                                        pripravi
                                        različnih materialov v tisku in digitalnem okolju.</p>
                                </a> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container text-center"> <a href="training.html" class="bee-button-white mt80">
                                Preverite Naše celotno usposabljanje</a> </div>
                    </div>
                </div>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title wow fadeInUp">
                                <h2 class="title-bg">Beekeeping Training For Beginner</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="training-box"> <a href="" title="">
                                    <div class="training-icon"><img
                                            src="{{ asset('frontend/assets/images/bee-training-1.png') }}"
                                            alt="" /></div>
                                    <h4>Handling of beehives</h4>
                                    <p> It has survived not only five centuries, but also the leap into electronic
                                        typesetting.</p>
                                </a> </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="training-box"> <a href="" title="">
                                    <div class="training-icon"><img
                                            src="{{ asset('frontend/assets/images/bee-training-2.png') }}"
                                            alt="" /></div>
                                    <h4>Beehive Nutrition</h4>
                                    <p> It has survived not only five centuries, but also the leap into electronic
                                        typesetting.</p>
                                </a> </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="training-box"> <a href="" title="">
                                    <div class="training-icon"><img
                                            src="{{ asset('frontend/assets/images/bee-training-3.png') }}"
                                            alt="" /></div>
                                    <h4>Movement of bees</h4>
                                    <p> It has survived not only five centuries, but also the leap into electronic
                                        typesetting.</p>
                                </a> </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="training-box"> <a href="" title="">
                                    <div class="training-icon"><img
                                            src="{{ asset('frontend/assets/images/bee-training-4.png') }}"
                                            alt="" /></div>
                                    <h4>Honey Extraction</h4>
                                    <p> It has survived not only five centuries, but also the leap into electronic
                                        typesetting.</p>
                                </a> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container text-center"> <a href="training.html"
                                class="bee-button-white mt80">Check
                                Our All Training</a> </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- Beekeeping Training End -->

        <!-- Feature Honey Products start -->
        <div class="bee-content-block home-product-sec">
            <div class="home-product-title">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2 class="title-bg">
                                    @if (session()->get('language') == 'slovenian')
                                        Izdelki za čebelarstvo
                                    @else
                                        Beekeping products
                                    @endif
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-product-block arrow-bg">
                <div class="container">
                    <div class="row">
                        <div class="feature-product-4">
                            <div class="feature-product-item">
                                <div class="single-product"> <img
                                        src="{{ asset('frontend/assets/images/product-5.jpg') }}"
                                        alt="Beekeeping Hive" />
                                    <div class="p-top-price">$40 - $49</div>
                                    <div class="product-hover">
                                        <h4>Pure Flower Honey</h4>
                                        <div class="prod-hover-price"><b>Price:</b>$40 - $49</div>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        </p>
                                        <div class="product-action"> <a href="" title=""
                                                class="icon-view"><i class="fa fa-eye"></i></a><a href=""
                                                title="" class="icon-view"><i class="fa fa-heart-o"></i></a><a
                                                href="" title="" class="icon-view"><i
                                                    class="fa fa-cart-plus"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-product-item">
                                <div class="single-product"> <img
                                        src="{{ asset('frontend/assets/images/product-6.jpg') }}"
                                        alt="Beekeeping Hive" />
                                    <div class="p-top-price">$32 - $39</div>
                                    <div class="product-hover">
                                        <h4>Mustard Flower Honey</h4>
                                        <div class="prod-hover-price"><b>Price:</b>$32 - $39</div>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        </p>
                                        <div class="product-action"> <a href="" title=""
                                                class="icon-view"><i class="fa fa-eye"></i></a><a href=""
                                                title="" class="icon-view"><i class="fa fa-heart-o"></i></a><a
                                                href="" title="" class="icon-view"><i
                                                    class="fa fa-cart-plus"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-product-item">
                                <div class="single-product"> <img
                                        src="{{ asset('frontend/assets/images/product-7.jpg') }}"
                                        alt="Beekeeping Hive" />
                                    <div class="p-top-price">$29 - $32</div>
                                    <div class="product-hover">
                                        <h4>Honey Pancake</h4>
                                        <div class="prod-hover-price"><b>Price:</b>$29 - $32</div>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        </p>
                                        <div class="product-action"> <a href="" title=""
                                                class="icon-view"><i class="fa fa-eye"></i></a><a href=""
                                                title="" class="icon-view"><i class="fa fa-heart-o"></i></a><a
                                                href="" title="" class="icon-view"><i
                                                    class="fa fa-cart-plus"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-product-item">
                                <div class="single-product"> <img
                                        src="{{ asset('frontend/assets/images/product-8.jpg') }}"
                                        alt="Beekeeping Hive" />
                                    <div class="p-top-price">$36 - $43</div>
                                    <div class="product-hover">
                                        <h4>Black Seed Honey</h4>
                                        <div class="prod-hover-price"><b>Price:</b>$36 - $43</div>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        </p>
                                        <div class="product-action"> <a href="" title=""
                                                class="icon-view"><i class="fa fa-eye"></i></a><a href=""
                                                title="" class="icon-view"><i class="fa fa-heart-o"></i></a><a
                                                href="" title="" class="icon-view"><i
                                                    class="fa fa-cart-plus"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-product-item">
                                <div class="single-product"> <img
                                        src="{{ asset('frontend/assets/images/product-9.jpg') }}"
                                        alt="Honey Toast" />
                                    <div class="p-top-price">$32 - $39</div>
                                    <div class="product-hover">
                                        <h4>Honey Toast Consists</h4>
                                        <div class="prod-hover-price"><b>Price:</b>$32 - $39</div>
                                        <p>Honey Toast Consists of bread topped with honey and ice cream, full testy.
                                        </p>
                                        <div class="product-action"> <a href="" title=""
                                                class="icon-view"><i class="fa fa-eye"></i></a><a href=""
                                                title="" class="icon-view"><i class="fa fa-heart-o"></i></a><a
                                                href="" title="" class="icon-view"><i
                                                    class="fa fa-cart-plus"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Honey Products end -->

        <!-- Latest blog start -->
        <div class="bee-content-block home-blog pt0 pb60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2 class="title-bg">
                                @if (session()->get('language') == 'slovenian')
                                    Najnovejši prispevki
                                @else
                                    Latest Blog Post
                                @endif

                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($blogposts as $item)
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="blog-item wow fadeInUp">
                                <div class="blog-item-bg"
                                    style="background-image: url('/frontend/images/posts/thumbs/{{ $item->post_image }}')">
                                </div>
                                <div class="blog-content">
                                    <h3>
                                        @if (session()->get('language') == 'slovenian')
                                            {{ Str::limit($item->post_title_slo, 30) }}
                                        @else
                                            {{ Str::limit($item->post_title_en, 30) }}
                                        @endif
                                    </h3>
                                    <div class="blog-post-by">
                                        <ul>
                                            <li><i class="fa fa-calendar"></i>{{ $item->created_at->format('d M Y') }}
                                            </li>
                                            <li><i class="fa fa-user"></i>By Admin</li>
                                        </ul>
                                    </div>
                                    <p>
                                        @if (session()->get('language') == 'slovenian')
                                            {{ Str::limit($item->post_details_slo, 120) }}
                                        @else
                                            {{ Str::limit($item->post_details_en, 120) }}
                                        @endif
                                    </p>
                                    <a href="{{ route('post.details', $item->id) }}" title=""
                                        class="readmore">Read more <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Latest blog End -->

        <!-- Latest video gallery & post start -->
        <div class="bee-content-block bg-light-gray pb80">
            <div class="container">
                <div class="row">
                    <!-- Latest video gallery start -->
                    <div class="col-12 col-lg-8 wow fadeInLeft">
                        <h3 class="title-bg title-bg-left">
                            @if (session()->get('language') == 'slovenian')
                                Video vsebina
                            @else
                                Product Video
                            @endif
                        </h3>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 product-video-holder"> <a class="product-video"
                                    href="https://www.youtube.com/watch?v=QcFTKM0NKL0" title="ThemeForest Project"><i
                                        class="fa fa-play-circle-o" aria-hidden="true"></i><img
                                        src="{{ asset('frontend/assets/images/video-poster1.jpg') }}"
                                        alt="" /></a> </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 product-video-holder"> <a class="product-video"
                                    href="https://www.youtube.com/watch?v=l7lWQSnjnsA" title="ThemeForest Project"><i
                                        class="fa fa-play-circle-o" aria-hidden="true"></i><img
                                        src="{{ asset('frontend/assets/images/video-poster2.jpg') }}"
                                        alt="" /></a> </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 product-video-holder"> <a class="product-video"
                                    href="https://www.youtube.com/watch?v=C0yWoHnpE2Q" title="ThemeForest Project"><i
                                        class="fa fa-play-circle-o" aria-hidden="true"></i><img
                                        src="{{ asset('frontend/assets/images/video-poster3.jpg') }}"
                                        alt="" /></a> </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 product-video-holder"> <a class="product-video"
                                    href="https://www.youtube.com/watch?v=wFrvEQRASiA" title="ThemeForest Project"><i
                                        class="fa fa-play-circle-o" aria-hidden="true"></i><img
                                        src="{{ asset('frontend/assets/images/video-poster4.jpg') }}"
                                        alt="" /></a> </div>
                        </div>
                    </div>
                    <!-- Latest video gallery end -->

                    <!-- Latest post start -->
                    <div class="col-12 col-lg-4 home2-latest-post wow fadeInRight">
                        <h3 class="title-bg title-bg-left">
                            @if (session()->get('language') == 'slovenian')
                                Najnovejše novice
                            @else
                                Latest News
                            @endif
                        </h3>
                        <div class="letest-post">
                            <ul>
                                @foreach ($latest_news as $item)
                                    <li><a href="{{ route('news.details', $item->id) }}" title=""> <img
                                                src="/frontend/images/news/thumbs/{{ $item->news_image }}"
                                                alt="post1">
                                            <h6>
                                                @if (session()->get('language') == 'slovenian')
                                                    {{ Str::limit($item->news_title_slo, 30) }}
                                                @else
                                                    {{ Str::limit($item->news_title_en, 30) }}
                                                @endif
                                            </h6>
                                            <p>
                                                @if (session()->get('language') == 'slovenian')
                                                    {{ Str::limit($item->news_excerpt_en, 80) }}
                                                @else
                                                    {{ Str::limit($item->news_excerpt_slo, 80) }}
                                                @endif
                                            </p>
                                            <span>{{ $item->created_at->format('d M Y') }}</span>
                                        </a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <!-- Latest post end -->
                </div>
            </div>
        </div>
        <!-- Latest post & gallery end -->

        <!-- Contact Button start -->
        <div class="bee-content-block order-request-btn-sec">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9 wow fadeInLeft">
                        @if (session()->get('language') == 'slovenian')
                            <h4>Najboljša svetovna kakovost izdelkov in usposabljanja za <span>čebelarstvo</span>
                            </h4>
                        @else
                            <h4>The world best quality of product and Training, for <span>Beekeeping</span> with
                                <span>Bee!</span>
                            </h4>
                        @endif

                    </div>
                    <div class="col-12 col-lg-3 text-right wow fadeInRight"><a href="" title=""
                            class="bee-button hover-red">
                            @if (session()->get('language') == 'slovenian')
                                Oddaj naročilo
                            @else
                                Request For Order
                            @endif
                        </a></div>
                </div>
            </div>
        </div>
        <!-- Contact Button End -->

        <!-- testimonial start -->
        <div class="bee-content-block testimonial-sec text-center wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title-bg">
                            @if (session()->get('language') == 'slovenian')
                                Mnenja kupcev
                            @else
                                Testimonial
                            @endif
                        </h2>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="testimonial-item"> <img src="{{ asset('frontend/assets/images/testimonial.jpg') }}"
                            alt="Client 1" />
                        <h4>Client Name</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<i
                                class="fa fa-quote-right"></i></p>
                    </div>
                    <div class="testimonial-item"> <img src="{{ asset('frontend/assets/images/testimonial.jpg') }}"
                            alt="Client 1" />
                        <h4>Client Name</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<i
                                class="fa fa-quote-right"></i></p>
                    </div>
                    <div class="testimonial-item"> <img src="{{ asset('frontend/assets/images/testimonial.jpg') }}"
                            alt="Client 1" />
                        <h4>Client Name</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<i
                                class="fa fa-quote-right"></i></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial end -->

        <!--Newsletter start -->
        <div class="bee-content-block newsletter-signup">
            <div class="container">
                <form action="#">
                    @if (session()->get('language') == 'slovenian')
                        <div class="row">

                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="form-control" type="text" placeholder="Ime">
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="form-control" type="text" placeholder="Priimek">
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="btn btn-bee-news" type="submit" value="Prijava na obveščanje">
                            </div>
                        </div>
                    @else
                        <div class="row">

                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="form-control" type="text" placeholder="First Name">
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="form-control" type="text" placeholder="Last Name">
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="btn btn-bee-news" type="submit" value="Signup For Newsletter">
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
        <!-- Newsletter end -->

        <!-- Footer start -->
        @include('frontend.body.footer')
        <!-- Footer end -->
    </div>
    <!-- Main Wrapper end -->

    <!-- Start scroll top -->
    <div class="scrollup"><i class="fa fa-angle-up"></i></div>
    <!-- End scroll top -->

    <!-- Tether JS -->
    <script src="{{ asset('frontend/assets/js/tether.min.js') }}"></script>

    <!-- Popper JS -->
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>

    <!-- OwlCarousel JS -->
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>

    <!-- Magnific Popup JS -->
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>

    <!-- Gallery Filter -->
    <script src="{{ asset('frontend/assets/js/jquery.mixitup.min.js') }}"></script>

    <!-- Easy Zoom JS -->
    <script src="{{ asset('frontend/assets/js/easyzoom.js') }}"></script>

    <!-- WOW JS -->
    <script src="{{ asset('frontend/assets/js/wow-1.3.0.min.js') }}"></script>

    <!-- Chat JS -->
    <script src="{{ asset('frontend/assets/js/chat.js') }}"></script>

    <!-- Coming Soon JS -->
    <script src="{{ asset('frontend/assets/js/coming-soon.js') }}"></script>

    <!-- SlickNav JS -->
    <script src="{{ asset('frontend/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Active JS -->
    <script src="{{ asset('frontend/assets/js/active.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>

    <!-- Add to Cart Product Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span> </strong>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">

                            <div class="card" style="width: 18rem;">

                                <img src=" " class="card-img-top" alt="..."
                                    style="height: 200px; width: 200px;" id="pimage">

                            </div>

                        </div><!-- // end col md -->


                        <div class="col-md-4">

                            <ul class="list-group">
                                <li class="list-group-item">Product Price: <strong class="text-danger">$<span
                                            id="pprice"> </span></strong>
                                    <del id="oldprice">$</del>
                                </li>
                                <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                                <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                                <li class="list-group-item">Stock: <span class="badge badge-pill badge-success"
                                        id="aviable" style="background: green; color: white;"></span>
                                    <span class="badge badge-pill badge-danger" id="stockout"
                                        style="background: red; color: white;"></span>

                                </li>
                            </ul>

                        </div><!-- // end col md -->


                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="color">Choose Color</label>
                                <select class="form-control" id="color" name="color">


                                </select>
                            </div> <!-- // end form group -->


                            <div class="form-group" id="sizeArea">
                                <label for="size">Choose Size</label>
                                <select class="form-control" id="size" name="size">
                                    <option>1</option>

                                </select>
                            </div> <!-- // end form group -->

                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="number" class="form-control" id="qty" value="1"
                                    min="1">
                            </div> <!-- // end form group -->

                            <input type="hidden" id="product_id">
                            <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to
                                Cart</button>


                        </div><!-- // end col md -->


                    </div> <!-- // end row -->



                </div> <!-- // end modal Body -->

            </div>
        </div>
    </div>
    <!-- End Add to Cart Product Modal -->

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })


        function productView(id) {
            // alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $('#pname_en').text(data.product.product_name_en);
                    $('#pname_slo').text(data.product.product_name_slo);
                    $('#price').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name_en);

                    $('#pimage').attr('src', '/frontend/images/products/thumbs/' + data.product
                        .product_thumbnail);

                    $('#product_id').val(id);
                    $('#qty').val(1);

                    // Product Price 
                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.selling_price);


                    } else {
                        $('#pprice').text(data.product.discount_price);
                        $('#oldprice').text(data.product.selling_price);

                    } // end prodcut price 

                    // Start Stock opiton

                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('aviable');

                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');
                    } // end Stock Option 

                    // Color
                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value=" ' + value + ' ">' + value +
                            ' </option>')
                    }) // end color

                    // Size
                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                            ' </option>')
                        if (data.size == "") {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }

                    }) // end size


                }

            })

        }


        function addToCart() {
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name
                },
                url: "/cart/data/store/" + id,
                success: function(data) {

                    miniCart()
                    $('#closeModel').click();
                    // console.log(data)

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })

                    }

                    // End Message 
                }
            })

        }
    </script>
    <!-- /// Load My Cart /// -->

    {{-- MY CART PAGE --}}
    <script type="text/javascript">
        function cart() {

            $.ajax({
                type: 'GET',
                url: '/user/get-cart-product',
                dataType: 'json',
                success: function(response) {

                    var rows = ""
                    var totals = ""

                    if (response.cartQty === 0) {

                        // rows = `<div>${language}</div>`
                        // rows = `There are no items in your cart.`
                        if (response.language === 'slovenian') {
                            rows = 'V vaši košarici ni nobenega artikla.'
                        } else {
                            rows = 'There are no items in your cart.'
                        }

                        totals = ''
                    } else {
                        if (response.language === 'slovenian') {
                            $('span[id="cartSubTotal"]').text(response.cartTotal);
                            $('span[id="cartQty"').text(response.cartQty);
                            $('#cartTotals').html(
                                `<div class="cart-total-section"><h3> </h3>
                    
                    <a href="{{ route('checkout') }}" type="submit" class="btn btn-submit">Na blagajno</a></div>`
                            );
                            $.each(response.carts, function(key, value) {
                                rows += `
                        <div class="order-section">
                            <div class="order-top justify-content-end">
                                <div class="order-id mr-auto"> Dodano v košarico: <b>${new Date(value.options.created_at).toLocaleDateString("sl-SI", {year: 'numeric', month: 'long', day: 'numeric'})} </b> </div>
                                <div class="delete-order"> 
                                    <a href="" type="submit" id="${value.rowId}" onclick="cartRemove(this.id)">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a> 
                                </div>
                            </div>
                            <div class="order-details">
                                <div class="order-product">
                                    <div class="order-product-img"><img src="/frontend/images/products/thumbs/${value.options.image}" alt=""/></div>
                                    <div class="order-product-title"> 
                                        <a href="">
                                            <h5>${value.name_slo}</h5>
                                            <p>${value.options.description_slo}</p>
                                        </a> 
                                    </div>
                                </div>
                            <div class="order-status"> Cena: <b>${value.price} €</b>
                                <div class="quantity">
                                    <span>Quantity:</span>
                                    ${value.qty > 1

                                        ? `<span type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)"><i class="fa fa-minus"></i></span>`
                                        : `<span type="submit" disabled ><i class="fa fa-minus"></i></span>`
                                }
                                    <span>
                                        <input type="text" class="form-control" value="${value.qty}" style="width:50px;" />
                                    </span>
                                    <span type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>
                            <div class="order-action"><br><br> Subtotal: <b>${value.subtotal} €</b>  </div>
                            </div>
                        </div>`

                            });
                        } else {

                            $('span[id="cartSubTotal"]').text(response.cartTotal);
                            $('span[id="cartQty"').text(response.cartQty);
                            $('#cartTotals').html(
                                `<div class="cart-total-section"><h3> </h3>
                    
                    <a href="{{ route('checkout') }}" type="submit" class="btn btn-submit">Proceed to checkout</a></div>`
                            );
                            $.each(response.carts, function(key, value) {
                                rows += `
                        <div class="order-section">
                            <div class="order-top justify-content-end">
                                <div class="order-id mr-auto"> Added to cart: <b>${new Date(value.options.created_at).toLocaleDateString("sl-SI", {year: 'numeric', month: 'long', day: 'numeric'})} </b> </div>
                                <div class="delete-order"> 
                                    <a href="" type="submit" id="${value.rowId}" onclick="cartRemove(this.id)">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a> 
                                </div>
                            </div>
                            <div class="order-details">
                                <div class="order-product">
                                    <div class="order-product-img"><img src="/frontend/images/products/thumbs/${value.options.image}" alt=""/></div>
                                    <div class="order-product-title"> 
                                        <a href="">
                                            <h5>${value.name_en}</h5>
                                            <p>${value.options.description_en}</p>
                                        </a> 
                                    </div>
                                </div>
                            <div class="order-status"> Price: <b>${value.price} €</b>
                                <div class="quantity">
                                    <span>Quantity:</span>
                                    ${value.qty > 1

                                        ? `<span type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)"><i class="fa fa-minus"></i></span>`
                                        : `<span type="submit" disabled ><i class="fa fa-minus"></i></span>`
                                }
                                    <span>
                                        <input type="text" class="form-control" value="${value.qty}" style="width:50px;" />
                                    </span>
                                    <span type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>
                            <div class="order-action"><br><br> Subtotal: <b>${value.subtotal} €</b>  </div>
                            </div>
                        </div>`

                            });
                        }
                    }


                    $('#cartPage').html(rows);

                }
            })

        }
        cart();

        ///  Cart remove Start 
        function cartRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/cart-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();
                    $('#couponField').show();
                    $('#coupon_name').val('');

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }

                    // End Message 

                }
            });

        }

        // End Cart remove   


        // -------- CART INCREMENT --------//

        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-increment/" + rowId,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();
                }
            });
        }


        // ---------- END CART INCREMENT -----///



        // -------- CART Decrement  --------//

        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();
                }
            });
        }


        // ---------- END CART Decrement -----///
    </script>



    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {

                    $('span[id="cartSubTotal"]').text(response.cartTotal);
                    $('span[id="cartQty"').text(response.cartQty);
                    var miniCart = ""

                    $.each(response.carts, function(key, value) {
                        miniCart +=
                            `<li class="clearfix"> 
                                <img src="/frontend/images/products/thumbs/${value.options.image}" alt="item1" /> 
                                <div class="row justify-content-between"><span class="item-name">${value.name}</span> 
                                <span class="item-delete"> <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button></span>
                                </div>
                                
                                <span class="item-price">${value.price} €
                                                                   
                               
                                <span class="item-quantity">Quantity: ${value.qty} </span> 
                                
                            </li>`
                    });

                    $('#miniCart').html(miniCart);
                    cart();
                }
            })

        }
        miniCart();

        /// mini cart remove Start 
        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product-remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })

                    }

                    // End Message 

                }
            });

        }
        //  end mini cart remove 
    </script>

    <!-- /// Wish List /// -->
    <script type="text/javascript">
        function addToWishList(product_id, event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishlist/" + product_id,

                success: function(data) {

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }
                    // End Message 
                }
            })
        }

        function wishlist() {
            $.ajax({
                type: 'GET',
                url: '/user/get-wishlist-product',
                dataType: 'json',
                success: function(response) {
                    rows = '';
                    if (response.wishlist == '') {
                        if (response.language === 'slovenian') {
                            rows = 'Na vaše seznamu želja trenutno nimate nobenega artikla.'
                        } else {
                            rows = 'Your wishlist doesnt have any products.'
                        }

                    } else {
                        $.each(response.wishlist, function(key, value) {
                            rows += `<div class="order-section">
                    <div class="order-details">
                        <div class="order-product">
                            <div class="order-product-img"><img src="/frontend/images/products/thumbs/${value.product.product_thumbnail}" alt="" /></div>
                            <div class="order-product-title"> <a href="">
                                    <h5>${value.product.product_name_en}</h5>
                                    <p>${value.product.short_desc_en}</p>
                                </a> </div>
                        </div>
                        <div class="order-status">
                            
                            <p>Added ${new Date(value.created_at).toLocaleDateString("sl-SI", {year: 'numeric', month: 'long', day: 'numeric'})} </p>
                        </div>
                        <div class="order-action">
                            <a data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)" class="btn-action btn-track" >Add to cart</a>
                            <a type="submit" id="${value.id}" onclick="wishlistRemove(this.id)" class="btn-action btn-cancel">Remove</a> </div>
                    </div>
                </div>`
                        });
                    }



                    $('#wishlist').html(rows);
                }
            })

        }



        wishlist();


        function wishlistRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/wishlist-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    wishlist();

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }

                    // End Message 

                }
            });

        }
    </script>

    <!--  //////////////// =========== Coupon Apply Start ================= ////  -->
    <script type="text/javascript">
        function applyCoupon() {
            var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },
                url: "{{ url('/coupon-apply') }}",
                success: function(data) {
                    couponCalculation();
                    if (data.validity == true) {
                        $('#couponField').hide();
                    }

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }

                    // End Message 

                }

            })
        }


        function couponCalculation() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-calculation') }}",
                dataType: 'json',
                success: function(data) {
                    if (data.total) {
                        $('#couponCalField').html(
                            `<tr>
                  <th>
                      <div class="cart-sub-total">
                          Subtotal<span class="inner-left-md">$ ${data.total}</span>
                      </div>
                      <div class="cart-grand-total">
                          Grand Total<span class="inner-left-md">$ ${data.total}</span>
                      </div>
                  </th>
              </tr>`
                        )

                    } else {

                        $('#couponCalField').html(
                            `<tr>
          <th>
              <div class="cart-sub-total">
                  Subtotal<span class="inner-left-md">$ ${data.subtotal}</span>
              </div>
              <div class="cart-sub-total">
                  Coupon<span class="inner-left-md">$ ${data.coupon_name}</span>
                  <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i>  </button>
              </div>
  
               <div class="cart-sub-total">
                  Discount Amount<span class="inner-left-md">$ ${data.discount_amount}</span>
              </div>
  
  
              <div class="cart-grand-total">
                  Grand Total<span class="inner-left-md">$ ${data.total_amount}</span>
              </div>
          </th>
              </tr>`
                        )

                    }
                }

            });
        }
        couponCalculation();
    </script>

    <!--  //////////////// =========== End Coupon Apply Start ================= ////  -->


    <!--  //////////////// =========== Start Coupon Remove================= ////  -->

    <script type="text/javascript">
        function couponRemove() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-remove') }}",
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    $('#couponField').show();
                    $('#coupon_name').val('');

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }

                }
            });

        }
    </script>
</body>

</html>
