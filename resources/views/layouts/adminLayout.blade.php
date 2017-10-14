<!DOCTYPE html>
<html lang="fr">
<head>
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- file upload start--}}
    {{--<!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />--}}
    {{--<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->--}}
    {{--<!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->--}}
    {{--<!-- optionally uncomment line below if using a theme or icon set like font awesome (note that default icons used are glyphicons and `fa` theme can override it) -->--}}
    {{--<!-- link https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css media="all" rel="stylesheet" type="text/css" /-->--}}
    {{--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>--}}
    {{--<!-- piexif.min.js is only needed for restoring exif data in resized images and when you--}}
        {{--wish to resize images before upload. This must be loaded before fileinput.min.js -->--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js" type="text/javascript"></script>--}}
    {{--<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.--}}
        {{--This must be loaded before fileinput.min.js -->--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js" type="text/javascript"></script>--}}
    {{--<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for--}}
        {{--HTML files. This must be loaded before fileinput.min.js -->--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/purify.min.js" type="text/javascript"></script>--}}
    {{--<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js--}}
       {{--3.3.x versions without popper.min.js. -->--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>--}}
    {{--<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal--}}
        {{--dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>--}}
    {{--<!-- the main fileinput plugin file -->--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>--}}
    {{--<!-- optionally uncomment line below for loading your theme assets for a theme like Font Awesome (`fa`) -->--}}
    {{--<!-- script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/themes/fa/theme.min.js"></script -->--}}
    {{--<!-- optionally if you need translation for your language then include  locale file as mentioned below -->--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/locales/LANG.js"></script>--}}
    {{-- file upload start--}}

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
