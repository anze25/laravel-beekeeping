<?php

namespace Database\Seeders;

use App\Models\MultiImg;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Image;

class MultiImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 100; $x++) {
            $input = array('fashion', 'shoes', 'watch', 'furniture');
            $rand_keys = array_rand($input, 3);

            $imageUrl = 'https://api.slingacademy.com/public/sample-photos/' . $x . 'jpeg';
            $imageContent = file_get_contents($imageUrl);
            $image = Image::make($imageContent);

            $image_path = public_path('frontend/images/products/');
            $thumbs_path = public_path('frontend/images/products/thumbs/');

            if (!file_exists($image_path)) {
                mkdir($image_path, 666, true);
            }
            if (!file_exists($thumbs_path)) {
                mkdir($thumbs_path, 666, true);
            }


            $image->resize('1000', '1000', function ($constraint) {
                $constraint->aspectRatio();
            })->resizeCanvas(1000, 1000, 'center', false, '#ffffff')->save($image_path .  $x . '.' . 'jpg')
                ->resize(270, 270, function ($constraint) {
                    $constraint->aspectRatio();
                })->resizeCanvas(280, 280, 'center', false, '#ffffff')
                ->save($image_path . 'thumbs/' . $x . '.' . 'jpg');
        }

        MultiImg::query()->updateOrCreate([
            'product_id' => rand(0, 200),
            'photo_name' => $x . '.jpg',

        ]);
    }
}
