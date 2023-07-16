<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Image;
use App\Models\Brand;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brand_name_en = $this->faker->catchPhrase;
        $brand_name_slo = $brand_name_en . ' SLO';
        $category = $this->faker->unique()->randomElement($array = array('movie', 'game', 'album', 'book', 'face', 'fashion', 'shoes', 'watch', 'furniture'));
        $image = 'https://api.lorem.space/image/' . $category . '?w=300&h=300';


        return [
            'brand_name_en' => $brand_name_en,
            'brand_name_slo' => $brand_name_slo,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $brand_name_en)),
            'brand_slug_slo' => strtolower(str_replace(' ', '-', $brand_name_slo)),
            'brand_image' => $image
        ];
    }
}
