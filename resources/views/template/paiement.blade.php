<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') - Tunisair</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('css/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('css/flat/green.css')}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('css/jqvmap.min.css')}}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('css/daterangepicker.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
</head>

<body>
    <div class="container" style="margin-top: 45px;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @section('body') @show
            </div>
        </div>
    </div>
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
    <script src="{{ asset('js/add.js') }}"></script>
</body>

</html>