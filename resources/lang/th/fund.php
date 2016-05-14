<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'current_funds-title' => 'ทุนวิจัยปัจจุบันทั้งหมด',
    'current_funds-not_have' => 'ปัจจุบันไม่มีทุนที่สามารถสมัครได้',
    'current_funds-doc_download' => 'เอกสารสำหรับดาวน์โหลด',
    'current_funds-apply_btn' => 'สมัครทุน',
    'current_funds-applied_btn' => 'สมัครแล้ว',
    'current_funds-confirm_apply' => 'ยืนยันการสมัคร',
    'recent_funds-not_have' => 'ยังไม่ได้สมัครทุน',

    'recent_funds-title' => 'ทุนวิจัยที่ผ่านมา',
    'recent_funds-not_have' => 'ไม่มีทุนที่ผ่านมา',

    'form_user_request-state_fund' => 'ขั้นตอนทุน',
    'form_user_request-documentation' => 'เอกสารประกอบ',
    'form_user_request-fail' => 'ไม่ผ่าน',
    'form_user_request-old_file' => 'ไฟล์เก่าที่ไม่ผ่านการอนุมัติ',
    'form_user_request-error-message' => 'กรุณาใส่เอกสารให้ครบทุกช่อง',
    'form_user_request-success-message' => 'ส่งเอกสารสำเร็จ',
    'form_user_request-submit_btn' => 'ตกลง',

    'applied_funds-title' => 'ทุนวิจัยที่ได้สมัครไว้',
    'applied_funds-not_have' => 'ไม่มีทุนที่ได้สมัครไว้',
    'applied_funds-table' => array(
        'title' => 'ชื่อทุน',
        'step' => 'ขั้นตอน',
        'status' => 'สถานะ',
        'next_step' => 'ดำเนินการขั้นต่อไป'
    ),

    'manage_funds-title' => 'จัดการข้อมูลทุนวิจัย',
    'manage_funds-not_have' => 'คลิกปุ่ม "เพิ่มทุนใหม่" เพื่อสร้างทุน',
    'manage_funds-edit_btn' => 'แก้ไช',
    'manage_funds-delete_btn' => 'ลบ',
    'manage_funds-new_fund_btn' => 'เพิ่มทุนใหม่',
    'manage_funds-confirm_delete' => 'ยืนยันการลบ',
    'manage_funds-table' => array(
        'title' => 'ชื่อทุน',
        'type' => 'ประเภททุน',
        'start_Apply' => 'วันที่เปิดรับสมัคร',
        'end_apply' => 'วันสิ้นสุดรับสมัคร'
    ),
    'manage_funds-month_format' => Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."),
    'manage_funds-year_format' => '543',

    'add_funds-title-add' => 'เพิ่มทุนใหม่',
    'add_funds-title-edit' => 'แก้ไขทุน',
    'add_funds-sub_title1' => 'รายละเอียดทุน',
    'add_funds-sub_title2' => 'ระยะเวลาทุน',
    'add_funds-form1-1' => 'ชื่อทุน',
    'add_funds-form1-2' => 'ประเภททุน',
    'add_funds-form1-3' => 'รายละเอียดทุน',
    'add_funds-form1-4' => 'เอกสารสำหรับดาวน์โหลด',
    'add_funds-select' => 'กรุณาเลือก',
    'add_funds-form2-1' => 'วันที่เปิดรับสมัคร',
    'add_funds-form2-2' => 'วันสิ้นสุดรับสมัคร',
    'add_funds-form2-3' => 'วันเริ่มต้นส่งเอกสาร',
    'add_funds-form2-4' => 'วันสิ้นสุดส่งเอกสาร',
    'add_funds-form2-5' => 'วันสิ้นสุดโครงการ',
    'add_funds-error-message' => 'กรุณาใส่ข้อมูลให้ครบทุกช่อง',
    'add_funds-success-message-add' => 'เพิ่มทุนใหม่สำเร็จ',
    'add_funds-success-message-edit' => 'แก้ไขทุนสำเร็จ',
    'add_funds-upload_note' => 'ต้องทำรายการเพิ่มทุนให้เรียบร้อยก่อน จึงจะสามารถใช้งานอัพโหลดเอกสารได้',
    'add_funds-upload_btn' => 'อัพโหลดเอกสารเพิ่ม',
    'add_funds-submit_btn' => 'ตกลง',

    'add_funds_file_uplaod-title' => 'อัพโหลดเอกสาร',
    'add_funds_file_uplaod-back_btn' => 'กลับหน้ารายละเอียดทุน',

    'applicator_list-title' => 'เลือกทุน',
    'applicator_list-not_have' => 'ยังไม่มีทุนใดใด',

    'applicator_user_requesst-not_have' => 'ยังไม่มีการสมัครทุน',
    'applicator_user_requesst-table' => array(
        'fund_name' => 'ทุนที่สมัคร',
        'title' => 'ชื่อผู้สมัคร',
        'step' => 'ขั้นตอน',
        'status' => 'สถานะ',
        'document' => 'เอกสาร',
        'apply_date' => 'วันที่สมัคร',
    ),

    'applicator_search_user_request' => 'สถานะผู้สมัครทุนทั้งหมด',
    'applicator_search_user_request-noresult' => 'ไม่พบผลลัพธ์จากคําค้นหา',

    'Pending'=>'รออนุมัติ',
    'Approve'=>'อนุมัติแล้ว',
    'เสร็จสิ้น'=>'ปิดโครงการ',
    'fund_report'=>'รายงานทุนทั้งหมด'
];
