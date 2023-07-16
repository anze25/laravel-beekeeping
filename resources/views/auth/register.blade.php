@extends('frontend.main_master')
@section('content')

@section('title')
    @if (session()->get('language') == 'slovenian')
        Registracija
    @else
        Registration Page
    @endif
@endsection

<div class="bee-content-block">
    <div class="container">
        <div class="customer-login">
            @if (session()->get('language') == 'slovenian')
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="customer-login-left">
                            <div class="login-icon"><i class="fa fa-unlock-alt"></i></div>
                            <h4>Dobrodošli v novem računu</h4>
                            <p>Ustvarite svoj račun in kupite, kar potrebujete.<br>
                                Če že imate račun, se prosimo <a href="{{ route('login') }}">prijavite</a>.</p>
                            <div class=""> <a href="" class="btn btn-social btn-facebook"><i
                                        class="fa fa-facebook"></i> Prijavite se preko Facebooka</a> <a href=""
                                    class="btn btn-social btn-google-plus"><i class="fa fa-google-plus"></i> Prijavite
                                    se preko Googla</a> </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="customer-login-block">
                            <h3>Registracija</h3>
                            <form method="POST" action="{{ route('register') }}" role="form">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label>Ime:</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name"
                                                required />
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label>Priimek:</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                required />
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label>Email naslov:</label>
                                            <input type="email" class="form-control" name="email" required />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label>Geslo (vsaj 8 znakov):</label>
                                            <input type="password" class="form-control" name="password" id="password"
                                                required />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label>Ponovi geslo:</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                id="password_confirmation" required />
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-submit">Registriraj se</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="customer-login-left">
                            <div class="login-icon"><i class="fa fa-unlock-alt"></i></div>
                            <h4>Welcome To new account</h4>
                            <p>Create your account and buy what you need.<br>
                                If you have account already, please <a href="{{ route('login') }}">Sign in</a>.</p>
                            <div class=""> <a href="" class="btn btn-social btn-facebook"><i
                                        class="fa fa-facebook"></i> Sign in with Facebook</a> <a href=""
                                    class="btn btn-social btn-google-plus"><i class="fa fa-google-plus"></i> Sign in
                                    with
                                    Google</a> </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="customer-login-block">
                            <h3>Registration</h3>
                            <form method="POST" action="{{ route('register') }}" role="form">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label>First Name:</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name"
                                                required />
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label>Last Name:</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                required />
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" name="email" required />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label>Password (min 8 chars):</label>
                                            <input type="password" class="form-control" name="password"
                                                id="password" required />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label>Confirm Password:</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                id="password_confirmation" required />
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-submit">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
