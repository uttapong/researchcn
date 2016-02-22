@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-red sbold uppercase">ทุนที่ท่านเสนอขอ</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" class="toggle" id="option1">สถานะ</label>
                            </label>
                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option1">ขั้นตอน</label>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php if (count($funds) == 0) {
                        print('<div class="text-center">ไม่มีทุนที่ท่านสเนอขอ</div>');
                    }
                    else {?>
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th> </th>
                                        <th> ชื่อทุน </th>
                                        <th> ขั้นตอน </th>
                                        <th> สถานะ </th>
                                        <th> ดำเนินการขั้นต่อไป </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($funds as $index=>$fund) { ?>
                                        <tr>
                                            <td>
                                                <?php print($index + 1) ?>
                                            </td>
                                            <td>
                                                <?php print($fund->name) ?>
                                            </td>
                                            <td>
                                                สมัครขอทุน
                                            </td>
                                            <td>
                                                <span class="label label-sm label-success"> Approved </span>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    ทำสัญญารับทุน
                                                    <span aria-hidden="true" class="icon-arrow-right"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <!-- <span class="label label-sm label-success"> Approved </span>
                                    <span class="label label-sm label-info"> Pending </span>
                                    <span class="label label-sm label-warning"> Suspended </span>
                                    <span class="label label-sm label-danger"> Blocked </span> -->
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        // Add class selected navigator
        $('.nav-item:eq(0), .nav-item:eq(3)').addClass("active open");
        $('.nav-item a:eq(0), .nav-item a:eq(3)').append("<span class='selected'></span>");
    });
</script>
@endsection
