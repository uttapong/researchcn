<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


      Schema::create('applications', function (Blueprint $table) {
          $table->bigIncrements('id');//id ของการสมัครขอทุน ตรงนี้จะสร้างตอนที่เค้ากดปุ่มสมัครขอทุน ก่อนที่จะวิ่งไปให้ admin อนุมัติครับ
          $table->bigInteger('fund')->unsigned();
          $table->foreign('fund')->references('id')->on('funds')->onDelete('cascade');
          $table->string('status',20);//สถานะของการสมัครขอทุนว่าถึงไหนแล้วครับ ที่พี่นึกออกจะมี
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
