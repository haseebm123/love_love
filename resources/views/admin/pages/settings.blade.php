@extends('admin.layouts.master')
@section('title', 'Privacy & Security Settings ')
@section('style')
    <style>
        .p-50 {
            padding: 15.5rem !important;
        }

        .form-control {
            border-radius: 2rem !important;
            border: 1px solid #737373 !important;
            opacity: 0.20000000298023224 !important;
        }
    </style>
@endsection

@section('body')
    {{-- Code Here --}}

    <div class="col-12 mb-5">
        <h1>Privacy & Security Settings</h1>
        <h6>Privacy & Security Settings</h6>


    </div>
    <div class="col-12">
        <div class="row">
            <div class="col p-50">

                <div class="card background-card">
                    <div class="card-content">
                        <div class="card-body pt-30" style="position: relative;">
                            <form class="form-horizontal" novalidate="" method="POST" action="{{ route('admin.update') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control mt-1"
                                                    data-validation-required-message="This Email field is required"
                                                    placeholder="Email" aria-invalid="false"
                                                    value="{{ auth()->user()->email }}" required>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <div class="controls">
                                                <input type="password" name="password" class="form-control mt-1"

                                                    placeholder="Password" aria-invalid="false">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="form-group align-items-center" >

                                            <svg xmlns="http://www.w3.org/2000/svg" width="600" height="2"
                                                viewBox="0 0 600 2" fill="none">
                                                <path d="M1.37109 0.935547L399.871 0.935547" stroke="#000022"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><strong>Phone Number</strong></label>
                                            <div class="controls">
                                                <input type="tel" name="phone" class="form-control mt-1"
                                                    data-validation-required-message="This Phone field is required"
                                                    placeholder="Phone " aria-invalid="false"
                                                    value="{{ auth()->user()->phone }}"
                                                    >
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
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
