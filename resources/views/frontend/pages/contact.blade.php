@extends('frontend.main_master')
@section('content')
@section('title')
    @if (session()->get('language') == 'slovenian')
        Kontaktirajte nas
    @else
        Contact Us
    @endif

@endsection
@section('content')
    <!-- Address start -->
    <div class="bee-content-block">
        @php
            $setting = App\Models\SiteSetting::find(1);
            
        @endphp
        <div class="container">
            @if (session()->get('language') == 'english')
                <div class="row">
                    <div class="col-12">
                        <div class="contact-top">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="address">
                                        <h3>Office Address</h3>
                                        <div class="address-block">
                                            <ul>
                                                <li class="address-icon"><strong>Adderss:</strong><br>
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry.
                                                </li>
                                                <li class="phone-icon"><strong>Telephone No:</strong><br>
                                                    +88 01711 123456</li>
                                                <li class="fax-icon"><strong>Fax No:</strong><br>
                                                    +88 01711 123456</li>
                                                <li class="email-icon"><strong>Email:</strong><br>
                                                    <a href="mailto:web24service@gmail.com"
                                                        title="">web24service@gmail.com</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="contact-form">
                                        <h3 class="heading3-border text-uppercase">Quick Feedback Form</h3>
                                        <form action="#">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <input type="text" class="form-control"
                                                            placeholder="Your Full Name">
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Company">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <input type="email" class="form-control" placeholder="Email">
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <input type="text" class="form-control"
                                                            placeholder="Phone Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" placeholder="Message"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn bee-button">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12">
                        <div class="contact-top">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="address">
                                        <h3>Naslov podjetja</h3>
                                        <div class="address-block">
                                            <ul>
                                                <li class="address-icon"><strong>Naslov:</strong><br>
                                                    {{ $setting->company_address }}
                                                </li>
                                                <li class="phone-icon"><strong>Telefon:</strong><br>
                                                    {{ $setting->phone_one }}</li>
                                                <li class="fax-icon"><strong>Fax:</strong><br>
                                                    {{ $setting->fax }}</li>
                                                <li class="email-icon"><strong>Email:</strong><br>
                                                    <a href="mailto:{{ $setting->email }}"
                                                        title="">{{ $setting->email }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="contact-form">
                                        <h3 class="heading3-border text-uppercase">Vaše sporočilo</h3>
                                        <form action="#">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <input type="text" class="form-control"
                                                            placeholder="Ime in priimek">
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Podjetje">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <input type="email" class="form-control" placeholder="Email">
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <input type="text" class="form-control"
                                                            placeholder="Telefonska številka">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" placeholder="Sporočilo"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn bee-button">Pošlji</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Address End -->

            <!-- Map Start -->
            <div class="row">
                <div class="col-12">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=++Gulshan-1,+Dhaka-1212.&aq=&sll=23.78024,90.418081&sspn=0.01076,0.018475&ie=UTF8&hq=&hnear=1+Gulshan+Ave,+Gulshan,+Dhaka,+Dhaka+Division+1212,+Bangladesh&t=m&z=14&ll=23.780244,90.418078&output=embed"></iframe>
                    </div>
                </div>
            </div>
            <!-- Map End -->
        </div>
    </div>


    <!-- testimonial start -->
    @include('frontend.common.testimonials')
    <!-- testimonial end -->
@endsection
