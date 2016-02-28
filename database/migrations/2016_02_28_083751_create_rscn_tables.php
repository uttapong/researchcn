<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRscnTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchs', function (Blueprint $table) {
            $table->bigIncrements('id');//id ของทุน
            $table->string('title',100);//ชื่อทุน ตรงนี้อาจสั้นบ้างยาวบ้าง
            $table->string('authors',200);
            $table->string('keywords',200);
            $table->text('abstract');
            $table->string('file_path',200);//เอาไว้ใส่ path ของ ไฟล์สัญญาน่าจะอัพโหลดเป็น .doc .docx หรือ pdf คับ
            $table->string('type',20);
            $table->string('publication_name',200);
            $table->string('published_year',200);
            $table->string('issue',3);
            $table->string('published_month',3);
            $table->string('published_page',10);
            $table->integer('creator')->unsigned(); // id ของคนสร้างประกาศทุนนี้ครับ อ้างอิงจากตาราง users ฮับผม
            $table->index('creator');
            $table->foreign('creator')->references('id')->on('users')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps(); //ตรงนี้มันจะสร้าง create_at เป็น datetime จะเปลี่ยนทุกครั้งที่มีการอัพเดท record ฮับ
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
