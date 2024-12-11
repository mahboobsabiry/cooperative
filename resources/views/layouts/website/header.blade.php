<!--START HEADER TOP AREA -->
<div class="tourist-header-top">
    <div class="container">
        <div class="row">
            <!-- TOP LEFT -->
            <div class="col-xs-12 col-md-10 col-sm-9">
                <div class="top-address">
                    <p>
                        <span><i class="fa fa-phone"></i>{{ $setting['address'] ?? '1st New Street, Ankara' }}</span>
                        <!-- Phone Number -->
                        <a href="callto:{{ $setting['phone'] ?? '' }}"><i class="fa fa-phone"></i>{{ $setting['phone'] ?? '' }}</a>
                        @if($setting['secondPhone']) <a href="callto:{{ $setting['secondPhone'] ?? '' }}">{{ $setting['secondPhone'] ?? '' }}</a>@endif
                        <!-- Email Address -->
                        <a href="mailto:{{ $setting['email'] ?? '' }}"><i class="fa fa-envelope-o"></i>{{ $setting['email'] ?? '' }}</a>
                    </p>
                </div>
            </div>

            <!-- TOP RIGHT -->
            <div class="col-xs-12 col-md-2 col-sm-3">
                <div class="top-right-menu text-right">
                    <ul class="social-icons">
                        <li>
                            <a href="{{ $setting['facebookLink'] ?? '' }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="{{ $setting['instagramLink'] ?? '' }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a href="{{ $setting['twitterLink'] ?? '' }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="{{ $setting['youtubeLink'] ?? '' }}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
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
                            <!-- Home -->
                            <li class="{{ request()->url() == route('index') ? 'current' : '' }}"><a href="{{ route('index') }}">@lang('global.home')</a></li>
                            <!-- About -->
                            <li class="{{ request()->url() == route('about') ? 'current' : '' }}"><a href="{{ route('about') }}">@lang('global.about')</a></li>
                            <li><a href="#package">@lang('website.package')</a></li>
                            <li><a href="javascript:void(0);">@lang('website.hotels')</a></li>
                            <li><a href="javascript:void(0);">@lang('website.flight')</a></li>
                            <li><a href="#blog">@lang('website.blog')</a></li>

                            <!-- Languages -->
                            @if(count(config('panel.available_languages', [])) > 1)
                                <li><a href="javascript:void(0)">@lang('website.languages') ({{ strtoupper(app()->getLocale()) }})</a>
                                    <ul class="sub-menu">
                                        @foreach(config('panel.available_languages') as $langLocale => $langName)
                                            <li><a href="{{ url()->current() }}?change_language={{ $langLocale }}" @if(app()->getLocale() == $langLocale) style="color: red;" @endif>{{ strtoupper($langLocale) }} ({{ $langName }})</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                            <!--/==/ End of Languages -->

                            <li><a href="{{ route('website.contact') }}">@lang('website.contact')</a></li>
                        </ul>
                        <div class="donate-btn-header">
                            <a class="dtbtn" href="javascript:void(0)">Book Now</a>
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
                <!-- Home -->
                <li class="{{ request()->url() == route('index') ? 'current' : '' }}"><a href="{{ route('index') }}">@lang('global.home')</a></li>
                <!-- About -->
                <li class="{{ request()->url() == route('about') ? 'current' : '' }}"><a href="{{ route('about') }}">@lang('global.about')</a></li>
                <li><a href="#package">@lang('website.package')</a></li>
                <li><a href="javascript:void(0);">@lang('website.hotels')</a></li>
                <li><a href="javascript:void(0);">@lang('website.flight')</a></li>
                <li><a href="#blog">@lang('website.blog')</a></li>

                <!-- Languages -->
                @if(count(config('panel.available_languages', [])) > 1)
                    <li><a href="javascript:void(0)">Languages ({{ strtoupper(app()->getLocale()) }})</a>
                        <ul class="sub-menu">
                            @foreach(config('panel.available_languages') as $langLocale => $langName)
                                <li><a href="{{ url()->current() }}?change_language={{ $langLocale }}" @if(app()->getLocale() == $langLocale) style="color: red;" @endif>{{ strtoupper($langLocale) }} ({{ $langName }})</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endif
                <!--/==/ End of Languages -->
            </ul>
        </nav>
    </div>
</div>
<!-- END MOBILE MENU AREA  -->
