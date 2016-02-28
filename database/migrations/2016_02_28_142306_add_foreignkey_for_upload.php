<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyForUpload extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uploads', function (Blueprint $table) {
          $table->bigInteger('application_id')->unsigned();// เอาไว้อ้างอิงว่าเป็นไฟล์ประเภทไหนจากตาราง filetypes คับ เอา id จาก filetypes มาใส่ได้เลย
          $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
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
