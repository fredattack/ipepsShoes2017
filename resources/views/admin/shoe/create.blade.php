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

            Modéle create
            <small>Stock par pointure</small>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >Admin</li>
            <li >Modele</li>
            <li >Stock</li>
            <li class="active">Create</li>
        </ol>
    </section>

    <div class="row">
        <div class="box box-primary createFormModele">
            {{Form::open(array('route' => 'checkOutAdress'))}}
            {{ Form::hidden('idModele', $leModele->id) }}
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <img class="productImageEdit" src='/image/{{$leModele->image}}' style="height: 150px;width: 150px;" >

                </div>
                <div class="col-lg-8 col-xs-12">
                    <p><small>Type: </small><b>{{$leModele->type->name}}</b></p>
                    <p><small>Sexe: </small><b>{{$leModele->gender->name}}</b></p>
                    <p><small>Couleur: </small><b>{{$leModele->color}}</b></p>
                    <p><small>Marque: </small><b>{{$leModele->brand->name}}</b></p>
                    <p><small>Prix: </small><b>{{$leModele->price}}</b></p>
                </div>
            </div>
            <div class="row">

                <?php
                    $minSize=$leModele->gender->minSize;
                    $maxSize=$leModele->gender->maxSize;
                ?>
                @while($minSize<=$maxSize)
                        <div class=" col-lg-3 col-xs-6">
                            @php($id=$minSize)
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label($minSize,$minSize,null, ['class' => 'form-control ']) !!}
                                {!! Form::text($id,null, ['class' => 'form-control']) !!}
                                {!! $errors->first($id, '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                    @php($minSize++)
                @endwhile
            </div>
            <div class="row">

                {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary btn-flat btn-lg pull-right']) !!}
                <a href="javascript:history.back()" class="btn btn-primary btn-flat btn-lg pull-left">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span>
                    Retour
                </a>
            </div>
        </div>
            {!! Form::close() !!}
        </div>


    </div>

@endsection



@section('footer')
@endsection