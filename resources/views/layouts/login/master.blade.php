<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        <meta name="description" content="Dashlead -  Admin Panel HTML Dashboard Template">
        <meta name="author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="sales dashboard, admin dashboard, bootstrap 4 admin template, html admin template, admin panel design, admin panel design, bootstrap 4 dashboard, admin panel template, html dashboard template, bootstrap admin panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template">
        <!-- Favicon -->
        <link rel="icon" href="{{ asset('img/beam.png') }}" type="image/x-icon"/>

        <!-- Title -->
        <title>@yield('title', trans('website.title') . ' | ' . trans('global.login'))</title>

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
        <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/assets/css/custom-style.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/assets/css/skins.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/assets/css/dark-style.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/assets/css/custom-dark-style.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/assets/css/new_style.css') }}" rel="stylesheet">
    </head>

    <body class="main-body">
        <!-- Loader -->
        <div id="global-loader">
            <img src="{{ asset('backend/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- End Loader -->

        <!-- Page -->
        <div class="page main-signin-wrapper">
            <!-- Row -->
            <div class="row text-center pl-0 pr-0 ml-0 mr-0">
                <div class="col-lg-3 d-block mx-auto">
                    <div class="text-center mb-2">
                        <img src="{{ asset('assets/images/logo.jpg') }}" class="header-brand-img" alt="logo">
                        <img src="{{ asset('assets/images/logo.jpg') }}" class="header-brand-img theme-logos" alt="logo">
                    </div>
                    @yield('content')
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page -->

        <!-- Jquery js-->
        <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap js-->
        <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Ionicons js-->
        <script src="{{ asset('backend/assets/plugins/ionicons/ionicons.js') }}"></script>

        <!-- Rating js-->
        <script src="{{ asset('backend/assets/plugins/rating/jquery.rating-stars.js') }}"></script>

        <!-- Custom js-->
        <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
    </body>
</html>

