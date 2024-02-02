<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="{{ route('index') }}" target="_blank">
            <span class="text-capitalize">BCHS</span>
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

            <!-- Asycuda -->
            @can('asycuda_view')
                <li class="nav-label">اسیکودا</li>

                <li class="nav-item {{ request()->is('admin/asycuda/users') ||
                    request()->is('admin/asycuda/users/*') ||
                    request()->is('admin/asycuda/inactive-users') ||
                    request()->is('admin/asycuda/coal') ||
                    request()->is('admin/asycuda/coal/*') ||
                    request()->is('admin/asycuda/expired-coal') ? 'active show' : '' }}">

                    <a class="nav-link with-sub" href="javascript:void(0)">
                        <i class="ion ion-ios-desktop"></i>
                        <span class="sidemenu-label">اسیکودا</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>

                    <ul class="nav-sub">
                        <!-- Employees Users -->
                        @can('asy_user_view')
                            <li class="nav-sub-item {{ request()->is('admin/asycuda/users') || request()->is('admin/asycuda/users/*') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.asycuda.users.index') }}">
                                    یوزر ها
                                    ({{ count(\App\Models\Asycuda\AsycudaUser::all()->where('status', 1)) }})
                                </a>
                            </li>

                            <!-- Employees Inactive Users -->
                            <li class="nav-sub-item {{ request()->is('admin/asycuda/inactive-users') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.asycuda.users.inactive') }}">
                                    یوزر های غیرفعال
                                    ({{ count(\App\Models\Asycuda\AsycudaUser::all()->where('status', 0)) }})
                                </a>
                            </li>
                        @endcan

                        <!-- Companies Activity License -->
                        @can('asy_coal_view')
                            <li class="nav-sub-item {{ request()->is('admin/asycuda/coal') || request()->is('admin/asycuda/coal/*') ? 'active' : '' }}">
                                <a class="nav-sub-link"
                                   href="{{ route('admin.asycuda.coal.index') }}">
                                    جواز فعالیت شرکت ها
                                    ({{ count(\App\Models\Asycuda\COAL::all()->where('status', 1)) }})
                                </a>
                            </li>

                            <!-- Expired Companies Activity License -->
                            <li class="nav-sub-item {{ request()->is('admin/asycuda/expired-coal') ? 'active' : '' }}">
                                <a class="nav-sub-link"
                                   href="{{ route('admin.asycuda.coal.expired') }}">
                                    جواز فعالیت ختم شده
                                    ({{ count(\App\Models\Asycuda\COAL::all()->where('status', 0)) }})
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <!--/==/ End of Asycuda -->

            <!-- Office Routes -->
            @can('office_view')
                <li class="nav-label">@lang('admin.sidebar.officeManagement')</li>

                <!-- Positions -->
                @can('office_position_view')
                    <li class="nav-item {{ request()->is('admin/office/positions') ||
                    request()->is('admin/office/positions/*') ||
                    request()->is('admin/office/appointment-positions') ||
                    request()->is('admin/office/empty-positions') ||
                    request()->is('admin/office/inactive-positions') ? 'active show' : '' }}">

                        <a class="nav-link with-sub" href="javascript:void(0)">
                            <i class="fe fe-life-buoy"></i>
                            <span class="sidemenu-label">@lang('admin.sidebar.positions')</span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>

                        <ul class="nav-sub">
                            <!-- Positions -->
                            <li class="nav-sub-item {{ request()->is('admin/office/positions') ||
                                request()->is('admin/office/positions/*') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.positions.index') }}">
                                    {<span class="small text-sm-center tx-danger">M</span>}
                                    @lang('pages.positions.allPositions')
                                    ({{ count(\App\Models\Office\Position::all()) }})
                                </a>
                            </li>

                            <!-- Appointment Positions -->
                            <li class="nav-sub-item {{ request()->is('admin/office/appointment-positions') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.positions.appointment') }}">
                                    @lang('pages.positions.appointmentPositions')
                                        <?php $appointment = \App\Models\Office\Position::all()->sum('num_of_pos') - \App\Models\Office\Employee::all()->where('status', 1)->count(); ?>
                                    ({{ \App\Models\Office\Position::all()->sum('num_of_pos') - $appointment }})
                                </a>
                            </li>

                            <!-- Empty Positions -->
                            <li class="nav-sub-item {{ request()->is('admin/office/empty-positions') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.positions.empty') }}">
                                    @lang('pages.positions.emptyPositions')
                                    ({{ \App\Models\Office\Position::all()->sum('num_of_pos') - \App\Models\Office\Employee::all()->where('status', 1)->count() }}
                                    )
                                </a>
                            </li>

                            <!-- Inactive Positions -->
                            <li class="nav-sub-item {{ request()->is('admin/office/inactive-positions') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.positions.inactive') }}">
                                    @lang('pages.positions.inactivePositions')
                                    ({{ \App\Models\Office\Position::all()->where('status', 0)->count() }})
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                <!--/==/ End of Position -->

                <!-- Employees -->
                @can('office_employee_view')
                    <li class="nav-item {{ request()->is('admin/office/employees') ||
                    request()->is('admin/office/employees/*') ||
                    request()->is('admin/office/main-employees') ||
                    request()->is('admin/office/on-duty-employees') ||
                    request()->is('admin/office/employee/change-position-employees') ||
                    request()->is('admin/office/employee/fired-employees') ||
                    request()->is('admin/office/employee/suspended-employees') ||
                    request()->is('admin/office/employee/retired-employees') ? 'active show' : '' }}">

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
                                    {<span class="small text-sm-center tx-danger">M</span>}
                                    همه کارمندان
                                    ({{ count(\App\Models\Office\Employee::all()->whereNotNull('position_id')->where('status', 1)) }}
                                    )
                                </a>
                            </li>

                            <!-- Main Position Employees -->
                            <li class="nav-sub-item {{ request()->is('admin/office/main-employees') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.employees.main') }}">
                                    @lang('pages.employees.mainPosition')
                                    ({{ \App\Models\Office\Employee::all()->whereNotNull('position_id')->where('status', 1)->where('on_duty', 0)->count() }}
                                    )
                                </a>
                            </li>

                            <!-- On Duty Employees -->
                            <li class="nav-sub-item {{ request()->is('admin/office/on-duty-employees') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.employees.on_duty') }}">
                                    @lang('pages.employees.onDuty')
                                    ({{ \App\Models\Office\Employee::all()->whereNotNull('position_id')->where('status', 1)->where('on_duty', 1)->count() }}
                                    )
                                </a>
                            </li>

                            <!-- Change Position Employees -->
                            <li class="nav-sub-item {{ request()->is('admin/office/employee/change-position-employees') ? 'active' : '' }}">
                                <a class="nav-sub-link"
                                   href="{{ route('admin.office.employees.change_position_employees') }}">
                                    تبدیل شده
                                    ({{ \App\Models\Office\Employee::all()->where('status', 0)->count() }})
                                </a>
                            </li>

                            <!-- Fired Employees -->
                            <li class="nav-sub-item {{ request()->is('admin/office/employee/fired-employees') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.employees.fired_employees') }}">
                                    منفکی
                                    ({{ \App\Models\Office\Employee::all()->whereNull('position_id')->where('status', 2)->count() }}
                                    )
                                </a>
                            </li>

                            <!-- Retired Employees -->
                            <li class="nav-sub-item {{ request()->is('admin/office/employee/retired-employees') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.employees.retired_employees') }}">
                                    متقاعدین
                                    ({{ \App\Models\Office\Employee::all()->whereNull('position_id')->where('status', 4)->count() }}
                                    )
                                </a>
                            </li>

                            <!-- Suspended Employees -->
                            <li class="nav-sub-item {{ request()->is('admin/office/employee/suspended-employees') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.employees.suspended_employees') }}">
                                    <span class="text-secondary">معلق </span>&nbsp;
                                    ({{ \App\Models\Office\Employee::all()->whereNull('position_id')->where('status', 3)->count() }}
                                    )
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                <!--/==/ End of Employees -->

                <!-- Agents -->
                @can('office_agent_view')
                    <li class="nav-item {{ request()->is('admin/office/agents') ||
                    request()->is('admin/office/agents/*') ||
                    request()->is('admin/office/agent/add-company/*') ||
                    request()->is('admin/office/agent/add-colleague/*') ||
                    request()->is('admin/office/inactive-agents') ||
                    request()->is('admin/office/agent-colleagues') ||
                    request()->is('admin/office/agent-colleagues/*') ||
                    request()->is('admin/office/inactive-agent-colleagues') ? 'active show' : '' }}">

                        <a class="nav-link with-sub" href="javascript:void(0)">
                            <i class="fa fa-user-tie"></i>
                            <span class="sidemenu-label">@lang('pages.companies.agents')</span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>

                        <ul class="nav-sub">
                            <!-- Agents -->
                            <li class="nav-sub-item {{ request()->is('admin/office/agents') ||
                            request()->is('admin/office/agents/*') ||
                            request()->is('admin/office/agent/add-company/*') ||
                            request()->is('admin/office/agent/add-colleague/*') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.agents.index') }}">
                                    @lang('pages.companies.agents')
                                    ({{ \App\Models\Office\Agent::all()->where('status', 1)->count() }})
                                </a>
                            </li>

                            <!-- Inactive Agents -->
                            <li class="nav-sub-item {{ request()->is('admin/office/inactive-agents') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.agents.inactive') }}">
                                    نماینده های غیرفعال
                                    ({{ count(\App\Models\Office\Agent::all()->where('status', 0)) }})
                                </a>
                            </li>

                            <!-- Agent Colleagues -->
                            <li class="nav-sub-item {{ request()->is('admin/office/agent-colleagues') ||
                            request()->is('admin/office/agent-colleagues/*') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.agent-colleagues.index') }}">
                                    همکاران نماینده ها
                                    ({{ count(\App\Models\Office\AgentColleague::all()->where('status', 1)) }})
                                </a>
                            </li>

                            <!-- Agent Inactive Colleagues -->
                            <li class="nav-sub-item {{ request()->is('admin/office/inactive-agent-colleagues') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.agent-colleagues.inactive') }}">
                                    همکاران نماینده ها (غیرفعال)
                                    ({{ count(\App\Models\Office\AgentColleague::all()->where('status', 0)) }})
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                <!--/==/ End of Agents -->

                <!-- Companies -->
                @can('office_company_view')
                    <li class="nav-item {{ request()->is('admin/office/companies') ||
                    request()->is('admin/office/companies/*') ||
                    request()->is('admin/office/inactive-companies') ? 'active show' : '' }}">

                        <a class="nav-link with-sub" href="javascript:void(0)">
                            <i class="fa fa-shopping-bag"></i>
                            <span class="sidemenu-label">@lang('admin.sidebar.companies')</span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>

                        <ul class="nav-sub">
                            <!-- Active Companies -->
                            <li class="nav-sub-item {{ request()->is('admin/office/companies') ||
                        request()->is('admin/office/companies/*') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.companies.index') }}">
                                    @lang('admin.sidebar.companies')
                                    ({{ count(\App\Models\Office\Company::all()->where('status', 1)) }})
                                </a>
                            </li>

                            <!-- Inactive Companies -->
                            <li class="nav-sub-item {{ request()->is('admin/office/inactive-companies') ? 'active' : '' }}">
                                <a class="nav-sub-link" href="{{ route('admin.office.companies.inactive') }}">
                                    شرکت های غیرفعال
                                    ({{ count(\App\Models\Office\Company::all()->where('status', 0)) }})
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                <!--/==/ End of Companies -->

                <!-- Hostel -->
                @can('office_hostel_view')
                    <li class="nav-item {{ request()->url() == route('admin.office.hostel.index') || request()->is('admin/office/hostel/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.office.hostel.index') }}">
                            <i class="fa fa-building"></i><span class="sidemenu-label">@lang('pages.hostel.hostel')</span>
                        </a>
                    </li>
                @endcan
            @endcan

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
