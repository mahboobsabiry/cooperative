<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        <meta name="description" content="Dashlead -  backend Panel HTML Dashboard Template">
        <meta name="author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="sales dashboard, backend dashboard, bootstrap 4 backend template, html backend template, backend panel design, backend panel design, bootstrap 4 dashboard, backend panel template, html dashboard template, bootstrap backend panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon"/>

        <!-- Title -->
        <title>@yield('title', 'گروه تعاون')</title>

        <!---Fontawesome css-->
        <link href="{{ asset('backend/assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

        <!---Ionicons css-->
        <link href="{{ asset('backend/assets/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

        <!---Typicons css-->
        <link href="{{ asset('backend/assets/plugins/typicons.font/typicons.css') }}" rel="stylesheet">

        <!---Feather css-->
        <link href="{{ asset('backend/assets/plugins/feather/feather.css') }}" rel="stylesheet">

        <!---Falg-icons css-->
        <link href="{{ asset('backend/assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">

        <!---Style css-->
        @if(app()->getLocale() == 'en' || app()->getLocale() == 'tr')
            <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css/custom-style.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css/skins.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css/dark-style.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css/custom-dark-style.css') }}" rel="stylesheet">

            <!---Select2 css-->
            <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
            <!--Mutipleselect css-->
            <link rel="stylesheet" href="{{ asset('backend/assets/plugins/multipleselect/multiple-select.css') }}">
            <!---Jquery.mCustomScrollbar css-->
            <link href="{{ asset('backend/assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet">

            <!---Sidebar css-->
            <link href="{{ asset('backend/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

            <!---Sidemenu css-->
            <link href="{{ asset('backend/assets/plugins/sidemenu/sidemenu.css') }}" rel="stylesheet">

            <!---Switcher css-->
            <link href="{{ asset('backend/assets/switcher/css/switcher.css') }}" rel="stylesheet">
        @else
            <link href="{{ asset('backend/assets/css-rtl/style.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css-rtl/custom-style.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css-rtl/skins.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css-rtl/dark-style.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css-rtl/custom-dark-style.css') }}" rel="stylesheet">
            <!---Select2 css-->
            <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
            <!--Mutipleselect css-->
            <link rel="stylesheet" href="{{ asset('backend/assets/plugins/multipleselect/multiple-select-rtl.css') }}">
            <!---Jquery.mCustomScrollbar css-->
            <link href="{{ asset('backend/assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet">

            <!---Sidebar css-->
            <link href="{{ asset('backend/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

            <!---Sidemenu css-->
            <link href="{{ asset('backend/assets/plugins/sidemenu/sidemenu-rtl.css') }}" rel="stylesheet">

            <!---Switcher css-->
            <link href="{{ asset('backend/assets/switcher/css/switcher-rtl.css') }}" rel="stylesheet">
        @endif
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/sweet-alert/sweetalert.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/toastr/toastr.min.css') }}">

        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/jdatepicker/jalalidatepicker.min.css') }}">

        <link href="{{ asset('backend/assets/switcher/demo.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/assets/css/new-style.css') }}" rel="stylesheet">

        @yield('extra_css')
    </head>

    <body style="font-family: Calibri !important;">
        <!-- Start Switcher -->
        @include('layouts.admin.switcher')
        <!-- End Switcher -->

        <!-- Loader -->
        <div id="global-loader">
            <img src="{{ asset('backend/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- End Loader -->

        <!-- Page -->
        <div class="page">
            <!-- Sidemenu -->
            @include('layouts.admin.sidebar')
            <!-- End Sidemenu -->

            <!-- Main Content-->
            <div class="main-content side-content pt-0">
                <!-- Main Header-->
                @include('layouts.admin.header')
                <!-- End Main Header-->
                @yield('content')
            </div>
            <!-- End Main Content-->

            <!-- Todo Sidebar -->
            @include('layouts.admin.todolist')
            <!-- End Todo Sidebar -->
            <!-- Main Footer-->
            @include('layouts.admin.footer')
            <!--End Footer-->
        </div>
        <!-- End Page -->
        <!-- Back-to-top -->
        <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        <!-- Jquery js-->
        <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap js-->
        <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Ionicons js-->
        <script src="{{ asset('backend/assets/plugins/ionicons/ionicons.js') }}"></script>

        <!-- Rating js-->
        <script src="{{ asset('backend/assets/plugins/rating/jquery.rating-stars.js') }}"></script>

        <!-- Flot Chart js-->
        <script src="{{ asset('backend/assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('backend/assets/js/chart.flot.sampledata.js') }}"></script>
        <!-- Chart.Bundle js-->
        <script src="{{ asset('backend/assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
        <!-- Peity js-->
        <script src="{{ asset('backend/assets/plugins/peity/jquery.peity.min.js') }}"></script>
        <!-- Jquery-Ui js-->
        <script src="{{ asset('backend/assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
        <!-- Select2 js-->
        <script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>
        <!--MutipleSelect js-->
        <script src="{{ asset('backend/assets/plugins/multipleselect/multiple-select.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/multipleselect/multi-select.js') }}"></script>
        <!-- Jquery.mCustomScrollbar js-->
        <script src="{{ asset('backend/assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <!-- index -->
        <script src="{{ asset('backend/assets/js/index.js') }}"></script>

        <!-- Perfect-scrollbar js-->
        <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

        <!-- Sidemenu js-->
        <script src="{{ asset('backend/assets/plugins/sidemenu/sidemenu.js') }}"></script>

        <!-- Sidebar js-->
        @if(app()->getLocale() == 'en')
            <script src="{{ asset('backend/assets/plugins/sidebar/sidebar.js') }}"></script>
        @else
            <script src="{{ asset('backend/assets/plugins/sidebar/sidebar-rtl.js') }}"></script>
        @endif

        <!-- Sweet Alert -->
        <script src="{{ asset('backend/assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
        <!-- Tooltip js-->
        <script src="{{ asset('backend/assets/js/tooltip.js') }}"></script>
        <!-- Sticky js-->
        <script src="{{ asset('backend/assets/js/sticky.js') }}"></script>

        <!-- Switcher js-->
        @if(app()->getLocale() == 'en')
            <script src="{{ asset('backend/assets/switcher/js/switcher.js') }}"></script>
        @else
            <script src="{{ asset('backend/assets/switcher/js/switcher-rtl.js') }}"></script>
        @endif

        <script src="{{ asset('backend/assets/plugins/toastr/toastr.min.js') }}"></script>

        <script type="text/javascript"
                src="{{ asset('backend/assets/plugins/jdatepicker/jalalidatepicker.min.js') }}"></script>
        @include('js.all')
        @yield('extra_js')

        <!-- Custom js-->
        <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
        <script>
            $(document).ready(function() {
                jalaliDatepicker.startWatch({
                    months: ["حمل", "ثور", "جوزا", "سرطان", "اسد", "سنبله", "میزان", "عقرب", "قوس", "جدی", "دلو", "حوت"],
                    maxDate: "attr"
                });

                $('.select2').select2();
            });
        </script>
    </body>
</html>
