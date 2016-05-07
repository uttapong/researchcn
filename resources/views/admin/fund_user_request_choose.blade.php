@extends('layouts.app')

@section('content')
<style>
    .label-as-badge {
    border-radius: 1em !important;
}
</style>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="font-red sbold">{{ trans('fund.applicator_list-title') }}</span>
                    </div>
                </div>
                <div class="portlet-body">
                    @if (count($funds) == 0)
                        <div class="text-center">{{ trans('fund.applicator_list-not_have') }}</div>
                    @else
                        <div class="clearfix">
                            <div class="col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                                @foreach ($funds as $fund)
                                    <a href="{{ route('fund_user_request', array('id' => $fund->id)) }}" class="btn default green-haze-stripe btn-block sbold" style="font-size: 1.2em; white-space: normal; border-width: 2px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ $fund->name }}
                                        @if($fund->countAdminActive()>0)
                                        <span class="label label-danger label-as-badge"> &nbsp;{{$fund->countAdminActive()}}&nbsp; </span>
                                        @else
                                        <span class="label label-default label-as-badge">&nbsp;0&nbsp;</span>
                                        @endif
                                    </a>

                                @endforeach
                            </div>
                        </div>
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
    });
</script>
@endsection
