@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <a href="{{ route('fund_user_request_choose') }}" class="font-red">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sbold">{{ $fundName }}</span>
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    @if (count($applications) == 0)
                        print('<div class="text-center">ยังไม่มีการร้องขอจากผู้ขอทุน</div>');
                    @else
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-condensed table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th width="25%"> ชื่อผู้สมัคร </th>
                                        <th width="25%"> ขั้นตอน </th>
                                        <th> เอกสาร </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applications as $application)
                                        <tr>
                                            <td align="left" style="vertical-align: top">
                                                {{ $application->userName }}
                                            </td>
                                            <td align="left" style="vertical-align: top">
                                                {{ $application->step }}
                                            </td>
                                            <td align="left">
                                                <?php
                                                    $documents = $application->documents;
                                                    if ($documents) {
                                                        for ($i=0; $i < count($documents); $i++) {
                                                            print('<p style="margin-bottom: 25px"><a href="'.route('base').'/' . $application->documents[$i]['file_path'] . '" download  title="ดาวน์โหลดเอกสาร">' . $application->documents[$i]['file_name']);
                                                            print('&nbsp;<span aria-hidden="true" class="icon-arrow-down"></span></a>');

                                                            if ($application->documents[$i]['file_status'] == 'uploaded') {
                                                                print('<span class="pull-right">');
                                                                print('<a href="file_upload_update/' . $application->documents[$i]['upload_id'] . '/Approve" class="btn btn-success">Approve</a>');
                                                                print('&nbsp;<a href="file_upload_update/' . $application->documents[$i]['upload_id'] . '/Reject" class="btn btn-danger">Reject</a>');
                                                                print('</span>');
                                                                print('</p>');
                                                            }
                                                            else {
                                                                print('<span class="pull-right">');
                                                                print('<b>' . $application->documents[$i]['file_status'] . '</b>');
                                                                if ($application->documents[$i]['file_status'] == 'Approve') 
                                                                    print(' <span class="icon-check font-green-sharp" style="margin-right: 7px">');
                                                                else print(' <span class="icon-close font-red" style="margin-right: 7px">');
                                                                print('</span>');
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
                                                            print('<b>' . $application->appStatus . '</b>');
                                                            if ($application->appStatus == 'Approve') 
                                                                print(' <span class="icon-check font-green-sharp" style="margin-right: 7px">');
                                                            else print(' <span class="icon-close font-red" style="margin-right: 7px">');
                                                            print('</span>');
                                                            print('</span>');
                                                        }
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function () {
        // Add class selected navigator
        $('.nav-item:eq(4), .nav-item:eq(6)').addClass("active open");
        $('.nav-item a:eq(4), .nav-item a:eq(6)').append("<span class='selected'></span>");
    });
</script>
@endsection
