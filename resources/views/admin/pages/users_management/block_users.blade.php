@extends('admin.layouts.master')
@section('title', 'Block List')
@section('style')
    <style>

    </style>
@endsection

@section('body')
    <input type="hidden" value="" name="id" id="id">
    <!-- BEGIN: Content-->
    <div class="app-content content">
   
        <div class="content-area-wrapper">
            
              <div class="container-fluid">
                <div class="row">
                 <div class="col-12 col-md-12 col-lg-2 col-xl-2">
            
            
            <div class="sidebar-left">
                <div style="margin-bottom: 30px; margin-top: 20px;" class="text-center">
                    <h1>Block List</h1>
                    <span>Block List</span>
                </div>
                <div class="sidebar">
                    <!-- User Chat profile area -->

                    <!--/ User Chat profile area -->
                    <!-- Chat Sidebar area -->
                    <div class="sidebar-content card">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="chat-fixed-search">
                            <div class="d-flex align-items-center">
                                <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100 meg-cont"
                                    style="position: relative;">


                                    <input type="text" class="form-control round" id="chat-search"
                                        placeholder="Search or start a new chat">
                                    <div class="icon-search-r">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div id="users-list" class="chat-user-list discover-list request-list list-group position-relative">
                            <ul class="chat-users-list-wrapper media-list user-side-list">

                                @include('admin.pages.components.block_user_list')
                            </ul>


                        </div>
                        <!-- <div class="chk-div">
                                            <input type="checkbox" name="" id=""><label for="">Select All</label>
                                        </div> -->
                        <!-- <button class="chk-btn">Approve</button>  -->
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>
            </div>
            
            <div class="col-12 col-md-12 col-lg-10 col-xl-10">
            <div class="content-right">
                <!-- Chat Sidebar area -->
                <div class="sidebar2-content card">
                    <div class="container">
                        <div class="row">
                         <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                  

                        <div id="user-details-div" style="background-color: #fff;" class="user-details-1 d-none">


                    </div>


                </div>
                        </div>
                    </div>


                </div>


                <!--/ Chat Sidebar area -->
            </div>
            </div>
          </div>
         </div>  
        </div>
    </div>
    <!-- END: Content-->



    {{-- To here --}}
@endsection



@section('script')


    <script src="{{ asset('assets/js/waitMe.js') }}"></script>
    <script>
        // $("#chat-search").keyup(function(e) {
        //     var type = 'block';
        //     var search = $(this).val();

        //     $.ajax({
        //         type: "post",
        //         url: "{{ route('user.search') }}",
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             'type': type,
        //             'search': search
        //         },
        //         success: function(res) {

        //             $('.user-side-list').html("");
        //             $('.user-side-list').html(res);
        //             if (res) {
        //                 $("#user-details-div").removeClass('d-none')
        //                 $(".user-side-list .req-profile").first().addClass("active")
        //                 var newid = $(".user-side-list .req-profile").first().attr("data-id")
        //                 $("#id").val(newid);
        //                 showRequestDetail(newid);

        //             } else {

        //                 $("#user-details-div").addClass('d-none')
        //             }

        //             // $('.user-side-list').html("");

        //         }
        //     });

        // });

        function showRequestDetail(id) {

            if (id) {

                $.ajax({
                    type: "post",
                    url: "{{ route('user.info') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "status": 1,
                        "id": id
                    },

                    success: function(res) {

                        $("#user-details-div").html("");
                        $("#user-details-div").removeClass('d-none');
                        $("#user-details-div").append(res);

                    }
                });
            }
        }


        $(document).ready(function() {
            $(".user-side-list .req-profile").first().addClass("active")
            var newid = $(".user-side-list .req-profile").first().attr("data-id")
            $("#id").val(newid);

            showRequestDetail(newid);
        });


        $(document).on("click", ".req-profile", function() {
            $(this).siblings().removeClass("active");
            var id = $(this).attr("data-id");
            $(this).addClass("active");
            $("#id").val(id);
            showRequestDetail(id);

        });

        $(document).on("click", ".unblock-btn", function() {

            var id = $(this).attr("data-id");
            $(".req-profile.active").remove();
            $(".user-side-list .req-profile").first().addClass("active")
            var newid = $(".user-side-list .req-profile").first().attr("data-id")
            if (id) {

                $.ajax({
                    type: "post",
                    url: "{{ route('user.unblock') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },

                    success: function(res) {
                        $("#user-details-div").addClass('d-none');
                        $("#req-profile" + id).remove();
                        showRequestDetail(newid);
                        $("#id").val(newid);


                    }
                });
            }
        });
    </script>
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
