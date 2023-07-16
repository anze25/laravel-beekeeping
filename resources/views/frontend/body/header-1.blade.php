<header class="for-sticky">
    <!-- Header top area start -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-6">
                    <div class="top-contact"> <a href="#"><i class="fa fa-envelope"></i> info@worldbeekeeping.com</a>
                        <a href="#"><i class="fa fa-phone"></i> +88 01911 837404</a>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-6 text-right">
                    <div class="top-menu top-bar-menu">
                        <ul>
                            <li><a href="#">My Account</a>
                                <ul>
                                    <li><a href="my-account.html">Account Overview</a></li>
                                    <li><a href="edit-account.html">Edit Account</a></li>
                                    <li><a href="my-order.html">My Order</a></li>
                                    <li><a href="my-wishlist.html">My Wishlist</a></li>
                                    <li><a href="cart.html">My Cart</a></li>
                                    <li><a href="order-tracking.html">Order Tracking</a></li>
                                    <li><a href="order-form.html">Create Order</a></li>
                                    <li><a href="change-pass.html">Change Password</a></li>
                                </ul>
                            </li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                        </ul>
                    </div>
                    <div class="top-bar-cart" id="cart"><i class="fa fa-shopping-cart"></i><span
                            class="badge">3</span></div>
                    <div class="shopping-cart">
                        <div class="shopping-cart-header">
                            <div class="cart-status"><i class="fa fa-shopping-cart"></i><span class="badge">3</span>
                            </div>
                            <div class="shopping-cart-total"> <span class="lighter-text">Total:</span> <span
                                    class="main-color-text">$2,229.97</span> </div>
                        </div>
                        <!--end shopping-cart-header -->

                        <ul class="shopping-cart-items">
                            <li class="clearfix"> <img src="assets/images/latest-post1.jpg" alt="item1" /> <span
                                    class="item-name">Beekeeping Hive for beeginer</span> <span
                                    class="item-price">$849.99</span> <span class="item-quantity">Quantity: 01</span>
                            </li>
                            <li class="clearfix"> <img src="assets/images/latest-post2.jpg" alt="item1" /> <span
                                    class="item-name">Beekeeping Smoker for Beekeeper</span> <span
                                    class="item-price">$1,249.99</span> <span class="item-quantity">Quantity: 01</span>
                            </li>
                            <li class="clearfix"> <img src="assets/images/latest-post3.jpg" alt="item1" /> <span
                                    class="item-name">Beekeeping Brash for Beekeeper</span> <span
                                    class="item-price">$129.99</span> <span class="item-quantity">Quantity: 01</span>
                            </li>
                        </ul>
                        <a href="checkout.html" class="button">Checkout</a>
                    </div>
                </div>
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
                    <li class="nav-active"><a href="#">Home</a>
                        <ul>
                            <li><a href="index.html">Home version 1</a></li>
                            <li class="child-active"><a href="index2.html">Home version 2</a></li>
                            <li><a href="index3.html">Background video</a></li>
                            <li><a href="index4.html">Box Layout with banner video</a></li>
                        </ul>
                    </li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="{{ route('shop.page') }}">Shop</a>
                        <ul>
                            <li><a href="product.html">Shop page 1</a></li>
                            <li><a href="product-2.html">Shop page 2</a></li>
                            <li><a href="product-details.html">Shop Details</a></li>
                        </ul>
                    </li>
                    <li><a href="news.html">News &amp; Media</a></li>
                    <li><a href="{{ route('home.blog') }}">Blog</a>

                    </li>
                    <li><a href="#">pages</a>
                        <ul>
                            <li><a href="training.html">Our Training</a></li>
                            <li><a href="video-gallery.html">Video Gallery</a></li>
                            <li><a href="photo-gallery.html">Photo Gallery</a></li>
                            <li><a href="#">My Account</a>
                                <ul>
                                    <li><a href="my-account.html">Account Overview</a></li>
                                    <li><a href="edit-account.html">Edit Account</a></li>
                                    <li><a href="my-order.html">My Order</a></li>
                                    <li><a href="my-wishlist.html">My Wishlist</a></li>
                                    <li><a href="cart.html">My Cart</a></li>
                                    <li><a href="order-tracking.html">Order Tracking</a></li>
                                    <li><a href="order-form.html">Create Order</a></li>
                                    <li><a href="change-pass.html">Change Password</a></li>
                                </ul>
                            </li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="registration.html">Registration</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="404-error.html">404 Error</a></li>
                            <li><a href="sitemap.html">Site map</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contuct Us</a></li>
                </ul>
            </nav>
            <!-- Main menu end -->
        </div>
    </div>
    <!-- Header area End -->
</header>
