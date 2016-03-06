<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResearchField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('researchs', function (Blueprint $table) {
          $table->bigInteger('field')->unsigned();// เอาไว้อ้างอิงว่าเป็นสาขาไหน
          $table->foreign('field')->references('id')->on('researchfields')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
