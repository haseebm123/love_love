@extends('admin.layouts.master')
@section('title', 'Notification ')
@section('style')
    <style>
        .scroller {

            height: 800px !important;
        }
    </style>
@endsection
@section('body')

    {{-- Code Here --}}
    <div class="row">
        <div class="col-4">
            <h1>Notification</h1>
            <h6>Notification</h6>

            <div class="card mt-5 background-card sidebar-content card">
                <div class="card-content">
                    <div class="card-body " style="position: relative;">

                        <div class="scroller">
                            @forelse ($data as $item)
                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div>
                                    <div>
                                        <h5 class="textWhite">{{ $item->description }}</h5>
                                    </div>
                                </div>
                            </div>


                            @empty
                                <h1>No Data Found</h1>
                            @endforelse



                        </div>



                    </div>



                </div>

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
