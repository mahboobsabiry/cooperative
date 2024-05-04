<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="{{ route('index') }}" target="_blank">
            <span class="text-capitalize">TOP-UP</span>
            <img src="{{ asset('assets/images/logo.jpg') }}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{ asset('assets/images/logo.jpg') }}" class="header-brand-img icon-logo" alt="logo">
            <img src="{{ asset('assets/images/logo.jpg') }}" class="header-brand-img desktop-logo theme-logo"
                 alt="logo">
            <img src="{{ asset('assets/images/logo.jpg') }}" class="header-brand-img icon-logo theme-logo" alt="logo">
        </a>
    </div>

    <div class="main-sidebar-body">
        <ul class="nav">
            <!-- Dashboard -->
            <li class="nav-label">@lang('admin.dashboard.dashboard')</li>
            <li class="nav-item {{ request()->url() == route('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fe fe-airplay"></i><span class="sidemenu-label">@lang('admin.dashboard.dashboard')</span>
                </a>
            </li>

            <li class="nav-label">صفحات</li>

            <!-- Employees -->
            @can('office_employee_view')
                <li class="nav-item {{ request()->is('admin/office/employees') ||
                request()->is('admin/office/employees/*') ? 'active show' : '' }}">

                    <a class="nav-link with-sub" href="javascript:void(0)">
                        <i class="fa fa-user-tie"></i>

                        <span class="sidemenu-label">@lang('admin.sidebar.employees')</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>

                    <ul class="nav-sub">
                        <!-- All Employees -->
                        <li class="nav-sub-item {{ request()->is('admin/office/employees') ||
                            request()->is('admin/office/employees/*') ? 'active' : '' }}">
                            <a class="nav-sub-link" href="{{ route('admin.office.employees.index') }}">
                                همه کارمندان برحال
                                ({{ count(\App\Models\Employee::all()) }}
                                )
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            <!--/==/ End of Employees -->

            <!-- Applications -->
            <li class="nav-label">@lang('admin.sidebar.applications')</li>

            <!-- User Management -->
            @can('user_view')
                <li class="nav-item {{ request()->is('admin/permissions') ||
                    request()->is('admin/permissions/*') ||
                    request()->is('admin/roles') ||
                    request()->is('admin/roles/*') ||
                    request()->is('admin/users') ||
                    request()->is('admin/users/*') ||
                    request()->is('admin/active-users') ||
                    request()->is('admin/inactive-users') ? 'active show' : '' }}">
                    <a class="nav-link with-sub" href="javascript:void(0)">
                        <i class="fe fe-users"></i>
                        <span class="sidemenu-label">@lang('admin.sidebar.userManagement')</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>

                    <ul class="nav-sub">
                        @can('user_mgmt')
                            <!-- Permissions -->
                            <li class="nav-sub-item {{ request()->is('admin/permissions') ||
                            request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a class="nav-sub-link"
                                   href="{{ route('admin.permissions.index') }}">@lang('admin.sidebar.permissions')</a>
                            </li>

                            <!-- Roles -->
                            <li class="nav-sub-item {{ request()->is('admin/roles') ||
                            request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a class="nav-sub-link"
                                   href="{{ route('admin.roles.index') }}">@lang('admin.sidebar.roles')</a>
                            </li>
                        @endcan

                        <!-- Users -->
                        <li class="nav-sub-item {{ request()->is('admin/users') ||
                            request()->is('admin/users/*') ||
                            request()->is('admin/active-users') ||
                            request()->is('admin/inactive-users') ? 'active' : '' }}">
                            <a class="nav-sub-link"
                               href="{{ route('admin.users.index') }}">@lang('admin.sidebar.users')</a>
                        </li>
                    </ul>
                </li>
            @endif
            <!--/==/ End of User Management -->

            <!-- Settings -->
            @can('setting_mgmt')
                <li class="nav-item {{ request()->url() == route('admin.settings.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.settings.index') }}">
                        <i class="fe fe-settings"></i><span
                                class="sidemenu-label">@lang('admin.sidebar.settings')</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>
