<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
  @if(!Auth::user())
  <li class="nav-item" id="main_data_research">
      <a href="{{route('register')}}" class="nav-link nav-toggle">
            <i class="icon-user-following"></i>
          <span class="title" style="margin-top: 12px">{{trans('menu.register')}}</span>
          <span class="arrow"></span>
      </a>
  </li>
  @endif
  @if(!Auth::user() || (Auth::user()&&Auth::user()->is('reader')))
          <li class="nav-item" id="main_data_research">
              <a href="{{route('base_rscn')}}" class="nav-link nav-toggle">
                  <i class="icon-layers"></i>
                  <span class="title" style="margin-top: 12px">{{trans('menu.research_database')}}</span>
                  <span class="arrow"></span>
              </a>
          </li>
          <li class="nav-item" id="main_menu">
              <a href="javascript:;" class="nav-link nav-toggle">
                  <i class="icon-speech"></i>
                  <span class="title" style="margin-top: 12px">{{trans('translate.menu')}}</span>
                  <span class="arrow"></span>
              </a>
              <ul class="sub-menu">
                  <li class="nav-item" id="sub1_menu">
                      <a href="{{route('add_translate')}}" class="nav-link">
                          <i class="icon-plus"></i>
                          <span class="title">{{trans('translate.new_translate')}}</span>
                      </a>
                  </li>
                  <li class="nav-item" id="sub2_menu">
                      <a href="{{route('translate_list')}}" class="nav-link">
                          <i class="icon-book-open"></i>
                          <span class="title">{{trans('translate.all_translate')}}</span>
                          <!-- <span class="badge badge-success">1</span> -->
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item" id="main_fund">
              <a href="javascript:;" class="nav-link nav-toggle">
                  <i class="icon-layers"></i>
                  <span class="title" style="margin-top: 12px">{{trans('menu.fund')}}</span>
                  <span class="arrow"></span>
              </a>
              <ul class="sub-menu">
                  <li class="nav-item" id="sub1_fund">
                      <a href="{{route('list_fund')}}" class="nav-link">
                          <i class="icon-layers"></i>
                          <span class="title">{{trans('menu.current_funds')}}</span>
                      </a>
                  </li>
                  <li class="nav-item" id="sub2_fund">
                      <a href="{{route('fund_ago')}}" class="nav-link">
                          <i class="icon-layers"></i>
                          <span class="title">{{trans('menu.recent_funds')}}</span>
                          <!-- <span class="badge badge-success">1</span> -->
                      </a>
                  </li>
                  <li class="nav-item" id="sub3_fund">
                      <a href="{{route('fund_request')}}" class="nav-link">
                          <i class="icon-layers"></i>
                          <span class="title">{{trans('menu.applied_funds')}}</span>
                          <!-- <span class="badge badge-danger">1</span> -->
                      </a>
                  </li>
              </ul>
          </li>
          @endif
            @if(Auth::user()&&Auth::user()->is('admin'))
            <li class="nav-item" id="main_stats">
                <a href="{{route('dashboard')}}" class="nav-link nav-toggle">
                    <i class="icon-graph"></i>
                    <span class="title" style="margin-top: 12px">{{trans('menu.all_stat')}}</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item" id="main_search_research">
                <a href="{{route('base_rscn')}}" class="nav-link nav-toggle">
                    <i class="icon-magnifier"></i>
                    <span class="title" style="margin-top: 12px">{{trans('menu.search')}}</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item" id="main_menu">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-speech"></i>
                    <span class="title" style="margin-top: 12px">{{trans('translate.menu')}}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item" id="sub1_menu">
                        <a href="{{route('add_translate')}}" class="nav-link">
                            <i class="icon-plus"></i>
                            <span class="title">{{trans('translate.new_translate')}}</span>
                        </a>
                    </li>
                    <li class="nav-item" id="sub2_menu">
                        <a href="{{route('translate_list')}}" class="nav-link">
                            <i class="icon-book-open"></i>
                            <span class="title">{{trans('translate.all_translate')}}</span>
                            <!-- <span class="badge badge-success">1</span> -->
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" id="main_fund">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title" style="margin-top: 12px">{{trans('menu.fund')}}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item" id="sub1_fund">
                        <a href="{{route('list_fund')}}" class="nav-link">
                            <i class="icon-layers"></i>
                            <span class="title">{{trans('menu.current_funds')}}</span>
                        </a>
                    </li>
                    <li class="nav-item" id="sub2_fund">
                        <a href="{{route('fund_ago')}}" class="nav-link">
                            <i class="icon-clock"></i>
                            <span class="title">{{trans('menu.recent_funds')}}</span>
                            <!-- <span class="badge badge-success">1</span> -->
                        </a>
                    </li>
                    <li class="nav-item" id="sub3_fund">
                        <a href="{{route('fund_request')}}" class="nav-link">
                            <i class="icon-user-following"></i>
                            <span class="title">{{trans('menu.applied_funds')}}</span>
                            <!-- <span class="badge badge-danger">1</span> -->
                        </a>
                    </li>
                    <li class="nav-item" id="sub4_fund">
                        <a href="{{route('fund_manage')}}" class="nav-link">
                            <i class="icon-list"></i>
                            <span class="title">{{trans('menu.manage_funds')}}
                        </a>
                    </li>
                    <li class="nav-item" id="sub5_fund">
                        <a href="{{route('fund_user_request_choose')}}" class="nav-link">
                            <i class="icon-user"></i>
                            <span class="title">{{trans('menu.applicator_list')}}
                        </a>
                    </li>
                    <li class="nav-item" id="sub6_fund">
                        <a href="{{route('fund_search_user_request')}}" class="nav-link">
                            <i class="fa fa-search"></i>
                            <span class="title">{{trans('menu.search_applicator_list')}}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" id="main_data_research">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title" style="margin-top: 12px">{{trans('menu.research_database')}}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item" id="sub2_data_research">
                        <a href="{{route('base_rscn')}}" class="nav-link">
                            <i class="icon-list"></i>
                            <span class="title">{{trans('menu.all_research')}}
                        </a>
                    </li>
                    <li class="nav-item" id="sub3_data_research">
                        <a href="{{route('research')}}" class="nav-link">
                            <i class="icon-plus"></i>
                            <span class="title">{{trans('menu.add_research')}}
                        </a>
                    </li>
                    <li class="nav-item" id="sub3_data_research">
                        <a href="{{route('dashboard_rscn')}}" class="nav-link">
                            <i class="icon-graph"></i>
                            <span class="title">{{trans('menu.research_stat')}}
                        </a>
                    </li>
                </ul>
            </li>

            @endif

            @if(Auth::user()&&Auth::user()->is('admin'))
            <li class="nav-item" id="main_admin">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title" style="margin-top: 12px">{{trans('menu.administration')}}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                  <li class="nav-item" id="sub1_admin">
                      <a href="{{route('user_manage')}}" class="nav-link">
                          <i class="icon-user"></i>
                          <span class="title">{{trans('menu.manage_users')}}</span>
                      </a>
                  </li>
                </ul>
            </li>

            @endif



        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
