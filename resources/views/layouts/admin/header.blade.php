<div class="main-header side-header sticky">
    <div class="container-fluid">
        <!-- Logo -->
        <div class="main-header-left">
            <a class="main-logo d-lg-none" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('backend/assets/img/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('backend/assets/img/brand/icon.png') }}" class="header-brand-img icon-logo" alt="logo">
                <img src="{{ asset('backend/assets/img/brand/logo-light.png') }}" class="header-brand-img desktop-logo theme-logo" alt="logo">
                <img src="{{ asset('backend/assets/img/brand/icon-light.png') }}" class="header-brand-img icon-logo theme-logo" alt="logo">
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

            <!-- Notifications -->
            <div class="dropdown main-header-notification">
                <a class="nav-link icon" href="javascript:void(0)">
                    <i class="fe fe-bell"></i>
                    <span class="pulse bg-danger"></span>
                </a>
                <div class="dropdown-menu">
                    <div class="header-navheading">
                        <p class="main-notification-text">You have 1 unread notification<span class="badge badge-pill badge-primary ml-3">View all</span></p>
                    </div>
                    <div class="main-notification-list">
                        <div class="media new">
                            <div class="main-img-user online"><img alt="avatar" src="{{ asset('backend/assets/img/users/5.jpg') }}"></div>
                            <div class="media-body">
                                <p>Congratulate <strong>Olivia James</strong> for New template start</p><span>Oct 15 12:32pm</span>
                            </div>
                        </div>
                        <div class="media">
                            <div class="main-img-user"><img alt="avatar" src="{{ asset('backend/assets/img/users/2.jpg') }}"></div>
                            <div class="media-body">
                                <p><strong>Joshua Gray</strong> New Message Received</p><span>Oct 13 02:56am</span>
                            </div>
                        </div>
                        <div class="media">
                            <div class="main-img-user online"><img alt="avatar" src="{{ asset('backend/assets/img/users/3.jpg') }}"></div>
                            <div class="media-body">
                                <p><strong>Elizabeth Lewis</strong> added new schedule realease</p><span>Oct 12 10:40pm</span>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-footer">
                        <a href="javascript:void(0)">View All Notifications</a>
                    </div>
                </div>
            </div>
            <!--/==/ End of Notifications -->

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
                <a class="main-img-user" href="#"><img alt="avatar" src="{{ asset('backend/assets/img/users/1.jpg') }}"></a>

                <!-- List -->
                <div class="dropdown-menu">
                    <div class="header-navheading">
                        <h6 class="main-notification-title">{{ Auth::user()->name }}</h6>
                        <p class="main-notification-text">@lang('admin.admin')</p>
                    </div>

                    <!-- Profile -->
                    <a class="dropdown-item border-top" href="{{ url('admin/profile') }}">
                        <i class="fe fe-user"></i> My Profile
                    </a>

                    <!-- Edit Profile -->
                    <a class="dropdown-item" href="{{ url('admin/edit-profile') }}">
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
                    <a class="dropdown-item" href="{{ url('admin/activity') }}">
                        <i class="fe fe-compass"></i> Activity
                    </a>

                    <!-- Logout -->
                    <a class="dropdown-item" href="javascript:void(0)">
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
