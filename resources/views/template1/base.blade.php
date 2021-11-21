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
    <!--<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">-->
    <link rel="stylesheet" href="{{ asset('template1/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('template1/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('template1/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('template1/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template1/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('template1/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('template1/css/add.css')}}">
    <link rel="stylesheet" href="{{ asset('template1/css/impression.css')}}" media="print">
    @yield('stylesheets')

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
</head>

<body>

    @include('partials1.menu_personnel')
    <section class="banner-area relative section-personnel " style='min-height: 620px;'>
        <div class="overlay overlay-bg"></div>
        <div class="container">
            @section('body') @show
        </div>
    </section>
    <!-- End banner Area -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>



    <script src="{{ asset('template1/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('template1/js/popper.min.js') }}"></script>
    <script src="{{ asset('template1/js/vendor/bootstrap.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="{{ asset('template1/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('template1/js/easing.min.js') }}"></script>
    <script src="{{ asset('template1/js/hoverIntent.js') }}"></script>
    <script src="{{ asset('template1/js/superfish.min.js') }}"></script>
    <script src="{{ asset('template1/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('template1/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('template1/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('template1/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template1/js/mail-script.js') }}"></script>
    <script src="{{ asset('template1/js/main.js') }}"></script>
    <script src="{{ asset('template1/js/add.js') }}"></script>
</body>

</html>