@extends('admin.layouts.master')
@section('title', 'Privacy & Security Settings ')
@section('style')

@endsection

@section('body')
    {{-- Code Here --}}
     <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div style="margin-bottom: 30px; margin-top: 20px;">
                <h1>Privacy & Security Settings</h1>
                <span>Privacy and Security Settings</span>
                </div>
                <form action="{{ route('admin.update') }}" method="POST">
                    @csrf
                    <div class="sidebar-content privacy-card privacy-card1 card">
                        <div>
                            <div class="input-icons">
                                <p>Email:</p>
                                <i class="fa-solid fa-pencil"></i>
                                <input type="email" class="input-field" id="email" name="email" value="{{ auth()->user()->email }}" type="text" placeholder="123 456 789">
                            </div>
                        </div>
                        <div>
                            <div class="input-icons ifield-1">
                                <p>Password:</p>
                                <input type="password" id="password" name="password" class="input-field" value="" type="text" placeholder="*******">
                                <button type="submit" class="ps-btn">Next</button>
                            </div>
                        </div>
                        <div>
                            <div class="input-icons">
                                <p>Phone:</p>
                                <i class="fa-solid fa-pencil"></i>
                                <input type="tel" id="phone" name="phone" value="{{ auth()->user()->phone }}" class="input-field" type="text" placeholder="">
                            </div>
                        </div>
                    </div>
                </form>

            </div>


                <!--/ Chat Sidebar area -->
                </div>
        </div>
    </div>

    {{-- To here --}}
@endsection


@section('footer-section')
@endsection

@section('footer-script')

    <!-- <script src="{{ asset('assets/js/countrystatecity.js?v2') }}"></script> -->

    <script src="{{ asset('assets/js/waitMe.js') }}"></script>



    {{-- Extra --}}


@endsection
