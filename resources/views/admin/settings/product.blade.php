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
            Boite à outils
            <small>Catégorie des Modèles</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >Admin</li>
            <li >Outils</li>
            <li class="active">Modéles</li>
        </ol>
    </section>

    {{-------------------------------------------------------
    -
    --------------- Marque-------------------------------------
    -
    ----------------------------------------------------------}}
    <div class="col-lg-6 col-xs-12" style="padding: 1em 2em">
        <div class="box box-primary" style="padding: 1em 2em">

            <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                <div class="col-lg-3 col-xs-12" >
                    <h1 class="box-title">Marques</h1>
                </div>
            </div>

            <div class="box-body">
                <div class="row" >
                    <div class="col-lg-6 col-xs-6">
                        {{Form::open(array('route' => 'brand.store','files'=>'true'),['class'=>'form-inline'])}}

                        {!! Form::label('logo','Logo:',null, ['class' => 'form-control pull-right']) !!}
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <div class="form-group {!! $errors->has('logo') ? 'has-error' : '' !!}">
                            {!! Form::file('logo') !!}
                            {!! $errors->first('logo', '<small class="help-block">:message</small>') !!}
                        </div>
                    </div>
                <div class="row" >
                    <div class="col-lg-2 col-xs-6">
                        {!! Form::label('name','Marques:',null, ['class' => 'form-control pull-right']) !!}
                    </div>
                    <div class="col-lg-8 col-xs-6">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::text('name',null, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-12">

                        {!! Form::submit('Ajouter', ['class' => 'btn btn-primary btn-flat  ']) !!}
                        {!!Form::close()!!}

                    </div>
                </div>


                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">

                            <tbody>
                            @foreach($brandList as $brand)
                                <tr>
                                    <td style="width: 25%;"><img class="brandImageAdmin" src='/image/{{$brand->logo}}' ></td>
                                    <td class="text-center" style="width: 25%;"><h3>{{$brand->name}}</h3></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-------------------------------------------------------
    -
    --------------- Type -------------------------------------
    -
    ----------------------------------------------------------}}

    <div class="row">
        <div class="col-lg-6 col-xs-12" style="padding: 1em 2em">
            <div class="box box-primary" style="padding: 1em 2em">
                <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                    <div class="col-lg-3 col-xs-12" styl>
                        <h1 class="box-title">Type</h1>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row" >
                        <div class="col-lg-2 col-xs-6">
                            {!! Form::label('name','Type:',null, ['class' => 'form-control ']) !!}
                        </div>
                        <div class="col-lg-8 col-xs-6">
                            {{Form::open(array('route' => 'type.store'),['class'=>'form-inline'])}}
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::text('name',null, ['class' => 'form-control']) !!}
                                {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                        <div class="col-lg-2 col-xs-12">

                            {!! Form::submit('Ajouter', ['class' => 'btn btn-primary btn-flat  ']) !!}
                            {!!Form::close()!!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">

                                <tbody>
                                @foreach($typeList as $type)
                                    <tr>

                                        <td class="text-center"><h3>{{$type->name}}</h3></td>
                                        {{--<td>--}}
                                            {{----}}
                                            {{--{!! Form::open(['method' => 'GET', 'route' => ['gender.edit', $type->id]]) !!}--}}
                                            {{--{!! Form::submit('Modifier', [ 'class' => 'btn btn-warning center-block', 'onclick' => '']) !!}--}}
                                            {{--{!! Form::close() !!}--}}
                                        {{--</td>--}}

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="box-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-------------------------------------------------------
        -
        --------------- Genre-------------------------------------
        -
        ----------------------------------------------------------}}
        <div class="col-lg-6 col-xs-12" style="padding: 1em 2em">

            <div class="box box-primary" style="padding: 1em 2em">

                <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                    <div class="col-lg-3 col-xs-12">
                        <h1 class="box-title">Genre</h1>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row" >
                        <div class="col-lg-2 col-xs-6">
                            {!! Form::label('name','Genre:',null, ['class' => 'form-control ']) !!}
                        </div>
                        <div class="col-lg-8 col-xs-6">
                            {{Form::open(array('route' => 'gender.store'),['class'=>'form-inline'])}}
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::text('name',null, ['class' => 'form-control']) !!}
                                {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                        <div class="col-lg-2 col-xs-12">

                            {!! Form::submit('Ajouter', ['class' => 'btn btn-primary btn-flat  ']) !!}
                            {!!Form::close()!!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">

                            <table id="example2" class="table table-bordered table-hover">

                                <tbody>
                                @foreach($genderList as $gender)
                                    <tr>
                                        <td class="text-center"><h3>{{$gender->name}}</h3></td>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                        </div>
                        <div class="box-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('section')


@endsection

@section('footer')
@endsection