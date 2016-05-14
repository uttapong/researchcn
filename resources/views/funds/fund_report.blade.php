@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="portlet light portlet-fit">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="font-red sbold">รายงานทุนวิจัยทั้งหมด</span>
                    </div>
                </div>
                <div class="portlet-body">
                    @if (count($funds) == 0)
                        <div class="text-center">{{ trans('fund.current_funds-not_have') }}</div>
                    @else
                        <div class="table">
                            <table class="table table-hover table-light">
                                <tbody>
                                  <tr>
                                      <th align="left">
                                          #
                                      </th>
                                      <th align="left">
                                        ชื่อทุน
                                      </th>
                                      <th align="left">
                                        ประเภท
                                      </th>
                                      <th align="left">
                                        วันที่รับสมัคร
                                      </th>
                                      <th align="left">
                                        จำนวนผู้สมัคร
                                      </th>
                                      <th align="left">
                                        อยู่ระหว่างดำเนินการ
                                      </th>
                                      <th align="left">
                                        ปิดโครงการ
                                      </th>
                                     
                                  </tr>
                                  <?php $count=1; ?>
                                    @foreach($funds as $fund)

                                        <tr>
                                        <td align="center" >
                                                {{ $count++ }}
                                            </td>
                                            <td align="left" >
                                                {{ $fund->name }}
                                            </td>
                                            <td align="left" >
                                                {{ $fund->type }}
                                            </td>
                                            <td align="left" >
                                              {{ date('d F Y', strtotime($fund->apply_start)) }} - {{ date('d F Y', strtotime($fund->apply_end)) }}
                                            </td>
                                            <td align="left">
                                              {{count($fund->applications)}}
                                            </td>
                                            <td align="left">
                                              {{count($fund->applications)-$fund->countFinish()}}
                                            </td>
                                            <td align="left">
                                              {{ $fund->countFinish() }}
                                            </td>
                                        </tr>
                                       
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                             {!! $funds->links() !!}
                        </div>
                    @endif
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
