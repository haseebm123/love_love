@extends('admin.layouts.master')
@section('title', 'Help & Support ')
@section('style')
    <style>
        .scroller {

            height: 800px !important;
        }

        .btn-rounded {
            border-radius: 17.347px !important;
            padding: 13px !important;
            font-size: 14px !important;
        }
    </style>
@endsection

@section('body')
    {{-- Code Here --}}
    <div class="row m-5">
        <div class="col-12 card background-card sidebar-content card ">
            <div class="row">
                <div>

                    <h1>Help & Support</h1>
                    <h6>Content Moderation / Help & Support </h6>
                </div>
                <div>
                    <button type="button" class="btn-rounded btn btn-outline-dark waves-effect waves-light"
                        data-toggle="modal" data-target="#dark">
                        Edit
                    </button>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body " style="position: relative;">
                    <div>
                        {!! $data->help_support !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade text-left" id="dark" tabindex="-1" role="dialog" aria-labelledby="myModalLabel150"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark white">
                    <h5 class="modal-title" id="myModalLabel150">Edit Help and Support </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update.help.support') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body">

                                                <div class="form-group ">
                                                    <label> Help and Support </label>
                                                    <textarea class="form-control editor" id="help_support" placeholder="Enter Help and Support" name="help_support">{!! $data->help_support !!}</textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark edt" >Save</button>
                    </div>
                </form>
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
