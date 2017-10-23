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
            <li class="active">User</li>
            <li class="active">{{$user->id}}</li>

        </ol>
    </section>
    <div class="container">

        <div class="box box-primary" style="padding: 1em 2em">

            <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                <div class="col-lg-3 col-xs-12" >
                    <h2>{{$user->firstName}} {{$user->lastName}}</h2>
                </div>
            </div>

            <div class="box-body">
                {!! Form::model($user,['route' =>['user.update',$user->id],'method'=>'put', 'class' => 'form-horizontal panel']) !!}
                    {{ csrf_field() }}

                    {{--firstName--}}
                    {!! Form::label('firstName', 'FirstName:',null, ['class' => 'form-control col-md-4']) !!}
                    <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                            {!! Form::text('firstName',null, ['class' => 'form-control']) !!}
                            {!! $errors->first('firstName', '<small class="help-block">:message</small>') !!}
                    </div>

                    {{--surname--}}
                    {!! Form::label('lastName', 'lastName:',null, ['class' => 'form-control col-md-4']) !!}
                    <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            {!! Form::text('lastName',null, ['class' => 'form-control']) !!}
                            {!! $errors->first('lastName', '<small class="help-block">:message</small>') !!}
                    </div>

                    {{--login--}}
                    {!! Form::label('login', 'Login:',null, ['class' => 'form-control col-md-4']) !!}
                    <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                            {!! Form::text('login',null, ['class' => 'form-control']) !!}
                            {!! $errors->first('login', '<small class="help-block">:message</small>') !!}
                    </div>

                    {{--email--}}
                    {!! Form::label('email', 'Email:',null, ['class' => 'form-control col-md-4']) !!}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::text('email',null, ['class' => 'form-control']) !!}
                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                    </div>
                {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary btn-lg pull-right']) !!}
                </form>
            </div>
            <div class="box-footer">
                <h1 class="box-title"></h1>

            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection