<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldRscn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('researchs', function (Blueprint $table) {

          $table->string('funding_year',10);//common
          $table->string('other_authors',300);

          //prize and invention
          $table->string('isi',10);//
          $table->string('scopus',10);
          $table->string('tci',10);


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
