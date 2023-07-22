@extends('admin.layouts.master')
@section('title', 'Discover Profile')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/pages/app-chat.css') }}">
@endsection

@section('body')
     <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div style="margin-bottom: 30px; margin-top: 20px;">
                <h1>Discover Profile</h1>
                <span>User Management / Discover Profile</span>
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
                                <!-- <div class="sidebar-profile-toggle position-relative d-inline-flex">

                                    <div class="avatar">
                                        <img src="../app-assets/images/portrait/small/avatar-s-11.jpg" alt="user_avatar" height="40" width="40">
                                        <span class="avatar-status-online"></span>
                                    </div>
                                    <div class="bullet-success bullet-sm position-absolute"></div>
                                </div> -->
                                <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100 meg-cont" style="position: relative;">


                                    <input type="text" class="form-control round" id="chat-search" placeholder="Search or start a new chat">
                                    <div class="" style="position: absolute; left: 10px; top: 10px;">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div id="users-list" class="chat-user-list list-group position-relative">

                            <ul class="chat-users-list-wrapper media-list">
                                <li>
                                    <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="../app-assets/images/portrait/small/avatar-s-3.jpg" height="42" width="42" alt="Generic placeholder image">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">Elizabeth Elliott</h5>
                                            <p class="truncate">Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing</p>
                                        </div>
                                        <div class="contact-meta">

                                                <img class="media-object rounded-circle" src="../app-assets/images/portrait/small/avatar-s-3.jpg" height="30" width="30" alt="Generic placeholder image">
                                            <i></i>

                                            <!-- <span class="float-right mb-25">4:14 PM</span> -->
                                            <!-- <span class="badge badge-primary badge-pill float-right">3</span> -->
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="../app-assets/images/portrait/small/avatar-s-7.jpg" height="42" width="42" alt="Generic placeholder image">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>
                                            <p class="truncate">Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing</p>
                                        </div>
                                        <div class="contact-meta">
                                            <span class="float-right mb-25">9:09 AM</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="../app-assets/images/portrait/small/avatar-s-7.jpg" height="42" width="42" alt="Generic placeholder image">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>
                                            <p class="truncate">Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing</p>
                                        </div>
                                        <div class="contact-meta">
                                            <span class="float-right mb-25">9:09 AM</span>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="../app-assets/images/portrait/small/avatar-s-7.jpg" height="42" width="42" alt="Generic placeholder image">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>
                                            <p class="truncate">Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing</p>
                                        </div>
                                        <div class="contact-meta">
                                            <span class="float-right mb-25">9:09 AM</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="../app-assets/images/portrait/small/avatar-s-7.jpg" height="42" width="42" alt="Generic placeholder image">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>
                                            <p class="truncate">Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing</p>
                                        </div>
                                        <div class="contact-meta">
                                            <span class="float-right mb-25">9:09 AM</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="../app-assets/images/portrait/small/avatar-s-7.jpg" height="42" width="42" alt="Generic placeholder image">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>
                                            <p class="truncate">Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing</p>
                                        </div>
                                        <div class="contact-meta">
                                            <span class="float-right mb-25">9:09 AM</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="../app-assets/images/portrait/small/avatar-s-7.jpg" height="42" width="42" alt="Generic placeholder image">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>
                                            <p class="truncate">Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing</p>
                                        </div>
                                        <div class="contact-meta">
                                            <span class="float-right mb-25">9:09 AM</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="../app-assets/images/portrait/small/avatar-s-7.jpg" height="42" width="42" alt="Generic placeholder image">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>
                                            <p class="truncate">Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing</p>
                                        </div>
                                        <div class="contact-meta">
                                            <span class="float-right mb-25">9:09 AM</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="../app-assets/images/portrait/small/avatar-s-7.jpg" height="42" width="42" alt="Generic placeholder image">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>
                                            <p class="truncate">Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing</p>
                                        </div>
                                        <div class="contact-meta">
                                            <span class="float-right mb-25">9:09 AM</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>



                        </div>
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>
            <div class="content-right">
                <!-- Chat Sidebar area -->
                <div class="sidebar2-content card row">
                        <div class="d-flex align-items-center row p-3 col-6">
                            <div class="cht-box">
                                <h1>Elizabeth Elliott</h1>

                                <div class="cht-ps">

                                    <div class="mychat">
                                        <p>I'm really into hiking and camping. I love being out in nature and exploring new trails.</p>
                                    </div>
                                    <div class="other-chat">

                                        <p>Hi there! How are you?</p>
                                    </div>
                                    <!-- <h5>I'm doing pretty well, thanks for asking. So, tell me a little bit about yourself. What do you like to do for fun?</h5>
                                    <P>I'm good. How about you?</P>
                                    <P>I'm really into hiking and camping. I love being out in nature and exploring new trails.</P> -->
                                </div>

                            </div>
                            <div class="cht-inp">
                                <ul class="cht-inp-ul">
                                    <!-- <li><a href=""><i class="fa-solid fa-paperclip"></i></a></li> -->
                                    <li><input type="text" placeholder="Write a message"></li>
                                    <div style="margin-left: 10px; display: flex; gap: 2px;">
                                    <li><a href=""><i  class="fa-regular fa-send"></i></a></li>
                                    <!-- <li><a href=""><i class="fa-regular fa-face-smile"></i></a></li> -->
                                    </div>
                                </ul>

                            </div>

                        </div>
                        <div class=" p-3 col-6" >

                            <div style="background-color: #fff;" class="user-details">
                                  <div class="users">
                                    <img class="user-img-outline" src="../../../assets/img/user.svg"/>
                                    <div style="text-align: center;">
                                    <h1>James Robert</h1>
                                    <div style="display: flex;gap:5px; align-items: center; justify-content: center;">
                                         <img  src="../../../assets/img/abdulghanni.svg"/>
                                        <h6 style="margin-bottom: 0%;">Paris, France</h6></div>
                                    </div>
                                    <div style="display: flex; align-self: end; margin-top: 10px;border-radius: 1.08419rem;
border: 0.964px solid #000; gap: 5px; align-items: center; padding:5px 10px; cursor: pointer;">
                                        <img src="../../../assets/img/block.svg"/>
                                        <h6 style="margin-bottom: 0%; font-size: 0.8rem;">Block me</h6>
                                    </div>
                                  </div>
                                  <div style="margin-top: 20px;" class="user-about">
                                    <h4 class="head4">About</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempus lacus in quam labret, eget finibus orci pharetra. Sed molestie leo eget urna egestas tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec nec luctus tortor, at sagittis orci. fames ac turpis egestas. Donec nec luctus tortor, at sagittis orci. fames ac
                                    </p>
                                  </div>
                                  <div style="margin-top: 50px;">
                                    <h4 class="head4">interest</h4>
                                    <div class="d-flex flex-wrap justify-content-between" style="gap: 10px; margin-top: 10px">
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
                            </div>
                        </div>
                    </div>

                </div>
                <!--/ Chat Sidebar area -->
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
                                                <img src="../app-assets/images/portrait/small/avatar-s-1.jpg" alt="" height="40" width="40" />
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
                                                    <img src="../app-assets/images/portrait/small/avatar-s-1.jpg" alt="avatar" height="40" width="40" />
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
                                                    <img src="../app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="40" width="40" />
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
                                                    <img src="../app-assets/images/portrait/small/avatar-s-1.jpg" alt="avatar" height="40" width="40" />
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
                                                    <img src="../app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="40" width="40" />
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
                                                    <img src="../app-assets/images/portrait/small/avatar-s-1.jpg" alt="avatar" height="40" width="40" />
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
                                                    <img src="../app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="40" width="40" />
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
                                                    <img src="../app-assets/images/portrait/small/avatar-s-1.jpg" alt="avatar" height="40" width="40" />
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
                                        <img src="../app-assets/images/portrait/small/avatar-s-1.jpg" alt="user_avatar" height="70" width="70">
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

    <script src="{{ asset('app-assets/js/scripts/pages/app-chat.js') }}"></script>

    <script src="{{ asset('assets/js/waitMe.js') }}"></script>
    <script>
        $("#chat-search").keyup(function(e) {
            var type = 'discover';
            var search = $(this).val();

            $.ajax({
                type: "post",
                url: "{{ route('user.search') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'type': type,
                    'search': search
                },
                success: function(res) {

                    $('.scroller').html("");
                    $('.scroller').html(res);
                    if (res) {
                        $("#user-details").removeClass('d-none')
                        $(".scroller .req-profile").first().addClass("active")
                        var newid = $(".scroller .req-profile").first().attr("data-id")
                        $("#id").val(newid);
                        showRequestDetail(newid);

                    } else {

                        $("#user-details").addClass('d-none')
                    }

                    // $('.scroller').html("");

                }
            });



        });

        function showRequestDetail(id) {

            if (id) {

                $.ajax({
                    type: "post",
                    url: "{{ route('user.info') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "type": 'discover',
                        "status": 1,
                        "id": id
                    },

                    success: function(res) {

                        if (res) {
                            console.log(res);
                            $("#user-details").html("");
                            $("#user-details").removeClass('d-none');
                            $("#user-details").append(res);
                        } else {
                            $("#user-details").html("");
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

                        $(".scroller").empty();
                    }
                    if (res.status == 0) {

                        $(".req-profile.active").remove();
                        $(".scroller .req-profile").first().addClass("active")
                        var newid = $(".scroller .req-profile").first().attr("data-id")
                        $("#id").val(newid);
                        showRequestDetail(newid);
                        a_count++
                        r_count--
                        $("#approve-count").text(a_count);
                        $("#all-request").text(r_count);
                    }





                }
            });

        }
        $(document).ready(function() {
            $(".scroller .req-profile").first().addClass("active")
            var newid = $(".scroller .req-profile").first().attr("data-id")
            $("#id").val(newid);
            showRequestDetail(newid);
        });
        $(document).on("click", "#approve-btn", function() {
            var btn_val = $("#approve-btn").attr('data-approve');
            var status = 0;
            if (btn_val == 1) {
                status = 1
            }

            approveRequest(status)
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
            $(".scroller .req-profile").first().addClass("active")
            var newid = $(".scroller .req-profile").first().attr("data-id")


            if (id) {

                $.ajax({
                    type: "post",
                    url: "{{ route('user.block') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },

                    success: function(res) {
                        $("#user-details").addClass('d-none');
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
                $(".scroller .req-profile").addClass("active")
                $("#approve-btn").text("Approve All")
                $("#approve-btn").attr('data-approve', 1);

            } else {
                $(".scroller .req-profile").removeClass("active")
                $("#approve-btn").text("Approve")
                $("#approve-btn").attr('data-approve', 0);
            }
        });
    </script>


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
        var APP_URL = {!! json_encode(url('/')) !!} <
            /scrip>


    @endsection
