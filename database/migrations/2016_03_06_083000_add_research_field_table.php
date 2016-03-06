<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResearchFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('researchfields', function (Blueprint $table) {
          $table->bigIncrements('id');// id ประเภทของไฟล์ครับ พี่ใส่ไว้ให้ตอนรัน seed นะงับ
          $table->string('name',200); // ชื่อของ filetype คับว่าอัพโหลดมาเป็นแบบไหน เอาไว้ให้คนขอทุนเลือกตอนเขาส่งไฟล์
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
        //
    }
}
