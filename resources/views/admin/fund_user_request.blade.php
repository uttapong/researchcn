@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit">
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
                        <div class="text-center">{{ trans('fund.applicator_user_requesst-not_have') }}</div>
                    @else
                        <table class="table table-striped table-hover order-column" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%"> # </th>
                                    <th width="15%"> {{ trans('fund.applicator_user_requesst-table.title') }} </th>
                                    <th width="25%"> {{ trans('fund.applicator_user_requesst-table.step') }} </th>
                                    <th width="40%"> {{ trans('fund.applicator_user_requesst-table.document') }} </th>
                                     <th width="7%">Notify Email</th>
                                     <th width="7%">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $index=>$application)
                                    <tr>
                                        <td align="center">
                                            {{ $index + 1 }}
                                        </td>
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
                                                            print('<a href="file_upload_update/' . $application->documents[$i]['upload_id'] . '/Approve" class="btn btn-xs btn-success">Approve</a>');
                                                            print('&nbsp;<a href="file_upload_update/' . $application->documents[$i]['upload_id'] . '/Reject" class="btn btn-xs btn-danger">Reject</a>');
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
                                                        print('<a href="application_update/' . $application->id . '/' . $application->approve . '" class="btn btn-xs btn-success">Approve</a>');
                                                        print('&nbsp;<a href="application_update/' . $application->id . '/' . $application->reject . '" class="btn btn-xs btn-danger">Reject</a>');
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
                                        <td><button onclick="confirmSendMail({{$application->id}})" class='btn btn-info btn-xs'><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button></td>
                                        <td><button onclick="confirmDelete({{$application->id}})" class='btn btn-danger btn-xs'><i class="fa fa-times" aria-hidden="true"></i> Delete</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function () {
        // Add class selected navigator
        $('#main_fund, #sub5_fund').addClass("active open");
        $('#main_fund a, #sub5_fund a').append("<span class='selected'></span>");

        // Initial data table
        $('#dataTable').DataTable({
            language: {
                aria: {
                    sortAscending: ": activate to sort column ascending",
                    sortDescending: ": activate to sort column descending"
                },
                emptyTable: "No data available in table",
                info: "Showing _START_ to _END_ of _TOTAL_ records",
                infoEmpty: "No records found",
                infoFiltered: "(filtered1 from _MAX_ total records)",
                lengthMenu: "Show _MENU_",
                search: "Search:",
                zeroRecords: "No matching records found",
                paginate: {
                    previous: "Prev",
                    next: "Next",
                    last: "Last",
                    first: "First"
                }
            },
            bStateSave: !0,
            pagingType: "bootstrap_extended",
            lengthMenu: [
                [10, 15, 20, -1],
                [10, 15, 20, "All"]
            ],
            columnDefs: [
                {
                    orderable: !1,
                    targets: [3]
                }
            ],
            order: [
                [0, "asc"]
            ]
        });
    });

    function confirmSendMail(appid){
      var result=false;
      swal({   title: "Send notification email?",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sure",
            closeOnConfirm: true },
            function(confirm){ 

                $.ajax({
            url: "{{ route('manualnotify') }}",
            data: { appid : appid }
        })
        .done(function(msg) {
            if(msg=="success")swal("Success","Email sent successfully.","success");
            else swal("Error", "Email sending error", "error");
        });

      });
    }

    function confirmDelete(appid){
      var result=false;
      swal({   title: "Are you sure you want to delete application?",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sure",
            closeOnConfirm: true },
            function(confirm){ 
if(confirm){
                $.ajax({
            url: "{{ route('base_rswk') }}/deleteapp/"+appid,
        })
        .done(function(msg) {
            if(msg=="1")swal(

                {   title: "Application successfully deleted.",
         type: "success",
            closeOnConfirm: true },
            function(confirm){
                location.reload();
            });
            else swal("Error", "Error deleting application", "error");

            
            

        });
    }

      });
    }
</script>


@endsection
