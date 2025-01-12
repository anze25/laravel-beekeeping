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
		$language = session()->get('language');
		Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
		if ($language === 'slovenian') {
			return response()->json(['success' => 'Product je bil uspešno odstranjen iz seznama želja.']);
		} else {
			return response()->json(['success' => 'Product was successfully removed from wishlist.']);
		}
	}
}
