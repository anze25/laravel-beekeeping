<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords"
        content="Bootstrap4, Multipurpose, Bee, Beekeeping, Honey, Honey Bee, responsive, template, Beekeeper, Hive, html, html5, css" />
    <meta name="author" content="web24service">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>w-Beekeeping - The Multipurpose Ecommerce Honey Bee Keeping HTML5 Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/assets/images/fevicon.png') }}">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}">



    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">

    <!-- OwlCarousel CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">

    <!-- Magnific popup CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">

    <!-- chat CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/chat.css') }}">

    <!-- Slicknav CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slicknav.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}"> <!-- Main CSS -->

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">

    <!-- jQuery -->
    <script src="{{ asset('frontend/assets/js/jquery-2.1.3.min.js') }}"></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>

    <!-- Main Wrapper Start -->
    <div class="main-wrapper">

        <!-- skiptocontent start ( This section for blind and Google SEO, Also for page speed )-->
        <a id="skiptocontent" href="#maincontent">skip navigation</a>
        <!-- skiptocontent End -->

        @include('frontend.body.header')

        <!-- Breadcroumbs start -->
        @include('frontend.body.breadcrumbs')
        <!-- Breadcroumbs end -->

        @yield('content')

        <!--Newsletter start -->
        <div class="bee-content-block newsletter-signup">
            <div class="container">
                <form action="#">
                    @if (session()->get('language') == 'slovenian')
                        <div class="row">

                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="form-control" type="text" placeholder="Ime">
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="form-control" type="text" placeholder="Priimek">
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="btn btn-bee-news" type="submit" value="Prijava na obveščanje">
                            </div>
                        </div>
                    @else
                        <div class="row">

                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="form-control" type="text" placeholder="First Name">
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="form-control" type="text" placeholder="Last Name">
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <input class="btn btn-bee-news" type="submit" value="Signup For Newsletter">
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
        <!-- Newsletter end -->

        <!-- Footer start -->
        @include('frontend.body.footer')
        <!-- Footer end -->
    </div>
    <!-- Main Wrapper end -->

    <!-- Start scroll top -->
    <div class="scrollup"><i class="fa fa-angle-up"></i></div>
    <!-- End scroll top -->

    <!-- Tether JS -->
    <script src="{{ asset('frontend/assets/js/tether.min.js') }}"></script>

    <!-- Popper JS -->
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>

    <!-- OwlCarousel JS -->
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>

    <!-- Magnific Popup JS -->
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>

    <!-- Gallery Filter -->
    <script src="{{ asset('frontend/assets/js/jquery.mixitup.min.js') }}"></script>

    <!-- Easy Zoom JS -->
    <script src="{{ asset('frontend/assets/js/easyzoom.js') }}"></script>

    <!-- WOW JS -->
    <script src="{{ asset('frontend/assets/js/wow-1.3.0.min.js') }}"></script>

    <!-- Chat JS -->
    <script src="{{ asset('frontend/assets/js/chat.js') }}"></script>

    <!-- Coming Soon JS -->
    <script src="{{ asset('frontend/assets/js/coming-soon.js') }}"></script>

    <!-- SlickNav JS -->
    <script src="{{ asset('frontend/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Active JS -->
    <script src="{{ asset('frontend/assets/js/active.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>

    <!-- Add to Cart Product Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span> </strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">

                            <div class="card" style="width: 18rem;">

                                <img src=" " class="card-img-top" alt="..."
                                    style="height: 200px; width: 200px;" id="pimage">

                            </div>

                        </div><!-- // end col md -->


                        <div class="col-md-4">

                            <ul class="list-group">
                                <li class="list-group-item">Product Price: <strong class="text-danger">$<span
                                            id="pprice"> </span></strong>
                                    <del id="oldprice">$</del>
                                </li>
                                <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                                <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                                <li class="list-group-item">Stock: <span class="badge badge-pill badge-success"
                                        id="aviable" style="background: green; color: white;"></span>
                                    <span class="badge badge-pill badge-danger" id="stockout"
                                        style="background: red; color: white;"></span>

                                </li>
                            </ul>

                        </div><!-- // end col md -->


                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="color">Choose Color</label>
                                <select class="form-control" id="color" name="color">


                                </select>
                            </div> <!-- // end form group -->


                            <div class="form-group" id="sizeArea">
                                <label for="size">Choose Size</label>
                                <select class="form-control" id="size" name="size">
                                    <option>1</option>

                                </select>
                            </div> <!-- // end form group -->

                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="number" class="form-control" id="qty" value="1"
                                    min="1">
                            </div> <!-- // end form group -->

                            <input type="hidden" id="product_id">
                            <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to
                                Cart</button>


                        </div><!-- // end col md -->


                    </div> <!-- // end row -->



                </div> <!-- // end modal Body -->

            </div>
        </div>
    </div>
    <!-- End Add to Cart Product Modal -->

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })


        function productView(id) {
            // alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $('#pname').text(data.product.product_name_en);
                    $('#price').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name_en);

                    $('#pimage').attr('src', '/frontend/images/products/thumbs/' + data.product
                        .product_thumbnail);

                    $('#product_id').val(id);
                    $('#qty').val(1);

                    // Product Price 
                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.selling_price);


                    } else {
                        $('#pprice').text(data.product.discount_price);
                        $('#oldprice').text(data.product.selling_price);

                    } // end prodcut price 

                    // Start Stock opiton

                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('aviable');

                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');
                    } // end Stock Option 

                    // Color
                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value=" ' + value + ' ">' + value +
                            ' </option>')
                    }) // end color

                    // Size
                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                            ' </option>')
                        if (data.size == "") {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }

                    }) // end size


                }

            })

        }


        function addToCart() {
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name
                },
                url: "/cart/data/store/" + id,
                success: function(data) {

                    miniCart()
                    $('#closeModel').click();
                    // console.log(data)

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })

                    }

                    // End Message 
                }
            })

        }
    </script>
    <!-- /// Load My Cart /// -->

    {{-- MY CART PAGE --}}
    <script type="text/javascript">
        function cart() {

            $.ajax({
                type: 'GET',
                url: '/user/get-cart-product',
                dataType: 'json',
                success: function(response) {

                    var rows = ""
                    var totals = ""

                    if (response.cartQty === 0) {

                        // rows = `<div>${language}</div>`
                        // rows = `There are no items in your cart.`
                        if (response.language === 'slovenian') {
                            rows = 'V vaši košarici ni nobenega artikla.'
                        } else {
                            rows = 'There are no items in your cart.'
                        }

                        totals = ''
                    } else {
                        $('span[id="cartSubTotal"]').text(response.cartTotal);
                        $('span[id="cartQty"').text(response.cartQty);
                        $('#cartTotals').html(
                            `<div class="cart-total-section"><h3> </h3>
                    
                    <a href="{{ route('checkout') }}" type="submit" class="btn btn-submit">Proceed to checkout</a></div>`
                        );
                        $.each(response.carts, function(key, value) {
                            rows += `
                        <div class="order-section">
                            <div class="order-top justify-content-end">
                                <div class="order-id mr-auto"> Added to cart: <b>${new Date(value.options.created_at).toLocaleDateString("sl-SI", {year: 'numeric', month: 'long', day: 'numeric'})} </b> </div>
                                <div class="delete-order"> 
                                    <a href="" type="submit" id="${value.rowId}" onclick="cartRemove(this.id)">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a> 
                                </div>
                            </div>
                            <div class="order-details">
                                <div class="order-product">
                                    <div class="order-product-img"><img src="/frontend/images/products/thumbs/${value.options.image}" alt=""/></div>
                                    <div class="order-product-title"> 
                                        <a href="">
                                            <h5>${value.name}</h5>
                                            <p>${value.options.description}</p>
                                        </a> 
                                    </div>
                                </div>
                            <div class="order-status"> Price: <b>${value.price} €</b>
                                <div class="quantity">
                                    <span>Quantity:</span>
                                    ${value.qty > 1

                                        ? `<span type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)"><i class="fa fa-minus"></i></span>`
                                        : `<span type="submit" disabled ><i class="fa fa-minus"></i></span>`
                                }
                                    <span>
                                        <input type="text" class="form-control" value="${value.qty}" style="width:50px;" />
                                    </span>
                                    <span type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>
                            <div class="order-action"><br><br> Subtotal: <b>${value.subtotal} €</b>  </div>
                            </div>
                        </div>`

                        });
                    }


                    $('#cartPage').html(rows);

                }
            })

        }
        cart();

        ///  Cart remove Start 
        function cartRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/cart-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();
                    $('#couponField').show();
                    $('#coupon_name').val('');

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }

                    // End Message 

                }
            });

        }

        // End Cart remove   


        // -------- CART INCREMENT --------//

        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-increment/" + rowId,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();
                }
            });
        }


        // ---------- END CART INCREMENT -----///



        // -------- CART Decrement  --------//

        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();
                }
            });
        }


        // ---------- END CART Decrement -----///
    </script>



    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {

                    $('span[id="cartSubTotal"]').text(response.cartTotal);
                    $('span[id="cartQty"').text(response.cartQty);
                    var miniCart = ""

                    $.each(response.carts, function(key, value) {
                        miniCart +=
                            `<li class="clearfix"> 
                                <img src="/frontend/images/products/thumbs/${value.options.image}" alt="item1" /> 
                                <div class="row justify-content-between"><span class="item-name">${value.name}</span> 
                                <span class="item-delete"> <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button></span>
                                </div>
                                
                                <span class="item-price">${value.price} €
                                                                   
                               
                                <span class="item-quantity">Quantity: ${value.qty} </span> 
                                
                            </li>`
                    });

                    $('#miniCart').html(miniCart);
                    cart();
                }
            })

        }
        miniCart();

        /// mini cart remove Start 
        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product-remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })

                    }

                    // End Message 

                }
            });

        }
        //  end mini cart remove 
    </script>

    <!-- /// Wish List /// -->
    <script type="text/javascript">
        function addToWishList(product_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishlist/" + product_id,

                success: function(data) {

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }
                    // End Message 
                }
            })
        }

        function wishlist() {
            $.ajax({
                type: 'GET',
                url: '/user/get-wishlist-product',
                dataType: 'json',
                success: function(response) {
                    rows = '';
                    if (response == '') {
                        rows = 'Your wishlist doesnt have any products.'
                    } else {
                        $.each(response, function(key, value) {
                            rows += `<div class="order-section">
                    <div class="order-details">
                        <div class="order-product">
                            <div class="order-product-img"><img src="/frontend/images/products/thumbs/${value.product.product_thumbnail}" alt="" /></div>
                            <div class="order-product-title"> <a href="">
                                    <h5>${value.product.product_name_en}</h5>
                                    <p>${value.product.short_desc_en}</p>
                                </a> </div>
                        </div>
                        <div class="order-status">
                            
                            <p>Added ${new Date(value.created_at).toLocaleDateString("sl-SI", {year: 'numeric', month: 'long', day: 'numeric'})} </p>
                        </div>
                        <div class="order-action">
                            <a data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)" class="btn-action btn-track" >Add to cart</a>
                            <a type="submit" id="${value.id}" onclick="wishlistRemove(this.id)" class="btn-action btn-cancel">Remove</a> </div>
                    </div>
                </div>`
                        });
                    }



                    $('#wishlist').html(rows);
                }
            })

        }



        wishlist();


        function wishlistRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/wishlist-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    wishlist();

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }

                    // End Message 

                }
            });

        }
    </script>

    <!--  //////////////// =========== Coupon Apply Start ================= ////  -->
    <script type="text/javascript">
        function applyCoupon() {
            var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },
                url: "{{ url('/coupon-apply') }}",
                success: function(data) {
                    couponCalculation();
                    if (data.validity == true) {
                        $('#couponField').hide();
                    }

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }

                    // End Message 

                }

            })
        }


        function couponCalculation() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-calculation') }}",
                dataType: 'json',
                success: function(data) {
                    if (data.total) {
                        $('#couponCalField').html(
                            `<tr>
                  <th>
                      <div class="cart-sub-total">
                          Subtotal<span class="inner-left-md">$ ${data.total}</span>
                      </div>
                      <div class="cart-grand-total">
                          Grand Total<span class="inner-left-md">$ ${data.total}</span>
                      </div>
                  </th>
              </tr>`
                        )

                    } else {

                        $('#couponCalField').html(
                            `<tr>
          <th>
              <div class="cart-sub-total">
                  Subtotal<span class="inner-left-md">$ ${data.subtotal}</span>
              </div>
              <div class="cart-sub-total">
                  Coupon<span class="inner-left-md">$ ${data.coupon_name}</span>
                  <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i>  </button>
              </div>
  
               <div class="cart-sub-total">
                  Discount Amount<span class="inner-left-md">$ ${data.discount_amount}</span>
              </div>
  
  
              <div class="cart-grand-total">
                  Grand Total<span class="inner-left-md">$ ${data.total_amount}</span>
              </div>
          </th>
              </tr>`
                        )

                    }
                }

            });
        }
        couponCalculation();
    </script>

    <!--  //////////////// =========== End Coupon Apply Start ================= ////  -->


    <!--  //////////////// =========== Start Coupon Remove================= ////  -->

    <script type="text/javascript">
        function couponRemove() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-remove') }}",
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    $('#couponField').show();
                    $('#coupon_name').val('');

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }

                }
            });

        }
    </script>

    {{-- <script>
        document.getElementById('pageSize').onchange = function() {
            window.location = "{!! $products->url(0) !!}&pageSize=" + this.value;
        };
        document.getElementById('sortBy').onchange = function() {
            window.location = "{!! $products->url(0) !!}&sortBy=" + this.value;
        };
        document.getElementById('query').onchange = function() {
            window.location = "{!! $products->url(0) !!}&query=" + this.value;
        };
    </script> --}}
    <style>
        .category-top .sort-by select {
            width: 100%;
        }
    </style>

</body>

</html>
