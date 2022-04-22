<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>Mock Up Application Test</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('logo.png')}}">
        <!-- App css -->
        <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
        <style>
            .primary{
                color :#181445 !important
            }
            .secondary{
                color: #F04D24  !important
            }
            #sidebar-menu>ul>li>a.active{
                color :#F04D24 !important
            }
            #sidebar-menu>ul>li>a{
                color :#181445 !important

            }
            #loader { 
                border: 12px solid #181445 ; 
                border-radius: 50%; 
                border-top: 12px solid #F04D24 ; 
                width: 70px; 
                height: 70px; 
                animation: spin 1s linear infinite; 
            } 
            
            @keyframes spin { 
                100% { 
                    transform: rotate(360deg); 
                } 
            } 
            
            .center { 
                position: absolute; 
                top: 0; 
                bottom: 0; 
                left: 0; 
                right: 0; 
                margin: auto; 
            } 
        </style>
    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="assets/images/logo-dark.png" alt="" height="26"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Don't have an account? Create your free account now.</p>
                                </div>

                                <h5 class="auth-title">Create Account</h5>

                                <form method="post" action="{{route('admin.register.post')}}" id="form-insert">
                                    <div class="form-group">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" name="email" type="email" id="emailaddress" required placeholder="Enter your email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="password" type="password" required id="password" placeholder="Enter your password">
                                    </div>
                                   
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" type="submit"> Sign Up </button>
                                    </div>

                                </form>

                              

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <div id="loading" class="center"></div>
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Sudah Punya Akun  <a href="{{route('admin.login')}}" class="text-muted ml-1"><b class="font-weight-semibold">Sign In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->



        <footer class="footer footer-alt">
            {{date('Y')}} Mock Up Application Test
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!-- Vendor js -->
        <script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('admin/assets/js/app.min.js')}}"></script>
        <script>
            $("#loading").hide();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
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
                                    let url = "{{url('url')}}"
                                        url = url.replace("url",res.route);
                                    
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'successfully register',
                                            showConfirmButton: false,
                                        })

                                        $(that)[0].reset();
                                            setTimeout(() => {                                  
                                                window.location.href = url;
                                        }, 2500);
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
        </script>
    </body>

</html>