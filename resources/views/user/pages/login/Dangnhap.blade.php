

<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Đăng nhập</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/admin/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->





    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center"> <h4>Đăng nhập</h4></a>

                                <form class="mt-5 mb-5 login-input" action="{{ route('user.login.post') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-control" type="email" id ="email" name="email"  placeholder="Email" autofocus value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" id = "password" name="password" class="form-control" placeholder="Mật khẩu">
                                    </div> 
                                    <button class="btn login-form__btn submit w-100">Đăng nhập</button>
                                </form>
                                <p class="mt-5 login-form__footer">Bạn chưa có tài khoản ?  <a href="{{ route('user.signup') }}" class="text-primary">Đăng ký</a> ngay nhé.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('assets/admin/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/settings.js') }}"></script>
    <script src="{{ asset('assets/admin/js/gleek.js') }}"></script>
    <script src="{{ asset('assets/admin/js/styleSwitcher.js') }}"></script>
</body>
</html>





 {{-- <!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Main CSS-->
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css')
 }}" />
 <!-- Font-icon css-->
 
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-
 awesome/4.7.0/css/font-awesome.min.css') }}"/>
 
 <title>Login - {{ config('app.name') }}</title>
 </head>
 <body>
 <section class="material-half-bg">
 <div class="cover"></div>
 </section>
 <section class="login-content">
 <div class="logo">
 <h1>{{ config('app.name') }}</h1>
 </div>
 <div class="login-box">
 <form class="login-form" action="{{ route('admin.login.post') }}"method="POST" role="form">
 @csrf
 <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN
 IN</h3>
 <div class="form-group">
 
 <label class="control-label" for="email">Email Address</label>
 
 
 <input class="form-control" type="email" id="email" name="email"
 placeholder="Email address" autofocus value="{{ old('email') }}">
 </div>
 <div class="form-group">
 <label class="control-label" for="password">Password</label>
 <input class="form-control" type="password" id="password"
 name="password" placeholder="Password">
 </div>
 <div class="form-group">
 <div class="utility">
 <div class="animated-checkbox">
 <label>
 <input type="checkbox"><span class="label-text">Stay
 Signed in</span>
 </label>
 </div>
 
 <p class="semibold-text mb-2"><a href="#" data-
 toggle="flip">Forgot Password ?</a></p>
 
 </div>
 </div>
 <div class="form-group btn-container">
 <button class="btn btn-primary btn-block"><i class="fa fa-sign-in
 fa-lg fa-fw"></i>SIGN IN</button>
 </div>
 </form>
 
 <form class="forget-form" action="https://pratikborsadiya.in/vali-
 admin/index.html">
 
 <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot
 Password ?</h3>
 <div class="form-group">
 <label class="control-label">Email Address</label>
 <input class="form-control" type="text" placeholder="Email">
 </div>
 <div class="form-group btn-container">
 
 
 <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-
 lg fa-fw"></i>RESET</button>
 
 </div>
 <div class="form-group mt-3">
 <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i
 class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
 </div>
 </form>
 </div>
 </section>
 <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
 <script src="{{ asset('backend/js/popper.min.js') }}"></script>
 <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('backend/js/main.js') }}"></script>
 <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
 </body>
 </html> --}}