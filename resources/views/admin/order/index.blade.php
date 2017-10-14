@extends('layouts.AdminLayout')

@section('title')

@endsection

@section('header')
    @include('admin.nav.header')
@endsection

@section('nav')
@endsection

@section('asideLeft')
    @include('admin.nav.sideBar')
@endsection

@section('asideRight')
    <section class="content-header">
        <h1>
            {{--Dashboard--}}
            {{--<small>Control panel</small>--}}
            Tableau de Bord
            <small>Panneau d'administration</small>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Admin</li>
            <li class="active">Commande</li>
        </ol>
    </section>
<div class="container">
    <div class="row">
        <h1>Nouvelles Commandes</h1>
    </div>

    <div class="row">
        <h1>Commandes expédiées</h1>
    </div>
</div>
@endsection
@section('section')


@endsection

@section('footer')
@endsection