@extends('frontend.main_master')
@section('content')

@section('title')
    @if (session()->get('language') == 'slovenian')
        Uredi račun
    @else
        Edit My Account information
    @endif
@endsection

<div class="bee-content-block">
    <div class="container">
        <div class="row flex-lg-row-reverse">
            @if (session()->get('language') == 'slovenian')
                <div class="col-12 col-lg-9">
                    <div class="my-account-page-title">
                        <h3>Uredi profil</h3>
                    </div>
                    <div class="order-form">
                        <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                            @csrf

                            <h5>Osebni podatki</h5>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <div class="profile">
                                            <label class="info-title" for="exampleInputEmail1">Trenutna profilna slika
                                                <span>
                                                </span></label>
                                            <div class="profile-photo"> <img
                                                    src="{{ !empty($user->profile_photo_path) ? url('frontend/images/users/' . $user->profile_photo_path) : url('frontend/images/user_default.jpg') }}"
                                                    {{-- src="/frontend/images/users/{{ $user->profile_photo_path }}" --}} alt="Client 1" />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <input type="file" name="profile_photo_path" class="form-control"
                                            id="image">
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <label class="info-title" for="exampleInputEmail1">Nova profilna slika <span>
                                            </span></label>
                                        <div class="profile-photo">

                                            <img id="showImage"
                                                src="{{ !empty($editData->profile_photo_path) ? url('upload/admin_images/' . $editData->profile_photo_path) : url('upload/no_image.jpg') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Ime:</label>
                                        <input type="text" class="form-control" name="first_name"
                                            value="{{ $user->first_name }}" required />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Priimek:</label>
                                        <input type="text" class="form-control" name="last_name"
                                            value="{{ $user->last_name }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Naslov:</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $user->address }}" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Email:</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $user->email }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Poštna številka:</label>
                                        <input type="text" class="form-control" name="postal_code"
                                            value="{{ $user->postal_code }}" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Kraj:</label>
                                        <input type="text" class="form-control" name="city"
                                            value="{{ $user->city }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Država:</label>
                                        <input type="text" class="form-control" name="country"
                                            value="{{ $user->country }}" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Telefon:</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $user->phone }}" />
                                    </div>
                                </div>
                            </div>

                            <h5>Naslov za dostavo</h5>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <label>NAslov:</label>
                                        <input type="text" class="form-control" name="shipping_address"
                                            value="{{ $user->shipping_address }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Poštna številka:</label>
                                        <input type="text" class="form-control" name="shipping_postal_code"
                                            value="{{ $user->shipping_postal_code }}" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Kraj:</label>
                                        <input type="text" class="form-control" name="shipping_city"
                                            value="{{ $user->shipping_city }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Država:</label>
                                        <input type="text" class="form-control" name="shipping_country"
                                            value="{{ $user->shipping_country }}" />
                                    </div>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-submit">Posodobi</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="col-12 col-lg-9">
                    <div class="my-account-page-title">
                        <h3>Edit Profile</h3>
                    </div>
                    <div class="order-form">
                        <form method="post" action="{{ route('user.profile.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <h5>Personal information</h5>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <div class="profile">
                                            <label class="info-title" for="exampleInputEmail1">Current User Image
                                                <span>
                                                </span></label>
                                            <div class="profile-photo"> <img
                                                    src="{{ !empty($user->profile_photo_path) ? url('frontend/images/users/' . $user->profile_photo_path) : url('frontend/images/user_default.jpg') }}"
                                                    {{-- src="/frontend/images/users/{{ $user->profile_photo_path }}" --}} alt="Client 1" />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <input type="file" name="profile_photo_path" class="form-control"
                                            id="image">
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <label class="info-title" for="exampleInputEmail1">New User Image <span>
                                            </span></label>
                                        <div class="profile-photo">

                                            <img id="showImage"
                                                src="{{ !empty($editData->profile_photo_path) ? url('upload/admin_images/' . $editData->profile_photo_path) : url('upload/no_image.jpg') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Your Name:</label>
                                        <input type="text" class="form-control" name="first_name"
                                            value="{{ $user->first_name }}" required />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Last Name:</label>
                                        <input type="text" class="form-control" name="last_name"
                                            value="{{ $user->last_name }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Address:</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $user->address }}" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Email:</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $user->email }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Postal Code:</label>
                                        <input type="text" class="form-control" name="postal_code"
                                            value="{{ $user->postal_code }}" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>City:</label>
                                        <input type="text" class="form-control" name="city"
                                            value="{{ $user->city }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Country:</label>
                                        <input type="text" class="form-control" name="country"
                                            value="{{ $user->country }}" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Phone:</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $user->phone }}" />
                                    </div>
                                </div>
                            </div>

                            <h5>Shipment information</h5>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Address:</label>
                                        <input type="text" class="form-control" name="shipping_address"
                                            value="{{ $user->shipping_address }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Postal Code:</label>
                                        <input type="text" class="form-control" name="shipping_postal_code"
                                            value="{{ $user->shipping_postal_code }}" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>City:</label>
                                        <input type="text" class="form-control" name="shipping_city"
                                            value="{{ $user->shipping_city }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label>Country:</label>
                                        <input type="text" class="form-control" name="shipping_country"
                                            value="{{ $user->shipping_country }}" />
                                    </div>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-submit">Update now</button>
                        </form>
                    </div>
                </div>
            @endif
            @include('frontend.common.my_account_sidebar')
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection

<style>
.profile-photo img {
    max-width: 138px;
    border-radius: 50%;
    margin: 10px 0px;
    height: 138px;
    display: inline-block !important;
    border: 5px solid rgba(255, 205, 0, 0.9);
}
</style>
