<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Mock Up Application Test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('logo.png')}}">

        <!-- third party css -->
        <link href="{{asset('admin/assets/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/libs/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <link href="{{asset('admin/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/libs/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
        
        <!-- plugin css -->
        {{-- <link href="{{asset('admin/assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" /> --}}

          <!-- Plugins css -->
          <link href="{{asset('admin/assets/libs/jquery-nice-select/nice-select.css')}}" rel="stylesheet" type="text/css" />
          <link href="{{asset('admin/assets/libs/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
          <link href="{{asset('admin/assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
          <link href="{{asset('admin/assets/libs/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
          <link href="{{asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" type="text/css" />

          

        <!-- App css -->
        <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />


        <link href="{{asset('admin/assets/css/spin.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">


                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{auth('admin')->user()->nama_lengkap}}" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                {{auth('admin')->user()->nama_lengkap}} <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0 text-white">
                                    Welcome !
                                </h5>
                            </div>
                         
                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="{{route('logout')}}" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>

                 


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{asset('logo.png')}}" alt="" height="54">
                            <!-- <span class="logo-lg-text-light">Upvex</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">X</span> -->
                            <img src="{{asset('logo.png')}}" alt="" height="28">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </li>
        

                </ul>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        @include('admin.parts.sidebar')

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        @yield('content')
                       
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- sample modal content -->
                <div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Detail Information </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body modal-detail">
                                
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                {{date('Y')}} &copy; Ikatan Konsultan Indonesia
                            </div>
                           
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

      

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <script src="https://cdn.tiny.cloud/1/nq05lj17pvrii7zdqbfysfok24noz1dt3od5hugr7s88cyeu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Vendor js -->
        <script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>


        <!-- third party js -->
        <script src="{{asset('admin/assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/datatables/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('admin/assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/datatables/buttons.flash.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/datatables/buttons.print.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/datatables/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/datatables/dataTables.select.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/pdfmake/vfs_fonts.js')}}"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="{{asset('admin/assets/js/pages/datatables.init.js')}}"></script>

       
        <script src="{{asset('admin/assets/libs/jquery-nice-select/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/switchery/switchery.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/select2/select2.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/bootstrap-select/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>

        <!-- Init js-->
        <script src="{{asset('admin/assets/js/pages/form-advanced.init.js')}}"></script>


        <!-- Third Party js-->
        <script src="{{asset('admin/assets/libs/peity/jquery.peity.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        {{-- <script src="{{asset('admin/assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/jquery-vectormap/jquery-jvectormap-us-merc-en.js')}}"></script> --}}

        <!-- Plugins js-->
        <script src="{{asset('admin/assets/libs/moment/moment.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('admin/assets/libs/daterangepicker/daterangepicker.js')}}"></script>

        

        <!-- Init js-->
        <script src="{{asset('admin/assets/js/pages/form-pickers.init.js')}}"></script>

        <!-- Dashboard init -->
        <script src="{{asset('admin/assets/js/pages/dashboard-1.init.js')}}"></script>
        <!-- App js -->
        <script src="{{asset('admin/assets/js/app.min.js')}}"></script>
        @stack('script')

        
        <script>
            // $(document).ready(function(){

                
                // tinymce.init({
                //     selector: 'textarea',
                //     setup: function (editor) {
                //         editor.on('init change', function () {
                //             editor.save();
                //         });
                //     },
                //     plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                //     toolbar_mode: 'floating',
                // });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })

                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#foto_preview')
                                .attr('src', e.target.result)
                                .width(100)
                                .height(100);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                
              
                
                $("#form-insert").submit(function(e){
                    e.preventDefault();
                    let data = new FormData(this);
                    let that = this;
                    $("#loading").show(); //show loading
                    $.ajax({
                            url: that.action,
                            type: 'POST',
                            data: data,
                            cache: false,
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            success: function( res){
                                if(res.message=="successfully"){
                                    let url = "{{url('admin','url')}}"
                                        url = url.replace("url",res.route);
                                    
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'successfully added',
                                            showConfirmButton: false,
                                        })

                                        $(that)[0].reset();
                                            setTimeout(() => {                                  
                                                window.location.href = url;
                                        }, 1500);
                                }
                            },complete: function(){
                                $("#loading").hide(); //hide loading here
                            },
                            error: function (err) {
                                if (err.status == 422) { // when status code is 422, it's a validation issue
                                let errors = [];
                                    for (key in err.responseJSON.errors) {
                                        errors.push(err.responseJSON.errors[key])
                                    }
                                    let html = '';
                                    errors.map(e => {
                                        html += `${e},`
                                    })
                                    Swal.fire({
                                        icon: 'error',
                                        html: listErrors = html.split(",").join("</br>")
                                    })
                                }
                            }
                    })
                })

                $("#form-update,#form-update-profile").submit(function(e){
                    e.preventDefault();
                    let data = new FormData(this);
                    let that = this;
                    $("#loading").show(); //show loading
                    $.ajax({
                            url: that.action,
                            type: 'POST',
                            data: data,
                            cache: false,
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            success: function( res){
                                if(res.message=="successfully"){
                                    let url = "{{url('admin','url')}}"
                                        url = url.replace("url",res.route);
                                    Swal.fire({
                                        icon: 'success',
                                        title: res.route+' successfully updated',
                                        showConfirmButton: false,
                                    })
                                    $(that)[0].reset();
                                        setTimeout(() => {
                                            window.location.href = url;
                                    }, 1500);
                                }else if(res.message=="success change password"){
                                    let url = "{{url('admin','url')}}"
                                        url = url.replace("url",res.route);
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'password changed successfully',
                                        showConfirmButton: false,
                                    })
                                    $(that)[0].reset();
                                        setTimeout(() => {
                                            window.location.href = url;
                                    }, 1500);

                                }else if(res.message=="wrong password"){
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Your current password does not match the password you provided. Please try again',
                                        showConfirmButton: true,
                                    })
                                    $(that)[0].reset();
                                }
                            },complete: function(){
                                $("#loading").hide(); //hide loading here
                            },
                            error: function (err) {
                                if (err.status == 422) { // when status code is 422, it's a validation issue
                                let errors = [];
                                    for (key in err.responseJSON.errors) {
                                        errors.push(err.responseJSON.errors[key])
                                    }
                                    let html = '';
                                    errors.map(e => {
                                        html += `${e},`
                                    })
                                    Swal.fire({
                                        icon : 'error',
                                        html: listErrors = html.split(",").join("</br>")

                                    })
                                }
                            }
                    })
                })

                let deleteData = function (e) {
                    let action = $(e).data('href');
                    let data = {_method: 'delete'}
                
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                        })

                        swalWithBootstrapButtons.fire({
                            title: 'Are you sure?',
                            // text: "You won't be able to revert this!",
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'No, cancel!',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.post(action,data)
                                    .then(function(res){
                                        if (res.message=="successfully") {
                                            location.reload();
                                            swalWithBootstrapButtons.fire(
                                                'Deleted!',
                                                'Your data has been deleted.',
                                                'success'
                                            )
                                        }else if(res.message==false){
                                            swalWithBootstrapButtons.fire(
                                                '',
                                                'Data sedang di pakai.',
                                                'warning'
                                            )
                                        }
                                    },function(err){
                                        alert('Error : ' + err.responseText);
                                    })
                            }
                        })
                }


    

                $(document).on('click','.detail',function(){
                 
                    let uuid = $(this).data('uuid');
                    let route = $(this).data('route')
                    $.ajax({
                        url : route,
                        type : 'get',
                        dataType : 'json',
                        data : {
                            uuid : uuid,
                        },
                        success : function(result){
                            if (result.message=="successfully") {
                                let content = '';
                                let tipe = result.tipe;
                                let data = result.data;
                                
                                
                                if (tipe=="pemilih") {
                                    content = pemilihContent(data)
                                }
                                $(".modal-detail").html(content);     
                                $("#detail-modal").modal('show');
                            }
                        }
                    })
                })

                function pemilihContent(result){
                    let data = result;
                    return  `<div class="text-center">
                                <div class="text-left">
                                    ${listMember(data.nama_pemilih,'Nama Pemilih')}
                                    ${listMember(data.nama_perusahaan,'Nama Perusahaan ')}
                                    ${listMember(data.nomor_telepon,'Nomor Telepon')}
                                    ${listMember(data.email_perusahaan,'Email Perusahaan')}
                                    ${listMember(data.nomor_telepon_perusahaan,'Nomor Telepon Perushaan ')}
                                    ${listMember(data.status,'Status')}
                                    ${listMember(data.surat_pernyataan,'Surat Pernyataan')}
                                   
                                </div>
                            </div>`

                }

                function listMember(data,title){
                    return  `  <p class="text-muted mb-1 font-13"><strong>${title} :</strong> <span class="ml-2"> ${data}</span></p>`
                }

            
             
            
            // })
        </script>
    </body>

</html>