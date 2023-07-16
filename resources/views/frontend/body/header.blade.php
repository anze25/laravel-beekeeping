<header class="for-sticky">
    <!-- Header top area start -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-6">
                    @php
                        $setting = App\Models\SiteSetting::find(1);
                        
                    @endphp
                    <div class="top-contact"> <a href="#"><i class="fa fa-envelope"></i> {{ $setting->email }}</a>
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
            <div class="site-logo"> <a href="{{ url('/') }}" title="w-Beekeeping"><img
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
