@extends('admin.layouts.master')
@section('title', 'Term & Condition')
@section('style')
<style>
    .chat-application .term-c button {
   
    transform: translate(0px, -21px);
}
</style>
@endsection

@section('body')
    {{-- Code Here --}}



    <div class="app-content content">
    
        <div class="content-area-wrapper">
            
              <div class="container-fluid">
                <div class="row">
                 <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-content term-c card">
                        <div class="forpadding">
                            <h1>Term & Condition</h1>
                            <span>Content Moderation / Term & Condition </span>
                            </br>
                             </br>
                            <button  type="button"  data-toggle="modal" data-target="#dark" id="btnedit" style="float:right">Edit</button>

                            <div>
                                 {!! $data->term_and_condition !!}
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


    <!-- Modal -->
    <div class="modal fade text-left" id="dark" tabindex="-1" role="dialog" aria-labelledby="myModalLabel150"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark white">
                    <h5 class="modal-title" id="myModalLabel150">Edit Terms & Condition </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update.term.conditions') }}" method="POST">
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
                                                    <label>Terms & Condition </label>
                                                    <textarea class="form-control editor" id="term_and_condition" placeholder="Enter Terms & Condition"
                                                        name="term_and_condition">{!! $data->term_and_condition !!}</textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark edt">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    {{-- To here --}}
@endsection




@section('script')

    <!-- <script src="{{ asset('assets/js/countrystatecity.js?v2') }}"></script> -->

    <script src="{{ asset('assets/js/waitMe.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.editor').each(function(e) {
                CKEDITOR.replace(this.id, {
                    allowedContent: true,
                    toolbar: 'Full',
                    enterMode: CKEDITOR.ENTER_BR,
                    shiftEnterMode: CKEDITOR.ENTER_P,
                });
            });
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
    </script>


@endsection
