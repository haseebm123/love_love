@extends('admin.layouts.master')
@section('title', 'Block List')
@section('style')
    <style>

    </style>
@endsection

@section('body')
    <input type="hidden" value="" name="id" id="id">
    <div class="row">
        <div class="col-5">
            <h1>Block List</h1>
            <h6>Block List</h6>

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
                            @include('admin.pages.users_management.ajax.user_block_list_section')
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


                            <div id="user-details-div" class="col-xl-12 col-md-12 col-sm-12 user-details d-none ">

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
    <script>
        function showRequestDetail(id) {

            if (id) {

                $.ajax({
                    type: "post",
                    url: "{{ route('user.info') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "status":1,
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
            $(".scroller .req-profile").first().addClass("active")
            var newid = $(".scroller .req-profile").first().attr("data-id")
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
            $(".scroller .req-profile").first().addClass("active")
            var newid = $(".scroller .req-profile").first().attr("data-id")
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
