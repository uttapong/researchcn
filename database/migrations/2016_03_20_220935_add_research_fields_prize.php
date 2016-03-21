<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResearchFieldsPrize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('researchs', function (Blueprint $table) {
          //common
          $table->string('title_thai',300);

          //prize and invention
          $table->string('prize_name',200);//
          $table->string('issuer',200);
          $table->string('prize_level',100);
          $table->string('weight',5);

          //article
          $table->string('article_level',50);

          //book
          $table->string('book_type',50);
          $table->string('subject',200);
          $table->string('course',200);
          $table->string('degree',50);
          $table->string('subject_type',70);
          $table->string('project',400);

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
