<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="{{ route('index') }}" target="_blank">
            <img src="{{ asset('backend/assets/img/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{ asset('backend/assets/img/brand/icon.png') }}" class="header-brand-img icon-logo" alt="logo">
            <img src="{{ asset('backend/assets/img/brand/logo-light.png') }}" class="header-brand-img desktop-logo theme-logo" alt="logo">
            <img src="{{ asset('backend/assets/img/brand/icon-light.png') }}" class="header-brand-img icon-logo theme-logo" alt="logo">
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

            <!-- Applications -->
            <li class="nav-label">@lang('admin.dashboard.pages')</li>

            <!-- User Management -->
            @can('user_management_access')
            <li class="nav-item {{ request()->is('admin/permissions') ||
                    request()->is('admin/permissions/*') ||
                    request()->is('admin/roles') ||
                    request()->is('admin/roles/*') ||
                    request()->is('admin/users') ||
                    request()->is('admin/users/*') ? 'active show' : '' }}">
                <a class="nav-link with-sub" href="#">
                    <i class="fe fe-user"></i>
                    <span class="sidemenu-label">@lang('admin.sidebar.userManagement')</span>
                    <i class="angle fe fe-chevron-right"></i>
                </a>

                <ul class="nav-sub">
                    <!-- Permissions -->
                    @can('permission_access')
                    <li class="nav-sub-item {{ request()->is('admin/permissions') ||
                    request()->is('admin/permissions/*') ? 'active' : '' }}">
                        <a class="nav-sub-link" href="{{ route('admin.permissions.index') }}">@lang('admin.sidebar.permissions')</a>
                    </li>
                    @endcan

                    <!-- Roles -->
                    @can('role_access')
                    <li class="nav-sub-item {{ request()->is('admin/roles') ||
                    request()->is('admin/roles/*') ? 'active' : '' }}">
                        <a class="nav-sub-link" href="{{ route('admin.roles.index') }}">@lang('admin.sidebar.roles')</a>
                    </li>
                    @endcan

                    <!-- Users -->
                    @can('user_access')
                    <li class="nav-sub-item {{ request()->is('admin/users') ||
                    request()->is('admin/users/*') ? 'active' : '' }}">
                        <a class="nav-sub-link" href="{{ route('admin.users.index') }}">@lang('admin.sidebar.users')</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            <!--/==/ End of User Management -->

            <li class="nav-item">
                <a class="nav-link" href="widgets.html"><i class="fe fe-database"></i><span class="sidemenu-label">Widgets</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link with-sub" href="#"><i class="fe fe-mail"></i><span class="sidemenu-label">Mail</span><span class="badge badge-primary side-badge">2</span></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="mail.html">Mail-Inbox</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="viewmail.html">View-Mail</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link with-sub" href="#"><i class="fe fe-box"></i><span class="sidemenu-label">Apps</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="chat.html">Chat</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="cards.html">Cards</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="calendar.html">Calendar</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="contacts.html">Contacts</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
