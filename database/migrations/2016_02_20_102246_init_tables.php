<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('funds', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->text('description');
          $table->string('contract_file',200);
          $table->date('apply_start');
          $table->date('apply_end');
          $table->date('upload_start');
          $table->date('upload_end');
          $table->date('contract_end');
          $table->integer('creator')->unsigned();
          $table->index('creator');
          $table->foreign('creator')->references('id')->on('users')->onDelete('cascade');
          $table->rememberToken();
          $table->timestamps();
      });

      Schema::create('applications', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('status',20);
          $table->integer('owner')->unsigned();
          $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
          $table->rememberToken();
          $table->timestamps();
      });

      Schema::create('uploads', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('file_path',200);
          $table->string('status',20);
          $table->string('contract_file',200);
          $table->string('submission_note_file1',200);
          $table->string('contract_copy_file',200);
          $table->string('bookbank_file',200);
          $table->string('ethics_note_file',200);
          $table->string('submission_note_file2',200);
          $table->string('progress_report_file1',200);
          $table->string('expenses_note_file',200);
          $table->bigInteger('owner')->unsigned();
          $table->foreign('owner')->references('id')->on('applications')->onDelete('cascade');
          $table->rememberToken();
          $table->timestamps();
      });

      Schema::create('filetypes', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name',200);
          $table->rememberToken();
          $table->timestamps();
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funds', function (Blueprint $table) {
            //
        });
    }
}
