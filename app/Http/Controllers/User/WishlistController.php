<?php

namespace App\Http\Controllers\User;

use Auth;
use Carbon\Carbon;
use App\Models\Review;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{

	public function ViewWishlist()
	{

		return view('frontend.wishlist.view_wishlist');
	}

	public function GetWishlistProduct()
	{

		$wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
		$language = session()->get('language');

		return response()->json(array(
			'wishlist' => $wishlist,
			'language' => $language,
		));
	} // end mehtod 


	public function RemoveWishlistProduct($id)
	{

		Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
		return response()->json(['success' => 'Product was successfully removed from wishlist']);
	}
}
