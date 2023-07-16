<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $response = Http::get('https://newsapi.org/v2/everything?q=slovenia&from=2023-06-18&to=2023-07-14&sortBy=popularity&apiKey=e43268f5c0854bf3a7de6a9a6f6ac54b');
        $i = $this->faker->unique()->numberBetween($min = 1, $max = 10);
        $news_excerpt_en = $response['articles'][$i]['description'];
        $noOfParagraphs = $this->faker->numberBetween($min = 1, $max = 10);
        $body = '';
        for ($x = 0; $x <= $noOfParagraphs; $x++) {
            $body .= "<p>{$this->faker->realText($maxNbChars = 400,$indexSize = 2)}</p>";
        }
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

            'news_title_en' => $news_title_en,
            'news_title_slo' => $news_title_slo,
            'news_slug_en' => $news_slug_en,
            'news_slug_slo' => $news_slug_slo,
            'news_slug_en' => $news_slug_slo,
            'news_excerpt_en' => $news_excerpt_en,
            'news_excerpt_slo' => $news_excerpt_en,
            'news_details_en' => $body,
            'news_details_slo' => $body,
            'news_image' => $news_image_name . '.' . 'jpg',
            'created_at' => $this->faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
            'updated_at' => $this->faker->dateTimeBetween($startDate = '-4 years', $endDate = 'now', $timezone = null),

        ];
    }
}
