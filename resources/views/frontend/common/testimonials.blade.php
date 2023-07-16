<!-- Contact Button start -->
<div class="bee-content-block order-request-btn-sec">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9 wow fadeInLeft">
                @if (session()->get('language') == 'slovenian')
                    <h4>Najboljša svetovna kakovost izdelkov in usposabljanja za <span>čebelarstvo</span>
                    </h4>
                @else
                    <h4>The world best quality of product and Training, for <span>Beekeeping</span> with
                        <span>Bee!</span>
                    </h4>
                @endif

            </div>
            <div class="col-12 col-lg-3 text-right wow fadeInRight"><a href="" title=""
                    class="bee-button hover-red">
                    @if (session()->get('language') == 'slovenian')
                        Oddaj naročilo
                    @else
                        Request For Order
                    @endif
                </a></div>
        </div>
    </div>
</div>
<!-- Contact Button End -->

<!-- testimonial start -->
<div class="bee-content-block testimonial-sec text-center wow fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title-bg">
                    @if (session()->get('language') == 'slovenian')
                        Mnenja kupcev
                    @else
                        Testimonial
                    @endif
                </h2>
            </div>
        </div>
        <div class="testimonial">
            <div class="testimonial-item"> <img src="{{ asset('frontend/assets/images/testimonial.jpg') }}"
                    alt="Client 1" />
                <h4>Client Name</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                    been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<i
                        class="fa fa-quote-right"></i></p>
            </div>
            <div class="testimonial-item"> <img src="{{ asset('frontend/assets/images/testimonial.jpg') }}"
                    alt="Client 1" />
                <h4>Client Name</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                    been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<i
                        class="fa fa-quote-right"></i></p>
            </div>
            <div class="testimonial-item"> <img src="{{ asset('frontend/assets/images/testimonial.jpg') }}"
                    alt="Client 1" />
                <h4>Client Name</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                    been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<i
                        class="fa fa-quote-right"></i></p>
            </div>
        </div>
    </div>
</div>
<!-- testimonial end -->
