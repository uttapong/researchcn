<style>
.thai{
  font-family: 'Kanit', sans-serif !important;
}
a{
  text-decoration: none !important;
}
</style>
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="#">
              <!-- ระบบติดตามทุน -->
                <img src="{{ asset('layouts/layout2/img/logo-default.png') }}" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->

        <div class="page-actions">
            <!-- <a href="fund_form" class="btn btn-circle btn-outline red">
                <i class="fa fa-plus"></i>&nbsp;
                <span class="hidden-sm hidden-xs">เพิ่มทุนใหม่&nbsp;</span>&nbsp;
            </a> -->

            @if(Auth::user()&&Auth::user()->is('admin'))
            <a  href="{{route('rscn_home')}}"><h3 class="thai">{{trans('header.admin_title')}}</h3></a>
            @else
            <a  href="{{route('home')}}"><h3 class="thai">คณะพยาบาลศาสตร์ มหาวิทยาลัยธรรมศาสตร์</h3></a>
            @endif

        </div>
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">

            @if(Auth::user())
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-default"> 7 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                    <span class="bold">12 </span>{{trans('header.pending_notification')}}</h3>
                                <a href="page_user_profile_1.html">{{trans('header.view_all')}}</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">just now</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-success">
                                                    <i class="fa fa-plus"></i>
                                                </span> New user registered. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">3 mins</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-bolt"></i>
                                                </span> Server #12 overloaded. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">10 mins</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-warning">
                                                    <i class="fa fa-bell-o"></i>
                                                </span> Server #2 not responding. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">14 hrs</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-info">
                                                    <i class="fa fa-bullhorn"></i>
                                                </span> Application error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">2 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-bolt"></i>
                                                </span> Database overloaded 68%. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">3 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-bolt"></i>
                                                </span> A user IP blocked. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">4 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-warning">
                                                    <i class="fa fa-bell-o"></i>
                                                </span> Storage Server #4 not responding dfdfdfd. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">5 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-info">
                                                    <i class="fa fa-bullhorn"></i>
                                                </span> System Error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">9 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-bolt"></i>
                                                </span> Storage server failed. </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            {{ trans('header.lang') }}
                              <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>Select Language </h3>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                    <li>
                                        <a href="{{ route('lang.switch', 'th') }}"><span class="subject">
                                              ภาษาไทย
                                            </span></a>
                                            <a href="{{ route('lang.switch', 'en') }}"><span class="subject">
                                                  English
                                                </span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->

                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="{{ Gravatar::src(Auth::user()->email, 100) }}" />
                            <span class="username username-hide-on-mobile">  {{Auth::user()->name}} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{route('user_detail',['userid'=>Auth::user()->id])}}">
                                    <i class="icon-user"></i> {{trans('header.my_profile')}} </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="{{route('logout')}}">
                                    <i class="icon-key"></i> {{trans('header.log_out')}}</a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            @else
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                  <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                          {{ trans('header.lang') }}
                            <i class="fa fa-angle-down"></i>
                      </a>
                      <ul class="dropdown-menu">
                          <li class="external">
                              <h3>Select Language </h3>
                          </li>
                          <li>
                              <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                  <li>
                                      <a href="{{ route('lang.switch', 'th') }}"><span class="subject">
                                            ภาษาไทย
                                          </span></a>
                                          <a href="{{ route('lang.switch', 'en') }}"><span class="subject">
                                                English
                                              </span></a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </li>
            <li class="dropdown dropdown-user">
                <a href="{{route('login')}}" class="btn btn-info"> {{ trans('header.sign_in') }}
                </a>
            </li>
          </ul>
        </div>
            @endif
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
