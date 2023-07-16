@extends('frontend.main_master')
@section('content')
@section('title')
    @if (session()->get('language') == 'slovenian')
        Vpis
    @else
        Login Page
    @endif
@endsection

<div class="bee-content-block">
    <div class="container">
        <div class="customer-login">
            @if (session()->get('language') == 'slovenian')
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="customer-login-left">
                            <div class="login-icon"><i class="fa fa-lock"></i></div>
                            <h4>Dobrodošli v vašem računu</h4>
                            <p>Prijavite se v svoj račun in kupite, kar potrebujete.<br>
                                Če nimate računa, prosimo ustvarite nov račun <a
                                    href="{{ route('register') }}">tukaj</a>.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="customer-login-block">
                            <h3>Prijavite se v svoj račun</h3>
                            <form method="POST" action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email naslov:</label>
                                    <input type="email" name="email" class="form-control" id="email" />
                                </div>
                                <div class="form-group">
                                    <label>Geslo:</label>
                                    <input type="password" class="form-control" name="password" id="password" />
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="remember" id="remember" class="css-checkbox" />
                                    <label for="remember" class="css-label">Zapomni si</label>
                                    <a href="{{ route('password.request') }}" title=""
                                        class="forgot-pass">Pozabljeno geslo?</a>
                                </div>
                                <button type="submit" class="btn btn-submit">Vpis</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="customer-login-left">
                            <div class="login-icon"><i class="fa fa-lock"></i></div>
                            <h4>Welcome to your account</h4>
                            <p>Login your account and buy what you need.<br>
                                If you have no account, please <a href="{{ route('register') }}">Create a new
                                    account</a>.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="customer-login-block">
                            <h3>Login to your account</h3>
                            <form method="POST" action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email address:</label>
                                    <input type="email" name="email" class="form-control" id="email" />
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" class="form-control" name="password" id="password" />
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="remember" id="remember" class="css-checkbox" />
                                    <label for="remember" class="css-label">Remember me</label>
                                    <a href="{{ route('password.request') }}" title="" class="forgot-pass">Forgot
                                        your
                                        password?</a>
                                </div>
                                <button type="submit" class="btn btn-submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
