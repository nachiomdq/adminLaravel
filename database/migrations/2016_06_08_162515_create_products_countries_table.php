<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_countries', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('country_id')->unsigned();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('country_id')->references('id')->on('countries');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('products_countries', function ($table) {
          $table->dropForeign('products_countries_product_id_foreign');
          $table->dropForeign('products_countries_country_id_foreign');
      });

      Schema::drop('products_countries');
    }
}
