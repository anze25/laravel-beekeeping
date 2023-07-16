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

		

		return response()->json($wishlist);
	} // end mehtod 


	public function RemoveWishlistProduct($id)
	{

		Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
		return response()->json(['success' => 'Product was successfully removed from wishlist']);
	}
}
