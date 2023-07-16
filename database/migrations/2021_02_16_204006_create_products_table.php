<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_slo');
            $table->string('product_slug_en');
            $table->string('product_slug_slo');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags_en');
            $table->string('product_tags_slo');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_slo')->nullable();
            $table->string('product_color_en')->nullable();
            $table->string('product_color_slo')->nullable();
            $table->float('selling_price');
            $table->float('discount_price')->nullable();
            $table->string('short_desc_en');
            $table->string('short_desc_slo');
            $table->string('long_desc_en');
            $table->string('long_desc_slo');
            $table->string('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
