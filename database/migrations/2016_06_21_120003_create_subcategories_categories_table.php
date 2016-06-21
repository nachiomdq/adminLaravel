<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories_categories', function (Blueprint $table) {
            $table->integer('subcategory_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->foreign('category_id')->references('id')->on('categories');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('subcategories_categories', function ($table) {
          $table->dropForeign('subcategories_categories_subcategory_id_foreign');
          $table->dropForeign('subcategories_categories_category_id_foreign');
      });

      Schema::drop('subcategories_categories');
    }
}
