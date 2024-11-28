<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>BEAM Danismanlik</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('img/beam.png') }}">
        <!-- bootstrap CSS -->
        <link rel="stylesheet" 	href="{{ asset('website/assets/css/bootstrap.min.css') }}" type="text/css" media="all" />
        <!-- venobox CSS -->
        <link rel="stylesheet" 	href="{{ asset('website/venobox/venobox.css') }}" type="text/css" media="all" />
        <!-- nivo-slider CSS -->
        <link rel="stylesheet" 	href="{{ asset('website/assets/css/nivo-slider.css') }}" type="text/css" media="all" />
        <!-- nivo-slider CSS -->
        <link rel="stylesheet" 	href="{{ asset('website/assets/css/animate.css') }}" type="text/css" media="all" />
        <!-- slick CSS -->
        <link rel="stylesheet"  href="{{ asset('website/assets/css/slick.css') }}" type="text/css" media="all" />
        <!-- owl-carousel CSS -->
        <link rel="stylesheet" 	href="{{ asset('website/assets/css/owl.carousel.css') }}" type="text/css" media="all" />
        <!-- owl-transitions CSS -->
        <link rel="stylesheet" 	href="{{ asset('website/assets/css/owl.transitions.css') }}" type="text/css" media="all" />
        <!-- font-awesome CSS -->
        <link rel="stylesheet"  href="{{ asset('website/assets/css/all.min.css') }}" type="text/css" media="all" />
        <!-- meanmenu CSS -->
        <link rel="stylesheet"  href="{{ asset('website/assets/css/meanmenu.min.css') }}" type="text/css" media="all" />
        <!-- theme-default CSS -->
        <link rel="stylesheet"  href="{{ asset('website/assets/css/theme-default.css') }}" type="text/css" media="all" />
        <!-- widget CSS -->
        <link rel="stylesheet"  href="{{ asset('website/assets/css/widget.css') }}" type="text/css" media="all" />
        <!-- unittest CSS -->
        <link rel="stylesheet"  href="{{ asset('website/assets/css/unittest.css') }}" type="text/css" media="all" />
        <!-- Main Style CSS -->
        <link rel="stylesheet"  href="{{ asset('website/style.css') }}" type="text/css" media="all" />
        <!-- responsive CSS -->
        <link rel="stylesheet"  href="{{ asset('website/assets/css/responsive.css') }}" type="text/css" media="all" />
        <!-- modernizr js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    </head>

    <body>
        <!-- Loder Start-->
        <div class="loader-wrapper">
            <div class="loader"></div>
            <div class="loder-section left-section"></div>
            <div class="loder-section right-section"></div>
        </div>
        <!-- Loder End -->

        @include('layouts.website.header')

        @yield('content')

        @include('layouts.website.footer')

        <!-- Main jquery js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/vendor/jquery-3.2.1.min.js') }}"></script>
        <!-- bootstrap js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/bootstrap.min.js') }}"></script>
        <!-- directional js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/jquery.directional-hover.min.js') }}"></script>
        <!-- imagesloaded js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <!-- meanmenu js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/jquery.meanmenu.js') }}"></script>
        <!-- isotope js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/isotope.pkgd.min.js') }}"></script>
        <!-- owl-carousel js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/owl.carousel.min.js') }}"></script>
        <!-- scrollUp js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/jquery.scrollUp.js') }}"></script>
        <!-- nivo-slider js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/jquery.nivo.slider.pack.js') }}"></script>
        <!-- counterup js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/jquery.counterup.min.js') }}"></script>
        <!-- slick js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/slick.min.js') }}"></script>
        <!-- jquery Nav js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/jquery.nav.js') }}"></script>
        <!-- wow js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/wow.js') }}"></script>
        <!-- scrolltofixed js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/jquery-scrolltofixed-min.js') }}"></script>
        <!-- venobox js -->
        <script type="text/javascript" src="{{ asset('website/venobox/venobox.min.js') }}"></script>
        <!-- waypoints js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/waypoints.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('website/assets/js/jquery.countdown.min.js') }}"></script>
        <!-- Main js -->
        <script type="text/javascript" src="{{ asset('website/assets/js/theme.js') }}"></script>
    </body>
</html>
