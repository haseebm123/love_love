<style>
    .image-icon {
        position: absolute;
        left: 15px;
        top: 6px;
        width: 20.495px;
        height: 30.495px;
    }

    .menu-title {

        color: #FFF;
        font-size: 16px;
        font-family: Lato;
        font-weight: 400;
        line-height: 84.5%;
    }
</style>

<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item m-auto">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('logo/logo.svg') }}" alt="logo">

                </a>
            </li>

        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item"><a href="#"><img class="image-icon"
                        src="{{ asset('icon/user_management.svg') }}" alt=""><span class="menu-title"
                        data-i18n="User">User</span></a>
                <ul class="menu-content">
                    <li class="@if (Route::currentRouteName() == 'users.index') active @endif"><a
                            href="{{ route('users.index') }}"><span class="menu-item" data-i18n="List">List</span></a>
                    </li>
                    <li class="@if (Route::currentRouteName() == 'users.create') active @endif"><a
                            href="{{ route('users.create') }}"><span class="menu-item" data-i18n="View">Create
                                User</span></a>
                    </li>

                </ul>
            </li>

            <li class=" nav-item">
                <a href="{{ route('admin.dashboard') }}">
                <img class="image-icon"
                        src="{{ asset('icon/accounts.svg') }}" alt=""><span class="menu-title"
                        data-i18n="Dashboard">Accounts</span></a>

            </li>




            {{-- Not in user --}}
            @can('role-list')
                <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title"
                            data-i18n="User">Roles Management</span></a>
                    <ul class="menu-content">
                        <li class="@if (Route::currentRouteName() == 'roles.index') active @endif"><a
                                href="{{ route('roles.index') }}"></i><span class="menu-item"
                                    data-i18n="List">List</span></a>
                        </li>
                        <li class="@if (Route::currentRouteName() == 'roles.create') active @endif"><a
                                href="{{ route('roles.create') }}"></i><span class="menu-item" data-i18n="View">Create
                                    User</span></a>
                        </li>

                    </ul>
                </li>
                <li class="menu-item " style="">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-settings"></i>
                        <div data-i18n="Roles &amp; Permissions">Roles &amp; Permissions</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item ">
                            <a href="app-access-roles.html" class="menu-link">
                                <div data-i18n="Roles">Roles</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="app-access-permission.html" class="menu-link">
                                <div data-i18n="Permission">Permission</div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan


        </ul>
    </div>
</div>
<!-- END: Main Menu-->
