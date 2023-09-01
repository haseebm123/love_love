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
    <div class="app-content content">
      
        <div class="content-area-wrapper">
            
            <div class="container-fluid">
                <div class="row">
                 <div class="col-12 col-md-12 col-lg-2 col-xl-2">
                <div class="sidebar-left">
                <div style="margin-bottom: 30px; margin-top: 20px;" class="text-center">
                    <h1>Accounts</h1>
                    <span>Accounts</span>
                </div>
                <div class="sidebar">
                    <div class="sidebar-content card">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="chat-fixed-search">
                            <div class="d-flex align-items-center">


                            </div>
                        </div>

                        <div id="users-list" class="chat-user-list request-list list-group position-relative">

                            <ul class="chat-users-list-wrapper media-list user-side-list">
                                {{-- @include('admin.pages.components.request_profile_user_list') --}}
                                @include('admin.pages.components.account')

                            </ul>
                        </div>

                        <!--<button id="approve-btn" data-approve="0" class="chk-btn">Approve</button>-->
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>
             </div>
            
             <div class="col-12 col-md-12 col-lg-10 col-xl-10">
            <div class="content-right">
                <!-- Chat Sidebar area -->
                <div class="sidebar2-content card" id="sidebar-height-auto">
                    <!--<div class="req-row">-->
                    <div class="container">
                        <div class="row">
                             <!--<div class="req-row">-->
                        
                        @php 
                         $allRequest = \App\Models\PaymentDetails::sum('amount');
                        @endphp
                        
                         <div class="col-12 col-md-4 col-lg-6 col-xl-4 req-row">
                    
                        <div class="req-col-1">
                            <i>30</i>
                            <h1>All Request</h1>
                            <h2 id="balance">${{ $allRequest }}</h2>
                        </div>
                        </div>
                        
                        
                         <div class="col-12 col-md-4 col-lg-6 col-xl-4 req-row">
                        <div class="req-clo-2">
                            <i>30</i>
                            <h1>Withdraw</h1>
                            <h2 id="withdraw">$100</h2>
                        </div>
                        </div>
                         <div class="col-12 col-md-4 col-lg-6 col-xl-4 req-row">
                        <div class="req-col-3">
                            <i>10</i>
                            <h1>Pending</h1>
                            <h2 id="pending">${{ $allRequest }}</h2>
                        </div>
                    </div>
                    </div>
                     </div>
                    </div>

                <!--</div>-->
                <!--/ Chat Sidebar area -->
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
