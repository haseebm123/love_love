@extends('admin.layouts.master')
@section('title', 'Help & Support')
@section('style')
    <style>

    </style>
@endsection

@section('body')
    <input type="hidden" value="" name="id" id="id">
    <input type="hidden" value="" name="con_id" id="con_id">

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div style="margin-bottom: 30px; margin-top: 20px;">
                    <h1>Help & Support</h1>
                    <span>User Management / Help & Support</span>
                </div>
                <div class="sidebar">

                    <div class="sidebar-content card">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>

                        <div id="users-list" class="chat-user-list help-list list-group position-relative  user-side-list">
                            <ul class="chat-users-list-wrapper media-list">
                                @include('admin.pages.components.support_user_list')
                            </ul>
                        </div>
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>

            <div class="content-right">

                <div class="sidebar2-content card row msgs d-none ">
                    <div class="d-flex align-items-center row p-3 col-6   ">
                        <div class="cht-box">
                            <h1>Messages</h1>
                            <div id="user-conversation-div" class="cht-ps">

                            </div>

                        </div>
                        <div class="cht-inp">
                            <ul class="cht-inp-ul">
                                <!-- <li><a href=""><i class="fa-solid fa-paperclip"></i></a></li> -->
                                <li><input type="text" name="message" id="message" placeholder="Write a message"></li>
                                <div style="margin-left: 10px; display: flex; gap: 2px;">
                                    <li id="send-msg"><a href="javascript:;"><i class="fa-regular fa-send"></i></a></li>
                                    <!-- <li><a href=""><i class="fa-regular fa-face-smile"></i></a></li> -->
                                </div>
                            </ul>

                        </div>

                    </div>
                    <div id="user-details-div" class=" p-3 col-6 user-details-bx  d-none">
                        {{-- @include('admin.pages.users_management.ajax.user_detail_vertical') --}}


                    </div>
                </div>
            </div>

        </div>


    </div>
    </div>
@endsection



@section('script')
    <script>
        function showRequestDetail(id) {

            if (id) {

                $.ajax({
                    type: "post",
                    url: "{{ route('user.info1') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },

                    success: function(res) {
                        if (res) {

                            $("#user-details-div").html("");
                            $("#user-details-div").removeClass('d-none');
                            $("#user-details-div").addClass('d-flex');
                            $("#user-details-div").append(res);
                        } else {
                            $("#user-details-div").html("");
                            $("#user-details-div").addClass('d-none');
                            $("#user-details-div").removeClass('d-flex');
                        }

                    }
                });
            }
        }

        function getConversation(id) {

            if (id) {

                $.ajax({
                    type: "post",
                    url: "{{ route('get.conversation') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },

                    success: function(res) {

                        if (res) {

                            $("#user-conversation-div").html("");
                            $("#user-conversation-div").removeClass('d-none');
                            $("#user-conversation-div").append(res);
                            $(".msgs").removeClass('d-none')
                            scrollChatToBottom()
                        } else {
                            $("#user-conversation-div").html("");
                            $(".msgs").addClass('d-none')
                        }

                    }
                });
            }
        }

        function sendMsg(id) {
            var msg = $('#message').val();

            if (id && msg) {

                $('#message').val('');
                $.ajax({
                    type: "post",
                    url: "{{ route('send.message') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "user_id": id,
                        "msg": msg
                    },
                    success: function(res) {

                        if (res.type == 'success') {
                            toastr.success(res.message);
                            $("#user-conversation-div").append(`<div class="mychat">
                            <p>${msg}</p>
                            </div>`)
                        }
                        if (res.type == 'error') {
                            toastr.success(res.message);
                        }

                    }
                });
            }
        }

        $(document).ready(function() {
            $(".user-side-list .req-profile").first().addClass("active")

            var newid = $(".user-side-list .req-profile").first().attr("data-id")
            var conid = $(".user-side-list .req-profile").first().attr("data-fire")
            $("#id").val(newid);
            $("#con_id").val(conid);
            showRequestDetail(newid)
            getConversation(conid)
        });
        $(document).on("click", ".req-profile", function() {
            $(this).siblings().removeClass("active");
            var id = $(this).attr("data-id");
            var conid = $(this).attr("data-fire");
            $(this).addClass("active");
            $("#id").val(id);
            $("#con_id").val(conid);
            showRequestDetail(id);
            getConversation(conid)

        });
        $(document).on("click", "#send-msg", function() {
            var id = $("#id").val()
            $("#id").val(id);
            sendMsg(id);

        });


        function scrollChatToBottom() {
            var chatBox = $('.cht-ps');
            // var messages = chatBox.find('.message-container');
            var scrollHeight = 0;
            chatBox.each(function() {
                scrollHeight += $(this).outerHeight();
            });
            chatBox.scrollTop(scrollHeight);
        }
    </script>


    {{-- Extra --}}
    <script src="{{ asset('assets/js/waitMe.js') }}"></script>
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
