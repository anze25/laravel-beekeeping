<div class="col-12 col-md-5 col-lg-6 text-right">
    <div class="top-menu top-bar-menu">

        <ul>
            @if (session()->get('language') == 'slovenian')
                <li><a href="{{ route('english.language') }}">
                        @if (session()->get('language') == 'slovenian')
                            <img src="{{ asset('frontend/assets/images/eng.png') }}" style="width:16px" alt=""
                                srcset="">
                        @else
                            <img src="{{ asset('frontend/assets/images/slo.png') }}" style="width:16px" alt=""
                                srcset="">
                        @endif
                    </a></li>
            @else
                <li><a href="{{ route('slovenian.language') }}">
                        @if (session()->get('language') == 'slovenian')
                            <img src="{{ asset('frontend/assets/images/eng.png') }}" style="width:16px" alt=""
                                srcset="">
                        @else
                            <img src="{{ asset('frontend/assets/images/slo.png') }}" style="width:16px" alt=""
                                srcset="">
                        @endif
                    </a></li>
            @endif
            {{-- <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                    data-toggle="dropdown"><span class="value">
                        @if (session()->get('language') == 'slovenian')
                            Jezik
                        @else
                            Language
                        @endif
                    </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    @if (session()->get('language') == 'slovenian')
                        <li><a href="{{ route('english.language') }}">
                                @if (session()->get('language') == 'slovenian')
                                    ENG
                                @else
                                    SLO
                                @endif
                            </a></li>
                    @else
                        <li><a href="{{ route('slovenian.language') }}">
                                @if (session()->get('language') == 'slovenian')
                                    ENG
                                @else
                                    SLO
                                @endif
                            </a></li>
                    @endif
                </ul>
            </li> --}}
            @auth
                <li><a href="{{ route('dashboard') }}">
                        @if (session()->get('language') == 'slovenian')
                            Moj račun
                        @else
                            My Account
                        @endif
                    </a>
                </li>
                <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                        title="Sign out">
                        @if (session()->get('language') == 'slovenian')
                            Izpis
                        @else
                            Sign out
                        @endif
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">
                        @if (session()->get('language') == 'slovenian')
                            Vpis / Registracija
                        @else
                            Login / Register
                        @endif
                    </a></li>
            @endauth
            <li><a href="/admin/login">Admin</a></li>
        </ul>
    </div>

    <div class="top-bar-cart" id="cart"><i class="fa fa-shopping-cart"></i><span class="badge"
            id="cartQty"></span>
    </div>
    <div class="shopping-cart">
        <div class="shopping-cart-header">
            <div class="cart-status"><i class="fa fa-shopping-cart"></i>
                <span class="badge" id="cartQty"></span>
            </div>
            <div class="shopping-cart-total"> <span class="lighter-text">Total:</span> <span class="main-color-text"
                    id="cartSubTotal"></span> </div>
        </div>
        <!--end shopping-cart-header -->

        <ul class="shopping-cart-items" id="miniCart">

        </ul>
        <a href="{{ route('mycart') }}" type="submit" class="button">Go To Cart</a>
    </div>
</div>
