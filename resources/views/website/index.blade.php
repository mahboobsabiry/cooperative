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
                                <h2 class="em-slider-up-title">Open Your Eyes</h2>
                            </div>
                            <!--slider title 3 -->
                            <div class="wow slideInLeft" data-wow-duration="2s" data-wow-delay="0s">
                                <h1 class="em-slider-sub-title">To The Beautiful World</h1>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="0s">
                                <p  class="em-slider-descript">We provide the best toure & travels service </p>
                            </div>
                            <div class="em-slider-button wow  bounceInUp  em-button-button-area" data-wow-duration="3s" data-wow-delay="0.5s">
                                <a class="em-active-button" href="#">Star A Tour</a>
                                <a class="withput-active" href="#">About More</a>
                            </div>
                        </div>
                    </div>
                    <!-- end slider one -->

                    <!-- slider two start -->
                    <div id="htmlcaption1_28" class="nivo-html-caption em-slider-content-nivo">
                        <div class="em_slider_inner container  text-center">
                            <!--slider title 2 -->
                            <div class="wow slideInLeft" data-wow-duration="2s" data-wow-delay="0s">
                                <h2 class="em-slider-up-title">Open Your Eyes</h2>
                            </div>
                            <!--slider title 3 -->
                            <div class="wow slideInLeft" data-wow-duration="2s" data-wow-delay="0s">
                                <h1 class="em-slider-sub-title">To The Beautiful World</h1>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="0s">
                                <p  class="em-slider-descript">We provide the best toure & travels service </p>
                            </div>
                            <div class="em-slider-button wow  bounceInUp  em-button-button-area" data-wow-duration="3s" data-wow-delay="0.5s">
                                <a class="em-active-button" href="#">Star A Tour</a>
                                <a class="withput-active" href="#">About More</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- OUR GOAL AREA  -->
    <div class="search_form_area" id="goal">
        <div class="container">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center">
                        <!-- title -->
                        <h2>Start<span> Booking Now!</span></h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm</p>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <ul class="tourist-tab">
                        <li class="active"><i class="fa fa-home"></i><a data-toggle="tab" href="#service1">Hotels</a></li>
                        <li><i class="fa fa-plane"></i><a data-toggle="tab" href="#service2">Flight</a></li>
                        <li><i class="fa fa-ship"></i><a data-toggle="tab" href="#service3">Ship</a></li>
                        <li><i class="fa fa-umbrella"></i><a data-toggle="tab" href="#service4">Tour</a></li>
                    </ul>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="tab_area">
                        <div class="tab-content">
                            <div class="active in tab-pane fade " id="service1">
                                <div class="single_tab">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="main-search-form">
                                                <form action="#">
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <label>Type Keywords</label>
                                                            <input class="form-control" name="keyword" type="text" placeholder="Keyword">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <label>Enter Destination</label>
                                                            <input type="text" name="destination" placeholder="Destination " class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field datetime">
                                                            <label>Check In Date</label>
                                                            <input type="date" name="checkin" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <label>Check Out Date</label>
                                                        <div class="input-field datetime">
                                                            <input type="date" name="checkout" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <label>Number Of Guests </label>
                                                            <input type="number" name="number" placeholder="Guest" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <input type="submit" value="⌕ Search" class="submit-btn th-bg">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="service2">
                                <div class="single_tab">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="main-search-form">
                                                <form action="#">
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <label>Origin City</label>
                                                            <select class="select">
                                                                <option value="">Origin City</option>
                                                                <option value="aye">America</option>
                                                                <option value="eh">Canada</option>
                                                                <option value="ooh">London</option>
                                                                <option value="whoop">Bangladesh</option>
                                                                <option value="whoop">Paris</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <label>Destination City</label>
                                                            <select class="select">
                                                                <option value="">Destination City</option>
                                                                <option value="aye">America</option>
                                                                <option value="eh">Canada</option>
                                                                <option value="ooh">London</option>
                                                                <option value="whoop">Bangladesh</option>
                                                                <option value="whoop">Paris</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field datetime">
                                                            <label>Deparature Date</label>
                                                            <input type="date" name="checkin" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <label>Return Date</label>
                                                        <div class="input-field datetime">
                                                            <input type="date" name="checkout" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <label>Flight Class</label>
                                                            <select class="select">
                                                                <option value="">Economic</option>
                                                                <option value="aye">Economic</option>
                                                                <option value="eh">Business</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <label>Number Of Adult </label>
                                                            <input type="number" name="number" placeholder="Adult" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <label>Number Of Kids </label>
                                                            <input type="number" name="kids" placeholder="Kids" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <input type="submit" value="⌕ Search" class="submit-btn th-bg">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="service3">
                                <div class="single_tab">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="main-search-form">
                                                <form action="#">
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field datetime">
                                                            <label>Pickup Date Time</label>
                                                            <input type="date" name="pickup" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <label>Total Hours </label>
                                                            <input type="number" name="hours" placeholder="Hours" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <label>Pickup Location</label>
                                                            <input class="form-control" name="keyword" type="text" placeholder="Pickup Location">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <label>Drop Location</label>
                                                            <input class="form-control" name="keyword" type="text" placeholder="Drop Location">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <input type="submit" value="⌕ Search" class="submit-btn th-bg">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="service4">
                                <div class="single_tab">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="main-search-form">
                                                <form action="#">

                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <label>Type Keword</label>
                                                            <input class="form-control" name="keyword" type="text" placeholder="Keyword">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <label>Select Location</label>
                                                            <select class="select">
                                                                <option value="">Select Location</option>
                                                                <option value="aye">America</option>
                                                                <option value="eh">Canada</option>
                                                                <option value="ooh">London</option>
                                                                <option value="whoop">Bangladesh</option>
                                                                <option value="whoop">Paris</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field datetime">
                                                            <label>Check In Date</label>
                                                            <input type="date" name="pickup" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <label>Number Of Guest </label>
                                                            <input type="number" name="hours" placeholder="Guest" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                                        <div class="input-field">
                                                            <input type="submit" value="⌕ Search" class="submit-btn th-bg">
                                                        </div>
                                                    </div>
                                                </form>
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
    </div>

    <div class="popular_package_area">
        <div class="container">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center">
                        <!-- title -->
                        <h2>Popular<span> Package</span></h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- SINGLE PACKAGE -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single_package">
                        <div class="pack_thumb">
                            <img src="assets/images/pk1.jpg" alt="" />
                            <div class="package_price">
                                <span>$940</span>
                            </div>
                        </div>
                        <div class="package_content">
                            <div class="package_meta">
                                <span><i class="fa fa-user"></i>Number Of Days: 2</span>
                                <span><i class="fa fa-calendar"></i>Persons: 2</span>
                            </div>
                            <div class="package_title">
                                <h2><a href="single-pack.html">Barselona Football Tour</a></h2>
                                <span>Barselona, Spain</span>
                            </div>
                            <div class="package_content_inner">
                                <div class="package_btn">
                                    <a href="single-pack.html">Details</a>
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
                            <img src="assets/images/pk2.jpg" alt="" />
                            <div class="package_price">
                                <span>$820</span>
                            </div>
                        </div>
                        <div class="package_content">
                            <div class="package_meta">
                                <span><i class="fa fa-user"></i>Number Of Days: 2</span>
                                <span><i class="fa fa-calendar"></i>Persons: 2</span>
                            </div>
                            <div class="package_title">
                                <h2><a href="single-pack.html">Real Madrid Vocation</a></h2>
                                <span>Madrid, Spain</span>
                            </div>
                            <div class="package_content_inner">
                                <div class="package_btn">
                                    <a href="single-pack.html">Details</a>
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
                            <img src="assets/images/pk3.jpg" alt="" />
                            <div class="package_price">
                                <span>$640</span>
                            </div>
                        </div>
                        <div class="package_content">
                            <div class="package_meta">
                                <span><i class="fa fa-user"></i>Number Of Days: 2</span>
                                <span><i class="fa fa-calendar"></i>Persons: 2</span>
                            </div>
                            <div class="package_title">
                                <h2><a href="single-pack.html">Brazil Stunning Places</a></h2>
                                <span>Combodia, Brazil</span>
                            </div>
                            <div class="package_content_inner">
                                <div class="package_btn">
                                    <a href="single-pack.html">Details</a>
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
                            <img src="assets/images/pk3.jpg" alt="" />
                            <div class="package_price">
                                <span>$940</span>
                            </div>
                        </div>
                        <div class="package_content">
                            <div class="package_meta">
                                <span><i class="fa fa-user"></i>Number Of Days: 2</span>
                                <span><i class="fa fa-calendar"></i>Persons: 2</span>
                            </div>
                            <div class="package_title">
                                <h2><a href="single-pack.html">France Stunning Places</a></h2>
                                <span>Paris, France</span>
                            </div>
                            <div class="package_content_inner">
                                <div class="package_btn">
                                    <a href="single-pack.html">Details</a>
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
                            <img src="assets/images/pk1.jpg" alt="" />
                            <div class="package_price">
                                <span>$740</span>
                            </div>
                        </div>
                        <div class="package_content">
                            <div class="package_meta">
                                <span><i class="fa fa-user"></i>Number Of Days: 2</span>
                                <span><i class="fa fa-calendar"></i>Persons: 2</span>
                            </div>
                            <div class="package_title">
                                <h2><a href="single-pack.html">Barselona Football Tour</a></h2>
                                <span>Barselona, Spain</span>
                            </div>
                            <div class="package_content_inner">
                                <div class="package_btn">
                                    <a href="single-pack.html">Details</a>
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
                            <img src="assets/images/pk2.jpg" alt="" />
                            <div class="package_price">
                                <span>$740</span>
                            </div>
                        </div>
                        <div class="package_content">
                            <div class="package_meta">
                                <span><i class="fa fa-user"></i>Number Of Days: 2</span>
                                <span><i class="fa fa-calendar"></i>Persons: 2</span>
                            </div>
                            <div class="package_title">
                                <h2><a href="single-pack.html">Barselona Football Tour</a></h2>
                                <span>Barselona, Spain</span>
                            </div>
                            <div class="package_content_inner">
                                <div class="package_btn">
                                    <a href="single-pack.html">Details</a>
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

    <!-- COUNTDOWN AREA	 -->
    <div class="count_down_area" id="countdown">
        <div class="container">
            <div class="row ">
                <div class="col-lg-9 col-md-9">
                    <div class="count_down_title">
                        <h2>On Going Limited  <span>Time Offer</span></h2>
                        <h1>Discount 10-30% Off</h1>
                    </div>
                    <div class="counterdowns">
                        <div class="counter">
                            <div class="timer">
                                <div class="autob" data-countdown="2024/12/19"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 ">
                    <div class="count_down_btn"><a href="#">Book Now</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="top_destination_area">
        <div class="container">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center">
                        <!-- title -->
                        <h2>Top <span> Destinations</span></h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm</p>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="destination_curousel owl-carousel curosel-style">
                            <div class="col-md-12">
                                <div class="single_destination">
                                    <div class="destination_thumb"><img src="{{ asset('website/assets/images/dest1.jpg') }}" alt="" /></div>
                                    <div class="destination_content">
                                        <h1>FC Barselona</h1>
                                        <h2>Spain</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim on veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip extra one Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod commodo consequat awesome dolore porem.</p>
                                        <div class="destination_button">
                                            <a href="#">More Details</a>
                                            <a class="active" href="#">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single_destination">
                                    <div class="destination_thumb"><img src="{{ asset('website/assets/images/dest2.jpg') }}" alt="" /></div>
                                    <div class="destination_content">
                                        <h1>Bocka Juniors</h1>
                                        <h2>Argentina</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim on veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip extra one Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod commodo consequat awesome dolore porem.</p>
                                        <div class="destination_button">
                                            <a href="#">More Details</a>
                                            <a class="active" href="#">Book Now</a>
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

    <div class="feature_area_head">
        <div class="container">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center white_color">
                        <!-- title -->
                        <h2>Why Choose <span> Tourist</span></h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="feature_area_main">
        <div class="container">
            <div class="row main_feature">

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

    <!--START PORTFOLIO AREA -->
    <div class="portfolio_area  " id="gallery">
        <div class="container-fluid">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center">
                        <!-- title -->
                        <h2>Most Incredible  <span> Places</span></h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm</p>

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
                                            <a href="hotel.html"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="portfolio_content">
                                        <h2>Place: <span>Barselona, Spain</span></h2>
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
                                            <a href="hotel.html"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="portfolio_content">
                                        <h2>Place: <span>Read Madrid, Spain</span></h2>
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
                                            <a href="hotel.html"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="portfolio_content">
                                        <h2>Place: <span>Juventus, Italy</span></h2>
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
                                            <a href="hotel.html"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="portfolio_content">
                                        <h2>Place: <span>Barselona, Spain</span></h2>
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
                                            <a href="hotel.html"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="portfolio_content">
                                        <h2>Place: <span>Man City, England</span></h2>
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
                                            <a href="hotel.html"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="portfolio_content">
                                        <h2>Place: <span>Barselona, Spain</span></h2>
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
    <!-- START BLOG AREA -->
    <div class="blog_area" id="blog">
        <div class="container">
            <div class="row">
                <!-- area section title-->
                <div class="col-md-12">
                    <div class="section-title  t_center">
                        <!-- title -->
                        <h2>Latest Blog <span> Post</span></h2>
                        <i class="fa fa-plane"></i>
                        <!-- TEXT -->
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm</p>
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
                                    <a href="blog-details.html">
                                        <img src="{{ asset('website/assets/images/blog1.jpg') }}"  alt="blog1">
                                    </a>
                                </div>

                            </div>
                            <div class="em-blog-content-area ">
                                <!-- BLOG META -->
                                <div class="tourist-blog-meta">
                                    <div class="tourist-blog-meta-left">
                                        <span><i class="fa fa-calendar"></i>January 3, 2024 </span>
                                        <a href="#"><span><i class="fa fa-user"></i>tourist </span></a>
                                    </div>
                                </div>
                                <!-- BLOG TITLE -->
                                <div class="blog-page-title ">
                                    <h2><a href="blog-details.html">Earn Money Online Frome Awesome Online Market</a></h2>
                                </div>
                                <div class="blog_btn">
                                    <a href="#">Learn More</a>
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
                                    <a href="blog-details.html">
                                        <img src="{{ asset('website/assets/images/blog2.jpg') }}"  alt="blog1">
                                    </a>
                                </div>

                            </div>
                            <div class="em-blog-content-area ">
                                <!-- BLOG META -->
                                <div class="tourist-blog-meta">
                                    <div class="tourist-blog-meta-left">
                                        <span><i class="fa fa-calendar"></i>January 7, 2024 </span>
                                        <a href="#"><span><i class="fa fa-user"></i>tourist </span></a>
                                    </div>
                                </div>
                                <!-- BLOG TITLE -->
                                <div class="blog-page-title ">
                                    <h2><a href="blog-details.html">Grow Your Business Creative Business Prepration</a></h2>
                                </div>
                                <div class="blog_btn">
                                    <a href="#">Learn More</a>
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
                                    <a href="blog-details.html">
                                        <img src="{{ asset('website/assets/images/blog3.jpg') }}"  alt="blog1">
                                    </a>
                                </div>

                            </div>
                            <div class="em-blog-content-area ">
                                <!-- BLOG META -->
                                <div class="tourist-blog-meta">
                                    <div class="tourist-blog-meta-left">
                                        <span><i class="fa fa-calendar"></i>September 14, 2024 </span>
                                        <a href="#"><span><i class="fa fa-user"></i>tourist </span></a>
                                    </div>
                                </div>
                                <!-- BLOG TITLE -->
                                <div class="blog-page-title ">
                                    <h2><a href="blog-details.html">Our Awesome Corporat Creative Communication</a></h2>
                                </div>
                                <div class="blog_btn">
                                    <a href="#">Learn More</a>
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
                                    <a href="blog-details.html">
                                        <img src="{{ asset('website/assets/images/blog4.jpg') }}"  alt="blog1">
                                    </a>
                                </div>

                            </div>
                            <div class="em-blog-content-area ">
                                <!-- BLOG META -->
                                <div class="tourist-blog-meta">
                                    <div class="tourist-blog-meta-left">
                                        <span><i class="fa fa-calendar"></i>December 7, 2024 </span>
                                        <a href="#"><span><i class="fa fa-user"></i>tourist </span></a>
                                    </div>
                                </div>
                                <!-- BLOG TITLE -->
                                <div class="blog-page-title ">
                                    <h2><a href="blog-details.html">Top Ten Freelancing</a></h2>
                                </div>
                                <div class="blog_btn">
                                    <a href="#">Learn More</a>
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
                                    <a href="blog-details.html">
                                        <img src="{{ asset('website/assets/images/blog1.jpg') }}"  alt="blog1">
                                    </a>
                                </div>

                            </div>
                            <div class="em-blog-content-area ">
                                <!-- BLOG META -->
                                <div class="tourist-blog-meta">
                                    <div class="tourist-blog-meta-left">
                                        <span><i class="fa fa-calendar"></i>Nobember 1, 2024 </span>
                                        <span><i class="fa fa-user"></i>tourist </span>
                                    </div>
                                </div>
                                <!-- BLOG TITLE -->
                                <div class="blog-page-title ">
                                    <h2><a href="blog-details.html">Theme Selling Website</a></h2>
                                </div>
                                <div class="blog_btn">
                                    <a href="#">Learn More</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BLOG_AREA END -->
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
