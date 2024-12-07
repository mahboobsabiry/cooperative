@extends('layouts.website.master')

@section('content')
    <!-- BEAM BREADCRUMB AREA -->
    <div class="breatcome_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breatcome_title">
                        <div class="breatcome_title_inner">
                            <h2>@lang('global.aboutUs')</h2>
                            <div class="breatcome_content">
                                <ul>
                                    <li><a href="{{ route('index') }}">@lang('global.home')<i class="fa fa-angle-right"></i></a>@lang('global.about')</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="feature_area_main about-pages">
        <div class="container">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center">
                        <!-- title -->
                        <h2>Why Choose <span> BEAM</span></h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>Because it is the best way to relax.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="feature-curousel owl-carousel curosel-style">
                            <div class="col-md-12">
                                <div class="single_feature">
                                    <div class="feture_icon">
                                        <i class="fa fa-car"></i>
                                    </div>
                                    <div class="feature_content">
                                        <h2>Travel Arrangements</h2>
                                        <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration.</p>
                                    </div>
                                    <div class="feature_button">
                                        <a href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single_feature">
                                    <div class="feture_icon">
                                        <i class="fa fa-plane"></i>
                                    </div>
                                    <div class="feature_content">
                                        <h2>Cheap Flights</h2>
                                        <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration.</p>
                                    </div>
                                    <div class="feature_button">
                                        <a href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single_feature">
                                    <div class="feture_icon">
                                        <i class="fa fa-usd"></i>
                                    </div>
                                    <div class="feature_content">
                                        <h2>Best Price Guarantee</h2>
                                        <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration.</p>
                                    </div>
                                    <div class="feature_button">
                                        <a href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single_feature">
                                    <div class="feture_icon">
                                        <i class="fa fa-usd"></i>
                                    </div>
                                    <div class="feature_content">
                                        <h2>Best Price Guarantee</h2>
                                        <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration.</p>
                                    </div>
                                    <div class="feature_button">
                                        <a href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single_feature">
                                    <div class="feture_icon">
                                        <i class="fa fa-car"></i>
                                    </div>
                                    <div class="feature_content">
                                        <h2>Travel Arrangements</h2>
                                        <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration.</p>
                                    </div>
                                    <div class="feature_button">
                                        <a href="#">Read More</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- VIDEO AREA -->
    <div class="video_area" id="video">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="choose-video-icon">
                        <div class="video-icon">
                            <a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="javascript:void(0);"><i class="fa fa-play-circle"></i></a>
                        </div>
                        <div class="video_content">
                            <h2>@lang('website.weAreHappyFamily')</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- START COUNTER AREA -->
    <div class="counter_area" id="fun-fact">
        <div class="container">
            <div class="row counter_main">
                <!-- single counter -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single_counter">
                        <div class="single_counter_inner">
                            <div class="countr_text">
                                <h1>3250</h1>
                            </div>
                            <div class="counter_title">
                                <h4>
                                    Happy Customers
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single counter -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single_counter">
                        <div class="single_counter_inner">
                            <div class="countr_text">
                                <h1>1280</h1>
                            </div>
                            <div class="counter_title">
                                <h4>
                                    Completed Project
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single counter -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single_counter">
                        <div class="single_counter_inner">
                            <div class="countr_text">
                                <h1>4052</h1>
                            </div>
                            <div class="counter_title">
                                <h4>
                                    Cup Of Tea
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single counter -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single_counter">
                        <div class="single_counter_inner">
                            <div class="countr_text">
                                <h1>1024</h1>
                            </div>
                            <div class="counter_title">
                                <h4>
                                    Wining Award
                                </h4>
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
                        <h2>What travellers <span> Say</span></h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm</p>
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
                                        <img  src="{{ asset('website/assets/images/18.jpg') }}" alt="">
                                    </div>
                                    <div class="em_testi_text">
                                        <p>Lorem ipsum dolor sit amet consec adipiscing elit, sed diam nonummy nibh euismo consectetuer once of adipiscing sed diam</p>
                                    </div>

                                    <div class="em_testi_content">
                                        <div class="em_testi_title">
                                            <h2>Mr. Anowar<span>Web Developer</span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Single Testimonial -->
                            <div class="col-md-12">
                                <div class="single_testimonial">
                                    <div class="em_test_thumb">
                                        <img  src="{{ asset('website/assets/images/18.jpg') }}" alt="">
                                    </div>
                                    <div class="em_testi_text">
                                        <p>Lorem ipsum dolor sit amet consec adipiscing elit, sed diam nonummy nibh euismo consectetuer once of adipiscing sed diam</p>
                                    </div>

                                    <div class="em_testi_content">
                                        <div class="em_testi_title">
                                            <h2>Adame Milne <span>Co-Founder</span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Single Testimonial -->
                            <div class="col-md-12">
                                <div class="single_testimonial">
                                    <div class="em_test_thumb">
                                        <img  src="{{ asset('website/assets/images/18.jpg') }}" alt="">
                                    </div>
                                    <div class="em_testi_text">
                                        <p>Lorem ipsum dolor sit amet consec adipiscing elit, sed diam nonummy nibh euismo consectetuer once of adipiscing sed diam</p>
                                    </div>

                                    <div class="em_testi_content">
                                        <div class="em_testi_title">
                                            <h2>Leonel Messi<span>The Boss</span></h2>
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

    <div class="subscribe_area">
        <div class="container">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center white_color">
                        <!-- title -->
                        <h2>Subscribes  <span> Now</span></h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm</p>
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
                                    <button class="quote_button" name="submit">Submit</button>
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
                        <h2>Our Brand <span> Partner</span></h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="brand_carousel owl-carousel curosel-style">
                        <!--single brand -->
                        <div class="col-md-12">
                            <div class="single_brand">
                                <div class="brand_thumb">
                                    <img src="{{ asset('website/assets/images/brand1.png') }}"  alt="brand1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single_brand">
                                <div class="brand_thumb">
                                    <img src="{{ asset('website/assets/images/brand2.png') }}"  alt="brand1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single_brand">
                                <div class="brand_thumb">
                                    <img src="{{ asset('website/assets/images/brand3.png') }}"  alt="brand1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single_brand">
                                <div class="brand_thumb">
                                    <img src="{{ asset('website/assets/images/brand4.png') }}"  alt="brand1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single_brand">
                                <div class="brand_thumb">
                                    <img src="{{ asset('website/assets/images/brand5.png') }}"  alt="brand1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single_brand">
                                <div class="brand_thumb">
                                    <img src="{{ asset('website/assets/images/brand6.png') }}"  alt="brand1">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
