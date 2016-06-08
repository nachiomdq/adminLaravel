<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_media', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('media_id')->unsigned();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('media_id')->references('id')->on('media');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('products_media', function ($table) {
          $table->dropForeign('products_media_product_id_foreign');
          $table->dropForeign('products_media_media_id_foreign');
      });

      Schema::drop('products_media');
    }
}
