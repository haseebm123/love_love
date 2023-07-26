@extends('admin.layouts.master')
@section('title', 'Logout')
@section('style')

@endsection

@section('body')
    {{-- Code Here --}}

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div style="margin-bottom: 30px; margin-top: 20px;">
                <h1>Logout</h1>
                <span>Logout</span>
                </div>
                <div class="sidebar-content logout-card card">
                    <fieldset class="form-group position-relative meg-cont">
                        <h1>Logout</h1>
                        <h4>Do you want to logout?</h4>
                    </fieldset>
                        <div>
                            <a href="{{ route('logout') }}" class="btn-yes">Yes</a>
                            <a href="{{ route('users.management') }}" class="btn-no"> No</a>

                        </div>

                </div>

            </div>


                <!--/ Chat Sidebar area -->
                </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection



@section('script')



    <script src="{{ asset('assets/js/waitMe.js') }}"></script>



    {{-- Extra --}}


@endsection
