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
            <li >Admin</li>
            <li >User</li>
            <li class="active">{{$user->id}}</li>

        </ol>
    </section>

    <div class="container">
        <div class="row" style="margin-bottom: 1em;">
            <a href="javascript:history.back()" class="btn btn-primary  btn-lg pull-right">
                <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
            </a>
        </div>
        <div class="box box-primary" style="padding: 1em 2em;margin-top: 2em">

                    <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                        <div class="col-lg-4 col-xs-12" >
                            <h1>{{$user->firstName}} {{$user->lastName}}</h1>
                        </div>
                        <div class="col-lg-4 col-xs-12" >
                            <h2>user Id.:{{$user->id}}</h2>
                            <h2>login: {{$user->login}}</h2>
                        </div>
                        <div class="col-lg-4 col-xs-12" >
                                <h3><b>Depuis le: {{date("d-m-Y", strtotime($user->created_at))}}</b></h3>
                                <h3>Rôle: {{$user->role}}</h3>
                            {!! Form::open(['method' => 'GET', 'route' => ['user.edit', $user->id]]) !!}
                            {!! Form::submit('Modifier', [ 'class' => 'btn btn-primary  btnProductAdmin', 'onclick' => '']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12 col-lg-6">

                            </div>
                            <div class="col-xs-12 col-lg-6">

                            </div>

                        </div>
                        <div class="row">


                    </div>
                    <div class="box-footer">

                    </div>
                </div>

    </div>

@endsection
@section('section')


@endsection

@section('footer')
@endsection