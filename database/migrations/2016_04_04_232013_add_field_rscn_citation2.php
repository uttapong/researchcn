<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldRscnCitation2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('researchs', function (Blueprint $table) {

          //prize and invention
          $table->string('isi_link',300);//
          $table->string('scopus_link',300);
          $table->string('tci_link',300);
          $table->string('research_tools',300);
          $table->string('abstract_file',200);


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
