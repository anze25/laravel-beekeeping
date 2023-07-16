<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiteSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone_one' => '+386 41 123 456',
            'phone_two' => '+386 41 123 789',
            'fax' => '+386 1 123 4567',
            'email' => 'info@companyname.com',
            'company_name' => 'Nova Tehnologija d.o.o.',
            'company_address' => 'Zaloška cesta 150, 1000 Ljubljana, Slovenia',
            'facebook' => 'facebook',
            'twitter' => 'twitter',
            'linkedin' => 'linkedin',
            'youtube' => 'youtube',
            'logo' => 'image.jpg',
        ];
    }
}
