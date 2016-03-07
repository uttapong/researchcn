@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="font-red sbold">ทุนปัจจุบันทั้งหมด</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php if (count($funds) == 0) {
                        print('<div class="text-center">ปัจจุบันไม่มีทุนที่สามารถสมัครได้</div>');
                    }
                    else {?>
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <tbody>
                                    <?php foreach($funds as $fund) { ?>
                                    <tr>
                                        <td align="left">
                                            <?php print ($fund->name) ?>
                                        </td>
                                        <td align="right">
                                            <button type="button" data-id="<?php print ($fund->id) ?>" class="btn btn-info" data-singleton="true" data-toggle="confirmation" data-placement="top" data-btn-ok-label="ตกลง" data-btn-cancel-label="ยกเลิก" data-original-title="ยืนยันการสมัคร <?php print($fund->name) ?>" {{ $fund->registered ? 'disabled' : null }}>
                                                {{ $fund->registered ? 'สมัครแล้ว' : 'สมัครทุน' }}
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
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function () {
        // Add class selected navigator
        $('#main_fund, #sub1_fund').addClass("active open");
        $('#main_fund a, #sub1_fund a').append("<span class='selected'></span>");

        // Event on click confirm box
        $('[data-toggle="confirmation"]').on("confirmed.bs.confirmation", function () {
            window.location = "{{route('base_rswk')}}/register_fund/" + $(this).attr("data-id");
        })
    });
</script>
@endsection
