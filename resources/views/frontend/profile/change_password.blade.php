@extends('frontend.main_master')
@section('content')

@section('title')
    Change Password
@endsection

<!-- My Wishlist start -->
<div class="bee-content-block">
    <div class="container">
        <div class="row flex-lg-row-reverse">
            <div class="col-12 col-lg-9">
                <div class="my-account-page-title">
                    <h3>Change Your Password</h3>
                </div>
                <div class="order-form change-pass-form">
                    <form method="post" action="{{ route('user.password.update') }}">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 col-sm-6 col-md-4 col-lg-4 text-right">Old Password:</label>
                                <div class="col-12 col-sm-6 col-md-8 col-lg-6">
                                    <input type="password" class="form-control" id="current_password"
                                        name="oldpassword" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 col-sm-6 col-md-4 col-lg-4 text-right">New Password:</label>
                                <div class="col-12 col-sm-6 col-md-8 col-lg-6">
                                    <input type="password" class="form-control" id="password" name="password" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 col-sm-6 col-md-4 col-lg-4 text-right">Confirm New
                                    Password:</label>
                                <div class="col-12 col-sm-6 col-md-8 col-lg-6">
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 offset-sm-6 col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-submit">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @include('frontend.common.my_account_sidebar')
        </div>
    </div>
</div>

@endsection
