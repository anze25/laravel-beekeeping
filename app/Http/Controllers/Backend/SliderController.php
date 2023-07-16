<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{

	public function SliderView()
	{
		$sliders = Slider::latest()->get();
		return view('backend.slider.slider_view', compact('sliders'));
	}


	public function SliderStore(Request $request)
	{

		$request->validate([

			'slider_img' => 'required',
		], [
			'slider_img.required' => 'Plz Select One Image',

		]);

		$image = $request->file('slider_img');
		$name_gen = $image->getClientOriginalName();
		$image_path = public_path('frontend/images/sliders/');
		$thumbs_path = public_path('frontend/images/sliders/thumbs/');
		$image = Image::make($image);


		$image->resize(1920, 759, function ($constraint) {
			$constraint->aspectRatio();
		})->fit(1920, 759)->save($image_path .   $name_gen)

			->resize(70, 40, function ($constraint) {
				$constraint->aspectRatio();
			})->fit(70, 40)
			->save($thumbs_path . $name_gen);


		Slider::insert([
			'title_en' => $request->title_en,
			'title_sl' => $request->title_sl,
			'description_en' => $request->description_en,
			'description_sl' => $request->description_sl,
			'slider_img' => $name_gen,

		]);

		$notification = array(
			'message' => 'Slider Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	} // end method 




	public function SliderEdit($id)
	{
		$sliders = Slider::findOrFail($id);
		return view('backend.slider.slider_edit', compact('sliders'));
	}


	public function SliderUpdate(Request $request)
	{
		$request->validate([
			'post_title_en' => 'required',
			'post_title_slo' => 'required',
			'post_image' => 'required',
		], [
			'post_title_en.required' => 'Input Post Title English Name',
			'post_title_slo.required' => 'Input Post Title Slovenian Name',
		]);

		$slider_id = $request->id;
		$old_img = $request->old_image;

		if ($request->file('slider_img')) {


			$old_image = 'frontend/images/sliders/' . $old_img;
			$old_thumb = 'frontend/images/sliders/thumbs/' . $old_img;
			if ($old_image) {
				unlink($old_image);
			}
			if ($old_thumb) {
				unlink($old_thumb);
			}
			$image = $request->file('slider_img');
			$name_gen = $image->getClientOriginalName();
			$image = Image::make($image);

			$image_path = public_path('frontend/images/sliders/');
			$thumbs_path = public_path('frontend/images/sliders/thumbs/');
			$image->resize(1920, 759, function ($constraint) {
				$constraint->aspectRatio();
			})->fit(1920, 759)->save($image_path .   $name_gen)

				->resize(70, 40, function ($constraint) {
					$constraint->aspectRatio();
				})->fit(70, 40)
				->save($thumbs_path . $name_gen);

			Slider::findOrFail($slider_id)->update([
				'title_en' => $request->title_en,
				'title_sl' => $request->title_sl,
				'description_en' => $request->description_en,
				'description_sl' => $request->description_sl,
				'slider_img' => $name_gen,

			]);

			$notification = array(
				'message' => 'Slider Updated Successfully',
				'alert-type' => 'info'
			);

			return redirect()->route('manage-slider')->with($notification);
		} else {

			Slider::findOrFail($slider_id)->update([
				'title_en' => $request->title_en,
				'title_sl' => $request->title_sl,
				'description_en' => $request->description_en,
				'description_sl' => $request->description_sl,


			]);

			$notification = array(
				'message' => 'Slider Updated Without Image Successfully',
				'alert-type' => 'info'
			);

			return redirect()->route('manage-slider')->with($notification);
		} // end else 
	} // end method 


	public function SliderDelete($id)
	{
		$slider = Slider::findOrFail($id);
		$image_path = 'frontend/images/sliders/' . $slider->slider_img;
		$thumb_path = 'frontend/images/sliders/thumbs/' . $slider->slider_img;
		unlink($image_path);
		unlink($thumb_path);
		Slider::findOrFail($id)->delete();

		$notification = array(
			'message' => 'Slider Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
	} // end method


	public function SliderInactive($id)
	{
		Slider::findOrFail($id)->update(['status' => 0]);

		$notification = array(
			'message' => 'Slider Inactive Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
	} // end method 


	public function SliderActive($id)
	{
		Slider::findOrFail($id)->update(['status' => 1]);

		$notification = array(
			'message' => 'Slider Active Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
	} // end method 






}
