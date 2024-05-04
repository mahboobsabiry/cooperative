<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        <meta name="description" content="Dashlead -  backend Panel HTML Dashboard Template">
        <meta name="author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="sales dashboard, backend dashboard, bootstrap 4 backend template, html backend template, backend panel design, backend panel design, bootstrap 4 dashboard, backend panel template, html dashboard template, bootstrap backend panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('assets/images/logo.jpg') }}" type="image/x-icon"/>

        <!-- Title -->
        <title>@yield('title', config('app.name'))</title>

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
        @if(app()->getLocale() == 'en')
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

        <style>
            body {
                height: 11.69in;
                width: 8.27in;
                /* to centre page on screen*/
                margin: auto;
                background-color: #cccccc;
            }
            .print-id-card {
                width: 632px; height: 1080px;
            }
            .emp-profile-img {
                width: 342px;
                height: 342px;
                position: absolute;
                left: 0;
                right: 0;
                text-align: center;
                z-index: 1;
                margin-top: 149px;
                margin-right: 188px;
                border-radius: 70%;
                padding-left: 19px;
                padding-bottom: 0;
                padding-right: 11px;
            }
            .id-card-img {
                width: 632px; height: 1080px;
                -webkit-border-radius: 10px;
                -webkit-filter: drop-shadow(0px 5px 10px rgba(0,0,225,0.6));
                -moz-filter: drop-shadow(0px 5px 10px rgba(0,0,225,0.6));
                -ms-filter: drop-shadow(0px 5px 10px rgba(0,0,225,0.6));
                -o-filter: drop-shadow(0px 5px 10px rgba(0,0,225,0.6));
                filter: drop-shadow(0px 5px 10px rgba(0,0,225,0.6));
            }
            .emp-name {
                position: absolute;
                left: 0;
                right: 0;
                text-align: center;
                z-index: 1;
                margin-top: 706px;
                font-size: 64px;
                color: blue;
                font-weight: bold;
            }
            .emp-pos-title {
                position: absolute;
                left: 0;
                right: 0;
                text-align: center;
                z-index: 1;
                margin-top: 437px;
                font-size: large;
                color: black;
                font-weight: bolder;
            }
            .emp-id {
                position: absolute;
                z-index: 1;
                margin-top: 468px;
                margin-right: 108px;
                font-size: 23px;
                color: black;
                font-weight: 500;
            }
            .emp-phone {
                position: absolute;
                left: 0;
                right: 0;
                text-align: center;
                z-index: 1;
                margin-top: 494px;
                font-size: 23px;
                color: black;
                font-weight: bolder;
            }
            .ff-times {
                font-family: "Times New Roman";
            }
        </style>
    </head>

    <body style="font-family: Calibri !important;">
        <!-- Page -->
        <div style="width: 998px; height: 1350px; padding: 40px; background: white;">
            <div class="print-id-card" id="printIdCard">
                <!-- Employee Profile Picture -->
                <div class="emp-profile">
                    <img class="emp-profile-img pos-absolute" src="{{ $employee->image ?? asset('assets/images/avatar-default.jpeg') }}" alt="{{ $employee->name }}">
                </div>

                <!-- Employee Name & Last Name -->
                <div class="emp-name">{{ $employee->name }} {{ $employee->last_name }}</div>
                <!-- Employee Position -->
                <div class="emp-pos-title">{{ $employee->position->title }}</div>
                <!-- Employee ID -->
                <div class="emp-id ff-times">
                    @if($employee->id <= 9)
                        00{{ $employee->id }}
                    @elseif($employee->id <= 99)
                        0{{ $employee->id }}
                    @else
                        {{ $employee->id }}
                    @endif
                </div>
                <!-- Employee Phone Number -->
                <div class="emp-phone ff-times">{{ $employee->phone }}</div>

                <!-- ID Card -->
                <img class="id-card-img" src="{{ asset('assets/images/emp-id-card.jpg') }}" alt="">
            </div>

        </div>
        <!-- End Page -->

        <!-- Jquery js-->
        <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap js-->
        <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    </body>
</html>
