@include('layouts.header')

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
    @include('layouts.main-header')
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        @include('layouts.sidebar')
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
              @yield('content')

            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        @include('layouts.quick-sidebar')
    </div>
    <!-- END CONTAINER -->
@include('layouts.footer')


</body>

</html>
