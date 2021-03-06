<!DOCTYPE html>
<html lang="zxx">

<head>    
    <base href="{{ asset('/') }}">

    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/user/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/user/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/user/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/user/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="assets/user/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/user/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/user/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/user/css/style.css" type="text/css">
    <link href="assets/user/css/login-style.css" rel="stylesheet">

</head>

<body>
    @include('user.layouts.includes.header')
    @yield('body')
   @include('user.layouts.includes.footer')

    <script src="assets/user/js/jquery-3.3.1.min.js"></script>
    <script src="assets/user/js/bootstrap.min.js"></script>
    <script src="assets/user/js/jquery.nice-select.min.js"></script>
    <script src="assets/user/js/jquery.nicescroll.min.js"></script>
    <script src="assets/user/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/user/js/jquery.countdown.min.js"></script>
    <script src="assets/user/js/jquery.slicknav.js"></script>
    <script src="assets/user/js/mixitup.min.js"></script>
    <script src="assets/user/js/owl.carousel.min.js"></script>
    <script src="assets/user/js/main.js"></script>
</body>

</html>