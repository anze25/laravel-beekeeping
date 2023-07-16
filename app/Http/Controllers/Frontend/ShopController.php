<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;


class ShopController extends Controller
{

   public function ShopPage(Request $request)
   {
      $query = $request->input('query') ?? '';
      $products = Product::query();
      $pageSize = $request->get('pageSize') ?? 6;
      $sortBy = $request->get('sortBy') ?? 'price';
      $productsCount = $products->count();

      // $catIds = Category::select('id')->whereIn('category_slug_en', $slugs)->pluck('id')->toArray();
      if ($sortBy == 'date') {
         $products = Product::where('status', 1)->orderBy('created_at', 'asc')->paginate($pageSize);
      } elseif ($sortBy == 'date-desc') {
         $products = Product::where('status', 1)->orderBy('created_at', 'desc')->paginate($pageSize);
      } elseif ($sortBy == 'product_name_slo') {
         $products = Product::where('status', 1)->orderBy('product_name_slo', 'asc')->paginate($pageSize);
      } elseif ($sortBy == 'product_name_slo_desc') {
         $products = Product::where('status', 1)->orderBy('product_name_en', 'desc')->paginate($pageSize);
      } elseif ($sortBy == 'product_name_en') {
         $products = Product::where('status', 1)->orderBy('product_name_en', 'asc')->paginate($pageSize);
      } elseif ($sortBy == 'product_name_en_desc') {
         $products = Product::where('status', 1)->orderBy('product_name_slo', 'desc')->paginate($pageSize);
      } elseif ($sortBy == 'price') {
         $products = Product::where('status', 1)->orderBy('selling_price', 'ASC')->paginate($pageSize);
      } elseif ($sortBy == 'price-desc') {
         $products = Product::where('status', 1)->orderBy('selling_price', 'desc')->paginate($pageSize);
      } else {
         $products = $products->paginate($pageSize);
      }

      $categories = Category::with('products')->has('products')->orderBy('category_name_en', 'ASC')->get();
      return view('frontend.shop.shop_page', compact('products', 'categories', 'pageSize', 'sortBy', 'query', 'productsCount'));
   } // end Method 



   public function ShopFilter(Request $request)
   {
      // dd($request->all());

      $data = $request->all();

      // Filter Category

      $catUrl = "";
      if (!empty($data['category'])) {
         foreach ($data['category'] as $category) {
            if (empty($catUrl)) {
               $catUrl .= '&category=' . $category;
            } else {
               $catUrl .= ',' . $category;
            }
         } // end foreach condition
      } // end if condition 


      // Filter Brand 

      $brandUrl = "";
      if (!empty($data['brand'])) {
         foreach ($data['brand'] as $brand) {
            if (empty($brandUrl)) {
               $brandUrl .= '&brand=' . $brand;
            } else {
               $brandUrl .= ',' . $brand;
            }
         } // end foreach condition
      } // end if condition 



      return redirect()->route('shop.page', $catUrl . $brandUrl);
   } // end Method 

   public function search(Request $request)
   {
      $language = session()->get('language');
      $string =  ($language === 'slovenian') ? 'product_name_slo' : 'product_name_en';

      $query = $request->input('query');
      $pageSize = $request->get('pageSize') ?? 6;
      $sortBy = $request->get('sortBy') ?? 'price';
      $products = Product::where($string, 'like', "%$query%")->where('status', 1)->get();
      $categories = Category::with('products')->has('products')->orderBy('category_name_en', 'ASC')->get();
      $productsCount = $products->count();

      if ($sortBy == 'date') {
         $products = Product::where('product_name_slo', 'like', "%$query%")->where('status', 1)->orderBy('created_at', 'asc')->paginate($pageSize);
      } elseif ($sortBy == 'date-desc') {
         $products = Product::where($string, 'like', "%$query%")->where('status', 1)->orderBy('created_at', 'desc')->paginate($pageSize);
      } elseif ($sortBy == $string) {
         $products = Product::where($string, 'like', "%$query%")->where('status', 1)->orderBy($string, 'asc')->paginate($pageSize);
      } elseif ($sortBy == 'product_name_slo_desc') {
         $products = Product::where($string, 'like', "%$query%")->where('status', 1)->orderBy('product_name_en', 'desc')->paginate($pageSize);
      } elseif ($sortBy == 'product_name_en') {
         $products = Product::where($string, 'like', "%$query%")->where('status', 1)->orderBy('product_name_en', 'asc')->paginate($pageSize);
      } elseif ($sortBy == 'product_name_en_desc') {
         $products = Product::where($string, 'like', "%$query%")->where('status', 1)->orderBy($string, 'desc')->paginate($pageSize);
      } elseif ($sortBy == 'price') {
         $products = Product::where($string, 'like', "%$query%")->where('status', 1)->orderBy('selling_price', 'ASC')->paginate($pageSize);
      } elseif ($sortBy == 'price-desc') {
         $products = Product::where($string, 'like', "%$query%")->where('status', 1)->orderBy('selling_price', 'desc')->paginate($pageSize);
      } else {
         $products = $products->paginate($pageSize);
      }


      return view('frontend.shop.search-results', compact('products', 'categories', 'pageSize', 'sortBy', 'query', 'productsCount', 'language'));
   }
}
