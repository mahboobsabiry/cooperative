@extends('layouts.website.master')

@section('content')
    <!-- SLIDER  AREA -->
    <div class="main_slider_area" id="home">
        <div class="container-fluid">
            <div class="row">
                <div class="em-nivo-slider-wrapper kc-elm kc-css-242493">
                    <div id="mainSlider" class="nivoSlider em-slider-image">
                        <img src="{{ asset('website/assets/images/slider-2.jpg') }}" alt="" title="#htmlcaption1_30"/>
                        <img src="{{ asset('website/assets/images/slider-2.jpg') }}" alt="" title="#htmlcaption1_28" />
                    </div>
                    <!-- em_slider style-1 start -->
                    <div id="htmlcaption1_30" class="nivo-html-caption em-slider-content-nivo">
                        <div class="em_slider_inner container  text-center">
                            <!--slider title 2 -->
                            <div class="wow slideInLeft" data-wow-duration="2s" data-wow-delay="0s">
                                <h2 class="em-slider-up-title">@lang('website.messages.openYourEyes')</h2>
                            </div>
                            <!--slider title 3 -->
                            <div class="wow slideInLeft" data-wow-duration="2s" data-wow-delay="0s">
                                <h1 class="em-slider-sub-title">@lang('website.messages.toTheBWorld')</h1>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="0s">
                                <p  class="em-slider-descript">@lang('website.messages.sliderTxt1')</p>
                            </div>
                            <div class="em-slider-button wow  bounceInUp  em-button-button-area" data-wow-duration="3s" data-wow-delay="0.5s">
                                <a class="em-active-button" href="javascript:void(0)">Star A Tour</a>
                                <a class="withput-active" href="{{ route('about') }}">@lang('global.about')</a>
                            </div>
                        </div>
                    </div>
                    <!-- end slider one -->
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Packages -->
    <div class="popular_package_area">
        <div class="container">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center">
                        <!-- title -->
                        <h2>@lang('website.messages.popularPackage')</h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>@lang('website.messages.popularPackageTxt')</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- SINGLE PACKAGE -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single_package">
                        <div class="pack_thumb">
                            <img src="{{ asset('website/assets/images/pk1.jpg') }}" alt="" />
                            <div class="package_price">
                                <span>$0</span>
                            </div>
                        </div>
                        <div class="package_content">
                            <div class="package_meta">
                                <span><i class="fa fa-user"></i>Number Of Days: 0</span>
                                <span><i class="fa fa-calendar"></i>Persons: 0</span>
                            </div>
                            <div class="package_title">
                                <h2><a href="javascript:void(0);">UNDEFINED</a></h2>
                                <span>UNDEFINED PLACE</span>
                            </div>
                            <div class="package_content_inner">
                                <div class="package_btn">
                                    <a href="javascript:void(0);">Details</a>
                                </div>
                                <div class="package_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SINGLE PACKAGE -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single_package">
                        <div class="pack_thumb">
                            <img src="{{ asset('website/assets/images/pk2.jpg') }}" alt="" />
                            <div class="package_price">
                                <span>$0</span>
                            </div>
                        </div>
                        <div class="package_content">
                            <div class="package_meta">
                                <span><i class="fa fa-user"></i>Number Of Days: 0</span>
                                <span><i class="fa fa-calendar"></i>Persons: 0</span>
                            </div>
                            <div class="package_title">
                                <h2><a href="javascript:void(0);">UNDEFINED</a></h2>
                                <span>UNDEFINED PLACE</span>
                            </div>
                            <div class="package_content_inner">
                                <div class="package_btn">
                                    <a href="javascript:void(0);">Details</a>
                                </div>
                                <div class="package_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SINGLE PACKAGE -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single_package">
                        <div class="pack_thumb">
                            <img src="{{ asset('website/assets/images/pk3.jpg') }}" alt="" />
                            <div class="package_price">
                                <span>$0</span>
                            </div>
                        </div>
                        <div class="package_content">
                            <div class="package_meta">
                                <span><i class="fa fa-user"></i>Number Of Days: 0</span>
                                <span><i class="fa fa-calendar"></i>Persons: 0</span>
                            </div>
                            <div class="package_title">
                                <h2><a href="javascript:void(0);">UNDEFINED</a></h2>
                                <span>UNDEFINED PLACE</span>
                            </div>
                            <div class="package_content_inner">
                                <div class="package_btn">
                                    <a href="javascript:void(0);">Details</a>
                                </div>
                                <div class="package_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SINGLE PACKAGE -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single_package">
                        <div class="pack_thumb">
                            <img src="{{ asset('website/assets/images/pk3.jpg') }}" alt="" />
                            <div class="package_price">
                                <span>$0</span>
                            </div>
                        </div>
                        <div class="package_content">
                            <div class="package_meta">
                                <span><i class="fa fa-user"></i>Number Of Days: 0</span>
                                <span><i class="fa fa-calendar"></i>Persons: 0</span>
                            </div>
                            <div class="package_title">
                                <h2><a href="javascript:void(0);">UNDEFINED</a></h2>
                                <span>UNDEFINED PLACE</span>
                            </div>
                            <div class="package_content_inner">
                                <div class="package_btn">
                                    <a href="javascript:void(0);">Details</a>
                                </div>
                                <div class="package_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SINGLE PACKAGE -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single_package">
                        <div class="pack_thumb">
                            <img src="{{ asset('website/assets/images/pk1.jpg') }}" alt="" />
                            <div class="package_price">
                                <span>$0</span>
                            </div>
                        </div>
                        <div class="package_content">
                            <div class="package_meta">
                                <span><i class="fa fa-user"></i>Number Of Days: 0</span>
                                <span><i class="fa fa-calendar"></i>Persons: 0</span>
                            </div>
                            <div class="package_title">
                                <h2><a href="javascript:void(0);">UNDEFINED</a></h2>
                                <span>UNDEFINED PLACE</span>
                            </div>
                            <div class="package_content_inner">
                                <div class="package_btn">
                                    <a href="javascript:void(0);">Details</a>
                                </div>
                                <div class="package_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SINGLE PACKAGE -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single_package">
                        <div class="pack_thumb">
                            <img src="{{ asset('website/assets/images/pk2.jpg') }}" alt="" />
                            <div class="package_price">
                                <span>$740</span>
                            </div>
                        </div>
                        <div class="package_content">
                            <div class="package_meta">
                                <span><i class="fa fa-user"></i>Number Of Days: 0</span>
                                <span><i class="fa fa-calendar"></i>Persons: 0</span>
                            </div>
                            <div class="package_title">
                                <h2><a href="javascript:void(0);">UNDEFINED</a></h2>
                                <span>UNDEFINED PLACE</span>
                            </div>
                            <div class="package_content_inner">
                                <div class="package_btn">
                                    <a href="javascript:void(0);">Details</a>
                                </div>
                                <div class="package_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--/==/ End of Popular Packages -->

    <!-- WHY CHOOSE BEA, -->
    <div class="feature_area_head">
        <div class="container">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center white_color">
                        <!-- title -->
                        <h2>@lang('website.whyChoose') <span> @lang('website.beam')</span></h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>@lang('website.messages.servicesMsg')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Area -->
    <div class="feature_area_main">
        <div class="container">
            <div class="row main_feature">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="feature-curousel owl-carousel curosel-style">
                            <!-- EDUCATION -->
                            <div class="col-md-12">
                                <div class="single_feature">
                                    <div class="feture_icon">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <div class="feature_content">
                                        <h2>@lang('form.education')</h2>
                                        <p>@lang('website.messages.educationTxt')</p>
                                    </div>
                                    <div class="feature_button">
                                        <a href="javascript:void(0);">@lang('website.readMore')</a>
                                    </div>
                                </div>
                            </div>

                            <!-- TOUR -->
                            <div class="col-md-12">
                                <div class="single_feature">
                                    <div class="feture_icon">
                                        <i class="fa fa-plane"></i>
                                    </div>
                                    <div class="feature_content">
                                        <h2>@lang('website.tour')</h2>
                                        <p>@lang('website.messages.tourTxt')</p>
                                    </div>
                                    <div class="feature_button">
                                        <a href="javascript:void(0)">@lang('website.readMore')</a>
                                    </div>
                                </div>
                            </div>

                            <!-- HEALTH -->
                            <div class="col-md-12">
                                <div class="single_feature">
                                    <div class="feture_icon">
                                        <i class="fa fa-clinic-medical"></i>
                                    </div>
                                    <div class="feature_content">
                                        <h2>@lang('website.health')</h2>
                                        <p>@lang('website.messages.healthTxt')</p>
                                    </div>
                                    <div class="feature_button">
                                        <a href="javascript:void(0);">@lang('website.readMore')</a>
                                    </div>
                                </div>
                            </div>

                            <!-- REAL ESTATE CONSULTING -->
                            <div class="col-md-12">
                                <div class="single_feature">
                                    <div class="feture_icon">
                                        <i class="fa fa-landmark"></i>
                                    </div>
                                    <div class="feature_content">
                                        <h2>@lang('website.realEstateConsulting')</h2>
                                        <p>@lang('website.messages.realEstateTxt')</p>
                                    </div>
                                    <div class="feature_button">
                                        <a href="javascript:void(0)">@lang('website.readMore')</a>
                                    </div>
                                </div>
                            </div>

                            <!-- TRANSLATION SERVICES -->
                            <div class="col-md-12">
                                <div class="single_feature">
                                    <div class="feture_icon">
                                        <i class="fa fa-tram"></i>
                                    </div>
                                    <div class="feature_content">
                                        <h2>@lang('website.translationServices')</h2>
                                        <p>@lang('website.messages.translationTxt')</p>
                                    </div>
                                    <div class="feature_button">
                                        <a href="javascript:void(0);">@lang('website.readMore')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--START PORTFOLIO AREA #GALLERY -->
    <div class="portfolio_area  " id="gallery">
        <div class="container-fluid">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center">
                        <!-- title -->
                        <h2>@lang('website.messages.gallTitle')</h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>@lang('website.messages.gallSubTitle')</p>

                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="row">
                        <div class="gallery_curosel owl-carousel curosel-style ">
                            <!-- START SINGLE PORTFOLIO  -->
                            <div class="col-md-12">
                                <div class="single_portfolio">
                                    <div class="single_portfolio_thumb">
                                        <a href="single-portfolio.html">
                                            <img src="{{ asset('website/assets/images/1.jpg') }}" alt="" />
                                        </a>
                                        <div class="port_icon">
                                            <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio" href="{{ asset('website/assets/images/1.jpg') }}"><i class="fa-regular fa-image"></i></a>
                                            <a href="javascript:void(0);"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="portfolio_content">
                                        <h2>Place: <span>Stanbul, Turkey</span></h2>
                                        <p>Captured By: <span>Anowar</span></p>
                                    </div>
                                </div>
                            </div>
                            <!-- START SINGLE PORTFOLIO  -->
                            <div class="col-md-12">
                                <div class="single_portfolio">
                                    <div class="single_portfolio_thumb">
                                        <a href="single-portfolio.html">
                                            <img src="{{ asset('website/assets/images/2.jpg') }}" alt="" />
                                        </a>
                                        <div class="port_icon">
                                            <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio" href="{{ asset('website/assets/images/2.jpg') }}"><i class="fa-regular fa-image"></i></a>
                                            <a href="javascript:void(0);"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="portfolio_content">
                                        <h2>Place: <span>Adana, Turkey</span></h2>
                                        <p>Captured By: <span>Hossain Khan</span></p>
                                    </div>
                                </div>
                            </div>
                            <!-- START SINGLE PORTFOLIO  -->
                            <div class="col-md-12">
                                <div class="single_portfolio">
                                    <div class="single_portfolio_thumb">
                                        <a href="single-portfolio.html">
                                            <img src="{{ asset('website/assets/images/3.jpg') }}" alt="" />
                                        </a>
                                        <div class="port_icon">
                                            <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio" href="{{ asset('website/assets/images/3.jpg') }}"><i class="fa-regular fa-image"></i></a>
                                            <a href="javascript:void(0);"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="portfolio_content">
                                        <h2>Place: <span>Ankara, Turkey</span></h2>
                                        <p>Captured By: <span>Anowar</span></p>
                                    </div>
                                </div>
                            </div>
                            <!-- START SINGLE PORTFOLIO  -->
                            <div class="col-md-12">
                                <div class="single_portfolio">
                                    <div class="single_portfolio_thumb">
                                        <a href="single-portfolio.html">
                                            <img src="{{ asset('website/assets/images/4.jpg') }}" alt="" />
                                        </a>
                                        <div class="port_icon">
                                            <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio" href="{{ asset('website/assets/images/4.jpg') }}"><i class="fa-regular fa-image"></i></a>
                                            <a href="javascript:void(0);"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="portfolio_content">
                                        <h2>Place: <span>Ezmir, Turkey</span></h2>
                                        <p>Captured By: <span>Anowar</span></p>
                                    </div>
                                </div>
                            </div>
                            <!-- START SINGLE PORTFOLIO  -->
                            <div class="col-md-12">
                                <div class="single_portfolio">
                                    <div class="single_portfolio_thumb">
                                        <a href="single-portfolio.html">
                                            <img src="{{ asset('website/assets/images/5.jpg') }}" alt="" />
                                        </a>
                                        <div class="port_icon">
                                            <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio" href="{{ asset('website/assets/images/5.jpg') }}"><i class="fa-regular fa-image"></i></a>
                                            <a href="javascript:void(0);"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="portfolio_content">
                                        <h2>Place: <span>Ankara, Turkey</span></h2>
                                        <p>Captured By: <span>Anowar</span></p>
                                    </div>
                                </div>
                            </div>
                            <!-- START SINGLE PORTFOLIO  -->
                            <div class="col-md-12">
                                <div class="single_portfolio">
                                    <div class="single_portfolio_thumb">
                                        <a href="single-portfolio.html">
                                            <img src="{{ asset('website/assets/images/1.jpg') }}" alt="" />
                                        </a>
                                        <div class="port_icon">
                                            <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio" href="{{ asset('website/assets/images/1.jpg') }}"><i class="fa-regular fa-image"></i></a>
                                            <a href="javascript:void(0);"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="portfolio_content">
                                        <h2>Place: <span>Aya Sofia, Turkey</span></h2>
                                        <p>Captured By: <span>Anowar</span></p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- START TESTIMONIAL AREA -->
    <div class="testimonial_area" id="testimonial">
        <div class="container">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center">
                        <!-- title -->
                        <h2>@lang('website.messages.testimonialTitle')</h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>@lang('website.messages.testimonialSubTitle')</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <!--testimonial owl curousel -->
                        <div class="testimonial_list owl-carousel curosel-style">
                            <!-- Start Single Testimonial -->
                            <div class="col-md-12">
                                <div class="single_testimonial">
                                    <div class="em_test_thumb">
                                        <img  src="{{ asset('website/assets/images/18.jpg') }}" alt="" width="80">
                                    </div>
                                    <div class="em_testi_text">
                                        <p>@lang('website.messages.testimonialTxt1')</p>
                                    </div>

                                    <div class="em_testi_content">
                                        <div class="em_testi_title">
                                            <h2>@lang('website.messages.testimonialPerson1') <span>@lang('website.messages.testimonialPJob1')</span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Single Testimonial -->
                            <div class="col-md-12">
                                <div class="single_testimonial">
                                    <div class="em_test_thumb">
                                        <img  src="{{ asset('website/assets/images/team2.jpg') }}" alt="" width="80">
                                    </div>
                                    <div class="em_testi_text">
                                        <p>@lang('website.messages.testimonialTxt2')</p>
                                    </div>

                                    <div class="em_testi_content">
                                        <div class="em_testi_title">
                                            <h2>@lang('website.messages.testimonialPerson2') <span>@lang('website.messages.testimonialPJob2')</span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Single Testimonial -->
                            <div class="col-md-12">
                                <div class="single_testimonial">
                                    <div class="em_test_thumb">
                                        <img  src="{{ asset('website/assets/images/team1.jpg') }}" alt="" width="80">
                                    </div>
                                    <div class="em_testi_text">
                                        <p>@lang('website.messages.testimonialTxt3')</p>
                                    </div>

                                    <div class="em_testi_content">
                                        <div class="em_testi_title">
                                            <h2>@lang('website.messages.testimonialPerson3') <span>@lang('website.messages.testimonialPJob3')</span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- END TESTIMONIAL AREA -->

    <!-- START BLOG AREA -->
    <div class="blog_area" id="blog">
        <div class="container">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center">
                        <!-- title -->
                        <h2>@lang('website.messages.blogTitle')</h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>@lang('website.messages.blogSubTitle')</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- blog owl curousel -->
                <div class="blog_carousel owl-carousel curosel-style">
                    <div class="col-md-12">
                        <!-- tourist SINGLE BLOG -->
                        <div class="tourist-single-blog ">
                            <!-- BLOG THUMB -->
                            <div class="blog_thumb_inner">
                                <div class="tourist-blog-thumb ">
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('website/assets/images/blog1.jpg') }}"  alt="blog1">
                                    </a>
                                </div>

                            </div>
                            <div class="em-blog-content-area ">
                                <!-- BLOG META -->
                                <div class="tourist-blog-meta">
                                    <div class="tourist-blog-meta-left">
                                        <span><i class="fa fa-calendar"></i>January 3, 2024 </span>
                                        <a href="javascript:void(0)"><span><i class="fa fa-user"></i>tourist </span></a>
                                    </div>
                                </div>
                                <!-- BLOG TITLE -->
                                <div class="blog-page-title ">
                                    <h2><a href="javascript:void(0);">UNDEFINED</a></h2>
                                </div>
                                <div class="blog_btn">
                                    <a href="javascript:void(0);">@lang('website.readMore')</a>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-12">
                        <!-- tourist SINGLE BLOG -->
                        <div class="tourist-single-blog ">
                            <!-- BLOG THUMB -->
                            <div class="blog_thumb_inner">
                                <div class="tourist-blog-thumb ">
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('website/assets/images/blog2.jpg') }}"  alt="blog1">
                                    </a>
                                </div>

                            </div>
                            <div class="em-blog-content-area ">
                                <!-- BLOG META -->
                                <div class="tourist-blog-meta">
                                    <div class="tourist-blog-meta-left">
                                        <span><i class="fa fa-calendar"></i>January 7, 2024 </span>
                                        <a href="javascript:void(0)"><span><i class="fa fa-user"></i>tourist </span></a>
                                    </div>
                                </div>
                                <!-- BLOG TITLE -->
                                <div class="blog-page-title ">
                                    <h2><a href="javascript:void(0);">UNDEFINED</a></h2>
                                </div>
                                <div class="blog_btn">
                                    <a href="javascript:void(0);">@lang('website.readMore')</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- tourist SINGLE BLOG -->
                        <div class="tourist-single-blog ">
                            <!-- BLOG THUMB -->
                            <div class="blog_thumb_inner">
                                <div class="tourist-blog-thumb ">
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('website/assets/images/blog3.jpg') }}"  alt="blog1">
                                    </a>
                                </div>

                            </div>
                            <div class="em-blog-content-area ">
                                <!-- BLOG META -->
                                <div class="tourist-blog-meta">
                                    <div class="tourist-blog-meta-left">
                                        <span><i class="fa fa-calendar"></i>September 14, 2024 </span>
                                        <a href="javascript:void(0)"><span><i class="fa fa-user"></i>tourist </span></a>
                                    </div>
                                </div>
                                <!-- BLOG TITLE -->
                                <div class="blog-page-title ">
                                    <h2><a href="javascript:void(0);">UNDEFINED</a></h2>
                                </div>
                                <div class="blog_btn">
                                    <a href="javascript:void(0);">@lang('website.readMore')</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- tourist SINGLE BLOG -->
                        <div class="tourist-single-blog ">
                            <!-- BLOG THUMB -->
                            <div class="blog_thumb_inner">
                                <div class="tourist-blog-thumb ">
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('website/assets/images/blog4.jpg') }}"  alt="blog1">
                                    </a>
                                </div>

                            </div>
                            <div class="em-blog-content-area ">
                                <!-- BLOG META -->
                                <div class="tourist-blog-meta">
                                    <div class="tourist-blog-meta-left">
                                        <span><i class="fa fa-calendar"></i>December 7, 2024 </span>
                                        <a href="javascript:void(0)"><span><i class="fa fa-user"></i>tourist </span></a>
                                    </div>
                                </div>
                                <!-- BLOG TITLE -->
                                <div class="blog-page-title ">
                                    <h2><a href="javascript:void(0);">UNDEFINED</a></h2>
                                </div>
                                <div class="blog_btn">
                                    <a href="javascript:void(0);">@lang('website.readMore')</a>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-12">
                        <!-- tourist SINGLE BLOG -->
                        <div class="tourist-single-blog ">
                            <!-- BLOG THUMB -->
                            <div class="blog_thumb_inner">
                                <div class="tourist-blog-thumb ">
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('website/assets/images/blog1.jpg') }}"  alt="blog1">
                                    </a>
                                </div>

                            </div>
                            <div class="em-blog-content-area ">
                                <!-- BLOG META -->
                                <div class="tourist-blog-meta">
                                    <div class="tourist-blog-meta-left">
                                        <span><i class="fa fa-calendar"></i>Nobember 1, 2024 </span>
                                        <a href="javascript:void(0)"><span><i class="fa fa-user"></i>tourist </span></a>
                                    </div>
                                </div>
                                <!-- BLOG TITLE -->
                                <div class="blog-page-title ">
                                    <h2><a href="javascript:void(0);">UNDEFINED</a></h2>
                                </div>
                                <div class="blog_btn">
                                    <a href="javascript:void(0);">@lang('website.readMore')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/==/ BLOG_AREA END -->

    <!-- SUBSCRIPTION AREA -->
    <div class="subscribe_area">
        <div class="container">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center white_color">
                        <!-- title -->
                        <h2>@lang('website.messages.subscribeNow')</h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>@lang('website.messages.subscribeTxt')</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="em_quote_form">
                        <form action="#">
                            <div class="quote_form_inner">
                                <div class="quote_form_field">
                                    <input type="email" name="email" placeholder="Email Address" />
                                    <button class="quote_button" name="submit">@lang('website.submit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands -->
    <div class="brand_area">
        <div class="container">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center">
                        <!-- title -->
                        <h2>@lang('website.messages.brandTitle')</h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>@lang('website.messages.brandSubTitle')</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="brand_carousel owl-carousel curosel-style">
                        <!-- Dunyagoz Hospital -->
                        <div class="col-md-12">
                            <div class="single_brand">
                                <div class="brand_thumb" title="Dünyagöz Hospital">
                                    <img src="{{ asset('website/img/brands/dunyagoz-gray.jpeg') }}" alt="Dünyagöz Hospital" style="border: 1px solid #cccccc;">
                                </div>
                            </div>
                        </div>

                        <!-- Gelisim University -->
                        <div class="col-md-12">
                            <div class="single_brand">
                                <div class="brand_thumb" title="İstanbul Gelişim Üniversitesi">
                                    <img src="{{ asset('website/img/brands/gelisim.png') }}"  alt="İstanbul Gelişim Üniversitesi" style="border: 1px solid #cccccc;">
                                </div>
                            </div>
                        </div>

                        <!-- Kolan Hospital Group -->
                        <div class="col-md-12">
                            <div class="single_brand">
                                <div class="brand_thumb" title="Kolan Hospital Group">
                                    <img src="{{ asset('website/img/brands/kolan-gray.png') }}"  alt="Kolan Hospital Group" style="border: 1px solid #cccccc;">
                                </div>
                            </div>
                        </div>

                        <!-- İstanbul Ticaret Üniversitesi -->
                        <div class="col-md-12">
                            <div class="single_brand">
                                <div class="brand_thumb" title="İstanbul Ticaret Üniversitesi">
                                    <img src="{{ asset('website/img/brands/ticaret-gray.png') }}"  alt="İstanbul Ticaret Üniversitesi" style="border: 1px solid #cccccc;">
                                </div>
                            </div>
                        </div>

                        <!-- Medipol Acıbadem -->
                        <div class="col-md-12">
                            <div class="single_brand">
                                <div class="brand_thumb" title="Medipol Acıbadem">
                                    <img src="{{ asset('website/img/brands/medipol-gray.png') }}"  alt="Medipol Acıbadem" style="border: 1px solid #cccccc;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
