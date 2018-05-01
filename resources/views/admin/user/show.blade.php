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
                        </div>
                        <div class="col-lg-4 col-xs-12" >
                            @if($user->role=='client')
                                <h3><b>Depuis le: {{date("d-m-Y", strtotime($user->created_at))}}</b></h3>
                                <h3><b>Rôle:</b> {{$user->role}}</h3>
                            @endif
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12 col-lg-6">
                                <div class="box box-default" style="padding: 1em 2em">

                                            <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                                                <div class="col-lg-12 col-xs-12" >
                                                    <h3><b>Adresse de Facturation: </b></h3>
                                                </div>

                                            </div>

                                            <div class="box-body">
                                                @if($user->idFactAdress!=null)
                                                <br>
                                                <p>Rue: <b>
                                                        {{$user->adress
                                                        ->where('id', '=', $user->idFactAdress)
                                                        ->first()->street.'&nbsp;' }}
                                                        {{$user->adress
                                                        ->where('id', '=', $user->idFactAdress)
                                                        ->first()->number}}
                                                    </b></p>
                                                <p>Code postale: <b>
                                                        {{$user->adress
                                                        ->where('id', '=', $user->idFactAdress)
                                                        ->first()->postCode }}
                                                    </b></p>
                                                <p>Localité: <b>
                                                        {{$user->adress
                                                        ->where('id', '=', $user->idFactAdress)
                                                        ->first()->city }}
                                                    </b></p>
                                                <p>Pays: <b>
                                                        {{$user->adress
                                                        ->where('id', '=', $user->idFactAdress)
                                                        ->first()->country }}
                                                    </b></p>
                                                @endif

                                            </div>
                                            {{--<div class="box-footer">--}}
                                                {{--<h1 class="box-title">Footer</h1>--}}

                                            {{--</div>--}}
                                        </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="box box-default" style="padding: 1em 2em">

                                            <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                                                <div class="col-lg-12 col-xs-12" >
                                                    <h3><b>Adresse de Livraison:</b></h3>
                                                </div>
                                            </div>

                                            <div class="box-body">
                                                <br>
                                                @if($user->idShipAdress1!=null)
                                                <p>Rue: <b>
                                                        {{$user->adress
                                                        ->where('id', '=', $user->idShipAdress1)
                                                        ->first()->street.'&nbsp;' }}
                                                        {{$user->adress
                                                        ->where('id', '=', $user->idShipAdress1)
                                                        ->first()->number}}
                                                    </b></p>
                                                <p>Code postale: <b>
                                                        {{$user->adress
                                                        ->where('id', '=', $user->idShipAdress1)
                                                        ->first()->postCode }}
                                                    </b></p>
                                                <p>Localité: <b>
                                                        {{$user->adress
                                                        ->where('id', '=', $user->idShipAdress1)
                                                        ->first()->city }}
                                                    </b></p>
                                                <p>Pays: <b>
                                                        {{$user->adress
                                                        ->where('id', '=', $user->idShipAdress1)
                                                        ->first()->country }}
                                                    </b></p>
                                                @endif
                                            </div>
                                            {{--<div class="box-footer">--}}
                                                {{--<h1 class="box-title">Footer</h1>--}}

                                            {{--</div>--}}
                                        </div>
                            </div>

                        </div>
                        <div class="row">
                            @if($user->role=='client')
                                <h3><b>Total des achats: {{$totalUser}} €</b></h3>
                            @endif
                        </div>
                        <div class="row">
                            <div class="box-body table-responsive">
                                <table id="example2" class="table table-bordered table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>User Id</th>
                                        <th>Préparée</th>
                                        <th>Livrée</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($orderList as$orderReady )
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
                                                {!! Form::open(['method' => 'GET', 'route' => ['order.show', $orderReady->id]])  !!}
                                                {!! Form::submit('Details', ['class' => 'btn btn-warning  btnProductAdmin', 'onclick' => ''])  !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                        </div>


                    </div>

                </div>

    </div>

@endsection
@section('section')


@endsection

@section('footer')
@endsection