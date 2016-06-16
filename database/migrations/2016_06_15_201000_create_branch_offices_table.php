<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('branch_offices', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name',255);
        $table->text('description');
        $table->text('latitude'); //For SEO Purposes
        $table->text('longitude'); //For SEO Purposes

        $table->timestamps();
        $table->softDeletes();

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('branch_offices');
    }
}
