<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::factory()->create();
        // \App\Models\User::factory()->create();
        \App\Models\SiteSetting::factory()->create();
        \App\Models\Seo::factory()->create();
        $this->call([

            SliderSeeder::class,
            HoneyProductSeeder::class,
            SliderSeeder::class,
            NewsSeeder::class,
            BlogPostSeeder::class,


        ]);
    }
}
