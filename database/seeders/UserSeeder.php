<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Http::get('https://randomuser.me/api/?results=15');
        $response = $json['results'];

        foreach ($response as $obj) {

            $firstName = $obj['name']['first'];
            $lastName = $obj['name']['last'];
            $phone = $obj['phone'];
            $address = $obj['location']['street']['name'] . ' ' . $obj['location']['street']['number'];
            $postalCode = $obj['location']['postcode'];
            $city = $obj['location']['city'];
            $country = $obj['location']['country'];

            $photo = $obj['picture']['large'];
            $email = $obj['email'];
            $imageName = Str::random(10) . '.jpg';

            $user = User::where("email", $email)->first();
            if (!$user) {
                $userId = User::insertGetId([

                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'address' => $address,
                    'postal_code' => $postalCode,
                    'city' => $city,
                    'country' => $country,
                    'shipping_address' => $address,
                    'shipping_postal_code' => $postalCode,
                    'shipping_city' => $city,
                    'shipping_country' => $country,
                    'phone' => $phone,
                    'profile_photo_path' => $imageName,
                    'email' => $email,
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),


                ]);
            } else {
                $userId = $user->id;
            }
            $imageUrl = $photo ? $photo : public_path('No_Image_Available.jpg');
            // $imageUrl = public_path('No_Image_Available.jpg');
            $imageContent = file_get_contents($imageUrl);
            $image = Image::make($imageContent);

            $image_path = public_path('frontend/images/users/');


            if (!file_exists($image_path)) {
                mkdir($image_path, 666, true);
            }

            $image->resize('1000', '1000', function ($constraint) {
                $constraint->aspectRatio();
            })->resizeCanvas(1000, 1000, 'center', false, '#ffffff')->save($image_path .  $imageName);
        }
    }
}
