@extends('admin.layouts.master')
@section('title', 'Help & Support')
@section('style')
    <style>

    </style>
@endsection

@section('body')
    <input type="hidden" value="" name="id" id="id">
    <div class="row">
        <div class="col-3">
            <h1>Help & Support</h1>
            <h6>Help & Support</h6>

            <div class="card mt-2 background-card sidebar-content card">
                <div class="card-content">
                    <div class="card-body " style="position: relative;">


                        <div class="scroller">
                            @include('admin.pages.users_management.ajax.user_support_msgs')
                        </div>



                    </div>

                    <div class="background-card">

                    </div>
                </div>

            </div>

        </div>
        <div class="col-7">
            <div class="card background-card">
                <div class="card-content">
                    <div class="card-body pt-30" style="position: relative;">
                        <div class="row m-2">


                            <div id="user-details-div" class="col-xl-12 col-md-12 col-sm-12 user-details ">
                                {{-- d-none  --}}
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Messages</h4>

                                            </div>
                                            <div class="card-content collapse show">
                                                <div class="card-body">
                                                    <div class="users-list-filter">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Messages</h4>

                                            </div>
                                            <div class="card-content collapse show">
                                                <div class="card-body">
                                                    <div class="users-list-filter">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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



@section('script')



    <script src="{{ asset('assets/js/waitMe.js') }}"></script>
    <script></script>
    <script>
        $(function() {

            $('#quickForm').validate({
                rules: {

                    first_name: {
                        required: true,
                    },

                    last_name: {
                        required: true,
                    },
                    profile: {
                        // required: true,
                        extension: "JPEG|PNG|JPG",
                    },
                    password_confirm: {
                        equalTo: "#password"
                    }

                },
                messages: {
                    // terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0])
        };
    </script>

    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>

@endsection
