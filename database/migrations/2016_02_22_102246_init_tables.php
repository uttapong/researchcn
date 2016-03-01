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
          $table->bigIncrements('id');//id ของทุน
          $table->string('name');//ชื่อทุน ตรงนี้อาจสั้นบ้างยาวบ้าง
          $table->text('description');// คำอธิบาย เป็นภาษาไทยยาวๆ ไม่แน่ใจว่าเขาอยากให้ใส่เป็น code html ได้หรือเปล่าแต่ทำเป็น text ธรรมดาก่อนละกันเน๊อะ
          $table->string('contract_file',200);//เอาไว้ใส่ path ของ ไฟล์สัญญาน่าจะอัพโหลดเป็น .doc .docx หรือ pdf คับ
          $table->date('apply_start');//วันเริ่มต้นที่สามารถสมัครขอทุน
          $table->date('apply_end');//วันสุดท้ายของการสมัครขอทุน
          $table->date('upload_start');//วันเริ่มต้นส่งเอกสาร
          $table->date('upload_end');//วันสุดท้ายของการส่งเอกสาร
          $table->date('contract_end');//วันสิ้นสุดวันส่งงานในสัญญา คือถ้าเลยวันนี้ไปจะเข้ามาส่งเอกสารไม่ได้ฮับ
          $table->integer('creator')->unsigned(); // id ของคนสร้างประกาศทุนนี้ครับ อ้างอิงจากตาราง users ฮับผม
          $table->index('creator');
          $table->foreign('creator')->references('id')->on('users')->onDelete('cascade');
          $table->rememberToken();
          $table->timestamps(); //ตรงนี้มันจะสร้าง create_at เป็น datetime จะเปลี่ยนทุกครั้งที่มีการอัพเดท record ฮับ
      });

      Schema::create('applications', function (Blueprint $table) {
          $table->bigIncrements('id');//id ของการสมัครขอทุน ตรงนี้จะสร้างตอนที่เค้ากดปุ่มสมัครขอทุน ก่อนที่จะวิ่งไปให้ admin อนุมัติครับ
          $table->bigInteger('fund')->unsigned();
          $table->foreign('fund')->references('id')->on('funds')->onDelete('cascade');
          $table->string('status', 50);//สถานะของการสมัครขอทุนว่าถึงไหนแล้วครับ ที่พี่นึกออกจะมี
          /*
            applied(สมัครทุนแล้ว),approved(อนุมัติสมัครทุน)
            signed_agreement(ทำสัญญารับทุน), approved_agreement(อนุมัติสัญญารับทุน),rejected_agreement(ไม่อนุมัติสัญญารับทุน)
            first_payment(เบิกเงินงวดที่ 1), approved_first_payment(อนุมัติเบิกเงินงวดที่ 1),rejected_first_payment(ไม่อนุมัติเบิกเงินงวดที่ 1)
            second_payment(เบิกเงินงวดที่ 2 อันนี้จะรวมกับรายงานความก้าวหน้าครั้งที่ 1), approved_first_payment(อนุมัติเบิกเงินงวดที่ 2), rejected_first_payment(ไม่อนุมัติเบิกเงินงวดที่ 2)
            2ndprogressreport(รายงานความก้าวหน้าครั้งที่ 2), approved_2ndprogressreport(อนุมัติรายงานความก้าวหน้าครั้งที่ 2), rejected_2ndprogressreport(ไม่อนุมัติรายงานความก้าวหน้าครั้งที่ 2)
            request_extend(ขอขยายเวลาส่งงาน), approved_extend(อนุมัติขอขยายเวลาส่งงาน), rejected_extend(ไม่อนุมัติขอขยายเวลาส่งงาน)
            finalized(ส่งผลงานครั้งสุดท้าบ), approved_finalized(อนุมัติส่งผลงานครั้งสุดท้าบ), rejected_finalized(ไม่อนุมัติส่งผลงานครั้งสุดท้าบ)
            finalized(ส่งผลงานครั้งสุดท้าบ), approved_finalized(อนุมัติส่งผลงานครั้งสุดท้าบ), rejected_finalized(ไม่อนุมัติส่งผลงานครั้งสุดท้าบ)
            project_finished(ปิดโครงการ)
          */
          $table->integer('owner')->unsigned(); //id ของคนที่สมัครขอทุนอ้างอิงจากตาราง users ฮับ
          $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
          $table->rememberToken();
          $table->timestamps();//ตรงนี้มันจะสร้าง create_at เป็น datetime จะเปลี่ยนทุกครั้งที่มีการอัพเดท record ฮับ
      });

      Schema::create('filetypes', function (Blueprint $table) {
          $table->bigIncrements('id');// id ประเภทของไฟล์ครับ พี่ใส่ไว้ให้ตอนรัน seed นะงับ
          $table->string('name',200); // ชื่อของ filetype คับว่าอัพโหลดมาเป็นแบบไหน เอาไว้ให้คนขอทุนเลือกตอนเขาส่งไฟล์
          $table->rememberToken();
          $table->timestamps();//ตรงนี้มันจะสร้าง create_at เป็น datetime จะเปลี่ยนทุกครั้งที่มีการอัพเดท record ฮับ
      });

      Schema::create('uploads', function (Blueprint $table) {
          $table->bigIncrements('id');// id ของไฟล์ที่อัพโหลด
          $table->string('file_path',200);// เอาไว้เก็บ path ของไฟล์นั้นๆ หมูแก๊บสร้างไว้โฟลเดอร์นึงเอาไว้เก็บไฟล์ได้เลยนะครับ ที่ไหนก็ได้
          $table->string('status',20); //สถานะของไฟล์ว่า uploaded(เพิ่มอัพโหลด), approved(อนุมัติ), rejected(ปฏิเสธ, ไฟล์ใช้ไม่ได้)
          $table->bigInteger('filetype')->unsigned();// เอาไว้อ้างอิงว่าเป็นไฟล์ประเภทไหนจากตาราง filetypes คับ เอา id จาก filetypes มาใส่ได้เลย
          $table->foreign('filetype')->references('id')->on('filetypes')->onDelete('cascade');
          $table->bigInteger('application_id')->unsigned();// เอาไว้อ้างอิงว่าเป็นไฟล์ประเภทไหนจากตาราง filetypes คับ เอา id จาก filetypes มาใส่ได้เลย
          $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
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
        Schema::table('funds', function (Blueprint $table) {
            //
        });
    }
}
