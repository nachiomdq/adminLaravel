<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sections', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name',255);
        $table->text('description');
        $table->text('tags'); //For SEO Purposes

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
      Schema::drop('sections');
    }
}
