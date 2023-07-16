<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SeoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'meta_title' => 'meta_title',
            'meta_author' => 'meta_author',
            'meta_keyword' => 'meta_keyword',
            'meta_description' => 'meta_description',
            'google_analytics' => 'google_analytics'
        ];
    }
}
