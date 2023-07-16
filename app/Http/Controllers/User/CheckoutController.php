<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;

use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
	public function DistrictGetAjax($division_id)
	{

		$ship = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
		return json_encode($ship);
	} // end method 


	public function StateGetAjax($district_id)
	{

		$state = ShipState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
		return json_encode($state);
	} // end method 


	public function CheckoutStore(Request $request)
	{
		// dd($request->all());
		$data = array();
		$data['shipping_address'] = $request->shipping_address;
		$data['first_name'] = $request->first_name;
		$data['last_name'] = $request->last_name;
		$data['shipping_postal_code'] = $request->shipping_postal_code;
		$data['shipping_city'] = $request->shipping_city;
		$data['shipping_country'] = $request->shipping_country;
		// $data['division_id'] = $request->division_id;
		// $data['district_id'] = $request->district_id;
		// $data['state_id'] = $request->state_id;
		$data['notes'] = $request->notes;
		$cartTotal = Cart::total();


		if ($request->payment_method == 'stripe') {
			return view('frontend.payment.stripe', compact('data', 'cartTotal'));
		} elseif ($request->payment_method == 'card') {
			return 'card';
		} else {
			return view('frontend.payment.cash', compact('data', 'cartTotal'));
		}
	} // end mehtod. 



}
