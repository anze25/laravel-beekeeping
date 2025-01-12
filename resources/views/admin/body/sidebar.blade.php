@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="/">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Easy</b> Shop</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>
                        @if (session()->get('language') == 'slovenian')
                            Nadzorna plošča
                        @else
                            Dashboard
                        @endif

                    </span>
                </a>
            </li>

            {{-- <li class="treeview {{ $prefix == '/brand' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all.brand' ? 'active' : '' }}"><a href="{{ route('all.brand') }}"><i
                                class="ti-more"></i>All Brand</a></li>

                </ul>
            </li> --}}



            <li class="treeview {{ $prefix == '/category' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="mail"></i> <span>
                        @if (session()->get('language') == 'slovenian')
                            Kategorije
                        @else
                            Category
                        @endif
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all.category' ? 'active' : '' }}"><a href="{{ route('all.category') }}"><i
                                class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Vse kategorije
                            @else
                                All Category
                            @endif
                        </a></li>
                    <li class="{{ $route == 'all.subcategory' ? 'active' : '' }}"><a
                            href="{{ route('all.subcategory') }}"><i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Vse podkategorije
                            @else
                                All Subategory
                            @endif
                        </a></li>


                </ul>
            </li>



            <li class="treeview {{ $prefix == '/product' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>
                        @if (session()->get('language') == 'slovenian')
                            Produkti
                        @else
                            Products
                        @endif
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'add-product' ? 'active' : '' }}"><a href="{{ route('add-product') }}"><i
                                class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Dodaj produkte
                            @else
                                Add Products
                            @endif
                        </a></li>

                    <li class="{{ $route == 'manage-product' ? 'active' : '' }}"><a
                            href="{{ route('manage-product') }}"><i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Urejaj produkte
                            @else
                                Manage Products
                            @endif
                        </a></li>

                </ul>
            </li>


            <li class="treeview {{ $prefix == '/slider' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>
                        @if (session()->get('language') == 'slovenian')
                            Dričnik
                        @else
                            Slider
                        @endif
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'manage-slider' ? 'active' : '' }}">
                        <a href="{{ route('manage-slider') }}">
                            <i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Upravljaj Dričnik
                            @else
                                Manage Slider
                            @endif
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/coupons' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>
                        @if (session()->get('language') == 'slovenian')
                            Kuponi
                        @else
                            Coupons
                        @endif
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'manage-coupon' ? 'active' : '' }}">
                        <a href="{{ route('manage-coupon') }}">
                            <i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Upravljaj Kupon
                            @else
                                Manage Coupon
                            @endif
                        </a>
                    </li>
                </ul>
            </li>



            <li class="treeview {{ $prefix == '/blog' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Blog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'blog.category' ? 'active' : '' }}"><a
                            href="{{ route('blog.category') }}"><i class="ti-more"></i>Blog Category</a></li>

                    <li class="{{ $route == 'list.post' ? 'active' : '' }}"><a href="{{ route('list.post') }}"><i
                                class="ti-more"></i>List Blog Post</a></li>

                    <li class="{{ $route == 'add.post' ? 'active' : '' }}"><a href="{{ route('add.post') }}"><i
                                class="ti-more"></i>Add Blog Post</a></li>

                </ul>
            </li>

            <li class="treeview {{ $prefix == '/setting' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>
                        @if (session()->get('language') == 'slovenian')
                            Upravljaj Nastavitve
                        @else
                            Manage Setting
                        @endif
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'site.setting' ? 'active' : '' }}">
                        <a href="{{ route('site.setting') }}">
                            <i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Nastavitve Spletnega Mesta
                            @else
                                Site Setting
                            @endif
                        </a>
                    </li>
                    <li class="{{ $route == 'seo.setting' ? 'active' : '' }}">
                        <a href="{{ route('seo.setting') }}">
                            <i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                SEO Nastavitve
                            @else
                                Seo Setting
                            @endif
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/return' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>
                        @if (session()->get('language') == 'slovenian')
                            Vrnitev naročila
                        @else
                            Return Order
                        @endif
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'return.request' ? 'active' : '' }}">
                        <a href="{{ route('return.request') }}">
                            <i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Zahteva za vračilo
                            @else
                                Return Request
                            @endif
                        </a>
                    </li>

                    <li class="{{ $route == 'all.request' ? 'active' : '' }}">
                        <a href="{{ route('all.request') }}">
                            <i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Vse zahteve
                            @else
                                All Request
                            @endif
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/review' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>
                        @if (session()->get('language') == 'slovenian')
                            Upravljaj Oceno
                        @else
                            Manage Review
                        @endif
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'pending.review' ? 'active' : '' }}">
                        <a href="{{ route('pending.review') }}">
                            <i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Čakajoč Oceno
                            @else
                                Pending Review
                            @endif
                        </a>
                    </li>

                    <li class="{{ $route == 'publish.review' ? 'active' : '' }}">
                        <a href="{{ route('publish.review') }}">
                            <i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Objavi Oceno
                            @else
                                Publish Review
                            @endif
                        </a>
                    </li>

                </ul>
            </li>

            <li class="header nav-small-cap">
                @if (session()->get('language') == 'slovenian')
                    Uporabniški Vmesnik
                @else
                    User Interface
                @endif
            </li>


            <li class="treeview {{ $prefix == '/orders' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>
                        @if (session()->get('language') == 'slovenian')
                            Naročila
                        @else
                            Orders
                        @endif
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'pending-orders' ? 'active' : '' }}"><a
                            href="{{ route('pending-orders') }}"><i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Čakajoča naročila
                            @else
                                Pending Orders
                            @endif
                        </a></li>

                    <li class="{{ $route == 'confirmed-orders' ? 'active' : '' }}"><a
                            href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Potrjena naročila
                            @else
                                Confirmed Orders
                            @endif
                        </a></li>

                    <li class="{{ $route == 'processing-orders' ? 'active' : '' }}"><a
                            href="{{ route('processing-orders') }}"><i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Naročila v obdelavi
                            @else
                                Processing Orders
                            @endif
                        </a></li>

                    <li class="{{ $route == 'picked-orders' ? 'active' : '' }}"><a
                            href="{{ route('picked-orders') }}"><i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Izbrana naročila
                            @else
                                Picked Orders
                            @endif
                        </a></li>

                    <li class="{{ $route == 'shipped-orders' ? 'active' : '' }}"><a
                            href="{{ route('shipped-orders') }}"><i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Poslana naročila
                            @else
                                Shipped Orders
                            @endif
                        </a></li>

                    <li class="{{ $route == 'delivered-orders' ? 'active' : '' }}"><a
                            href="{{ route('delivered-orders') }}"><i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Dostavljena naročila
                            @else
                                Delivered Orders
                            @endif
                        </a></li>

                    <li class="{{ $route == 'cancel-orders' ? 'active' : '' }}"><a
                            href="{{ route('cancel-orders') }}"><i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Preklicana naročila
                            @else
                                Cancel Orders
                            @endif
                        </a></li>
                </ul>
            </li>


            <li class="treeview {{ $prefix == '/stock' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>
                        @if (session()->get('language') == 'slovenian')
                            Upravljaj Zaloge
                        @else
                            Manage Stock
                        @endif
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'product.stock' ? 'active' : '' }}">
                        <a href="{{ route('product.stock') }}">
                            <i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Zaloga Izdelka
                            @else
                                Product Stock
                            @endif
                        </a>
                    </li>
                </ul>
            </li>


            <li class="treeview {{ $prefix == '/reports' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>
                        @if (session()->get('language') == 'slovenian')
                            Vsa poročila
                        @else
                            All Reports
                        @endif
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all-reports' ? 'active' : '' }}">
                        <a href="{{ route('all-reports') }}">
                            <i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Vsa poročila
                            @else
                                All Reports
                            @endif
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/alluser' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>
                        @if (session()->get('language') == 'slovenian')
                            Vsi uporabniki
                        @else
                            All Users
                        @endif
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all-users' ? 'active' : '' }}">
                        <a href="{{ route('all-users') }}">
                            <i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Vsi uporabniki
                            @else
                                All Users
                            @endif
                        </a>
                    </li>
                </ul>
            </li>


            <li class="treeview {{ $prefix == '/adminuserrole' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>
                        @if (session()->get('language') == 'slovenian')
                            Vloga Admin Uporabnika
                        @else
                            Admin User Role
                        @endif
                    </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all.admin.user' ? 'active' : '' }}">
                        <a href="{{ route('all.admin.user') }}">
                            <i class="ti-more"></i>
                            @if (session()->get('language') == 'slovenian')
                                Vsi Admin Uporabniki
                            @else
                                All Admin User
                            @endif
                        </a>
                    </li>
                </ul>
            </li>



        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
