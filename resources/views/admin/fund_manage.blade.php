@extends('layouts.app')

@section('content')
<?php
    function DateThai ($strDate)
    {
        $strYear = date("Y",strtotime($strDate)) + 543;
        $strMonth = date("n",strtotime($strDate));
        $strDay = date("j",strtotime($strDate));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
?>

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-red sbold uppercase">จัดการทุนทั้งหมด</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php if (count($funds) == 0) {
                        print('<div class="text-center">คลิกปุ่ม "เพิ่มทุนใหม่" เพื่อสร้างทุน</div>');
                    }
                    else {?>
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-condensed table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th width="25%"> ชื่อทุน </th>
                                        <th width="25%"> วันที่เปิดรับสมัคร </th>
                                        <th width="25%"> วันสิ้นสุดรับสมัคร </th>
                                        <th width="25%"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($funds as $fund) { ?>
                                        <tr>
                                            <td align="left">
                                                <?php print ($fund->name) ?>
                                            </td>
                                            <td align="left">
                                                <?php print (DateThai($fund->apply_start)) ?>
                                            </td>
                                            <td align="left">
                                                <?php print (DateThai($fund->apply_end)) ?>
                                            </td>
                                            <td align="right">
                                                <a href="fund_form?id={{ $fund->id }}" class="btn btn-info">
                                                    <i class="fa fa-edit"></i>&nbsp;แก้ไข
                                                </a>
                                                <button type="button" data-id="<?php print ($fund->id) ?>" class="btn btn-danger" data-singleton="true" data-toggle="confirmation" data-placement="right" data-btn-ok-label="ตกลง" data-btn-cancel-label="ยกเลิก" data-original-title="ยืนยันการลบ <?php print($fund->name) ?>">
                                                    <i class="fa fa-trash-o"></i>&nbsp;ลบ
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="actions">
                <a href="fund_form" class="btn btn-circle btn-outline red margin-bottom-20">
                    <i class="fa fa-plus"></i>&nbsp;
                    <span class="hidden-sm hidden-xs">เพิ่มทุนใหม่&nbsp;</span>&nbsp;
                </a>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function () {
        // Add class selected navigator
        $('.nav-item:eq(4), .nav-item:eq(5)').addClass("active open");
        $('.nav-item a:eq(4), .nav-item a:eq(5)').append("<span class='selected'></span>");

        // Event on click confirm box
        $('[data-toggle="confirmation"]').on("confirmed.bs.confirmation", function () {
            window.location = "fund_delete/" + $(this).attr("data-id");
        });
    });
</script>
@endsection
