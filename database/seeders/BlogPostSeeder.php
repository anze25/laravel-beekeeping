<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Blog\BlogPostCategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Http::get('https://dummyjson.com/posts');
        $response = $json['posts'];

        foreach ($response as $obj) {

            $pic_id = rand(1, 100);

            $post_title_en = $obj['title'];
            $post_title_slo = $obj['title'] . ' slo';

            $post_slug_en = Str::slug($post_title_en);
            $post_slug_slo = Str::slug($post_title_slo);

            $post_details_en = $obj['body'];
            $post_details_slo = $obj['body'];
            // $excerpt = substr($body, 0, 30);

            $category_name_en = $obj['tags'][1];
            $category_name_slo = $obj['tags'][1] . ' slo';




            $fake_image = 'https://api.slingacademy.com/public/sample-photos/' . $pic_id . '.jpeg';
            $imageUrl = $fake_image ? $fake_image : public_path('No_Image_Available.jpg');
            // $imageUrl = public_path('No_Image_Available.jpg');
            $imageContent = file_get_contents($imageUrl);
            $image = Image::make($imageContent);

            $image_path = public_path('frontend/images/posts/');
            $thumbs_path = public_path('frontend/images/posts/thumbs/');

            if (!file_exists($image_path)) {
                mkdir($image_path, 666, true);
            }
            if (!file_exists($thumbs_path)) {
                mkdir($thumbs_path, 666, true);
            }
            // $post_image = $slug;
            $post_image = $post_slug_en;

            $image->resize('1000', '1000', function ($constraint) {
                $constraint->aspectRatio();
            })->resizeCanvas(890, 480, 'center', false, '#ffffff')->save($image_path .  $post_image . '.' . 'jpg')
                ->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->resizeCanvas(400, 200, 'center', false, '#ffffff')
                ->save($image_path . 'thumbs/' . $post_image . '.' . 'jpg')
                ->resize(200, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->resizeCanvas(70, 70, 'center', false, '#ffffff')
                ->save($image_path . 'thumbs/70px_' . $post_image . '.jpg');


            // Creating Post Categories from json

            $category = BlogPostCategory::where("blog_category_name_en", $category_name_en)->first();
            if (!$category) {
                $categoryId = BlogPostCategory::insertGetId([
                    'blog_category_name_en' => $category_name_en,
                    'blog_category_name_slo' => $category_name_slo,
                    'blog_category_slug_en' => Str::slug($category_name_en),
                    'blog_category_slug_slo' => Str::slug($category_name_slo),

                ]);
            } else {
                $categoryId = $category->id;
            }


            $post = BlogPost::where("post_title_en", $post_title_en)->first();
            if (!$post) {
                $postId = BlogPost::insertGetId([

                    'category_id' => $categoryId,
                    'post_title_en' => $post_title_en,
                    'post_title_slo' => $post_title_slo,
                    'post_slug_en' => $post_slug_en,
                    'post_slug_slo' => $post_slug_slo,
                    'post_details_en' => $post_details_en,
                    'post_details_slo' => $post_details_slo,

                    'post_image' => $post_image . '.' . 'jpg',

                    'created_at' => now(),


                ]);
            } else {
                $postId = $post->id;
            }
        }
    }

    // public function run()
    // {
    //     $json = Storage::disk('local')->get('/Blog.json');
    //     $data = json_decode($json, true);



    //     foreach ($data as $obj) {

    //         $pic_id = rand(1, 100);

    //         $post_title_en = $obj['title'];
    //         $post_title_slo = $obj['title'] . ' slo';

    //         $post_slug_en = Str::slug($post_title_en);
    //         $post_slug_slo = Str::slug($post_title_slo);

    //         $post_details_en = $obj['content'];
    //         $post_details_slo = $obj['content'];
    //         // $excerpt = substr($body, 0, 30);

    //         $category_name_en = $obj['category'];
    //         $category_name_slo = $obj['category'] . ' slo';


    //         $word = array('drink', 'burger', 'pizza', 'fashion', 'house');
    //         $i = rand(0, 4);

    //         $fake_image = 'https://api.lorem.space/image/' . $word[$i] . '?w=750&h=630';
    //         $imageUrl = $fake_image ? $fake_image : public_path('No_Image_Available.jpg');

    //         $imageContent = file_get_contents($imageUrl);
    //         $image = Image::make($imageContent);

    //         $image_path = public_path('frontend/images/posts/');
    //         $thumbs_path = public_path('frontend/images/posts/thumbs/');

    //         if (!file_exists($image_path)) {
    //             mkdir($image_path, 666, true);
    //         }
    //         if (!file_exists($thumbs_path)) {
    //             mkdir($thumbs_path, 666, true);
    //         }
    //         // $post_image = $slug;
    //         $post_image = $post_slug_en;

    //         $image->resize('1000', '1000', function ($constraint) {
    //             $constraint->aspectRatio();
    //         })->resizeCanvas(1000, 1000, 'center', false, '#ffffff')->save($image_path .  $post_image . '.' . 'jpg')
    //             ->resize(400, 400, function ($constraint) {
    //                 $constraint->aspectRatio();
    //             })->resizeCanvas(400, 260, 'center', false, '#ffffff')
    //             ->save($image_path . 'thumbs/' . $post_image . '.' . 'jpg')
    //             ->resize(260, 260, function ($constraint) {
    //                 $constraint->aspectRatio();
    //             })->resizeCanvas(70, 70, 'center', false, '#ffffff')
    //             ->save($image_path . 'thumbs/70px_' . $post_image . '.jpg');


    //         // Creating Post Categories from json

    //         $category = BlogPostCategory::where("blog_category_name_en", $category_name_en)->first();
    //         if (!$category) {
    //             $categoryId = BlogPostCategory::insertGetId([
    //                 'blog_category_name_en' => $category_name_en,
    //                 'blog_category_name_slo' => $category_name_slo,
    //                 'blog_category_slug_en' => Str::slug($category_name_en),
    //                 'blog_category_slug_slo' => Str::slug($category_name_slo),

    //             ]);
    //         } else {
    //             $categoryId = $category->id;
    //         }


    //         $post = BlogPost::where("post_title_en", $post_title_en)->first();
    //         if (!$post) {
    //             $postId = BlogPost::insertGetId([

    //                 'category_id' => $categoryId,
    //                 'post_title_en' => $post_title_en,
    //                 'post_title_slo' => $post_title_slo,
    //                 'post_slug_en' => $post_slug_en,
    //                 'post_slug_slo' => $post_slug_slo,
    //                 'post_details_en' => $post_details_en,
    //                 'post_details_slo' => $post_details_slo,

    //                 'post_image' => $post_image . '.' . 'jpg',

    //                 'created_at' => now(),


    //             ]);
    //         } else {
    //             $postId = $post->id;
    //         }
    //     }
    // }
}
