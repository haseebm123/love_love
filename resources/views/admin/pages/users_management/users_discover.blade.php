@extends('admin.layouts.master')
@section('title', 'Help & Support')
@section('style')

<link rel="stylesheet" href="{{ asset('assets/css/waitMe.css') }}">
    <style>

    </style>
@endsection

@section('body')
    <input type="hidden" value="" name="id" id="id">
    <input type="hidden" value="" name="con_id" id="con_id">

    <div class="app-content content">
    
        <div class="content-area-wrapper">
            
                <div class="container-fluid">
                <div class="row">
                 <div class="col-12 col-md-12 col-lg-2 col-xl-2">
            
            
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

                        <div id="users-list"
                            class="chat-user-list discover-list request-list list-group position-relative user-side-list">

                            <ul class="chat-users-list-wrapper media-list">

                                @include('admin.pages.components.user_discover_list')
                            </ul>
                        </div>
                        <!-- <div class="chk-div">
                                <input type="checkbox" name="" id=""><label for="">Select All</label>
                            </div> -->
                        <!--<button class="chk-btn">Approve</button>-->
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>
            </div>
            
            
            
            
            
            
                <div class="col-12 col-md-12 col-lg-10 col-xl-10">
                    <div class="content-right">
                
                
                <div class="sidebar2-content card row msgs  " id="content-right">
                    {{-- d-none  --}}
                    
                     <div class="container">
                        <div class="row">
                         <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                     
                            <div class="d-flex align-items-center row p-3" id="container">
                        
                        
                        <div class="cht-box">
                            <h1>Messages</h1>
                            <div id="user-conversation-div" class="cht-ps">  </div>

                        </div>
                        <div class="cht-inp" id="sendMessageWaitMe">
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
                     </div>
                    
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div id="user-details-div" class="  user-details-bx ">
                        {{-- @include('admin.pages.users_management.ajax.user_detail_vertical') --}}


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
@endsection



@section('script')
    <script src="{{ asset('assets/js/waitMe.js') }}"></script>
    <script>
    
    function scrollChatToBottom() {
            var chatBox = $('.cht-ps');
            // var messages = chatBox.find('.message-container');
            var scrollHeight = 0;
            chatBox.each(function() {
                scrollHeight += $(this).outerHeight();
            });
            chatBox.scrollTop(scrollHeight);
        }
        
     var current_effect ='bounce';
      function full_page()
      {
        $('#container').waitMe({
          effect : 'bounce',
          text : '',
          bg : 'rgba(255,255,255,0.7)',
          color : '#000',
          maxSize : '',
          waitTime : -1,
          textPos : 'vertical',
          fontSize : '',
          source : '',
          onClose : function() {}
          });
      }
      $(document).ready(function() {
            const reqProfileElement = $('.req-profile[data-id][data-fire]');
            //   $('#container').waitMe('hide');
            //   if (reqProfileElement.length) 
            //   {
                  
                  
                //   reqProfileElement.each(function(e) {
                //     if(e == 0)
                //     {
                        // const dataId = $(this).attr('data-id');
                       
                        // console.log('data-id:', dataId);
                        // const intervalTime = 2000;
        
                        // const intervalId = setInterval(() => {
                        //   $('#container').waitMe('hide');
                        //   scrollChatToBottom()
                        //   getConversation(dataId);
                        // }, intervalTime);
                    // }
                    
                   
            //     });
            // }
        });
        
   
      
      function sendMessageWaitMe()
      {
          $('#sendMessageWaitMe').waitMe({
          effect : 'bounce',
          text : '',
          bg : 'rgba(255,255,255,0.7)',
          color : '#000',
          maxSize : '',
          waitTime : -1,
          textPos : 'vertical',
          fontSize : '',
          source : '',
          onClose : function() {}
          });
      }
      
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
                            // $("#user-details-div").removeClass('d-none');
                            // $("#user-details-div").addClass('d-flex');
                            $("#user-details-div").append(res);
                        } else {
                            $("#user-details-div").html("");
                            // $("#user-details-div").addClass('d-none');
                            // $("#user-details-div").removeClass('d-flex');
                        }

                    }
                });
            } else {

                $("#user-details-div").html("");
            }
        }
       
            
        

        function getConversation(id) {
            
            if (id) {
                full_page()
                $.ajax({
                    type: "post",
                    url: "{{ route('get.conversationById') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },

                    success: function(res) {

                        if (res.status == 1) {

                            $("#user-conversation-div").html("");
                            // $(".msgs").addClass('d-none')
                            $('#container').waitMe('hide');

                        } else {
                             $("#user-conversation-div").html("");
                            $("#user-conversation-div").removeClass('d-none');
                            $("#user-conversation-div").append(res);
                            $(".msgs").removeClass('d-none')
                            scrollChatToBottom()
                            $('#container').waitMe('hide');
                        }

                    }
                });
            } else {
                $("#user-conversation-div").html('');

            }
        }



        function sendMsg(id) {
           
            var msg = $('#message').val();
            sendMessageWaitMe();
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
                             $('#sendMessageWaitMe').waitMe('hide');
                        }
                        if (res.type == 'error') {
                            toastr.success(res.message);
                             $('#sendMessageWaitMe').waitMe('hide');
                        }

                    }
                });
            }
        }

        $(document).ready(function() {
            $(".user-side-list .req-profile").first().addClass("active")
            var newid = $(".user-side-list .req-profile").first().attr("data-id")
            $("#id").val(newid);
            getConversation(newid)
            showRequestDetail(newid)
        });
        $(document).on("click", ".req-profile", function() {
            $(this).siblings().removeClass("active");
            var id = $(this).attr("data-id");
            var conid = $(this).attr("data-fire");
            $(this).addClass("active");
            $("#id").val(id);
            $("#con_id").val(conid);
            $('#message').val('');
            showRequestDetail(id);

            getConversation(id)

        });
        $(document).on("click", "#send-msg", function() {
            var id = $("#id").val()
            $("#id").val(id);

            sendMsg(id);

        });
        
    </script>


    {{-- Extra --}}
    <script src="{{ asset('assets/js/waitMe.js') }}"></script>
    <script>
        // $(function() {

        //     $('#quickForm').validate({
        //         rules: {

        //             first_name: {
        //                 required: true,
        //             },

        //             last_name: {
        //                 required: true,
        //             },
        //             profile: {
                       
        //                 extension: "JPEG|PNG|JPG",
        //             },
        //             password_confirm: {
        //                 equalTo: "#password"
        //             }

        //         },
        //         messages: {
                    
        //         },
        //         errorElement: 'span',
        //         errorPlacement: function(error, element) {
        //             error.addClass('invalid-feedback');
        //             element.closest('.form-group').append(error);
        //         },
        //         highlight: function(element, errorClass, validClass) {
        //             $(element).addClass('is-invalid');
        //         },
        //         unhighlight: function(element, errorClass, validClass) {
        //             $(element).removeClass('is-invalid');
        //         }
        //     });
        // });

        var loadFile = function(event) {

        };
    </script>

    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>

@endsection
