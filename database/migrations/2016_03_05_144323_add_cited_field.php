<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCitedField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('researchs', function (Blueprint $table) {
          $table->text('cited');
          $table->string('cited_count',10);
          $table->renameColumn('file_path', 'full_text_file');
          $table->string('article_file',200);
          $table->string('cover_file',200);
      });

      Schema::table('users', function (Blueprint $table) {
          $table->string('status');
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
