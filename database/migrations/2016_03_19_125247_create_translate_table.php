<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('translates', function (Blueprint $table) {
          $table->bigIncrements('id');//id ของการสมัครขอทุน ตรงนี้จะสร้างตอนที่เค้ากดปุ่มสมัครขอทุน ก่อนที่จะวิ่งไปให้ admin อนุมัติครับ
          $table->string('status', 50);//สถานะของการสมัครขอทุนว่าถึงไหนแล้วครับ ที่พี่นึกออกจะมี
            $table->string('note', 400);
          /*
            applied(สมัครทุนแล้ว),approved(อนุมัติสมัครทุน)
            signed_agreement(ทำสัญญารับทุน), approved_agreement(อนุมัติสัญญารับทุน),rejected_agreement(ไม่อนุมัติสัญญารับทุน)
            first_payment(เบิกเงินงวดที่ 1), approved_first_payment(อนุมัติเบิกเงินงวดที่ 1),rejected_first_payment(ไม่อนุมัติเบิกเงินงวดที่ 1)
            second_payment(เบิกเงินงวดที่ 2 อันนี้จะรวมกับรายงานความก้าวหน้าครั้งที่ 1), approved_first_payment(อนุมัติเบิกเงินงวดที่ 2), rejected_first_payment(ไม่อนุมัติเบิกเงินงวดที่ 2)
            2ndprogressreport(รายงานความก้าวหน้าครั้งที่ 2), approved_2ndprogressreport(อนุมัติรายงานความก้าวหน้าครั้งที่ 2), rejected_2ndprogressreport(ไม่อนุมัติรายงานความก้าวหน้าครั้งที่ 2)
            request_extend(ขอขยายเวลา), approved_extend(อนุมัติขอขยายเวลา), rejected_extend(ไม่อนุมัติขอขยายเวลา)
            finalized(ส่งผลงานครั้งสุดท้าบ), approved_finalized(อนุมัติส่งผลงานครั้งสุดท้าบ), rejected_finalized(ไม่อนุมัติส่งผลงานครั้งสุดท้าบ)
            finalized(ส่งผลงานครั้งสุดท้าบ), approved_finalized(อนุมัติส่งผลงานครั้งสุดท้าบ), rejected_finalized(ไม่อนุมัติส่งผลงานครั้งสุดท้าบ)
            project_finished(ปิดโครงการ)
          */
          $table->integer('owner')->unsigned(); //id ของคนที่สมัครขอทุนอ้างอิงจากตาราง users ฮับ
          $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
          $table->rememberToken();
          $table->timestamps();//ตรงนี้มันจะสร้าง create_at เป็น datetime จะเปลี่ยนทุกครั้งที่มีการอัพเดท record ฮับ
      });
      Schema::create('translate_doc', function (Blueprint $table) {
          $table->bigIncrements('id');// id ของไฟล์ที่ให้ดาวน์โหลด
          $table->string('file_path',200);// เอาไว้เก็บ path ของไฟล์นั้นๆ อิงจากชื่อไฟล์เดิมนะครับ
          $table->string('type',10);// admin, user
          $table->string('status',20);
          $table->bigInteger('translate_id')->unsigned();// เอาไว้อ้างอิงว่าเป็นไฟล์ของทุนไหนจากตาราง funds คับ
          $table->foreign('translate_id')->references('id')->on('translates')->onDelete('cascade');
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
