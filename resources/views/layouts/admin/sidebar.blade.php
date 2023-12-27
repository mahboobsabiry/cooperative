<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="{{ route('index') }}" target="_blank">
            <span class="text-capitalize">BCHS</span>
            <img src="{{ asset('assets/images/logo.jpg') }}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{ asset('assets/images/logo.jpg') }}" class="header-brand-img icon-logo" alt="logo">
            <img src="{{ asset('assets/images/logo.jpg') }}" class="header-brand-img desktop-logo theme-logo" alt="logo">
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

            <!-- Pages -->
            <li class="nav-label">@lang('admin.dashboard.pages')</li>

            <!-- Positions -->
            @can('organization_mgmt')
            <li class="nav-item {{ request()->is('admin/department') ||
                    request()->is('admin/department/*') ||
                    request()->is('admin/positions') ||
                    request()->is('admin/positions/*') ||
                    request()->is('admin/administrations') ||
                    request()->is('admin/administrations/*') ||
                    request()->is('admin/management') ||
                    request()->is('admin/management/*') ||
                    request()->is('admin/branches') ||
                    request()->is('admin/branches/*') ? 'active show' : '' }}">

                <a class="nav-link with-sub" href="javascript:void(0)">
                    <i class="fe fe-life-buoy"></i>
                    <span class="sidemenu-label">@lang('admin.sidebar.positions')</span>
                    <i class="angle fe fe-chevron-right"></i>
                </a>

                <ul class="nav-sub">
                    <!-- Positions -->
                    <li class="nav-sub-item {{ request()->is('admin/positions') ||
                        request()->is('admin/positions/*') ? 'active' : '' }}">
                        <a class="nav-sub-link" href="{{ route('admin.positions.index') }}">
                            {<span class="small text-sm-center tx-danger">M</span>}
                            @lang('pages.positions.allPositions')
                            ({{ count(\App\Models\Position::all()) }})
                        </a>
                    </li>

                    <!-- Departments -->
                    <li class="nav-sub-item {{ request()->is('admin/department') ||
                        request()->is('admin/department/*') ? 'active' : '' }}">
                        <a class="nav-sub-link" href="{{ route('admin.department.index') }}">
                            @lang('pages.positions.department')
                            ({{ count(\App\Models\Position::all()->where('position_number', 2)) }})
                        </a>
                    </li>

                    <!-- Administrations -->
                    <li class="nav-sub-item {{ request()->is('admin/administrations') ||
                        request()->is('admin/administrations/*') ? 'active' : '' }}">
                        <a class="nav-sub-link" href="{{ route('admin.administrations.index') }}">
                            @lang('pages.positions.administrations')
                            ({{ count(\App\Models\Position::all()->where('position_number', 3)) }})
                        </a>
                    </li>

                    <!-- General Management -->
                    <li class="nav-sub-item {{ request()->is('admin/management') ||
                        request()->is('admin/management/*') ? 'active' : '' }}">
                        <a class="nav-sub-link" href="{{ route('admin.management.index') }}">
                            @lang('pages.positions.generalMgmts')
                            ({{ count(\App\Models\Position::all()->where('position_number', 4)) }})
                        </a>
                    </li>

                    <!-- Branches -->
                    <li class="nav-sub-item {{ request()->is('admin/branches') ||
                        request()->is('admin/branches/*') ? 'active' : '' }}">
                        <a class="nav-sub-link" href="{{ route('admin.branches.index') }}">
                            @lang('pages.positions.branches')
                            ({{ count(\App\Models\Position::all()->where('position_number', '>', 4)) }})
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            <!--/==/ End of Position -->

            <!-- Employees -->
            @can('employee_mgmt')
                <li class="nav-item {{ request()->url() == route('admin.employees.index') || request()->is('admin/employees/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.employees.index') }}">
                        <i class="fa fa-user-tie"></i><span class="sidemenu-label">
                            @lang('admin.sidebar.employees')
                            ({{ count(\App\Models\Employee::all()) }})
                        </span>
                    </a>
                </li>
            @endcan

            <!-- Exit Door -->
            @can('exit_door')
                <li class="nav-item {{ request()->is('admin/ed-trex') ||
                    request()->is('admin/ed-trex/*') ||
                    request()->is('admin/ed-export') ||
                    request()->is('admin/ed-empty') ||
                    request()->is('admin/ed-empty/*') ||
                    request()->is('admin/tr-returned') ||
                    request()->is('admin/ex-returned') ||
                    request()->is('admin/ed-rejected') ||
                    request()->is('admin/ed-rejected/*') ? 'active show' : '' }}">

                    <a class="nav-link with-sub" href="javascript:void(0)">
                        <i class="fa fa-door-open"></i>
                        <span class="sidemenu-label">@lang('pages.exitDoor.exitDoor')</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>

                    <ul class="nav-sub">
                        <!-- Transit && Export Vehicles -->
                        <li class="nav-sub-item {{ request()->is('admin/ed-trex') ||
                        request()->is('admin/ed-trex/*') || request()->is('admin/ed-export') ? 'active' : '' }}">
                            <a class="nav-sub-link" href="{{ route('admin.ed-trex.index') }}">
                                @lang('pages.exitDoor.trexGoods')
                            </a>
                        </li>

                        <!-- Empty Vehicles -->
                        <li class="nav-sub-item {{ request()->is('admin/ed-empty') ||
                        request()->is('admin/ed-empty/*') ? 'active' : '' }}">
                            <a class="nav-sub-link" href="{{ route('admin.ed-empty.index') }}">
                                @lang('pages.exitDoor.emptyVehicles')
                            </a>
                        </li>

                        <!-- Returned Vehicles -->
                        <li class="nav-sub-item {{ request()->is('admin/tr-returned') ||
                        request()->is('admin/ex-returned') ? 'active' : '' }}">
                            <a class="nav-sub-link" href="{{ route('admin.ed-trex.tr_returned') }}">
                                @lang('pages.exitDoor.returnedGoods')
                            </a>
                        </li>

                        <!-- Rejected Vehicles -->
                        <li class="nav-sub-item {{ request()->is('admin/ed-rejected') ||
                        request()->is('admin/ed-rejected/*') ? 'active' : '' }}">
                            <a class="nav-sub-link" href="{{ route('admin.ed-rejected.index') }}">
                                @lang('pages.exitDoor.rejectedGoods')
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            <!--/==/ End of Exit Door -->

            <!-- Applications -->
            <li class="nav-label">@lang('admin.sidebar.applications')</li>

            <!-- Settings -->
            @can('setting_mgmt')
                <li class="nav-item {{ request()->url() == route('admin.settings.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.settings.index') }}">
                        <i class="fe fe-settings"></i><span class="sidemenu-label">@lang('admin.sidebar.settings')</span>
                    </a>
                </li>
            @endcan

            <!-- User Management -->
            @can('user_mgmt')
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
                        <!-- Permissions -->
                        <li class="nav-sub-item {{ request()->is('admin/permissions') ||
                            request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <a class="nav-sub-link" href="{{ route('admin.permissions.index') }}">@lang('admin.sidebar.permissions')</a>
                        </li>

                        <!-- Roles -->
                        <li class="nav-sub-item {{ request()->is('admin/roles') ||
                            request()->is('admin/roles/*') ? 'active' : '' }}">
                            <a class="nav-sub-link" href="{{ route('admin.roles.index') }}">@lang('admin.sidebar.roles')</a>
                        </li>

                        <!-- Users -->
                        <li class="nav-sub-item {{ request()->is('admin/users') ||
                            request()->is('admin/users/*') ||
                            request()->is('admin/active-users') ||
                            request()->is('admin/inactive-users') ? 'active' : '' }}">
                            <a class="nav-sub-link" href="{{ route('admin.users.index') }}">@lang('admin.sidebar.users')</a>
                        </li>
                    </ul>
                </li>
            @endcan
            <!--/==/ End of User Management -->
        </ul>
    </div>
</div>
