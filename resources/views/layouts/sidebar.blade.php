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
            @if(Auth::user()&&Auth::user()->is('admin_research_work'))
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title" style="margin-top: 12px">รายชื่อทุนทั้งหมด</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="list_fund" class="nav-link">
                            <i class="icon-layers"></i>
                            <span class="title">ทุนปัจจุบัน</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="fund_ago" class="nav-link">
                            <i class="icon-layers"></i>
                            <span class="title">ทุนที่ผ่านมา</span>
                            <!-- <span class="badge badge-success">1</span> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="fund_request" class="nav-link">
                            <i class="icon-layers"></i>
                            <span class="title">ทุนที่ท่านเสนอขอ</span>
                            <!-- <span class="badge badge-danger">1</span> -->
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title" style="margin-top: 12px">Admin</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="fund_manage" class="nav-link">
                            <i class="icon-settings"></i>
                            <span class="title">จัดการทุนทั้งหมด
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form_controls_md.html" class="nav-link">
                            <i class="icon-settings"></i>
                            <span class="title">จัดการผู้ใช้งาน
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title" style="margin-top: 12px">ข้อมูลส่วนตัว</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="page_user_profile_1.html" class="nav-link">
                            <i class="icon-user"></i>
                            <span class="title">ข้อมูลผู้ขอทุน</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="page_user_profile_1_account.html" class="nav-link">
                            <i class="icon-user-female"></i>
                            <span class="title">ข้อมูลการเข้าใช้งานระบบ</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Auth::user()&&Auth::user()->is('admin_research_center'))
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-plus"></i>
                    <span class="title" style="margin-top: 12px">เพิ่มงานวิจัย</span>
                    <span class="arrow"></span>
                </a>
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-plus"></i>
                    <span class="title" style="margin-top: 12px">เพิ่มสิ่งประดิษฐ์และรางวัล</span>
                    <span class="arrow"></span>
                </a>

            </li>

            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title" style="margin-top: 12px">Admin</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="fund_manage" class="nav-link">
                            <i class="icon-settings"></i>
                            <span class="title">จัดการทุนทั้งหมด
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form_controls_md.html" class="nav-link">
                            <i class="icon-settings"></i>
                            <span class="title">จัดการผู้ใช้งาน
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title" style="margin-top: 12px">ข้อมูลส่วนตัว</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="page_user_profile_1.html" class="nav-link">
                            <i class="icon-user"></i>
                            <span class="title">ข้อมูลผู้ขอทุน</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="page_user_profile_1_account.html" class="nav-link">
                            <i class="icon-user-female"></i>
                            <span class="title">ข้อมูลการเข้าใช้งานระบบ</span>
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
