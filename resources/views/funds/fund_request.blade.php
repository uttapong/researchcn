@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="font-red sbold">ทุนที่ท่านเสนอขอ</span>
                    </div>
                    <!-- <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" class="toggle" id="option1">สถานะ</label>
                            </label>
                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option1">ขั้นตอน</label>
                            </label>
                        </div>
                    </div> -->
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
                                                {{ $index + 1 }}
                                            </td>
                                            <td>
                                                {{ $fund->name }}
                                            </td>
                                            <td>
                                                {{ $fund->currentStep }}
                                            </td>
                                            <td>
                                                <span class="label label-sm label-{{ $fund->statusClass }}"> {{ $fund->statusTitle }} </span>
                                            </td>
                                            <td>
                                                {!!
                                                    $fund->nextStep
                                                        ? '<a href="' . $fund->linkNextStep . '?request_id=' . $fund->id . '">' . $fund->nextStep . ' ' .
                                                            '<span aria-hidden="true" class="icon-arrow-right"></span></a>'
                                                        : null,
                                                    $fund->status == 'approved_second_progress_report'
                                                        ? '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="' . $requestExtend['link'] . '?request_id=' . $fund->id . '">' . $requestExtend['step'] . ' ' .
                                                            '<span aria-hidden="true" class="icon-arrow-right"></span></a>'
                                                        : null
                                                !!}
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
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
