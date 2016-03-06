<?php

use Illuminate\Database\Seeder;
use App\Filetype;
use App\Role;
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

        Role::create(['name' => 'admin_research_work','display_name'=>'Administrator Research Work','description'=>'User is allowed to manage and edit other users']);
        Role::create(['name' => 'admin_research_center','display_name'=>'Administrator Research Center','description'=>'User is allowed to manage and edit other users']);
        Role::create(['name' => 'reader','display_name'=>'Normal User','description'=>'Normal user can access both Research Work Site and Reseach Center Site']);
        

    }
}
