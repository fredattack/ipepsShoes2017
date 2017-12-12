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
            <li class="active">Admin</li>
            <li class="active">Commande</li>
        </ol>
    </section>
    <br>
<div class="container">

    <div class="row">
        <div class="col-lg-6"></div>
        <div class="col-lg-6 pull right">
            <a class="btn btn-success btn-lg pull-right" href="{{route('downloadExcel','order')}}" style="margin-right: 2em;margin-top: 1em"><i class="fa fa-plus-square"></i> Exporter en csv</a>
        </div>

    </div>
{{----------------------------------------------------------------------------------------------------------------------
-
-------------------------------------------------New Order--------------------------------------------------------------
-
----------------------------------------------------------------------------------------------------------------------}}
    <div class="row">


        <div class="box box-primary" style="padding: 1em 2em">

            <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                <div class="col-lg-3 col-xs-12" >
                    <p class="box-title">Nouvelles Commandes</p>
                </div>
            </div>
            {{-- Box Body + table responsive--}}
                                <div class="box-body table-responsive">
                                    <table  class="table table-bordered table-hover text-center">
                                        <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>User Id</th>
                                            <th>Préparée</th>
                                            <th>Livrée</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($newOrderList as $newOrder)
                                            <tr>
                                                <td>{{$newOrder->id}}</td>
                                                <td>{{$newOrder->idUser}}</td>
                                                <td>
                                                    @if($newOrder->orderReady== 0)
                                                        <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                                    @else
                                                        <span class="glyphicon glyphicon-check" style="color: limegreen;"></span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($newOrder->delivered == 0)
                                                        <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                                    @else
                                                        <span class="glyphicon glyphicon-check" style="color: limegreen;"></span>
                                                    @endif
                                                </td>
                                                <td>{{$newOrder->totalProducts}}</td>
                                                <td>
                                                    {{$newOrder->created_at}}
                                                </td>
                                                <td>
                                                    {!! Form::open(['method' => 'GET', 'route' => ['order.edit', $newOrder->id]]) !!}
                                                    {!! Form::submit('Préparé', [ 'class' => 'btn btn-success  btnProductAdmin', 'onclick' => '']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                                <td>
                                                    {!! Form::open(['method' => 'GET', 'route' => ['order.show', $newOrder->id]]) !!}
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
                                            <th>Préparée</th>
                                            <th>Livrée</th>
                                            <th>Total</th>
                                            <th>Date</th>
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
-------------------------------------------------Order Ready------------------------------------------------------------
-
----------------------------------------------------------------------------------------------------------------------}}
    <div class="row">
        <div class="box box-primary" style="padding: 1em 2em">

                    <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                        <div class="col-lg-3 col-xs-12" >
                            <p class="box-title">Commandes préparées</p>
                        </div>
                    </div>

                    {{-- Box Body + table responsive--}}
                                        <div class="box-body table-responsive">
                                            <table id="myTable" class="table table-bordered table-hover text-center">
                                                <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>User Id</th>
                                                    <th>Préparée</th>
                                                    <th>Livrée</th>
                                                    <th>Total</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($orderReadyList as$orderReady )
                                                    <tr>
                                                        <td>{{$orderReady->id}}</td>
                                                        <td>{{$orderReady->idUser}}</td>
                                                        <td>
                                                            @if($orderReady->orderReady == 0)
                                                                <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                                            @else
                                                                <span class="glyphicon glyphicon-check" style="color: limegreen;"></span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($orderReady->delivered == 0)
                                                                <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                                            @else
                                                                <span class="glyphicon glyphicon-check" style="color: limegreen;"></span>
                                                            @endif
                                                        </td>
                                                        <td>{{$orderReady->totalProducts}}</td>
                                                        <td>{{$orderReady->created_at}}</td>
                                                        <td>
                                                            {!! Form::open(['method' => 'GET', 'route' => ['order.edit', $orderReady->id]]) !!}
                                                            {!! Form::submit('Expédier', [ 'class' => 'btn btn-success  btnProductAdmin', 'onclick' => '']) !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                        <td>
                                                            {!! Form::open(['method' => 'GET', 'route' => ['order.show', $orderReady->id]])  !!}
                                                            {!! Form::submit('Details', ['class' => 'btn btn-warning  btnProductAdmin', 'onclick' => ''])  !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>{{-- Box Body + table responsive--}}

                    <div class="box-footer">
                        {{--<h1 class="box-title">Footer</h1>--}}

                    </div>
                </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#mySecondTable').DataTable();
        });
    </script>
</div>
@endsection


@section('footer')
@endsection