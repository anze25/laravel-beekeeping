<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class HoneyProductSeeder extends Seeder
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

        $honey = Storage::disk('local')->get('/honey.json');
        $sizes = Storage::disk('local')->get('/Honey_sizes.json');

        $sizes_data = json_decode($sizes, true);
        $honey_data = json_decode($honey, true);

        foreach ($sizes_data as $size_obj) {

            foreach ($honey_data as $obj) {

                $product_name_en = $obj['product_name_english'] . ' ' .  $size_obj['product_size_en'];
                $product_name_slo = $obj['product_name_slovenian'] . ' ' .  $size_obj['product_size_sl'];

                $selling_price =  $size_obj['price'];

                $category_name_en = $obj['category_english'];
                $category_name_slo = $obj['category_slovenian'];
                $subcategory_name_en = $obj['subcategory_english'];
                $subcategory_name_slo = $obj['subcategory_slovenian'];


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

                // Creating Post Categories from json

                $subCategory = SubCategory::where("subcategory_name_en", $category_name_en)->first();
                if (!$subCategory) {
                    $subcategoryId = SubCategory::insertGetId([
                        'category_id' => $categoryId,
                        'subcategory_name_en' => $subcategory_name_en,
                        'subcategory_name_slo' => $subcategory_name_slo,
                        'subcategory_slug_en' => Str::slug($subcategory_name_en),
                        'subcategory_slug_slo' => Str::slug($subcategory_name_slo),

                    ]);
                } else {
                    $subcategoryId = $subCategory->id;
                }

                $fake_image = public_path('seeder_images/med ' . $size_obj['product_size_en'] . '.' . 'jpg');
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


                $image->resize('1000', '1000', function ($constraint) {
                    $constraint->aspectRatio();
                })->resizeCanvas(1000, 1000, 'center', false, '#ffffff')->save($image_path .   'med ' . $size_obj['product_size_en'] . '.' . 'jpg')
                    ->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->resizeCanvas(400, 400, 'center', false, '#ffffff')
                    ->save($image_path . 'thumbs/' . 'med '  . $size_obj['product_size_en'] . '.' . 'jpg')
                    ->resize(285, 285, function ($constraint) {
                        $constraint->aspectRatio();
                    })->fit(70, 70)
                    ->save($image_path . 'thumbs/70px_' . 'med ' . $size_obj['product_size_en'] . '.' . 'jpg');


                $product = Product::where("product_name_en", $product_name_en)->first();
                if (!$product) {
                    $productId = Product::insertGetId([

                        'category_id' => $categoryId,
                        'subcategory_id' => $subcategoryId,
                        'product_name_en' => $product_name_en,
                        'product_name_slo' => $product_name_slo,
                        'product_slug_en' => Str::slug($product_name_en),
                        'product_slug_slo' => Str::slug(' ', '-', $product_name_slo),

                        'product_code' => rand(999, 10000),
                        'product_qty' => rand(1, 1000),
                        'product_tags_en' => array_rand([
                            'Raw honey',
                            'Organic honey',
                            'Wildflower honey',
                            'Manuka honey',
                            'Clover honey'
                        ]),
                        'product_tags_slo' => array_rand(["med",   "naravni sladilo",   "zdravilni med",   "cvetlični med",   "gozdni med"]),
                        'product_size_en' => $size_obj['product_size_en'],
                        'product_size_slo' => $size_obj['product_size_sl'],

                        'selling_price' => $size_obj['price'],
                        'discount_price' => round(($size_obj['price'] * 0.9), 2),
                        'short_desc_en' => $obj['short_description_english'],
                        'short_desc_slo' => $obj['short_description_slovenian'],
                        'long_desc_en' => $obj['long_description_english'],
                        'long_desc_slo' => $obj['long_description_slovenian'],

                        'hot_deals' => rand(0, 1),
                        'featured' => rand(0, 1),
                        'special_offer' => rand(0, 1),
                        'special_deals' => rand(0, 1),

                        'status' => rand(0, 1),

                        'product_thumbnail' =>  'med ' . $size_obj['product_size_en'] . '.' . 'jpg'


                    ]);
                } else {
                    $productId = $product->id;
                }
            }
        }
    }
}
