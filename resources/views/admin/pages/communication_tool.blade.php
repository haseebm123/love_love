@extends('admin.layouts.master')
@section('title', 'Help & Support')
@section('style')
    <style>

    </style>
@endsection

@section('body')
    {{-- <input type="hidden" value="" name="sender_id" id="sender_id">
    <input type="hidden" value="" name="sender_id" id="sender_id"> --}}
    <!-- BEGIN: Content-->
    <div class="app-content content">
      
        <div class="content-area-wrapper">
            <div class="container-fluid">
                <div class="row">
                 <div class="col-12 col-md-12 col-lg-2 col-xl-2">
            
            <div class="sidebar-left">
                <div style="margin-bottom: 30px; margin-top: 20px;">
                    <h1>Disappear Messages</h1>
                    <span>Disappear Messages</span>
                </div>
                <div class="sidebar">
                    <!-- User Chat profile area -->

                    <!--/ User Chat profile area -->
                    <!-- Chat Sidebar area -->
                    <div class="sidebar-content card">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                        <!-- <div class="chat-fixed-search">

                            </div> -->
                        <div id="users-list" class="chat-user-list list-group position-relative ">

                            <ul class="chat-users-list-wrapper media-list text-center user-side-list">
                                @include('admin.pages.components.disappear_msg_user')
                            </ul>



                        </div>
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>
            </div>
            
            <div class="col-12 col-md-12 col-lg-10 col-xl-10">
            <div class="content-right" >
                <!-- Chat Sidebar area -->
                
                
                <div class="sidebar2-content card row" id="content-right">
                    
                    <div class="container">
                        <div class="row">
                         <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="d-flex align-items-center row p-3 ">
                        <div class="cht-box">
                            <h1>Messages</h1>
                            <div id="user-conversation-div" class="cht-ps">

                            </div>
                            {{-- <div class="cht-ps">

                                    <div class="mychat">
                                        <p>I'm really into hiking and camping. I love being out in nature and exploring new trails.</p>
                                    </div>
                                    <div class="other-chat">

                                        <p>Hi there! How are you?</p>
                                    </div>
                                    <div class="other-chat">
                                        <p>I'm doing pretty well, thanks for asking. So, tell me a little bit about yourself. What do you like to do for fun?</p>
                                    </div>
                                    <div class="mychat">
                                        <p>I'm good. How about you?</p>
                                    </div>
                                    <div class="mychat">
                                        <p>I'm really into hiking and camping. I love being out in nature and exploring new trails.</p>
                                    </div>
                                    <!-- <h5>I'm doing pretty well, thanks for asking. So, tell me a little bit about yourself. What do you like to do for fun?</h5>
                                    <P>I'm good. How about you?</P>
                                    <P>I'm really into hiking and camping. I love being out in nature and exploring new trails.</P> -->
                                </div> --}}

                        </div>
                        <div class="cht-inp">
                            <ul class="cht-inp-ul">
                               
                                <li><input type="text" placeholder="Write a message"></li>
                                <div style="margin-left: 10px; display: flex; gap: 2px;">
                                    <li><a href=""><i class="fa-regular fa-send"></i></a></li>
                                 
                                </div>
                            </ul>

                        </div>

                    </div>
                    </div>
                    
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div id="user-details-div" class="  user-details-bx d-none">

                        {{-- <div style="background-color: #fff;" class="user-details">
                                  <div class="users">
                                    <img class="user-img-outline" src="../../../assets/img/user.svg"/>
                                    <div class="user-div" style="text-align: center;">
                                    <h1>James Robert</h1>
                                    <div style="display: flex;gap:5px; align-items: center; justify-content: center;">
                                         <img  src="../../../assets/img/abdulghanni.svg"/>
                                        <h6 style="margin-bottom: 0%;">Paris, France</h6></div>
                                    </div>
                                    <div  class="block-btn">
                                        <h6 style="margin-bottom: 0%; font-size: 0.8rem;"><i class="fa-solid fa-ban"></i> Block Profile</h6>
                                    </div>
                                  </div>
                                  <div style="margin-top: 20px;" class="user-about">
                                    <h4 class="head4">About</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempus lacus in quam labret, eget finibus orci pharetra. Sed molestie leo eget urna egestas tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec nec luctus tortor, at sagittis orci. fames ac turpis egestas. Donec nec luctus tortor, at sagittis orci. fames ac
                                    </p>
                                  </div>
                                  <div style="margin-top: 50px;">
                                    <h4 class="head4">Interest</h4>
                                    <div class="d-flex flex-wrap justify-content-between" style="gap: 10px 5px; margin-top: 10px">
                                        <div class="interests active">
                                            <h6>Movie</h6>
                                        </div>
                                         <div class="interests">
                                            <h6>Photography</h6>
                                        </div>
                                        <div class="interests">
                                            <h6>Design</h6>
                                        </div>
                                         <div class="interests">
                                            <h6>Reading Book</h6>
                                        </div>
                                        <div class="interests">
                                            <h6>Singing</h6>
                                        </div>
                                        <div class="interests">
                                            <h6>Music</h6>
                                        </div>
                                    </div>
                                  </div>
                            </div> --}}
                    </div>
                </div>
                </div>
             </div>
            </div>
            </div>
            </div>
            
            <!--/ Chat Sidebar area -->
            </div>
            </div>
        </div>

        <!-- <div class="content-wrapper">
                        <div class="content-header row">
                        </div>
                        <div class="content-body">
                            <div class="chat-overlay"></div>
                            <section class="chat-app-window">
                                <div class="start-chat-area">
                                    <span class="mb-1 start-chat-icon feather icon-message-square"></span>
                                    <h4 class="py-50 px-1 sidebar-toggle start-chat-text">Start Conversation</h4>
                                </div>
                                <div class="active-chat d-none">
                                    <div class="chat_navbar">
                                        <header class="chat_header d-flex justify-content-between align-items-center p-1">
                                            <div class="vs-con-items d-flex align-items-center">
                                                <div class="sidebar-toggle d-block d-lg-none mr-1"><i class="feather icon-menu font-large-1"></i></div>
                                                <div class="avatar user-profile-toggle m-0 m-0 mr-1">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="" height="40" width="40" />
                                                    <span class="avatar-status-busy"></span>
                                                </div>
                                                <h6 class="mb-0">Felecia Rower</h6>
                                            </div>
                                            <span class="favorite"><i class="feather icon-star font-medium-5"></i></span>
                                        </header>
                                    </div>
                                    <div class="user-chats">
                                        <div class="chats">
                                            <div class="chat">
                                                <div class="chat-avatar">
                                                    <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="avatar" height="40" width="40" />
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-content">
                                                        <p>How can we help? We're here for you!</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="40" width="40" />
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-content">
                                                        <p>Hey John, I am looking for the best admin template.</p>
                                                        <p>Could you please help me to find it out?</p>
                                                    </div>
                                                    <div class="chat-content">
                                                        <p>It should be Bootstrap 4 compatible.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="divider">
                                                <div class="divider-text">Yesterday</div>
                                            </div>
                                            <div class="chat">
                                                <div class="chat-avatar">
                                                    <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="avatar" height="40" width="40" />
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-content">
                                                        <p>Absolutely!</p>
                                                    </div>
                                                    <div class="chat-content">
                                                        <p>Vuexy admin is the responsive bootstrap 4 admin template.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="40" width="40" />
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-content">
                                                        <p>Looks clean and fresh UI.</p>
                                                    </div>
                                                    <div class="chat-content">
                                                        <p>It's perfect for my next project.</p>
                                                    </div>
                                                    <div class="chat-content">
                                                        <p>How can I purchase it?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat">
                                                <div class="chat-avatar">
                                                    <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="avatar" height="40" width="40" />
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-content">
                                                        <p>Thanks, from ThemeForest.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="40" width="40" />
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-content">
                                                        <p>I will purchase it for sure.</p>
                                                    </div>
                                                    <div class="chat-content">
                                                        <p>Thanks.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat">
                                                <div class="chat-avatar">
                                                    <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                                        <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="avatar" height="40" width="40" />
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-content">
                                                        <p>Great, Feel free to get in touch on</p>
                                                    </div>
                                                    <div class="chat-content">
                                                        <p>https://pixinvent.ticksy.com/</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-app-form">
                                        <form class="chat-app-input d-flex" onsubmit="enter_chat();" action="javascript:void(0);">
                                            <input type="text" class="form-control message mr-1 ml-50" id="iconLeft4-1" placeholder="Type your message">
                                            <button type="button" class="btn btn-primary send" onclick="enter_chat();"><i class="fa fa-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Send</span></button>
                                        </form>
                                    </div>
                                </div>
                            </section>

                            <div class="user-profile-sidebar">
                                <header class="user-profile-header">
                                    <span class="close-icon">
                                        <i class="feather icon-x"></i>
                                    </span>
                                    <div class="header-profile-sidebar">
                                        <div class="avatar">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="user_avatar" height="70" width="70">
                                            <span class="avatar-status-busy avatar-status-lg"></span>
                                        </div>
                                        <h4 class="chat-user-name">Felecia Rower</h4>
                                    </div>
                                </header>
                                <div class="user-profile-sidebar-area p-2">
                                    <h6>About</h6>
                                    <p>Toffee caramels jelly-o tart gummi bears cake I love ice cream lollipop. Sweet liquorice croissant candy danish dessert icing. Cake macaroon gingerbread toffee sweet.</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div> -->
    </div>
    </div>
    <!-- END: Content-->
@endsection



@section('script')



    <script src="{{ asset('assets/js/waitMe.js') }}"></script>
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

        function getConversation(sender_id,receiver_id) {

            if (sender_id && receiver_id) {

                $.ajax({
                    type: "post",
                    url: "{{ route('disappear.msg') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "sender_id": sender_id,
                        "receiver_id": receiver_id,
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



        $(document).ready(function() {
            $(".user-side-list .req-profile").first().addClass("active")
            var sender_id = $(".user-side-list .req-profile").first().attr("data-sender-id")
            var receiver_id = $(".user-side-list .req-profile").first().attr("data-receiver-id")

            showRequestDetail(sender_id)
            getConversation(sender_id,receiver_id)
        });
        $(document).on("click", ".req-profile", function() {
            $(this).siblings().removeClass("active");
            var sender_id = $(this).attr("data-sender-id");
            var receiver_id =$(this).attr("data-receiver-id")
            $(this).addClass("active");

            showRequestDetail(sender_id);
            getConversation(sender_id,receiver_id)

        });

        $(document).on("click", ".block-btn", function() {

            var id = $(this).attr("data-id");


            $(".req-profile.active").remove();
            $(".user-side-list .req-profile").first().addClass("active");
            var newid = $(".user-side-list .req-profile").first().attr("data-id");
             

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
                        $(".req-profile" + id).remove();
                        showRequestDetail(newid);
                        $('.req-profile .req-profile'+id).remove();
                        $("#id").val(newid);            //

                    }
                });
            }
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
