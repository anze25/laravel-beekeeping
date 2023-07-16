<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('news_title_en');
            $table->string('news_title_slo');
            $table->string('news_slug_en');
            $table->string('news_slug_slo');
            $table->string('news_image');
            $table->text('news_excerpt_en');
            $table->text('news_excerpt_slo');
            $table->text('news_details_en');
            $table->text('news_details_slo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
