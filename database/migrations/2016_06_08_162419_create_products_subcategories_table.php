<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_subcategories', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('subcategory_id')->unsigned();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('products_subcategories', function ($table) {
          $table->dropForeign('products_subcategories_product_id_foreign');
          $table->dropForeign('products_subcategories_subcategory_id_foreign');
      });

      Schema::drop('products_subcategories');
    }
}
