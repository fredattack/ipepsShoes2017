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

            Tableau de Bord
            <small>Panneau d'administration</small>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Admin</li>
            <li>Commande</li>
            <li class="active">Livraison</li>

        </ol>
    </section>
    <br>
<div class="container">
    <div class="row">
        <div class="col-lg-6"></div>
        <div class="col-lg-6 pull right">
            <a class="btn btn-success btn-lg pull-right" href="{{route('downloadExcel','shipment')}}" style="margin-right: 2em;margin-top: 1em"><i class="fa fa-plus-square"></i> Exporter en csv</a>
        </div>

    </div>
{{----------------------------------------------------------------------------------------------------------------------
-
-------------------------------------------------New Shipment--------------------------------------------------------------
-
----------------------------------------------------------------------------------------------------------------------}}
    <div class="row">
        <div class="box box-primary" style="padding: 1em 2em">

            <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                <div class="col-lg-3 col-xs-12" >
                    <p class="box-title">Nouvelles Livraisons</p>
                </div>
            </div>
            {{-- Box Body + table responsive--}}
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover text-center">
                                        <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>User Id</th>
                                            <th>Livrée</th>
                                            <th>id Envoie</th>
                                            <th>Numéro Tracking</th>
                                            <th>Date de commande</th>
                                            <th>Date d'Envoie</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($newShipmentList as  $newShipment)
                                            <tr>
                                                <td>{{ $newShipment->id}}</td>
                                                <td>{{ $newShipment->idUser}}</td>

                                                <td>
                                                    @if( $newShipment->delivered == 0)
                                                        <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                                    @else
                                                        <span class="glyphicon glyphicon-check" style="color: limegreen;"></span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if( $newShipment->delivered == 0)
                                                        <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                                    @else
                                                       {{$newShipment->shipment->id}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if( $newShipment->delivered == 0)
                                                        <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                                    @else
                                                        {{$newShipment->shipment->trackingNr}}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $newShipment->created_at}}
                                                </td>
                                                <td> {{ $newShipment->updated_at}}</td>
                                                <td>
                                                {{--{!! Form::open(['method' => 'GET', 'route' => ['shipment.edit',  $newShipment->id]]) !!}--}}
                                                    <button type="button" class="btn btn-success btnProductAdmin" {{--id="{{$newShipment->id}}"--}} data-toggle="modal" data-target="#TrackingNrModal" onclick="PassVal({{$newShipment->id}})">Expédier</button>
                                                    {{--{!! Form::submit('Expédier', [ 'class' => 'btn btn-success  btnProductAdmin', 'onclick' => '']) !!}--}}
                                                    {{--{!! Form::close() !!}--}}
                                                </td>
                                                <td>
                                                {!! Form::open(['method' => 'GET', 'route' => ['shipment.show',  $newShipment->id]]) !!}
                                                {!! Form::submit('Details', ['class' => 'btn btn-warning  btnProductAdmin', 'onclick' => ''])  !!}
                                                {!! Form::close() !!}
                                                    {{--todo modal add tracking number
                                                    --}}
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>N°</th>
                                            <th>User Id</th>
                                            <th>Livrée</th>
                                            <th>id Envoie</th>
                                            <th>Numéro Tracking</th>
                                            <th>Date de commande</th>
                                            <th>Date d'Envoie</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>{{-- Box Body + table responsive--}}



            <div class="box-footer">
                {{--<h1 class="box-title">Footer</h1>--}}

            </div>
        </div>

    </div>
{{----------------------------------------------------------------------------------------------------------------------
-
-------------------------------------------------Shipment Ready------------------------------------------------------------
-
----------------------------------------------------------------------------------------------------------------------}}
    <div class="row">
        <div class="box box-primary" style="padding: 1em 2em">

                    <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                        <div class="col-lg-3 col-xs-12" >
                            <p class="box-title">Envoies effectués</p>
                        </div>
                    </div>

                    {{-- Box Body + table responsive--}}
                                        <div class="box-body table-responsive">
                                            <table id="example2" class="table table-bordered table-hover text-center">
                                                <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>User Id</th>
                                                    <th>Livrée</th>
                                                    <th>id Envoie</th>
                                                    <th>Numéro Tracking</th>
                                                    <th>Date de commande</th>
                                                    <th>Date d'Envoie</th>
                                                    <th></th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($shipmentReadyList as $shipmentReady )
                                                    <tr>
                                                        <td>{{ $shipmentReady ->id}}</td>
                                                        <td>{{ $shipmentReady->idUser}}</td>

                                                        <td>
                                                            @if( $shipmentReady ->delivered == 0)
                                                                <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                                            @else
                                                                <span class="glyphicon glyphicon-check" style="color: limegreen;"></span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if( $shipmentReady ->delivered == 0)
                                                                <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                                            @else
                                                                {{$shipmentReady ->shipment->id}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if( $shipmentReady ->delivered == 0)
                                                                <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                                            @else
                                                                {{$shipmentReady ->shipment->trackingNr}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ $shipmentReady ->created_at}}
                                                        </td>
                                                        <td> {{ $shipmentReady ->updated_at}}</td>
                                                        <td>
                                                            {!! Form::open(['method' => 'GET', 'route' => ['shipment.show',  $shipmentReady ->id]]) !!}
                                                            {!! Form::submit('Details', ['class' => 'btn btn-warning  btnProductAdmin', 'onclick' => ''])  !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>User Id</th>
                                                    <th>Livrée</th>
                                                    <th>id Envoie</th>
                                                    <th>Numéro Tracking</th>
                                                    <th>Date de commande</th>
                                                    <th>Date d'Envoie</th>
                                                    <th></th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>{{-- Box Body + table responsive--}}

                    <div class="box-footer">
                        {{--<h1 class="box-title">Footer</h1>--}}

                    </div>
                </div>
    </div>
</div>
    @include('admin.modal.trackingNr')
    <script>
        function PassVal(res)
        {
            $('#modalForm').attr('action', '/admin/shipment/'+res+'/edit');
        }

    </script>
@endsection

@section('footer')
@endsection