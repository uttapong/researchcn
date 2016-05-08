@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="sbold font-red">{{ trans('fund.applicator_search_user_request') }}</span>
                    </div>
                </div>
                <div class="portlet-body" style="padding-top: 0">
                    @if (count($applications) == 0)
                        <div class="page-header navbar">
                            <form class="search-form search-form-expanded" action="fund_search_user_request" method="GET" style="margin: 0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..." name="query">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                        </div>
                        @if ($query)
                            <div class="text-center">{{ trans('fund.applicator_search_user_request-noresult') }}</div>
                        @else
                            <div class="text-center">{{ trans('fund.applicator_user_requesst-not_have') }}</div>
                        @endif
                    @else
                        <div class="page-header navbar">
                            <form class="search-form search-form-expanded" action="fund_search_user_request" method="GET" style="margin: 0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..." name="query">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <table class="table table-striped table-hover order-column" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%"> # </th>
                                    <th width="20%"> {{ trans('fund.applicator_user_requesst-table.fund_name') }} </th>
                                    <th width="15%"> {{ trans('fund.applicator_user_requesst-table.title') }} </th>
                                    <th width="20%"> {{ trans('fund.applicator_user_requesst-table.status') }} </th>
                                    <th> {{ trans('fund.applicator_user_requesst-table.document') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $index=>$application)
                                    <tr>
                                        <td align="left">
                                            {{ $index + 1 }}
                                        </td>
                                        <td align="left" style="vertical-align: top">
                                            {{ $application->fundName }}
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
                    @endif
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function () {
        // Add class selected navigator
        $('#main_fund, #sub6_fund').addClass("active open");
        $('#main_fund a, #sub6_fund a').append("<span class='selected'></span>");

        // Initial data table
        $('#dataTable').DataTable({
            language: {
                emptyTable: "No data available in table",
                zeroRecords: "No matching records found",
            },
            bPaginate: false,
            bFilter: false,
            bInfo: false,
            bStateSave: !0,
            pagingType: "bootstrap_extended",
            lengthMenu: [
                [10, 15, 20, -1],
                [10, 15, 20, "All"]
            ],
            columnDefs: [
                {
                    orderable: !1,
                    targets: [4]
                },
                {
                    searchable: !1,
                    targets: [4]
                }
            ]
        });
    });
</script>
@endsection
