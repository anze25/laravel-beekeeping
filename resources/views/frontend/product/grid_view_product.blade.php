@foreach ($products as $product)
    <!-- Product Item start -->
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-product single-product-style2"> <img
                style="height: 253px; align-items: center; justify-content: center;"
                src="/frontend/images/products/thumbs/{{ $product->product_thumbnail }}" alt="Beekeeping Hive" />

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
                <div class="prod-hover-price"><b>Price: </b>${{ $product->selling_price }}</div>
                <div class="product-action"> <a
                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}"
                        title="" class="icon-view"><i class="fa fa-eye"></i></a><a href="" title=""
                        class="icon-view"><i class="fa fa-heart-o"></i></a><a href="" title=""
                        class="icon-view"><i class="fa fa-cart-plus"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- /.item -->
@endforeach
