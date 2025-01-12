<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Models\News;
use App\Models\User;
use App\Models\Brand;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Product;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
	public function index()
	{
		$blogposts = BlogPost::latest()->limit(3)->get();
		$latest_news = News::latest()->limit(3)->get();
		$products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
		$sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(4)->get();
		$categories = Category::orderBy('category_name_en', 'ASC')->get();

		$featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
		$hot_deals = Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(3)->get();

		$special_offer = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(6)->get();

		$special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();

		$skip_category_0 = Category::skip(0)->first();
		$skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->get();

		return view('frontend.front-page', compact('categories', 'latest_news', 'sliders', 'products', 'featured', 'hot_deals', 'special_offer', 'special_deals', 'skip_category_0', 'skip_product_0', 'blogposts'));
	}

	public function UserLogout()
	{
		Auth::logout();
		return Redirect()->route('login');
	}

	public function UserProfile()
	{
		$id = Auth::user()->id;
		$user = User::find($id);
		return view('frontend.profile.user_profile', compact('user'));
	}

	public function UserProfileStore(Request $request)
	{
		$data = User::find(Auth::user()->id);
		$data->first_name = $request->first_name;
		$data->last_name = $request->last_name;
		$data->address = $request->address;
		$data->email = $request->email;
		$data->postal_code = $request->postal_code;
		$data->city = $request->city;
		$data->country = $request->country;
		$data->shipping_address = $request->shipping_address;
		$data->shipping_postal_code = $request->shipping_postal_code;
		$data->shipping_city = $request->shipping_city;
		$data->shipping_country = $request->shipping_country;
		$data->phone = $request->phone;


		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('frontend/images/users/' . $data->profile_photo_path));
			$filename = date('YmdHi') . $file->getClientOriginalName();
			$file->move(public_path('frontend/images/users/'), $filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => 'User Profile Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('dashboard')->with($notification);
	} // end method 

	public function UserChangePassword()
	{
		$id = Auth::user()->id;
		$user = User::find($id);
		return view('frontend.profile.change_password', compact('user'));
	}


	public function UserPasswordUpdate(Request $request)
	{

		$validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword, $hashedPassword)) {
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('user.logout');
		} else {
			return redirect()->back();
		}
	} // end method


	public function ProductDetails($id, $slug)
	{
		$product = Product::findOrFail($id);

		$stock = $product->product_qty;

		$color_en = $product->product_color_en;
		$product_color_en = explode(',', $color_en);

		$color_slo = $product->product_color_slo;
		$product_color_slo = explode(',', $color_slo);

		$size_en = $product->product_size_en;
		$product_size_en = explode(',', $size_en);

		$size_slo = $product->product_size_slo;
		$product_size_slo = explode(',', $size_slo);

		$multiImag = MultiImg::where('product_id', $id)->get();

		$rating = Review::where('product_id', $id)->avg('rating');
		$count = Review::where('product_id', $id)->count('rating');

		$cat_id = $product->category_id;
		$relatedProducts = Product::where('category_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();
		return view('frontend.product.product_details', compact('product', 'rating', 'stock', 'count', 'multiImag', 'product_color_en', 'product_color_slo', 'product_size_en', 'product_size_slo', 'relatedProducts'));
	}


	public function TagWiseProduct($tag)
	{
		$products = Product::where('status', 1)->where('product_tags_en', $tag)->where('product_tags_slo', $tag)->orderBy('id', 'DESC')->paginate(3);
		$categories = Category::orderBy('category_name_en', 'ASC')->get();
		return view('frontend.tags.tags_view', compact('products', 'categories'));
	}


	// Subcategory wise data
	public function CatWiseProduct(Request $request, $cat_id)
	{
		$query = $request->input('query') ?? '';
		$pageSize = $request->get('pageSize') ?? 6;
		$sortBy = $request->get('sortBy') ?? 'price';
		$category =  Category::findOrFail($cat_id);
		$products = Product::where('status', 1)->where('category_id', $cat_id)->orderBy('id', 'DESC')->get();
		$categories = Category::with('products')->has('products')->orderBy('category_name_en', 'ASC')->get();
		$productsCount = $products->count();
		if ($sortBy == 'date') {
			$products = Product::where('product_name_slo', 'like', "%$query%")->where('category_id', $cat_id)->where('status', 1)->orderBy('created_at', 'asc')->paginate($pageSize);
		} elseif ($sortBy == 'date-desc') {
			$products = Product::where('product_name_slo', 'like', "%$query%")->where('category_id', $cat_id)->where('status', 1)->orderBy('created_at', 'desc')->paginate($pageSize);
		} elseif ($sortBy == 'product_name_slo') {
			$products = Product::where('product_name_slo', 'like', "%$query%")->where('category_id', $cat_id)->where('status', 1)->orderBy('product_name_slo', 'asc')->paginate($pageSize);
		} elseif ($sortBy == 'product_name_slo_desc') {
			$products = Product::where('product_name_slo', 'like', "%$query%")->where('category_id', $cat_id)->where('status', 1)->orderBy('product_name_en', 'desc')->paginate($pageSize);
		} elseif ($sortBy == 'product_name_en') {
			$products = Product::where('product_name_slo', 'like', "%$query%")->where('category_id', $cat_id)->where('status', 1)->orderBy('product_name_en', 'asc')->paginate($pageSize);
		} elseif ($sortBy == 'product_name_en_desc') {
			$products = Product::where('product_name_slo', 'like', "%$query%")->where('category_id', $cat_id)->where('status', 1)->orderBy('product_name_slo', 'desc')->paginate($pageSize);
		} elseif ($sortBy == 'price') {
			$products = Product::where('product_name_slo', 'like', "%$query%")->where('category_id', $cat_id)->where('status', 1)->orderBy('selling_price', 'ASC')->paginate($pageSize);
		} elseif ($sortBy == 'price-desc') {
			$products = Product::where('product_name_slo', 'like', "%$query%")->where('category_id', $cat_id)->where('status', 1)->orderBy('selling_price', 'desc')->paginate($pageSize);
		} else {
			$products = $products->paginate($pageSize);
		}




		///  Load More Product with Ajax 
		if ($request->ajax()) {
			$grid_view = view('frontend.product.grid_view_product', compact('products'))->render();;
			return response()->json(['grid_view' => $grid_view]);
		}
		///  End Load More Product with Ajax 

		return view('frontend.product.subcategory_view', compact('products', 'categories', 'category', 'pageSize', 'sortBy', 'query', 'productsCount'));
	}




	/// Product View With Ajax
	public function ProductViewAjax($id)
	{
		$product = Product::with('category', 'brand')->findOrFail($id);
		$language = session()->get('language');
		$color = $product->product_color_en;
		$product_color = explode(',', $color);
		$color_slo = $product->product_color_slo;
		$product_color_slo = explode(',', $color_slo);;
		$size = $product->product_size_en;
		$product_size = explode(',', $size);
		$size_slo = $product->product_size_slo;
		$product_size_slo = explode(',', $size_slo);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'color_slo' => $product_color_slo,
			'size' => $product_size,
			'size_slo' => $product_size_slo,

			'language' => $language,

		));
	} // end method 

	// Product Seach 
	public function ProductSearch(Request $request)
	{

		$request->validate(["search" => "required"]);

		$item = $request->search;
		// echo "$item";
		$categories = Category::orderBy('category_name_en', 'ASC')->get();
		$products = Product::where('product_name_en', 'LIKE', "%$item%")->get();
		return view('frontend.product.search', compact('products', 'categories'));
	} // end method 


	// ///// Advance Search Options 

	// public function SearchProduct(Request $request)
	// {

	// 	$request->validate(["search" => "required"]);

	// 	$item = $request->search;

	// 	$products = Product::where('product_name_en', 'LIKE', "%$item%")->select('product_name_en', 'product_thumbnail', 'selling_price', 'id', 'product_slug_en')->limit(5)->get();
	// 	return view('frontend.product.search_product', compact('products'));
	// } // end method 



}
