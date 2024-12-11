@extends('layouts.website.master')

@section('content')
    <!-- BEAM BREADCRUMB AREA -->
    <div class="breatcome_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breatcome_title">
                        <div class="breatcome_title_inner">
                            <h2>@lang('website.contactUs')</h2>
                            <div class="breatcome_content">
                                <ul>
                                    <li><a href="{{ route('index') }}">@lang('global.home')<i class="fa fa-angle-right"></i></a>@lang('global.contact')</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTACT -->
    <div class="contact_area" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="contact_form">
                        <h2 class="contact-title">@lang('website.contact')</h2>
                        <form action="https://formspree.io/f/myyleorq" method="POST" id="dreamit-form">
                            <div class="form_field">
                                <div class="form_field_inner">
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="@lang('form.name')" />
                                </div>
                                <div class="form_field_inner">
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="@lang('form.email')" />
                                </div>
                            </div>
                            <div class="form_field">
                                <div class="form_field_inner">
                                    <input type="text" name="subject" value="{{ old('subject') }}" placeholder="@lang('form.subject')" />
                                </div>
                                <div class="form_field_inner">
                                    <input type="text" name="name" value="{{ old('subject') }}" placeholder="@lang('form.phone')" />
                                </div>
                            </div>
                            <div class="form_field text_area">
                                <div class="form_field_inner">
                                    <textarea name="textarea" placeholder="@lang('form.message')....">{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <div class="form_field">
                                <div class="contact_button">
                                    <button name="submit">@lang('website.sendMsg')</button>
                                </div>
                            </div>
                        </form>
                        <div id="status"></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="company_info">
                        <h2 class="contact-title2">@lang('website.ourOffice')</h2>
                        <!-- Address -->
                        <div class="single_company_info">
                            <div class="company_info_icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="company_info_content">
                                <h5>@lang('global.address')</h5>
                                <p>{{ $setting['address'] }}</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="single_company_info">
                            <div class="company_info_icon">
                                <i class="fa fa-phone-square"></i>
                            </div>
                            <div class="company_info_content">
                                <h5>@lang('form.phone')</h5>
                                <p>
                                    <a href="callto:{{ $setting['phone'] }}">{{ $setting['phone'] }}</a>
                                    @if($setting['secondPhone'])
                                        , <a href="callto:{{ $setting['secondPhone'] }}">{{ $setting['secondPhone'] }}</a>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="single_company_info">
                            <div class="company_info_icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="company_info_content">
                                <h5>@lang('form.email')</h5>
                                <p>
                                    <a href="mailto:{{ $setting['email'] }}">{{ $setting['email'] }}</a>
                                    @if($setting['secondEmail'])
                                        , <a href="mailto:{{ $setting['secondEmail'] }}">{{ $setting['secondEmail'] }}</a>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <!-- Website -->
                        <div class="single_company_info">
                            <div class="company_info_icon">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="company_info_content">
                                <h5>@lang('website.website')</h5>
                                <p><a href="{{ url()->route('index') }}">{{ url()->route('index') }}</a></p>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="social_media">
                            <a href="{{ $setting['facebookLink'] ?? '' }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="{{ $setting['instagramLink'] ?? '' }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a href="{{ $setting['twitterLink'] ?? '' }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="{{ $setting['youtubeLink'] ?? '' }}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT_AREA END -->

    <!-- Map AREA -->
    <div class="google_map_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="google_map_area">
                        <iframe class="map" src="https://snazzymaps.com/embed/65241"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
