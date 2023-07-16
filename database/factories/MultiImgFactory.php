<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Intervention\Image\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class MultiImgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        for ($x = 0; $x <= 10; $x++) {
        }
        $product_name_en = $this->faker->company();
        $category = $this->faker->randomElement($array = array('fashion', 'shoes', 'watch', 'furniture'));
        $imageUrl = 'https://api.lorem.space/image/' . $category . '?w=917&h=1000';
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
        $prod_image_name = Str::slug($product_name_en);

        $image->resize('1000', '1000', function ($constraint) {
            $constraint->aspectRatio();
        })->resizeCanvas(1000, 1000, 'center', false, '#ffffff')->save($image_path .  $prod_image_name . '.' . 'jpg')
            ->resize(270, 270, function ($constraint) {
                $constraint->aspectRatio();
            })->resizeCanvas(280, 280, 'center', false, '#ffffff')
            ->save($image_path . 'thumbs/' . $prod_image_name . '.' . 'jpg');


        return [
            'product_id' => $this->faker->numberBetween($min = 1, $max = 1000),
            'photo_name' => $image,

        ];
    }
}
