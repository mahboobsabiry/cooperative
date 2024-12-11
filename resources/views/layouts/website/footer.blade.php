<!-- FOOTER TOP AREA -->
<div class="footer-middle" id="footer">
    <div class="container">
        <div class="row">
            <!--footer widget 1 -->
            <div class="col-sm-6 col-md-3 ">
                <div class="widget widgets_company_info">
                    <h2 class="widget-title">@lang('website.aboutBeam')</h2>
                    <div class="company_info_desc">
                        <p>{{ $setting['about'] ?? '' }}</p>
                    </div>
                    <div class="social_media">
                        <h3>@lang('website.followUs')</h3>
                        <a href="{{ $setting['facebookLink'] ?? '' }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="{{ $setting['instagramLink'] ?? '' }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        <a href="{{ $setting['twitterLink'] ?? '' }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="{{ $setting['youtubeLink'] ?? '' }}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <!--footer widget 2 -->
            <div class="col-sm-6 col-md-3 ">
                <div class="widget widget_nav_menu">
                    <h2 class="widget-title">@lang('website.quickContact')</h2>
                    <div class="menu-quick-link-container">
                        <ul id="menu-quick-link" class="menu">
                            <!-- Contribute Now -->
                            <li>
                                <i class="fa fa-angle-{{ app()->getLocale() == 'en' || app()->getLocale() == 'tr' ? 'left' : 'right' }}"></i>
                                <a href="javascript:void(0);">@lang('website.contributeNow')</a>
                            </li>

                            <!-- OUR VOLUNTEER -->
                            <li>
                                <i class="fa fa-angle-{{ app()->getLocale() == 'en' || app()->getLocale() == 'tr' ? 'left' : 'right' }}"></i>
                                <a href="javascript:void(0);">@lang('website.ourVolunteer')</a>
                            </li>

                            <!-- ACTION CENTER -->
                            <li>
                                <i class="fa fa-angle-{{ app()->getLocale() == 'en' || app()->getLocale() == 'tr' ? 'left' : 'right' }}"></i>
                                <a href="javascript:void(0);">@lang('website.actionCenter')</a>
                            </li>

                            <!-- TERMS -->
                            <li>
                                <i class="fa fa-angle-{{ app()->getLocale() == 'en' || app()->getLocale() == 'tr' ? 'left' : 'right' }}"></i>
                                <a href="javascript:void(0);">@lang('website.terms')</a>
                            </li>

                            <!-- SUPPORT -->
                            <li>
                                <i class="fa fa-angle-{{ app()->getLocale() == 'en' || app()->getLocale() == 'tr' ? 'left' : 'right' }}"></i>
                                <a href="javascript:void(0);">@lang('website.support')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--footer widget 2 -->
            <div class="col-sm-6 col-md-3 ">
                <div class="widget widget_nav_menu">
                    <h2 class="widget-title">@lang('website.quickContact')</h2>
                    <div class="menu-quick-link-container">
                        <ul id="menu-quick-link" class="menu">
                            <!-- Contribute Now -->
                            <li>
                                <i class="fa fa-angle-{{ app()->getLocale() == 'en' || app()->getLocale() == 'tr' ? 'left' : 'right' }}"></i>
                                <a href="javascript:void(0);">@lang('website.contributeNow')</a>
                            </li>

                            <!-- OUR VOLUNTEER -->
                            <li>
                                <i class="fa fa-angle-{{ app()->getLocale() == 'en' || app()->getLocale() == 'tr' ? 'left' : 'right' }}"></i>
                                <a href="javascript:void(0);">@lang('website.ourVolunteer')</a>
                            </li>

                            <!-- ACTION CENTER -->
                            <li>
                                <i class="fa fa-angle-{{ app()->getLocale() == 'en' || app()->getLocale() == 'tr' ? 'left' : 'right' }}"></i>
                                <a href="javascript:void(0);">@lang('website.actionCenter')</a>
                            </li>

                            <!-- TERMS -->
                            <li>
                                <i class="fa fa-angle-{{ app()->getLocale() == 'en' || app()->getLocale() == 'tr' ? 'left' : 'right' }}"></i>
                                <a href="javascript:void(0);">@lang('website.terms')</a>
                            </li>

                            <!-- SUPPORT -->
                            <li>
                                <i class="fa fa-angle-{{ app()->getLocale() == 'en' || app()->getLocale() == 'tr' ? 'left' : 'right' }}"></i>
                                <a href="javascript:void(0);">@lang('website.support')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--footer widget 4 -->
            <div class=" col-md-3 col-sm-6 last">
                <div class="widget widget_get_quote">
                    <h2 class="widget-title">@lang('global.aboutUs')</h2>
                    <div class="footer-address">
                        <p class="company_info">{{ $setting['aboutText'] }}</p>
                        <div class="footer_address_inner">
                            <ul><li><i class="fa fa-map-marker"></i><p>@lang('global.address'): {{ $setting['address'] }}</p></li></ul>
                            <!-- Phone Number -->
                            <ul>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <p>
                                        @lang('form.phone'): <a href="callto:{{ $setting['phone'] }}">{{ $setting['phone'] }}</a>
                                        @if($setting['secondPhone'])
                                            , <a href="callto:{{ $setting['secondPhone'] }}">{{ $setting['secondPhone'] }}</a>
                                        @endif
                                    </p>
                                </li>
                            </ul>
                            <!-- Email Address -->
                            <ul><li><i class="fa fa-envelope-o"></i><p>@lang('form.email'): <a href="mailto:{{ $setting['email'] }}">{{ $setting['email'] }}</a></p></li></ul>
                            <!-- Website -->
                            <ul><li><i class="fa fa-globe"></i><p>@lang('website.website'): <a href="beamdanishmanlik.com.tr">beamdanishmanlik.com.tr</a></p></li></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/==/ END FOOTER TOP AREA -->

<!-- FOOTER BOTTOM AREA -->
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="copy-right-text">
                    <!-- FOOTER COPYRIGHT TEXT -->
                    <p>@lang('website.copyright') <b style="color: #ff8337;">{{ \Morilog\Jalali\Jalalian::now()->getYear() }}</b> © <b style="color: #ff8337;">@lang('website.title')</b> @lang('website.allRightsReserved'). </p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="footer-menu">
                    <!-- FOOTER COPYRIGHT MENU -->
                    <ul class="text-right">
                        <li><a href="{{ route('index') }}">@lang('global.home')</a></li>
                        <li><a href="{{ route('about') }}">@lang('global.aboutUs')</a></li>
                        <li><a href="javascript:void(0)">@lang('website.terms')</a></li>
                        {{-- <li><a href="javascript:void(0)">@lang('website.register')</a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/==/ END FOOTER BOTTOM AREA -->
