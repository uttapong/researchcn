<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('downloads', function (Blueprint $table) {
          $table->bigIncrements('id');// id ของไฟล์ที่ให้ดาวน์โหลด
          $table->string('file_path',200);// เอาไว้เก็บ path ของไฟล์นั้นๆ อิงจากชื่อไฟล์เดิมนะครับ
          $table->bigInteger('fund_id')->unsigned();// เอาไว้อ้างอิงว่าเป็นไฟล์ของทุนไหนจากตาราง funds คับ
          $table->foreign('fund_id')->references('id')->on('funds')->onDelete('cascade');
          $table->rememberToken();
          $table->timestamps();//ตรงนี้มันจะสร้าง create_at เป็น datetime จะเปลี่ยนทุกครั้งที่มีการอัพเดท record ฮับ
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('downloads');
    }
}
