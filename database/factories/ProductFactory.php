<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name_en = $this->faker->company();
        $product_name_slo = $product_name_en . '_slo';
        $selling_price = $this->faker->numberBetween($min = 50, $max = 500);
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
            })->resizeCanvas(270, 270, 'center', false, '#ffffff')
            ->save($image_path . 'thumbs/' . $prod_image_name . '.' . 'jpg');
        return [

            'category_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'subcategory_id' => $this->faker->numberBetween($min = 1, $max = 35),
            'product_name_en' => $product_name_en,
            'product_name_slo' => $product_name_slo,
            'product_slug_en' => strtolower(str_replace(' ', '-', $product_name_en)),
            'product_slug_slo' => strtolower(str_replace(' ', '-', $product_name_slo)),

            'product_code' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'product_qty' => $this->faker->numberBetween($min = 0, $max = 500),
            'product_tags_en' => $this->faker->randomElement($array = array('Microphones', 'Cases', 'Covers', 'Processors', 'Memory', 'Discs', 'Cooling')),
            'product_tags_slo' => $this->faker->randomElement($array = array('Mikrofoni', 'Torbice', 'Ovitki', 'Procesorji', 'Pomnilnik', 'Diski', 'Hlajenje')),
            'product_size_en' => $this->faker->randomElement($array = array('Big', 'Medium', 'Small')),
            'product_size_slo' => $this->faker->randomElement($array = array('Velika', 'Mala', 'Srednja')),
            'product_color_en' => $this->faker->randomElement($array = array('Red', 'Blue', 'Green', 'Orange', 'Purple', 'Black', 'Brown')),
            'product_color_slo' => $this->faker->randomElement($array = array('Rdeča', 'Modra', 'Zelena', 'Oranžna', 'Vijolična', 'Črna', 'Rjava')),

            'selling_price' => $selling_price,
            'discount_price' => $selling_price - 40,
            'short_desc_en' => $this->faker->sentence($nbWords = 6, $variableNbWords = false),
            'short_desc_slo' => $this->faker->sentence($nbWords = 5, $variableNbWords = false),
            'long_desc_en' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'long_desc_slo' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),

            'hot_deals' => $this->faker->numberBetween($min = 0, $max = 1),
            'featured' => $this->faker->numberBetween($min = 0, $max = 1),
            'special_offer' => $this->faker->numberBetween($min = 0, $max = 1),
            'special_deals' => $this->faker->numberBetween($min = 0, $max = 1),

            'status' => $this->faker->numberBetween($min = 0, $max = 1),

            'product_thumbnail' =>  $prod_image_name . '.' . 'jpg'

        ];
    }
}
