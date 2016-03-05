@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="font-red sbold">ทุนที่ผ่านมา</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php if (count($funds) == 0) {
                        print('<div class="text-center">ไม่มีทุนที่ผ่านมา</div>');
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
        $('.nav-item:eq(0), .nav-item:eq(2)').addClass("active open");
        $('.nav-item a:eq(0), .nav-item a:eq(2)').append("<span class='selected'></span>");
    });
</script>
@endsection
