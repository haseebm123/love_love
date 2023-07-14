@extends('admin.layouts.master')
@section('title', 'Accounts ')
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
            <h1>Accounts</h1>
            <h6>Accounts</h6>

            <div class="card mt-5 background-card sidebar-content card">
                <div class="card-content">
                    <div class="card-body " style="position: relative;">
                        <div class="scroller">
                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div>
                                    <div>
                                        <h5 class="textWhite">$3 has been credtied in the Account</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div>
                                    <div>
                                        <h5 class="textWhite">$3 has been credtied in the Account</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div>
                                    <div>
                                        <h5 class="textWhite">$3 has been credtied in the Account</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div>
                                    <div>
                                        <h5 class="textWhite">$3 has been credtied in the Account</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div>
                                    <div>
                                        <h5 class="textWhite">$3 has been credtied in the Account</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div>
                                    <div>
                                        <h5 class="textWhite">$3 has been credtied in the Account</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div>
                                    <div>
                                        <h5 class="textWhite">$3 has been credtied in the Account</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div>
                                    <div>
                                        <h5 class="textWhite">$3 has been credtied in the Account</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div>
                                    <div>
                                        <h5 class="textWhite">$3 has been credtied in the Account</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div>
                                    <div>
                                        <h5 class="textWhite">$3 has been credtied in the Account</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div>
                                    <div>
                                        <h5 class="textWhite">$3 has been credtied in the Account</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div>
                                    <div>
                                        <h5 class="textWhite">$3 has been credtied in the Account</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100  mt-1   rouden  ">
                                <div>
                                    <div>
                                        <h5 class="textWhite">$3 has been credtied in the Account</h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

            </div>
        </div>
        <div class="col-8">
            <div class="card background-card">
                 <div class="card-content">
                    <div class="card-body pt-30" style="position: relative;">
                        <div class="row m-2">
                            <div class="col-xl-4 col-md-4 col-sm-1  ">
                                <div class="card text-center custom-card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="dot-green"></div>
                                            <h2 class="card-h1">Balance</h2>
                                            <span class="data-value">$300</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-1  ">
                                <div class="card text-center custom-card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="dot-green"></div>
                                            <h2 class="card-h1">Withdraw</h2>
                                            <span class="data-value">$100</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-1  ">
                                <div class="card text-center custom-card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="dot-red"></div>
                                            <h2 class=" card-h1">Pending</h2>
                                            <span class="data-value">$50</span>
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
