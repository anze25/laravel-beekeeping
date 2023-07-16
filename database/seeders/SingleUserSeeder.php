<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SingleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = User::insertGetId([

            'first_name' => 'Janez',
            'last_name' => 'Novak',
            'address' => 'Celovška cesta 1',
            'postal_code' => 1000,
            'city' => 'Ljubljana',
            'country' => 'Slovenija',
            'shipping_address' => 'Jadranska cesta 1',
            'shipping_postal_code' => 6000,
            'shipping_city' => 'Koper',
            'shipping_country' => 'Slovanija',
            'phone' => '01 123 123 4',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),


        ]);
    }
}
