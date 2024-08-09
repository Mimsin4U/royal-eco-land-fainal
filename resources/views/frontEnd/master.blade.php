<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title> @yield('title') </title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('frontEndAsset') }}/assets/images/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('frontEndAsset') }}/assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/flaticon.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/owl.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/animate.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/jquery-ui.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/nice-select.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/switcher-style.css" rel="stylesheet">

    <link href="{{ asset('frontEndAsset') }}/assets/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/style.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('frontEndAsset') }}/assets/css/responsive.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;family=Ubuntu:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <style>
        @yield('style')
    </style>
</head>


<!-- page wrapper -->
<body>

<div class="boxed_wrapper">

    @include('frontEnd.include.header')
    @yield('content')
    @include('frontEnd.include.footer')




    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fal fa-angle-up"></span>
    </button>
</div>

<script src="{{ asset('frontEndAsset') }}/assets/js/jquery.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/popper.min.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/owl.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/wow.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/validation.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/jquery.fancybox.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/appear.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/scrollbar.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/isotope.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/jquery.nice-select.min.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/jQuery.style.switcher.min.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/jquery-ui.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/jquery.paroller.min.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/nav-tool.js"></script>

<script src="{{ asset('frontEndAsset') }}/assets/js/bxslider.js"></script>
<!-- main-js -->
<script src="{{ asset('frontEndAsset') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/script.js"></script>

<!-- map script -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/gmaps.js"></script>
<script src="{{ asset('frontEndAsset') }}/assets/js/map-helper.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>
