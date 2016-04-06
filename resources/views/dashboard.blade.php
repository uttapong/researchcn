@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="1349">{{$users}}</span>
                                    </div>
                                    <div class="desc"> {{ trans('admin.all_users') }} </div>
                                </div>
                                  @if(Auth::user()&&Auth::user()->is('admin'))
                                <a class="more" href="{{route('user_manage')}}"> {{ trans('admin.view_more') }}
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                                @else
                                <a class="more" href="#">&nbsp;
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                                @endif

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat red">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="12,5">{{$researchs}}</div>
                                    <div class="desc"> {{ trans('admin.all_researchs') }} </div>
                                </div>
                                <a class="more" href="{{route('base_rscn')}}"> {{ trans('admin.view_more') }}
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="549">{{$funds}}</span>
                                    </div>
                                    <div class="desc"> {{ trans('admin.all_funds') }} </div>
                                </div>
                                <a class="more" href="{{route('base_rswk')}}"> {{ trans('admin.view_more') }}
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat purple">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="89"> {{$translations}}</div>
                                    <div class="desc"> {{ trans('admin.all_translations') }} </div>
                                </div>
                                <a class="more" href="{{route('translate_list')}}"> {{ trans('admin.view_more') }}
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">{{ trans('admin.site_visit') }}</span>

                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn red btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">{{ trans('admin.new') }}</label>

                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="site_statistics_loading" style="display: none;">
                                        <img src="{{ asset('img/loading.gif') }}" alt="loading"> </div>
                                    <div id="site_statistics_content" class="display-none" style="display: block;">
                                        <div id="site_statistics" class="chart" style="padding: 0px; position: relative;"> <canvas class="flot-base" width="936" height="600" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 468px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 10px; text-align: center;">02/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 62px; text-align: center;">03/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 114px; text-align: center;">04/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 166px; text-align: center;">05/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 218px; text-align: center;">06/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 270px; text-align: center;">07/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 322px; text-align: center;">08/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 374px; text-align: center;">09/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 426px; text-align: center;">10/2013</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 273px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 20px; text-align: right;">0</div><div style="position: absolute; top: 220px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1000</div><div style="position: absolute; top: 166px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">2000</div><div style="position: absolute; top: 113px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">3000</div><div style="position: absolute; top: 59px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">4000</div><div style="position: absolute; top: 6px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">5000</div></div></div><canvas class="flot-overlay" width="936" height="600" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 468px; height: 300px;"></canvas></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>

                    </div>
<script type="text/javascript">
    $(document).ready(function () {
        // Add class selected navigator
        $('#main_stats').addClass("active open");
        $('#main_stats a').append("<span class='selected'></span>");

        var chart = AmCharts.makeChart("site_statistics",{
  "type": "serial",
  "categoryField": "date",
  "categoryAxis": {
    "gridPosition": "start"
  },
  "graphs": [
    {
      "title": "daily users",
      "valueField": "count"
    }
  ],
  "valueAxes": [
    {
      "title": "Users"
    }
  ],
  "legend": {
    "useGraphSettings": true
  },
  "titles": [
    {
      "size": 15,
      "text": "{{ trans('admin.site_visit') }}"
    }
  ],
  "dataProvider": [
    {
      "date": "19 Mar 2016",
      "count": 2
    },
    {
      "date": "20 Mar 2016",
      "count": 1
    },
    {
      "date": "22 Mar 2016",
      "count": 2
    },
    {
      "date": "22 Mar 2016",
      "count": 3
    },
    {
      "date": "23 Mar 2016",
      "count": 2
    },
    {
      "date": "25 Mar 2016",
      "count": 4
    },
    {
      "date": "26 Mar 2016",
      "count": 1
    },
    {
      "date": "27 Mar 2016",
      "count": 6
    },
    {
      "date": "28 Mar 2016",
      "count": 4
    },
    {
      "date": "29 Mar 2016",
      "count": 1
    },
  ]
});
    });
</script>
@endsection
