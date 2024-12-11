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
                        <h2>@lang('website.whyChoose') <span> @lang('website.beam')</span></h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>@lang('website.messages.servicesMsg')</p>
                    </div>
                </div>
            </div>
            <div class="row">
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
                <!-- Happy Customers -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single_counter">
                        <div class="single_counter_inner">
                            <div class="countr_text">
                                <h1>3250</h1>
                            </div>
                            <div class="counter_title">
                                <h4>@lang('website.happyCustomers')</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Completed Project -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single_counter">
                        <div class="single_counter_inner">
                            <div class="countr_text">
                                <h1>1280</h1>
                            </div>
                            <div class="counter_title">
                                <h4>@lang('website.completedProject')</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cup Of Tea -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single_counter">
                        <div class="single_counter_inner">
                            <div class="countr_text">
                                <h1>4052</h1>
                            </div>
                            <div class="counter_title">
                                <h4>@lang('website.cupOfTea')</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Wining Award -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single_counter">
                        <div class="single_counter_inner">
                            <div class="countr_text">
                                <h1>1024</h1>
                            </div>
                            <div class="counter_title">
                                <h4>@lang('website.winningAward')</h4>
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
@endsection
