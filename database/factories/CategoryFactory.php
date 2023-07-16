<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_name_en =  $this->faker->unique()->randomElement($array = array('Microphones', 'Cases', 'Covers', 'Processors', 'Memory', 'Discs', 'Cooling'));
        $category_name_slo = $this->faker->unique()->randomElement($array = array('Mikrofoni', 'Ohišja', 'Pokrovi', 'Procesorji', 'Pomnilnik', 'Diski', 'Hlajenje'));
        return [
            'category_name_en' => $category_name_en,
            'category_name_slo' => $category_name_slo,
            'category_slug_en' => strtolower(str_replace(' ', '-', $category_name_en)),
            'category_slug_slo' => strtolower(str_replace(' ', '-', $category_name_slo)),
            'category_icon' => $this->faker->randomElement($array = array('fa fa-shopping-bag', 'fa fa-laptop', 'fa fa-bed', 'fa fa-tv', 'fa fa-diamond'))
        ];
    }
}
