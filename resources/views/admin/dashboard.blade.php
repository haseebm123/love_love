@extends('admin.layouts.master')
@section('title', 'Request For Profile')
@section('style')
    <style>
        .btn-rounded {

            border-radius: 17.347px;
            border: 0.964px solid #000;
            padding: 5px;
            font-size: 12px;
        }

        .background-card {
            background-color: #F4F4F4;
            border-radius:
                37px, 37px, 0px, 0px;
        }

        .card-radius {
            border-radius:
                37px, 37px, 0px, 0px;
        }

        .form-control-position {
            top: 22px !important;


        }

        .form-control {
            height: calc(2.25em + 2.4rem + 1px) !important;
        }

        .round {
            border-radius: 2.5rem !important;
        }

        .rouden {
            padding: 12px;
            border-radius: 35px;
            align-items: center;
            /* background: linear-gradient("#E895BF", "#B25383"); */
            background-image: linear-gradient(to bottom, #E895BF, #B25383);
        }

        .rouden h4,
        span {
            color: #fff;
        }

        .rouden.active {
            background-color: #D9D9D9;
            background-image: none !important;
        }

        .rouden.active h4,
        .rouden.active span {
            color: #000 !important
        }

        .scroller {
            overflow-y: scroll;
            width: 100%;
            height: 300px;
        }

        .custom-card {
            background: white;
            padding: 20px;
            border-radius: 26.223px;
        }

        .custom-card h2 {
            color: #121212;
            font-size: 33.939px;
            font-family: Lato;
            font-weight: 700;
            line-height: 130%;
            text-align: center
        }

        .custom-card h1 {
            color: #000;
            font-size: 80.78px;
            font-family: Lato;
            font-weight: 900;
            line-height: 130%;
            text-align: center
        }

        .dot {
            width: 16px;
            height: 16px;
            border-radius: 16px;
            background: #61A900;
            ;
        }

        .gap-10 {
            gap: 50px
        }

        .line {
            width: 2.219px;
            border-radius: 170.703px;
            opacity: 0.4399999976158142;
            background: #000;
        }

        .interests {
            border-radius: 20px;
            background: #E895BF;
            text-align: center;
            padding: 8px;
        }
    </style>
@endsection

@section('body')
    {{-- Code Here --}}
    <div class="row">
        <div class="col-4">
            <h1>Request Profile</h1>
            <h6>User Management / Request Profile</h6>

            <div class="card mt-2 background-card sidebar-content card">
                <div class="card-content">
                    <div class="card-body " style="position: relative;">
                        <fieldset class="form-group position-relative has-icon-left  p-50">
                            <input type="text" class="form-control round  h-10" id="chat-search"
                                placeholder="Search People">
                            <div class="form-control-position">
                                <i class="feather icon-search"></i>
                            </div>
                        </fieldset>

                        <div class="col-12 mb-1">
                            <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline float-right">
                                    <input type="checkbox" class="custom-control-input" checked="" id="accountSwitch1">
                                    <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                    <span class="switch-label w-100 black mb-2">Automation</span>
                                </div>
                            </div>
                        </div>

                        <div class="scroller">
                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden active">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden active">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden active">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden active">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42"
                                            width="42" alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden active">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42"
                                            width="42" alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden active">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42"
                                            width="42" alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden active">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42"
                                            width="42" alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden active">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42"
                                            width="42" alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden active">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42"
                                            width="42" alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden active">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42"
                                            width="42" alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden active">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42"
                                            width="42" alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden active">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42"
                                            width="42" alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden active">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42"
                                            width="42" alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden active">
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('icon/tick.png') }}" height="42" width="42"
                                            alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>

                                <div>
                                    <div>
                                        <h5 class="textWhite">James Robert</h5>
                                        <span class="textWhite">
                                            Hey there! I'm a 32-year-old guy who enjoys
                                        </span>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                            src="{{ asset('documents/profile/default.png') }}" height="42"
                                            width="42" alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card background-card">
                <div class="card-content">
                    <div class="card-body pt-50 p-4" style="position: relative;">
                        <div class="row mb-4">
                            <div class="col-4 custom-card">
                                <div class="dot"></div>
                                <h2>All Request </h2>
                                <h1>250</h1>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 custom-card">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-10">
                                        <div>
                                            <h1>Image</h1>
                                        </div>
                                        <div>
                                            <h6>James Robert</h6>
                                            <h6>Paris, France</h6>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn-rounded">Block Profile</button>
                                    </div>
                                </div>

                                <div class="d-flex gap-10">
                                    <div class="w-50">
                                        <h6>About</h6>
                                        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempus lacus
                                            in quam labret, eget finibus orci pharetra. Sed molestie leo eget urna egestas
                                            tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Donec nec luctus tortor, at sagittis orci. fames ac
                                            turpis egestas. Donec nec luctus tortor, at sagittis orci. fames ac </h6>
                                    </div>
                                    <div class="line"></div>
                                    <div class="w-50">
                                        <h6>interest </h6>
                                        <div class="row mt-4">
                                            <div class="col-4">
                                                <div class="interests">
                                                    <h6>Movie</h6>
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


@section('footer-section')
@endsection

@section('footer-script')

    <!-- <script src="{{ asset('assets/js/countrystatecity.js?v2') }}"></script> -->

    <script src="{{ asset('assets/js/waitMe.js') }}"></script>
    <script>
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })



        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": []
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

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
