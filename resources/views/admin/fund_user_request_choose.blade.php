@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-10 col-lg-offset-1">
            <div class="portlet light portlet-fit">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="font-red sbold icon-list">&nbsp;&nbsp;เลือกทุน</span>
                    </div>
                </div>
                <div class="portlet-body">
                    @if (count($funds) == 0)
                        <div class="text-center">ยังไม่มีทุนใดใด</div>
                    @else
                        <div class="clearfix">
                            <div class="col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                                @foreach ($funds as $fund)
                                    <a href="{{ route('fund_user_request', array('id' => $fund->id)) }}" class="btn default green-haze-stripe btn-block sbold" style="font-size: 1.2em; white-space: normal; border-width: 2px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ $fund->name }}
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
