@extends('layouts.AdminLayout')
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>--}}
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
            Modele
            <small>ajouter un modéle</small>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >Admin</li>
            <li >Modele</li>
            <li class="active">create</li>
        </ol>
    </section>

    <div class="row">
        <div class="box box-primary formPerso">
            {{Form::open(array('route' => 'modele.store','files'=>'true'))}}
            <div class="col-lg-6 col-xs-12">
                {!! Form::label('name', 'Nom:',null, ['class' => 'form-control']) !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                </div>
                {!! Form::label('gender', 'Genre:',null, ['class' => 'form-control']) !!}
                <div class="form-group {!! $errors->has('idGender') ? 'has-error' : '' !!}">
                    {{ Form::select('idGender',$genderList,
                                    null,['class'=>'form-control','placeholder'=>'Genre du modele']) }}
                    {!! $errors->first('object', '<small class="help-block">:message</small>') !!}

                </div>
                {!! Form::label('brand', 'Marque:',null, ['class' => 'form-control']) !!}
                <div class="form-group {!! $errors->has('idBrand') ? 'has-error' : '' !!}">
                    {{ Form::select('idBrand',$brandList,
                                    null,['class'=>'form-control','placeholder'=>'Marque de la chaussure']) }}
                    {!! $errors->first('idBrand', '<small class="help-block">:message</small>') !!}

                </div>
                {!! Form::label('image', 'Image:',null, ['class' => 'form-control' ]) !!}
                <div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
                    {!! Form::file('image',['class' => 'form-control','onchange'=>"readURL(this)" ]) !!}
                    {!! $errors->first('image', '<small class="help-block">:message</small>') !!}
                </div>
                <img id="img_prev" src="#" alt="your image" />
            </div>

            <div class="col-lg-6 col-xs-12">
                {!! Form::label('color', 'Couleur:',null, ['class' => 'form-control']) !!}
                <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                    {!! Form::text('color',null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
                    {!! $errors->first('color', '<small class="help-block">:message</small>') !!}
                </div>

                {!! Form::label('price', 'Prix:',null, ['class' => 'form-control']) !!}
                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    {!! Form::text('price',null, ['class' => 'form-control', 'placeholder' => 'Prix']) !!}
                    {!! $errors->first('price', '<small class="help-block">:message</small>') !!}
                </div>
                {!! Form::label('type', 'Type:',null, ['class' => 'form-control']) !!}
                <div class="form-group {!! $errors->has('idType') ? 'has-error' : '' !!}">
                    {{ Form::select('idType',$typeList,
                                    null,['class'=>'form-control','placeholder'=>'Type de chaussure']) }}
                    {!! $errors->first('idType', '<small class="help-block">:message</small>') !!}

                </div>
                {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary btn-flat btn-lg pull-right']) !!}
            </div>
            {!! Form::close() !!}
        </div>


    </div>

@endsection
@section('section')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img_prev')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection

@section('footer')
@endsection