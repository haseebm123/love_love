@extends('admin.layouts.master')
@section('title', 'Logout')
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

        .card {
            margin-left: 13rem;
            margin-right: 7rem;
        }
        .btn-primary{
            background-color:
        }
        .act-btn{
            background-color: #FFF;
        }
    </style>
@endsection

@section('body')
    {{-- Code Here --}}

    <div class="col-12 mb-5">



    </div>
    <div class="col-12">
        <div class="row">
            <div class="col p-50">

                <div class="card background-card">
                    <div class="card-content">
                        <div class="card-body " style="position: relative;">
                            <div class="card-body">
                                <div class="form">
                                    <div class="form-body">
                                         <h1 class="justify-center">Logout</h1>
                                         <p>Do you want to logout</p>
                                    </div>

                                    <div class="form-actions">
                                        <a href="{{ route('logout') }}" class="btn act-btn mr-1">Yes</a>
                                        <a class="btn act-btn">No</a>
                                    </div>
                                </div>
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
