<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

@include('admin.includes.head')
<!-- END: Head-->

<!-- BEGIN: Body-->

<body
    class="vertical-layout vertical-menu-modern semi-dark-layout content-left-sidebar chat-application navbar-floating footer-static  "
    data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                        class="ficon feather icon-menu"></i></a></li>
                        </ul>

                    </div>
                    <ul class="nav navbar-nav float-right">


                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                data-toggle="dropdown">
                                <span><img class="round"
                                        src="{{asset('app-assets/images/portrait/small/avatar-s-11.jpg')}}" alt="avatar"
                                        height="40" width="40"></span>
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">John
                                        Doe</span><span class="user-status">Available</span></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                    href="page-user-profile.html"><i class="feather icon-user"></i> Edit Profile</a><a
                                    class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My
                                    Inbox</a><a class="dropdown-item" href="app-todo.html"><i
                                        class="feather icon-check-square"></i> Task</a><a class="dropdown-item"
                                    href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="auth-login.html"><i
                                        class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="{{asset('app-assets/images/icons/xlspng')}}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                            Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="{{asset('app-assets/images/icons/jpgpng')}}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="{{asset('app-assets/images/icons/pdfpng')}}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                            Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="{{asset('app-assets/images/icons/docpng')}}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web
                            Designer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="{{asset('app-assets/images/portrait/small/avatar-s-8.jpg')}}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="{{asset('app-assets/images/portrait/small/avatar-s-1.jpg')}}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="{{asset('app-assets/images/portrait/small/avatar-s-14.jpg')}}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                            Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="{{asset('app-assets/images/portrait/small/avatar-s-6.jpg')}}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web
                            Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span
                        class="mr-75 feather icon-alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item nav-logo"><a class="navbar-brand"
                        href="javascript:;">
                        <!-- <div class="brand-logo"></div> -->
                        <!-- <h2 class="brand-text mb-0">Vuexy</h2> -->
                        <img src="{{asset('app-assets/images/logo/Logo-01 2png')}}" alt="" class="logo">
                    </a></li>
            </ul>
        </div>
        <!-- <div class="shadow-bottom"></div> -->
        <div class="main-menu-content home">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


                <li class="nav-item @if (Route::currentRouteName() == 'users.management' || Route::currentRouteName() == 'users.discover.profile')    open   @endif "><a href="javascript:;"><i class="fa-solid fa-users-gear"></i><span
                            class="menu-title" data-i18n="User Management">User Management</span></a>
                    <ul class="">
                        <li class="@if (Route::currentRouteName() == 'users.management')   active  @endif"><a href="{{ route('users.management') }}"><span class="menu-item"
                                    data-i18n="Request For Profile">Request For Profile</span></a>
                        </li>
                        <li class="@if (Route::currentRouteName() == 'users.discover.profile')   active  @endif"><a href="{{ route('users.discover.profile') }}"><span class="menu-item" data-i18n="Discover Profile">Discover
                                    Profile</span></a>
                        </li>

                    </ul>
                </li>

                </li>
                <li class="nav-item @if (Route::currentRouteName() == 'accounts')   active  @endif "><a href="{{ route('accounts') }}"><i class="fa-solid fa-user-tag"></i></i><span
                            class="menu-title" data-i18n="Account">Account</span></a>
                </li>
                <li class=" nav-item  @if (Route::currentRouteName() == 'notification')   active  @endif  "><a href="{{ route('notification') }}"><i class="fa-solid fa-bell"></i><span
                            class="menu-title" data-i18n="Notification">Notification</span></a>
                </li>
                <li class="nav-item"><a href="javascript:;"><i class="fa-solid fa-newspaper"></i><span
                            class="menu-title" data-i18n="Content Moderation">Content Moderation</span></a>
                    <ul class="">
                        <li class=" @if (Route::currentRouteName() == 'terms') active  @endif"><a href="{{ route('terms') }}"><span class="menu-item"
                                    data-i18n="Term And Condition">Term And Condition</span></a>
                        </li>
                        <li class=" @if (Route::currentRouteName() == 'privacy') active  @endif"><a href="{{ route('privacy') }}"><span class="menu-item" data-i18n="Privacy Policy">Privacy
                                    Policy</span></a>
                        </li>
                        <li class=" @if (Route::currentRouteName() == 'help') active  @endif"><a href="{{ route('help') }}"><span class="menu-item" data-i18n="Help & Support">Help &
                                    Support</span></a>
                        </li>

                    </ul>
                </li>
                <li class=" nav-item @if (Route::currentRouteName() == 'users.block')   active  @endif"><a href="{{ route('users.block') }}"><i class="fa-solid fa-user-lock"></i><span
                            class="menu-title" data-i18n="Block List">Block List</span></a>
                </li>
                <li class=" nav-item @if (Route::currentRouteName() == 'settings') active  @endif"><a href="{{ route('settings') }}"><i class="fa-solid fa-user-shield"></i><span
                            class="menu-title" data-i18n="Privacy and Security Settings">Privacy and Security
                            Settings</span></a>
                </li>
                <li class=" nav-item @if (Route::currentRouteName() == 'communication_tool') active  @endif"><a href="{{ route('communication_tool') }}"><i class="fa-solid fa-comments"></i><span
                            class="menu-title" data-i18n="Calender">Communication Tools <br>(Messaging
                            Control)</span></a>
                </li>


                <li class=" nav-item @if (Route::currentRouteName() == 'support')   active  @endif"><a href="{{ route('support') }}"><i class="fa-solid fa-headset"></i><span class="menu-title"
                            data-i18n="Help and Support">Help and Support</span>
                        <!--<span class="badge badge badge-primary badge-pill float-right mr-2">New</span>-->
                    </a>

                </li>

                <li class=" nav-item @if (Route::currentRouteName() == 'logouts')   active  @endif"><a href="{{ route('logouts') }}"><i class="fa-solid fa-right-from-bracket"></i><span
                            class="menu-title" data-i18n="Authentication">Logout</span></a></li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('body')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('admin.includes.foot')
    <script>

        var html = '';

        function searchUser(type, search) {


        }
    </script>
    @yield('script')

</body>
<!-- END: Body-->

</html>
