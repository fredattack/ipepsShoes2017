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
 @include('admin.nav.modeleMenu')
    <div class="row">
    @foreach($genderList as $gender)

        <div class="col-lg-12">
            <h1.git class="productGenderTitleAdmin">{{$gender->name}} </h1.git>

            @foreach($modeleList as $modele)
                @if($modele->idGender == $gender->id)
                    <div class="col-lg-4 col-xs-12">
                    <div class="box box-primary productBoxAdmin">
                        <div class="box-header" data-toggle="tooltip" title="Header tooltip">
                            <div class="col-lg-6 col-xs-12">
                                <h3 class="box-title">{{$modele->name}}</h3>
                            </div>
                            <div class="col-lg-2 col-xs-6">
                                {!! Form::open(['method' => 'GET', 'route' => ['modele.edit', $modele->id]]) !!}
                                {!! Form::submit('Modifier', [ 'class' => 'btn btn-primary btn-xs btnProductAdmin', 'onclick' => '']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-lg-3 col-xs-6 ">
                                {!! Form::open(['method' => 'DELETE', 'route' => ['modele.destroy', $modele->id]]) !!}
                                {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-xs btnProductAdmin', 'onclick' => 'return confirm(\'Voulez vous vraiment supprimer ce modèle ?\')'])  !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-5 col-xs-5 ">
                                <img class="productImageAdmin" src='/image/{{$modele->image}}' >
                            </div>
                            <div class="col-lg-7 col-xs--7 productInfoAdmin">
                                <p><small>Type: </small><b>{{$modele->type->name}}</b></p>
                                <p><small>Couleur: </small><b>{{$modele->color}}</b></p>
                                <p><small>Marque: </small><b>{{$modele->brand->name}}</b></p>

                                {!! Form::open(['method' => 'GET', 'route' => ['stock', $modele->id]]) !!}
                                {!! Form::submit('stock', ['class' => 'btn btn-warning ' ])  !!}
                                {!! Form::close() !!}

                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-lg-12 selectReduction">
                                <div class="col-lg-3 ">
                                    {!! Form::open(['method' => 'put', 'route' => ['modele.update', $modele->id,]]) !!}
                                        {!! Form::label('reduction', 'Promo:',null, ['class' => 'form-control ']) !!}
                                        <div class="form-group ">
                                        {{ Form::select('idReduction', $reductionList,$modele->idReduction,['class'=>'form-control selectReduction ','onchange'=>'upDateReduction(this,'.$modele->id.')']) }}
                                    {!! Form::close() !!}
                                </div>
                                </div>

                                <div class="col-lg-9">
                                    <h3 class="pull-right">{{$modele->price}}€</h3>
                                </div>
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


@section('footer')
    <!-- DATA TABES SCRIPT -->
    <script src={{asset('adminPanel/js/plugins/datatables/jquery.dataTables.js')}}  type="text/javascript"></script>
    <script src={{asset('adminPanel/js/plugins/datatables/dataTables.bootstrap.js')}} type="text/javascript"></script>

    <!-- page script -->
    <script type="text/javascript">
        $(function() {
            $("#example1").dataTable();
            $('#example2').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
            });
        });
    </script>
@endsection