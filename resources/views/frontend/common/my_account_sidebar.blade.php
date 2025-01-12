<div class="col-12 col-lg-3">
    <div class="left-block left-menu mt-md-30">
        @auth
            @if (session()->get('language') == 'slovenian')
                <ul>
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"
                            title="My Account">Pregled računa</a></li>
                    <li class="{{ request()->is('user/profile') ? 'active' : '' }}"><a href="{{ route('user.profile') }}"
                            title="Uredi račun">Uredi račun</a></li>
                    <li
                        class="{{ request()->is('user/my/orders') || request()->is('user/order_details/*') || request()->is('user/order/*') ? 'active' : '' }}">
                        <a href="{{ route('my.orders') }}" title="Moja naročila">Moja naročila</a>
                    </li>
                    <li class="{{ request()->is('user/wishlist') ? 'active' : '' }}"><a href="{{ route('wishlist') }}"
                            title="Seznam želja">Seznam želja</a></li>
                    <li class="{{ request()->is('user/mycart') ? 'active' : '' }}"><a href="{{ route('mycart') }}"
                            title="Košarica">Košarica</a></li>

                    <li class="{{ request()->is('user/change/password') ? 'active' : '' }}"> <a
                            href="{{ route('change.password') }}" title="Spremeni geslo">Spremeni geslo</a></li>
                    <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                            title="Odjava">Odjava</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            @else
                <ul>
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"
                            title="My Account">My Account Overview</a></li>
                    <li class="{{ request()->is('user/profile') ? 'active' : '' }}"><a href="{{ route('user.profile') }}"
                            title="Edit Account">Edit Account</a></li>
                    <li
                        class="{{ request()->is('user/my/orders') || request()->is('user/order_details/*') || request()->is('user/order/*') ? 'active' : '' }}">
                        <a href="{{ route('my.orders') }}" title="My Order">My
                            Orders</a>
                    </li>
                    <li class="{{ request()->is('user/wishlist') ? 'active' : '' }}"><a href="{{ route('wishlist') }}"
                            title="My Wishlist">My Wishlist</a></li>
                    <li class="{{ request()->is('user/mycart') ? 'active' : '' }}"><a href="{{ route('mycart') }}"
                            title="My Cart">My
                            Cart</a></li>

                    <li class="{{ request()->is('user/change/password') ? 'active' : '' }}"> <a
                            href="{{ route('change.password') }}" title="Change Password">Change Password</a></li>
                    <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                            title="Sign out">Sign out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            @endif
        @else
            @if (session()->get('language') == 'slovenian')
                <ul>
                    <li class="{{ request()->is('user/mycart') ? 'active' : '' }}"><a href="{{ route('mycart') }}"
                            title="Košarica">Košarica</a></li>
                </ul>
            @else
                <ul>

                    <li class="{{ request()->is('user/mycart') ? 'active' : '' }}"><a href="{{ route('mycart') }}"
                            title="My Cart">My
                            Cart</a></li>
                </ul>
            @endif
        @endauth

    </div>
</div>
