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
                                        <span data-counter="counterup" data-value="1349">6</span>
                                    </div>
                                    <div class="desc"> ผู้ใช้งานทั้งหมด </div>
                                </div>
                                <a class="more" href="javascript:;"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat red">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="12,5">8</div>
                                    <div class="desc"> งานวิจัยทั้งหมด </div>
                                </div>
                                <a class="more" href="{{route('base_rscn')}}"> View more
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
                                        <span data-counter="counterup" data-value="549">3</span>
                                    </div>
                                    <div class="desc"> สิ่งประดิษฐ์และรางวัล </div>
                                </div>
                                <a class="more" href="javascript:;"> View more
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
                                    <div class="number"> +
                                        <span data-counter="counterup" data-value="89">89</span>% </div>
                                    <div class="desc"> Brand Popularity </div>
                                </div>
                                <a class="more" href="javascript:;"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Site Visits</span>
                                        <span class="caption-helper">weekly stats...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn red btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">New</label>
                                            <label class="btn red btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Returning</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="site_statistics_loading" style="display: none;">
                                        <img src="../assets/global/img/loading.gif" alt="loading"> </div>
                                    <div id="site_statistics_content" class="display-none" style="display: block;">
                                        <div id="site_statistics" class="chart" style="padding: 0px; position: relative;"> <canvas class="flot-base" width="936" height="600" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 468px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 10px; text-align: center;">02/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 62px; text-align: center;">03/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 114px; text-align: center;">04/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 166px; text-align: center;">05/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 218px; text-align: center;">06/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 270px; text-align: center;">07/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 322px; text-align: center;">08/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 374px; text-align: center;">09/2013</div><div style="position: absolute; max-width: 52px; top: 285px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 426px; text-align: center;">10/2013</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 273px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 20px; text-align: right;">0</div><div style="position: absolute; top: 220px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1000</div><div style="position: absolute; top: 166px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">2000</div><div style="position: absolute; top: 113px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">3000</div><div style="position: absolute; top: 59px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">4000</div><div style="position: absolute; top: 6px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">5000</div></div></div><canvas class="flot-overlay" width="936" height="600" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 468px; height: 300px;"></canvas></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-red-sunglo bold uppercase">Revenue</span>
                                        <span class="caption-helper">monthly stats...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                                                <span class="fa fa-angle-down"> </span>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Q1 2014
                                                        <span class="label label-sm label-default"> past </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Q2 2014
                                                        <span class="label label-sm label-default"> past </span>
                                                    </a>
                                                </li>
                                                <li class="active">
                                                    <a href="javascript:;"> Q3 2014
                                                        <span class="label label-sm label-success"> current </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Q4 2014
                                                        <span class="label label-sm label-warning"> upcoming </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="site_activities_loading" style="display: none;">
                                        <img src="../assets/global/img/loading.gif" alt="loading"> </div>
                                    <div id="site_activities_content" class="display-none" style="display: block;">
                                        <div id="site_activities" style="height: 228px; padding: 0px; position: relative;"> <canvas class="flot-base" width="936" height="456" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 468px; height: 228px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 46px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 21px; text-align: center;">DEC</div><div style="position: absolute; max-width: 46px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 69px; text-align: center;">JAN</div><div style="position: absolute; max-width: 46px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 116px; text-align: center;">FEB</div><div style="position: absolute; max-width: 46px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 161px; text-align: center;">MAR</div><div style="position: absolute; max-width: 46px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 210px; text-align: center;">APR</div><div style="position: absolute; max-width: 46px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 256px; text-align: center;">MAY</div><div style="position: absolute; max-width: 46px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 305px; text-align: center;">JUN</div><div style="position: absolute; max-width: 46px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 353px; text-align: center;">JUL</div><div style="position: absolute; max-width: 46px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 397px; text-align: center;">AUG</div><div style="position: absolute; max-width: 46px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 447px; text-align: center;">SEP</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 197px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 20px; text-align: right;">0</div><div style="position: absolute; top: 149px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 7px; text-align: right;">500</div><div style="position: absolute; top: 100px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1000</div><div style="position: absolute; top: 52px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1500</div><div style="position: absolute; top: 3px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">2000</div></div></div><canvas class="flot-overlay" width="936" height="456" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 468px; height: 228px;"></canvas></div>
                                    </div>
                                    <div style="margin: 20px 0 10px 30px">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-success"> Revenue: </span>
                                                <h3>$13,234</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-info"> Tax: </span>
                                                <h3>$134,900</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-danger"> Shipment: </span>
                                                <h3>$1,134</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-warning"> Orders: </span>
                                                <h3>235090</h3>
                                            </div>
                                        </div>
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
    });
</script>
@endsection
