<!--START HEADER TOP AREA -->
<div class="tourist-header-top">
    <div class="container">
        <div class="row">
            <!-- TOP LEFT -->
            <div class="col-xs-12 col-md-8 col-sm-7">
                <div class="top-address">
                    <p>
                        <span><i class="fa fa-phone"></i>{{ $setting['address'] ?? '1st New Street, Ankara' }}</span>
                        <a href="callto:{{ $setting['phone'] ?? '' }}"><i class="fa fa-phone"></i>{{ $setting['phone'] ?? '' }}</a>
                        <a href="mailto:{{ $setting['email'] ?? '' }}"><i class="fa fa-envelope-o"></i>{{ $setting['email'] ?? '' }}</a>
                    </p>
                </div>
            </div>

            <!-- TOP RIGHT -->
            <div class="col-xs-12 col-md-4 col-sm-5">
                <div class="top-right-menu text-right">
                    <ul class="social-icons">
                        <li>
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- HEADER DEFAULT MANU AREA -->
<div class="tourist-main-menu one_page hidden-xs hidden-sm">
    <div class="tourist_nav_area scroll_fixed">
        <div class="container">
            <div class="row logo-left">
                <!-- LOGO -->
                <div class="col-md-2 col-sm-2 col-xs-3">
                    <div class="logo">
                        <a class="main_sticky_main_l" href="{{ route('index') }}" title="tourist">
                            <img class="img-fluid" src="{{ asset('img/beam.png') }}" alt="tourist" width="70" />
                        </a>
                        <a class="main_sticky_l" href="{{ route('index') }}" title="tourist">
                            <img src="{{ asset('img/beam.png') }}" alt="astute" width="70" />
                        </a>
                    </div>
                </div>

                <!-- MAIN MENU -->
                <div class="col-md-10 col-sm-10 col-xs-9">
                    <nav class="tourist_menu main-search-menu">
                        <ul class="sub-menu nav_scroll">
                            <li><a href="#home">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index-2.html">Home Version One</a></li>
                                    <li><a href="index-3.html">Home Verion Two</a></li>
                                    <li><a href="index-4.html">Home Verion Three</a></li>
                                    <li><a href="index-5.html">Home Verion Four</a></li>
                                    <li><a href="index-6.html">Home Particle</a></li>
                                    <li><a href="index-7.html">Home OnePage Version</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="#package">Package</a>
                                <ul class="sub-menu">
                                    <li><a href="package-1.html">Package One</a></li>
                                    <li><a href="single-package.html">Single Package</a></li>
                                </ul>
                            </li>
                            <li><a href="hotel.html">Hotels</a></li>
                            <li><a href="flight.html">Flight</a></li>
                            <li><a href="#blog">BLog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">Blog Grid</a></li>
                                    <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                    <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                    <li><a href="blog-left-sidebar-2column.html">Blog Left 2Column</a></li>
                                    <li><a href="blog-right-sidebar-2column.html">Blog Right 2Column</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <!-- Languages -->
                            <li><a href="javascript:void(0)">Languages (EN)</a>
                                <ul class="sub-menu">
                                    <li><a href="javascript:void(0)" style="color: red;">EN</a></li>
                                    <li><a href="javascript:void(0)">TR</a></li>
                                    <li><a href="javascript:void(0)">AR</a></li>
                                    <li><a href="javascript:void(0)">FA</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                        <div class="donate-btn-header">
                            <a class="dtbtn" href="#">Book Now</a>
                        </div>
                    </nav>
                </div>
                <!-- END MAIN MENU -->
            </div>
        </div>
    </div>
</div>
<!-- END HEADER MENU AREA -->

<!-- MOBILE MENU AREA -->
<div class="mbm hidden-md hidden-lg header_area main-menu-area">
    <div class="menu_area mobile-menu">
        <nav>
            <ul class="main-menu clearfix">
                <li><a href="#home">Home</a>
                    <ul class="sub-menu">
                        <li><a href="index-2.html">Home Version One</a></li>
                        <li><a href="index-3.html">Home Verion Two</a></li>
                        <li><a href="index-4.html">Home Verion Three</a></li>
                        <li><a href="index-5.html">Home Verion Four</a></li>
                        <li><a href="index-6.html">Home Particle</a></li>
                        <li><a href="index-7.html">Home OnePage Version</a></li>
                    </ul>
                </li>
                <li><a href="about.html">About</a></li>
                <li><a href="#package">Package</a>
                    <ul class="sub-menu">
                        <li><a href="package-1.html">Package One</a></li>
                        <li><a href="single-package.html">Single Package</a></li>
                    </ul>
                </li>
                <li><a href="hotel.html">Hotels</a></li>
                <li><a href="flight.html">Flight</a></li>
                <li><a href="#blog">BLog</a>
                    <ul class="sub-menu">
                        <li><a href="blog.html">Blog Grid</a></li>
                        <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                        <li><a href="blog-left-sidebar-2column.html">Blog Left 2Column</a></li>
                        <li><a href="blog-right-sidebar-2column.html">Blog Right 2Column</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </div>
</div>
<!-- END MOBILE MENU AREA  -->
