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
            Les Modèles
            <small>liste des modéles</small>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >Modele</li>
            <li class="active">index</li>
        </ol>
    </section>
    <div class="row">
    @foreach($genderList as $gender)
        <div class="col-lg-12">
            <h3 class="productGenderTitleAdmin">{{$gender->name}} </h3>
            @foreach($modeleList as $modele)
                @if($modele->idGender == $gender->id)
                    <div class="col-lg-3 col-xs-12">
                    <div class="box box-primary productBoxAdmin">
                        <div class="box-header" data-toggle="tooltip" title="Header tooltip">
                            <h3 class="box-title">{{$modele->name}}</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-primary " data-widget="collapse">Modifier</button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-5 col-xs-5 ">
                                <img class="productImageAdmin" src='/image/{{$modele->image}}' >
                            </div>
                            <div class="col-lg-7 col-xs--7 productImageAdmin">
                                <p><small>Type:</small><b></b></p>
                                <p><small>Couleur: </small><b>{{$modele->color}}</b></p>
                                <p><small>Marque:</small><b></b></p>

                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-lg-12">
                                <h2 class="pull-right">{{$modele->price}}€</h2>
                            </div>
                        </div><!-- /.box-footer-->
                    </div><!-- /.box -->
                    </div>
                @endif
            @endforeach
        </div>
        @endforeach
    </div>

@endsection
@section('section')


@endsection

@section('footer')
@endsection