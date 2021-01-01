<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset("assets") }}/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{ asset("assets") }}/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets") }}/libs/css/style.css">
    <link rel="stylesheet" href="{{ asset("assets") }}/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="{{ asset("assets") }}/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="{{ asset("assets") }}/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="{{ asset("assets") }}/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset("assets") }}/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="{{ asset("assets") }}/vendor/fonts/flag-icon-css/flag-icon.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset("assets") }}/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets") }}/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets") }}/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets") }}/vendor/datatables/css/fixedHeader.bootstrap4.css">

    <link rel="stylesheet" href="{{ asset('css')}}/style.css">
    <link rel="stylesheet" href="{{ asset('css')}}/custom.css">

    <link rel="stylesheet" href="{{ asset('assets')}}/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    {{-- select teg --}}
    <link rel="stylesheet" href="{{ asset('css')}}/bootstrap-tagsinput.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css"> --}}
    
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}"> 

    <!-- Latest compiled and minified CSS --> 
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    
    <!-- tinymce Css-->
    <link href="{{ asset('assets')}}/vendor/tinymce/skins/lightgray/skin.min.css" rel="stylesheet" />

    <!-- select2 -->
    <link href="{{ asset('/') }}Select2/css/select2.css" rel="stylesheet" />

    @yield('style')
    
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        
        @include('back-end.includes.header')
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        @include('back-end.includes.left-slidebar')
        
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                @yield('main-content')
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            {{-- @include('back-end.includes.footer') --}}
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ asset("assets") }}/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset("assets") }}/vendor/bootstrap/js/bootstrap.bundle.js"></script>


    
    <!-- Tinemce -->  
    <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script>
         //TinyMCE
            tinymce.init({
                selector: "textarea#post_content",
                theme: "modern",
                height: 400,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            // tinymce.suffix = ".min";
            // tinyMCE.baseURL = 'vendor/tinymce';
            tinymce.init({
                selector: "textarea#content",
                theme: "modern",
                height: 400,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            // tinymce.suffix = ".min";
            // tinyMCE.baseURL = 'vendor/tinymce';

    </script>
    <!-- slimscroll js -->
    <script src="{{ asset('assets/vendor')}}/slimscroll/jquery.slimscroll.js"></script>

    <!-- main js -->
    <script src="{{ asset('js')}}/main-js.js"></script>
    <script src="{{ asset('js')}}/drag-n-drop-js.js"></script>
    <!-- notify -->
    // <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha256-tSRROoGfGWTveRpDHFiWVz+UXt+xKNe90wwGn25lpw8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/notify.min.js')}}"></script>

    <script src="{{ asset('assets/vendor')}}/datepicker/moment.js"></script>
    <script src="{{ asset('assets/vendor')}}/datepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="{{ asset('assets/vendor')}}/datepicker/datepicker.js"></script>


    <script src="{{ asset('js/flatpickr.js') }}"></script>

<script>
const fp = flatpickr(".date", {
    enableTime: true,
    dateFormat: "F j, Y h:i K",
    minDate: "today",
    weekNumbers: true,
    minTime: "now",
    
});
</script>


    <!-- SwAl -->

    <script src="{{ asset('js/sweetalert.min.js') }}"></script>


    
    
    <!-- ajax modal  -->
    <div id="common-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content p-0 b-0">
            <div class="panel panel-color panel-primary">
           

                <div class="modal-header">
                        <h5 class="modal-title" id="common-modal-title">Title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                <div class="modal-body">
                <div id="modal-loader" style="display: none; text-align: center;"> <img src="{{asset('/preloader.gif')}}" /> </div>
                
                <!-- content will be load here -->
                <div id="dynamic-content"></div>
                </div>
                
            </div>
            </div>
        </div>
        </div>
        <!-- /.modal --> 
        <script>
            $(document).ready(function() {
                $(document).on('click', '.modal-menu', function(e) {
                    e.preventDefault();
                    var title = $(this).data('title');
                    if(title != "" && title !=null){
                        $("#common-modal-title").text(title);
                    }
                    var url = $(this).data('url'); // it will get action url
                    $('#dynamic-content').html(''); // leave it blank before ajax call
                    $('#modal-loader').show(); // load ajax loader
                    $.ajax({
                            url: url,
                            type: 'get',
                            dataType: 'html'
                        })
                    .done(function(data) {
                        console.log(data);
                        $('#dynamic-content').html('');
                        $('#dynamic-content').html(data); // load response 
                        $('#modal-loader').hide(); // hide ajax loader 
                    })
                    .fail(function() {
                        $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                        $('#modal-loader').hide();
                    });
                });
            });
        </script>
        <!-- END Ajax modal  -->
        @yield('modal')

        
        <script>
        setTimeout(function(){
        $('#success_m').fadeOut('slow');
        },3000);
        </script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
         <script>
            $('#mySelect').selectpicker();
         </script>
        <script src="{{ asset('assets/vendor/parsley/parsley.js') }}"></script>
        
         
        <script>
            $('form').parsley();
        </script>

      <script>
        $('#mail_driver').on('change',function(){

            if( $(this).val()==="smtp"){ 
                $("#sendMailDiv").hide();
                $("#smtpDiv").show();
            }
            else if($(this).val()==="sendmail"){
                $("#sendMailDiv").show();
                $("#smtpDiv").hide();
            }
        }); 
    </script>


        <script>
            $('.collapse').on('shown.bs.collapse', function() {
                $(this).parent().find(".fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-up");
            }).on('hidden.bs.collapse', function() {
                $(this).parent().find(".fa-angle-up").removeClass("fa-angle-up").addClass("fa-angle-down");
            });

            $('.panel-heading a').click(function() {
                $('.panel-heading').removeClass('active');

                // If the panel was open and would be closed by this click, do not active it
                if (!$(this).closest('.panel').find('.panel-collapse').hasClass('in'))
                    $(this).parents('.panel-heading').addClass('active');
            });
        </script>

        @yield('script')

</body>
 
</html>