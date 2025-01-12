<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Review;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\ShipDivision;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $product = Product::findOrFail($id);
        $language = session()->get('language');

        $colors_en = explode(', ', $product->product_color_en);
        $colors_slo = explode(', ', $product->product_color_slo);

        $sizes_en = explode(', ', $product->product_size_en);
        $sizes_slo = explode(', ', $product->product_size_slo);


        if ($request->quantity <= $product->product_qty) {
            if ($product->discount_price == NULL) {
                if (Auth::check()) {

                    $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $id)->first();
                    if ($exists) {
                        $exists->delete();
                    }
                }

                Cart::add([
                    'id' => $id,
                    'name' => $request->product_name,
                    'qty' => $request->quantity,
                    'price' => $product->selling_price,
                    'weight' => 1,
                    'options' => [
                        'name_slo' => $product->product_name_slo,
                        'name_en' => $product->product_name_en,
                        'image' => $product->product_thumbnail,
                        'color_en' => $colors_en[intval($request->color)],
                        'color_slo' => $colors_slo[intval($request->color)],
                        'size' => $request->size,
                        'description_slo' => $product->short_desc_slo,
                        'description_en' => $product->short_desc_en,
                        'created_at' => Carbon::now()->format('d.M Y'),
                    ],
                ]);


                if ($language === 'slovenian') {
                    return response()->json(['success' => 'Uspešno dodano v košarico.']);
                } else {
                    return response()->json(['success' => 'Successfully Added on Your Cart.']);
                }
            } else {
                if (Auth::check()) {

                    $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $id)->first();
                    if ($exists) {
                        $exists->delete();
                    }
                }

                Cart::add([
                    'id' => $id,
                    'name' => $product->product_name_slo,
                    'qty' => $request->quantity,
                    'price' => $product->discount_price,
                    'weight' => 1,
                    'options' => [
                        'name_slo' => $product->product_name_slo,
                        'name_en' => $product->product_name_en,
                        'image' => $product->product_thumbnail,
                        'color_en' => $colors_en[intval($request->color)],
                        'color_slo' => $colors_slo[intval($request->color)],
                        'size_en' => $sizes_en[intval($request->size)],
                        'size_slo' => $sizes_slo[intval($request->size)],
                        'description_slo' => $product->short_desc_slo,
                        'description_en' => $product->short_desc_en,
                        'created_at' => Carbon::now()->format('d.M Y'),
                    ],
                ]);
                if ($language === 'slovenian') {
                    return response()->json(['success' => 'Uspešno dodano v košarico.']);
                } else {
                    return response()->json(['success' => 'Successfully Added on Your Cart.']);
                }
            }
        } else {
            return response()->json(['error' => 'Not enough on stock.']);
        }
    } // end mehtod 


    // Mini Cart Section
    public function AddMiniCart()
    {
        $language = session()->get('language');

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
            'language' => $language

        ));
    } // end method 


    /// remove mini cart 
    public function RemoveMiniCart($rowId)
    {
        $language = session()->get('language');

        Cart::remove($rowId);

        if ($language === 'slovenian') {
            return response()->json(['success' => 'Uspešno odstranjeno iz košarice.']);
        } else {
            return response()->json(['success' => 'Product Remove from Cart.']);
        }
    } // end mehtod 



    // add to wishlist mehtod 

    public function AddToWishlist(Request $request, $product_id)
    {
        $language = session()->get('language');


        if (Auth::check()) {

            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();


            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),

                ]);

                if ($language === 'slovenian') {
                    return response()->json(['success' => 'Uspešno dodano na seznam želja.']);
                } else {
                    return response()->json(['success' => 'Successfully Added On Your Wishlist.']);
                }
            } else {


                if ($language === 'slovenian') {
                    return response()->json(['error' => 'Ta artikel je že na vašem seznamu.']);
                } else {
                    return response()->json(['error' => 'This Product has Already on Your Wishlist.']);
                }
            }
        } else {

            if ($language === 'slovenian') {
                return response()->json(['error' => 'Najprej se vpišite v vaš račun.']);
                return response()->json(['error' => 'test.']);
            } else {
                return response()->json(['error' => 'At First Login Your Account.']);
                return response()->json(['error' => 'test.']);
            }
        }
    } // end method 




    public function CouponApply(Request $request)
    {
        $language = session()->get('language');
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100, 2),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100, 2)
            ]);

            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Applied Successfully'
            ));
            if ($language === 'slovenian') {
                return response()->json(array(
                    'validity' => true,
                    'success' => 'Kupon je potrjen!'
                ));
            } else {
                return response()->json(array(
                    'validity' => true,
                    'success' => 'Coupon Applied Successfully!'
                ));
            }
        } else {

            if ($language === 'slovenian') {
                return response()->json(['error' => 'Kupon je neveljaven!']);
            } else {
                return response()->json(['error' => 'Invalid Coupon!']);
            }
        }
    } // end method 


    public function CouponCalculation()
    {

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    } // end method 


    // Remove Coupon 
    public function CouponRemove()
    {
        $language = session()->get('language');
        Session::forget('coupon');

        if ($language === 'slovenian') {
            return response()->json(['success' => 'Kupon je uspešno odstranjen.']);
        } else {
            return response()->json(['success' => 'Coupon Remove Successfully.']);
        }
    }



    // Checkout Method 
    public function CheckoutCreate()
    {

        if (Auth::check()) {
            if (Cart::total() > 0) {

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
                return view('frontend.checkout.checkout_view', compact('carts', 'cartQty', 'cartTotal', 'divisions'));
            } else {

                $notification = array(
                    'message' => 'Shopping At list One Product',
                    'alert-type' => 'error'
                );

                return redirect()->to('/')->with($notification);
            }
        } else {

            $notification = array(
                'message' => 'You Need to Login First',
                'alert-type' => 'error'
            );

            return redirect()->route('login')->with($notification);
        }
    } // end method 






}
