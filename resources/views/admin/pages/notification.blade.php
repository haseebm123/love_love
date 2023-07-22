@extends('admin.layouts.master')
@section('title', 'Notification ')
@section('style')
    <style>

    </style>
@endsection
@section('body')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div style="margin-bottom: 30px; margin-top: 20px;">
                    <h1>Notification</h1>
                    <span>Notification</span>
                </div>
                <div class="sidebar">

                    <div class="sidebar-content card">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>

                        <div id="users-list" class="chat-user-list help-list list-group position-relative">

                            <ul class="chat-users-list-wrapper media-list">
                                @forelse ($data as $item)

                                    <li>
                                        <div class="user-chat-info">
                                            <div class="contact-info">
                                                <h5 class="font-weight-bold mb-0">{{ $item->description }}</h5>
                                                <p class="truncate"> </p>
                                            </div>
                                            <div class="contact-meta pr-2">

                                                <span class="avatar avatar-1 fa-notify m-0 avatar-md"><i
                                                        class="fa-solid fa-ellipsis-vertical fa-notify"></i>

                                                </span>
                                                <span class="float-right sp-1 mb-25">{{ Carbon\Carbon::parse($item->created_at)->format('d/m') }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @empty

                                @endforelse

                            </ul>



                        </div>
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>


            <!--/ Chat Sidebar area -->
        </div>
    </div>
    </div>
    <!-- END: Content-->


    {{-- To here --}}
@endsection


@section('footer-section')
@endsection

@section('footer-script')

    <!-- <script src="{{ asset('assets/js/countrystatecity.js?v2') }}"></script> -->

    <script src="{{ asset('assets/js/waitMe.js') }}"></script>



    {{-- Extra --}}
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
