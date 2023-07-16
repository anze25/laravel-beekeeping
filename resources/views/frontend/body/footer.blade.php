<footer class="site-footer">
    @php
        $setting = App\Models\SiteSetting::find(1);
        $news = App\Models\News::latest()
            ->limit(2)
            ->get();
        
    @endphp
    <!-- Footer Top start -->
    <div class="footer-top-area wow fadeInUp">
        @if (session()->get('language') == 'slovenian')
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="footer-wiz">
                            <h3 class="footer-logo"><img src="{{ asset('frontend/assets/images/footer-logo.png') }}"
                                    alt="Bee Keeping" />
                            </h3>
                            <p>
                                Čebelarstvo ni le hobi, je način življenja, ki te povezuje z naravo.</p>
                            <ul class="footer-contact">
                                <li><i class="fa fa-phone"></i> {{ $setting->phone_one }}</li>
                                <li><i class="fa fa-phone"></i> {{ $setting->phone_two }}</li>
                                <li><i class="fa fa-envelope"></i> {{ $setting->email }}</li>
                                <li><i class="fa fa-fax"></i> {{ $setting->fax }}</li>
                            </ul>
                            <div class="top-social bottom-social"> <a href="{{ $setting->facebook }}"><i
                                        class="fa fa-facebook"></i></a> <a href="{{ $setting->twitter }}"><i
                                        class="fa fa-twitter"></i></a>
                                <a href="{{ $setting->youtube }}"><i class="fa fa-youtube"></i></a> <a
                                    href="{{ $setting->youtube }}"><i class="fa fa-rss"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="footer-wiz footer-menu">
                            <h3 class="footer-wiz-title">Hitre povezave</h3>
                            <ul>
                                <li><a href="/about">O nas</a></li>
                                <li><a href="/shop">Trgovina</a></li>
                                <li><a href="/blog">Blog</a></li>
                                <li><a href="/news">Novice</a></li>
                                <li><a href="/video">Video</a></li>
                                <li><a href="/photo">Slike</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="footer-wiz footer-menu">
                            <h3 class="footer-wiz-title">Uporabne povezave</h3>
                            <ul>
                                @auth
                                    <li><a href="my-account.html">Moj račun</a></li>
                                    <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                @else
                                    <li><a href="{{ route('login') }}">Vpis</a></li>
                                    <li><a href="{{ route('register') }}">Registracija</a></li>
                                @endauth
                                <li><a href="/contact">Kontaktirajte nas</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="footer-wiz">
                            <h3 class="footer-wiz-title">
                                Najnovejše novice

                            </h3>
                            <ul class="latest-news">
                                @foreach ($news as $latest)
                                    <li> <a href="{{ route('news.details', $latest->id) }}" title="">
                                            {{ $latest->news_title_slo }}
                                        </a>
                                        <p>{{ $latest->news_excerpt_slo }}</p>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="/news" class="all-news">Ostale novice</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="footer-wiz">
                            <h3 class="footer-logo"><img src="{{ asset('frontend/assets/images/footer-logo.png') }}"
                                    alt="Bee Keeping" />
                            </h3>
                            <p>Beekeeping is not just a hobby, it's a way of life that connects you with nature.</p>
                            <ul class="footer-contact">
                                <li><i class="fa fa-phone"></i> {{ $setting->phone_one }}</li>
                                <li><i class="fa fa-phone"></i> {{ $setting->phone_two }}</li>
                                <li><i class="fa fa-envelope"></i> {{ $setting->email }}</li>
                                <li><i class="fa fa-fax"></i> {{ $setting->fax }}</li>
                            </ul>
                            <div class="top-social bottom-social"> <a href="{{ $setting->facebook }}"><i
                                        class="fa fa-facebook"></i></a> <a href="{{ $setting->twitter }}"><i
                                        class="fa fa-twitter"></i></a>
                                <a href="{{ $setting->youtube }}"><i class="fa fa-youtube"></i></a> <a
                                    href="{{ $setting->youtube }}"><i class="fa fa-rss"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="footer-wiz footer-menu">
                            <h3 class="footer-wiz-title">Quick Links</h3>
                            <ul>
                                <li><a href="/about">About Us</a></li>
                                <li><a href="/shop">Our Products</a></li>
                                <li><a href="/blog">Blog</a></li>
                                <li><a href="/news">News &amp; Media</a></li>
                                <li><a href="/video">Video Gallery</a></li>
                                <li><a href="/photo">Photo Gallery</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="footer-wiz footer-menu">
                            <h3 class="footer-wiz-title">Usefull Links</h3>
                            <ul>
                                @auth
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Registration</a></li>
                                @endauth
                                <li><a href="/contact">Contact Us</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="footer-wiz">
                            <h3 class="footer-wiz-title">
                                Latest News
                            </h3>
                            <ul class="latest-news">
                                @foreach ($news as $latest)
                                    <li> <a href="{{ route('news.details', $latest->id) }}" title="">
                                            {{ $latest->news_title_en }}

                                        </a>
                                        <p>{{ $latest->news_excerpt_en }}</p>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="/news" class="all-news">Check All News</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
    <!-- footer top end -->

    <!-- copyright start -->
    <div class="footer-bottom-area">
        <div class="container">
            @if (session()->get('language') == 'slovenian')
                <div class="row">

                    <div class="col-12 col-lg-6 wow fadeInLeft">Copyright © 2018 <span>Beekeeping</span>. Vse pravice
                        pridržane</div>
                    <div class="col-12 col-lg-6 text-right wow fadeInRight">Izdelava spletne strani: <a
                            href="http://as-storitve.si" title="web24service" target="_blank">As Storitve</a>
                    </div>
                </div>
            @else
                <div class="row">

                    <div class="col-12 col-lg-6 wow fadeInLeft">Copyright © 2018 <span>Wrold BeeKeeping</span>. All
                        Rights Reserved</div>
                    <div class="col-12 col-lg-6 text-right wow fadeInRight">Powered By: <a
                            href="http://web24service.com/" title="web24service" target="_blank">web24service</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- copyright end -->
</footer>
