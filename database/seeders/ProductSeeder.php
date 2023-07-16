<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product::factory()
        //     ->count(200)
        //     ->create();

        $json = Http::get('https://dummyjson.com/products');
        $response = $json['products'];
        $subcategory_id = rand(1, 10);
        foreach ($response as $obj) {
            $id = $obj['id'];
            $images = $obj['images'];



            $product_name_en = $obj['title'];
            $product_name_slo = $obj['title'] . ' slo';

            $selling_price =  $obj['price'];

            $category_name_en = $obj['category'];
            $category_name_slo = $obj['category'] . ' slo';




            $fake_image = $obj['thumbnail'];
            $imageUrl = $fake_image ? $fake_image : public_path('No_Image_Available.jpg');
            // $imageUrl = public_path('No_Image_Available.jpg');
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
            // $product_image = $slug;
            $product_image = $id;

            $image->resize('1000', '1000', function ($constraint) {
                $constraint->aspectRatio();
            })->resizeCanvas(1000, 1000, 'center', false, '#ffffff')->save($image_path .  $product_image . '.' . 'jpg')
                ->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->resizeCanvas(400, 285, 'center', false, '#ffffff')
                ->save($image_path . 'thumbs/' . $product_image . '.' . 'jpg')
                ->resize(285, 285, function ($constraint) {
                    $constraint->aspectRatio();
                })->resizeCanvas(70, 70, 'center', false, '#ffffff')
                ->save($image_path . 'thumbs/70px_' . $product_image . '.jpg');


            // Creating Post Categories from json

            $category = Category::where("category_name_en", $category_name_en)->first();
            if (!$category) {
                $categoryId = Category::insertGetId([
                    'category_icon' => 'fa fa-bed',
                    'category_name_en' => $category_name_en,
                    'category_name_slo' => $category_name_slo,
                    'category_slug_en' => Str::slug($category_name_en),
                    'category_slug_slo' => Str::slug($category_name_slo),

                ]);
            } else {
                $categoryId = $category->id;
            }


            $product = Product::where("product_name_en", $product_name_en)->first();
            if (!$product) {
                $productId = Product::insertGetId([

                    'category_id' => $categoryId,
                    'subcategory_id' => $subcategory_id,
                    'product_name_en' => $product_name_en,
                    'product_name_slo' => $product_name_slo,
                    'product_slug_en' => strtolower(str_replace(' ', '-', $product_name_en)),
                    'product_slug_slo' => strtolower(str_replace(' ', '-', $product_name_slo)),

                    'product_code' => rand(999, 10000),
                    'product_qty' => $obj['stock'],
                    'product_tags_en' => $obj['brand'],
                    'product_tags_slo' => $obj['brand'],
                    'product_size_en' => array_rand(['Big', 'Medium', 'Small']),
                    'product_size_slo' => array_rand(['Velika', 'Mala', 'Srednja']),
                    'product_color_en' => array_rand(['Red', 'Blue', 'Green', 'Orange', 'Purple', 'Black', 'Brown']),
                    'product_color_slo' => array_rand(['Rdeča', 'Modra', 'Zelena', 'Oranžna', 'Vijolična', 'Črna', 'Rjava']),

                    'selling_price' => $obj['price'],
                    'discount_price' => $obj['price'] - 40,
                    'short_desc_en' => $obj['description'],
                    'short_desc_slo' => $obj['description'],
                    'long_desc_en' => $obj['description'],
                    'long_desc_slo' => $obj['description'],

                    'hot_deals' => rand(0, 1),
                    'featured' => rand(0, 1),
                    'special_offer' => rand(0, 1),
                    'special_deals' => rand(0, 1),

                    'status' => rand(0, 1),

                    'product_thumbnail' =>  $id . '.' . 'jpg'


                ]);
            } else {
                $productId = $product->id;
            }

            foreach ($images as $img) {
                $name = time();
                $imageContent = file_get_contents($img);
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
                })->resizeCanvas(1000, 1000, 'center', false, '#ffffff')->save($image_path .  $name . '.' . 'jpg')
                    ->resize(270, 270, function ($constraint) {
                        $constraint->aspectRatio();
                    })->resizeCanvas(280, 280, 'center', false, '#ffffff')
                    ->save($image_path . 'thumbs/' . $name . '.' . 'jpg');

                MultiImg::query()->updateOrCreate([
                    'product_id' => $productId,
                    'photo_name' => $name . '.jpg',

                ]);
            }
        }
    }
}
