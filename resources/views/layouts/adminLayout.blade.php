<!DOCTYPE html>
<html lang="fr">
<head>
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href={{asset('adminPanel/css/bootstrap.min.css')}} rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href={{asset('adminPanel/css/font-awesome.min.css')}} rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href={{asset('adminPanel/css/ionicons.min.css')}} rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href={{asset('adminPanel/css/morris/morris.css')}} rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href={{asset('adminPanel/css/jvectormap/jquery-jvectormap-1.2.2.css')}} rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <link href={{asset('adminPanel/css/fullcalendar/fullcalendar.css')}} rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href={{asset('adminPanel/css/daterangepicker/daterangepicker-bs3.css')}} rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href={{asset('adminPanel/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}} rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href={{asset('adminPanel/css/AdminLTE.css')}} rel="stylesheet" type="text/css" />

    <link href={{asset('adminPanel/css/persoStyle.css')}} rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.adminPanel/js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body  class="skin-black">
    <header class="header">@yield('header')</header>
    <nav >@yield('nav')</nav>
    <div class="wrapper row-offcanvas row-offcanvas-left">
    <aside class="left-side sidebar-offcanvas">@yield('asideLeft')</aside>
    <aside class="right-side">@yield('asideRight')</aside>
    </div>
<footer>@yield('footer')</footer>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- jQuery UI 1.10.3 -->
    <script src={{asset('adminPanel/js/jquery-ui-1.10.3.min.js')}} type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src={{asset('adminPanel/js/bootstrap.min.js')}} type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src={{asset('adminPanel/js/plugins/morris/morris.min.js')}} type="text/javascript"></script>
    <!-- Sparkline -->
    <script src={{asset('adminPanel/js/plugins/sparkline/jquery.sparkline.min.js')}} type="text/javascript"></script>
    <!-- jvectormap -->
    <script src={{asset('adminPanel/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}} type="text/javascript"></script>
    <script src={{asset('adminPanel/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}} type="text/javascript"></script>
    <!-- fullCalendar -->
    <script src={{asset('adminPanel/js/plugins/fullcalendar/fullcalendar.min.js')}} type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src={{asset('adminPanel/js/plugins/jqueryKnob/jquery.knob.js')}} type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src={{asset('adminPanel/js/plugins/daterangepicker/daterangepicker.js')}} type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src={{asset('adminPanel/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}} type="text/javascript"></script>
    <!-- iCheck -->
    <script src={{asset('adminPanel/js/plugins/iCheck/icheck.min.js')}} type="text/javascript"></script>

    <!-- AdminLTE App -->
    <script src={{asset('adminPanel/js/AdminLTE/app.js')}} type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src={{asset('adminPanel/js/AdminLTE/dashboard.js')}} type="text/javascript"></script>

{{---------------------------------------------------------------------------------
-
-
------------------------------Script Perso-----------------------------------------
-
-
----------------------------------------------------------------------------------}}

    <script src={{asset('adminPanel/js/scriptAdminPerso.js')}} type="text/javascript"></script>

</body>
