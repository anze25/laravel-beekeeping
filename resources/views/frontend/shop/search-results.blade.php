@extends('frontend.main_master')
@section('content')
@section('title')
    @if (session()->get('language') == 'slovenian')
        Iskani zadetki
    @else
        Search results
    @endif
@endsection

<div class="bee-content-block">
    <div class="container">
        <div class="row breadcrumb-style2">
            <div class="col-12 col-lg-5">
                <h1>
                    @if (session()->get('language') == 'slovenian')
                        Rezultati iskanja za: {{ $query }}
                    @else
                        Search results for: {{ $query }}
                    @endif
                </h1>
            </div>
            <div class="col-12 col-lg-7 text-right">
                @if (session()->get('language') == 'slovenian')
                    <a href="/" title="Domov">Domov</a> / <a href="/shop" title="Naši izdelki">Naši izdelki</a>
                @else
                    <a href="/" title="Home">Home</a> / <a href="/shop" title="Our products">our
                        products</a>
                @endif
            </div>
        </div>
        <div class="row flex-lg-row-reverse">
            <div class="col-12 col-lg-9">
                @if (session()->get('language') == 'slovenian')
                    @if ($productsCount > 0)
                        <div class="category-top justify-content-end">
                            <div class="mr-auto">
                                Skupaj artiklov: {{ $productsCount }}
                            </div>
                            <form action="{{ route('search') }}" method="GET">
                                <div class="product-search mr-auto">
                                    <input type="text" id="query" name="query" class="form-control"
                                        placeholder="" />
                                </div>
                            </form>
                            <div class="sort-by"> <span>Sortiraj po:</span> <span>
                                    <select name="sortBy" id="sortBy" class="form-control" model='sortBy'>

                                        <option value="product_name_slo"
                                            @if ($sortBy == '	product_name_slo') selected @endif>
                                            Ime: A->Ž
                                        </option>
                                        <option value="product_name_slo_desc"
                                            @if ($sortBy == 'product_name_slo_desc') selected @endif>Ime: Ž->A
                                        </option>
                                        <option value="date" @if ($sortBy == 'date') selected @endif>Datum:
                                            Novejši
                                            naprej
                                        <option value="date-desc" @if ($sortBy == 'date-desc') selected @endif>
                                            Datum:
                                            Starejši
                                            naprej
                                        </option>
                                        <option value="price" @if ($sortBy == 'price') selected @endif>
                                            Cena: Cenejši naprej</option>
                                        <option value="price-desc" @if ($sortBy == 'price-desc') selected @endif>
                                            Cena: Dražji naprej</option>
                                    </select>
                                </span> </div>

                            <div class="show-item"> <span>Prikaži:</span> <span>
                                    <select name="pageSize" id="pageSize" class="form-control">
                                        <option value="6" @if ($pageSize == 6) selected @endif>
                                            6 izdelkov
                                        </option>
                                        <option value="9" @if ($pageSize == 9) selected @endif>9
                                            izdelkov
                                        </option>
                                        <option value="12" @if ($pageSize == 12) selected @endif>12
                                            izdelkov
                                        </option>
                                        <option value="15" @if ($pageSize == 15) selected @endif>15
                                            izdelkov
                                        </option>
                                    </select>
                                </span> </div>
                        </div>
                    @else
                        <div class="error-section"> <img src="{{ asset('frontend/assets/images/404.png') }}"
                                alt="" />

                            <p>Artikel , ki vsebuje besedo <b>{{ $query }}</b> ne obstaja. Prosimo, spremenite
                                iskano
                                besedo.</p>

                            <a href="{{ url('/shop') }}" class="bee-button cta-btn">Nazaj v trgovino</a>



                        </div>
                    @endif
                @else
                    @if ($productsCount > 0)
                        <div class="category-top justify-content-end">
                            <div class="mr-auto">
                                Total items: {{ $productsCount }}
                            </div>
                            <form action="{{ route('search') }}" method="GET">
                                <div class="product-search mr-auto">
                                    <input type="text" id="query" name="query" class="form-control"
                                        placeholder="" />
                                </div>
                            </form>
                            <div class="sort-by"> <span>Sort by:</span> <span>
                                    <select name="sortBy" id="sortBy" class="form-control" model='sortBy'>
                                        <option value="product_name_en"
                                            @if ($sortBy == '	product_name_en') selected @endif>
                                            Name: A->Z
                                        </option>
                                        <option value="product_name_en_desc"
                                            @if ($sortBy == 'product_name_en_desc') selected @endif>Name: Z->A
                                        </option>
                                        <option value="date" @if ($sortBy == 'date') selected @endif>Date:
                                            Newest
                                            first
                                        </option>
                                        <option value="date-desc" @if ($sortBy == 'date-desc') selected @endif>
                                            Date: Oldest first
                                        </option>
                                        <option value="price" @if ($sortBy == 'price') selected @endif>
                                            Price: Lower Price</option>
                                        <option value="price-desc" @if ($sortBy == 'price-desc') selected @endif>
                                            Price: Higher price</option>
                                    </select>
                                </span> </div>

                            <div class="show-item"> <span>Show:</span> <span>
                                    <select name="pageSize" id="pageSize" class="form-control">
                                        <option value="6" @if ($pageSize == 6) selected @endif>
                                            6 items
                                        </option>
                                        <option value="9" @if ($pageSize == 9) selected @endif>9
                                            items
                                        </option>
                                        <option value="12" @if ($pageSize == 12) selected @endif>12
                                            items
                                        </option>
                                        <option value="15" @if ($pageSize == 15) selected @endif>15
                                            items
                                        </option>
                                    </select>
                                </span> </div>
                        </div>
                    @else
                        <div class="error-section"> <img src="{{ asset('frontend/assets/images/404.png') }}"
                                alt="" />

                            <p>The item containing the word <b>{{ $query }}</b> does not exist. Please change
                                the searched word.</p>

                            <a href="{{ url('/shop') }}" class="bee-button cta-btn">Back to shop</a>



                        </div>
                    @endif
                @endif
                <div class="product-content">
                    <div class="row">
                        @foreach ($products as $product)
                            <!-- Product Item start -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product single-product-style2"> <img
                                        style="height: 253px; align-items: center; justify-content: center;"
                                        src="/frontend/images/products/thumbs/{{ $product->product_thumbnail }}"
                                        alt="Beekeeping Hive" />

                                    @php
                                        $amount = $product->selling_price - $product->discount_price;
                                        $discount = ($amount / $product->selling_price) * 100;
                                    @endphp

                                    <div class="product-status" style="max-height: 114px;">
                                        <h4>
                                            @if (session()->get('language') == 'slovenian')
                                                {{ $product->product_name_slo }}
                                            @else
                                                {{ $product->product_name_en }}
                                            @endif
                                        </h4>
                                        <div class="prod-hover-price"><b>Price: </b>${{ $product->selling_price }}
                                        </div>
                                        <div class="product-action">
                                            <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}"
                                                title="" class="icon-view"><i class="fa fa-eye"></i></a>
                                            <a href="" title="" class="icon-view"><i
                                                    class="fa fa-heart-o" id="{{ $product->id }}" title="Wishlist"
                                                    onclick="addToWishList(this.id)"></i></a>
                                            <a href="" title="" class="icon-view" data-toggle="modal"
                                                data-target="#exampleModal" id="{{ $product->id }}"
                                                onclick="productView(this.id)"><i class="fa fa-cart-plus"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Item end -->
                        @endforeach

                    </div>
                    {{ $products->onEachSide(0)->appends(compact('pageSize', 'sortBy', 'query'))->links('frontend.body.pagination') }}
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="left-block left-menu">
                    <h3>
                        @if (session()->get('language') == 'slovenian')
                            Kategorije
                        @else
                            Category
                        @endif
                    </h3>
                    <ul>
                        @foreach ($categories as $productCategory)
                            <li
                                class="{{ request()->is('subcategory/product/' . $productCategory->id) ? 'active' : '' }}">
                                <a href="{{ route('CatWiseProduct', $productCategory->id) }}" title="Beehive wood">
                                    @if (session()->get('language') == 'slovenian')
                                        {{ $productCategory->category_name_slo }}
                                    @else
                                        {{ $productCategory->category_name_en }}
                                    @endif
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="left-block Special-offer"> <img
                        src="{{ asset('frontend/assets/images/special-offer.jpg') }}" alt="" />
                    <div class="sell-off">10%<br>
                        Off Now</div>
                </div>
                <div class="left-block wow fadeInUp"> <a href="#" class="bee-button">
                        @if (session()->get('language') == 'slovenian')
                            Naroči svoj izdelek
                        @else
                            Order Your Product
                        @endif
                    </a> </div>
            </div>
        </div>
    </div>
</div>

@endsection
