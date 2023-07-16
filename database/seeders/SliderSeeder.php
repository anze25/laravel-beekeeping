<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sliders_json = Storage::disk('local')->get('/sliders.json');
        $sliders = json_decode($sliders_json, true);

        foreach ($sliders as  $key => $obj) {
            $i = $key + 1;
            $title_en = $obj['slider_quote_en'];
            $title_sl = $obj['slider_quote_sl'];
            $description_en = $obj['slider_description_en'];
            $description_sl = $obj['slider_description_sl'];

            $fake_image = public_path('seeder_images/slide-bg-' . $i . '.jpg');
            $imageUrl = $fake_image ? $fake_image : public_path('No_Image_Available.jpg');
            // $imageUrl = public_path('No_Image_Available.jpg');
            $imageContent = file_get_contents($imageUrl);
            $image = Image::make($imageContent);

            $image_path = public_path('frontend/images/sliders/');
            $thumbs_path = public_path('frontend/images/sliders/thumbs/');

            if (!file_exists($image_path)) {
                mkdir($image_path, 666, true);
            }
            if (!file_exists($thumbs_path)) {
                mkdir($thumbs_path, 666, true);
            }
            // $product_image = $slug;


            $image->resize(1920, 759, function ($constraint) {
                $constraint->aspectRatio();
            })->fit(1920, 759)->save($image_path .   'slide-bg-' . $i . '.jpg')

                ->resize(70, 40, function ($constraint) {
                    $constraint->aspectRatio();
                })->fit(70, 40)
                ->save($image_path . 'thumbs/slide-bg-' . $i . '.jpg');


            $slide = Slider::where("title_en", $title_en)->first();
            if (!$slide) {
                $sliderId = Slider::insertGetId([

                    'title_en' => $title_en,
                    'title_sl' => $title_sl,
                    'description_en' => $description_en,
                    'description_sl' => $description_sl,
                    'slider_img' =>  'slide-bg-' . $i . '.jpg'

                ]);
            } else {
                $sliderId = $slide->id;
            }
        }
    }
}
