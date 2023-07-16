@extends('frontend.main_master')
@section('content')
@section('title')
    @if (session()->get('language') == 'slovenian')
        {{ $product->product_name_slo }}
    @else
        {{ $product->product_name_en }}
    @endif
@endsection

<style>
    .checked {
        color: orange;
    }
</style>

<!-- Product start -->
<div class="bee-content-block">
    <div class="container">
        <div class="row breadcrumb-style2">
            <div class="col-12">
                @if (session()->get('language') == 'slovenian')
                    <a href="/" title="Domov">Domov</a> / Naši izdelki
                @else
                    <a href="/" title="Home">Home</a> / our products
                @endif
            </div>
        </div>
        <div class="product-details-top">
            <div class="row">
                <!-- Product Zoom start -->
                <div class="col-12 col-lg-6">
                    <div class="p-details-zoom ">
                        <div class="p-zoom-big-images">
                            <div class="easyzoom easyzoom--with-thumbnails"> <a
                                    href="/frontend/images/products/{{ $product->product_thumbnail }}"
                                    class="gallery_link" title="#popup_gallery"> <img
                                        src="/frontend/images/products/thumbs/{{ $product->product_thumbnail }}"
                                        alt="Zoom Product 1" class="zoom-big-img" /> </a> </div>
                        </div>
                        <div id="popup_gallery" style="display:none;"> <a
                                href="/frontend/images/products/{{ $product->product_thumbnail }}"> <img
                                    src="/frontend/images/products/thumbs/{{ $product->product_thumbnail }}"
                                    alt="Zoom Product 1" /></a> </div>
                        <div class="zoom-thambnail">
                            <ul class="thumbnails" id="p-details-thumb-slide">

                                @foreach ($multiImag as $img)
                                    <li> <a href="/frontend/images/products/{{ $img->photo_name }}"
                                            data-standard="/frontend/images/products/{{ $img->photo_name }}">
                                            <img src="/frontend/images/products/{{ $img->photo_name }}"
                                                alt="Zoom Product 1-1" /> </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Product Overdiew start -->
                <div class="col-12 col-lg-6">
                    <div class="p-details-title">
                        <h4 id="pname">
                            @if (session()->get('language') == 'slovenian')
                                {{ $product->product_name_slo }}
                            @else
                                {{ $product->product_name_en }}
                            @endif
                        </h4>
                        <div class="review-star">
                            @if ($rating == 0)
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            @elseif($rating == 1 || $rating < 2)
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            @elseif($rating == 2 || $rating < 3)
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            @elseif($rating == 3 || $rating < 4)
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            @elseif($rating == 4 || $rating < 5)
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            @elseif($rating == 5 || $rating < 5)
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            @endif
                            @if (session()->get('language') == 'slovenian')
                                <span>({{ $count }}
                                    glasov)</span> 120 naročil
                            @else
                                <span>({{ $count }}
                                    vote)</span> 120 order
                            @endif
                        </div>
                    </div>
                    <div class="p-item p-item-price">
                        <div class="p-item-title">
                            @if (session()->get('language') == 'slovenian')
                                Cena:
                            @else
                                Price:
                            @endif
                        </div>
                        <div class="p-item-main text-linethrough">{{ $product->selling_price }} €</div>
                    </div>
                    <div class="p-item p-item-price">
                        <div class="p-item-title">
                            @if (session()->get('language') == 'slovenian')
                                Znižana cena:
                            @else
                                Discount Price:
                            @endif
                        </div>
                        <div class="p-item-main"><strong>{{ $product->discount_price }} €</strong></div>
                    </div>
                    @if (session()->get('language') == 'slovenian')
                        <div class="p-item p-item-color">
                            <div class="p-item-title">Velikost:</div>

                            <div class="p-item-main"><strong>
                                    {{ $product->product_size_slo }}

                                </strong></div>
                        </div>
                    @else
                        <div class="p-item p-item-color">
                            <div class="p-item-title">Item Size:</div>

                            <div class="p-item-main"><strong>
                                    {{ $product->product_size_en }}
                                </strong></div>
                        </div>
                    @endif


                    <div class="p-item p-item-total-price">
                        <div class="p-item-title">
                            @if (session()->get('language') == 'slovenian')
                                Končna cena:
                            @else
                                Total Price:
                            @endif

                        </div>
                        <div class="p-item-main"><strong>{{ $product->discount_price }} €</strong></div>
                    </div>
                    <input type="hidden" id="product_id" value="{{ $product->id }}" min="1">
                    <div class="p-item p-item-buttonGroup">
                        <button type="submit" onclick="addToCart()" title="" class="bee-button">
                            @if (session()->get('language') == 'slovenian')
                                V košarico
                            @else
                                Add to
                                Cart
                            @endif
                        </button>

                    </div>

                    <div class="p-item p-item-wishlist">
                        <button type="button" class="bee-button" id="{{ $product->id }}" title="Wishlist"
                            onclick="addToWishList(this.id)">
                            @if (session()->get('language') == 'slovenian')
                                Na seznam želja
                            @else
                                Add to
                                Wishlist
                            @endif
                        </button>
                    </div>
                    @if (session()->get('language') == 'slovenian')
                        <div class="p-item p-item-returnPolicy">
                            <div class="p-item-title">Vračila blaga:</div>
                            <div class="p-item-main">Vračila so sprejeta, če izdelek ni v skladu z opisom, vrnitev plača
                                kupec poštnina; ali obdržite izdelek in se dogovorite za vračilo kupnine s prodajalcem.
                                <a href="">Več o tem</a>
                            </div>
                        </div>
                    @else
                        <div class="p-item p-item-returnPolicy">
                            <div class="p-item-title">Return Policy:</div>
                            <div class="p-item-main">Returns accepted if product not as described, buyer pays return
                                shipping fee; or keep the product & agree refund with seller. <a href="">Read
                                    more</a></div>
                        </div>
                    @endif


                    <div class="p-item p-item-payment">
                        <div class="p-item-title">
                            @if (session()->get('language') == 'slovenian')
                                Plačilo možno s karticami:
                            @else
                                Payment:
                            @endif
                        </div>
                        <div class="p-item-main"><i class="fa fa-cc-paypal"></i><i class="fa fa-cc-visa"></i><i
                                class="fa fa-cc-mastercard"></i><i class="fa fa-cc-amex"></i><i
                                class="fa fa-cc-discover"></i></div>
                    </div>
                </div>
                <!-- Product Overview End -->
            </div>
        </div>
        <!-- Product Details start -->
        <div class="p-tab-section">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a class="nav-link active" href="#product_details" role="tab"
                        data-toggle="tab">
                        @if (session()->get('language') == 'slovenian')
                            Informacije o izdelku
                        @else
                            Product Details
                        @endif

                    </a> </li>
                <li class="nav-item"> <a class="nav-link" href="#feedback" role="tab" data-toggle="tab">
                        @if (session()->get('language') == 'slovenian')
                            Oddaj oceno
                        @else
                            Feedback(20)
                        @endif
                    </a> </li>
            </ul>
            <!-- Tab panes -->
            @if (session()->get('language') == 'slovenian')
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="product_details">
                        <p>{{ $product->long_desc_slo }}</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="feedback">
                        <h5>Ocenite izdelek</h5>
                        <p>Lorem Ipsum je slepo besedilo, ki se uporablja pri razvoju tipografij in
                            pripravi različnih materialov v tisku in digitalnem okolju.</p>
                        <div class="review-star">
                            <h6>Vaša ocena:</h6>
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                class="fa fa-star"></i><i class="fa fa-star-half-empty"></i>
                        </div>
                        <div class="comment-form pt0">
                            <form action="#">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <input type="text" class="form-control" placeholder="Ime">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Sporočilo"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-submit">Pošlji</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="product_details">
                        <p>{{ $product->long_desc_en }}</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="feedback">
                        <h5>Feedback</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the industry's standard dummy text ever since the 1500s,</p>
                        <div class="review-star">
                            <h6>Your Rating</h6>
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                class="fa fa-star"></i><i class="fa fa-star-half-empty"></i>
                        </div>
                        <div class="comment-form pt0">
                            <form action="#">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- Product Details End -->
    </div>
</div>
<!-- Product End -->

<!-- Related Products start -->
<div class="bee-content-block feature-product-block pt0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title-bg title-bg-left">
                    @if (session()->get('language') == 'slovenian')
                        Podobni izdelki
                    @else
                        Related Products
                    @endif

                </h3>
            </div>
            <div class="feature-product-4">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="feature-product-item">
                        <div class="single-product"> <img
                                src="/frontend/images/products/thumbs/{{ $relatedProduct->product_thumbnail }}"
                                style="height:285px;" alt="Beekeeping
                                Hive" />
                            <div class="p-top-price">$ {{ $relatedProduct->discount_price }}</div>
                            <div class="product-hover">
                                <h4>
                                    @if (session()->get('language') == 'slovenian')
                                        {{ $relatedProduct->product_name_slo }}
                                    @else
                                        {{ $relatedProduct->product_name_en }}
                                    @endif
                                </h4>
                                <div class="prod-hover-price"><b>Price:</b>${{ $relatedProduct->price }}</div>
                                <p>
                                    @if (session()->get('language') == 'slovenian')
                                        {{ $relatedProduct->short_desc_slo }}
                                    @else
                                        {{ $relatedProduct->short_desc_en }}
                                    @endif

                                </p>
                                <div class="product-action">
                                    <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}"
                                        title="" class="icon-view"><i class="fa fa-eye"></i></a><a
                                        href="" title="" class="icon-view"><i
                                            class="fa fa-heart-o"></i></a><a href="" title=""
                                        class="icon-view"><i class="fa fa-cart-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- Related Products end -->







<!-- Go to www.addthis.com/dashboard to customize your tools -->
{{-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script> --}}
@endsection
