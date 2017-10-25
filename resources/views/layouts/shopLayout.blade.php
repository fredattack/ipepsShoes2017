<!DOCTYPE html>
<html lang="fr">
<head>
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- css start -->
    <link href={{asset('shopZone/css/bootstrap.min.css')}} rel="stylesheet" type="text/css">
    <link href={{asset('shopZone/css/font-awesome.min.css')}} rel="stylesheet" type="text/css">
    <link href={{asset('shopZone/css/prettyPhoto.css')}} rel="stylesheet" type="text/css">
    <link href={{asset('shopZone/css/price-range.css')}} rel="stylesheet" type="text/css">
    <link href={{asset('shopZone/css/animate.css')}} rel="stylesheet" type="text/css">
    <link href={{asset('shopZone/css/main.css')}} rel="stylesheet" type="text/css">
    <link href={{asset('shopZone/css/responsive.css')}} rel="stylesheet" type="text/css">

    <!-- perso style-->
    <link href={{asset('shopZone/css/shopPersoStyle.css')}} rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src={{asset('shopZone/js/html5shiv.js')}}></script>
    <script src={{asset('shopZone/js/respond.min.js')}}></script>
    <![endif]-->
    <!-- css End -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<!-- Body Start -->




<body>
<header class="header">@yield('header')</header>
    {{--<nav >@yield('nav')</nav>--}}
    <div class="container">
        <section>@yield('slider') </section>
        <div class="row">
        <aside class="left-side ">@yield('asideLeft')</aside>
        <aside class="right-side ">
                @yield('section')
            </aside>

        <section class="col-sm-12">
                    @yield('bottomSlider')
                </section>
        </div>
    </div>
    <footer class="footer">@yield('footer')</footer>





    <!--scripts -->
    <script src={{asset('shopZone/js/bootstrap.min.js')}}></script>
    <script src={{asset('shopZone/js/jquery.js')}}></script>
    <script src={{asset('shopZone/js/jquery.scrollUp.min.js')}}></script>
    <script src={{asset('shopZone/js/price-range.js')}}></script>
    <script src={{asset('shopZone/js/jquery.prettyPhoto.js')}}></script>
    <script src={{asset('shopZone/js/main.js')}}></script>
<!--End scripts -->

</body>
<!-- Body end-->
