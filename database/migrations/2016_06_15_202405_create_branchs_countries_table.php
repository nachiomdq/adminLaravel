<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchsCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_countries', function (Blueprint $table) {
            $table->integer('branch_id')->unsigned();
            $table->integer('country_id')->unsigned();


            $table->foreign('branch_id')->references('id')->on('branch_offices');
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
          Schema::table('branch_countries', function ($table) {
              $table->dropForeign('branch_countries_branch_id_foreign');
              $table->dropForeign('branch_countries_country_id_foreign');
          });

          Schema::drop('branchs_countries');
    }
}
