<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

@include('admin.includes.head')
<!-- END: Head-->

<!-- BEGIN: Body-->

{{-- Dark Color --}}
{{-- <body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  "
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout"> --}}

{{-- Light Color --}}

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    @include('admin.includes.nav')
    <!-- END: Header-->


    @include('admin.includes.sidebar')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            @yield('body')
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    {{-- <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0">

        </p>
    </footer> --}}
    <!-- END: Footer-->

    @include('admin.includes.foot')
    @yield('script')


</body>
<!-- END: Body-->

</html>
