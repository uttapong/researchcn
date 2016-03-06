<?php

use Illuminate\Database\Seeder;
use App\Filetype;
use App\Researchfield;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        Filetype::create(['name' => 'หน้าบุ๊คแบ้งค์สหกรณ์ออมทรัพย์ มหาวิทยาลัยธรรมศาสตร์']);
        Filetype::create(['name' => 'สัญญารับทุน']);
        Filetype::create(['name' => 'บันทึกนำส่งครั้งที่ 1']);
        Filetype::create(['name' => 'สำเนาสัญญา']);
        Filetype::create(['name' => 'บุ๊คแบ๊งค์']);
        Filetype::create(['name' => 'หนังสือรับรองจริยธรรมการวิจัยในคน']);
        Filetype::create(['name' => 'บันทึกนำส่งครั้งที่ 2']);
        Filetype::create(['name' => 'รายงานความก้าวหน้าครั้งที่ 1']);
        Filetype::create(['name' => 'หลักฐานการเบิกจ่ายงวดที่ 1 พร้อมตารางสรุปค่าใช้จ่าย']);
        Filetype::create(['name' => 'บันทึกนำส่งครั้งที่ 3']);
        Filetype::create(['name' => 'รายงานความก้าวหน้าครั้งที่ 2']);
        Filetype::create(['name' => 'บันทึกนำส่งครั้งที่ 4']);
        Filetype::create(['name' => '(ร่าง) รายงานวิจัยฉบับสมบูรณ์ 2 เล่ม']);
        Filetype::create(['name' => 'บันทึกขอขยายเวลา']);
        Filetype::create(['name' => 'รายงานความก้าวหน้าครั้งที่ 3']);
        Filetype::create(['name' => 'รายงานวิจัยบางส่วน']);
        Filetype::create(['name' => 'บันทึกขอปิดโครงการ']);
        Filetype::create(['name' => 'รายงานวิจัยฉบับสมบูรณ์']);
        Filetype::create(['name' => 'Manuscript']);
        Filetype::create(['name' => 'หลักฐานตอบรับการตีพิมพ์']);
        Filetype::create(['name' => 'หลักฐานการเบิกเงินงวดที่ 2 และ 3 พร้อมตารางสรุปค่าใช้จ่าย']);

        Researchfield::create(['name' => 'สาขาเกษตรศาสตร์และชีววิทยา']);
        Researchfield::create(['name' => 'สาขาเคมีนิวเคลียร์']);
        Researchfield::create(['name' => 'สาขาเทคโนโลยีนิวเคลียร์']);
        Researchfield::create(['name' => 'สาขาเทคโนโลยีสารสนเทศและนิเทศศาสตร์']);
        Researchfield::create(['name' => 'สาขารังสีประยุกต์']);
        Researchfield::create(['name' => 'สาขาวิทยาศาสตร์กายภาพและคณิตศาสตร์']);
        Researchfield::create(['name' => 'สาขาวิทยาศาสตร์การแพทย์']);
        Researchfield::create(['name' => 'สาขาวิทยาศาสตร์เคมีและเภสัช']);
        Researchfield::create(['name' => 'สาขาวิศวกรรมศาสตร์และอุตสาหกรรมวิจัย']);
        Researchfield::create(['name' => 'สาขาเศรษฐศาสตร์']);
        Researchfield::create(['name' => 'สาขาอุตสาหกรรมเกษตร']);



    }
}
