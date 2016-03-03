@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-red sbold uppercase">คำร้องขอทุนทั้งหมด</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php if (count($applications) == 0) {
                        print('<div class="text-center">ยังไม่มีการร้องขอจากผู้ขอทุน</div>');
                    }
                    else {?>
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-condensed table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th> ชื่อผู้สมัคร </th>
                                        <th> ชื่อทุน </th>
                                        <th> ขั้นตอน </th>
                                        <th> เอกสาร </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($applications as $application) { ?>
                                        <tr>
                                            <td align="left" style="vertical-align: top">
                                                {{ $application->userName }}
                                            </td>
                                            <td align="left" style="vertical-align: top">
                                                {{ $application->fundName }}
                                            </td>
                                            <td align="left" style="vertical-align: top">
                                                {{ $application->step }}
                                            </td>
                                            <td align="left">
                                                <?php
                                                    $documents = $application->documents;
                                                    if ($documents) {
                                                        for ($i=0; $i < count($documents); $i++) {
                                                            print('<p style="margin-bottom: 25px">' . $application->documents[$i]['file_name']);
                                                            print('&nbsp;<a href="'.route('base').'/' . $application->documents[$i]['file_path'] . '"><span aria-hidden="true" class="icon-arrow-down"></span></a>');

                                                            if ($application->documents[$i]['file_status'] == 'uploaded') {
                                                                print('<span class="pull-right">');
                                                                print('<a href="file_upload_update/' . $application->documents[$i]['upload_id'] . '/Approve" class="btn btn-success">Approve</a>');
                                                                print('&nbsp;<a href="file_upload_update/' . $application->documents[$i]['upload_id'] . '/Reject" class="btn btn-danger">Reject</a>');
                                                                print('</span>');
                                                                print('</p>');
                                                            }
                                                            else {
                                                                print('<span class="pull-right">');
                                                                print('<b style="margin-right: 7px">' . $application->documents[$i]['file_status'] . '</b>');
                                                                print('</span>');
                                                            }
                                                        }
                                                    }
                                                    else {
                                                        if ($application->appStatus == 'Pending') {
                                                            print('<span class="pull-right">');
                                                            print('<a href="application_update/' . $application->id . '/' . $application->approve . '" class="btn btn-success">Approve</a>');
                                                            print('&nbsp;<a href="application_update/' . $application->id . '/' . $application->reject . '" class="btn btn-danger">Reject</a>');
                                                            print('</span>');
                                                        }
                                                        else {
                                                            print('<span class="pull-right">');
                                                            print('<b style="margin-right: 7px">' . $application->appStatus . '</b>');
                                                            print('</span>');
                                                        }
                                                    }
                                                ?>
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
        $('.nav-item:eq(4), .nav-item:eq(6)').addClass("active open");
        $('.nav-item a:eq(4), .nav-item a:eq(6)').append("<span class='selected'></span>");

        // Event on click confirm box
        // $('[data-toggle="confirmation"]').on("confirmed.bs.confirmation", function () {
        //     window.location = "application_update/" + $(this).attr("data-id") + '/' + $(this).attr("data-reject");
        // })
    });
</script>
@endsection
