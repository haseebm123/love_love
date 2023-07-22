@extends('admin.layouts.master')
@section('title', 'Request For Profile')
@section('style')
    <style>

    </style>
@endsection

@section('body')
    <input type="hidden" value="" name="id" id="id">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div style="margin-bottom: 30px; margin-top: 20px;">
                    <h1>Request Profile</h1>
                    <span>User Management / Request Profile</span>
                </div>
                <div class="sidebar">
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
                                    <div class="" style="position: absolute; left: 10px; top: 10px;">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="automate">
                            <label class="switch">
                                <input type="checkbox" @if (auth()->user()->automation == 1) checked @endif
                                    id="accountSwitch1">
                                <span class="slider round"></span>
                            </label>
                            <span> Automation</span>
                        </div>
                        <div id="users-list" class="chat-user-list request-list list-group position-relative">

                            <ul class="chat-users-list-wrapper media-list user-side-list">
                                @include('admin.pages.components.request_profile_user_list')

                            </ul>
                        </div>
                        <div class="chk-div">
                            <input type="checkbox" name="" id=""><label for="">Select
                                All</label>
                        </div>
                        <button id="approve-btn" data-approve="0" class="chk-btn">Approve</button>
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>
            <div class="content-right">
                <!-- Chat Sidebar area -->
                <div class="sidebar2-content card">
                    <div class="req-row">
                        <div class="req-col-1">
                            <i>30</i>
                            <h1>All Request</h1>
                            <h2 id="all-request">{{ $data['requestCount'] }}</h2>
                        </div>
                        <div class="req-clo-2">
                            <i>20</i>
                            <h1>Approved</h1>
                            <h2 id="approve-count">{{ $data['approvedCount'] }}</h2>
                        </div>
                        <div class="req-col-3">
                            <i>10</i>
                            <h1>Block</h1>
                            <h2 id="block-count">{{ $data['blockCount'] }}</h2>
                        </div>
                    </div>


                    <div class="req-col-12">
                        <div id="user-details-div" style="background-color: #fff;" class="user-details d-none">
                            {{-- @include('admin.pages.users_management.ajax.user_details_horizontal') --}}
                        </div>
                    </div>


                </div>
                <!--/ Chat Sidebar area -->
            </div>
        </div>
    </div>


    {{-- To here --}}
@endsection



@section('script')



    <script src="{{ asset('assets/js/waitMe.js') }}"></script>
    <script>
        function showRequestDetail(id) {

            if (id) {

                $.ajax({
                    type: "post",
                    url: "{{ route('user.info') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "status": 0,
                        "id": id
                    },

                    success: function(res) {

                        if (res) {

                            $("#user-details-div").html("");
                            $("#user-details-div").removeClass('d-none');
                            $("#user-details-div").append(res);
                        } else {
                            $("#user-details-div").html("");
                        }

                    }
                });
            }
        }

        function approveRequest(status) {
            var id;
            if (status == 0) {
                id = $("#id").val();

            }
            var approve_count = $("#approve-count").text();
            var req_count = $("#all-request").text();
            var a_count = approve_count;
            var r_count = req_count;

            $.ajax({
                type: "POST",
                url: "{{ route('user.approve') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "status": status
                },

                success: function(res) {
                    if (res.status == 1) {

                        $(".user-side-list").empty();
                    }
                    if (res.status == 0) {

                        $(".req-profile.active").remove();
                        $(".user-side-list .req-profile").first().addClass("active")
                        var newid = $(".user-side-list .req-profile").first().attr("data-id")
                        $("#id").val(newid);
                        showRequestDetail(newid);
                        a_count++
                        r_count--
                        $("#approve-count").text(a_count);
                        $("#all-request").text(r_count);
                    }
                    if (res.status == 2) {
                        $(".req-profile.active").remove();

                        $("#approve-count").text(r_count);
                        $("#all-request").text(0);
                    }





                }
            });

        }


        // $("#chat-search").keyup(function(e) {
        //     var type = 'request';
        //     var search = $(this).val();
        //     console.log(type);
        //     console.log(search);
        //     // $.ajax({
        //     //     type: "post",
        //     //     url: "{{ route('user.search') }}",
        //     //     data: {
        //     //         "_token": "{{ csrf_token() }}",
        //     //         'type': type,
        //     //         'search': search
        //     //     },
        //     //     success: function(res) {

        //     //             $('.user-side-list').html("");
        //     //             $('.user-side-list').html(res);
        //     //             if (res) {
        //     //                 $("#user-details-div").removeClass('d-none')
        //     //                 $(".user-side-list .req-profile").first().addClass("active")
        //     //                 var newid = $(".user-side-list .req-profile").first().attr("data-id")
        //     //                 $("#id").val(newid);
        //     //                 showRequestDetail(newid);

        //     //             }else{

        //     //                 $("#user-details-div").addClass('d-none')
        //     //             }

        //     //             // $('.user-side-list').html("");

        //     //     }
        //     // });



        // });

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

        $(document).on("click", ".block-btn", function() {

            var id = $(this).attr("data-id");
            var block_count = $("#block-count").text();
            var req_count = $("#all-request").text();

            var b_count = block_count;
            var r_count = req_count;
            console.log(block_count);
            $(".req-profile.active").remove();
            $(".user-side-list .req-profile").first().addClass("active")
            var newid = $(".user-side-list .req-profile").first().attr("data-id")


            if (id) {

                $.ajax({
                    type: "post",
                    url: "{{ route('user.block') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },

                    success: function(res) {
                        $("#user-details-div").addClass('d-none');
                        $("#req-profile" + id).remove();
                        showRequestDetail(newid);
                        $("#id").val(newid);
                        b_count++
                        r_count--
                        $("#block-count").text(b_count);
                        $("#all-request").text(r_count);
                    }
                });
            }
        });
        $("#accountSwitch1").change(function() {

            if (this.checked)
                var status = 1;
            else
                var status = 0;
            console.log(status);
            $.ajax({
                url: "{{ route('admin.automation') }}",
                type: 'GET',
                /*dataType: 'json',*/
                data: {
                    'status': status
                },
                success: function(response) {
                    if (response) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(error) {
                    toastr.error("Some error occured!");
                }
            });
        });

        $('input:checkbox').change(function() {

            if ($(this).is(":checked")) {
                $(".user-side-list .req-profile").addClass("active")
                $("#approve-btn").text("Approve All")
                $("#approve-btn").attr('data-approve', 1);

            } else {
                $(".user-side-list .req-profile").removeClass("active")
                $("#approve-btn").text("Approve")
                $("#approve-btn").attr('data-approve', 0);
            }
        });

        $(document).on("click", "#approve-btn", function() {
            var btn_val = $("#approve-btn").attr('data-approve');
            var status = 0;
            if (btn_val == 1) {
                status = 1
            }

            approveRequest(status)
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
