<!DOCTYPE html>
<html lang="fr">
<head>
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<header>@yield('header')</header>
<nav >@yield('nav')</nav>
<div class="container-fluid">
    <aside class="col-lg-3">@yield('aside')</aside>
    <section class="col-lg-9">@yield('section')</section>
</div>
<footer>@yield('footer')</footer>
</body>
