<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') - Tunisair</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="{{ asset('template1/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('template1/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template1/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('template1/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('template1/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('template1/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('template1/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template1/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('template1/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('template1/css/add.css')}}">

    @yield('stylesheets')

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
</head>

<body class="login">
    <section class="banner-area relative" style='min-height: 620px;'>
        <div class="overlay overlay-bg"></div>
        <div class="container" >
            @section('body') @show
        </div>
    </section>
    <!-- End banner Area -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('js/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('js/Chart.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('js/gauge.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('js/bootstrap-progressbar.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('js/icheck.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('js/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('js/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('js/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('js/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('js/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('js/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('js/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('js/jquery.vmap.js') }}"></script>
    <script src="{{ asset('js/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>