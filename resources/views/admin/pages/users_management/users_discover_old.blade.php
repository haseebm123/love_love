@extends('admin.layouts.master')
@section('title', 'Discover Profile')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/pages/app-chat.css') }}">
@endsection

@section('body')
    {{-- Code Here --}}
    <div class="row">
        <div class="col-4">
            <h1>Request Profile</h1>
            <h6>User Management / Discover Profile</h6>

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

                        <div class="scroller">
                             @include('admin.pages.users_management.discover_user_list')

                        </div>


                    </div>


                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="card background-card">
                <div class="card-content">
                    <div class="card-body pt-30" style="position: relative;">
                        <div class="row m-2">


                            <div  class="col-xl-12 col-md-12 col-sm-12 user-details ">
                                {{-- d-none  --}}
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Messages</h4>

                                            </div>
                                            <div class="card-content collapse show">
                                                @include('admin.pages.components.message')
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="card" id="user-details">
                                            <div class="card-header">
                                                <h4 class="card-title">Profile Details</h4>

                                            </div>
                                            <div class="card-content collapse show">

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

                        }else{

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
        var APP_URL = {!! json_encode(url('/')) !!}
    </scrip>


@endsection
