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
                                    <th width="15%"> {{ trans('fund.applicator_user_requesst-table.apply_date') }} </th>
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
                                            {{ date('d F Y', strtotime($application->created_at)) }}
                                        </td>
                                        <td align="left" style="vertical-align: top">
                                            {{ $application->step }}
                                        </td>
                                        <td align="left">
                                            <a class='btn btn-xs btn-info'>All Files</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                         {!! $applications->links() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function () {
        // Add class selected navigator
        // $('#main_fund, #sub6_fund').addClass("active open");
        // $('#main_fund a, #sub6_fund a').append("<span class='selected'></span>");

        // // Initial data table
        // $('#dataTable').DataTable({
        //     "ajax": {{"data/objects.txt"}},
        //     language: {
        //         emptyTable: "No data available in table",
        //         zeroRecords: "No matching records found",
        //     },
        //     bPaginate: false,
        //     bFilter: false,
        //     bInfo: false,
        //     bStateSave: !0,
        //     pagingType: "bootstrap_extended",
        //     lengthMenu: [
        //         [10, 15, 20, -1],
        //         [10, 15, 20, "All"]
        //     ],
        //     columnDefs: [
        //         {
        //             orderable: !1,
        //             targets: [4]
        //         },
        //         {
        //             searchable: !1,
        //             targets: [4]
        //         }
        //     ]
        });
    });
</script>
@endsection
