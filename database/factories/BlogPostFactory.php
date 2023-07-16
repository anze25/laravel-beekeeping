<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $response = Http::get('https://dummyjson.com/posts');
        $id = $response['posts']['id'];
        $news_title_en = $response['articles'][$i]['title'];
        $news_title_slo = $news_title_en . ' SLO';
        $news_slug_en = Str::slug($news_title_en);
        $news_slug_slo = Str::slug($news_title_slo);
        $word = array('drink', 'burger', 'pizza', 'fashion', 'house');
        $w = rand(0, 4);

        $fake_image = $response['articles'][$i]['urlToImage'];
        $imageUrl = $fake_image ? $fake_image : public_path('No_Image_Available.jpg');

        $imageContent = file_get_contents($imageUrl);
        $image = Image::make($imageContent);

        $image_path = public_path('frontend/images/news/');
        $thumbs_path = public_path('frontend/images/news/thumbs/');

        if (!file_exists($image_path)) {
            mkdir($image_path, 666, true);
        }
        if (!file_exists($thumbs_path)) {
            mkdir($thumbs_path, 666, true);
        }
        $news_image_name = Str::slug($news_title_en);

        $image->resize('1000', '1000', function ($constraint) {
            $constraint->aspectRatio();
        })->resizeCanvas(890, 480, 'center', false, '#ffffff')->save($image_path .  $news_image_name . '.' . 'jpg')
            ->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->resizeCanvas(200, 152, 'center', false, '#ffffff')
            ->save($image_path . 'thumbs/' . $news_image_name . '.' . 'jpg');



        return [

            'category_id' => $categoryId,
            'post_title_en' => $post_title_en,
            'post_title_slo' => $post_title_slo,
            'post_slug_en' => $post_slug_en,
            'post_slug_slo' => $post_slug_slo,
            'post_details_en' => $post_details_en,
            'post_details_slo' => $post_details_slo,

            'post_image' => $post_image . '.' . 'jpg',

            'created_at' => $this->faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
            'updated_at' => $this->faker->dateTimeBetween($startDate = '-4 years', $endDate = 'now', $timezone = null),

        ];
    }
}
