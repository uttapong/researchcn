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
        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="font-red sbold">{{ trans('fund.manage_funds-title') }}</span>
                    </div>
                </div>
                <div class="portlet-body">
                    @if (count($funds) == 0)
                        <div class="text-center">{{ trans('fund.manage_funds-not_have') }}</div>
                    @else
                        <table class="table table-striped table-hover order-column" id="dataTable">
                            <thead>
                                <tr class="uppercase">
                                    <th width="5%"> # </th>
                                    <th width="20%"> ชื่อทุน </th>
                                    <th width="20%"> ประเภททุน </th>
                                    <th width="20%"> วันที่เปิดรับสมัคร </th>
                                    <th width="20%"> วันสิ้นสุดรับสมัคร </th>
                                    <th width="15%"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($funds as $index=>$fund)
                                    <tr>
                                        <td align="center">
                                            <?php print ($index + 1) ?>
                                        </td>
                                        <td>
                                            <?php print ($fund->name) ?>
                                        </td>
                                        <td>
                                            <?php print ($fund->type) ?>
                                        </td>
                                        <td>
                                            <?php print (DateThai($fund->apply_start)) ?>
                                        </td>
                                        <td>
                                            <?php print (DateThai($fund->apply_end)) ?>
                                        </td>
                                        <td align="right">
                                            <a href="fund_form?id={{ $fund->id }}" class="btn btn-info">
                                                <i class="fa fa-edit"></i>&nbsp;แก้ไข
                                            </a>
                                            <button type="button" data-id="<?php print ($fund->id) ?>" class="btn btn-danger" data-singleton="true" data-toggle="confirmation" data-placement="top" data-btn-ok-label="ตกลง" data-btn-cancel-label="ยกเลิก" data-original-title="ยืนยันการลบ <?php print($fund->name) ?>">
                                                <i class="fa fa-trash-o"></i>&nbsp;ลบ
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <div class="actions">
                <a href="{{route('fund_form')}}" class="btn btn-circle btn-outline red margin-bottom-20">
                    <i class="fa fa-plus"></i>&nbsp;
                    <span class="hidden-sm hidden-xs">{{ trans('fund.manage_funds-new_fund_btn') }}&nbsp;</span>&nbsp;
                </a>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function () {
        // Add class selected navigator
        $('#main_fund, #sub4_fund').addClass("active open");
        $('#main_fund a, #sub4_fund a').append("<span class='selected'></span>");

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
                    targets: [5]
                },
                {
                    searchable: !1,
                    targets: [5]
                }
            ],
            order: [
                [0, "asc"]
            ]
        });

        // Event on click confirm box
        $('[data-toggle="confirmation"]').on("confirmed.bs.confirmation", function () {
            window.location = "fund_delete/" + $(this).attr("data-id");
        });
    });
</script>
@endsection
