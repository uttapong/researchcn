@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="font-red sbold">{{ trans('fund.recent_funds-title') }}</span>
                    </div>
                </div>
                <div class="portlet-body">
                    @if(count($funds) == 0)
                        <div class="text-center">{{ trans('fund.recent_funds-not_have') }}</div>
                    @else
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <tbody>
                                    @foreach($funds as $fund)
                                        <tr>
                                            <td align="left">
                                                {{ $fund->name }}
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
        $('#main_fund, #sub2_fund').addClass("active open");
        $('#main_fund a, #sub2_fund a').append("<span class='selected'></span>");
    });
</script>
@endsection
