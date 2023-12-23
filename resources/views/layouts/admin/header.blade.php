<div class="main-header side-header sticky">
    <div class="container-fluid">
        <!-- Logo -->
        <div class="main-header-left">
            <a class="main-logo d-lg-none" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('assets/images/logo.jpg') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('assets/images/logo.jpg') }}" class="header-brand-img icon-logo" alt="logo">
                <img src="{{ asset('assets/images/logo.jpg') }}" class="header-brand-img desktop-logo theme-logo" alt="logo">
                <img src="{{ asset('assets/images/logo.jpg') }}" class="header-brand-img icon-logo theme-logo" alt="logo">
            </a>
            <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
        </div>
        <!--/==/ End of Logo -->

        <div class="main-header-right">
            <!-- Search Bar -->
            <div class="dropdown d-md-flex header-search">
                <a class="nav-link icon header-search">
                    <i class="fe fe-search"></i>
                </a>
                <div class="dropdown-menu">
                    <div class="main-form-search p-2">
                        <input class="form-control" placeholder="Search" type="search">
                        <button class="btn"><i class="fe fe-search"></i></button>
                    </div>
                </div>
            </div>
            <!--/==/ End of Search Bar -->

            <!-- Full Screen -->
            <div class="dropdown d-md-flex">
                <a class="nav-link icon full-screen-link">
                    <i class="fe fe-maximize fullscreen-button"></i>
                </a>
            </div>
            <!--/==/ End of Full Screen -->

            <!-- Languages Dropdown -->
            @if(count(config('panel.available_languages', [])) > 1)
                <div class="dropdown main-profile-menu">
                    <a class="nav-link icon" href="javascript:void(0);">
                        <i class="fa fa-language"></i>
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu" style="width: 50px;">
                        @foreach(config('panel.available_languages') as $langLocale => $langName)
                            <a class="dropdown-item @if(app()->getLocale() == $langLocale) active text-white @endif" href="{{ url()->current() }}?change_language={{ $langLocale }}">
                                {{ strtoupper($langLocale) }} ({{ $langName }})
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
            <!--/==/ End of Languages Dropdown -->

            <!-- Profile -->
            <div class="dropdown main-profile-menu">
                <a class="main-img-user" href="javascript:void(0);">
                    <img alt="@lang('form.avatar')" src="{{ auth()->user()->image }}">
                </a>

                <!-- List -->
                <div class="dropdown-menu">
                    <div class="header-navheading">
                        <h6 class="main-notification-title">{{ Auth::user()->name }}</h6>
                        <p class="main-notification-text">@lang('admin.admin')</p>
                    </div>

                    <!-- Profile -->
                    <a class="dropdown-item border-top" href="{{ route('admin.profile') }}">
                        <i class="fe fe-user"></i> My Profile
                    </a>

                    <!-- Edit Profile -->
                    <a class="dropdown-item" href="{{ route('admin.edit.profile') }}">
                        <i class="fe fe-edit"></i> Edit Profile
                    </a>

                    <!-- Account Settings -->
                    <a class="dropdown-item" href="{{ url('admin/account-settings') }}">
                        <i class="fe fe-settings"></i> Account Settings
                    </a>

                    <!-- Support -->
                    <a class="dropdown-item" href="{{ url('admin/support') }}">
                        <i class="fe fe-settings"></i> Support
                    </a>

                    <!-- Activity -->
                    <a class="dropdown-item" href="{{ route('admin.activities') }}">
                        <i class="fe fe-compass"></i> Activity
                    </a>

                    <!-- Logout -->
                    <a class="dropdown-item" href="javascript:void(0)" id="logout-account">
                        <i class="fe fe-power"></i> Sign Out
                    </a>
                </div>
            </div>
            <!--/==/ End of Profile -->

            <!-- Right Sidebar Toggler -->
            <div class="dropdown d-md-flex header-settings">
                <a href="javascript:void(0)" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
                    <i class="fe fe-align-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
