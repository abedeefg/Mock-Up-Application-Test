<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>Mock Up Application Test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Ikatan Konsultan Indonesia" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('logo.png')}}">
        <!-- App css -->
        <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                   
                                    <p class="text-muted mb-4 mt-3">Mock Up Application Test</p>
                                </div>

                                <h5 class="auth-title">Sign In</h5>

                                <form method="post" action="{{route('admin.login.post')}}" id="form-login">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" name="email" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" type="submit"> Log In </button>
                                    </div>

                                </form>


                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                              
                                <p class="text-muted">Apakah Kamu Punya Akun 
                                    <a href="{{route('register')}}" class="text-muted ml-1"><b class="font-weight-semibold">Register</b></a></p>
                            </div> <!-- end col -->
                        </div>
                      
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $('#form-login').submit(function (e) {
                e.preventDefault();
                var that = this;
                $.post(this.action, $(this).serialize()).then((res) => {
                    if (res.message == "success") {
                        window.location.href = "{{route('admin')}}"
                    } else if (res.message == "invalid") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Your account is not active',
    
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: res.message
                        })
                    }
                    $(that)[0].reset();
                }, (err) => {
                    alert(err.responseText);
                })
            })
        </script>
    </body>
</html>